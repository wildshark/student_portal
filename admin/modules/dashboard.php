<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 06/01/2019
 * Time: 6:20 PM
 */

function dashboard_student_list($conn){

    $sql="SELECT * FROM `get_student_enrollment` LIMIT 0,1000";
    $result = mysqli_query($conn,$sql);
    while ($r = $result->fetch_assoc()){

        return"
        <tr>
            <td>{$r['pins']}</td>
            <td>{$r['admissionNo']}</td>
            <td>{$r['first_name']} {$r['surname']}</td>
            <td>{$r['programme']}</td>
            <td>{$r['statusID']}</td>
        </tr>
    ";
    }
}


$sql="";
