<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 9:08 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";?>
</head>

<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class='navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row'>
        <div class='text-center navbar-brand-wrapper d-flex align-items-top justify-content-center'>
            <a class='navbar-brand brand-logo' href='index.html'>
                <img src='asset/images/logo.svg' alt='logo' />
            </a>
            <a class='navbar-brand brand-logo-mini' href='index.html'>
                <img src='asset/images/logo-mini.svg' alt='logo' />
            </a>
        </div>
        <div class='navbar-menu-wrapper d-flex align-items-center'>
            <ul class='navbar-nav navbar-nav-left header-links d-none d-md-flex'>
                <li class='nav-item'>
                    <a href='index.php?_route=student&p=profile' class='nav-link'>
                        <i class='mdi mdi-account'></i>Profile</a>
                </li>
                <li class='nav-item'>
                    <a href='#' class='nav-link'>Schedule
                        <span class='badge badge-primary ml-1'>New</span>
                    </a>
                </li>
                <li class='nav-item active'>
                    <a href='#' class='nav-link'>
                        <i class='mdi mdi-elevation-rise'></i>Reports</a>
                </li>
                <li class='nav-item'>
                    <a href='#' class='nav-link'>
                        <i class='mdi mdi-bookmark-plus-outline'></i>Score</a>
                </li>
            </ul>
            <ul class='navbar-nav navbar-nav-right'>
                <li class='nav-item dropdown'>
                    <a class='nav-link count-indicator dropdown-toggle' id='messageDropdown' href='#' data-toggle='dropdown' aria-expanded='false'>
                        <i class='mdi mdi-file-document-box'></i>
                        <span class='count'>7</span>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right navbar-dropdown preview-list' aria-labelledby='messageDropdown'>
                        <?php ?>
                    </div>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link count-indicator dropdown-toggle' id='notificationDropdown' href='#' data-toggle='dropdown'>
                        <i class='mdi mdi-bell'></i>
                        <span class='count'>4</span>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right navbar-dropdown preview-list' aria-labelledby='notificationDropdown'>
                        <a class='dropdown-item'>
                            <p class='mb-0 font-weight-normal float-left'>You have 4 new notifications
                            </p>
                            <span class='badge badge-pill badge-warning float-right'>View all</span>
                        </a>
                        <?php top_menu::notification();?>
                    </div>
                </li>
                <li class='nav-item dropdown d-none d-xl-inline-block'>
                    <a class='nav-link dropdown-toggle' id='UserDropdown' href='#' data-toggle='dropdown' aria-expanded='false'>
                        <?php top_menu::student_menu();?>
                    </a>
                    <div class='dropdown-menu dropdown-menu-right navbar-dropdown' aria-labelledby='UserDropdown'>
                        <?php top_menu:: profile_menu();?>
                    </div>
                </li>
            </ul>
            <button class='navbar-toggler navbar-toggler-right d-lg-none align-self-center' type='button' data-toggle='offcanvas'>
                <span class='mdi mdi-menu'></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <?php
                if ($_REQUEST['_route'] === "student"){
                    stuSideMenu::nav_student_profile();
                    stuSideMenu::menu_activated();
                }
                ;?>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <?php include_once $_template->view;?>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"><?php echo $_template->copyrigth;?></span>
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
<script src='asset/js/chart.js'></script>
<!-- End custom js for this page-->
</body>

</html>
