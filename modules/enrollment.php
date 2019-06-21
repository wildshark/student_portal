<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/12/2018
 * Time: 7:49 AM
 */

class ENROLL{

    function  add_enrollment($conn,$account,$data){

        $date = $data['date'];
        $student= $_SESSION['studentID'];
        $year = $data['year'];
        $semester = $data['semester'];
        $programme = $data['programme'];
        $level = $data['level'];
        $pin = $data['pin'];
        $status= 1;

        $sql ="SELECT * FROM `get_enrollment` where pins=? AND stud_index=? AND s_level=? AND semesterID=? AND statusID =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $pin,$student,$level,$semester,$status);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows == 0){
            return 102;
            exit();
            //header("location: index.php?_route=student&p=enrollment.form&e=102");
        }else {

            //get student
            $sql = "SELECT * FROM `get_student_index` where `stud_indexID`='$student' LIMIT 0, 1000";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows == 0) {
                $student = 0;
            } else {
                $r = $result->fetch_assoc();
                $catID = $r['categoryID'];
            }

            // get payment
            $sql = "SELECT * FROM `get_total_payment` where `studentID`='$student' AND `progID`='$programme' AND `semesterID`='$semester' AND `levelID`='$level' AND `yearID`='$year'";
            $result = mysqli_query($account, $sql);
            if ($result->num_rows == 0) {
                $paid_amount = 0;
            } else {
                $r = $result->fetch_assoc();
                $paid_amount = $r['paid'];
            }


            // get fees
            $sql = "SELECT * FROM `get_fee_prices_list` where `progID`='$programme' AND `catID`='$catID' AND `semesterID`='$semester'";
            $result = mysqli_query($account, $sql);
            if ($result->num_rows == 0) {
                $bill_amount = 0;
            } else {
                $r = $result->fetch_assoc();
                $bill_amount = $r['amount'];

                $bill = ($bill_amount * (75 / 100));
            }

            if ($paid_amount > $bill) {

                $sql = "UPDATE `enrollment` SET `enroll_date` = '$date',`yearID` = '$year',`progID` = '$programme',`statusID` = '2' WHERE `pins` = '$pin'";
                $result = mysqli_query($conn, $sql);
                if ($result == TRUE) {
                    return 104;
                    exit();
                    //header("location: index.php?_route=student&p=enrollment.form&e=104");
                } else {
                    return 103;
                    //header("location: index.php?_route=student&p=enrollment.form&e=103");
                    exit();
                }
            } else {
                return 128;
                //header("location: index.php?_route=student&p=enrollment.form&e=128");
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
                return array("error"=>104,"url"=>$url);
                //header("location: index.php?_route=student&p=course.registration&e=104&{$url}");
            }else{
                return array("error"=>103,"url"=>$url);
                //header("location: index.php?_route=student&p=course.registration&e=103&{$url}");
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
            return 200;
            //header("location: ". $_SERVER['HTTP_REFERER']);
        }
    }
}