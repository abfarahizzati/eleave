<html>
<head>
<h1 style="border:4px solid black;  background: #79a6d2;text-align: center;">Leave History</h1>
<hr />
</head>
<body>
<body style="background: #ecf2f9"><div style="text-align:center;font-size:110%">
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
  background-color: #132639;
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
</html>

<?php
include 'session.php';

$login_session = $row['staffNumber'];
$sql = "SELECT * FROM apply WHERE staffNumber = '$login_session'";
$result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
        echo "<th>Type Leave</th>";
        echo "<th>Start Leave</th>";
        echo "<th>End Leave</th>";
        echo "<th>Period</th>";
        echo "<th>Status</th>";
            echo "</tr>"; 
    while($row = $result->fetch_array()){
            echo "<tr>";
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
} else{ echo "<b><font color='Red'>You have no Leave </font></b>";}
mysqli_close($conn);

?>


<br><br>
<form>
  <input type="button" value="Back" id="back" onclick="location.href ='welcome.php'">
</form></div>