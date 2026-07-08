<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

if (isset($_SESSION['user'])) {
    redirect('dashboard.php');
}

include('partials/html.php');
?>

<head>
    <?php $title = "Iniciar sesión"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>
        <?php
        $municipalidad = get_municipalidad();
        $logoAuthHeight = (int) ($municipalidad['logo_auth_height'] ?? 48);
        ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid">

                <?php $subtitle = "Seguridad y Acceso"; $title = "Iniciar sesión"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <img src="<?php echo htmlspecialchars($municipalidad['logo_path'] ?? 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt="logo municipalidad" class="img-fluid" style="max-height: <?php echo $logoAuthHeight; ?>px;">
                                </div>
                                <form method="post" action="auth-2-sign-in.php">
                                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="login-username">RUT</label>
                                        <input type="text" id="login-username" name="rut" class="form-control" placeholder="12.345.678-9" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="login-password">Contraseña</label>
                                        <input type="password" id="login-password" name="password" class="form-control" placeholder="********" required>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="login-remember">
                                            <label class="form-check-label" for="login-remember">Mantener sesión</label>
                                        </div>
                                        <a href="recuperar-contrasena.php" class="text-muted">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                    <a href="logout.php" class="btn btn-outline-secondary ms-2">Cerrar sesión</a>
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
