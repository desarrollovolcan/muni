<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar autoridades"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Autoridades"; $title = "Listar autoridades"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <select class="form-select">
                                            <option value="">Estado</option>
                                            <option>Vigente</option>
                                            <option>Histórico</option>
                                        </select>
                                        <select class="form-select">
                                            <option value="">Tipo</option>
                                            <option>Alcalde</option>
                                            <option>Concejal</option>
                                            <option>Administrador Municipal</option>
                                        </select>
                                    </div>
                                    <a href="autoridades-editar.php" class="btn btn-primary">Crear autoridad</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Autoridad</th>
                                                <th>Tipo</th>
                                                <th>Periodo</th>
                                                <th>Contacto</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ana Martínez</td>
                                                <td>Alcaldesa</td>
                                                <td>2024 - 2028</td>
                                                <td>ana.martinez@muni.cl</td>
                                                <td class="text-end">
                                                    <a href="autoridades-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="autoridades-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pedro Ruiz</td>
                                                <td>Concejal</td>
                                                <td>2020 - 2024</td>
                                                <td>pedro.ruiz@muni.cl</td>
                                                <td class="text-end">
                                                    <a href="autoridades-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="autoridades-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
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
