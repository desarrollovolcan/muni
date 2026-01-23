<?php
require __DIR__ . '/app/bootstrap.php';

$errors = [];
$success = false;
$templateKey = 'validacion_autoridades';

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

$defaultSubject = 'Validación de autoridades: {{evento_titulo}}';
$defaultBody = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Validación de autoridades</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f6fb; margin: 0; padding: 24px;">
  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 12px; overflow: hidden;">
          <tr>
            <td style="padding: 24px; background: #0d47a1; color: #ffffff;">
              <img src="{{municipalidad_logo}}" alt="Logo" style="height: 28px; vertical-align: middle;">
              <span style="font-weight: bold; margin-left: 8px;">{{municipalidad_nombre}}</span>
            </td>
          </tr>
          <tr>
            <td style="padding: 24px;">
              <p>Hola {{destinatario_nombre}},</p>
              <p>Te invitamos a confirmar las autoridades asistentes al evento <strong>{{evento_titulo}}</strong>.</p>
              <p><strong>Fecha:</strong> {{evento_fecha_inicio}} - {{evento_fecha_fin}}</p>
              <p><strong>Lugar:</strong> {{evento_ubicacion}}</p>
              <p><strong>Tipo:</strong> {{evento_tipo}}</p>
              <p><strong>Descripción:</strong><br>{{evento_descripcion}}</p>
              <p><strong>Autoridades preseleccionadas:</strong></p>
              <ul>
                {{autoridades_lista}}
              </ul>
              <p style="text-align: center; margin: 24px 0;">
                <a href="{{validation_link}}" style="background: #1565c0; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 999px;">Confirmar asistencia</a>
              </p>
              <p>Si no puedes abrir el botón, copia y pega el siguiente enlace:</p>
              <p><a href="{{validation_link}}">{{validation_link}}</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
HTML;

$stmt = db()->prepare('SELECT subject, body_html FROM email_templates WHERE template_key = ? LIMIT 1');
$stmt->execute([$templateKey]);
$template = $stmt->fetch() ?: ['subject' => $defaultSubject, 'body_html' => $defaultBody];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $subject = trim($_POST['subject'] ?? '');
    $bodyHtml = trim($_POST['body_html'] ?? '');

    if ($subject === '' || $bodyHtml === '') {
        $errors[] = 'Completa el asunto y el cuerpo del correo.';
    }

    if (empty($errors)) {
        $stmtUpsert = db()->prepare(
            'INSERT INTO email_templates (template_key, subject, body_html)
             VALUES (?, ?, ?)
             ON DUPLICATE KEY UPDATE subject = VALUES(subject), body_html = VALUES(body_html)'
        );
        $stmtUpsert->execute([$templateKey, $subject, $bodyHtml]);
        $success = true;
        $template = ['subject' => $subject, 'body_html' => $bodyHtml];
    }
}
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Configuración Email"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <div class="content-page">
            <div class="container-fluid">

                <?php $subtitle = "Mantenedores"; $title = "Configuración Email"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Correo de validación de autoridades</h5>
                                    <p class="text-muted mb-0">Configura el correo HTML que se enviará con el enlace de validación.</p>
                                </div>
                                <button type="submit" form="template-form" class="btn btn-primary">Guardar configuración</button>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <div><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($success) : ?>
                                    <div class="alert alert-success">Configuración guardada correctamente.</div>
                                <?php endif; ?>

                                <form id="template-form" method="post">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="email-subject">Asunto del correo</label>
                                        <input type="text" id="email-subject" name="subject" class="form-control" value="<?php echo htmlspecialchars($template['subject'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email-body">Cuerpo HTML</label>
                                        <textarea id="email-body" name="body_html" class="form-control" rows="14"><?php echo htmlspecialchars($template['body_html'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        <div class="form-text">Puedes usar HTML completo con estilos en línea.</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Variables disponibles</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>{{municipalidad_nombre}}</strong> · Nombre de la municipalidad</li>
                                            <li class="list-group-item"><strong>{{municipalidad_logo}}</strong> · URL del logo municipal</li>
                                            <li class="list-group-item"><strong>{{destinatario_nombre}}</strong> · Nombre del destinatario</li>
                                            <li class="list-group-item"><strong>{{evento_titulo}}</strong> · Título del evento</li>
                                            <li class="list-group-item"><strong>{{evento_descripcion}}</strong> · Descripción del evento</li>
                                            <li class="list-group-item"><strong>{{evento_fecha_inicio}}</strong> · Fecha de inicio</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>{{evento_fecha_fin}}</strong> · Fecha de término</li>
                                            <li class="list-group-item"><strong>{{evento_ubicacion}}</strong> · Ubicación del evento</li>
                                            <li class="list-group-item"><strong>{{evento_tipo}}</strong> · Tipo de evento</li>
                                            <li class="list-group-item"><strong>{{autoridades_lista}}</strong> · Lista HTML &lt;li&gt; de autoridades</li>
                                            <li class="list-group-item"><strong>{{validation_link}}</strong> · Enlace público de validación</li>
                                        </ul>
                                    </div>
                                </div>
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
</body>

</html>
