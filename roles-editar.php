<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$rol = null;
$errors = [];

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM roles WHERE id = ?');
    $stmt->execute([$id]);
    $rol = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $estado = isset($_POST['estado']) && $_POST['estado'] === '0' ? 0 : 1;

    if ($nombre === '') {
        $errors[] = 'El nombre del rol es obligatorio.';
    }

    if (empty($errors)) {
        if ($id > 0) {
            $stmt = db()->prepare('UPDATE roles SET nombre = ?, descripcion = ?, estado = ? WHERE id = ?');
            $stmt->execute([$nombre, $descripcion !== '' ? $descripcion : null, $estado, $id]);
        } else {
            $stmt = db()->prepare('INSERT INTO roles (nombre, descripcion, estado) VALUES (?, ?, ?)');
            $stmt->execute([$nombre, $descripcion !== '' ? $descripcion : null, $estado]);
        }

        redirect('roles-lista.php');
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar rol"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Crear/editar rol"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="rol-nombre">Nombre del rol</label>
                                            <input type="text" id="rol-nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($rol['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="rol-estado">Estado</label>
                                            <select id="rol-estado" name="estado" class="form-select">
                                                <option value="1" <?php echo !$rol || (int) ($rol['estado'] ?? 1) === 1 ? 'selected' : ''; ?>>Activo</option>
                                                <option value="0" <?php echo $rol && (int) $rol['estado'] === 0 ? 'selected' : ''; ?>>Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="rol-descripcion">Descripción</label>
                                            <textarea id="rol-descripcion" name="descripcion" class="form-control" rows="3"><?php echo htmlspecialchars($rol['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar rol</button>
                                        <a href="roles-permisos.php" class="btn btn-outline-secondary">Configurar permisos</a>
                                        <a href="roles-lista.php" class="btn btn-link">Volver al listado</a>
                                    </div>
                                </form>
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
