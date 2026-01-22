<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';

$roles = db()->query('SELECT id, nombre FROM roles ORDER BY nombre')->fetchAll();
$unidades = db()->query('SELECT id, nombre FROM unidades ORDER BY nombre')->fetchAll();
$permisos = db()->query('SELECT id, modulo, accion, descripcion FROM permissions ORDER BY modulo, accion')->fetchAll();

$selectedRoleId = (int) ($_GET['role_id'] ?? ($roles[0]['id'] ?? 0));
$selectedUnidadId = (int) ($_GET['unidad_id'] ?? ($unidades[0]['id'] ?? 0));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $selectedRoleId = (int) ($_POST['role_id'] ?? 0);
    $selectedUnidadId = (int) ($_POST['unidad_id'] ?? 0);
    $seleccionados = $_POST['permissions'] ?? [];

    if ($selectedRoleId === 0 || $selectedUnidadId === 0) {
        $errors[] = 'Selecciona una unidad y un rol para guardar.';
    }

    if (empty($errors)) {
        $stmt = db()->prepare('DELETE FROM role_unit_permissions WHERE role_id = ? AND unidad_id = ?');
        $stmt->execute([$selectedRoleId, $selectedUnidadId]);

        $stmtInsert = db()->prepare('INSERT INTO role_unit_permissions (role_id, unidad_id, permission_id) VALUES (?, ?, ?)');
        foreach ($seleccionados as $permissionId) {
            $permissionId = (int) $permissionId;
            if ($permissionId > 0) {
                $stmtInsert->execute([$selectedRoleId, $selectedUnidadId, $permissionId]);
            }
        }

        redirect('permisos-unidades.php?success=1&role_id=' . $selectedRoleId . '&unidad_id=' . $selectedUnidadId);
    }
}

$asignados = [];
if ($selectedRoleId && $selectedUnidadId) {
    $stmt = db()->prepare('SELECT permission_id FROM role_unit_permissions WHERE role_id = ? AND unidad_id = ?');
    $stmt->execute([$selectedRoleId, $selectedUnidadId]);
    $asignados = $stmt->fetchAll(PDO::FETCH_COLUMN);
}

$permisosPorModulo = [];
foreach ($permisos as $permiso) {
    $permisosPorModulo[$permiso['modulo']][] = $permiso;
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Permisos por unidad"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Permisos por unidad"; include('partials/page-title.php'); ?>

                <?php if ($success === '1') : ?>
                    <div class="alert alert-success">Permisos actualizados correctamente.</div>
                <?php endif; ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Matriz por unidad</h5>
                                    <p class="text-muted mb-0">Define permisos específicos según la unidad municipal y el rol.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="row g-3 mb-4" method="get">
                                    <div class="col-md-4">
                                        <label class="form-label" for="unidad-select">Unidad</label>
                                        <select id="unidad-select" name="unidad_id" class="form-select">
                                            <?php foreach ($unidades as $unidad) : ?>
                                                <option value="<?php echo (int) $unidad['id']; ?>" <?php echo $selectedUnidadId === (int) $unidad['id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($unidad['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="rol-select">Rol</label>
                                        <select id="rol-select" name="role_id" class="form-select">
                                            <?php foreach ($roles as $rol) : ?>
                                                <option value="<?php echo (int) $rol['id']; ?>" <?php echo $selectedRoleId === (int) $rol['id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button class="btn btn-outline-secondary w-100">Cambiar vista</button>
                                    </div>
                                </form>

                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="role_id" value="<?php echo $selectedRoleId; ?>">
                                    <input type="hidden" name="unidad_id" value="<?php echo $selectedUnidadId; ?>">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-centered mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Módulo</th>
                                                    <th>Permisos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (empty($permisosPorModulo)) : ?>
                                                    <tr>
                                                        <td colspan="2" class="text-muted text-center">No hay permisos configurados.</td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php foreach ($permisosPorModulo as $modulo => $lista) : ?>
                                                    <tr>
                                                        <td class="fw-semibold text-capitalize"><?php echo htmlspecialchars($modulo, ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <div class="d-flex flex-wrap gap-3">
                                                                <?php foreach ($lista as $permiso) : ?>
                                                                    <?php $checked = in_array((string) $permiso['id'], $asignados, true) ? 'checked' : ''; ?>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="<?php echo (int) $permiso['id']; ?>" id="perm-<?php echo (int) $permiso['id']; ?>" <?php echo $checked; ?>>
                                                                        <label class="form-check-label" for="perm-<?php echo (int) $permiso['id']; ?>">
                                                                            <?php echo htmlspecialchars($permiso['accion'], ENT_QUOTES, 'UTF-8'); ?>
                                                                        </label>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary">Guardar cambios</button>
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
