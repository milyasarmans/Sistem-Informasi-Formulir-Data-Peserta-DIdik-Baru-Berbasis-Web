<?php
    session_start();
    if (!isset($_SESSION["role"])) {
        header("location:index.php");
    } else {
        $role = $_SESSION["role"];
    }
?>
