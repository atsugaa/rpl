<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    $title = "Dashboard";
    require('../base.php');
    require("../database.php");
    setExpireStatus();

    $incomes = getPemesananByMonth();
    $arr = [ 'January','February','March','April','May','June','July','August','September','October',
    'November','December'];
    $temp = [];
    foreach($arr as $i){
        $temp[$i] = 0;
    }
    foreach($incomes as $i){
        $temp[$i['bulan']] = $i['harga'];
    }
    include(BASEPATH."/assets/inc/admin/layouts/header.php");
?>
<div class="flex justify-evenly flex-wrap col-gap-2">
    <div class="w-60 h-36 p-4 bg-blue-50 rounded mx-1 my-3">
        <svg class="flex-shrink-0 w-12 h-12  text-blue-400 transition duration-75 group-hover:text-black dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
        </svg>
        <p class="text-gray-500 text-sm my-2">Semua Pesanan</p>
        <h3 class="text-right font-bold text-2xl"><?= getJumlahPesanan()['jml'] ?></h3>
    </div>
    <div class="w-60 h-36 p-4 bg-red-50 rounded mx-1 my-3">
        <svg class="flex-shrink-0 w-12 h-12  text-red-400 transition duration-75 group-hover:text-black dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
        </svg>
        <p class="text-gray-500 text-sm my-2">Pesanan Selesai</p>
        <h3 class="text-right font-bold text-2xl"><?= getJumlahPesanan('selesai')['jml'] ?></h3>
    </div>
    <div class="w-60 h-36 p-4 bg-yellow-50 rounded mx-1 my-3">
        <svg class="flex-shrink-0 w-12 h-12  text-yellow-400 transition duration-75 group-hover:text-black dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
        </svg>
        <p class="text-gray-500 text-sm my-2">Total Pendapatan</p>
        <h3 class="text-right font-bold text-2xl">Rp. <?=  number_format(getPendapatan()['harga'], 0, ',', '.'); ?>,-</h3>
    </div>
    <div class="w-60 h-36 p-4 bg-gradient-to-tl from-yellow-200 to-yellow-400 rounded mx-1 my-3">
    <svg class="flex-shrink-0 w-12 h-12  text-white transition duration-75 group-hover:text-black dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
        </svg>
        <p class="text-white text-sm my-2">Jumlah Pengguna</p>
        <h3 class="text-right font-bold text-2xl"><?= getAllUsers()['jumlah'] ?></h3>
    </div>
    </div>
    <div class="w-full  flex justify-center items-center flex-col p-12 gap-3">
        <h3 class="font-bold text-2xl">Data History PemesanaN Tahun 2024</h3>
        <!-- <img class="h-[65vh]" src="https://www.jaspersoft.com/content/dam/jaspersoft/images/graphics/infographics/column-chart-example.svg" alt=""> -->
        <!-- <a href="excel.php" class="px-6 py-2 bg-blue-600 text-white rounded">Cetak</a> -->

        <div class="w-full">
            <canvas id="myChart"></canvas>
        </div>

        <!-- cetak excel -->
        <a href="excel.php" class="px-6 py-2 bg-blue-600 text-white rounded">Cetak</a>
    </div>
    <?php include(BASEPATH."/assets/inc/admin/layouts/footer.php");?>

    <!-- end container-kanan -->
    <script src="<?= BASEURL ?>/node_modules/chart.js/dist/chart.umd.js"></script>
    <script>
        let label = [];
        let datas = [];
        <?php foreach ($temp as $tmp => $v ): ?>
            label.push("<?= $tmp ?>");
            datas.push(<?= $v ?>);
        <?php endforeach; ?>
        const chart = document.getElementById('myChart');
        const data = {
            labels : label,
            datasets: [{
                label: 'Pendapatan per bulan',
                data: datas,
                backgroundColor: [
                'rgb(45, 212, 191)'
                ],
                borderColor: [
                'rgb(37, 99, 235)',
                ],
                borderWidth: 1,
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'bar',
            data: data,
        };
        new Chart(chart, config);
    </script>
    