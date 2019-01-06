<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/01/2019
 * Time: 10:04 AM
 */

include "template/top.menu.php";
include_once "modules/admin.menu.php";
include_once "model/function.php";

if (!isset($_COOKIE["token"]) or !isset($_SESSION['token'])){
    // echo "no cookie or session created";
    logout();
}else{
    if ($_SESSION['token'] === $_COOKIE["token"]) {

        switch ($_REQUEST['_search']) {

        case "pin";
            $_template->menu = "template/menu.php";
            $_template->view ="model/search.php";
            include "template/form.php";
        break;
        }
    }
}
