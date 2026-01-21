<div class="row justify-content-center">
    <div class="col-xl-10 col-xxl-8">
        <div class="card overflow-hidden border-0 shadow-lg">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5 bg-success bg-gradient text-white d-none d-lg-flex flex-column justify-content-center p-5">
                    <div class="mb-4">
                        <span class="badge bg-light text-success rounded-pill px-3 py-2">Portal beneficiario</span>
                    </div>
                    <h3 class="fw-semibold mb-3">Postula y haz seguimiento</h3>
                    <p class="mb-4 text-white-50">Ingresa con tus credenciales para revisar beneficios, cargar documentos y seguir tus solicitudes.</p>
                    <ul class="list-unstyled mb-0 text-white-50">
                        <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Estado actualizado de beneficios</li>
                        <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Subida segura de documentos</li>
                        <li class="d-flex align-items-center"><i class="bx bx-check-circle me-2"></i>Acompañamiento y recordatorios</li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <div class="avatar-lg bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                <i class="bx bxs-user fs-2"></i>
                            </div>
                            <h4 class="fw-semibold mb-1">Bienvenido</h4>
                            <p class="text-muted mb-0">Accede a tu portal ciudadano</p>
                        </div>
                        <?php include __DIR__ . '/../../partials/flash.php'; ?>
                        <form method="post" action="/portal/login" class="mt-3">
                            <?php include __DIR__ . '/../../partials/csrf_field.php'; ?>
                            <div class="mb-3">
                                <label class="form-label" for="rut">RUT</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light"><i class="bx bx-id-card"></i></span>
                                    <input type="text" id="rut" name="rut" class="form-control" placeholder="12.345.678-9" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="portal-password">Contraseña</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" id="portal-password" name="password" class="form-control" placeholder="••••••••" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-success btn-lg" type="submit">Entrar al portal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
