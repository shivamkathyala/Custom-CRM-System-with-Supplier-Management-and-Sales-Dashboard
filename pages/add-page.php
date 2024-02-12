<?php 
 include '../auth/adminFunction.php'; 
include('../connection.php');
 ?>
<!Doctype html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>ContactsPersonalPage</title>
      <link rel="stylesheet" href="../style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

</head> 

<body>

<?php
//checkError();
$id=$_GET['id'];  

$sql = "SELECT * FROM contacts_overview WHERE contact_id ='$id'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
    $contact_id = $row['contact_id'];
    $f_name = $row['first_name'];
    $l_name = $row['first_name'];
    $tag = $row['tag'];
    $salesprocess = $row['sales_process'];
    $email = $row['email_address'];
    $phone = $row['phone_number'];
    $value = $row['value'];
    $deals = $row['deals'];
    $events = $row['upcoming_events'];
	$position = $row['position'];
	$company = $row['comapny_name'];
	
 ?>
<div class="main-pageContent">
  <div class="right-sideContent">
	<!--Upcoming scheduled event html start -->
	
	<div class="rightside reminder">
	<h2>Upcoming Scheduled Events</h2>
	<table class="reminder table">
	<?php
	$event = "SELECT * FROM event_reminder WHERE `contact_id` = $id";
			$eventresult = mysqli_query($connection, $event);
			if(mysqli_num_rows($eventresult) > 0){
			$sno = 1;
			while ($rowevent = mysqli_fetch_assoc($eventresult)){
				?>
				<tr>
				<td><?php echo $sno; ?></td>
				<td>Date :<?php echo $rowevent['date']; ?></td>
				<td>Title :<?php echo $rowevent['event']; ?></td>
				<td><input class="checkrow" name="checkname[]" value="<?php echo $rowevent['id']; ?>" type="checkbox"></td>
				</tr>
				<td class="contenteventshow" colspan="4">
				  <div class="dropdownevent">
					<button class="dropbtnevent">View</button>
					<div class="dropdown-contentevent">
					  <!-- Content will go here -->
						<p>Serial No. <?php echo $sno; ?></p>
						<p>Title :<?php echo $rowevent['event']; ?></p>
						<p>Contact :<?php echo $rowevent['contact']; ?></p>
						<p>Type :<?php echo $rowevent['type']; ?></p>
						<p>Date :<?php echo $rowevent['date']; ?></p>
						<p>Time :<?php echo $rowevent['time']; ?></p>
						<p>Content :<?php echo $rowevent['content']; ?></p>
						
					</div>
				  </div>
				</td>
				<?php
				$sno++;
				}
				}else{
					echo "<div class='noeventmsg'>No saved event reminders</div>";
				}
				?>	
	</table>
	
	<button id="eventdelete">Delete</button>
	</div>
	
	<!--Upcoming scheduled event html end -->
  
  
    <div id="topcontentwrapper"> 

      <div class="tp-right">
		<!-- The tag Modal end-->
		<div class="m-row">
		<button id="myBtn3" class="contactag tp-t-btn">Contact's Tag</button>
		</div>
		<!-- The tag Modal -->
		<div id="myModal3" class="modal">
			<!-- tag Modal content -->
			<div class="modal-content">
			<div class="modal-header"> 
			<p>Add Tag</p>
			<span class="close3">&times;</span>
			</div>
			<div class="modal-body">
				  <form>
					<input type="text" id="tagsIP">
					
					
					<button id="addTag" type="submit">Save</button>
				  </form>
			</div>
			</div>
		</div>

<!-- The tag Modal end-->	
	  <div  id="tagContainer">	
      <button id="myBtn10" class="salesprocess tp-t-btn"> Sales Process </button>
      <!-- The salesprocess tag Modal start-->
		<div id="myModal10" class="modal">
			<!-- tag Modal content -->
			<div class="modal-content">
			<div class="modal-header"> 
			<p>Add Salesprocess Tag</p>
			<span class="close10">&times;</span>
			</div>
			<div class="modal-body">
				  <form>
					<input style="width: 400px;" type="text" id="saleIP" name="saleIP[]">
					
					<button id="addsalesprocesstag" type="submit">Save</button>
				  </form>
			</div>
			</div>
		</div>

