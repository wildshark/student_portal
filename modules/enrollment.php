<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/12/2018
 * Time: 7:49 AM
 */

class ENROLL{

    function  add_enrollment($conn){

        $date = $_POST['date'];
        $student= $_POST['student'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $programme = $_POST['programme'];
        $pin = $_POST['pin'];

        $sql ="";
        if ($result->num_rows == 0){
            header("location: index.php?_route=student&p=enrollment.form&e=102");
        }else{
            $sql="UPDATE `school_data`.`enrollment` SET 
          `enroll_date` = '$date',
          `studentID` = '$student', 
          `semesterID` = '$semester', 
          `s_level` = 1, 
          `yearID` = '$year', 
          `progID` = '$programme' 
          WHERE `pins` = '$pin'";
            $result = mysqli_query($conn,$sql);
            echo "ok";
        }
    }

    function add_course($conn){

        $date = date("Y-m-d");
        $student =  $_SESSION['studentID'];
        $school = $_POST['school'];
        $programme = $_POST['programme'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $level = $_POST['level'];


        echo $sql ="INSERT INTO `school_data`.`course_registration`(`regDate`, `studentID`, `schoolID`, `progID`, `yearID`, `semesterID`, `level`) VALUES ('$date', '$student', '$school', '$programme', '$year', '$semester', '$level')";
        /**
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0){

        }
         **/

    }

    function remove_course($conn){

    }


}