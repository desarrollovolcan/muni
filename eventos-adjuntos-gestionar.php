<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Adjuntos de eventos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Adjuntos de eventos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Evento</th>
                                                <th>Archivo</th>
                                                <th>Tipo</th>
                                                <th>Subido por</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Operativo Salud</td>
                                                <td>Programa_operativo.pdf</td>
                                                <td>PDF</td>
                                                <td>Super User</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-outline-primary">Descargar</button>
                                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Consejo Municipal</td>
                                                <td>Acta_reunion.docx</td>
                                                <td>DOCX</td>
                                                <td>Juan Pérez</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-outline-primary">Descargar</button>
                                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                </td>
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
