<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$validationErrors = [];
$validationNotice = null;
$validationLink = null;
$emailPreview = null;
$events = db()->query('SELECT id, titulo FROM events WHERE habilitado = 1 ORDER BY fecha_inicio DESC')->fetchAll();
$authorities = db()->query('SELECT id, nombre, tipo FROM authorities WHERE estado = 1 ORDER BY nombre')->fetchAll();
$users = db()->query('SELECT id, nombre, apellido, correo FROM users WHERE estado = 1 ORDER BY nombre, apellido')->fetchAll();
$selectedEventId = isset($_GET['event_id']) ? (int) $_GET['event_id'] : 0;
$linkedAuthorities = [];
$validationRequests = [];

if ($selectedEventId > 0) {
    $stmt = db()->prepare('SELECT authority_id FROM event_authorities WHERE event_id = ?');
    $stmt->execute([$selectedEventId]);
    $linkedAuthorities = array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));

    $stmt = db()->prepare('SELECT id, destinatario_nombre, destinatario_correo, token, correo_enviado, estado, created_at, responded_at FROM event_authority_requests WHERE event_id = ? ORDER BY created_at DESC');
    $stmt->execute([$selectedEventId]);
    $validationRequests = $stmt->fetchAll();
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
    foreach ($authorities as $authority) {
        $authorityItems .= '<li>' . htmlspecialchars($authority['nombre'], ENT_QUOTES, 'UTF-8') . ' · ' . htmlspecialchars($authority['tipo'], ENT_QUOTES, 'UTF-8') . '</li>';
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? 'save_authorities';

    if ($action === 'save_authorities') {
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

    if ($action === 'send_validation') {
        $eventId = isset($_POST['event_id']) ? (int) $_POST['event_id'] : 0;
        $recipientUserIds = array_map('intval', $_POST['recipient_user_ids'] ?? []);

        if ($eventId === 0) {
            $validationErrors[] = 'Selecciona un evento válido.';
        }

        $recipients = [];
        if (!empty($recipientUserIds)) {
            $placeholders = implode(',', array_fill(0, count($recipientUserIds), '?'));
            $stmt = db()->prepare("SELECT nombre, apellido, correo FROM users WHERE id IN ($placeholders)");
            $stmt->execute($recipientUserIds);
            foreach ($stmt->fetchAll() as $user) {
                if (!empty($user['correo'])) {
                    $recipients[] = [
                        'nombre' => trim(($user['nombre'] ?? '') . ' ' . ($user['apellido'] ?? '')),
                        'correo' => $user['correo'],
                    ];
                }
            }
        }

        if (empty($recipients)) {
            $validationErrors[] = 'Selecciona al menos un usuario para validar las autoridades.';
        }

        $event = null;
        $eventAuthorities = [];
        if (empty($validationErrors) && $eventId > 0) {
            $stmt = db()->prepare('SELECT * FROM events WHERE id = ?');
            $stmt->execute([$eventId]);
            $event = $stmt->fetch();

            $stmt = db()->prepare('SELECT a.id, a.nombre, a.tipo FROM authorities a INNER JOIN event_authorities ea ON ea.authority_id = a.id WHERE ea.event_id = ? ORDER BY a.nombre');
            $stmt->execute([$eventId]);
            $eventAuthorities = $stmt->fetchAll();

            if (!$event) {
                $validationErrors[] = 'No se encontró el evento seleccionado.';
            } elseif (empty($eventAuthorities)) {
                $validationErrors[] = 'El evento aún no tiene autoridades preseleccionadas.';
            }
        }

        if (empty($validationErrors) && $event) {
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
            $basePath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $baseUrl = $scheme . '://' . $host . ($basePath !== '' ? $basePath : '');

            $municipalidad = get_municipalidad();
            $subject = 'Validación de autoridades: ' . $event['titulo'];
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";

            $correoConfig = db()->query('SELECT * FROM notificacion_correos LIMIT 1')->fetch();
            $fromEmail = $correoConfig['from_correo'] ?? $correoConfig['correo_imap'] ?? null;
            $fromName = $correoConfig['from_nombre'] ?? ($municipalidad['nombre'] ?? 'Municipalidad');
            if ($fromEmail) {
                $headers .= 'From: ' . ($fromName ? $fromName . ' <' . $fromEmail . '>' : $fromEmail) . "\r\n";
            }

            $stmtInsert = db()->prepare('INSERT INTO event_authority_requests (event_id, destinatario_nombre, destinatario_correo, token, correo_enviado) VALUES (?, ?, ?, ?, ?)');
            $firstLink = null;
            $allSent = true;

            foreach ($recipients as $recipient) {
                $token = bin2hex(random_bytes(16));
                $validationUrl = $baseUrl . '/eventos-validacion.php?token=' . urlencode($token);
                $emailPreview = build_event_validation_email($municipalidad, $event, $eventAuthorities, $validationUrl, $recipient['nombre'] ?? null);
                $mailSent = mail($recipient['correo'], $subject, $emailPreview, $headers);
                $allSent = $allSent && $mailSent;

                $stmtInsert->execute([
                    $eventId,
                    $recipient['nombre'] !== '' ? $recipient['nombre'] : null,
                    $recipient['correo'],
                    $token,
                    $mailSent ? 1 : 0,
                ]);

                if ($firstLink === null) {
                    $firstLink = $validationUrl;
                }
            }

            $validationLink = $firstLink;
            if ($allSent) {
                $validationNotice = 'Correos de validación enviados correctamente.';
            } else {
                $validationErrors[] = 'Algunos correos no se pudieron enviar automáticamente. Comparte los enlaces de validación manualmente si es necesario.';
            }
        }
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
                                    <input type="hidden" name="action" value="save_authorities">
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Validación externa de autoridades</h5>
                                    <p class="text-muted mb-0">Envía un correo para que un usuario confirme qué autoridades asistirán.</p>
                                </div>
                                <button type="submit" form="evento-validacion-form" class="btn btn-outline-primary">Enviar correo</button>
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
                                            <div class="form-text">Selecciona uno o más usuarios para enviar la validación (se generará un enlace por persona).</div>
                                        </div>
                                    </div>
                                </form>

                                <?php if ($validationLink) : ?>
                                    <div class="mt-4">
                                        <label class="form-label">Enlace de validación</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($validationLink, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($validationRequests)) : ?>
                                    <div class="mt-4">
                                        <h6 class="mb-3">Solicitudes recientes</h6>
                                        <div class="table-responsive">
                                            <table class="table table-sm align-middle">
                                                <thead>
                                                    <tr>
                                                        <th>Destinatario</th>
                                                        <th>Correo</th>
                                                        <th>Estado</th>
                                                        <th>Estado correo</th>
                                                        <th>Enviado</th>
                                                        <th>Respondido</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($validationRequests as $request) : ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($request['destinatario_nombre'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?php echo htmlspecialchars($request['destinatario_correo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td>
                                                                <span class="badge text-bg-<?php echo $request['estado'] === 'respondido' ? 'success' : 'warning'; ?>">
                                                                    <?php echo htmlspecialchars(ucfirst($request['estado']), ENT_QUOTES, 'UTF-8'); ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="badge text-bg-<?php echo (int) $request['correo_enviado'] === 1 ? 'success' : 'secondary'; ?>">
                                                                    <?php echo (int) $request['correo_enviado'] === 1 ? 'Enviado' : 'Pendiente'; ?>
                                                                </span>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($request['created_at'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                            <td><?php echo htmlspecialchars($request['responded_at'] ?? '-', ENT_QUOTES, 'UTF-8'); ?></td>
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

    <?php include('partials/footer-scripts.php'); ?>

</body>

</html>
