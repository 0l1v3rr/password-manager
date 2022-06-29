<?php

    define("SECRETKEY", "please_change_your_secret");

    $host = 'localhost';
    $user = 'root';
    $password = 'pw';
    $database = 'db_name';

    $conn = mysqli_connect($host, $user, $password, $database);
    if($conn->connect_error) {
        echo "An unknown error occurred.";
    }
    
?>