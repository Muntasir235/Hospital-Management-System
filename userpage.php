<?php 
	session_start();
	include 'config.php';
	if($db->connect_errno){
		die ("Failed to connect to MySQL :(".$db->connect_errno.")");
	}
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	if (!$_SESSION['is_login']) {
		die('you no see page!');
	}
	if(isset($_POST["submit"]))
	{	
	$pemail=$_SESSION['email'];
	$name=$_POST['sub1'];
	$getinfo = "select email from doctors where name='$name'";
if ($result = $db->query($getinfo)) {    
     while ($row = $result->fetch_object()) {
        $demail=$row->email;
	}
	$date=$_POST["date"];
	$time=$_POST["time"];
	}
	$sql = "SELECT date from appointment WHERE date = '$date'";
$date_check = mysqli_query($db, $sql);
if (mysqli_num_rows($date_check) > 0) {
	alert ("Already Booked");
	}
	$sql3 = "SELECT time from appointment WHERE time = '$time'";
	$time_check = mysqli_query($db, $sql3);
	if (mysqli_num_rows($time_check) > 0) {
		alert ("Already Booked");
		}
	else{
$book= "INSERT INTO appointment (demail, pemail, date, time) VALUES 
('$demail','$pemail','$date','$time')";
$result=$db->query($book);
if ($result) {
alert("all good :)");
}else{
alert ("booking failed :(");
}
}
}

 ?>
<html><head>
	<title>Fix your appointment</title> 
	<head>
<body>
	<div style="text-align: right;"><h4>Hello <?php echo $_SESSION['email']; ?> (<a href="logout.php">Logout</a>)</h4></div>
	<h1>Fix the appointment with your Doctor</h1>
	<p>Name ------ Date ------- Time <p>
	<form action="" method="post">
	<select name="sub1">
	<?php
$sql="SELECT name FROM doctors";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	echo "<option value='".$row['name']."'>".$row['name']."</option>";
}
?>
	</select>
	<input type="date" name="date"/>
	<input type="time" name="time" min="16:00:00" max="20:00:00" step="1200"/>
	<input type="submit" name="submit" value="check available times"/>
	</form>
	
</body>
</html>