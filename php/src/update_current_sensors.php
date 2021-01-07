<?php
	
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){

		if(isset($_POST['id']) && isset($_POST['sensor_type'])){

			$room = getRoomBySensorId($_POST['id']);

			if($_POST['sensor_type']==1){
				updateCurrentRoomTemperatureSensor($room['id']);
			}else if($_POST['sensor_type']==2){
				updateCurrentRoomSmokeSensor($room['id']);
			}else if($_POST['sensor_type']==3){
				updateCurrentRoomMovementSensor($room['id']);
			}else if($_POST['sensor_type']==4){
				updateCurrentRoomManualAlarm($room['id']);
			}
		}

	}

?>