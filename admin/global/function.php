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

function random_string($length) {
    $key = '';
    $keys = array_merge(range(1, 9), range('A', 'Z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key ."". date('dHis');
}

?>