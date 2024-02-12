<?php
/* Database connection start */
$servername = "localhost";
$username = "u813765851_phpCRM";
$password = "xTV@W8lE>6";
$dbname = "u813765851_phpCRM";
$connection = mysqli_connect($servername, $username, $password, $dbname);
 if($connection){ echo "Connected "; }else{ echo "not connected "; }
?>