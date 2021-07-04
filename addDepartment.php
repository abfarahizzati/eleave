<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Apply Leave Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<br><br><br><br><br><br>
<center><img src="logo.png" alt="logo al qanaah"></center>
<br><br>

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

<input type="hidden" name="Current_ID" value="<?php echo $id1; ?>"><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<div class="wrapper">
    <div class="title">
      ADD DEPARTMENT
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Department</label>
          <input type="text"  class="input" name="department">
       </div>  
		
      <div class="inputfield">
        <input type="submit" name ="submit" value="SUBMIT" class="btn">
      </div>
	  
	 <center><input type="button" value="BACK" id="button"  onclick="location.href ='welcomeAdmin.php'"></center>
    </div>
</div>	
</form>
</body>
</html>

<?php

include 'connect.php';
if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}

if(isset($_GET["submit"]))
{
	$sql="INSERT INTO adddepartment(department) VALUES
	('".$_GET["department"]."')";
	
if (mysqli_query($conn, $sql)){
echo "<div style='text-align:center;font-size:110%'><span style='background-color: springgreen';><b> Record has been successfully save.</b></span></div>";
header("Refresh:1;url=welcomeAdmin.php");
}else{
echo "Error:".$sql."<br>".mysqli_error($conn);
}
}
mysqli_close($conn);
?>
