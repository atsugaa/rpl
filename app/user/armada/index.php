<?php
    session_start();
    $title = "armada";
    require('../../base.php');
    require("../../database.php");
    $armadas = getTableData('kendaraan');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <title>Home</title>
</head>
<body class="index-user">
    <header class="inline">
        <?php
		include("../../../assets/inc/user/layouts/header.inc");
		$flag = 1;
        ?>
        <!-- ========================================== START JUMBOTRON ================================================ -->
        <div
        style="background-image: url(<?=BASEURL?>/assets/img/unsplash_ujjgyvWwMZU.jpg)"
            class="w-full flex justify-center items-center px-5 py-16 md:h-[50vh] lg:h-[70vh] bg-no-repeat bg-cover bg-center bg-fixed"
        >
            <div
            class="flex flex-col items-center justify-between gap-5 bg-slate-50 bg-opacity-35 p-5 md:py-12 md:px-23 lg:p-24 rounded-3xl backdrop-blur-sm text-center max-w-lg md:max-w-none"
            >
            <h2 class="text-white font-bold text-2xl">Sewa Armada</h2>
            <p class="text-white text-sm max-w-md md:max-w-lg">
                Armada kami memiliki pengalaman perjalanan yang nyaman dan aman,
                dengan armada terbaik dan sopir yang berpengalaman.
            </p>
            <form
                target="_blank"
                method="get"
                class="flex flex-col md:flex-row gap-6 bg-white p-6 md:py-1 md:px-4 rounded-xl w-full lg:rounded-full text-left md:items-center"
            >
                <label for="start" class="font-bold">Tanggal Pergi</label>
                <input class="text-sm border-0" type="date" name="start" id="start" />
                <label for="end" class="font-bold">Tanggal Pulang</label>
                <input class="text-sm border-0" type="date" name="end" id="end" />
                <input
                class="bg-blue-600 text-white p-2 md:px-3 md:p-1 rounded-md"
                type="submit"
                name="submit"
                value="cek"
                />
            </form>
            </div>
        </div>
    </header>
	<main
      class="flex gap-0 flex-wrap justify-center lg:justify-evenly gap-y-20 p-6 sm:p-9 md:p-28 bg-slate-50"
    >
    <?php foreach ($armadas as $armada) : ?>
        <div
        class="flex flex-col gap-5 p-4 rounded-xl w-10/12 bg-white drop-shadow-lg sm:w-[400px]"
      >
        <div class="flex flex-col md:flex-row md:items-center gap-6">
          <img src="<?= BASEURL; ?>/assets/img/armada/<?= $armada['GAMBAR_KENDARAAN'] ?>" class="wfull md:w-40" alt="" />
          <div
            class="flex justify-between items-center md:flex-col md:items-start gap-4"
          >
            <div>
              <h2 class="text-2xl font-bold"> <?= ucwords($armada["NAMA_KENDARAAN"]) ?></h2>
              <p><?= "Rp " . number_format($armada["HARGA_KENDARAAN"], 0, ',', '.'); ?></p>
            </div>
            <?php if (isset($_GET['submit'])) {
                if (checkSpecArmadaStatus($armada['ID_KENDARAAN'], $_GET['start'], $_GET['end'])) { ?>
                    <a href="<?=BASEURL?>/app/user/armada/sewa.php?id=<?=$armada['ID_KENDARAAN']?>" class="bg-blue-600 py-2 px-3 rounded-xl text-white"
                       >Pesan</a
                    >
                <?php } else { ?>
                <button href="" class="bg-blue-600 py-2 px-3 rounded-xl text-white" disabled
                   >Armada Tidak Tersedia</button
                >
            <?php }
            } else {
                if (checkArmadaStatus($armada['ID_KENDARAAN'])) { ?>
                <a href="<?=BASEURL?>/app/user/armada/sewa.php?id=<?=$armada['ID_KENDARAAN']?>" class="bg-blue-600 py-2 px-3 rounded-xl text-white"
                   >Pesan</a
                >
            <?php } else { ?>
                <button href="" class="bg-blue-600 py-2 px-3 rounded-xl text-white" disabled
                   >Armada Tidak Tersedia</button
                >
            <?php }
            } ?>
          </div>
        </div>
        <div class="text-gray-600">
          <h2 class="font-bold">Fasilitas</h2>
          <ul class="list-disc text-sm pl-7">
            <?php
                $descs = explode(',', $armada["DESKRIPSI_KENDARAAN"]);
                foreach ($descs as $desc) {
                        echo "<li>$desc</li>";
                    } 
            ?>
          </ul>
        </div>
      </div>
        <?php $flag+=1;
    endforeach; ?>
    </main>
	<?php include("../../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>