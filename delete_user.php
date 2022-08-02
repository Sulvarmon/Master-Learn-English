<?php
	if(isset($_POST['deleteUserBtn'])){
		define("conn", true);
		include("conn.php");
		session_start();
		$user = $_SESSION['user'];
		$sql = "DELETE FROM user WHERE username = '$user'";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM user_images WHERE user = '$user'";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM send_message WHERE msg_from = '$user'";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM quiz_points WHERE user = '$user'";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM friend_req WHERE user_name = '$user' OR friend_name = '$user' ";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM friends WHERE user_name = '$user' ";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM friends WHERE friend_name = '$user' ";
		mysqli_query($conn, $sql);
        $sql = "DELETE FROM event_points WHERE user = '$user' ";
		mysqli_query($conn, $sql);
		session_unset();
		session_destroy();
		mysqli_close($conn);
	}else{
		header('Location: user.php');
	}
?>