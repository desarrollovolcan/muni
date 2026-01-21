<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Sweet Alert 2";
    include "partials/title-meta.php" ?>

    <!-- Sweet Alert css-->
    <link href="assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

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
            $title = "Sweet Alert 2";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">A Basic Message</h5>
                            <p class="card-subtitle">Here's a basic example of SweetAlert.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" class="btn btn-primary" id="sweetalert-basic">Click me</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Title</h5>
                            <p class="card-subtitle">A Title with a Text Under.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" class="btn btn-primary" id="sweetalert-title">Click Me</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">HTML</h5>
                            <p class="card-subtitle">Here's an example of SweetAlert with HTML content.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" class="btn btn-primary" id="custom-html-alert">Toggle HTML
                                SweetAlert
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">All States</h5>
                            <p class="card-subtitle">Here are examples for each of SweetAlert's states.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" id="sweetalert-info" class="btn btn-info">Toggle Info</button>
                                <button type="button" id="sweetalert-warning" class="btn btn-warning">Toggle Warning
                                </button>
                                <button type="button" id="sweetalert-error" class="btn btn-danger">Toggle Error</button>
                                <button type="button" id="sweetalert-success" class="btn btn-success">Toggle Success
                                </button>
                                <button type="button" id="sweetalert-question" class="btn btn-primary">Toggle Question
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Long Content</h5>
                            <p class="card-subtitle">A modal window with a long content inside.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" id="sweetalert-longcontent" class="btn btn-secondary">Click Me
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Confirm Button</h5>
                            <p class="card-subtitle">A warning message, with a function attached to the
                                "Confirm"-button...</p>
                        </div>

                        <div class="card-body pt-2">

                            <button type="button" id="sweetalert-confirm-button" class="btn btn-secondary">Click Me
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Cancel Button</h5>
                            <p class="card-subtitle">By passing a parameter, you can execute something else for
                                "Cancel".</p>
                        </div>

                        <div class="card-body pt-2">

                            <button type="button" id="sweetalert-params" class="btn btn-secondary">Click Me</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Image Header (Logo)</h5>
                            <p class="card-subtitle">A message with custom Image Header.</p>
                        </div>

                        <div class="card-body pt-2">

                            <button type="button" id="sweetalert-image" class="btn btn-secondary">Click Me</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Auto Close</h5>
                            <p class="card-subtitle">A message with auto close timer.</p>
                        </div>

                        <div class="card-body pt-2">

                            <button type="button" id="sweetalert-close" class="btn btn-secondary">Click Me</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Position</h5>
                            <p class="card-subtitle">A custom positioned dialog.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-primary" id="position-top-start">Top Start</button>
                                <button class="btn btn-primary" id="position-top-end">Top End</button>
                                <button class="btn btn-primary" id="position-bottom-start">Bottom Starts</button>
                                <button class="btn btn-primary" id="position-bottom-end">Bottom End</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Custom Padding, Background</h5>
                            <p class="card-subtitle">A message with custom width, padding and background.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" id="custom-padding-width-alert" class="btn btn-secondary">Click Me
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Ajax Request</h5>
                            <p class="card-subtitle">Ajax request example.</p>
                        </div>

                        <div class="card-body pt-2">
                            <button type="button" id="ajax-alert" class="btn btn-secondary">Click Me</button>
                        </div>
                    </div>
                </div>
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

<!-- Sweet Alerts js -->
<script src="assets/vendor/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert demo js-->
<script src="assets/js/pages/extended-sweetalerts.js"></script>

</body>

</html>