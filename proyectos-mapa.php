<?php
require __DIR__ . '/app/bootstrap.php';

function ensure_map_projects_table(): void
{
    db()->exec("CREATE TABLE IF NOT EXISTS map_projects (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(180) NOT NULL,
        estado VARCHAR(40) NOT NULL DEFAULT 'Planificación',
        etapa VARCHAR(60) NOT NULL DEFAULT 'Diseño',
        sector VARCHAR(120) DEFAULT NULL,
        monto VARCHAR(80) DEFAULT NULL,
        financiamiento VARCHAR(160) DEFAULT NULL,
        inicio VARCHAR(80) DEFAULT NULL,
        entrega VARCHAR(80) DEFAULT NULL,
        foto TEXT DEFAULT NULL,
        descripcion TEXT DEFAULT NULL,
        avance TINYINT UNSIGNED NOT NULL DEFAULT 0,
        lat DECIMAL(10,7) NOT NULL,
        lng DECIMAL(10,7) NOT NULL,
        visible TINYINT(1) NOT NULL DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $stmt = db()->query("SHOW COLUMNS FROM map_projects LIKE 'inicio'");
    if (!$stmt->fetch()) {
        db()->exec("ALTER TABLE map_projects ADD COLUMN inicio VARCHAR(80) DEFAULT NULL AFTER financiamiento");
    }
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function selected_option(?string $current, string $option): string
{
    return $current === $option ? 'selected' : '';
}

function normalize_date_for_input(?string $value): string
{
    if (!$value) {
        return '';
    }

    $timestamp = strtotime($value);
    return $timestamp ? date('Y-m-d', $timestamp) : '';
}

function upload_project_photo(array $file, array &$errors): ?string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
        $errors[] = 'No se pudo cargar la imagen del proyecto.';
        return null;
    }

    if (($file['size'] ?? 0) > 4 * 1024 * 1024) {
        $errors[] = 'La imagen no puede superar los 4 MB.';
        return null;
    }

    $extension = strtolower(pathinfo((string) ($file['name'] ?? ''), PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($extension, $allowedExtensions, true)) {
        $errors[] = 'La imagen debe estar en formato JPG, PNG o WEBP.';
        return null;
    }

    $uploadDir = __DIR__ . '/assets/uploads/map-projects';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $filename = 'proyecto-' . date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $extension;
    $destination = $uploadDir . '/' . $filename;
    if (!move_uploaded_file((string) $file['tmp_name'], $destination)) {
        $errors[] = 'No se pudo guardar la imagen cargada.';
        return null;
    }

    return 'assets/uploads/map-projects/' . $filename;
}

ensure_map_projects_table();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$project = null;
$errors = [];
$success = $_GET['success'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $deleteId = (int) ($_POST['id'] ?? 0);
    if ($deleteId > 0) {
        $stmt = db()->prepare('DELETE FROM map_projects WHERE id = ?');
        $stmt->execute([$deleteId]);
        redirect('proyectos-mapa.php');
    }
}

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM map_projects WHERE id = ?');
    $stmt->execute([$id]);
    $project = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $uploadedPhoto = upload_project_photo($_FILES['foto_archivo'] ?? [], $errors);
    $currentPhoto = trim($_POST['foto_actual'] ?? '');
    $photoUrl = trim($_POST['foto'] ?? '');

    $data = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'estado' => trim($_POST['estado'] ?? 'Planificación'),
        'etapa' => trim($_POST['etapa'] ?? 'Diseño'),
        'sector' => trim($_POST['sector'] ?? ''),
        'monto' => trim($_POST['monto'] ?? ''),
        'financiamiento' => trim($_POST['financiamiento'] ?? ''),
        'inicio' => trim($_POST['inicio'] ?? ''),
        'entrega' => trim($_POST['entrega'] ?? ''),
        'foto' => $uploadedPhoto ?: ($photoUrl !== '' ? $photoUrl : $currentPhoto),
        'descripcion' => trim($_POST['descripcion'] ?? ''),
        'avance' => max(0, min(100, (int) ($_POST['avance'] ?? 0))),
        'lat' => (float) ($_POST['lat'] ?? 0),
        'lng' => (float) ($_POST['lng'] ?? 0),
        'visible' => isset($_POST['visible']) ? 1 : 0,
    ];

    if ($data['nombre'] === '') {
        $errors[] = 'El nombre del proyecto es obligatorio.';
    }
    if ($data['lat'] < -90 || $data['lat'] > 90) {
        $errors[] = 'La latitud debe estar entre -90 y 90.';
    }
    if ($data['lng'] < -180 || $data['lng'] > 180) {
        $errors[] = 'La longitud debe estar entre -180 y 180.';
    }

    if (!$errors) {
        $params = [
            $data['nombre'],
            $data['estado'],
            $data['etapa'],
            $data['sector'] ?: null,
            $data['monto'] ?: null,
            $data['financiamiento'] ?: null,
            $data['inicio'] ?: null,
            $data['entrega'] ?: null,
            $data['foto'] ?: null,
            $data['descripcion'] ?: null,
            $data['avance'],
            $data['lat'],
            $data['lng'],
            $data['visible'],
        ];

        if ($id > 0) {
            $params[] = $id;
            $stmt = db()->prepare('UPDATE map_projects SET nombre=?, estado=?, etapa=?, sector=?, monto=?, financiamiento=?, inicio=?, entrega=?, foto=?, descripcion=?, avance=?, lat=?, lng=?, visible=? WHERE id=?');
            $stmt->execute($params);
            redirect('proyectos-mapa.php?id=' . $id . '&success=1');
        }

        $stmt = db()->prepare('INSERT INTO map_projects (nombre, estado, etapa, sector, monto, financiamiento, inicio, entrega, foto, descripcion, avance, lat, lng, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute($params);
        redirect('proyectos-mapa.php?id=' . (int) db()->lastInsertId() . '&success=1');
    }
}

