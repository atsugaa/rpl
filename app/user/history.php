<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: ../index.php");
		exit();
	}
    require('../base.php');
    require("../database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
</head>
<body class="index-user">
	<?php include("../../assets/inc/user/layouts/header.inc") ?>
    <h1>HISTORY</h1>
	<?php include("../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>