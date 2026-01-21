<div class="row justify-content-center">
    <div class="col-xl-10 col-xxl-8">
        <div class="card overflow-hidden border-0 shadow-lg">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-5 bg-primary bg-gradient text-white d-none d-lg-flex flex-column justify-content-between p-5 position-relative">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 opacity-25">
                        <span class="display-6"><i class="bx bx-user-plus"></i></span>
                    </div>
                    <div class="mt-2">
                        <div class="d-inline-flex align-items-center rounded-pill bg-light bg-opacity-10 px-3 py-2 mb-3">
                            <span class="badge bg-light text-primary rounded-pill me-2">Nuevo</span>
                            <span class="fw-semibold">Registro interno</span>
                        </div>
                        <h3 class="fw-semibold mb-3">Crear cuenta municipal</h3>
                        <p class="mb-4 text-white-50">Completa los datos del funcionario para habilitar el acceso al panel administrativo.</p>
                        <ul class="list-unstyled mb-0 text-white-50">
                            <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Roles y cargos definidos</li>
                            <li class="d-flex align-items-center mb-2"><i class="bx bx-check-circle me-2"></i>Información personal verificada</li>
                            <li class="d-flex align-items-center"><i class="bx bx-check-circle me-2"></i>Acceso seguro con contraseña</li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="avatar-sm rounded bg-white bg-opacity-10 d-inline-flex align-items-center justify-content-center">
                            <i class="bx bxs-id-card text-white fs-5"></i>
                        </span>
                        <div>
                            <p class="mb-0 fw-semibold">Municipalidad</p>
                            <small class="text-white-50">Registro exclusivo para funcionarios</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <img src="/assets/images/logo-dark.png" alt="Logo municipal" height="32" class="d-block">
                                <div class="vr text-muted opacity-50"></div>
                                <span class="fw-semibold text-muted">Registro interno</span>
                            </div>
                            <span class="badge bg-primary-subtle text-primary">Nuevo usuario</span>
                        </div>
                        <div class="text-center mb-4">
                            <div class="avatar-lg bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                                <i class="bx bxs-user-plus fs-2"></i>
                            </div>
                            <h4 class="fw-semibold mb-1">Registrar funcionario</h4>
                            <p class="text-muted mb-0">Ingresa los datos básicos para habilitar el acceso</p>
                        </div>
                        <?php include __DIR__ . '/../partials/flash.php'; ?>
                        <form method="post" action="/register" class="mt-3 flex-grow-1 d-flex flex-column gap-3">
                            <?php include __DIR__ . '/../partials/csrf_field.php'; ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="apellido">Apellido</label>
                                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="rut">RUT</label>
                                    <input type="text" id="rut" name="rut" class="form-control" placeholder="12.345.678-9" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="cargo">Cargo</label>
                                    <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Ej: Asistente Social" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="rol_id">Rol</label>
                                    <select id="rol_id" name="rol_id" class="form-select" required>
                                        <option value="" selected disabled>Selecciona un rol</option>
                                        <?php foreach ($roles as $rol): ?>
                                            <option value="<?= $rol['id_rol'] ?>"><?= $rol['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email institucional</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="usuario@municipio.cl" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="password_confirm">Confirmar contraseña</label>
                                    <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="••••••••" required>
                                </div>
                            </div>
                            <div class="d-grid mt-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Crear usuario</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <small class="text-muted">¿Ya tienes cuenta? <a href="/login" class="fw-semibold">Inicia sesión</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
