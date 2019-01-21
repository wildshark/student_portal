<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 17/12/2018
 * Time: 1:56 PM
 */

class HOSTEL{

    function add_booking($conn){

        $now = date("Y-m-d H:i:s");
        $date = date("Y-m-d");
        $pin = $_POST['pin'];
        $student = $_POST['student'];
        $ref= $_POST['ref'];
        $block = $_POST['block-id'];

        $sql = "INSERT INTO `hostel_detail`(`tran_date`,`date`, `pin_index`, `studentID`,`ref_no`,`blockID`) VALUES ('$now','$date', '$pin', '$student','$ref','$block')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel&e=103");
        }
    }

    function add_block_name($conn){

        $block = $_POST['block'];
        $sql = "INSERT INTO `hostel_block` (`block_name`) VALUES ('$block')";

        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel-block&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel-block&e=103");
        }

    }

    function update_block_name($conn){

        $blockID= $_SESSION['id'];
        $block =$_POST['block'];

        $sql="UPDATE `hostel_block` SET `block_name`='$block' WHERE (`blockID`='$blockID')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel-block&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel-block&e=103");
        }
    }

    function add_room_name($conn){

        $room = $_POST['room'];
        $blockID = $_POST['block'];
        $bed = $_POST['bed'];

        $sql = "INSERT INTO `hostel_room` (`blockID`, `room`, `bed`) VALUES ('$blockID', '$room', '$bed')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel-room&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel-room&e=103");
        }
    }

    function update_room_name($conn){

        $roomID = $_SESSION['id'];
        $room = $_POST['room'];
        $blockID = $_POST['block'];
        $bed = $_POST['bed'];

        $sql = "UPDATE `hostel_room` SET `blockID`='$blockID', `room`='$room', `bed`='$bed' WHERE (`roomID`='$roomID')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel-room&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel-room&e=103");
        }

    }

    
}