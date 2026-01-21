<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Google Maps";
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
            $subtitle = "Maps";
            $title = "Google Maps";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Basic Google Map</h4>
                            <div id="gmaps-basic" class="gmaps"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Markers Google Map</h4>
                            <div id="gmaps-markers" class="gmaps"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Street View Panoramas Google Map</h4>
                            <div id="panorama" class="gmaps"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Google Map Types</h4>
                            <div id="gmaps-types" class="gmaps"></div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Ultra Light with Labels</h4>
                            <div id="ultra-light" class="gmaps"></div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col-->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Dark</h4>
                            <div id="dark" class="gmaps"></div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
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

<!-- Google Maps API -->
<script src="https://maps.google.com/maps/api/js"></script>
<script src="assets/vendor/gmaps/gmaps.min.js"></script>

<!-- Google Maps Demo js -->
<script src="assets/js/pages/maps-google.js"></script>


</body>

</html>