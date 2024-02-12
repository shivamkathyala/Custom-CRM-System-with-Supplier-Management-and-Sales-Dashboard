<?php
include('../connection.php');
$original_array = $_POST['rowid'];
$string_version = implode(',', $original_array);

$sql = "DELETE FROM `event_reminder` WHERE `id` IN (".$string_version.")";

if ($connection-> query($sql)=== True){
	echo "<br><br>Record deleted successfully";
}
else{
	echo "<br>Error:<br>". $connection->error;
}
?>