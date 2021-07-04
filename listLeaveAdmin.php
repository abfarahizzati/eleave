<html>
<head>
<h1 style="border:4px solid black; background: linear-gradient(to bottom, #66ff66 0%, #ffffcc 120%);text-align: center;">List Leave Apply</h1>
<hr />
</head>
<body>
<body style="background: linear-gradient(to bottom right, #ccccff 0%, #ffcccc 90%);">
<div style="text-align:center;font-size:110%">
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: center;
}
table tr:nth-child(even) {
    background-color: #eee;
}
table tr:nth-child(odd) {
   background-color:#fff;
}
table th {
    background-color: black;
    color: white;
}

#back{
  background-color: #000000;
  border: none;
  color: white;
  padding: 15px 72px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
  border-radius: 10px;
  margin: 0;
  position: center;
}

</style>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<select name="column"> 
  <option value="staffNumber"selected>Staff Number</option> 
  <option value="staffName" >Staff Name</option>
  <option value="department">Department</option>
  <option value="status">Apply Date</option>
  <option value="typeLeave">Type Leave</option>
  <option value="leaveFrom">Start Date</option>
  <option value="leaveTo">End Date</option>
  <option value="period">Period</option>
  <option value="status">Status</option>
</select>
<input type="submit" name="Search">
</form>
</body>
</html>

<?php
include 'connect.php';
if(isset($_GET['Search'])){
    $sort= $_GET['column'];
$sql = "SELECT * FROM apply ORDER BY $sort";

$result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Staff Number</th>";
                echo "<th>Staff Name</th>";
                echo "<th>Department</th>";
                echo "<th>Date Apply Leave</th>";
                echo "<th>Type of Leave</th>";
                echo "<th>Leave From</th>";
                echo "<th>Leave To</th>";
                echo "<th>Period</th>";
                echo "<th>Status</th>";
            echo "</tr>";   
        while($row = $result->fetch_array()){
            echo "<tr>";
        echo "<td>" . $row['staffNumber'] . "</td>";
        echo "<td>" . $row['staffName'] . "</td>";
        echo "<td>" . $row['department'] . "</td>";
        echo "<td>" . $row['applyDate'] . "</td>";
        echo "<td>" . $row['typeLeave'] . "</td>";
        echo "<td>" . $row['leaveFrom'] . "</td>";
        echo "<td>" . $row['leaveTo'] . "</td>";
        echo "<td>" . $row['period'] . "</td>";
        if($row['status']== "Rejected")
        {echo "<td><b><span style='background-color: Red';>" .$row['status']."</span></b></td>";}
        else if($row['status']== "Approved")
        {echo "<td><b><span style='background-color: SpringGreen';>" .$row['status']."</span></b></td>";}
      else if($row['status']== "Pending")
        {echo "<td><b><span style='background-color: Gold';>" .$row['status']."</span></b></td>";}
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "<b><font color='Red'> Database is empty</font></b>";
    }
} 
mysqli_close($conn);

?>
<br><br>
<form>
  <input type="button" value="Back" id="back" onclick="location.href ='welcomeAdmin.php'">
</form></div>