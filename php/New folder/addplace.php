<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input data
    $title = $_POST['title'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $price = $_POST['price'];
    $contactInformation = $_POST['contactInformation'];
    $gender = $_POST['gender'];
    $roomType = $_POST['roomType'];
	$roomType = ($roomTypeValue == 1) ? "Double" : "Single";
	$gender = ($gender == 1) ? "Malw" : "Female";
    // File upload handling
    $targetDirectory = "uploads/"; // Directory where you want to save the uploaded images
    $filename = basename($_FILES['image']['name']);
    $targetFilePath = $targetDirectory . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Database connection settings
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'your_database';

    // Create a new mysqli object with proper error handling
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Could not connect to the database: ' . $conn->connect_error);
    }

    // Prepare the insert query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO places (title, address, latitude, longitude, price, contact_information, gender, room_type, image_filepath) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddssiss", $title, $address, $latitude, $longitude, $price, $contactInformation, $gender, $roomType, $targetFilePath);

    // Execute the insert query
    if ($stmt->execute()) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo "Place added successfully.";
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
