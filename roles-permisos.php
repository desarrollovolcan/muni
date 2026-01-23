<?php
require __DIR__ . '/app/bootstrap.php';

$modules = [
    ['key' => 'usuarios', 'label' => 'Usuarios', 'permisos' => ['view', 'create', 'edit', 'delete']],
    ['key' => 'roles', 'label' => 'Roles', 'permisos' => ['view', 'create', 'edit', 'delete']],
    ['key' => 'eventos', 'label' => 'Eventos', 'permisos' => ['view', 'create', 'edit', 'delete', 'publish']],
    ['key' => 'autoridades', 'label' => 'Autoridades', 'permisos' => ['view', 'create', 'edit', 'delete']],
    ['key' => 'adjuntos', 'label' => 'Adjuntos', 'permisos' => ['view', 'create', 'delete']],
    ['key' => 'reportes', 'label' => 'Reportes', 'permisos' => ['view', 'export']],
];

$permisosDisponibles = [
    'view' => 'Ver',
    'create' => 'Crear',
    'edit' => 'Editar',
    'delete' => 'Eliminar',
    'publish' => 'Publicar',
    'export' => 'Exportar',
];

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS role_permissions (
            role_id INT NOT NULL,
            module VARCHAR(100) NOT NULL,
            permission VARCHAR(60) NOT NULL,
            allowed TINYINT(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (role_id, module, permission)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

$roles = db()->query('SELECT id, nombre FROM roles ORDER BY nombre')->fetchAll();
$selectedRoleId = isset($_GET['rol_id']) ? (int) $_GET['rol_id'] : 0;

if ($selectedRoleId === 0 && !empty($roles)) {
    $selectedRoleId = (int) $roles[0]['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $selectedRoleId = isset($_POST['role_id']) ? (int) $_POST['role_id'] : 0;
    $permisosSeleccionados = $_POST['permisos'] ?? [];

    if ($selectedRoleId > 0) {
        $stmtDelete = db()->prepare('DELETE FROM role_permissions WHERE role_id = ?');
        $stmtDelete->execute([$selectedRoleId]);

        if (!empty($permisosSeleccionados)) {
            $stmtInsert = db()->prepare('INSERT INTO role_permissions (role_id, module, permission, allowed) VALUES (?, ?, ?, 1)');
            foreach ($modules as $module) {
                $moduleKey = $module['key'];
                if (!isset($permisosSeleccionados[$moduleKey]) || !is_array($permisosSeleccionados[$moduleKey])) {
                    continue;
                }
                foreach ($permisosSeleccionados[$moduleKey] as $permisoKey => $valor) {
                    if ($valor !== '1') {
                        continue;
                    }
                    $stmtInsert->execute([$selectedRoleId, $moduleKey, $permisoKey]);
                }
            }
        }
    }

    redirect('roles-permisos.php?rol_id=' . $selectedRoleId . '&updated=1');
}

$permisosRol = [];
if ($selectedRoleId > 0) {
    $stmtPerms = db()->prepare('SELECT module, permission FROM role_permissions WHERE role_id = ? AND allowed = 1');
    $stmtPerms->execute([$selectedRoleId]);
    foreach ($stmtPerms->fetchAll() as $permiso) {
        $permisosRol[$permiso['module']][$permiso['permission']] = true;
    }
}

$updated = isset($_GET['updated']) && $_GET['updated'] === '1';
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Matriz de permisos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Matriz de permisos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if ($updated) : ?>
                                    <div class="alert alert-success">Los permisos se actualizaron correctamente.</div>
                                <?php endif; ?>
                                <?php if (empty($roles)) : ?>
                                    <div class="alert alert-warning">No hay roles creados. Debes crear un rol antes de asignar permisos.</div>
                                <?php else : ?>
                                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                        <form method="get" class="d-flex flex-wrap align-items-center gap-2">
                                            <label class="form-label mb-0" for="rol-permisos">Rol</label>
                                            <select class="form-select w-auto" id="rol-permisos" name="rol_id" onchange="this.form.submit()">
                                                <?php foreach ($roles as $rol) : ?>
                                                    <?php $selected = $selectedRoleId === (int) $rol['id'] ? 'selected' : ''; ?>
                                                    <option value="<?php echo (int) $rol['id']; ?>" <?php echo $selected; ?>>
                                                        <?php echo htmlspecialchars($rol['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <noscript>
                                                <button class="btn btn-outline-secondary" type="submit">Cargar rol</button>
                                            </noscript>
                                        </form>
                                        <button class="btn btn-primary" type="submit" form="permisos-form">Guardar cambios</button>
                                    </div>
                                    <form id="permisos-form" method="post">
                                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                        <input type="hidden" name="role_id" value="<?php echo (int) $selectedRoleId; ?>">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-centered mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Módulo</th>
                                                        <?php foreach ($permisosDisponibles as $permisoLabel) : ?>
                                                            <th><?php echo htmlspecialchars($permisoLabel, ENT_QUOTES, 'UTF-8'); ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($modules as $module) : ?>
                                                        <?php $moduleKey = $module['key']; ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($module['label'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <?php foreach ($permisosDisponibles as $permisoKey => $permisoLabel) : ?>
                                                                <?php if (in_array($permisoKey, $module['permisos'], true)) : ?>
                                                                    <?php $checked = !empty($permisosRol[$moduleKey][$permisoKey]); ?>
                                                                    <td>
                                                                        <input type="checkbox" class="form-check-input" name="permisos[<?php echo htmlspecialchars($moduleKey, ENT_QUOTES, 'UTF-8'); ?>][<?php echo htmlspecialchars($permisoKey, ENT_QUOTES, 'UTF-8'); ?>]" value="1" <?php echo $checked ? 'checked' : ''; ?>>
                                                                    </td>
                                                                <?php else : ?>
                                                                    <td class="text-muted">-</td>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
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
