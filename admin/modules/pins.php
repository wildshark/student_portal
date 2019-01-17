<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/12/2018
 * Time: 5:26 PM
 */

class PINs{

    function search($conn){

        if(!isset($_POST['q'])){
            header("location: index.php?_route=admin&p=pins.list&e=112");
        }else{

            $q = $_POST['q'];

            $sql="SELECT * FROM `get_all_pins` where `pin`='$q' ORDER BY pin_id DESC LIMIT 0,20";
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

                $sql="SELECT * FROM `get_all_pins` where `username`='$q' ORDER BY pin_id DESC LIMIT 0,20";
                $result = mysqli_query($conn,$sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($r = mysqli_fetch_assoc($result)) {
                        if ($r['status'] == 1) {
                            $status = "<label class='badge badge-info'>Active</label>";
                        } elseif ($r['status'] == 2) {
                            $status = "<label class='badge badge-success'>Used</label>";
                        } else {
                            $status = "<label class='badge badge-danger'>Block</label>";
                        }
                        echo "
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
                    header("location: index.php?_route=admin&p=pins.list&e=111");
                }
            }

        }
    }

    function add($conn){

        $pin = $_POST['pin'];
        $index = $_POST['index'];
        $mobile = $_POST['mobile'];
        $date = date('Y-m-d');

        $sql= "INSERT INTO `pins`(`pin`, `username`, `mobile`, `pin_date`) VALUES ('$pin', '$index', '$mobile', '$date')";
        $result = mysqli_query($conn,$sql);

        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function update($conn){

        $id = $_POST['id'];
        $pin = $_POST['pin'];
        $index = $_POST['index'];
        $mobile = $_POST['mobile'];
        $date = date('Y-m-d');
        $sql= "UPDATE `pins` SET `pin` = '$pin', `username` = '$index', `mobile` = '$mobile', `pin_date` = '$date' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function activate($conn){

        $id = $_POST['id'];
        $sql="UPDATE `pins` SET `status` = '1' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }

    }

    function  deactivate($conn){
        $id = $_POST['id'];
        $sql="UPDATE `pins` SET `status` = '2' WHERE `pin_id` = '$id'";

        $result = mysqli_query($conn,$sql);
        if ($result == TRUE){
            header("location: index.php?_route=admin&p=create.pins&e=104");
        }else{
            header("location: index.php?_route=admin&p=create.pins&e=103");
        }
    }
}