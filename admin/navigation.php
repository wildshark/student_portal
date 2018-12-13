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

            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}