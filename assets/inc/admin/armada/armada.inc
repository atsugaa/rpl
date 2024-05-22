<div>
  <div class="mb-5">
    <label
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      for="gambar"
      >Gambar</label
    >
    <input type="file" name="gambar" id="gambar" class="block w-full text-sm
    text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
    focus:outline-none type="file">
    <small class="text-red-500 text-xs">
      <?php if (isset($_FILES['gambar'])) { errMsg($errors, $_FILES, 'gambar'); } ?>
    </small>
  </div>
  <div class="mb-5">
    <label
      for="nama"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >Nama Kendaraan
    </label>
    <input
      type="text"
      name="nama"
      id="nama"
      value="<?php if (isset($_POST['nama'])) { valinp($_POST, 'nama'); } ?>"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    />
    <small class="text-red-500 text-xs">
      <?php if (isset($_POST['nama'])) { errMsg($errors, $_POST, 'nama'); } ?>
    </small>
  </div>
  <div class="mb-5">
    <label
      for="harga"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >Harga Kendaraan
    </label>
    <input
      type="text"
      name="harga"
      id="harga"
      value="<?php if (isset($_POST['harga'])) { valinp($_POST, 'harga'); } ?>"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    />
    <small class="text-red-500 text-xs">
      <?php if (isset($_POST['harga'])) { errMsg($errors, $_POST, 'harga'); } ?>
    </small>
  </div>
  <div class="mb-5">
    <label
      for="deskripsi"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >Deskripsi Kendaraan
    </label>
    <input
      type="text"
      name="deskripsi"
      id="deskripsi"
      value="<?php if (isset($_POST['deskripsi'])) { valinp($_POST, 'deskripsi'); } ?>"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    />
    <small class="text-red-500 text-xs">
      <?php if (isset($_POST['deskripsi'])) { errMsg($errors, $_POST, 'deskripsi'); } ?>
    </small>
  </div>
</div>
