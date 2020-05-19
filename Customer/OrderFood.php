<?php	
	session_start();
if(!isset($_SESSION['username']) || $_SESSION['indicator'] != 0){
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Order Food</title>
</head>
<body>
	<center>
	<h1> Food Delivery</h1>
	<h2> Order Food</h2>
	<form method="POST" action="OrderFood.php">
		<table>
		<tr>
		<td>Food Code </td>
		<td><input type="number" name="orfood" value=""/></td><br>
		</tr>
		<tr>
		<td>Food Details: </td>
		<td><input type="text" name="fdetails" value=""/></td><br>
		</tr>
		<tr>
		<td colspan="2"><center><input type="submit" name="submit" value="Add">
		                        <input type="submit" name="submit" value="Delete"></center></td>
		</tr>
		<tr>
		<td colspan="2"><center><a href=Home.php >Go Home</a></center></td>
		</tr>
</body>
</html>