<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 14/12/2018
 * Time: 11:32 AM
 */

class DASHBOARD{

    function total_fees($conn){
        return "0.00";
    }

    function total_payment($conn){
        return "0.00";
    }

    function  total_balance($conn){
        return"0.00";
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
