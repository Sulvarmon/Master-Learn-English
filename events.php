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
		
		default:
			// code...
			break;
	}

}else{
	header("Location: user.php");
}