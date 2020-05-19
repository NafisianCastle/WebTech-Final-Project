<?php
	session_start();
	if(isset($_COOKIE['username'])){  
		header("location: ../views/home.php");
	}
	$nameErr=$unameErr=$emailErr=$passErr=$conpassErr=$existedErr=$conMsg=$matchErr="";
	global $found;
	if(isset($_REQUEST['submit'])){
        $name = $_REQUEST['name'];
		$uname = $_REQUEST['uname'];
		$email = $_REQUEST['email'];
		$pass =  $_REQUEST['pass'];
		$conpass = $_REQUEST['conpass'];
        if(empty(trim($name))){
		   $nameErr = "Name is required"; 
		}
		else if(empty(trim($uname))){
           $unameErr = "User name is required"; 
		}
		else if(empty(trim($email))){
           $emailErr = "Email is required"; 
		}
		else if(empty(trim($pass))){
           $passErr = "Password is required"; 
		}
		else if(empty(trim($conpass))){
           $conpassErr = "Confirm password is required"; 
		}
		else{
			if((trim($pass)) != (trim($conpass))){
				$matchErr = "password and confirm password didn't match";
			}else{
				
			}
		}
	}
?>