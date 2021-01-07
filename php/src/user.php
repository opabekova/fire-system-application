<?php 
	
	session_start();

	$CURRENT_USER = null;

	if(isset($_SESSION['CURRENT_USER'])){

		define("ONLINE", true);
		$CURRENT_USER = $_SESSION['CURRENT_USER'];

	}else{
		define("ONLINE", false);
	}

?>