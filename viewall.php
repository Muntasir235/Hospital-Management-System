<?php 
	session_start();
	include 'config.php';
 ?>
<html><head>
	<title>See all appointments</title> 
	<head>
<body>
	<div style="text-align: right;"><h4>Hello Admin (<a href="logout.php">Logout</a>)</h4></div>
<?php
$sql="SELECT * FROM appointment"; 
$result = $db->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	echo "Doctor email   ---   Patient email   ---   Date   ---    Time"."<br>";
	while($row = $result->fetch_assoc()) {
			echo $row["demail"]. "  ---  " . $row["pemail"]. "  ---  " . $row["date"]. "  ---  " . $row["time"]."<br>";
	}
} else {
	echo "0 results";
}
?>
</body>
</html>