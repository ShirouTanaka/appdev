<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "hashlearn";

    $con = mysqli_connect($host, $username, $password, $db_name);

    if(!$con){
        die("Failed to connect with database");
    }

    //for easy access to the database, just make write include 'connect.php';
    //this automatically runs
?>