<div class="form-field">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap :</label>
    <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) {valinp($_POST, 'nama');} else {echo show($table, 'nama', $id);} ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <small> <?php if (isset($_POST['nama'])) {errMsg($errors, $_POST, 'nama');} ?> </small>
</div>
<div class="form-field">
    <label class="block mt-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat :</label>
    <input type="text" name="alamat" id="alamat" value="<?php if (isset($_POST['alamat'])) {valinp($_POST, 'alamat');} else {echo show($table, 'alamat', $id);} ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <small> <?php if (isset($_POST['alamat'])) {errMsg($errors, $_POST, 'alamat');} ?> </small>
</div>
<div class="form-field">
    <label class="block mt-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon :</label>
    <input type="text" name="telepon" id="telepon" value="<?php if (isset($_POST['telepon'])) {valinp($_POST, 'telepon');} else {echo show($table, 'telepon', $id);} ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <small> <?php if (isset($_POST['telepon'])) {errMsg($errors, $_POST, 'telepon');} ?> </small>
</div>
<div class="form-field">
    <input type="submit" name="submit" value="Edit Profil" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
</div>