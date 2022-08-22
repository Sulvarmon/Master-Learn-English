<?php

if(isset($_POST['messengerBtn'])){
	define('conn', true);
	include('conn.php');
	
	switch ($_POST['messengerBtn']) {
		case 'create_chat':
			$user = $_POST['user'];
			$otherUser = $_POST['otherUser'];
			$time = $_POST['time'];
			$msg = $_POST['msg'];

			$sql = "INSERT INTO messages VALUES(NULL, '$user', '$otherUser', '$msg', '$time', 'No')";
			mysqli_query($conn,$sql);
			mysqli_close($conn);
			break;
		case 'delete_chat':
			$user = $_POST['user'];
			$otherUser = $_POST['otherUser'];

		 	$array = array();

			$sql = "SELECT * FROM messages";
			$query = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query) > 0){
			    while($row = mysqli_fetch_assoc($query)){
			        array_push($array, $row);
			    }
			}


			for ($i=0; $i <sizeof($array) ; $i++) {
				if($array[$i]['sender'] == $user && $array[$i]['receiver'] == $otherUser){
					if($array[$i]['delete_chat'] == 'No'){						
						$id = $array[$i]['id'];
						$sql = "UPDATE messages SET delete_chat = '$user-$otherUser' WHERE id = '$id' ";
						mysqli_query($conn,$sql);
					}else{
						$sql = "DELETE from messages WHERE sender = '$user' AND receiver = '$otherUser'";
						mysqli_query($conn,$sql);
					}
					
				}
				if($array[$i]['receiver'] == $user && $array[$i]['sender'] == $otherUser){
					if($array[$i]['delete_chat'] == 'No'){
						$id = $array[$i]['id'];
						$sql = "UPDATE messages SET delete_chat = '$user-$otherUser' WHERE id = '$id' ";
						mysqli_query($conn,$sql);					
					}else{
						$sql = "DELETE from messages WHERE sender = '$otherUser' AND receiver = '$user'";
						mysqli_query($conn,$sql);
					}
				}
			}
			mysqli_close($conn);
			break;
		case 'recover_chat':
			$user = $_POST['user'];
			$otherUser = $_POST['otherUser'];
			$sql = "UPDATE messages SET delete_chat = 'No' WHERE sender = '$user' AND receiver = '$otherUser' ";
			mysqli_query($conn,$sql);
			$sql = "UPDATE messages SET delete_chat = 'No' WHERE receiver = '$user' AND sender = '$otherUser' ";
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