<?php 
	session_start();	
	if (!empty($_POST['submit'])) {
		# code...
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
					$sql= "DELETE from users where email='".$_POST["email"]."'";
					$result=$db->query($sql);
					if ($result) {
						alert('DELETED!');
					}else{
						alert ('Delete failed :(');
					}
				}
				else{
				alert("User not available");
				}
	}
 ?>
<html>
	<head>
		<title>Delete an User</title>
	</head>
	<body>
	<h1>Delete</h1>
	<form action="" method="POST">
        email: <input type="text" name="email"/><br>
		<input type="submit" name="submit"/>
	</form>
	</body>
</html>