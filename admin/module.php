<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:04 PM
 */

include "modules/pins.php";
include "modules/programme.php";

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


            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}