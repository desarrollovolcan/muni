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

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="d-flex mb-3 gap-1">
                    <div class="card h-100 mb-0 d-none d-lg-flex rounded-end-0">
                        <div class="card-body">
                            <button class="btn btn-primary w-100 btn-new-event">
                                <i class="ti ti-plus me-2 align-middle"></i>
                                <?php echo $id > 0 ? 'Editar evento' : 'Crear evento'; ?>
                            </button>

                            <div id="external-events">
                                <p class="text-muted mt-2 fst-italic fs-xs mb-3">Arrastra un tipo de evento al calendario o haz clic en la fecha.</p>

                                <div class="external-event fc-event bg-primary-subtle text-primary fw-semibold" data-class="bg-primary-subtle text-primary" data-tipo="Reunión">
                                    <i class="ti ti-circle-filled me-2"></i>Reunión
                                </div>

                                <div class="external-event fc-event bg-secondary-subtle text-secondary fw-semibold" data-class="bg-secondary-subtle text-secondary" data-tipo="Operativo">
                                    <i class="ti ti-circle-filled me-2"></i>Operativo
                                </div>

                                <div class="external-event fc-event bg-success-subtle text-success fw-semibold" data-class="bg-success-subtle text-success" data-tipo="Ceremonia">
                                    <i class="ti ti-circle-filled me-2"></i>Ceremonia
                                </div>

                                <div class="external-event fc-event bg-warning-subtle text-warning fw-semibold" data-class="bg-warning-subtle text-warning" data-tipo="Actividad cultural">
                                    <i class="ti ti-circle-filled me-2"></i>Actividad cultural
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card h-100 mb-0 rounded-start-0 flex-grow-1 border-start-0">
                        <div class="d-lg-none d-inline-flex card-header">
                            <button class="btn btn-primary btn-new-event">
                                <i class="ti ti-plus me-2 align-middle"></i>
                                <?php echo $id > 0 ? 'Editar evento' : 'Crear evento'; ?>
                            </button>
                        </div>

                        <div class="card-body" style="height: calc(100% - 350px);" data-simplebar data-simplebar-md>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="forms-event" data-submit="server" method="post" novalidate>
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modal-title">
                                        <?php echo $id > 0 ? 'Editar evento' : 'Crear evento'; ?>
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label class="control-label form-label" for="event-title">Título</label>
                                            <input class="form-control" type="text" name="titulo" id="event-title" value="<?php echo htmlspecialchars($evento['titulo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                            <div class="invalid-feedback">Ingresa un título válido.</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="event-estado">Estado</label>
                                            <select id="event-estado" name="estado" class="form-select">
                                                <?php $estadoActual = $evento['estado'] ?? 'borrador'; ?>
                                                <option value="borrador" <?php echo $estadoActual === 'borrador' ? 'selected' : ''; ?>>Borrador</option>
                                                <option value="publicado" <?php echo $estadoActual === 'publicado' ? 'selected' : ''; ?>>Publicado</option>
                                                <option value="finalizado" <?php echo $estadoActual === 'finalizado' ? 'selected' : ''; ?>>Finalizado</option>
                                                <option value="cancelado" <?php echo $estadoActual === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="control-label form-label" for="event-description">Descripción</label>
                                            <textarea id="event-description" name="descripcion" class="form-control" rows="3" required><?php echo htmlspecialchars($evento['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="control-label form-label" for="event-location">Ubicación/Dirección</label>
                                            <input type="text" id="event-location" name="ubicacion" class="form-control" value="<?php echo htmlspecialchars($evento['ubicacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="control-label form-label" for="event-start">Fecha inicio</label>
                                            <input type="datetime-local" id="event-start" name="fecha_inicio" class="form-control" value="<?php echo htmlspecialchars($evento['fecha_inicio'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="control-label form-label" for="event-end">Fecha fin</label>
                                            <input type="datetime-local" id="event-end" name="fecha_fin" class="form-control" value="<?php echo htmlspecialchars($evento['fecha_fin'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="control-label form-label" for="event-category">Tipo</label>
                                            <select class="form-select" name="tipo" id="event-category" required>
                                                <?php $tipoActual = $evento['tipo'] ?? ''; ?>
                                                <option value="Reunión" <?php echo $tipoActual === 'Reunión' ? 'selected' : ''; ?>>Reunión</option>
                                                <option value="Operativo" <?php echo $tipoActual === 'Operativo' ? 'selected' : ''; ?>>Operativo</option>
                                                <option value="Ceremonia" <?php echo $tipoActual === 'Ceremonia' ? 'selected' : ''; ?>>Ceremonia</option>
                                                <option value="Actividad cultural" <?php echo $tipoActual === 'Actividad cultural' ? 'selected' : ''; ?>>Actividad cultural</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="control-label form-label" for="event-cupos">Cupos (opcional)</label>
                                            <input type="number" id="event-cupos" name="cupos" class="form-control" value="<?php echo htmlspecialchars((string) ($evento['cupos'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="control-label form-label" for="event-publico">Público objetivo</label>
                                            <input type="text" id="event-publico" name="publico_objetivo" class="form-control" value="<?php echo htmlspecialchars($evento['publico_objetivo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="control-label form-label" for="event-creador">Creado por</label>
                                            <select id="event-creador" name="creado_por" class="form-select" required>
                                                <?php $creadorActual = (int) ($evento['creado_por'] ?? 0); ?>
                                                <?php foreach ($usuarios as $usuario) : ?>
                                                    <option value="<?php echo (int) $usuario['id']; ?>" <?php echo $creadorActual === (int) $usuario['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars(trim($usuario['nombre'] . ' ' . $usuario['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="control-label form-label" for="event-encargado">Encargado</label>
                                            <select id="event-encargado" name="encargado_id" class="form-select">
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

                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <button type="button" class="btn btn-outline-danger" id="btn-delete-event">
                                            Eliminar
                                        </button>

                                        <button type="button" class="btn btn-light ms-auto" data-bs-dismiss="modal">
                                            Cancelar
                                        </button>

                                        <button type="submit" class="btn btn-primary" id="btn-save-event">
                                            Guardar evento
                                        </button>
                                    </div>
                                </div>
                            </form>
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

    <!-- Fullcalendar js -->
    <script src="assets/plugins/fullcalendar/index.global.min.js"></script>

    <!-- Calendar App Demo js -->
    <script src="assets/js/pages/apps-calendar.js"></script>

</body>

</html>
