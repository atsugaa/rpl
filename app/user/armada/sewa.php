<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    }
    /*if (!isset($_GET['id'])) {
      header("Location: index.php");
      exit();
    }*/
    require('../../base.php');
    require("../../database.php");
    if (isset($_GET['id'])) {
      $armada = getAllData('kendaraan', $_GET['id']);
    } else {
      $armada = getAllData('kendaraan', 'K0001');
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
        <form class="space-y-6" action="" method="POST">
          <h2 class="text-2xl text-bold"><?= $armada[0]["NAMA_KENDARAAN"]; ?></h2>
          <?php
          $table = 'penyewaan';
          $id = $_SESSION['id'];
          $inc = BASEPATH.'/assets/inc/user/armada/sewa.php';
          if (isset($_POST['submit'])) {
            sewa($_POST, $id, $_GET['id']);
            /*header('Location: riwayat.php');
            exit();*/
          } else {
              include $inc;
          }
          ?>
        </form>
      </div>
    </main>
  </body>
</html>
