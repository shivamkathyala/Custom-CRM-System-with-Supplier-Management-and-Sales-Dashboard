<?php
include('../connection.php');


    $id = $_POST["id"];
    
    $sql = "SELECT `date`, `time`, `id` FROM `pros_call` WHERE `id` = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        // Return the data as JSON
        header("Content-Type: application/json");
        echo json_encode($data);
    } else {
        echo json_encode(array("error" => "Query execution failed."));
    }

?>
