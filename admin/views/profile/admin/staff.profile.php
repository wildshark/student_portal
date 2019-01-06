<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06/01/2019
 * Time: 9:54 AM
 */
if (isset( $_SESSION['user-id'])){
    $id =  $_SESSION['user-id'];
    $sql = "SELECT * FROM `get_staff_profile` where user_log_ID ='$id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows === 0){
        $date = "";
        $staff_id = "";
        $f_name ="";
        $l_name = "";
        $dob = "";
        $maritalID = "";
        $genderID = "";
        $nationalityID = "";
        $nationality = "";
        $categoryID = "";
        $positionID = "";
        $position = "";
        $departmentID = "";
        $department = "";
        $email = "";
        $mobile = "";
        $mobile2 = "";
        $address = "";
        $ssn = "";
        $bankID = "";
        $acctName = "";
        $acctNumber = "";
        $emerge_name = "";
        $emerge_phone = "";
        $emerge_email = "";
        $emerge_address = "";
        $operation_status = "";
        $aos = "";
        $photo = "";
        $user_token = "";
        $statusID = "";
    }else{
        $r = $result->fetch_assoc();
        $date = $r['employDate'];
        $staff_id = $r['staffID'];
        $f_name = $r['f_name'];
        $l_name = $r['l_name'];
        $dob = $r['dob'];
        $maritalID = $r['marital_status'];
        $genderID = $r['genderID'];
        $nationalityID = $r['countryID'];
        $nationality = $r['nationality'];
        $categoryID = $r['categoryID'];
        $positionID = $r['positionID'];
        $position = $r['position'];
        $departmentID = $r['departmentID'];
        $department = $r['department'];
        $email = $r['email'];
        $mobile = $r['mobile1'];
        $mobile2 = $r['mobile2'];
        $address = $r['address'];
        $ssn = $r['ssn'];
        $bankID = $r['bankID'];
        $acctName = $r['acctName'];
        $acctNumber = $r['acctNumber'];
        $emerge_name = $r['emerge_name'];
        $emerge_phone = $r['emerge_phone'];
        $emerge_email = $r['emerge_email'];
        $emerge_address = $r['emerge_address'];
        $operation_status = $r['operation_status'];
        $aos = $r['aos'];
        $photo = $r['photo'];
        $user_token = $r['token'];
        $statusID = $r['statusID'];
    }

}

?>

<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"><?php echo "Profile: ". $staff_id;?></h3>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-sample">
                <p class="card-description">
                <h4>Personal Info:</4>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employment Date</label>
                            <div class="col-sm-9">
                                <input name="date" readonly value="<?php echo date("Y-mm-d");?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Staff ID</label>
                            <div class="col-sm-9">
                                <input name="staffID" readonly value="<?php echo $staff_id;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input name="f-name" readonly value="<?php echo $f_name;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input name="l-name" readonly value="<?php echo $l_name;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select name="gender" class="form-control">
                                    <option class="active" value="<?php echo $genderID;?>"><?php echo gender($genderID);?></option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="dob" value="<?php echo $dob;?>" class="form-control" placeholder="yyyy/mm/dd" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nationality</label>
                            <div class="col-sm-9">
                                <select name="nationality" class="form-control">
                                    <option class="active" value="<?php echo $nationalityID;?>"><?php echo $nationality;?></option>
                                    <?php cmb_nationality($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marital Status</label>
                            <div class="col-sm-9">
                                <select name="marital-status" class="form-control">
                                    <option class="active" value="<?php echo $maritalID;?>"><?php echo marital_status($maritalID);?></option>
                                    <option value="1">Single</option>
                                    <option value="2">Married</option>
                                    <option value="3">Divorce</option>
                                    <option value="4">Windowed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                <h4> Address:</h4>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile No#</label>
                            <div class="col-sm-9">
                                <input name="mobile-1" value="<?php echo $mobile;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Home Mobile No#</label>
                            <div class="col-sm-9">
                                <input name="mobile-2" value="<?php echo $mobile2;?>" type="text" class="form-control" />
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
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input name="address" value="<?php echo $address;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                <h4>Programme Enrolled:</h4>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select name="department" class="form-control">
                                    <option class="active" value="<?php echo $departmentID;?>"><?php echo $department;?></option>
                                    <?php department($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category" class="form-control">
                                    <option class="active" value="<?php echo $categoryID?>"><?php echo $categoryID;?></option>
                                    <option value="1">Local Student</option>
                                    <option value="2">Foreign Student</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <select name="position" class="form-control">
                                    <option class="active" value="<?php echo $positionID?>"><?php echo $position;?></option>
                                    <?php position($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hostel Status</label>
                            <div class="col-sm-9">
                                <select name="hostel" class="form-control">
                                    <option class="active" value="<?php echo $hostelID?>"><?php echo student_hostel_status($hostelID);?></option>
                                    <option value="1">I live on campus</option>
                                    <option value="2">I live off campus</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button type="submit" name="submit" value="update-profile" class="btn btn-primary btn-fw">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
