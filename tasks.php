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
						<tr>
							<td>", $name, "</td>
							<td>", $row["Description"], "</td>
							<td>", $row["CompletionDate"], "</td>
							<td><select name='statuschange'>
									<option value='$status'>", $row["Status"], "</option>";
									if($status != "Pending"){
										echo "<option value='Pending'>Pending</option>";
									}
									if($status != "Started"){
										echo "<option value='Started'>Started</option>";
									}
									if($status != "Completed"){
										echo "<option value='Completed'>Completed</option></td>";
									}
									echo "
									
							<td>
								<input type='hidden' name='id' value='$taskid'/>
								<input type='hidden' name='name' value='$name'/>
								<input type='hidden' name='status' value='$status'/>
								<input name='action' type='submit' value='Delete'/>
								<input name='action' type='submit' value='Save'></td></tr></form>";
					}
			?>			
		</table>
		<br><br>
		<span style="float:center">
			<form method="post" action='index.php'>
				<input name="action" type="submit" value="Go Home"/>
			</form>
		</span>
	</div>
</body>
</html>