<?php	
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
		<img src="home.jpg" alt="login" height="200px" width="100%">
		<center>
		<h1>Welcome <?= $_COOKIE['username']?></h1>
		<?php 
			if(isset($_COOKIE['username']) && $_COOKIE['username']=="admin"){
				echo '<a href="viewuser.php"><h2><b>View Users</b></h2></a>';
				echo '<a href="addmngr.php"><h2><b>Add Manager</b></h2></a>';
				
		}
		?>
		<a href="fooditem.php"><h2><b>Explore food items</b></h2></a>
		<a href="profile.php"><h2><b>Profile</b></h2></a>
		<a href="notification.php"><h2><b>Notifications</b></h2></a>
		<a href="about.php"><h2><b>About Us</b></h2></a>
		<a href="logout.php"><h2><b>Logout</b></h2></a>
		</center>
</body>
</html>