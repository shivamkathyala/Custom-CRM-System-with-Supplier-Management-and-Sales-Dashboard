<?php
include('../connection.php');
$title = $_POST['title'];
$note = $_POST['note'];
$noteid = $_POST['id'];
if(!empty($title) && !empty($note) && !empty($noteid)){
$sql = "UPDATE notes SET note_name='$title', note_content='$note' WHERE note_id=$noteid";
$result = mysqli_query($connection, $sql);
}
?>