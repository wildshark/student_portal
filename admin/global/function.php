<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 1:15 PM
 */

function logout(){
    session_unset();
    session_destroy();

    unset($_COOKIE['token']);

    setcookie('token', '', time() - (86400 * 30), '/');

    include "global/setup.php";
    include "template/login.php";
}