<?php
// MySQL database connectivity
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	// Check if username already exists
	$sql = "SELECT * FROM users1 WHERE u_name='$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 1) {
		// User already exists, show error message
		echo "Username already exists.";
	} else {
		// Insert user into database
		$sql = "INSERT INTO users (u_name, u_email, u_password) VALUES ('$username', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			// User successfully registered, redirect to login page
			header("Location: login.html");
			exit;
		} else {
			// Error inserting user into database, show error message
			echo "Error: " . mysqli_error($conn);
		}
	}
}

mysqli_close($conn);
?>
