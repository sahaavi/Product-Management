<!DOCTYPE html>
<html lang="en">
<head>
<title>XCompany</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<style>
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}



th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="index.php">Home</a>
  <a href="login.php">Login</a>
  <a href="registration.php">Registration</a>
</div>

<div class="content">
  <h1 style="text-align: center">XCompany</h1>
  <p>Welcome to xCompany</p>
  <?php

  $con=mysqli_connect("ec2-23-20-129-146.compute-1.amazonaws.com","dbdzapnpxswjbh","c255e2dd4c81dc6e33fbc6aa0712196d5ccfa0b435f473f3f030453922ef026c","dciu654g9veev0");
  if(!$con)
  {
    die("Connection Error: ".mysqli_connect_error()."<br/>");
  }

  $sql="SELECT * FROM products";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0)
   {
    ?>
    <table border='1' cellpadding='8'>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Product Quantity</th>
      </tr>
    <?php
    while($row=mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>".$row['pid']."</td>";
      echo "<td>".$row['pname']."</td>";
      echo "<td>".$row['description']."</td>";
      echo "<td>".$row['pquantity']."</td>";
      echo "</tr>";

    
    }
    echo "</table>";
   }
   else
   {
    echo "No data found.<br/>";
   }
mysqli_close($con);   
?>
</div>

<div class="footer">
  <p>Copyright © 2020</p>
</div>

</body>
</html>
