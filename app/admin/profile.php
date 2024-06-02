<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    $title = "Profil";
    require('../base.php');
    require("../database.php");
    include("../../assets/inc/admin/layouts/header.php") ?>
        <?php $a = getAllData('user', $_SESSION["id"]);?>
    <main  class="w-full p-6 md:p-20 lg:p-32 text-center">
		<h1 class="text-2xl font-bold mb-2 sm:mb-8">Profil</h1>
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
                            <a href="<?=BASEURL?>/app/admin/edit.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <a href="<?=BASEURL?>/app/admin/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
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
            </div>
        </div>
    </main> 
    <?php include("../../assets/inc/admin/layouts/footer.php");?>