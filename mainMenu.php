<?php
include 'connect.php';
$id = $_GET['staffNumber'];
echo "<p align='left'><i><b> <font size='2pt'>Welcome back, <span style='background-color: #ff66ff';>< $id ></span> </font></i></b> </p>";

?>

<?php
include 'connect.php';

$id1 = $_GET['staffNumber'];
$sql = "SELECT * FROM addstaff WHERE staffNumber = '$id1'";
$result = $conn->query($sql);

while($row = $result->fetch_array()){
	$staffName = $row['staffName'];
	$staffNumber = $row['staffNumber'];
	$department = $row['department'];
	}
mysqli_close($conn);
?>

<?php
echo "<p align='left'><i><b> <font size='3pt'>Name: $staffName </span> </font></i></b> </p>";
?>
<?php 
echo "<p align='left'><i><b> <font size='3pt'>Position: $department </span> </font></i></b> </p>";
?>

 <br> <input type="button" value="Apply"  onclick="location.href ='apply.php?staffNumber=<?=$id?>'">