<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21/12/2018
 * Time: 7:52 AM
 */

unset($_SESSION);
unset($_COOKIE);

?>
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
    <!-- inject:css -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="asset/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0">200</h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                            <h2>UPDATE!</h2>
                            <h3 class="font-weight-light">Your account have been change.</h3>
                            <h3 class="font-weight-light">Try login again.</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a class="text-white font-weight-medium" href="index.php">Login</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mt-xl-2">
                            <p class="text-white font-weight-medium text-center">Copyright &copy; 2018 All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="asset/vendors/js/vendor.bundle.base.js"></script>
<script src="asset/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="asset/js/off-canvas.js"></script>
<script src="asset/js/misc.js"></script>
<!-- endinject -->
</body>

</html>
