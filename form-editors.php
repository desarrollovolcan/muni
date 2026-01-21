<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Editors";
    include "partials/title-meta.php" ?>

    <!-- Quill css -->
    <link href="assets/vendor/quill/quill.core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" type="text/css"/>
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" type="text/css"/>

    <link href="assets/vendor/x-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"
          type="text/css"/>


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
            $title = "Editors";
            include "partials/page-title.php" ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="header-title">Quill Editor</h5>
                    <p class="card-subtitle">Snow is a clean, flat toolbar theme.</p>
                </div>

                <div class="card-body pt-2">

                    <div id="snow-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>
                    </div><!-- end Snow-editor-->
                </div>
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h5 class="header-title">Bubble Editor</h5>
                    <p class="card-subtitle">Bubble is a simple tooltip based theme.</p>
                </div>

                <div class="card-body pt-2">

                    <div id="bubble-editor" style="height: 300px;">
                        <h3><span class="ql-size-large">Hello World!</span></h3>
                        <p><br></p>
                        <h3>This is an simple editable area.</h3>
                        <p><br></p>
                        <ul>
                            <li>
                                Select a text to reveal the toolbar.
                            </li>
                            <li>
                                Edit rich document on-the-fly, so elastic!
                            </li>
                        </ul>
                        <p><br></p>
                        <p>
                            End of simple area
                        </p>
                    </div> <!-- end Snow-editor-->
                </div>
            </div> <!-- end card-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Inline Editor</h5>
                        </div>
                        <div class="card-body pt-2">
                            <div class="table-responsive">
                                <table class="table table-centered table-borderless table-striped mb-0">
                                    <tbody>
                                    <tr>
                                        <td style="width: 35%;">Simple text field</td>
                                        <td><a href="#" id="inline-username" data-type="text" data-pk="1"
                                               data-title="Enter username">Superuser</a></td>
                                    </tr>
                                    <tr>
                                        <td>Empty text field, required</td>
                                        <td><a href="#" id="inline-firstname" data-type="text" data-pk="1"
                                               data-placement="right" data-placeholder="Required"
                                               data-title="Enter your firstname"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Select, local array, custom display</td>
                                        <td><a href="#" id="inline-sex" data-type="select" data-pk="1" data-value=""
                                               data-title="Select sex"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Select, remote array, no buttons</td>
                                        <td><a href="#" id="inline-group" data-type="select" data-pk="1" data-value="5"
                                               data-source="/groups" data-title="Select group">Admin</a></td>
                                    </tr>
                                    <tr>
                                        <td>Select, error while loading</td>
                                        <td><a href="#" id="inline-status" data-type="select" data-pk="1" data-value="0"
                                               data-source="/status" data-title="Select status">Active</a></td>
                                    </tr>

                                    <tr>
                                        <td>Combodate (date)</td>
                                        <td><a href="#" id="inline-dob" data-type="combodate" data-value="1984-05-15"
                                               data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY"
                                               data-template="D / MMM / YYYY" data-pk="1"
                                               data-title="Select Date of birth"></a></td>
                                    </tr>
                                    <tr>
                                        <td>Combodate (datetime)</td>
                                        <td><a href="#" id="inline-event" data-type="combodate"
                                               data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm"
                                               data-viewformat="MMM D, YYYY, HH:mm" data-pk="1"
                                               data-title="Setup event date and time"></a></td>
                                    </tr>

                                    <tr>
                                        <td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
                                        <td><a href="#" id="inline-comments" data-type="textarea" data-pk="1"
                                               data-placeholder="Your comments here..." data-title="Enter comments">Awesome
                                                user!</a></td>
                                    </tr>

                                    <tr>
                                        <td>Checklist</td>
                                        <td><a href="#" id="inline-fruits" data-type="checklist" data-value="2,3"
                                               data-title="Select fruits"></a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->
                        </div>
                    </div> <!-- end card-box -->
                </div><!-- end col -->
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

<!-- Quill Editor js -->
<script src="assets/vendor/quill/quill.min.js"></script>

<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/x-editable/bootstrap-editable/js/bootstrap-editable.min.js"></script>


<!-- Quill Demo js -->
<script src="assets/js/pages/form-editor.js"></script>

</body>

</html>