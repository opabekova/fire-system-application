<?php 
	
	session_start();
	unset($_SESSION['CURRENT_USER']);

	header("Location:login.php");

?>