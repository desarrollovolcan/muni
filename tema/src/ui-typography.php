<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Typography";
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
            $title = "Typography";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="header-title">Headings</h5>
                                    <p class="card-subtitle">
                                        All HTML headings, <code class="highlighter-rouge">&lt;h1&gt;</code> through
                                        <code>&lt;h6&gt;</code>, are available. <code>.h1</code> through
                                        <code>.h6</code>
                                        classes are also available, for when you want to match the font styling of a
                                        heading
                                        but still want your text to be displayed inline.
                                    </p>

                                    <div class="pt-4">
                                        <h1>This is a Heading 1</h1>
                                        <p class="text-muted">Suspendisse vel quam malesuada, aliquet sem sit
                                            amet, fringilla elit. Morbi
                                            tempor tincidunt tempor. Etiam id turpis viverra, vulputate sapien
                                            nec,
                                            varius sem. Curabitur ullamcorper fringilla eleifend. In ut eros
                                            hendrerit
                                            est consequat posuere et at velit.</p>

                                        <div class="clearfix"></div>

                                        <h2>This is a Heading 2</h2>
                                        <p class="text-muted">In nec rhoncus eros. Vestibulum eu mattis nisl.
                                            Quisque viverra viverra magna
                                            nec pulvinar. Maecenas pellentesque porta augue, consectetur
                                            facilisis diam
                                            porttitor sed. Suspendisse tempor est sodales augue rutrum
                                            tincidunt.
                                            Quisque a malesuada purus.</p>

                                        <div class="clearfix"></div>

                                        <h3>This is a Heading 3</h3>
                                        <p class="text-muted">Vestibulum auctor tincidunt semper. Phasellus ut
                                            vulputate lacus. Suspendisse
                                            ultricies mi eros, sit amet tempor nulla varius sed. Proin nisl
                                            nisi,
                                            feugiat quis bibendum vitae, dapibus in tellus.</p>

                                        <div class="clearfix"></div>

                                        <h4>This is a Heading 4</h4>
                                        <p class="text-muted">Nulla et mattis nunc. Curabitur scelerisque
                                            commodo condimentum. Mauris
                                            blandit, velit a consectetur egestas, diam arcu fermentum justo,
                                            eget
                                            ultrices arcu eros vel erat.</p>

                                        <div class="clearfix"></div>

                                        <h5>This is a Heading 5</h5>
                                        <p class="text-muted">Quisque nec turpis at urna dictum luctus.
                                            Suspendisse convallis dignissim
                                            eros at volutpat. In egestas mattis dui. Aliquam mattis dictum
                                            aliquet.
                                            Nulla sapien mauris, eleifend et sem ac.</p>

                                        <div class="clearfix"></div>

                                        <h6>This is a Heading 6</h6>
                                        <p class="text-muted">Donec ultricies, lacus id tempor condimentum, orci
                                            leo faucibus sem, a
                                            molestie libero lectus ac justo. ultricies mi eros, sit amet tempor
                                            nulla
                                            varius sed. Proin nisl nisi, feugiat quis bibendum vitae, dapibus in
                                            tellus.</p>
                                    </div>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="header-title">Display headings</h5>
                                    <p class="card-subtitle">
                                        Traditional heading elements are designed to work best in the meat of your page
                                        content.
                                        When you need a heading to stand out, consider using a <strong>display
                                            heading</strong>—a
                                        larger, slightly more opinionated heading style.
                                    </p>
                                    <div class="pt-4">
                                        <h1 class="display-1">Display 1</h1>
                                        <h1 class="display-2">Display 2</h1>
                                        <h1 class="display-3">Display 3</h1>
                                        <h1 class="display-4">Display 4</h1>
                                    </div>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="mt-4">
                                        <h5 class="header-title">Inline text elements</h5>
                                        <p class="card-subtitle">
                                            Your awesome text goes here.
                                        </p>
                                        <div class="pt-4">
                                            <p class="lead">
                                                Your title goes here
                                            </p>

                                            You can use the mark tag to
                                            <mark>
                                                highlight
                                            </mark>
                                            text.

                                            <br><br>

                                            <del>This line of text is meant to be treated as deleted text.</del>

                                            <br><br>

                                            <ins>This line of text is meant to be treated as an addition to the
                                                document.
                                            </ins>

                                            <br><br>

                                            <strong>rendered as bold text</strong>

                                            <br><br>

                                            <em>rendered as italicized text</em>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mt-4">
                                        <h5 class="header-title">Contextual Text Colors</h5>
                                        <p class="card-subtitle">
                                            Your awesome text goes here.
                                        </p>
                                        <div class="pt-4">
                                            <p class="text-pink">
                                                Donec ullamcorper nulla non metus auctor fringilla.
                                            </p>
                                            <p class="text-muted">
                                                Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.
                                            </p>
                                            <p class="text-primary">
                                                Nullam id dolor id nibh ultricies vehicula ut id elit.
                                            </p>
                                            <p class="text-success">
                                                Duis mollis, est non commodo luctus, nisi erat porttitor ligula.
                                            </p>
                                            <p class="text-info">
                                                Maecenas sed diam eget risus varius blandit sit amet non magna.
                                            </p>
                                            <p class="text-warning">
                                                Etiam porta sem malesuada magna mollis euismod.
                                            </p>
                                            <p class="text-danger">
                                                Donec ullamcorper nulla non metus auctor fringilla.
                                            </p>
                                            <p class="text-dark">
                                                Nullam id dolor id nibh ultricies vehicula ut id elit.
                                            </p>
                                            <p class="text-purple">
                                                Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- end row -->


                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <div class="mt-4">
                                        <h5 class="header-title">Unordered</h5>
                                        <p class="card-subtitle">
                                            A list of items in which the order does not explicitly matter.
                                        </p>

                                        <div class="pt-4">
                                            <ul>
                                                <li>
                                                    Lorem ipsum dolor sit amet
                                                </li>
                                                <li>
                                                    Consectetur adipiscing elit
                                                </li>
                                                <li>
                                                    Integer molestie lorem at massa
                                                </li>
                                                <li>
                                                    Facilisis in pretium nisl aliquet
                                                </li>
                                                <li>
                                                    Nulla volutpat aliquam velit
                                                    <ul>
                                                        <li>
                                                            Phasellus iaculis neque
                                                        </li>
                                                        <li>
                                                            Purus sodales ultricies
                                                        </li>
                                                        <li>
                                                            Vestibulum laoreet porttitor sem
                                                        </li>
                                                        <li>
                                                            Ac tristique libero volutpat at
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    Faucibus porta lacus fringilla vel
                                                </li>
                                                <li>
                                                    Aenean sit amet erat nunc
                                                </li>
                                                <li>
                                                    Eget porttitor lorem
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-4">
                                        <h5 class="header-title">Ordered</h5>
                                        <p class="card-subtitle">
                                            A list of items in which the order does explicitly matter.
                                        </p>
                                        <div class="pt-4">
                                            <ol>
                                                <li>
                                                    Lorem ipsum dolor sit amet
                                                </li>
                                                <li>
                                                    Consectetur adipiscing elit
                                                </li>
                                                <li>
                                                    Integer molestie lorem at massa
                                                </li>
                                                <li>
                                                    Facilisis in pretium nisl aliquet
                                                </li>
                                                <li>
                                                    Nulla volutpat aliquam velit
                                                    <ol>
                                                        <li>
                                                            Phasellus iaculis neque
                                                        </li>
                                                        <li>
                                                            Purus sodales ultricies
                                                        </li>
                                                        <li>
                                                            Vestibulum laoreet porttitor sem
                                                        </li>
                                                        <li>
                                                            Ac tristique libero volutpat at
                                                        </li>
                                                    </ol>
                                                </li>
                                                <li>
                                                    Faucibus porta lacus fringilla vel
                                                </li>
                                                <li>
                                                    Aenean sit amet erat nunc
                                                </li>
                                                <li>
                                                    Eget porttitor lorem
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mt-4">
                                        <h5 class="header-title">Unstyled</h5>
                                        <p class="card-subtitle">
                                            <strong>This only applies to immediate children
                                                list items</strong>, meaning you will need to add the class for any
                                            nested lists as well.
                                        </p>

                                        <div class="pt-4">
                                            <ul class="list-unstyled">
                                                <li>
                                                    Lorem ipsum dolor sit amet
                                                </li>
                                                <li>
                                                    Integer molestie lorem at massa
                                                    <ul>
                                                        <li>
                                                            Phasellus iaculis neque
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    Faucibus porta lacus fringilla vel
                                                </li>
                                                <li>
                                                    Eget porttitor lorem
                                                </li>
                                            </ul>
                                        </div>


                                        <h5 class="header-title">Inline</h5>
                                        <p class="card-subtitle">
                                            Place all list items on a single line with <code>
                                                display: inline-block;</code>
                                            and some light padding.
                                        </p>

                                        <div class="pt-4">
                                            <ul class="list-inline m-b-0">
                                                <li class="list-inline-item">
                                                    Lorem ipsum
                                                </li>
                                                <li class="list-inline-item">
                                                    Phasellus iaculis
                                                </li>
                                                <li class="list-inline-item">
                                                    Nulla volutpat
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mt-4">
                                <div class="col-lg-6">
                                    <div class="mt-4">
                                        <h5 class="header-title">Blockquotes</h5>
                                        <p class="card-subtitle">
                                            Your awesome text goes here.
                                        </p>
                                        <div class="pt-4">
                                            <blockquote class="blockquote">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                    posuere erat a ante.</p>
                                                <footer class="blockquote-footer">Someone famous in <cite
                                                            title="Source Title">Source Title</cite></footer>
                                            </blockquote>

                                            <p class="text-muted">
                                                Use text utilities as needed to change the alignment of your blockquote.
                                            </p>

                                            <blockquote class="blockquote border-0 text-center">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                    posuere erat a ante.</p>
                                                <footer class="blockquote-footer">Someone famous in <cite
                                                            title="Source Title">Source Title</cite></footer>
                                            </blockquote>

                                            <blockquote class="blockquote blockquote-reverse text-right mb-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                                    posuere erat a ante.</p>
                                                <footer class="blockquote-footer">Someone famous in <cite
                                                            title="Source Title">Source Title</cite></footer>
                                            </blockquote>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- end row -->
                        </div>

                    </div>
                </div>

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

</body>

</html>