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
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $transactions = getTableDataPagination('pemesanan', $currentPage);
    if (count(getAllPemesanan()) > 10) {
        $totalPages = round(count(getAllPemesanan()) / 10);
    } else {
        $totalPages = 1;
    }

    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages && $totalPages > 0) {
        $currentPage = $totalPages;
    }

?>
    
<div class="container mx-auto p-4">
    <div class="flex flex-col  sm:flex-row items-center justify-start mb-4">
        <a href="excel.php" class="m-6 sm:mb-0 sm:mr-4 inline-block px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 whitespace-nowrap">Export Excel</a>
    </div>

    <div class="overflow-x-auto w-full">
        <div class="min-w-full flex justify-center">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-center">Nama</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Id Pemesan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">No Telepon</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Titik Jemput</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center w-32">Catatan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Pesanan</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Total Harga</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach($transactions as $transaction): ?>
                    <tr>
                        <td class="p-3 text-sm tracking-wide text-left">
                            <div class="flex items-center">
                                <img class="rounded-full w-10 h-10" src="<?=BASEURL?>/assets/img/man.webp" alt="icon man">
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
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <nav aria-label="Page navigation example">
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
</div>

<?php include(BASEPATH."/assets/inc/admin/layouts/footer.php"); ?>