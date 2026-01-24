<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

if (!isset($_SESSION['user'])) {
    redirect('auth-2-sign-in.php');
}

$stats = [
    'events_total' => 0,
    'events_upcoming' => 0,
    'authorities_total' => 0,
    'users_total' => 0,
    'validation_requests' => 0,
    'validation_responded' => 0,
];
$upcomingEvents = [];
$recentValidations = [];

try {
    $stats['events_total'] = (int) db()->query('SELECT COUNT(*) FROM events')->fetchColumn();
    $stats['events_upcoming'] = (int) db()->query('SELECT COUNT(*) FROM events WHERE fecha_inicio >= NOW()')->fetchColumn();
    $stats['authorities_total'] = (int) db()->query('SELECT COUNT(*) FROM authorities')->fetchColumn();
    $stats['users_total'] = (int) db()->query('SELECT COUNT(*) FROM users')->fetchColumn();
    $stats['validation_requests'] = (int) db()->query('SELECT COUNT(*) FROM event_authority_requests')->fetchColumn();
    $stats['validation_responded'] = (int) db()->query('SELECT COUNT(*) FROM event_authority_requests WHERE estado = "respondido"')->fetchColumn();

    $stmt = db()->prepare('SELECT titulo, fecha_inicio, fecha_fin, ubicacion, tipo FROM events ORDER BY fecha_inicio DESC LIMIT 5');
    $stmt->execute();
    $upcomingEvents = $stmt->fetchAll();

    $stmt = db()->prepare(
        'SELECT e.titulo, r.destinatario_nombre, r.destinatario_correo, r.responded_at
         FROM event_authority_requests r
         INNER JOIN events e ON e.id = r.event_id
         WHERE r.estado = "respondido"
         ORDER BY r.responded_at DESC
         LIMIT 5'
    );
    $stmt->execute();
    $recentValidations = $stmt->fetchAll();
} catch (Exception $e) {
} catch (Error $e) {
}

include('partials/html.php');
?>

<head>
    <?php $title = "Panel"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Resumen general"; $title = "Panel de control"; include('partials/page-title.php'); ?>

                <div class="row g-3">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="text-muted mb-1">Eventos registrados</p>
                                        <h4 class="mb-0"><?php echo (int) $stats['events_total']; ?></h4>
                                    </div>
                                    <span class="avatar-sm rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                                        <i class="ti ti-calendar-event fs-4"></i>
                                    </span>
                                </div>
                                <div class="mt-3 small text-muted">Próximos: <?php echo (int) $stats['events_upcoming']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="text-muted mb-1">Autoridades</p>
                                        <h4 class="mb-0"><?php echo (int) $stats['authorities_total']; ?></h4>
                                    </div>
                                    <span class="avatar-sm rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users fs-4"></i>
                                    </span>
                                </div>
                                <div class="mt-3 small text-muted">Catálogo activo de autoridades municipales.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="text-muted mb-1">Usuarios activos</p>
                                        <h4 class="mb-0"><?php echo (int) $stats['users_total']; ?></h4>
                                    </div>
                                    <span class="avatar-sm rounded-circle bg-info-subtle text-info d-flex align-items-center justify-content-center">
                                        <i class="ti ti-user-circle fs-4"></i>
                                    </span>
                                </div>
                                <div class="mt-3 small text-muted">Accesos habilitados en el sistema.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="text-muted mb-1">Validaciones</p>
                                        <h4 class="mb-0"><?php echo (int) $stats['validation_responded']; ?></h4>
                                    </div>
                                    <span class="avatar-sm rounded-circle bg-warning-subtle text-warning d-flex align-items-center justify-content-center">
                                        <i class="ti ti-checklist fs-4"></i>
                                    </span>
                                </div>
                                <div class="mt-3 small text-muted">Solicitudes totales: <?php echo (int) $stats['validation_requests']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-xl-7">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Eventos recientes</h5>
                                <a class="btn btn-sm btn-outline-primary" href="eventos-lista.php">Ver todos</a>
                            </div>
                            <div class="card-body">
                                <?php if (empty($upcomingEvents)) : ?>
                                    <div class="text-muted">No hay eventos registrados todavía.</div>
                                <?php else : ?>
                                    <div class="list-group list-group-flush">
                                        <?php foreach ($upcomingEvents as $event) : ?>
                                            <div class="list-group-item px-0">
                                                <div class="d-flex align-items-start justify-content-between gap-3">
                                                    <div>
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?></h6>
                                                        <div class="text-muted small">
                                                            <?php echo htmlspecialchars($event['ubicacion'], ENT_QUOTES, 'UTF-8'); ?>
                                                            · <?php echo htmlspecialchars($event['tipo'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <div class="badge text-bg-light">
                                                            <?php echo htmlspecialchars($event['fecha_inicio'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </div>
                                                        <div class="text-muted small mt-1">
                                                            <?php echo htmlspecialchars($event['fecha_fin'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Validaciones recientes</h5>
                                <a class="btn btn-sm btn-outline-primary" href="eventos-procesados.php">Ver procesados</a>
                            </div>
                            <div class="card-body">
                                <?php if (empty($recentValidations)) : ?>
                                    <div class="text-muted">Aún no hay validaciones respondidas.</div>
                                <?php else : ?>
                                    <div class="list-group list-group-flush">
                                        <?php foreach ($recentValidations as $validation) : ?>
                                            <div class="list-group-item px-0">
                                                <div class="d-flex align-items-start justify-content-between gap-2">
                                                    <div>
                                                        <div class="fw-semibold"><?php echo htmlspecialchars($validation['titulo'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                        <div class="text-muted small">
                                                            <?php echo htmlspecialchars($validation['destinatario_nombre'] ?: 'Sin nombre', ENT_QUOTES, 'UTF-8'); ?>
                                                            · <?php echo htmlspecialchars($validation['destinatario_correo'], ENT_QUOTES, 'UTF-8'); ?>
                                                        </div>
                                                    </div>
                                                    <span class="badge text-bg-success">Respondido</span>
                                                </div>
                                                <div class="text-muted small mt-1">Fecha: <?php echo htmlspecialchars($validation['responded_at'], ENT_QUOTES, 'UTF-8'); ?></div>
                                            </div>
                                        <?php endforeach; ?>
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
