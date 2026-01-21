<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Form Masks";
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
            $title = "Form Masks";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Input Masks</h5>
                            <p class="card-subtitle">
                                Your awesome text goes here.Your awesome text goes here.
                            </p>
                        </div><!-- end card header -->
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#">
                                        <div class="form-group">
                                            <label>ISBN 1</label>
                                            <input type="text" placeholder="" data-mask="999-99-999-9999-9"
                                                   class="form-control">
                                            <span class="font-13 text-muted">e.g "999-99-999-9999-9"</span>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN 2</label>
                                            <input type="text" placeholder="" data-mask="999 99 999 9999 9"
                                                   class="form-control">
                                            <span class="font-13 text-muted">999 99 999 9999 9</span>
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN 3</label>
                                            <input type="text" placeholder="" data-mask="999/99/999/9999/9"
                                                   class="form-control">
                                            <span class="font-13 text-muted">999/99/999/9999/9</span>
                                        </div>
                                        <div class="form-group">
                                            <label>IPV4</label>
                                            <input type="text" placeholder="" data-mask="999.999.999.9999"
                                                   class="form-control">
                                            <span class="font-13 text-muted">192.168.110.310</span>
                                        </div>
                                        <div class="form-group">
                                            <label>IPV6</label>
                                            <input type="text" placeholder=""
                                                   data-mask="9999:9999:9999:9:999:9999:9999:9999" class="form-control">
                                            <span class="font-13 text-muted">4deg:1340:6547:2:540:h8je:ve73:98pd</span>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <form action="#">

                                        <div class="form-group">
                                            <label>Tax ID</label>
                                            <input type="text" placeholder="" data-mask="99-9999999"
                                                   class="form-control">
                                            <span class="font-13 text-muted">99-9999999</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" placeholder="" data-mask="(999) 999-9999"
                                                   class="form-control">
                                            <span class="font-13 text-muted">(999) 999-9999</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Currency</label>
                                            <input type="text" placeholder="" data-mask="$ 999,999,999.99"
                                                   class="form-control">
                                            <span class="font-13 text-muted">$ 999,999,999.99</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="text" placeholder="" data-mask="99/99/9999"
                                                   class="form-control">
                                            <span class="font-13 text-muted">dd/mm/yyyy</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Date 2</label>
                                            <input type="text" placeholder="" data-mask="99-99-9999"
                                                   class="form-control">
                                            <span class="font-13 text-muted">dd-mm-yyyy</span>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Auto Numberic</h5>
                            <p class="card-subtitle">
                                Your awesome text goes here.Your awesome text goes here.
                            </p>
                        </div>
                        <div class="card-body pt-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Default</label>
                                                <input type="text" placeholder="" class="form-control autonumber"
                                                       data-a-sep="." data-a-dec=",">
                                                <span class="font-13 text-muted">e.g. "1.234.567.890.123"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Auto Numeric ($)</label>
                                                <input type="text" placeholder="" data-a-sign="$ "
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "$ $ 1,234,567,890,123"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Auto Numeric (€)</label>
                                                <input type="text" placeholder="" data-a-sign="€ "
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "€ 1,234,567,890,123"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Auto Numeric (Rs.)</label>
                                                <input type="text" placeholder="" data-a-sign="Rs. "
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "Rs. 1,234,567,890,123"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>4 digit Group (¥)</label>
                                                <input type="text" placeholder="" data-d-group="4" data-a-sign="¥ "
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "¥ 1,2345,6789,0123"</span>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Auto Numeric (£)</label>
                                                <input type="text" placeholder="" data-a-sign="£ "
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "£ 1,234,567,890,123"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Auto Numeric (%)</label>
                                                <input type="text" placeholder="" data-a-sign="%" data-p-sign="s"
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "11%"</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Maximum Value (0 - 9999)</label>
                                                <input type="text" placeholder="" data-v-max="9999" data-v-min="0"
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "9,999"</span>
                                            </div>

                                            <div class="form-group">
                                                <label>Range Value (-99.99 - 1000.00)</label>
                                                <input type="text" placeholder="" data-v-min="-99.99"
                                                       data-v-max="1000.00" class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "1000 Or -99.99"</span>
                                            </div>

                                            <div class="form-group mb-0">
                                                <label>Bracket Value</label>
                                                <input type="text" placeholder="" data-a-sep="." data-a-dec=","
                                                       data-v-min="-9999.99" data-v-max="0.00" data-n-bracket="(,)"
                                                       class="form-control autonumber">
                                                <span class="font-13 text-muted">e.g. "(9,999.00)"</span>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
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

<!-- Bootstrap Wizard Form js -->
<script src="assets/vendor/jquery-mask-plugin/jquery.mask.min.js"></script>

<script src="assets/vendor/autonumeric/autoNumeric.min.js"></script>

<!-- masks Form Demo js -->
<script src="assets/js/pages/form-masks.js"></script>

</body>

</html>