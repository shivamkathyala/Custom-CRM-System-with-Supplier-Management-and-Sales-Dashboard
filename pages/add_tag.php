<?php
include('../connection.php');

$tagName = mysqli_real_escape_string($connection, $_POST['tag']); // Sanitize user input
$id = mysqli_real_escape_string($connection, $_POST['id']); // Sanitize user input

$check = "SELECT * FROM tag WHERE contact_id = $id";
$checkresult = mysqli_query($connection, $check);

if (!$checkresult) {
    die("Error: " . mysqli_error($connection));
}

if (mysqli_num_rows($checkresult) > 0) {
    $update = "UPDATE tag SET `tag_name` = '$tagName' WHERE `contact_id` = $id"; // Updated to use `contact_id`
    $updateresult = mysqli_query($connection, $update);

    if (!$updateresult) {
        die("Error: " . mysqli_error($connection));
    }
} else {
    $sql = "INSERT INTO tag (tag_name, contact_id) VALUES ('$tagName', '$id')";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($connection));
    }
}
?>
