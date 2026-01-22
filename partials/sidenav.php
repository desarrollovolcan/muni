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
                <a href="javascript:void(0);" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="folder"></i></span>
                    <span class="menu-text">Próximamente</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->
