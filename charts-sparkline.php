<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Sparkline Charts";
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
            $subtitle = "Sparkline";
            $title = "Sparkline Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Line Charts</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    25643 <small>USD</small></h3>
                            </div>
                            <div id="sparkline1"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Bar Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i>
                                    5623 <small>USD</small></h3>
                            </div>
                            <div id="sparkline2" class="text-center"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Pie Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    32561 <small>USD</small></h3>
                            </div>
                            <div id="sparkline3" class="text-center"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Custom Line Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    23657 <small>USD</small></h3>
                            </div>
                            <div id="sparkline4" class="text-center"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Mouse Speed Chart Example</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    894798 <small>USD</small></h3>
                            </div>
                            <div id="sparkline5" class="text-center"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Composite bar Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <h5 class="font-weight-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> 254
                                    <small>USD</small></h3>
                            </div>
                            <div id="sparkline6" class="text-center"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->

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

<script src="assets/js/pages/sparkline.js"></script>


</body>

</html>