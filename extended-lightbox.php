<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Lightbox";
    include "partials/title-meta.php" ?>

    <link href="assets/vendor/lightbox2/css/lightbox.min.css" rel="stylesheet" type="text/css"/>

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
            $title = "Lightbox";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Single Images</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="assets/images/small/img-1.jpg" class="img-thumbnail"
                                       data-lightbox="#single-image">
                                        <img id="single-image" src="assets/images/small/img-1.jpg" alt="image-1"
                                             class="img-fluid"/>
                                    </a>
                                </div>

                                <div class="col-sm-4">
                                    <a href="assets/images/small/img-2.jpg" class="img-thumbnail"
                                       data-lightbox="#single-image-2" data-title="Optional caption.">
                                        <img id="single-image-2" src="assets/images/small/img-2.jpg" alt="image-1"
                                             class="img-fluid"/>
                                    </a>
                                </div>

                                <div class="col-sm-4">
                                    <a href="assets/images/small/img-3.jpg" class="img-thumbnail"
                                       data-lightbox="#single-image-3">
                                        <img id="single-image-3" src="assets/images/small/img-3.jpg" alt="image-1"
                                             class="img-fluid"/>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Gallery Images</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="assets/images/small/img-4.jpg" data-lightbox="gallery-set"
                                       data-title="Click the right half of the image to move forward.">
                                        <img src="assets/images/small/img-4.jpg" alt="" class="img-fluid"/>
                                    </a>
                                </div>

                                <div class="col-sm-3">
                                    <a href="assets/images/small/img-5.jpg" data-lightbox="gallery-set"
                                       data-title="Or press the right arrow on your keyboard.">
                                        <img src="assets/images/small/img-5.jpg" alt="" class="img-fluid"/>
                                    </a>
                                </div>

                                <div class="col-sm-3">
                                    <a href="assets/images/small/img-6.jpg" data-lightbox="gallery-set"
                                       data-title="The next image in the set is preloaded as you're viewing.">
                                        <img src="assets/images/small/img-6.jpg" alt="" class="img-fluid"/>
                                    </a>
                                </div>

                                <div class="col-sm-3">
                                    <a href="assets/images/small/img-7.jpg" data-lightbox="gallery-set"
                                       data-title="Click anywhere outside the image or the X to the right to close.">
                                        <img src="assets/images/small/img-7.jpg" alt="" class="img-fluid"/>
                                    </a>
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

<!-- Plugins js-->
<script src="assets/vendor/lightbox2/js/lightbox.min.js"></script>


</body>

</html>