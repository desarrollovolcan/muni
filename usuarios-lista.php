<?php
require __DIR__ . '/app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($_POST['action'] === 'disable' && $id > 0) {
        $stmt = db()->prepare('UPDATE users SET estado = 0 WHERE id = ?');
        $stmt->execute([$id]);
    }

    redirect('usuarios-lista.php');
}

$stmt = db()->query('SELECT id, rut, nombre, apellido, correo, rol, estado, ultimo_acceso FROM users ORDER BY id DESC');
$usuarios = $stmt->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar usuarios"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Listar usuarios"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="text" class="form-control" placeholder="Buscar por nombre o RUT">
                                        <select class="form-select">
                                            <option value="">Estado</option>
                                            <option>Habilitado</option>
                                            <option>Deshabilitado</option>
                                        </select>
                                        <select class="form-select">
                                            <option value="">Rol</option>
                                            <option>SuperAdmin</option>
                                            <option>Admin</option>
                                            <option>Consulta</option>
                                        </select>
                                    </div>
                                    <a href="usuarios-crear.php" class="btn btn-primary">Crear usuario</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>RUT</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Estado</th>
                                                <th>Último acceso</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($usuarios)) : ?>
                                                <tr>
                                                    <td colspan="7" class="text-center text-muted">No hay usuarios registrados.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($usuarios as $usuario) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($usuario['rut'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($usuario['rol'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ((int) $usuario['estado'] === 1) : ?>
                                                                <span class="badge text-bg-success">Habilitado</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-secondary">Deshabilitado</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo $usuario['ultimo_acceso'] ? htmlspecialchars($usuario['ultimo_acceso'], ENT_QUOTES, 'UTF-8') : '-'; ?></td>
                                                        <td class="text-end">
                                                            <a href="usuarios-detalle.php?id=<?php echo (int) $usuario['id']; ?>" class="btn btn-sm btn-outline-primary">Ver</a>
                                                            <a href="usuarios-editar.php?id=<?php echo (int) $usuario['id']; ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                            <form method="post" class="d-inline">
                                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                <input type="hidden" name="action" value="disable">
                                                                <input type="hidden" name="id" value="<?php echo (int) $usuario['id']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" <?php echo (int) $usuario['estado'] === 0 ? 'disabled' : ''; ?>>Deshabilitar</button>
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
