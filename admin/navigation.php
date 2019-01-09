<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:58 AM
 */
include "template/top.menu.php";
include_once "modules/admin.menu.php";
include_once "model/function.php";
include "modules/dashboard.php";
include"model/search.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_GET['p']){

            case "logout";
                logout();
                break;

            case "dashboard";
                $_template->menu = "template/menu.php";
                include "template/dashboard.php";
                break;

            case"staff.profile";
                $_template->menu = "template/menu.php";
                $_template->view ="views/profile/admin/staff.profile.php";
                include "template/form.php";
                break;

            case"password";
                $_template->menu = "template/menu.php";
                $_template->view ="views/profile/admin/staff.password.php";
                include "template/form.php";
                break;

            case"create.pins";
                $_template->menu = "template/menu.php";
                $_template->view ="views/pins/add.pins.php";
                include "template/form.php";
            break;

            case"pins.list";
                $_template->menu = "template/menu.php";
                $_template->view ="views/pins/list.pins.php";
                include "template/form.php";
            break;

            case"student.profile";
                $_template->menu = "template/menu.php";
                $_template->view ="views/profile/student/list.student.php";
                include "template/form.php";
            break;

            case"affiliate";
                $_template->menu = "template/menu.php";
                $_template->view ="views/programme/affiliate.php";
                include "template/form.php";
            break;

            case"faculty";
                $_template->menu = "template/menu.php";
                $_template->view ="views/programme/faculty.php";
                include "template/form.php";
            break;

            case"programme";
                $_template->menu = "template/menu.php";
                $_template->view ="views/programme/programme.php";
                include "template/form.php";
            break;

            case"course";
                $_template->menu = "template/menu.php";
                $_template->view ="views/programme/courses.php";
                include "template/form.php";
            break;

            case"hostel";
                $_template->menu = "template/menu.php";
                $_template->view ="views/hostel/hostel.php";
                include "template/form.php";
            break;

            case"course.registration";
                $_template->menu = "template/menu.php";
                $_template->view ="views/enrollment/enrollment.php";
                include "template/form.php";
            break;

            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}