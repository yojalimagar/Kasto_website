<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $fullName = htmlspecialchars($_POST["full_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
    
$confirm_password = password_verify($_POST["confirm_password"],$password);
if ($password == $confirm_password) {
    
  // do something with the password, such as hashing, storing, etc.
   // Database connection
   $conn = createConnection();

   // Prepare and execute SQL query to insert user data into the database
   $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
   $stmt->bind_param("sss", $fullName, $email, $password);

   // Check if the query executed successfully
   if ($stmt->execute()) {
       echo "Registration successful!";
       // Redirect to a success page or login page after successful registration
       header("Location: login.html");
       exit();
   } else {
       echo"Registration unsuccessfull";
       echo "Error: " . $stmt->error;
   }

   $stmt->close();
   $conn->close();
} else {
  // display an error message, such as "Passwords do not match"
  echo " password doesnot match";
}
    
   
}
?>