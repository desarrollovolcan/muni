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
            $subtitle = "Morris";
            $title = "Morris Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title mb-0">Stacked Bar Chart</h5>
                        </div>
                        <div class="card-body">
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

                            <div id="morris-bar-stacked" style="height: 320px;" dir="ltr" class="morris-charts"></div>

                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title mb-0">Area Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">7584</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">68% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2536</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">89% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">4521</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">23% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="morris-area-example" style="height: 320px;" dir="ltr" class="morris-charts"></div>

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
                            <h5 class="header-title mb-0">Line Char</h5>
                        </div>
                        <div class="card-body">

                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">45% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">78954</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">56% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">1254</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">78% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div dir="ltr">
                                <div id="morris-line-example" style="height: 320px;" dir="ltr"
                                     class="morris-charts"></div>
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
                            <h5 class="header-title mb-0">Bar Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">12548</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">0.05% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">9658</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">19% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mt-2">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">32% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="morris-bar-example" style="height: 320px;" dir="ltr" class="morris-charts"></div>
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
                            <h5 class="header-title mb-0">Area Chart with Point</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">9681</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">32% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">2536</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">9% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">3650</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">59% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="morris-area-with-dotted" style="height: 320px;" dir="ltr"
                                 class="morris-charts"></div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title mb-0">Donut Chart</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">25631</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Lifetime total sales</p>
                                            <p class="text-danger">89% <i class="mdi mdi-trending-down"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">412</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Income amounts</p>
                                            <p class="text-success">23% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-4">
                                            <h3 class="mb-2">9520</h3>
                                            <p class="text-uppercase mb-1 font-13 fw-medium">Total visits</p>
                                            <p class="text-success">5.5% <i class="mdi mdi-trending-up"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="morris-donut-example" class="morris-chart" style="height: 300px;" dir="ltr"></div>
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

<!-- Apex Chart js -->
<script src="assets/vendor/morris.js/morris.min.js"></script>

<script src="assets/vendor/raphael/raphael.min.js"></script>

<!-- Apex Chart Bar Demo js -->
<script src="assets/js/pages/morris.js"></script>

</body>

</html>