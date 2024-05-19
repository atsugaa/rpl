<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
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
    <title>Home - Admin</title>
</head>
<body class="index-user">
    <?php include("../../assets/inc/admin/layouts/header.inc") ?>
    <div>
    	<p>Semua Pemesanan </p>
    	<p>Pemesanan Berakhir </p>
    	<p>Payments </p>
    	<p>Users </p>
    </div>
    <?php include("../../assets/inc/admin/layouts/footer.inc");?>
</body>
</html>