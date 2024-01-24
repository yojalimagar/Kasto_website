<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Interface - Courses</title>
    <style>
        /* Basic CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .course {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .course h2 {
            margin-top: 0;
        }
        .course p {
            margin-bottom: 10px;
        }
        .download-btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 10px;
        }
        .download-btn:hover {
            background-color: #0056b3;
        }
        .view-btn {
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .view-btn:hover {
            background-color: #218838;
        }
        .pdf-viewer {
            border: 1px solid #ccc;
            margin-top: 10px;
            border-radius: 5px;
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Courses</h1>
        <div class="courses">
            <?php
            include("connection.php"); // Include the database connection file

            // Retrieve courses from the database
            $conn = createConnection();
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="course">';
                    echo '<h2>' . $row['title'] . '</h2>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<a href="' . $row['file_path'] . '" class="download-btn" download>Download</a>';
                    echo '<a href="#" onclick="showPDF(\'' . $row['file_path'] . '\')" class="view-btn">View</a>';
                    echo '<div class="pdf-viewer" id="pdfViewer_' . $row['id'] . '" style="display: none;"></div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No courses available.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    
    <script>
        function showPDF(filePath) {
            var pdfViewer = document.createElement('iframe');
            pdfViewer.src = 'https://docs.google.com/viewer?url=' + filePath + '&embedded=true';
            pdfViewer.classList.add('pdf-viewer');
            
            var courseId = filePath.split('/').pop().split('.')[0];
            var pdfViewerDiv = document.getElementById('pdfViewer_' + courseId);
            pdfViewerDiv.innerHTML = '';
            pdfViewerDiv.appendChild(pdfViewer);
            pdfViewerDiv.style.display = 'block';
        }
    </script>
</body>
</html>
