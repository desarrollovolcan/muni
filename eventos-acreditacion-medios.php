<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$notice = null;
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$selectedEvent = null;
$requests = [];
$publicLink = null;
$shareLinks = [];

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS event_media_accreditation_links (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            event_id INT UNSIGNED NOT NULL,
            token VARCHAR(64) NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY event_media_accreditation_links_event_unique (event_id),
            UNIQUE KEY event_media_accreditation_links_token_unique (token),
            CONSTRAINT event_media_accreditation_links_event_fk FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS media_accreditation_requests (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            event_id INT UNSIGNED NOT NULL,
            medio VARCHAR(200) NOT NULL,
            tipo_medio VARCHAR(80) NOT NULL,
            tipo_medio_otro VARCHAR(120) DEFAULT NULL,
            ciudad VARCHAR(120) DEFAULT NULL,
            nombre VARCHAR(120) NOT NULL,
            apellidos VARCHAR(160) NOT NULL,
            rut VARCHAR(30) NOT NULL,
            correo VARCHAR(180) NOT NULL,
            celular VARCHAR(40) DEFAULT NULL,
            cargo VARCHAR(120) DEFAULT NULL,
            correo_enviado TINYINT(1) NOT NULL DEFAULT 0,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            sent_at TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (id),
            KEY media_accreditation_requests_event_idx (event_id),
            CONSTRAINT media_accreditation_requests_event_fk FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

$events = db()->query('SELECT id, titulo, fecha_inicio, fecha_fin, tipo, ubicacion FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();

if ($selectedEventId > 0) {
    $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
    $stmt->execute([$selectedEventId]);
    $selectedEvent = $stmt->fetch();

    if (!$selectedEvent) {
        $errors[] = 'El evento seleccionado no existe.';
    } else {
        $stmt = db()->prepare('SELECT token FROM event_media_accreditation_links WHERE event_id = ? LIMIT 1');
        $stmt->execute([$selectedEventId]);
        $linkToken = $stmt->fetchColumn();

        if (!$linkToken) {
            $linkToken = bin2hex(random_bytes(16));
            $stmtInsert = db()->prepare('INSERT INTO event_media_accreditation_links (event_id, token) VALUES (?, ?)');
            $stmtInsert->execute([$selectedEventId, $linkToken]);
        }

        $publicLink = base_url() . '/medios-acreditacion.php?token=' . urlencode($linkToken);
        $shareMessage = 'Solicitud de acreditación para ' . ($selectedEvent['titulo'] ?? 'evento') . ".\nCompleta el formulario aquí: " . $publicLink;
        $shareLinks = [
            'email' => 'mailto:?subject=' . rawurlencode('Solicitud acreditación ' . ($selectedEvent['titulo'] ?? 'evento'))
                . '&body=' . rawurlencode($shareMessage),
            'whatsapp' => 'https://wa.me/?text=' . rawurlencode($shareMessage),
        ];

        $stmtRequests = db()->prepare(
            'SELECT * FROM media_accreditation_requests WHERE event_id = ? ORDER BY created_at DESC'
        );
        $stmtRequests->execute([$selectedEventId]);
        $requests = $stmtRequests->fetchAll();
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = 'Acreditación de medios'; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php include('partials/menu.php'); ?>

        <div class="content-page">
            <div class="container-fluid">
                <?php $subtitle = 'Eventos Municipales'; $title = 'Acreditación de medios'; include('partials/page-title.php'); ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($notice) : ?>
                    <div class="alert alert-success">
                        <?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card gm-section">
                            <div class="card-header">
                                <h5 class="card-title mb-1">Crear formulario de acreditación</h5>
                                <p class="text-muted mb-0">Selecciona un evento para generar el enlace público y compartirlo.</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="event-id">Evento</label>
                                        <select id="event-id" name="event_id" class="form-select" onchange="window.location='eventos-acreditacion-medios.php?event_id=' + this.value">
                                            <option value="">Selecciona un evento</option>
                                            <?php foreach ($events as $event) : ?>
                                                <option value="<?php echo (int) $event['id']; ?>" <?php echo $selectedEventId === (int) $event['id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <?php if ($selectedEvent && $publicLink) : ?>
                                    <div class="border rounded-3 p-3 bg-light-subtle">
                                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-2">
                                            <div>
                                                <h6 class="mb-1">Enlace público</h6>
                                                <p class="text-muted mb-2">Comparte este link con los medios para completar la solicitud.</p>
                                            </div>
                                            <span class="badge text-bg-primary">Activo</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="public-link" value="<?php echo htmlspecialchars($publicLink, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="navigator.clipboard.writeText(document.getElementById('public-link').value)">Copiar</button>
                                        </div>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-soft-primary" href="<?php echo htmlspecialchars($shareLinks['email'], ENT_QUOTES, 'UTF-8'); ?>">
                                                <i class="ti ti-mail"></i> Compartir por correo
                                            </a>
                                            <a class="btn btn-soft-success" href="<?php echo htmlspecialchars($shareLinks['whatsapp'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">
                                                <i class="ti ti-brand-whatsapp"></i> Compartir por WhatsApp
                                            </a>
                                            <a class="btn btn-outline-primary" href="<?php echo htmlspecialchars($publicLink, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">
                                                <i class="ti ti-external-link"></i> Ver formulario
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card gm-section">
                            <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                                <div>
                                    <h5 class="card-title mb-1">Solicitudes recibidas</h5>
                                    <p class="text-muted mb-0">Listado de respuestas enviadas por los medios.</p>
                                </div>
                                <?php if ($selectedEvent) : ?>
                                    <span class="badge text-bg-secondary">Total: <?php echo count($requests); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php if (!$selectedEvent) : ?>
                                    <div class="text-muted">Selecciona un evento para ver sus solicitudes.</div>
                                <?php elseif (empty($requests)) : ?>
                                    <div class="text-muted">Aún no hay solicitudes registradas para este evento.</div>
                                <?php else : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Medio</th>
                                                    <th>Tipo</th>
                                                    <th>Ciudad</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>RUT</th>
                                                    <th>Correo</th>
                                                    <th>Celular</th>
                                                    <th>Cargo</th>
                                                    <th>Fecha envío</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($requests as $request) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($request['medio'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <?php
                                                            $tipoMedio = $request['tipo_medio'] ?? '';
                                                            $tipoDetalle = $request['tipo_medio_otro'] ?? '';
                                                            $tipoDisplay = $tipoMedio;
                                                            if ($tipoMedio === 'Otro' && $tipoDetalle !== '') {
                                                                $tipoDisplay .= ' (' . $tipoDetalle . ')';
                                                            }
                                                            echo htmlspecialchars($tipoDisplay, ENT_QUOTES, 'UTF-8');
                                                            ?>
                                                        </td>
                                                        <td><?php echo htmlspecialchars($request['ciudad'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['apellidos'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['rut'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['correo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['celular'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['cargo'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($request['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
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
        </div>
    </div>

    <?php include('partials/vendor.php'); ?>
    <?php include('partials/footer.php'); ?>
</body>
</html>
