<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="../style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
		$role     = $_REQUEST['role'];
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
		
		$select = "SELECT * FROM users WHERE `email` = '$email'";
		$check = mysqli_query($con,$select);
		$row = mysqli_fetch_array($check);

        if(isset($row)){
            ?>
				<script>
				alert("User already registered. Please login with your registered email id");
				</script>
					
				<script type="text/javascript">   
						function Redirect(){  
						window.location="registration.php"; 
						} 
						document.write(""); 
						setTimeout('Redirect()', 500);   
						</script>
			<?php
            
        }else{
        $query    = "INSERT into `users` (username, password, email, role, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$role', '$create_datetime')";
        $result   = mysqli_query($con, $query);
		
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
		
		}
	}
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
		<div class="acc-type login-input"> 
		<select class="options" name="role" required>
                <option value="">Choose user type</option>
                <option value="salesperson">Salesperson/Vendor</option>
                <option value="customer">Customer</option>
        </select>
		</div>
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>

</body>
</html>