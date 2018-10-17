<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 8:14 AM
 */

$token = $_GET['token'];
if(!isset($token)){
    session_unset();
    session_destroy();
    logout();
} else{

}