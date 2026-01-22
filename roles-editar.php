<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar rol"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Roles y Permisos"; $title = "Crear/editar rol"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="rol-nombre">Nombre del rol</label>
                                            <input type="text" id="rol-nombre" class="form-control" value="EncargadoEventos">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="rol-estado">Estado</label>
                                            <select id="rol-estado" class="form-select">
                                                <option selected>Activo</option>
                                                <option>Inactivo</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="rol-descripcion">Descripción</label>
                                            <textarea id="rol-descripcion" class="form-control" rows="3">Gestión y publicación de eventos municipales.</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar rol</button>
                                        <a href="roles-permisos.php" class="btn btn-outline-secondary">Configurar permisos</a>
                                        <a href="roles-lista.php" class="btn btn-link">Volver al listado</a>
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
