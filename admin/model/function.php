<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 4:00 PM
 */

function pin_generated($conn){

    $sql="SELECT * FROM `get_pins`LIMIT 0,10";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while ($r = mysqli_fetch_assoc($result)){
            if ($r['status'] == 1){
                $status = "Active";
            }else{
                $status = "Passive";
            }
            echo"
                <tr>
                    <td>{$r['pin_date']}</td>
                    <td>{$r['pin']}</td>
                    <td>{$r['username']}</td>
                    <td>{$r['mobile']}</td>
                    <td>{$status}</td>                   
                </tr>
                ";
        }
    }
}

function pin_list($conn){

    $sql="SELECT * FROM `get_all_pins` ORDER BY pin_id DESC LIMIT 0,20";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        while ($r = mysqli_fetch_assoc($result)){
            if ($r['status'] == 1){
                $status = "<label class='badge badge-info'>Active</label>";
            }elseif ($r['status'] == 2){
                $status = "<label class='badge badge-success'>Used</label>";
            }else{
                $status = "<label class='badge badge-danger'>Block</label>";
            }
            echo"
                <tr>
                    <td>{$r['pin_date']}</td>
                    <td>{$r['pin']}</td>
                    <td>{$r['username']}</td>
                    <td>{$r['mobile']}</td>                
                    <td>{$status}</td>                   
                </tr>
                ";
        }
    }
}

function student_list($conn){

    $sql ="SELECT * FROM `school_data`.`get_student_profile_detail`";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if ($r['statusID'] == 1){
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Passive</label>";
            }
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=student.profile.detail&t={$r['token']}'>{$r['admissionNo']}</a></td>
                    <td>{$r['first_name']} {$r['surname']}</td>
                    <td>{$r['prefix']}</td>
                    <td>{$r['programme']}</td>
                    <td>{$status}</td>                   
                </tr>
            ";
        }
    }
}

function affiliate($conn){

    $sql ="SELECT * FROM `school_data`.`get_affliate_school`";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if($r['statusID'] == 1){
                $status = "Active";
            }else{
                $status = "Passive";
            }
            echo"
                <tr>
                    <td>{$r['affliate']}</td>
                    <td>{$r['affliate_prefix']}</td>
                    <td>{$status}</td>
                    <td><a href='index.php?_route=admin&p=affiliate&e=104&d={$r['affliateID']}'>edit</a></td>
                </tr>
            ";

        }
    }
}

function faculty($conn){

    $sql ="SELECT * FROM `school_data`.`get_school`";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if($r['statusID'] == 1){
                $status = "Active";
            }else{
                $status = "Passive";
            }
            echo"
                <tr>
                    <td>{$r['school']}</td>
                    <td>{$r['prefix']}</td>
                    <td>{$r['affliate_prefix']}</td>
                    <td>{$status}</td>
                    <td><a href='index.php?_route=admin&p=faculty&e=104&d={$r['schoolID']}'>edit</a></td>
                </tr>
            ";

        }
    }
}

function course($conn){

    $sql ="SELECT * FROM `school_data`.`get_course`";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if ($r['semesterID'] === 1){
                $status = "1st Semester";
            }else{
                $status = "2nd Semester";
            }
            echo"
                <tr>
                    <td>{$r['course_code']}</td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>
                    <td>{$r['affliate_prefix']}</td>
                    <td>{$r['credit']}}</td>
                    <td>{$r['course_level']}}</td>
                    <td>{$status}</td>
                </tr>
            ";
        }
    }
}


?>


