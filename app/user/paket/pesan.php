<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    if (!isset($_SESSION['user'])) {
        header("Location: ../../login.php");
        exit();
    }
    if (isset($_GET['id']) | isset($_POST['id_paket'])) {
      if (isset($_GET['id'])) {
        $paket = getPaketById($_GET['id']);
      } else {
        $paket = getPaketById($_POST['id_paket']);
      }
    } else {
      header("Location: index.php");
      exit();
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <title>Hilal Travel | Pesan Paket</title>
  </head>
  <body>
    <header>
      <?php include("../../../assets/inc/user/layouts/header.inc"); ?>
    </header>
    <main class="flex justify-center p-16">
      <div
        class="w-1/2 p-4 bg-white border border-gray-200 rounded-lg backdrop-blur-xl sm:p-6 md:p-14"
      >
        <h5 class="text-xl font-medium text-gray-900 text-center">
          From Reservasi
        </h5>
        <form class="space-y-6" action="" id="form" method="POST">
          <?php
          $table = 'pemesanan';
          $id = $_SESSION['id'];
          $errors = array();
          $inc = BASEPATH.'/assets/inc/user/paket/pesan.php';
          require BASEPATH .'/assets/inc/user/paket/validate.inc';
          if (isset($_POST['submit'])) {
            if (validornot($errors, $_POST, $paket)) {
              pesan($_POST, $id, $paket['ID_PAKET']);
              echo "<h6>pemesanan berhasil, silahkan lakukan pembayaran di menu riwayat pemesanan</h6>";
            } else {
              include $inc;
            }
          } else {
              include $inc;
          }
          ?>
        </form>
      </div>
    </main>
  </body>
</html>
