<?php
include "include/db_connect.inc.php";

session_start();
$upass = $uname = $usererror = $passworderror = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(!empty($_POST['username'])){
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
  }
  if(!empty($_POST['password'])){
    $upass = mysqli_real_escape_string($conn, $_POST['password']);
  }

  $sqlUserCheck = "SELECT id, username, password, indicator FROM login WHERE username = '$uname'";
  $result = mysqli_query($conn, $sqlUserCheck);
  $rowCount = mysqli_num_rows($result);

  if($rowCount < 1){
    $usererror = "User does not exist!!";
  }
  else{
    while($row = mysqli_fetch_assoc($result)){
      $passInDB = $row['password'];
      if(password_verify($upass, $passInDB)){

          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $uname;
          $_SESSION['indicator'] = $row['indicator'];
          if($row['indicator'] == 0)
            header("Location: Home.php");
      }
      else{
        $passworderror = "Wrong Password!!";
      }
  }
  }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
    <h1 style="color : red"><center> WELCOME TO ONLINE FOOD DELIVERY <center> </h1>
	<h2 style="color : red"><center> LOGIN  <center> </h1>
  <body>
    <form class="" action="login.php" method="post">
      <div class="midpos">
        <table>
          <tr>
            <td><input color="lightgreen" type="text" name="username" value="<?php echo $uname; ?>" placeholder="User-name" style="height : 30px; font-size: 20px; color : darkblue; background-color : mintcream;" required></td>
          </tr>
          <tr>
            <td style="color:orangered;"><?php echo $usererror; ?></td>
          </tr>
          <tr>
            <td><input type="password" name="password" value="" placeholder="Password" style="height : 30px; font-size: 20px; color : darkblue; background-color : mintcream;" required></td>
          </tr>
          <tr>
            <td style="color:orangered;"><?php echo $passworderror; ?></td>
          </tr>
          <tr>
            <td align="middle"><input id="btn_general" type="submit" class="btn_login" name="btn_login" value="LOGIN" style="width: 100%; font-size: 20px; height : 40px;"></td>
          </tr>
          <tr>
            <td align="middle"><a href="registration.php">Create new account</a></td>
          </tr>
        </table>
      </div>
    </form>
  </body>
</html>