<!-- The salesprocess tag Modal end-->

      </div>
	  
	<div class="m-row">
		<button id="myBtnans" class="contactag tp-t-btn">Add Survey Answers</button>
	</div>
	<div class="m-row">
	<!-- Trigger/Open The survey answer Modal -->
		<button id="myBtnsurveyAns">View Submitted Surveys</button>
	<!-- add survey answer popup start -->
	</div>
	<!-- The Modal -->
<div id="myModalans" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <p>Select Survey:</p>
    </div>
    <div class="modal-body">
		<div id="surveylist">
		  <p>List of Survey Forms:</p>
		  <hr>
		  
		  <select name="answer" id="selectSurvey">
			<option value="">Select Survey</option>
		  <?php
				$surveyans = "SELECT * FROM add_survey";
				$surveyansResult = mysqli_query($connection, $surveyans);

				if (mysqli_num_rows($surveyansResult) > 0) {
					$surveynum = 1;
					while ($rowans = mysqli_fetch_array($surveyansResult)) {
						echo "<option value='" . $rowans['id'] . "'>" . $surveynum . ". " . $rowans['name'] . "</option>";
						$surveynum++;
					}
				} else {
					echo "No Survey form available";
				}
			?>
			</select>
			<button id="btnAns">Proceed</button>
		 </div>
		 <div id="surveyAns" style="display:none;">
			<button class="closeAns">Go back</button>
			<div class="selectedSurvey"></div>
		 </div>
    </div>
  </div>

