<?php
	session_start();
	if (!isset($_SESSION['admin'])) {
		header("Location: ../index.php");
		exit();
	} else {
		unset($_SESSION['admin']);
		unset($_SESSION['id']);
		header("location: ../index.php");
		exit();
	}
?>