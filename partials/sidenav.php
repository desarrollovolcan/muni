<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

    <!-- Brand Logo -->
    <?php $municipalidad = get_municipalidad(); ?>
    <a href="index.php" class="logo">
        <span class="logo logo-light">
            <span class="logo-lg">
                <img src="<?php echo htmlspecialchars($municipalidad['logo_path'] ?? 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="<?php echo htmlspecialchars($municipalidad['logo_path'] ?? 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt="logo">
            </span>
        </span>

        <span class="logo logo-dark">
            <span class="logo-lg">
                <img src="<?php echo htmlspecialchars($municipalidad['logo_path'] ?? 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt="logo">
            </span>
            <span class="logo-sm">
                <img src="<?php echo htmlspecialchars($municipalidad['logo_path'] ?? 'assets/images/logo.png', ENT_QUOTES, 'UTF-8'); ?>" alt="logo">
            </span>
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

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title mt-2" data-lang="menu-title">Gestión</li>

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
                            <a href="eventos-autoridades.php" class="side-nav-link">Autoridades por evento</a>
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
                <a href="#modulo-documental" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-documental">
                    <span class="menu-icon"><i data-lucide="folder-open"></i></span>
                    <span class="menu-text">Gestión Documental</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-documental">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="dms-documentos.php" class="side-nav-link">Documentos</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="dms-categorias.php" class="side-nav-link">Categorías y etiquetas</a>
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

            <li class="side-nav-item">
                <a href="calendar.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="calendar"></i></span>
                    <span class="menu-text">Calendario</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="reportes.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="bar-chart-3"></i></span>
                    <span class="menu-text">Reportes</span>
                </a>
            </li>

            <li class="side-nav-title" data-lang="settings-title">Administración</li>

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
                        <li class="side-nav-item">
                            <a href="permisos-unidades.php" class="side-nav-link">Permisos por unidad</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="#modulo-mantenedores" class="side-nav-link" data-bs-toggle="collapse" aria-expanded="false" aria-controls="modulo-mantenedores">
                    <span class="menu-icon"><i data-lucide="settings-2"></i></span>
                    <span class="menu-text">Mantenedores</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="modulo-mantenedores">
                    <ul class="side-nav sub-menu">
                        <li class="side-nav-item">
                            <a href="municipalidad.php" class="side-nav-link">Municipalidad</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="eventos-tipos.php" class="side-nav-link">Tipos de evento</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="notificaciones-correo.php" class="side-nav-link">Correo de notificaciones</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="notificaciones-automaticas.php" class="side-nav-link">Notificaciones automáticas</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->
