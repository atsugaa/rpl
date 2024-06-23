<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: ../../login.php");
		exit();
	}
    require('../../base.php');
    require("../../database.php");
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $riwayats = getUserDataPagination('penyewaan', 'kendaraan', $_SESSION['id'], $currentPage);
    if (count(getUserData('penyewaan', 'kendaraan', $_SESSION['id'])) > 10) {
        $totalPages = round(count(getUserData('penyewaan', 'kendaraan', $_SESSION['id'])) / 10);
    } else {
        $totalPages = 1;
    }

    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages && $totalPages > 0) {
        $currentPage = $totalPages;
    }
    if (isset($_POST['orderId'])) {
	    updateOrderStatus($_POST['orderId'], $_POST['armadaId'], $_POST['qty'], 'penyewaan');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <title>Riwayat</title>
</head>
<body class="index-user">
	<?php include("../../../assets/inc/user/layouts/header.inc") ?>
    
	<main  class="w-full p-6 md:p-20 lg:p-32 ">
		<h1 class="text-2xl font-bold mb-2 sm:mb-8">RIWAYAT - ARMADA</h1>
		<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
			<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							Tanggal Sewa
						</th>
						<th scope="col" class="px-6 py-3">
							Nama Kendaraan
						</th>
						<th scope="col" class="px-6 py-3">
							Durasi Sewa
						</th>
						<th scope="col" class="px-6 py-3">
							Total Harga
						</th>
						<th scope="col" class="px-6 py-3">
							Titik Jemput
						</th>
						<th scope="col" class="px-6 py-3">
							Status Bayar
						</th>
						<th scope="col" class="px-6 py-3">
							Aksi
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($riwayats as $riwayat) : ?>
						<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
							<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
								<?= $riwayat['TANGGAL_PENYEWAAN'] ?>
							</th>
							<td class="px-6 py-4">
								<?= $riwayat['NAMA_KENDARAAN'] ?>
							</td>
							<td class="px-6 py-4">
								<?= $riwayat['DURASI_PENYEWAAN'] ?> Hari
							</td>
							<td class="px-6 py-4">
								<?= "Rp " . number_format($riwayat['TOTAL_HARGA'], 0, ',', '.'); ?>
							</td>
							<td class="px-6 py-4">
								<?= $riwayat['TITIK_JEMPUT_PENYEWAAN'] ?>
							</td>
							<td class="px-6 py-4">
								<?= $riwayat['STATUS_PENYEWAAN'] ?>
							</td>
							<td class="px-6 py-4">
								<a href="pembayaran.php?id=<?= $riwayat['ID_PENYEWAAN'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<nav class="w-full flex justify-center my-4">
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
	</main>

	<?php include("../../../assets/inc/user/layouts/footer.inc");?>

</body>
</html>