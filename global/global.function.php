<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 8:57 AM
 */

function logout(){
    session_unset();
    session_destroy();

    unset($_COOKIE['token']);

    setcookie('token', '', time() - (86400 * 30), '/');

    include "global.label.php";
    include "template/login.php";

}

