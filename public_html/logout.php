<?php 
    session_start();
    if(isset($_SESSION['unique_id'])) {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            if($id == $_SESSION['unique_id']) {
                session_unset();
                session_destroy();
                header("Location:login.php");
            } else {
                header("Location:index.php");
            }
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:login.php");
    }
?>