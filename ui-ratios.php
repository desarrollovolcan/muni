<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Ratio Video";
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
            $subtitle = "Base UI";
            $title = "Ratio Video";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Responsive Ratio video 21:9</h5>
                            <p class="card-subtitle">Use class <code>.ratio-21x9</code>
                        </div>

                        <div class="card-body pt-2">
                            <!-- 21:9 aspect ratio -->
                            <div class="ratio ratio-21x9">
                                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Responsive Ratio video 1:1</h5>
                            <p class="card-subtitle">Use class <code>.ratio-1x1</code></p>
                        </div>

                        <div class="card-body pt-2">
                            <!-- 1:1 aspect ratio -->
                            <div class="ratio ratio-1x1">
                                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Responsive Ratio video 16:9</h5>
                            <p class="card-subtitle">Use class <code>.ratio-16x9</code>
                        </div>

                        <div class="card-body pt-2">
                            <!-- 16:9 aspect ratio -->
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Responsive Ratio video 4:3</h5>
                            <p class="card-subtitle">Use class <code>.ratio-4x3</code>
                        </div>

                        <div class="card-body pt-2">
                            <!-- 4:3 aspect ratio -->
                            <div class="ratio ratio-4x3">
                                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                            </div>
                        </div> <!-- end card-body -->
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

</body>

</html>