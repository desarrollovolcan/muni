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
                <div class="col-lg-12">
                    <div class="search-result-box card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="pt-3 pb-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="Admin Dashboard">
                                            <div class="input-group-append">
                                                <button type="button" class="btn waves-effect waves-light btn-primary">
                                                    <i class="fa fa-search me-1"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h4 class="fw-semibold">Search Results For "Admin Dashboard"</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <ul class="nav nav-tabs nav-bordered">
                                <li class="nav-item">
                                    <a href="#home" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                        All results <span class="badge bg-success ms-1">325</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#users" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        Users <span class="badge bg-danger ms-1">89</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Zircos - Responsive Admin
                                                        Template</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://coderthemes.com/zircos/index.php
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    Dolor posuere proin blandit accumsan senectus netus nullam curae,
                                                    ornare laoreet adipiscing luctus mauris adipiscing pretium eget
                                                    fermentum, tristique lobortis est ut metus lobortis tortor tincidunt
                                                    himenaeos habitant quis dictumst proin odio sagittis purus mi, nec
                                                    taciti vestibulum quis in sit varius lorem sit metus mi.
                                                </p>
                                            </div>

                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Adminox - Responsive Bootstrap
                                                        4 Web App Kit</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://themeforest.net/user/coderthemes/portfolio?ref=coderthemes
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    Dolor posuere proin blandit accumsan senectus netus nullam curae,
                                                    ornare laoreet adipiscing luctus mauris adipiscing pretium eget
                                                    fermentum, tristique lobortis est ut metus lobortis tortor tincidunt
                                                    himenaeos habitant quis dictumst proin odio sagittis purus mi, nec
                                                    taciti vestibulum quis in sit varius lorem sit metus mi.
                                                </p>
                                            </div>

                                            <div class="search-item">
                                                <div class="d-flex gap-3">
                                                    <img class="d-flex me-3 rounded-circle"
                                                         src="assets/images/users/avatar-1.jpg"
                                                         alt="Generic placeholder image" height="54">
                                                    <div class="media-body">
                                                        <h5 class="media-heading mt-0">
                                                            <a href="#" class="text-dark">Chadengle</a>
                                                        </h5>
                                                        <p class="font-13">
                                                            <b>Email:</b>
                                                            <span><a href="#"
                                                                     class="text-muted">mediaheader@mail.com</a></span>
                                                        </p>
                                                        <p class="mb-0 font-13">
                                                            <b>Bio:</b>
                                                            <br/>
                                                            <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Zircos - Responsive Admin
                                                        Template</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://coderthemes.com/zircos/index.php
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    Dolor posuere proin blandit accumsan senectus netus nullam curae,
                                                    ornare laoreet adipiscing luctus mauris adipiscing pretium eget
                                                    fermentum, tristique lobortis est ut metus lobortis tortor tincidunt
                                                    himenaeos habitant quis dictumst proin odio sagittis purus mi, nec
                                                    taciti vestibulum quis in sit varius lorem sit metus mi.
                                                </p>
                                            </div>

                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Adminox - Responsive Bootstrap
                                                        4 Web App Kit</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://themeforest.net/user/coderthemes/portfolio?ref=coderthemes
                                                </div>

                                                <div class="">
                                                    <img src="assets/images/small/img-1.jpg" height="48" alt="image"/>
                                                    <img src="assets/images/small/img-2.jpg" height="48" alt="image"/>
                                                    <img src="assets/images/small/img-3.jpg" height="48" alt="image"/>
                                                    <img src="assets/images/small/img-4.jpg" height="48" alt="image"/>
                                                </div>
                                            </div>

                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Zircos - Responsive Admin
                                                        Template</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://coderthemes.com/zircos/index.php
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    Dolor posuere proin blandit accumsan senectus netus nullam curae,
                                                    ornare laoreet adipiscing luctus mauris adipiscing pretium eget
                                                    fermentum, tristique lobortis est ut metus lobortis tortor tincidunt
                                                    himenaeos habitant quis dictumst proin odio sagittis purus mi, nec
                                                    taciti vestibulum quis in sit varius lorem sit metus mi.
                                                </p>
                                            </div>

                                            <div class="search-item">
                                                <h5 class="mb-1 fw-semibold"><a href="#">Adminox - Responsive Bootstrap
                                                        4 Web App Kit</a></h5>
                                                <div class="font-13 text-success mb-3">
                                                    http://themeforest.net/user/coderthemes/portfolio?ref=coderthemes
                                                </div>
                                                <p class="mb-0 text-muted">
                                                    Dolor posuere proin blandit accumsan senectus netus nullam curae,
                                                    ornare laoreet adipiscing luctus mauris adipiscing pretium eget
                                                    fermentum, tristique lobortis est ut metus lobortis tortor tincidunt
                                                    himenaeos habitant quis dictumst proin odio sagittis purus mi, nec
                                                    taciti vestibulum quis in sit varius lorem sit metus mi.
                                                </p>
                                            </div>


                                            <ul class="pagination justify-content-end pagination-split mt-0 mb-0">
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

                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end All results tab -->
                                <!-- Users tab -->
                                <div class="tab-pane" id="users">
                                    <div class="search-item">
                                        <div class="d-flex gap-3 mt-1">
                                            <img class="d-flex me-3 rounded-circle"
                                                 src="assets/images/users/avatar-1.jpg" alt="Generic placeholder image"
                                                 height="54">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">
                                                    <a href="#" class="text-dark">Chadengle</a>
                                                </h5>
                                                <p class="font-13">
                                                    <b>Email:</b>
                                                    <span><a href="#" class="text-muted">mediaheader@mail.com</a></span>
                                                </p>
                                                <p class="mb-0 font-13">
                                                    <b>Bio:</b>
                                                    <br/>
                                                    <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="search-item">
                                        <div class="d-flex gap-3">
                                            <img class="d-flex me-3 rounded-circle"
                                                 src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image"
                                                 height="54">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">
                                                    <a href="#" class="text-dark">Chadengle</a>
                                                </h5>
                                                <p class="font-13">
                                                    <b>Email:</b>
                                                    <span><a href="#" class="text-muted">mediaheader@mail.com</a></span>
                                                </p>
                                                <p class="mb-0 font-13">
                                                    <b>Bio:</b>
                                                    <br/>
                                                    <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="search-item">
                                        <div class="d-flex gap-3">
                                            <img class="d-flex me-3 rounded-circle"
                                                 src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image"
                                                 height="54">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">
                                                    <a href="#" class="text-dark">Chadengle</a>
                                                </h5>
                                                <p class="font-13">
                                                    <b>Email:</b>
                                                    <span><a href="#" class="text-muted">mediaheader@mail.com</a></span>
                                                </p>
                                                <p class="mb-0 font-13">
                                                    <b>Bio:</b>
                                                    <br/>
                                                    <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="search-item">
                                        <div class="d-flex gap-3">
                                            <img class="d-flex me-3 rounded-circle"
                                                 src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image"
                                                 height="54">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">
                                                    <a href="#" class="text-dark">Chadengle</a>
                                                </h5>
                                                <p class="font-13">
                                                    <b>Email:</b>
                                                    <span><a href="#" class="text-muted">mediaheader@mail.com</a></span>
                                                </p>
                                                <p class="mb-0 font-13">
                                                    <b>Bio:</b>
                                                    <br/>
                                                    <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search-item">
                                        <div class="d-flex gap-3">
                                            <img class="d-flex me-3 rounded-circle"
                                                 src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image"
                                                 height="54">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0">
                                                    <a href="#" class="text-dark">Chadengle</a>
                                                </h5>
                                                <p class="font-13">
                                                    <b>Email:</b>
                                                    <span><a href="#" class="text-muted">mediaheader@mail.com</a></span>
                                                </p>
                                                <p class="mb-0 font-13">
                                                    <b>Bio:</b>
                                                    <br/>
                                                    <span class="text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="pagination justify-content-end pagination-split mt-0 mb-0">
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


                                    <div class="clearfix"></div>


                                </div>
                                <!-- end Users tab -->

                            </div>
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