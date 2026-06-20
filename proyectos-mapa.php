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
    $data = [
        'nombre' => trim($_POST['nombre'] ?? ''),
        'estado' => trim($_POST['estado'] ?? 'Planificación'),
        'etapa' => trim($_POST['etapa'] ?? 'Diseño'),
        'sector' => trim($_POST['sector'] ?? ''),
        'monto' => trim($_POST['monto'] ?? ''),
        'financiamiento' => trim($_POST['financiamiento'] ?? ''),
        'entrega' => trim($_POST['entrega'] ?? ''),
        'foto' => trim($_POST['foto'] ?? ''),
        'descripcion' => trim($_POST['descripcion'] ?? ''),
        'avance' => max(0, min(100, (int) ($_POST['avance'] ?? 0))),
        'lat' => (float) ($_POST['lat'] ?? 0),
        'lng' => (float) ($_POST['lng'] ?? 0),
        'visible' => isset($_POST['visible']) ? 1 : 0,
    ];

    if ($data['nombre'] === '') $errors[] = 'El nombre del proyecto es obligatorio.';
    if ($data['lat'] < -90 || $data['lat'] > 90) $errors[] = 'La latitud debe estar entre -90 y 90.';
    if ($data['lng'] < -180 || $data['lng'] > 180) $errors[] = 'La longitud debe estar entre -180 y 180.';

    if (!$errors) {
        $params = [$data['nombre'], $data['estado'], $data['etapa'], $data['sector'] ?: null, $data['monto'] ?: null, $data['financiamiento'] ?: null, $data['entrega'] ?: null, $data['foto'] ?: null, $data['descripcion'] ?: null, $data['avance'], $data['lat'], $data['lng'], $data['visible']];
        if ($id > 0) {
            $params[] = $id;
            $stmt = db()->prepare('UPDATE map_projects SET nombre=?, estado=?, etapa=?, sector=?, monto=?, financiamiento=?, entrega=?, foto=?, descripcion=?, avance=?, lat=?, lng=?, visible=? WHERE id=?');
            $stmt->execute($params);
            redirect('proyectos-mapa.php?id=' . $id . '&success=1');
        }
        $stmt = db()->prepare('INSERT INTO map_projects (nombre, estado, etapa, sector, monto, financiamiento, entrega, foto, descripcion, avance, lat, lng, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute($params);
        redirect('proyectos-mapa.php?id=' . (int) db()->lastInsertId() . '&success=1');
    }
}

$projects = db()->query('SELECT * FROM map_projects ORDER BY created_at DESC, id DESC')->fetchAll();
?>
<?php include('partials/html.php'); ?>
<head>
    <?php $title = 'Proyectos del mapa'; include('partials/title-meta.php'); ?>
    <link href="assets/plugins/leaflet/leaflet.css" rel="stylesheet" type="text/css">
    <?php include('partials/head-css.php'); ?>
    <style>#locationPicker{height:360px;border-radius:12px}.project-thumb{width:64px;height:48px;object-fit:cover;border-radius:8px;background:#f1f3f7}</style>
