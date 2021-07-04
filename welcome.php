<?php
include 'session.php';

$login_session = $row['staffNumber'];
$sql = "SELECT * FROM addstaff WHERE staffNumber = '$login_session'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$staffNumber = $row['staffNumber'];
	$staffName = $row['staffName'];
	$department = $row['department'];
	}
mysqli_close($conn);
?>

 <p span class="dot" onclick="location.href ='logout.php'">Sign Out</p>
 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: 'EB Garamond', serif;
  background: url('background5.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;
}

.sidenav {
  height: 100%;
  width: 180px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 15px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="apply.php">Apply Leave</a>
  <a href="leaveHistory.php">Leave History</a>
  <a href="logout.php">Sign Out</a>
</div>

<div class="main">

<center>Welcome <?php echo $staffNumber; ?></center>
<center><br><?php echo $staffName; ?></center>
<center><br><?php echo $department; ?></center>

</div>
   
</body>
</html> 

