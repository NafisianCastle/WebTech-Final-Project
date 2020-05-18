<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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
				<h1>Create A New Account!</h1>
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
					<tr>
						<td colspan="2" align="center"><i>Already have an account?</i><a href="login.php">Login</a></td>
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