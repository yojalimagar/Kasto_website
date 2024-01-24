<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Reviews</title>
    <style>
        /* Add your CSS styles here */
        /* For example: */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reviews</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Review Content</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include your database connection file
            include 'connection.php'; // Replace with your actual connection file
            $conn = createConnection();

            // Fetch data from 'reviews' table
            $query = "SELECT * FROM reviews";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["user_name"] . "</td>";
                    echo "<td>" . $row["review_content"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No reviews found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
