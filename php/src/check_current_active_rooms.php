<?php
	
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){

		$room = getActiveRoomsById($_GET['id']);
		echo json_encode($room);

	}

?>