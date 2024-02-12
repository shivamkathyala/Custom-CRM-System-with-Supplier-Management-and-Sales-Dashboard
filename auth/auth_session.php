<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: https://brandclever.in/CRM-Project/auth/login.php");
        exit();
    }
?>