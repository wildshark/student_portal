<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11/03/2019
 * Time: 5:30 AM
 */
if (isset($_SESSION['studentID'])){
    $id = $_SESSION['studentID'];
    $sql = "SELECT * FROM `get_student_profile_detail` where `studentID` = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows === 0){
        $entryID = "";
        $date = "";
        $serial = "";
        $f_name = "";
        $l_name = "";
        $admission = "";
        $genderID = "";
        $dob = "";
        $maritalID = "";
        $nationalityID = "";
        $nationality = "";
        $address = "";
        $mobile = "";
        $mobile2 = "";
        $email = "";
        $yearID="";
        $progID = "";
        $programme = "";
        $prefix = "";
        $categoryID = "";
        $streamID = "";
        $hostelID = "";
        $token = "";
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
        $mobile = $r['mobile1'];
        $mobile2 = $r['mobile2'];
        $email = $r['email'];
        $yearID = $r['yearID'];
        $progID = $r['progID'];
        $programme = $r['programme'];
        $prefix = $r['prefix'];
        $categoryID = $r['categoryID'];
        $streamID = $r['streamID'];
        $hostelID = $r['campus_status'];
        $token = $r['token'];
        $statusID = $r['statusID'];
    }

}
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Enrollment</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-sample" enctype="multipart/form-data">
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" readonly class="form-control" value="<?php echo date("Y-m-d")?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Receipt No</label>
                            <div class="col-sm-9">
                                <input type="text" name="receipt" readonly value="<?php echo "GCU-".date("yHmids");?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Index Number</label>
                            <div class="col-sm-9">
                                <input type="text" name="index" readonly value="<?php echo $admission;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" readonly class="form-control" value="<?php echo $f_name;?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Surname</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo $l_name;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Academy Year</label>
                            <div class="col-sm-8">
                                <select name="year" class="form-control">
                                    <option value=""></option>
                                    <?php cmb_academic_session($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                                <select name="semester" class="form-control">
                                    <option value=""></option>
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <select name="programme" class="form-control">
                                    <option value=""></option>
                                    <?php cmb_programme_data($conn);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" class="form-control">
                                    <option value=""></option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Currency</label>
                            <div class="col-sm-9">
                                <select name="currency"  class="form-control">
                                    <option value="USD">United States Dollar</option>
                                    <option value="NGN">Nigerian Naira</option>
                                    <option value="GHS">Ghanaian cedi</option>
                                    <option value="KES">Kenyan Shilling</option>
                                    <option value="UGX">Ugandan Shilling</option>
                                    <option value="TZS">Tanzanian Shilling</option>
                                    <option value="SLL">Sierra Leonean Leone</option>
                                    <option value="ZMW">Zambian Kwacha</option>
                                    <option value="ZAR">South African Rand</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" class="form-control" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" name="submit" value="make-fees-payment" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Enrollment Details</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Year</th>
                        <th>Programme</th>
                        <th>Semester</th>
                        <th>Level</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php enrollment_details($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


