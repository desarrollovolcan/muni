<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Timeline";
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
            $title = "Timeline";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="timeline" dir="ltr">
                                <article class="timeline-item alt">
                                    <div class="text-right">
                                        <div class="time-show first">
                                            <a href="#" class="btn btn-primary width-lg">Today</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item alt">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon bg-danger"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-danger">1 hour ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Dolorum provident rerum aut hic quasi placeat iure tempora laudantium
                                                    ipsa ad debitis unde? </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item ">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-success"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-success">2 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John
                                                        deon</a> provident rerum aut hic quasi placeat iure tempora
                                                    laudantium </p>

                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item alt">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon bg-primary"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-primary">10 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>3 new photo Uploaded on facebook fan page</p>
                                                <div class="album">
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-1.jpg">
                                                    </a>
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-2.jpg">
                                                    </a>
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-3.jpg">
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-purple"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-purple">14 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Outdoor visit at California State Route 85 with John Boltana &
                                                    Harry Piterson regarding to setup a new show room.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item alt">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-muted">19 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                    Lorem ipsum dolor sit amet consiquest dio</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-item alt">
                                    <div class="text-right">
                                        <div class="time-show">
                                            <a href="#" class="btn btn-primary width-lg">Yesterday</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-warning"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-warning">07 January 2016</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Montly Regular Medical check up at Greenland Hospital by the
                                                    doctor <span><a href="#"> Johm meon </a></span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item alt">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon bg-primary"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-primary">07 January 2016</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Download the new updates of Adminox admin dashboard</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-success"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-success">07 January 2016</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Jonatha Smith added new milestone <span><a class="blue" href="#">crishtian</a></span>
                                                    Lorem ipsum dolor sit amet consiquest dio</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item alt">
                                    <div class="text-right">
                                        <div class="time-show">
                                            <a href="#" class="btn btn-primary width-lg">Last Month</a>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-item alt">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow-alt"></span>
                                                <span class="timeline-icon"><i class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-muted">31 December 2015</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Download the new updates of Adminox admin dashboard</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-danger"><i
                                                            class="mdi mdi-circle"></i></span>
                                                <h4 class="fw-medium text-danger">16 Decembar 2015</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Jonatha Smith added new milestone <span><a href="#">prank</a></span>
                                                    Lorem ipsum dolor sit amet consiquest dio</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="timeline timeline-left">
                                <article class="timeline-item alt">
                                    <div class="text-left">
                                        <div class="time-show first text-start">
                                            <a href="#" class="btn btn-primary width-lg">Today</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon"><i
                                                            class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                <h4 class="">1 hour ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Dolorum provident rerum aut hic quasi placeat iure tempora laudantium
                                                    ipsa ad debitis unde? </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item ">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-success"><i
                                                            class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                <h4 class="text-success">2 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>consectetur adipisicing elit. Iusto, optio, dolorum <a href="#">John
                                                        deon</a> provident rerum aut hic quasi placeat iure tempora
                                                    laudantium </p>

                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-primary"><i
                                                            class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                <h4 class="text-primary">10 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>3 new photo Uploaded on facebook fan page</p>
                                                <div class="album">
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-1.jpg">
                                                    </a>
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-2.jpg">
                                                    </a>
                                                    <a href="#">
                                                        <img alt="" src="assets/images/small/img-3.jpg">
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon bg-purple"><i
                                                            class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                <h4 class="text-purple">14 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Outdoor visit at California State Route 85 with John Boltana &
                                                    Harry Piterson regarding to setup a new show room.</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="timeline-item">
                                    <div class="timeline-desk">
                                        <div class="panel">
                                            <div class="timeline-box">
                                                <span class="arrow"></span>
                                                <span class="timeline-icon"><i
                                                            class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                                <h4 class="text-muted">19 hours ago</h4>
                                                <p class="timeline-date text-muted"><small>08:25 am</small></p>
                                                <p>Jonatha Smith added new milestone <span><a href="#">Pathek</a></span>
                                                    Lorem ipsum dolor sit amet consiquest dio</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>

                            </div> <!-- end timeline -->
                        </div>
                    </div> <!-- end card-box -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>

        <?php include 'partials/footer.php' ?>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include 'partials/customizer.php' ?>

    <?php include 'partials/footer-scripts.php' ?>

</body>

</html>