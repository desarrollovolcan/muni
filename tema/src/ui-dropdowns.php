<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Dropdowns";
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
            $title = "Dropdowns";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <h5 class="header-title">Button elements</h5>
                                    <p class="card-subtitle">
                                        You can optionally use <code>&lt;button&gt;</code> elements in your dropdowns
                                        instead of <code>&lt;a&gt;</code>s.
                                    </p>
                                    <div class="pt-2">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle float-left drop-arrow-none"
                                                    type="button" id="dropdownMenu1" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Dropdown <i class="mdi mdi-chevron-down"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-example mt-2"
                                                 aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <h5 class="header-title">Menu headers</h5>
                                        <p class="card-subtitle">
                                            Add a header to label sections of actions in any dropdown menu.
                                        </p>
                                        <div class="pt-2">
                                            <ul class="dropdown-menu dropdown-example">
                                                <li>
                                                    <h6 class="dropdown-header">Dropdown header</h6>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <h5 class="header-title">Menu dividers</h5>
                                    <p class="card-subtitle">
                                        Separate groups of related menu items with a divider.
                                    </p>
                                    <div class="pt-2">
                                        <div class="dropdown-menu dropdown-example" aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <h5 class="header-title">Disabled menu items</h5>
                                        <p class="card-subtitle">
                                            Add <code>.disabled</code> to items in the dropdown to <strong>style them as
                                                disabled</strong>.
                                        </p>
                                        <div class="pt-2">
                                            <div class="dropdown-menu dropdown-example" aria-labelledby="dropdownMenu1">
                                                <a class="dropdown-item" href="#">Regular link</a>
                                                <a class="dropdown-item disabled" href="#">Disabled link</a>
                                                <a class="dropdown-item" href="#">Another link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Variant</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="btn-group me-1 mt-1">
                                <button type="button"
                                        class="btn btn-primary dropdown-toggle waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group me-1 mt-1">
                                <button type="button"
                                        class="btn btn-success dropdown-toggle waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group me-1 mt-1">
                                <button type="button"
                                        class="btn btn-warning dropdown-toggle waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group me-1 mt-1">
                                <button type="button"
                                        class="btn btn-danger dropdown-toggle waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Split button dropdowns</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="btn-group me-1 mt-1">
                                <button type="button" class="btn btn-purple waves-effect waves-light">Dropdown</button>
                                <button type="button"
                                        class="btn btn-purple dropdown-toggle dropdown-toggle-split waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group dropdown me-1">
                                <button type="button" class="btn btn-pink waves-effect waves-light">Dropdown</button>
                                <button type="button"
                                        class="btn btn-pink dropdown-toggle dropdown-toggle-split waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group me-1 mt-1">
                                <button type="button" class="btn btn-info waves-effect waves-light">Dropdown</button>
                                <button type="button"
                                        class="btn btn-info dropdown-toggle dropdown-toggle-split waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>

                            <div class="btn-group dropdown me-1">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Dropdown</button>
                                <button type="button"
                                        class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light drop-arrow-none"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Sizing</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="btn-group me-1 mt-1">
                                <button class="btn btn-primary btn-lg dropdown-toggle drop-arrow-none" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Large button <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <!-- Large button groups -->
                            <div class="btn-group me-1 mt-1">
                                <button class="btn btn-success btn-sm dropdown-toggle drop-arrow-none" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Large button <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Variation</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="btn-group dropdown me-1">
                                <button type="button"
                                        class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropdown
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group dropup me-1">
                                <button type="button"
                                        class="btn btn-purple dropdown-toggle waves-effect waves-light"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropup
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group dropstart me-1">
                                <button type="button"
                                        class="btn btn-success dropdown-toggle waves-effect waves-light"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropleft
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            <div class="btn-group dropend me-1">
                                <button type="button"
                                        class="btn btn-pink dropdown-toggle waves-effect waves-light"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dropright
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Dropdown menu text</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="dropdown-menu p-4 text-muted  dropdown-example" style="max-width: 240px;">
                                <p>
                                    Some example text that's free-flowing within the dropdown menu.
                                </p>
                                <p class="mb-0">
                                    And this is more example text.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Dropdown menu form</h5>
                        </div>
                        <div class="card-body pt-2">
                            <form class="dropdown-menu dropdown-example p-4 w-50" style="max-width: 40%;">
                                <div class="form-group mb-3">
                                    <label for="exampleDropdownFormEmail2">Email address</label>
                                    <input type="email" class="form-control" id="exampleDropdownFormEmail2"
                                           placeholder="email@example.com">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleDropdownFormPassword2">Password</label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword2"
                                           placeholder="Password">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div><!-- container -->


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