<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Tickets";
    include "partials/title-meta.php" ?>

    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
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
            $subtitle = "Apps";
            $title = "Tickets";
            include "partials/page-title.php" ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="header-title">Manage Tickets</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div class="text-center mb-4">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="my-3">
                                            <h3 class="mb-2 fw-semibold">25563</h3>
                                            <p class="text-uppercase mb-1 font-13 fs-weight-medium">Total tickets</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="my-3">
                                            <h3 class="mb-2 fw-semibold">6952</h3>
                                            <p class="text-uppercase mb-1 font-13 fs-weight-medium">Pending Tickets</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="my-3">
                                            <h3 class="mb-2 fw-semibold">18361</h3>
                                            <p class="text-uppercase mb-1 font-13 fs-weight-medium">Closed Tickets</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="my-3">
                                            <h3 class="mb-2 fw-semibold text-danger">250</h3>
                                            <p class="text-uppercase mb-1 font-13 fs-weight-medium">Deleted Tickets</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable">
                                <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Requested By</th>
                                    <th>Subject</th>
                                    <th>Assignee</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Due Date</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td><b>#1256</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>George A. Llanes</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Support for theme
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Low</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        2017/04/28
                                    </td>

                                    <td>
                                        2017/04/28
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#2542</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-3.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Jose D. Delacruz</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        New submission on your website
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-9.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning">Medium</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Closed</span>
                                    </td>

                                    <td>
                                        2008/04/25
                                    </td>

                                    <td>
                                        2008/04/25
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#320</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-5.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Phyllis K. Maciel</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Verify your new email address!
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        2017/04/20
                                    </td>

                                    <td>
                                        2017/04/25
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#1254</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-8.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Margeret V. Ligon</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Your application has been received!
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Closed</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#1020</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-9.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Erwin E. Brown</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        A new rating has been received
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-1.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning">Medium</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Closed</span>
                                    </td>

                                    <td>
                                        2013/08/11
                                    </td>

                                    <td>
                                        2013/08/30
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#854</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>William L. Trent</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Your Profile has been accepted
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#9501</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Amy R. Barnaby</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Homeworth for your property increased
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-3.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Low</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#3652</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-3.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Jessica T. Phillips</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Item Support Message sent
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-9.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning">Medium</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Closed</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#9852</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-5.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Debra J. Wilson</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Your item has been updated!
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#3652</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-4.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Luke J. Sain</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Your password has been reset
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Low</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#1352</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-5.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Karen R. Doyle</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Question regarding your Bootstrap Theme
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-8.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#3562</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-8.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Freddie J. Plourde</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Security alert for my account
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Low</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#3658</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-9.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Darrell J. Cook</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Christopher S. Ahmad
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-warning">Medium</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Closed</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#2251</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-8.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Mark C. Diaz</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Verify your new email address!
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-danger">High</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>#3654</b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-2.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                            <span class="ms-1"><b>Robert K. Joseph</b></span>
                                        </a>
                                    </td>

                                    <td>
                                        Support for theme
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <img src="assets/images/users/avatar-10.jpg" alt="contact-img"
                                                 title="contact-img" class="rounded-circle avatar-sm"/>
                                        </a>
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">Low</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-success">Open</span>
                                    </td>

                                    <td>
                                        01/04/2017
                                    </td>

                                    <td>
                                        21/05/2017
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle"
                                               data-toggle="dropdown" aria-expanded="false"><i
                                                        class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit
                                                    Ticket</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-check-all me-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i
                                                            class="mdi mdi-star me-2 font-18 text-muted vertical-middle"></i>Mark
                                                    as Favorite</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
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

<script src="assets/vendor/datatables.net/js/dataTables.min.js"></script>
<script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<!-- Tickets js -->
<script src="assets/js/pages/tickets.js"></script>

</body>

</html>