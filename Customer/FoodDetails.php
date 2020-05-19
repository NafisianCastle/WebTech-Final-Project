<?php	
	session_start();
if(!isset($_SESSION['username']) || $_SESSION['indicator'] != 0){
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Food Details</title>
</head>
<body>
	<center>
		<h2>Food Delivery</h2>
		<h3>Food Details </h2>
		
	<form method="POST" action="FoodDetails.php">
	<table border="1">
		<tr>
			<td colspan="3"><center>Foods</center></td>
		</tr>
		<tr>
			<td>Code No.</td>
			<td>Foods</td>
			<td>Price(In Taka)</td>
		</tr>
		<tr>
			<td>001</td>
			<td>Chicken Cheese Burger</td>
			<td>80/=</td>
		</tr>
		<tr>
			<td>002</td>
			<td>Chicken Fried Rice</td>
			<td>180/=</td>
		</tr>
		<tr>
			<td>003</td>
			<td>Fuchka</td>
			<td>50/=</td>
		</tr>
		<tr>
			<td>004</td>
			<td>Biriyani</td>
			<td>180/=</td>
		</tr>
		<tr>
			<td>005</td>
			<td>Vanila Pastry</td>
			<td>80/=</td>
		</tr>
		<tr>
			<td colspan="3"><a href=Home.php ><center>Go Home</center></a></td>
		</tr>
	
	</form>
   <center>
</body>
</html>