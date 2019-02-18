<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/01/2019
 * Time: 10:24 AM
 */

function search_pin($conn,$search){

    if(!isset($search)){
        header("location: index.php?_route=admin&p=pins.list&e=112");
    }else{

        $sql="SELECT * FROM `get_all_pins` where `pin`LIKE '%{$search}%' OR `username`LIKE '%{$search}%'ORDER BY pin_id DESC LIMIT 0,20";
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

        }else{
            echo"error 111";
        }
    }
}

function search_student_Profile($conn,$profile){

    if(!isset($profile)){
        header("location: index.php?_route=admin&p=pins.list&e=112");
    }else{

        $sql ="SELECT * FROM get_student_profile_detail WHERE
                get_student_profile_detail.admissionNo LIKE '%{$profile}%' OR
                get_student_profile_detail.school LIKE '%{$profile}%' OR
                get_student_profile_detail.prefix LIKE '%{$profile}%' OR
                get_student_profile_detail.country LIKE '%{$profile}%' OR
                get_student_profile_detail.nationality LIKE '%{$profile}%' OR
                get_student_profile_detail.programme LIKE '%{$profile}%'
                ORDER BY admissionNo DESC LIMIT 0,20";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_assoc($result)){
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
        }else{
          echo"error 111";
        }
    }
}

function search_hostel($conn,$hostel){

    if(!isset($hostel)){
        header("location: index.php?_route=admin&p=pins.list&e=112");
    }else{

        $sql ="SELECT * FROM get_hostel_booking WHERE
                pin_index LIKE '%{$hostel}%' OR
                admissionNo LIKE '%{$hostel}%' OR
                yearID LIKE '%{$hostel}%'
                ORDER BY get_hostel_booking.userID DESC LIMIT 0,20";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_assoc($result)){
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
        }else{
            echo"error 111";
        }
    }
}

