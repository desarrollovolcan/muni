<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Listar usuarios"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Listar usuarios"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="text" class="form-control" placeholder="Buscar por nombre o RUT">
                                        <select class="form-select">
                                            <option value="">Estado</option>
                                            <option>Habilitado</option>
                                            <option>Deshabilitado</option>
                                        </select>
                                        <select class="form-select">
                                            <option value="">Rol</option>
                                            <option>SuperAdmin</option>
                                            <option>Admin</option>
                                            <option>Consulta</option>
                                        </select>
                                    </div>
                                    <a href="usuarios-crear.php" class="btn btn-primary">Crear usuario</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>RUT</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Estado</th>
                                                <th>Último acceso</th>
                                                <th class="text-end">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>9.999.999-9</td>
                                                <td>Super User</td>
                                                <td>admin@muni.cl</td>
                                                <td>SuperAdmin</td>
                                                <td><span class="badge text-bg-success">Habilitado</span></td>
                                                <td>22/01/2026 08:20</td>
                                                <td class="text-end">
                                                    <a href="usuarios-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="usuarios-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12.345.678-9</td>
                                                <td>María Soto</td>
                                                <td>maria.soto@muni.cl</td>
                                                <td>EncargadoEventos</td>
                                                <td><span class="badge text-bg-warning">Deshabilitado</span></td>
                                                <td>20/01/2026 18:45</td>
                                                <td class="text-end">
                                                    <a href="usuarios-detalle.php" class="btn btn-sm btn-outline-primary">Ver</a>
                                                    <a href="usuarios-editar.php" class="btn btn-sm btn-outline-secondary">Editar</a>
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
