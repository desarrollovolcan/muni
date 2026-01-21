<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Reset Password";
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
                            <div class="text-center account-logo-box">
                                <div>
                                    <a href="index.php">
                                        <img src="assets/images/logo-dark.png" alt="" height="30">
                                    </a>
                                </div>
                            </div>
                            <div class="account-content mt-4">
                                <div class="text-center">
                                    <p class="text-muted mb-0 mb-3">Enter your email address and we'll send you an email
                                        with instructions to reset your password. </p>
                                </div>
                                <form class="form-horizontal" action="#">

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required=""
                                                   placeholder="john@deo.com">
                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-2">
                                        <div class="col-12">
                                            <button class="btn btn-md btn-block w-100 btn-primary waves-effect waves-light"
                                                    type="submit">Reset Password
                                            </button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                                <div class="row mt-4">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">Back to <a href="auth-login.php"
                                                                              class="text-dark ms-1"><b>Sign In</b></a>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end card-box-->
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