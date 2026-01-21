<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "File Uploads";
    include "partials/title-meta.php" ?>

    <!-- dropify css -->
    <link rel="stylesheet" href="assets/vendor/dropify/css/dropify.min.css" type="text/css"/>

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
            $title = "File Uploads";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Default</h5>
                        </div>
                        <div class="card-body pt-2">
                            <input type="file" class="dropify" data-height="300"/>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Default File</h5>
                        </div>
                        <div class="card-body pt-2">
                            <input type="file" class="dropify" data-default-file="assets/images/small/img-1.jpg"/>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Disabled the input</h5>
                        </div>
                        <div class="card-body pt-2">
                            <input type="file" class="dropify" disabled="disabled"/>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Max File size</h5>
                        </div>
                        <div class="card-body pt-2">
                            <input type="file" class="dropify" data-max-file-size="1M"/>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container -->

        <?php include 'partials/footer.php' ?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<?php include 'partials/customizer.php' ?>

<?php include 'partials/footer-scripts.php' ?>

<!-- dropify File Upload js -->
<script src="assets/vendor/dropify/js/dropify.min.js"></script>

<!-- File Upload Demo js -->
<script src="assets/js/pages/form-fileupload.js"></script>

</body>

</html>