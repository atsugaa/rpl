<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    $packets = getTableData('paket');
    if (isset($_GET['pkt'])) {
        delete($_GET['pkt'], 'paket');
        header('location: index.php');
    }
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
        include("../../../assets/inc/admin/layouts/header.inc");
        $flag = 1;
    ?>
    <h1>HOME - PAKET</h1>
	<div class="daftar">
    <?php foreach ($packets as $packet) : ?>
        <div>
            <img class="img" src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket">
            <p><?= ucwords($packet["NAMA_PAKET"]) ?></p>
            <p><?= ucwords($packet["ID_PAKET"]) ?></p>
            <ul>
                <?php
                    $dests = explode(',', $packet["DESTINASI_PAKET"]);
                    foreach ($dests as $dest) {
                         echo "<li>$dest</li>";
                     } 
                ?>
            </ul>
            <p><?= ucwords($packet["KAPASITAS_PAKET"]) ?> Orang</p>
            <p><?= ucwords($packet["TANGGAL_PAKET"]) ?></p>
            <p><?= ucwords($packet["HARGA_PAKET"]) ?></p>
            <p>
                <?php
                    echo substr($packet["DESKRIPSI_PAKET"], 0, 30);
                    if (strlen($packet["DESKRIPSI_PAKET"])>30) {
                        echo "...";
                    }
                 ?>
            </p>
            <a href="edit.php?pkt=<?= $packet["ID_PAKET"] ?>">Edit</a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?php echo $flag; ?>">
              Hapus
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Modal<?php echo $flag; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Anda yakin ingin menghapus paket <?= $packet["NAMA_PAKET"] ?> ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="index.php?pkt=<?= $packet["ID_PAKET"] ?>" role="button">Hapus</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php $flag+=1;
    endforeach; ?>
	</div>
	<?php include("../../../assets/inc/admin/layouts/footer.inc");?>
</body>
</html>