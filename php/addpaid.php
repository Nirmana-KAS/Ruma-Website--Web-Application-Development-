<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = $_POST['description'];
    $category = $_POST['category'];
    $district = $_POST['district'];
    $mobile = $_POST['mobile'];

    if ($_FILES['image']['error'] === 0) {
        $targetDir = '../uploads/'; 
        $imageName = $_FILES['image']['name'];
        $targetFilePath = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $sql = "INSERT INTO paidads (image, description, category, district,mobile) VALUES ('$imageName', '$description', '$category', '$district','$mobile')";

            if ($conn->query($sql) === TRUE) {
                echo "Data uploaded successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Please select an image.";
    }
}
?>
