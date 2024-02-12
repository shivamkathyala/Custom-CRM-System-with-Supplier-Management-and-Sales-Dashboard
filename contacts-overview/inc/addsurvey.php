 <?php
 include('../../connection.php'); 
 
    $surveyName = $_POST["surveyName"];
    $surveyQuestion = serialize($_POST["surveyQuestion"]);
	$formattedDate = date('Y-m-d H:i:s', strtotime($_POST["date"]));

	$insert = mysqli_query($connection, "INSERT INTO add_survey (name, question, date) VALUES ('".$surveyName."', '".$surveyQuestion."', '".$formattedDate."')" );
        
?>  
 

