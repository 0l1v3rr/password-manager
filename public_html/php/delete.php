<?php 
    require_once("../../app/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = mysqli_real_escape_string($conn, $_POST['delid']);
        $sql = mysqli_query($conn, "DELETE FROM passwords WHERE id = $id;");
    }

    header("Location:http://" . $_SERVER['HTTP_HOST']);
?>