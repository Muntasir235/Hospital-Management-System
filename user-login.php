<?php 
	session_start();
if (!empty($_POST['submit'])) {
		# code...
		include 'config.php';
		$sql = "SELECT * FROM users WHERE email='" . $_POST["email"] ."' and password = '". $_POST["passwd"] . "'";
        $result=$db->query($sql);
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
		if ($row= $result->fetch_assoc()) {
			$_SESSION['is_login'] = true;
			$_SESSION['email'] = $_POST["email"];
			header('Location: userpage.php');
			die('passed :)');
        }
        else{
                alert ('Wrong info :(');
            }
	}
 ?>
<html>
	<head>
		<title>Log in as an User</title>
	</head>
	<body>
	<h1>Login</h1>
	<form action="" method="POST">
		email: <input type="text" name="email"/><br>
		password: <input type="password" name="passwd"/><br>
		<input type="submit" name="submit"/>
	</form>
	or <a href="usersignup.php">Signup</a>
	</body>
</html>