<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Search Result";
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
            $title = "Search Result";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="sitemap sitemap-icon" dir="ltr">
                                        <li><a href=""><h4 class="m-0 font-18 fw-semibold">Adminox</h4></a>
                                            <ul>
                                                <li><a href=""><i class="mdi mdi-checkbox-blank-circle"></i> About</a>
                                                    <ul>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Business</a></li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Philosophy</a>
                                                        </li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Staff</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href=""><i class="mdi mdi-checkbox-blank-circle"></i> Works</a>
                                                    <ul>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> 2016</a>
                                                            <ul>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Company</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Service</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> 2015</a>
                                                            <ul>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Company</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Service</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> 2014</a>
                                                            <ul>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Company</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Service</a></li>
                                                                <li><a href=""><i
                                                                                class="mdi mdi-image-filter-tilt-shift"></i>
                                                                        Contest</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href=""><i class="mdi mdi-checkbox-blank-circle"></i> Contact</a>
                                                </li>
                                                <li><a href=""><i class="mdi mdi-checkbox-blank-circle"></i> Sitemap</a>
                                                </li>
                                                <li><a href=""><i class="mdi mdi-checkbox-blank-circle"></i> Recruit</a>
                                                    <ul>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Web Director</a>
                                                        </li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Web Designer</a>
                                                        </li>
                                                        <li><a href=""><i class="mdi mdi-adjust"></i> Web Engineer</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-sm-4">
                                    <ul class="sitemap" dir="ltr">
                                        <li><a href=""><h4 class="m-0 font-18 fw-semibold">Adminox</h4></a>
                                            <ul>
                                                <li><a href=""><b>About</b></a>
                                                    <ul>
                                                        <li><a href="">Business</a>

                                                        </li>

                                                        <li><a href="">Philosophy</a></li>
                                                        <li><a href="">Staff</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href=""><b>Works</b></a>
                                                    <ul>
                                                        <li><a href="">2015</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="">2014</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="">2013</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href=""><b>Contact</b></a></li>
                                                <li><a href=""><b>Sitemap</b></a></li>
                                                <li><a href=""><b>Recruit</b></a>
                                                    <ul>
                                                        <li><a href="">Web Director</a></li>
                                                        <li><a href="">Web Designer</a></li>
                                                        <li><a href="">Web Engineer</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-sm-4">
                                    <ul class="sitemap" dir="ltr">
                                        <li><a href=""><h4 class="font-18 text-warning fw-semibold m-0">Adminox</h4></a>
                                            <ul>
                                                <li><a href="" class="text-uppercase text-primary"><b>About</b></a>
                                                    <ul>
                                                        <li><a href="">Business</a>

                                                        </li>

                                                        <li><a href="">Philosophy</a></li>
                                                        <li><a href="">Staff</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="" class="text-uppercase text-primary"><b>Works</b></a>
                                                    <ul>
                                                        <li><a href="" class="text-success">2015</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="" class="text-success">2014</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="" class="text-success">2013</a>
                                                            <ul>
                                                                <li><a href="">Company</a></li>
                                                                <li><a href="">Service</a></li>
                                                                <li><a href="">Contest</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="" class="text-uppercase text-primary"><b>Contact</b></a>
                                                </li>
                                                <li><a href="" class="text-uppercase text-primary"><b>Sitemap</b></a>
                                                </li>
                                                <li><a href="" class="text-uppercase text-primary"><b>Recruit</b></a>
                                                    <ul>
                                                        <li><a href="">Web Director</a></li>
                                                        <li><a href="">Web Designer</a></li>
                                                        <li><a href="">Web Engineer</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
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