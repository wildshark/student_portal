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
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Passive</label>";
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

    $sql ="SELECT * FROM `get_student_profile_detail`";
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

    $sql ="SELECT * FROM `get_affliate_school`";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if ($r['statusID'] == 1){
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Passive</label>";
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

function hostel($conn){

    $sql ="SELECT * FROM get_hostel_booking ORDER BY get_hostel_booking.userID DESC";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['userID'];
            if ($r['status'] == 1){
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Used</label>";
            }
            echo"
                <tr>
                    <td>{$r['date']}</td>
                    <td><a href='index.php?_route=admin&p=hostel&d={$id}'>{$r['pin_index']}</a></td>
                    <td>{$r['admissionNo']}/{$r['first_name']} {$r['surname']}</td>
                    <td>{$r['book_in']}</td>
                    <td>{$status}</td>
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

            if ($r['statusID'] == 1){
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Passive</label>";
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

function programme($conn){

    $sql ="SELECT * FROM `school_data`.`get_programme`";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['progID'];
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=programme&d={$id}'>{$r['programme']}</a> </td>
                    <td>{$r['prog_prefix']}</td>
                    <td>{$r['prog_year']}</td>
                    <td>{$r['prefix']}</td>
                </tr>
            ";

        }
    }
}

function course_100($conn){

    $sql ="SELECT * FROM `school_data`.`get_course` where course_level = '100'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['courseID'];
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=course&d={$id}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
        }
    }
}

function course_200($conn){

    $sql ="SELECT * FROM `school_data`.`get_course` where course_level = '200'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['courseID'];
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=course&d={$id}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
        }
    }
}

function course_300($conn){

    $sql ="SELECT * FROM `school_data`.`get_course` where course_level = '300'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['courseID'];
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=course&d={$id}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
        }
    }
}

function course_400($conn){

    $sql ="SELECT * FROM `school_data`.`get_course` where course_level = '400'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){
            $id = $r['courseID'];
            echo"
                <tr>
                    <td><a href='index.php?_route=admin&p=course&d={$id}'>{$r['course_code']}</a></td>
                    <td>{$r['course']}</td>
                    <td>{$r['prefix']}</td>                
                    <td>{$r['credit']}</td>
                    <td>{$r['course_level']}</td>
                </tr>
            ";
        }
    }
}

function enrollment_list($conn){

    $sql ="SELECT * FROM get_enrollment_details ORDER BY get_enrollment_details.enrollID DESC";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0){
        while ($r= $result->fetch_assoc()){

            if ($r['statusID'] == 1){
                $status = "<label class='badge badge-success'>Active</label>";
            }else{
                $status ="<label class='badge badge-danger'>Used</label>";
            }
            echo"
                <tr> 
                    <td>{$r['enroll_date']}</td>
                    <td><a href='index.php?_route=admin&p=course.registration&d={$r['enrollID']}'>{$r['pins']}</a></td>
                    <td>{$r['admissionNo']}</td>
                    <td>{$r['first_name']} {$r['surname']}</td>                
                    <td>{$status}</td>                   
                </tr>
            ";
        }
    }
}

?>


