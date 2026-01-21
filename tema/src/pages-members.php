<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Members";
    include "partials/title-meta.php" ?>

    <link href="assets/vendor/custombox/custombox.min.css" rel="stylesheet" type="text/css">

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
            $subtitle = "Pages";
            $title = "Members";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-sm-4">
                    <a href="#custom-modal" class="btn btn-primary waves-effect waves-light mb-3"
                       data-animation="fadein" data-bs-plugin="custommodal" data-overlaySpeed="200"
                       data-overlayColor="#36404a"><i class="md md-add"></i> Add Member</a>
                </div><!-- end col -->
                <div class="col-sm-8">
                    <div class="text-right">
                        <ul class="pagination pagination-split mt-0 float-end">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">

                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-3.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Julie L. Arsenault</h4>
                                    <p class="text-muted">@Founder <span> | </span> <span> <a href="#"
                                                                                              class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-5.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Freddie J. Plourde</h4>
                                    <p class="text-muted">@Programmer <span> | </span> <span> <a href="#"
                                                                                                 class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Christopher Gallardo</h4>
                                    <p class="text-muted">@Webdesigner <span> | </span> <span> <a href="#"
                                                                                                  class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-4.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Joseph M. Rohr</h4>
                                    <p class="text-muted">@Webdesigner <span> | </span> <span> <a href="#"
                                                                                                  class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-6.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Mark K. Horne</h4>
                                    <p class="text-muted">@Director <span> | </span> <span> <a href="#"
                                                                                               class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-7.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">James M. Fonville</h4>
                                    <p class="text-muted">@Manager <span> | </span> <span> <a href="#"
                                                                                              class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-8.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Jade M. Walker</h4>
                                    <p class="text-muted">@Webdeveloper <span> | </span> <span> <a href="#"
                                                                                                   class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-9.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Mathias L. Lassen</h4>
                                    <p class="text-muted">@Webdesigner <span> | </span> <span> <a href="#"
                                                                                                  class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="dropdown float-end text-end">
                                <a href="#" class="dropdown-toggle card-drop drop-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <div><i class="mdi mdi-dots-horizontal h3 m-0 text-muted"></i></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">Block</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="member-card">
                                <div class="avatar-xl member-thumb mb-2 mx-auto">
                                    <img src="assets/images/users/avatar-10.jpg" class="rounded-circle img-thumbnail"
                                         alt="profile-image">
                                    <i class="mdi mdi-star-circle member-star text-success" title="verified user"></i>
                                </div>

                                <div class="">
                                    <h4 class="my-1 fw-semibold">Alfred M. Bach</h4>
                                    <p class="text-muted">@Manager <span> | </span> <span> <a href="#"
                                                                                              class="text-pink">websitename.com</a> </span>
                                    </p>
                                </div>

                                <p class="text-muted font-13">
                                    Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type.
                                </p>

                                <ul class="social-links list-inline mt-3">
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a title="" data-bs-placement="top" data-bs-toggle="tooltip" class="tooltips"
                                           href="" data-bs-title="Skype"><i class="fab fa-skype"></i></a>
                                    </li>
                                </ul>

                                <button type="button"
                                        class="btn btn-outline-primary mt-3 rounded-pill btn-bordered waves-effect width-lg waves-light">
                                    Follow
                                </button>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-2 mb-1">
                                                <h4 class="mb-1 fw-semibold">2563</h4>
                                                <p class="mb-0 text-muted">Lifetime total sales</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">6952</h4>
                                                <p class="mb-0 text-muted">Income amounts</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-2">
                                                <h4 class="mb-1 fw-semibold">1125</h4>
                                                <p class="mb-0 text-muted">Total visits</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Add Members</h4>
    <div class="custom-modal-text text-left">
        <form class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" placeholder="Enter position">
            </div>
            <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" placeholder="Enter company">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>

            <button type="submit" class="btn btn-secondary waves-effect waves-light ms-1">Save</button>
            <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
        </form>
    </div>
</div>

<?php include 'partials/customizer.php' ?>

<?php include 'partials/footer-scripts.php' ?>


<script src="assets/vendor/custombox/custombox.min.js"></script>


</body>

</html>