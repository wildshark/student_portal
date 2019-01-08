<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_template->tilte;?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="asset/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="asset/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="asset/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="asset/images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="asset/images/logo-mini.svg" alt="logo" />
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link">Schedule
                        <span class="badge badge-primary ml-1">New</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-elevation-rise"></i>Reports</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-file-document-box"></i>
                        <span class="count">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <div class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                            </p>
                            <span class="badge badge-info badge-pill float-right">View all</span>
                        </div>
                        <?php top_menu::email_menu();?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell"></i>
                        <span class="count">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <?php top_menu::notifications_menu();?>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, Richard V.Welsh !</span>
                        <img class="img-xs rounded-circle" src="asset/images/faces/face1.jpg" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <?php top_menu::profile_menu();?>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <?php stuSideMenu::nav_student_profile();?>
                </li>
                <?php stuSideMenu::menu_activated();?>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row purchace-popup">
                    <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Like what you see? Check out our premium version for more.</p>
                <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
              </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                                    </div>
                                    <div class="float-right">
                                        <p class="mb-0 text-right">Total Revenue</p>
                                        <div class="fluid-container">
                                            <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                                    </div>
                                    <div class="float-right">
                                        <p class="mb-0 text-right">Total Student</p>
                                        <div class="fluid-container">
                                            <h3 class="font-weight-medium text-right mb-0">3455</h3>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="mdi mdi-poll-box text-success icon-lg"></i>
                                    </div>
                                    <div class="float-right">
                                        <p class="mb-0 text-right">Total Application</p>
                                        <div class="fluid-container">
                                            <h3 class="font-weight-medium text-right mb-0">5693</h3>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                        <div class="card card-statistics">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="mdi mdi-account-location text-info icon-lg"></i>
                                    </div>
                                    <div class="float-right">
                                        <p class="mb-0 text-right">Employees</p>
                                        <div class="fluid-container">
                                            <h3 class="font-weight-medium text-right mb-0">246</h3>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-muted mt-3 mb-0">
                                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Orders</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>
                                                Pin
                                            </th>
                                            <th>
                                                Index
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Programme
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo dashboard_student_list($conn);?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Manage Tickets</h5>
                                <div class="fluid-container">
                                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                        <div class="col-md-1">
                                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face1.jpg" alt="profile image">
                                        </div>
                                        <div class="ticket-details col-md-9">
                                            <div class="d-flex">
                                                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
                                                <p class="text-primary mr-1 mb-0">[#23047]</p>
                                                <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
                                            </div>
                                            <p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
                                                vivamus.
                                            </p>
                                            <div class="row text-gray d-md-flex d-none">
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted text-muted">3 hours ago</small>
                                                </div>
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-actions col-md-2">
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-history fa-fw"></i>Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                        <div class="col-md-1">
                                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face2.jpg" alt="profile image">
                                        </div>
                                        <div class="ticket-details col-md-9">
                                            <div class="d-flex">
                                                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
                                                <p class="text-primary mr-1 mb-0">[#23135]</p>
                                                <p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
                                            </div>
                                            <p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet
                                                nisl.
                                            </p>
                                            <div class="row text-gray d-md-flex d-none">
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted">Last responded :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                                                </div>
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted">Due in :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-actions col-md-2">
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-history fa-fw"></i>Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ticket-card mt-3">
                                        <div class="col-md-1">
                                            <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face3.jpg" alt="profile image">
                                        </div>
                                        <div class="ticket-details col-md-9">
                                            <div class="d-flex">
                                                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
                                                <p class="text-primary mr-1 mb-0">[#23246]</p>
                                                <p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                                            </div>
                                            <p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
                                            <div class="row text-gray d-md-flex d-none">
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted">Last responded :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                                                </div>
                                                <div class="col-4 d-flex">
                                                    <small class="mb-0 mr-2 text-muted">Due in :</small>
                                                    <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ticket-actions col-md-2">
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Manage
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-history fa-fw"></i>Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="asset/vendors/js/vendor.bundle.base.js"></script>
<script src="asset/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="asset/js/off-canvas.js"></script>
<script src="asset/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="asset/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>