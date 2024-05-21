
<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    
    $paket = getPaketById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css" />
    <title>Hilal Travel | Paket Wisata</title>
  </head>
  <body>
    <?php include BASEPATH."/assets/inc/user/layouts/header.inc" ?>
    <main class="flex justify-center p-16">
      <div
        class="w-1/2 p-4 bg-white border border-gray-200 rounded-lg backdrop-blur-xl sm:p-6 md:p-14"
      >
        <h5 class="text-xl font-medium text-gray-900 text-center">
          From Reservasi
        </h5>
        <form class="space-y-6" action="pesan.php?id=<?=$_GET['id']?>" method="POST">
          <h2 class="text-2xl text-bold"><?= $paket['NAMA_PAKET']?></h2>
          <div>
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Nama Lengkap</label
            >
            <input
              type="text"
              name="name"
              id="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <!-- <span class="text-red-600 text-xs">Nama tidak sesuai</span> -->
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >No Telp</label
            >
            <input
              type="text"
              name="tempat"
              id="tampat"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <!-- <span class="text-red-600 text-xs">No Telp tidak sesuai</span> -->
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Point Penjemputan</label
            >
            <input
              type="text"
              name="tempat"
              id="tampat"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <!-- <span class="text-red-600 text-xs">Tempat tidak sesuai</span> -->
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Harga</label
            >
            <h2 class="text-2xl text-bold"><?= "Rp " . number_format($paket["HARGA_PAKET"], 0, ',', '.');?></h2>
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Keterangan</label
            >
            <textarea
              type="ket"
              name="password"
              id="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            ></textarea>
            <!-- <span class="text-red-600 text-xs">Password tidak sesuai</span> -->
          </div>
          <button
            type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >
            Masuk
          </button>
        </form>
      </div>
    </main>
    <?php include BASEPATH."/assets/inc/user/layouts/footer.inc" ?>
  </body>
</html>