</div>

	
	<!-- add survey answer popup end -->

      <div class="md-right">
      <div class="m-row">
        <button id="addnote"> + Note</button>
      </div>
      <div class="m-row">
        <button id="addemail"> + Email </button>
      </div>
      <div class="m-row">
        <button id="openPopup"> +Event/Reminder </button>
      </div>
	  <!-- event popup form start -->
	  
		<div id="popup" class="popup">
			<div class="popup-content">
				<h2>Create Event/Reminder</h2>
				<form id="myFormEvent">
				<!-- Form fields go here -->
				<label for="eventName">Name of event: </label>
				<input type="text" id="eventName" name="eventName" required>
				<br>
				<label for="contact">With contact: </label>
				<input type="text" id="contact" name="contact" required>
				<br>
				<label for="event">Event type: </label>
				<input type="text" id="event" name="event" required>
				<br>
				<label for="date">Date: </label>
				<input type="date" id="date" name="date" required>
				<br>
				<label for="time">Time: </label>
				<input type="time" id="time" name="time" required>
				<br>
				<label for="content">Content: </label>
				<textarea id="content" name="content" cols="10" rows="10"></textarea>
				<br>
                 <div class="save_close">
				  <button name="save" type="submit" class="save_btn">Save</button>
                  <button id="closePopup">Close</button>
                 </div>
				</form>
				
			</div>
		</div>
		<div id="overlay"></div>
	

	  <!-- event popup form end -->

      </div>

      <div class="bt-right">
      <div style="display: none;" id="notefield" class="bt-inner">
		<label for="textInputtitle">Note title:</label>
        <input type="text" id="texttitle" name="textInputtitle" placeholder="Write your note title here"> </input> 
        <label for="textInput">Note:</label>
        <input type="text" id="textInput" name="textInput" placeholder="Write your note here"> </input> 
		
        <button id="Saveheadinput"> Save </button> 
        <button id="closeheadinput">Close</button>
      </div>
      </div>
      
    </div>
   
    <div id="maincontentwrapper">
      <div style=" justify-content: center;">
      <h2 style= "text-align:center;">Timeline:</h2>
      </div>

      <div id="timeline">
      <!-- Your timeline content here -->
      	  <div class="timeLin_inner">
			
      		<?php
      		
      		 $query = "SELECT * FROM notes WHERE contact_id = $id";
      		 $result = mysqli_query($connection, $query);
			 if(mysqli_num_rows($result) > 0){
      		 while($rownote = mysqli_fetch_assoc($result)){
			
      		?>
			
		  <div class="flexthisrow">
          <div class="possimPara">
				
      			<?php echo $rownote['date_added']; ?>
      			<b>NOTE:</b> <?php echo $rownote['note_name']; ?>
          </div>
          <div class="posimIcon">
      			<button onclick="editNotesave(<?php echo $rownote['note_id']; ?>)"><i class="fa fa-edit" style="font-size:24px"></i></button>
      			<button onclick="deleteNote(<?php echo $rownote['note_id']; ?>)"><i class="fa fa-trash" style="font-size:24px"></i></button>
          </div>
		  </div>
			 
		  <!-- edit note popup -->
				<div style="display: none;" id="<?php echo $rownote['note_id']; ?>" class="noteedit">
				<label class="nedit" for="editInputtitle">Note title:</label>
				<input type="text" id="edittexttitle" name="editInputtitle" value="<?php echo $rownote['note_name']; ?>"> </input> 
				<label class="nedit" for="editInput">Note:</label>
				<input type="text" id="edittextInput" name="editInput" value="<?php echo $rownote['note_content']; ?>"></input> 
				<input id="hiddennote" type="hidden" value="<?php echo $rownote['note_id']; ?>">
				<button class="noteupdatebutton" onclick="editSaveheadinput(<?php echo $rownote['note_id']; ?>)">Update</button> 
				<button class="noteeditbutton" onclick="closeNoteEdit(<?php echo $rownote['note_id']; ?>)" id="editcloseheadinput">Close</button>
				</div>
				
      		<?php
      		 }
			 }else{
				 echo "<div class='noteedit'>Notes empty</div>";
			 }
      		?>
			
      	  </div>
      </div>
			   <!--Survey form data timeline start -->
   <div class="surveyformcombine" id="questionanswer">
   <?php
    $completed = "SELECT * FROM completed_surveys WHERE contact_id = $id";
    $comresult = mysqli_query($connection, $completed);
    $numcom = 1;

    if (mysqli_num_rows($comresult) > 0) {
        while ($rowcom = mysqli_fetch_assoc($comresult)) {
            // You should use $rowcom instead of $numcom for fetching data.
			echo "<div class='answerflex'>";
            echo "<p class='sp'>".$numcom."<p>";
            echo "<p>" . $rowcom['survey_name'] . "</p>";
            echo "<p>" . $rowcom['submitdate'] . "</p>";
			//echo "<button>View</button>";
			echo "<input type='hidden' id='delsurveyid' value='" . $rowcom['completed_survey_id'] . "'>";

			echo "<button class='deleteSurveyAnswer'><i class='fa fa-trash' style='font-size:24px'></i></button>";
      		
			echo "</div>";
            // Move the increment inside the loop to number each record.
            $numcom++;
        }
    } else {
        echo "<div class='nocompletedsurveymsg'>No Survey form submitted</div>";
    }
?>
			

    </div>
	
  <!--</div>-->

<!-- The Modal -->
<div id="myModalsurveyAns" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="closexc">&times;</span>
      <p>Submitted Survey Answers</p>
    </div>
    <div class="modal-body">
		<?php
	$join = "SELECT add_survey.question, completed_surveys.survey_name, completed_surveys.survey_answer_1, completed_surveys.survey_answer_2, completed_surveys.survey_answer_3, completed_surveys.survey_answer_4, completed_surveys.survey_answer_5, completed_surveys.survey_answer_6, completed_surveys.survey_answer_7, completed_surveys.survey_answer_8, completed_surveys.survey_answer_9, completed_surveys.survey_answer_10, completed_surveys.survey_answer_11, completed_surveys.survey_answer_12, completed_surveys.survey_answer_13, completed_surveys.survey_answer_14, completed_surveys.survey_answer_15, completed_surveys.survey_answer_16, completed_surveys.survey_answer_17, completed_surveys.survey_answer_18, completed_surveys.survey_answer_19
			FROM add_survey
			INNER JOIN completed_surveys
			ON add_survey.id =completed_surveys.predefined_survey_id";
	$joinres = mysqli_query($connection, $join);
	if(mysqli_num_rows($joinres)>0){
	while($rowjoin = mysqli_fetch_assoc($joinres)){
		echo "<div class='stimename'><b>Survey Name:</b>".$rowjoin['survey_name']."</div>";
	//echo"<pre>";
	//print_r($rowjoin);
	$serializeques = $rowjoin['question'];
	$unserializeques = unserialize($serializeques);
	$questionlength = count($unserializeques);
	//echo $questionlength;
	//print_r($unserializeques);
	
	//echo $unserializeques[0];
	$quesnum = 0;
	$q = 1;
	for($i = 1; $i<=$questionlength; $i++){
		echo "<div class='stiquesans'>";
		echo "<b>Question: </b>" . $q . " " . $unserializeques[$quesnum] . "<br>" . "<b>Answer: </b>" . $rowjoin['survey_answer_' . $i];
		echo "</div>";
		echo "<br>";
		$quesnum++;
		$q++;
	}
	echo "<br>";
	echo "<hr>";
	//echo $rowjoin['survey_answer_1'];
	}
}else{
	echo "No Survey submitted";
}

		?>
    </div>
  </div>

