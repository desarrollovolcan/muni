<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Modals";
    include "partials/title-meta.php" ?>

    <!-- Custom box css -->
    <link rel="stylesheet" href="assets/vendor/custombox/custombox.min.css">

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
            $subtitle = "Base UI";
            $title = "Modals";
            include "partials/page-title.php" ?>

            <!-- Bootstrap Modals -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-3">Bootstrap Modals (default)</h4>
                            <p class="card-subtitle">
                                A rendered modal with header, body, and set of actions in the footer.
                            </p>
                        </div>
                        <div class="card-body pt-2">
                            <!-- sample modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="font-16">Text in a modal</h5>
                                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                            <hr>
                                            <h5 class="font-16">Overflowing text to show scroll behavior</h5>
                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                                                dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                                                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
                                                auctor.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus
                                                magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor fringilla.</p>
                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                                                dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                                                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
                                                auctor.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus
                                                magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor fringilla.</p>
                                            <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                                                dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                                                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
                                                auctor.</p>
                                            <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus
                                                magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor fringilla.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save
                                                changes
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
                                 aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Extra large modal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!--  Modal content for the above example -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel">Small modal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                 aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myCenterModalLabel">Center modal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <div class="d-flex flex-wrap align-items-center gap-2">

                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal
                                    </button>
                                    <!-- Extra large modal -->
                                    <button class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                            data-bs-target=".bs-example-modal-xl">Extra Large modal
                                    </button>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-info waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Large modal
                                    </button>
                                    <!-- Small modal -->
                                    <button type="button" class="btn btn-purple waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">Small modal
                                    </button>
                                    <!-- Center modal -->
                                    <button type="button" class="btn btn-pink waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Center
                                        modal
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Custom Modals -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title mb-3">Modals Examples (Animations)</h4>
                            <p class="card-subtitle">Use <code>data-animation="xxx" data-plugin="custommodal"
                                    data-overlaySpeed="xxx" data-overlayColor="#xxx"</code>. </p>
                        </div>

                        <div class="card-body pt-2">
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200"
                                   data-overlayColor="#36404a">Fade in</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="slide" data-plugin="custommodal" data-overlaySpeed="200"
                                   data-overlayColor="#36404a">Slide</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="newspaper" data-plugin="custommodal" data-overlaySpeed="200"
                                   data-overlayColor="#36404a">Newspaper</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="fall" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Fall</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="sidefall" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Side Fall</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="blur" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Blur</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="flip" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Flip</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="sign" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Sign</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="superscaled" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Super Scaled</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="slit" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Slit</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="rotate" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Rotate</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="letmein" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Letmein</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="makeway" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Makeway</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="slip" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Slip</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="corner" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Corner</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="slidetogether" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Slide together</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="scale" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Scale</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="door" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Door</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="push" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Push</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="contentscale" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Content Scale</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="swell" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Swell</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="rotatedown" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Rotate Down</a>

                                <a href="#custom-modal" class="btn btn-primary waves-effect waves-light"
                                   data-animation="flash" data-plugin="custommodal" data-overlaySpeed="100"
                                   data-overlayColor="#36404a">Flash</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- End row -->

            <!-- Modal -->
            <div id="custom-modal" class="modal-demo">
                <div class="d-flex w-100 p-3 bg-primary align-items-center justify-content-between">
                    <h4 class="custom-modal-title">Modal title</h4>
                    <button type="button" class="btn-close btn-close-white" onclick="Custombox.modal.close();">
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="custom-modal-text text-muted">
                    To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine
                    told me what Occidental is. The European languages are members of the same family. Their separate
                    existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.
                </div>
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