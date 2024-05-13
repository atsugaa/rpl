<?php
	require_once('base.php');
	require_once('database.php');
	session_start();
	if (isset($_SESSION['admin'])) {
		header('location: admin/index.php');
		exit();
	} elseif (isset($_SESSION['user'])) {
		header('location: user/index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
</body>
	<div class="form-container">
		<h1>Masuk</h1>
		<form action="login.php" method="POST">
			<?php
				$inc = '../assets/inc/login/login.inc';
				require '../assets/inc/login/validate.inc';
				require_once('base.php');
    			require_once("database.php");
	            $errors = array();
	            if (isset($_POST['submit'])) {
	            	validornot($_POST, $errors, $inc);
	            } else {
	                include $inc;
	            }
			?>
		</form>
	</div>
</body>
</html>