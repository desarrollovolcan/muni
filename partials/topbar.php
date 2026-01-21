<!-- Topbar Start -->
<header class="app-topbar">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-1">

            <!-- Brand Logo -->
            <a href="index.php" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="assets/images/logo-light.png" alt="logo"></span>
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="assets/images/logo-dark.png" alt="dark logo"></span>
                    <span class="logo-sm"><img src="assets/images/logo-sm.png" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button px-2">
                <i data-lucide="menu" class="font-22"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i data-lucide="menu" class="font-22"></i>
            </button>

            <form class="app-search d-none d-sm-flex align-items-center">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-icon" type="submit">
                                <i data-lucide="search" class="font-16"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Mega Menu Dropdown -->
            <div class="topbar-item d-none d-md-flex">
                <div class="dropdown">
                    <a href="" class="topbar-link btn btn-link px-2 dropdown-toggle drop-arrow-none fw-medium" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-offset="0,17" aria-haspopup="false" aria-expanded="false">
                        Pages <i class="mdi mdi-chevron-down ms-1"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-xxl p-0">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="p-3">
                                    <h5 class="mb-2 fw-semibold">UI Components</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="#!">Widgets</a>
                                        </li>
                                        <li>
                                            <a href="extended-dragula.php">Dragula</a>
                                        </li>
                                        <li>
                                            <a href="ui-dropdowns.php">Dropdowns</a>
                                        </li>
                                        <li>
                                            <a href="extended-ratings.php">Ratings</a>
                                        </li>
                                        <li>
                                            <a href="extended-sweetalerts.php">Sweet Alerts</a>
                                        </li>
                                        <li>
                                            <a href="extended-scrollbar.php">Scrollbar</a>
                                        </li>
                                        <li>
                                            <a href="form-range-slider.php">Range Slider</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="p-3">
                                    <h5 class="mb-2 fw-semibold">Applications</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="apps-ecommerce-products.php">eCommerce Pages</a>
                                        </li>
                                        <li>
                                            <a href="apps-hospital-doctors.php">Hospital</a>
                                        </li>
                                        <li>
                                            <a href="apps-email.php">Email</a>
                                        </li>
                                        <li>
                                            <a href="apps-calendar.php">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="apps-kanban.php">Kanban Board</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoices.php">Invoice Management</a>
                                        </li>
                                        <li>
                                            <a href="pages-pricing.php">Pricing</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-4 bg-light bg-opacity-50">
                                <div class="p-3">
                                    <h5 class="mb-2 fw-semibold">Extra Pages</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Left Sidebar with User</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Menu Collapsed</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Small Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">New Header Style</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">My Account</a>
                                        </li>
                                        <li>
                                            <a href="pages-coming-soon.php">Maintenance & Coming Soon</a>
                                        </li>
                                    </ul>
                                </div> <!-- end .bg-light-->
                            </div> <!-- end col-->
                        </div> <!-- end row-->
                    </div> <!-- .dropdown-menu-->
                </div> <!-- .dropdown-->
            </div> <!-- end topbar-item -->
        </div>

        <div class="d-flex align-items-center gap-1">

            <div class="topbar-item d-none d-sm-flex">
                <button class="topbar-link" id="light-dark-mode" type="button">
                    <i data-lucide="moon" class="font-22 light-mode"></i>
                    <i data-lucide="sun" class="font-22 dark-mode"></i>
                </button>
            </div>

            <!-- Language Dropdown -->
            <div class="topbar-item  d-none d-sm-flex">
                <div class="dropdown">
                    <button class="topbar-link" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/flags/us.jpg" alt="user-image" class="w-100" height="16" id="selected-language-image">
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="en">
                            <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12" data-translator-image> <span class="align-middle">English</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item" data-translator-lang="hi">
                            <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12" data-translator-image> <span class="align-middle">Germany</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Notification Dropdown -->
            <div class="topbar-item">
                <div class="dropdown">
                    <button class="topbar-link dropdown-toggle drop-arrow-none position-relative" data-bs-toggle="dropdown" data-bs-offset="0,25" type="button" data-bs-auto-close="outside" aria-haspopup="false" aria-expanded="false">
                        <i data-lucide="bell" class="font-22"></i>
                        <span class="badge bg-pink rounded-circle noti-icon-badge">4</span>
                    </button>

                    <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-lg" style="min-height: 300px;">
                        <div class="p-2 border-bottom bg-primary">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 font-16 fw-medium text-white"> Notifications</h6>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle drop-arrow-none link-dark" data-bs-toggle="dropdown" data-bs-offset="0,15" aria-expanded="false">
                                            <i class="mdi mdi-cog-outline font-22 align-middle text-white"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Mark as Read</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Delete All</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Do not Disturb</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Other Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="position-relative z-2" style="max-height: 300px;" data-simplebar>
                            <!-- item-->
                            <div class="dropdown-item notification-item py-2 text-wrap active" id="notification-1">
                                <span class="d-flex align-items-center">
                                    <span class="me-3 position-relative flex-shrink-0">
                                        <div class="avatar avatar-md">
                                            <span class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-cog-outline font-20"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <p class="fw-medium mb-0 text-dark">New settings</p>
                                        <span class="font-12">There are new settings available</span>
                                    </span>
                                    <span class="notification-item-close">
                                        <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                            <i class="mdi mdi-close font-16"></i>
                                        </button>
                                    </span>
                                </span>
                            </div>

                            <!-- item-->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="notification-2">
                                <span class="d-flex align-items-center">
                                    <span class="me-3 position-relative flex-shrink-0">
                                        <div class="avatar avatar-md">
                                            <span class="avatar-title bg-info rounded-circle">
                                                <i class="mdi mdi-bell-outline font-20"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <p class="fw-medium mb-0 text-dark">Updates</p>
                                        <span class="font-12">There are 2 new updates available</span>
                                    </span>
                                    <span class="notification-item-close">
                                        <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                            <i class="mdi mdi-close font-16"></i>
                                        </button>
                                    </span>
                                </span>
                            </div>

                            <!-- item-->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="notification-3">
                                <span class="d-flex align-items-center">
                                    <span class="me-3 position-relative flex-shrink-0">
                                        <div class="avatar avatar-md">
                                            <span class="avatar-title bg-danger rounded-circle">
                                                <i class="mdi mdi-account-plus-outline font-20"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <p class="fw-medium mb-0 text-dark">New Users</p>
                                        <span class="font-12">You have 10 unread messages</span>
                                    </span>
                                    <span class="notification-item-close">
                                        <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                            <i class="mdi mdi-close font-16"></i>
                                        </button>
                                    </span>
                                </span>
                            </div>

                            <!-- item-->
                            <div class="dropdown-item notification-item py-2 text-wrap" id="notification-4">
                                <span class="d-flex align-items-center">
                                    <span class="me-3 position-relative flex-shrink-0">
                                        <div class="avatar avatar-md">
                                            <span class="avatar-title bg-primary rounded-circle">
                                                <i class="mdi mdi-comment-account-outline font-20"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <p class="fw-medium mb-0 text-dark">Caleb Flakelar commented on Admin</p>
                                        <span class="font-12">4 days ago</span>
                                    </span>
                                    <span class="notification-item-close">
                                        <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                            <i class="mdi mdi-close font-16"></i>
                                        </button>
                                    </span>
                                </span>
                            </div>

                            <!-- item-->
                            <div class="dropdown-item notification-item py-2 text-wrap mb-5" id="notification-5">
                                <span class="d-flex align-items-center">
                                    <span class="me-3 position-relative flex-shrink-0">
                                        <div class="avatar avatar-md">
                                            <span class="avatar-title bg-info rounded-circle">
                                                <i class="mdi mdi-bell-outline font-20"></i>
                                            </span>
                                        </div>
                                    </span>
                                    <span class="flex-grow-1 text-muted">
                                        <p class="fw-medium mb-0 text-dark">Updates</p>
                                        <span class="font-12">There are 2 new updates available</span>
                                    </span>
                                    <span class="notification-item-close">
                                        <button type="button" class="btn btn-ghost-danger rounded-circle btn-sm btn-icon" data-dismissible="#notification-1">
                                            <i class="mdi mdi-close font-16"></i>
                                        </button>
                                    </span>
                                </span>
                            </div>
                        </div>


                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notification-item position-fixed z-2 bottom-0 text-center text-reset text-decoration-underline link-offset-2 fw-bold notify-item border-top border-light py-2">
                            View All
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <div class="dropdown">
                    <a class="topbar-link dropdown-toggle drop-arrow-none px-0" data-bs-toggle="dropdown" data-bs-offset="0,19" type="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                        <span class="d-lg-flex flex-column gap-1 d-none">
                            <span class="my-0">Maxine K</span>
                        </span>
                        <i data-lucide="chevron-down" class="d-none d-sm-flex" height="12"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-account-circle-outline me-1 font-17 align-middle"></i>
                            <span class="align-middle">My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-wallet-outline me-1 font-17 align-middle"></i>
                            <span class="align-middle">Wallet : <span class="fw-semibold">$985.25</span></span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-cog-outline me-1 font-17 align-middle"></i>
                            <span class="align-middle">Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-lifebuoy me-1 font-17 align-middle"></i>
                            <span class="align-middle">Support</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="mdi mdi-lock-outline me-1 font-17 align-middle"></i>
                            <span class="align-middle">Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item active fw-semibold text-danger">
                            <i class="mdi mdi-logout me-1 font-17 align-middle"></i>
                            <span class="align-middle">Sign Out</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Button Trigger Customizer Offcanvas -->
            <div class="topbar-item">
                <button class="topbar-link" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" type="button">
                    <i data-lucide="settings" class="font-22"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->