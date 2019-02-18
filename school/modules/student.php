<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 10/01/2019
 * Time: 6:39 AM
 */

class STUDENT{

    function generate_student_index($conn){

        $date = date("Y-m-d");
        $name = $_POST['student-name'];
        $mobile = $_POST['mobile'];
        $programme = $_POST['programme'];
        $yearID = $_POST['year'];
        $stream = $_POST['stream'];

        $check = "SELECT * FROM `get_student_index` where name='$name' and mobile='$mobile' and progID='$programme' and yearID='$yearID' and streamID='$stream'";
        $result = mysqli_query($conn,$check);
        if($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            $id = $r['stud_indexID'];
            header("location: index.php?_route=admin&p=student.index&e=118&d={$id}");
            exit(0);
        }else{
            if(!isset($total_student)){
                $student = "SELECT * FROM get_total_student_index WHERE yearID = '$yearID' AND progID='$programme' and streamID='$stream'";
                $result = mysqli_query($conn,$student);
                if($result->num_rows > 0) {
                    $r = $result->fetch_assoc();
                    $total_student = $r['total'];
                }else{
                    $total_student = "0";
                }
            }

            if(!isset($prefix)){

                $program = "SELECT * FROM get_programme where progID = '$programme'";
                $result =  mysqli_query($conn,$program);
                if($result->num_rows > 0) {
                    $r = $result->fetch_assoc();
                    $prefix = $r['prog_prefix'];
                }else{
                    $prefix = "0";
                    header("location: index.php?_route=admin&p=student.index&e=114");
                    exit($prefix);
                }
            }

            if(!isset($year)){
                $aca_yr = "SELECT * FROM get_academic_session where academic_yr = '$yearID'";
                $result =  mysqli_query($conn,$aca_yr);
                if($result->num_rows > 0) {
                    $r = $result->fetch_assoc();
                    $year = $r['year'];
                    $year = substr($year,-2);
                }else{
                    $year = "0";
                    header("location: index.php?_route=admin&p=student.index&e=117");
                    exit($year);
                }
            }

            if ($total_student == 0) {
                $total_student = 1;
                $index = $prefix. "0" . $stream . "" . $year . "00" . $total_student;
            } else {
                $total_student = $total_student + 1;
                $unit = strlen($total_student);
                switch ($unit) {
                    case 1:
                        $index = $prefix . "0" . $stream . "" . $year . "00" . $total_student;
                        break;
                    case 2:
                        $index = $prefix . "0" . $stream . "" . $year . "0" . $total_student;
                        break;
                    case 3:
                        $index = $prefix . "0" . $stream . "" . $year . "0" . $total_student;
                        break;
                    case 4:
                        $index = $prefix . "0" . $stream . "" . $year . "" . $total_student;
                        break;
                }

            }

            if(!isset($index)){
                header("location: index.php?_route=admin&p=student.index&e=115");
                exit();
            }else{
                $sql = "SELECT * FROM `get_student_index` where stud_index ='$index' LIMIT 0,1";
                $result = mysqli_query($conn,$sql);
                if($result->num_rows > 0) {
                    header("location: index.php?_route=admin&p=student.index&e=116");
                    exit();
                }else{
                    $sql="INSERT INTO `student_index` (`create_date`, `name`, `mobile`,`stud_index`, `progID`, `yearID`,`streamID`, `statusID`, `modify`) VALUES ('$date', '$name', '$mobile','$index','$programme', '$yearID','$stream', '1', '$date')";
                    $result = mysqli_query($conn,$sql);

                    if($result == TRUE){
                        header("location: index.php?_route=admin&p=student.index&e=104");
                    }else{
                        header("location: index.php?_route=admin&p=student.index&e=103");
                    }
                }
            }
        }
    }
}