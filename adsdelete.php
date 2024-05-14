<?php

include('connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = 'SELECT * FROM paidads';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(array('message' => 'No paid ads found.'));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $deleteParams);
    $adId = $deleteParams['ad_id'];

  
    $sql = "DELETE FROM paidads WHERE id = $adId";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Ad deleted successfully.'));
    } else {
        echo json_encode(array('error' => 'Error deleting ad.'));
    }
}
?>
