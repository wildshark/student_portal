<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 18/12/2018
 * Time: 5:27 AM
 */

class ENROLLMENT{

    function add_enroll($conn){

        $now = date('Y-m-d H:i:s');
        $date = date ('Y-m-d');
        $pin = $_POST['pin'];
        $index = $_POST['student'];

        $sql ="INSERT INTO `enrollment`(`enroll_time`, `pins`, `enroll_date`, `studentID`) VALUES ('$now', '$pin', '$date', '$index')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=course.registration&e=104");
        }else{
           header("location: index.php?_route=admin&p=course.registration&e=103");
        }
    }

    function  edit_enroll($conn){

        $id = $_SESSION['id'];
        $date = date('Y-m-d');
        $pin = $_POST['pin'];
        $index = $_POST['student'];

        $sql ="UPDATE `enrollment` SET 
            `pins` = '$pin', 
            `enroll_date` = '$date', 
            `studentID` = '$index' 
            WHERE `enrollID` = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=course.registration&e=104");
        }else{
            header("location: index.php?_route=admin&p=course.registration&e=103");
        }
    }
}