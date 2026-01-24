<?php
require __DIR__ . '/app/bootstrap.php';

$events = db()->query('SELECT id, titulo, fecha_inicio FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$selectedEvent = null;
$authorities = [];
$confirmedIds = [];

if ($selectedEventId > 0) {
    foreach ($events as $event) {
        if ((int) $event['id'] === $selectedEventId) {
            $selectedEvent = $event;
            break;
        }
    }

    $stmtAuthorities = db()->prepare(
        'SELECT a.id, a.nombre, a.tipo
         FROM authorities a
         INNER JOIN event_authorities ea ON ea.authority_id = a.id
         WHERE ea.event_id = ?
         ORDER BY a.nombre'
    );
    $stmtAuthorities->execute([$selectedEventId]);
    $authorities = $stmtAuthorities->fetchAll();

    $stmtConfirmed = db()->prepare(
        'SELECT DISTINCT c.authority_id
         FROM event_authority_confirmations c
         INNER JOIN event_authority_requests r ON r.id = c.request_id
         WHERE r.event_id = ?'
    );
    $stmtConfirmed->execute([$selectedEventId]);
    $confirmedIds = $stmtConfirmed->fetchAll(PDO::FETCH_COLUMN);
}

$totalAssigned = count($authorities);
$totalConfirmed = 0;
foreach ($authorities as $authority) {
    if (in_array((int) $authority['id'], $confirmedIds, true)) {
        $totalConfirmed++;
    }
}
$totalPending = max(0, $totalAssigned - $totalConfirmed);
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = 'Eventos / Autoridades'; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <div class="content-page">
            <div class="container-fluid">

                <?php $subtitle = 'Eventos Municipales'; $title = 'Eventos / Autoridades'; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Autoridades asociadas por evento</h5>
                                    <p class="text-muted mb-0">Revisa qué autoridades fueron confirmadas y cuáles siguen pendientes.</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="get" class="row g-3 align-items-end">
                                    <div class="col-md-6">
                                        <label class="form-label" for="evento-resumen-select">Evento</label>
                                        <select id="evento-resumen-select" name="event_id" class="form-select" onchange="this.form.submit()">
                                            <option value="">Selecciona un evento</option>
                                            <?php foreach ($events as $event) : ?>
                                                <option value="<?php echo (int) $event['id']; ?>" <?php echo $selectedEventId === (int) $event['id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if ($selectedEvent) : ?>
                                            <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                                                <span class="badge text-bg-primary">Total: <?php echo $totalAssigned; ?></span>
                                                <span class="badge text-bg-success">Confirmadas: <?php echo $totalConfirmed; ?></span>
                                                <span class="badge text-bg-warning">Pendientes: <?php echo $totalPending; ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>

                                <div class="table-responsive mt-4">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Autoridad</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($selectedEventId === 0) : ?>
                                                <tr>
                                                    <td colspan="3" class="text-muted">Selecciona un evento para ver sus autoridades.</td>
                                                </tr>
                                            <?php elseif (empty($authorities)) : ?>
                                                <tr>
                                                    <td colspan="3" class="text-muted">No hay autoridades asociadas a este evento.</td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($authorities as $authority) : ?>
                                                    <?php $isConfirmed = in_array((int) $authority['id'], $confirmedIds, true); ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($authority['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($authority['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php if ($isConfirmed) : ?>
                                                                <span class="badge text-bg-success">Confirmada</span>
                                                            <?php else : ?>
                                                                <span class="badge text-bg-warning">Pendiente</span>
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
        </div>

    </div>

    <?php include('partials/footer-scripts.php'); ?>
</body>

</html>
