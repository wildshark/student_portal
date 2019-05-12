<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 8:14 AM
 */

include "plugin/image/image.resize.php";
include "modules/student.module";
include "modules/hostel.php";
include "modules/enrollment.php";
include "modules/ticket.php";
include "modules/payment.php";
include "plugin/sms/sms.php";


if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_REQUEST['submit']){

            case"update-password";
                PROFILE::password($conn);
            break;

            case"upload-image";
                PROFILE::upload_picture($conn);
                if(isset($_SESSION['pic-status']) && $_SESSION['pic-status'] == true){
                    // *** 1) Initialise / load image
                    $picture = $_SESSION['image'];
                    $resizeObj = new resize($picture);

                    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                    $resizeObj -> resizeImage(100, 100, 'crop');

                    // *** 3) Save image
                    $resizeObj -> saveImage($picture, 1000);
                    $_SESSION['picture']=$picture;
                }
            break;

            case "update-student-profile";
                PROFILE::update($conn);
            break;

            case "school-bill";
                include "student/views/fees/print.fees.bill.php";
            break;

            case"add-booking";
                HOSTEL::add_booking($conn);
            break;

            case"add.enrollment";
                ENROLL::add_enrollment($conn);
            break;

            case"reg.course";
                ENROLL::add_reg_course($conn);
            break;

            case"remove.reg.course";
                ENROLL::remove_course($conn);
            break;

            case "make-fees-payment";
                PAYMENT::make_fees_payment($conn,$exchange_rate);
            break;

            case"payment.portal";
                if ($_REQUEST['status'] ==="payment.successful"){
                    if ($_SESSION['st-token'] == $_REQUEST['stamp']){
                        PAYMENT:: after_payment_process($conn,$exchange_rate);
                    }
                }elseif($_REQUEST['status'] ==='payment.verification'){
                    if(isset($_REQUEST['txref'])){

                        if ($_REQUEST['txref'] === $_SESSION['st-receipt']){

                            $r = $_SESSION['st-receipt'];
                            $i = $_SESSION['st-admission'];
                            $n = $_SESSION['st-name'] ." ". $_SESSION['st-surname'];
                            $x = $_SESSION['paidAmount'];
                            $x = number_format($x,2);
                            $msg = "ref: ".$r."\r\n index:".$i."\r\n name:".$n."\r\n paid:". $x;
                            $sms = array("to"=>$alert_mobile,"msg"=>$msg);
                            sms_messenger($sms);

                            PAYMENT::payment_verification($rave);
                        }else{
                            echo"ERROR: System error or a fraudulent act. see administrator for further details";
                        }
                    }else{
                        header("location: index.php");
                        session_destroy();
                        exit();
                    }
                }else{

                }
            break;

            case"pay-hostel-fee";

                $data[] = $_SESSION['student_index_id'];
                $data[] = $_COOKIE['st_name'];
                $data[] = $_COOKIE['st_surname'];
                $data[] = $_POST['customer_email'];
                $data[] = $_POST['customer_phone'];
                $data[] = $_POST['txref'];
                $data[] = $_POST['currency'];
                $data[] = $_POST['amount'];

                //echo var_dump($data);

            break;

            case "add-comment";
                TICKET::add_ticket($conn);
            break;

            default:
                include_once "template/error.php";
        }
    }else{
        logout();
    }
}