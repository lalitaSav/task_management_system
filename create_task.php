<?php
// Connect to the MySQL database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Get the task data from the form submission
$heading = $_POST['heading'];
$description = $_POST['description'];

// Insert the task data into the tasks table
$sql = "INSERT INTO tasks (heading, description) VALUES ('$heading', '$description')";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Redirect the user back to the dashboard
header('Location: dashboard.php');
exit;
?>
