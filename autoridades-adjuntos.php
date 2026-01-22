<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Adjuntos de autoridades"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Autoridades"; $title = "Adjuntos de autoridades"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Adjuntos de autoridades</h5>
                                    <p class="text-muted mb-0">Documentos asociados a autoridades.</p>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="document.getElementById('autoridad-archivo').focus();">Subir adjunto</button>
                            </div>
                            <div class="card-body">
                                <form class="mb-4">
                                    <div class="row g-3 align-items-end">
                                        <div class="col-md-6">
                                            <label class="form-label" for="autoridad-adjunto">Autoridad</label>
                                            <select id="autoridad-adjunto" class="form-select">
                                                <option selected>Ana Martínez</option>
                                                <option>Pedro Ruiz</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="autoridad-archivo">Archivo</label>
                                            <input type="file" id="autoridad-archivo" class="form-control">
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
                                                <th>Fecha</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Decreto_123.pdf</td>
                                                <td>PDF</td>
                                                <td>18/01/2026</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-outline-primary">Descargar</button>
                                                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Resolucion_2024.pdf</td>
                                                <td>PDF</td>
                                                <td>19/01/2026</td>
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
