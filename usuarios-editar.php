<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Editar usuario"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Usuarios"; $title = "Editar usuario"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-rut">RUT</label>
                                            <input type="text" id="usuario-edit-rut" class="form-control" value="12.345.678-9">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-nombre">Nombres</label>
                                            <input type="text" id="usuario-edit-nombre" class="form-control" value="María">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-apellido">Apellidos</label>
                                            <input type="text" id="usuario-edit-apellido" class="form-control" value="Soto">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="usuario-edit-correo">Correo</label>
                                            <input type="email" id="usuario-edit-correo" class="form-control" value="maria.soto@muni.cl">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-edit-telefono">Teléfono</label>
                                            <input type="tel" id="usuario-edit-telefono" class="form-control" value="+56 9 1234 5678">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="usuario-edit-estado">Estado</label>
                                            <select id="usuario-edit-estado" class="form-select">
                                                <option>Habilitado</option>
                                                <option selected>Deshabilitado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="usuario-edit-direccion">Dirección</label>
                                            <input type="text" id="usuario-edit-direccion" class="form-control" value="Av. Principal 123">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="usuario-edit-username">Username</label>
                                            <input type="text" id="usuario-edit-username" class="form-control" value="msoto">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roles asignados</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-edit-admin" checked>
                                                <label class="form-check-label" for="rol-edit-admin">Admin</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-edit-eventos" checked>
                                                <label class="form-check-label" for="rol-edit-eventos">EncargadoEventos</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="rol-edit-consulta">
                                                <label class="form-check-label" for="rol-edit-consulta">Consulta</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                                        <button type="button" class="btn btn-outline-warning">Restablecer contraseña</button>
                                        <a href="usuarios-lista.php" class="btn btn-outline-secondary">Volver</a>
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
