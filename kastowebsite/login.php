<?php
// Include your database connection file
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection
    $conn = createConnection();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $userType = $user['usertype'];
            if ($userType === 'admin') {
                header("Location: admin_dashboard.html");
               
            } elseif ($userType === 'user') {
                header("Location: userdashboard.html");
                
            } else {
                header("Location: login.html?error=unknown_user_type");
                
            }
        } else {
            header("Location: login.html?error=invalid_password");
           
        }
    } else {
        header("Location: login.html?error=user_not_found");
        
    }

    $stmt->close();
    $conn->close();
}
?>
