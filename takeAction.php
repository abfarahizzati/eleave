<html>
<head>
<h1 style="border:4px solid black; background: linear-gradient(to bottom, #66ff66 0%, #ffffcc 120%);text-align: center;">Take Action</h1>
<hr />
</head>
<body>
<body style="background: linear-gradient(to bottom right, #ccffcc 45%, #ffff66 100%);">
<div style="text-align:center;font-size:110%">
<style>
table {
    width:95%;
}
table, th, td {
    border: 1px solid grey;
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
</style>
<body>
<body style="background-color:rgb(204,204,255);">

</body>
</html>
<?php
include 'connect.php';
$id =$_GET['id'];
$sql1 = "SELECT staffNumber, staffName, department, typeLeave, leaveFrom, leaveTo, period, status, applyDate
	FROM apply
		where id= '$id'";
$result = $conn->query($sql1);
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
		while($row = $result->fetch_array()){           
				echo "<br>Staff Number :<b>" . $row['staffNumber']."</b>" ;
				echo "<br>Staff Name :<b>" . $row['staffName']."</b>";
				echo "<br>Department :<b>" . $row['department']."</b>" ;

			echo "<tr>";
				echo "<th>Type Leave</th>";
                echo "<td>" . $row['typeLeave'] . "</td>";
            echo "</tr>";
			
			echo "<tr>";
				echo "<th>Apply Date/Time</th>";
                echo "<td>" . $row['applyDate'] . "</td>";
            echo "</tr>";

            echo "<tr>";
				echo "<th>Leave From</th>";
                echo "<td>" . $row['leaveFrom'] . "</td>";
            echo "</tr>";

            echo "<tr>";
				echo "<th>Leave To</th>";
                echo "<td>" . $row['leaveTo'] . "</td>";
            echo "</tr>";

            echo "<tr>";
				echo "<th>Period</th>";
                echo "<td>" . $row['period'] . "</td>";
            echo "</tr>";

				if($row['status']== "Rejected")
				{echo "<br>Current Status :<b><span style='background-color: Red';>" .$row['status']."</span></b><br><br>";}
				else if($row['status']== "Approved")				
				{echo "<br>Current Status :<b><span style='background-color: springgreen';>" .$row['status']."</span></b><br><br>";}
				else if($row['status']== "Pending")				
				{echo "<br>Current Status :<b><span style='background-color: gold';>" .$row['status']."</span></b><br><br>";}

			}
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    
} 
mysqli_close($conn);
?>
<br><br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
<input type="hidden" name="id"value="<?php echo $id; ?>">
<select name="status"> 
  <option value="Approved"selected>Approved</option> 
  <option value="Rejected">Rejected</option>
  <option value="Pending">Pending</option>
</select>  
<br><br> 

<input type="submit" name="Response" value="Response"></p>



</form><br>
<?php
include 'connect.php';
if(isset($_GET['Response'])){
		$id = $_GET['id'];
		$status = $_GET['status'];
	
	$sql2 = "UPDATE apply SET status = '$status'
	WHERE id = '$id'";
	if($conn->query($sql2)){
		mysqli_close($conn);
		echo "<div style='text-align:center;font-size:110%'><span style='background-color: springgreen';><b>Leave has been Responsed</b></span></div>";
		header("Refresh:0;url=pendingLeave.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>

<form>
  <input type="button" value="Back" onclick="location.href ='pendingLeave.php'">
</form>