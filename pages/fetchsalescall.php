<?php
include('../connection.php');


    $id = $_POST["id"];
    
    $sql = "SELECT `date`, `time`, `id` FROM `sales_call` WHERE `id` = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        // Return the data as JSON
        header("Content-Type: application/json");
        //echo json_encode($data);
		$json = json_encode($data);
		print_r($json);
    } else {
        echo json_encode(array("error" => "Query execution failed."));
    }

?>
