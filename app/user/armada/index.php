<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    $armadas = getTableData('kendaraan');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="index-user">
	<?php
		include("../../../assets/inc/user/layouts/header.inc");
		$flag = 1;
	?>
    <h1>HOME - ARMADA</h1>
	<div class="daftar">
    <?php foreach ($armadas as $armada) : ?>
        <div class="productCardOuter">
            <div class="productCardInner">
                <img class="img" src="<?= BASEURL; ?>/assets/img/armada/<?= $armada['GAMBAR_KENDARAAN'] ?>" alt="armada">
                <div class="productdetail">
                    <div class="productCardtitle">
                        <?= ucwords($armada["NAMA_KENDARAAN"]) ?>
                    </div>
                    <div class="productCardprice">
                        <?= "Rp " . number_format($armada["HARGA_SEWA"], 0, ',', '.'); ?> per orang
                    </div>
                    <div class="productCardinfo">
                        <ul>
                            <?php
                                $descs = explode(',', $armada["DESKRIPSI_KENDARAAN"]);
                                foreach ($descs as $desc) {
                                     echo "<li>$desc</li>";
                                 } 
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $flag; ?>">Selengkapnya</button>
                <!-- Modal -->
                <div class="modal fade" id="modal<?php echo $flag; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      	<img class="img" src="<?= BASEURL; ?>/assets/img/armada/<?= $armada['GAMBAR_KENDARAAN'] ?>" alt="paket">
                        <h4 class="modal-title" id="exampleModalLongTitle"><?= ucwords($armada["NAMA_KENDARAAN"]) ?></h5>
                      </div>
                      <div class="modal-body">
                        <ul>
                            <?php
                                $descs = explode(',', $armada["DESKRIPSI_KENDARAAN"]);
                                foreach ($descs as $desc) {
                                     echo "<li>$desc</li>";
                                 } 
                            ?>
                        </ul>
                        <p><?= $armada["HARGA_SEWA"] ?></p>
                      </div>
                      <div class="modal-footer">
                        <a href="pesan.php?pkt=<?= $armada["ID_KENDARAAN"] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Pesan Sekarang</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <?php $flag+=1;
    endforeach; ?>
	</div>
	<?php include("../../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>