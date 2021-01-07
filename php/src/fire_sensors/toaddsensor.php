<?php 

	$redirect = "index.php";
	
	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';

		if(ONLINE){

			if(isset($_POST['name']) && isset($_POST['sensor_type_id'])){
			
				addSensor($_POST['name'], $_POST['sensor_type_id']);

				$redirect = "index.php?success";

			}

		}

	}

	header("Location:$redirect");
?>