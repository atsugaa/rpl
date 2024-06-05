<?php
    $title = "Transaksi";
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    require('../../base.php');
    require("../../database.php");
    include(BASEPATH."/assets/inc/admin/layouts/header.php");
    $transactions = getAllPemesanan();
?>
    
<div class="container mx-auto p-4">
    <div class="flex flex-col  sm:flex-row items-center justify-start mb-4">
        <a href="excel.php" class="m-6 sm:mb-0 sm:mr-4 inline-block px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 whitespace-nowrap">Export Excel</a>
        <select name="cars" id="cars" class="m-6 border-white border-none inline-block px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 whitespace-nowrap mr-3">
                <option value="volvo">Add Filter</option>
                <option value="saab">Sering beli</option>
                <option value="mercedes">Belum Bayar</option>
                <option value="audi">Sudah Bayar</option>
        </select>
        <div class="m-6 relative flex items-center">
            <input type="text" name="search" placeholder="Cari Pemesanan" autocomplete="off" aria-label="Cari Pemesanan" class="w-full sm:w-64 pr-3 pl-10 py-2 placeholder-gray-500 text-black rounded-xl ring-gray-300 focus:ring-gray-500 focus:ring-2">
        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <div class="min-w-full flex justify-center">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Nama</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Id Pemesan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">No Telepon</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Titik Jemput</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center w-32">Catatan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Pesanan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Total Harga</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Status</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach($transactions as $transaction): ?>
                    <tr>
                        <td class="p-3 text-sm tracking-wide text-left">
                            <div class="flex items-center">
                                <img class="rounded-full w-10 h-10" src="<?=BASEURL?>/assets/img/man.png" alt="icon man">
                                <p class="ml-3"><?= $transaction['ID_USER'] ?></p>
                            </div>
                        </td>
                        <td class="p-3 text-sm tracking-wide text-left whitespace-nowrap"><?= $transaction['ID_PEMESANAN']  ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['ID_PEMESANAN']  ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['TITIK_JEMPUT_PEMESANAN'] ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['CATATAN_PESANAN'] ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['ID_PAKET']  ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['TOTAL_HARGA'] ?></td>
                        <td class="p-3 text-sm tracking-wide text-left"><?= $transaction['STATUS_PEMESANAN'] ?></td>
                        <td class="p-3 text-sm tracking-wide text-left">
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include(BASEPATH."/assets/inc/admin/layouts/footer.php"); ?>