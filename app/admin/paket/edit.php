<?php
    require_once('../../base.php');
    require_once('../../database.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    if (isset($_GET['pkt'])) {
        $id = $_GET['pkt'];
        $packet = getAllData('paket', $id);
        $old = $packet[0]["GAMBAR_PAKET"];
    } elseif (isset($_POST['id'])) {
        $id = $_POST['id'];
        $packet = getAllData('paket', $id);
        $old = $packet[0]["GAMBAR_PAKET"];
    } else {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - Edit Paket</title>
    </head>
    <body>
        <?php include("../../../assets/inc/admin/layouts/header.php"); ?>
            <div class="w-full my-4 max-w-lg mx-auto">
                <h1 class="text-xl font-bold mb-5">Edit Paket</h1>
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-5 w-96 overflow-hidden">
                        <img src="<?= BASEURL; ?>/assets/img/paket/<?php if (isset($_POST['old'])) {echo $_POST['old'];} else {echo $old;} ?>" alt="packet">
                        <input type="hidden" name="old" value="<?php if (isset($_POST['old'])) {echo $_POST['old'];} else {echo $old;} ?>">
                        <input type="hidden" name="id" value="<?php echo $packet[0]['ID_PAKET']; ?>">
                    </div>
                    <?php
                        $inc = BASEPATH.'/assets/inc/admin/paket/paket.inc';
                        require  BASEPATH .'/assets/inc/admin/paket/validate.inc';
                        $errors = array();
                        if (isset($_POST['submit'])) {
                            validornot($errors, [$_POST, $_FILES]);
                            if ($errors) {
                                include $inc;
                            } else {
                                editPaket([$_POST, $_FILES]);
                                echo "<h1>Edit Paket berhasil !</h1>";
                                header('location: index.php');
                            }
                        } else {
                            include $inc;
                        }
                    ?>
                    <div class="form-field">
                        <input type="submit" name="submit" value="Edit Produk" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <a href="index.php" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">Batal</a>
                    </div>
                </form>
            </div>
        <?php include("../../../assets/inc/admin/layouts/footer.php"); ?>
    </body>
</html>