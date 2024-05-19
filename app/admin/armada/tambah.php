<?php
    require_once('../../base.php');
    require_once('../../database.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Tambah Armada</title>
    </head>
    <body>
        <?php include("../../../assets/inc/admin/layouts/header.inc"); ?>
        <div class="content">
            <div class="form-container">
                <h1>Tambah Armada</h1>
                <form action="tambah.php" method="POST" enctype="multipart/form-data">
                    <?php
                        $inc = BASEPATH . '/assets/inc/admin/armada/armada.inc';
                        require BASEPATH . '/assets/inc/admin/armada/validate.inc';
                        $errors = array();
                        if (isset($_POST['submit'])) {
                            validornot($errors, [$_POST, $_FILES]);
                            if ($errors) {
                                include $inc;
                            } else {
                                if (tambahArmada([$_POST, $_FILES])) {
                                    echo "<h1>Tambah armada berhasil !</h1>";
                                    header('Location: index.php');
                                } else {
                                    echo "<h1>Gagal menambah armada.</h1>";
                                }
                            }
                        } else {
                            include $inc;
                        }
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
