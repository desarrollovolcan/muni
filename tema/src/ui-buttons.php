<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Buttons";
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
            $title = "Buttons";
            include "partials/page-title.php" ?>

            <!-- Row start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Default Buttons</h5>
                                        <p class="card-subtitle">
                                            Use the button classes on an <code>&lt;a&gt;</code>,
                                            <code>&lt;button&gt;</code>, or <code>&lt;input&gt;</code> element.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div>
                                            <div class="d-flex flex-wrap align-items-center gap-2">
                                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                                    Primary
                                                </button>
                                                <button type="button" class="btn btn-secondary waves-effect">Secondary
                                                </button>
                                                <button type="button" class="btn btn-success waves-effect waves-light">
                                                    Success
                                                </button>
                                                <button type="button" class="btn btn-info waves-effect waves-light">
                                                    Info
                                                </button>
                                                <button type="button" class="btn btn-warning waves-effect waves-light">
                                                    Warning
                                                </button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">
                                                    Danger
                                                </button>
                                                <button type="button" class="btn btn-dark waves-effect waves-light">
                                                    Dark
                                                </button>
                                                <button type="button" class="btn btn-purple waves-effect waves-light">
                                                    Purple
                                                </button>
                                                <button type="button" class="btn btn-pink waves-effect waves-light">
                                                    Pink
                                                </button>
                                                <button type="button" class="btn btn-light waves-effect">Light</button>
                                                <button type="button" class="btn btn-link waves-effect">Link</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Default Rounded Button</h5>
                                        <p class="card-subtitle">
                                            Add <code>.rounded-pill</code> to default button to get rounded corners.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">
                                                Primary
                                            </button>
                                            <button type="button" class="btn btn-secondary rounded-pill waves-effect">
                                                Secondary
                                            </button>
                                            <button type="button"
                                                    class="btn btn-success rounded-pill waves-effect waves-light">
                                                Success
                                            </button>
                                            <button type="button"
                                                    class="btn btn-info rounded-pill waves-effect waves-light">Info
                                            </button>
                                            <button type="button"
                                                    class="btn btn-warning rounded-pill waves-effect waves-light">
                                                Warning
                                            </button>
                                            <button type="button"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light">Danger
                                            </button>
                                            <button type="button"
                                                    class="btn btn-dark rounded-pill waves-effect waves-light">Dark
                                            </button>
                                            <button type="button" class="btn btn-light rounded-pill waves-effect">
                                                Light
                                            </button>
                                            <button type="button"
                                                    class="btn btn-purple rounded-pill waves-effect waves-light">Purple
                                            </button>
                                            <button type="button"
                                                    class="btn btn-pink rounded-pill waves-effect waves-light">Pink
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Outline Buttons</h5>
                                        <p class="card-subtitle">
                                            In need of a button, but not the hefty background colors they bring? Replace
                                            the default modifier classes with the <code>.btn-*-outline</code> ones to
                                            remove all background images and colors on any button.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-outline-primary waves-effect waves-light">Primary
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary waves-effect">
                                                Secondary
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-success waves-effect waves-light">Success
                                            </button>
                                            <button type="button" class="btn btn-outline-info waves-effect waves-light">
                                                Info
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-warning waves-effect waves-light">Warning
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light">Danger
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-purple waves-effect waves-light">Purple
                                            </button>
                                            <button type="button" class="btn btn-outline-pink waves-effect waves-light">
                                                Pink
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Outline Rounded Button</h5>
                                        <p class="card-subtitle">
                                            In need of a button, but not the hefty background colors they bring? Replace
                                            the default modifier classes with the <code>.btn-*-outline</code> <code>.rounded-pill</code>
                                            ones to remove all background images and colors on any button.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-outline-primary rounded-pill waves-effect waves-light">
                                                Primary
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-secondary rounded-pill waves-effect">
                                                Secondary
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-success rounded-pill waves-effect waves-light">
                                                Success
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-info rounded-pill waves-effect waves-light">
                                                Info
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-warning rounded-pill waves-effect waves-light">
                                                Warning
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-danger rounded-pill waves-effect waves-light">
                                                Danger
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-purple rounded-pill waves-effect waves-light">
                                                Purple
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-pink rounded-pill waves-effect waves-light">
                                                Pink
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button-Width</h5>
                                        <p class="card-subtitle">
                                            Create buttons with minimum width by adding add <code>.width-xs</code>,
                                            <code>.width-sm</code>, <code>.width-md</code>, <code>.width-lg</code> &
                                            <code>.width-xl</code>.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-primary waves-effect waves-light width-xs">Xs
                                            </button>
                                            <button type="button"
                                                    class="btn btn-purple waves-effect waves-light width-sm">Small
                                            </button>
                                            <button type="button"
                                                    class="btn btn-info waves-effect waves-light width-md">Middle
                                            </button>
                                            <button type="button"
                                                    class="btn btn-warning waves-effect waves-light width-lg">Large
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button-Sizes</h5>
                                        <p class="card-subtitle">
                                            Add <code>.btn-lg</code>, <code>.btn-sm</code> for additional sizes.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button class="btn btn-primary waves-effect waves-light btn-lg">Large
                                                button
                                            </button>
                                            <button class="btn btn-success waves-effect waves-light">Normal button
                                            </button>
                                            <button class="btn btn-purple waves-effect waves-light btn-sm">Small
                                                button
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button Labels</h5>
                                        <p class="card-subtitle">
                                            Use the button classes on an <code>&lt;a&gt;</code>,
                                            <code>&lt;button&gt;</code>,
                                            or <code>&lt;input&gt;</code> element. And put <code>&lt;span&gt;</code>
                                            with class <code>.btn-label</code> and any <code>icon</code> inside it. If
                                            you want to put
                                            icon on right side then add class <code>.btn-label-right</code> in <code>&lt;span&gt;</code>
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-check"></i>
                                                    </span>Success
                                            </button>

                                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-close"></i>
                                                    </span>Danger
                                            </button>

                                            <button type="button" class="btn btn-info waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i>
                                                    </span>Info
                                            </button>

                                            <button type="button" class="btn btn-warning waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert"></i>
                                                    </span>Warning
                                            </button>
                                            <br>

                                            <button type="button" class="btn btn-primary waves-effect waves-light ms-2">
                                                    <span class="btn-label"><i class="mdi mdi-arrow-left"></i>
                                                    </span>Left
                                            </button>

                                            <button type="button" class="btn btn-success waves-effect waves-light">Right
                                                <span class="btn-label btn-label-right"><i
                                                            class="mdi mdi-arrow-right"></i>
                                                    </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button Labels Rounded</h5>
                                        <p class="card-subtitle">
                                            Use the button classes on an <code>&lt;a&gt;</code>,
                                            <code>&lt;button&gt;</code>,
                                            or <code>&lt;input&gt;</code> element. And put <code>&lt;span&gt;</code>
                                            with class <code>.btn-label</code> and any <code>icon</code> inside it. If
                                            you want to put
                                            icon on right side then add class <code>.btn-label-right</code> in <code>&lt;span&gt;</code>
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-success rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-check"></i>
                                                    </span>Success
                                            </button>

                                            <button type="button"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-close"></i>
                                                    </span>Danger
                                            </button>

                                            <button type="button"
                                                    class="btn btn-info rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i>
                                                    </span>Info
                                            </button>

                                            <button type="button"
                                                    class="btn btn-warning rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-alert"></i>
                                                    </span>Warning
                                            </button>
                                            <br>

                                            <button type="button"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-arrow-left"></i>
                                                    </span>Left
                                            </button>

                                            <button type="button"
                                                    class="btn btn-success rounded-pill waves-effect waves-light">Right
                                                <span class="btn-label btn-label-right"><i
                                                            class="mdi mdi-arrow-right"></i>
                                                    </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Icon Button</h5>
                                        <p class="card-subtitle">
                                            Icon only button.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button class="btn btn-icon waves-effect btn-secondary"><i
                                                        class="mdi mdi-heart-outline"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-danger disabled"><i
                                                        class="mdi mdi-close"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-purple"><i
                                                        class="mdi mdi-music"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-primary"><i
                                                        class="mdi mdi-star"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-success"><i
                                                        class="mdi mdi-thumb-up-outline"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-info"><i
                                                        class="mdi mdi-keyboard-outline"></i></button>
                                            <button class="btn btn-icon waves-effect waves-light btn-warning"><i
                                                        class="mdi mdi-wrench"></i></button>
                                            <br>
                                            <button class="btn  btn-secondary waves-effect"><i
                                                        class="mdi mdi-heart-half-full me-1"></i> <span>Like</span>
                                            </button>
                                            <button class="btn btn-dark waves-effect waves-light"><i
                                                        class="mdi mdi-email-outline me-1"></i> <span>Share</span>
                                            </button>
                                            <button class="btn btn-warning waves-effect waves-light"><i
                                                        class="mdi mdi-launch me-1"></i> <span>Launch</span></button>
                                            <button class="btn btn-info waves-effect waves-light disabled"><i
                                                        class="mdi mdi-cloud-outline me-1"></i>
                                                <span>Cloud Hosting</span></button>
                                            <button class="btn btn-pink waves-effect waves-light">
                                                <span>Book Flight</span> <i class="mdi mdi-airplane ms-1"></i></button>
                                            <button class="btn btn-purple waves-effect waves-light">
                                                <span>Donate Money</span> <i class="mdi mdi-cash-multiple ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Block Button</h5>
                                        <p class="card-subtitle">
                                            Create block level buttons by adding class <code>.d-grid</code> to parent
                                            div.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-grid gap-2">
                                            <button type="button"
                                                    class="btn  btn-lg btn-primary waves-effect waves-light">Block
                                                Button
                                            </button>
                                            <button type="button"
                                                    class="btn  btn-md btn-pink waves-effect waves-light active">Block
                                                Button
                                            </button>
                                            <button type="button"
                                                    class="btn  btn-sm btn-success waves-effect waves-light">Block
                                                Button
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button group</h5>
                                        <p class="card-subtitle">
                                            Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>.
                                        </p>
                                    </div>

                                    <div class="card-body pt-2">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary waves-effect">Left</button>
                                            <button type="button" class="btn btn-secondary waves-effect">Middle</button>
                                            <button type="button" class="btn btn-secondary waves-effect">Right</button>
                                        </div>
                                        <br>

                                        <div class="btn-group mt-2 me-1">
                                            <button type="button" class="btn btn-secondary waves-effect">1</button>
                                            <button type="button" class="btn btn-secondary waves-effect">2</button>
                                            <button type="button" class="btn btn-secondary waves-effect">3</button>
                                            <button type="button" class="btn btn-secondary waves-effect">4</button>
                                        </div>
                                        <div class="btn-group mt-2 me-1">
                                            <button type="button" class="btn btn-secondary waves-effect">5</button>
                                            <button type="button" class="btn btn-secondary waves-effect">6</button>
                                            <button type="button" class="btn btn-secondary waves-effect">7</button>
                                        </div>
                                        <div class="btn-group mt-2">
                                            <button type="button" class="btn btn-secondary waves-effect">8</button>
                                        </div>
                                        <br>
                                        <div class="btn-group mt-2">
                                            <button type="button" class="btn btn-secondary waves-effect">1</button>
                                            <button type="button" class="btn btn-secondary waves-effect">2</button>
                                            <button type="button" class="btn btn-secondary waves-effect">3</button>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Dropdown
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                                    <a class="dropdown-item" href="#">Dropdown link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="btn-group-vertical mt-2">
                                                    <button type="button" class="btn btn-secondary waves-effect">Top
                                                    </button>
                                                    <button type="button" class="btn btn-secondary waves-effect">
                                                        Middle
                                                    </button>
                                                    <button type="button" class="btn btn-secondary waves-effect">
                                                        Bottom
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="btn-group-vertical mt-2">
                                                    <button type="button" class="btn btn-secondary waves-effect">Button
                                                        1
                                                    </button>
                                                    <button type="button" class="btn btn-secondary waves-effect">Button
                                                        2
                                                    </button>
                                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Button 3
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                                        <a class="dropdown-item" href="#">Dropdown link</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Button plugin</h5>
                                        <p class="card-subtitle">
                                            Do more with buttons. Control button states or create groups of buttons for
                                            more components like toolbars.
                                        </p>


                                    </div>
                                    <div class="card-body pt-2">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="button" aria-pressed="false" autocomplete="off">
                                            Single toggle
                                        </button>
                                        <div class="mt-2">
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic checkbox toggle button group">
                                                <input type="checkbox" class="btn-check" id="btncheck1"
                                                       autocomplete="off">
                                                <label class="btn btn-primary active" for="btncheck1">Active</label>

                                                <input type="checkbox" class="btn-check" id="btncheck2"
                                                       autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck2">Check</label>

                                                <input type="checkbox" class="btn-check" id="btncheck3"
                                                       autocomplete="off">
                                                <label class="btn btn-primary" for="btncheck3">Check</label>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="btn-group" role="group"
                                                 aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                                       autocomplete="off" checked>
                                                <label class="btn btn-primary" for="btnradio1">Active</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                                       autocomplete="off">
                                                <label class="btn btn-primary" for="btnradio2">Radio</label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3"
                                                       autocomplete="off">
                                                <label class="btn btn-primary" for="btnradio3">Radio</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Social Buttons with label</h5>
                                        <p class="card-subtitle">
                                            Use class <code>.btn-@yoursocial</code> to the parent.
                                        </p>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button" class="btn btn-facebook waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-facebook"></i>
                                                    </span>Facebook
                                            </button>

                                            <button type="button" class="btn btn-twitter waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-twitter"></i>
                                                    </span>Twitter
                                            </button>

                                            <button type="button" class="btn btn-linkedin waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-linkedin"></i>
                                                    </span>Linkdin
                                            </button>

                                            <button type="button" class="btn btn-dribbble waves-effect waves-light">
                                                    <span class="btn-label"><i data-lucide="dribbble" height="14"
                                                                               width="14"></i>
                                                    </span>Dribbble
                                            </button>

                                            <button type="button" class="btn btn-googleplus waves-effect waves-light">
                                                    <span class="btn-label"><i class="mdi mdi-google-plus"></i>
                                                    </span>Google+
                                            </button>

                                            <button type="button" class="btn btn-instagram waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-instagram"></i> </span>Instagram
                                            </button>

                                            <button type="button" class="btn btn-pinterest waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-pinterest"></i> </span>Pinterest
                                            </button>

                                            <button type="button" class="btn btn-dropbox waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-dropbox"></i> </span>Dropbox
                                            </button>

                                            <button type="button" class="btn btn-skype waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-skype"></i> </span>Skype
                                            </button>

                                            <button type="button" class="btn btn-youtube waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-youtube"></i> </span>Youtube
                                            </button>

                                            <button type="button" class="btn btn-github waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-github"></i> </span>Github
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="header-title">Social buttons</h5>
                                        <p class="card-subtitle">
                                            Use class <code>.btn-@yoursocial</code> to the parent.
                                        </p>
                                    </div>
                                    <div class="card-body">

                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <button type="button"
                                                    class="btn btn-icon btn-facebook waves-effect waves-light">
                                                <i class="mdi mdi-facebook"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-twitter waves-effect waves-light">
                                                <i class="mdi mdi-twitter"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-linkedin waves-effect waves-light">
                                                <i class="mdi mdi-linkedin"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-dribbble waves-effect waves-light">
                                                <i data-lucide="dribbble" height="14" width="14"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-googleplus waves-effect waves-light">
                                                <i class="mdi mdi-google-plus"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-instagram waves-effect waves-light">
                                                <i class="mdi mdi-instagram"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-pinterest waves-effect waves-light">
                                                <i class="mdi mdi-pinterest"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-dropbox waves-effect waves-light">
                                                <i class="mdi mdi-dropbox"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-skype waves-effect waves-light">
                                                <i class="mdi mdi-skype"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-youtube waves-effect waves-light">
                                                <i class="mdi mdi-youtube"></i>
                                            </button>

                                            <button type="button"
                                                    class="btn btn-icon btn-github waves-effect waves-light">
                                                <i class="mdi mdi-github"></i>
                                            </button>

                                            <br>

                                            <button type="button" class="btn btn-facebook waves-effect waves-light">
                                                <i class="mdi mdi-facebook me-1"></i> Facebook
                                            </button>

                                            <button type="button" class="btn btn-twitter waves-effect waves-light">
                                                <i class="mdi mdi-twitter me-1"></i> Twitter
                                            </button>

                                            <button type="button" class="btn btn-linkedin waves-effect waves-light">
                                                <i class="mdi mdi-linkedin me-1"></i> Linkedin
                                            </button>

                                            <button type="button" class="btn btn-dribbble waves-effect waves-light">
                                                <i data-lucide="dribbble" class="me-1" height="14" width="14"></i>
                                                Dribbble
                                            </button>

                                            <button type="button" class="btn btn-googleplus waves-effect waves-light">
                                                <i class="mdi mdi-google-plus me-1"></i> Google+
                                            </button>

                                            <button type="button" class="btn btn-instagram waves-effect waves-light">
                                                <i class="mdi mdi-instagram me-1"></i> Instagram
                                            </button>

                                            <button type="button" class="btn btn-pinterest waves-effect waves-light">
                                                <i class="mdi mdi-pinterest me-1"></i> Pinterest
                                            </button>

                                            <button type="button" class="btn btn-dropbox waves-effect waves-light">
                                                <i class="mdi mdi-dropbox me-1"></i> Dropbox
                                            </button>

                                            <button type="button" class="btn btn-skype waves-effect waves-light">
                                                <i class="mdi mdi-skype me-1"></i> Skype
                                            </button>

                                            <button type="button" class="btn btn-youtube waves-effect waves-light">
                                                <i class="mdi mdi-youtube me-1"></i> Youtube
                                            </button>

                                            <button type="button" class="btn btn-github waves-effect waves-light">
                                                <i class="mdi mdi-github me-1"></i> Github
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- end row -->


                    </div>
                </div>

            </div>
            <!-- End of Row -->

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