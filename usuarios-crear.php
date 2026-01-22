<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$roles = db()->query('SELECT id, nombre FROM roles WHERE estado = 1 ORDER BY nombre')->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
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

    if ($rut === '' || $nombre === '' || $apellido === '' || $correo === '' || $telefono === '' || $username === '' || $password === '') {
        $errors[] = 'Completa todos los campos obligatorios.';
    }

    if ($password !== $passwordConfirm) {
        $errors[] = 'Las contraseñas no coinciden.';
    }

    if (empty($errors)) {
        $stmt = db()->prepare('INSERT INTO users (rut, nombre, apellido, correo, telefono, direccion, username, rol, password_hash, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $rolNombre = '';
        if (!empty($rolesSeleccionados)) {
            $rolNombre = db()->prepare('SELECT nombre FROM roles WHERE id = ?');
            $rolNombre->execute([$rolesSeleccionados[0]]);
            $rolNombre = (string) ($rolNombre->fetchColumn() ?: '');
        }
        $stmt->execute([
            $rut,
            $nombre,
            $apellido,
            $correo,
            $telefono,
            $direccion !== '' ? $direccion : null,
            $username,
            $rolNombre,
            password_hash($password, PASSWORD_BCRYPT),
            $estado,
        ]);

        $userId = (int) db()->lastInsertId();
        if ($userId > 0 && !empty($rolesSeleccionados)) {
            $insertRole = db()->prepare('INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)');
            foreach ($rolesSeleccionados as $roleId) {
                $insertRole->execute([$userId, $roleId]);
            }
        }

        redirect('usuarios-lista.php');
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear usuario"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Crear usuario"; include('partials/page-title.php'); ?>

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
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-rut">RUT</label>
                                            <input type="text" id="usuario-rut" name="rut" class="form-control" placeholder="12.345.678-9">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-nombre">Nombres</label>
                                            <input type="text" id="usuario-nombre" name="nombre" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-apellido">Apellidos</label>
                                            <input type="text" id="usuario-apellido" name="apellido" class="form-control" placeholder="Apellido">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-correo">Correo</label>
                                            <input type="email" id="usuario-correo" name="correo" class="form-control" placeholder="usuario@muni.cl">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-telefono">Teléfono</label>
                                            <input type="tel" id="usuario-telefono" name="telefono" class="form-control" placeholder="+56 9 1234 5678">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-estado">Estado</label>
                                            <select id="usuario-estado" name="estado" class="form-select">
                                                <option value="1">Habilitado</option>
                                                <option value="0">Deshabilitado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="usuario-direccion">Dirección (opcional)</label>
                                            <input type="text" id="usuario-direccion" name="direccion" class="form-control" placeholder="Dirección">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-username">Username</label>
                                            <input type="text" id="usuario-username" name="username" class="form-control" placeholder="usuario">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-password">Contraseña</label>
                                            <input type="password" id="usuario-password" name="password" class="form-control" placeholder="********">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-password-confirm">Confirmar contraseña</label>
                                            <input type="password" id="usuario-password-confirm" name="password_confirm" class="form-control" placeholder="********">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roles asignados</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <?php if (empty($roles)) : ?>
                                                <span class="text-muted">No hay roles disponibles.</span>
                                            <?php else : ?>
                                                <?php foreach ($roles as $rol) : ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="rol-<?php echo (int) $rol['id']; ?>" name="roles[]" value="<?php echo (int) $rol['id']; ?>">
                                                        <label class="form-check-label" for="rol-<?php echo (int) $rol['id']; ?>"><?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                                    <a href="usuarios-lista.php" class="btn btn-outline-secondary ms-2">Cancelar</a>
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
