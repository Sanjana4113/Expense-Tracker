<?php

include("db_config.php"); 

function addExpense($conn, $date, $description, $amount) {
  $date = mysqli_real_escape_string($conn, $date);
  $description = mysqli_real_escape_string($conn, $description);
  $amount = mysqli_real_escape_string($conn, $amount);
  $sql = "INSERT INTO expenses (date, description, amount) VALUES ('$date', '$description', '$amount')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "Expense added successfully.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
  $date = $_POST["date"];
  $description = $_POST["description"];
  $amount = $_POST["amount"];

  addExpense($conn, $date, $description, $amount);
}

?>
