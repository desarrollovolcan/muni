<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = false;
$groupName = '';

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS authority_groups (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            nombre VARCHAR(120) NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY authority_groups_nombre_unique (nombre)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? 'create';
    $groupName = trim($_POST['nombre'] ?? '');

    if ($action === 'delete') {
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        if ($id > 0) {
            $stmt = db()->prepare('DELETE FROM authority_groups WHERE id = ?');
            $stmt->execute([$id]);
            redirect('grupos-autoridades.php');
        }
    } else {
        if ($groupName === '') {
            $errors[] = 'Ingresa el nombre del grupo.';
        }

        if (empty($errors)) {
            $stmt = db()->prepare('INSERT INTO authority_groups (nombre) VALUES (?)');
            try {
                $stmt->execute([$groupName]);
                $success = true;
                $groupName = '';
            } catch (Exception $e) {
                $errors[] = 'El grupo ya existe o no se pudo guardar.';
            }
        }
    }
}

$groups = db()->query('SELECT id, nombre, created_at FROM authority_groups ORDER BY nombre')->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Grupos de autoridades"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Mantenedores"; $title = "Grupos de autoridades"; include('partials/page-title.php'); ?>

                <div class="row g-3">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Crear grupo</h5>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($success) : ?>
                                    <div class="alert alert-success">Grupo creado correctamente.</div>
                                <?php endif; ?>
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="group-name">Nombre del grupo</label>
                                        <input type="text" id="group-name" name="nombre" class="form-control" value="<?php echo htmlspecialchars($groupName, ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar grupo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Listado de grupos</h5>
                            </div>
                            <div class="card-body">
                                <?php if (empty($groups)) : ?>
                                    <div class="text-muted">No hay grupos registrados.</div>
                                <?php else : ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Grupo</th>
                                                    <th>Creado</th>
                                                    <th class="text-end">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($groups as $group) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($group['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($group['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td class="text-end">
                                                            <form method="post" data-confirm="¿Eliminar este grupo?">
                                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                <input type="hidden" name="action" value="delete">
                                                                <input type="hidden" name="id" value="<?php echo (int) $group['id']; ?>">
                                                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
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
