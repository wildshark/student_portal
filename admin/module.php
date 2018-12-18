<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:04 PM
 */

include "modules/pins.php";
include "modules/programme.php";
include "modules/hostel.php";
include "modules/enrollment.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_POST['submit']){

            case "logout";
                logout();
            break;

            case"add.pins";
                PINs::add($conn);
            break;

            case "school-affiliated";
                PROGRAMME::add_affiliate($conn);
            break;

            case "edit-school-affiliated";
                PROGRAMME::update_affiliate($conn);
            break;

            case "add-faculty";
                PROGRAMME::add_faculty($conn);
            break;

            case"edit-faculty";
                PROGRAMME::edit_faculty($conn);
            break;

            case"add-courses";
                PROGRAMME::add_courses($conn);
            break;

            case"edit-courses";
                PROGRAMME::edit_courses($conn);
            break;

            case"add-hostel";
                HOSTEL::add_booking($conn);
            break;

            case"add-enrollment";
                ENROLLMENT::add_enroll($conn);
            break;

            case"edit-enrollment";
                ENROLLMENT::edit_enroll($conn);
            break;

            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}