<?php 
$db = new mysqli('localhost','root','','clinic');

if($db->connect_errno){
		echo "Failed to connect to MySQL :(".$db->connect_errno.")";
	}
 ?>