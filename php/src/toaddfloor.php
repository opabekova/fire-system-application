<?php 

	$redirect = "index.php";
	
	if($_SERVER['REQUEST_METHOD']==='POST'){

		require_once 'db.php';
		require_once 'user.php';

		if(ONLINE){

			if(isset($_POST['name']) && isset($_POST['floor'])){
			
				addFloor($_POST['name'], $_POST['floor']);

				$redirect = "floors.php?success";

			}

		}

	}

	header("Location:$redirect");
?>