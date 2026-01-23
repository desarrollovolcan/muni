<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$autoridad = null;
$errors = [];
$success = $_GET['success'] ?? '';
$autoridades = db()->query('SELECT id, nombre, tipo, fecha_inicio, fecha_fin, correo, estado FROM authorities ORDER BY fecha_inicio DESC')->fetchAll();

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM authorities WHERE id = ?');
    $stmt->execute([$id]);
    $autoridad = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $nombre = trim($_POST['nombre'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $fechaInicio = $_POST['fecha_inicio'] ?? '';
    $fechaFin = $_POST['fecha_fin'] ?? null;
    $estado = isset($_POST['estado']) && $_POST['estado'] === '0' ? 0 : 1;

    if ($nombre === '' || $tipo === '' || $fechaInicio === '') {
        $errors[] = 'Completa los campos obligatorios.';
    }

    if (empty($errors)) {
        if ($id > 0) {
            $stmt = db()->prepare('UPDATE authorities SET nombre = ?, tipo = ?, correo = ?, telefono = ?, fecha_inicio = ?, fecha_fin = ?, estado = ? WHERE id = ?');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
                $id,
            ]);
            redirect('autoridades-editar.php?id=' . $id . '&success=1');
        } else {
            $stmt = db()->prepare('INSERT INTO authorities (nombre, tipo, correo, telefono, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $nombre,
                $tipo,
                $correo !== '' ? $correo : null,
                $telefono !== '' ? $telefono : null,
                $fechaInicio,
                $fechaFin !== '' ? $fechaFin : null,
                $estado,
            ]);
            $newId = (int) db()->lastInsertId();
            redirect('autoridades-editar.php?id=' . $newId . '&success=1');
        }
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar autoridad"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Autoridades"; $title = "Crear/editar autoridad"; include('partials/page-title.php'); ?>

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
                                <?php if ($success === '1') : ?>
                                    <div class="alert alert-success">Autoridad guardada correctamente.</div>
                                <?php endif; ?>
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-nombre">Nombre completo</label>
                                            <input type="text" id="autoridad-nombre" name="nombre" class="form-control" value="<?php echo htmlspecialchars($autoridad['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-tipo">Tipo</label>
                                            <select id="autoridad-tipo" name="tipo" class="form-select">
                                                <?php $tipoActual = $autoridad['tipo'] ?? ''; ?>
                                                <option value="Alcalde" <?php echo $tipoActual === 'Alcalde' ? 'selected' : ''; ?>>Alcalde</option>
                                                <option value="Alcaldesa" <?php echo $tipoActual === 'Alcaldesa' ? 'selected' : ''; ?>>Alcaldesa</option>
                                                <option value="Concejal" <?php echo $tipoActual === 'Concejal' ? 'selected' : ''; ?>>Concejal</option>
                                                <option value="Administrador Municipal" <?php echo $tipoActual === 'Administrador Municipal' ? 'selected' : ''; ?>>Administrador Municipal</option>
                                                <option value="Secplan" <?php echo $tipoActual === 'Secplan' ? 'selected' : ''; ?>>Secplan</option>
                                                <option value="Dideco" <?php echo $tipoActual === 'Dideco' ? 'selected' : ''; ?>>Dideco</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-correo">Correo</label>
                                            <input type="email" id="autoridad-correo" name="correo" class="form-control" value="<?php echo htmlspecialchars($autoridad['correo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-telefono">Teléfono</label>
                                            <input type="tel" id="autoridad-telefono" name="telefono" class="form-control" value="<?php echo htmlspecialchars($autoridad['telefono'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-inicio">Fecha inicio</label>
                                            <input type="date" id="autoridad-inicio" name="fecha_inicio" class="form-control" value="<?php echo htmlspecialchars($autoridad['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-fin">Fecha fin</label>
                                            <input type="date" id="autoridad-fin" name="fecha_fin" class="form-control" value="<?php echo htmlspecialchars($autoridad['fecha_fin'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="autoridad-estado">Estado</label>
                                            <select id="autoridad-estado" name="estado" class="form-select">
                                                <option value="1" <?php echo !$autoridad || (int) ($autoridad['estado'] ?? 1) === 1 ? 'selected' : ''; ?>>Habilitado</option>
                                                <option value="0" <?php echo $autoridad && (int) $autoridad['estado'] === 0 ? 'selected' : ''; ?>>Deshabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar autoridad</button>
                                        <a href="autoridades-lista.php" class="btn btn-outline-secondary">Volver</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Listado de autoridades</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Autoridad</th>
                                                <th>Tipo</th>
                                                <th>Periodo</th>
                                                <th>Contacto</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($autoridades)) : ?>
                                                <tr>
                                                    <td colspan="5" class="text-center text-muted">No hay autoridades registradas.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($autoridades as $autoridadItem) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($autoridadItem['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['fecha_inicio'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($autoridadItem['fecha_fin'] ?? 'Vigente', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($autoridadItem['correo'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ((int) $autoridadItem['estado'] === 1) : ?>
                                                                <span class="badge text-bg-success">Habilitado</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-secondary">Deshabilitado</span>
                                                            <?php endif; ?>
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
