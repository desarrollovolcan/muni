<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';

    if ($action === 'add_category') {
        $nombre = trim($_POST['categoria_nombre'] ?? '');
        $descripcion = trim($_POST['categoria_descripcion'] ?? '');
        $responsable = trim($_POST['categoria_responsable'] ?? '');

        if ($nombre === '') {
            $errors[] = 'El nombre de la categoría es obligatorio.';
        }

        if (empty($errors)) {
            $stmt = db()->prepare('SELECT id FROM document_categories WHERE nombre = ?');
            $stmt->execute([$nombre]);
            if ($stmt->fetchColumn()) {
                $errors[] = 'Ya existe una categoría con ese nombre.';
            } else {
                $stmt = db()->prepare('INSERT INTO document_categories (nombre, descripcion) VALUES (?, ?)');
                $descripcionFinal = $descripcion !== '' ? $descripcion : ($responsable !== '' ? 'Responsable: ' . $responsable : null);
                $stmt->execute([$nombre, $descripcionFinal]);
                redirect('dms-categorias.php?success=category');
            }
        }
    }

    if ($action === 'add_tag') {
        $nombre = trim($_POST['tag_nombre'] ?? '');

        if ($nombre === '') {
            $errors[] = 'El nombre de la etiqueta es obligatorio.';
        }

        if (empty($errors)) {
            $stmt = db()->prepare('SELECT id FROM document_tags WHERE nombre = ?');
            $stmt->execute([$nombre]);
            if ($stmt->fetchColumn()) {
                $errors[] = 'La etiqueta ya existe.';
            } else {
                $stmt = db()->prepare('INSERT INTO document_tags (nombre) VALUES (?)');
                $stmt->execute([$nombre]);
                redirect('dms-categorias.php?success=tag');
            }
        }
    }
}

$categorias = db()->query('SELECT id, nombre, descripcion, created_at FROM document_categories ORDER BY nombre')->fetchAll();
$etiquetas = db()->query('SELECT id, nombre FROM document_tags ORDER BY nombre')->fetchAll();
$responsables = [
    'Secretaría',
    'Asesoría jurídica',
    'SECPLAN',
    'DIDECO',
    'Administración',
];
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Categorías y etiquetas"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid">

                <?php $subtitle = "Gestión Documental"; $title = "Categorías y etiquetas"; include('partials/page-title.php'); ?>

                <?php if ($success === 'category') : ?>
                    <div class="alert alert-success">Categoría creada correctamente.</div>
                <?php elseif ($success === 'tag') : ?>
                    <div class="alert alert-success">Etiqueta creada correctamente.</div>
                <?php endif; ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Categorías documentales</h5>
                                    <p class="text-muted mb-0">Define jerarquías y responsables por tipo de documento.</p>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#form-categoria">Nueva categoría</button>
                            </div>
                            <div class="card-body">
                                <div class="collapse show" id="form-categoria">
                                    <form class="row g-3 mb-4" method="post">
                                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="action" value="add_category">
                                        <div class="col-md-6">
                                            <label class="form-label" for="categoria-nombre">Nombre</label>
                                            <input type="text" id="categoria-nombre" name="categoria_nombre" class="form-control" placeholder="Ej: Ordenanzas" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="categoria-responsable">Responsable</label>
                                            <select id="categoria-responsable" name="categoria_responsable" class="form-select">
                                                <option value="">Selecciona</option>
                                                <?php foreach ($responsables as $responsable) : ?>
                                                    <option value="<?php echo htmlspecialchars($responsable, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($responsable, ENT_QUOTES, 'UTF-8'); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="categoria-descripcion">Descripción</label>
                                            <input type="text" id="categoria-descripcion" name="categoria_descripcion" class="form-control" placeholder="Opcional (se completa con el responsable si lo seleccionas)">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary">Guardar categoría</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Creación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($categorias)) : ?>
                                                <tr>
                                                    <td colspan="3" class="text-muted text-center">Sin categorías registradas.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php foreach ($categorias as $categoria) : ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($categoria['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($categoria['descripcion'] ?? '—', ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($categoria['created_at'])), ENT_QUOTES, 'UTF-8'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Etiquetas y metadatos</h5>
                                    <p class="text-muted mb-0">Clasifica documentos con palabras clave y alertas.</p>
                                </div>
                                <button class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#form-etiqueta">Nueva etiqueta</button>
                            </div>
                            <div class="card-body">
                                <div class="collapse show" id="form-etiqueta">
                                    <form class="row g-3 mb-4" method="post">
                                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="action" value="add_tag">
                                        <div class="col-md-8">
                                            <label class="form-label" for="tag-nombre">Nombre</label>
                                            <input type="text" id="tag-nombre" name="tag_nombre" class="form-control" placeholder="Ej: Transparencia" required>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">
                                            <button class="btn btn-primary w-100">Guardar etiqueta</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <?php if (empty($etiquetas)) : ?>
                                        <span class="text-muted">Sin etiquetas registradas.</span>
                                    <?php endif; ?>
                                    <?php foreach ($etiquetas as $etiqueta) : ?>
                                        <span class="badge text-bg-light"><?php echo htmlspecialchars($etiqueta['nombre'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="alert alert-info mt-3 mb-0">
                                    <div class="fw-semibold">Tip</div>
                                    <div class="text-muted">Usa etiquetas para activar notificaciones automáticas y reducir digitación en los documentos.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container -->

            <?php include('partials/footer.php'); ?>

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('partials/customizer.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

</body>

</html>
