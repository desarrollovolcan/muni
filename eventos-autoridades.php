<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$validationErrors = [];
$validationNotice = null;
$validationLink = null;
$whatsappLinks = [];
$emailPreview = null;
$events = db()->query('SELECT id, titulo FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$assignedEvents = db()->query(
    'SELECT e.id,
            e.titulo,
            COUNT(ea.authority_id) AS authority_count
     FROM events e
     INNER JOIN event_authorities ea ON ea.event_id = e.id
     WHERE e.habilitado = 1
     GROUP BY e.id
     ORDER BY e.fecha_inicio DESC'
)->fetchAll();
$authorities = db()->query(
    'SELECT a.id,
            a.nombre,
            a.tipo,
            g.id AS grupo_id,
            g.nombre AS grupo_nombre
     FROM authorities a
     LEFT JOIN authority_groups g ON g.id = a.group_id
     WHERE a.estado = 1
     ORDER BY COALESCE(g.nombre, ""), a.nombre'
)->fetchAll();
$users = db()->query('SELECT id, nombre, apellido, correo, telefono FROM users WHERE estado = 1 ORDER BY nombre, apellido')->fetchAll();
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$linkedAuthorities = [];
$emailTemplate = null;
$eventValidationLink = null;
$selectedEvent = null;
$authoritiesByGroup = [];
$displayAuthoritiesByGroup = [];
$saveNotice = null;
$editRequestId = isset($_GET['edit_request_id']) ? (int) $_GET['edit_request_id'] : 0;
$editRequest = null;
$assignedEventIds = array_map(static function ($event) {
    return (int) $event['id'];
}, $assignedEvents);
$availableEvents = array_filter($events, static function ($event) use ($assignedEventIds) {
    return !in_array((int) $event['id'], $assignedEventIds, true);
});
$selectedAuthoritiesCount = 0;

foreach ($authorities as $authority) {
    $groupId = $authority['grupo_id'] ? (int) $authority['grupo_id'] : 0;
    $groupName = $authority['grupo_nombre'] ?: 'Sin grupo';
    if (!isset($authoritiesByGroup[$groupId])) {
        $authoritiesByGroup[$groupId] = [
            'name' => $groupName,
            'items' => [],
        ];
    }
    $authoritiesByGroup[$groupId]['items'][] = $authority;
}

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

try {
    db()->exec(
        'CREATE TABLE IF NOT EXISTS notificacion_whatsapp (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT,
            phone_number_id VARCHAR(80) NOT NULL,
            access_token TEXT NOT NULL,
            numero_envio VARCHAR(30) DEFAULT NULL,
            country_code VARCHAR(6) DEFAULT NULL,
            template_name VARCHAR(120) DEFAULT NULL,
            template_language VARCHAR(10) DEFAULT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
    );
} catch (Exception $e) {
} catch (Error $e) {
}

if ($selectedEventId > 0) {
    $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
    $stmt->execute([$selectedEventId]);
    $selectedEvent = $stmt->fetch();
    if ($selectedEvent) {
        $selectedEvent['validation_token'] = ensure_event_validation_token($selectedEventId, $selectedEvent['validation_token'] ?? null);
        $eventValidationLink = base_url() . '/eventos-validacion.php?token=' . urlencode($selectedEvent['validation_token']);
    }

    $stmt = db()->prepare('SELECT authority_id FROM event_authorities WHERE event_id = ?');
    $stmt->execute([$selectedEventId]);
    $linkedAuthorities = array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
    $selectedAuthoritiesCount = count($linkedAuthorities);

}

foreach ($authoritiesByGroup as $groupId => $group) {
    if (!empty($group['items'])) {
        $displayAuthoritiesByGroup[$groupId] = [
            'name' => $group['name'],
            'items' => $group['items'],
        ];
    }
}

if ($selectedEventId > 0 && $editRequestId > 0) {
    $stmt = db()->prepare('SELECT * FROM event_authority_requests WHERE id = ? AND event_id = ?');
    $stmt->execute([$editRequestId, $selectedEventId]);
    $editRequest = $stmt->fetch() ?: null;
}

try {
    $stmt = db()->prepare('SELECT subject, body_html FROM email_templates WHERE template_key = ? LIMIT 1');
    $stmt->execute(['validacion_autoridades']);
    $emailTemplate = $stmt->fetch() ?: null;
} catch (Exception $e) {
} catch (Error $e) {
}

