<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Slider";
    include "partials/title-meta.php" ?>

    <link href="assets/vendor/slick-slider/slick/slick.css" rel="stylesheet" type="text/css"/>
    <link href="assets/vendor/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css"/>


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
            $title = "Slider";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Single Item</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="single-item slider" dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Multiple Items</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="multiple-items slider-padding" dir="ltr">
                                <div>
                                    <img src="assets/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Responsive Display</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="responsive-slider slider-padding" dir="ltr">
                                <div>
                                    <img src="assets/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Center Mode</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="center-item-slider slider-padding" dir="ltr">
                                <div>
                                    <img src="assets/images/small/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-4.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-5.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/small/img-6.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Lazy Loading</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="lazy-load-slider slider-padding" dir="ltr">
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-6.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-5.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-4.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-3.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-2.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                                <div>
                                    <img src="" data-lazy="assets/images/small/img-1.jpg" alt="slider-img"
                                         class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Fade</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="fade-slider slider " dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Slider Syncing</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="slider-syncing-for" dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>

                            <div class="slider-syncing-nav" dir="ltr">
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-2.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-1.jpg" alt="slider-img" class="img-fluid">
                                </div>
                                <div>
                                    <img src="assets/images/big/img-3.jpg" alt="slider-img" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
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


<script src="assets/vendor/slick-slider/slick/slick.min.js"></script>

<!-- slick-slider init-->
<script src="assets/js/pages/slick-slider.js"></script>

</body>

</html>