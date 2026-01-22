<?php
require __DIR__ . '/app/bootstrap.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$evento = null;
$errors = [];

$usuarios = db()->query('SELECT id, nombre, apellido FROM users WHERE estado = 1 ORDER BY nombre')->fetchAll();

if ($id > 0) {
    $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
    $stmt->execute([$id]);
    $evento = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $titulo = trim($_POST['titulo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $ubicacion = trim($_POST['ubicacion'] ?? '');
    $fechaInicio = $_POST['fecha_inicio'] ?? '';
    $fechaFin = $_POST['fecha_fin'] ?? '';
    $tipo = trim($_POST['tipo'] ?? '');
    $estado = $_POST['estado'] ?? 'borrador';
    $cupos = $_POST['cupos'] !== '' ? (int) $_POST['cupos'] : null;
    $publico = trim($_POST['publico_objetivo'] ?? '');
    $creadoPor = isset($_POST['creado_por']) ? (int) $_POST['creado_por'] : 0;
    $encargado = isset($_POST['encargado_id']) ? (int) $_POST['encargado_id'] : null;

    if ($titulo === '' || $descripcion === '' || $ubicacion === '' || $fechaInicio === '' || $fechaFin === '' || $tipo === '' || $creadoPor === 0) {
        $errors[] = 'Completa los campos obligatorios del evento.';
    }

    if (empty($errors)) {
        if ($id > 0) {
            $stmt = db()->prepare('UPDATE events SET titulo = ?, descripcion = ?, ubicacion = ?, fecha_inicio = ?, fecha_fin = ?, tipo = ?, cupos = ?, publico_objetivo = ?, estado = ?, creado_por = ?, encargado_id = ? WHERE id = ?');
            $stmt->execute([
                $titulo,
                $descripcion,
                $ubicacion,
                $fechaInicio,
                $fechaFin,
                $tipo,
                $cupos,
                $publico !== '' ? $publico : null,
                $estado,
                $creadoPor,
                $encargado ?: null,
                $id,
            ]);
        } else {
            $stmt = db()->prepare('INSERT INTO events (titulo, descripcion, ubicacion, fecha_inicio, fecha_fin, tipo, cupos, publico_objetivo, estado, creado_por, encargado_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([
                $titulo,
                $descripcion,
                $ubicacion,
                $fechaInicio,
                $fechaFin,
                $tipo,
                $cupos,
                $publico !== '' ? $publico : null,
                $estado,
                $creadoPor,
                $encargado ?: null,
            ]);
        }

        redirect('eventos-lista.php');
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar evento"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Crear/editar evento"; include('partials/page-title.php'); ?>

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
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="evento-titulo">Título</label>
                                            <input type="text" id="evento-titulo" name="titulo" class="form-control" value="<?php echo htmlspecialchars($evento['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-estado">Estado</label>
                                            <select id="evento-estado" name="estado" class="form-select">
                                                <?php $estadoActual = $evento['estado'] ?? 'borrador'; ?>
                                                <option value="borrador" <?php echo $estadoActual === 'borrador' ? 'selected' : ''; ?>>Borrador</option>
                                                <option value="publicado" <?php echo $estadoActual === 'publicado' ? 'selected' : ''; ?>>Publicado</option>
                                                <option value="finalizado" <?php echo $estadoActual === 'finalizado' ? 'selected' : ''; ?>>Finalizado</option>
                                                <option value="cancelado" <?php echo $estadoActual === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="evento-descripcion">Descripción</label>
                                            <textarea id="evento-descripcion" name="descripcion" class="form-control" rows="3"><?php echo htmlspecialchars($evento['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-ubicacion">Ubicación/Dirección</label>
                                            <input type="text" id="evento-ubicacion" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($evento['ubicacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="evento-inicio">Fecha inicio</label>
                                            <input type="datetime-local" id="evento-inicio" name="fecha_inicio" class="form-control" value="<?php echo htmlspecialchars($evento['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="evento-fin">Fecha fin</label>
                                            <input type="datetime-local" id="evento-fin" name="fecha_fin" class="form-control" value="<?php echo htmlspecialchars($evento['fecha_fin'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-tipo">Tipo</label>
                                            <select id="evento-tipo" name="tipo" class="form-select">
                                                <?php $tipoActual = $evento['tipo'] ?? ''; ?>
                                                <option value="Reunión" <?php echo $tipoActual === 'Reunión' ? 'selected' : ''; ?>>Reunión</option>
                                                <option value="Operativo" <?php echo $tipoActual === 'Operativo' ? 'selected' : ''; ?>>Operativo</option>
                                                <option value="Ceremonia" <?php echo $tipoActual === 'Ceremonia' ? 'selected' : ''; ?>>Ceremonia</option>
                                                <option value="Actividad cultural" <?php echo $tipoActual === 'Actividad cultural' ? 'selected' : ''; ?>>Actividad cultural</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-cupos">Cupos (opcional)</label>
                                            <input type="number" id="evento-cupos" name="cupos" class="form-control" value="<?php echo htmlspecialchars((string) ($evento['cupos'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-publico">Público objetivo</label>
                                            <input type="text" id="evento-publico" name="publico_objetivo" class="form-control" value="<?php echo htmlspecialchars($evento['publico_objetivo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-creador">Creado por</label>
                                            <select id="evento-creador" name="creado_por" class="form-select">
                                                <?php $creadorActual = (int) ($evento['creado_por'] ?? 0); ?>
                                                <?php foreach ($usuarios as $usuario) : ?>
                                                    <option value="<?php echo (int) $usuario['id']; ?>" <?php echo $creadorActual === (int) $usuario['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-encargado">Encargado</label>
                                            <select id="evento-encargado" name="encargado_id" class="form-select">
                                                <?php $encargadoActual = (int) ($evento['encargado_id'] ?? 0); ?>
                                                <option value="">Sin encargado</option>
                                                <?php foreach ($usuarios as $usuario) : ?>
                                                    <option value="<?php echo (int) $usuario['id']; ?>" <?php echo $encargadoActual === (int) $usuario['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar evento</button>
                                        <a href="eventos-lista.php" class="btn btn-outline-secondary">Volver</a>
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
