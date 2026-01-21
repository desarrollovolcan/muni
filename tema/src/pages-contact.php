<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Contact Us";
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
            $title = "Contact Us";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="contact-map">
                                        <iframe src="https://www.google.com/maps/embed/v1/place?q=New+York+University&key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4"
                                                style="width: 100%; height: 360px; border:0; margin: 0; overflow:hidden;"></iframe>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mt-4 mb-3">
                                <div class="col-md-10">
                                    <div class="row mb-4">
                                        <div class="col-sm-12">
                                            <h4 class="title fw-semibold">Send us a Message</h4>
                                            <p class="text-muted sub-title">The clean and well commented code allows
                                                easy customization of the theme.It's <br> designed for describing your
                                                app, agency or business.</p>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <!-- Contact form -->
                                        <div class="col-sm-6">
                                            <form name="ajax-form" action="#" method="post" class="contact-form"
                                                  data-parsley-validate="" novalidate="">

                                                <div class="form-group">
                                                    <input class="form-control" id="name2" name="name"
                                                           placeholder="Your name" type="text" value="" required="">
                                                </div>
                                                <!-- /Form-name -->

                                                <div class="form-group">
                                                    <input class="form-control" id="email2" name="email" type="email"
                                                           placeholder="Your email" value="" required="">
                                                </div>
                                                <!-- /Form-email -->

                                                <div class="form-group">
                                                    <textarea class="form-control" id="message2" name="message" rows="5"
                                                              placeholder="Message" required=""></textarea>
                                                </div>
                                                <!-- /Form Msg -->

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="">
                                                            <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light"
                                                                    id="send">Submit
                                                            </button>
                                                        </div>
                                                    </div> <!-- /col -->
                                                </div> <!-- /row -->

                                            </form> <!-- /form -->
                                        </div> <!-- end col -->

                                        <div class="col-sm-4 offset-sm-1">
                                            <div class="contact-box">

                                                <div class="contact-detail mb-4">
                                                    <i class="mdi mdi-tooltip-account float-start font-20 me-2"></i>
                                                    <address class="overflow-hidden">
                                                        795 Folsom Ave, Suite 600<br>
                                                        San Francisco, CA 94107
                                                    </address>
                                                </div>

                                                <div class="contact-detail mb-4">
                                                    <i class=" mdi mdi-cellphone float-start font-20 me-2"></i>
                                                    <p class="overflow-hidden pt-1">
                                                        (120) 456-789-123
                                                    </p>
                                                </div>

                                                <div class="contact-detail">
                                                    <i class="mdi mdi-email float-start font-20 me-2"></i>
                                                    <p class="overflow-hidden pt-1">
                                                        <a href="" class="fw-medium">support@yourmail.com</a>
                                                    </p>
                                                </div>

                                            </div>
                                        </div> <!-- end col -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
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