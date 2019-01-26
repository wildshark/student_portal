<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 21/01/2019
 * Time: 6:17 AM
 */

if(!isset($_GET['d'])) {
    $button = "add-admin-account";
    $username ="";
    $password ="";
    $email ="";
    $accessID ="";
}else{

    $id = $_GET['d'];
    $_SESSION['id']=$id;
    $button = "edit-admin-account";

    $sql = "SELECT * FROM `get_admin` WHERE userID='$id' LIMIT 0, 1";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows >0){
        $r = $result->fetch_assoc();

        $username =$r['username'];
        $password = $r['password'];
        $email = $r['email'];
        $accessID = $r['access'];
    }

    $button = "edit-admin-account";
}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Portal PIN Generator</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" name="username" value="<?php echo $username;?>" class="form-control" id="exampleInputName1" placeholder="pins">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Password</label>
                            <input type="text" name="password" value="<?php echo $password;?>" class="form-control" id="exampleInputName1" placeholder="index">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" name="email" value="<?php echo $email;?>" class="form-control" id="exampleInputName1" placeholder="mobile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Access</label>
                            <input type="text" name="access" value="<?php echo $accessID;?>" class="form-control" id="exampleInputName1" placeholder="mobile">
                        </div>
                        <button type="submit" name="submit" value="<?php echo $button;?>" class="btn btn-success mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Paragraph</h4>
            <p class="card-description">
                Write text in
                <code>&lt;p&gt;</code> tag
            </p>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                text ever since the 1500s, when an unknown printer took a galley not only five centuries,
            </p>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">PIN List</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Access</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php admin_users($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

