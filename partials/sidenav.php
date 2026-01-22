<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <a href="index.php" class="logo">
        <span class="logo logo-light">
            <span class="logo-lg"><img src="assets/images/logo.png" alt="logo"></span>
            <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
        </span>

        <span class="logo logo-dark">
            <span class="logo-lg"><img src="assets/images/logo-black.png" alt="dark logo"></span>
            <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-on-hover">
        <i class="ti ti-menu-4 fs-22 align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-offcanvas">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div class="scrollbar" data-simplebar>

        <!-- User -->
        <div class="sidenav-user">
            <?php
            $userName = $_SESSION['user']['nombre'] ?? 'Usuario';
            $userLastName = $_SESSION['user']['apellido'] ?? '';
            $userRole = $_SESSION['user']['rol'] ?? 'Sin rol';
            ?>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="sidenav-user-name fw-bold"><?php echo htmlspecialchars(trim($userName . ' ' . $userLastName), ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="fs-12 fw-semibold" data-lang="user-role"><?php echo htmlspecialchars($userRole, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div>
                    <a class="dropdown-toggle drop-arrow-none link-reset sidenav-user-set-icon" data-bs-toggle="dropdown" data-bs-offset="0,12" href="#!" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-settings fs-24 align-middle ms-1"></i>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Sesión activa</h6>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item fw-semibold">
                            <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Cerrar sesión</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title mt-2" data-lang="menu-title">Inicio</li>

            <li class="side-nav-item">
                <a href="dashboard.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="layout-dashboard"></i></span>
                    <span class="menu-text">Panel</span>
                </a>
            </li>

            <li class="side-nav-title" data-lang="modules-title">Módulos</li>

            <li class="side-nav-item">
                <a href="#modulo-seguridad" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-seguridad">
                    <span class="menu-icon"><i data-lucide="shield-check"></i></span>
                    <span class="menu-text">Seguridad y Acceso</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-seguridad">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="login.php" class="side-nav-link">Login / Logout</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="recuperar-contrasena.php" class="side-nav-link">Recuperar contraseña</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sesiones.php" class="side-nav-link">Gestión de sesiones</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="bitacora.php" class="side-nav-link">Bitácora (auditoría)</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#modulo-usuarios" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-usuarios">
                    <span class="menu-icon"><i data-lucide="users"></i></span>
                    <span class="menu-text">Usuarios</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-usuarios">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="usuarios-lista.php" class="side-nav-link">Listar usuarios</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="usuarios-crear.php" class="side-nav-link">Crear usuario</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="users-profile.php" class="side-nav-link">Perfil</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="usuarios-asignar-roles.php" class="side-nav-link">Asignar roles</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#modulo-roles" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-roles">
                    <span class="menu-icon"><i data-lucide="key-round"></i></span>
                    <span class="menu-text">Roles y Permisos</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-roles">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="roles-lista.php" class="side-nav-link">Listar roles</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="roles-editar.php" class="side-nav-link">Crear rol</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="roles-permisos.php" class="side-nav-link">Matriz de permisos</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#modulo-eventos" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-eventos">
                    <span class="menu-icon"><i data-lucide="calendar-check"></i></span>
                    <span class="menu-text">Eventos Municipales</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-eventos">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="eventos-lista.php" class="side-nav-link">Listar eventos</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="eventos-editar.php" class="side-nav-link">Crear evento</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="eventos-adjuntos.php" class="side-nav-link">Subir adjuntos</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="eventos-adjuntos-gestionar.php" class="side-nav-link">Descargar/eliminar adjuntos</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#modulo-autoridades" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-autoridades">
                    <span class="menu-icon"><i data-lucide="landmark"></i></span>
                    <span class="menu-text">Autoridades</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-autoridades">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="autoridades-lista.php" class="side-nav-link">Listar autoridades</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="autoridades-editar.php" class="side-nav-link">Crear autoridad</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="autoridades-adjuntos.php" class="side-nav-link">Adjuntos</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->
