<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$events = db()->query('SELECT id, titulo FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$authorities = db()->query('SELECT id, nombre, tipo FROM authorities WHERE estado = 1 ORDER BY nombre')->fetchAll();
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$linkedAuthorities = [];

if ($selectedEventId > 0) {
    $stmt = db()->prepare('SELECT authority_id FROM event_authorities WHERE event_id = ?');
    $stmt->execute([$selectedEventId]);
    $linkedAuthorities = array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
    $authorityIds = array_map('intval', $_POST['authorities'] ?? []);

    if ($eventId === 0) {
        $errors[] = 'Selecciona un evento válido.';
    }

    if (empty($errors)) {
        $stmtDelete = db()->prepare('DELETE FROM event_authorities WHERE event_id = ?');
        $stmtDelete->execute([$eventId]);

        if (!empty($authorityIds)) {
            $stmtInsert = db()->prepare('INSERT INTO event_authorities (event_id, authority_id) VALUES (?, ?)');
            foreach ($authorityIds as $authorityId) {
                $stmtInsert->execute([$eventId, $authorityId]);
            }
        }

        redirect('eventos-autoridades.php?event_id=' . $eventId);
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Autoridades por evento"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Autoridades por evento"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Autoridades asignadas</h5>
                                    <p class="text-muted mb-0">Define qué autoridades participan en cada evento.</p>
                                </div>
                                <button type="submit" form="evento-autoridades-form" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <form id="evento-autoridades-form" method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="row g-3 align-items-end">
                                        <div class="col-md-6">
                                            <label class="form-label" for="evento-select">Evento</label>
                                            <select id="evento-select" name="event_id" class="form-select" onchange="this.form.submit()">
                                                <option value="">Selecciona un evento</option>
                                                <?php foreach ($events as $event) : ?>
                                                    <option value="<?php echo (int) $event['id']; ?>" <?php echo $selectedEventId === (int) $event['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label class="form-label">Autoridades disponibles</label>
                                        <div class="row">
                                            <?php if (empty($authorities)) : ?>
                                                <div class="col-12 text-muted">No hay autoridades registradas.</div>
                                            <?php else : ?>
                                                <?php foreach ($authorities as $authority) : ?>
                                                    <?php $checked = in_array((int) $authority['id'], $linkedAuthorities, true); ?>
                                                    <div class="col-md-4">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" id="auth-<?php echo (int) $authority['id']; ?>" name="authorities[]" value="<?php echo (int) $authority['id']; ?>" <?php echo $checked ? 'checked' : ''; ?>>
                                                            <label class="form-check-label" for="auth-<?php echo (int) $authority['id']; ?>">
                                                                <?php echo htmlspecialchars($authority['nombre'], ENT_QUOTES, 'UTF-8'); ?>
                                                                <span class="text-muted">· <?php echo htmlspecialchars($authority['tipo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
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
