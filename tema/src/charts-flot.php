<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Flot Chart";
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
            $subtitle = "Flot";
            $title = "Flot Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Multiple Statistics</h5>
                            <p class="card-subtitle">
                                Stacked chart not only shows the trends over time, you can also see the cumulative
                                sum of all data.Your awesome text goes here.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="website-stats" style="height: 320px;" class="flot-chart"></div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Realtime Statistics</h5>
                            <p class="card-subtitle">
                                You can update a chart periodically to get a real-time effect by using a timer
                                to insert the new data in the plot and redraw it.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 865</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 96542</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 36521</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="flotRealTime" style="height: 320px;" class="flot-chart"></div>
                            </div>
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
                            <h5 class="header-title">Line Chart</h5>
                            <p class="card-subtitle">
                                The line chart is most often used chart, aslo the easiest to make, it shows trends over
                                time,
                                visualizes data and information, so users can know how exactly these numbers are relate
                                to
                                each other in one glance.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 524</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 36524</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 2541</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="website-stats1" style="height: 320px;" class="flot-chart"></div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Donut Pie</h5>
                            <p class="card-subtitle">
                                Pie chart is used to see the proprotion of each data groups, making Flot pie chart is
                                pretty simple,
                                in order to make pie chart you have to incldue jquery.flot.pie.js plugin.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-4">
                                        <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                        <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 3254</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                        <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 1254</h3>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-4">
                                        <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                        <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 3365</h3>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr" id="donut-chart">
                                <div id="donut-chart-container" class="flot-chart" style="height: 320px;">
                                </div>
                            </div>
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
                            <p class="card-subtitle">
                                Pie chart is used to see the proprotion of each data groups, making Flot pie chart is
                                pretty simple,
                                in order to make pie chart you have to incldue jquery.flot.pie.js plugin.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 35624</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 8548</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 125</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr" id="pie-chart">
                                <div id="pie-chart-container" class="flot-chart" style="height: 320px;">
                                </div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Stacked Bar chart</h5>
                            <p class="card-subtitle">
                                With the stack plugin, you can have Flot stack the series. This is useful if you wish to
                                display
                                both a total and the constituents it is made of.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 22253</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 2635</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="ordered-bars-chart" style="height: 320px;"></div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title mb-0">Combine Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 25698</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Your Score</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-primary"><i class="mdi mdi-arrow-up"></i> 12584</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="line-chart-alt" class="flot-chart" style="height: 320px;">
                                </div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
                <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Combine Chart</h4>
                        </div>

                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 12542</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Your Score</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 258492</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Income amounts</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 96966</h3>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-3">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw-medium">Total visits</p>
                                            <h3 class="text-primary"><i class="mdi mdi-arrow-up"></i> 125482</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="combine-chart">
                                <div id="combine-chart-container" class="flot-chart mt-3" style="height: 320px;">
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

<script src="assets/vendor/flot-charts/jquery.flot.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.time.js"></script>
<script src="assets/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.resize.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.pie.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.selection.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.stack.js"></script>
<script src="assets/vendor/flot-orderbars/js/jquery.flot.orderBars.js"></script>
<script src="assets/vendor/flot-axislabels/jquery.flot.axislabels.js"></script>
<script src="assets/vendor/flot-charts/jquery.flot.crosshair.js"></script>

<!-- <script src="assets/vendor/flot-charts/j"></script> -->

<!-- Flot Chart demo js -->
<script src="assets/js/pages/flot.js"></script>

</body>

</html>