<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "FAQ";
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
            $title = "FAQ";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mt-3">
                                        <h3 class="fw-semibold">Frequently Asked Questions</h3>
                                        <p class="text-muted mt-3 mb-2"> Nisi praesentium similique totam odio
                                            obcaecati, reprehenderit,
                                            dignissimos rem temporibus ea inventore alias!<br> Beatae animi nemo ea
                                            tempora, temporibus laborum facilis ut!</p>

                                        <button type="button"
                                                class="btn btn-primary waves-effect waves-light mt-2 me-1">Email us your
                                            question
                                        </button>
                                        <button type="button" class="btn btn-info waves-effect waves-light mt-2">Send us
                                            a tweet
                                        </button>

                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->


                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/shield-1.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">What is Lorem Ipsum?</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->

                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/envelope.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">Is safe use Lorem Ipsum?</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->

                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/edit.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">Why use Lorem Ipsum?</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/files.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">When can be used?</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->

                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/open-book-1.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">How many variations exist?</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->

                                <div class="col-lg-4">
                                    <div class="faq-box text-center p-4">
                                        <img src="assets/images/faq_icons/tag.png" alt="icon"
                                             class="img-fluid avatar-md">
                                        <h4 class="mt-4 fw-semibold">License &amp; Copyright</h4>
                                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                            the 1500s.</p>
                                    </div>
                                </div>
                                <!--/col-sm-4 -->
                            </div>
                            <!-- end row -->

                            <p class="text-end mb-0"><small><i>Icon used by <a
                                                href="http://www.flaticon.com/packs/user-interface-7" target="_blank">flaticon</a>
                                    </i></small></p>
                        </div>

                    </div>
                </div><!-- end col -->
            </div>

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