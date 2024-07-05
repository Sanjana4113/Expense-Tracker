<?php
	$connection = mysqli_connect("localhost","root","Sbhs230104");
	$db = mysqli_select_db($connection,"exp_tracker");
	$query = "delete from expenses where id = $_GET[id]";
	$query_run = mysqli_query($connection,$query);
?>

<script type="text/javascript">
	alert(" Deleted successfully...");
	window.location.href = "index.php";
</script>