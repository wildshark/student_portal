<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06/01/2019
 * Time: 10:15 AM
 */

class USER_PROFILE{

    function add_admin_account($conn){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $access = $_POST['access'];

        echo $sql ="INSERT INTO `admin` (`username`, `password`, `email`, `access`, `status`) VALUES ('$username', '$password', '$email', '$access', '1')";
        $result = mysqli_query($conn,$sql);
        if ($result == TRUE) {
            header("location: index.php?_route=admin&p=administrator&e=104");
        }else{
            header("location: index.php?_route=admin&p=administrator&e=103");
        }
    }

    function update_admin_account($conn){

        $userID = $_SESSION['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $access = $_POST['access'];


        $sql="UPDATE `admin` SET `username`='$username', `password`='$password', `email`='$email', `access`='$access ' WHERE (`userID`='$userID')";
        $result = mysqli_query($conn,$sql);
        if ($result == TRUE) {
            header("location: index.php?_route=admin&p=administrator&e=104");
        }else{
            header("location: index.php?_route=admin&p=administrator&e=103");
        }
    }

    function change_password($conn){

        if (isset($_SESSION['user-id'])){
            $id = $_SESSION['user-id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $token = md5($username."/".$password);

            $sql = "UPDATE `admin` SET `email` = '$email', `password` = '$password' WHERE `userID` = '$id'";
            $result = mysqli_query($conn,$sql);
            if ($result == TRUE){

                $sql="UPDATE `staff_profile` SET `token` = '$token' WHERE `user_log_ID` = '$id'";
                $result = mysqli_query($conn,$sql);
                if ($result == TRUE) {
                    header("location: index.php?_route=admin&p=password&e=104");
                }else{
                    header("location: index.php?_route=admin&p=password&e=103");
                }
            }else{
                header("location: index.php?_route=admin&p=password&e=103");
            }
        }else{
            header("location: index.php?_route=admin&p=password&e=105");
            exit();
        }
    }

    function add_profile(){
       // INSERT INTO `school_data`.`staff_profile`(`user_log_ID`, `employDate`, `staffID`, `f_name`, `l_name`, `dob`, `marital_status`, `genderID`, `countryID`, `categoryID`, `positionID`, `departmentID`, `operation_status`, `aos`, `email`, `mobile1`, `mobile2`, `address`, `ssn`, `bankID`, `acctName`, `acctNumber`, `emerge_name`, `emerge_phone`, `emerge_email`, `emerge_relation`, `emerge_address`) VALUES (1, '1', '1', '1', '1', '2019-01-06', '1', 1, 1, 1, 1, 1, '1', '1', '1', '1', '1', '1', '1', 1, '1', '1', '1', '1', '1', '1', '1')
    }

    function update_profile($conn){

        if (isset($_SESSION['user-id'])){
            $id = $_SESSION['user-id'];
            $date = $_POST['date'];
            $staff_id = $_POST['staffID'];
            $f_name = $_POST['f-name'];
            $l_name = $_POST['l-name'];
            $genderID = $_POST['gender'];
            $dob = $_POST['dob'];
            $nationality = $_POST['nationality'];
            $marital = $_POST['marital-status'];
            $mobile = $_POST['mobile-1'];
            $mobile2 = $_POST['mobile-2'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $department = $_POST['department'];
            $category = $_POST['category'];
            $position = $_POST['position'];
            $user_token = $_SESSION['token'];

            $sql ="UPDATE `staff_profile` SET 
                    `employDate` = '$date', 
                    `staffID` = '$staff_id', 
                    `f_name` = '$f_name', 
                    `l_name` = '$l_name', 
                    `dob` = '$dob',
                    `marital_status` = '$marital', 
                    `genderID` = '$genderID', 
                    `countryID` = '$nationality', 
                    `categoryID` = '$category', 
                    `positionID` = '$position',
                    `departmentID` = '$department',
                    `email` = '$email', 
                    `mobile1` = '$mobile', 
                    `mobile2` = '$mobile2', 
                    `address` = '$address', 
                    `token` = '$user_token' WHERE `user_log_ID` = '$id'";
            $result = mysqli_query($conn,$sql);
            if ($result == TRUE){
                header("location: index.php?_route=admin&p=staff.profile&e=104");
            }else{
                header("location: index.php?_route=admin&p=staff.profile&e=103");
            }
        }else{
            header("location: index.php?_route=admin&p=staff.profile&e=105");
            exit();
        }
    }
}