<?php
// Connect to the MySQL database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Get the task ID from the query string
$id = $_GET['id'];

// Delete the task from the tasks table
$sql = "DELETE FROM tasks WHERE id = '$id'";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);

// Redirect the user back to the dashboard
header('Location: dashboard.php');
exit;
?>
