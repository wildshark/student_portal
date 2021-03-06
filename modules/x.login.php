<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 11:58 AM
 */

class USER_LOGIN{

    function registration($conn){

        if (!isset($_POST['username'])){
            echo "No name found";
        }elseif (!$_POST['mobile']){
            echo "No mobile number found";
        }elseif (!$_POST['email']){
            echo "No email found";
        }elseif (!$_POST['voucher']){
            echo "No voucher found";
        }elseif (!$_POST['password']){
            echo "No voucher found";
        }else{

            $index = $_POST['username'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $voucher = $_POST['voucher'];

            $check = "SELECT * FROM `get_pins` where pin = '$voucher' and username='$username'";
            $result = (mysqli_query($conn,$check));
            if ($result->num_rows > 0){

                $token = md5($index."/".$password);
                $date = date("Y-m-d H:i:s");

                $sql ="UPDATE `pins` SET `password`='$password', `mobile`='$mobile', `email`='$email', `active_date`='$date', `token`='$token', status='2'  WHERE (`pin`='$voucher')";
                $update_pin_record = mysqli_query($conn,$sql);
                if ($update_pin_record == TRUE){

                    if (!isset($_COOKIE[$token])){
                        $sql = "INSERT INTO `student_profile`(`token`) VALUES ('$token')";
                        mysqli_query($conn,$sql);
                        $last_id = mysqli_insert_id($conn);
                        setcookie("token",$token,time() + (86400 * 1), "/");
                        if (!isset($_SESSION['token'])){

                            $_SESSION['token'] = $token;
                            //$_SESSION['studentID'] = $last_id;
                            $_SESSION['student_name'] = $username;
                            $_SESSION['student_index'] = $index;
                            $_SESSION['password']=$password;
                            //$_USER['picture'] = $user['picture'];

                            header("location: index.php?_route=student&p=profile&e=100");
                        }
                    }else{
                        header("location: index.php?_route=login&e=101");
                    }
                }else{
                    header("location: index.php?_route=register&e=103");
                }
            }else{
                header("location: index.php?_route=register&e=102");
            }
        }
    }

    function login($conn){

        if (!isset($_POST['username'])){
            echo "no user name";
        }else{
            $username = $_POST['username'];
        }

        if (!isset($_POST['password'])){
            echo "no password";
        }else{
            $password =  $_POST['password'];
        }

        $token = md5($username."/".$password);

        $sql = "SELECT * FROM `get_active_pin` where token='$token' LIMIT 1";
        $result = (mysqli_query($conn,$sql));
        if (mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);

            if (!isset($_COOKIE[$token])){
                setcookie("token",$token,time() + (86400 * 1), "/");

                if (!isset($_SESSION['token'])){

                    $_SESSION['token'] = $token;
                    $_SESSION['student_name'] = $user['first_name']." ". $user['surname'];
                    $_SESSION['student_index'] = $username;
                    //$_USER['picture'] = $user['picture'];

                    $profile = "SELECT * FROM `get_student_profile_detail` WHERE token = '$token'";
                    $profile_result = mysqli_query($conn,$profile);

                    if(mysqli_num_rows($profile_result) > 0){

                        $student = mysqli_fetch_assoc($profile_result);
                        //setcookie
                        setcookie("st_name",$student['first_name'],time() + (86400 * 1), "/");
                        setcookie("st_surname",$student['surname'],time() + (86400 * 1), "/");
                        setcookie("st_mobile1",$student['mobile1'],time() + (86400 * 1), "/");
                        setcookie("st_email",$student['email'],time() + (86400 * 1), "/");

                        //$_SESSION['studentID'] = $student['studentID'];
                        $_SESSION['student_name'] = $student['first_name']." ".$student['surname'];
                        $_SESSION['picture'] = $student['picture'];
                        $_SESSION['studentCatID'] = $student['categoryID'];

                        if (!isset($student['admissionNo']) OR !isset($student['surname'])){
                            header("location: index.php?_route=student&p=profile&e=100");
                        }else{

                            $index_id = "SELECT * FROM `get_student_profile_detail` where token='$token'LIMIT 0, 1";
                            $student_index_id_result = mysqli_query($conn,$index_id);
                            if (mysqli_num_rows($student_index_id_result) > 0) {
                                $r = mysqli_fetch_assoc($student_index_id_result);
                                $student_index_id = $r['studentID'];
                                $_SESSION['picture'] = $r['picture'];
                                $_SESSION['studentCatID'] = $r['categoryID'];
                                $_SESSION['student_index_id']= $student_index_id;

                                setcookie("st_name",$student['first_name'],time() + (86400 * 1), "/");
                                setcookie("st_surname",$student['surname'],time() + (86400 * 1), "/");
                                setcookie("st_mobile1",$student['mobile1'],time() + (86400 * 1), "/");
                                setcookie("st_email",$student['email'],time() + (86400 * 1), "/");

                                if(isset($_SESSION['student_index_id'])){
                                    header("location: index.php?_route=student&p=dashboard&e=100");
                                }
                            }

                        }
                    }
                }
            }
        }else{
            header("location: index.php");
        }
    }

    function recovery($conn){

        if (!isset($_REQUEST['email'])){
            echo "No email";
        }else{

             $email = $_REQUEST['email'];

            $sql = "SELECT * FROM `get_all_pins` where email='$email' LIMIT 1";
            $result = (mysqli_query($conn,$sql));
            if (mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
                $username = $user['username'];
                $password = $user['password'];

                $subject = "Password Recovery";
                $txt = "You login detail username:{$username} and password: {$password}";
                $headers = "From: info@ghanacu.com";

                if (mail($email,$subject,$txt,$headers)== TRUE){
                    echo "email send";
                }else{
                    echo "email-send-error";
                }
            }else{
               header("location: index.php?_route=recovery&e=113");
                // header("location: index.php");
            }
        }
    }
}
