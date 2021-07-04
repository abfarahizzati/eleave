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
      APPLY LEAVE FORM
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Name</label>
          <input type="text"  class="input" name=" staffName" value="<?php echo $staffName; ?>" readonly>
       </div>  
	   
	   <div class="inputfield">
          <label>Staff Number</label>
          <input type="text" class="input" name="staffNumber" value="<?php echo $staffNumber; ?>"readonly>
       </div> 

		<div class="inputfield">
          <label>Department</label>
		  <input type="text"  class="input" name="department" value="<?php echo $department; ?>" readonly>
		 <br>
     
       </div>
         
        <div class="inputfield">
          <label>Type of Leave</label>
          <div class="custom_select">
            <select name = "typeLeave" >
              <option value="">Select</option>
              <option value="Annual">Annual</option>
              <option value="Replacement">Replacement</option>
			  <option value="No pay">No pay</option>
			  <option value="Study">Study</option>
			  <option value="Compasionate">Compasionate </option>
			  <option value="Maternity">Maternity</option>
			  <option value="Paternity">Paternity</option>
			  <option value="Haji">Haji</option>
            </select>
          </div>
       </div> 
	   
	   <div class="inputfield">
		<label>Leave Date (From)</label>
		 <div class="choose">
		  <input type= "date" name="leaveFrom" style="position: relative ; width: 100% ; height: 37px">
		  </div>
		</div>
		
		<div class="inputfield">
		 <label>Leave Date (To)</label>
		  <div class="choose">
		   <input type= "date" name="leaveTo" style="position: relative ; width: 100% ; height: 37px">
		  </div>
		</div>
		
		<div class="inputfield">
		 <label>Period</label>
			<input type="number" name="period" placeholder="How many days ?" class="input">
		</div>

		<div class="inputfield">
			<input type="hidden" name="status" value="Pending" >
		</div>

		<div class="inputfield">
			<input type="hidden" name="applyDate"value="<?php date_default_timezone_set('asia/kuala_lumpur');echo date("Y-m-d h:i:sa");?>"readonly><br><br>
		</div>
		
      <div class="inputfield">
        <input type="submit" name ="submit" value="SUBMIT" class="btn">
      </div>
	  
	 <center><input type="button" value="BACK" id="button"  onclick="location.href ='welcome.php'"></center>
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
	$sql="INSERT INTO apply(staffName, staffNumber, department, typeLeave, leaveFrom, leaveTo, period, status, applyDate) VALUES
	('".$_GET["staffName"]."', '".$_GET["staffNumber"]."', '".$_GET["department"]."', '".$_GET["typeLeave"]."', '".$_GET["leaveFrom"]."', '".$_GET["leaveTo"]."', '".$_GET["period"]."', '".$_GET["status"]."', '".$_GET["applyDate"]."')";
	
if (mysqli_query($conn, $sql)){
echo "<div style='text-align:center;font-size:110%'><span style='background-color: springgreen';><b> Record has been successfully save.</b></span></div>";
header("Refresh:1;url=welcome.php");
}else{
echo "Error:".$sql."<br>".mysqli_error($conn);
}
}
mysqli_close($conn);
?>
