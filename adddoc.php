<?php 
	session_start();	
	if (!empty($_POST['submit'])) {
		$email=$_POST["email"];
		include 'config.php';
		function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
		if(!$db){
			echo 'connection error: '.mysqli_connect_error();
			}
			$sql = "select email from doctors where email = '$email'";
			$email_check = mysqli_query($db, $sql);
			if (mysqli_num_rows($email_check) > 0) {
				alert ("Email already exists");
				}
				else{	
        $sql= "INSERT INTO doctors (name, phone, email, password) VALUES 
        ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["password"]."')";
		$result=$db->query($sql);
        
		if ($result) {
			alert('DONE!');
		}
		else{
			alert ('Adding failed :(');
		}
	}
}
 ?>
<html>
	<head>
		<title>Add a Doctor</title>
	</head>
	<body>
	<div style="text-align: right;"><h4>Hello Admin(<a href="logout.php">Logout</a>)</h4> </div>
	<h1>Add</h1>
	<form action="" method="POST">
        name: <input type="text" name="name"/><br>
        phone: <input type="text" name="phone"/><br>
        email: <input type="text" name="email"/><br>
		password: <input type="password" name="password"/><br>
		<input type="submit" name="submit"/>
	</form>
	</body>
</html>