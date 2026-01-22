<?php
require __DIR__ . '/app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($_POST['action'] === 'disable' && $id > 0) {
        $stmt = db()->prepare('UPDATE roles SET estado = 0 WHERE id = ?');
        $stmt->execute([$id]);
    }

    redirect('roles-lista.php');
}

$roles = db()->query('SELECT id, nombre, descripcion, estado FROM roles ORDER BY nombre')->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar roles"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Listar roles"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <input type="text" class="form-control w-auto" placeholder="Buscar rol">
                                    <a href="roles-editar.php" class="btn btn-primary">Crear rol</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Rol</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($roles)) : ?>
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">No hay roles registrados.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($roles as $rol) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($rol['descripcion'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ((int) $rol['estado'] === 1) : ?>
                                                                <span class="badge text-bg-success">Activo</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-secondary">Inactivo</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-end">
                                                            <a href="roles-editar.php?id=<?php echo (int) $rol['id']; ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                            <form method="post" class="d-inline">
                                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                <input type="hidden" name="action" value="disable">
                                                                <input type="hidden" name="id" value="<?php echo (int) $rol['id']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" <?php echo (int) $rol['estado'] === 0 ? 'disabled' : ''; ?>>Deshabilitar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
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
