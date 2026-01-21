<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Placeholders";
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
            $title = "Placeholders";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Placeholders</h5>
                            <p class="card-subtitle">
                                In the example below, we take a typical card component and recreate it with placeholders
                                applied to create a “loading card”. Size and proportions are the same between the two.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card border shadow-none mb-md-0">
                                        <img src="assets/images/small/img-1.jpg" class="card-img-top" alt="...">

                                        <div class="card-body">
                                            <h5 class="header-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's
                                                content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->

                                <div class="col-md-6">
                                    <div class="card border shadow-none mb-0" aria-hidden="true">
                                        <img src="assets/images/small/img-2.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="header-title placeholder-glow">
                                                <span class="placeholder col-6"></span>
                                            </h5>
                                            <p class="card-text placeholder-glow">
                                                <span class="placeholder col-7"></span>
                                                <span class="placeholder col-4"></span>
                                                <span class="placeholder col-4"></span>
                                                <span class="placeholder col-6"></span>
                                            </p>
                                            <a class="btn btn-primary disabled placeholder col-6" aria-disabled="true">
                                                <span class="invisible">Read Only</span></a>
                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col-->
                            </div> <!-- end row-->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Color</h5>
                            <p class="card-subtitle">
                                By default, the <code>placeholder</code> uses <code>currentColor</code>. This can be
                                overriden with a custom color or utility class.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12 bg-primary"></span>
                            <span class="placeholder col-12 bg-secondary"></span>
                            <span class="placeholder col-12 bg-success"></span>
                            <span class="placeholder col-12 bg-danger"></span>
                            <span class="placeholder col-12 bg-warning"></span>
                            <span class="placeholder col-12 bg-info"></span>
                            <span class="placeholder col-12 bg-light"></span>
                            <span class="placeholder col-12 bg-dark"></span>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Width</h5>
                            <p class="card-subtitle">
                                You can change the <code>width</code> through grid column classes, width utilities, or
                                inline styles.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <span class="placeholder col-6"></span>
                            <span class="placeholder w-75"></span>
                            <span class="placeholder" style="width: 25%;"></span> <br/>
                            <span class="placeholder" style="width: 10%;"></span>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Sizing</h5>
                            <p class="card-subtitle">
                                The size of <code>.placeholder</code>s are based on the typographic style of the parent
                                element. Customize them with sizing modifiers: <code>.placeholder-lg</code>, <code>.placeholder-sm</code>,
                                or <code>.placeholder-xs</code>.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <span class="placeholder col-12 placeholder-lg"></span>
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12 placeholder-sm"></span>
                            <span class="placeholder col-12 placeholder-xs"></span>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">How it works</h5>
                            <p class="card-subtitle">
                                Create placeholders with the <code>.placeholder</code> class and a grid column class
                                (e.g., <code>.col-6</code>) to set the <code>width</code>. They can replace the text
                                inside an element or as be added as a modifier class to an existing component.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <p aria-hidden="true">
                                <span class="placeholder col-6"></span>
                            </p>

                            <a href="#" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Animation</h5>
                            <p class="card-subtitle">
                                Animate placehodlers with <code>.placeholder-glow</code> or
                                <code>.placeholder-wave</code> to better convey the perception of something being <em>actively</em>
                                loaded.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <p class="placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </p>

                            <p class="placeholder-wave mb-0">
                                <span class="placeholder col-12"></span>
                            </p>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

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