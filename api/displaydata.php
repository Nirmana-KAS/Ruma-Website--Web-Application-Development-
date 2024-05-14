<?php

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: *");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $sqlSlider = "UPDATE home
    SET " . implode(", ", $updateColumns) . "
    WHERE ID = $idToUpdate";


    if ($connection->query($sqlSlider) !== TRUE) {

        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error updating slider settings: ' . $connection->error));
        $connection->close();
        exit;
    }


    $sqlOther = "UPDATE home
    SET " . implode(", ", $updateColumns) . "
    WHERE ID = $idToUpdate";


    if ($connection->query($sqlOther) === TRUE) {
  
        header('Content-Type: application/json');
        echo json_encode(array('success' => 'Data updated successfully!'));
    } else {

        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error updating other settings: ' . $connection->error));
    }


    $connection->close();
} else {
 

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ip';

    $connection = new mysqli($host, $username, $password, $database);

    
    if ($connection->connect_error) {

        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Connection failed: ' . $connection->connect_error));
        exit;
    }

    $idToUpdate = 1;


    $sql = "SELECT * FROM home WHERE ID = $idToUpdate";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
   
        header('Content-Type: application/json');
        echo json_encode($row);
    } else {
        
        header('HTTP/1.1 404 Not Found');
        echo json_encode(array('error' => 'Data not found'));
    }

    $connection->close();
}
?>
