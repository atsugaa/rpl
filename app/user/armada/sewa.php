<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    
    $kendaraan = getKendaraanById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-SXRn4zqKWaZBCxcz"></script>
    <title>Hilal Travel | Paket Wisata</title>
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
        <form class="space-y-6" action="" id="form">
          <h2 class="text-2xl text-bold"><?= $kendaraan['NAMA_KENDARAAN']?></h2>
          <input type="hidden" name="kendaraan" id="" value="<?= $kendaraan['NAMA_KENDARAAN']?>">
          <input type="hidden" name="id_kendaraan" id="" value="<?= $kendaraan['ID_KENDARAAN']?>">
          <div>
            <label
              for="name"
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
              for="telp"
              class="block mb-2 text-sm font-medium text-gray-900"
              >No Telp</label
            >
            <input
              type="text"
              name="telp"
              id="telp"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <!-- <span class="text-red-600 text-xs">No Telp tidak sesuai</span> -->
          </div>
          <div>
            <label
              for="tampat"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Tempat Penjemputan</label
            >
            <input
              type="text"
              name="penjemputan"
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
              >Durasi</label
            >
            <div
              class="flex gap-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
            >
              <label for="" class="">Tanggal Pergi</label>
              <input class="text-sm border-0" type="date" name="durasi" id="" />
              <label for="" class="">Tanggal Pulang</label>
              <input class="text-sm border-0" type="date" name="" id="" />
            </div>
          </div>
          <div>
            <label
              class="block mb-2 text-sm font-medium text-gray-900"
              >Harga<label
            >
            <input type="hidden" name="total" value="<?=$kendaraan['HARGA_SEWA']?>">
            <h2 class="text-2xl text-bold"><?= "Rp " . number_format($kendaraan["HARGA_SEWA"], 0, ',', '.');?></h2>
          </div>
          <div>
            <label
              for="keterangan"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Keterangan</label
            >
            <textarea
              type="text"
              name="keterangan"
              id="keterangan"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            ></textarea>
            <!-- <span class="text-red-600 text-xs">Password tidak sesuai</span> -->
          </div>
          <button
            id="pay-button"
            type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >
            Masuk
          </button>
        </form>
      </div>
    </main>
    <script>
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      const form = document.querySelector('#form')
      payButton.addEventListener('click', async function (e) {
        e.preventDefault();
        const formData =  new FormData(form);
        const data = new URLSearchParams(formData);
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        try{
          const response = await fetch('pembayaran.php',{
            method : 'POST',
            body : data,
          });
          console.log(response);
          const token = await response.text()
          window.snap.pay(token);
        }catch (err){
          console.log(err.message);
        }
        // customer will be redirected after completing payment pop-up
      });
    </script>
  </body>
</html>
