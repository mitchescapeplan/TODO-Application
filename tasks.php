<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$querystatus = $_POST["status"];
	if($querystatus == "All"){
		$queryresult = $dbconnection->query("SELECT TaskID, Name, Description, CompletionDate, Status FROM `tasks`");
	}
	else{
		$queryresult = $dbconnection->query("SELECT TaskID, Name, Description, CompletionDate, Status FROM tasks WHERE Status = '$querystatus'");
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
		<h1>View <?php echo "$querystatus"?> Tasks</h1>
	</div>
	<div id="container-body">
		<table>
			<tr>
				<th>Task Name</th>
				<th>Task Description</th>
				<th>Completion Date</th>
				<th>Status</th>
			<tr>
			
			<?php
					while($row = $queryresult->fetch_assoc())
					{
						$taskid = $row["TaskID"];
						$name = $row["Name"];
						$status = $row["Status"];
						echo "<form method='post' action='delete.php'>
						<tr><td>", $row["Name"], "</td>
						<td>", $row["Description"], "</td>
						<td>", $row["CompletionDate"], "</td>
						<td>", $row["Status"], "</td>
						<td>
						<input type='hidden' name='id' value='$taskid'/>
						<input type='hidden' name='name' value='$name'/>
						<input type='hidden' name='status' value='$status'/>
						<input name='deletebutton' id='deletebutton' type='submit' value='Delete'/></td></tr></form>";
					}
			?>
			<br><br>
			
		</table>
	</div>
</body>
</html>