<?php
	$dbconnection = new mysqli("localhost", "root", "", "todo") or die("Cannot connect");
	@$total = $dbconnection->query("SELECT COUNT(*) FROM 'tasks'");
?>

<!DOCTYPE html>
<html>
<head>
<title>TODO List</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="container-header">
		<h1>Todo List</h1>
	</div>
	<div id="container-body">
		<a href="tasks.php"><h2>Total Tasks:</h2></a>  <p></p>
		<a href="pending.php"><h3>Pending:</h3></a> <?php echo " The number is $total" ?>  <p>Number</p>
		<a href="started.php"><h3>Started:</h3></a>	<p>Number</p>
		<a href="completed.php"><h3>Completed:</h3></a>	<p>Number</p>
		<a href="late.php"><h3>Late:</h3></a> <p>Number</p>
	</div>
</body>
</html>