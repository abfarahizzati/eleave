<?php

// php select option value from database

include 'connect.php';

// mysql select query
$query = "SELECT * FROM `adddepartment`";

$result2 = mysqli_query($conn, $query);

$options = "";

while($row2 = mysqli_fetch_array($result2))
{
    $options = $options."<option>$row2[1]</option>";
}
?>

<?php
include 'connect.php';

if(!$conn){
    die ("Conenection Failed: ".mysqli_connect_error());
}

if(isset($_GET["staffNumber"]))
{
    $sql = "INSERT INTO addStaff
    (staffName, staffNumber, email, mobileNumber, password, passwordConfirmation, gender, address, 
    department, workingYear, annualLeaveBalance) 
    VALUES ('".$_GET["staffName"]."','".$_GET["staffNumber"]."','".$_GET["email"]."'
    ,'".$_GET["mobileNumber"]."','".$_GET["password"]."','".$_GET["passwordConfirmation"]."'
    ,'".$_GET["gender"]."','".$_GET["address"]."','".$_GET["department"]."'
    ,'".$_GET["workingYear"]."','".$_GET["annualLeaveBalance"]."')";
    
    
if(mysqli_query($conn,$sql)){
echo "<font color= 'Green'><b>Staff is successfully created. </b></font>";
header("Refresh:0;url=welcomeAdmin.php");
}else{
echo "Error:".$sql."<br>".mysqli_error($conn);
}
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br><br><br><br><br><br>
<center><img src="logo.png" alt="logo al qanaah"></center>
<br><br>

    <body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method ="get">
<div class="wrapper">
    <div class="form">
       <div class="inputfield">
          <label>Name</label>
          <input type="text" class="input" name="staffName" >
       </div>  
       
       <div class="inputfield">
          <label>Staff Number</label>
          <input type="text" placeholder="Must be Unique" class="input" name="staffNumber" >
       </div> 
       
          <div class="inputfield">
          <label>Email</label>
          <input type="text" class="input" name="email">
       </div> 
       
       <div class="inputfield">
          <label>Mobile Number</label>
          <input type="text"  class="input" name="mobileNumber">
       </div> 
       
       <div class="inputfield">
          <label>Password</label>
          <input type="text" class="input" name="password">
       </div> 
       
       <div class="inputfield">
          <label>Confirm Password</label>
          <input type="text" class="input" name="passwordConfirmation">
       </div> 
       
       <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="gender">
              <option value="">Select</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
       </div> 
       
       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address"></textarea>
       </div>

        <div class="inputfield">
          <label>Department</label>
        <div class="custom_select">

        <select name="department">
            <option value=""> Select Department</option>
            <?php echo $options;?>
        </select>
        
        </div>
       </div> 

        <div class="inputfield">
          <label>Work Year</label>
          <input type="number" placeholder="How long you have been working" class="input" name="workingYear" >
       </div> 
        
        <div class="inputfield">
          <label>Annual Leave Balance</label>
          <input type="number" class="input" name="annualLeaveBalance">
       </div> 
        
      <div class="inputfield">
        <input type="submit" value="ADD" class="btn" onclick="location.href='welcomeAdmin.php'">
      </div>

      <center><input type="button" value="BACK" class="button"  onclick="location.href ='welcomeAdmin.php'"></center>
    </div>
</div>  
</body>
</html>