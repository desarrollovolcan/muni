<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Todo";
    include "partials/title-meta.php" ?>

    <!-- Plugins css-->
    <link href="assets/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css"/>

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
            $subtitle = "Apps";
            $title = "Todo";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 id="todo-message" class="mt-0 fw-semibold"><span id="todo-remaining"></span> of
                                        <span id="todo-total"></span> remaining</h5>
                                </div>
                                <div class="col-sm-6">
                                    <a href="" class="float-end btn btn-primary btn-sm waves-effect waves-light"
                                       id="btn-archive">Archive</a>
                                </div>
                            </div>

                            <form name="todo-form" id="todo-form" class="mt-4">
                                <div class="row">
                                    <div class="col-sm-9 todo-inputbar">
                                        <input type="text" id="todo-input-text" name="todo-input-text"
                                               class="form-control" placeholder="Add new todo">
                                    </div>
                                    <div class="col-sm-3 todo-send">
                                        <button class="btn-primary btn-md btn-block btn waves-effect waves-light w-100"
                                                type="button" id="todo-btn-submit">Add
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <ul class="list-group mt-4 todo-list mb-0" id="todo-list"></ul>
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

<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/sweetalert2/sweetalert2.min.js"></script>

<!-- TODO js-->
<script src="assets/js/pages/jquery.todo.js"></script>
</body>

</html>