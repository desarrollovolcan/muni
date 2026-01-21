<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Maintenance Page";
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

                        <div class="text-center account-box">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center">
                                    <a href="index.php" class="text-success">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="30"></span>
                                    </a>
                                </h2>
                            </div>

                            <div class="mb-4 mt-4">
                                <div class="text-center">
                                    <svg id="Layer_1" class="svg-computer" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 424.2 424.2">
                                        <style>
                                            .st0 {
                                                fill: none;
                                                stroke: #64c5b1;
                                                stroke-width: 5;
                                                stroke-linecap: round;
                                                stroke-linejoin: round;
                                                stroke-miterlimit: 10;
                                            }
                                        </style>
                                        <g id="Layer_2">
                                            <path class="st0"
                                                  d="M339.7 289h-323c-2.8 0-5-2.2-5-5V55.5c0-2.8 2.2-5 5-5h323c2.8 0 5 2.2 5 5V284c0 2.7-2.2 5-5 5z"/>
                                            <path class="st0"
                                                  d="M26.1 64.9h304.6v189.6H26.1zM137.9 288.5l-3.2 33.5h92.6l-4.4-33M56.1 332.6h244.5l24.3 41.1H34.5zM340.7 373.7s-.6-29.8 35.9-30.2c36.5-.4 35.9 30.2 35.9 30.2h-71.8z"/>
                                            <path class="st0" d="M114.2 82.8v153.3h147V82.8zM261.2 91.1h-147"/>
                                            <path class="st0"
                                                  d="M124.5 105.7h61.8v38.7h-61.8zM196.6 170.2H249v51.7h-52.4zM196.6 105.7H249M196.6 118.6H249M196.6 131.5H249M196.6 144.4H249M124.5 157.3H249M124.5 170.2h62.2M124.5 183.2h62.2M124.5 196.1h62.2M124.5 209h62.2M124.5 221.9h62.2"/>
                                        </g>
                                    </svg>

                                </div>
                            </div>

                            <h4 class="text-primary fw-semibold">Site is Under Maintenance</h4>
                            <p class="text-muted mb-0">We're making the system more awesome.we'll be back shortly.</p>

                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

        </div>
        <!-- end col -->

    </div>
    <!-- end container -->
</div>
<!-- end page -->

<?php include 'partials/footer-scripts.php' ?>

</body>

</html>