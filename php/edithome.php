<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Handle the slider settings form data
    $homeTitle = $_POST['home_title'] ?? '';
    $DoYouWantButton = $_POST['flexRadioDefault'] ?? '';
    $ButtonText = $_POST['btn_text'] ?? '';
    $ButtonLink = $_POST['btn_link'] ?? '';

    $AboutTitle = $_POST['about_title'] ?? '';
    $AboutDescription = $_POST['about_dis'] ?? '';
    $BackgroundColor = $_POST['background_color'] ?? '';
    $TextColor = $_POST['text_color'] ?? '';

    $targetDirectory = "uploads/";

    // Check if the "image" field was successfully uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['image']['name']);
        $targetFilePath = $targetDirectory . $filename;

        // Move the uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            $sliderImage = $targetFilePath;
        } else {
            // Handle the case when there's an error moving the uploaded file
            echo "Error: Failed to move the uploaded file.";
            exit;
        }
    } else {
        // Handle the case when "image" is not uploaded or encountered an error
        // Display an error message or handle the situation accordingly
        $sliderImage = ''; // Set a default image path or display an error message
    }

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ip';

    $connection = new mysqli($host, $username, $password, $database);

    // Check if the connection was successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $idToUpdate = 1;

    // Prepare an empty array to store the column updates
    $updateColumns = array();

    // Check and build the update for slider settings
    if (!empty($homeTitle)) {
        $updateColumns[] = "Home_Title = '$homeTitle'";
    }
    if (!empty($sliderImage)) {
        $updateColumns[] = "Slider_image = '$sliderImage'";
    }
    if (!empty($DoYouWantButton)) {
        $updateColumns[] = "Button_Add = '$DoYouWantButton'";
    }
    if (!empty($ButtonLink)) {
        $updateColumns[] = "Button_Link = '$ButtonLink'";
    }

    // ... (other slider settings)

    // Check and build the update for other settings
    if (!empty($AboutTitle)) {
        $updateColumns[] = "About_Title = '$AboutTitle'";
    }
    if (!empty($AboutDescription)) {
        $updateColumns[] = "About_Discrption = '$AboutDescription'";
    }
    if (!empty($BackgroundColor)) {
        $updateColumns[] = "Background_Color = '$BackgroundColor'";
    }
    if (!empty($TextColor)) {
        $updateColumns[] = "Text_Color = '$TextColor'";
    }

    // Generate the final SQL query for slider settings
    $sqlSlider = "UPDATE home
    SET " . implode(", ", $updateColumns) . "
    WHERE ID = $idToUpdate";

    // Execute the SQL query for slider settings
    if ($connection->query($sqlSlider) !== TRUE) {
        echo "Error updating slider settings: " . $connection->error;
        $connection->close();
        exit;
    }

    // Update the other settings in the database
    $sqlOther = "UPDATE home
    SET " . implode(", ", $updateColumns) . "
    WHERE ID = $idToUpdate";

    // Execute the SQL query for other settings
    if ($connection->query($sqlOther) === TRUE) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating other settings: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>
