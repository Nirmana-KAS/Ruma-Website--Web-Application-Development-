<?php
// Replace the database connection parameters with your actual database credentials
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'ruuma';

// Create a connection to the database
$connection = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

// Define the query to retrieve data from the 'gridlist' table
$query = 'SELECT * FROM places'; // Change 'gridlist' to your actual table name

// Execute the query and fetch the results
$result = mysqli_query($connection, $query);

// Convert the results to an associative array
$gridList = [];
while ($row = mysqli_fetch_assoc($result)) {
    $gridList[] = $row;
}

// Close the database connection
mysqli_close($connection);

// Convert the data to JSON and output it
header('Content-Type: application/json');
echo json_encode($gridList);
?>
