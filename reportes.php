<?php
require __DIR__ . '/app/bootstrap.php';

$eventCount = (int) db()->query('SELECT COUNT(*) FROM events')->fetchColumn();
$documentCount = (int) db()->query("SELECT COUNT(*) FROM documents WHERE estado = 'vigente'")->fetchColumn();
$pendingApprovals = (int) db()->query("SELECT COUNT(*) FROM events WHERE aprobacion_estado = 'revision'")->fetchColumn();
$alertsCount = (int) db()->query("SELECT COUNT(*) FROM document_versions WHERE vencimiento IS NOT NULL AND vencimiento <= DATE_ADD(CURDATE(), INTERVAL 30 DAY)")->fetchColumn();

$unitStats = db()->query(
    'SELECT u.nombre,
            COUNT(DISTINCT e.id) AS eventos,
            COUNT(DISTINCT d.id) AS documentos,
            COUNT(DISTINCT nr.id) AS alertas
     FROM unidades u
     LEFT JOIN events e ON e.unidad_id = u.id
     LEFT JOIN documents d ON d.unidad_id = u.id
     LEFT JOIN notification_rules nr ON nr.destino LIKE CONCAT("%", u.nombre, "%")
     GROUP BY u.id, u.nombre
     ORDER BY u.nombre'
)->fetchAll();

$criticalDocs = db()->query(
    'SELECT d.titulo, v.vencimiento
     FROM documents d
     JOIN document_versions v ON v.id = (
        SELECT dv.id FROM document_versions dv
        WHERE dv.document_id = d.id
        ORDER BY dv.created_at DESC
        LIMIT 1
     )
     WHERE v.vencimiento IS NOT NULL
     ORDER BY v.vencimiento ASC
     LIMIT 3'
)->fetchAll();

$pendingEvents = db()->query(
    "SELECT titulo, aprobacion_estado FROM events WHERE aprobacion_estado = 'revision' ORDER BY fecha_creacion DESC LIMIT 2"
)->fetchAll();
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Reportes"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Reportes"; $title = "Resumen ejecutivo"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Eventos activos</h5>
                                        <h3 class="my-2"><?php echo $eventCount; ?></h3>
                                        <p class="mb-0 text-muted">Registros totales</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded">
                                            <i data-lucide="calendar-check" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Documentos vigentes</h5>
                                        <h3 class="my-2"><?php echo $documentCount; ?></h3>
                                        <p class="mb-0 text-muted">En estado vigente</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-success-subtle text-success rounded">
                                            <i data-lucide="file-text" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Aprobaciones pendientes</h5>
                                        <h3 class="my-2"><?php echo $pendingApprovals; ?></h3>
                                        <p class="mb-0 text-muted">Eventos en revisión</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded">
                                            <i data-lucide="badge-check" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Alertas enviadas</h5>
                                        <h3 class="my-2"><?php echo $alertsCount; ?></h3>
                                        <p class="mb-0 text-muted">Vencimientos 30 días</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info-subtle text-info rounded">
                                            <i data-lucide="bell" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Indicadores por unidad</h5>
                                    <p class="text-muted mb-0">Comparativo mensual de actividad.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Unidad</th>
                                                <th>Eventos</th>
                                                <th>Documentos</th>
                                                <th>Alertas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($unitStats)) : ?>
                                                <tr>
                                                    <td colspan="4" class="text-muted text-center">No hay datos disponibles.</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php foreach ($unitStats as $stat) : ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($stat['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo (int) $stat['eventos']; ?></td>
                                                    <td><?php echo (int) $stat['documentos']; ?></td>
                                                    <td><?php echo (int) $stat['alertas']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alertas críticas</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php if (empty($criticalDocs) && empty($pendingEvents)) : ?>
                                        <div class="list-group-item text-muted">Sin alertas críticas.</div>
                                    <?php endif; ?>
                                    <?php foreach ($criticalDocs as $doc) : ?>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Documento vencido: <?php echo htmlspecialchars($doc['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                            <span class="badge text-bg-danger">
                                                <?php echo htmlspecialchars(date('d/m/Y', strtotime($doc['vencimiento'])), ENT_QUOTES, 'UTF-8'); ?>
                                            </span>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php foreach ($pendingEvents as $event) : ?>
                                        <div class="list-group-item d-flex justify-content-between align-items-center">
                                            Evento pendiente: <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                            <span class="badge text-bg-warning">Revisión</span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Exportaciones</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Genera reportes en PDF o Excel con filtros avanzados.</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-primary">PDF</button>
                                    <button class="btn btn-outline-success">Excel</button>
                                    <button class="btn btn-outline-secondary">CSV</button>
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
