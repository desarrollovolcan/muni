<?php
require __DIR__ . '/app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && verify_csrf($_POST['csrf_token'] ?? null)) {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;

    if ($_POST['action'] === 'disable' && $id > 0) {
        $stmt = db()->prepare('UPDATE events SET habilitado = 0 WHERE id = ?');
        $stmt->execute([$id]);
    }

    redirect('eventos-lista.php');
}

$stmt = db()->query('SELECT e.id, e.titulo, e.fecha_inicio, e.tipo, e.estado, e.habilitado, u.nombre AS encargado_nombre, u.apellido AS encargado_apellido, COUNT(r.id) AS solicitudes_total, SUM(r.correo_enviado = 1) AS correos_enviados FROM events e LEFT JOIN users u ON u.id = e.encargado_id LEFT JOIN event_authority_requests r ON r.event_id = e.id GROUP BY e.id ORDER BY e.fecha_inicio DESC');
$eventos = $stmt->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar eventos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Listar eventos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Eventos municipales</h5>
                                    <p class="text-muted mb-0">Listado y control de eventos.</p>
                                </div>
                                <a href="eventos-editar.php" class="btn btn-primary">Nuevo evento</a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <input type="date" class="form-control">
                                    <input type="date" class="form-control">
                                    <select class="form-select">
                                        <option value="">Estado</option>
                                        <option>Borrador</option>
                                        <option>Publicado</option>
                                        <option>Finalizado</option>
                                        <option>Cancelado</option>
                                    </select>
                                    <select class="form-select">
                                        <option value="">Tipo</option>
                                        <option>Reunión</option>
                                        <option>Operativo</option>
                                        <option>Ceremonia</option>
                                        <option>Actividad cultural</option>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Evento</th>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Responsable</th>
                                                <th>Notificación</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($eventos)) : ?>
                                                <tr>
                                                    <td colspan="7" class="text-center text-muted">No hay eventos registrados.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($eventos as $evento) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($evento['titulo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($evento['fecha_inicio'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($evento['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <span class="badge text-bg-<?php echo $evento['estado'] === 'publicado' ? 'success' : ($evento['estado'] === 'borrador' ? 'warning' : 'secondary'); ?>">
                                                                <?php echo htmlspecialchars(ucfirst($evento['estado']), ENT_QUOTES, 'UTF-8'); ?>
                                                            </span>
                                                        </td>
                                                        <td><?php echo htmlspecialchars(trim(($evento['encargado_nombre'] ?? '') . ' ' . ($evento['encargado_apellido'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ((int) $evento['correos_enviados'] > 0) : ?>
                                                                <span class="badge text-bg-success">Enviada</span>
                                                            <?php elseif ((int) $evento['solicitudes_total'] > 0) : ?>
                                                                <span class="badge text-bg-warning">Pendiente</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-secondary">Sin enviar</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-soft-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Acciones
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="eventos-detalle.php?id=<?php echo (int) $evento['id']; ?>">Ver detalle</a></li>
                                                                    <li><a class="dropdown-item" href="eventos-editar.php?id=<?php echo (int) $evento['id']; ?>">Editar</a></li>
                                                                    <li><a class="dropdown-item" href="eventos-adjuntos.php">Adjuntos</a></li>
                                                                    <li><a class="dropdown-item" href="eventos-autoridades.php?event_id=<?php echo (int) $evento['id']; ?>">Enviar confirmación de invitados</a></li>
                                                                    <li><hr class="dropdown-divider"></li>
                                                                    <li>
                                                                        <form method="post" class="px-3 py-1">
                                                                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                            <input type="hidden" name="action" value="disable">
                                                                            <input type="hidden" name="id" value="<?php echo (int) $evento['id']; ?>">
                                                                            <button type="submit" class="btn btn-sm btn-outline-danger w-100" <?php echo (int) $evento['habilitado'] === 0 ? 'disabled' : ''; ?>>Deshabilitar</button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
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
