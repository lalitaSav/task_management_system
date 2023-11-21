<?php
// Connect to the MySQL database
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'test';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Get the task ID from the query string
$id = $_GET['id'];

// Query the tasks table to get the task data
$sql = "SELECT * FROM tasks WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Handle the form submission to update the task data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $heading = $_POST['heading'];
  $description = $_POST['description'];
  $sql = "UPDATE tasks SET heading = '$heading', description = '$description' WHERE id = '$id'";
  mysqli_query($conn, $sql);
  header('Location: dashboard.php');
  exit;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Task</title>
</head>
<body>
  <h1>Edit Task</h1>
  <form method="post" action="">
    <label for="heading">Heading:</label>
    <input type="text" id="heading" name="heading" value="<?php echo $row['heading']; ?>"><br><br>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>
    
    <input type="submit" value="Save">
  </form>
</body>
</html>
