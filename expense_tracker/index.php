<?php

  include("connection.php");

  $sql_total = "SELECT SUM(amount) AS total_expense FROM expenses";
  $result_total = mysqli_query($conn, $sql_total);
  $row_total = mysqli_fetch_assoc($result_total);
  $total_expense = $row_total['total_expense'];

  $sql_count = "SELECT COUNT(amount) AS exp_count FROM expenses";
  $result_count = mysqli_query($conn, $sql_count);
  $row_count = mysqli_fetch_assoc($result_count);
  $exp_count =  $row_count['exp_count'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<style>
  
  .exp_body{
    display: flex;
    flex-direction: row;
  }

  nav {
    height: 4.2rem;
    background-color: #f2f1ef;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 2rem;
  }

  .logout {
    margin-top: 20px;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    transition: background-color 0.3s ease;
  }

  .logout:hover {
    background-color: #0056b3;
  }

  .summary {
    width: 200px;
    display: flex;
    flex-direction: column;
    background: linear-gradient(to bottom, #f2f1ef, #d8cfd0, #b1a6a4, #413f3d);
    overflow: hidden;
    border-right: 1px solid black;
  }

  .summary-item {
    text-align: center;
    justify-content: center;
    padding: 10px;
    transition: background-color 0.3s ease;
  }

  h3 {
    margin-top: 40px;
  }

  .summary-item p {
    margin: 5px 0;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  th:last-child, 
  td:last-child {
    text-align: center;
  }

  .edit {
    margin-right: 10px;
    background-color: #4CAF50;
  }

  .delete {
    background-color: #f44336;
  }

  .btn:hover {
    background-color: rgba(255, 255, 255, 0.5);
    color: black;
  }

  h1 {
    text-align: center;
    text-decoration: underline;
  }

  form {
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 10px;
  }

  label {
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"],
  button {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    
  }

  button{
    background-color: #4CAF50;
  }

  .i-container {
    max-width: 1200px;
    padding: 20px;
    display: flex;
    background: linear-gradient(to bottom, #f2f1ef, #d8cfd0, #b1a6a4, #413f3d);
    overflow: hidden;
    flex-direction: row;
  }

  .form-container {
    margin-right: 20px;
    width: 600px;
  }

  .expensesList {
    width: 600px;
  }

  .t-div{
    margin-top: 10px;
    font-size: 20px;
    font-weight: 500;
  }

  .btn {
    padding: 10px 20px;
    text-align: center;
    border: none;
    border-radius: 5px;
    display: inline-block;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    color: #fff;
  }
  
</style>

<body>
  <nav>
    <a href="logout.php" class="logout">Logout</a>
  </nav>
  <div class="exp_body">
    <div class="summary">
      <div class="summary-item">
        <h1>Dashboard</h1>
      </div>
      <div class="summary-item">
        <h3>Total Expenses</h3>
        <div class="t-div">₹<?php echo number_format($total_expense, 2); ?></div>
      </div>
      <div class="summary-item">
        <h3>Number of Expenses</h3>
        <p class="t-div"><?php echo $exp_count; ?></p>
      </div>
    </div>

    <div class="i-container">
      <div class="form-container">
        <h1>Expense Tracker</h1>
        <form id="expenseForm" action="connection.php" method="post">
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" placeholder="Description" name="description" required>
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" placeholder="Amount" name="amount" required>
          </div>
          <button type="submit" class="add" onclick="index.php">Add</button>
        </form>
      </div>

      <div class="expensesList">
        <h1>Expenses</h1>
        <table>
          <thead>
            <tr>
              <th>Date</th>
              <th>Description</th>
              <th>Amount</th>
              <th style="text-align: center;">Actions</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $sql = "SELECT * FROM expenses";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>₹" . $row['amount'] . "</td>";
                echo "<td style='text-align: center;'>";
                echo "<input type='hidden' class='expense-id' value='" . $row['id'] . "'>";
                echo "<div class='btn-container'>";
                echo "<a href='update.php?id=" . $row['id'] . "' class='btn edit'>Edit</a>\t\t\t\t";
                echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this expense?\")' class='btn delete'>Delete</a>";
                echo "</div>";    
                echo "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>No expenses found.</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="Script.js"></script>
</body>
</html>
