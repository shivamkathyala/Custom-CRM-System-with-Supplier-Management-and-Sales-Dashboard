<?php
include('../connection.php');

$id = $_POST['id'];
echo $id;
$sql = "DELETE FROM sales_interview WHERE id = $id";

if($connection->query($sql) === TRUE){
	echo "Deal deleted successfully";
}else{
		echo "Error";
}
?>