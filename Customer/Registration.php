<?php

$nameErr=$unameErr=$emailErr=$dobErr=$genderErr=$passErr=$cpassErr="";
$name=$uname=$email=$dob=$gender=$add=$pass=$cpass="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
  $name = test_input($_POST["name"]);}
  if (empty($_POST["uname"])) {
    $unameErr = "UserName is required";
  } else {
  $uname = test_input($_POST["uname"]);}
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";} }
  if (empty($_POST["dob"])) {
    $dobErr = "DateOfBirth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["add"])) {
    $add = "";
  } else {
    $add = test_input($_POST["add"]);
  }  
  if (empty($_POST["pass"])) {
    $pass = "";
  } else {
    $pass = test_input($_POST["pass"]);
    
  	}
  if (empty($_POST["cpass"])) {
    $cpass = "";
  } else {
   $cpass = test_input($_POST["cpass"]);}
     
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

 }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
	   REGISTRATION 
	</title>
</head>
<body>
<table>
	<tr>
	<td width=30%>
	<center>
	<h1>Food Delivery</h1>
	<h2>Registration Form</h2>
	<h3>Create An Account</h3>
	<p><span class="error">* required field</span></p>
	<form method="post" action="RegCheck.php"> 
	<table>
		<tr>
			<td>Name: </td>
			<td><input type="text" name="name" value="<?php echo $name;?>"/>
			<span class="error">* <?php echo $nameErr;?></span></td></br>
		</tr>
		<tr>
			<td>UserName: </td>
			<td><input type="text" name="uname" value="<?php echo $uname;?>"/>
			<span class="error">* <?php echo $unameErr;?></span></td></br>
		</tr>
		<tr>
			<td>E-mail: </td>
			<td><input type="text" name="email" value="<?php echo $email;?>"/>
			<span class="error">* <?php echo $emailErr;?></span></td></br>
		</tr>
		<tr>
			<td>DOB: </td>
			<td><input type="date" name="dob" value="<?php echo $dob;?>" />
			<span class="error">* <?php echo $dobErr;?></span></td></br>
		</tr>
		<tr>
			<td>Gender: </td>
			<td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
				<span class="error">* <?php echo $genderErr;?></span></td></br>
		</tr>
		<tr>
			<td>Address: </td>
			<td><textarea name="add"><?php echo $add;?></textarea></td></br>
		</tr>
		<tr>
			<td>Password: </td> 
			<td><input type="password" name="pass" value="<?php echo $pass;?>"/>
			<span class="error">* <?php echo $passErr;?></span></td></br>
		</tr>
		<tr>
			<td>Confirm Password: </td>
		    <td><input type="password" name="cpass" value="<?php echo $cpass;?>"/>
			<span class="error">* <?php echo $cpassErr;?></span></td></br>
		</tr>
		<tr>		
			<td colspan="2"><center> <input type="submit" name="submit" value="Sign Up"> </center></td>
		</tr>
		<tr>
			<td colspan="2"><center>Already have an account?<a href="login.php">Login</a></center></td>
		</tr>
	</table>
	</center>

	</form>
	</td>
	</tr>
	</table>
</body>


</html>