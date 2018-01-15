<?php
	$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	if ($username != NULL){
		$userquery = $dbconnection->query("SELECT COUNT(*) FROM users WHERE UserName='$username' AND Password='$password'");
		$user = $userquery->fetch_array(MYSQLI_NUM);
	}
	if($user[0]>=1){
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
		<h1>Delete</h1>
	</div>
	<div id="container-body">
	<?php
	if($user[0]>=1){
		if($action=="Delete"){
			echo "<p>You successfully deleted the task '<strong>$name</strong>' with the status '<strong>$status</strong>'</p>";
		}
		if($action=="Save"){
			echo "<p>You successfully Saved the task '<strong>$name</strong>' with the old status '<strong>$status</strong>' and new status of '<strong>$statuschange</strong>'</p>";
		}
	?>
		<p style="text-align:center">
			<form method="post" action="home.php">
				<input type="hidden" name="username" value="<?php echo "$username"?>"/>
				<input type="hidden" name="password" value="<?php echo "$password"?>"/>
				<input type="submit" value="Go Home" style="float:right"/>
			</form>
		</p>
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