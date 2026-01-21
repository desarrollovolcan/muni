<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Form Picker";
    include "partials/title-meta.php" ?>

    <!-- Plugins css -->
    <link href="assets/vendor/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css"/>

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
            $subtitle = "Forms";
            $title = "Form Picker";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Flatpickr - Date picker</h4>
                            <p class="sub-header">A lightweight and powerful datetimepicker</p>

                            <div class="mb-3">
                                <label class="form-label">Basic</label>
                                <input type="text" id="basic-datepicker" class="form-control"
                                       placeholder="Basic datepicker">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date & Time</label>
                                <input type="text" id="datetime-datepicker" class="form-control"
                                       placeholder="Date and Time">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Human-friendly Dates</label>
                                <input type="text" id="humanfd-datepicker" class="form-control"
                                       placeholder="October 9, 2018">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">MinDate and MaxDate</label>
                                <input type="text" id="minmax-datepicker" class="form-control"
                                       placeholder="mindate - maxdate">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Disabling dates</label>
                                <input type="text" id="disable-datepicker" class="form-control"
                                       placeholder="Disabling dates">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Selecting multiple dates</label>
                                <input type="text" id="multiple-datepicker" class="form-control"
                                       placeholder="Multiple dates">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Selecting multiple dates - Conjunction</label>
                                <input type="text" id="conjunction-datepicker" class="form-control"
                                       placeholder="2018-10-10 :: 2018-10-11">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Range Calendar</label>
                                <input type="text" id="range-datepicker" class="form-control"
                                       placeholder="2018-10-03 to 2018-10-10">
                            </div>

                            <div>
                                <label class="form-label">Inline Calendar</label>
                                <input type="text" id="inline-datepicker" class="form-control"
                                       placeholder="Inline calendar">
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Flatpickr - Time Picker</h4>
                            <p class="sub-header">A lightweight and powerful datetimepicker</p>

                            <div class="mb-3">
                                <label class="form-label">Basic</label>
                                <input type="text" id="basic-timepicker" class="form-control"
                                       placeholder="Basic timepicker">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">24-hour Time Picker</label>
                                <input type="text" id="24hours-timepicker" class="form-control" placeholder="16:21">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Time Picker w/ Limits</label>
                                <input type="text" id="minmax-timepicker" class="form-control" placeholder="Limits">
                            </div>

                            <div>
                                <label class="form-label">Preloading Time</label>
                                <input type="text" id="preloading-timepicker" class="form-control"
                                       placeholder="Pick a time">
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col -->
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

<!-- Plugin js-->
<script src="assets/vendor/flatpickr/flatpickr.min.js"></script>

<!-- Init js-->
<script src="assets/js/pages/form-pickers.js"></script>
</body>

</html>