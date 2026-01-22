<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$usuario = null;
$errors = [];
$roles = db()->query('SELECT id, nombre FROM roles WHERE estado = 1 ORDER BY nombre')->fetchAll();
$rolesUsuario = [];

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();

    $stmtRoles = db()->prepare('SELECT role_id FROM user_roles WHERE user_id = ?');
    $stmtRoles->execute([$id]);
    $rolesUsuario = array_map('intval', $stmtRoles->fetchAll(PDO::FETCH_COLUMN));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null) && $id > 0) {
    $rut = trim($_POST['rut'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $estado = isset($_POST['estado']) && $_POST['estado'] === '0' ? 0 : 1;
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';
    $rolesSeleccionados = array_map('intval', $_POST['roles'] ?? []);

    if ($rut === '' || $nombre === '' || $apellido === '' || $correo === '' || $telefono === '' || $username === '') {
        $errors[] = 'Completa todos los campos obligatorios.';
    }

    if ($password !== '' && $password !== $passwordConfirm) {
        $errors[] = 'Las contraseñas no coinciden.';
    }

    if (empty($errors)) {
        $rolNombre = '';
        if (!empty($rolesSeleccionados)) {
            $rolNombreStmt = db()->prepare('SELECT nombre FROM roles WHERE id = ?');
            $rolNombreStmt->execute([$rolesSeleccionados[0]]);
            $rolNombre = (string) ($rolNombreStmt->fetchColumn() ?: '');
        }

        $params = [$rut, $nombre, $apellido, $correo, $telefono, $direccion !== '' ? $direccion : null, $username, $rolNombre, $estado, $id];
        $sql = 'UPDATE users SET rut = ?, nombre = ?, apellido = ?, correo = ?, telefono = ?, direccion = ?, username = ?, rol = ?, estado = ?';

        if ($password !== '') {
            $sql .= ', password_hash = ?';
            $params = [$rut, $nombre, $apellido, $correo, $telefono, $direccion !== '' ? $direccion : null, $username, $rolNombre, $estado, password_hash($password, PASSWORD_BCRYPT), $id];
        }

        $sql .= ' WHERE id = ?';
        $stmtUpdate = db()->prepare($sql);
        $stmtUpdate->execute($params);

        $stmtDelete = db()->prepare('DELETE FROM user_roles WHERE user_id = ?');
        $stmtDelete->execute([$id]);
        if (!empty($rolesSeleccionados)) {
            $insertRole = db()->prepare('INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)');
            foreach ($rolesSeleccionados as $roleId) {
                $insertRole->execute([$id, $roleId]);
            }
        }

        redirect('usuarios-lista.php');
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Editar usuario"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Editar usuario"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if (!$usuario) : ?>
                                    <div class="alert alert-warning">Usuario no encontrado.</div>
                                <?php else : ?>
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
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-rut">RUT</label>
                                            <input type="text" id="usuario-edit-rut" name="rut" class="form-control" value="<?php echo htmlspecialchars($usuario['rut'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-nombre">Nombres</label>
                                            <input type="text" id="usuario-edit-nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($usuario['nombre'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-apellido">Apellidos</label>
                                            <input type="text" id="usuario-edit-apellido" name="apellido" class="form-control" value="<?php echo htmlspecialchars($usuario['apellido'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-edit-correo">Correo</label>
                                            <input type="email" id="usuario-edit-correo" name="correo" class="form-control" value="<?php echo htmlspecialchars($usuario['correo'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-edit-telefono">Teléfono</label>
                                            <input type="tel" id="usuario-edit-telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($usuario['telefono'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-edit-estado">Estado</label>
                                            <select id="usuario-edit-estado" name="estado" class="form-select">
                                                <option value="1" <?php echo (int) $usuario['estado'] === 1 ? 'selected' : ''; ?>>Habilitado</option>
                                                <option value="0" <?php echo (int) $usuario['estado'] === 0 ? 'selected' : ''; ?>>Deshabilitado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="usuario-edit-direccion">Dirección</label>
                                            <input type="text" id="usuario-edit-direccion" name="direccion" class="form-control" value="<?php echo htmlspecialchars($usuario['direccion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-username">Username</label>
                                            <input type="text" id="usuario-edit-username" name="username" class="form-control" value="<?php echo htmlspecialchars($usuario['username'], ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-edit-password">Nueva contraseña</label>
                                            <input type="password" id="usuario-edit-password" name="password" class="form-control" placeholder="********">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-edit-password-confirm">Confirmar contraseña</label>
                                            <input type="password" id="usuario-edit-password-confirm" name="password_confirm" class="form-control" placeholder="********">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roles asignados</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <?php if (empty($roles)) : ?>
                                                <span class="text-muted">No hay roles disponibles.</span>
                                            <?php else : ?>
                                                <?php foreach ($roles as $rol) : ?>
                                                    <?php $checked = in_array((int) $rol['id'], $rolesUsuario, true); ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="rol-edit-<?php echo (int) $rol['id']; ?>" name="roles[]" value="<?php echo (int) $rol['id']; ?>" <?php echo $checked ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="rol-edit-<?php echo (int) $rol['id']; ?>"><?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                                        <a href="usuarios-lista.php" class="btn btn-outline-secondary">Volver</a>
                                    </div>
                                    </form>
                                <?php endif; ?>
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
