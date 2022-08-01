<?php

if(isset($_POST['friendsPageBtn'])){
	define("conn", true);
	include("./conn.php");

    $friendsPageBtn = $_POST['friendsPageBtn'];
    $user = $_POST['user'];
    $friend = $_POST['friend'];

    switch ($friendsPageBtn) {
        case 'unfriend':
            $sql = "DELETE FROM friends WHERE user_name = '$user' AND friend_name = '$friend' ";
            mysqli_query($conn,$sql);
            $sql = "DELETE FROM friends WHERE user_name = '$friend' AND friend_name = '$user' ";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            break;
        case 'send_req':
            $sql = "INSERT INTO friend_req VALUES(NULL, '$friend', '$user') ";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            break;
        case 'unsend':
            $sql = "DELETE FROM friend_req WHERE user_name = '$friend' AND friend_name = '$user' ";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            break;
        case 'addFriend':
            $sql = "INSERT INTO friends VALUES(NULL, '$user', '$friend') ";
            mysqli_query($conn,$sql);
            $sql = "INSERT INTO friends VALUES(NULL, '$friend', '$user') ";
            mysqli_query($conn,$sql);
            $sql = "DELETE FROM friend_req WHERE user_name = '$user' AND friend_name = '$friend' ";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            break;
        case 'rejFriend':
            $sql = "DELETE FROM friend_req WHERE user_name = '$user' AND friend_name = '$friend' ";
            mysqli_query($conn,$sql);
            mysqli_close($conn);
            break;
                 
            
        default:
            # code...
            break;
    }
}else{
	header("Location: user.php");
}
