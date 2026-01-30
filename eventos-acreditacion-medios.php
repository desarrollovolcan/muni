<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$notice = null;
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$selectedEvent = null;
$requests = [];
$publicLink = null;
$shareLinks = [];
const MEDIA_STATUS_PENDING = 'pendiente';
const MEDIA_STATUS_APPROVED = 'aprobado';
const MEDIA_STATUS_REJECTED = 'rechazado';

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

function media_status_badge(string $status): string
{
    switch ($status) {
        case MEDIA_STATUS_APPROVED:
            return 'success';
        case MEDIA_STATUS_REJECTED:
            return 'danger';
        default:
            return 'warning';
    }
}

function build_media_email_headers(?string $fromEmail, ?string $fromName): string
{
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    if ($fromEmail) {
        $headers .= 'From: ' . ($fromName ? $fromName . ' <' . $fromEmail . '>' : $fromEmail) . "\r\n";
    }
    return $headers;
}

function build_media_badge_image(array $request, array $event, array $municipalidad, string $qrUrl): ?array
{
    if (!extension_loaded('gd')) {
        return null;
    }

    $width = 600;
    $height = 900;
    $image = imagecreatetruecolor($width, $height);
    if (!$image) {
        return null;
    }

    $white = imagecolorallocate($image, 255, 255, 255);
    $primary = imagecolorallocate($image, 37, 99, 235);
    $dark = imagecolorallocate($image, 31, 41, 55);
    $gray = imagecolorallocate($image, 75, 85, 99);

    imagefilledrectangle($image, 0, 0, $width, $height, $white);
    imagefilledrectangle($image, 0, 0, $width, 140, $primary);

    $municipalidadName = strtoupper($municipalidad['nombre'] ?? 'Municipalidad');
    $eventTitle = $event['titulo'] ?? 'Evento';
    $fullName = trim(($request['nombre'] ?? '') . ' ' . ($request['apellidos'] ?? ''));

    imagestring($image, 5, 30, 40, $municipalidadName, $white);
    imagestring($image, 5, 30, 80, $eventTitle, $white);

    imagestring($image, 5, 30, 180, 'ACREDITACION MEDIOS', $dark);
    imagestring($image, 5, 30, 220, $fullName, $dark);
    imagestring($image, 4, 30, 260, 'Medio: ' . ($request['medio'] ?? '-'), $gray);
    imagestring($image, 4, 30, 290, 'Cargo: ' . ($request['cargo'] ?? '-'), $gray);
    imagestring($image, 4, 30, 320, 'RUT: ' . ($request['rut'] ?? '-'), $gray);

    $qrData = @file_get_contents($qrUrl);
    if ($qrData) {
        $qrImage = @imagecreatefromstring($qrData);
        if ($qrImage) {
            $qrSize = 280;
            $qrX = (int) (($width - $qrSize) / 2);
            $qrY = 380;
            imagecopyresampled($image, $qrImage, $qrX, $qrY, 0, 0, $qrSize, $qrSize, imagesx($qrImage), imagesy($qrImage));
            imagedestroy($qrImage);
        }
    }

    imagestring($image, 3, 30, 700, 'Token QR: ' . ($request['qr_token'] ?? '-'), $gray);
    imagestring($image, 3, 30, 730, 'Valido para el evento en fechas oficiales.', $gray);

    ob_start();
    imagejpeg($image, null, 90);
    $jpegData = ob_get_clean();
    imagedestroy($image);

    if (!$jpegData) {
        return null;
    }

    return [
        'data' => $jpegData,
        'width' => $width,
        'height' => $height,
    ];
}

