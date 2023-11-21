<?php
// Connect to the MySQL database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Get the submitted form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Escape special characters in the data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Construct the SQL INSERT statement
$sql = "INSERT INTO users1 (u_name, u_email, u_password) VALUES ('$name', '$email', '$password')";

// Execute the SQL INSERT statement
if (mysqli_query($conn, $sql)) {
  echo "Message inserted successfully";
  header('Location: dashboard.php');
} else {
  echo "Error inserting message: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>