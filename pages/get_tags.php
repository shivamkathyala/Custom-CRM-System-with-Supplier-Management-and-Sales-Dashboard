<?php
include('../connection.php');

$sql = "SELECT * FROM contacts_overview";
$result = mysqli_query($connection, $sql);

$tags = array(); // Initialize an empty array to store the tags

while ($row = mysqli_fetch_assoc($result)) {
    $tags[] = $row['tag']; // Add each tag value to the array
}

print_r($tags); // Now $tags contains all the 'tag' values
?>
