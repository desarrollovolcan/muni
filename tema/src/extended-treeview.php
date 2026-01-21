<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Treeview";
    include "partials/title-meta.php" ?>

    <link rel="stylesheet" href="assets/vendor/jstree/themes/default/style.min.css">

    <?php include 'partials/head-css.php' ?>
</head>

<body>
<!-- Begin page -->
<div class="wrapper">

    <?php include 'partials/sidenav.php' ?>

    <?php include 'partials/topbar.php' ?>

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="page-content">

        <div class="page-container">

            <?php
            $subtitle = "Extended UI";
            $title = "Page Tour";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Basic Tree</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div id="basicTree">
                                <ul>
                                    <li>Adminox
                                        <ul>
                                            <li data-jstree='{"opened":true}'>Assets
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Css</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"selected":true,"type":"file"}'>Plugin
                                                                one
                                                            </li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-email-outline"}'>Email
                                                Template
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Email one</li>
                                                    <li data-jstree='{"type":"file"}'>Email two</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-camera-timer"}'>Dashboard</li>

                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-toolbox-outline"}'>User
                                                Interface
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Buttons</li>
                                                    <li data-jstree='{"type":"file"}'>Cards</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-calendar-month"}'>Calendar</li>
                                            <li data-jstree='{"icon":"mdi mdi-file-document-box-check-outline"}'>Forms
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-table-settings"}'>Tables</li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"type":"file"}'>Frontend</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Checkbox Tree</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div id="checkTree">
                                <ul>
                                    <li>Adminox
                                        <ul>
                                            <li data-jstree='{"opened":true}'>Assets
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Css</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"selected":true,"type":"file"}'>Plugin
                                                                one
                                                            </li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-email-outline"}'>Email
                                                Template
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Email one</li>
                                                    <li data-jstree='{"type":"file"}'>Email two</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-camera-timer"}'>Dashboard</li>
                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-toolbox-outline"}'>User
                                                Interface
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Buttons</li>
                                                    <li data-jstree='{"type":"file"}'>Cards</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-calendar-month"}'>Calendar</li>
                                            <li data-jstree='{"icon":"mdi mdi-file-document-box-check-outline"}'>Forms
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-table-settings"}'>Tables</li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"type":"file"}'>Frontend</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Drag & Drop</h4>
                        </div>
                        <div class="card-body">
                            <div id="dragTree">
                                <ul>
                                    <li>Adminox
                                        <ul>
                                            <li data-jstree='{"opened":true}'>Assets
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Css</li>
                                                    <li data-jstree='{"opened":true}'>Plugins
                                                        <ul>
                                                            <li data-jstree='{"selected":true,"type":"file"}'>Plugin
                                                                one
                                                            </li>
                                                            <li data-jstree='{"type":"file"}'>Plugin two</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-email-outline"}'>Email
                                                Template
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Email one</li>
                                                    <li data-jstree='{"type":"file"}'>Email two</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-camera-timer"}'>Dashboard</li>
                                            <li data-jstree='{"opened":true, "icon": "mdi mdi-toolbox-outline"}'>User
                                                Interface
                                                <ul>
                                                    <li data-jstree='{"type":"file"}'>Buttons</li>
                                                    <li data-jstree='{"type":"file"}'>Cards</li>
                                                </ul>
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-calendar-month"}'>Calendar</li>
                                            <li data-jstree='{"icon":"mdi mdi-file-document-box-check-outline"}'>Forms
                                            </li>
                                            <li data-jstree='{"icon":"mdi mdi-table-settings"}'>Tables</li>
                                        </ul>
                                    </li>
                                    <li data-jstree='{"type":"file"}'>Frontend</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container -->

        <?php include 'partials/footer.php' ?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<?php include 'partials/customizer.php' ?>

<?php include 'partials/footer-scripts.php' ?>

<script src="assets/vendor/jstree/jstree.min.js"></script>

<script src="assets/js/pages/treeview.js"></script>
</body>

</html>