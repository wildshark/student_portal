<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 10/01/2019
 * Time: 5:56 AM
 */

$year = date("Y");
$last_yr = date("Y") -1;
 //$year = $last_yr."/".$year;
$year="2017/2018";

function total_new_entry($conn,$year){

    $sql ="SELECT Count(studentID) AS total, statusID, yearID FROM student_profile where yearID='$year' GROUP BY statusID, yearID ";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $r= $result->fetch_assoc();

        $total = $r['total'];
    }else{
        $total = "0";
    }

    return $total;
}

function total_enrollment($conn,$year){

    $sql="SELECT Count(enrollID) AS total, yearID FROM enrollment where yearID = '$year'GROUP BY yearID";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        $r= $result->fetch_assoc();

        $total = $r['total'];
    }else{
        $total = "0";
    }

    return $total;

}
