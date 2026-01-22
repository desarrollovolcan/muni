<?php
require __DIR__ . '/app/bootstrap.php';

$userId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$usuarios = db()->query('SELECT id, nombre, apellido FROM users ORDER BY nombre')->fetchAll();
$roles = db()->query('SELECT id, nombre FROM roles WHERE estado = 1 ORDER BY nombre')->fetchAll();
$rolesUsuario = [];

if ($userId > 0) {
    $stmtRoles = db()->prepare('SELECT role_id FROM user_roles WHERE user_id = ?');
    $stmtRoles->execute([$userId]);
    $rolesUsuario = array_map('intval', $stmtRoles->fetchAll(PDO::FETCH_COLUMN));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $userId = isset($_POST['user_id']) ? (int) $_POST['user_id'] : 0;
    $rolesSeleccionados = array_map('intval', $_POST['roles'] ?? []);

    if ($userId > 0) {
        $stmtDelete = db()->prepare('DELETE FROM user_roles WHERE user_id = ?');
        $stmtDelete->execute([$userId]);
        if (!empty($rolesSeleccionados)) {
            $insertRole = db()->prepare('INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)');
            foreach ($rolesSeleccionados as $roleId) {
                $insertRole->execute([$userId, $roleId]);
            }
        }
    }

    redirect('usuarios-detalle.php?id=' . $userId);
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Asignar roles"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Asignar roles"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="roles-usuario">Usuario</label>
                                            <select id="roles-usuario" name="user_id" class="form-select">
                                                <?php foreach ($usuarios as $usuario) : ?>
                                                    <?php $selected = $userId === (int) $usuario['id'] ? 'selected' : ''; ?>
                                                    <option value="<?php echo (int) $usuario['id']; ?>" <?php echo $selected; ?>>
                                                        <?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="roles-estado">Estado</label>
                                            <select id="roles-estado" class="form-select">
                                                <option>Habilitado</option>
                                                <option>Deshabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="form-label">Roles disponibles</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <?php if (empty($roles)) : ?>
                                                <span class="text-muted">No hay roles disponibles.</span>
                                            <?php else : ?>
                                                <?php foreach ($roles as $rol) : ?>
                                                    <?php $checked = in_array((int) $rol['id'], $rolesUsuario, true); ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="role-<?php echo (int) $rol['id']; ?>" name="roles[]" value="<?php echo (int) $rol['id']; ?>" <?php echo $checked ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="role-<?php echo (int) $rol['id']; ?>"><?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Guardar roles</button>
                                        <a href="usuarios-lista.php" class="btn btn-outline-secondary ms-2">Volver</a>
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
