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

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="users-profile.php" class="link-reset">
                        <img src="assets/images/users/user-3.jpg" alt="user-image" class="rounded-circle mb-2 avatar-md">
                        <span class="sidenav-user-name fw-bold">Geneva K.</span>
                        <span class="fs-12 fw-semibold" data-lang="user-role">Art Director</span>
                    </a>
                </div>
                <div>
                    <a class="dropdown-toggle drop-arrow-none link-reset sidenav-user-set-icon" data-bs-toggle="dropdown" data-bs-offset="0,12" href="#!" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-settings fs-24 align-middle ms-1"></i>
                    </a>

                    <div class="dropdown-menu">
                        <!-- Header -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome back!</h6>
                        </div>

                        <!-- My Profile -->
                        <a href="profile.php" class="dropdown-item">
                            <i class="ti ti-user-circle me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Profile</span>
                        </a>

                        <!-- Notifications -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-bell-ringing me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Notifications</span>
                        </a>

                        <!-- Settings -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-settings-2 me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Account Settings</span>
                        </a>

                        <!-- Support -->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="ti ti-headset me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Support Center</span>
                        </a>

                        <!-- Divider -->
                        <div class="dropdown-divider"></div>

                        <!-- Lock -->
                        <a href="auth-lock-screen.php" class="dropdown-item">
                            <i class="ti ti-lock me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Lock Screen</span>
                        </a>

                        <!-- Logout -->
                        <a href="javascript:void(0);" class="dropdown-item fw-semibold">
                            <i class="ti ti-logout-2 me-2 fs-17 align-middle"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title mt-2" data-lang="menu-title">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="circle-gauge"></i></span>
                    <span class="menu-text" data-lang="dashboards">Dashboards</span>
                    <span class="badge bg-success">02</span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="index.php" class="side-nav-link">
                                <span class="menu-text" data-lang="dashboard-one">Dashboard 1</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="dashboard-2.php" class="side-nav-link">
                                <span class="menu-text" data-lang="dashboard-two">Dashboard 2</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="landing.php" target="_blank" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="earth"></i></span>
                    <span class="menu-text" data-lang="landing-page">Landing Page</span>
                </a>
            </li>

            <li class="side-nav-title" data-lang="apps-title">Apps</li>

            <li class="side-nav-item">
                <a href="chat.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="message-square-dot"></i></span>
                    <span class="menu-text" data-lang="chat"> Chat </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="calendar.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="calendar"></i></span>
                    <span class="menu-text" data-lang="calendar"> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="file-manager.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="folder-open-dot"></i></span>
                    <span class="menu-text" data-lang="file-manager"> File Manager </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="shopping-bag"></i></span>
                    <span class="menu-text" data-lang="ecommerce">Ecommerce</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarProducts" aria-expanded="false" aria-controls="sidebarProducts" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-products">Products</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarProducts">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="ecommerce-products.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-pro-listing">Listing</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="ecommerce-products-grid.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-pro-grid">Products Grid</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="ecommerce-product-details.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-pro-details">Product Details</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="ecommerce-add-product.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-pro-add">Add Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="ecommerce-categories.php" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-categories">Categories</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarOrders" aria-expanded="false" aria-controls="sidebarOrders" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-orders">Orders</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOrders">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="ecommerce-orders.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-orders-list">Orders</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="ecommerce-order-details.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-order-details">Order Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="ecommerce-customers.php" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-customers">Customers</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSellers" aria-expanded="false" aria-controls="sidebarSellers" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-sellers"> Sellers </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSellers">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="ecommerce-sellers.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-sellers-list">Sellers</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="ecommerce-seller-details.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="eco-sellers-details">Sellers Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="ecommerce-reviews.php" class="side-nav-link">
                                <span class="menu-text" data-lang="eco-reviews">Reviews</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="inbox"></i></span>
                    <span class="menu-text" data-lang="email">Email</span>
                    <span class="badge text-bg-danger">New</span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="email.php" class="side-nav-link">
                                <span class="menu-text" data-lang="email-inbox">Inbox</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="email-details.php" class="side-nav-link">
                                <span class="menu-text" data-lang="email-details">Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="email-compose.php" class="side-nav-link">
                                <span class="menu-text" data-lang="email-compose">Compose</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="email-templates.php" class="side-nav-link">
                                <span class="menu-text" data-lang="email-templates">Email Templates</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCRM" aria-expanded="false" aria-controls="sidebarCRM" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="handshake"></i></span>
                    <span class="menu-text" data-lang="crm"> CRM </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCRM">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="crm-contacts.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-contacts">Contacts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-opportunities.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-opportunities">Opportunities</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-deals.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-deals">Deals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-leads.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-leads">Leads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-pipeline.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-pipeline">Pipeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-campaign.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-campaign">Campaign</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-proposals.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-proposals">Proposals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-estimations.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-estimations">Estimations</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-customers.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-customers">Customers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="crm-activities.php" class="side-nav-link">
                                <span class="menu-text" data-lang="crm-activities">Activities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarUsers" aria-expanded="false" aria-controls="sidebarUsers" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="users"></i></span>
                    <span class="menu-text" data-lang="users"> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarUsers">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="users-contacts.php" class="side-nav-link">
                                <span class="menu-text" data-lang="contacts">Contacts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="users-profile.php" class="side-nav-link">
                                <span class="menu-text" data-lang="profile">Profile</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="users-roles.php" class="side-nav-link">
                                <span class="menu-text" data-lang="roles">Roles</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="users-role-details.php" class="side-nav-link">
                                <span class="menu-text" data-lang="role-details">Role Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="users-permissions.php" class="side-nav-link">
                                <span class="menu-text" data-lang="permissions">Permissions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarInvoice" aria-expanded="false" aria-controls="sidebarInvoice" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="receipt-text"></i></span>
                    <span class="menu-text" data-lang="invoice"> Invoice</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInvoice">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="invoices.php" class="side-nav-link">
                                <span class="menu-text" data-lang="invoices">Invoices</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="invoice-details.php" class="side-nav-link">
                                <span class="menu-text" data-lang="invoice-details">Single Invoice</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="invoice-create.php" class="side-nav-link">
                                <span class="menu-text" data-lang="invoice-create">New Invoice</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="social-feed.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="rss"></i></span>
                    <span class="menu-text" data-lang="social"> Social Feed </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTickets" aria-expanded="false" aria-controls="sidebarTickets" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="life-buoy"></i></span>
                    <span class="menu-text" data-lang="support"> Support Center</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTickets">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="tickets-list.php" class="side-nav-link">
                                <span class="menu-text" data-lang="tickets">Tickets List</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ticket-details.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ticket-details">Ticket Details</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ticket-create.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ticket-create">New Ticket</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="api-keys.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="key"></i></span>
                    <span class="menu-text" data-lang="api-keys"> API Keys </span>
                </a>
            </li>

            <li class="side-nav-title mt-2" data-lang="pages-title">Custom Pages</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="notebook-text"></i></span>
                    <span class="menu-text" data-lang="pages"> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="pages-faq.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-faq">FAQ</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-pricing.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-pricing">Pricing</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-empty.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-empty">Empty Page</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-timeline.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-timeline">Timeline</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-sitemap.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-sitemap">Sitemap</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-search-results.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-search-results">Search Results</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-coming-soon.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-coming-soon">Coming Soon</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-terms-conditions.php" class="side-nav-link">
                                <span class="menu-text" data-lang="pages-terms-conditions">Terms & Conditions</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="fingerprint"></i></span>
                    <span class="menu-text" data-lang="authentication"> Authentication </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarOneAuth" aria-expanded="false" aria-controls="sidebarOneAuth" class="side-nav-link">
                                <span class="menu-text" data-lang="basic-auth"> Basic </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOneAuth">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="auth-sign-in.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-sign-up.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-reset-pass.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-new-pass.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-two-factor.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-lock-screen.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-success-mail.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-login-pin.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-delete-account.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-delete-account">Delete Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTwoAuth" aria-expanded="false" aria-controls="sidebarTwoAuth" class="side-nav-link">
                                <span class="menu-text" data-lang="cover-auth"> Cover </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTwoAuth">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="auth-2-sign-in.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-sign-in">Sign In</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-sign-up.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-sign-up">Sign Up</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-reset-pass.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-reset-pass">Reset Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-new-pass.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-new-pass">New Password</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-two-factor.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-two-factor">Two Factor</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-lock-screen.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-lock-screen">Lock Screen</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-success-mail.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-success-mail">Success Mail</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-login-pin.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-login-pin">Login with PIN</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="auth-2-delete-account.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="auth-2-delete-account">Delete Account</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="shield-alert"></i></span>
                    <span class="menu-text" data-lang="error-pages"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesError">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="error-400.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-400">400 Bad Request</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-401.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-401">401 Unauthorized</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-403.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-403">403 Forbidden</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-404.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-404">404 Not Found</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-408.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-408">408 Request Timeout</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-500.php" class="side-nav-link">
                                <span class="menu-text" data-lang="error-500">500 Internal Server</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="maintenance.php" class="side-nav-link">
                                <span class="menu-text" data-lang="maintenance">Maintenance</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2" data-lang="layouts-title">Layouts</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="proportions"></i></span>
                    <span class="menu-text" data-lang="layout-options"> Layout Options </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="layouts-scrollable.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="layouts-scrollable">Scrollable</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-compact.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="layouts-compact">Compact</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-boxed.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="layouts-boxed">Boxed</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-horizontal.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="layouts-horizontal">Horizontal</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-preloader.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="layouts-preloader">Preloader</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSidebars" aria-expanded="false" aria-controls="sidebarSidebars" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="panel-right-close"></i></span>
                    <span class="menu-text" data-lang="sidebars"> Sidebars </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSidebars">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="sidebar-dark.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-dark">Dark Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-gradient.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-gradient">Gradient Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-gray.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-gray">Gray Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-image.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-image">Image Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-compact.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-compact">Compact Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-icon-view.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-icon-view">Icon View Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-on-hover.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-on-hover">On Hover Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-on-hover-active.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-on-hover-active">On Hover Active</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-offcanvas.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-offcanvas">Offcanvas Menu</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-no-icons.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-no-icons">No Icons with Lines</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="sidebar-with-lines.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="sidebar-with-lines">Sidebar with Lines</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTopbars" aria-expanded="false" aria-controls="sidebarTopbars" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="panel-top"></i></span>
                    <span class="menu-text" data-lang="topbar"> Topbar </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTopbars">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="topbar-light.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="topbar-light">Light Topbar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="topbar-gray.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="topbar-gray">Gray Topbar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="topbar-gradient.php" target="_blank" class="side-nav-link">
                                <span class="menu-text" data-lang="topbar-gradient">Gradient Topbar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2" data-lang="components-title">Components</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="pencil-ruler"></i></span>
                    <span class="menu-text" data-lang="base-ui"> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="ui-buttons.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-buttons">Buttons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-images.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-images">Images</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-accordions.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-accordions">Accordions</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-alerts.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-alerts">Alerts</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="ui-badges.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-badges">Badges</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-breadcrumb.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-breadcrumb">Breadcrumb</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="ui-cards.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-cards">Cards</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-carousel.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-carousel">Carousel</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-collapse.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-collapse">Collapse</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-colors.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-colors">Colors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-dropdowns.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-dropdowns">Dropdowns</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-videos.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-videos">Videos</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-grid.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-grid">Grid Options</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-links.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-links">Links</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-list-group.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-list-group">List Group</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-modals.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-modals">Modals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-notifications.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-notifications">Notifications</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-offcanvas.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-offcanvas">Offcanvas</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-placeholders.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-placeholders">Placeholders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-pagination.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-pagination">Pagination</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-popovers.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-popovers">Popovers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-progress.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-progress">Progress</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-scrollspy.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-scrollspy">Scrollspy</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-spinners.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-spinners">Spinners</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-tabs.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-tabs">Tabs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-tooltips.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-tooltips">Tooltips</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-typography.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-typography">Typography</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-utilities.php" class="side-nav-link">
                                <span class="menu-text" data-lang="ui-utilities">Utilities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMiscellaneous" aria-expanded="false" aria-controls="sidebarMiscellaneous" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="house-plug"></i></span>
                    <span class="menu-text" data-lang="miscellaneous"> Miscellaneous </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMiscellaneous">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="misc-sortable.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-sortable">Sortable List</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-pdf-viewer.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-pdf-viewer">PDF Viewer</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-i18.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-i18">i18 Support</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-sweet-alerts.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-sweet-alerts">Sweet Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-pass-meter.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-pass-meter">Password Meter</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-clipboard.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-clipboard">Clipboard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-tree-view.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-tree-view">Tree View</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="misc-tour.php" class="side-nav-link">
                                <span class="menu-text" data-lang="misc-tour">Tour</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="widgets.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="dessert"></i></span>
                    <span class="menu-text" data-lang="widgets"> Widgets </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="chart-no-axes-combined"></i></span>
                    <span class="menu-text" data-lang="charts"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false" aria-controls="sidebarApexCharts" class="side-nav-link">
                                <span class="menu-text" data-lang="apex-charts"> Apex Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarApexCharts">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="charts-apex-area.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-area">Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-bar.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-bar">Bar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-bubble.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-bubble">Bubble</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-candlestick.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-candlestick">Candlestick</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-column.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-column">Column</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-heatmap.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-heatmap">Heatmap</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-line.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-line">Line</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-mixed.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-mixed">Mixed</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-timeline.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-timeline">Timeline</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-boxplot.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-boxplot">Boxplot</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-treemap.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-treemap">Treemap</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-pie.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-pie">Pie</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-radar.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-radar">Radar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-radialbar.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-radialbar">RadialBar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-scatter.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-scatter">Scatter</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-polar-area.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-polar-area">Polar Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-sparklines.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-sparklines">Sparklines</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-range.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-range">Range</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-funnel.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-funnel">Funnel</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="charts-apex-slope.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="charts-apex-slope">Slope</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarChartJs" aria-expanded="false" aria-controls="sidebarChartJs" class="side-nav-link">
                                <span class="menu-text" data-lang="chartjs"> Chart Js </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarChartJs">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="chartjs-area.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="chartjs-area">Area</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="chartjs-bar.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="chartjs-bar">Bar</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="chartjs-line.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="chartjs-line">Line</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="chartjs-other.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="chartjs-other">Other</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-apextree.php" class="side-nav-link">
                                <span class="menu-text" data-lang="charts-apextree">Apex Tree</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-apexsankey.php" class="side-nav-link">
                                <span class="menu-text" data-lang="charts-apexsankey">Apex Sankey</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="file-input"></i></span>
                    <span class="menu-text" data-lang="forms">Forms</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="form-elements.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-elements">Basic Elements</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-pickers.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-pickers">Pickers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-select.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-select">Select</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-validation.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-validation">Validation</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-wizard.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-wizard">Wizard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-fileuploads.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-fileuploads">File Uploads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-text-editors.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-text-editors">Text Editors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-range-slider.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-range-slider">Range Slider</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-layouts.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-layouts">Layouts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-other-plugins.php" class="side-nav-link">
                                <span class="menu-text" data-lang="form-other-plugins">Other Plugins</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="table"></i></span>
                    <span class="menu-text" data-lang="tables">Tables</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="tables-static.php" class="side-nav-link">
                                <span class="menu-text" data-lang="tables-static">Static Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tables-custom.php" class="side-nav-link">
                                <span class="menu-text" data-lang="tables-custom">Custom Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDataTables" aria-expanded="false" aria-controls="sidebarDataTables" class="side-nav-link">
                                <span class="menu-text" data-lang="datatables">DataTables</span>
                                <span class="badge bg-success">13</span>
                            </a>
                            <div class="collapse" id="sidebarDataTables">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-basic.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-basic">Basic</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-export-data.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-export-data">Export Data</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-select.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-select">Select</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-ajax.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-ajax">Ajax</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-javascript.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-javascript">Javascript Source</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-rendering.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-rendering">Data Rendering</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-scroll.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-scroll">Scroll</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-fixed-columns.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-fixed-columns">Fixed Columns</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-columns.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-columns">Show & Hide Column</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-child-rows.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-child-rows">Child Rows</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-column-searching.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-column-searching">Column Searching</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-range-search.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-range-search">Range Search</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-fixed-header.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-fixed-header">Fixed Header</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-add-rows.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-add-rows">Add Rows</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="tables-datatables-checkbox-select.php" class="side-nav-link">
                                            <span class="menu-text" data-lang="tables-datatables-checkbox-select">Checkbox Select</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="sparkles"></i></span>
                    <span class="menu-text" data-lang="icons">Icons</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="icons-tabler.php" class="side-nav-link">
                                <span class="menu-text" data-lang="icons-tabler">Tabler</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-lucide.php" class="side-nav-link">
                                <span class="menu-text" data-lang="icons-lucide">Lucide</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-flags.php" class="side-nav-link">
                                <span class="menu-text" data-lang="icons-flags">Flags</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="map-pinned"></i></span>
                    <span class="menu-text" data-lang="maps">Maps</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="maps-vector.php" class="side-nav-link">
                                <span class="menu-text" data-lang="maps-vector">Vector Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="maps-leaflet.php" class="side-nav-link">
                                <span class="menu-text" data-lang="maps-leaflet">Leaflet Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title mt-2" data-lang="items-title">Menu Items</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMenuLevels" aria-expanded="false" aria-controls="sidebarMenuLevels" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="list-tree"></i></span>
                    <span class="menu-text" data-lang="menu-levels"> Menu Levels </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMenuLevels">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link">
                                <span class="menu-text" data-lang="second-level"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 2.1</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 2.2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                                <span class="menu-text" data-lang="third-level"> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel" class="side-nav-link">
                                            <span class="menu-text"> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="sub-menu">
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 3.1</span>
                                                    </a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 3.2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="#!" class="side-nav-link disabled">
                    <span class="menu-icon"><i data-lucide="eye-off"></i></span>
                    <span class="menu-text" data-lang="disabled-menu"> Disabled Menu </span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- Sidenav Menu End -->