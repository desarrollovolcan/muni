<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Profile";
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
            $subtitle = "Pages";
            $title = "Profile";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="profile-bg-picture" style="background-image:url('assets/images/bg-profile.jpg')">
                        <span class="picture-bg-overlay"></span><!-- overlay -->
                    </div>
                    <!-- meta -->
                    <div class="profile-user-box">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="float-start me-3"><img src="assets/images/users/avatar-1.jpg" alt=""
                                                                    class="avatar-xl rounded-circle"></span>
                                <div class="media-body">
                                    <h4 class="mt-1 mb-1 font-18 ellipsis">Michael A. Franklin</h4>
                                    <p class="font-13"> User Experience Specialist</p>
                                    <p class="text-muted mb-0"><small>California, United States</small></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-end">
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        <i class="mdi mdi-account-settings-variant me-1"></i> Edit Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-4">
                    <!-- Personal-Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-4">Personal Information</h4>
                            <div class="panel-body">
                                <p class="text-muted font-13">
                                    Hye, I’m Johnathan Doe residing in this beautiful world. I create websites and
                                    mobile apps with great UX and UI design. I have done work with big companies like
                                    Nokia, Google and Yahoo. Meet me or Contact me for any queries. One Extra line for
                                    filling space. Fill as many you want.
                                </p>

                                <hr/>

                                <div class="text-left">
                                    <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-3">Johnathan Deo</span>
                                    </p>

                                    <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-3">(+12) 123 1234 567</span>
                                    </p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span class="ms-3">coderthemes@gmail.com</span>
                                    </p>

                                    <p class="text-muted font-13"><strong>Location :</strong> <span
                                                class="ms-3">USA</span></p>

                                    <p class="text-muted font-13"><strong>Languages :</strong>
                                        <span class="ms-1">
                                                <span class="flag-icon flag-icon-us me-1 mt-0" title="us"></span>
                                                <span>English</span>
                                            </span>
                                        <span class="ms-1">
                                                <span class="flag-icon flag-icon-de me-1" title="de"></span>
                                                <span>German</span>
                                            </span>
                                        <span class="ms-1">
                                                <span class="flag-icon flag-icon-es me-1" title="es"></span>
                                                <span>Spanish</span>
                                            </span>
                                        <span class="ms-1">
                                                <span class="flag-icon flag-icon-fr me-1" title="fr"></span>
                                                <span>French</span>
                                            </span>
                                    </p>

                                </div>

                                <ul class="social-links list-inline mt-4 mb-0">
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
                            </div>
                        </div>
                    </div>
                    <!-- Personal-Information -->

                    <div class="card ribbon-box">
                        <div class="card-body">
                            <div class="ribbon ribbon-primary">Messages</div>
                            <div class="clearfix"></div>
                            <div class="inbox-widget">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Tomaslau</p>
                                    <p class="inbox-item-text">I've finished it! See you so...</p>
                                    <p class="inbox-item-date mt-2">
                                        <button type="button" class="btn btn-sm waves-effect waves-light btn-success">
                                            Reply
                                        </button>
                                    </p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Stillnotdavid</p>
                                    <p class="inbox-item-text">This theme is awesome!</p>
                                    <p class="inbox-item-date mt-2">
                                        <button type="button" class="btn btn-sm waves-effect waves-light btn-success">
                                            Reply
                                        </button>
                                    </p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Kurafire</p>
                                    <p class="inbox-item-text">Nice to meet you</p>
                                    <p class="inbox-item-date mt-2">
                                        <button type="button" class="btn btn-sm waves-effect waves-light btn-success">
                                            Reply
                                        </button>
                                    </p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Shahedk</p>
                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                    <p class="inbox-item-date mt-2">
                                        <button type="button" class="btn btn-sm waves-effect waves-light btn-success">
                                            Reply
                                        </button>
                                    </p>
                                </div>
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Adhamdannaway</p>
                                    <p class="inbox-item-text">This theme is awesome!</p>
                                    <p class="inbox-item-date mt-2">
                                        <button type="button" class="btn btn-sm waves-effect waves-light btn-success">
                                            Reply
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xl-8">

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card widget-box-four">
                                <div class="card-body">
                                    <div id="dashboard-1" class="widget-box-four-chart"></div>
                                    <div class="float-start">
                                        <h4 class="mt-0 font-16 mb-1 text-overflow fw-semibold" title="Total Revenue">
                                            Total Revenue</h4>
                                        <p class="fs-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="mb-0 mt-4 fw-semibold"><span>$</span> <span data-plugin="counterup">1,28,5960</span>
                                        </h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-lg-4">
                            <div class="card widget-box-four">
                                <div class="card-body">
                                    <div id="dashboard-2" class="widget-box-four-chart"></div>
                                    <div class="float-start">
                                        <h4 class="mt-0 font-16 mb-1 text-overflow fw-semibold"
                                            title="Total Unique Visitors">Total Unique Visitors</h4>
                                        <p class="fs-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="mb-0 mt-4 fw-semibold"><span>$</span> <span data-plugin="counterup">1,28,5960</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-lg-4">
                            <div class="card widget-box-four">
                                <div class="card-body">
                                    <div id="dashboard-3" class="widget-box-four-chart"></div>
                                    <div class="float-start">
                                        <h4 class="mt-0 font-16 mb-1 text-overflow fw-semibold"
                                            title="Number of Transactions">Number of Transactions</h4>
                                        <p class="fs-secondary text-muted">Jan - Apr 2017</p>
                                        <h3 class="mb-0 mt-4 fw-semibold"><span>$</span> <span data-plugin="counterup">1,28,5960</span>
                                        </h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><!-- end col -->

                    </div>
                    <!-- end row -->


                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title mb-0">Experience</h4>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <h5 class="text-custom mb-1 fw-semibold">Lead designer / Developer</h5>
                                <p class="mb-0">websitename.com</p>
                                <p><b>2010-2015</b></p>

                                <p class="text-muted font-13 mb-0">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book.
                                </p>
                            </div>

                            <hr>

                            <div class="">
                                <h5 class="text-custom mb-1 fw-semibold">Senior Graphic Designer</h5>
                                <p class="mb-0">coderthemes.com</p>
                                <p><b>2007-2009</b></p>

                                <p class="text-muted font-13 mb-0">Lorem Ipsum is simply dummy text
                                    of the printing and typesetting industry. Lorem Ipsum has
                                    been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and
                                    scrambled it to make a type specimen book.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                        <th>Assign</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adminox Admin</td>
                                        <td>01/01/2015</td>
                                        <td>07/05/2015</td>
                                        <td><span class="badge bg-info">Work in Progress</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Adminox Frontend</td>
                                        <td>01/01/2015</td>
                                        <td>07/05/2015</td>
                                        <td><span class="badge bg-success">Pending</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Adminox Admin</td>
                                        <td>01/01/2015</td>
                                        <td>07/05/2015</td>
                                        <td><span class="badge bg-pink">Done</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Adminox Frontend</td>
                                        <td>01/01/2015</td>
                                        <td>07/05/2015</td>
                                        <td><span class="badge bg-purple">Work in Progress</span></td>
                                        <td>Coderthemes</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Adminox Admin</td>
                                        <td>01/01/2015</td>
                                        <td>07/05/2015</td>
                                        <td><span class="badge bg-warning">Coming soon</span></td>
                                        <td>Coderthemes</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

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


<!-- Sparkline charts -->
<script src="assets/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>

<script src="assets/js/pages/profile.js"></script>


</body>

</html>