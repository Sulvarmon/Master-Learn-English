<?php 

if(false){
	define("conn", true);
	include("./conn.php");

 	$usersArray = array();

	$sql = "SELECT * FROM user";
	$query = mysqli_query($conn, $sql);

	if(mysqli_num_rows($query) > 0){
	    while($row = mysqli_fetch_assoc($query)){
	        array_push($usersArray, $row);
	    }
	}


	for ($i=0; $i < sizeof($usersArray) ; $i++) {
		$user = $usersArray[$i]['username'];
		$sql = "INSERT INTO event_points VALUES(NULL, '$user',0,0,0,0,0)";
		mysqli_query($conn, $sql);
	}

}else{
	exit("No Access");
}