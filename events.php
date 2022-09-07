<?php


if(isset($_POST['eventBtn'])){
	$event = $_POST['eventBtn'];
	switch ($event) {
		case 'get_events':		
			$eventsArray = array(
							array(
								"name"=>"Event1",
			 					"sDate"=>date('M/d/Y h:i', strtotime('08/20/2022 22:00')),
			  					"eDate"=>date('M/d/Y h:i', strtotime('09/20/2022 22:00')),
								"showDailyTable"=>1
		  					),
							array(
								"name"=>"Event2",
			 					"sDate"=>date('M/d/Y h:i', strtotime('08/21/2022 22:00')),
			  					"eDate"=>date('M/d/Y h:i', strtotime('09/21/2022 22:00')),
		  					),
							array(
								"name"=>"Event3",
			 					"sDate"=>date('M/d/Y h:i', strtotime('08/22/2022 22:00')),
			  					"eDate"=>date('M/d/Y h:i', strtotime('09/22/2022 22:00')),
		  					),
							array(
								"name"=>"Event4",
			 					"sDate"=>date('M/d/Y h:i', strtotime('08/23/2022 22:00')),
			  					"eDate"=>date('M/d/Y h:i', strtotime('09/23/2022 22:00')),
		  					),
			);
			echo json_encode($eventsArray);
			break;
		case 'get_event1_results':
			define("conn", true);
			include("./conn.php");

		 	$array = array();

			$sql = "SELECT * FROM event_points";
			$query = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query) > 0){
			    while($row = mysqli_fetch_assoc($query)){
			        array_push($array, $row);
			    }
			}
			echo json_encode($array);
			mysqli_close($conn);
			break;
		case 'get_event1_results_sorted_e_g':
			define("conn", true);
			include("./conn.php");

		 	$array = array();

			$sql = "SELECT * FROM event_points ORDER BY event1_e_g DESC";
			$query = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query) > 0){
			    while($row = mysqli_fetch_assoc($query)){
			        array_push($array, $row);
			    }
			}
			echo json_encode($array);
			mysqli_close($conn);
			break;
		case 'get_event1_results_sorted_g_e':
			define("conn", true);
			include("./conn.php");

		 	$array = array();

			$sql = "SELECT * FROM event_points ORDER BY event1_g_e DESC";
			$query = mysqli_query($conn, $sql);

			if(mysqli_num_rows($query) > 0){
			    while($row = mysqli_fetch_assoc($query)){
			        array_push($array, $row);
			    }
			}
			echo json_encode($array);
			mysqli_close($conn);
			break;
		case 'set_event1_e_g_points':
			define("conn", true);
			include("./conn.php");

			$user = $_POST['user'];
			$point = $_POST['point'];
			$sql = "UPDATE event_points SET event1_e_g = '$point' WHERE user = '$user' ";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			break;
		case 'set_event1_g_e_points':
			define("conn", true);
			include("./conn.php");

			$user = $_POST['user'];
			$point = $_POST['point'];
			$sql = "UPDATE event_points SET event1_g_e = '$point' WHERE user = '$user' ";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			break;
		default:
			// code...
			break;
	}

}else{
	header("Location: user.php");
}