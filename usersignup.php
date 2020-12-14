<?php 
	session_start();	
	if (!empty($_POST['submit'])) {
		include 'config.php';
		$email=$_POST["email"];
		function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
		if(!$db){
			echo 'connection error: '.mysqli_connect_error();
			}
			$sql = "select email from users where email = '$email'";
			$email_check = mysqli_query($db, $sql);
			if (mysqli_num_rows($email_check) > 0) {
				alert ("Email already exists");
				}
				else{			
        $sql= "INSERT INTO users (name, city, gender, phone, email, password) VALUES 
        ('".$_POST["name"]."','".$_POST["city"]."','".$_POST["gender"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["password"]."')";
		$result=$db->query($sql);
		if ($result) {
			die('all good :) <br>goto login page: <a href="user-login.php">Login page</a>');
		}else{
			echo 'signup failed :(';
		}
	}
}
 ?>
<html>
	<head>
		<title>Sign Up as an User</title>
	</head>
	<body>
	<h1>signup</h1>

	<form action="" method="POST">
        username: <input type="text" name="name"/><br>
        city: <input type="text" name="city"/><br>
        gender: <input type="text" name="gender"/><br>
        phone: <input type="text" name="phone"/><br>
        email: <input type="text" name="email"/><br>
		password: <input type="password" name="password"/><br>
		<input type="submit" name="submit"/>
	</form>
	</body>
</html>