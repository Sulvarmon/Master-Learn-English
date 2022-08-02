<?php

if(isset($_POST['loginInitials'])){
	define("conn", true);
	include("./conn.php");

	$user = $_POST['username'];
	$salt = "askhdjfdgFSDFjsdfg3243F";
    $password = $_POST["password"].$salt;
    $password = sha1($password);
    $usersArray = array();

    $sql = "SELECT * FROM user";
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            array_push($usersArray, $row);
        }
    }

	for($i=0;$i<sizeof($usersArray);$i++){
		if($usersArray[$i]['username'] == $user and $usersArray[$i]['password'] == $password){
            session_start();
			$_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
			echo "111";
            mysqli_close($conn);
			exit();	
		}
	}
	 
    echo "999";

	mysqli_close($conn);
}else{
	header("Location: user.php");
}