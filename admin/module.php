<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:04 PM
 */

include "modules/pins.php";

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


            default:
                include_once "template/error.php";

        }
    }else{
        logout();
    }
}