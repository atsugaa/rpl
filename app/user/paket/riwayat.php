<?php
	session_start();
	// if (!isset($_SESSION['user'])) {
	// 	header("Location: ../index.php");
	// 	exit();
	// }
    require('../../base.php');
    require("../../database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>riwayat</title>
	<link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
</head>
<body class="index-user">
	<?php include("../../../assets/inc/user/layouts/header.inc") ?>
    <main  class="w-full p-6 md:p-20 lg:p-32 ">
		<h1 class="text-2xl font-bold mb-2 sm:mb-8">RIWAYAT - PAKET</h1>
		<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
			<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
				<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
					<tr>
						<th scope="col" class="px-6 py-3">
							Product name
						</th>
						<th scope="col" class="px-6 py-3">
							Color
						</th>
						<th scope="col" class="px-6 py-3">
							Category
						</th>
						<th scope="col" class="px-6 py-3">
							Price
						</th>
						<th scope="col" class="px-6 py-3">
							
						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							Apple MacBook Pro 17"
						</th>
						<td class="px-6 py-4">
							Silver
						</td>
						<td class="px-6 py-4">
							Laptop
						</td>
						<td class="px-6 py-4">
							$2999
						</td>
						<td class="px-6 py-4">
							<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
						</td>
					</tr>
					<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							Microsoft Surface Pro
						</th>
						<td class="px-6 py-4">
							White
						</td>
						<td class="px-6 py-4">
							Laptop PC
						</td>
						<td class="px-6 py-4">
							$1999
						</td>
						<td class="px-6 py-4">
							<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
						</td>
					</tr>
					<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							Magic Mouse 2
						</th>
						<td class="px-6 py-4">
							Black
						</td>
						<td class="px-6 py-4">
							Accessories
						</td>
						<td class="px-6 py-4">
							$99
						</td>
						<td class="px-6 py-4">
							<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
						</td>
					</tr>
					<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							Google Pixel Phone
						</th>
						<td class="px-6 py-4">
							Gray
						</td>
						<td class="px-6 py-4">
							Phone
						</td>
						<td class="px-6 py-4">
							$799
						</td>
						<td class="px-6 py-4">
							<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
						</td>
					</tr>
					<tr>
						<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
							Apple Watch 5
						</th>
						<td class="px-6 py-4">
							Red
						</td>
						<td class="px-6 py-4">
							Wearables
						</td>
						<td class="px-6 py-4">
							$999
						</td>
						<td class="px-6 py-4">
							<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>	
	</main>
	<?php include("../../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>