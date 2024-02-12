
<?php
include('../connection.php');

// getting id by ajax
$id = $_POST['surveyId'];

$sql = "DELETE FROM `completed_surveys` WHERE `completed_survey_id` = $id";

if($connection->query($sql) === TRUE){
	echo "Deleted successfully";
}else{
		echo "Error";
}

?>


