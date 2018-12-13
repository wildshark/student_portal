<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:26 PM
 */

class PINs{

    function add($conn){

        $pin = $_POST['pin'];
        $index = $_POST['index'];
        $mobile = $_POST['mobile'];
        $date = date('Y-m-d');
        $sql= "INSERT INTO `school_data`.`pins`(`pin`, `username`, `mobile`, `pin_date`) VALUES ('$pin', '$index', '$mobile', '$date')";
        $result = mysqli_query($conn,$sql);

        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function update($conn){

        $id = $_POST['id'];
        $pin = $_POST['pin'];
        $index = $_POST['index'];
        $mobile = $_POST['mobile'];
        $date = date('Y-m-d');
        $sql= "UPDATE `school_data`.`pins` SET `pin` = '$pin', `username` = '$index', `mobile` = '$mobile', `pin_date` = '$date' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function activate($conn){

        $id = $_POST['id'];
        $sql="UPDATE `school_data`.`pins` SET `status` = '1' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function  deactivate($conn){
        $id = $_POST['id'];
        $sql="UPDATE `school_data`.`pins` SET `status` = '2' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }
    }
}