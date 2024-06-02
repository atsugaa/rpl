<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../../login.php');
    exit();
}
if (!isset($_GET['id'])) {
    header('Location: riwayat.php');
}
require_once("../../base.php");
require_once("../../database.php");
require_once(BASEPATH."/midtrans/midtrans-php/Midtrans.php");
$bayar = getBayarData('pemesanan', 'paket', $_SESSION['id'], $_GET['id']);
$user = getAllData('user', $_SESSION['id']);


//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-KXrSaZRkhJMv55RDiWbMhatN';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
$params = array(
    'transaction_details' => array(
        //ubahen order id ke $bayar[0]['ID_PEMESANAN'] nk pengen podo kro db
        'order_id' => rand(),
        'gross_amount' => $bayar[0]['TOTAL_HARGA'],
    ),
    'item_details'=> array(
        0 => array(
            'id' => $bayar[0]['ID_PAKET'],
            'price' => $bayar[0]['HARGA_PAKET'],
            'quantity' => $bayar[0]['JUMLAH_PESANAN'],
            'name' => $bayar[0]['NAMA_PAKET'],
        )
    ),
    'customer_details' => array(
        'last_name' => $user[0]['NAMA_USER'],
        'phone' => $user[0]['TELEPON_USER'],
        'shipping_address' => $bayar[0]['TITIK_JEMPUT_PEMESANAN'],
        'durasi' => $bayar[0]['JUMLAH_PESANAN'],
        'keterangan' => $bayar[0]['CATATAN_PESANAN'],
    ),
);

if ($bayar[0]['STATUS_PEMESANAN'] == 'BELUM') {
    $snapToken = \Midtrans\Snap::getSnapToken($params);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    </head>
    <body>
        <?php include("../../../assets/inc/user/layouts/header.inc") ?>
        <div class="flex my-20  justify-center items-center">
            <div class="w-1/3 ">
                <div class="mb-5">    
                    <h3>Pemesanan:</h3>
                    <ul>
                        <li><?= $bayar[0]['NAMA_PAKET'] ?> => <?= $bayar[0]['HARGA_PAKET'] ?> per orang x <?= $bayar[0]['JUMLAH_PESANAN'] ?> orang</li>
                    </ul>
                    <h4>Total: <?= "Rp " . number_format($bayar[0]['TOTAL_HARGA'], 0, ',', '.'); ?></h4>
                    <?php
                        if (isset($snapToken)) { ?>
                            <button id="pay-button" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Bayar</button>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php include("../../../assets/inc/user/layouts/footer.inc");?>

        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-Tiayd_BugnMhbfYj"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snapToken?>', {
                    // Optional
                    onSuccess: function(result){
                        var orderId = '<?php echo $bayar[0]['ID_PEMESANAN']; ?>';
                        $.ajax({
                            type: 'POST',
                            url: 'riwayat.php',
                            data: { orderId: orderId },
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                        window.location.href = 'riwayat.php';
                    },
                    // Optional
                    onPending: function(result){
                        /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result){
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    </body>
</html>