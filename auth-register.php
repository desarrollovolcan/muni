<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Sign Up";
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
                                <h5 class="text-uppercase mb-1 mt-4 fw-semibold">Register</h5>
                                <p class="mb-0">Get access to our admin panel</p>
                            </div>

                            <div class="account-content mt-4">
                                <form class="form-horizontal" action="#">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="username">Full Name</label>
                                            <input class="form-control" type="email" id="username" required=""
                                                   placeholder="Michael Zenaty">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required=""
                                                   placeholder="john@deo.com">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" required="" id="password"
                                                   placeholder="Enter your password">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-12">

                                            <div class="checkbox checkbox-success">
                                                <input id="remember" type="checkbox" checked="">
                                                <label for="remember">
                                                    I accept <a href="#">Terms and Conditions</a>
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block btn-primary waves-effect waves-light w-100"
                                                    type="submit">Sign Up Free
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
                                        <p class="text-muted">Already have an account? <a href="auth-login.php"
                                                                                          class="text-dark ms-1"><b>Sign
                                                    In</b></a></p>
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