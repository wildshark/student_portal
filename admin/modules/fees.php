<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/01/2019
 * Time: 9:18 AM
 */

class FEES{

    function add_fees_payment($conn){

        $now = date("Y-m-d h:i:s");
        $pay_date = $_POST['date'];
        $ref_index = $_POST['ref-index'];
        $studentID = $_POST['student'];
        $programmeID = $_POST['programme'];
        $levelID =$_POST['level'];
        $semesterID =$_POST['semester'];
        $year =$_POST['year'];
        $bank=$_POST['bank'];
        $ref=$_POST['ref'];
        $amount=$_POST['amount'];

        echo $sql ="INSERT INTO `fees_payment_details` (`tranNow`, `tranDate`,`ref_index`, `studentID`, `progID`,`semesterID`, `levelID`, `yearID`, `bank`, `ref`, `paid`) VALUES ('$now', '$pay_date', '$ref_index','$studentID', '$programmeID', '$semesterID','$levelID', '$year', '$bank', '$ref', '$amount')";
        $result = mysqli_query($conn,$sql);

        if ($result == TRUE){

        }else{

        }
    }

    function add_fees_bill($conn){

        $now = date("Y-m-d h:i:s");
        $pay_date = $_POST['date'];
        $ref_index = $_POST['ref-index'];
        $studentID = $_POST['student'];
        $programmeID = $_POST['programme'];
        $levelID =$_POST['level'];
        $semesterID =$_POST['semester'];
        $year =$_POST['year'];
        $bank=$_POST['bank'];
        $ref=$_POST['ref'];
        $amount=$_POST['amount'];

        echo $sql ="INSERT INTO `fees_payment_details` (`tranNow`, `tranDate`,`ref_index`, `studentID`, `progID`,`semesterID`, `levelID`, `yearID`, `bank`, `ref`, `bill`) VALUES ('$now', '$pay_date', '$ref_index','$studentID', '$programmeID', '$semesterID','$levelID', '$year', '$bank', '$ref', '$amount')";
        $result = mysqli_query($conn,$sql);

        if ($result == TRUE){

        }else{

        }
    }
}