<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Permisos por unidad"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Permisos por unidad"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Matriz por unidad</h5>
                                    <p class="text-muted mb-0">Define permisos específicos según la unidad municipal y el rol.</p>
                                </div>
                                <button class="btn btn-primary">Guardar cambios</button>
                            </div>
                            <div class="card-body">
                                <form class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label" for="unidad-select">Unidad</label>
                                        <select id="unidad-select" class="form-select">
                                            <option>Administración</option>
                                            <option>DIDECO</option>
                                            <option>SECPLAN</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="rol-select">Rol</label>
                                        <select id="rol-select" class="form-select">
                                            <option>EncargadoEventos</option>
                                            <option>Admin</option>
                                            <option>Consulta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="ambito-select">Ámbito</label>
                                        <select id="ambito-select" class="form-select">
                                            <option>Eventos y actividades</option>
                                            <option>Documentos</option>
                                            <option>Autoridades</option>
                                        </select>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Permiso</th>
                                                <th>Ver</th>
                                                <th>Crear</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Aprobar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Eventos</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                            </tr>
                                            <tr>
                                                <td>Documentos</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                            </tr>
                                            <tr>
                                                <td>Adjuntos</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td class="text-muted">-</td>
                                                <td><input type="checkbox" class="form-check-input"></td>
                                                <td class="text-muted">-</td>
                                            </tr>
                                            <tr>
                                                <td>Reportes</td>
                                                <td><input type="checkbox" class="form-check-input" checked></td>
                                                <td class="text-muted">-</td>
                                                <td class="text-muted">-</td>
                                                <td class="text-muted">-</td>
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
