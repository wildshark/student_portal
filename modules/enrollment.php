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
        $student= $_SESSION['student_index'];
        $year = $_POST['year'];
        $semester = $_POST['semester'];
        $programme = $_POST['programme'];
        $level = $_POST['level'];
        $pin = $_POST['pin'];

        $sql ="SELECT * FROM `get_enrollment` where pins='$pin' AND stud_index='$student' AND s_level='$level' AND semesterID='$semester' AND statusID ='1'";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows == 0){
            header("location: index.php?_route=student&p=enrollment.form&e=102");
        }else {
            $sql = "UPDATE `enrollment` SET
                  `enroll_date` = '$date',
                  `yearID` = '$year', 
                  `progID` = '$programme',
                  `statusID` = '2' 
                  WHERE `pins` = '$pin'";
            $result = mysqli_query($conn, $sql);
            if ($result == TRUE) {

                header("location: index.php?_route=student&p=enrollment.form&e=104");
            } else {
                header("location: index.php?_route=student&p=enrollment.form&e=103");
                exit();
            }

        }
    }

    function add_reg_course($conn){

        $date = date("Y-m-d");
        $courseID = $_GET['c'];
        $programme = $_GET['pg'];
        $student = $_GET['st'];
        $level = $_GET['l'];
        $year = $_GET['y'];
        $semester = $_GET['s'];

        $url ="d={$programme}&st={$student}&l={$level}&s={$semester}&y={$year}&sch=0&adm=0";

        $sql ="SELECT * FROM `get_course_registrated` where studentID='$student' and courseID='$courseID' and level='$level' and yearID='$year' and semesterID='$semester' LIMIT 0, 1";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows == 0){

            $sql = "INSERT INTO `course_registration`(`regDate`, `studentID`, `courseID`, `yearID`, `semesterID`, `level`) VALUES ('$date', '$student', '$courseID', '$year', '$semester', '$level')";
            $result = mysqli_query($conn,$sql);

            if($result == TRUE){
                header("location: index.php?_route=student&p=course.registration&e=104&{$url}");
            }else{
                header("location: index.php?_route=student&p=course.registration&e=103&{$url}");
            }

        }else{
            header("location: index.php?_route=student&p=course.registration&e=120&{$url}");
        }



    }

    function remove_course($conn){
        $id = $_GET['d'];

        //$go_back = $_SERVER['HTTP_REFERER'];
        $sql="DELETE FROM `course_registration` WHERE `regID` = '$id'";
        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: ". $_SERVER['HTTP_REFERER']);
        }
    }


}