<?php
include('connection.php');


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Check if the request has an ad_id parameter
    if (isset($_GET['ad_id'])) {
        // Sanitize the input
        $ad_id = intval($_GET['ad_id']);

        // Perform the database query to delete the record
        // Replace 'your_table_name' with the actual table name where you store your ads
        $sql = "DELETE FROM your_table_name WHERE id = $ad_id";

        if (mysqli_query($your_db_connection, $sql)) {
            $response = ['message' => 'Ad deleted successfully.'];
        } else {
            $response = ['error' => 'Failed to delete ad.'];
        }

        // Send the JSON response back to the client
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
