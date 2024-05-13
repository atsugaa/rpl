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
    <title>Profil</title>
</head>
<body class="index-user">
    <?php include("../../assets/inc/admin/layouts/header.inc") ?>
    <h1>PROFIL</h1>
    <div class="user_account_container">
        <?php $a = getAllData('user', $_SESSION["id"]);?>
        <div class="user_content">
            <p>Nama : <?php echo $a[0]["NAMA_USER"];?></p>
            <p>Alamat : <?php echo $a[0]["ALAMAT_USER"];?> </p>
            <p>Nomor Telepon : <?php echo $a[0]["TELEPON_USER"];?> </p>
            <p>Password : ****** </p>
            <a href="edit.php">Edit Profil</a>
            <a href="logout.php">Keluar</a>
        </div>
    </div>
    <?php include("../../assets/inc/admin/layouts/footer.inc");?>
</body>
</html>