function build_pdf_from_jpeg(string $jpegData, int $width, int $height): string
{
    $objects = [];
    $addObject = function (string $content) use (&$objects): int {
        $objects[] = $content;
        return count($objects);
    };

    $imageObject = $addObject(
        '<< /Type /XObject /Subtype /Image /Width ' . $width . ' /Height ' . $height .
        ' /ColorSpace /DeviceRGB /BitsPerComponent 8 /Filter /DCTDecode /Length ' . strlen($jpegData) . ' >>' .
        "\nstream\n" . $jpegData . "\nendstream"
    );

    $contentStream = "q\n{$width} 0 0 {$height} 0 0 cm\n/Im0 Do\nQ";
    $contentObject = $addObject(
        '<< /Length ' . strlen($contentStream) . " >>\nstream\n" . $contentStream . "\nendstream"
    );

    $pageObject = $addObject(
        '<< /Type /Page /Parent 4 0 R /Resources << /XObject << /Im0 ' . $imageObject .
        ' 0 R >> >> /MediaBox [0 0 ' . $width . ' ' . $height . '] /Contents ' . $contentObject . ' 0 R >>'
    );

    $pagesObject = $addObject('<< /Type /Pages /Kids [' . $pageObject . ' 0 R] /Count 1 >>');
    $catalogObject = $addObject('<< /Type /Catalog /Pages ' . $pagesObject . ' 0 R >>');

    $pdf = "%PDF-1.3\n";
    $offsets = [0];

    foreach ($objects as $index => $object) {
        $offsets[$index + 1] = strlen($pdf);
        $pdf .= ($index + 1) . " 0 obj\n" . $object . "\nendobj\n";
    }

    $xrefPosition = strlen($pdf);
    $pdf .= "xref\n0 " . (count($objects) + 1) . "\n";
    $pdf .= "0000000000 65535 f \n";
    foreach ($offsets as $offsetIndex => $offset) {
        if ($offsetIndex === 0) {
            continue;
        }
        $pdf .= sprintf("%010d 00000 n \n", $offset);
    }

    $pdf .= "trailer\n<< /Size " . (count($objects) + 1) . " /Root " . $catalogObject . " 0 R >>\n";
    $pdf .= "startxref\n" . $xrefPosition . "\n%%EOF";

    return $pdf;
}

function build_media_email_with_attachment(string $bodyHtml, ?string $fromEmail, ?string $fromName, ?array $pdfAttachment): array
{
    if (!$pdfAttachment) {
        return [
            'headers' => build_media_email_headers($fromEmail, $fromName),
            'body' => $bodyHtml,
        ];
    }

    $boundary = 'media_mixed_' . bin2hex(random_bytes(8));
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";
    if ($fromEmail) {
        $headers .= 'From: ' . ($fromName ? $fromName . ' <' . $fromEmail . '>' : $fromEmail) . "\r\n";
    }

    $body = "--{$boundary}\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $body .= $bodyHtml . "\r\n";

    $body .= "--{$boundary}\r\n";
    $body .= "Content-Type: application/pdf; name=\"{$pdfAttachment['filename']}\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"{$pdfAttachment['filename']}\"\r\n\r\n";
    $body .= chunk_split(base64_encode($pdfAttachment['content'])) . "\r\n";
    $body .= "--{$boundary}--";

    return [
        'headers' => $headers,
        'body' => $body,
    ];
}

