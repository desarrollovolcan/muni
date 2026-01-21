<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Form Validation";
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
            $title = "Form Validation";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Custom styles</h5>
                            <p class="card-subtitle">Custom feedback styles apply custom colors, borders,
                                focus styles, and background
                                icons to better communicate feedback. Background icons for
                                <code>&lt;select&gt;</code>s are only available with
                                <code>.form-select</code>, and not <code>.form-control</code>.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <form class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom01">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                           placeholder="First name" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                           placeholder="Last name" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustomUsername">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" id="validationCustomUsername"
                                               placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom03">City</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="City"
                                           required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom04">State</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="State"
                                           required>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="validationCustom05">Zip</label>
                                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip"
                                           required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="invalidCheck" required>
                                        <label class="form-check-label form-label" for="invalidCheck">Agree to terms
                                            and conditions</label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Tooltips</h5>
                            <p class="card-subtitle">If your form layout allows it, you can swap the
                                <code>.{valid|invalid}-feedback</code> classes for
                                <code>.{valid|invalid}-tooltip</code> classes to display validation feedback in
                                a styled tooltip. Be sure to have a parent with <code>position: relative</code>
                                on it for tooltip positioning. In the example below, our column classes have
                                this already, but your project may require an alternative setup.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <form class="needs-validation" novalidate>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip01">First name</label>
                                    <input type="text" class="form-control" id="validationTooltip01"
                                           placeholder="First name" value="Mark" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        Please enter first name.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip02">Last name</label>
                                    <input type="text" class="form-control" id="validationTooltip02"
                                           placeholder="Last name" value="Otto" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                    <div class="invalid-tooltip">
                                        Please enter last name.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltipUsername">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                        <input type="text" class="form-control" id="validationTooltipUsername"
                                               placeholder="Username"
                                               aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip03">City</label>
                                    <input type="text" class="form-control" id="validationTooltip03" placeholder="City"
                                           required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip04">State</label>
                                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State"
                                           required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="position-relative mb-3">
                                    <label class="form-label" for="validationTooltip05">Zip</label>
                                    <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip"
                                           required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Validation type</h5>
                            <p class="card-subtitle">
                                Parsley is a javascript form validation library. It helps you provide your users with
                                feedback on their form submission before sending it to your server.
                            </p>

                        </div>
                        <div class="card-body pt-2">
                            <form class="form-horizontal parsley-examples" action="#">
                                <div class="form-group">
                                    <label>Required</label>
                                    <input type="text" class="form-control" required placeholder="Type something"/>
                                </div>


                                <div class="form-group">
                                    <label>Equal To</label>
                                    <div>
                                        <input type="password" id="pass2" class="form-control" required
                                               placeholder="Password"/>
                                    </div>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" required
                                               data-parsley-equalto="#pass2" placeholder="Re-Type Password"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <div>
                                        <input type="email" class="form-control" required parsley-type="email"
                                               placeholder="Enter a valid e-mail"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>URL</label>
                                    <div>
                                        <input parsley-type="url" type="url" class="form-control" required
                                               placeholder="URL"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Digits</label>
                                    <div>
                                        <input data-parsley-type="digits" type="text" class="form-control" required
                                               placeholder="Enter only digits"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Number</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" class="form-control" required
                                               placeholder="Enter only numbers"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alphanumeric</label>
                                    <div>
                                        <input data-parsley-type="alphanum" type="text" class="form-control" required
                                               placeholder="Enter alphanumeric value"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Textarea</label>
                                    <div>
                                        <textarea required class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Range validation</h5>
                            <p class="card-subtitle">
                                Parsley is a javascript form validation library. It helps you provide your users with
                                feedback on their form submission before sending it to your server.
                            </p>

                        </div>
                        <div class="card-body pt-2">
                            <form action="#" class="parsley-examples">

                                <div class="form-group">
                                    <label>Min Length</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-minlength="6" placeholder="Min 6 chars."/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Max Length</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-maxlength="6" placeholder="Max 6 chars."/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Range Length</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-length="[5,10]"
                                               placeholder="Text between 5 - 10 chars length"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Min Value</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-min="6" placeholder="Min value is 6"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Max Value</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-max="6" placeholder="Max value is 6"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Range Value</label>
                                    <div>
                                        <input class="form-control" required type="text range" min="6"
                                               max="100" placeholder="Number between 6 - 100"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Regular Exp</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                               data-parsley-pattern="#[A-Fa-f0-9]{6}"
                                               placeholder="Hex. Color"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Min check</label>
                                    <div>
                                        <div class="checkbox checkbox-custom">
                                            <input id="checkbox1" type="checkbox"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label for="checkbox1"> And this </label>
                                        </div>
                                        <div class="checkbox checkbox-pink">
                                            <input id="checkbox2" type="checkbox"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label for="checkbox2"> Can't check this </label>
                                        </div>
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox3" type="checkbox"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2" required>
                                            <label for="checkbox3"> This too </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Max check</label>
                                    <div>
                                        <div class="checkbox checkbox-pink">
                                            <input id="checkbox4" type="checkbox"
                                                   data-parsley-multiple="group1">
                                            <label for="checkbox4"> And this </label>
                                        </div>
                                        <div class="checkbox checkbox-primary">
                                            <input id="checkbox5" type="checkbox"
                                                   data-parsley-multiple="group1">
                                            <label for="checkbox5"> Can't check this </label>
                                        </div>
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox6" type="checkbox"
                                                   data-parsley-multiple="group1"
                                                   data-parsley-maxcheck="1">
                                            <label for="checkbox6"> This too </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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


<!-- Plugin js-->
<script src="assets/vendor/parsleyjs/parsley.min.js"></script>

<!-- Validation init js-->
<script src="assets/js/pages/form-validation.js"></script>

</body>

</html>