</div>

</div>
<!-- Survey form data timeline end-->
  <div id="sidebarcontactdetailswrapper" class="left-sideContent">
    <h1 id="contactname"> Contact Name  </h1><button class="refreshbtntop" title="Refresh current window" id="refreshIcon"><i class="fa fa-refresh" style="font-size:20px;"></i></button>
    <div class="form-filed"> 
      <p> Title/Position </p> 
      <input type="text" id="dataFieldtitle" value="<?php echo $position; ?>" placeholder= "title or position" disabled>
	   <button id="editButtontitle"><i class='fa fa-pencil'></i></button>
	   <button type="submit" id="saveButtontitle" style="display:none;">Save</button>
    </div>  

    <div class="form-filed">
      <p> First Name</p>
      <input type="text" id="dataFieldfname" value="<?php echo $f_name; ?>" placeholder ="Joe" disabled>
	  <button id="editButtonfname"><i class='fa fa-pencil'></i></button>
	  <button type="submit" id="saveButtonfname" style="display:none;">Save</button>
    </div>

    <div class="form-filed"> 
      <p> Last Name</p>
      <input type= text id="dataFieldlname" value="<?php echo $l_name; ?>" placeholder ="Last name" disabled>
	  <button id="editButtonlname"><i class='fa fa-pencil'></i></button>
	  <button type="submit" id="saveButtonlname" style="display:none;">Save</button>
    </div>
	
	<div class="form-filed"> 
      <p> Tag:</p>
	  <?php
		  $gettag = "SELECT * FROM tag WHERE contact_id = $id";
		  $resulttag = mysqli_query($connection, $gettag);
		  if (mysqli_num_rows($resulttag) > 0) {
			while ($rowtag = mysqli_fetch_assoc($resulttag)) {
			  echo "<p><b>" . $rowtag['tag_name'] ."</b></p><br>";
			  echo "<p><button class='deltagbtn' onclick='delTag(". $rowtag['tag_id'].")'><i class='fa fa-trash'></i></button></p>";
			}
		  } else {
			echo "<div class='notagmsg'>No tags</div>";
		  }
	   ?>

    </div>
	
	<div class="form-filed"> 
      <p> Salesprocess tag:</p>
	  <?php
		  $getsalestag = "SELECT * FROM sales_process WHERE contact_id = $id";
		  $resultsalestag = mysqli_query($connection, $getsalestag);
		  if (mysqli_num_rows($resultsalestag) > 0) {
			while ($rowsalestag = mysqli_fetch_assoc($resultsalestag)) {
			  echo "<p><b>" . $rowsalestag['sales_process_name'] ."</b></p>";
			  echo "<p><button class='delsalestag' onclick='delTagsales(". $rowsalestag['sales_process_id'].")'><i class='fa fa-trash'></i></button></p>";	 
			  
			}
		  } else {
			echo "<div class='notagmsg'>No tags</div>";
		  }
	   ?>

    </div>

    <div class="form-filed">  
      <p> Phone Number </p>
      <input type="text" id="dataFieldphone" value="<?php echo $phone; ?>" placeholder = "+123224123" disabled>
	  <button id="editButtonphone"><i class='fa fa-pencil'></i></button>
	  <button type="submit" id="saveButtonphone" style="display:none;">Save</button>
    </div> 

    <div class="form-filed">
      <p> Email </p>
      <input type="email" id= "dataFieldemail" value="<?php echo $email; ?>" placeholder = "adam@salesquotasetter.com" disabled>
	  <button id="editButtonemail"><i class='fa fa-pencil'></i></button>
	  <button type="submit" id="saveButtonemail" style="display:none;">Save</button>
    </div> 

    <div class="form-filed">
      <p> Total Value Earned From Contact </p>
      <i class="fa fa-dollar"></i>
      <?php
      // total deal value
      $dealtotal = "SELECT SUM(value) FROM deals WHERE contact_id = $id";

      $result = mysqli_query($connection, $dealtotal);

      if ($result) {
          $row = mysqli_fetch_row($result);
          $total = $row[0];
          //echo "Total deal value: " . $total;
          ?>
          <input type="text" id="contactvalue" placeholder="deal value" value="<?php echo $total; ?>" readonly>

          <?php
      } else {
          echo "Error: " . mysqli_error($connection);
      }
      ?>
      
    </div> 

    <div class="form-filed">
      <p> Company </p>
      <input type="text" id ="dataFieldcompany" value="<?php echo $company; ?>" placeholder="company name" disabled>
	  <button id="editButtoncompany"><i class='fa fa-pencil'></i></button>
	  <button type="submit" id="saveButtoncompany" style="display:none;">Save</button>
	  
    </div>
	<table id="deal_Table">
	<?php
		$sql = "SELECT * FROM deals WHERE `contact_id` = $id";
		$result = mysqli_query($connection, $sql);
		if(mysqli_num_rows($result) > 0){
		$serialNumber = 1;
        while ($row = mysqli_fetch_assoc($result)){
			$dateOnly = $row['date_documented'];
			$formattedDate = date("Y-m-d", strtotime($dateOnly));

	?>
	
			<tr>
                <td><?php echo $formattedDate; ?></td>
                <td>DEAL <?php echo $serialNumber; ?>:</label>
                <td><?php echo $row['dealname']; ?>"</td>
                <td><i class="fa fa-dollar"></i><?php echo $row['value']; ?></td>
                <td><button class="dealtableedit" onclick="enableEdit(<?php echo $row['deal_id']; ?>)">
				<i class="fa fa-pencil"></i>
				</button>
				<button class="deletetabledeal" onclick="deleteRow(<?php echo $row['deal_id']; ?>)">
				<i class="fa fa-trash"></i>
				</button></td>
            </tr>
	
	<?php
		$serialNumber++;
        } 
    } else {
        echo "<p class='nodealsmsg'>No deals</p>";
    }

	?>
	</table>

    <div id="deallist">
      <button id="myBtn" style= "background-color:green;color:white"> Record Deal/Purchase </button>
	</div>

