<?php
    session_start();
    // if (!isset($_SESSION['user'])) {
    //   header("Location: ../index.php");
    //   exit();
    // }
    $title = "paket";
    require('../../base.php');
    require("../../database.php");
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $packets = getTableDataPagination('paket', $currentPage);
    if (count(getTableData('paket')) > 10) {
        $totalPages = round(count(getTableData('paket')) / 10);
    } else {
        $totalPages = 1;
    }

    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages && $totalPages > 0) {
        $currentPage = $totalPages;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css" />
    <title>Paket</title>
</head>
<body class="index-user">
  <header>
    <?php
		include("../../../assets/inc/user/layouts/header.inc");
		$flag = 1;
    ?>
          <div
          style="background-image:url(<?=BASEURL?>/assets/img/5ce21808a9751d0fd0564f61814d36ba.webp)"
        class="w-full flex justify-center items-center h-[35vh] md:h-[40vh] lg:h-[47vh] bg-no-repeat bg-cover bg-center"
      >
        <div
          class="flex flex-col justify-center gap-5 bg-red w-full h-full px-5 md:px-32"
        >
          <h2 class="text-white font-bold text-2xl">Paket Wisata</h2>
          <p class="text-white text-sm">
            Taklukkan keindahan alam dan budaya yang luar biasa dengan <br />
            paket wisata kami yang eksklusif, sebuah petualangan tak <br />
            terlupakan menunggu Anda!
          </p>
        </div>
      </div>
  </header>
  <main class="flex justify-center  gap-11 flex-wrap p-28 pb-16">
    <?php foreach ($packets as $packet) : ?>
      <div
        class="p-3 rounded-md bg-white drop-shadow-lg  items-stretch justify-between flex flex-col gap-4 text-sm"
      >
        <div class="w-72 h-52 rounded-md overflow-hidden flex justify-center items-center ">
          <img src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket" class="h-52 max-w-none " />
        </div>
        <div class="flex justify-between items-center font-bold">
          <h2 class="text-xl w-40" >  <?= ucwords($packet["NAMA_PAKET"]) ?></h2>
          <h3>Sisa <?= $packet["KAPASITAS_PAKET"] ?> Orang</h3>
        </div>
        <p class="text-gray-500">3 Hari 2 Malam</p>
        <?php
          $destinasis = explode(",", $packet["DESTINASI_PAKET"]);
          foreach ($destinasis as $destinasi) { ?>
            <ul class="list-disc ml-6 text-gray-500">
              <li><?= $destinasi ?></li>
            </ul>
          <?php } ?>
        
        <p class="text-xs">
          <span class="text-xl font-bold"><?= "Rp " . number_format($packet["HARGA_PAKET"], 0, ',', '.'); ?></span> per-orang
        </p>
        <?php if ($packet["KAPASITAS_PAKET"] > 0) { 
          if (checkPaket($packet)) {?>
            <button data-modal-target="static-modal<?=$flag?>" data-modal-toggle="static-modal<?=$flag?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Lihat Selengkapnya</button>
          <?php } else { ?>
            <button class="block text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600" type="button" disabled>Paket Tidak Tersedia</button>
          <?php }
        } else { ?>
          <button class="block text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600" type="button" disabled>Paket Habis</button>
        <?php } ?>
      </div>

          <!-- Modal toggle -->


          <!-- Main modal -->
          <div id="static-modal<?=$flag?>" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-2xl max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <!-- Modal header -->
                      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                          <?= ucwords($packet["NAMA_PAKET"]) ?>
                          </h3>
                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal<?=$flag?>">
                              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                              </svg>
                              <span class="sr-only">Close modal</span>
                          </button>
                      </div>
                      <!-- Modal body -->
                      <div class="p-4 md:p-5 space-y-4">
                          <img class="img" src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket">
                          <div class="modal-body text-center">
                                  <h5><?= $packet["KAPASITAS_PAKET"] ?> Orang</h5>
                                  <h6><?= $packet["TANGGAL_PAKET"] ?></h6>
                                  <p><?= $packet["DESKRIPSI_PAKET"] ?></p>
                                  <p><?= $packet["DESTINASI_PAKET"] ?></p>
                                  <p><?= "Rp " . number_format($packet["HARGA_PAKET"], 0, ',', '.'); ?> per orang</p>
                                </div>
                      </div>
                      <!-- Modal footer -->
                      <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                          <a href="pesan.php?id=<?=$packet['ID_PAKET']?>"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesan sekarang</a>
                          <a data-modal-hide="static-modal<?=$flag?>"  class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</a>
                      </div>
                  </div>
              </div>
          </div>
        <?php $flag+=1;
    endforeach; ?>
	</main>
<nav class="w-full flex justify-center mb-8">
    <ul class="inline-flex -space-x-px text-base h-10">
        <li>
            <a href="?page=<?= $currentPage - 1 ?>" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-whiteg <?= $currentPage <= 1 ? 'pointer-events-none' : '' ?>">Previous</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i == $currentPage): ?>
                <li>
                    <span class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"><?= $i ?></span>
                </li>
            <?php else: ?>
                <li>
                    <a href="?page=<?= $i ?>" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?= $i ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <li>
            <a href="?page=<?= $currentPage + 1 ?>" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white <?= $currentPage >= $totalPages ? 'pointer-events-none' : '' ?>">Next</a>
        </li>
    </ul>
</nav>
	<?php include("../../../assets/inc/user/layouts/footer.inc");?>
  <script src="<?=BASEURL?>/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>