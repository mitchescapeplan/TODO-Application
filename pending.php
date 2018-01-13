<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$queryresult = $dbconnection->query("SELECT Name, Description, CompletionDate, Status FROM `tasks` WHERE Status = 'pending' ");	
?>

<!DOCTYPE html>
<html>
<head>
<title>TODO List</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="container-header">
		<h1>Pending Tasks</h1>
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
						echo "<tr><td>", $row["Name"], "</td>
						<td>", $row["Description"], "</td>
						<td>", $row["CompletionDate"], "</td>
						<td>", $row["Status"], "</td></tr>";
					}
			?>
		</table>
	</div>
</body>
</html>