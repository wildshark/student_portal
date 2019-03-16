<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:54 AM
 */
include "setup.php";
include "global/db.connection.php";
include "global/global.function.php";
include "global/global.label.php";
include "modules/login.php";

if (!isset($_GET['_route'])){

    if (!isset($_REQUEST['submit'])){
        logout();
    }elseif ($_REQUEST['submit'] === "Login"){
        USER_LOGIN::login($conn);
    }elseif ($_REQUEST['submit'] === "Recover"){
         USER_LOGIN::recovery($conn);
    }elseif ($_REQUEST['submit'] === "Register"){
        USER_LOGIN::registration($conn);
    }else{
        include_once "student/modules.php";
    }

}else{

    $route = $_REQUEST['_route'];
    $GLOBALS['route'] = $route;

    if($route === 'admin'){
        require "admin/navigation.php";
    }elseif ($route === 'student'){
        require "student/navigation.php";
    }elseif ($route === 'recovery') {
        require "template/recovery.php";
    }elseif ($route === "register"){
        require "template/register.php";
    }
}


