<div class="mb-5">
  <label
    for="gambar"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    >Upload Gambar:</label
  >
  <input
    type="file"
    name="gambar"
    id="gambar"
    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none type="
    file
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_FILES['gambar'])) { errMsg($errors, $_FILES, 'gambar'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    for="nama"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    >Nama Paket:</label
  >
  <input
    type="text"
    name="nama"
    id="nama"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['nama'])) { valinp($_POST, 'nama'); }  else {echo show($table, 'nama', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['nama'])) { errMsg($errors, $_POST, 'nama'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="destinasi"
    >Destinasi Paket:</label
  >
  <input
    type="text"
    name="destinasi"
    id="destinasi"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['destinasi'])) { valinp($_POST, 'destinasi'); }  else {echo show($table, 'destinasi', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['destinasi'])) { errMsg($errors, $_POST, 'destinasi'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="harga"
    >Harga:</label
  >
  <input
    type="number"
    name="harga"
    id="harga"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['harga'])) { valinp($_POST, 'harga'); }  else {echo show($table, 'harga', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['harga'])) { errMsg($errors, $_POST, 'harga'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="jemput"
    >Lokasi Jemput:</label
  >
  <input
    type="text"
    name="jemput"
    id="jemput"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['jemput'])) { valinp($_POST, 'jemput'); }  else {echo show($table, 'jemput', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['jemput'])) { errMsg($errors, $_POST, 'jemput'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="kapasitas"
    >Kapasitas:</label
  >
  <input
    type="number"
    name="kapasitas"
    id="kapasitas"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['kapasitas'])) { valinp($_POST, 'kapasitas'); }  else {echo show($table, 'kapasitas', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['kapasitas'])) { errMsg($errors, $_POST, 'kapasitas'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="tanggal"
    >Tanggal Paket:</label
  >
  <input
    type="datetime-local"
    name="tanggal"
    id="tanggal"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    value="<?php if (isset($_POST['tanggal'])) { valinp($_POST, 'tanggal'); }  else {echo show($table, 'tanggal', $id);} ?>"
  />
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['tanggal'])) { errMsg($errors, $_POST, 'tanggal'); } ?>
  </small>
</div>
<div class="mb-5">
  <label
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
    for="deskripsi"
    >Deskripsi:</label
  >
  <textarea
    name="deskripsi"
    id="deskripsi"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
  >
<?php if (isset($_POST['deskripsi'])) { valinp($_POST, 'deskripsi'); }  else {echo show($table, 'deskripsi', $id);} ?></textarea
  >
  <small class="text-red-500 text-xs">
    <?php if (isset($_POST['deskripsi'])) { errMsg($errors, $_POST, 'deskripsi'); } ?>
  </small>
</div>
