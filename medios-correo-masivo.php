<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$notice = '';
$templateKey = 'correo_masivo_medios';

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS email_templates (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            template_key VARCHAR(80) NOT NULL,
            subject VARCHAR(200) NOT NULL,
            body_html MEDIUMTEXT NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id),
            UNIQUE KEY email_templates_key_unique (template_key)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

$defaultSubject = 'Información importante para medios: {{evento_titulo}}';
$defaultBody = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Información para medios</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6fb;font-family:Arial,Helvetica,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f4f6fb" style="margin:0;padding:0;">
    <tr>
      <td align="center" style="padding:24px 12px;">
        <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;background-color:#ffffff;border-radius:14px;overflow:hidden;border:1px solid #e6ebf2;">
          <tr>
            <td style="padding:0;background:#007DC6;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="padding:16px 20px;">
                    <table cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="vertical-align:middle;">
                          <img src="{{municipalidad_logo}}" alt="Logo municipalidad" height="30" style="display:block;border:0;outline:none;text-decoration:none;">
                        </td>
                        <td style="vertical-align:middle;padding-left:10px;color:#ffffff;font-weight:700;font-size:15px;letter-spacing:0.2px;">
                          {{municipalidad_nombre}}
                        </td>
                      </tr>
                    </table>
                  </td>
                  <td align="right" style="padding:16px 20px;color:#dbeeff;font-size:12px;white-space:nowrap;">
                    Correo masivo medios
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="height:4px;background:#FCB017;line-height:4px;font-size:0;">&nbsp;</td>
          </tr>
          <tr>
            <td style="padding:26px 24px 10px 24px;color:#1f2a37;font-size:14px;line-height:1.65;">
              <p style="margin:0 0 12px 0;">Hola <strong>{{destinatario_nombre}}</strong>,</p>
              <p style="margin:0 0 14px 0;color:#374151;">
                Compartimos información oficial importante del evento
                <strong>{{evento_titulo}}</strong>.
              </p>
              <table width="100%" cellpadding="0" cellspacing="0" style="margin:16px 0 18px 0;background:#f8fafc;border:1px solid #e6ebf2;border-radius:12px;">
                <tr>
                  <td style="padding:14px 14px 6px 14px;">
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-size:13px;line-height:1.6;color:#374151;">
                      <tr>
                        <td style="padding-top:10px;width:110px;color:#6A7880;"><strong>Fecha</strong></td>
                        <td style="padding-top:10px;">{{evento_fecha_inicio}} - {{evento_fecha_fin}}</td>
                      </tr>
                      <tr>
                        <td style="padding-top:8px;width:110px;color:#6A7880;"><strong>Lugar</strong></td>
                        <td style="padding-top:8px;">{{evento_ubicacion}}</td>
                      </tr>
                      <tr>
                        <td style="padding-top:8px;width:110px;color:#6A7880;"><strong>Tipo</strong></td>
                        <td style="padding-top:8px;">{{evento_tipo}}</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <p style="margin:0 0 8px 0;"><strong style="color:#111827;">Mensaje para medios</strong></p>
              <div style="margin:0 0 16px 0;color:#374151;">
                {{mensaje_importante}}
              </div>
              <p style="margin:0 0 8px 0;"><strong style="color:#111827;">Contacto de coordinación</strong></p>
              <p style="margin:0 0 18px 0;color:#374151;">
                {{contacto_nombre}} · {{contacto_correo}} · {{contacto_telefono}}
              </p>
              <p style="margin:0;color:#6A7880;font-size:12px;">
                Este correo fue enviado por <strong>{{municipalidad_nombre}}</strong>.
              </p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

$renderTemplate = static function (string $template, array $data): string {
    return strtr($template, [
        '{{municipalidad_nombre}}' => $data['municipalidad_nombre'] ?? '',
        '{{municipalidad_logo}}' => $data['municipalidad_logo'] ?? '',
        '{{destinatario_nombre}}' => $data['destinatario_nombre'] ?? '',
        '{{destinatario_correo}}' => $data['destinatario_correo'] ?? '',
        '{{medio_nombre}}' => $data['medio_nombre'] ?? '',
        '{{evento_titulo}}' => $data['evento_titulo'] ?? '',
        '{{evento_fecha_inicio}}' => $data['evento_fecha_inicio'] ?? '',
        '{{evento_fecha_fin}}' => $data['evento_fecha_fin'] ?? '',
        '{{evento_ubicacion}}' => $data['evento_ubicacion'] ?? '',
        '{{evento_tipo}}' => $data['evento_tipo'] ?? '',
        '{{mensaje_importante}}' => $data['mensaje_importante'] ?? '',
        '{{contacto_nombre}}' => $data['contacto_nombre'] ?? '',
        '{{contacto_correo}}' => $data['contacto_correo'] ?? '',
        '{{contacto_telefono}}' => $data['contacto_telefono'] ?? '',
    ]);
};

