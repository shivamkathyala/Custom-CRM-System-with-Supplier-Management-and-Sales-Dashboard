<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit; // Ensure that no code is executed after the redirection
?>
