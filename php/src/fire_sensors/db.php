<?php

	define('SITE_NAME', "FIRE SYSTEM SENSOR SIMULATOR");
	
	try{

		$connection = new PDO("mysql:host=localhost;dbname=fire_sensors", "root", "");
	
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	function getSensors(){
		
		global $connection;
		$query = $connection->prepare("
			SELECT s.id, s.name, s.active, s.sensor_type, st.name AS sensor_type_name 
			FROM sensors s 
			INNER JOIN sensor_types st ON st.id = s.sensor_type 
		");
		$query->execute();

		$result = $query->fetchAll();
		return $result;

	}

	function getSensorTypes(){
		
		global $connection;
		$query = $connection->prepare("
			SELECT * FROM sensor_types 
		");
		$query->execute();

		$result = $query->fetchAll();
		return $result;

	}

	function addSensor($name, $sensor_type_id){

		global $connection;
		$query = $connection->prepare("
			INSERT INTO sensors (id, name, sensor_type, active) 
			VALUES (NULL, :name, :sensor_type_id, 0)
		");
		$query->execute(
			array("name"=>$name, "sensor_type_id"=>$sensor_type_id)
		);

	}

	function getSensor($id){

		global $connection;
		$query = $connection->prepare("
			SELECT s.id, s.name, s.active, s.sensor_type, st.name AS sensor_type_name 
			FROM sensors s 
			INNER JOIN sensor_types st ON st.id = s.sensor_type 
			WHERE s.id = :id 
		");
		$query->execute(array("id"=>$id));

		$result = $query->fetch();
		return $result;

	}

	function setSensorStatus($sensor_id, $status){

		global $connection;
		$query = $connection->prepare("
			UPDATE sensors 
			SET active =:status 
			WHERE id =:sensor_id 
		");
		$query->execute(array("status"=>$status, "sensor_id"=>$sensor_id));
	
	}

	function getActiveSensors(){

		global $connection;
		$query = $connection->prepare("
			SELECT s.id, s.sensor_type 
			FROM sensors s 
			WHERE s.active = 1 
		");
		$query->execute();

		$result = $query->fetchAll();
		return $result;

	}

?>
