<?php
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
</head>
<body>
    <center>
    <h1>About Us</h1> 
    <p>Online Food delivery is a business organization since 2006</p>
    <p>368,Iskaton Road,Dhaka-1215</p>
    <p>Contact:02456789</p>
    <p>Email:foody@food.org</p>
    <p>---</p>
    </center>
</body>
</html>