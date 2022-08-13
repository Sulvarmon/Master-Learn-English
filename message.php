<?php

if(isset($_POST['messageBtn'])){
	define('conn', true);
	include('conn.php');

	$message = $_POST['message'];
	$from = $_POST['user'];
	$date = $_POST['date'];

	$sql = "INSERT INTO send_message VALUES(NULL, '$from', '$message', '$date')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
}else{
	header("Location: user.php");
}