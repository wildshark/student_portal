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

        $sql ="INSERT INTO `affliate_school`(`affliate`, `affliate_prefix`, `note`) VALUES ('$affiliate', '$prefix', '$note')";
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

        $sql ="UPDATE `get_affliate_school` SET 
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

        $sql = "INSERT INTO `school`(`school`, `prefix`, `affliateID`, `statusID`, `catID`) VALUES ('$school', '$prefix','$affliateID', '1', '1')";
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

    function add_courses($conn){

        $programme = $_POST['programme'];
        $course = $_POST['course'];
        $code = $_POST['code'];
        $credit = $_POST['credit'];
        $level = $_POST['level'];
        $theory = $_POST['theory'];
        $practicals = $_POST['practicals'];
        $semester = $_POST['semester'];

        $sql = "INSERT INTO `course`(`progID`, `course`, `course_code`,`theory`,`practicals`, `credit`, `course_level`, `semesterID`) VALUES ('$programme', '$course', '$code','$theory','$practicals', '$credit', '$level', '$semester')";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=course&e=104");
        }else{
            header("location: index.php?_route=admin&p=course&e=103");
        }
    }

    function edit_courses($conn){

        $id = $_SESSION['id'];
        $programme = $_POST['programme'];
        $course = $_POST['course'];
        $code = $_POST['code'];
        $credit = $_POST['credit'];
        $level = $_POST['level'];
        $semester = $_POST['semester'];

        $sql = "UPDATE `course` SET 
            `progID` = '$programme', 
            `course` = '$course', 
            `course_code` = '$code', 
            `credit` = '$credit', 
            `course_level` = '$level', 
            `semesterID` = '$semester' 
            WHERE `courseID` = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result === TRUE){
            header("location: index.php?_route=admin&p=course&e=104");
        }else{
            header("location: index.php?_route=admin&p=course&e=103");
        }

    }
}