<?php
include('../connection.php');

	$id = $_POST['data']['id'];
	$contactid = $_POST['data']['contactid'];
	$surveyname = $_POST['data']['surveyname'];
	
	$values = $_POST['data']['values'];
	echo $id;
	echo "kuch bhi";
	echo $contactid;
	print_r($values);
	$empty = " ";
	
	if(!empty($values[0])){
    $value1 = $values[0];
	}else{
		$value1 = $empty;
	}
	if(!empty($values[1])){
    $value2 = $values[1];
	}else{
		$value2 = $empty;
	}
	if(!empty($values[2])){
    $value3 = $values[2];
	}else{
		$value3 = $empty;
	}
	if(!empty($values[3])){
    $value4 = $values[3];
	}else{
		$value4 = $empty;
	}
	if(!empty($values[4])){
    $value5 = $values[4];
	}else{
		$value5 = $empty;
	}
	if(!empty($values[5])){
    $value6 = $values[5];
	}else{
		$value6 = $empty;
	}
	if(!empty($values[6])){
    $value7 = $values[6];
	}else{
		$value7 = $empty;
	}
	if(!empty($values[7])){
    $value8 = $values[7];
	}else{
		$value8 = $empty;
	}
	if(!empty($values[8])){
    $value9 = $values[8];
	}else{
		$value9 = $empty;
	}
	if(!empty($values[9])){
    $value10 = $values[9];
	}else{
		$value10 = $empty;
	}
	if(!empty($values[10])){
    $value11 = $values[10];
	}else{
		$value11 = $empty;
	}
	if(!empty($values[11])){
    $value12 = $values[11];
	}else{
		$value12 = $empty;
	}
	if(!empty($values[12])){
    $value13 = $values[12];
	}else{
		$value13 = $empty;
	}
	if(!empty($values[13])){
    $value14 = $values[13];
	}else{
		$value14 = $empty;
	}
	if(!empty($values[14])){
    $value15 = $values[14];
	}else{
		$value15 = $empty;
	}
	if(!empty($values[15])){
    $value16 = $values[15];
	}else{
		$value16 = $empty;
	}
	if(!empty($values[16])){
    $value17 = $values[16];
	}else{
		$value17 = $empty;
	}
	if(!empty($values[17])){
    $value18 = $values[17];
	}else{
		$value18 = $empty;
	}
	if(!empty($values[18])){
    $value19 = $values[18];
	}else{
		$value19 = $empty;
	}
	if(!empty($values[19])){
    $value20 = $values[19];
	}else{
		$value20 = $empty;
	}
	
   

/*echo $id.' '.$contactid.' '.$surveyname.' '.$value1.' '.$value2.' '.$value3.' '.$value4.' '.$value5.' '.$value6.' '.$value7.' '.$value8.' '.$value9.' '.$value10.' '.$value11.' '.$value12.' '.$value13.' '.$value14.' '.$value15.' '.$value16.' '.$value17.' '.$value18.' '.$value19.' '.$value20;*/


	$sql = "INSERT INTO completed_surveys(predefined_survey_id, contact_id, survey_name, survey_answer_1, survey_answer_2, survey_answer_3, survey_answer_4, survey_answer_5, survey_answer_6, survey_answer_7, survey_answer_8, survey_answer_9, survey_answer_10, survey_answer_11, survey_answer_12, survey_answer_13, survey_answer_14, survey_answer_15, survey_answer_16, survey_answer_17, survey_answer_18, survey_answer_19) VALUES ('$id','$contactid','$surveyname','$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8','$value9','$value10','$value11','$value12','$value13','$value14','$value15','$value16','$value17','$value18','$value19')";
	
	echo $sql;
	$result = mysqli_query($connection, $sql);
?>