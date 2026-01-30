<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$notice = null;
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$events = db()->query('SELECT id, titulo, fecha_inicio, fecha_fin FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$insideMedia = [];
$outsideMedia = [];
$cooldownSeconds = 15;

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
            estado ENUM("pendiente", "aprobado", "rechazado") NOT NULL DEFAULT "pendiente",
            qr_token VARCHAR(64) DEFAULT NULL,
            correo_enviado TINYINT(1) NOT NULL DEFAULT 0,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            aprobado_at TIMESTAMP NULL DEFAULT NULL,
            rechazado_at TIMESTAMP NULL DEFAULT NULL,
            last_scan_at TIMESTAMP NULL DEFAULT NULL,
            inside_estado TINYINT(1) NOT NULL DEFAULT 0,
            sent_at TIMESTAMP NULL DEFAULT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY media_accreditation_requests_qr_unique (qr_token),
            KEY media_accreditation_requests_event_idx (event_id),
            CONSTRAINT media_accreditation_requests_event_fk FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS media_accreditation_access_logs (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            event_id INT UNSIGNED NOT NULL,
            request_id INT UNSIGNED NOT NULL,
            accion ENUM("ingreso", "salida") NOT NULL,
            scanned_by INT UNSIGNED DEFAULT NULL,
            scanned_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            KEY media_accreditation_access_logs_event_idx (event_id),
            KEY media_accreditation_access_logs_request_idx (request_id),
            CONSTRAINT media_accreditation_access_logs_event_fk FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE CASCADE,
            CONSTRAINT media_accreditation_access_logs_request_fk FOREIGN KEY (request_id) REFERENCES media_accreditation_requests (id) ON DELETE CASCADE,
            CONSTRAINT media_accreditation_access_logs_scanned_by_fk FOREIGN KEY (scanned_by) REFERENCES users (id) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

$migrationStatements = [
    'ALTER TABLE media_accreditation_requests ADD COLUMN estado ENUM("pendiente", "aprobado", "rechazado") NOT NULL DEFAULT "pendiente"',
    'ALTER TABLE media_accreditation_requests ADD COLUMN qr_token VARCHAR(64) DEFAULT NULL',
    'ALTER TABLE media_accreditation_requests ADD COLUMN aprobado_at TIMESTAMP NULL DEFAULT NULL',
    'ALTER TABLE media_accreditation_requests ADD COLUMN rechazado_at TIMESTAMP NULL DEFAULT NULL',
    'ALTER TABLE media_accreditation_requests ADD COLUMN last_scan_at TIMESTAMP NULL DEFAULT NULL',
    'ALTER TABLE media_accreditation_requests ADD COLUMN inside_estado TINYINT(1) NOT NULL DEFAULT 0',
    'ALTER TABLE media_accreditation_requests ADD UNIQUE KEY media_accreditation_requests_qr_unique (qr_token)',
];

foreach ($migrationStatements as $statement) {
    try {
        db()->exec($statement);
    } catch (Exception $e) {
    } catch (Error $e) {
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $tokenInput = trim($_POST['qr_token'] ?? '');
    $selectedEventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : $selectedEventId;

    if ($selectedEventId <= 0) {
        $errors[] = 'Selecciona un evento para registrar accesos.';
    } elseif ($tokenInput === '') {
        $errors[] = 'Escanea o ingresa el QR del medio.';
    } else {
        $stmtRequest = db()->prepare('SELECT * FROM media_accreditation_requests WHERE qr_token = ? AND event_id = ? LIMIT 1');
        $stmtRequest->execute([$tokenInput, $selectedEventId]);
        $request = $stmtRequest->fetch();

        if (!$request) {
            $errors[] = 'El QR no corresponde a una solicitud válida para este evento.';
        } elseif (($request['estado'] ?? '') !== 'aprobado') {
            $errors[] = 'El medio no está autorizado. Estado actual: ' . ($request['estado'] ?? 'pendiente');
        } else {
            $inside = (int) ($request['inside_estado'] ?? 0) === 1;
            $action = $inside ? 'salida' : 'ingreso';
            $userId = isset($_SESSION['user']['id']) ? (int) $_SESSION['user']['id'] : null;

            $stmtLastLog = db()->prepare(
                'SELECT accion, scanned_at FROM media_accreditation_access_logs WHERE request_id = ? ORDER BY scanned_at DESC LIMIT 1'
            );
            $stmtLastLog->execute([(int) $request['id']]);
            $lastLog = $stmtLastLog->fetch();

            $lastScanAt = $request['last_scan_at'] ?? null;
            $lastScanTime = $lastScanAt ? strtotime($lastScanAt) : null;
            $secondsSinceLastScan = $lastScanTime ? (time() - $lastScanTime) : null;

            if ($lastLog && ($lastLog['accion'] ?? '') === $action) {
                $errors[] = 'No es posible registrar dos ' . $action . ' seguidos para este medio.';
            } elseif ($secondsSinceLastScan !== null && $secondsSinceLastScan < $cooldownSeconds) {
                $errors[] = 'Espera unos segundos antes de volver a escanear este QR.';
            } else {
                $stmtLog = db()->prepare(
                    'INSERT INTO media_accreditation_access_logs (event_id, request_id, accion, scanned_by)
                     VALUES (?, ?, ?, ?)'
                );
                $stmtLog->execute([$selectedEventId, (int) $request['id'], $action, $userId]);

                $stmtUpdate = db()->prepare(
                    'UPDATE media_accreditation_requests SET inside_estado = ?, last_scan_at = NOW() WHERE id = ?'
                );
                $stmtUpdate->execute([$inside ? 0 : 1, (int) $request['id']]);

                $notice = $inside
                    ? 'Salida registrada para ' . $request['medio'] . '.'
                    : 'Ingreso registrado para ' . $request['medio'] . '.';
            }
        }
    }
}

if ($selectedEventId > 0) {
    $stmtInside = db()->prepare(
        'SELECT * FROM media_accreditation_requests
         WHERE event_id = ? AND estado = "aprobado" AND inside_estado = 1
         ORDER BY medio'
    );
    $stmtInside->execute([$selectedEventId]);
    $insideMedia = $stmtInside->fetchAll();

    $stmtOutside = db()->prepare(
        'SELECT * FROM media_accreditation_requests
         WHERE event_id = ? AND estado = "aprobado" AND inside_estado = 0
         ORDER BY medio'
    );
    $stmtOutside->execute([$selectedEventId]);
    $outsideMedia = $stmtOutside->fetchAll();
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = 'Control de acceso medios'; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php include('partials/menu.php'); ?>

        <div class="content-page">
            <div class="container-fluid">
                <?php $subtitle = 'Medios de comunicación'; $title = 'Control de acceso'; include('partials/page-title.php'); ?>

                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger" id="scan-error" data-scan-error="<?php echo htmlspecialchars($errors[0] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
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
                    <div class="col-lg-5">
                        <div class="card gm-section">
                            <div class="card-header">
                                <h5 class="card-title mb-1">Registrar ingreso/salida</h5>
                                <p class="text-muted mb-0">Escanea el QR del medio para registrar la entrada o salida.</p>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="event-id">Evento</label>
                                        <select id="event-id" name="event_id" class="form-select" required>
                                            <option value="">Selecciona un evento</option>
                                            <?php foreach ($events as $event) : ?>
                                                <option value="<?php echo (int) $event['id']; ?>" <?php echo $selectedEventId === (int) $event['id'] ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="qr-token">QR del medio</label>
                                        <input type="text" id="qr-token" name="qr_token" class="form-control" placeholder="Escanea o pega el código QR" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                                </form>
                                <hr class="my-4">
                                <div>
                                    <h6 class="mb-2">Escaneo desde celular</h6>
                                    <p class="text-muted small mb-3">Activa la cámara para leer el QR y completar el campo automáticamente.</p>
                                    <div class="d-flex flex-wrap gap-2 mb-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" id="start-scan">Iniciar escaneo</button>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" id="stop-scan" disabled>Detener</button>
                                    </div>
                                    <div class="ratio ratio-4x3 bg-light border rounded">
                                        <video id="qr-video" autoplay muted playsinline style="object-fit: cover;"></video>
                                    </div>
                                    <p id="scan-status" class="text-muted small mt-2 mb-0">Cámara detenida.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card gm-section mb-3">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1">Medios dentro del evento</h5>
                                    <p class="text-muted mb-0">Listado actualizado de medios con ingreso activo.</p>
                                </div>
                                <?php if ($selectedEventId) : ?>
                                    <span class="badge text-bg-primary">Total: <?php echo count($insideMedia); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php if (!$selectedEventId) : ?>
                                    <div class="text-muted">Selecciona un evento para ver los accesos.</div>
                                <?php elseif (empty($insideMedia)) : ?>
                                    <div class="text-muted">No hay medios dentro del evento en este momento.</div>
                                <?php else : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Medio</th>
                                                    <th>Tipo</th>
                                                    <th>Nombre</th>
                                                    <th>RUT</th>
                                                    <th>Correo</th>
                                                    <th>Último escaneo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($insideMedia as $media) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($media['medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['tipo_medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars(trim(($media['nombre'] ?? '') . ' ' . ($media['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['rut'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['correo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['last_scan_at'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card gm-section">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title mb-1">Medios fuera del evento</h5>
                                    <p class="text-muted mb-0">Medios acreditados que aún no han ingresado o ya salieron.</p>
                                </div>
                                <?php if ($selectedEventId) : ?>
                                    <span class="badge text-bg-secondary">Total: <?php echo count($outsideMedia); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php if (!$selectedEventId) : ?>
                                    <div class="text-muted">Selecciona un evento para ver los accesos.</div>
                                <?php elseif (empty($outsideMedia)) : ?>
                                    <div class="text-muted">No hay medios fuera del evento en este momento.</div>
                                <?php else : ?>
                                    <div class="table-responsive">
                                        <table class="table table-striped align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Medio</th>
                                                    <th>Tipo</th>
                                                    <th>Nombre</th>
                                                    <th>RUT</th>
                                                    <th>Correo</th>
                                                    <th>Último escaneo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($outsideMedia as $media) : ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($media['medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['tipo_medio'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars(trim(($media['nombre'] ?? '') . ' ' . ($media['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['rut'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['correo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($media['last_scan_at'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
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

    <script>
        const videoElement = document.getElementById('qr-video');
        const startButton = document.getElementById('start-scan');
        const stopButton = document.getElementById('stop-scan');
        const statusLabel = document.getElementById('scan-status');
        const qrInput = document.getElementById('qr-token');
        const eventSelect = document.getElementById('event-id');
        let currentStream = null;
        let scanning = false;
        let detector = null;
        let submitted = false;

        function updateStatus(message) {
            statusLabel.textContent = message;
        }

        function playErrorTone() {
            try {
                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const oscillator = audioContext.createOscillator();
                const gainNode = audioContext.createGain();
                oscillator.type = 'sine';
                oscillator.frequency.value = 440;
                gainNode.gain.value = 0.1;
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                oscillator.start();
                setTimeout(() => {
                    oscillator.stop();
                    audioContext.close();
                }, 200);
            } catch (error) {
                // Ignore audio errors.
            }
        }

        async function startCamera() {
            if (!navigator.mediaDevices?.getUserMedia) {
                updateStatus('El navegador no permite acceder a la cámara.');
                return;
            }
            const constraints = { video: { facingMode: { exact: 'environment' } } };

            if (currentStream) {
                currentStream.getTracks().forEach((track) => track.stop());
            }
            currentStream = await navigator.mediaDevices.getUserMedia(constraints);
            videoElement.srcObject = currentStream;
            await videoElement.play();
        }

        async function stopCamera() {
            if (currentStream) {
                currentStream.getTracks().forEach((track) => track.stop());
                currentStream = null;
            }
            scanning = false;
            stopButton.disabled = true;
            startButton.disabled = false;
            updateStatus('Cámara detenida.');
        }

        async function scanLoop() {
            if (!scanning || !detector) {
                return;
            }
            try {
                const barcodes = await detector.detect(videoElement);
                if (barcodes.length > 0) {
                    const code = barcodes[0].rawValue;
                    if (code && !submitted) {
                        qrInput.value = code;
                        updateStatus('QR leído. Enviando registro...');
                        if (!eventSelect.value) {
                            updateStatus('Selecciona un evento antes de registrar.');
                            playErrorTone();
                            return;
                        }
                        submitted = true;
                        qrInput.form?.submit();
                        return;
                    }
                }
            } catch (error) {
                updateStatus('No se pudo leer el QR. Intenta nuevamente.');
            }
            requestAnimationFrame(scanLoop);
        }

        startButton?.addEventListener('click', async () => {
            if (!('BarcodeDetector' in window)) {
                updateStatus('Tu navegador no soporta lectura automática de QR.');
                return;
            }
            detector = detector || new BarcodeDetector({ formats: ['qr_code'] });
            startButton.disabled = true;
            stopButton.disabled = false;
            scanning = true;
            submitted = false;
            try {
                await startCamera();
                updateStatus('Cámara activa. Apunta al QR.');
                requestAnimationFrame(scanLoop);
            } catch (error) {
                updateStatus('No se pudo iniciar la cámara.');
                startButton.disabled = false;
                stopButton.disabled = true;
            }
        });

        stopButton?.addEventListener('click', () => {
            stopCamera();
        });

        document.addEventListener('DOMContentLoaded', async () => {
            const errorAlert = document.getElementById('scan-error');
            if (errorAlert) {
                const message = errorAlert.dataset.scanError || 'El medio no está registrado o aprobado.';
                updateStatus(message);
                playErrorTone();
            }
            if (!('BarcodeDetector' in window)) {
                updateStatus('Tu navegador no soporta lectura automática de QR.');
                return;
            }
            detector = detector || new BarcodeDetector({ formats: ['qr_code'] });
            startButton.disabled = true;
            stopButton.disabled = false;
            scanning = true;
            submitted = false;
            try {
                await startCamera();
                updateStatus('Cámara activa. Apunta al QR.');
                requestAnimationFrame(scanLoop);
            } catch (error) {
                updateStatus('No se pudo iniciar la cámara. Pulsa "Iniciar escaneo".');
                startButton.disabled = false;
                stopButton.disabled = true;
            }
        });
    </script>

    <?php include('partials/footer-scripts.php'); ?>
    <?php include('partials/footer.php'); ?>
</body>
</html>
