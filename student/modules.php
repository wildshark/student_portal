<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 8:14 AM
 */

include "modules/student.module";
include "modules/hostel.php";
include "modules/enrollment.php";
include "modules/ticket.php";
include "modules/payment.php";


if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_REQUEST['submit']){

            case"update-password";
                PROFILE::password($conn);
            break;

            case "update-student-profile";
                PROFILE::update($conn);
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
                PAYMENT::make_fees_payment($conn);
            break;

            case"payment.portal";
                if($_REQUEST['status'] ==='payment.success'){
                    if(isset($_REQUEST['txref'])){
                        echo  $_SESSION['st-receipt'];
                        if ($_REQUEST['txref'] === $_SESSION['st-receipt']){
                            PAYMENT::after_payment_process($conn);
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