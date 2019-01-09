<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 09/01/2019
 * Time: 2:23 PM
 *
 * a-pri =  primary alert
 * a-sec = secondary alert
 * a-suc = success alert
 * a-dan = danger alert
 * a-war =warning alert
 * a-inf=info alert
 * a-lig = light alert
 * a-dar = dark alert
 *
 *
 */


if (!isset($_GET['e'])){
    $errCode = '100';
}else{
    $errCode = $_GET['e'];
}

function message_box($conn,$errCode){

    $sql ="SELECT * FROM get_error_code where err_no='$errCode'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
        $r= $result->fetch_assoc();
        $message = $r['description'];

        if($r['msg_box'] =='a-pri'){
            $bg_color = "alert-primary";
        }elseif($r['msg_box'] =='a-sec'){
            $bg_color = "alert-secondary";
        }elseif ($r['msg_box']=='a-suc'){
            $bg_color = "alert-success";
        }elseif ($r['msg_box']=='a-dan'){
            $bg_color = "alert-danger";
        }elseif ($r['msg_box']=='a-war'){
            $bg_color = "alert-warning";
        }elseif ($r['msg_box']=='a-inf'){
            $bg_color = "alert-info";
        }elseif ($r['msg_box']=='a-dar'){
            $bg_color = "alert-dark";
        }else{
            $bg_color = "alert-light";
        }
    }

    return"
        <div class='alert {$bg_color} alert-dismissible fade show' role='alert'>
            {$message}
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
    ";
}