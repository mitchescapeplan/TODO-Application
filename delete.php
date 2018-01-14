<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$deleteid = $_POST["id"];
	$name = $_POST["name"];
	$status = $_POST["status"];
	
	$dbconnection->query("DELETE FROM tasks where TaskID=$deleteid");
?>

<!DOCTYPE html>
<html>
<head>
<title>TODO List</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="container-header">
		<h1>Delete</h1>
	</div>
	<div id="container-body">
		<p>You successfully deleted the task '<strong><?php echo "$name" ?></strong>' with the status '<strong><?php echo "$status" ?></strong>'</p>
		<p style="text-align:center"><a href="index.php"><button>Go Home</button></a></p>
	</div>
</body>
</html>