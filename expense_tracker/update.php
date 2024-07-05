<?php
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","Sbhs230104");
	$db = mysqli_select_db($connection,"exp_tracker");
	$id = mysqli_real_escape_string($connection, $_GET['id']);
	$date="";
	$desc="";
	$amt="";
	$query = "SELECT * FROM expenses WHERE id = $id"; 
	$query_run = mysqli_query($connection,$query);
	if ($query_run) {
		if ($row = mysqli_fetch_assoc($query_run)) {
			$date = $row['date'];
			$desc = $row['description'];
			$amt = $row['amount'];
		} else {
			echo "No record found with the provided ID";
		}
	} else {
		echo "Error executing the query: " . mysqli_error($connection);
	}

  if(isset($_POST['update'])){
		$connection = mysqli_connect("localhost","root","Sbhs230104");
		$db = mysqli_select_db($connection,"exp_tracker");
		$query = "update expenses set description = '$_POST[description]', amount = '$_POST[amt]' where id = $_GET[id]";
		$query_run = mysqli_query($connection,$query);
		header("location:index.php");
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>update</title>
		<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	
<style>
  body{
    background-color: #d4d4d4;
  }
  
  .update-form{
    height: 350px;
    max-width: 550px;
    margin-bottom: 40px;
    margin-left: 24rem;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group{
    margin-top: 20px;
    margin-bottom: 20px;
  }
</style>

<body>
  <center><h1>Edit expense</h1><br></center>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form class="update-form" method="post">
        <div class="form-group">
          <label for="mobile">Date</label>
          <input type="text" name="date" value="<?php echo $date;?>" class="form-control" disabled required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" name="description" value="<?php echo $desc;?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" name="amt" value="<?php echo $amt;?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</body>
</html>
