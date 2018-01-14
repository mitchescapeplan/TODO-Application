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
		<form method="post" action="tasks.php">
			<h2>Total Tasks: <?php echo $total[0]?>
			<span style="float:right; padding-right:5px;"><input type="hidden" name="status" value="All"/><input type="submit" value="View All Tasks"/></span></h2> 
		</form>
		<form method="post" action="tasks.php">
			<h2>Pending: <?php echo $pending[0]?>
			<span style="float:right; padding-right:5px;"><input type="hidden" name="status" value="Pending"/>
			<input type="submit" value="View Pending Tasks"/></span></h2>
		</form>	
		<form method="post" action="tasks.php">
			<h2>Started: <?php echo $started[0]?>
			<span style="float:right; padding-right:5px;"><input type="hidden" name="status" value="Started"/>
			<input type="submit" value="View Started Tasks"/></span></h2>
		</form>
		<form method="post" action="tasks.php">
			<h2>Completed: <?php echo $completed[0]?>
			<span style="float:right; padding-right:5px;"><input type="hidden" name="status" value="Completed"/>
			<input type="submit" value="View Completed Tasks"/></span></h2>
		</form>
		<form method="post" action="tasks.php">
			<h2>Late: <?php echo $late[0]?>
			<span style="float:right; padding-right:5px;"><input type="hidden" name="status" value="Late"/>
			<input type="submit" value="View Late Tasks"/></span></h2>
		</form>
		<span style="text-align: center">
			<form method="post" action="addtask.php">
				<input type="submit" value="Add New Task"/>
			</form>
		</span>
	</div>
</body>
</html>