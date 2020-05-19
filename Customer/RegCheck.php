<?php
	session_start();
	
	if( isset($_REQUEST['submit'])){
		$name = $_REQUEST['name'];
		$uname = $_REQUEST['uname'];
		$email = $_REQUEST ['email'];
		$dob = $_REQUEST ['dob'];
		$gender = $_REQUEST ['gender'];
		$add = $_REQUEST ['add'];
		$pass =  $_REQUEST['pass'];
		$cpass = $_REQUEST['cpass']
		
	if(empty(trim($name)) || empty(trim($uname)) || empty(trim($email)) || empty(trim($dob)) || empty(trim($gender)) || empty(trim($add)) || empty(trim($pass))|| empty(trim($cpass))){
			echo "Null submission found!";
		}else{

			$file = fopen('Reg.txt', 'a');
			$user = fread($file, filesize('Reg.txt'));
			$data = explode('|', $user);

			if( trim($data[0]) == $name && trim($data[1]) == $uname && trim($data[2]) == $email && trim($data[3]) == $dob &&  trim($data[4]) == $gender && trim($data[5]) == $add && trim($data[6]) == $pass && trim($data[7]) == $cpass){
				//$_SESSION['uname'] = $uname;
				//$_SESSION['pass'] = $password;
				setcookie('username', $uname, time()+3600, '/');

				header("location: Home.php");
			}else{
				echo "invalid uname/password";
			}
		}

	}else{
		//echo "invalid request! please login first!";
		header("location: LogIn.php");
	}
?>