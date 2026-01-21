<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "C3 Chart";
    include "partials/title-meta.php" ?>

    <!-- C3 Chart css -->
    <link href="assets/vendor/c3/c3.min.css" rel="stylesheet" type="text/css"/>

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
            $subtitle = "C3";
            $title = "C3 Chart";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Bar Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2563</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">1125</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="chart"></div>
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
                            <h5 class="header-title">Stacked Area Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5959</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">821</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2005</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="chart-stacked"></div>
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
                            <h5 class="header-title">Roated Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">64684</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5665</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="roated-chart"></div>
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
                            <h5 class="header-title">Combine Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4465</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4684</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">6462</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="combine-chart"></div>
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
                            <h5 class="header-title">Donut Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">65498</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">9798</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="donut-chart"></div>
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
                            <h5 class="header-title">Pie Chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2563</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">1125</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="pie-chart"></div>
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
                            <h5 class="header-title">Scatter Plot</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">694</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">984</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">64056</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="scatter-plot"></div>
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
                            <h5 class="header-title">Line Chart with Regions</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">89498</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime Sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">56248</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">1220</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="line-regions"></div>
                            </div>
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

<!--C3 Chart-->
<script src="assets/vendor/d3/d3.min.js"></script>
<script src="assets/vendor/c3/c3.min.js"></script>

<!-- C3 chart js -->
<script src="assets/js/pages/c3.js"></script>

</body>

</html>