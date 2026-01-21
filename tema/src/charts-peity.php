<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Peity Chart";
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
            $subtitle = "Peity";
            $title = "Peity Chart";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Pie Charts</h5>
                            <p class="card-subtitle">
                                Use <code>&lt;span data-plugin="peity-pie" data-colors="#xxx,#xxx" data-width="xx"
                                    data-height="xx"&gt;1/5&lt;/span&gt;</code>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#039cfd,#ebeff2" data-width="80"
                                              data-height="80">1/5</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#1bb99a,#ebeff2" data-width="80"
                                              data-height="80">226/360</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#f1b53d,#ebeff2" data-width="80"
                                              data-height="80">0.52/1.561</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#ff5d48,#ebeff2" data-width="80"
                                              data-height="80">0.52,1.041</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#2b3d51,#ebeff2" data-width="80"
                                              data-height="80">226,134</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-pie" data-colors="#9261c6,#ebeff2" data-width="80"
                                              data-height="80">226,134</span>
                                    </div>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Donut Charts</h5>
                            <p class="card-subtitle">
                                Use <code>&lt;span data-plugin="peity-donut" data-colors="#xxx,#xxx" data-width="xx"
                                    data-height="xx"&gt;1/5&lt;/span&gt;</code>
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#3db9dc,#ebeff2" data-width="80"
                                              data-height="80">1/5</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#ff7aa3,#ebeff2" data-width="80"
                                              data-height="80">226/360</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#039cfd,#ebeff2" data-width="80"
                                              data-height="80">0.52/1.561</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#1bb99a,#ebeff2" data-width="80"
                                              data-height="80">1/4</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#f1b53d,#ebeff2" data-width="80"
                                              data-height="80">226,134</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut" data-colors="#ff5d48,#ebeff2" data-width="80"
                                              data-height="80">1,2,3,2,2</span>
                                    </div>
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Other Charts</h5>
                            <p class="card-subtitle">
                                Your awesome text goes here.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-diameter="40" class="updating-chart">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-line" data-fill="#34d3eb" data-stroke="#34d3eb"
                                              data-width="100" data-height="60">5,3,2,-1,-3,-2,2,3,5,2</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-bar" data-colors="#f1b53d,#ebeff2" data-width="100"
                                              data-height="30">5,3,9,6,5,9,7,3,5,2</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-bar" data-colors="#ff7aa3,#ebeff2" data-width="100"
                                              data-height="30">5,3,2,-1,-3,-2,2,3,5,2</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut-alt"
                                              data-peity='{ "fill": ["#4c5667", "#ebeff2"], "innerRadius": 24, "radius": 30 }'>6/7</span>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-3 col-6">
                                    <div class="p-3 text-center">
                                        <span data-plugin="peity-donut-alt"
                                              data-peity='{ "fill": ["#64b0f2", "#ebeff2"], "innerRadius": 18, "radius": 28 }'>4/7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body-->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col-->
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


<!-- Peity chart-->
<script src="assets/vendor/peity/jquery.peity.min.js"></script>


<script src="assets/js/pages/peity.js"></script>


</body>

</html>