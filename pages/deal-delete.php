<?php
include('../connection.php');

// getting id by ajax
$id = $_POST['id'];
echo
$sql = "DELETE FROM `deals` WHERE `deal_id` = $id";

if($connection->query($sql) === TRUE){
	echo "Deal deleted successfully";
}else{
		echo "Error";
}

?>