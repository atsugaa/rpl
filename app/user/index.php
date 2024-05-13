<?php
	session_start();
    require('../base.php');
    require("../database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body class="index-user">
	<?php include("../../assets/inc/user/layouts/header.inc") ?>
	<h1>HOME</h1>
    <a href="armada/index.php">Sewa Armada</a>
    <a href="paket/index.php">Paket Wisata</a>
	<?php include("../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>