<?php

if(isset($_POST['userImgBtn'])){
    session_start();
	define("conn", true);
	include("./conn.php");

	$user = $_SESSION["user"];
    $usersImg = array();

    $sql = "SELECT * FROM user_images";
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            array_push($usersImg, $row);
        }
    }

    for ($i=0; $i <sizeof($usersImg) ; $i++) { 
        if($user == $usersImg[$i]["user"]){
            echo $usersImg[$i]["img"];
            mysqli_close($conn);
            exit();
        }
    }
    mysqli_close($conn);
}else{
    header("Location: user.php");
}