<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Breadcrumb";
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
            $title = "Breadcrumb";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Example</h5>
                            <p class="card-subtitle">
                                Indicate the current page’s location within a navigational hierarchy that
                                automatically adds separators via CSS.
                                Please read the official <a target="_blank"
                                                            href="https://getbootstrap.com/docs/5.3/components/breadcrumb/">Bootstrap</a>
                                documentation for more options.
                            </p>
                        </div>

                        <div class="card-body pt-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                                </ol>
                            </nav>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">With Icons</h5>
                            <p class="card-subtitle">
                                Optionally you can also specify the icon with your breadcrumb item.
                            </p>
                        </div>
                        <div class="card-body pt-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2">
                                    <li class="breadcrumb-item active" aria-current="page"><i
                                                class="ti ti-smart-home font-16 me-1"></i>Home
                                    </li>
                                </ol>
                            </nav>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-2">
                                    <li class="breadcrumb-item"><a href="#"><i
                                                    class="ti ti-smart-home font-16 me-1"></i>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>

                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-light bg-opacity-50 p-2 mb-0">
                                    <li class="breadcrumb-item"><a href="#"><i
                                                    class="ti ti-smart-home font-16 me-1"></i>Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="header-title">Dividers</h5>
                            <p class="card-subtitle">
                                Indicate the current page’s location within a navigational hierarchy that
                                automatically adds separators via CSS.
                                Please read the official <a target="_blank"
                                                            href="https://getbootstrap.com/docs/5.3/components/breadcrumb/">Bootstrap</a>
                                documentation for more options.
                            </p>
                        </div>

                        <div class="card-body pt-2">

                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>

                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                                 aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>

                            <nav style="--bs-breadcrumb-divider: '\ea1c';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>

                            <nav style="--bs-breadcrumb-divider: '\f4f9';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>

                            <nav style="--bs-breadcrumb-divider: '\eb0c';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 py-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                                </ol>
                            </nav>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
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