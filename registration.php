<!DOCTYPE html>
<html lang="en">
<head>
<title>XCompany</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="topnav">
  <a href="index.html">Home</a>
  <a href="login.php">Login</a>
  <a href="registration.php">Registration</a>
</div>

<div class>
  <h4 style="text-align: center">Registration</h1>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" placeholder="Give your name"/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" placeholder="Give your email"/></td>
					</tr>
					<tr>
						<td>User Name</td>
						<td><input type="text" name="userName"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Give your password"/></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="cpassword" placeholder="Retype your password"></td>
					</tr>
						<tr>
							<td>Gender</td>
							<td>
								<input type="radio" name="gender" value="male">Male
							
								<input type="radio" name="gender" value="female">Female
							
								<input type="radio" name="gender" value="other">Other
							</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td><input type="text" name="dob"></td>
							<td>(dd/mm/yyy)</td>
						</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="register" value="Register"/>
		
						<input type="reset" value="Reset"></td>
					</tr>
				</table>
			</form>
</div>

<div class="footer">
  <p>Copyright © 2020</p>
</div>

</body>
</html>


<?php
if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	if($password==$cpassword)
	{
	$con=mysqli_connect("localhost","root","","testdb");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Row Insert
	
	$sql="INSERT INTO customers(name,email,userName,password,gender,dob) VALUES('$name','$email','$userName','$password','$gender','$dob')";
	if(mysqli_query($con,$sql))
	{
		header("Location:login.php");
	}
	else
	{
		echo "Error in inserting: ".mysqli_error($con);
	}
    mysqli_close($con);
    }	
    else
    {
    	echo "Password Mismatch";
    }	
}

	



//Row Update	
	// $sql="UPDATE customers SET name='Loki' WHERE id=2";
	// if(mysqli_query($con,$sql))
	// {
	// 	echo "Successfully row updated..<br/>";
	// }
	// else
	// {
	// 	echo "Error in updating: ".mysqli_error($con);
	// }

//Row Delete
	// $sql="DELETE FROM customers WHERE id=2";
	// if(mysqli_query($con,$sql))
	// {
	// 	echo "Successfully row deleted..<br/>";
	// }
	// else
	// {
	// 	echo "Error in deleting: ".mysqli_error($con);
	// }

//Retrieve Data
	// $sql="SELECT * FROM customers WHERE id=1";
	// $result=mysqli_query($con,$sql);	
	// if(mysqli_num_rows($result)>0)
	// {
	// 	while($row=mysqli_fetch_array($result))
	// 	{
	// 		//echo "Id: ".$row[0]." Name: ".$row[1]."<br/>";
	// 		echo "Id: ".$row['id']." Name: ".$row['name']."<br/>";
	// 	}
	// }
	// else
	// {
	// 	echo "No data found.<br/>";
	// }


?>