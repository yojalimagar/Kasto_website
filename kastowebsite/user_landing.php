<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Online Learning Platform</title>
  <style>
    /* General Styles */
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
    }
    nav ul li a:hover {
      text-decoration: underline;
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
      transition: box-shadow 0.3s ease;
      text-align: left;
    }
    .course:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    footer {
      background-color: #2E86C1;
      color: white;
      text-align: center;
      padding: 10px 0;
      width: 100%;
      position: fixed;
      bottom: 0;
    }
  </style>
</head>
<body>

<!-- Header for the logged-in user -->
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
  <h2>Recommended Courses</h2>
  <div class="course-list">
    <?php
    // Array of courses (simulating course data)
    $courses = [
      [
        'title' => 'Introduction to Programming',
        'description' => 'Learn the basics of programming.',
        'link' => 'course_details.php?id=1'
      ],
      [
        'title' => 'Web Development Fundamentals',
        'description' => 'Understand the essentials of web development.',
        'link' => 'course_details.php?id=2'
      ],
      // Add more courses as needed
    ];

    // Display courses dynamically
    foreach ($courses as $course) {
      echo '<div class="course">';
      echo '<h3>' . $course['title'] . '</h3>';
      echo '<p>' . $course['description'] . '</p>';
      echo '<a href="' . $course['link'] . '">View Course</a>';
      echo '</div>';
    }
    ?>
  </div>
</main>

<!-- Footer section -->
<footer>
  <p>&copy; <?php echo date("Y"); ?> Online Learning Platform</p>
</footer>

</body>
</html>
