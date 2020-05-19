<?php	
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: LogIn.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title> About Us </title>
</head>
<body>
	<center>
		<h2>Food Delivery</h2>
		<h3> About Us </h2>
		<form method="POST" action="AboutUs.php">
		<p><b>Address:</b>55, Kamal Ataturk Avenue,Banani,Dhaka</br>
		<b>Phone:</b>02-9984625,0196428366</br>
		<b>Website:</b>www.fooddelivery.com</br>
		<b>E-mail:</b>deliveryfood@gmail.com</br>
		<a href=Home.php ><center>Go Home</center></a></p>
	</center>
</body>
</html>