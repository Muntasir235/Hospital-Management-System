<?php 
	session_start();
if (!empty($_POST['submit'])) {
		# code...
		include 'config.php';
		$sql = "SELECT * FROM doctors WHERE email='" . $_POST["email"] ."' and password = '". $_POST["passwd"] . "'";
		$result=$db->query($sql);

		// if ($_POST[uname] == 'abul' and $_POST['passwd'] == 'p') {
		if ($row= $result->fetch_assoc()) {
			$_SESSION['is_login'] = true;
			$_SESSION['email'] = $_POST["email"];
			header('Location: doctorpage.php');
			die('passed :)');
		}else{
			echo 'login failed :(';
		}
	}
 ?>
<html>
	<head>
		<title>Log in as a Doctor</title>
	</head>
	<body>
	<h1>Login</h1>
	<form action="" method="POST">
		email: <input type="text" name="email"/><br>
		password: <input type="password" name="passwd"/><br>
		<input type="submit" name="submit"/>
	</form>
	</body>
</html>