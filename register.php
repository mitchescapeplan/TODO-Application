<!DOCTYPE html>
<html>
<head>
<title>TODO List</title>
<link rel="stylesheet" href="css.css">
</head>
<body>
	<div id="container-header">
		<h1>Register User</h1>
	</div>
	<div id="container-body">

		<form method="post" action="index.php">
			<label for="usernamereg">User Name:</label>
			<input type="text" name="usernamereg" id="usernamereg" required/><br><br>
			<label for="password1reg" style="padding-left:50px;">Password:</label>
			<input type="text" name="password1reg" id="password1reg" required/><br><br>
			<label for="password2reg" style="padding-left:50px;">Re-enter Password:</label>
			<input type="text" name="password2reg" id="password2reg" required/><br><br>
			<input type="submit" value="Register" style="float:right"/>
		</form>
		<br><br>
			<form method="post" action="index.php">
				<input type="submit" value="Go Back" style="float:right"/>
			</form><br><br>

	</div>
</body>
</html>