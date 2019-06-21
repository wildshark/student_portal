<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 8:53 AM
 */
//include "db.config.php";

$host = "178.128.174.56";
$username = "iquipe";
$password = "@passWD8282";
$port ='3306';

$account_database ="ghanacuc_account";
$admission_database ="ghanacuc_admission";
$administrative_database ="ghanacuc_school_data";


// Create connection
$account_conn = new mysqli($host, $username, $password,$account_database,$port);

// Check connection
if ($account_conn->connect_error) {
//    die("Connection failed: " . $account_conn->connect_error);
}else{

    $_SESSION['account_db'] ="start";
}

// Create connection
$admin_conn = new mysqli($host, $username, $password,$administrative_database,$port);

// Check connection
if ($admin_conn->connect_error) {
    die("Connection failed: " . $admin_conn->connect_error);
}else{
    $_SESSION['administrative_db'] ="start";
}

// Create connection
$admission_conn = new mysqli($host, $username, $password,$admission_database,$port);

// Check connection
if ($admission_conn->connect_error) {
    die("Connection failed: " . $admission_conn->connect_error);
}else{
    $_SESSION['admission_db'] ="start";
}
