<div class="row justify-content-center">
    <div class="col-xl-10 col-xxl-8">
        <div class="card overflow-hidden border-0 shadow-lg">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5 bg-primary bg-gradient text-white d-none d-lg-flex flex-column justify-content-between p-5 position-relative">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 opacity-25">
                        <span class="display-6"><i class="bx bx-grid-alt"></i></span>
                    </div>
                    <div class="mt-2">
                        <div class="d-inline-flex align-items-center rounded-pill bg-light bg-opacity-10 px-3 py-2 mb-3">
                            <span class="badge bg-light text-primary rounded-pill me-2">Nuevo</span>
                            <span class="fw-semibold">Panel administrativo</span>
                        </div>
                        <h3 class="fw-semibold mb-3">Intranet Municipal</h3>
                        <p class="mb-4 text-white-50">Gestiona beneficiarios, requisitos y entregas con una experiencia renovada basada en Bootstrap.</p>
                        <ul class="list-unstyled mb-0 text-white-50">
                            <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Panel y reportes centralizados</li>
                            <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Seguimiento y trazabilidad</li>
                            <li class="d-flex align-items-center"><i class="bx bx-check-circle me-2"></i>Seguridad reforzada con registro de accesos</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="avatar-sm rounded bg-white bg-opacity-10 d-inline-flex align-items-center justify-content-center">
                            <i class="bx bxs-buildings text-white fs-5"></i>
                        </span>
                        <div>
                            <p class="mb-0 fw-semibold">Municipalidad</p>
                            <small class="text-white-50">Acceso exclusivo para funcionarios</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/images/logo-dark.png" alt="Logo municipal" height="32" class="d-block">
                                <div class="vr text-muted opacity-50"></div>
                                <span class="fw-semibold text-muted">Acceso interno</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary">Versión temática</span>
                        </div>
                        <div class="text-center mb-4">
                            <div class="avatar-lg bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                <i class="bx bxs-key fs-2"></i>
                            </div>
                            <h4 class="fw-semibold mb-1">Bienvenido</h4>
                            <p class="text-muted mb-0">Usa tus credenciales institucionales para continuar</p>
                        </div>
                        <?php include __DIR__ . '/../partials/flash.php'; ?>
                        <form method="post" action="/login" class="mt-3 flex-grow-1 d-flex flex-column">
                            <?php include __DIR__ . '/../partials/csrf_field.php'; ?>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light"><i class="bx bx-envelope"></i></span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="usuario@municipio.cl" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <label class="form-label mb-0" for="password">Contraseña</label>
                                    <small class="text-muted">Solo personal autorizado</small>
                                </div>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="•••••••" required>
                                </div>
                            </div>
                            <div class="d-grid mt-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Ingresar al panel</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <small class="text-muted">¿Nuevo en el sistema? <a href="/register" class="fw-semibold">Crear cuenta</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
