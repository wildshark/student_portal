<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11/03/2019
 * Time: 1:12 PM
 */

class PAYMENT{

    function make_fees_payment($conn){

        $date = $_POST['date'];
        $receipt = $_POST['receipt'];
        $name = $_POST['name'];
        $admission = $_POST['index'];
        $surname = $_POST['surname'];
        $academYr =$_POST['year'];
        $semester = $_POST['semester'];
        $programme = $_POST['programme'];
        $level = $_POST['level'];
        $amount = $_POST['amount'];

        if (isset($admission)){

            $sql = "SELECT * FROM `get_student_profile_detail` where admissionNo='$admission' LIMIT 0, 1";
            $result = $conn->query($sql);
            $r = $result->fetch_assoc();

            if($r['statusID'] == 1){

                $now = date("Y-m-d H:i:s");
                $studentID = $r['studentID'];
                $categoryID = $r['categoryID'];
                $schoolID = $r['schoolID'];

                //get school bill from bill
                $getBillSQL="SELECT * FROM `get_fees_bill` where school_ID='$schoolID' and catID='$categoryID'LIMIT 0, 1";
                $result = $conn->query($getBillSQL);
                $bill = $result->fetch_assoc();

                if (!isset($bill['amount'])){
                    echo "ERROR: can pay";
                    exit();
                }else {
                    $bill_amount = $bill['amount'];

                    $_SESSION['st-date'] = $date;
                    $_SESSION['st-receipt'] = $receipt;
                    $_SESSION['st-id']= $studentID;
                    $_SESSION['st-name'] = $name;
                    $_SESSION['st-surname'] = $surname;
                    $_SESSION['st-admission'] = $admission;
                    $_SESSION['st-acadYr'] = $academYr;
                    $_SESSION['st-semester'] = $semester;
                    $_SESSION['st-programme'] = $programme;
                    $_SESSION['st-level'] = $level;
                    $_SESSION['st-amount'] = $amount;
                    $_SESSION['st-bill'] = $bill_amount;

                    header("location: ?_route=student&p=payment.process&e=121");

                }
            }else{
                echo"Error: profile is blocked";
            }
        }

    }

    function after_payment_process($conn){

        $now = date("Y-m-d H:i:s ");
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


        $getBOOK="INSERT INTO `fees_payment_details` (`tranNow`, `tranDate`,`acadYer`, `ref_index`, `studentID`, `progID`, `semesterID`, `levelID`, `yearID`, `bank`, `ref`, `bill`, `paid`, `typeID`) VALUES ('$now', '$date','$academYr', '$receipt', '$studentID', '$programme', '$semester', '$level', '$academYr', 'SmartPay', '$receipt', '$bill_amount', '$amount','1')";
        $result = $conn->query($getBOOK);
        if ($result === TRUE){
       // $last_id = $conn->insert_id;

            $getEnrollSQL="INSERT INTO `enrollment` (`enroll_time`, `pins`, `enroll_date`, `studentID`, `semesterID`, `s_level`, `yearID`, `progID`, `statusID`) VALUES ('$now', '$pin', '$date', '$studentID', '$semester', '$level', '$academYr', '$programme', '2')";
            $result = $conn->query($getEnrollSQL);
            if($result === TRUE){
                header("location: ?_route=student&p=payment.process&e=121&d={$last_id}");
            }

        }else{
         header("location: ?_route=student&p=payment.process&e=103");
        }
    }
}

