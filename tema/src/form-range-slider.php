<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Range Slider";
    include "partials/title-meta.php" ?>

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="assets/vendor/nouislider/nouislider.min.css">

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
            $subtitle = "Extended UI";
            $title = "Range Slider";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Basic Range Slider</h4>
                        </div>
                        <div class="card-body">
                            <div id="rangeslider_basic"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Multi Elements Range</h4>
                        </div>
                        <div class="card-body">
                            <div id="rangeslider_multielement"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Value Range Slider</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div id="nonlinear"></div>
                                <div class="d-flex justify-content-between">
                                    <div class="example-val" id="lower-value"></div>
                                    <div class="example-val" id="upper-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Color Scheme</h4>
                        </div><!-- end card header -->
                        <div class="card-body">

                            <div>
                                <h5 class="font-14">Primary</h5>
                                <div id="slider-primary" data-slider-color="primary"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="font-14">Secondary</h5>
                                <div id="slider-secondary" data-slider-color="secondary"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="font-14">Success</h5>
                                <div id="slider-success" data-slider-color="success"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="font-14">Info</h5>
                                <div id="slider-info" data-slider-color="info"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="font-14">Warning</h5>
                                <div id="slider-warning" data-slider-color="warning"></div>
                            </div>

                            <div class="mt-3">
                                <h5 class="font-14">Danger</h5>
                                <div id="slider-danger" data-slider-color="danger"></div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Locking Sliders Together</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="slider" id="slider1"></div>
                                <span class="example-val mt-2" id="slider1-span"></span>

                                <div class="slider" id="slider2"></div>
                                <span class="example-val mt-2" id="slider2-span"></span>

                                <button id="lockbutton" class="btn btn-primary">Lock</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Tooltip</h4>
                        </div>
                        <div class="card-body">
                            <div class="slider" id="slider-merging-tooltips"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Soft Limits</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 pb-5">
                                <div class="slider" id="soft"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Color Picker</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="sliders" id="red"></div>
                                <div class="sliders" id="green"></div>
                                <div class="sliders" id="blue"></div>

                                <div id="result"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Vertical Range Slider</h4>
                        </div>
                        <div class="card-body">
                            <div id="slider-vertical" class="mx-auto"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Vertical Range Slider</h4>
                        </div>
                        <div class="card-body">
                            <div id="slider-connect-upper" class="mx-auto"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-bottom border-dashed d-flex align-items-center">
                            <h4 class="header-title">Vertical Range Slider</h4>
                        </div>
                        <div class="card-body">
                            <div id="slider-vertical-tooltip" class="mx-auto"></div>
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

<!-- noUiSlider js -->
<script src="assets/vendor/nouislider/nouislider.min.js"></script>
<script src="assets/vendor/wnumb/wNumb.min.js"></script>

<!-- Plugins only -->
<script src="assets/js/pages/extended-range-slider.js"></script>

</body>

</html>