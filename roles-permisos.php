<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Matriz de permisos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Matriz de permisos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                    <select class="form-select w-auto">
                                        <option>SuperAdmin</option>
                                        <option selected>EncargadoEventos</option>
                                        <option>Consulta</option>
                                    </select>
                                    <button class="btn btn-primary">Guardar cambios</button>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Módulo</th>
                                                <th>Ver</th>
                                                <th>Crear</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Publicar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Usuarios</td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td class="text-muted">-</td>
                                            </tr>
                                            <tr>
                                                <td>Roles</td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td class="text-muted">-</td>
                                            </tr>
                                            <tr>
                                                <td>Eventos</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                            </tr>
                                            <tr>
                                                <td>Autoridades</td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td class="text-muted">-</td>
                                            </tr>
                                            <tr>
                                                <td>Adjuntos</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td class="text-muted">-</td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td class="text-muted">-</td>
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
