<?php

include('connection.php');


function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}


function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}


session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM login WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        if (verifyPassword($password, $hashedPassword)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['username'] = $user['username'];

        
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
           
            echo "Invalid username or password.";
        }
    } else {
       
        echo "Invalid username or password.";
    }
}
?>
