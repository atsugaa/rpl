<?php
	session_start();
	if (isset($_SESSION['admin'])) {
		header('location: admin/index.php');
		exit();
	} elseif (isset($_SESSION['user'])) {
		header('location: user/index.php');
		exit();
	} else {
		header('location: user/index.php');
		exit();
	}
?>