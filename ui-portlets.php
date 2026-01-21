<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Portlets";
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
            $title = "Portlets";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0">Default Heading</h5>

                            <div id="cardCollpase1" class="collapse pt-3 show">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat,
                                ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo. vamus suscipit molestie
                                vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-body bg-primary text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Primary Heading</h5>

                            <div id="cardCollpase2" class="collapse pt-3 show">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Success Heading</h5>

                            <div id="cardCollpase3" class="collapse pt-3 show">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Danger Heading</h5>
                        </div>
                        <div id="cardCollpase4" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-blue text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Blue Heading</h5>
                        </div>
                        <div id="cardCollpase5" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase6" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Warning Heading</h5>
                        </div>
                        <div id="cardCollpase6" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Info Heading</h5>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <div class="card-widgets text-light">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase8" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-light">Dark Heading</h5>
                        </div>
                        <div id="cardCollpase8" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-pink text-white">
                            <div class="card-widgets">
                                <a href="javascript:;" data-bs-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase9" role="button" aria-expanded="false"
                                   aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                <a href="#" data-bs-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Pink Heading</h5>
                        </div>
                        <div id="cardCollpase9" class="collapse show">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel
                                pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                                vamus suscipit molestie vestibulum.
                            </div>
                        </div>
                    </div> <!-- end card-->
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

</body>

</html>