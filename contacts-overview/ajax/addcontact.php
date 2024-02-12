 <?php
 include('../../connection.php'); 

//echo "<pre>";
//print_r($_POST); 
    $fname = $_POST['firstName'];
    $sname = $_POST['secondName'];
    $tag = $_POST['tag'];
    $sales_process = $_POST['salesProcess'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];   
    $value = $_POST['value'];
    $deals = $_POST['deals'];
    $events = $_POST['events'];

  $insert = mysqli_query($connection, "INSERT INTO contacts_overview (first_name, second_name, tag, sales_process, email_address, phone_number, value, deals, upcoming_events) VALUES ('".$fname."', '".$sname."', '".$tag."', '".$sales_process."', '".$email."', '".$phone."', '".$value."', '".$deals."', '".$events."')" );
        if($insert){
            echo "New record created successfully";
        }else {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }


?>  
 