<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text" href =" hadmin.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="display_reviews.php">Reports</a></li>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';
                    $conn = createConnection();

                    $sql = "SELECT * FROM users"; // Adjust table name if needed
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["name"] . '</td>';
                            echo '<td>' . $row["email"] . '</td>';
                            echo '<td>' . $row["password"] . '</td>';
                            echo '<td>';
                            echo '<a href="edit_user.php?id=' . $row["id"] . '" class ="edit-link">Edit</a> | ';
                            echo '<a href="delete_user.php?id=' . $row["id"] . '"class="delete-link">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4">No data found in the database.</td></tr>';
                    }

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
