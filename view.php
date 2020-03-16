<?php
session_start();
$userName=$_SESSION['userName'];
$name=$_SESSION['name'];
if(!isset($_SESSION['userName']))
{
  header("Location:login.php");
}
?>

<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  grid-area: header;
  background-color: #E98C53;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas: 
    'header header header header header header' 
    'left middle middle middle middle middle' 
    'footer footer footer footer footer footer';
  /* grid-column-gap: 10px; - if you want gap between the columns */
} 

.left,
.middle,
.right {
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Style the left column */
.left {
  grid-area: left;
}

/* Style the middle column */
.middle {
  grid-area: middle;
}

/* Style the right column */
.right {
  grid-area: right;
}

/* Style the footer */
.footer {
  grid-area: footer;
  background-color: #85C1E9;
  padding: 10px;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

</style>
</head>
<body>


<div class="grid-container">
  <div class="header">
    <h2 style="color: #2E4053"; align="left">XCompany  <?php
    $name=$_SESSION['name'];
    ?></h2>
   
  </div>
  
  <div class="left" style="background-color:#aaa;">
  <ul>

  <li><a href="nhome.php">Dashboard</a></li>
  <li><a href="view.php?userName=<?php echo $userName; ?>">View Profile</a></li>
  <li><a href="edit.php">Edit Profile</a></li>
  <li><a href="changepic.php">Change Profile Picture</a></li>
  <li><a href="changepass.php">Change Password</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>  
  </div>
  <div class="middle" style="background-color:#bbb;">
    <?php
    $con=mysqli_connect("localhost","root","","testdb");
  if(!$con)
  {
    die("Connection Error: ".mysqli_connect_error()."<br/>");
  }
    $sql="SELECT * FROM customers WHERE userName='$userName'";
    $result=mysqli_query($con,$sql);	
    if(mysqli_num_rows($result)>0)
    {
      ($row=mysqli_fetch_array($result));
      $image=$row["picture"];
  	  {
        echo "<h4>Profie</h4>";?>
        <img src="<?php echo $image;?>" height="80" width="80" />
        <?php        
        echo "<table>";
        echo "<tr>";
        echo "<td> Name </td>";
        echo "<td>".$row["name"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Email </td>";
        echo "<td>".$row["email"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Gender </td>";
        echo "<td>".$row["gender"]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Date of Birth </td>";
        echo "<td>".$row["dob"]."</td>";
        echo "</tr>";
        echo "</table>";
	    }
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
</div>
</body>
</html>
