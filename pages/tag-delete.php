<?php
include('../connection.php');

$id = $_POST['id'];

$sql = "DELETE FROM `tag` WHERE `tag_id`=$id";
$result = mysqli_query($connection, $sql);

mysqli_close($connection);
?>
