<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Flujos de aprobación"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Aprobaciones"; $title = "Flujos de aprobación"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Crear flujo</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="flujo-nombre">Nombre</label>
                                        <input type="text" id="flujo-nombre" class="form-control" placeholder="Aprobación de eventos">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="flujo-entidad">Entidad</label>
                                        <select id="flujo-entidad" class="form-select">
                                            <option>Eventos</option>
                                            <option>Documentos</option>
                                            <option>Autoridades</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="flujo-unidad">Unidad responsable</label>
                                        <select id="flujo-unidad" class="form-select">
                                            <option>Administración</option>
                                            <option>DIDECO</option>
                                            <option>SECPLAN</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit">Guardar flujo</button>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">SLA de aprobación</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="sla">Tiempo máximo (horas)</label>
                                    <input type="number" id="sla" class="form-control" value="48">
                                </div>
                                <button class="btn btn-outline-secondary w-100">Actualizar SLA</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Flujos activos</h5>
                                    <p class="text-muted mb-0">Secuencias de validación por entidad y unidad.</p>
                                </div>
                                <button class="btn btn-outline-primary">Reordenar etapas</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Flujo</th>
                                                <th>Entidad</th>
                                                <th>Unidad</th>
                                                <th>Etapas</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Aprobación eventos masivos</td>
                                                <td>Eventos</td>
                                                <td>Administración</td>
                                                <td>Encargado → Jefatura → Alcaldía</td>
                                                <td><span class="badge text-bg-success">Activo</span></td>
                                            </tr>
                                            <tr>
                                                <td>Validación de documentos críticos</td>
                                                <td>Documentos</td>
                                                <td>SECPLAN</td>
                                                <td>Analista → Supervisor → Jurídica</td>
                                                <td><span class="badge text-bg-success">Activo</span></td>
                                            </tr>
                                            <tr>
                                                <td>Nombramientos de autoridades</td>
                                                <td>Autoridades</td>
                                                <td>DIDECO</td>
                                                <td>Unidad → RR.HH. → Secretaría</td>
                                                <td><span class="badge text-bg-warning">En revisión</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Pendientes de aprobación</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Evento "Operativo Salud" - Jefatura de área
                                        <span class="badge text-bg-warning">24h restantes</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Documento "Manual de procedimientos 2026" - Jurídica
                                        <span class="badge text-bg-info">36h restantes</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Autoridad "Director DIDECO" - Secretaría
                                        <span class="badge text-bg-danger">Atrasado</span>
                                    </div>
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
