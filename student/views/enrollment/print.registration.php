<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 18/01/2019
 * Time: 4:18 AM
 */

$programmeID = $_GET['pg'];
$studentID =  $_SESSION['student_index_id'];
$level = $_GET['l'];
$semester = $_GET['s'];
$school = $_GET['sch'];
$admission = $_GET['adm'];
$yearID = $_GET['y'];

$sql_student ="SELECT * FROM `get_student_enrollment` where studentID ='$studentID' and progID='$programmeID' and semesterID ='$semester' and s_level='$level'  LIMIT 0,1";
$result = mysqli_query($conn,$sql_student);
if(mysqli_num_rows($result) > 0){
    $r=mysqli_fetch_assoc($result);

    $year = $r['yearID'];
    $semester =$r['semester'];
    $school= $r['school']." - ". $r['prefix'];
    $date= $r['enroll_date'];
    $student = $r['name'];
    $index = $r['stud_index'];
    $level = $r['s_level'];
    $s_programme = $r['programme'];

    if($r['prefix'] == "SOT"){
        $type = "ACI";
    }else{
        $type = "UDS";
    }

}

function student_course_registration($conn,$studentID){

    $sql_registration ="SELECT * FROM `get_course_registrated` where studentID ='$studentID'";
    $result_registration = mysqli_query($conn,$sql_registration);
    if(mysqli_num_rows($result_registration) > 0){
        while ($r=mysqli_fetch_assoc($result_registration)){
            if(isset($r['course'])){
                $course = $r['course'];
            }else{
                $course = "unknown course";
            }

            if (isset($r['course_code'])){
                $c_code = $r['course_code'];
            }else{
                $c_code = "unknown code";
            }

            if (isset($r['credit'])){
                $credit = $r['credit'];
            }else{
                $credit = "unknown credit";
            }

            echo"
                            <tr>
                                <td>{$c_code}</td>
                                <td>{$course}</td>
                                <td>{$credit}</td>
                            </tr>
                            ";
        }
    }
}

function fees_account_printout($conn,$studentID){

    $sql_fees_paid ="SELECT * FROM `get_fees_payment_details` WHERE studentID='$studentID' AND typeID = '2' ORDER BY feeID DESC";
    $result_paid = mysqli_query($conn,$sql_fees_paid);
    if(mysqli_num_rows($result_paid) == 0){
        $tran_date = '';
        $tran_index = '';
        $bank = '';
        $receipt = '';
        $paid = '';
    }else{
        $p=mysqli_fetch_assoc($result_paid);

        $tran_date = $p['tranDate'];
        $tran_index = $p['ref_index'];
        $bank = $p['bank'];
        $receipt = $p['ref'];
        $paid = $p['paid'];
    }

    $sql_fees_bill ="SELECT * FROM `get_fees_payment_details` WHERE studentID='$studentID' AND typeID = '1' ORDER BY feeID DESC";
    $result_bill = mysqli_query($conn,$sql_fees_bill);
    if(mysqli_num_rows($result_bill) == 0){
        $bill = '';
    }else{
        $r=mysqli_fetch_assoc($result_bill);

        $bill = $r['bill'];
    }

    $sql_fees_balance ="SELECT * FROM `get_fees_payment_total` WHERE studentID='$studentID' LIMIT 0, 1";
    $result_balance = mysqli_query($conn,$sql_fees_balance);
    if(mysqli_num_rows($result_balance) == 0){
        $balance = '';
    }else{
        $bal = mysqli_fetch_assoc($result_balance);

        $balance = $bal['Balance'];
    }

    echo"
    
        <div class='row'>
            <div class='col-sm-6'>
                <ul class='list-group'>
                    <li class='list-group-item'><b>Date:</b> {$tran_date}</li>
                    <li class='list-group-item'><b>Ref. Index:</b> {$tran_index}</li>
                    <li class='list-group-item'><b>Bank:</b> {$bank}</li>
                    <li class='list-group-item'><b>Receipt No:</b> {$receipt}</li>
                    <li class='list-group-item'><b>Account Officer(Name):</b> </li>
                </ul>
            </div>
            <div class='col-sm-6'>
                <ul class='list-group'>
                    <li class='list-group-item'><b>Previous Balance:</b> </li>
                    <li class='list-group-item'><b>Amount Due:</b> {$bill}</li>
                    <li class='list-group-item'><b>Amount Paid:</b> {$paid}</li>
                    <li class='list-group-item'><b>Balance:</b> {$balance}</li>
                    <li class='list-group-item'><b>Signature:</b> </li>
                </ul>
            </div>
        </div>
    
    ";

}

