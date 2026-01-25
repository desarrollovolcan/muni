<?php
require __DIR__ . '/app/bootstrap.php';

$token = trim($_GET['token'] ?? '');
$errors = [];
$notice = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf($_POST['csrf_token'] ?? null)) {
    $action = $_POST['action'] ?? '';
    $token = trim($_POST['token'] ?? $token);

    if ($token === '') {
        $errors[] = 'El enlace de confirmación no es válido.';
    } elseif (!in_array($action, ['confirm', 'decline'], true)) {
        $errors[] = 'Selecciona una respuesta válida.';
    } else {
        $notice = $action === 'confirm'
            ? 'Tu participación ha sido confirmada. ¡Gracias por tu respuesta!'
            : 'Tu respuesta ha sido registrada. Gracias por informarnos.';
    }
}

$municipalidad = get_municipalidad();
$logoPath = $municipalidad['logo_path'] ?? 'assets/images/logo.png';
$logoUrl = preg_match('/^https?:\/\//', $logoPath) ? $logoPath : base_url() . '/' . ltrim($logoPath, '/');
?>
<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Confirmar asistencia"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <div class="auth-box overflow-hidden align-items-center d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-md-7 col-sm-9">
                    <div class="card p-4">
                        <div class="text-center mb-4">
                            <img src="<?php echo htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="Logo municipalidad" height="36">
                            <h4 class="fw-bold mt-3 mb-1">Confirmación de participación</h4>
                            <p class="text-muted mb-0">Municipalidad de <?php echo htmlspecialchars($municipalidad['nombre'] ?? 'Municipalidad', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>

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

                        <p class="text-muted mb-4">
                            A continuación puedes confirmar tu participación en el evento. Esta respuesta quedará registrada en el sistema municipal.
                        </p>

                        <form method="post">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES, 'UTF-8'); ?>">

                            <div class="d-grid gap-2">
                                <button type="submit" name="action" value="confirm" class="btn btn-primary fw-semibold">
                                    Confirmar participación
                                </button>
                                <button type="submit" name="action" value="decline" class="btn btn-outline-secondary fw-semibold">
                                    No podré asistir
                                </button>
                            </div>
                        </form>

                        <p class="text-muted mt-4 mb-0 text-center" style="font-size: 12px;">
                            Este enlace es personal. Si recibiste este mensaje por error, puedes cerrar esta ventana.
                        </p>
                    </div>
                    <p class="text-center text-muted mt-4 mb-0">
                        © <script>document.write(new Date().getFullYear())</script> Municipalidad - Plataforma de eventos
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include('partials/footer-scripts.php'); ?>
</body>

</html>
