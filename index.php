<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 7:54 AM
 */

session_start();

include "setup.php";
include "control/db.connect.php";
include "global/global.function.php";
include "global/global.label.php";
include "modules/login.php";

if((isset($_SESSION['account_db'])) && (isset($_SESSION['administrative_db'])) &&(isset($_SESSION['admission_db']))){

    if (!isset($_GET['_route'])){
        if (!isset($_REQUEST['submit'])){
            logout();
        }elseif ($_REQUEST['submit'] === "Login"){
            if(!(isset($_POST['username'])) &&(isset($_POST['username']))){
                echo "No login details";
                exit();
            }else{
                $student = USER_LOGIN::login($admin_conn,$_POST);

                //echo var_export($student);
                //exit();

                $_SESSION['studentID']= $student['studentID'];
                $_SESSION['studentCatID'] = $student['categoryID'];
                $_SESSION['student_index'] = $student['index'];
                $_SESSION['student_name'] = $student['name']." ".$student['surname'];
                $_SESSION['programmeID'] = $student['programme'];
                $_SESSION['streamID'] = $student['streamID'];
                $_SESSION['categoryID'] = $student['categoryID'];
                $_SESSION['token'] = $student['token'];

                setcookie("token",$student['token'],time() + (86400 * 1), "/");
                setcookie("st_name",$student['name'],time() + (86400 * 1), "/");
                setcookie("st_surname",$student['surname'],time() + (86400 * 1), "/");
                setcookie("st_index",$student['index'],time() + (86400 * 1), "/");


                if((isset( $_SESSION['studentID'])) && (isset($_COOKIE))){
                    $verification = USER_LOGIN::check_profile($admin_conn,$student);
                    if($verification == 101){
                        header("location: index.php?_route=student&p=profile&e=100");
                    }elseif(!isset($student['index']) OR !isset($student['surname'])){
                        header("location: index.php?_route=student&p=profile&e=100");
                    }else{
                        header("location: index.php?_route=student&p=dashboard&e=100");
                    }
                }
            }
        }elseif ($_REQUEST['submit'] === "Recover"){
            USER_LOGIN::recovery($admin_conn);
        }elseif ($_REQUEST['submit'] === "Register"){

            if (!(isset($_POST['username'])) && (isset($_POST['mobile'])) && (isset($_POST['email'])) && (isset($_POST['voucher'])) && (isset($_POST['password']))){
                echo "No name found";
                exit();
            }else {
               $record = USER_LOGIN::registration($admin_conn,$_POST);
               if($record == 101){
                   echo "Pin has been use";
               }elseif ($record == 500){
                   echo "Server connection";
               }else{

                   $student = USER_LOGIN::login($admin_conn,$_POST);

                   if(!isset($_COOKIE['token'])){
                       setcookie("token",$student['token'],time() + (86400 * 1), "/");
                       setcookie("st_name",$student['name'],time() + (86400 * 1), "/");
                       setcookie("st_surname",$student['surname'],time() + (86400 * 1), "/");
                   }

                   if(!isset($_SESSION['token'])){
                       $_SESSION['studentID']= $student['studentID'];
                       $_SESSION['student_index'] = $student['index'];
                       $_SESSION['studentCatID'] = $student['categoryID'];
                       $_SESSION['student_name'] = $student['name']." ".$student['surname'];
                       $_SESSION['programmeID'] = $student['programme'];
                       $_SESSION['streamID'] = $student['streamID'];
                       $_SESSION['categoryID'] = $student['categoryID'];
                       $_SESSION['token'] = $student['token'];
                   }

                   if((isset( $_SESSION['studentID'])) && (isset($_COOKIE))){

                       $token = USER_LOGIN::token($admin_conn,$student);

                       if($token == 101){
                           echo "server connection failure";
                           exit();
                       }else{
                           $verification = USER_LOGIN::check_profile($admin_conn,$student);
                           if($verification == 101){
                               header("location: index.php?_route=student&p=profile&e=100");
                           }elseif(!isset($student['admissionNo']) OR !isset($student['surname'])){
                               header("location: index.php?_route=student&p=profile&e=100");
                           }else{
                               header("location: index.php?_route=student&p=dashboard&e=100");
                           }
                       }
                   }

               }

            }
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

}else{
    echo"can't find database";
    exit();
}

