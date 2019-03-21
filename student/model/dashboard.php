<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 11:32 AM
 */

class DASHBOARD{

    function total_fees($conn){

        $id = $_SESSION['studentID'];
        $sql ="SELECT `fees` FROM `get_fees_summary_total` where studentID='$id' LIMIT 0, 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 0){
            $total = "0.00";
        }else {
            $r = $result->fetch_assoc();
            $total = $r['fees'];
            $total = number_format($total,2);
        }

        return $total;
    }

    function total_payment($conn){

        $id = $_SESSION['studentID'];
        $sql ="SELECT `paid` FROM `get_fees_summary_total` where studentID='$id' LIMIT 0, 1";
        $result=$conn->query($sql);
        if ($result->num_rows == 0){
            $total = "0.00";
        }else {
            $r = $result->fetch_assoc();
            $total = $r['paid'];
            $total = number_format($total,2);
        }

        return $total;
    }

    function  total_balance($conn){

        $id = $_SESSION['studentID'];
        $sql ="SELECT balance FROM `get_fees_summary_total` where studentID='$id' LIMIT 0, 1";
        $result=$conn->query($sql);
        if ($result->num_rows == 0){
            $total = "0.00";
        }else {
            $r = $result->fetch_assoc();
            $total = $r['balance'];
            $total = number_format($total,2);
        }

        return $total;
    }

    function semester($semester){

        if ($semester == 1){
            $s = "1st Semester";
        }elseif ($semester == 2){
            $s = "1st Semester";
        }

        echo $s;
    }

    function programme($conn,$programme){

        $sql="SELECT * FROM `get_programme` where progID='$programme' LIMIT 0, 1";
        $result=$conn->query($sql);
        if ($result->num_rows === 0){

        }else {
            $r = $result->fetch_assoc();
            echo $r['programme'];

        }
    }
}
