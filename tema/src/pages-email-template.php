<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Email Templates";
    include "partials/title-meta.php" ?>

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
            $subtitle = "Pages";
            $title = "Email Templates";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="mt-0 mb-3 header-title"><b>Basic action email</b></h4>
                                    <a href="email-templates-action.php" target="_blank"> <img
                                                src="assets/images/email/1.png" class="img-fluid" alt=""> </a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 mb-3 header-title"><b>Email alert</b></h4>
                                    <a href="email-templates-alert.php" target="_blank"> <img
                                                src="assets/images/email/2.png" class="img-fluid" alt=""> </a>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 mb-3 header-title"><b>Billing email</b></h4>
                                    <a href="email-templates-billing.php" target="_blank"> <img
                                                src="assets/images/email/3.png" class="img-fluid" alt=""> </a>
                                </div>
                            </div>
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


<!-- Sparkline charts -->
<script src="assets/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/pages/profile.js"></script>


</body>

</html>