$municipalidad = get_municipalidad();
$logoUrl = base_url() . '/' . ltrim($municipalidad['logo_path'] ?? 'assets/images/logo.png', '/');

$stmt = db()->prepare('SELECT subject, body_html FROM email_templates WHERE template_key = ? LIMIT 1');
$stmt->execute([$templateKey]);
$template = $stmt->fetch() ?: ['subject' => $defaultSubject, 'body_html' => $defaultBody];

$events = [];
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$selectedEvent = null;
$recipients = [];
$messageInput = trim((string) ($_POST['mensaje_importante'] ?? ''));
$contactNameInput = trim((string) ($_POST['contacto_nombre'] ?? ''));
$contactEmailInput = trim((string) ($_POST['contacto_correo'] ?? ''));
$contactPhoneInput = trim((string) ($_POST['contacto_telefono'] ?? ''));

try {
    $events = db()->query(
        'SELECT e.id, e.titulo,
                COUNT(r.id) AS total_medios,
                SUM(CASE WHEN r.estado = "aprobado" THEN 1 ELSE 0 END) AS medios_aprobados
         FROM events e
         LEFT JOIN media_accreditation_requests r ON r.event_id = e.id
         GROUP BY e.id, e.titulo
         ORDER BY e.fecha_inicio DESC, e.id DESC'
    )->fetchAll();
} catch (Exception $e) {
    $events = [];
} catch (Error $e) {
    $events = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf_token'] ?? null)) {
        $errors[] = 'La sesión expiró, vuelve a intentarlo.';
    } else {
        $action = $_POST['action'] ?? 'send_massive';

        if ($action === 'send_massive') {
            $selectedEventId = (int) ($_POST['event_id'] ?? 0);
            $rawMessage = $messageInput;
            $selectedRecipients = array_map('intval', $_POST['recipient_ids'] ?? []);
            $contactName = $contactNameInput;
            $contactEmail = $contactEmailInput;
            $contactPhone = $contactPhoneInput;

            if ($selectedEventId <= 0) {
                $errors[] = 'Selecciona un evento.';
            }
            if ($rawMessage === '') {
                $errors[] = 'Ingresa un mensaje importante para enviar.';
            }
            if ($contactName === '') {
                $errors[] = 'Ingresa el nombre de contacto de coordinación.';
            }
            if ($contactEmail === '' || !filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Ingresa un correo válido para contacto de coordinación.';
            }
            if ($contactPhone === '') {
                $errors[] = 'Ingresa el teléfono de contacto de coordinación.';
            }
            if (empty($selectedRecipients)) {
                $errors[] = 'Selecciona al menos un medio de comunicación.';
            }

            if (empty($errors)) {
                $stmtEvent = db()->prepare(
                    'SELECT e.id, e.titulo, e.fecha_inicio, e.fecha_fin, e.ubicacion,
                            et.nombre AS tipo_nombre, e.encargado_nombre, e.encargado_email, e.encargado_telefono
                     FROM events e
                     LEFT JOIN event_types et ON et.id = e.tipo_id
                     WHERE e.id = ? LIMIT 1'
                );
                $stmtEvent->execute([$selectedEventId]);
                $event = $stmtEvent->fetch();

                if (!$event) {
                    $errors[] = 'No se encontró el evento seleccionado.';
                } else {
                    $placeholders = implode(',', array_fill(0, count($selectedRecipients), '?'));
                    $params = $selectedRecipients;
                    array_unshift($params, $selectedEventId);

                    $stmtRecipients = db()->prepare(
                        "SELECT id, nombre, apellidos, correo, medio
                         FROM media_accreditation_requests
                         WHERE event_id = ? AND id IN ($placeholders)"
                    );
                    $stmtRecipients->execute($params);
                    $rows = $stmtRecipients->fetchAll();

                    if (empty($rows)) {
                        $errors[] = 'No hay destinatarios válidos para el envío.';
                    } else {
                        $correoConfig = db()->query('SELECT * FROM notificacion_correos LIMIT 1')->fetch() ?: [];
                        $fromEmail = $correoConfig['from_correo'] ?? $correoConfig['correo_imap'] ?? null;
                        $fromName = $correoConfig['from_nombre'] ?? ($municipalidad['nombre'] ?? 'Municipalidad');

                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
                        if (!empty($fromEmail)) {
                            $headers .= 'From: ' . (!empty($fromName) ? ($fromName . ' <' . $fromEmail . '>') : $fromEmail) . "\r\n";
                        }

                        $sentCount = 0;
                        $failCount = 0;
                        foreach ($rows as $row) {
                            $recipientName = trim(($row['nombre'] ?? '') . ' ' . ($row['apellidos'] ?? ''));
                            $payload = [
                                'municipalidad_nombre' => htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8'),
                                'municipalidad_logo' => htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'),
                                'destinatario_nombre' => htmlspecialchars($recipientName !== '' ? $recipientName : 'Equipo de prensa', ENT_QUOTES, 'UTF-8'),
                                'destinatario_correo' => htmlspecialchars($row['correo'] ?? '', ENT_QUOTES, 'UTF-8'),
                                'medio_nombre' => htmlspecialchars($row['medio'] ?? '', ENT_QUOTES, 'UTF-8'),
                                'evento_titulo' => htmlspecialchars($event['titulo'] ?? '', ENT_QUOTES, 'UTF-8'),
                                'evento_fecha_inicio' => htmlspecialchars((string) ($event['fecha_inicio'] ?? ''), ENT_QUOTES, 'UTF-8'),
                                'evento_fecha_fin' => htmlspecialchars((string) ($event['fecha_fin'] ?? ''), ENT_QUOTES, 'UTF-8'),
                                'evento_ubicacion' => htmlspecialchars($event['ubicacion'] ?? '', ENT_QUOTES, 'UTF-8'),
                                'evento_tipo' => htmlspecialchars($event['tipo_nombre'] ?? 'General', ENT_QUOTES, 'UTF-8'),
                                'mensaje_importante' => nl2br(htmlspecialchars($rawMessage, ENT_QUOTES, 'UTF-8')),
                                'contacto_nombre' => htmlspecialchars($contactName, ENT_QUOTES, 'UTF-8'),
                                'contacto_correo' => htmlspecialchars($contactEmail, ENT_QUOTES, 'UTF-8'),
                                'contacto_telefono' => htmlspecialchars($contactPhone, ENT_QUOTES, 'UTF-8'),
                            ];

                            $subject = $renderTemplate($template['subject'] ?? $defaultSubject, $payload);
                            $body = $renderTemplate($template['body_html'] ?? $defaultBody, $payload);

                            if (@mail((string) $row['correo'], $subject, $body, $headers)) {
                                $sentCount += 1;
                            } else {
                                $failCount += 1;
                            }
                        }

                        if ($sentCount > 0) {
                            $notice = sprintf('Correo masivo enviado. Éxitos: %d · Fallidos: %d.', $sentCount, $failCount);
                        } else {
                            $errors[] = 'No fue posible enviar los correos. Revisa la configuración de correo de envío.';
                        }
                    }
                }
            }
        }
    }
}