function build_event_validation_email(array $municipalidad, array $event, array $authorities, string $validationUrl, ?string $recipientName): string
{
    $primaryColor = $municipalidad['color_primary'] ?? '#1565c0';
    $secondaryColor = $municipalidad['color_secondary'] ?? '#0d47a1';
    $logoPath = $municipalidad['logo_path'] ?? 'assets/images/logo.png';
    $logoUrl = $logoPath;
    $safeRecipient = htmlspecialchars($recipientName ?: 'Equipo municipal', ENT_QUOTES, 'UTF-8');
    $safeTitle = htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8');
    $safeLocation = htmlspecialchars($event['ubicacion'], ENT_QUOTES, 'UTF-8');
    $safeType = htmlspecialchars($event['tipo'], ENT_QUOTES, 'UTF-8');
    $safeStart = htmlspecialchars($event['fecha_inicio'], ENT_QUOTES, 'UTF-8');
    $safeEnd = htmlspecialchars($event['fecha_fin'], ENT_QUOTES, 'UTF-8');
    $safeDescription = nl2br(htmlspecialchars($event['descripcion'], ENT_QUOTES, 'UTF-8'));
    $safeUrl = htmlspecialchars($validationUrl, ENT_QUOTES, 'UTF-8');

    $authorityItems = '';
    $groupedAuthorities = [];
    foreach ($authorities as $authority) {
        $groupId = $authority['grupo_id'] ? (int) $authority['grupo_id'] : 0;
        $groupName = $authority['grupo_nombre'] ?: 'Sin grupo';
        if (!isset($groupedAuthorities[$groupId])) {
            $groupedAuthorities[$groupId] = [
                'name' => $groupName,
                'items' => [],
            ];
        }
        $groupedAuthorities[$groupId]['items'][] = $authority;
    }
    foreach ($groupedAuthorities as $group) {
        if (empty($group['items'])) {
            continue;
        }
        $authorityItems .= '<li style="margin-top:8px;"><strong>' . htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') . '</strong><ul style="margin:6px 0 0 16px;">';
        foreach ($group['items'] as $authority) {
            $authorityItems .= '<li>' . htmlspecialchars($authority['nombre'], ENT_QUOTES, 'UTF-8') . ' · ' . htmlspecialchars($authority['tipo'], ENT_QUOTES, 'UTF-8') . '</li>';
        }
        $authorityItems .= '</ul></li>';
    }

    return <<<HTML
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Validación de autoridades</title>
  </head>
  <body style="margin:0;padding:0;background-color:#f4f6fb;font-family:Arial,sans-serif;color:#1f2b3a;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6fb;padding:32px 0;">
      <tr>
        <td align="center">
          <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(15,23,42,0.08);">
            <tr>
              <td style="background:linear-gradient(120deg, {$primaryColor}, {$secondaryColor});padding:24px 32px;color:#ffffff;">
                <img src="{$logoUrl}" alt="Logo" style="height:28px;vertical-align:middle;">
                <span style="font-size:18px;font-weight:bold;margin-left:12px;vertical-align:middle;">{$municipalidad['nombre']}</span>
              </td>
            </tr>
            <tr>
              <td style="padding:32px;">
                <p style="margin:0 0 12px;font-size:16px;">Hola {$safeRecipient},</p>
                <p style="margin:0 0 20px;font-size:15px;line-height:1.5;">
                  Se requiere tu validación para confirmar qué autoridades asistirán al evento <strong>{$safeTitle}</strong>.
                </p>
                <div style="background-color:#f8fafc;border-radius:12px;padding:16px 20px;margin-bottom:20px;">
                  <p style="margin:0 0 6px;font-size:13px;color:#64748b;">Detalles del evento</p>
                  <p style="margin:0;font-size:15px;font-weight:bold;color:#0f172a;">{$safeTitle}</p>
                  <p style="margin:6px 0 0;font-size:13px;color:#475569;">{$safeLocation} · {$safeType}</p>
                  <p style="margin:6px 0 0;font-size:13px;color:#475569;">{$safeStart} - {$safeEnd}</p>
                  <p style="margin:10px 0 0;font-size:13px;color:#475569;">{$safeDescription}</p>
                </div>
                <p style="margin:0 0 8px;font-size:13px;color:#64748b;">Autoridades preseleccionadas</p>
                <ul style="margin:0 0 20px;padding-left:20px;font-size:13px;color:#0f172a;line-height:1.4;">
                  {$authorityItems}
                </ul>
                <div style="text-align:center;margin:24px 0;">
                  <a href="{$safeUrl}" style="background-color:{$primaryColor};color:#ffffff;text-decoration:none;padding:12px 24px;border-radius:999px;font-weight:bold;display:inline-block;">Validar autoridades</a>
                </div>
                <p style="margin:0;font-size:12px;color:#94a3b8;">
                  Si no puedes abrir el botón, copia y pega este enlace en tu navegador:<br>
                  <a href="{$safeUrl}" style="color:{$secondaryColor};word-break:break-all;">{$safeUrl}</a>
                </p>
              </td>
            </tr>
            <tr>
              <td style="background-color:#f8fafc;padding:16px 32px;text-align:center;font-size:12px;color:#94a3b8;">
                Correo automático del sistema municipal · {$municipalidad['nombre']}
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
HTML;
}

