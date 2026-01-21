<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Nestable Lists";
    include "partials/title-meta.php" ?>

    <!-- Plugins css -->
    <link href="assets/vendor/nestable2/jquery.nestable.min.css" rel="stylesheet" type="text/css"/>

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
            $title = "Nestable Lists";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-lg-12">
                    <div class="text-left" id="nestable_list_menu">
                        <button type="button" class="btn btn-pink waves-effect waves-light me-1"
                                data-action="expand-all">Expand All
                        </button>
                        <button type="button" class="btn btn-purple waves-effect waves-light"
                                data-action="collapse-all">Collapse All
                        </button>
                    </div>
                </div>
            </div>
            <!-- End row -->

            <br>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="header-title"><b>Nestable Lists 1</b></h4>
                                    <p class="sub-header">
                                        Drag & drop hierarchical list with mouse and touch compatibility (jQuery
                                        plugin).
                                    </p>

                                    <div class="custom-dd dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">
                                                    Choose a smartwatch
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">
                                                    Send design for review
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="3">
                                                        <div class="dd-handle">
                                                            Coffee with the team
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="4">
                                                        <div class="dd-handle">
                                                            Ready my new work
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="5">
                                                        <div class="dd-handle">
                                                            Make a wireframe
                                                        </div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="6">
                                                                <div class="dd-handle">
                                                                    Video app redesign
                                                                </div>
                                                            </li>
                                                            <li class="dd-item" data-id="7">
                                                                <div class="dd-handle">
                                                                    iOS apps design completed
                                                                </div>
                                                            </li>
                                                            <li class="dd-item" data-id="8">
                                                                <div class="dd-handle">
                                                                    Dashboard design started
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="9">
                                                        <div class="dd-handle">
                                                            Homepage design
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="10">
                                                        <div class="dd-handle">
                                                            Developed UI Kit
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>

                                        </ol>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-md-6">
                                    <h4 class="header-title"><b>Nestable Lists 2</b></h4>
                                    <p class="sub-header">
                                        Drag & drop hierarchical list with mouse and touch compatibility (jQuery
                                        plugin).
                                    </p>

                                    <div class="custom-dd dd" id="nestable_list_2">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="11">
                                                <div class="dd-handle">
                                                    Item 11
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="12">
                                                <div class="dd-handle">
                                                    Item 12
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle">
                                                    Item 13
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle">
                                                    Item 14
                                                </div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle">
                                                    Item 15
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle">
                                                            Item 16
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle">
                                                            Item 17
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle">
                                                            Item 18
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end Row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="header-title"><b>Nestable Lists 3</b></h4>
                                    <p class="sub-header">
                                        Drag & drop hierarchical list with mouse and touch compatibility (jQuery
                                        plugin).
                                    </p>

                                    <div class="custom-dd-empty dd" id="nestable_list_3">
                                        <ol class="dd-list">
                                            <li class="dd-item dd3-item" data-id="13">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    Item 13
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="14">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    Item 14
                                                </div>
                                            </li>
                                            <li class="dd-item dd3-item" data-id="15">
                                                <div class="dd-handle dd3-handle"></div>
                                                <div class="dd3-content">
                                                    Item 15
                                                </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item dd3-item" data-id="16">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">
                                                            Item 16
                                                        </div>
                                                    </li>
                                                    <li class="dd-item dd3-item" data-id="17">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">
                                                            Item 17
                                                        </div>
                                                    </li>
                                                    <li class="dd-item dd3-item" data-id="18">
                                                        <div class="dd-handle dd3-handle"></div>
                                                        <div class="dd3-content">
                                                            Item 18
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div><!-- end col -->

                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end Row -->

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
<script src="assets/vendor/nestable2/jquery.nestable.min.js"></script>

<!-- Nestable init-->
<script src="assets/js/pages/nestable.js"></script>

</body>

</html>