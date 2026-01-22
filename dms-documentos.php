<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Documentos"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Gestión Documental"; $title = "Documentos"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Repositorio documental</h5>
                                    <p class="text-muted mb-0">Controla versiones, accesos por unidad y fechas de vencimiento.</p>
                                </div>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-secondary">Exportar</button>
                                    <button class="btn btn-primary">Subir documento</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label" for="doc-buscar">Buscar</label>
                                        <input type="text" id="doc-buscar" class="form-control" placeholder="Nombre o código">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="doc-categoria">Categoría</label>
                                        <select id="doc-categoria" class="form-select">
                                            <option value="">Todas</option>
                                            <option>Ordenanzas</option>
                                            <option>Convenios</option>
                                            <option>Informes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="doc-unidad">Unidad</label>
                                        <select id="doc-unidad" class="form-select">
                                            <option value="">Todas</option>
                                            <option>DIDECO</option>
                                            <option>SECPLAN</option>
                                            <option>Administración</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label" for="doc-estado">Estado</label>
                                        <select id="doc-estado" class="form-select">
                                            <option value="">Todos</option>
                                            <option>Vigente</option>
                                            <option>En revisión</option>
                                            <option>Vencido</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Documento</th>
                                                <th>Categoría</th>
                                                <th>Unidad</th>
                                                <th>Versión</th>
                                                <th>Estado</th>
                                                <th>Vencimiento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="fw-semibold">Manual de procedimientos 2026</div>
                                                    <div class="text-muted fs-12">DOC-ADM-022</div>
                                                </td>
                                                <td>Ordenanzas</td>
                                                <td>Administración</td>
                                                <td>v2.3</td>
                                                <td><span class="badge text-bg-success">Vigente</span></td>
                                                <td>15/08/2026</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-outline-primary">Ver</button>
                                                        <button class="btn btn-sm btn-outline-secondary">Versiones</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-semibold">Convenio Salud Familiar</div>
                                                    <div class="text-muted fs-12">DOC-DIDECO-114</div>
                                                </td>
                                                <td>Convenios</td>
                                                <td>DIDECO</td>
                                                <td>v1.0</td>
                                                <td><span class="badge text-bg-warning">En revisión</span></td>
                                                <td>30/06/2026</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-outline-primary">Ver</button>
                                                        <button class="btn btn-sm btn-outline-secondary">Enviar a aprobación</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-semibold">Informe presupuestario Q1</div>
                                                    <div class="text-muted fs-12">DOC-SECPLAN-302</div>
                                                </td>
                                                <td>Informes</td>
                                                <td>SECPLAN</td>
                                                <td>v3.0</td>
                                                <td><span class="badge text-bg-danger">Vencido</span></td>
                                                <td>10/02/2026</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button class="btn btn-sm btn-outline-primary">Renovar</button>
                                                        <button class="btn btn-sm btn-outline-secondary">Historial</button>
                                                    </div>
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
