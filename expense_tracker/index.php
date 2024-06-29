<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    
</head>
<body>
    <div class="container">
        <h1 >Expense Tracker</h1>
        <form id="expenseForm" action="connection.php" method="post">

            <input type="date" id="date" name="date" required >
            <input type="text" id="description" placeholder="Description" name="description" required>
            <input type="number" id="amount" placeholder="Amount" name="amount" required>
            <button type="submit" >Add</button>
        </form>
        <div id="expenseList">
            <h2>Expenses</h2>
            <ul id="list"></ul>
        </div>
    </div>

    <script src="Script.js"></script>
</body>
</html>

