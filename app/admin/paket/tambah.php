<?php
    require_once('../../base.php');
    require_once('../../database.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    $title = "Paket Wisata";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Tambah Paket</title>
</head>
<body>
    <?php include("../../../assets/inc/admin/layouts/header.php"); ?>
    <div class="w-full my-4 max-w-lg mx-auto">
            <h1 class="text-xl font-bold mb-5">Tambah Paket</h1>
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <?php
                    $inc = BASEPATH . '/assets/inc/admin/paket/add.inc';
                    $errors = array();
                    require BASEPATH . '/assets/inc/admin/paket/validate.inc';
                    if (isset($_POST['submit'])) {
                        validornot($errors, [$_POST, $_FILES]);
                        if ($errors) {
                            include $inc;
                        } else {
                            if (tambahPaket([$_POST, $_FILES])) {
                                echo "<h1>Tambah paket berhasil !</h1>";
                                echo "<script>
                                        setTimeout(function(){
                                            window.location.href = 'index.php';
                                        }, 1);
                                      </script>";
                            } else {
                                echo "<h1>Gagal paket armada.</h1>";
                            }
                        }
                    } else {
                        include $inc;
                    }
                ?>
                <div class="form-field">
                    
                <input type="submit" name="submit" value="Tambah Paket" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <a href="index.php" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <?php include("../../../assets/inc/admin/layouts/footer.php"); ?>
</body>
</html>
