<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Crear/editar evento"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Eventos Municipales"; $title = "Crear/editar evento"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label" for="evento-titulo">Título</label>
                                            <input type="text" id="evento-titulo" class="form-control" value="Operativo Salud">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-estado">Estado</label>
                                            <select id="evento-estado" class="form-select">
                                                <option>Borrador</option>
                                                <option selected>Publicado</option>
                                                <option>Finalizado</option>
                                                <option>Cancelado</option>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="evento-descripcion">Descripción</label>
                                            <textarea id="evento-descripcion" class="form-control" rows="3">Operativo de salud municipal con atención primaria.</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-ubicacion">Ubicación/Dirección</label>
                                            <input type="text" id="evento-ubicacion" class="form-control" value="Plaza Central">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="evento-inicio">Fecha inicio</label>
                                            <input type="datetime-local" id="evento-inicio" class="form-control" value="2026-01-25T09:00">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label" for="evento-fin">Fecha fin</label>
                                            <input type="datetime-local" id="evento-fin" class="form-control" value="2026-01-25T13:00">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-tipo">Tipo</label>
                                            <select id="evento-tipo" class="form-select">
                                                <option>Reunión</option>
                                                <option selected>Operativo</option>
                                                <option>Ceremonia</option>
                                                <option>Actividad cultural</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-cupos">Cupos (opcional)</label>
                                            <input type="number" id="evento-cupos" class="form-control" value="120">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label" for="evento-publico">Público objetivo</label>
                                            <input type="text" id="evento-publico" class="form-control" value="Vecinos del sector norte">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-creador">Creado por</label>
                                            <select id="evento-creador" class="form-select">
                                                <option selected>Super User</option>
                                                <option>Juan Pérez</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label" for="evento-encargado">Encargado</label>
                                            <select id="evento-encargado" class="form-select">
                                                <option selected>María Soto</option>
                                                <option>Juan Pérez</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary">Guardar evento</button>
                                        <a href="eventos-lista.php" class="btn btn-outline-secondary">Volver</a>
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
