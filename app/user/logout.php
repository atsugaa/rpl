<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: ../index.php");
		exit();
	} else {
		unset($_SESSION['user']);
		unset($_SESSION['id']);
		header("location: ../index.php");
		exit();
	}
?>