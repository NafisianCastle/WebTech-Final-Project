<?php
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
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

<!DOCTYPE html>
<html>
<head>
	<title> Manager Registration</title>
	<style>
	.error {color: #FF0000;}
	</style>
</head>
<body>
<center>
<table>
	<tr>
		<td>
			<img src="reg1.jpg" alt="login" height="90%" width="100%" align="bottom">
		</td>
		<td width="35%">
		<center>
			<form method="POST" action="registration.php">
				<h1>Assign New Manager!</h1>
				<fieldset style="width:400px">
				<p><span class="error">* required field</span></p>
				<p><span class="error"><?php echo $existedErr;?></span></p>
				<p><span class="error"><?php echo $matchErr;?></span></p>
				<table >
					<tr>
						<td><b>Full Name</b></td>
						<td>
						<b>:</b> <input type="text" name="name" placeholder="Enter your full name">
						<span class="error">* <br><?php echo $nameErr;?></span>
						</td>
					</tr>
					<tr>
						<td> <b>User Name</b></td>
						<td> 
						<b>:</b> <input type="text" name="uname" placeholder="Enter user name">
						<span class="error">*<br> <?php echo $unameErr;?></span>
						</td>
					</tr>
					<tr>
						<td> <b>Email</b></td>
						<td> 
						<b>:</b> <input type="email" name="email" placeholder="Enter email address">
						<span class="error">*<br> <?php echo $emailErr;?></span>
						</td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td>
						<b>:</b> <input type="password" name="pass"  placeholder="Enter password">
						<span class="error">*<br> <?php echo $passErr;?></span>
						</td>
					</tr>
					<tr>
						<td><b>Confirm Password</b></td>
						<td>
						<b>:</b> <input type="password" name="conpass"  placeholder="Re-enter password" >
						<span class="error">*<br> <?php echo $conpassErr;?></span>
						</td>
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Register" ></td>
					</tr>
					
				</table>
				<span class="error"><?php echo $conMsg;?></span>	
				</fieldset>
			</form>
		</center>
		</td>
		<td width="32%">
			<img src="reg2.jpg" alt="login" height="90%" width="100%" align="middle">
		</td>
	</tr>
</table>
</center>
</body>
</html>

