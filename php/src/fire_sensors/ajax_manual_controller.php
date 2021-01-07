<?php

	require_once 'db.php';

	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['sensor_id']) && isset($_POST['act']) && isset($_POST['status'])){
			$status = 0;
			if($_POST['status']=='true'){
				$status = 1;
			}

			if($_POST['act']==='manual_switch'){
				setSensorStatus($_POST['sensor_id'], $status);
			}	
		}

	}

?>