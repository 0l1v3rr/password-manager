<?php 
    include_once "../db/conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['favid'];
        $sql = mysqli_query($conn, "UPDATE passwords SET favorite = NOT favorite WHERE id = $id;");
    }

    header("Location:http://" . $_SERVER['HTTP_HOST']."/password-manager/");
?>