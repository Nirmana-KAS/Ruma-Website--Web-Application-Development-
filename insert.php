<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['gender']) && isset($_POST['email']) &&
        isset($_POST['phoneCode']) && isset($_POST['phone'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneCode = $_POST['phoneCode'];
        $phone = $_POST['phone'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";

        // Create a new mysqli object with proper error handling
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database: ' . $conn->connect_error);
        } else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register (username, password, gender, email, phoneCode, phone) VALUES (?, ?, ?, ?, ?, ?)";

            // Use prepared statements for SELECT and INSERT queries
            $stmt = $conn->prepare($Select);

            if ($stmt === false) {
                die('Error in SELECT query: ' . $conn->error);
            }

            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            $stmt->close();

            if ($rnum == 0) {
                $stmt = $conn->prepare($Insert);

                if ($stmt === false) {
                    die('Error in INSERT query: ' . $conn->error);
                }

                // Use appropriate data types in the bind_param function based on your database schema
                $stmt->bind_param("ssssis", $username, $password, $gender, $email, $phoneCode, $phone);

                if ($stmt->execute()) {
                    echo "New record inserted successfully.";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Someone already registered using this email.";
            }
            $conn->close();
        }
    } else {
        echo "All fields are required.";
        die();
    }
} else {
    echo "Submit button is not set";
}
?>
