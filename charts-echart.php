<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Morris Charts";
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
            $subtitle = "Echart";
            $title = "Echart Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Revenue Comparison</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    25643 <small>USD</small></h3>
                            </div>

                            <div class="chart-container">
                                <div class="" style="height:320px" id="platform_type_dates_donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Visitors Overview</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i>
                                    5623 <small>USD</small></h3>
                            </div>

                            <div class="chart-container">
                                <div class="" style="height:320px" id="user_type_bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Goal Completion</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    12548 <small>USD</small></h3>
                            </div>

                            <div class="chart-container">
                                <div class="chart has-fixed-height" style="height:320px" id="page_views_today"></div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Revenue Comparison</h4>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="font-normal text-muted">You have to pay</h5>
                                <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                    25643 <small>USD</small></h3>
                            </div>

                            <div class="chart-container">
                                <div class="" style="height:320px" id="scatter_chart_inside"></div>
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

<script src="assets/vendor/echarts/echarts.min.js"></script>

<script src="assets/js/pages/echart.js"></script>

</body>

</html>