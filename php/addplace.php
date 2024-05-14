<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input data
    $title = $_POST['title'] ?? '';
    $address = $_POST['address'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    $price = $_POST['price'] ?? '';
    $contactInformation = $_POST['contactInformation'] ?? '';
    $genderValue = $_POST['call'] ?? ''; 
    $roomTypeValue = $_POST['roomType'] ?? ''; 


    $roomType = ($roomTypeValue === '1') ? 'Male' : 'Female';

    // File upload handling
    $targetDirectory = "uploads/"; // Directory where you want to save the uploaded images
    $filename = basename($_FILES['image']['name']);
    $targetFilePath = $targetDirectory . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Database connection settings
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'ruuma';

    // Create a new mysqli object with proper error handling
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Could not connect to the database: ' . $conn->connect_error);
    }

    // Prepare the insert query using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO places (title, address, latitude, longitude, price, contact_information, gender, room_type, image_filepath) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the prepared statement is successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssddssiss", $title, $address, $latitude, $longitude, $price, $contactInformation, $genderValue, $roomType, $targetFilePath);

        // Check if a file was uploaded
        if (!empty($_FILES['image']['tmp_name'])) {
            // Check if the file is an image
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (!in_array($fileType, $allowedTypes)) {
                echo "Error: Only JPG, JPEG, PNG, and GIF images are allowed.";
                exit;
            }

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                echo "Error moving the uploaded file.";
                exit;
            }
        } else {
            // If no file was uploaded, you can set a default image or handle the situation as you desire.
            // For example, you can set a default image like this:
            // $targetFilePath = "uploads/default.jpg";
        }

        // Execute the insert query
        if ($stmt->execute()) {
            echo "Place added successfully.";
        } else {
            echo "Error executing the insert query: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing the insert query: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
