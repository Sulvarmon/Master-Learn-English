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
            mysqli_close($conn);
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
        case 'EGTop10WithTime5min':
            $EGTop10WithTime5min = array();

            $sql = "SELECT * FROM user ORDER BY e_g_points_5min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($EGTop10WithTime5min, $row);
                }
            }

            echo json_encode($EGTop10WithTime5min);
            break;
        case 'EGTop10WithTime3min':
            $EGTop10WithTime3min = array();

            $sql = "SELECT * FROM user ORDER BY e_g_points_3min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($EGTop10WithTime3min, $row);
                }
            }

            echo json_encode($EGTop10WithTime3min);
            break;
        case 'EGTop10WithTime1min':
            $EGTop10WithTime1min = array();

            $sql = "SELECT * FROM user ORDER BY e_g_points_1min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($EGTop10WithTime1min, $row);
                }
            }

            echo json_encode($EGTop10WithTime1min);
            break;
        case 'GETop10WithTime5min':
            $GETop10WithTime5min = array();

            $sql = "SELECT * FROM user ORDER BY g_e_points_5min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($GETop10WithTime5min, $row);
                }
            }

            echo json_encode($GETop10WithTime5min);
            break;
        case 'GETop10WithTime3min':
            $GETop10WithTime3min = array();

            $sql = "SELECT * FROM user ORDER BY g_e_points_3min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($GETop10WithTime3min, $row);
                }
            }

            echo json_encode($GETop10WithTime3min);
            break;
        case 'GETop10WithTime1min':
            $GETop10WithTime1min = array();

            $sql = "SELECT * FROM user ORDER BY g_e_points_1min DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($GETop10WithTime1min, $row);
                }
            }

            echo json_encode($GETop10WithTime1min);
            break;
        case 'quizEG':
            $quizEG = array();

            $sql = "SELECT * FROM quiz_points ORDER BY e_g_points DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($quizEG, $row);
                }
            }

            echo json_encode($quizEG);
            break;
        case 'quizGE':
            $quizGE = array();

            $sql = "SELECT * FROM quiz_points ORDER BY g_e_points DESC";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($quizGE, $row);
                }
            }

            echo json_encode($quizGE);
            break;
        case 'friends':
            $friends = array();

            $sql = "SELECT * FROM friends";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($friends, $row);
                }
            }

            echo json_encode($friends);
            break;
        case 'requests':
            $reqRent = array();

            $sql = "SELECT * FROM friend_req";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($reqRent, $row);
                }
            }

            echo json_encode($reqRent);
            break;
        case 'dictionary':
            $reqRent = array();

            $sql = "SELECT * FROM dictionary";
            $query = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($query) > 0){
                while($row = mysqli_fetch_assoc($query)){
                    array_push($reqRent, $row);
                }
            }

            echo json_encode($reqRent);
            break;
        default:
            # code...
            break;
    }
}else{
	header("Location: user.php");
}