<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ../../login.php");
        exit();
    }
    if (!isset($_GET['id'])) {
      header("Location: index.php");
      exit();
    }
    require('../../base.php');
    require("../../database.php");
    if (isset($_GET['id'])) {
      $kendaraan = getKendaraanById($_GET['id']);
    } else {
      $kendaraan = getKendaraanById($_POST['id_kendaraan']);
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <title>Hilal Travel | Sewa Kendaraan</title>
  </head>
  <body>
    <header>
      <?php	include("../../../assets/inc/user/layouts/header.inc"); ?>
    </header>
    <main class="flex justify-center p-16">
      <div
        class="w-1/2 p-4 bg-white border border-gray-200 rounded-lg backdrop-blur-xl sm:p-6 md:p-14"
      >
        <h5 class="text-xl font-medium text-gray-900 text-center">
          From Reservasi
        </h5>
        <form class="space-y-6" action="" id="form" method="POST">
          <h2 class="text-2xl text-bold"><?= $kendaraan["NAMA_KENDARAAN"]; ?></h2>
          <input type="hidden" name="id_kendaraan" id="" value="<?= $kendaraan['ID_KENDARAAN']?>">
          <?php
          $table = 'penyewaan';
          $id = $_SESSION['id'];
          $inc = BASEPATH.'/assets/inc/user/armada/sewa.php';
          if (isset($_POST['submit'])) {
            sewa($_POST, $id, $kendaraan['ID_KENDARAAN']);
            echo "<h6>pemesanan berhasil, silahkan lakukan pembayaran di menu riwayat pemesanan</h6>";
            exit();
          } else {
              include $inc;
          }
          ?>
        </form>
      </div>
    </main>
  </body>
</html>
