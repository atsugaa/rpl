<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      header("Location: ../index.php");
      exit();
    }
    require('../../base.php');
    require("../../database.php");
    $packets = getTableData('paket');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css" />
    <title>Home</title>
</head>
<body class="index-user">
  <header>
    <?php
		include("../../../assets/inc/user/layouts/header.inc");
		$flag = 1;
    ?>
          <div
          style="background-image:url(<?=BASEURL?>/img/5ce21808a9751d0fd0564f61814d36ba.jpg)"
        class="w-full flex justify-center items-center h-[35vh] md:h-[40vh] lg:h-[47vh] bg-no-repeat bg-cover bg-center"
      >
        <div
          class="flex flex-col justify-center gap-5 bg-black bg-opacity-30 w-full h-full px-32"
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
  <main class="flex justify-center gap-11 flex-wrap items-center p-32 bg-slate-50">
    <?php foreach ($packets as $packet) : ?>
      <div
        class="p-3 rounded-md bg-white drop-shadow-lg flex flex-col gap-4 text-sm"
      >
        <div class="w-72 h-52 rounded-md overflow-hidden flex justify-center">
          <img src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket" class="h-52 max-w-none" />
        </div>
        <div class="flex justify-between items-center font-bold">
          <h2 class="text-xl">  <?= ucwords($packet["NAMA_PAKET"]) ?></h2>
          <h3><?= $packet["KAPASITAS_PAKET"] ?> Orang</h3>
        </div>
        <p class="text-gray-500">24 Jam</p>
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
        <a class="p-2 bg-blue-600 w-fit rounded-md text-white" href=""
          >Lihat Selengkapnya</a
        >
      </div>
<!--         <div class="productCardOuter">
            <div class="productCardInner">
                <img class="img" src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket">
                <div class="productdetail">
                    <div class="productCardtitle">
                        <?= ucwords($packet["NAMA_PAKET"]) ?>
                    </div>
                    <div class="productCardprice">
                        <?= "Rp " . number_format($packet["HARGA_PAKET"], 0, ',', '.'); ?> per orang
                    </div>
                    <div class="productCardinfo">
                        <span class="productCardinfo">Kapasitas Kosong : <?= $packet["KAPASITAS_PAKET"] ?> Orang</span>
                        <span class="productCardinfo">Berangkat pada <?= $packet["TANGGAL_PAKET"] ?></span>
                        <span class="productCardinfo">Tujuan : <?= $packet["DESTINASI_PAKET"] ?></span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $flag; ?>">Selengkapnya</button>
                <div class="modal fade" id="modal<?php echo $flag; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      	<img class="img" src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket">
                        <h4 class="modal-title" id="exampleModalLongTitle"><?= ucwords($packet["NAMA_PAKET"]) ?></h5>
                      </div>
                      <div class="modal-body">
                        <h5><?= $packet["KAPASITAS_PAKET"] ?> Orang</h5>
                        <h6><?= $packet["TANGGAL_PAKET"] ?></h6>
                        <p><?= $packet["DESKRIPSI_PAKET"] ?></p>
                        <p><?= $packet["DESTINASI_PAKET"] ?></p>
                        <p><?= $packet["HARGA_PAKET"] ?></p>
                      </div>
                      <div class="modal-footer">
                        <a href="pesan.php?pkt=<?= $packet["ID_PAKET"] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Pesan Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div> -->
        <?php $flag+=1;
    endforeach; ?>
	</main>
	<?php include("../../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>