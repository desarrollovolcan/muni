<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Detalle de evento"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Detalle de evento"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Título</label>
                                        <div class="fw-semibold">Operativo Salud</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Estado</label>
                                        <div><span class="badge text-bg-success">Publicado</span></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Fecha inicio</label>
                                        <div class="fw-semibold">25/01/2026 09:00</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Fecha fin</label>
                                        <div class="fw-semibold">25/01/2026 13:00</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Ubicación</label>
                                        <div class="fw-semibold">Plaza Central</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Tipo</label>
                                        <div class="fw-semibold">Operativo</div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-muted">Descripción</label>
                                        <div>Operativo de salud municipal con atención primaria.</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="mb-3">Adjuntos</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Programa_operativo.pdf
                                            <span class="badge text-bg-secondary">PDF</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Plano_ubicacion.png
                                            <span class="badge text-bg-secondary">Imagen</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="d-flex flex-wrap gap-2 mt-3">
                                    <a href="eventos-editar.php" class="btn btn-primary">Editar evento</a>
                                    <a href="eventos-adjuntos.php" class="btn btn-outline-secondary">Subir adjuntos</a>
                                    <a href="eventos-lista.php" class="btn btn-link">Volver al listado</a>
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
