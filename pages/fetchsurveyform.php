<?php
include('../connection.php');

 
    $id = $_POST["id"];
 
    // Validate and sanitize user input (better to use prepared statements)
    //$id = mysqli_real_escape_string($connection, $id);

    $sql = "SELECT * FROM `add_survey` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql);
	$data = mysqli_fetch_assoc($result);
	$question = unserialize($data['question']);        
        
		
	//echo "<pre>"; print_r($data);
	//echo "<pre>"; print_r($question);
    if ($result) {

        $numques = count($question);
		
        echo "<div class='ans_main'>";
        echo "<div class='survey_name'><p>Survey Name: </p><span>" . $data['name'] . "</span></div>";
        echo "<form method='post'>";
        echo "<input type='hidden' id='hiddenid' value='" . $data['id'] . "'>";

        $num = 1;
        for ($i = 0; $i < $numques; $i++) {
            echo "<div class='question-set'>";
            echo "Question " . $num .":";
            echo "<label>" . $question[$i] . "</label>";
            echo "<input required placeholder='Type your answer here...' type='text' name='survey_ans' class='survey_answer'>";
            echo "</div>";
            $num++;
        }

        echo "<input id='saveansform' type='button' name='save_ans' class='save_answer' value='Save Answer'>";
        echo "</form>";
        echo "</div>";
    }  
   
?>
