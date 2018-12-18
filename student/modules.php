<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 8:14 AM
 */

include_once "modules/student.module";
include "modules/hostel.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_POST['submit']){

            case"update-password";
                PROFILE::password($conn);
            break;

            case "update-student-profile";
                PROFILE::update($conn);
            break;

            case"add-booking";
                HOSTEL::add_booking($conn);
            break;

            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}