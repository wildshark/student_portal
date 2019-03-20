<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/03/2019
 * Time: 12:07 PM
 */
function sms_messenger($sms){

//username from SMSAPI
    $username = 'bsgh-iquipe';
//or 'password' => md5('open-text-password'),
    $password = 'passwd82';
//destination number
    $to = $sms['to'];
//sender name has to be active
    $from = 'smartpay';
//message content
    $message = $sms['msg'];
//API http

    $url = 'http://sms.bernsergsolutions.com:8080/bulksms/bulksms?';

    $c = curl_init();
    curl_setopt($c,CURLOPT_URL,$url);
    curl_setopt($c,CURLOPT_POST,true);
    curl_setopt($c,CURLOPT_POSTFIELDS,  'username='.$username.
        '&password='.$password.
        '&type=0&dlr=1&destination='.$to.
        '&source='.$from.
        '&message='.$message);
    curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
    $content = curl_exec($c);
    curl_close($c);
//echo  $content;

    $str_total = strlen($content);
    $text = 4 - $str_total;

    $msg = substr($content,0,$text);

    if ($msg == 1701){

        return true;
    }else{
        return false;
    }
}