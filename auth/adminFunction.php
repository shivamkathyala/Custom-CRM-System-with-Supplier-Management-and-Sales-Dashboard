<?php

//include auth_session.php file on all user panel pages
require_once("auth_session.php");

require_once('db.php');

function headers(){
	?>
	<!DOCTYPE html>
	<html>
	<head>
	    <meta charset="utf-8">
	    <title>Dashboard - Client area</title>
	    <link rel="stylesheet" href="../style.css" >
		<!-- Load an icon library -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	</head>
	<body>
		
			
	<?php
}


function menus(){ 
	?>
	<div class="wrapper" id="page">
		<div class="site-header-wrap">
			<header id="site-header">
				<div class="site-header-inner navbar"> 
					<nav class="main-nav">
						<ul>
							<li><a class="searchbox" href="#"><i class="fa fa-fw fa-search"></i> Search</a></li>
							<li><a href="profile.php"> Past Quota</a></li>
							<li><a href="profile.php"> Set Quota</a></li>
							<li><a href="profile.php"> Daily Activities</a></li>
							<li class="dropdown-trigger">
								<?php
									if(isset($_SESSION['role']) && $_SESSION['role'] == 'salesperson'){
										echo'<a href="#" class="userName"><i class="fa fa-user-circle-o"></i> '.$_SESSION['username'].'</a>';
									} 
									if(isset($_SESSION['role']) && $_SESSION['role'] == 'customer'){
										echo'<a href="#" class="userName"><i class="fa fa-user-circle-o"></i> '.$_SESSION['username'].'</a>';
									} 
									if(isset($_SESSION['username']) && $_SESSION['username'] == 'Admin'){
										echo'<a href="#" class="userName"><i class="fa fa-user-circle-o"></i> '.$_SESSION['username'].'</a>';
									}
								?>	
								<ul class="userSettings dropdown">
								   <li><a href="profile.php"> Profile</a></li>
								   <li><a href="account.php"> Account</a></li>
								   <li><a href="logout.php"> Logout</a></li>
								</ul>

							</li>  
						</ul>
					</nav>
				</div>
			</header>
		</div>

	<?php
}



function footers(){
	?>
		</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="/CRM-Project/script.js"></script>

	</body>
	</html>	

	<?php
}

function leftSidebar(){
	?>
	<div class="leftsidebar">
		<div class="site-logo"> 
						<a class="activeLogo" href="/CRM-Project/auth/dashboard.php">Sales <span>Quota</span> Setter</a>
					</div>
		<ul>
			<li><a href="/CRM-Project/auth/userList.php"><i class="fa fa-fw fa-user"></i>All Users</a></li>
			<li>
			<?php  
				echo '<a href="/CRM-Project/contacts-overview/contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>'; 
			 ?>
		 	</li>

		</ul>
	</div>
	<?php
}


function additionalCSS(){
?>
<link rel="stylesheet" href="/CRM-Project/auth/style.css">

<?php

}

function checkError(){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

?>
