<?php include ('../../connection.php');
 
$original_array = $_POST['rowid'];
$string_version = implode(',', $original_array);
  echo $string_version;
 
  $sql = "SELECT * FROM contacts_overview";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
echo "<br>";

 
$sql = "DELETE FROM `contacts_overview` WHERE `contact_id` IN (".$string_version.")";
echo  $sql;
if ($connection-> query($sql)=== True){
	echo "<br><br>Record deleted successfully";
}
else{
	echo "<br>Error:<br>". $connection->error;
}
   

?>