<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:58 AM
 */
include "template/top.menu.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
   // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_GET['p']){

            case "dashboard";
                $_template->menu = "template/menu.php";
                include "template/dashboard.php";
            break;

            case"profile";
                $_template->menu = "template/menu.php";
                $_template->view ="student/views/profile/student.profile.php";
                include "template/form.php";
            break;


            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}