<?php 
    require_once("../../app/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = mysqli_real_escape_string($_POST['favid']);
        $sql = mysqli_query($conn, "UPDATE passwords SET favorite = NOT favorite WHERE id = $id;");
    }

    header("Location:http://" . $_SERVER['HTTP_HOST']);
?>