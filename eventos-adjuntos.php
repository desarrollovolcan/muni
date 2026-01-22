<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Subir adjuntos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Subir adjuntos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Adjuntos de eventos</h5>
                                    <p class="text-muted mb-0">Carga y seguimiento de archivos asociados.</p>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('adjunto-archivo').focus();">Subir adjunto</button>
                            </div>
                            <div class="card-body">
                                <form class="mb-4">
                                    <div class="row g-3 align-items-end">
                                        <div class="col-md-6">
                                            <label class="form-label" for="adjunto-evento">Evento</label>
                                            <select id="adjunto-evento" class="form-select">
                                                <option selected>Operativo Salud</option>
                                                <option>Consejo Municipal</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="adjunto-archivo">Archivo</label>
                                            <input type="file" id="adjunto-archivo" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary w-100">Subir</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Archivo</th>
                                                <th>Tipo</th>
                                                <th>Subido por</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Programa_operativo.pdf</td>
                                                <td>PDF</td>
                                                <td>Super User</td>
                                                <td>20/01/2026</td>
                                            </tr>
                                            <tr>
                                                <td>Plano_ubicacion.png</td>
                                                <td>Imagen</td>
                                                <td>María Soto</td>
                                                <td>21/01/2026</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
