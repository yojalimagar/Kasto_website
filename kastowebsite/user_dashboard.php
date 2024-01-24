<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard - Online Learning Platform</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f8f8;
  color: #333;
}

header {
  background-color: #2E86C1;
  color: white;
  padding: 20px 0;
  text-align: center;
  border-bottom: 5px solid #154360;
}

nav ul {
  list-style: none;
  padding: 0;
  text-align: center;
  margin-top: 10px;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  text-decoration: none;
  color: white;
  font-weight: bold;
  padding: 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

nav ul li a:hover {
  background-color: #154360;
}

main {
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.course-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 20px;
}

.course {
  border: 1px solid #ccc;
  background-color: #fff;
  padding: 20px;
  margin: 10px;
  width: 300px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease, transform 0.3s ease;
  text-align: left;
}

.course:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transform: scale(1.05);
}

footer {
  background-color: #2E86C1;
  color: white;
  text-align: center;
  padding: 10px 0;
  width: 100%;
  position: fixed;
  bottom: 0;
  border-top: 5px solid #154360;
}

  </style>
</head>
<body>

<!-- Header and navigation (unchanged from previous code) -->
<!-- ... -->
<header>
  <h1>Welcome to the Online Learning Platform!</h1>
  <!-- Add any navigation or user-specific information here -->
  <nav>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="courses.php">My Courses</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>
</header>

<main>
  <h2>User Dashboard</h2>
  
  <div class="user-info">
    <h3>Welcome, [Username]</h3>
    <!-- Display user-specific information or options -->
    <!-- Example: -->
    <p>Email: user@example.com</p>
    <p>Enrolled Courses: 3</p>
    <!-- Add more user-related details -->
  </div>

  <div class="dashboard-links">
    <h3>Quick Links</h3>
    <ul>
      <li><a href="enrolled_courses.php">Enrolled Courses</a></li>
      <li><a href="profile_settings.php">Profile Settings</a></li>
      <li><a href="progress.php">Progress</a></li>
      <!-- Add more dashboard links as needed -->
    </ul>
  </div>
</main>

<!-- Footer (unchanged from previous code) -->
<!-- ... -->
<footer>
  <p>&copy; <?php echo date("Y"); ?> Online Learning Platform</p>
</footer>

</body>
</html>
