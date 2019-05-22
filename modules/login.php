<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 22/05/2019
 * Time: 8:05 AM
 */

class USER_LOGIN
{

    function login($conn)
    {

        if (!isset($_POST['username'])) {
            echo "no user name";
        } else {
            $username = $_POST['username'];
        }

        if (!isset($_POST['password'])) {
            echo "no password";
        } else {
            $password = $_POST['password'];
        }

        $token = md5($username . "/" . $password);

        $username = strtoupper($username);

        $get_sql_index_id = "SELECT * FROM `get_student_index` where stud_index='$username' LIMIT 0, 1";
        $sql_index_id = mysqli_query($conn, $get_sql_index_id);
        if (mysqli_num_rows($sql_index_id) > 0) {
            $index_id = mysqli_fetch_assoc($sql_index_id);

            $_SESSION['student_index_id'] = $index_id['stud_indexID'];

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
                                    //$_SESSION['student_index_id']= $student_index_id;

                                    setcookie("st_name",$student['first_name'],time() + (86400 * 1), "/");
                                    setcookie("st_surname",$student['surname'],time() + (86400 * 1), "/");
                                    setcookie("st_mobile1",$student['mobile1'],time() + (86400 * 1), "/");
                                    setcookie("st_email",$student['email'],time() + (86400 * 1), "/");

                                    if(isset($_SESSION['student_index_id'])){
                                        $_SESSION['studentID'] = $_SESSION['student_index_id'];
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
    }

}
