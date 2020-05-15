<?php
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Items</title>
</head>
<body>
    <center>
    <h1>Your Cart</h1>
    <h2>This page is under construction right now!</h2>
    </center>
</body>
</html>