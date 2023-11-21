<!DOCTYPE html>
<html>
<head>
  <title>Task Dashboard</title>
</head>
<body>
  <h1>Task Dashboard</h1>
  
  <h2>Add New Task</h2>
  <form method="post" action="create_task.php">
    <label for="heading">Heading:</label>
    <input type="text" id="heading" name="heading" required><br><br>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>
    
    <input type="submit" value="Create">
  </form>
  
  <h2>View Tasks</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Heading</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
    <?php
    // Connect to the MySQL database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'test';
    $conn = mysqli_connect($host, $user, $pass, $dbname);

    // Query the tasks table and display the results
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
      die("Query execution failed: " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['heading'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
      echo "<td>";
      echo "<a href='edit_task.php?id=" . $row['id'] . "'>Edit</a> ";
      echo "<a href='delete_task.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this task?\")'>Delete</a>";
      echo "</td>";
      echo "</tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </table>
  
</body>
</html>
