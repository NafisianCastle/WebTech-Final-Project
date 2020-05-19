<?php	
	session_start();
if(!isset($_SESSION['username']) || $_SESSION['indicator'] != 0){
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<center>
		<h1>Welcome Home! <?= $_SESSION['username']?></h1>
		<a href="FoodDetails.php">Food Details</a></br>
		<a href="OrderFood.php">Order Food</a></br>
		<a href="Notification.php">Notifications</a></br>
		<a href="AboutUs.php">About Us</a></br>
		<a href="LogOut.php">LogOut</a>
	</center>
</body>
</html>