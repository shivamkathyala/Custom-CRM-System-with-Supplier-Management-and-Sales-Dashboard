<?php
include('../connection.php');

$id = $_POST['id'];

$sql = "DELETE FROM `sales_process` WHERE `sales_process_id`=$id";
$result = mysqli_query($connection, $sql);

mysqli_close($connection);
?>
