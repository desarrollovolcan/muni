<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Detalle de usuario"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Detalle de usuario"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">Nombre completo</label>
                                                <div class="fw-semibold">María Soto</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">RUT</label>
                                                <div class="fw-semibold">12.345.678-9</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">Correo</label>
                                                <div class="fw-semibold">maria.soto@muni.cl</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">Teléfono</label>
                                                <div class="fw-semibold">+56 9 1234 5678</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">Estado</label>
                                                <div><span class="badge text-bg-warning">Deshabilitado</span></div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label text-muted">Último acceso</label>
                                                <div class="fw-semibold">20/01/2026 18:45</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="form-label text-muted">Roles</label>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Admin
                                                <span class="badge text-bg-primary">Principal</span>
                                            </li>
                                            <li class="list-group-item">EncargadoEventos</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <a href="usuarios-editar.php" class="btn btn-primary">Editar usuario</a>
                                    <a href="usuarios-asignar-roles.php" class="btn btn-outline-secondary">Asignar roles</a>
                                    <a href="usuarios-lista.php" class="btn btn-link">Volver al listado</a>
                                </div>
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
