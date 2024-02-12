const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
  dropdownTriggers.forEach((trigger) => {
    trigger.addEventListener('click', () => {
      dropdownTriggers.forEach((otherTrigger) => {
        if (otherTrigger !== trigger) {
          otherTrigger.classList.remove('active');
        }
      });
      trigger.classList.toggle('active');
    });
  });
 

var addButton = document.getElementById("addcontactbtn");
var addContactForm = document.getElementById("AddContactForm");
var deleteButton = document.getElementById("deletecontactbtn");
var cancelButton = addContactForm.querySelector('input[value="cancel"]');
// Find the table body by its id
var tableBody = document.getElementById("contactlist");
// Counter for sample data
var dataCounter = 1;
// Function to add a new row
function addContact() {
   // Show the Add Contact Form
   addContactForm.style.display = "block";
   formpopup.style.display = "block";
}
function addContacthide(){
	
	   document.getElementById("formpopup").style.display = "none";
	
}


cancelButton.addEventListener("click", function (event) {
   event.preventDefault(); // Prevent the default form submission
   addContactForm.reset(); // Reset the form to its initial state
   addContactForm.style.display = "none";
   formpopup.style.display = "none";

});

addButton.addEventListener("click", addContact);


$(document).ready(function() {    
  
// Data table
var table = $('#contactRecord').DataTable({
    select: {
        style: 'multi',
        selector: 'th:first-child input:checkbox',
        selectAll: true
    }
});
 
$('#contactRecord').on('click', 'th:first-child input:checkbox', function () {
    var isChecked = this.checked; // Get the checked state of the header checkbox
    $('.checkrow').prop('checked', isChecked); // Set the checked state for all checkboxes with class 'checkrow'
});


        // Handle form submission 
         $('#submitButton').click(function(){ 
            event.preventDefault(); // Prevent the default form submission 
        
            
            // Extract form input values
            var firstName = document.getElementById("firstName").value;
            var secondName = document.getElementById("secondName").value;
            var tag = document.getElementById("tag").value;
            var salesProcess = document.getElementById("salesProcess").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var value = document.getElementById("value").value;
            var deals = document.getElementById("deals").value;
            var events = document.getElementById("events").value;
            if (firstName != '' && email != '' ) {
				
               $.ajax({
                   method: "POST",
                   url: "/CRM-Project/contacts-overview/inc/addcontact.php",
                   data: {firstName:firstName, secondName:secondName, tag:tag, salesProcess:salesProcess, email:email, phone:phone, value:value, deals:deals, events:events},
                   dataType: "text",
                   success: function(data) {
                       // Ajax call completed successfully
                       $('.successAlert').text("Form Submited Successfully");
					   
                       setTimeout(function(){
							$('#contactlist').html(data);
							$('#contactlist').addClass('active'); 
                            $('.successAlert').hide();
                            $('.errorAlert').hide();
							$('#ajaxLoaderHorizontal').show();
						   setTimeout(function(){
								$('#ajaxLoaderHorizontal').hide();
								addContacthide();
								addContactForm.reset();
						   }, 3000);
                           
                       }, 2000);
                      
                   }
               });
            }else{
               $('.errorAlert').text("Please fill the information ");
			    $('.errorAlert').css('display', 'block');
               
            }
        }); 
});

//////////////////survey form script start////////////////


    // survey form show/hide onclick script
	
	var surveybtn = document.getElementById("addsurveybtn");
	surveybtn.addEventListener("click", openForm);
   
   function openForm() {
     document.getElementById("myForm").style.display = "block";
   }
   
   function closeForm() {
     document.getElementById("myForm").style.display = "none";
   }
   function surveyformhide(){
	setTimeout(function () {
	   document.getElementById("myForm").style.display = "none";
	}, 2000);
}

   //add question field dynamically
	$(document).ready(function() {
    var max_fields      = 19; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><label for="mytext[]">Question '+ x +':</label><input class="survey_questions" type="text" name="mytext[]"/><button class="remove_field">Delete</button></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
 
$(document).ready(function () {
            $('#savesurvey').click(function (e) {
                e.preventDefault();
				
                var s_name = $('.survey_name').val();
             
			   var s_questions_array = $('.survey_questions').map(function() {
				return $(this).val();
				}).get();
				var datetime = $('.date_time').val();
				console.log("Survey Name:", s_name);
				console.log("Survey Questions:", s_questions_array);
				console.log("Date:", datetime);
				if (s_name != '' && s_questions_array != '' && datetime != '' ) {
                $.ajax({
                    url: '/CRM-Project/contacts-overview/inc/addsurvey.php',
                    type: 'POST',
                    data: {surveyName:s_name, date:datetime, surveyQuestion:s_questions_array},
                    success: function (response) {
                        
						$('.successAlertsurvey').text("Your form has been saved successfully.");
						surveyformhide();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('Your form was not saved successfully.');
                    }
                });
				}else{
					$('.errorAlertsurvey').text("Please fill the information ");
					$('.errorAlertdurvey').css('display', 'block');
				}
            });
        });

//////////survey form ajax end////////////////////


//////////delete button script////////////////////
	

$(document).ready(function() {
	 $("#deletecontactbtn").hide();

    // Attach a change event listener to all checkboxes
    $(":checkbox").on("change", function() {
        // Check if any checkbox is checked
        if ($(":checkbox:checked").length > 0) {
            // If at least one checkbox is checked, display the element
            $("#deletecontactbtn").show();
        } else {
            // If no checkboxes are checked, hide the element
            $("#deletecontactbtn").hide();
        }
    });
	
	$('#deletecontactbtn').click(function () {
    var val = [];
    $(':checkbox:checked').each(function (i) {
        val.push($(this).val());
    });

    console.log(val);

    if (val.length > 0) {
        $.ajax({
            url: '/CRM-Project/contacts-overview/delete/delete.php',
            type: 'POST',
            data: { rowid: val },
            success: function (data) {
                $('.successDelete').text("Rows deleted successfully.");
				 setTimeout(function(){
					// You can do further actions here after a successful delete.
					location.reload();
				}, 3000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error deleting rows.');
                console.error(textStatus, errorThrown);
            }
        });
    } else {
        alert('Please select at least one row to delete.');
    }
});

	 
});




