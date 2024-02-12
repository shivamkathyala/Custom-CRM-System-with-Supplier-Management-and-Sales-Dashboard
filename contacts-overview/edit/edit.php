<?php
include('../../connection.php');
$id=$_GET['id'];	
echo $id;
die;
$sql = "SELECT * FROM contacts_overview WHERE ID ='$id'";
$result = $connection->query($sql);
$row = mysqli_fetch_assoc($result);

		
	$f_name = $row['first_name'];
    $l_name = $row['first_name'];
    $tag = $row['tag'];
    $salesprocess = $row['sales_process'];
    $email = $row['email_address'];
    $phone = $row['phone_number'];
    $value = $row['value'];
    $deals = $row['deals'];
    $events = $row['upcoming_events'];
   
	
	
	$sql ="UPDATE contacts_overview SET first_name = '$f_name',first_name ='$l_name',tag ='$tag',sales_process ='$salesprocess',email_address ='$email',phone_number ='$phone',value ='$value',deals ='$deals',upcoming_events ='$events',date_added = CURRENT_DATE() WHERE ID='$id'";
	
	$result=$connection->query($sql);
	if($result == True){
		echo "Updated successfully";
	}
	else{
		echo "<br> Error:". "<br>". $connection->error;
	}

	


?>