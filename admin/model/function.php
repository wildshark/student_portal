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
?>
