<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: ../../login.php");
		exit();
	}
    require('../../base.php');
    require("../../database.php");
    $riwayats = getUserData('penyewaan', 'kendaraan', $_SESSION['id']);
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
								<a href="pembayaran.php?id=<?= $riwayat['ID_PENYEWAAN'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>	
	</main>

	<?php include("../../../assets/inc/user/layouts/footer.inc");?>

</body>
</html>