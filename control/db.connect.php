<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 8:53 AM
 */
if($_SERVER['SERVER_NAME'] === 'localhost'){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "school_data";
}elseif($_SERVER['SERVER_NAME'] ==='qschool.herokuapp.com'){
    $servername = "86.101.88.73";
    $username = "admin";
    $password = "@passWD8282";
    $database = "school_data";
}else{
    $servername = "localhost";
    $username = "ghanacucom";
    $password = "ghanacu@50";
    $database = "ghanacu_portal";
}


// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{

    session_start();
}
//echo "Connected successfully";