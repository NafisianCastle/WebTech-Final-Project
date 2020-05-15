<?php
    session_start();
    $nameErr=$unameErr=$emailErr=$passErr=$conpassErr=$existedErr=$conMsg=$matchErr="";
    $found=0;
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
    }
     $file = fopen("user.txt", "r");
    while(!feof($file))  {
        $user = fgets($file);
        $data = explode('|',$user);
        if(isset($data[0]) && isset($_COOKIE['username']) && trim($data[0]) == $_COOKIE['username']){
            if(isset($data[3])) $name = $data[3];
            if(isset($data[0])) $uname = $data[0];
            if(isset($data[1])) $pass = $data[1];
            if(isset($data[2])) $email = $data[2];
            fclose($file);
            break;
        }
    }
    if(isset($_REQUEST['submit'])){

        $name = $_REQUEST['name2'];
		$uname = $_REQUEST['uname2'];
		$email = $_REQUEST['email2'];
		$pass =  $_REQUEST['pass2'];
        $conpass = $_REQUEST['conpass2'];

        if(empty(trim($name))) $nameErr = "Name is required"; 
		else if(empty(trim($uname))) $unameErr = "User name is required"; 
		else if(empty(trim($email)))  $emailErr = "Email is required"; 
		else if(empty(trim($pass)))  $passErr = "Password is required"; 
		else if(empty(trim($conpass))) $conpassErr = "Confirm password is required"; 
		else{
			if((trim($pass)) != (trim($conpass))){
				$matchErr = "password and confirm password didn't match";
			}else{
				$file = fopen("user.txt", "r");
				while(!feof($file)){
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
				
			}
		}
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
    <style>
	.error {color: #FF0000;}
	</style>
</head>
<body>
	     <img src="home.jpg" alt="login" height="200px" width="100%">
        <center>
        <h1><?= $_COOKIE['username']?>'s Profile</h1>
		<table>
			<tr>
				<td width=""><a href="home.php"><b>Home</b></a></td>
                <td></td>
				<td width=""><a href="logout.php"><b>Logout</b></a></td>
				
			</tr>
		</table><br>
        <center>
        <fieldset style="width:400px">
        <h3>Your Details</h3>
        <form method="POST" action="profile.php">
        <p><span class="error"><?php echo $existedErr;?></span></p>
		<p><span class="error"><?php echo $matchErr;?></span></p>
         <table >
            <tr>
                <td><b>Full Name</b></td>
                <td>
                <b>:</b> <input type="text" name="name2" value="<?php echo $name?>">
                <span class="error"> <br><?php echo $nameErr;?></span>
                </td>
            </tr>
            <tr>
                <td> <b>User Name</b></td>
                <td> 
                <b>:</b> <input type="text" name="uname2" value="<?php echo $uname?>">
                <span class="error"><br> <?php echo $unameErr;?></span>
                </td>
            </tr>
            <tr>
                <td> <b>Email</b></td>
                <td> 
                <b>:</b> <input type="email" name="email2" value="<?php echo $email?>">
                <span class="error"><br> <?php echo $emailErr;?></span>
                </td>
            </tr>
            <tr>
                <td><b>Password</b></td>
                <td>
                <b>:</b> <input type="text" name="pass2" value="<?php echo $pass?>">
                <span class="error"><br> <?php echo $passErr;?></span>
                </td>
            </tr>
            <tr>
                <td><b>Confirm Password</b></td>
                <td>
                <b>:</b> <input type="text" name="conpass2" value="">
                <span class="error"><br> <?php echo $conpassErr;?></span>
                </td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="update" ></td>
            </tr>
        </table>
        <span class="error"><?php echo $conMsg;?></span>
        </form>
        </fieldset>
        </center>
        </center>
</body>
</html>