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

        $sql = "INSERT INTO `school_data`.`hostel_detail`(`tran_date`,`date`, `pin_index`, `studentID`,`ref_no`) VALUES ('$now','$date', '$pin', '$student','$ref')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=hostel&e=104");
        }else{
            header("location: index.php?_route=admin&p=hostel&e=103");
        }

    }
}