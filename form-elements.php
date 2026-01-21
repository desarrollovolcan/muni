<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Form Elements";
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
            $subtitle = "Forms";
            $title = "Form Elements";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Input Types</h5>
                        </div>

                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-xl-6">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                   placeholder="Enter email">
                                            <small class="text-muted">We'll never share your email with anyone
                                                else.
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                   placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Example select</label>
                                            <select class="form-control" id="exampleSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect2">Example multiple select</label>
                                            <select multiple class="form-control" id="exampleSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">Example textarea</label>
                                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Example Readonly</label>
                                            <input class="form-control" type="text" placeholder="Readonly input here…"
                                                   readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div><!-- end col -->

                                <div class="col-xl-6">
                                    <form>
                                        <fieldset disabled>
                                            <div class="form-group">
                                                <label for="disabledTextInput">Disabled input</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                       placeholder="Disabled input">
                                            </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Disabled select menu</label>
                                                <select id="disabledSelect" class="form-control">
                                                    <option>Disabled select</option>
                                                </select>
                                            </div>
                                        </fieldset>

                                        <div>
                                            <label>Example Control sizing</label>
                                            <input class="form-control form-control-lg mb-3" type="text"
                                                   placeholder=".form-control-lg">
                                            <input class="form-control mb-3" type="text" placeholder="Default input">
                                            <input class="form-control form-control-sm mb-3" type="text"
                                                   placeholder=".form-control-sm">

                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="text" class="form-control mb-3" placeholder=".col-2">
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" class="form-control mb-3" placeholder=".col-3">
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" class="form-control mb-3" placeholder=".col-4">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label>Select menu</label>

                                            <select class="form-select mb-3">
                                                <option selected>Open this select menu</option>
                                                <option value="1" selected>One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>

                                            <label> <i class="fa fa-star"></i> Checkboxes and Radios</label>

                                            <div class="mt-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Check this
                                                        custom checkbox</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck2" checked>
                                                    <label class="custom-control-label" for="customCheck2">Check this
                                                        custom checkbox</label>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                           class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Toggle this
                                                        custom radio</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio"
                                                           class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="customRadio2">Or toggle
                                                        this other custom radio</label>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div><!-- end col -->

                            </div><!-- end row -->
                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Textual inputs</h5>
                        </div>

                        <div class="card-body pt-2">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-2 col-form-label">Text</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" value="Artisanal kale"
                                           id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-lg-2 col-form-label">Search</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="search" value="How do I shoot web"
                                           id="example-search-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-lg-2 col-form-label">Email</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="email" value="bootstrap@example.com"
                                           id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-lg-2 col-form-label">URL</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="url" value="https://getbootstrap.com"
                                           id="example-url-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-lg-2 col-form-label">Telephone</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="tel" value="1-(555)-555-5555"
                                           id="example-tel-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-lg-2 col-form-label">Password</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="password" value="hunter2"
                                           id="example-password-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-lg-2 col-form-label">Number</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="number" value="42" id="example-number-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-datetime-local-input" class="col-lg-2 col-form-label">Date and
                                    time</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                                           id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-lg-2 col-form-label">Date</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-month-input" class="col-lg-2 col-form-label">Month</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-week-input" class="col-lg-2 col-form-label">Week</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-time-input" class="col-lg-2 col-form-label">Time</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-color-input" class="col-lg-2 col-form-label">Color</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="color" value="#64b0f2" id="example-color-input">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <label class="col-lg-2 col-form-label" for="example-range">Range</label>
                                <div class="col-lg-10">
                                    <input class="form-range mt-2" id="example-range" type="range" name="range" min="0"
                                           max="10">
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Inline forms</h5>
                        </div>
                        <div class="card-body pt-2">
                            <h6 class="mb-3">Visible labels</h6>
                            <form class="row gy-2 gx-3 align-items-center">
                                <div class="col-auto">
                                    <label class="visually-hidden" for="autoSizingInput">Name</label>
                                    <input type="text" class="form-control" id="autoSizingInput" placeholder="Jane Doe">
                                </div>
                                <div class="col-auto">
                                    <label class="visually-hidden" for="autoSizingInputGroup">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-text">@</div>
                                        <input type="text" class="form-control" id="autoSizingInputGroup"
                                               placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                        <label class="form-check-label" for="autoSizingCheck">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <div class="my-4">
                                <form class="row gy-2 gx-3 align-items-center">
                                    <div class="col-auto">
                                        <label class=" mb-0" for="autoSizingSelect">Preference</label>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" id="autoSizingSelect">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                            <label class="form-check-label mb-0" for="autoSizingCheck2">
                                                Remember my preference
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-3">
                                <h6 class="mb-3">Hidden labels</h6>
                                <form class="row gy-2 gx-3 align-items-center">
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                    <div class="col-auto">
                                        <label class="visually-hidden" for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Password">
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck3">
                                            <label class="form-check-label mb-0" for="autoSizingCheck3">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Using the Grid</h5>
                        </div>

                        <div class="card-body pt-2">
                            <form>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3">
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                   id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Option one is this and that—be sure to include why it's great
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                   id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Option two can be something else and selecting it will deselect option
                                                one
                                            </label>
                                        </div>
                                        <div class="form-check disabled">
                                            <input class="form-check-input" type="radio" name="gridRadios"
                                                   id="gridRadios3" value="option3" disabled>
                                            <label class="form-check-label" for="gridRadios3">
                                                Option three is disabled
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">Checkbox</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label mb-0" for="gridCheck1">
                                                Check me out
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
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