function send_media_approval_email(array $request, array $event, array $municipalidad, ?string $fromEmail, ?string $fromName): bool
{
    $subject = 'Acreditación aprobada - ' . ($event['titulo'] ?? 'Evento');
    $recipientName = htmlspecialchars(trim(($request['nombre'] ?? '') . ' ' . ($request['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8');
    $eventTitle = htmlspecialchars($event['titulo'] ?? 'Evento', ENT_QUOTES, 'UTF-8');
    $eventDates = htmlspecialchars(($event['fecha_inicio'] ?? '') . ' al ' . ($event['fecha_fin'] ?? ''), ENT_QUOTES, 'UTF-8');
    $municipalidadName = htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8');
    $qrToken = htmlspecialchars($request['qr_token'] ?? '', ENT_QUOTES, 'UTF-8');
    $medio = htmlspecialchars($request['medio'] ?? '', ENT_QUOTES, 'UTF-8');
    $tipoMedio = htmlspecialchars($request['tipo_medio'] ?? '', ENT_QUOTES, 'UTF-8');
    $ciudad = htmlspecialchars($request['ciudad'] ?? '', ENT_QUOTES, 'UTF-8');
    $rut = htmlspecialchars($request['rut'] ?? '', ENT_QUOTES, 'UTF-8');
    $cargo = htmlspecialchars($request['cargo'] ?? '', ENT_QUOTES, 'UTF-8');
    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=240x240&data=' . rawurlencode($qrToken);
    $badgeImage = build_media_badge_image($request, $event, $municipalidad, $qrUrl);
    $pdfAttachment = null;
    if ($badgeImage && $badgeImage['data']) {
        $pdfAttachment = [
            'filename' => 'gafete-acreditacion-' . ($request['id'] ?? 'medio') . '.pdf',
            'content' => build_pdf_from_jpeg($badgeImage['data'], $badgeImage['width'], $badgeImage['height']),
        ];
    }

    $bodyHtml = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acreditación aprobada</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6fb;font-family:Arial,sans-serif;color:#1f2b3a;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6fb;padding:24px 0;">
    <tr>
      <td align="center">
        <table width="640" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:14px;overflow:hidden;border:1px solid #e6ebf2;">
          <tr>
            <td style="padding:24px;">
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
                <tr>
                  <td>
                    <h2 style="margin:0;">Acreditación aprobada</h2>
                    <p style="margin:6px 0 0 0;color:#6a7880;">{$municipalidadName}</p>
                  </td>
                </tr>
              </table>
              <p style="margin:0 0 10px 0;">Estimado/a <strong>{$recipientName}</strong>,</p>
              <p style="margin:0 0 12px 0;">Nos complace informar que su solicitud fue aprobada para el evento <strong>{$eventTitle}</strong>.</p>
              <table width="100%" cellpadding="0" cellspacing="0" style="margin:16px 0;background:#f8fafc;border:1px solid #e6ebf2;border-radius:12px;">
                <tr>
                  <td style="padding:16px 20px;">
                    <strong style="display:block;margin-bottom:10px;">Datos de la acreditación</strong>
                    <table width="100%" cellpadding="0" cellspacing="0" style="font-size:14px;color:#1f2b3a;">
                      <tr><td style="padding:4px 0;width:35%;">Medio</td><td style="padding:4px 0;">{$medio}</td></tr>
                      <tr><td style="padding:4px 0;">Tipo</td><td style="padding:4px 0;">{$tipoMedio}</td></tr>
                      <tr><td style="padding:4px 0;">Ciudad</td><td style="padding:4px 0;">{$ciudad}</td></tr>
                      <tr><td style="padding:4px 0;">Nombre</td><td style="padding:4px 0;">{$recipientName}</td></tr>
                      <tr><td style="padding:4px 0;">RUT</td><td style="padding:4px 0;">{$rut}</td></tr>
                      <tr><td style="padding:4px 0;">Cargo</td><td style="padding:4px 0;">{$cargo}</td></tr>
                      <tr><td style="padding:4px 0;">Fechas</td><td style="padding:4px 0;">{$eventDates}</td></tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width="100%" cellpadding="0" cellspacing="0" style="margin:10px 0;">
                <tr>
                  <td style="padding:0 0 12px 0;">
                    <strong>QR de acceso</strong>
                    <p style="margin:6px 0 0 0;font-size:13px;color:#6a7880;">Presenta este QR al ingresar y salir del evento.</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="{$qrUrl}" alt="QR acreditación" width="200" height="200" style="display:block;border:1px solid #e6ebf2;border-radius:12px;">
                  </td>
                </tr>
              </table>
              <p style="margin:0 0 12px 0;font-size:12px;color:#6a7880;">Token QR: {$qrToken}</p>
              <p style="margin:0;">Adjuntamos una tarjeta en PDF para impresión (formato gafete).</p>
              <p style="margin:16px 0 0 0;">Atentamente,<br>{$municipalidadName}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

    $mailPayload = build_media_email_with_attachment($bodyHtml, $fromEmail, $fromName, $pdfAttachment);
    return mail($request['correo'], $subject, $mailPayload['body'], $mailPayload['headers']);
}

function send_media_rejection_email(array $request, array $event, array $municipalidad, ?string $fromEmail, ?string $fromName): bool
{
    $subject = 'Resultado solicitud de acreditación - ' . ($event['titulo'] ?? 'Evento');
    $recipientName = htmlspecialchars(trim(($request['nombre'] ?? '') . ' ' . ($request['apellidos'] ?? '')), ENT_QUOTES, 'UTF-8');
    $eventTitle = htmlspecialchars($event['titulo'] ?? 'Evento', ENT_QUOTES, 'UTF-8');
    $municipalidadName = htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8');

    $bodyHtml = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Solicitud de acreditación</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6fb;font-family:Arial,sans-serif;color:#1f2b3a;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6fb;padding:24px 0;">
    <tr>
      <td align="center">
        <table width="620" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:12px;overflow:hidden;border:1px solid #e6ebf2;">
          <tr>
            <td style="padding:24px;">
              <h2 style="margin:0 0 12px 0;">Resultado solicitud de acreditación</h2>
              <p style="margin:0 0 10px 0;">Estimado/a <strong>{$recipientName}</strong>,</p>
              <p style="margin:0 0 12px 0;">Agradecemos su interés en cubrir el evento <strong>{$eventTitle}</strong>. Tras revisar las solicitudes recibidas, lamentamos informar que en esta oportunidad no podremos aprobar su acreditación.</p>
              <p style="margin:0 0 12px 0;">Esperamos contar con su participación en futuras actividades y le agradecemos su comprensión.</p>
              <p style="margin:0;">Atentamente,<br>{$municipalidadName}</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

    $headers = build_media_email_headers($fromEmail, $fromName);
    return mail($request['correo'], $subject, $bodyHtml, $headers);
}

$events = db()->query('SELECT id, titulo, fecha_inicio, fecha_fin, tipo, ubicacion FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$municipalidad = get_municipalidad();
$correoConfig = db()->query('SELECT * FROM notificacion_correos LIMIT 1')->fetch();
$fromEmail = $correoConfig['from_correo'] ?? $correoConfig['correo_imap'] ?? null;
$fromName = $correoConfig['from_nombre'] ?? ($municipalidad['nombre'] ?? 'Municipalidad');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';
    $requestId = isset($_POST['request_id']) ? (int) $_POST['request_id'] : 0;
    $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;

    if ($requestId <= 0 || $eventId <= 0) {
        $errors[] = 'No se pudo identificar la solicitud seleccionada.';
    } else {
        $stmtRequest = db()->prepare('SELECT * FROM media_accreditation_requests WHERE id = ? AND event_id = ?');
        $stmtRequest->execute([$requestId, $eventId]);
        $requestData = $stmtRequest->fetch();

        $stmtEvent = db()->prepare('SELECT * FROM events WHERE id = ?');
        $stmtEvent->execute([$eventId]);
        $eventData = $stmtEvent->fetch();

        if (!$requestData || !$eventData) {
            $errors[] = 'No se encontró la solicitud o el evento.';
        } else {
            if ($action === 'approve') {
                if (empty($requestData['qr_token'])) {
                    $requestData['qr_token'] = bin2hex(random_bytes(16));
                }

                $stmtUpdate = db()->prepare(
                    'UPDATE media_accreditation_requests
                     SET estado = ?, qr_token = ?, aprobado_at = NOW(), rechazado_at = NULL, inside_estado = 0
                     WHERE id = ?'
                );
                $stmtUpdate->execute([MEDIA_STATUS_APPROVED, $requestData['qr_token'], $requestId]);

                $mailSent = send_media_approval_email($requestData, $eventData, $municipalidad, $fromEmail, $fromName);
                $notice = $mailSent
                    ? 'La solicitud fue aprobada y el correo fue enviado.'
                    : 'La solicitud fue aprobada, pero no se pudo enviar el correo.';
            } elseif ($action === 'reject') {
                $stmtUpdate = db()->prepare(
                    'UPDATE media_accreditation_requests
                     SET estado = ?, rechazado_at = NOW(), inside_estado = 0
                     WHERE id = ?'
                );
                $stmtUpdate->execute([MEDIA_STATUS_REJECTED, $requestId]);

                $mailSent = send_media_rejection_email($requestData, $eventData, $municipalidad, $fromEmail, $fromName);
                $notice = $mailSent
                    ? 'La solicitud fue rechazada y el correo fue enviado.'
                    : 'La solicitud fue rechazada, pero no se pudo enviar el correo.';
            } elseif ($action === 'delete') {
                $stmtDelete = db()->prepare('DELETE FROM media_accreditation_requests WHERE id = ?');
                $stmtDelete->execute([$requestId]);
                $notice = 'La solicitud fue eliminada.';
            } else {
                $errors[] = 'Acción no reconocida.';
            }

            $selectedEventId = $eventId;
        }
    }
}

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
    <style>
        .media-actions-cell {
            position: sticky;
            right: 0;
            background: var(--bs-body-bg);
            min-width: 220px;
            box-shadow: -8px 0 12px rgba(0, 0, 0, 0.05);
        }

        .media-actions-cell .btn {
            white-space: nowrap;
        }
    </style>
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
                                                    <th>Estado</th>
                                                    <th>QR</th>
                                                    <th>Fecha envío</th>
                                                    <th class="media-actions-cell">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($requests as $request) : ?>
                                                    <?php
                                                    $estado = $request['estado'] ?? MEDIA_STATUS_PENDING;
                                                    $badgeClass = media_status_badge($estado);
                                                    $qrToken = $request['qr_token'] ?? '';
                                                    ?>
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
                                                        <td>
                                                            <span class="badge text-bg-<?php echo $badgeClass; ?>">
                                                                <?php echo htmlspecialchars(ucfirst($estado), ENT_QUOTES, 'UTF-8'); ?>
                                                            </span>
                                                        </td>
                                                        <td class="text-muted small"><?php echo $qrToken !== '' ? htmlspecialchars($qrToken, ENT_QUOTES, 'UTF-8') : '-'; ?></td>
                                                        <td><?php echo htmlspecialchars($request['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td class="media-actions-cell">
                                                            <div class="d-flex flex-wrap gap-1">
                                                                <form method="post" class="d-inline">
                                                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                    <input type="hidden" name="action" value="approve">
                                                                    <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                                                    <input type="hidden" name="request_id" value="<?php echo (int) $request['id']; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-success">Aprobar</button>
                                                                </form>
                                                                <form method="post" class="d-inline">
                                                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                    <input type="hidden" name="action" value="reject">
                                                                    <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                                                    <input type="hidden" name="request_id" value="<?php echo (int) $request['id']; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-warning">Rechazar</button>
                                                                </form>
                                                                <form method="post" class="d-inline" onsubmit="return confirm('¿Eliminar esta solicitud? Esta acción no se puede deshacer.');">
                                                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                                    <input type="hidden" name="action" value="delete">
                                                                    <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                                                    <input type="hidden" name="request_id" value="<?php echo (int) $request['id']; ?>">
                                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </td>
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

    <?php include('partials/footer-scripts.php'); ?>
    <?php include('partials/footer.php'); ?>
</body>
</html>
