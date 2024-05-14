<?php

$connection = mysqli_connect('localhost', 'root', '', 'ruuma');


if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}


$title = $_POST['title'];
$address = $_POST['address'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];



$title = mysqli_real_escape_string($connection, $title);
$address = mysqli_real_escape_string($connection, $address);
$latitude = mysqli_real_escape_string($connection, $latitude);
$longitude = mysqli_real_escape_string($connection, $longitude);


// Create and execute the SQL query to insert the data into the 'places' table
$query = "INSERT INTO places (title, address, latitude, longitude) VALUES ('$title', '$address', '$latitude', '$longitude')";
// Continue building the query with other form field data...

if (mysqli_query($connection, $query)) {
    echo "Data inserted successfully!";
} else {
    echo "Error inserting data: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
