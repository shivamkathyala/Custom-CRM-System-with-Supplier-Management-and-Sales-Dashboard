<?php
include '../auth/adminFunction.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Overview</title>
     <link rel="stylesheet" href="../style.css">
	 <link rel="stylesheet" href="style.css" >
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
   <?php
	headers();
    menus(); 
    leftSidebar();
   ?>
   <div class="pageContent">
    <div id="leftMenu">
        <div class="menu-buttons">
            <button>Emails</button>
            <button>Contacts</button>
            <button>Calendar</button>
            <button>Settings</button>
        </div>
    </div>

    <div id="headwrapper">
        <button onclick="closeForm()" id="addcontactbtn">+ Contact</button>
        <button id="deletecontactbtn">Delete</button>
		<div class="successDelete"></div>
        <button style="float:right;" class="open-button" onclick="addContacthide()" id="addsurveybtn">Create/manage surveys</button>

    </div>

    <div id="centercontentwrapper">
        <!-- Table Content -->
        <?php 

            $select = "SELECT * FROM contacts_overview ORDER BY contact_id DESC"; 
           
            $result = mysqli_query($con, $select); 
            
			
         ?>
		
        <table id="contactRecord">
            <thead>
                <tr>
                    <th><input id="checkbox" type="checkbox" value="0"></th>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Tag</th>
                    <th>Sales Process</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Value</th>
                    <th># of Deals</th>
                    <th>Upcoming Events</th>
					 <th>Action</th> 
                </tr>
            </thead>
            <!-- fetching data from the database -->
     
            <tbody id="contactlist" class="resultAppare">
			<input type="hidden" class="selectedRowD" name="selectedRowD" value="">
                <?php 

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
						  $contact_id = $row['contact_id'];
						  $dealtotalQuery = "SELECT SUM(value) FROM deals WHERE contact_id = $contact_id";
						  $dealtotalResult = mysqli_query($con, $dealtotalQuery);
							 $rowdeal = mysqli_fetch_row($dealtotalResult);
							 $total = $rowdeal[0];		  
				?>
                      <tr id='<?php echo $row['contact_id']; ?>'>
                        <td><input type="checkbox" class="checkrow" name="checkname[]" value="<?php echo $row['contact_id']; ?>">
						</td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['second_name']; ?></td>
                        <td><?php echo $row['tag']; ?></td>
                        <td><?php echo $row['sales_process']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php 
						if(!empty($total)){
						echo $total;
						}else{
							echo "0";
						}
						?>
						</td>
                        <td><?php echo $row['deals']; ?></td>
                        <td><?php echo $row['upcoming_events']; ?></td>
						<td><a href="/CRM-Project/pages/add-page.php?id=<?php echo $row['contact_id']; ?>"><i class="fa fa-pencil-square-o" style="font-size:36px"></i></a></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
      </div>
      <div id="formpopup">
      <div>     <!-- Add Contact Form -->
        <form id="AddContactForm" name="AddContactF" autocomplete="off" method="post" style="display: none;">
            <div class="successAlert"></div>
            <div class="errorAlert"></div>
            <!-- Add your form fields here -->
        <h1> Add Contact</h1>
		 <div id="ajaxLoaderHorizontal" style="display: none;">
			<div class="ajaxInner"> </div>
			<div class="ajaxInner"> </div>
			<div class="ajaxInner"> </div>
		</div> 
        <div class="form-first-text">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName"><br>
        </div>
        <div class="form-second-text">
            <label for="secondName">Second Name:</label>
            <input type="text" id="secondName" name="secondName"><br>
        </div>
        <div class="form-tag-text">
            <label for="tag">Tag:</label>
            <input type="text" id="tag" name="tag"><br>
        </div>
        <div class="form-sale-text">
            <label for="salesProcess">Sales Process:</label>
            <input type="text" id="salesProcess" name="salesProcess"><br>
        </div>
        <div class="form-email-text">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
        </div>
        <div class="form-phone-text">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone"><br>
        </div>
        <div class="form-value-text">
            <label for="value">Value:</label>
            <input type="text" id="value" name="value"><br>
        </div>
        <div class="form-details-text">
            <label for="deals"># of Deals:</label>
            <input type="text" id="deals" name="deals"><br>
        </div>
        <div class="form-event-text">
            <label for="events">Upcoming Events:</label>
            <input type="text" id="events" name="events"><br>
        </div>
		<div class="dobtn">
        <div class="form-submit-btn">
            <input id="submitButton" type="submit" value="Submit">
        </div>
        <div class="form-cancle-btn">
            <input type= "reset" value="cancel">
        </div>
            </div>
        </form> 
    </div>
    </div>
    
    <!-- survey form start -->

<div class="form-popup" id="myForm">
  <form  class="form-container" method="post">
  <?php date_default_timezone_set('Asia/Kolkata');

		$timestamp = time();
		$date_time = date("d-m-Y H:i:s", $timestamp);
		?>
		<div class="successAlertsurvey"></div>
            
    <h3>Create Survey/Sales Questionaire</h3>
    <div class="survey-text">
	<label for="survey_name">Survey Name</label>
    <input type="text" name="survey_name" class="survey_name">
	</div>

    <div class="input_fields_wrap">

    <div>
        <label for="ques[]">Question 1:</label>
        <input type="text" name="ques[]" class="survey_questions">
    </div>

    </div>
	<input type="hidden" class="date_time" name="currentDate" value="<?php echo $date_time; ?>">
 
    <button type="submit" class="btnmain add_field_button">Add Question</button>
    <button type="button" id="savesurvey" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	<div class="errorAlertsurvey"></div>
  </form>
</div>
</div>
    <!-- survey form end -->

    
 
<?php footers(); ?>