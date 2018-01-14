<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$deleteid = $_POST["id"];
	$name = $_POST["name"];
	$status = $_POST["status"];
	$statuschange = $_POST["statuschange"];
	$action = $_POST["action"];
	
	if($action == "Delete"){
		$dbconnection->query("DELETE FROM tasks where TaskID=$deleteid");
	}
	else if($action == "Save"){
		$dbconnection->query("UPDATE tasks SET Status='$statuschange' WHERE TaskID='$deleteid'");
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
		<h1>Delete <?php echo "$action $status $statuschange" ?></h1>
	</div>
	<div id="container-body">
	<?php
		if($action=="Delete"){
			echo "<p>You successfully deleted the task '<strong>$name</strong>' with the status '<strong>$status</strong>'</p>";
		}
		if($action=="Save"){
			echo "<p>You successfully Saved the task '<strong>$name</strong>' with the old status '<strong>$status</strong>' and new status of '<strong>$statuschange</strong>'</p>";
		}
	?>
		<p style="text-align:center"><a href="index.php"><button>Go Home</button></a></p>
	</div>
</body>
</html>