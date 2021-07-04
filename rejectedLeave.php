<html>
<head>
<h1 style="border:4px solid black;  background: linear-gradient(to bottom, #00ffff 0%, #ffffcc 120%);text-align: center;">Rejected Leave</h1>
<hr />
</head>
<body>
<body style="background: linear-gradient(to bottom right, #ff99ff 45%, #ffffcc 100%);"><div style="text-align:center;font-size:110%">
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
</html>

<table id="data-table" class="table table-bordered table-striped">
    <thead>
          <tr>
            <th><center>Staff Number</center></th>
            <th><center>Staff Name</center></th>
            <th><center>Type of Leave</center></th>
            <th><center>Apply Leave Date/Time</center></th>
            <th><center>Start Date</center></th>
            <th><center>End Date</center></th>
            <th><center>Status</center></th>
          </tr>
    </thead>

<?php
include 'session.php';
$sql = "SELECT * FROM apply WHERE status = 'rejected'";
echo "<br>";

$result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
    while($row = $result->fetch_array()){
           echo '
              <tr>
                <td>'.$row["staffNumber"].'</td>
                <td>'.$row["staffName"].'</td>
                <td>'.$row["typeLeave"].'</td>
                <td>'.$row["applyDate"].'</td>
                <td>'.$row["leaveFrom"].'</td>
                <td>'.$row["leaveTo"].'</td>
                <td>'.$row["status"].'</td>
              </tr>
            ';
        }
        echo "</table>";
        mysqli_free_result($result);
} else{ echo "<b><font color='Red'>No Rejected Leave for Staff</font></b>";}
mysqli_close($conn);
?>

<br><br>
<form>
  <input type="button" value="Back" id="back" onclick="location.href ='welcomeAdmin.php'">
</form>