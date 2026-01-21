<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Error 500";
    include "partials/title-meta.php" ?>

    <?php include 'partials/head-css.php' ?>
</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

<div class="home-btn d-none d-sm-block position-absolute top-0 end-0 m-3">
    <a href="index.php"><i class="fas fa-home h2 text-white"></i></a>
</div>

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mb-0">

                    <div class="card-body p-4">

                        <div class="account-box">
                            <div class="account-logo-box">
                                <div class="text-center">
                                    <a href="index.php">
                                        <img src="assets/images/logo-dark.png" alt="" height="30">
                                    </a>
                                </div>
                            </div>

                            <div class="account-content text-center mt-4">
                                <h1 class="text-error fw-bold">500</h1>
                                <h3 class="text-danger mt-3 fw-semibold">Internal Server Error</h3>
                                <p class="text-muted mt-3"> Why not try refreshing your page? or you can contact <a
                                            href="" class="text-primary"><b>Support</b></a></p>
                                <a class="btn btn-md btn-block btn-primary waves-effect w-100 waves-light mt-20"
                                   href="index.php"> Return Home</a>
                            </div>


                        </div>
                    </div>

                </div>
                <!-- end card-body -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<?php include 'partials/footer-scripts.php' ?>

</body>

</html>