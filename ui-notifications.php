<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Notifications";
    include "partials/title-meta.php" ?>

    <!-- Jquery Toast css -->
    <link href="assets/vendor/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet" type="text/css"/>

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
            $subtitle = "Base UI";
            $title = "Notifications";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Default Alert</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="alert alert-success text-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Well done!</strong> You successfully read this important alert
                                            message.
                                        </div>
                                        <div class="alert alert-info text-info alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Heads up!</strong> This alert needs your attention, but it's not
                                            super important.
                                        </div>
                                        <div class="alert alert-warning text-warning alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Holy guacamole!</strong> You should check in on some of those
                                            fields below.
                                        </div>
                                        <div class="alert alert-danger text-danger alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Oh snap!</strong> Change a few things up and try submitting
                                            again.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Icon Examples</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="alert alert-icon alert-success text-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-check-all me-2"></i>
                                            <strong>Well done!</strong> You successfully read this important alert
                                            message.
                                        </div>
                                        <div class="alert alert-icon alert-info text-info alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-information me-2"></i>
                                            <strong>Heads up!</strong> This alert needs your attention, but it's not
                                            super important.
                                        </div>
                                        <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-alert me-2"></i>
                                            <strong>Holy guacamole!</strong> You should check in on some of those
                                            fields below.
                                        </div>
                                        <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            <strong>Oh snap!</strong> Change a few things up and try submitting
                                            again.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Default Alert (White)</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="alert alert-success bg-transparent text-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Well done!</strong> You successfully read this important alert
                                            message.
                                        </div>
                                        <div class="alert alert-info bg-transparent text-info alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Heads up!</strong> This alert needs your attention, but it's not
                                            super important.
                                        </div>
                                        <div class="alert alert-warning text-warning bg-transparent alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Holy guacamole!</strong> You should check in on some of those
                                            fields below.
                                        </div>
                                        <div class="alert alert-danger bg-transparent text-danger alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Oh snap!</strong> Change a few things up and try submitting
                                            again.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Icon Examples (White)</h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="alert alert-icon bg-transparent text-success alert-success alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-check-all me-2"></i>
                                            <strong>Well done!</strong> You successfully read this important alert
                                            message.
                                        </div>
                                        <div class="alert alert-icon bg-transparent text-info alert-info alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-information me-2"></i>
                                            <strong>Heads up!</strong> This alert needs your attention, but it's not
                                            super important.
                                        </div>
                                        <div class="alert alert-icon bg-transparent text-warning alert-warning alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-alert me-2"></i>
                                            <strong>Holy guacamole!</strong> You should check in on some of those
                                            fields below.
                                        </div>
                                        <div class="alert alert-icon bg-transparent text-danger alert-danger alert-dismissible fade show"
                                             role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <i class="mdi mdi-block-helper me-2"></i>
                                            <strong>Oh snap!</strong> Change a few things up and try submitting
                                            again.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th style="min-width:50%;">Jquery Toast</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Info Example</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-info waves-effect waves-light btn-sm"
                                                            id="toastr-one">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Warning Example</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-warning waves-effect waves-light btn-sm"
                                                            id="toastr-two">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Success Example</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-success waves-effect waves-light btn-sm"
                                                            id="toastr-three">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Danger Example</td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-danger waves-effect waves-light btn-sm"
                                                            id="toastr-four">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>The text can be an array</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-five">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Put some HTML in the text</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-six">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Making them sticky</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-seven">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Fade transitions</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-eight">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Slide up and down transitions</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-nine">Click me
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Simple show from and hide to corner transition</td>
                                                <td>
                                                    <button type="button" class="btn btn-secondary waves-effect btn-sm"
                                                            id="toastr-ten">Click me
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

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

<!-- Tost-->
<script src="assets/vendor/jquery-toast-plugin/jquery.toast.min.js"></script>

<!-- toastr init js-->
<script src="assets/js/pages/toastr.js"></script>

</body>

</html>