function render_event_email_template(array $template, array $data): string
{
    $replacements = [
        '{{municipalidad_nombre}}' => $data['municipalidad_nombre'] ?? '',
        '{{municipalidad_logo}}' => $data['municipalidad_logo'] ?? '',
        '{{destinatario_nombre}}' => $data['destinatario_nombre'] ?? '',
        '{{evento_titulo}}' => $data['evento_titulo'] ?? '',
        '{{evento_descripcion}}' => $data['evento_descripcion'] ?? '',
        '{{evento_fecha_inicio}}' => $data['evento_fecha_inicio'] ?? '',
        '{{evento_fecha_fin}}' => $data['evento_fecha_fin'] ?? '',
        '{{evento_ubicacion}}' => $data['evento_ubicacion'] ?? '',
        '{{evento_tipo}}' => $data['evento_tipo'] ?? '',
        '{{autoridades_lista}}' => $data['autoridades_lista'] ?? '',
        '{{validation_link}}' => $data['validation_link'] ?? '',
    ];

    return strtr($template['body_html'] ?? '', $replacements);
}

function render_event_email_subject(string $subject, array $data): string
{
    $replacements = [
        '{{municipalidad_nombre}}' => $data['municipalidad_nombre'] ?? '',
        '{{destinatario_nombre}}' => $data['destinatario_nombre'] ?? '',
        '{{evento_titulo}}' => $data['evento_titulo'] ?? '',
        '{{evento_fecha_inicio}}' => $data['evento_fecha_inicio'] ?? '',
        '{{evento_fecha_fin}}' => $data['evento_fecha_fin'] ?? '',
        '{{evento_ubicacion}}' => $data['evento_ubicacion'] ?? '',
        '{{evento_tipo}}' => $data['evento_tipo'] ?? '',
    ];

    return strtr($subject, $replacements);
}

function normalize_whatsapp_phone(?string $phone, ?string $countryCode): ?string
{
    if ($phone === null) {
        return null;
    }
    $digits = preg_replace('/\D+/', '', $phone);
    if ($digits === '') {
        return null;
    }
    $countryCode = $countryCode ? preg_replace('/\D+/', '', $countryCode) : '';
    if ($countryCode !== '' && strpos($digits, $countryCode) !== 0) {
        $digits = ltrim($digits, '0');
        $digits = $countryCode . $digits;
    }
    return $digits;
}

