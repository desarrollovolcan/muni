<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Vector Maps";
    include "partials/title-meta.php" ?>

    <!-- leaflet Css -->
    <link href="assets/vendor/leaflet/leaflet.css" rel="stylesheet" type="text/css"/>

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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Basic Map</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="basicMap"></div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Marker Circle & Polygon</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="shapeMap"></div>
                        </div>
                    </div> <!-- end card-->
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Draggable Marker With Popup</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="dragMap"></div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">User Location</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="userLocation"></div>
                        </div>
                    </div> <!-- end card-->
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Custom Icons</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="customIcons"></div>
                        </div>
                    </div> <!-- end card-->
                </div>


                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Layer Control</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="layerControl"></div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Interactive Choropleth Map</h4>
                        </div>

                        <div class="card-body">
                            <div class="leaflet-map" id="geoJson"></div>
                        </div>
                    </div> <!-- end card-->
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

<!-- leaflet plugin -->
<script src="assets/vendor/leaflet/leaflet.js"></script>

<!-- leaflet map -->
<script src="assets/js/maps/leaflet-data.js"></script>
<script src="assets/js/pages/maps-leaflet.js"></script>

</body>

</html>