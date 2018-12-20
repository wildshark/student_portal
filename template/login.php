<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";?>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="label">Index Number</label>
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Index Number">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="*********">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary submit-btn btn-block">
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> Keep me signed in
                                    </label>
                                </div>
                                <a href="?_route=recovery" class="text-small forgot-password text-black">Forgot Password</a>
                            </div>
                            <div class="form-group">
                                <a href="?_route=register" class="btn btn-dark btn-block">Register</a>
                            </div>
                        </form>
                    </div>
                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center"><?php echo $_template->copyrigth;?></p>
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