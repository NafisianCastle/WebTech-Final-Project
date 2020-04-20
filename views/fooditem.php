<?php	
	session_start();
	if(!isset($_COOKIE['username'])){  
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Food Items</title>
</head>
<body>
<center>
 <h2>Food Items</h2>
    <table border="1px">
        <tr>
            <td width="20%"><b>food code</b></td>
            <td width="20%"><b>food name</b></td>
            <td width="20%"><b>price</b></td>
        </tr>
        <tr>
            <td width="20%">1001</td>
            <td width="20%">Chiken burger</td>
             <td width="20%">270tk.</td>
           
        </tr>
         <tr>
            <td width="20%">1002</td>
            <td width="20%">Beef Burger</td>
            <td width="20%">300tk.</td>
           
        </tr>
         <tr>
             <td width="20%">1003</td>
            <td width="20%">Noodles</td>
            <td width="20%">150tk.</td>
           
           
        </tr>
        <tr>
           <td width="20%">1004</td>
           <td width="20%">Pizza</td>
            <td width="20%">500tk.</td>
        </tr>
        <tr>
             <td width="20%">1005</td>
              <td width="20%">Coke</td> 
              <td width="20%">25tk.</td>
        </tr>
    </table>
    <br><br>
    <form method="POST" action="cart.php">
    <table>
				<tr>
					<td><b>Enter Food code</b></td>
					<td><b>: </b><input type="text" name="foodcode" placeholder="Enter food code" ></td>
				</tr>
				<tr><td></td></tr>
				<tr>
					<td><b>Enter Amount</b></td>
					<td><b>: </b><input type="number" name="amount"  placeholder="Enter amount"></td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Add to cart"></td>
				</tr>
				<tr></tr>
			</table>
    </form>
   
</center>
</body>
</html>
