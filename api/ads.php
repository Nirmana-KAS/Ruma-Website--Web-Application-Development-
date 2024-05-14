<?php

include('connection.php');

// Handle DELETE request to delete an ad
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Check if the request has an ad_id parameter
    if (isset($_GET['ad_id'])) {
        // Sanitize the input
        $ad_id = intval($_GET['ad_id']);

        // Perform the database query to delete the record
        $sql = "DELETE FROM paidads WHERE id = $ad_id";

        if ($conn->query($sql)) {
            // Return a success message in the JSON response
            $response = ['message' => 'Ad deleted successfully.'];
        } else {
            // Return an error message in the JSON response
            $response = ['error' => 'Failed to delete ad.'];
        }

        // Send the JSON response back to the client
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}

// Handle GET request to fetch ads based on district and category
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $district = isset($_GET['district']) ? $_GET['district'] : null;
    $category = isset($_GET['category']) ? $_GET['category'] : null;

    $sql = 'SELECT * FROM paidads';

    if ($district !== null && $category !== null) {
        $sql .= " WHERE district = '$district' AND category = '$category'";
    } elseif ($district !== null) {
        $sql .= " WHERE district = '$district'";
    } elseif ($category !== null) {
        $sql .= " WHERE category = '$category'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'id' => $row['id'],
                'image' => $row['image'],
                'description' => $row['description'],
                'category' => $row['category'],
                'district' => $row['district'],
                'mobile' => $row['mobile']
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo json_encode(array('message' => 'No matching ads found.'));
    }
}
?>
