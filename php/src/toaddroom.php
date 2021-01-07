<?php 

	$redirect = "index.php";
	
	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(ONLINE){

			if(isset($_POST['name']) && isset($_POST['floor_id']) && isset($_POST['room_number'])){
			
				addRoom($_POST['name'], $_POST['room_number'], $_POST['floor_id']);

				$redirect = "readfloor.php?id=".$_POST['floor_id'];

			}

		}

	}

	header("Location:$redirect");
?>