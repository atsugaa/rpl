<?php
    session_start();
    require('../../base.php');
    require("../../database.php");
    $title = "Paket Wisata";
    $packets = getTableData('paket');
    if (isset($_GET['pkt'])) {
        delete($_GET['pkt'], 'paket');
        header('location: index.php');
    }
        include("../../../assets/inc/admin/layouts/header.php");
        $flag = 1;
    ?>
    <div class="flex flex-col  sm:flex-row items-center justify-start mb-4">
        <a href="excel.php" class="m-6 sm:mb-0 sm:mr-4 inline-block px-4 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 whitespace-nowrap">Export Excel</a>
        <a href="tambah.php" class="m-6 w-fit inline-block items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Tambah Armada</a>
        <select name="cars" id="cars" class="m-6  border-none border-blue-500 inline-block px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 decoration-white whitespace-nowrap mr-3">
                <option value="volvo">Add Filter</option>
                <option value="saab">Sering beli</option>
                <option value="mercedes">Belum Bayar</option>
                <option value="audi">Sudah Bayar</option>
        </select>
        <div class="relative flex items-center m-6">
            <input type="text" name="search" placeholder="Cari Pemesanan" autocomplete="off" aria-label="Cari Pemesanan" class="w-full sm:w-64 pr-3 pl-10 py-2 placeholder-gray-500 text-black rounded-xl ring-gray-300 focus:ring-gray-500 focus:ring-2">
        </div>
    </div>
    <div class="overflow-x-scroll">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                <th scope="col" class="px-16 py-3">Gambar
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Kapasitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Destinasi
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="text-xs">
        <?php foreach ($packets as $packet) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4 overflow-hidden w-32">
                    <img src="<?= BASEURL; ?>/assets/img/paket/<?= $packet['GAMBAR_PAKET'] ?>" alt="paket" class="h-32 md:h-32">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <?= ucwords($packet["NAMA_PAKET"]) ?>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                  <?= ucwords($packet["KAPASITAS_PAKET"]) ?>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                  <?= ucwords($packet["TANGGAL_PAKET"]) ?>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <?= ucwords($packet["HARGA_PAKET"]) ?>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                <?php
                    echo substr($packet["DESKRIPSI_PAKET"], 0, 30);
                    if (strlen($packet["DESKRIPSI_PAKET"])>30) {
                        echo "...";
                    }
                 ?>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                  <ul class="list-disc w-24">
                    <?php
                        $dests = explode(',', $packet["DESTINASI_PAKET"]);
                        foreach ($dests as $dest) {
                            echo "<li>$dest</li>";
                        } 
                    ?>
                </ul>
                </td>
                <td class="px-6 py-4">
                    <a href="edit.php?pkt=<?= $packet["ID_PAKET"] ?>" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-3 py-1 text-center">Edit</a>
                    <!-- Button trigger modal -->
                    <button data-modal-target="popup-modal<?=$flag;?>" data-modal-toggle="popup-modal<?=$flag;?>" class="mt-3 block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded text-sm px-3 py-1 text-center type="button">
                      Hapus
                    </button>
                </td>
            </tr>
            <div id="popup-modal<?=$flag;?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal<?=$flag?>">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                      <div class="p-4 md:p-5 text-center">
                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                          </svg>
                          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda Yakin Menghapus Paket <?=$packet['NAMA_PAKET']?> ?</h3>
                          <a href="index.php?pkt=<?=$packet['ID_PAKET']?>" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                              Ya, Saya Yakin
                          </a>
                          <button data-modal-hide="popup-modal<?=$flag?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Tidak, Batal</button>
                      </div>
                  </div>
              </div>
          </div>
            <?php $flag+=1;
            
          endforeach; ?>
        </tbody>
    </table>
</div>
        
    
	<?php include("../../../assets/inc/admin/layouts/footer.php");