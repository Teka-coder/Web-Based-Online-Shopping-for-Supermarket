<?php
	$server = "localhost";
	$userName = "root";
	$password = "";
	//$database = "db_shop";
	
	$con = mysqli_connect($server, $userName, $password);
	if(!$con){
		echo "Error : ".mysqli_error();
		return;
	}
	$db = mysqli_select_db($con,'db_shop');
	if(!$db){
		echo "Error : ".mysqli_error();
		return;
	}
	
	
?>