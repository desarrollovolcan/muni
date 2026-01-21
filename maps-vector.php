<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Vector Maps";
    include "partials/title-meta.php" ?>

    <!-- Vector Maps css -->
    <link href="assets/vendor/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css">

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
            $subtitle = "Maps";
            $title = "Vector Maps";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">World Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="world-map-markers" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">World Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="world-map-markers-line" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">India Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="india-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">Canada Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="canada-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">Russia Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="russia-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">US Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="usa-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">Iraq Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="iraq-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0 border-bottom border-dashed">
                            <h4 class="header-title">Spain Vector Map</h4>
                        </div>
                        <div class="card-body">
                            <div id="spain-vector-map" style="height: 360px"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- card end -->
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

<!-- Vector Map Js -->
<script src="assets/vendor/jsvectormap/jsvectormap.min.js"></script>
<script src="assets/vendor/jsvectormap/maps/world-merc.js"></script>
<script src="assets/vendor/jsvectormap/maps/world.js"></script>

<script src="assets/js/maps/in-mill-en.js"></script>
<script src="assets/js/maps/canada.js"></script>
<script src="assets/js/maps/iraq.js"></script>
<script src="assets/js/maps/russia.js"></script>
<script src="assets/js/maps/spain.js"></script>
<script src="assets/js/maps/us-aea-en.js"></script>
<script src="assets/js/maps/us-lcc-en.js"></script>
<script src="assets/js/maps/us-mill-en.js"></script>

<!-- Vector Map Demo js-->
<script src="assets/js/pages/maps-vector.js"></script>

</body>

</html>