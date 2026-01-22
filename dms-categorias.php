<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Categorías y etiquetas"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Gestión Documental"; $title = "Categorías y etiquetas"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Categorías documentales</h5>
                                    <p class="text-muted mb-0">Define jerarquías y responsables por tipo de documento.</p>
                                </div>
                                <button class="btn btn-primary">Nueva categoría</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Responsable</th>
                                                <th>Documentos</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ordenanzas</td>
                                                <td>Secretaría</td>
                                                <td>36</td>
                                                <td><span class="badge text-bg-success">Activa</span></td>
                                            </tr>
                                            <tr>
                                                <td>Convenios</td>
                                                <td>Asesoría jurídica</td>
                                                <td>18</td>
                                                <td><span class="badge text-bg-success">Activa</span></td>
                                            </tr>
                                            <tr>
                                                <td>Informes</td>
                                                <td>SECPLAN</td>
                                                <td>24</td>
                                                <td><span class="badge text-bg-warning">En revisión</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Etiquetas y metadatos</h5>
                                    <p class="text-muted mb-0">Clasifica documentos con palabras clave y alertas.</p>
                                </div>
                                <button class="btn btn-outline-secondary">Gestionar etiquetas</button>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge text-bg-light">Transparencia</span>
                                    <span class="badge text-bg-light">RR.HH.</span>
                                    <span class="badge text-bg-light">Compras</span>
                                    <span class="badge text-bg-light">Salud</span>
                                    <span class="badge text-bg-light">Educación</span>
                                </div>
                                <div class="alert alert-info mb-0">
                                    <div class="fw-semibold">Sugerencia</div>
                                    <div class="text-muted">Agrega etiquetas para identificar documentos críticos y activar notificaciones automáticas.</div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Accesos por rol</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex justify-content-between align-items-center mb-2">
                                        <span>SuperAdmin</span>
                                        <span class="badge text-bg-success">Completo</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center mb-2">
                                        <span>Admin</span>
                                        <span class="badge text-bg-info">Lectura + edición</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Consulta</span>
                                        <span class="badge text-bg-secondary">Solo lectura</span>
                                    </li>
                                </ul>
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
