<?php

if(isset($_POST['arraysBtn'])){
    define("conn", true);
	include("./conn.php");

    $arrayBtn = $_POST["arraysBtn"];

    switch ($arrayBtn) {
        case 'users_array':
            $usersArray = array();
            $sql = "SELECT * FROM user";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($usersArray, $row);
                }
            }

            echo json_encode($usersArray);
            break;
        case 'user_imgs_array':
            $userImgsArray = array();
            $sql = "SELECT * FROM user_images";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($userImgsArray, $row);
                }
            }

            echo json_encode($userImgsArray);
            break;
        case 'EGTop10NoTime':
            $EGTop10NoTimeArray = array();

            $sql = "SELECT * FROM user ORDER BY e_g_points DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($EGTop10NoTimeArray, $row);
                }
            }

            echo json_encode($EGTop10NoTimeArray);
            break;
        case 'GETop10NoTime':
            $GETop10NoTimeArray = array();

            $sql = "SELECT * FROM user ORDER BY g_e_points DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($GETop10NoTimeArray, $row);
                }
            }

            echo json_encode($GETop10NoTimeArray);
            break;
            
        default:
            # code...
            break;
    }
}else{
	header("Location: user.php");
}