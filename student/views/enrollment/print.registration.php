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

}
/***
$sql_fees_statement ="";
$result_statement = mysqli_query($conn,$sql_fees_statement);
if(mysqli_num_rows($result_statement) > 0){
    $r=mysqli_fetch_assoc($result_statement);
}
 * **/
$tran_date = "Null";
$tran_index = "Null";
$bank = "Null";
$receipt = "Null";
$previous = "0.00";
$bill = "0.00";
$paid = "0.00";
$balance = "0.00";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>My First Bootstrap Page</h1>
    <p>Resize this responsive page to see the effect!</p>
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
    <div class="row">
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Date:</b> <?php echo $tran_date ;?></li>
                <li class="list-group-item"><b>Ref. Index:</b> <?php echo $tran_index;?></li>
                <li class="list-group-item"><b>Bank:</b> <?php echo $bank;?></li>
                <li class="list-group-item"><b>Receipt No:</b> <?php echo $receipt;?></li>
            </ul>
        </div>
        <div class="col-sm-6">
            <ul class="list-group">
                <li class="list-group-item"><b>Previous Balance:</b> <?php echo $previous;?></li>
                <li class="list-group-item"><b>Amount Due:</b> <?php echo $bill;?></li>
                <li class="list-group-item"><b>Amount Paid:</b> <?php echo $paid;?></li>
                <li class="list-group-item"><b>Balance:</b> <?php echo $balance;?></li>
            </ul>
        </div>
    </div>
    <hr style="width: 100%; color: black; height: 1px; background-color:black;">
    <h4>C. SCHOOL/DEPARTMENT: COURSE REGISTRATION</h4>
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
                <?php

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

                ?>
            </tbody>
        </table>
        <small><b>NB</b>: 1. All trailed course must be registered first. 2. Total credit should not be more than eighteen</small>
    </div>

</div>







