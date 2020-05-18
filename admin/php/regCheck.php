<?php
	session_start();
	if(isset($_COOKIE['username'])){  
		header("location: home.php");
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
				$file = fopen("user.txt", "r");
				while(!feof($file))  {
					$user = fgets($file);
					$data = explode('|',$user);
					if(isset($data[0]) && trim($data[0]) == $uname){
						$existedErr = "User name or email already existed";
						$found=1;
						fclose($file);
						break;
					}
					else if(isset($data[2]) && trim($data[2]) == $email){
						$existedErr = "User name or email already existed";
						$found=1;
						fclose($file);
						break;
					}
				}
				if(!$found){
					$file = fopen("user.txt", "a");
					$txt = $uname."|".$pass."|".$email."|".$name."\n\r";
					fwrite($file, $txt);
					fclose($file);
					$conMsg = "<br><h3>CONGRATULATIONS,Your registration is succesful !</h3><br>";
				}
			}
		}
	}
?>