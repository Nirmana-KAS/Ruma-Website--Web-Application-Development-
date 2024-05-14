<?php


header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Origin: *");
// Connect to the database (similar to your previous code)
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ruuma';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Could not connect to the database: ' . $conn->connect_error);
}

// Retrieve data from the "places" table
$sql = "SELECT * FROM places";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Create an array to store the data
    $data = array();

    // Fetch each row and add it to the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>
