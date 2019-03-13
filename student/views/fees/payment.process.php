<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/03/2019
 * Time: 12:58 AM
 */
if (isset($_SESSION['studentID'])) {
    $id = $_SESSION['studentID'];
    $sql = "SELECT * FROM `get_student_profile_detail` where `studentID` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows === 0) {

        $date = "";
        $f_name = "";
        $l_name = "";
        $admission = "";
        $mobile = "";
        $mobile2 = "";
        $email = "";
        $categoryID = "";
        $statusID = "";
    } else {
        $r = $result->fetch_assoc();
        $f_name = $r['first_name'];
        $l_name = $r['surname'];
        $admission = $r['admissionNo'];
        $mobile = $r['mobile1'];
        $mobile2 = $r['mobile2'];
        $email = $r['email'];
        $yearID = $r['yearID'];
        $progID = $r['progID'];
        $categoryID = $r['categoryID'];
        $statusID = $r['statusID'];
    }
}

$date = $_SESSION['st-date'];
$receipt = $_SESSION['st-receipt'];
$studentID = $_SESSION['st-id'];
$name = $_SESSION['st-name'];
$surname = $_SESSION['st-surname'];
$admission = $_SESSION['st-admission'];
$academYr = $_SESSION['st-acadYr'];
$semester = $_SESSION['st-semester'];
$programme = $_SESSION['st-programme'];
$level = $_SESSION['st-level'];
$amount = $_SESSION['st-amount'];
$bill_amount=$_SESSION['st-bill'];

$bal = $bill_amount-$amount;

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
                            <label class="col-sm-3 col-form-label">Academy Year</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo $academYr;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo DASHBOARD::semester($semester);?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo DASHBOARD::programme($conn,$programme);?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo $level;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bill</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly value="<?php echo $bill_amount;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" class="form-control" value="<?php echo $amount;?>" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" class="form-control" value="<?php echo $bal;?>" placeholder="0.00" />
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
