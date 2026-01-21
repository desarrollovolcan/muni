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
            $subtitle = "Google";
            $title = "Google Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Line chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="line-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Area Chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 5628</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 3652</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7841</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="area-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Column Chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="column-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Bar Charts</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 3251</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 85741</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 352</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Stacked column charts</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 2541</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 11243</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 336952</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="column-stacked-chart"></div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Stacked bar charts</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 36521</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 6969</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 130295</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chart mt-3" id="bar-stacked-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Pie Chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 845</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 5624</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 3848</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="google-chart text-center">
                                <div class="chart mt-3" id="pie-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Donut Chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 36521</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 9856</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 78521</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="google-chart text-center">
                                <div class="chart mt-3" id="donut-chart"></div>
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
                            <h4 class="header-title">3D Pie Chart</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 2584</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 7412</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 36987</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="google-chart text-center">
                                <div class="chart mt-3" id="pie-3d-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Exploding a Slice</h4>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Lifetime total sales</p>
                                            <h3 class="text-danger"><i class="mdi mdi-arrow-down"></i> 256</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Income amounts</p>
                                            <h3 class="text-success"><i class="mdi mdi-arrow-up"></i> 39652</h3>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <p class="text-uppercase font-13 fw--medium">Total visits</p>
                                            <h3 class="text-warning"><i class="mdi mdi-arrow-up"></i> 7852</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="google-chart text-center">
                                <div class="chart mt-3" id="3d-exploded-chart"></div>
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

<!-- Google Charts js -->
<script src="https://www.google.com/jsapi"></script>

<script src="assets/js/pages/google-charts.js"></script>

</body>

</html>