<?php
	$user = $_POST["usernamereg"];
	$pass1 = $_POST["password1reg"];
	$pass2 = $_POST["password2reg"];
	
	if($user != NULL && $pass1 == $pass2){
		$dbconnection = mysqli_connect('localhost', 'root', '', 'todo');
		$userquery = $dbconnection->query("SELECT COUNT(*) FROM users WHERE UserName='$user' AND Password='$pass1'");
		$userexists = $userquery->fetch_array(MYSQLI_NUM);
		if ($userexists[0] == 0){
			$dbconnection->query("INSERT INTO users (UserName, Password) VALUES ('$user', '$pass1')");
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
		<h1>Welcome!</h1>
	</div>
	<div id="container-body">
		<div style="text-align:center">
			<h2>Log In</h2>
			<?php if($userexists[0] == 0 && $user != NULL && $pass1 == $pass2){
					echo "<p>User created!</p>";
				  }
				  else if ($userexists[0] == 1){
					  echo "<p>User '<strong>$user</strong>' already exists</p>";
				  }
				  else if($pass1 != $pass2){
					  echo "<p>Password must be the same in both fields. Please try again</p>";
				  }
			?>
			<form method="post" action="home.php">
				<label for="username">Username:</label>
				<input name="username" id="username" type="text" required/><br><br>
			
				<label style="padding-left:50px;" for="password">Password:</label>
				<input name="password" id="password" type="text" required/><br><br>
				<input type="submit" value="Log In"/>
			</form>
			
			<form method="post" action="register.php">
				<input type="submit" value="Register"/>
			</form>
			
		</div>
	</div>
</body>
</html>