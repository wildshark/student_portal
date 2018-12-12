<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 04/11/2018
 * Time: 8:57 AM
 */

if (!isset($_SESSION['student_index'])){
 exit();
}else{
    $admission = $_SESSION['student_index'];
    $sql = "SELECT * FROM get_student_profile_detail where admissionNo='$admission'";
    $result = (mysqli_query($conn,$sql));

    if ($result->num_rows < 0) {
        $entryID = "";
        $date= "";
        $serial = "";
        $f_name = "";
        $l_name = "";
        $genderID ="";
        $nationalityID ="";
        $nationality = "";
        $dob = "";
        $maritalID = "";
        $address = "";
        $admission ="";
        $mobile = "";
        $mobile2 ="";
        $email ="";
        $progID = "";
        $programme = "";
        $prefix = "";
        $categoryID = "";
        $stream = "";
        $campus_status = "";
        $username = "";
        $password = "";
        $statusID = "";
    }else{

        $r = $result->fetch_assoc();

        $entryID = $r['entryID'];
        $date = $r['admissionDate'];
        $serial = $r['serial_no'];
        $f_name = $r['first_name'];
        $l_name = $r['surname'];
        $admission = $r['admissionNo'];
        $genderID = $r['gender'];
        $dob = $r['dob'];
        $maritalID = $r['marital_status'];
        $nationalityID = $r['nationalityID'];
        $nationality = $r['nationality'];
        $address = $r['address'];
        $mobile = $r['mobile1'];
        $mobile2 = $r['mobile2'];
        $email = $r['email'];
        $progID = $r['progID'];
        $programme = $r['programme'];
        $prefix = $r['prefix'];
        $categoryID = $r['categoryID'];
        $streamID = $r['streamID'];
        $hostID = $r['campus_status'];
        $token = $r['token'];
        $statusID = $r['statusID'];
    }
}
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo "Profile: ". $_SESSION['student_name']." | ".$_SESSION['student_index'];?></h4>
            <form class="form-sample">
                <p class="card-description">
                    <h4>Personal Info:</4>
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input name="f-name" value="<?php echo date("d D M Y");?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Application</label>
                            <div class="col-sm-9">
                                <select name="marital-status" class="form-control">
                                    <option value="<?php echo $entryID?>" ><?php echo student_application_mode($entryID);?></option>
                                    <option value="1">Direct Entry</option>
                                    <option value="2">Mature Entry</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                                <input name="f-name" value="<?php echo $f_name;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input name="l-name" value="<?php echo $l_name;?>" type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option class="active" value="<?php echo $genderID;?>"><?php echo gender($genderID);?></option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" name="dob" value="<?php echo $dob;?>" class="form-control" placeholder="dd/mm/yyyy" />
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
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <select name="programme" class="form-control">
                                    <option class="active" value="<?php echo $progID?>"><?php echo $programme?></option>
                                    <?php cmb_programme_data($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option class="active" value="<?php echo $categoryID?>"><?php echo  student_category_type($categoryID);?></option>
                                    <option value="1">Local Student</option>
                                    <option value="2">Foreign Student</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Stream</label>
                            <div class="col-sm-9">
                                <select name="stream" class="form-control">
                                    <option class="active" value="<?php echo $streamID?>"><?php echo student_stream($streamID);?></option>
                                    <option value="1">Regular</option>
                                    <option value="2">Weekend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hostel Status</label>
                            <div class="col-sm-9">
                                <select name="hostel-status" class="form-control">
                                    <option class="active" value="<?php echo $hostelID?>"><?php echo student_hostel_status($hostID);?></option>
                                    <option value="1">I live on campus</option>
                                    <option value="2">I live off campus</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button type="submit" name="submit" value="update" class="btn btn-primary btn-fw">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>