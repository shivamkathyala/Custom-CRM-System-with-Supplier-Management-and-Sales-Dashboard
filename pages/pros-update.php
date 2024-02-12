<?php
include('../connection.php');

$date = $_POST['date'];
$time = $_POST['time'];
$id = $_POST['editid'];

$sql = "UPDATE `pros_call` SET `date`=?, `time`=? WHERE `id`=?";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $date, $time, $id);
    if (mysqli_stmt_execute($stmt)) {
        echo "Update successful";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error in the prepared statement: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
