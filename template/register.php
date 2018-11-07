<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 11:54 PM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php";?>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <h2 class="text-center mb-4">Register</h2>
                    <div class="auto-form-wrapper">
                        <form action="<?php echo $_INDEX;?>" method="POST" enctype="application/x-www-form-urlencoded">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                    <div class="input-group-append">
                                          <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                          </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="voucher" class="form-control" placeholder="Voucher">
                                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> I agree to the terms
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Register" class="btn btn-primary submit-btn btn-block">
                            </div>
                            <div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Already have and account ?</span>
                                <a href="?_route=login" class="text-black text-small">Login</a>
                            </div>
                        </form>
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
