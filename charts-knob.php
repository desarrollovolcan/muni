<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Jquery Knob";
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
            $subtitle = "Knob";
            $title = "Jquery Knob Charts";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Examples</h5>
                            <p class="card-subtitle">
                                Use <code> data-plugin="knob" data-width="xx" data-height="xx"
                                    data-fgColor="#xxx" data-displayInput=.. value="xxx"</code>.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150"
                                               data-bgColor="#ebeff2" data-fgColor="#1bb99a" data-displayInput=false
                                               value="35"/>
                                        <h6 class="text-muted">Disable display input</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150" data-cursor=true
                                               data-fgColor="#3db9dc" value="29"/>
                                        <h6 class="text-muted">Cursor mode</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150" data-min="-100"
                                               data-fgColor="#f1b53d" data-displayPrevious=true value="44"/>
                                        <h6 class="text-muted">Display previous value</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150" data-min="-100"
                                               data-fgColor="#ff5d48" data-displayPrevious=true data-angleOffset=-125
                                               data-angleArc=250 value="44"/>
                                        <h6 class="text-muted">Angle offset and arc</h6>
                                    </div>
                                </div><!-- end col-->
                            </div><!-- end row -->

                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150"
                                               data-angleOffset="90" data-linecap="round" data-fgColor="#2b3d51"
                                               value="35"/>
                                        <h6 class="text-muted">Angle offset</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150" data-min="-15000"
                                               data-displayPrevious=true data-max="15000" data-step="1000"
                                               value="-11000" data-fgColor="#9261c6"/>
                                        <h6 class="text-muted">5-digit values, step 1000</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150" data-linecap=round
                                               data-fgColor="#ff7aa3" value="80" data-skin="tron" data-angleOffset="180"
                                               data-readOnly=true data-thickness=".1"/>
                                        <h6 class="text-muted">Readonly</h6>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-xl-3 col-md-6">
                                    <div class="p-3 text-center" dir="ltr">
                                        <input data-plugin="knob" data-width="150" data-height="150"
                                               data-displayPrevious=true data-fgColor="#039cfd" data-skin="tron"
                                               data-cursor=true value="75" data-thickness=".2" data-angleOffset=-125
                                               data-angleArc=250 value="44"/>
                                        <h6 class="text-muted">Angle offset and arc</h6>
                                    </div>
                                </div><!-- end col-->
                            </div><!-- end row-->
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

<!-- KNOB JS -->
<script src="assets/vendor/jquery-knob/jquery.knob.min.js"></script>

</body>

</html>