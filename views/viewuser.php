<?php	
	session_start();
	if(!isset($_COOKIE['username']) || !$_COOKIE['username']=="admin"){  
		header("location: login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <center>
    <h2>Users</h2>
    <table border="1px">
        <tr>
            <td width="20%"><h3>Name</h3></td>
            <td width="20%"><h3>User name</h3></td>
            <td width="20%"><h3>Email</h3></td>
            <td width="20%"><h3>Password</h3></td>
        </tr>
        <?php
         $file = fopen('user.txt','r');
			while(!feof($file)) {
				$user = fgets($file);
				$data = explode('|', $user);
                if(isset($data[3])) $name = $data[3];
                if(isset($data[0])) $uname = $data[0];
                if(isset($data[1])) $pass = $data[1];
                if(isset($data[2])) $email = $data[2];
                echo "<tr>";
                echo "<td>$name</td>";
                 echo "<td>$uname</td>";
                  echo "<td>$email</td>";
                   echo "<td>$pass</td>";
                   echo "</tr>";
			}
        ?>
    </table>
    </center>
</body>
</html>
