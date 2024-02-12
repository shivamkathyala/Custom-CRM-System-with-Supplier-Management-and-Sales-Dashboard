<?php
include('../connection.php');
 
// Get the data from the POST request 
$delid = $_POST['id'];
  
$sql = "DELETE FROM `sales_call` WHERE `id` = $delid"; 
$result = mysqli_query($connection, $sql);


?>

  