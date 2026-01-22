<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Detalle de autoridad"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Autoridades"; $title = "Detalle de autoridad"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Nombre</label>
                                        <div class="fw-semibold">Ana Martínez</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Tipo</label>
                                        <div class="fw-semibold">Alcaldesa</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Periodo</label>
                                        <div class="fw-semibold">2024 - 2028</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Contacto</label>
                                        <div class="fw-semibold">ana.martinez@muni.cl</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-3">Adjuntos</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Decreto_123.pdf
                                            <span class="badge text-bg-secondary">PDF</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Resolucion_2024.pdf
                                            <span class="badge text-bg-secondary">PDF</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <a href="autoridades-editar.php" class="btn btn-primary">Editar autoridad</a>
                                    <a href="autoridades-adjuntos.php" class="btn btn-outline-secondary">Gestionar adjuntos</a>
                                    <a href="autoridades-lista.php" class="btn btn-link">Volver al listado</a>
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
