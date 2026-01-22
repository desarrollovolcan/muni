<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar eventos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Listar eventos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="date" class="form-control">
                                        <input type="date" class="form-control">
                                        <select class="form-select">
                                            <option value="">Estado</option>
                                            <option>Borrador</option>
                                            <option>Publicado</option>
                                            <option>Finalizado</option>
                                            <option>Cancelado</option>
                                        </select>
                                        <select class="form-select">
                                            <option value="">Tipo</option>
                                            <option>Reunión</option>
                                            <option>Operativo</option>
                                            <option>Ceremonia</option>
                                            <option>Actividad cultural</option>
                                        </select>
                                    </div>
                                    <a href="eventos-editar.php" class="btn btn-primary">Crear evento</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Evento</th>
                                                <th>Fecha</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Responsable</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Operativo Salud</td>
                                                <td>25/01/2026 09:00</td>
                                                <td>Operativo</td>
                                                <td><span class="badge text-bg-success">Publicado</span></td>
                                                <td>María Soto</td>
                                                <td class="text-end">
                                                    <a href="eventos-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="eventos-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Consejo Municipal</td>
                                                <td>28/01/2026 18:00</td>
                                                <td>Reunión</td>
                                                <td><span class="badge text-bg-warning">Borrador</span></td>
                                                <td>Juan Pérez</td>
                                                <td class="text-end">
                                                    <a href="eventos-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="eventos-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
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
