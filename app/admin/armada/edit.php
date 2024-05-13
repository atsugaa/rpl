<?php
    require_once('../../base.php');
    require_once('../../database.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    if (isset($_GET['arm'])) {
        $id = $_GET['arm'];
        $armada = getAllData('kendaraan', $id);
        $old = $armada[0]["GAMBAR_KENDARAAN"];
    } elseif (isset($_POST['id'])) {
        $id = $_POST['id'];
        $armada = getAllData('kendaraan', $id);
        $old = $armada[0]["GAMBAR_KENDARAAN"];
    } else {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Edit Armada</title>
    </head>
    <body>
        <?php include("../../../assets/inc/admin/layouts/header.inc"); ?>
        <div class="content">
            <div class="form-container">
                <h1>Edit Armada</h1>
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="form-field">
                        <img src="<?= BASEURL; ?>/assets/img/armada/<?php if (isset($_POST['old'])) {echo $_POST['old'];} else {echo $old;} ?>" alt="armada">
                        <input type="hidden" name="old" value="<?php if (isset($_POST['old'])) {echo $_POST['old'];} else {echo $old;} ?>">
                        <input type="hidden" name="id" value="<?php echo $armada[0]['ID_KENDARAAN']; ?>">
                    </div>
                    <?php
                        $inc = BASEPATH.'/assets/inc/admin/armada/armada.inc';
                        require  BASEPATH .'/assets/inc/admin/armada/validate.inc';
                        $errors = array();
                        if (isset($_POST['submit'])) {
                            validornot($errors, [$_POST, $_FILES]);
                            if ($errors) {
                                include $inc;
                            } else {
                                editArmada([$_POST, $_FILES]);
                                echo "<h1>Edit armada berhasil !</h1>";
                                header('location: index.php');
                            }
                        } else {
                            include $inc;
                        }
                    ?>
                    <div class="form-field">
                        <input type="submit" name="submit" value="Edit Produk">
                        <a href="index.php">Batal</a>
                    </div>
                </form>
            </div>
        </div>
        <?php include("../../../assets/inc/admin/layouts/footer.inc"); ?>
    </body>
</html>