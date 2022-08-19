<?php

if(isset($_POST['messengerBtn'])){
	define('conn', true);
	include('conn.php');

	$user = $_POST['user'];
	$otherUser = $_POST['otherUser'];
	$time = $_POST['time'];
	$msg = $_POST['msg'];

	$sql = "INSERT INTO messages VALUES(NULL, '$user', '$otherUser', '$msg', '$time')";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
}else{
	header("Location: user.php");
}