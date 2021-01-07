<?php

	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){

		if($_SERVER['REQUEST_METHOD']==='POST'){

			if(isset($_POST['room_id']) && isset($_POST['act']) && isset($_POST['status'])){
				$status = 0;
				if($_POST['status']=='true'){
					$status = 1;
				}

				if($_POST['act']==='room_temperature_manual_set_status'){
					setRoomTemperatureSensorStatus($_POST['room_id'], $status);
				}
				if($_POST['act']==='room_smoke_manual_set_status'){
					setRoomSmokeSensorStatus($_POST['room_id'], $status);
				}
				if($_POST['act']==='room_movement_manual_set_status'){
					setRoomMovementSensorStatus($_POST['room_id'], $status);
				}		
				if($_POST['act']==='room_alarm_set_status'){
					setRoomManualAlarmStatus($_POST['room_id'], $status);
				}		

			}

		}

	}

?>