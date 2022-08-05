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
        case 'e_g_with_time':
            $timeControl = $_POST['timeControl'];
            switch ($timeControl) {
                case 0:
                    $sql = "UPDATE user SET e_g_points_5min = '$point' WHERE username = '$user' AND  e_g_points_5min < $point ";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                case 1:
                    $sql = "UPDATE user SET e_g_points_3min = '$point' WHERE username = '$user' AND  e_g_points_3min < $point ";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                case 2:
                    $sql = "UPDATE user SET e_g_points_1min = '$point' WHERE username = '$user' AND  e_g_points_1min < $point ";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                default:
                    # code...
                    break;
            }            
            break;
        case 'g_e_with_time':
            $timeControl = $_POST['timeControl'];
            switch ($timeControl) {
                case 0:
                    $sql = "UPDATE user SET g_e_points_5min = '$point' WHERE username = '$user' AND  g_e_points_5min < $point";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                case 1:
                    $sql = "UPDATE user SET g_e_points_3min = '$point' WHERE username = '$user' AND  g_e_points_3min < $point";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                case 2:
                    $sql = "UPDATE user SET g_e_points_1min = '$point' WHERE username = '$user' AND  g_e_points_1min < $point";
                    mysqli_query($conn, $sql);
                    mysqli_close($conn);
                    break;
                default:
                    # code...
                    break;
            }            
            break;
        case 'e_g_quiz':
            $point = $_POST["point"];
            $user = $_POST["user"];
            $sql = "UPDATE quiz_points SET e_g_points = '$point' WHERE user = '$user'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            break;
        case 'g_e_quiz':
            $point = $_POST["point"];
            $user = $_POST["user"];
            $sql = "UPDATE quiz_points SET g_e_points = '$point' WHERE user = '$user'";
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