<?php 
	session_start();
	include 'admininfo.php';
if (!empty($_POST['submit'])) {
$name = $_POST["name"];
$pass = $_POST["passwd"];
if(strcmp($name,$adn)==0){
    if(strcmp($pass,$adp)==0){
        header('Location: adminpage.php');
	}
	else{
		echo "Go Away you fraud !!!";
		}
}
    else{
    echo "Go Away you fraud !!!";
    }
}
?>
<html>
	<head>
		<title>Log in Dear Admin</title>
	</head>
	<body>
	<h1>Login</h1>
	<form action="" method="POST">
		name: <input type="text" name="name"/><br>
		password: <input type="password" name="passwd"/><br>
		<input type="submit" name="submit"/>
	</form>
	</body>
</html>