<!-- The DEAL Modal -->
<div id="myModal" class="modal">

  <!--DEAL Modal content -->
  <div class="modal-content">
    <div class="modal-header">
	<span class="closedm">&times;</span>
      <p>Record Deal</p>
    </div>
    <div class="modal-body">
      <form>
	  <label class="popupclid" for="deal">Deal</label>
	  <input id="deal" type="text" name="deal" placeholder="Enter deal name" required>
	  <label class="popupclid" for="sales">Value</label>
    <i class="fa fa-dollar"></i><input id="sales" type="number" name="sales" placeholder="Enter deal value" required>
	  <input id="salespersonid" type="hidden" value="<?php echo $id; ?>">
	  <input id="save" type="submit" name="save" value="Save">
	  </form>
    </div>
  </div>

</div>
	
<!-- The DEAL Modal end-->

<!-- The DEAL Edit Modal start-->

<div id="myModaledit" class="modal">

  <!--DEAL Modal content -->
  <div class="modal-content">
    <div class="modal-header">
    <span class="closeedit">&times;</span>
      <p>Edit Deal</p>
    </div>
    <div class="modal-body">
      <form method="post">
	  <label class="popupclid" for="dealEN">Deal</label>
	  <input id="dealedit" type="text" name="dealEN" placeholder="Enter deal name" required>
	  <label class="popupclid" for="salesEN">Value</label>
    <i class="fa fa-dollar"></i><input id="salesedit" type="number" name="salesEN" placeholder="Enter deal value" required>
	  <input id="dealIdEdit" type="hidden" name=dealIdEdit>
	  <input id="saveedit" type="submit" name="save" value="Update">
	  </form>
    </div>
  </div>

