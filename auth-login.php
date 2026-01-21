<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Log In";
    include "partials/title-meta.php" ?>

    <?php include 'partials/head-css.php' ?>
</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

<div class="home-btn d-none d-sm-block position-absolute top-0 end-0 m-3">
    <a href="index.php"><i class="fas fa-home h2 text-white"></i></a>
</div>

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mb-0">

                    <div class="card-body p-4">

                        <div class="account-box">
                            <div class="account-logo-box">
                                <div class="text-center">
                                    <a href="index.php">
                                        <img src="assets/images/logo-dark.png" alt="" height="30">
                                    </a>
                                </div>
                                <h5 class="text-uppercase mb-1 mt-4 fw-semibold">Sign In</h5>
                                <p class="mb-0">Login to your Admin account</p>
                            </div>

                            <div class="account-content mt-4">
                                <form class="form-horizontal" action="#">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required=""
                                                   placeholder="john@deo.com">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <a href="auth-recoverpw.php" class="text-muted float-end"><small>Forgot your
                                                    password?</small></a>
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" required="" id="password"
                                                   placeholder="Enter your password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">

                                            <div class="checkbox form-checkbox-success">
                                                <input id="remember" type="checkbox" checked="">
                                                <label for="remember">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light w-100"
                                                    type="submit">Sign In
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <button type="button"
                                                    class="btn me-1 btn-facebook waves-effect waves-light">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
                                            <button type="button"
                                                    class="btn me-1 btn-googleplus waves-effect waves-light">
                                                <i class="fab fa-google"></i>
                                            </button>
                                            <button type="button" class="btn me-1 btn-twitter waves-effect waves-light">
                                                <i class="fab fa-twitter"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 pt-2">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="auth-register.php"
                                                                                             class="text-dark ms-1"><b>Sign
                                                    Up</b></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<?php include 'partials/footer-scripts.php' ?>

</body>

</html>