<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 16/12/2018
 * Time: 2:43 AM
 */

class  PROGRAMME{

    function add_affiliate($conn){

        $affiliate = $_POST['affiliate'];
        $prefix = $_POST['prefix'];
        $note = $_POST['note'];

        $sql ="INSERT INTO `school_data`.`affliate_school`(`affliate`, `affliate_prefix`, `note`) VALUES ('$affiliate', '$prefix', '$note')";
        $result = mysqli_query($conn,$sql);

        if($result === TRUE){
            header("location: index.php?_route=admin&p=affiliate&e=104");
        }else{
            header("location: index.php?_route=admin&p=affiliate&e=103");
        }
    }

    function update_affiliate($conn){

        $id = $_SESSION['id'];
        $affiliate = $_POST['affiliate'];
        $prefix = $_POST['prefix'];
        $note = $_POST['note'];

        $sql ="UPDATE `school_data`.`get_affliate_school` SET 
                `affliate` = '$affiliate', 
                `affliate_prefix` = '$prefix', 
                `note` = '$note' 
                WHERE `affliateID` = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result === TRUE){
            header("location: index.php?_route=admin&p=affiliate&e=104");
        }else{
            header("location: index.php?_route=admin&p=affiliate&e=103");
        }
    }

    function add_faculty($conn){

        $school = $_POST['faculty'];
        $prefix = $_POST['prefix'];
        $affliateID = $_POST['affiliate'];

        $sql = "INSERT INTO `school_data`.`school`(`school`, `prefix`, `affliateID`, `statusID`, `catID`) VALUES ('$school', '$prefix','$affliateID', '1', '1')";
        $result = mysqli_query($conn,$sql);

        if($result === TRUE){
            header("location: index.php?_route=admin&p=faculty&e=104");
        }else{
            header("location: index.php?_route=admin&p=faculty&e=103");
        }
    }

    function edit_faculty($conn){

        $id = $_SESSION['id'];
        $school = $_POST['faculty'];
        $prefix = $_POST['prefix'];
        $affliateID = $_POST['affiliate'];

        $sql = "UPDATE `school_data`.`school` SET 
                `school` = '$school', 
                `prefix` = '$prefix', 
                `affliateID` = '$affliateID' 
                WHERE `schoolID` = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result === TRUE){
            header("location: index.php?_route=admin&p=faculty&e=104");
        }else{
            header("location: index.php?_route=admin&p=faculty&e=103");
        }
    }
}