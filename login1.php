<?php
// Include the database connection file here
include('connection.php');

// Function to securely hash the password (using password_hash)
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to verify the hashed password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to fetch the user with the given username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        // Verify the password
        if (verifyPassword($password, $hashedPassword)) {
            // Password matches, user is authenticated.
            // Start a session and store user information in it.
            session_start();
            $_SESSION['user_id'] = $user['id']; // Assuming 'id' is the primary key in your users table.
            $_SESSION['username'] = $user['username'];
            // You can add more user information to the session if needed.

            // Redirect the user to the desired page after successful login.
            // For example, header("Location: dashboard.php");
            echo "Login successful!";
        } else {
            // Password doesn't match
            echo "Invalid username or password.";
        }
    } else {
        // User not found
        echo "Invalid username or password.";
    }
}
?>
