
<?php
include('../connection.php');

// getting id by ajax
$id = $_POST['id'];

$sql = "DELETE FROM `notes` WHERE `note_id` = $id";

if($connection->query($sql) === TRUE){
	echo "Note deleted successfully";
}else{
		echo "Error";
}

?>


