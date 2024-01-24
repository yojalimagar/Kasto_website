<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="hadmin.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="display_reviews.php">Reviews</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
    </nav>
    <main>
        <section class="widget">
            <h2>Dashboard</h2>
            <p>Welcome to the admin dashboard.</p>
        </section>
        <section class="widget">
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection script
                    include 'connection.php';

                    // Create the connection
                    $conn = createConnection();

                    $sql = "SELECT * FROM users"; // Adjust table name if needed
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["name"] . '</td>';
                            echo '<td>' . $row["email"] . '</td>';
                            echo '<td>' . $row["password"] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">No data found in the database.</td></tr>';
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
        <section class="widget">
            <h2>Reports</h2>
            <!-- Your reports content here -->
        </section>
        <section class="widget">
            <h2>Settings</h2>
            <!-- Your settings content here -->
        </section>
    </main>
</body>
</html>
