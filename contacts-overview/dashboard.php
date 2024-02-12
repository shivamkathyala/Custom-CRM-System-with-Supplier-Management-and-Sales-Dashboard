<?php

include("auth_session.php");
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" >
	<!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	

	<style>

</style>
</head>
<body>

	<div class="navbar">
		
		<a class="active" href="/CRM-Project/auth/dashboard.php"><i class="fa fa-fw fa-home"></i> Home</a>
		
		<?php
		if(isset($_SESSION['username']) && $_SESSION['username'] == 'Admin'){
			echo '<div class="dropdown">
				<button class="dropbtn" onclick="myFunction()"><i class="fa fa-address-book-o"></i>Profile
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content" id="myDropdown">
						<a id="myBtn" href="#">Salesperson</a>
						<a href="#">contacts</a>
						<a href="#">Customer</a>
				</div>
			</div>';
		}
		?>
			
		<a class="searchbox" href="#"><i class="fa fa-fw fa-search"></i> Search</a>
		<?php
		if (isset($_SESSION['type']) && ($_SESSION['type'] == 'salesperson' || $_SESSION['username'] == 'Admin')) {
			echo '<a href="/CRM-Project/contacts-overview/contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>';
		}

		?>
		<a href="logout.php"><i class="fa fa-fw fa-user"></i> Logout</a>
		<?php
		if(isset($_SESSION['type']) && $_SESSION['type'] == 'salesperson'){
			echo'<a href="#" style="float: right;"><i class="fa fa-user-circle-o"></i> Salesperson</a>';
		}
		?>
		<?php
		if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){
			echo'<a href="#" style="float: right;"><i class="fa fa-user-circle-o"></i> Customer</a>';
		}
		?>
		<?php
		if(isset($_SESSION['username']) && $_SESSION['username'] == 'Admin'){
			echo'<a href="#" style="float: right;"><i class="fa fa-user-circle-o"></i> Admin</a>';
		}
		?>
	</div>

    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
    </div>
	
	<!-- The Modal -->
	<div id="myModal" class="modal">

	<!-- Modal content -->
	<?php
		$type = 'salesperson';
		$sql = "SELECT * FROM `users` WHERE type = '$type'";
	
		$result = mysqli_query($con, $sql);
		$total = mysqli_num_rows($result);
		?>
	<div class="modal-content">
		<span class="close">&times;</span>
		
		<h2 class="salehead">List of Salespersons</h2>
		
		<input type="text" id="myInput" onkeyup="myFunctionList()" placeholder="Search .." title="Type in a username or email">
		<p>Total number of salesperson = <?php echo $total; ?></p>
	<div class="table-container" style="max-height: 300px; overflow-y: scroll;">
	<table id="myTable">
	  <tr class="header">
		<th style="width:20%;">Serial No.</th>
		<th style="width:50%;">Username</th>
		<th style="width:30%;">E-mail</th>
	  </tr>
	  
		<?php
		$number = 1;
		while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
			<td><?php echo $number; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['email']; ?></td>
			</tr>
			<?php
			$number++;	
		}
			?>

	</table>
	</div>	
	</div>

	</div>
	
	<script src="script.js"></script>

</body>
</html>