if ($selectedEventId > 0) {
    $stmtEvent = db()->prepare('SELECT id, titulo, encargado_nombre, encargado_email, encargado_telefono FROM events WHERE id = ? LIMIT 1');
    $stmtEvent->execute([$selectedEventId]);
    $selectedEvent = $stmtEvent->fetch() ?: null;

    $stmtRecipients = db()->prepare(
        'SELECT id, medio, nombre, apellidos, correo, estado
         FROM media_accreditation_requests
         WHERE event_id = ?
         ORDER BY FIELD(estado, "aprobado", "pendiente", "rechazado"), medio, nombre'
    );
    $stmtRecipients->execute([$selectedEventId]);
    $recipients = $stmtRecipients->fetchAll();
}

$previewData = [
    'municipalidad_nombre' => htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8'),
    'municipalidad_logo' => htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'),
    'destinatario_nombre' => 'María Pérez',
    'destinatario_correo' => 'prensa@medio.cl',
    'medio_nombre' => 'Radio Ciudadana',
    'evento_titulo' => 'Cuenta pública comunal',
    'evento_fecha_inicio' => '2026-03-18 10:00',
    'evento_fecha_fin' => '2026-03-18 12:00',
    'evento_ubicacion' => 'Salón consistorial',
    'evento_tipo' => 'Ceremonia',
    'mensaje_importante' => 'Recuerde llegar 30 minutos antes para acreditación.<br>Habrá punto de prensa al cierre.',
    'contacto_nombre' => 'Unidad de comunicaciones',
    'contacto_correo' => 'comunicaciones@municipalidad.cl',
    'contacto_telefono' => '+56 9 1234 5678',
];

?>

<?php include('partials/html.php'); ?>

