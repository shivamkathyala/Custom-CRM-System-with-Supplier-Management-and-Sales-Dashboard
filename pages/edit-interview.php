<?php
include('../connection.php');
$id = $_POST['id'];
$date = $_POST['newDate'];
$type = $_POST['newtype'];
// Format the date as 'YYYY-MM-DD'
$formattedDate = date('Y-m-d', strtotime($date));

$update = mysqli_query($connection, "UPDATE sales_interview SET date = '".$formattedDate."', type = '".$type."'  WHERE id=$id" );
?>
