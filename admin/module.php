<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:04 PM
 */

include "modules/pins.php";
include "modules/student.php";
include "modules/programme.php";
include "modules/hostel.php";
include "modules/enrollment.php";
include "modules/user.php";
include "modules/fees.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_POST['submit']){

            case "logout";
                logout();
            break;

            case"add-index-number";
                STUDENT::generate_student_index($conn);
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

            case"add-block-hostel";
                HOSTEL::add_block_name($conn);
            break;

            case"edit-block-hostel";
                HOSTEL::update_block_name($conn);
            break;

            case "add-room-hostel";
                HOSTEL::add_room_name($conn);
            break;

            case"edit-room-hostel";
                HOSTEL::update_room_name($conn);
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

            case"update-password";
               USER_PROFILE::change_password($conn);
            break;

            case"update-profile";
                USER_PROFILE::update_profile($conn);
            break;

            case"add-admin-account";
                USER_PROFILE::add_admin_account($conn);
            break;

            case"edit-admin-account";
                USER_PROFILE::update_admin_account($conn);
            break;

            case"add-fees-bill";
                FEES::add_fees_bill($conn);
            break;

            case"add-fees-payment":
                FEES::add_fees_payment($conn);
            break;

            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}