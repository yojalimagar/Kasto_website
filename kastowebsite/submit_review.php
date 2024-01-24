<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include 'connection.php'; // Replace with your actual connection file
    $conn = createConnection();
    // Collect form data
    $user_name = $_POST['user_name'];
    $review_content = $_POST['review_content'];

    // SQL query to insert data into the 'reviews' table
    $query = "INSERT INTO reviews (user_name, review_content) VALUES (?, ?)";

    // Prepare the query
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param("ss", $user_name, $review_content);

    // Execute the query
    if ($stmt->execute()) {
        echo "Review submitted successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $connection->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
