<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear usuario"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Crear usuario"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-rut">RUT</label>
                                            <input type="text" id="usuario-rut" class="form-control" placeholder="12.345.678-9">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-nombre">Nombres</label>
                                            <input type="text" id="usuario-nombre" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-apellido">Apellidos</label>
                                            <input type="text" id="usuario-apellido" class="form-control" placeholder="Apellido">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-correo">Correo</label>
                                            <input type="email" id="usuario-correo" class="form-control" placeholder="usuario@muni.cl">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-telefono">Teléfono</label>
                                            <input type="tel" id="usuario-telefono" class="form-control" placeholder="+56 9 1234 5678">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-estado">Estado</label>
                                            <select id="usuario-estado" class="form-select">
                                                <option>Habilitado</option>
                                                <option>Deshabilitado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="usuario-direccion">Dirección (opcional)</label>
                                            <input type="text" id="usuario-direccion" class="form-control" placeholder="Dirección">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-username">Username</label>
                                            <input type="text" id="usuario-username" class="form-control" placeholder="usuario">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-password">Contraseña</label>
                                            <input type="password" id="usuario-password" class="form-control" placeholder="********">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-password-confirm">Confirmar contraseña</label>
                                            <input type="password" id="usuario-password-confirm" class="form-control" placeholder="********">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roles asignados</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-superadmin" checked>
                                                <label class="form-check-label" for="rol-superadmin">SuperAdmin</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-admin">
                                                <label class="form-check-label" for="rol-admin">Admin</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-auditor">
                                                <label class="form-check-label" for="rol-auditor">Auditor</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                                    <a href="usuarios-lista.php" class="btn btn-outline-secondary ms-2">Cancelar</a>
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
