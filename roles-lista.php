<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar roles"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Listar roles"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <input type="text" class="form-control w-auto" placeholder="Buscar rol">
                                    <a href="roles-editar.php" class="btn btn-primary">Crear rol</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Rol</th>
                                                <th>Descripción</th>
                                                <th>Usuarios</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SuperAdmin</td>
                                                <td>Control total del sistema</td>
                                                <td>1</td>
                                                <td class="text-end">
                                                    <a href="roles-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>EncargadoEventos</td>
                                                <td>Gestión y publicación de eventos</td>
                                                <td>4</td>
                                                <td class="text-end">
                                                    <a href="roles-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
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
