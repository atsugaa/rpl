<?php
require_once('../../base.php');
require_once('../../database.php');
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    require BASEPATH . '/assets/inc/admin/paket/validate.inc';

    validornot($errors, [$_POST, $_FILES]);

    if (empty($errors)) {
        if (tambahPaket([$_POST, $_FILES])) {
            echo "<h1>Tambah Paket berhasil!</h1>";
            header('Location: index.php');
            exit();
        } else {
            echo "<h1>Tambah Paket gagal!</h1>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Tambah Paket</title>
</head>
<body>
    <?php include("../../../assets/inc/admin/layouts/header.inc"); ?>
    <div class="content">
        <div class="form-container">
            <h1>Tambah Paket</h1>
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <?php
                $inc = BASEPATH . '/assets/inc/admin/paket/paket.inc';
                include $inc;
                ?>
                <div class="form-field">
                    <input type="submit" name="submit" value="Tambah Produk">
                    <a href="index.php">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <?php include("../../../assets/inc/admin/layouts/footer.inc"); ?>
</body>
</html>
