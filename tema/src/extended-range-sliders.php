<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Range sliders";
    include "partials/title-meta.php" ?>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <link rel="stylesheet" href="assets/vendor/ion-rangeslider/css/ion.rangeSlider.min.css">

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
            $subtitle = "Base UI";
            $title = "Range sliders";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Modern skin</h5>

                            <p class="card-subtitle">
                                Cool, comfortable, responsive and easily customizable range slider
                            </p>

                        </div>
                        <div class="card-body">


                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="range_01" class="col-lg-2 control-label">Default<span
                                                class="font-12 d-block text-muted clearfix">Start without params</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_01">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_02" class="col-lg-2 control-label">Min-Max<span
                                                class=" font-12 d-block text-muted clearfix">Set min value, max value and start point</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_02">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_03" class="col-lg-2 control-label">Prefix<span
                                                class="font-12 d-block text-muted clearfix">showing grid and adding prefix "$"</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_03">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_04" class="col-lg-2 control-label">Range<span
                                                class="d-block font-12 text-muted clearfix">Set up range with negative values</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_04">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_05" class="col-lg-2 control-label">Step<span
                                                class="d-block font-12 text-muted clearfix">Using step 250</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_05">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_06" class="col-lg-2 control-label">Custom Values<span
                                                class="d-block font-12 text-muted clearfix">Using any strings as values</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_06">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_07" class="col-lg-2 control-label">Prettify Numbers<span
                                                class="d-block font-12 text-muted clearfix">Prettify enabled. Much better!</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_07">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_08" class="col-lg-2 control-label">Disabled<span
                                                class="d-block font-12 text-muted clearfix">Lock slider by using disable option</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_08">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_09" class="col-lg-2 control-label">Extra Example<span
                                                class="d-block font-12 text-muted clearfix">Whant to show that max number is not the biggest one?</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_09">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_10" class="col-lg-2 control-label">Use decorate_both option<span
                                                class="d-block font-12 text-muted clearfix">Use decorate_both option</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_11" class="col-lg-2 control-label">Postfixes<span
                                                class="d-block font-12 text-muted clearfix">Using postfixes</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_11">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="range_12" class="col-lg-2 control-label">Hide<span
                                                class="d-block font-12 text-muted clearfix">Or hide any part you wish</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" id="range_12">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div><!-- end col -->
            </div><!-- Row -->

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

<!-- Ion Range Slider-->
<script src="assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Range slider init js-->
<script src="assets/js/pages/range-sliders.js"></script>

</body>

</html>