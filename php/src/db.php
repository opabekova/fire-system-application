<?php

	define('SITE_NAME', "FIRE SYSTEM APPLICATION");
	
	try{

		$connection = new PDO("mysql:host=localhost;dbname=fire_system", "root", "");
	
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	function getFloors(){
		
		global $connection;
		$query = $connection->prepare("SELECT * FROM floors ORDER BY floor DESC");
		$query->execute();

		$result = $query->fetchAll();
		return $result;

	}

	function getUser($login){

		global $connection;
		$query = $connection->prepare("SELECT * FROM users WHERE login = :login");
		$query->execute(array("login"=>$login));

		$result = $query->fetch();

		return $result;

	}

	function getFloor($id){
		
		global $connection;
		$query = $connection->prepare("SELECT * FROM floors WHERE id =:id");
		$query->execute(array("id"=>$id));

		$result = $query->fetch();
		return $result;

	}

	function getRoomsByFloorId($floor_id){
		
		global $connection;
		$query = $connection->prepare("SELECT * FROM rooms WHERE floor_id = :floor_id ORDER BY room_number ASC");
		$query->execute(array("floor_id"=>$floor_id));

		$result = $query->fetchAll();
		return $result;

	}

	function getRoom($id){
		
		global $connection;
		$query = $connection->prepare("
			SELECT r.id, r.name, r.room_number, r.floor_id, 
				r.temperature_sensor_status, r.smoke_sensor_status,
				r.movement_sensor_status, r.manual_alarm_status,
				r.somke_sensor_id, r.temperature_sensor_id,
				r.motion_sensor_id, r.manual_alarm_id, 
				f.name AS floor_name, f.floor
			FROM rooms r
			INNER JOIN floors f ON r.floor_id = f.id
			WHERE r.id = :id 
		");
		$query->execute(array("id"=>$id));

		$result = $query->fetch();
		return $result;

	}

	function addFloor($name, $floor){

		global $connection;
		$query = $connection->prepare("
			INSERT INTO floors (id, name, floor) VALUES (NULL, :name, :floor) 
		");
		$query->execute(array("name"=>$name, "floor"=>$floor));

	}

	function addRoom($name, $room_number, $floor_id){

		global $connection;
		$query = $connection->prepare("
			INSERT INTO rooms (id, name, room_number, floor_id) 
			VALUES (NULL, :name, :room_number, :floor_id) 
		");
		$query->execute(array("name"=>$name, "room_number"=>$room_number, "floor_id"=>$floor_id));

	}

	function setRoomTemperatureSensorStatus($room_id, $status){

		global $connection;
		$query = $connection->prepare("
			UPDATE rooms
			SET temperature_sensor_status =:status 
			WHERE id =:room_id
		");
		$query->execute(array("status"=>$status, "room_id"=>$room_id));

	}

	function setRoomSmokeSensorStatus($room_id, $status){

		global $connection;
		$query = $connection->prepare("
			UPDATE rooms
			SET smoke_sensor_status =:status 
			WHERE id =:room_id
		");
		$query->execute(array("status"=>$status, "room_id"=>$room_id));

	}

	function setRoomMovementSensorStatus($room_id, $status){

		global $connection;
		$query = $connection->prepare("
			UPDATE rooms
			SET movement_sensor_status =:status 
			WHERE id =:room_id
		");
		$query->execute(array("status"=>$status, "room_id"=>$room_id));

	}

	function setRoomManualAlarmStatus($room_id, $status){

		global $connection;
		$query = $connection->prepare("
			UPDATE rooms
			SET manual_alarm_status =:status 
			WHERE id =:room_id
		");
		$query->execute(array("status"=>$status, "room_id"=>$room_id));

	}


?>