function hostel_booking_printout($conn,$studentID){

    $sql ="SELECT * FROM `get_hostel_complete_booking` WHERE studentID='$studentID'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 0){

        $ref ="";
        $room = "";
        $residence ="";
        $warden ="";
    }else {
        $r = mysqli_fetch_assoc($result);

        $ref = $r['ref_no'];;
        $room = $r['room'];
        if (isset($room)) {
            $residence = "RESIDENCE";
        } else {
            $residence = "NON-RESIDENCE";
        }

        $warden = $r['block_name'];
    }
    echo"
        <div class='row'>
            <div class='col-sm-6'>
                <ul class='list-group'>
                    <li class='list-group-item'><b>Hostel Fee RCT No:</b> {$ref}</li>
                    <li class='list-group-item'><b>Hall/Room Allocated :</b> {$room}</li>
                    <li class='list-group-item'><b>Residence Status:</b> {$residence}</li>
                </ul>
            </div>
            <div class='col-sm-6'>
                <ul class='list-group'>
                    <li class='list-group-item'><b>Hostel Warden:</b> {$warden}</li>
                    <li class='list-group-item'><b>Signature:</b></li>
                    <li class='list-group-item'><b>Date:</b> </li>
                </ul>
            </div>
        </div>
    ";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h2>GHANA CHRISTIAN UNIVERSITY COLLEGE/<?php echo $type;?></h2>
    <p>STUDENT REGISTRATION FROM - <?php echo strtoupper($s_programme)." LEVEL".$level." (".strtoupper($semester).")";?>.</p>
    <p>GHANACUC IDENTIFICATION NUMBER <?php echo $index;?>.</p>
    <small>(FOR CONTINUING STUDENT ONLY. FRESH STUDENTS SHALL BE GIVE IDENTIFICATION NUMBERS AT THE END OF THE REGISTRATION)</small>
</div>

<div class="container">
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>A. PERSONAL</h4>
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Student Name:</b> <?php echo $student;?></li>
                <li class="list-group-item"><b>Index Number:</b> <?php echo $index;?></li>
                <li class="list-group-item"><b>Programme:</b> <?php echo $s_programme;?></li>
                <li class="list-group-item"><b>Level:</b> <?php echo $level;?></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Date:</b> <?php echo $date;?></li>
                <li class="list-group-item"><b>Academic Year:</b> <?php echo $year;?></li>
                <li class="list-group-item"><b>Semester:</b> <?php echo $semester;?></li>
                <li class="list-group-item"><b>School:</b> <?php echo $school;?></li>
            </ul>
        </div>
    </div>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>B. FINANCE OFFICE</h4>
        <?php fees_account_printout($conn,$studentID)?>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>C. SCHOOL/DEPARTMENT: COURSE REGISTRATION</h4>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Course Title</th>
                    <th>Credit</th>
                </tr>
                </thead>
                <tbody>
                    <?php student_course_registration($conn,$studentID) ?>
                </tbody>
            </table>
            <small><b>NB</b>: 1. All trailed course must be registered first. 2. Total credit should not be more than eighteen</small>
        </div>
    </div>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>D. HOSTEL WARDEN</h4>
        <?php hostel_booking_printout($conn,$studentID);?>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>E. HOD/DEAN'S APPROVAL</h4>
    <small>(For Office Use Only)</small>
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Note:</b> <?php //echo $tran_date ;?></li>
                <li class="list-group-item">*<?php //echo $tran_index;?></li>
                <li class="list-group-item">*<?php //echo $bank;?></li>
                <li class="list-group-item">*<?php //echo $receipt;?></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Name:</b> <?php //echo $previous;?></li>
                <li class="list-group-item"><b>Signature:</b> <?php //echo $bill;?></li>
                <li class="list-group-item"><b>Date:</b> <?php //echo $paid;?></li>
            </ul>
        </div>
    </div>
</div>







