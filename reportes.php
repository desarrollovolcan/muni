<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Reportes"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Reportes"; $title = "Resumen ejecutivo"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Eventos activos</h5>
                                        <h3 class="my-2">42</h3>
                                        <p class="mb-0 text-muted">+12% vs mes anterior</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded">
                                            <i data-lucide="calendar-check" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Documentos vigentes</h5>
                                        <h3 class="my-2">128</h3>
                                        <p class="mb-0 text-muted">8 vencen en 30 días</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-success-subtle text-success rounded">
                                            <i data-lucide="file-text" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Aprobaciones pendientes</h5>
                                        <h3 class="my-2">9</h3>
                                        <p class="mb-0 text-muted">3 atrasadas</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded">
                                            <i data-lucide="badge-check" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="text-muted fw-normal mt-0">Alertas enviadas</h5>
                                        <h3 class="my-2">76</h3>
                                        <p class="mb-0 text-muted">Últimas 24 horas</p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info-subtle text-info rounded">
                                            <i data-lucide="bell" class="fs-22"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Indicadores por unidad</h5>
                                    <p class="text-muted mb-0">Comparativo mensual de actividad.</p>
                                </div>
                                <select class="form-select w-auto">
                                    <option>Últimos 30 días</option>
                                    <option>Últimos 90 días</option>
                                    <option>Año actual</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Unidad</th>
                                                <th>Eventos</th>
                                                <th>Documentos</th>
                                                <th>Alertas</th>
                                                <th>Tiempo promedio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>DIDECO</td>
                                                <td>18</td>
                                                <td>46</td>
                                                <td>22</td>
                                                <td>1.8 días</td>
                                            </tr>
                                            <tr>
                                                <td>SECPLAN</td>
                                                <td>12</td>
                                                <td>31</td>
                                                <td>28</td>
                                                <td>2.1 días</td>
                                            </tr>
                                            <tr>
                                                <td>Administración</td>
                                                <td>9</td>
                                                <td>51</td>
                                                <td>26</td>
                                                <td>1.2 días</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Alertas críticas</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Documento vencido: Informe presupuestario Q1
                                        <span class="badge text-bg-danger">Urgente</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Evento sin aprobación final: Operativo Salud
                                        <span class="badge text-bg-warning">Pendiente</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        Autoridad con mandato finalizando
                                        <span class="badge text-bg-info">30 días</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Exportaciones</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Genera reportes en PDF o Excel con filtros avanzados.</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-outline-primary">PDF</button>
                                    <button class="btn btn-outline-success">Excel</button>
                                    <button class="btn btn-outline-secondary">CSV</button>
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
