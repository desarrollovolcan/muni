<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Chartist Charts";
    include "partials/title-meta.php" ?>

    <!-- Chartist Chart CSS -->
    <link rel="stylesheet" href="assets/vendor/chartist/chartist.min.css">

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
            $subtitle = "Chartist";
            $title = "Chartist Charts";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Advanced Smil Animations</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2563</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
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
                                <div id="smil-animations" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Simple line chart</h5>
                        </div>
                        <div class="card-body pt-0">

                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">69695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="simple-line-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Line Scatter Diagram</h5>
                        </div>
                        <div class="card-body pt-0">

                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3254</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">78954</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8521</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="scatter-diagram" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Line chart with tooltips</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">1125</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3562</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7584</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="line-chart-tooltips" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Line chart with area</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">69695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="chart-with-area" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Bi-polar Line chart with area only</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8521</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">125</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="bi-polar-line" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">SVG Path animation</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3654</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8563</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2254</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="svg-animation" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Line Interpolation / Smoothing</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7787</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">17019</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">10795</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="line-smoothing" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Different configuration for different series</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8956</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8596</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="different-series" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">SVG Animations chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4123</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3363</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8561</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="svg-dot-animation" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Bi-polar bar chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div dir="ltr">
                                <div id="bi-polar-bar" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Overlapping bars on mobile</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">259632</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">89412</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">78521</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="overlapping-bars" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Multi-line label</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">69695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="multi-line-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Stacked bar chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2365</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">6654</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7771</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="stacked-bar-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Horizontal bar chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7852</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">36541</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">25874</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="horizontal-bar-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Extreme responsive configuration</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">69695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="extreme-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Distributed series</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7521</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">1002</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="distributed-series" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Label placement</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">8451</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">41894</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="label-placement-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Animating a Donut with Svg.animate</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">5623</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">69695</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2651</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="animating-donut" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Simple pie chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">98498</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">95189</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4984</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="simple-pie" class="ct-chart ct-golden-section simple-pie-chart-chartist"></div>
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
                            <h5 class="header-title">Pie chart with custom labels</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">959</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">452</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3625</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="pie-chart" class="ct-chart ct-golden-section"></div>
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
                            <h5 class="header-title">Gauge chart</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">41984</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">18% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">94984</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4789</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">53% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="gauge-chart" class="ct-chart ct-golden-section"></div>
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


<script src="assets/vendor/chartist/chartist.min.js"></script>
<script src="assets/vendor/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

<script src="assets/js/pages/chartist.js"></script>

</body>

</html>