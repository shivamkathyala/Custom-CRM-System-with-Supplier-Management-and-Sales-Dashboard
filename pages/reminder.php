<?php

	include('../connection.php');
					$id       = $_POST['contactid'];
					$event    = $_POST['eventName'];
					$contact  = $_POST['contact'];
					$type     = $_POST['eventType'];
					$date     = $_POST['date'];
					$time     = $_POST['time'];
					$content  = $_POST['content'];

					
					if (!empty($event) && !empty($type)) {
						
						$insert = "INSERT INTO `event_reminder` (`contact_id`, `event`, `contact`, `type`, `date`, `time`, `content`) VALUES ('$id', '$event', '$contact', '$type', '$date', '$time', '$content')";
						$result = mysqli_query($connection, $insert);

						if ($result) {
							
							echo "Event reminder created";
						} else {
							echo "ERROR: " . mysqli_error($connection);
						}
					} else {
						
						echo "All fields are required";
					}
				
			?>