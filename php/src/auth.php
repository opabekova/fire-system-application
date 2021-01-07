<?php

	$redirect = "index.php"; 
	
	if($_SERVER['REQUEST_METHOD']==='POST'){

		if(isset($_POST['login']) && isset($_POST['password'])){

			require_once 'db.php';

			$redirect = "login.php?error";

			$user = getUser($_POST['login']);

			if($user!=null && $user['id']!=null && $user['password'] === sha1($_POST['password'])){

				session_start();

				$_SESSION['CURRENT_USER'] = $user;

				$redirect = "profile.php";

			}

		}

	}

	header("Location:$redirect");

?>