<?php
session_start();
// Include the connection file
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate login credentials
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userRole = $_POST['userRole'];

    // Query to fetch user details from the database
    $sql = "SELECT id, name, email, password FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid user found
        $row = $result->fetch_assoc();
        $_SESSION['userRole'] = $userRole;

        // Redirect based on the user role
        if ($userRole === 'user') {
            header("Location: userdashboard.php"); // Redirect to user dashboard
            exit();
        } elseif ($userRole === 'admin') {
            header("Location: admindashboard.php"); // Redirect to admin dashboard
            exit();
        }
    } else {
        // Invalid credentials
        echo "Invalid login credentials";
    }
    $conn->close();
}
?>
