<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:54 AM
 */

include "global/db.connection.php";
include "global/global.function.php";
include "global/global.label.php";
include "modules/login.module";

if (!isset($_GET['_route'])){
    if (!isset($_POST['submit'])){
        logout();
    }elseif ($_POST['submit'] === "Login"){
        user_login::login($conn);
    }elseif ($_POST['submit'] === "Recovery"){
        user_login::recovery($conn);
    }
}else{
     $route = $_GET['_route'];
    $GLOBALS['route'] = $route;
    if($route === 'admin'){
        require "admin/navigation.php";
    }elseif ($route === 'student'){
        require "student/navigation.php";
    }elseif ($route === 'recovery') {
        require "template/recovery.php";
    }elseif ($route === "student"){
        require "student/navigation.php";
    }
}


