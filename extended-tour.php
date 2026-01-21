<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Page Tour";
    include "partials/title-meta.php" ?>

    <!-- Shepherd (Tour) css -->
    <link rel="stylesheet" href="assets/vendor/hopscotch/css/hopscotch.min.css">

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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4 mb-5">
                                <img src="assets/images/logo-dark.png" alt="" height="24" id="logo-tour">
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <h4 class="header-title mt-0 mb-4">Heading</h4>
                                    <h1 id="heading-title-tour">This is a Heading 1</h1>
                                    <p class="text-muted">Suspendisse vel quam malesuada, aliquet sem sit
                                        amet, fringilla elit.</p>

                                    <div class="clearfix"></div>

                                    <h2>This is a Heading 2</h2>
                                    <p class="text-muted">In nec rhoncus eros. Vestibulum eu mattis nisl magna nec
                                        purus.</p>

                                    <div class="clearfix"></div>

                                    <h3>This is a Heading 3</h3>
                                    <p class="text-muted">Vestibulum auctor tincidunt semper ut lacus mi eros.</p>

                                    <div class="clearfix"></div>

                                    <h4>This is a Heading 4</h4>
                                    <p class="text-muted">Nulla et mattis nunc scelerisque
                                        commodo.</p>

                                </div>

                                <div class="col-lg-5 offset-lg-1">
                                    <div class="mt-4 mt-lg-0">
                                        <h4 class="header-title mt-0 mb-4">Join With Adminox</h4>

                                        <div class="p-2">
                                            <ul class="list-unstyled activity-widget">
                                                <li class="activity-list">
                                                    <div class="media d-flex align-items-start gap-3">
                                                        <i class="mdi mdi-square-edit-outline h2 text-success mt-0 me-3"
                                                           id="register-tour"></i>
                                                        <div class="media-body">
                                                            <h5 class="font-16 mt-1">Free register</h5>
                                                            <p class="text-muted">Register your Account.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="media d-flex align-items-start gap-3">
                                                        <i class="mdi mdi-account-star-outline h2 text-success mt-0 me-3"></i>
                                                        <div class="media-body">
                                                            <h5 class="font-16 mt-1">Log in account</h5>
                                                            <p class="text-muted">Log in your Account.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="media d-flex align-items-start gap-3">
                                                        <i class="mdi mdi-file-download-outline h2 text-success mt-0 me-3"></i>
                                                        <div class="media-body">
                                                            <h5 class="font-16 mt-1">Get Product</h5>
                                                            <p class="text-muted">Get your Product.</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->
                            <div class="text-center mt-5">
                                <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light"
                                   id="thankyou-tour">Thank you !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

<!-- Tour js -->
<script src="assets/vendor/hopscotch/js/hopscotch.min.js"></script>

<!-- Shepherd js Demo Component js -->
<script src="assets/js/pages/extended-tour.js"></script>

</body>

</html>