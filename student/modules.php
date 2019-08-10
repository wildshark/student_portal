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

            case"upload-image";
                PROFILE::upload_picture($admin_conn);

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
                $_POST['token'] = $_SESSION['token'];
                $_POST['id'] = $_SESSION['studentID'];
               $student = PROFILE::update($admin_conn,$_POST);
               if ($student == 200){
                   header("location: index.php?_route=student&p=update&e=104");
               }else{
                   header("location: index.php?_route=student&p=profile&e=103");
               }
            break;

            case"update-password";
                $password = PROFILE::password($admin_conn,$_POST);

                if($password == 101){
                    header("location: index.php?_route=student&p=password&e=103");
                }else{
                    $_SESSION['token'] = $password['token'];
                    setcookie("token",$password['token'],time() + (86400 * 30), "/");

                    header("location: index.php?_route=student&p=password&e=104");
                }
            break;

            case "school-bill";
                include "student/views/fees/print.fees.bill.php";
            break;

            case"add-booking";
                HOSTEL::add_booking($admin_conn);
            break;

            case"add.enrollment";

                $enroll = ENROLL::add_enrollment($admin_conn,$account_conn,$_POST);

                if ($enroll == 102){
                    header("location: index.php?_route=student&p=enrollment.form&e=102");
                }elseif ($enroll ==104){
                    header("location: index.php?_route=student&p=enrollment.form&e=104");
                }elseif ($enroll == 103){
                    header("location: index.php?_route=student&p=enrollment.form&e=103");
                }elseif ($enroll == 128){
                    header("location: index.php?_route=student&p=enrollment.form&e=128");
                }
            break;

            case"reg.course";
                $enroll = ENROLL::add_reg_course($admin_conn);
                if($enroll['error'] == 104){
                    header("location: index.php?_route=student&p=course.registration&e=104&{$enroll['url']}");
                }elseif ($enroll['error'] == 103){
                    eader("location: index.php?_route=student&p=course.registration&e=103&{$enroll['url']}");
                }
            break;

            case"remove.reg.course";
                $enroll = ENROLL::remove_course($admin_conn);
                if($enroll == 200){
                    header("location: ". $_SERVER['HTTP_REFERER']);
                }
            break;

            case "make-fees-payment";
                PAYMENT::make_fees_payment($admin_conn,$exchange_rate);
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
                TICKET::add_ticket($admin_conn);
            break;

            default:
                include_once "template/error.php";
        }
    }else{
        logout();
    }
}