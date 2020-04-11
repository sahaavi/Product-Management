<?php
  define('ROOT_URL','');
?>

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
  
  
$host = "ec2-23-20-129-146.compute-1.amazonaws.com";
$user = "dbdzapnpxswjbh";
$password = "c255e2dd4c81dc6e33fbc6aa0712196d5ccfa0b435f473f3f030453922ef026c";
$dbname = "dciu654g9veev0";
$port = "5432";

try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
 

  $sql="SELECT * FROM products";
  $stmt= $pdo->prepare($sql);
  $stmt->execute();
  $result= $stmt->rowCount();
  
  if($result>0)
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
    while( $row= $stmt->fetch())
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
?>
</div>

<div class="footer">
  <p>Copyright © 2020</p>
</div>

</body>
</html>
