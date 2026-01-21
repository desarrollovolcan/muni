<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Carousel";
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
            $title = "Carousel";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Slides Only</h5>
                            <p class="card-subtitle">Here’s a carousel with slides only.
                                Note the presence of the <code>.d-block</code>
                                and <code>.img-fluid</code> on carousel images
                                to prevent browser default image alignment.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-1.jpg"
                                             alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-2.jpg"
                                             alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-3.jpg"
                                             alt="Third slide">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Controls</h5>
                            <p class="card-subtitle">Adding in the previous and next controls:</p>
                        </div>

                        <div class="card-body pt-2">

                            <!-- START carousel-->
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-4.jpg"
                                             alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-1.jpg"
                                             alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-2.jpg"
                                             alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END carousel-->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Indicators</h5>
                            <p class="card-subtitle">You can also add the indicators to the
                                carousel, alongside the controls, too.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                        class="active"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-3.jpg"
                                             alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-2.jpg"
                                             alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-1.jpg"
                                             alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Captions</h5>
                            <p class="card-subtitle">Add captions to your slides easily with the
                                <code>.carousel-caption</code> element within any <code>.carousel-item</code>.</p>
                        </div>

                        <div class="card-body pt-2">
                            <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="assets/images/small/img-1.jpg" alt="..."
                                             class="d-block img-fluid w-100">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3 class="text-white">First slide label</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/small/img-3.jpg" alt="..."
                                             class="d-block img-fluid w-100">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3 class="text-white">Second slide label</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/small/img-2.jpg" alt="..."
                                             class="d-block img-fluid w-100">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3 class="text-white">Third slide label</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaption" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaption" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Crossfade</h5>
                            <p class="card-subtitle">Add <code>.carousel-fade</code> to your carousel to animate slides
                                with a fade transition instead of a slide.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-1.jpg"
                                             alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-2.jpg"
                                             alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid w-100" src="assets/images/small/img-3.jpg"
                                             alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Individual Interval</h5>
                            <p class="card-subtitle">Add <code>data-bs-interval=""</code> to a
                                <code>.carousel-item</code> to change the amount of time to delay between automatically
                                cycling to the next item.</p>
                        </div>

                        <div class="card-body pt-2">

                            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="1000">
                                        <img src="assets/images/small/img-6.jpg" class="img-fluid d-block w-100"
                                             alt="First slide">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="assets/images/small/img-2.jpg" class="img-fluid d-block w-100"
                                             alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/small/img-1.jpg" class="img-fluid d-block w-100"
                                             alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button"
                                   data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleInterval" role="button"
                                   data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Dark Variant</h5>
                            <p class="card-subtitle">Add <code>.carousel-dark</code> to the <code>.carousel</code> for
                                darker controls, indicators, and captions. Controls are inverted compared to their
                                default white fill with the <code>filter</code> CSS property. Captions and controls have
                                additional Sass variables that customize the <code>color</code> and <code>background-color</code>.
                            </p>
                        </div>

                        <div class="card-body pt-2">

                            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                            class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                            aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                            aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="10000">
                                        <img src="assets/images/small/img-5.jpg" class="img-fluid w-100" alt="Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>First slide label</h5>
                                            <p>Some representative placeholder content for the first slide.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="assets/images/small/img-6.jpg" class="img-fluid w-100" alt="Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Second slide label</h5>
                                            <p>Some representative placeholder content for the second slide.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/images/small/img-1.jpg" class="img-fluid w-100" alt="Images">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Third slide label</h5>
                                            <p>Some representative placeholder content for the third slide.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
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