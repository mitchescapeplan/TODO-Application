<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$username= $_POST["username"];
	$password= $_POST["password"];
	
	if($username != NULL && $password != NULL){
		$userquery = $dbconnection->query("SELECT COUNT(*) FROM users WHERE UserName='$username' AND Password='$password'");
		$user = $userquery->fetch_array(MYSQLI_NUM);
	}
	if($user[0]>=1){
		$useridquery = $dbconnection->query("SELECT UserID FROM users WHERE UserName='$username' AND Password='$password'");
		$users = $useridquery->fetch_array(MYSQLI_NUM);
		$userid = $users["0"];
		
		$queryresult = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE UserID='$userid'");
		$total = $queryresult->fetch_array(MYSQLI_NUM);
		
		$pendingquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE UserID='$userid' AND Status = 'pending'");
		$pending = $pendingquery->fetch_array(MYSQLI_NUM);
		
		$startedquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE UserID='$userid' AND Status = 'started'");
		$started = $startedquery->fetch_array(MYSQLI_NUM);
		
		$completedquery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE UserID='$userid' AND Status = 'completed'");
		$completed = $completedquery->fetch_array(MYSQLI_NUM);
		
		$latequery = $dbconnection->query("SELECT COUNT(*) FROM tasks WHERE UserID='$userid' AND Status = 'late'");
		$late = $latequery->fetch_array(MYSQLI_NUM);	
	}
	
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
	<?php if ($user[0]>=1) {?>
		<form method="post" action="tasks.php">
			<h2>Total Tasks: <?php echo $total[0]?>
				<span style="float:right; padding-right:5px;">
					<input type="hidden" name="status" value="All"/>
					<input type="hidden" name="username" value="<?php echo "$username"?>" />
					<input type="hidden" name="password" value="<?php echo "$password"?>" />
					<input type="submit" value="View All Tasks"/>
				</span>
			</h2> 
		</form>
		<form method="post" action="tasks.php">
			<h2>Pending: <?php echo $pending[0]?>
				<span style="float:right; padding-right:5px;">
					<input type="hidden" name="status" value="Pending"/>
					<input type="hidden" name="username" value="<?php echo "$username"?>" />
					<input type="hidden" name="password" value="<?php echo "$password"?>" />
					<input type="submit" value="View Pending Tasks"/>
				</span>
			</h2>
		</form>	
		<form method="post" action="tasks.php">
			<h2>Started: <?php echo $started[0]?>
				<span style="float:right; padding-right:5px;">
					<input type="hidden" name="status" value="Started"/>
					<input type="hidden" name="username" value="<?php echo "$username"?>" />
					<input type="hidden" name="password" value="<?php echo "$password"?>" />
					<input type="submit" value="View Started Tasks"/>
				</span>
			</h2>
		</form>
		<form method="post" action="tasks.php">
			<h2>Completed: <?php echo $completed[0]?>
				<span style="float:right; padding-right:5px;">
					<input type="hidden" name="status" value="Completed"/>
					<input type="hidden" name="username" value="<?php echo "$username"?>" />
					<input type="hidden" name="password" value="<?php echo "$password"?>" />
					<input type="submit" value="View Completed Tasks"/>
				</span>
			</h2>
		</form>
		<form method="post" action="tasks.php">
			<h2>Late: <?php echo $late[0]?>
				<span style="float:right; padding-right:5px;">
					<input type="hidden" name="status" value="Late"/>
					<input type="hidden" name="username" value="<?php echo "$username"?>" />
					<input type="hidden" name="password" value="<?php echo "$password"?>" />
					<input type="submit" value="View Late Tasks"/>
				</span>
			</h2>
		</form>
		<span style="text-align: center">
			<form method="post" action="addtask.php">
				<input type="hidden" name="username" value="<?php echo "$username"?>" />
				<input type="hidden" name="password" value="<?php echo "$password"?>" />
				<input type="submit" value="Add New Task"/>
			</form>
			<form method="post" action="index.php">
				<input type="hidden" value="logout">
				<input type="submit" value="Log-Out">
			</form>
		</span>
	<?php }
		else{?>
			<div style="text-align: center">
			
				<p>You do not have access to this page
				<form method="post" action="index.php">
					<input type="submit" value="Go Back"/>
				</form></p>
			</div>
		<?php }?>
	</div>
</body>
</html>