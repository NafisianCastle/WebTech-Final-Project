<?php
include "include/db_connect.inc.php";
$usernamewarning = $emailwarning = $passwordwarning = $confirmedpasswordwarning = $originalpass = $originalconfirmedpass = $uname = $uemail = $upass = $confirmedupass = $unameInDB =$upassToDB = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(!empty($_POST['username'])){
    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    if(!empty($_POST['email'])){
      $uemail = mysqli_real_escape_string($conn, $_POST['email']);
      if(!empty($_POST['password'])){
          $originalpass = $_POST['password'];
          $originalconfirmedpass = $_POST['confirmed_password'];
        if($_POST['password'] === $_POST['confirmed_password']){
          $upass = mysqli_real_escape_string($conn, $_POST['password']);
          $upassToDB = password_hash($upass, PASSWORD_DEFAULT);
          $sqlUserCheck = "SELECT username FROM login WHERE username = '$uname'";
          $result = mysqli_query($conn, $sqlUserCheck);

          if($_COOKIE['passwordchk'] == 1){
            if(mysqli_num_rows($result) > 0){
              $usernamewarning = "User-Name already exist!";
            }
            else{
              $sql = "INSERT INTO login (username, email, password, indicator) VALUES ('$uname', '$uemail', '$upassToDB', '0');";
              mysqli_query($conn, $sql);
              header('Location: success.php');
            }
          }
          else{
            $passwordwarning = "Password must be at least eight character long!!";
          }
        }
        else{
          $confirmedpasswordwarning = "Password does not match :(";
        }
      }
      else{
        $passwordwarning = "Please enter a password -_-";
      }
    }
    else{
      $emailwarning = "Please enter your email";
    }
  }
  else{
    $usernamewarning = "User-Name cannot be empty!";
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Registration Page</title>
     <link rel="stylesheet" href="./css/style.css">
     <script src="functions.js"></script>
   </head>
        <h1 style="color : red"><center> WELCOME TO ONLINE FOOD DELIVERY <center> </h1>
   <body>
      <form class="" action="registration.php" method="post">
        <div class="midpos" align="middle">
            <h2 align="middle" style="color : cyan">Registration<br> Please fill up the following fields</h2>
          <table>
            <tr>
              <td align="right" style="color:floralwhite"><label>User-Name </label><span style="color: whitesmoke">*</span></td>
              <td><input type="text" name="username" value="<?php echo $uname ?>" style=" font-size: 20px; color : darkblue; background-color : mintcream;" required ></td>
              <td style="color : orangered"><?php echo $usernamewarning ?></td>
            </tr>
            <tr>
              <td align="right" style="color:floralwhite"><label>Email </label><span style="color: whitesmoke">*</span></td>
              <td><input type="email" name="email" value="<?php echo $uemail ?>" style=" font-size: 20px; color : darkblue; background-color : mintcream;" required></td>
              <td style="color : orangered"><?php echo $emailwarning ?></td>
            </tr>
            <tr>
              <td align="right" style="color:floralwhite"><label>Password</label><span style="color: whitesmoke">*</span></td>
              <td><input type="password" name="password" id="pass" value="<?php echo $originalpass ?>" style=" font-size: 20px; color : darkblue; background-color : mintcream;" required onkeyup="passwordValidity()"></td>
              <td style="color : orangered"><label id="passcheck"><?php echo $passwordwarning ?></label></td>
            </tr>
            <tr>
              <td align="right" style="color:floralwhite"><label>Confirm Password</label><span style="color: whitesmoke">*</span></td>
              <td><input type="password" name="confirmed_password" value="<?php echo $originalconfirmedpass ?>" style=" font-size: 20px; color : darkblue; background-color : mintcream;" required></td>
              <td style="color : orangered"><?php echo $confirmedpasswordwarning ?></td>
            </tr>
            <tr>
              <td align="middle"><input id="btn_general" type="reset" name="btn_reset" value="Reset" style="width: 100%; font-size: 20px; height : 40px;"></td>
              <td align="middle"><input id="btn_general" type="submit" name="btn_register" value="Register" style="width: 100%; font-size: 20px; height : 40px;"></td>
              <td></td>
            </tr>
          </table>
        </div>
      </form>
   </body>
 </html>

 <script>
 function passwordValidity(){
   var password = document.getElementById('pass').value;
   if(password.length < 8)
   {
   document.getElementById('passcheck').innerText = "Password must be at least eight character long!!";
   document.cookie = "passwordchk = 0"
 }
 else{
   document.getElementById('passcheck').innerText = "";
   document.cookie = "passwordchk = 1"
 }
 }
 </script>
