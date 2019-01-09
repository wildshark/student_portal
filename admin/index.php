<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 1:08 PM
 */

include "global/connection.php";
include "global/function.php";
include "global/setup.php";
include "modules/login.module";

if (!isset($_GET['_route'])) {

    if (!isset($_POST['submit'])) {
        logout();
    }elseif($_POST['submit'] === "Login") {
        admin_login::login($conn);
    }else{
        require "module.php";
    }

}else{

    $route = $_REQUEST['_route'];
    $GLOBALS['route'] = $route;

    if($route === 'admin'){
        require "navigation.php";
    }elseif ($route === 'recovery') {
        require "template/recovery.php";
    }
}