</head>
<body><div class="wrapper"><?php include('partials/menu.php'); ?><div class="content-page"><div class="container-fluid">
<?php $subtitle='Mapa comunal'; $title='Registrar proyectos'; include('partials/page-title.php'); ?>
<div class="row"><div class="col-xl-5"><div class="card"><div class="card-header"><h5 class="card-title mb-0"><?php echo $id > 0 ? 'Editar proyecto' : 'Nuevo proyecto'; ?></h5></div><div class="card-body">
<?php if ($success === '1') : ?><div class="alert alert-success">Proyecto guardado correctamente.</div><?php endif; ?>
<?php foreach ($errors as $error) : ?><div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endforeach; ?>
<form method="post"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
<div class="mb-3"><label class="form-label">Nombre</label><input name="nombre" class="form-control" value="<?php echo htmlspecialchars($_POST['nombre'] ?? $project['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required></div>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label">Estado</label><select name="estado" class="form-select"><?php foreach (['En ejecución','Finalizado','Planificación','Licitación','Pausado'] as $option) : ?><option <?php echo (($_POST['estado'] ?? $project['estado'] ?? '') === $option) ? 'selected' : ''; ?>><?php echo $option; ?></option><?php endforeach; ?></select></div><div class="col-md-6 mb-3"><label class="form-label">Etapa</label><select name="etapa" class="form-select"><?php foreach (['Diseño','Licitación','Construcción','Recepción','Operación','Convenio'] as $option) : ?><option <?php echo (($_POST['etapa'] ?? $project['etapa'] ?? '') === $option) ? 'selected' : ''; ?>><?php echo $option; ?></option><?php endforeach; ?></select></div></div>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label">Sector</label><input name="sector" class="form-control" value="<?php echo htmlspecialchars($_POST['sector'] ?? $project['sector'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div><div class="col-md-6 mb-3"><label class="form-label">Avance (%)</label><input type="number" min="0" max="100" name="avance" class="form-control" value="<?php echo htmlspecialchars((string) ($_POST['avance'] ?? $project['avance'] ?? 0), ENT_QUOTES, 'UTF-8'); ?>"></div></div>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label">Monto</label><input name="monto" class="form-control" value="<?php echo htmlspecialchars($_POST['monto'] ?? $project['monto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div><div class="col-md-6 mb-3"><label class="form-label">Entrega</label><input name="entrega" class="form-control" value="<?php echo htmlspecialchars($_POST['entrega'] ?? $project['entrega'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div></div>
<div class="mb-3"><label class="form-label">Financiamiento</label><input name="financiamiento" class="form-control" value="<?php echo htmlspecialchars($_POST['financiamiento'] ?? $project['financiamiento'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div>
<div class="mb-3"><label class="form-label">URL foto</label><input name="foto" class="form-control" value="<?php echo htmlspecialchars($_POST['foto'] ?? $project['foto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"></div>
<div class="mb-3"><label class="form-label">Descripción</label><textarea name="descripcion" class="form-control" rows="3"><?php echo htmlspecialchars($_POST['descripcion'] ?? $project['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea></div>
<div class="row"><div class="col-md-6 mb-3"><label class="form-label">Latitud</label><input id="lat" name="lat" class="form-control" value="<?php echo htmlspecialchars((string) ($_POST['lat'] ?? $project['lat'] ?? '-20.2595'), ENT_QUOTES, 'UTF-8'); ?>" required></div><div class="col-md-6 mb-3"><label class="form-label">Longitud</label><input id="lng" name="lng" class="form-control" value="<?php echo htmlspecialchars((string) ($_POST['lng'] ?? $project['lng'] ?? '-69.7863'), ENT_QUOTES, 'UTF-8'); ?>" required></div></div>
<div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" name="visible" id="visible" <?php echo (int) ($_POST['visible'] ?? $project['visible'] ?? 1) === 1 ? 'checked' : ''; ?>><label for="visible" class="form-check-label">Visible en mapa público</label></div>
<div id="locationPicker" class="mb-3"></div><div class="d-flex gap-2"><button class="btn btn-primary">Guardar</button><a class="btn btn-outline-secondary" href="mapa-proyectos.php">Ver mapa</a><a class="btn btn-light" href="proyectos-mapa.php">Nuevo</a></div></form></div></div></div>
<div class="col-xl-7"><div class="card"><div class="card-header d-flex justify-content-between"><h5 class="card-title mb-0">Proyectos registrados</h5><span class="badge text-bg-primary"><?php echo count($projects); ?></span></div><div class="card-body"><div class="table-responsive"><table class="table table-centered table-striped"><thead><tr><th>Proyecto</th><th>Estado</th><th>Ubicación</th><th class="text-end">Acciones</th></tr></thead><tbody><?php if (!$projects) : ?><tr><td colspan="4" class="text-center text-muted">No hay proyectos registrados.</td></tr><?php endif; ?><?php foreach ($projects as $item) : ?><tr><td><div class="d-flex gap-2 align-items-center"><img class="project-thumb" src="<?php echo htmlspecialchars($item['foto'] ?: 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt=""><div><strong><?php echo htmlspecialchars($item['nombre'], ENT_QUOTES, 'UTF-8'); ?></strong><div class="text-muted small"><?php echo htmlspecialchars($item['sector'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></div></div></div></td><td><span class="badge text-bg-info"><?php echo htmlspecialchars($item['estado'], ENT_QUOTES, 'UTF-8'); ?></span></td><td><?php echo htmlspecialchars($item['lat'] . ', ' . $item['lng'], ENT_QUOTES, 'UTF-8'); ?></td><td class="text-end"><a class="btn btn-sm btn-soft-primary" href="proyectos-mapa.php?id=<?php echo (int) $item['id']; ?>">Editar</a><form method="post" class="d-inline" data-confirm="¿Eliminar proyecto?"><input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>"><input type="hidden" name="action" value="delete"><input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>"><button class="btn btn-sm btn-outline-danger">Eliminar</button></form></td></tr><?php endforeach; ?></tbody></table></div></div></div></div></div>
</div><?php include('partials/footer.php'); ?></div></div><?php include('partials/customizer.php'); ?><?php include('partials/footer-scripts.php'); ?><script src="assets/plugins/leaflet/leaflet.js"></script><script>
const latInput=document.getElementById('lat'), lngInput=document.getElementById('lng');
const picker=L.map('locationPicker').setView([parseFloat(latInput.value)||-20.2595, parseFloat(lngInput.value)||-69.7863], 14);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{maxZoom:19,attribution:'&copy; OpenStreetMap'}).addTo(picker);
const marker=L.marker(picker.getCenter(),{draggable:true}).addTo(picker);
function setCoords(latlng){latInput.value=latlng.lat.toFixed(7);lngInput.value=latlng.lng.toFixed(7);marker.setLatLng(latlng);} picker.on('click',e=>setCoords(e.latlng)); marker.on('dragend',e=>setCoords(e.target.getLatLng()));
</script></body></html>
