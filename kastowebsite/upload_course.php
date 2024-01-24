<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        /* Basic CSS styles - just for illustration purposes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"], textarea, input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard - Course Upload</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="course_title">Course Title:</label>
            <input type="text" id="course_title" name="course_title" required>

            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" required></textarea>

            <label for="course_file">Upload Course File:</label>
            <input type="file" id="course_file" name="course_file" accept=".pdf" required>

            <input type="submit" name="submit" value="Upload Course">
        </form>

        <?php

  include("connection.php"); // Include the database connection file

if(isset($_POST['submit'])) {
    $title = $_POST['course_title'];
    $description = $_POST['course_description'];

    // Create the directory if it doesn't exist
    $targetDirectory = "uploads/";
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true); // Create directory with full permissions (for testing purposes)
    }

    // Handling file upload
    $targetFile = $targetDirectory . basename($_FILES["course_file"]["name"]);

    if(move_uploaded_file($_FILES["course_file"]["tmp_name"], $targetFile)) {
        echo "<p>Course uploaded successfully!</p>";
        // Here, you can add the code to store course details in your database
        // $title, $description, and $targetFile contain the course information
        $conn = createConnection();

        // Prepare and execute SQL statement to insert course details
        $stmt = $conn->prepare("INSERT INTO courses (title, description, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetFile);
        if ($stmt->execute()) {
            echo "<p>Course details saved to the database successfully!</p>";
    }else {
        echo "<p>Error: " . $conn->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
     else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
    }
}
?>

</body>
</html>
