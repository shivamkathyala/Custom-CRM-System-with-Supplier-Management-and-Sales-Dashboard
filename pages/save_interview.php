<?php
include('../connection.php');

$date = $_POST['interviewDate'];
$type = $_POST['type'];
$insert = mysqli_query($connection, "INSERT INTO sales_interview (type, date) VALUES ('".$type."', '".$date."')" );

?>