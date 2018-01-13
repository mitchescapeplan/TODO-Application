<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$queryresult = $dbconnection->query('SELECT COUNT(*) FROM tasks');
	$total = $queryresult->fetch_array(MYSQLI_NUM);
	
	$pendingquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE Status = 'pending'");
	$pending = $pendingquery->fetch_array(MYSQLI_NUM);
	
	$startedquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE Status = 'started'");
	$started = $startedquery->fetch_array(MYSQLI_NUM);
	
	$completedquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE Status = 'completed'");
	$completed = $completedquery->fetch_array(MYSQLI_NUM);
	
	$latequery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE Status = 'late'");
	$late = $latequery->fetch_array(MYSQLI_NUM);
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
		<a href="tasks.php"><h2>Total Tasks:</h2></a> <p><?php echo $total[0]?></p>
		<a href="pending.php"><h3>Pending:</h3></a> <p><?php echo $pending[0]?></p>
		<a href="started.php"><h3>Started:</h3></a>	<p><?php echo $started[0]?></p>
		<a href="completed.php"><h3>Completed:</h3></a>	<p><?php echo $completed[0]?></p>
		<a href="late.php"><h3>Late:</h3></a> <p><?php echo $late[0]?></p>
	</div>
</body>
</html>