<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Form Advanced";
    include "partials/title-meta.php" ?>

    <link href="assets/vendor/@adactive/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet"/>
    <link href="assets/vendor/mohithg-switchery/switchery.min.css" rel="stylesheet"/>
    <link href="assets/vendor/multiselect/css/multi-select.css" rel="stylesheet"/>
    <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet"/>
    <link href="assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"/>

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
            $title = "Form Advanced";
            include "partials/page-title.php" ?>

            <div class="card">
                <div class="card-header">
                    <h5 class="header-title"> Tags Input</h5>
                </div>
                <div class="card-body pt-2">
                    <!-- Input masks -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div>
                                <h6>Input Tags</h6>
                                <p class="sub-header mb-3">
                                    Just add <code>data-role="tagsinput"</code> to your input field to automatically
                                    change it to a tags input field.
                                </p>
                                <div class="tags-default">
                                    <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput"
                                           placeholder="add tags"/>
                                </div>
                            </div>

                        </div> <!-- end col -->

                        <div class="col-md-6">
                            <div class="">
                                <h6>True multi value</h6>
                                <p class="sub-header mb-3">
                                    Use a <code>&lt;select multiple /&gt;</code> as your input element for a tags input,
                                    to gain true multivalue support.
                                    Instead of a comma separated string, the values will be set in an array. Existing
                                    <code>&lt;option /&gt;</code>
                                    elements will automatically be set as tags. This makes it also possible to create
                                    tags containing a comma.
                                </p>
                                <div>
                                    <select multiple data-role="tagsinput">
                                        <option value="Amsterdam">Amsterdam</option>
                                        <option value="Washington">Washington</option>
                                        <option value="Sydney">Sydney</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h5 class="header-title">Switchery</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <h6>Basic</h6>
                            <p class="sub-header">
                                Add an attribute <code>
                                    data-plugin="switchery" data-color="@colors"</code>
                                to your input element and it will be converted into switch.
                            </p>
                            <div class="switchery-demo">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#039cfd"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#f1b53d"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#1bb99a"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#ff5d48"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#3db9dc"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#2b3d51"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#9261c6"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#ff7aa3"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#98a6ad"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h6>Sizes</h6>
                            <p class="sub-header">
                                Add an attribute <code>
                                    data-size="small",data-size="large"</code>
                                to your input element and it will be converted into switch.
                            </p>

                            <div class="switchery-demo">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2"
                                       data-size="small"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#ff7aa3"/>
                                <input type="checkbox" checked data-plugin="switchery" data-color="#2b3d51"
                                       data-size="large"/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h6>Secondary color</h6>
                            <p class="sub-header">
                                Add an attribute <code>
                                    data-color="@color" data-secondary-color="@color"</code>
                                to your input element and it will be converted into switch.
                            </p>

                            <div class="switchery-demo">
                                <input type="checkbox" data-plugin="switchery" data-color="#1bb99a"
                                       data-secondary-color="#ff5d48"/>
                                <input type="checkbox" data-plugin="switchery" data-color="#9261c6"
                                       data-secondary-color="#ff7aa3" checked/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="header-title"> Multiple Select</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-lg-4">
                            <h6>Default</h6>
                            <p class="sub-header">
                                Use a <code>
                                    &lt;select multiple /&gt;</code>
                                as your input element for a tags input, to gain true multivalue support.
                            </p>

                            <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                    name="my_multi_select1[]" data-plugin="multiselect">
                                <option>Dallas Cowboys</option>
                                <option>New York Giants</option>
                                <option selected>Philadelphia Eagles</option>
                                <option selected>Washington Redskins</option>
                                <option>Chicago Bears</option>
                                <option>Detroit Lions</option>
                                <option>Green Bay Packers</option>
                                <option>Minnesota Vikings</option>
                                <option selected>Atlanta Falcons</option>
                                <option>Carolina Panthers</option>
                                <option>New Orleans Saints</option>
                                <option>Tampa Bay Buccaneers</option>
                                <option>Arizona Cardinals</option>
                                <option>St. Louis Rams</option>
                                <option>San Francisco 49ers</option>
                                <option>Seattle Seahawks</option>
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <h6>Grouped Options</h6>
                            <p class="sub-header">
                                Use a <code>
                                    &lt;select multiple /&gt;</code>
                                as your input element for a tags input, to gain true multivalue support.
                            </p>

                            <select multiple="multiple" class="multi-select" id="my_multi_select2"
                                    name="my_multi_select2[]" data-plugin="multiselect" data-selectable-optgroup="true">
                                <optgroup label="NFC EAST">
                                    <option>Dallas Cowboys</option>
                                    <option>New York Giants</option>
                                    <option>Philadelphia Eagles</option>
                                    <option>Washington Redskins</option>
                                </optgroup>
                                <optgroup label="NFC NORTH">
                                    <option>Chicago Bears</option>
                                    <option>Detroit Lions</option>
                                    <option>Green Bay Packers</option>
                                    <option>Minnesota Vikings</option>
                                </optgroup>
                                <optgroup label="NFC SOUTH">
                                    <option>Atlanta Falcons</option>
                                    <option>Carolina Panthers</option>
                                    <option>New Orleans Saints</option>
                                    <option>Tampa Bay Buccaneers</option>
                                </optgroup>
                                <optgroup label="NFC WEST">
                                    <option>Arizona Cardinals</option>
                                    <option>St. Louis Rams</option>
                                    <option>San Francisco 49ers</option>
                                    <option>Seattle Seahawks</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title"> Select2</h5>
                        </div>
                        <div class="card-body pt-2">
                            <h6 class="">Single Select</h6>
                            <p class="sub-header mb-3">
                                Select2 can take a regular select box like this...
                            </p>

                            <select class="form-control" data-toggle="select2">
                                <option>Select</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>

                            <h6 class="mt-4 ">Multiple Select</h6>
                            <p class="sub-header mb-3">
                                Select2 can take a regular select box like this...
                            </p>

                            <select class="form-control select2-multiple" data-toggle="select2" multiple="multiple"
                                    data-placeholder="Choose ...">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title"> Auto Complete</h5>
                        </div>
                        <div class="card-body pt-2">
                            <form>
                                <div class="form-group mb-4">
                                    <label class="control-label ">Ajax Lookup</label>
                                    <p class="sub-header">
                                        Your awesome text goes here
                                    </p>
                                    <input type="text" name="country" id="autocomplete-ajax" class="form-control"
                                           style=" z-index: 2;"/>
                                    <input type="text" name="country" id="autocomplete-ajax-x" disabled="disabled"
                                           class="form-control"
                                           style="color: #CCC; position: absolute; background: transparent; z-index: 1;display: none;"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label ">Local Lookup and Grouping</label>
                                    <p class="sub-header">
                                        Your awesome text goes here
                                    </p>
                                    <input type="text" name="country" id="autocomplete" class="form-control"/>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="header-title">Bootstrap MaxLength</h5>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-xl-6">
                            <div>
                                <h6 class="">Default usage</h6>
                                <p class=" font-13">
                                    The badge will show up by default when the remaining chars are 10 or less:
                                </p>
                                <input type="text" class="form-control" maxlength="25" name="defaultconfig"
                                       id="defaultconfig"/>

                                <div class="mt-4">
                                    <h6 class="">Threshold value</h6>
                                    <p class=" font-13">
                                        Do you want the badge to show up when there are 20 chars or less? Use the <code>threshold</code>
                                        option:
                                    </p>
                                    <input type="text" maxlength="25" name="thresholdconfig" class="form-control"
                                           id="thresholdconfig"/>
                                </div>

                                <div class="mt-4">
                                    <h6 class="">All the options</h6>
                                    <p class=" font-13">
                                        Please note: if the <code>alwaysShow</code> option is enabled, the <code>threshold</code>
                                        option is ignored.
                                    </p>
                                    <input type="text" class="form-control" maxlength="25" name="alloptions"
                                           id="alloptions"/>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mt-4 mt-xl-0">
                                <h6 class="">Position</h6>
                                <p class=" font-13">
                                    All you need to do is specify the <code>placement</code> option, with one of those
                                    strings. If none
                                    is specified, the positioning will be defauted to 'bottom'.
                                </p>
                                <input type="text" class="form-control" maxlength="25" name="placement" id="placement"/>

                                <div class="mt-4">
                                    <h6 class="">textareas</h6>
                                    <p class=" font-13">
                                        Bootstrap maxlength supports textarea as well as inputs. Even on old IE.
                                    </p>
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="3"
                                              placeholder="This textarea has a limit of 225 chars."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <?php include 'partials/footer.php' ?>
    </div> <!-- container -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<?php include 'partials/customizer.php' ?>

<?php include 'partials/footer-scripts.php' ?>

<script src="assets/vendor/@adactive/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/vendor/mohithg-switchery/switchery.min.js"></script>
<script src="assets/vendor/multiselect/js/jquery.multi-select.js"></script>
<script src="assets/vendor/select2/js/select2.min.js"></script>
<script src="assets/vendor/jquery-mockjax/jquery.mockjax.min.js"></script>
<script src="assets/vendor/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
<script src="assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>


<script src="assets/js/pages/form-advanced.js"></script>

</body>

</html>