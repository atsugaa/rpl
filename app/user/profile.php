<?php
    session_start();
    $title = "profil";
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    }
    require('../base.php');
    require("../database.php");
    $a = getAllData('user', $_SESSION["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
    <title>Profil</title>
</head>
<body class="index-user">
    <?php include("../../assets/inc/user/layouts/header.inc") ?>
    <main  class="w-full p-6 md:p-20 lg:p-32 text-center">
		<h1 class="text-2xl font-bold mb-2 sm:mb-8">Profil</h1>
        <a href="<?= BASEURL; ?>/app/user/armada/riwayat.php" class="mb-2 sm:mb-8 inline-flex w-fit items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Riwayat Penyewaan Kendaraan</a>
        <a href="<?= BASEURL; ?>/app/user/paket/riwayat.php" class="mb-2 sm:mb-8 inline-flex w-fit items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Riwayat Pemesanan Paket</a>
        <div class="w-full max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-end px-4 pt-4">
                <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                    <span class="sr-only">Open dropdown</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2" aria-labelledby="dropdownButton">
                        <li>
                            <a href="<?=BASEURL?>/app/user/edit.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="<?=BASEURL?>/app/user/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 border-2 mb-3 rounded-full shadow-lg" src="https://www.svgrepo.com/show/105517/user-icon.svg" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $a[0]["NAMA_USER"];?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?= $a[0]["TELEPON_USER"];?></span>
                <p>Alamat : <?php echo $a[0]["ALAMAT_USER"];?> </p>
                <p>Password : ****** </p>
                <!-- <div class="flex mt-4 md:mt-6">
                    <a href="<?=BASEURL?>/app/user/edit.php" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Profil</a>
                    <a href="<?=BASEURL?>/app/user/logout.php" class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Keluar</a>
                </div> -->
            </div>
        </div>
    </main> 
    <?php include("../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>