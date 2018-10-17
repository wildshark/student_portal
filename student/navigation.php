<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:58 AM
 */

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
   // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]){

        switch ($_GET['p']){

            case "dashboard";
                echo $_SESSION['student_name'] ;

                include "template/dashboard.php";
            break;

            default:

        }
    }else{
        logout();
    }
}