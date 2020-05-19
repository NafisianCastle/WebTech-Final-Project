<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<center>
	<h1> Food Delivery</h1>
	<h2> LogIn </h2>
	<form method="POST" action="LogCheck.php">
		<table>
		<tr>
		<td>Username: </td>
		<td><input type="text" name="uname" value=""/></td><br>
		</tr>
		<tr>
		<td>Password: </td>
		<td><input type="password" name="password" value=""/></td><br>
		</tr>
		<tr>
		<td colspan="2"><center><input type="submit" name="submit" value="Log In"></center></td>
		</tr>
		<tr>
		<td colspan="2"><a href=Registration.php><center>Register</center></td>		
		</tr>
	</form>
	</center>
</body>
</html>