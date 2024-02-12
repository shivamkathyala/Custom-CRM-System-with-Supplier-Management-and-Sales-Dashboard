<?php
include('../connection.php');

// Getting data from AJAX
$deal = $_POST['deal'];
$sales = $_POST['sales'];
$salespersonid = $_POST['salespersonid'];

// Use prepared statements to safely insert data into the database
$stmt = $connection->prepare("INSERT INTO `deals` (`dealname`, `value`, `contact_id`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $deal, $sales, $salespersonid);

if ($stmt->execute()) {
    echo "Deal saved successfully";
} else {
    
}

$stmt->close();
$connection->close();
?>