function send_whatsapp_message(array $config, string $to, string $message, ?string &$error = null): bool
{
    $phoneNumberId = $config['phone_number_id'] ?? '';
    $accessToken = $config['access_token'] ?? '';
    if ($phoneNumberId === '' || $accessToken === '') {
        $error = 'Configuración de WhatsApp incompleta.';
        return false;
    }

    $url = 'https://graph.facebook.com/v17.0/' . $phoneNumberId . '/messages';
    $payload = [
        'messaging_product' => 'whatsapp',
        'to' => $to,
        'type' => 'text',
        'text' => [
            'preview_url' => true,
            'body' => $message,
        ],
    ];

    if (!empty($config['template_name']) && !empty($config['template_language'])) {
        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => $config['template_name'],
                'language' => [
                    'code' => $config['template_language'],
                ],
                'components' => [
                    [
                        'type' => 'body',
                        'parameters' => [
                            [
                                'type' => 'text',
                                'text' => $message,
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $accessToken,
        'Content-Type: application/json',
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $response = curl_exec($ch);
    $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($response === false || $httpCode >= 400) {
        $error = $curlError !== '' ? $curlError : 'Respuesta inválida de WhatsApp.';
        return false;
    }

    return true;
}

function build_whatsapp_link(string $phone, string $message): string
{
    return 'https://wa.me/' . $phone . '?text=' . urlencode($message);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? 'save_authorities';

    if ($action === 'save_authorities') {
        $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
        $authorityIds = array_map('intval', $_POST['authorities'] ?? []);

        if ($eventId === 0) {
            $errors[] = 'Selecciona un evento válido.';
        }

        $didSubmitSave = isset($_POST['save_authorities']);
        if (empty($errors) && $didSubmitSave) {
            $stmtDelete = db()->prepare('DELETE FROM event_authorities WHERE event_id = ?');
            $stmtDelete->execute([$eventId]);

            if (!empty($authorityIds)) {
                $stmtInsert = db()->prepare('INSERT INTO event_authorities (event_id, authority_id) VALUES (?, ?)');
                foreach ($authorityIds as $authorityId) {
                    $stmtInsert->execute([$eventId, $authorityId]);
                }
            }

            redirect('eventos-autoridades.php?event_id=' . $eventId . '&saved=1');
        }
    }

    if ($action === 'update_request') {
        $requestId = isset($_POST['request_id']) ? (int) $_POST['request_id'] : 0;
        $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
        $nombre = trim($_POST['destinatario_nombre'] ?? '');
        $correo = trim($_POST['destinatario_correo'] ?? '');
        $estado = $_POST['estado'] ?? 'pendiente';
        $correoEnviado = isset($_POST['correo_enviado']) && (int) $_POST['correo_enviado'] === 1 ? 1 : 0;

        if ($eventId === 0 || $requestId === 0) {
            $validationErrors[] = 'Selecciona una solicitud válida para editar.';
        }
        if ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $validationErrors[] = 'El correo ingresado no es válido.';
        }
        if (!in_array($estado, ['pendiente', 'respondido'], true)) {
            $validationErrors[] = 'El estado seleccionado no es válido.';
        }

        if (empty($validationErrors)) {
            $respondedAt = null;
            if ($estado === 'respondido') {
                $respondedAt = date('Y-m-d H:i:s');
            }
            $stmt = db()->prepare(
                'UPDATE event_authority_requests
                 SET destinatario_nombre = ?, destinatario_correo = ?, estado = ?, correo_enviado = ?, responded_at = ?
                 WHERE id = ? AND event_id = ?'
            );
            $stmt->execute([
                $nombre !== '' ? $nombre : null,
                $correo !== '' ? $correo : null,
                $estado,
                $correoEnviado,
                $respondedAt,
                $requestId,
                $eventId,
            ]);
            redirect('eventos-autoridades.php?event_id=' . $eventId . '&updated=1');
        }
    }

    if ($action === 'send_validation') {
        $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
        $recipientUserIds = array_map('intval', $_POST['recipient_user_ids'] ?? []);
        $deliveryChannel = $_POST['delivery_channel'] ?? 'email';

        if ($eventId === 0) {
            $validationErrors[] = 'Selecciona un evento válido.';
        }

        $recipients = [];
        $whatsappRecipients = [];
        if (!empty($recipientUserIds)) {
            $placeholders = implode(',', array_fill(0, count($recipientUserIds), '?'));
            $stmt = db()->prepare("SELECT nombre, apellido, correo, telefono FROM users WHERE id IN ($placeholders)");
            $stmt->execute($recipientUserIds);
            foreach ($stmt->fetchAll() as $user) {
                if (!empty($user['correo'])) {
                    $recipients[] = [
                        'nombre' => trim(($user['nombre'] ?? '') . ' ' . ($user['apellido'] ?? '')),
                        'correo' => $user['correo'],
                    ];
                }
                if (!empty($user['telefono'])) {
                    $whatsappRecipients[] = [
                        'nombre' => trim(($user['nombre'] ?? '') . ' ' . ($user['apellido'] ?? '')),
                        'telefono' => $user['telefono'],
                    ];
                }
            }
        }

        $needsEmail = in_array($deliveryChannel, ['email', 'both'], true);
        $needsWhatsapp = in_array($deliveryChannel, ['whatsapp', 'both'], true);
        $needsWhatsappLink = $deliveryChannel === 'whatsapp_link';

        if ($needsEmail && empty($recipients)) {
            $validationErrors[] = 'Selecciona al menos un usuario con correo válido para enviar la validación.';
        }
        if (($needsWhatsapp || $needsWhatsappLink) && empty($whatsappRecipients)) {
            $validationErrors[] = 'Selecciona al menos un usuario con teléfono para enviar WhatsApp.';
        }

        $event = null;
        $eventAuthorities = [];
        if (empty($validationErrors) && $eventId > 0) {
            $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
            $stmt->execute([$eventId]);
            $event = $stmt->fetch();

            $stmt = db()->prepare(
                'SELECT a.id,
                        a.nombre,
                        a.tipo,
                        g.id AS grupo_id,
                        g.nombre AS grupo_nombre
                 FROM authorities a
                 INNER JOIN event_authorities ea ON ea.authority_id = a.id
                 LEFT JOIN authority_groups g ON g.id = a.group_id
                 WHERE ea.event_id = ?
                 ORDER BY COALESCE(g.nombre, ""), a.nombre'
            );
            $stmt->execute([$eventId]);
            $eventAuthorities = $stmt->fetchAll();

            if (!$event) {
                $validationErrors[] = 'No se encontró el evento seleccionado.';
            } elseif (empty($eventAuthorities)) {
                $validationErrors[] = 'El evento aún no tiene autoridades preseleccionadas.';
            }
        }

        if (empty($validationErrors) && $event) {
            $event['validation_token'] = ensure_event_validation_token($eventId, $event['validation_token'] ?? null);
            $validationUrl = base_url() . '/eventos-validacion.php?token=' . urlencode($event['validation_token']);

            $municipalidad = get_municipalidad();
            $logoPath = $municipalidad['logo_path'] ?? 'assets/images/logo.png';
            $logoUrl = preg_match('/^https?:\\/\\//', $logoPath) ? $logoPath : base_url() . '/' . ltrim($logoPath, '/');
            $municipalidad['logo_path'] = $logoUrl;
            $subject = 'Validación de autoridades: ' . $event['titulo'];
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";

            $correoConfig = db()->query('SELECT * FROM notificacion_correos LIMIT 1')->fetch();
            $fromEmail = $correoConfig['from_correo'] ?? $correoConfig['correo_imap'] ?? null;
            $fromName = $correoConfig['from_nombre'] ?? ($municipalidad['nombre'] ?? 'Municipalidad');
            if ($fromEmail) {
                $headers .= 'From: ' . ($fromName ? $fromName . ' <' . $fromEmail . '>' : $fromEmail) . "\r\n";
            }

            $stmtRequest = db()->prepare('SELECT id FROM event_authority_requests WHERE event_id = ? AND token = ? LIMIT 1');
            $stmtRequest->execute([$eventId, $event['validation_token']]);
            $requestId = $stmtRequest->fetchColumn();
            if (!$requestId) {
                $stmtInsert = db()->prepare('INSERT INTO event_authority_requests (event_id, destinatario_nombre, destinatario_correo, token, correo_enviado) VALUES (?, ?, ?, ?, ?)');
                $placeholderEmail = $municipalidad['correo'] ?? 'validacion@municipalidad.local';
                $stmtInsert->execute([
                    $eventId,
                    'Enlace público',
                    $placeholderEmail,
                    $event['validation_token'],
                    0,
                ]);
            }

            $allSent = true;
            $anySent = false;
            $whatsappSent = true;
            $whatsappAny = false;

            $whatsappConfig = null;
            if ($needsWhatsapp || $needsWhatsappLink) {
                $whatsappConfig = db()->query('SELECT * FROM notificacion_whatsapp LIMIT 1')->fetch();
                if ($needsWhatsapp && (!$whatsappConfig || empty($whatsappConfig['phone_number_id']) || empty($whatsappConfig['access_token']))) {
                    $validationErrors[] = 'Configura WhatsApp Business API antes de enviar mensajes.';
                }
            }

            if (empty($validationErrors) && $needsEmail) {
                foreach ($recipients as $recipient) {
                    $emailPreview = build_event_validation_email($municipalidad, $event, $eventAuthorities, $validationUrl, $recipient['nombre'] ?? null);
                    if ($emailTemplate) {
                        $autoridadesLista = '';
                        $groupedAuthorities = [];
                        foreach ($eventAuthorities as $authority) {
                            $groupId = $authority['grupo_id'] ? (int) $authority['grupo_id'] : 0;
                            $groupName = $authority['grupo_nombre'] ?: 'Sin grupo';
                            if (!isset($groupedAuthorities[$groupId])) {
                                $groupedAuthorities[$groupId] = [
                                    'name' => $groupName,
                                    'items' => [],
                                ];
                            }
                            $groupedAuthorities[$groupId]['items'][] = $authority;
                        }
                        foreach ($groupedAuthorities as $group) {
                            if (empty($group['items'])) {
                                continue;
                            }
                            $autoridadesLista .= '<p style="margin:16px 0 8px;"><strong>' . htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8') . '</strong></p><ul style="margin-top:0;">';
                            foreach ($group['items'] as $authority) {
                                $autoridadesLista .= '<li>' . htmlspecialchars($authority['nombre'], ENT_QUOTES, 'UTF-8') . ' · ' . htmlspecialchars($authority['tipo'], ENT_QUOTES, 'UTF-8') . '</li>';
                            }
                            $autoridadesLista .= '</ul>';
                        }
                        $logoPath = $municipalidad['logo_path'] ?? 'assets/images/logo.png';
                        $logoUrl = preg_match('/^https?:\\/\\//', $logoPath) ? $logoPath : base_url() . '/' . ltrim($logoPath, '/');
                        $templateData = [
                            'municipalidad_nombre' => htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8'),
                            'municipalidad_logo' => htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'),
                            'destinatario_nombre' => htmlspecialchars($recipient['nombre'] ?? 'Equipo municipal', ENT_QUOTES, 'UTF-8'),
                            'evento_titulo' => htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'),
                            'evento_descripcion' => nl2br(htmlspecialchars($event['descripcion'], ENT_QUOTES, 'UTF-8')),
                            'evento_fecha_inicio' => htmlspecialchars($event['fecha_inicio'], ENT_QUOTES, 'UTF-8'),
                            'evento_fecha_fin' => htmlspecialchars($event['fecha_fin'], ENT_QUOTES, 'UTF-8'),
                            'evento_ubicacion' => htmlspecialchars($event['ubicacion'], ENT_QUOTES, 'UTF-8'),
                            'evento_tipo' => htmlspecialchars($event['tipo'], ENT_QUOTES, 'UTF-8'),
                            'autoridades_lista' => $autoridadesLista,
                            'validation_link' => htmlspecialchars($validationUrl, ENT_QUOTES, 'UTF-8'),
                        ];
                        $subjectData = [
                            'municipalidad_nombre' => $municipalidad['nombre'] ?? 'Municipalidad',
                            'destinatario_nombre' => $recipient['nombre'] ?? 'Equipo municipal',
                            'evento_titulo' => $event['titulo'] ?? '',
                            'evento_fecha_inicio' => $event['fecha_inicio'] ?? '',
                            'evento_fecha_fin' => $event['fecha_fin'] ?? '',
                            'evento_ubicacion' => $event['ubicacion'] ?? '',
                            'evento_tipo' => $event['tipo'] ?? '',
                        ];
                        $emailPreview = render_event_email_template($emailTemplate, $templateData);
                        if (!empty($emailTemplate['subject'])) {
                            $subject = render_event_email_subject($emailTemplate['subject'], $subjectData);
                        }
                    }
                    $mailSent = mail($recipient['correo'], $subject, $emailPreview, $headers);
                    $anySent = $anySent || $mailSent;
                    $allSent = $allSent && $mailSent;
                }
            }

            if (empty($validationErrors) && $needsWhatsapp && $whatsappConfig) {
                foreach ($whatsappRecipients as $recipient) {
                    $normalizedPhone = normalize_whatsapp_phone($recipient['telefono'] ?? null, $whatsappConfig['country_code'] ?? null);
                    if ($normalizedPhone === null) {
                        $whatsappSent = false;
                        continue;
                    }
                    $message = 'Hola ' . ($recipient['nombre'] ?: 'equipo municipal') . '. '
                        . 'Por favor valida las autoridades del evento "' . ($event['titulo'] ?? '') . '". '
                        . 'Link: ' . $validationUrl;
                    $sendError = null;
                    $sent = send_whatsapp_message($whatsappConfig, $normalizedPhone, $message, $sendError);
                    $whatsappAny = $whatsappAny || $sent;
                    $whatsappSent = $whatsappSent && $sent;
                }
            }

            if (empty($validationErrors) && $needsWhatsappLink) {
                foreach ($whatsappRecipients as $recipient) {
                    $normalizedPhone = normalize_whatsapp_phone(
                        $recipient['telefono'] ?? null,
                        $whatsappConfig['country_code'] ?? null
                    );
                    if ($normalizedPhone === null) {
                        continue;
                    }
                    $message = 'Hola ' . ($recipient['nombre'] ?: 'equipo municipal') . '. '
                        . 'Por favor valida las autoridades del evento "' . ($event['titulo'] ?? '') . '". '
                        . 'Link: ' . $validationUrl;
                    $whatsappLinks[] = [
                        'nombre' => $recipient['nombre'] ?: 'Equipo municipal',
                        'telefono' => $normalizedPhone,
                        'link' => build_whatsapp_link($normalizedPhone, $message),
                    ];
                }
            }

            $stmtUpdate = db()->prepare('UPDATE event_authority_requests SET correo_enviado = ? WHERE event_id = ? AND token = ?');
            $stmtUpdate->execute([$anySent ? 1 : 0, $eventId, $event['validation_token']]);

            $validationLink = $validationUrl;
            if ($needsWhatsappLink && !empty($whatsappLinks)) {
                $validationNotice = 'Links de WhatsApp generados correctamente.';
            } elseif ($needsEmail && $allSent && !$needsWhatsapp) {
                $validationNotice = 'Correos de validación enviados correctamente.';
            } elseif ($needsWhatsapp && $whatsappSent && !$needsEmail) {
                $validationNotice = 'Mensajes de WhatsApp enviados correctamente.';
            } elseif ($needsEmail && $needsWhatsapp && $allSent && $whatsappSent) {
                $validationNotice = 'Correos y WhatsApp enviados correctamente.';
            } else {
                $validationErrors[] = 'Algunos envíos no se pudieron completar automáticamente. Comparte el enlace de validación manualmente si es necesario.';
            }
        }
    }
}

if (isset($_GET['saved']) && $_GET['saved'] === '1') {
    $saveNotice = 'Autoridades actualizadas correctamente.';
}
if (isset($_GET['updated']) && $_GET['updated'] === '1') {
    $validationNotice = 'La solicitud fue actualizada correctamente.';
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
                                <button type="submit" form="evento-autoridades-form" name="save_authorities" value="1" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            <div class="card-body">
                                <?php if ($saveNotice) : ?>
                                    <div class="alert alert-success" id="save-notice">
                                        <?php echo htmlspecialchars($saveNotice, ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <form id="evento-autoridades-form" method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="save_authorities">
                                    <div class="row g-4">
                                        <div class="col-lg-4">
                                            <div class="list-group">
                                                <div class="list-group-item">
                                                    <h6 class="text-uppercase text-muted small mb-2">Paso 1 · Selecciona un evento</h6>
                                                    <label class="form-label" for="evento-select">Evento</label>
                                                    <?php if ($selectedEventId > 0 && in_array($selectedEventId, $assignedEventIds, true)) : ?>
                                                        <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                                        <div class="form-control-plaintext fw-semibold text-primary">
                                                            <?php echo htmlspecialchars($selectedEvent['titulo'] ?? 'Evento seleccionado', ENT_QUOTES, 'UTF-8'); ?>
                                                        </div>
                                                        <div class="form-text">Autoridades marcadas: <?php echo $selectedAuthoritiesCount; ?>.</div>
                                                    <?php else : ?>
                                                        <select id="evento-select" name="event_id" class="form-select">
                                                            <option value="">Selecciona un evento</option>
                                                            <?php foreach ($availableEvents as $event) : ?>
                                                                <option value="<?php echo (int) $event['id']; ?>" <?php echo $selectedEventId === (int) $event['id'] ? 'selected' : ''; ?>>
                                                                    <?php echo htmlspecialchars($event['titulo'], ENT_QUOTES, 'UTF-8'); ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="form-text">Solo se muestran eventos sin autoridades asignadas.</div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="list-group-item">
                                                    <h6 class="text-uppercase text-muted small mb-2">Paso 2 · Acciones rápidas</h6>
                                                    <div class="btn-group w-100" role="group" aria-label="Acciones de autoridades">
                                                        <button type="button" class="btn btn-outline-primary" id="select-all-authorities">Seleccionar todas</button>
                                                        <button type="button" class="btn btn-outline-primary" id="clear-all-authorities">Limpiar selección</button>
                                                    </div>
                                                    <div class="text-muted small mt-2">Seleccionadas: <?php echo $selectedAuthoritiesCount; ?> autoridades.</div>
                                                </div>
                                                <div class="list-group-item">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h6 class="mb-0">Eventos con autoridades</h6>
                                                        <span class="badge text-bg-light text-muted"><?php echo count($assignedEvents); ?></span>
                                                    </div>
                                                    <?php if (!empty($assignedEvents)) : ?>
                                                        <div class="list-group list-group-flush" style="max-height: 320px; overflow:auto;">
                                                            <?php foreach ($assignedEvents as $assignedEvent) : ?>
                                                                <div class="list-group-item d-flex align-items-center justify-content-between px-0">
                                                                    <span class="text-truncate"><?php echo htmlspecialchars($assignedEvent['titulo'], ENT_QUOTES, 'UTF-8'); ?></span>
                                                                    <a class="btn btn-sm btn-outline-primary" href="eventos-autoridades.php?event_id=<?php echo (int) $assignedEvent['id']; ?>">Editar</a>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="text-muted">Todavía no hay eventos con autoridades asignadas.</div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div class="list-group">
                                                <div class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                                        <h6 class="mb-0">Paso 3 · Selecciona autoridades</h6>
                                                        <span class="text-muted small">Selecciona las autoridades para el evento.</span>
                                                    </div>
                                                    <div class="row">
                                                        <?php if (empty($displayAuthoritiesByGroup)) : ?>
                                                            <div class="col-12 text-muted">No hay autoridades registradas.</div>
                                                        <?php else : ?>
                                                            <?php foreach ($displayAuthoritiesByGroup as $group) : ?>
                                                                <?php if (empty($group['items'])) : ?>
                                                                    <?php continue; ?>
                                                                <?php endif; ?>
                                                                <div class="col-12 mt-3">
                                                                    <h6 class="text-uppercase text-muted small mb-2"><?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?></h6>
                                                                </div>
                                                                <?php foreach ($group['items'] as $authority) : ?>
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
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Validación externa de autoridades</h5>
                                    <p class="text-muted mb-0">Envía el enlace de validación por correo, WhatsApp o ambos.</p>
                                </div>
                                <button type="submit" form="evento-validacion-form" class="btn btn-outline-primary">Enviar enlace</button>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($validationErrors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($validationErrors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($validationNotice) : ?>
                                    <div class="alert alert-success">
                                        <?php echo htmlspecialchars($validationNotice, ENT_QUOTES, 'UTF-8'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($editRequest) : ?>
                                    <div class="card border mb-4">
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                                                <h6 class="mb-0">Editar solicitud reciente</h6>
                                                <a class="btn btn-sm btn-outline-secondary" href="eventos-autoridades.php?event_id=<?php echo (int) $selectedEventId; ?>">Cancelar</a>
                                            </div>
                                            <form method="post" class="row g-3">
                                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                                <input type="hidden" name="action" value="update_request">
                                                <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                                <input type="hidden" name="request_id" value="<?php echo (int) $editRequest['id']; ?>">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="edit-destinatario">Destinatario</label>
                                                    <input id="edit-destinatario" type="text" name="destinatario_nombre" class="form-control" value="<?php echo htmlspecialchars($editRequest['destinatario_nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="edit-correo">Correo</label>
                                                    <input id="edit-correo" type="email" name="destinatario_correo" class="form-control" value="<?php echo htmlspecialchars($editRequest['destinatario_correo'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label" for="edit-estado">Estado</label>
                                                    <select id="edit-estado" name="estado" class="form-select">
                                                        <option value="pendiente" <?php echo ($editRequest['estado'] ?? '') === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                                        <option value="respondido" <?php echo ($editRequest['estado'] ?? '') === 'respondido' ? 'selected' : ''; ?>>Respondido</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label" for="edit-correo-enviado">Correo enviado</label>
                                                    <select id="edit-correo-enviado" name="correo_enviado" class="form-select">
                                                        <option value="0" <?php echo (int) ($editRequest['correo_enviado'] ?? 0) === 0 ? 'selected' : ''; ?>>Pendiente</option>
                                                        <option value="1" <?php echo (int) ($editRequest['correo_enviado'] ?? 0) === 1 ? 'selected' : ''; ?>>Enviado</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <form id="evento-validacion-form" method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="action" value="send_validation">
                                    <input type="hidden" name="event_id" value="<?php echo (int) $selectedEventId; ?>">
                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <label class="form-label">Evento seleccionado</label>
                                            <div class="form-control-plaintext fw-semibold text-primary">
                                                <?php if ($selectedEventId === 0) : ?>
                                                    Selecciona un evento arriba
                                                <?php else : ?>
                                                    <?php
                                                    $selectedEventTitle = '';
                                                    foreach ($events as $event) {
                                                        if ((int) $event['id'] === $selectedEventId) {
                                                            $selectedEventTitle = $event['titulo'];
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                    <?php echo htmlspecialchars($selectedEventTitle, ENT_QUOTES, 'UTF-8'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <label class="form-label" for="recipient-users">Usuarios destinatarios</label>
                                            <select id="recipient-users" name="recipient_user_ids[]" class="form-select" multiple size="6">
                                                <?php foreach ($users as $user) : ?>
                                                    <option value="<?php echo (int) $user['id']; ?>">
                                                        <?php echo htmlspecialchars(trim($user['nombre'] . ' ' . $user['apellido']), ENT_QUOTES, 'UTF-8'); ?>
                                                        (<?php echo htmlspecialchars($user['correo'], ENT_QUOTES, 'UTF-8'); ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="form-text">Selecciona uno o más usuarios para enviar el enlace público del evento.</div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label" for="delivery-channel">Canal de envío</label>
                                            <select id="delivery-channel" name="delivery_channel" class="form-select">
                                                <option value="email">Correo</option>
                                                <option value="whatsapp">WhatsApp</option>
                                                <option value="both">Correo y WhatsApp</option>
                                                <option value="whatsapp_link">WhatsApp (link directo)</option>
                                            </select>
                                            <div class="form-text">WhatsApp requiere teléfono en usuarios y configuración previa.</div>
                                        </div>
                                    </div>
                                </form>

                                <?php if ($validationLink || $eventValidationLink) : ?>
                                    <div class="mt-4">
                                        <label class="form-label">Enlace de validación</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($validationLink ?: $eventValidationLink, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($whatsappLinks)) : ?>
                                    <div class="mt-4">
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                            <label class="form-label mb-0">Links de WhatsApp</label>
                                            <span class="badge text-bg-success">Link directo</span>
                                        </div>
                                        <div class="list-group">
                                            <?php foreach ($whatsappLinks as $linkData) : ?>
                                                <a class="list-group-item list-group-item-action d-flex align-items-center gap-3" href="<?php echo htmlspecialchars($linkData['link'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">
                                                    <span class="badge rounded-pill text-bg-success"><i class="ti ti-brand-whatsapp"></i></span>
                                                    <div class="flex-grow-1">
                                                        <div class="fw-semibold"><?php echo htmlspecialchars($linkData['nombre'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                        <div class="text-muted small"><?php echo htmlspecialchars($linkData['telefono'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                    </div>
                                                    <span class="btn btn-sm btn-success">Abrir WhatsApp</span>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-text mt-2">Los enlaces abren WhatsApp Web o la app instalada con el mensaje prellenado.</div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($assignedEvents)) : ?>
                                    <div class="mt-4">
                                        <h6 class="mb-3">Solicitudes recientes</h6>
                                        <div class="table-responsive">
                                            <table class="table table-sm align-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Evento</th>
                                                        <th>Autoridades asignadas</th>
                                                        <th class="text-end">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($assignedEvents as $assignedEvent) : ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($assignedEvent['titulo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?php echo (int) $assignedEvent['authority_count']; ?></td>
                                                            <td class="text-end">
                                                                <a class="btn btn-sm btn-outline-primary" href="eventos-autoridades.php?event_id=<?php echo (int) $assignedEvent['id']; ?>">Editar</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectAllBtn = document.getElementById('select-all-authorities');
            const clearAllBtn = document.getElementById('clear-all-authorities');
            const checkboxes = () => Array.from(document.querySelectorAll('input[name="authorities[]"]'));
            const eventSelect = document.getElementById('evento-select');

            if (selectAllBtn) {
                selectAllBtn.addEventListener('click', () => {
                    checkboxes().forEach((checkbox) => {
                        checkbox.checked = true;
                    });
                });
            }

            if (clearAllBtn) {
                clearAllBtn.addEventListener('click', () => {
                    checkboxes().forEach((checkbox) => {
                        checkbox.checked = false;
                    });
                });
            }

            if (eventSelect) {
                eventSelect.addEventListener('change', () => {
                    const selectedId = eventSelect.value;
                    if (selectedId) {
                        window.location.href = `eventos-autoridades.php?event_id=${encodeURIComponent(selectedId)}`;
                    }
                });
            }

            const saveNotice = document.getElementById('save-notice');
            if (saveNotice) {
                setTimeout(() => {
                    saveNotice.classList.add('d-none');
                }, 5000);
            }
        });
    </script>

    <?php include('partials/footer-scripts.php'); ?>

</body>

</html>