<head>
    <?php $title = 'Correo masivo medios'; include('partials/title-meta.php'); ?>
    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">
        <?php include('partials/menu.php'); ?>

        <div class="content-page">
            <div class="container-fluid">
                <?php $subtitle = 'Comunicación'; $title = 'Correo masivo'; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card gm-section">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Mensaje importante</h5>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($notice !== '') : ?>
                                    <div class="alert alert-success"><?php echo htmlspecialchars($notice, ENT_QUOTES, 'UTF-8'); ?></div>
                                <?php endif; ?>

                                <p class="text-muted mb-0">En esta sección puedes redactar el mensaje importante y gestionar su envío masivo a los medios acreditados.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card gm-section">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Enviar correo masivo</h5>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="send_massive">
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <label class="form-label" for="event-id">Evento</label>
                                            <select id="event-id" name="event_id" class="form-select" onchange="this.form.submit()">
                                                <option value="0">Selecciona un evento</option>
                                                <?php foreach ($events as $eventItem) : ?>
                                                    <option value="<?php echo (int) $eventItem['id']; ?>" <?php echo $selectedEventId === (int) $eventItem['id'] ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($eventItem['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                        (<?php echo (int) ($eventItem['medios_aprobados'] ?? 0); ?>/<?php echo (int) ($eventItem['total_medios'] ?? 0); ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="form-text">Se muestran medios aprobados/total por evento.</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <label class="form-label" for="mensaje-importante">Mensaje importante</label>
                                            <textarea id="mensaje-importante" name="mensaje_importante" class="form-control" rows="3" placeholder="Escribe aquí la información que deseas comunicar."><?php echo htmlspecialchars($messageInput, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label" for="contacto-nombre">Contacto de coordinación (nombre)</label>
                                            <input type="text" id="contacto-nombre" name="contacto_nombre" class="form-control" value="<?php echo htmlspecialchars($contactNameInput !== '' ? $contactNameInput : ($selectedEvent['encargado_nombre'] ?? ($municipalidad['nombre'] ?? '')), ENT_QUOTES, 'UTF-8'); ?>" placeholder="Nombre y cargo">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label" for="contacto-correo">Contacto de coordinación (correo)</label>
                                            <input type="email" id="contacto-correo" name="contacto_correo" class="form-control" value="<?php echo htmlspecialchars($contactEmailInput !== '' ? $contactEmailInput : ($selectedEvent['encargado_email'] ?? ($municipalidad['correo'] ?? '')), ENT_QUOTES, 'UTF-8'); ?>" placeholder="correo@municipalidad.cl">
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label" for="contacto-telefono">Contacto de coordinación (teléfono)</label>
                                            <input type="text" id="contacto-telefono" name="contacto_telefono" class="form-control" value="<?php echo htmlspecialchars($contactPhoneInput !== '' ? $contactPhoneInput : ($selectedEvent['encargado_telefono'] ?? ($municipalidad['telefono'] ?? '')), ENT_QUOTES, 'UTF-8'); ?>" placeholder="+56 9 ...">
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-3" style="max-height:320px;overflow:auto;">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width:40px;"><input type="checkbox" id="check-all"></th>
                                                    <th>Medio</th>
                                                    <th>Contacto</th>
                                                    <th>Correo</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (empty($recipients)) : ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted py-4">Selecciona un evento para cargar destinatarios.</td>
                                                    </tr>
                                                <?php else : ?>
                                                    <?php foreach ($recipients as $recipient) : ?>
                                                        <?php $rid = (int) $recipient['id']; ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" class="recipient-check" name="recipient_ids[]" value="<?php echo $rid; ?>" <?php echo (($recipient['estado'] ?? '') === 'aprobado') ? 'checked' : ''; ?>>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($recipient['medio'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?php echo htmlspecialchars(trim(($recipient['nombre'] ?? '') . ' ' . ($recipient['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?php echo htmlspecialchars($recipient['correo'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><span class="badge bg-<?php echo ($recipient['estado'] ?? '') === 'aprobado' ? 'success' : (($recipient['estado'] ?? '') === 'rechazado' ? 'danger' : 'warning'); ?>-subtle text-<?php echo ($recipient['estado'] ?? '') === 'aprobado' ? 'success' : (($recipient['estado'] ?? '') === 'rechazado' ? 'danger' : 'warning'); ?>"><?php echo htmlspecialchars((string) ($recipient['estado'] ?? 'pendiente'), ENT_QUOTES, 'UTF-8'); ?></span></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" <?php echo $selectedEventId > 0 ? '' : 'disabled'; ?>>Enviar correo masivo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include('partials/footer.php'); ?>
        </div>
    </div>

    <?php include('partials/customizer.php'); ?>
    <?php include('partials/footer-scripts.php'); ?>
    <script>
        (function () {
            const checkAll = document.getElementById('check-all');
            if (!checkAll) {
                return;
            }
            checkAll.addEventListener('change', function () {
                document.querySelectorAll('.recipient-check').forEach((item) => {
                    item.checked = checkAll.checked;
                });
            });
        })();
    </script>
</body>

</html>
