<?php 
	session_start();
	include 'config.php';
	if (!$_SESSION['is_login']) {
		# code...
		die('you no see page!');
	}
 ?>
<html><head>
	<title>See your appointments</title> 
	<head>
<body>
	<div style="text-align: right;"><h4>Hello <?php echo $_SESSION['email']; ?> (<a href="logout.php">Logout</a>)</h4></div>
<?php
$em=$_SESSION['email'];
//echo (date("Y-m-d"));
$sql="SELECT * FROM appointment WHERE demail='$em' AND date>=CURDATE() AND time>CURTIME()"; 
$result = $db->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	echo " Patient email ID   -   Date   -    Time"."<br>";
	while($row = $result->fetch_assoc()) {
			echo $row["pemail"]. "  -  " . $row["date"]. "  -  " . $row["time"]."<br>";
	}
} else {
	echo "0 Appointments";
}
?>
</body>
</html>