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
        $currency = $_POST['currency'];
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
                $getBillSQL="SELECT * FROM `get_fees_bill` where `school_ID`='$schoolID' and `catID`='$categoryID' LIMIT 0, 1";
                $result = $conn->query($getBillSQL);
                $bill = $result->fetch_assoc();

                if (!isset($bill['amount'])){
                    header("location: ?_route=student&p=school.fees&e=121");
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
                    $_SESSION['st-currency'] = $currency;
                    $_SESSION['st-amount'] = $amount;
                    $_SESSION['st-bill'] = $bill_amount;
                    $_SESSION['st-schoolID'] = $schoolID;
                    $_SESSION['st-categoryID'] = $categoryID;

                    header("location: ?_route=student&p=payment.process&e=122");
                }
            }else{
                header("location: ?_route=student&p=school.fees&e=121");
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


        $getBOOK="INSERT INTO `fees_payment_details` (`tranNow`, `tranDate`,`ref_index`, `studentID`, `progID`, `semesterID`, `levelID`, `yearID`, `bank`, `ref`, `bill`, `paid`, `typeID`) VALUES ('$now', '$date','$receipt', '$studentID', '$programme', '$semester', '$level', '$academYr', 'SmartPay', '$receipt', '$bill_amount', '$amount','1')";
        $result = $conn->query($getBOOK);
        if ($result === TRUE){
       // $last_id = $conn->insert_id;

            $pin = date ('YmdHis');
            $shuffled = str_shuffle($pin);
           // $rand = rand(100,999);
            $pin = $shuffled; //."1".$rand;

            $getEnrollSQL="INSERT INTO `enrollment` (`enroll_time`, `pins`, `enroll_date`, `studentID`, `semesterID`, `s_level`, `yearID`, `progID`,`ref`, `statusID`) VALUES ('$now', '$pin', '$date', '$studentID', '$semester', '$level', '$academYr', '$programme','$receipt', '2')";
            $result = $conn->query($getEnrollSQL);
            $last_id = $conn->insert_id;
            if($result === TRUE){
                header("location: ?_route=student&p=print.enrollment.slip&e=100&d={$last_id}&q={$pin}");
            }
        }else{
         header("location: ?_route=student&p=payment.process&e=103");
        }
    }
}

