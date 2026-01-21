<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Tiles";
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
            $subtitle = "Extended UI";
            $title = "Tiles";
            include "partials/page-title.php" ?>

            <div class="row">

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-two widget-two-custom">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                    <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                                </div>

                                <div class="wigdet-two-content media-body text-end text-truncate ">
                                    <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Total
                                        Revenue</p>
                                    <h3 class="fw-medium my-2">$ <span data-plugin="counterup">65,841</span></h3>
                                    <p class="m-0">Jan - Apr 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-two widget-two-custom ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg rounded-circle bg-info widget-two-icon align-self-center">
                                    <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                                </div>

                                <div class="wigdet-two-content media-body text-end text-truncate ">
                                    <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Total
                                        Unique Visitors</p>
                                    <h3 class="fw-medium my-2"><span data-plugin="counterup">26,521</span></h3>
                                    <p class="m-0">Jan - Apr 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-two widget-two-custom ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg rounded-circle bg-warning widget-two-icon align-self-center">
                                    <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                                </div>

                                <div class="wigdet-two-content media-body text-end text-truncate ">
                                    <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Number of
                                        Transactions</p>
                                    <h3 class="fw-medium my-2"><span data-plugin="counterup">7,842</span></h3>
                                    <p class="m-0">Jan - Apr 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-two widget-two-custom ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg rounded-circle bg-danger widget-two-icon align-self-center">
                                    <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                                </div>

                                <div class="wigdet-two-content media-body text-end text-truncate ">
                                    <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">
                                        Conversation Rate</p>
                                    <h3 class="fw-medium my-2"><span data-plugin="counterup">2.07</span>%</h3>
                                    <p class="m-0">Jan - Apr 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <img class="avatar-sm" src="assets/images/icons/clock.svg" title="clock.svg">
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">Product Sold</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">2,562</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <img class="avatar-sm" src="assets/images/icons/advertising.svg"
                                         title="advertising.svg">
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">User This Month</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">8,542</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <img class="avatar-sm" src="assets/images/icons/paid.svg" title="paid.svg">
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">Request Per Minute</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">6,254</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <img class="avatar-sm" src="assets/images/icons/timeline.svg" title="timeline.svg">
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">Total Users</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">7,524</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <i class="mdi mdi-server-outline font-30 text-muted avatar-title"></i>
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">New Downloads</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">6521</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <i class="mdi mdi-briefcase-variant-outline font-30 text-muted avatar-title"></i>
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">Statistics</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">7854</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <i class="mdi mdi-arrow-down-bold-circle-outline font-30 text-muted avatar-title"></i>
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">User Today</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">3652</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-box-three">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="avatar-lg bg-icon rounded-circle align-self-center">
                                    <i class="mdi mdi-poll font-30 text-muted avatar-title"></i>
                                </div>
                                <div class="wigdet-two-content media-body text-end text-truncate  text-right">
                                    <p class="mt-1 text-uppercase fw-medium">User This Month</p>
                                    <h2 class="mb-2 fw-semibold"><span data-plugin="counterup">1250</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="assets/images/users/avatar-3.jpg" class="img-fluid rounded-circle avatar-md"
                                 alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1">Chadengle</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-warning fs-secondary">Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle avatar-md"
                                 alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1"> Michael Zenaty</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-info fs-secondary">User</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle avatar-md"
                                 alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1">Stillnotdavid</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-success fs-secondary">Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card widget-user">
                        <div class="card-body">
                            <img src="assets/images/users/avatar-10.jpg" class="img-fluid rounded-circle avatar-md"
                                 alt="user">
                            <div class="wid-u-info">
                                <h5 class="mt-3 mb-1">Tomaslau</h5>
                                <p class="text-muted mb-0">coderthemes@gmail.com</p>
                                <div class="user-position">
                                    <span class="text-pink fs-secondary">User</span>
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

</body>

</html>