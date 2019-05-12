<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 11/03/2019
 * Time: 1:12 PM
 */

class PAYMENT{

    function make_fees_payment($conn,$exchange_rate){

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
               echo $getBillSQL="SELECT * FROM `get_fees_bill` where `school_ID`='$schoolID' and `catID`='$categoryID' and `semesterID`='$semester' LIMIT 0, 1";
                $result = $conn->query($getBillSQL);
                $bill = $result->fetch_assoc();

                if (!isset($bill['amount'])){
                    header("location: ?_route=student&p=school.fees&e=121");
                }else {
                     $bill_amount = $bill['amount'];

                    if($currency === 'USD'){
                        $_EXCHANGE_bill_amount = $bill_amount * $exchange_rate['usd'];
                    }elseif ($currency === 'NGN'){
                        $_EXCHANGE_bill_amount = $bill_amount * $exchange_rate['ngn'];
                    }elseif ($currency === 'GHS'){
                        $_EXCHANGE_bill_amount = $bill_amount * $exchange_rate['ghs'];
                    }else{
                        $_EXCHANGE_bill_amount = null;
                    }

                    $_SESSION['billAmount'] =  $_EXCHANGE_bill_amount;

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
                    $_SESSION['st-rate-amount'] = $amount;
                    $_SESSION['st-bill'] = $bill_amount;
                    $_SESSION['st-schoolID'] = $schoolID;
                    $_SESSION['st-categoryID'] = $categoryID;


                    if (($level == 100) && ($semester == 1)){
                        $balance = $amount - $_EXCHANGE_bill_amount;

                        if ($balance >= 0){
                            $FEE_CheckSQL ="SELECT * FROM `get_fees_payment_details` where ref_index='$receipt' LIMIT 0, 1";
                            $result = $conn->query($FEE_CheckSQL);
                            if ($result->num_rows > 0) {
                                header("location: ?_route=student&p=school.fees&e=126");
                            }else{
                                header("location: ?_route=student&p=payment.process&e=122");
                            }
                        }else{
                           header("location: ?_route=student&p=school.fees&e=127");
                            exit();
                        }

                    }else{
                         $bal =(($_EXCHANGE_bill_amount * 75) / 100);

                        if($amount > $bal){
                            $FEE_CheckSQL ="SELECT * FROM `get_fees_payment_details` where ref_index='$receipt' LIMIT 0, 1";
                            $result = $conn->query($FEE_CheckSQL);
                            if ($result->num_rows > 0) {
                                header("location: ?_route=student&p=school.fees&e=126");
                            }else{
                                header("location: ?_route=student&p=payment.process&e=122");
                            }
                        }else{
                            header("location: ?_route=student&p=school.fees&e=128");
                        }
                    }
                }
            }else{
                header("location: ?_route=student&p=school.fees&e=121");
            }
        }

    }

    function payment_verification($rave){

        if (isset($_REQUEST['txref'])) {
           $ref = $_REQUEST['txref'];
           $amount = $_SESSION['st-amount']; //Correct Amount from Server
           $currency = $_SESSION['st-currency']; //Correct Currency from Server
           $URLverification = $rave['TestPaymentVerify'];

           if(!isset($stamp)){
               $stamp = md5($ref);
               $stamp = $stamp."-". md5($amount);
               $stamp = $stamp ."-". md5($currency);
               $stamp ="ST-". md5($stamp);

               $_SESSION['st-token'] = $stamp;
           }

            $query = array(
                "SECKEY" => "FLWSECK-45a0c821f1e1a352a1a45f4fd1c727ca-X",
                "txref" => $ref
            );

            $data_string = json_encode($query);

            //live $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
            $ch = curl_init($URLverification);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);

            curl_close($ch);

            $resp = json_decode($response, true);

            $paymentStatus = $resp['data']['status'];
            $chargeResponsecode = $resp['data']['chargecode'];
            $chargeAmount = $resp['data']['amount'];
            $chargeCurrency = $resp['data']['currency'];

            if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
                //Give Value and return to Success page
                $_SESSION['verification']  ="verify";
                 header("location: ?submit=payment.portal&status=payment.successful&e=125&ref={$ref}&stamp={$stamp}&verify=g");
            } else {
                //Dont Give Value and return to Failure page
                $_SESSION['verification']  = null;
                header("location: ?submit=payment.portal&status=payment.successful&e=125&ref={$ref}&stamp={$stamp}&verify=f");
            }
        }

    }

    function after_payment_process($conn,$exchange_rate){


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
        $currency = $_SESSION['st-currency'];
        $amount = $_SESSION['st-amount'];
        $bill_amount=$_SESSION['st-bill'];
        $verification= $_SESSION['verification'];

        if($currency === 'USD'){
            $_EXCHANGE_amount = $amount / $exchange_rate['usd'];
        }elseif ($currency === 'NGN'){
            $_EXCHANGE_amount = $amount / $exchange_rate['ngn'];
        }elseif ($currency === 'GHS'){
            $_EXCHANGE_amount = $amount / $exchange_rate['ghs'];
        }else{
            $_EXCHANGE_amount = null;
        }

        $_SESSION['paidAmount'] = $_EXCHANGE_amount;

        if (is_null($verification)){
            $statusID = '1';
        }else{
            $statusID ="2";
        }

        $FEE_CheckSQL ="SELECT * FROM `get_fees_payment_details` where ref_index='$receipt' LIMIT 0, 1";
        $result = $conn->query($FEE_CheckSQL);
        if ($result->num_rows > 0) {
            header("location: ?_route=student&p=payment.process&e=126");
        }else{
            $getBOOK="INSERT INTO `fees_payment_details` (`tranNow`, `tranDate`,`ref_index`, `studentID`, `progID`, `semesterID`, `levelID`, `yearID`, `bank`, `ref`, `bill`, `paid`,`statusID`,`typeID`) VALUES ('$now', '$date','$receipt', '$studentID', '$programme', '$semester', '$level', '$academYr', 'SmartPay', '$receipt', '$bill_amount', '$_EXCHANGE_amount','$statusID','1')";
            $result = $conn->query($getBOOK);
            if ($result === TRUE) {
                $fee_last_id = $conn->insert_id;

                $pin = date('YmdHis');
                $shuffled = str_shuffle($pin);
                // $rand = rand(100,999);
                $pin = $shuffled; //."1".$rand;

                $getEnrollSQL = "INSERT INTO `enrollment` (`enroll_time`, `pins`, `enroll_date`, `studentID`, `semesterID`, `s_level`, `yearID`, `progID`,`ref`, `statusID`) VALUES ('$now', '$pin', '$date', '$studentID', '$semester', '$level', '$academYr', '$programme','$receipt', '$statusID')";
                $result = $conn->query($getEnrollSQL);
                $last_id = $conn->insert_id;
                if ($result === TRUE) {
                    header("location: ?_route=student&p=print.enrollment.slip&e=100&d={$last_id}&q={$pin}&f={$fee_last_id}");
                } else {
                    header("location: ?_route=student&p=payment.process&e=103");
                }
            }
        }
    }

    function make_hostel_payment($conn,$data){

        $date = date("Y-m-d H:i:s");
        $studentID = $data[0];
        $name= $data[1];
        $surname = $data[2];
        $email = $data[3];
        $phone = $data[4];
        $txref = $data[5];
        $currency = $data[6];
        $amount = $data[7];

        $sql="INSERT INTO `hostel_ledger` (`cDate`, `StudentID`, `ref`, `bill`) VALUES ('$date','$studentID','$txref','$amount')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $last_id = $conn->insert_id;
            header("location: ?_route=student&p=print.enrollment.slip&e=100&d={$last_id}&s={$studentID}&a={$amount}");
        } else {
            header("location: ?_route=student&p=payment.process&e=103");
        }
    }
}

