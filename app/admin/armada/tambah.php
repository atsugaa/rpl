<?php
    require_once('../../base.php');
    require_once('../../database.php');
    $title = 'Tambah Armada';
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
?>
        <?php include("../../../assets/inc/admin/layouts/header.php"); ?>
            <div class="w-full my-4 max-w-lg mx-auto">
                <h1 class="text-xl font-bold mb-5">Tambah Armada</h1>
                <form action="tambah.php" method="POST" enctype="multipart/form-data">
                    <?php
                        $inc = BASEPATH . '/assets/inc/admin/armada/add.inc';
                        require BASEPATH . '/assets/inc/admin/armada/validate.inc';
                        $errors = array();
                        $table = 'kendaraan';
                        $id = $_SESSION['id'];
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
                    <input type="submit" name="submit" value="Tambah Armada" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <a href="index.php" class="items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">Batal</a>
                    </div>
                </form>
            </div>
        <?php include("../../../assets/inc/admin/layouts/footer.php"); ?>
