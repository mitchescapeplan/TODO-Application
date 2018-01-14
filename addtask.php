<?php
	$returned = $_POST["return"];
	if ($returned == "yes")
	{
		$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
		$taskname=$_POST["taskname"];
		$desc=$_POST["taskdesc"];
		$date=$_POST["date"];
		$status=$_POST["status"];
		$dbconnection->query("INSERT INTO tasks (Name, Description, CompletionDate, Status) VALUES ('$taskname', '$desc', '$date', '$status')");
	};
?>

<!DOCTYPE html>
<html>
<head>
<title>TODO List</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="container-header">
		<h1>Add New Task</h1>
	</div>
	<div id="container-body">
	<?php 	if($returned == "yes" && $taskname != NULL){
				echo "<p> Successfully added task <strong>'$taskname'</strong> with status <strong>'$status'</strong>";
			}
	?>
		<form method="post" action="addtask.php">
			<label for="taskname">Name of Task:</label>
			<input type="text" name="taskname" id="taskname" required/><br><br>
			<label for="taskdesc" style="padding-left:50px;">Task Description (If necessary):</label>
			<input type="text" name="taskdesc" id="taskdesc"/><br><br>
			<label for="date" style="padding-left:50px;">Date of Completion:</label>
			<input type="date" name="date" id="date" required/><br><br>
			<label for="status" style="padding-left:50px;">Status:</label>
			<select name="status" id="status">
				<option value="Pending">Pending</option>
				<option value="Started">Started</option>
				<option value="Completed">Completed</option>
			</select><br><br>
			<input type="hidden" name="return" value="yes"/>
			<input type="submit" value="Add New Task" style="float:right"/>
		</form>
		<br><br>
		<form method="post" action="index.php">
			<input type="submit" value="Go Home" style="float:right"/>
		</form>
		<br><br>
	</div>
</body>
</html>