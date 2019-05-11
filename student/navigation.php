<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:58 AM
 */
include "template/top.menu.php";
include_once "model/student_menu.module";
include_once "function/data.module";
include_once "model/dashboard.php";
include_once "model/message.box.php";
include "plugin/sms/sms.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
   // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_GET['p']){

            case "logout";
                logout();
            break;

            case"update";
                include "template/update.php";
            break;

            case "dashboard";
                $_template->menu = "template/menu.php";
                include "template/dashboard.php";
            break;

            case"profile";
            $_template->menu = "template/menu.php";
            $_template->view ="student/views/profile/student.profile.php";
            include "template/form.php";
            break;

            case"password";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/profile/student.password.php";
                include "template/form.php";
            break;

            case "enrollment.form";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/enrollment/add.enrollment.php";
                include "template/form.php";
            break;

            case"school.fees";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/fees/fees.payment.php";
                include "template/form.php";
            break;

            case"payment.process";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/fees/payment.process.php";
                include "template/form.php";
            break;

            case "fees.history";
                //$_template->menu = "template/menu.php";
                $_template->view ="student/views/fees/list.fees.statement.php";
                include "template/form.php";
            break;

            case "hostel.fees";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/hostel/hostel.order.php";
                include "template/form.php";
            break;

            case"hostel";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/hostel/hostel.php";
                include "template/form.php";
            break;

            case"course.registration";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/enrollment/course.registration.php";
                include "template/form.php";
            break;

            case"ticket";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/ticket/ticket.php";
                include "template/form.php";
            break;

            case"print.registration";
                include "student/views/enrollment/print.registration.php";
            break;

            case "print.enrollment.slip";
                include "student/views/enrollment/print.enrollment.pay.slip.php";
            break;

            default:
                include_once "template/error.php";
        }
    }else{
        logout();
    }
}