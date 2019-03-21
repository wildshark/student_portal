<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 20/03/2019
 * Time: 8:07 AM
 */
$servername = "46.101.88.78";
$username = "iquipe";
$password = "@passWD8282";
$database = "school_data";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{

    session_start();
    echo "Connected successfully";
}
