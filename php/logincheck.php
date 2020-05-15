<?php
	session_start();
	$emptyErr=$invalidErr="";
	if(isset($_COOKIE['username'])){  
		header("location: home.php");
	}
	if(isset($_REQUEST['submit'])){
		$uname = $_REQUEST['uname'];
		$pass =  $_REQUEST['pass'];
		if(empty(trim($uname)) || empty(trim($pass))){
			$emptyErr = "User name and Password is required";
		}else{
		    $file = fopen('user.txt', 'r');
			while(!feof($file))  {
				$user = fgets($file);
				$data = explode('|', $user);
				if(trim($data[0]) == $uname && trim($data[1]) == $pass){
				$_SESSION['uname'] = $uname;
				$_SESSION['pass'] = $pass; 
				setcookie('username', $uname, time()+3600, '/');
				header("location: home.php");
				}
			}
				$invalidErr="invalid user name or password";
		}
	}
?> 