$projects = db()->query('SELECT * FROM map_projects ORDER BY created_at DESC, id DESC')->fetchAll();
$formValues = [
    'nombre' => $_POST['nombre'] ?? $project['nombre'] ?? '',
    'estado' => $_POST['estado'] ?? $project['estado'] ?? 'En ejecución',
    'etapa' => $_POST['etapa'] ?? $project['etapa'] ?? 'Construcción',
    'sector' => $_POST['sector'] ?? $project['sector'] ?? '',
    'monto' => $_POST['monto'] ?? $project['monto'] ?? '',
    'financiamiento' => $_POST['financiamiento'] ?? $project['financiamiento'] ?? '',
    'inicio' => $_POST['inicio'] ?? normalize_date_for_input($project['inicio'] ?? null),
    'entrega' => $_POST['entrega'] ?? normalize_date_for_input($project['entrega'] ?? null),
    'foto' => $_POST['foto'] ?? $project['foto'] ?? '',
    'descripcion' => $_POST['descripcion'] ?? $project['descripcion'] ?? '',
    'avance' => $_POST['avance'] ?? $project['avance'] ?? 0,
    'lat' => $_POST['lat'] ?? $project['lat'] ?? '-20.2595',
    'lng' => $_POST['lng'] ?? $project['lng'] ?? '-69.7863',
    'visible' => (int) ($_POST['visible'] ?? $project['visible'] ?? 1),
];
?>
<?php include('partials/html.php'); ?>
<head>
    <?php $title = 'Proyectos del mapa'; include('partials/title-meta.php'); ?>
    <link href="assets/plugins/leaflet/leaflet.css" rel="stylesheet" type="text/css">
    <?php include('partials/head-css.php'); ?>
    <style>
        .project-form-shell{display:grid;grid-template-columns:minmax(0,1fr) 350px;gap:24px;align-items:start}.project-form-card{border:1px solid #e6edf7;border-radius:14px;box-shadow:0 14px 35px rgba(31,54,86,.06)}.project-form-card .card-body{padding:18px}.project-section{border:1px solid #e6edf7;border-radius:14px;background:#fff;margin-bottom:14px;padding:16px}.project-section-title{align-items:center;color:#3f4756;display:flex;font-size:15px;font-weight:700;gap:8px;margin-bottom:14px}.project-label{color:#8190a7;font-size:10px;font-weight:800;letter-spacing:.1em;margin-bottom:6px;text-transform:uppercase}.project-help{color:#8190a7;font-size:11px;margin-top:6px}.project-upload{align-items:center;background:#f8fbff;border:1px dashed #a9c8f5;border-radius:12px;color:#66758c;cursor:pointer;display:flex;flex-direction:column;gap:7px;justify-content:center;min-height:126px;padding:18px;text-align:center;transition:.18s}.project-upload:hover{background:#f2f7ff;border-color:#6fa5f7}.project-upload i{color:#7d91af}.project-upload strong{font-size:12px;letter-spacing:.08em;text-transform:uppercase}.project-upload span{color:#8190a7;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase}.project-upload input{display:none}.preview-card{background:#fff;border:1px solid #edf1f7;border-radius:14px;box-shadow:0 20px 50px rgba(31,54,86,.08);padding:12px;position:sticky;top:90px}.preview-header{display:flex;justify-content:space-between;color:#66758c;font-size:12px;font-weight:700;margin:4px 0 14px}.preview-image{align-items:center;background:#f6f9fd;border:1px solid #dae4f1;border-radius:10px;display:flex;height:172px;justify-content:center;margin-bottom:12px;overflow:hidden}.preview-image img{height:100%;object-fit:cover;width:100%}.preview-title{color:#344054;font-size:15px;font-weight:800;margin-bottom:8px}.preview-pill{background:#dff7e8;border-radius:6px;color:#1b8d4b;font-size:10px;font-weight:800;padding:4px 8px}.preview-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:8px}.preview-box{background:#f8fbff;border:1px solid #dfe8f4;border-radius:8px;color:#526174;font-size:12px;min-height:44px;padding:8px}.preview-box.full{grid-column:1/-1}.preview-box small{color:#8190a7;display:block;font-size:10px;margin-bottom:2px}.preview-progress{background:#e8eef7;border-radius:999px;height:7px;margin-top:7px;overflow:hidden}.preview-progress span{background:linear-gradient(90deg,#58d9c7,#2d80ff);display:block;height:100%}#locationPicker{height:330px;border-radius:12px}.project-thumb{width:64px;height:48px;object-fit:cover;border-radius:8px;background:#f1f3f7}@media(max-width:1200px){.project-form-shell{grid-template-columns:1fr}.preview-card{position:static}}
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include('partials/menu.php'); ?>
        <div class="content-page">
            <div class="container-fluid">
                <?php $subtitle = 'Mapa comunal'; $title = 'Registrar proyectos'; include('partials/page-title.php'); ?>

                <?php if ($success === '1') : ?>
                    <div class="alert alert-success">Proyecto guardado correctamente.</div>
                <?php endif; ?>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger"><?php echo e($error); ?></div>
                <?php endforeach; ?>

                <form method="post" enctype="multipart/form-data" class="project-form-shell">
                    <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="foto_actual" id="foto_actual" value="<?php echo e($formValues['foto']); ?>">

                    <div class="project-form-card card">
                        <div class="card-body">
                            <section class="project-section">
                                <label class="project-upload" for="foto_archivo">
                                    <i data-lucide="cloud-upload" class="fs-28"></i>
                                    <strong>Seleccionar imagen del proyecto</strong>
                                    <span>JPG, PNG o WEBP. Se mostrará en la tarjeta y en el mapa.</span>
                                    <input type="file" id="foto_archivo" name="foto_archivo" accept="image/jpeg,image/png,image/webp">
                                </label>
                                <div class="mt-3">
                                    <label class="project-label" for="foto">URL de fotografía alternativa</label>
                                    <input type="url" id="foto" name="foto" class="form-control" placeholder="https://..." value="<?php echo e($formValues['foto']); ?>">
                                    <div class="project-help">Puedes usar carga local o URL pública. Si cargas archivo, tendrá prioridad en la previsualización.</div>
                                </div>
                            </section>

                            <section class="project-section">
                                <div class="project-section-title"><i data-lucide="clipboard-list"></i> Información principal</div>
                                <div class="mb-3">
                                    <label class="project-label" for="nombre">Nombre proyecto</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control preview-source" data-preview="name" placeholder="Ej: Construcción Base SAMU Pozo Almonte" value="<?php echo e($formValues['nombre']); ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="project-label" for="estado">Estado</label>
                                        <select id="estado" name="estado" class="form-select preview-source" data-preview="status">
                                            <?php foreach (['En ejecución', 'Finalizado', 'Planificación', 'Licitación', 'Pausado'] as $option) : ?>
                                                <option value="<?php echo e($option); ?>" <?php echo selected_option((string) $formValues['estado'], $option); ?>><?php echo e($option); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="project-label" for="etapa">Etapa</label>
                                        <select id="etapa" name="etapa" class="form-select preview-source" data-preview="stage">
                                            <?php foreach (['Diseño', 'Licitación', 'Construcción', 'Recepción', 'Operación', 'Convenio'] as $option) : ?>
                                                <option value="<?php echo e($option); ?>" <?php echo selected_option((string) $formValues['etapa'], $option); ?>><?php echo e($option); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="project-label" for="avance">Avance %</label>
                                        <input type="number" min="0" max="100" id="avance" name="avance" class="form-control preview-source" data-preview="progress" value="<?php echo e((string) $formValues['avance']); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="sector">Sector / ubicación</label>
                                        <input type="text" id="sector" name="sector" class="form-control preview-source" data-preview="sector" placeholder="Ej: Pozo Almonte urbano" value="<?php echo e($formValues['sector']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label">Visible</label>
                                        <div class="form-check form-switch pt-2">
                                            <input class="form-check-input" type="checkbox" name="visible" id="visible" <?php echo $formValues['visible'] === 1 ? 'checked' : ''; ?>>
                                            <label for="visible" class="form-check-label">Mostrar en el mapa público</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="project-label" for="descripcion">Descripción del proyecto</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control preview-source" data-preview="description" rows="4" placeholder="Describe brevemente el objetivo, alcance e impacto del proyecto."><?php echo e($formValues['descripcion']); ?></textarea>
                                </div>
                            </section>

                            <section class="project-section">
                                <div class="project-section-title"><i data-lucide="circle-dollar-sign"></i> Financiamiento y fechas</div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="monto">Monto del financiamiento</label>
                                        <input type="text" id="monto" name="monto" class="form-control preview-source" data-preview="amount" placeholder="$389.321.000" value="<?php echo e($formValues['monto']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="financiamiento">Financiamiento</label>
                                        <input type="text" id="financiamiento" name="financiamiento" class="form-control preview-source" data-preview="funding" placeholder="PMU SUBDERE, FNDR, Convenio, Municipal, etc." value="<?php echo e($formValues['financiamiento']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="inicio">Fecha de inicio</label>
                                        <input type="date" id="inicio" name="inicio" class="form-control" value="<?php echo e($formValues['inicio']); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="entrega">Fecha estimada de entrega</label>
                                        <input type="date" id="entrega" name="entrega" class="form-control preview-source" data-preview="delivery" value="<?php echo e($formValues['entrega']); ?>">
                                    </div>
                                </div>
                            </section>

                            <section class="project-section">
                                <div class="project-section-title"><i data-lucide="map-pin"></i> Ubicación en el mapa</div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="lat">Latitud</label>
                                        <input id="lat" name="lat" class="form-control" value="<?php echo e((string) $formValues['lat']); ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="project-label" for="lng">Longitud</label>
                                        <input id="lng" name="lng" class="form-control" value="<?php echo e((string) $formValues['lng']); ?>" required>
                                    </div>
                                </div>
                                <div id="locationPicker" class="mb-3"></div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary">Guardar proyecto</button>
                                    <a class="btn btn-outline-secondary" href="mapa-proyectos.php">Ver mapa</a>
                                    <a class="btn btn-light" href="proyectos-mapa.php">Nuevo</a>
                                </div>
                            </section>
                        </div>
                    </div>

                    <aside class="preview-card">
                        <div class="preview-header"><span>Previsualización</span><span>Tarjeta del mapa</span></div>
                        <div class="preview-image"><img id="previewImage" src="<?php echo e($formValues['foto'] ?: 'assets/images/logo.png'); ?>" alt="Previsualización del proyecto"></div>
                        <div class="d-flex justify-content-between gap-2 align-items-start">
                            <div class="preview-title" id="previewName"><?php echo e($formValues['nombre'] ?: 'Nombre del proyecto'); ?></div>
                            <span class="preview-pill" id="previewStatus"><?php echo e($formValues['estado']); ?></span>
                        </div>
                        <div class="preview-grid">
                            <div class="preview-box"><small>Monto financiamiento</small><strong id="previewAmount"><?php echo e($formValues['monto'] ?: '$0'); ?></strong></div>
                            <div class="preview-box"><small>Fecha entrega</small><strong id="previewDelivery"><?php echo e($formValues['entrega'] ?: 'Sin fecha'); ?></strong></div>
                            <div class="preview-box full"><small>Financiamiento</small><strong id="previewFunding"><?php echo e($formValues['financiamiento'] ?: 'Sin financiamiento'); ?></strong></div>
                            <div class="preview-box"><small>Estado</small><strong id="previewStatusText"><?php echo e($formValues['estado']); ?></strong></div>
                            <div class="preview-box"><small>Avance</small><strong id="previewProgressText"><?php echo e((string) $formValues['avance']); ?>%</strong><div class="preview-progress"><span id="previewProgressBar" style="width: <?php echo (int) $formValues['avance']; ?>%"></span></div></div>
                            <div class="preview-box full"><small>Descripción</small><strong id="previewDescription"><?php echo e($formValues['descripcion'] ?: 'Descripción breve del proyecto.'); ?></strong></div>
                            <div class="preview-box full"><small>Sector / ubicación</small><strong id="previewSector"><?php echo e($formValues['sector'] ?: 'Sin sector definido'); ?></strong></div>
                        </div>
                    </aside>
                </form>

                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Proyectos registrados</h5>
                        <span class="badge text-bg-primary"><?php echo count($projects); ?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-striped">
                                <thead>
                                    <tr>
                                        <th>Proyecto</th>
                                        <th>Estado</th>
                                        <th>Ubicación</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!$projects) : ?>
                                        <tr><td colspan="4" class="text-center text-muted">No hay proyectos registrados.</td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($projects as $item) : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center">
                                                    <img class="project-thumb" src="<?php echo e($item['foto'] ?: 'assets/images/logo.png'); ?>" alt="">
                                                    <div>
                                                        <strong><?php echo e($item['nombre']); ?></strong>
                                                        <div class="text-muted small"><?php echo e($item['sector'] ?? '-'); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge text-bg-info"><?php echo e($item['estado']); ?></span></td>
                                            <td><?php echo e($item['lat'] . ', ' . $item['lng']); ?></td>
                                            <td class="text-end">
                                                <a class="btn btn-sm btn-soft-primary" href="proyectos-mapa.php?id=<?php echo (int) $item['id']; ?>">Editar</a>
                                                <form method="post" class="d-inline" data-confirm="¿Eliminar proyecto?">
                                                    <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>">
                                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('partials/footer.php'); ?>
        </div>
    </div>
    <?php include('partials/customizer.php'); ?>
    <?php include('partials/footer-scripts.php'); ?>
    <script src="assets/plugins/leaflet/leaflet.js"></script>
    <script>
        const latInput = document.getElementById('lat');
        const lngInput = document.getElementById('lng');
        const picker = L.map('locationPicker').setView([parseFloat(latInput.value) || -20.2595, parseFloat(lngInput.value) || -69.7863], 14);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19, attribution: '&copy; OpenStreetMap'}).addTo(picker);
        const marker = L.marker(picker.getCenter(), {draggable: true}).addTo(picker);

        function setCoords(latlng) {
            latInput.value = latlng.lat.toFixed(7);
            lngInput.value = latlng.lng.toFixed(7);
            marker.setLatLng(latlng);
        }

        picker.on('click', event => setCoords(event.latlng));
        marker.on('dragend', event => setCoords(event.target.getLatLng()));

        const previewMap = {
            name: ['previewName', 'Nombre del proyecto'],
            status: ['previewStatus', 'En ejecución'],
            stage: [null, 'Construcción'],
            amount: ['previewAmount', '$0'],
            funding: ['previewFunding', 'Sin financiamiento'],
            delivery: ['previewDelivery', 'Sin fecha'],
            description: ['previewDescription', 'Descripción breve del proyecto.'],
            sector: ['previewSector', 'Sin sector definido'],
        };

        function refreshPreview(event) {
            const source = event.target;
            const target = previewMap[source.dataset.preview];
            if (!target || !target[0]) {
                return;
            }
            const value = source.value.trim() || target[1];
            document.getElementById(target[0]).textContent = value;
            if (source.dataset.preview === 'status') {
                document.getElementById('previewStatusText').textContent = value;
            }
            if (source.dataset.preview === 'progress') {
                const progress = Math.max(0, Math.min(100, parseInt(value || '0', 10)));
                document.getElementById('previewProgressText').textContent = progress + '%';
                document.getElementById('previewProgressBar').style.width = progress + '%';
            }
        }

        document.querySelectorAll('.preview-source').forEach(input => input.addEventListener('input', refreshPreview));

        document.getElementById('foto').addEventListener('input', event => {
            document.getElementById('previewImage').src = event.target.value || document.getElementById('foto_actual').value || 'assets/images/logo.png';
        });

        document.getElementById('foto_archivo').addEventListener('change', event => {
            const file = event.target.files && event.target.files[0];
            if (!file) {
                return;
            }
            document.getElementById('previewImage').src = URL.createObjectURL(file);
        });
    </script>
</body>
</html>
