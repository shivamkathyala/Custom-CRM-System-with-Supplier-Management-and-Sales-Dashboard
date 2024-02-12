 <?php
 include('../../connection.php'); 

  
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
          //  echo "New record created successfully";
        }else {
          //  echo "Error: " . $insert . "<br>" . $connection->error;
        }

        $select = "SELECT * FROM contacts_overview ORDER BY contact_id DESC";
                
                $result = mysqli_query($connection, $select); 
                if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {  
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['second_name']; ?></td>
                        <td><?php echo $row['tag']; ?></td>
                        <td><?php echo $row['sales_process']; ?></td>
                        <td><?php echo $row['email_address']; ?></td>
                        <td><?php echo $row['phone_number']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['deals']; ?></td>
                        <td><?php echo $row['upcoming_events']; ?></td>
						<td><a href="/CRM-Project/pages/add-page.php?id=<?php echo $row['contact_id']; ?>"><i class="fa fa-pencil-square-o" style="font-size:36px"></i></a></td>

                    </tr>
                    <?php
                }
            }

?>  
 