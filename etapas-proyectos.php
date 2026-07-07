<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = $_GET['success'] ?? '';
ensure_project_catalogs();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? 'create';
    $id = (int) ($_POST['id'] ?? 0);

    if ($action === 'delete' && $id > 0) {
        $stmt = db()->prepare('DELETE FROM project_stages WHERE id = ?');
        $stmt->execute([$id]);
        redirect('etapas-proyectos.php?success=1');
    }

    $nombre = trim($_POST['nombre'] ?? '');
    $orden = (int) ($_POST['orden'] ?? 0);
    $activo = isset($_POST['activo']) ? 1 : 0;

    if ($nombre === '') {
        $errors[] = 'El nombre de la etapa es obligatorio.';
    }

    if (!$errors) {
        if ($action === 'update' && $id > 0) {
            $stmt = db()->prepare('UPDATE project_stages SET nombre = ?, orden = ?, activo = ? WHERE id = ?');
            $stmt->execute([$nombre, $orden, $activo, $id]);
        } else {
            $stmt = db()->prepare('INSERT INTO project_stages (nombre, orden, activo) VALUES (?, ?, ?)');
            $stmt->execute([$nombre, $orden, $activo]);
        }
        redirect('etapas-proyectos.php?success=1');
    }
}

$items = db()->query('SELECT id, nombre, orden, activo FROM project_stages ORDER BY activo DESC, orden ASC, nombre ASC')->fetchAll();
?>
<?php include('partials/html.php'); ?>
<head>
    <?php $title = 'Etapas de proyectos'; include('partials/title-meta.php'); ?>
    <?php include('partials/head-css.php'); ?>
</head>
<body>
<div class="wrapper">
    <?php include('partials/menu.php'); ?>
    <div class="content-page">
        <div class="container-fluid">
            <?php $subtitle = 'Mantenedores'; $title = 'Etapas de proyectos'; include('partials/page-title.php'); ?>
            <?php if ($success === '1') : ?><div class="alert alert-success">Etapas actualizadas correctamente.</div><?php endif; ?>
            <?php foreach ($errors as $error) : ?><div class="alert alert-danger"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div><?php endforeach; ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card"><div class="card-header"><h5 class="card-title mb-0">Crear etapa</h5></div><div class="card-body">
                        <form method="post">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="action" value="create">
                            <div class="mb-3"><label class="form-label" for="nombre">Nombre</label><input id="nombre" name="nombre" class="form-control" placeholder="Ej: Construcción" required></div>
                            <div class="mb-3"><label class="form-label" for="orden">Orden</label><input id="orden" type="number" name="orden" class="form-control" value="0"></div>
                            <div class="form-check form-switch mb-3"><input class="form-check-input" type="checkbox" name="activo" id="activo" checked><label class="form-check-label" for="activo">Activo para registro de proyectos</label></div>
                            <button class="btn btn-primary w-100">Guardar etapa</button>
                        </form>
                    </div></div>
                </div>
                <div class="col-lg-8">
                    <div class="card"><div class="card-header"><h5 class="card-title mb-0">Listado</h5></div><div class="card-body"><div class="table-responsive"><table class="table table-sm align-middle">
                        <thead><tr><th>Nombre</th><th>Orden</th><th>Estado</th><th class="text-end">Acciones</th></tr></thead><tbody>
                        <?php foreach ($items as $item) : ?>
                            <tr><form method="post">
                                <td><input type="text" name="nombre" class="form-control form-control-sm" value="<?php echo htmlspecialchars($item['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required></td>
                                <td style="width:120px"><input type="number" name="orden" class="form-control form-control-sm" value="<?php echo (int) $item['orden']; ?>"></td>
                                <td><div class="form-check form-switch"><input class="form-check-input" type="checkbox" name="activo" <?php echo (int) $item['activo'] === 1 ? 'checked' : ''; ?>><span class="badge text-bg-<?php echo (int) $item['activo'] === 1 ? 'success' : 'secondary'; ?>"><?php echo (int) $item['activo'] === 1 ? 'Activo' : 'Inactivo'; ?></span></div></td>
                                <td class="text-end">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>"><input type="hidden" name="id" value="<?php echo (int) $item['id']; ?>"><input type="hidden" name="action" value="update">
                                    <button class="btn btn-sm btn-primary">Guardar</button>
                                    <button class="btn btn-sm btn-outline-danger" name="action" value="delete" onclick="return confirm('¿Eliminar etapa?')">Eliminar</button>
                                </td>
                            </form></tr>
                        <?php endforeach; ?>
                        </tbody></table></div></div></div>
                </div>
            </div>
        </div>
        <?php include('partials/footer.php'); ?>
    </div>
</div>
<?php include('partials/customizer.php'); ?>
<?php include('partials/footer-scripts.php'); ?>
</body>
</html>
