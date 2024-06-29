<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exp_tracker";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Function to add expense to database
function addExpense($date, $description, $amount) {
  global $conn;

  // **Escape user input to prevent SQL injection vulnerabilities**
  $date = mysqli_real_escape_string($conn, $date);
  $description = mysqli_real_escape_string($conn, $description);
  $amount = mysqli_real_escape_string($conn, $amount);

  $sql = "INSERT INTO expenses (date, description, amount) VALUES ('$date', '$description', $amount)";

  if (mysqli_query($conn, $sql)) {
    echo "Expense added successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $date = $_POST["date"];
  $description = $_POST["description"];
  $amount = $_POST["amount"];

  addExpense($date, $description, $amount);
}

// Close connection
mysqli_close($conn);
?>
