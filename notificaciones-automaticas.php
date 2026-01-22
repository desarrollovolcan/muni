<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Notificaciones automáticas"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Mantenedores"; $title = "Notificaciones automáticas"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Canales habilitados</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="canal-email" checked>
                                    <label class="form-check-label" for="canal-email">Correo electrónico</label>
                                </div>
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="checkbox" id="canal-sms">
                                    <label class="form-check-label" for="canal-sms">SMS</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="canal-app" checked>
                                    <label class="form-check-label" for="canal-app">Notificación interna</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Frecuencia de envíos</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="frecuencia">Enviar recordatorios</label>
                                    <select id="frecuencia" class="form-select">
                                        <option>En tiempo real</option>
                                        <option selected>Diario</option>
                                        <option>Semanal</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary w-100">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                                <div>
                                    <h5 class="card-title mb-0">Reglas configuradas</h5>
                                    <p class="text-muted mb-0">Define quién recibe avisos por eventos, documentos y permisos.</p>
                                </div>
                                <button class="btn btn-outline-primary">Nueva regla</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Evento</th>
                                                <th>Destino</th>
                                                <th>Canal</th>
                                                <th>Estado</th>
                                                <th>Última ejecución</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Documento próximo a vencer</td>
                                                <td>Unidad responsable + Auditoría</td>
                                                <td>Email</td>
                                                <td><span class="badge text-bg-success">Activa</span></td>
                                                <td>Hoy 08:15</td>
                                            </tr>
                                            <tr>
                                                <td>Evento en revisión</td>
                                                <td>Jefatura de área</td>
                                                <td>Interna</td>
                                                <td><span class="badge text-bg-success">Activa</span></td>
                                                <td>Ayer 18:42</td>
                                            </tr>
                                            <tr>
                                                <td>Nuevo adjunto cargado</td>
                                                <td>Encargados de transparencia</td>
                                                <td>Email + Interna</td>
                                                <td><span class="badge text-bg-secondary">Pausada</span></td>
                                                <td>12/01/2026</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Cola de envíos</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Recordatorio: Convenio Salud Familiar
                                        <span class="badge text-bg-info">Enviado</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Aprobación pendiente: Evento Operativo Salud
                                        <span class="badge text-bg-warning">Pendiente</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Aviso vencimiento: Informe presupuestario Q1
                                        <span class="badge text-bg-danger">Reintento</span>
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
