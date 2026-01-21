<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Cards";
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
            $subtitle = "Base UI";
            $title = "Cards";
            include "partials/page-title.php" ?>


            <div class="row">
                <div class="col-sm-6 col-lg-3">

                    <!-- Simple card -->
                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="header-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-sm-6 col-lg-3">

                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="header-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-sm-6 col-lg-3">

                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                        </div>
                    </div>

                </div><!-- end col -->


                <div class="col-sm-6 col-lg-3">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title">Card title</h5>
                            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                        </div>
                        <img class="img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make
                                up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>

                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="header-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="header-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-body">
                        <h5 class="header-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-body text-center">
                        <h5 class="header-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card card-body text-right">
                        <h5 class="header-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <h6 class="card-header">Featured</h6>
                        <div class="card-body">
                            <h5 class="header-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to
                                additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Quote
                        </div>
                        <div class="card-body">
                            <blockquote class="card-bodyquote">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer font-13">Someone famous in <cite title="Source Title">Source
                                        Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="header-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to
                                additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="header-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img class="card-img-bottom img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card text-white">
                        <img class="card-img img-fluid" src="assets/images/small/img-3.jpg" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="header-title text-white">Card title</h5>
                            <p class="card-text text-white-50">This is a wider card with supporting text below as a
                                natural lead-in to additional content. This content is a little bit
                                longer.</p>
                            <p class="card-text">
                                <small class="">Last updated 3 mins ago</small>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-12">
                    <h5 class="my-3">Horizontal Card</h5>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <img src="assets/images/small/img-5.jpg" class="card-img" alt="...">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body py-2">
                                            <h5 class="header-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text lead-in to
                                                additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-7">
                                        <div class="card-body py-2">
                                            <h5 class="header-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text lead-in to
                                                additional content.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <img src="assets/images/small/img-6.jpg" class="card-img" alt="...">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end row -->

            <h5 class="my-3">Background variants</h5>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-inverse text-white" style="background-color: #333; border-color: #333;">
                        <div class="card-body">
                            <h5 class="header-title text-white">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to
                                additional content.</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <blockquote class="card-bodyquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer text-white font-13">Someone famous in <cite
                                            title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <blockquote class="card-bodyquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer text-white font-13">Someone famous in <cite
                                            title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <blockquote class="card-bodyquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer text-white font-13">Someone famous in <cite
                                            title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <blockquote class="card-bodyquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer text-white font-13">Someone famous in <cite
                                            title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <blockquote class="card-bodyquote mb-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                    erat a ante.</p>
                                <footer class="blockquote-footer text-white font-13">Someone famous in <cite
                                            title="Source Title">Source Title</cite>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <h5 class="my-3">Groups</h5>
                    <div class="card-group">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="header-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a
                                    natural lead-in to additional content. This content is a little bit
                                    longer.</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="header-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural
                                    lead-in to additional content.</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg"
                                 alt="Card image cap">
                            <div class="card-body">
                                <h5 class="header-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a
                                    natural lead-in to additional content. This card has even longer content
                                    than the first to show that equal height action.</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="my-3">Decks</h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-1.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="header-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as
                                        a natural lead-in to additional content. This content is a little
                                        bit longer.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="header-title">Card title</h5>
                                    <p class="card-text">This card has supporting text below as a natural
                                        lead-in to additional content.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="header-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as
                                        a natural lead-in to additional content. This card has even longer
                                        content than the first to show that equal height action.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="my-3">Columns</h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="header-title">Card title that wraps to a new line</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a
                                        natural lead-in to additional content. This content is a little bit
                                        longer.</p>
                                </div>
                            </div>
                            <div class="card card-body">
                                <blockquote class="card-bodyquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                        erat a ante.</p>
                                    <footer class="blockquote-footer font-13">Someone famous in <cite
                                                title="Source Title">Source Title</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="header-title">Card title</h5>
                                    <p class="card-text">This card has supporting text below as a natural
                                        lead-in to additional content.</p>
                                    <p class="card-text">
                                        <small class="text-muted">Last updated 3 mins ago</small>
                                    </p>
                                </div>
                            </div>
                            <div class="card card-body">
                                <blockquote class="card-bodyquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                        erat.</p>
                                    <footer class="blockquote-footer font-13">Someone famous in <cite
                                                title="Source Title">Source Title</cite>
                                    </footer>
                                </blockquote>
                            </div>
                            <div class="card card-body text-center">
                                <h5 class="header-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to
                                    additional content.</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <img class="card-img img-fluid" src="assets/images/small/img-4.jpg"
                                     alt="Card image cap">
                            </div>
                            <div class="card card-body text-right">
                                <blockquote class="card-bodyquote mb-0">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                        erat a ante.</p>
                                    <footer class="blockquote-footer font-13">Someone famous in <cite
                                                title="Source Title">Source Title</cite>
                                    </footer>
                                </blockquote>
                            </div>
                            <div class="card card-body">
                                <h5 class="header-title">Card title</h5>

                                <p class="card-text">This is a wider card with supporting text below as a
                                    natural lead-in to additional content. This card has even longer content
                                    than the first to show that equal height action.</p>
                                <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row mt-4">
                <div class="col-12">
                    <h5 class="my-3">Navigation</h5>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header bg-light-subtle">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="header-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card text-center">
                                <div class="card-header  bg-light-subtle">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <h5 class="header-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
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