</div>

<!-- The DEAL Edit Modal end-->

<!-- Sales interview popup form start-->
	
<!-- The sales Modal -->
	<div id="myModal2" class="modal">
  <!-- Sales Modal content -->
  <div class="modal-content">
    <div class="modal-header"> 
      <p>Add Sales Interview</p>
	  <span class="close2">&times;</span>
    </div>
    <div class="modal-body">
			 <form method="post">
				<div class="salesintdiv">
						<label class="popupclid">Choose an Interview Date</label>
						<input type="date" id="datepicker">
						<label class="popupclid">Interview Type</label>
						<input name="type" type="text" id="interview_type">
						<button id="addInterview" type="submit">Add Interview</button>
				</div>
			 </form>
    </div>
  </div>
</div>



<!-- fetching interview data php start -->


<?php

$sql = "SELECT * FROM sales_interview";
$result = mysqli_query($connection, $sql); 
if (mysqli_num_rows($result) > 0) {
    while ($row1 = mysqli_fetch_assoc($result)) {
?>
<div class="sale-interview">
        <label class="popupclid" for="date">Sales Interview at: </label> <input type="date" name="date" id="date_<?php echo $row1['id'];?>" value="<?php echo $row1['date']; ?>" disabled>
        <input type="text" id="type_<?php echo $row1['id'];?>" value="<?php echo $row1['type']; ?>" disabled>
		<button  class="saleintbtnopen" onclick="editRow(<?php echo $row1['id']; ?>)" style="display: none;" id="save_<?php echo $row1['id'];?>">Save</button>
        <button class="saleintbtnedit"onclick="Edit(<?php echo $row1['id']; ?>)"><i class="fa fa-pencil"></i></button>
        <button class="saleintbtndel" onclick="delRow(<?php echo $row1['id']; ?>)"><i class="fa fa-trash"></i></button>
</div>
<?php
    }
}
?>
<!-- fetching interview data php end -->

<div id="previoussalesinterviewlist">
	<button id="myBtn2" style="background-color:green;color:white"> Record Sales Interview </button>
	</div>
