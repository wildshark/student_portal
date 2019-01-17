<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 6:58 PM
 */

if(!isset($_GET['d'])){

    $ref_no = "A".date("ymdHis");
    $button = "add-fees-payment";
    $studentID ="";
    $student ="";
    $programmeID = "";
    $programme ="";
    $levelID ="";
    $semesterID ="";
    $year ="";
    $bank="";
    $ref="";
    $amount="";

}else{

    $id = $_GET['d'];
    $_SESSION['id'] = $id;
    $sql ="SELECT * FROM `get_fees_payment_details` where feeID ='$id' LIMIT 0,1";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0) {
        $r = $result->fetch_assoc();

        $ref_no = $r['ref_index'];

        $studentID = $r['studentID'];
        $student = $r['name'];
        $programmeID = $r['progID'];
        $programme = $r['programme'];;
        $levelID =$r['level'];
        $semesterID =$r['semesterID'];
        $year =$r['yearID'];
        $bank=$r['bank'];
        $ref=$r['ref'];
        $amount=$r['amount'];

    }
    $button = "edit-fees-payment";

}

?>
<div class="col-md-6 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Fees Payment Details</h4>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="forms-sample" enctype="application/x-www-form-urlencoded">
                        <div class="form-group">
                            <label for="exampleInputName1">Ref. Index</label>
                            <input type="text" name="ref-index" value="<?php echo $ref_no;?>" class="form-control" id="exampleInputName1" placeholder="pins">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Payment Date</label>
                            <input type="date" name="date" class="form-control" id="exampleInputName1" placeholder="Y-m-d">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Student</label>
                            <select name="student" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $studentID;?>"><?php echo $student;?></option>
                                <?php cmb_student_index($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Programme</label>
                            <select name="programme" class="form-control">
                                <option value="<?php echo $programmeID;?>"><?php echo $programme;?></option>
                                <?php cmb_programme_data($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Level</label>
                            <select name="level" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $levelID;?>"><?php echo $levelID;?></option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                                <option value="400">400</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Semester</label>
                            <select name="semester" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                <option value="<?php echo $semesterID;?>"><?php echo semester($semesterID);?></option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Academy Year</label>
                            <select name="year" class="form-control">
                                <option value="<?php echo $year;?>"><?php echo $year;?></option>
                                <?php cmb_academic_session($conn);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Bank</label>
                            <input type="text" name="bank" value="<?php echo $bank;?>" class="form-control" id="exampleInputName1" placeholder="ref no">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Receipt No#</label>
                            <input type="text" name="ref" value="<?php echo $ref;?>" class="form-control" id="exampleInputName1" placeholder="ref no">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Amount</label>
                            <input type="text" name="amount" value="<?php echo $amount;?>" class="form-control" id="exampleInputName1" placeholder="0.00">
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
            <h4 class="card-title">Booked Details</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleInputName1">Total Fees</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="0.000">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Total Payment</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="0.000">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Balance Due</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="0.000">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Member of the room</h4>
            <p class="card-description">
                Basic form elements
            </p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>PINs</th>
                        <th>Index No#</th>
                        <th>Mobile</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php pin_generated($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

