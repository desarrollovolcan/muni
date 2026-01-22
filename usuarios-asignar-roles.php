<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Asignar roles"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Asignar roles"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label" for="roles-usuario">Usuario</label>
                                            <select id="roles-usuario" class="form-select">
                                                <option>Super User</option>
                                                <option selected>María Soto</option>
                                                <option>Juan Pérez</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="roles-estado">Estado</label>
                                            <select id="roles-estado" class="form-select">
                                                <option>Habilitado</option>
                                                <option selected>Deshabilitado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="form-label">Roles disponibles</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="role-superadmin">
                                                <label class="form-check-label" for="role-superadmin">SuperAdmin</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="role-admin" checked>
                                                <label class="form-check-label" for="role-admin">Admin</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="role-eventos" checked>
                                                <label class="form-check-label" for="role-eventos">EncargadoEventos</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="role-auditor">
                                                <label class="form-check-label" for="role-auditor">Auditor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Guardar roles</button>
                                        <a href="usuarios-lista.php" class="btn btn-outline-secondary ms-2">Volver</a>
                                    </div>
                                </form>
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
