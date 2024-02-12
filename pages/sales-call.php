<?php
include('../connection.php');
 
// Get the data from the POST request
$date1 = $_POST['salescalldate'];
$time1 = $_POST['salescalltime'].':00'; 
$contactid = $_POST['id'];

// $date = $date1 .' '.$time1.':00';
 
 
$sql = "INSERT INTO `sales_call`( `date`, `contact_id`, `time`) VALUES ('$date1','$contactid','$time1')";
 
$result = mysqli_query($connection, $sql);
if($result){
	echo "Inserted !";
}else{
	echo "Not";
}

?>

  