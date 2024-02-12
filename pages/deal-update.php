<?php
include('../connection.php');

$deal = $_POST['deal'];
$value = $_POST['sales'];
$id = $_POST['dealid'];

echo $id;
$sql = "UPDATE `deals` SET `dealname`=?, `value`=? WHERE `deal_id`=?";
$stmt = mysqli_prepare($connection, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $deal, $value, $id);
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
