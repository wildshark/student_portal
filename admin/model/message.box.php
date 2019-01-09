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

        $text_color = "text-white";
        if($r['msg_box'] =='a-pri'){
            $bg_color = "bg-primary";
        }elseif($r['msg_box'] =='a-sec'){
            $bg_color = "bg-secondary";
        }elseif ($r['msg_box']=='a-suc'){
            $bg_color = "bg-success";
        }elseif ($r['msg_box']=='a-dan'){
            $bg_color = "bg-danger";
        }elseif ($r['msg_box']=='a-war'){
            $bg_color = "bg-warning";
        }elseif ($r['msg_box']=='a-inf'){
            $bg_color = "bg-info";
        }elseif ($r['msg_box']=='a-dar'){
            $bg_color = "bg-dark";
        }else{
            $bg_color = "bg-light";
            $text_color ="text-dark";
        }
    }


    return"
        <span class='d-block {$bg_color} d-md-flex align-items-center'>
            <p class='{$text_color}'>{$message}</p>
            <i class='{$text_color} mdi mdi-close popup-dismiss d-none d-md-block pull-right'></i>
        </span>
    ";
}