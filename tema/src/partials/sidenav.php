<!-- Sidenav Menu Start -->
<div class="sidenav-menu">

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

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboard" aria-expanded="false" aria-controls="sidebarDashboard" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="airplay"></i></span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-success rounded-pill">2</span>
                </a>
                <div class="collapse" id="sidebarDashboard">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="index.php" class="side-nav-link">
                                <span class="menu-text">Dashboard 1</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="dashboard-2.php" class="side-nav-link">
                                <span class="menu-text">Dashboard 2</span>
                            </a>
                        </li>                                                                                     
                    </ul>
                </div>
            </li>
          

            <li class="side-nav-title">Apps</li>

            <li class="side-nav-item">
                <a href="apps-calendar.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="calendar-days"></i></span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAppsEmail" aria-expanded="false" aria-controls="sidebarAppsEmail" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="mail"></i></span>
                    <span class="menu-text"> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAppsEmail">
                    <ul class="sub-menu">                      
                        <li class="side-nav-item">
                            <a href="email-inbox.php" class="side-nav-link">
                                <span class="menu-text">Inbox</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="email-read.php" class="side-nav-link">
                                <span class="menu-text">Read Email</span>
                            </a>
                        </li>                        
                        <li class="side-nav-item">
                            <a href="email-compose.php" class="side-nav-link">
                                <span class="menu-text">Compose Email</span>
                            </a>
                        </li>                       
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="tickets.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="life-buoy"></i></span>
                    <span class="menu-text"> Ticket </span>
                    <span class="badge bg-danger rounded-pill">New</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="taskboard.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="file-text"></i></span>
                    <span class="menu-text"> Taskboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="todo.php" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="layers"></i></span>
                    <span class="menu-text"> Todo </span>
                </a>
            </li>
            <li class="side-nav-title">Extra Pages</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="lock-keyhole"></i></span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesAuth">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="auth-login.php" class="side-nav-link">
                                <span class="menu-text">Login</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="auth-register.php" class="side-nav-link">
                                <span class="menu-text">Register</span>
                            </a>
                        </li>                     
                        <li class="side-nav-item">
                            <a href="auth-recoverpw.php" class="side-nav-link">
                                <span class="menu-text">Recover Password</span>
                            </a>
                        </li>                        
                        <li class="side-nav-item">
                            <a href="auth-lock-screen.php" class="side-nav-link">
                                <span class="menu-text">Lock Screen</span>
                            </a>
                        </li>                       
                        <li class="side-nav-item">
                            <a href="auth-confirm-mail.php" class="side-nav-link">
                                <span class="menu-text">Confirm Mail</span>
                            </a>
                        </li>     
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="file-plus"></i></span>
                    <span class="menu-text"> Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="pages-starter.php" class="side-nav-link">
                                <span class="menu-text">Starter Page</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-about.php" class="side-nav-link">
                                <span class="menu-text">About Us</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-contact.php" class="side-nav-link">
                                <span class="menu-text">Contact</span>
                            </a>
                        </li>    
                        <li class="side-nav-item">
                            <a href="pages-companies.php" class="side-nav-link">
                                <span class="menu-text">Companies</span>
                            </a>
                        </li>  
                        <li class="side-nav-item">
                            <a href="pages-members.php" class="side-nav-link">
                                <span class="menu-text">Members</span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="pages-members-2.php" class="side-nav-link">
                                <span class="menu-text">Members 2</span>
                            </a>
                        </li> 
                        <li class="side-nav-item">
                            <a href="pages-timeline.php" class="side-nav-link">
                                <span class="menu-text">Timeline</span>
                            </a>
                        </li>                      
                        <li class="side-nav-item">
                            <a href="pages-invoice.php" class="side-nav-link">
                                <span class="menu-text">Invoice</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-pricing.php" class="side-nav-link">
                                <span class="menu-text">Pricing</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-faq.php" class="side-nav-link">
                                <span class="menu-text">FAQ</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-profile.php" class="side-nav-link">
                                <span class="menu-text">Profile</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-email-template.php" class="side-nav-link">
                                <span class="menu-text">Email Template</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-search-result.php" class="side-nav-link">
                                <span class="menu-text">Search Result</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-sitemap.php" class="side-nav-link">
                                <span class="menu-text">Sitemap</span>
                            </a>
                        </li>
                       
                        <li class="side-nav-item">
                            <a href="pages-maintenance.php" class="side-nav-link">
                                <span class="menu-text">Maintenance</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="pages-coming-soon.php" class="side-nav-link">
                                <span class="menu-text">Coming Soon</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="shield-x"></i></span>
                    <span class="menu-text"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPagesError">
                    <ul class="sub-menu">                      
                        <li class="side-nav-item">
                            <a href="error-404-alt.php" class="side-nav-link">
                                <span class="menu-text">404 Error (alt)</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="error-404.php" class="side-nav-link">
                                <span class="menu-text">404 Not Found</span>
                            </a>
                        </li>                        
                        <li class="side-nav-item">
                            <a href="error-500.php" class="side-nav-link">
                                <span class="menu-text">500 Internal Server</span>
                            </a>
                        </li>                       
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">Components</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="target"></i></span>
                    <span class="menu-text"> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="ui-accordions.php" class="side-nav-link">
                                <span class="menu-text">Accordions</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-alerts.php" class="side-nav-link">
                                <span class="menu-text">Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-avatars.php" class="side-nav-link">
                                <span class="menu-text">Avatars</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-badges.php" class="side-nav-link">
                                <span class="menu-text">Badges</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-breadcrumb.php" class="side-nav-link">
                                <span class="menu-text">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-buttons.php" class="side-nav-link">
                                <span class="menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-cards.php" class="side-nav-link">
                                <span class="menu-text">Cards</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-carousel.php" class="side-nav-link">
                                <span class="menu-text">Carousel</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-collapse.php" class="side-nav-link">
                                <span class="menu-text">Collapse</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-checkbox-radio.php" class="side-nav-link">
                                <span class="menu-text">Checkbox Radio</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-dropdowns.php" class="side-nav-link">
                                <span class="menu-text">Dropdowns</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-grid.php" class="side-nav-link">
                                <span class="menu-text">Grid</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-links.php" class="side-nav-link">
                                <span class="menu-text">Links</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-list-group.php" class="side-nav-link">
                                <span class="menu-text">List Group</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-modals.php" class="side-nav-link">
                                <span class="menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-notifications.php" class="side-nav-link">
                                <span class="menu-text">Notifications</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-offcanvas.php" class="side-nav-link">
                                <span class="menu-text">Offcanvas</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-placeholders.php" class="side-nav-link">
                                <span class="menu-text">Placeholders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-pagination.php" class="side-nav-link">
                                <span class="menu-text">Pagination</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-popovers.php" class="side-nav-link">
                                <span class="menu-text">Popovers</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-progress.php" class="side-nav-link">
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-portlets.php" class="side-nav-link">
                                <span class="menu-text">Portlets</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-ratios.php" class="side-nav-link">
                                <span class="menu-text">Ratios</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-scrollspy.php" class="side-nav-link">
                                <span class="menu-text">Scrollspy</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-spinners.php" class="side-nav-link">
                                <span class="menu-text">Spinners</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-ribbons.php" class="side-nav-link">
                                <span class="menu-text">Ribbons</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-tabs.php" class="side-nav-link">
                                <span class="menu-text">Tabs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-tooltips.php" class="side-nav-link">
                                <span class="menu-text">Tooltips</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-typography.php" class="side-nav-link">
                                <span class="menu-text">Typography</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="ui-utilities.php" class="side-nav-link">
                                <span class="menu-text">Utilities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="briefcase"></i></span>
                    <span class="menu-text"> Extended UI </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="extended-dragula.php" class="side-nav-link">
                                <span class="menu-text">Dragula</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-sweetalerts.php" class="side-nav-link">
                                <span class="menu-text">Sweet Alerts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-tiles.php" class="side-nav-link">
                                <span class="menu-text">Tiles Box</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-nestable.php" class="side-nav-link">
                                <span class="menu-text">Nestable Lists</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-filemanager.php" class="side-nav-link">
                                <span class="menu-text">File Manager</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-range-sliders.php" class="side-nav-link">
                                <span class="menu-text">Range Sliders</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-ratings.php" class="side-nav-link">
                                <span class="menu-text">Ratings</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-lightbox.php" class="side-nav-link">
                                <span class="menu-text">Lightbox</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-slider.php" class="side-nav-link">
                                <span class="menu-text">Slider</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-scrollbar.php" class="side-nav-link">
                                <span class="menu-text">Scrollbar</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-tost.php" class="side-nav-link">
                                <span class="menu-text">Toasts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-tour.php" class="side-nav-link">
                                <span class="menu-text">Tour</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="extended-treeview.php" class="side-nav-link">
                                <span class="menu-text">Treeview</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="box"></i></span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="icons-materialdesign.php" class="side-nav-link">
                                <span class="menu-text">Material Design</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-fontawesome.php" class="side-nav-link">
                                <span class="menu-text">Font awesome</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-simple-line.php" class="side-nav-link">
                                <span class="menu-text">Simple Line</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-tabler.php" class="side-nav-link">
                                <span class="menu-text">Tabler</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-lucide.php" class="side-nav-link">
                                <span class="menu-text">Lucide</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="icons-iconify.php" class="side-nav-link">
                                <span class="menu-text">Solar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="bar-chart-2"></i></span>
                    <span class="menu-text"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="charts-flot.php" class="side-nav-link">
                                <span class="menu-text">Flot Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-morris.php" class="side-nav-link">
                                <span class="menu-text">Morris Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-google.php" class="side-nav-link">
                                <span class="menu-text">Google Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-echart.php" class="side-nav-link">
                                <span class="menu-text">Echart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-chartjs.php" class="side-nav-link">
                                <span class="menu-text">Chartjs</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-peity.php" class="side-nav-link">
                                <span class="menu-text">Peity Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-chartist.php" class="side-nav-link">
                                <span class="menu-text">Chartist Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-c3.php" class="side-nav-link">
                                <span class="menu-text">C3 Chart</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-sparkline.php" class="side-nav-link">
                                <span class="menu-text">Sparkline Charts</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="charts-knob.php" class="side-nav-link">
                                <span class="menu-text">Jquery Knob</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="disc"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="badge bg-warning rounded-pill">12</span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="form-elements.php" class="side-nav-link">
                                <span class="menu-text">Basic Elements</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-advanced.php" class="side-nav-link">
                                <span class="menu-text">Form Advanced</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-masks.php" class="side-nav-link">
                                <span class="menu-text">Form Masks</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-picker.php" class="side-nav-link">
                                <span class="menu-text">Picker</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-select.php" class="side-nav-link">
                                <span class="menu-text">Select</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-range-slider.php" class="side-nav-link">
                                <span class="menu-text">Range Slider</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-validation.php" class="side-nav-link">
                                <span class="menu-text">Validation</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-wizard.php" class="side-nav-link">
                                <span class="menu-text">Wizard</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-fileuploads.php" class="side-nav-link">
                                <span class="menu-text">File Uploads</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-editors.php" class="side-nav-link">
                                <span class="menu-text">Editors</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="form-layouts.php" class="side-nav-link">
                                <span class="menu-text">Layouts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="layout"></i></span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="tables-basic.php" class="side-nav-link">
                                <span class="menu-text">Basic Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tables-datatable.php" class="side-nav-link">
                                <span class="menu-text">Data Tables</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tables-responsive.php" class="side-nav-link">
                                <span class="menu-text">Responsive Table </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tables-foo-tables.php" class="side-nav-link">
                                <span class="menu-text">Foo Tables </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="tables-editable.php" class="side-nav-link">
                                <span class="menu-text">Editable Tables </span>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="map"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="maps-google.php" class="side-nav-link">
                                <span class="menu-text">Google Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="maps-vector.php" class="side-nav-link">
                                <span class="menu-text">Vector Maps</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="maps-leaflet.php" class="side-nav-link">
                                <span class="menu-text">Leaflet Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">
                More
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="sidebar"></i></span>
                    <span class="menu-text"> Layouts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="layouts-horizontal.php" target="_blank" class="side-nav-link">Horizontal</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-full.php" target="_blank" class="side-nav-link">Full View</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-fullscreen.php" target="_blank" class="side-nav-link">Fullscreen View</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-hover.php" target="_blank" class="side-nav-link">Hover Menu</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-compact.php" target="_blank" class="side-nav-link">Compact</a>
                        </li>
                        <li class="side-nav-item">
                            <a href="layouts-icon-view.php" target="_blank" class="side-nav-link">Icon View</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="folder-plus"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                                <span class="menu-text"> Third Level </span>
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
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Sidenav Menu End -->