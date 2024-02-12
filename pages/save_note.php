<?php
include('../connection.php');

$title = $_POST['title'];
$note = $_POST['note'];
$contactid = $_POST['id'];
if(!empty($title) && !empty($note) && !empty($contactid)){
$sql = "INSERT INTO notes (contact_id, note_name, note_content) VALUES ('$contactid', '$title', '$note')";
$result = mysqli_query($connection, $sql);
}
?>
