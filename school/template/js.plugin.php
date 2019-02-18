<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 11:05 PM
 */

function js_dashboard(){
    return"
        <!-- plugins:js -->
        <script src='asset/vendors/js/vendor.bundle.base.js'></script>
        <script src='asset/vendors/js/vendor.bundle.addons.js'></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src='asset/js/off-canvas.js'></script>
        <script src='asset/js/misc.js'></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src='asset/js/dashboard.js'></script>
        <!-- End custom js for this page-->
        ";
}

function js_form(){
    return"
        <!-- plugins:js -->
        <script src='asset/vendors/js/vendor.bundle.base.js'></script>
        <script src='asset/vendors/js/vendor.bundle.addons.js'></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src='asset/js/off-canvas.js'></script>
        <script src='asset/js/misc.js'></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <!-- End custom js for this page-->
        ";
}

function js_chart(){
    return"
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src='asset/vendors/js/vendor.bundle.base.js'></script>
        <script src='asset/vendors/js/vendor.bundle.addons.js'></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src='asset/js/off-canvas.js'></script>
        <script src='asset/js/misc.js'></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src='asset/js/chart.js'></script>
        <!-- End custom js for this page-->
        ";
}

/**
switch ($_GET['p']){

    case "dashboard";
        echo js_dashboard();
    break;

    default:
        echo js_form();
}
 ***/