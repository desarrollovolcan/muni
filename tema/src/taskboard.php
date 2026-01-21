<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Taskboard";
    include "partials/title-meta.php" ?>


    <link href="assets/vendor/@adactive/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>


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
            $title = "Taskboard";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark header-title">Upcoming</h4>
                            <p class="sub-header">
                                Your awesome text goes here.
                            </p>

                            <ul class="sortable-list taskList list-unstyled" id="upcoming">
                                <li class="bg-soft-warning" id="task1">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    When an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-1.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Petey Cruiser</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-success" id="task2">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    Many desktop publishing packages and web page editors now use Lorem.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-2.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Anna Sthesia</span></a></p>
                                    </div>
                                </li>
                                <li id="task3">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    If you are going to use a passage of Lorem Ipsum..
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-3.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Gail Forcewind</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-info" id="task4">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                                    2000 years old.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-4.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Maya Didas</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-danger" id="task5">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-5.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Rick O'Shea</span></a></p>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-secondary btn-block mt-3 waves-effect waves-light w-100">Add
                                New</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark header-title">In Progress</h4>
                            <p class="sub-header">
                                Your awesome text goes here.
                            </p>

                            <ul class="sortable-list taskList list-unstyled" id="inprogress">
                                <li id="task9">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    If you are going to use a passage of Lorem Ipsum..
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-3.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Gail Forcewind</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-info" id="task10">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                                    2000 years old.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-4.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Maya Didas</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-danger" id="task11">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-5.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Rick O'Shea</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-warning" id="task7">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    When an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-1.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Petey Cruiser</span></a></p>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-secondary btn-block mt-3 waves-effect waves-light w-100">Add
                                New</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark header-title">Completed</h4>
                            <p class="sub-header">
                                Your awesome text goes here.
                            </p>

                            <ul class="sortable-list taskList list-unstyled" id="completed">
                                <li class="bg-soft-warning" id="task14">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    When an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-1.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Petey Cruiser</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-success" id="task15">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    Many desktop publishing packages and web page editors now use Lorem.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-2.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Anna Sthesia</span></a></p>
                                    </div>
                                </li>
                                <li id="task16">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    If you are going to use a passage of Lorem Ipsum..
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-3.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Gail Forcewind</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-info" id="task17">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    It has roots in a piece of classical Latin literature from 45 BC, making it over
                                    2000 years old.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-4.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Maya Didas</span></a></p>
                                    </div>
                                </li>
                                <li class="bg-soft-danger" id="task18">
                                    <div class="checkbox checkbox-primary checkbox-single float-end">
                                        <input type="checkbox" aria-label="Single checkbox Two">
                                        <label></label>
                                    </div>
                                    There are many variations of passages of Lorem Ipsum available.
                                    <div class="clearfix"></div>
                                    <div class="mt-3">
                                        <p class="float-end mb-0 mt-1">
                                            <button type="button"
                                                    class="btn btn-success btn-xs waves-effect waves-light"
                                                    data-toggle="modal" data-target="#task-detail-modal">View
                                            </button>
                                        </p>
                                        <p class="mb-0"><a href="" class="text-muted"><img
                                                        src="assets/images/users/avatar-5.jpg" alt="task-user"
                                                        class="avatar-sm rounded-circle me-2"> <span
                                                        class="fw-medium font-secondary">Rick O'Shea</span></a></p>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-secondary btn-block mt-3 waves-effect waves-light w-100">Add
                                New</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->


            <!-- Modal -->
            <div id="task-detail-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
                 style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 p-0">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                            <div class="p-2 task-detail">
                                <div class="media mb-3">
                                    <img class="d-flex me-3 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                         alt="Generic placeholder image" height="48">
                                    <div class="media-body">
                                        <h5 class="media-heading mb-1 mt-0">Michael Zenaty</h5>
                                        <span class="badge badge-danger">Urgent</span>
                                    </div>
                                </div>

                                <h4 class="mb-4">Code HTML email template for welcome email</h4>

                                <p class="text-muted">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste
                                    itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos
                                    delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo
                                    rerum? Lorem ipsum dolor sit amet.
                                </p>

                                <ul class="list-inline task-dates mb-0 mt-4">
                                    <li>
                                        <h5 class="mb-1">Start Date</h5>
                                        <p> 22 March 2017 <small class="text-muted">1:00 PM</small></p>
                                    </li>

                                    <li>
                                        <h5 class="mb-1">Due Date</h5>
                                        <p> 17 April 2017 <small class="text-muted">12:00 PM</small></p>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>

                                <div class="task-tags mt-4">
                                    <h5 class="">Tags</h5>
                                    <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput"
                                           placeholder="add tags"/>
                                </div>

                                <div class="assign-team mt-4">
                                    <h5 class="mb-1">Followers</h5>
                                    <div>
                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64"
                                                          src="assets/images/users/avatar-2.jpg"> </a>
                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64"
                                                          src="assets/images/users/avatar-3.jpg"> </a>
                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64"
                                                          src="assets/images/users/avatar-5.jpg"> </a>
                                        <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64"
                                                          src="assets/images/users/avatar-8.jpg"> </a>
                                    </div>
                                </div>

                                <div class="attached-files mt-4">
                                    <h5 class="">Attached Files </h5>
                                    <div class="files-list">
                                        <div class="file-box">
                                            <a href=""><img src="assets/images/attached-files/img-1.jpg"
                                                            class="img-fluid img-thumbnail" alt="attached-img"></a>
                                            <p class="font-13 mb-1 text-muted"><small>File one</small></p>
                                        </div>
                                        <div class="file-box">
                                            <a href=""><img src="assets/images/attached-files/img-2.jpg"
                                                            class="img-fluid img-thumbnail" alt="attached-img"></a>
                                            <p class="font-13 mb-1 text-muted"><small>Attached-2</small></p>
                                        </div>
                                        <div class="file-box">
                                            <a href=""><img src="assets/images/attached-files/img-3.png"
                                                            class="img-fluid img-thumbnail" alt="attached-img"></a>
                                            <p class="font-13 mb-1 text-muted"><small>Dribbble shot</small></p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success waves-effect waves-light">Save Changes</button>
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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

<script src="assets/vendor/@adactive/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>

<!-- Taskboard js -->
<script src="assets/js/pages/taskboard.js"></script>

</body>

</html>