<!-- The sales Modal end-->

    <div id="previoussalescallslist" > 
	  <?php
		//$call = "SELECT * FROM 'sales_call' WHERE 'contact_id' = '$id'";
		$call = "SELECT * FROM `sales_call` WHERE `contact_id`=$id";  
		 
	  $result = mysqli_query($connection, $call);
	  
  	
		if ($result) {
			 if (($numrows = mysqli_num_rows($result)) > 0) {
				$callnum = 1;
				while ($rowcall = mysqli_fetch_assoc($result)) { 
						 
					 	echo "<div class='row-".$rowcall['id']."'>";
						echo "<p>". $callnum."</p>";
					 	echo "<p>". $rowcall['date']."</p>";
					 	echo "<p>". $rowcall['time']."</p>";
						echo "<p> <button class='editcallsale' onclick='editCall( ". $rowcall['id'].")'><i class='fa fa-pencil'></i></button></p>";	 
						echo "<p> <button class='delcallsales' onclick='delRowcallsales( ". $rowcall['id'].")'><i class='fa fa-trash'></i></button></p>";	 
						echo "</div>";
						$callnum++;
				}
			 }else{
				 echo "<p class='nosalecallsmsg'>No calls</p>";
			 }
		} else {
			echo "Query execution failed: " . mysqli_error($connection);
		}

	  
	   ?>  
	  
	  <!-- sales call edit start -->
	
	<div id="saleseditpopup" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
              <div class="modal-header">
              <span class="closesalespopup">&times;</span>
                  <p>Sales call</p>
              </div>
              <div class="modal-body">
              <form method="post">
					  <label class="popupclid">Sales call at:</label>
					  <input id="salescalldateedit" name="salescalldateedit" type="date" value="">
					  <input id="salescalltimeedit" name="salescalltimeedit" type="time" value="">
					  <input id="salescalleditid" type="hidden" value="">
					  
					  <input type="submit" name="submitedit" id="salescallbtnedit" value="Update">
              </form>
              
			  </div>
          </div>

	</div>
	
	<!-- sales call edit end -->
	  <span><p style="display: inline;"> Previous Sales Calls </p> <p style="display: inline;"><?php echo $numrows; ?></p></span>
      <button id ="addsalescall"style= "background-color:green;color:white">Record Sales Call </button>
    </div>
    <!-- Sales calls popup start -->
    <div id="myModal5" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
              <div class="modal-header">
              <span class="close5">&times;</span>
                  <h2>Record Sales call</h2>
              </div>
              <div class="modal-body">
              <form method="post">
              <label class="popupclid">Sales call at:</label>
              <input id="salescalldate" name="salescalldate" type="date" value="">
              <input id="salescalltime" name="salescalltime" type="time" value="">
              
              <input type="submit" name="submit" id="salecallbtn" value="save">
              </form>
              
			  </div>
          </div>

    </div>
     <!-- Sales calls popup end -->
    <div id = "previousprospectingcalls"> 
	
      
		<div id="myModal6" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
              <div class="modal-header">   
                  <p>Prospecting call</p>
				  <span class="close6">&times;</span>
              </div>
              <div class="modal-body">
              <form method="post">
              <label class="popupclid">Prospecting call at:</label>
              <input id="proscalldate" name="proscalldate" type="date" value="">
              <input id="proscalltime" name="proscalltime" type="time" value="">
              
              <input type="submit" name="submit" id="proscallbtn" value="save">
              </form>
              
			  </div>
          </div>

		</div>
		
		<?php
		$callpros = "SELECT * FROM `pros_call` WHERE `contact_id`=$id";  
		 
	  $resultpros = mysqli_query($connection, $callpros);
	  
  	
		if ($resultpros) {
			 if (($totalpros = mysqli_num_rows($resultpros)) > 0) {
				$callnumpros = 1;
				while ($rowcallpros = mysqli_fetch_assoc($resultpros)) { 
						 
					 	echo "<div class='row-".$rowcallpros['id']."'>";
						echo "<p>". $callnumpros."</p>";
					 	echo "<p>". $rowcallpros['date']."</p>";
					 	echo "<p>". $rowcallpros['time']."</p>";
						echo "<p> <button class='editproscallbtn' onclick='Editcallpros( ". $rowcallpros['id'].")'><i class='fa fa-pencil'></i></button></p>";	 
						echo "<p> <button class='delproscallbtn' onclick='delRowcallpros( ". $rowcallpros['id'].")'><i class='fa fa-trash'></i></button></p>";	 
						echo "</div>";
						$callnumpros++;
				}
			 }else{
				 echo "<p class='noproscallsmsg'>No calls</p>";
			 }
		} else {
			echo "Query execution failed: " . mysqli_error($connection);
		}

	  
	   ?>
	<!-- Pros call edit start -->
	
	<div id="prosedit" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
              <div class="modal-header">
                  <p>Prospecting call</p>
				  <span class="closepros">&times;</span>
              </div>
              <div class="modal-body">
              <form method="post">
              <label class="popupclid">Prospecting call at:</label>
              <input id="proscalldateedit" name="proscalldateedit" type="date" value="">
              <input id="proscalltimeedit" name="proscalltimeedit" type="time" value="">
              <input id="proscalleditid" type="hidden" value="">
              
              <input type="submit" name="submitedit" id="proscallbtnedit" value="Update">
              </form>
              
			  </div>
          </div>

		</div>
	
	<!-- Pros call edit end -->
	   <span><p style="display: inline;"> Previous Prospecting Calls</p> <p style="display: inline;"><?php echo $totalpros; ?></p></span>
      <button id="addprospectingcall"style= "background-color:green;color:white"> Record Prospecting Call </button>
    </div>
    
  </div>
</div>


	<input type="hidden" id="salescontactid" value="<?php echo $id; ?>">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdn.jsdelivr.net/jquery.tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
		
		<script src="script1.js"></script>
    
</body>  
</html>