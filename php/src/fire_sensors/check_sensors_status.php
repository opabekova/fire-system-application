<?php 

	if($_SERVER['REQUEST_METHOD']=='GET'){

		require_once 'db.php';

		$activeSensors = getActiveSensors();
		echo json_encode($activeSensors);

	}

?>