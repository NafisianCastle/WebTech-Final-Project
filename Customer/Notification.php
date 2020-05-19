<?php	
	session_start();
if(!isset($_SESSION['username']) || $_SESSION['indicator'] != 0){
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
</head>
<body>
	<center>
	<h2>Food delivery</h2>
	<h3>Notifications</h3>
	<form method="POST" action="Notification.php">
	<p>No Notification</p></br>
	<a href=Home.php >Go Home
	</center>
</body>
</html>