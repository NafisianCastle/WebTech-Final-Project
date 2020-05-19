<?php
	session_start();
	$emptyErr=$invalidErr="";
	if(isset($_COOKIE['username'])){  
		header("location: ../views/home.php");
	}
	if(isset($_REQUEST['submit'])){
		$uname = $_REQUEST['uname'];
		$pass =  $_REQUEST['pass'];
		if(empty(trim($uname)) || empty(trim($pass))){
			$emptyErr = "User name and Password is required";
		}else{
		   
		}
	}
?> 