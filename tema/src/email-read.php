<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Read Email";
    include "partials/title-meta.php" ?>

    <!-- Summernote css -->
    <link href="assets/vendor/summernote/summernote-bs4.min.css" rel="stylesheet"/>

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
            $subtitle = "Email";
            $title = "Read Email";
            include "partials/page-title.php" ?>

            <div class="row">

                <!-- Right Sidebar -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">

                                <a href="email-compose.php"
                                   class="btn btn-danger btn-block waves-effect waves-light w-100">Compose</a>

                                <div class="mail-list mt-3">
                                    <a href="#" class="list-group-item border-0 text-danger"><i
                                                class="mdi mdi-inbox font-18 align-middle me-2"></i>Inbox<span
                                                class="badge bg-danger float-end ms-2 mt-1">8</span></a>
                                    <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-star font-18 align-middle me-2"></i>Starred</a>
                                    <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-file-code font-18 align-middle me-2"></i>Draft<span
                                                class="badge bg-info float-end ms-2 mt-1">32</span></a>
                                    <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-send font-18 align-middle me-2"></i>Sent Mail</a>
                                    <a href="#" class="list-group-item border-0"><i
                                                class="mdi mdi-delete font-18 align-middle me-2"></i>Trash</a>
                                </div>

                                <h5 class="mt-3">Labels</h5>

                                <div class="list-group b-0 mt-3 mail-list">
                                    <a href="#" class="list-group-item border-0"><span
                                                class="fa fa-circle text-info me-2"></span>Web App</a>
                                    <a href="#" class="list-group-item border-0"><span
                                                class="fa fa-circle text-warning me-2"></span>Recharge</a>
                                    <a href="#" class="list-group-item border-0"><span
                                                class="fa fa-circle text-purple me-2"></span>Wallet Balance</a>
                                    <a href="#" class="list-group-item border-0"><span
                                                class="fa fa-circle text-pink me-2"></span>Friends</a>
                                    <a href="#" class="list-group-item border-0"><span
                                                class="fa fa-circle text-success me-2"></span>Family</a>
                                </div>

                            </div>
                            <!-- End Left sidebar -->
                            <div class="inbox-rightbar">

                                <div class="" role="toolbar">
                                    <div class="btn-group me-1">
                                        <button type="button" class="btn btn-sm btn-light waves-effect"><i
                                                    class="mdi mdi-archive font-18 vertical-middle"></i></button>
                                        <button type="button" class="btn btn-sm btn-light waves-effect"><i
                                                    class="mdi mdi-alert-octagon font-18 vertical-middle"></i></button>
                                        <button type="button" class="btn btn-sm btn-light waves-effect"><i
                                                    class="mdi mdi-delete-variant font-18 vertical-middle"></i></button>
                                    </div>
                                    <div class="btn-group me-1">
                                        <button type="button"
                                                class="btn btn-sm btn-light dropdown-toggle waves-effect drop-arrow-none"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-folder font-18 align-middle"></i>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Move to</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div>
                                    </div>
                                    <div class="btn-group me-1">
                                        <button type="button"
                                                class="btn btn-sm btn-light dropdown-toggle waves-effect drop-arrow-none"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-label font-18 align-middle"></i>
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">Label as:</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div>
                                    </div>

                                    <div class="btn-group me-1">
                                        <button type="button"
                                                class="btn btn-sm btn-light dropdown-toggle waves-effect drop-arrow-none"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal font-18 align-middle me-1"></i> More <i
                                                    class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <span class="dropdown-header">More Option :</span>
                                            <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Add Star</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <h4 class="fw-semibold">Hi Bro, How are you?</h4>

                                    <hr/>

                                    <div class="d-flex mb-4 mt-1">
                                        <img class="d-flex me-3 rounded-circle avatar-sm"
                                             src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="flex-grow-1">
                                            <span class="float-end">07:23 AM</span>
                                            <h5 class="m-0 fw-semibold">Jonathan Smith</h5>
                                            <small class="text-muted">From: jonathan@domain.com</small>
                                        </div>
                                    </div>

                                    <p><b>Hi Bro...</b></p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient
                                        montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                                        eu, pretium quis, sem.</p>
                                    <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                                        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,
                                        justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras
                                        dapibus. Vivamus elementum semper nisi.</p>
                                    <p>Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat
                                        vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat
                                        a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.
                                        Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper
                                        ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget
                                        condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed
                                        ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</p>

                                    <hr/>

                                    <h6><i class="fa fa-paperclip mb-2"></i> Attachments <span>(3)</span></h6>

                                    <div class="row">
                                        <div class="col-xl-2 col-md-4">
                                            <a href="#"> <img src="assets/images/attached-files/img-1.jpg"
                                                              alt="attachment" class="img-thumbnail img-fluid"> </a>
                                        </div>
                                        <div class="col-xl-2 col-md-4">
                                            <a href="#"> <img src="assets/images/attached-files/img-2.jpg"
                                                              alt="attachment" class="img-thumbnail img-fluid"> </a>
                                        </div>
                                        <div class="col-xl-2 col-md-4">
                                            <a href="#"> <img src="assets/images/attached-files/img-3.png"
                                                              alt="attachment" class="img-thumbnail img-fluid"> </a>
                                        </div>
                                    </div>
                                </div> <!-- card-box -->

                                <div class="d-flex mb-0 mt-5">
                                    <img class="d-flex me-3 rounded-circle avatar-sm"
                                         src="assets/images/users/avatar-7.jpg" alt="Generic placeholder image">
                                    <div class="media-body w-100">
                                        <div class="card reply-box">
                                            <div class="card-body p-4">
                                                <div class="summernote">
                                                    <h6 class="fw-semibold">This is an Air-mode editable area.</h6>
                                                    <ul>
                                                        <li>
                                                            Select a text to reveal the toolbar.
                                                        </li>
                                                        <li>
                                                            Edit rich document on-the-fly, so elastic!
                                                        </li>
                                                    </ul>
                                                    <p class="mb-0">
                                                        End of air-mode area
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="button"
                                            class="btn btn-primary rounded-pill waves-effect waves-light width-lg">Send
                                    </button>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div> <!-- end Col -->

            </div><!-- End row -->

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


<!--Summernote js-->
<script src="assets/vendor/summernote/summernote-bs4.min.js"></script>

<!-- Init js-->
<script src="assets/js/pages/email-read.js"></script>

</body>

</html>