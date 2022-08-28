<?php

if(isset($_POST['messengerBtn'])){
	define('conn', true);
	include('conn.php');
	
	switch ($_POST['messengerBtn']) {
		case 'create_chat':
			$user = $_POST['user'];
			$chatWith = $_POST['chatWith'];
			$time = $_POST['time'];
			$msg = $_POST['msg'];

			$sql = "INSERT INTO messages VALUES(NULL, '$user', '$chatWith', '$msg', 'no', 'no', '$time')";
			mysqli_query($conn,$sql);
			$sql = "INSERT INTO chats VALUES(NULL, '$user', '$chatWith', '$no', 'no')";
			mysqli_query($conn,$sql);
			mysqli_close($conn);
			break;
		case 'send_message':
			$user = $_POST['user'];
			$chatWith = $_POST['chatWith'];
			$time = $_POST['time'];
			$msg = $_POST['msg'];

			$sql = "INSERT INTO messages VALUES(NULL, '$user', '$chatWith', '$msg', 'no', 'no', '$time')";
			mysqli_query($conn,$sql);
			mysqli_close($conn);
			break;
		default:
			// code...
			break;
	}

	

	
}else{
	header("Location: user.php");
}