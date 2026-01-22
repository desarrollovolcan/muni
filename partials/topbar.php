<!-- Topbar Start -->
<header class="app-topbar">
    <div class="container-fluid topbar-menu">
        <div class="d-flex align-items-center gap-2">
            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="index.php" class="logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="index.php" class="logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-black.png" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button btn btn-default btn-icon">
                <i class="ti ti-menu-4 fs-22"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ti ti-menu-4 fs-22"></i>
            </button>

        </div> <!-- .d-flex-->

        <div class="d-flex align-items-center gap-2">

            <!-- Search -->
            <div class="app-search d-none d-xl-flex me-2">
                <input type="search" class="form-control topbar-search rounded-pill" name="search" placeholder="Quick Search...">
                <i data-lucide="search" class="app-search-icon text-muted"></i>
            </div>

            <!-- Notification Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link dropdown-toggle drop-arrow-none" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="bell" class="fs-xxl"></i>
                        <span class="badge text-bg-danger badge-circle topbar-badge">5</span>
                    </button>

                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg">
                        <div class="px-3 py-2 border-bottom">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fs-md fw-semibold">Notifications</h6>
                                </div>
                                <div class="col text-end">
                                    <a href="#!" class="badge badge-soft-success badge-label py-1">07 Notifications</a>
                                </div>
                            </div>
                        </div>

                        <div style="max-height: 300px;" data-simplebar>
                            <!-- Notification 1 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-1">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-4.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-success notification-badge">
                                            <i class="ti ti-bell align-middle"></i>
                                            <span class="visually-hidden">unread notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Emily Johnson</span> commented on a task in <span class="fw-medium text-body">Design Sprint</span><br>
                                        <span class="fs-xs">12 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-1">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 2 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-2">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-info notification-badge">
                                            <i class="ti ti-cloud-upload align-middle"></i>
                                            <span class="visually-hidden">upload notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Michael Lee</span> uploaded files to <span class="fw-medium text-body">Marketing </span><br>
                                        <span class="fs-xs">25 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-2">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 3 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-3">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-6.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-warning notification-badge">
                                            <i class="ti ti-alert-triangle align-middle"></i>
                                            <span class="visually-hidden">alert</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Sophia Ray</span> flagged an issue in <span class="fw-medium text-body">Bug Tracker</span><br>
                                        <span class="fs-xs">40 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-3">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 4 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-4">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-7.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-primary notification-badge">
                                            <i class="ti ti-calendar-event align-middle"></i>
                                            <span class="visually-hidden">event notification</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">David Kim</span> scheduled a meeting for <span class="fw-medium text-body">UX Review</span><br>
                                        <span class="fs-xs">1 hour ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-4">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 5 -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-5">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <img src="assets/images/users/user-8.jpg" class="avatar-md rounded-circle" alt="User Avatar">
                                        <span class="position-absolute rounded-pill bg-secondary notification-badge">
                                            <i class="ti ti-edit-circle align-middle"></i>
                                            <span class="visually-hidden">edit</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Isabella White</span> updated the document in <span class="fw-medium text-body">Product Specs</span><br>
                                        <span class="fs-xs">2 hours ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-5">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 6 - Server CPU Alert -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-6">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <span class="avatar-md rounded-circle bg-light d-flex align-items-center justify-content-center">
                                            <i class="ti ti-server-bolt fs-4 text-danger"></i>
                                        </span>
                                        <span class="position-absolute rounded-pill bg-danger notification-badge">
                                            <i class="ti ti-alert-circle align-middle"></i>
                                            <span class="visually-hidden">server alert</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Server #3</span> CPU usage exceeded 90%<br>
                                        <span class="fs-xs">Just now</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-6">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>

                            <!-- Notification 7 - Deployment Success -->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="message-7">
                                <span class="d-flex align-items-center gap-3">
                                    <span class="flex-shrink-0 position-relative">
                                        <span class="avatar-md rounded-circle bg-light d-flex align-items-center justify-content-center">
                                            <i class="ti ti-rocket fs-4 text-success"></i>
                                        </span>
                                        <span class="position-absolute rounded-pill bg-success notification-badge">
                                            <i class="ti ti-check align-middle"></i>
                                            <span class="visually-hidden">deployment</span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <span class="fw-medium text-body">Production Server</span> deployment completed successfully<br>
                                        <span class="fs-xs">30 minutes ago</span>
                                    </span>
                                    <button type="button" class="flex-shrink-0 text-muted btn btn-link p-0 position-absolute end-0 me-2 d-none noti-close-btn" data-dismissible="#message-7">
                                        <i class="ti ti-xbox-x-filled fs-xxl"></i>
                                    </button>
                                </span>
                            </div>
                        </div>


                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                            Read All Messages
                        </a>

                    </div> <!-- End dropdown-menu -->
                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- Theme Mode Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="layout-grid" class="fs-xxl"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-lg p-2 dropdown-menu-end">
                        <div class="row align-items-center g-1">
                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="assets/images/logos/google.svg" alt="Google Logo" height="18">
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Google</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="assets/images/logos/figma.svg" alt="Figma Logo" height="18">
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Figma</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="assets/images/logos/slack.svg" alt="Slack Logo" height="18">
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Slack</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title text-bg-light rounded-circle">
                                            <img src="assets/images/logos/dropbox.svg" alt="Dropbox Logo" height="18">
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Dropbox</span>
                                </a>
                            </div>

                            <div class="col-4 text-center">
                                <a href="javascript:void(0);" class="btn btn-sm rounded-circle btn-icon btn-danger">
                                    <i data-lucide="circle-plus" class="fs-18"></i>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-calendar fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Calendar</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-message-circle fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Chat</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-folder fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Files</span>
                                </a>
                            </div>

                            <div class="col-4">
                                <a href="javascript:void(0);" class="dropdown-item border border-dashed rounded text-center py-2">
                                    <span class="avatar-sm d-block mx-auto mb-1">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle">
                                            <i class="ti ti-users fs-18"></i>
                                        </span>
                                    </span>
                                    <span class="align-middle fw-medium">Team</span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- Theme Mode Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,24" type="button" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="sun" class="fs-xxl"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end thememode-dropdown">

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="sun" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">Light</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="light">
                            </label>
                        </li>

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="moon" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">Dark</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="dark">
                            </label>
                        </li>

                        <li>
                            <label class="dropdown-item">
                                <i data-lucide="monitor-cog" class="align-middle me-1 fs-16"></i>
                                <span class="align-middle">System</span>
                                <input class="form-check-input" type="radio" name="data-bs-theme" value="system">
                            </label>
                        </li>

                    </ul> <!-- end dropdown-menu-->
                </div> <!-- end dropdown-->
            </div> <!-- end topbar item-->

            <!-- FullScreen -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" type="button" data-toggle="fullscreen">
                    <i data-lucide="maximize" class="fs-xxl fullscreen-off"></i>
                    <i data-lucide="minimize" class="fs-xxl fullscreen-on"></i>
                </button>
            </div>

            <!-- Light/Dark Mode Button -->
            <div class="topbar-item d-none">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i data-lucide="moon" class="fs-xxl mode-light-moon"></i>
                </button>
            </div>

            <!-- Monocrome Mode Button -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" type="button" id="monochrome-mode">
                    <i data-lucide="palette" class="fs-xxl"></i>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <?php
                $userName = $_SESSION['user']['nombre'] ?? 'Usuario';
                $userLastName = $_SESSION['user']['apellido'] ?? '';
                $userRole = $_SESSION['user']['rol'] ?? 'Sin rol';
                $userFullName = trim($userName . ' ' . $userLastName);
                ?>
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown" data-bs-offset="0,19" href="#!" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/user-3.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        <div class="d-lg-flex align-items-center gap-1 d-none">
                            <h5 class="my-0"><?php echo htmlspecialchars($userFullName ?: 'Usuario', ENT_QUOTES, 'UTF-8'); ?></h5>
                            <i class="ti ti-chevron-down align-middle"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- Header -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Usuario activo</h6>
                            <span class="fs-12 fw-semibold text-muted"><?php echo htmlspecialchars($userFullName ?: 'Usuario', ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="d-block fs-12 text-muted"><?php echo htmlspecialchars($userRole, ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>

                        <!-- Edit Profile -->
                        <a href="users-profile.php" class="dropdown-item">
                            <i class="ti ti-user-circle me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Editar perfil</span>
                        </a>

                        <!-- Change Password -->
                        <a href="auth-new-pass.php" class="dropdown-item">
                            <i class="ti ti-lock me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Cambiar contraseña</span>
                        </a>

                        <!-- Divider -->
                        <div class="dropdown-divider"></div>

                        <!-- Logout -->
                        <a href="logout.php" class="dropdown-item fw-semibold">
                            <i class="ti ti-logout-2 me-1 fs-17 align-middle"></i>
                            <span class="align-middle">Cerrar aplicación</span>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Button Trigger Customizer Offcanvas -->
            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                    <i class="ti ti-settings icon-spin fs-24"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->
