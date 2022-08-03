<?php

if(isset($_POST['pointsBtn'])){
	define("conn", true);
	include("./conn.php");

    $pointsBtn = $_POST['pointsBtn'];
    $point = $_POST['point'];
    $user = $_POST['user'];
	
    $usersArray = array();
    $quizArray = array();

    switch ($pointsBtn) {
        case 'e_g_no_time':
            $sql = "UPDATE user SET e_g_points = '$point' WHERE username = '$user'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            break;
        case 'g_e_no_time':
            $sql = "UPDATE user SET g_e_points = '$point' WHERE username = '$user'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            break;
            
        default:
            # code...
            break;
    }
	
}else{
	header("Location: user.php");
}