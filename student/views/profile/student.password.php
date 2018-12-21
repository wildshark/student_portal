<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 8:24 AM
 */

if (isset($_SESSION['token'])){
    $token = $_SESSION['token'];
    $sql = "SELECT * FROM `get_all_pins`  where `token` = '$token'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows === 0){
        $username = "";
        $password = "";
        $mobile = "";
        $email ="";
        $token = "";
        $status = "";
    }else{
        $r = $result->fetch_assoc();
        $username = $r['username'];
        $password = $r['password'];
        $email = $r['email'];
        $mobile = $r['mobile'];
        $token = $r['token'];
        $status = $r['status'];
    }
}
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Password Details</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-sample" enctype="application/x-www-form-urlencoded">
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input name="username" readonly value="<?php echo $username;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input name="password" value="<?php echo $password;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input name="mobile" value="<?php echo $mobile;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input name="email" value="<?php echo $email;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <input name="key" value="<?php echo date("YmdHis");?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Stamp</label>
                            <div class="col-sm-9">
                                <input name="stamp" value="<?php echo "ghc".rand(10,99)."".$token;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <button type="submit" name="submit" value="update-password" class="btn btn-primary btn-fw">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
