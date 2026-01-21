<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Error 404 (alt)";
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
            $subtitle = "Error Pages";
            $title = "404 Error (alt)";
            include "partials/page-title.php" ?>

            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="text-center pt-2">
                        <h1 class="text-error mt-4 fw-bold">404</h1>
                        <h3 class="text-uppercase text-danger mt-3 fw-semibold">Page Not Found</h3>
                        <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                            happens to the best of us. You might want to check your internet connection. Here's a
                            little tip that might help you get back on track.</p>

                        <a class="btn btn-md btn-primary waves-effect waves-light mt-2" href="index.php"> Return
                            Home</a>
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


</body>

</html>