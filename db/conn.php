<?php 
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'password_manager';

    $conn = mysqli_connect($host, $user, $password, $database);
    if($conn->connect_error) {
        echo "An unknown error occurred.";
    }
?>