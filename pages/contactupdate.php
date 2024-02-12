<?php
include('../connection.php');

$id = $_POST['id'];

$position = $_POST['position'];	
$fname = $_POST['fname'];	
$lname = $_POST['lname'];	
//$lname = $_POST['lname'];	
$phone = $_POST['phone'];	
$email = $_POST['email'];	
$company = $_POST['company'];	
	
	if(!empty($position)){
			$sql ="UPDATE contacts_overview SET position = '$position', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
	if(!empty($fname)){
			$sql ="UPDATE contacts_overview SET first_name = '$fname', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
	if(!empty($lname)){
			$sql ="UPDATE contacts_overview SET second_name = '$lname', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
	if(!empty($phone)){
			$sql ="UPDATE contacts_overview SET phone_number = '$phone', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
	if(!empty($email)){
			$sql ="UPDATE contacts_overview SET email_address = '$email', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
	if(!empty($company)){
			$sql ="UPDATE contacts_overview SET comapny_name = '$company', date_added = CURRENT_DATE() WHERE contact_id='$id'";
			$result = mysqli_query($connection, $sql);
	}
	
?>