<div>
  <label for="id" class="block mb-2 text-sm font-medium text-gray-900"
    >ID</label
  >
  <input
    type="text"
    name="id"
    id="id"
    value="<?php if (isset($_POST['id'])) {valinp($_POST, 'id');} ?>"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
  <span class="text-red-600 text-xs"
    ><?php if (isset($_POST['id'])) {errMsg($errors, $_POST, 'id');} ?></span
  >
</div>
<div class="flex justify-between">
  <div>
    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900"
      >Nama Lengkap</label
    >
    <input
      type="text"
      name="nama"
      id="nama"
      value="<?php if (isset($_POST['nama'])) {valinp($_POST, 'nama');} ?>"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
      required
    />
    <span class="text-red-600 text-xs">
      <?php if (isset($_POST['nama'])) {errMsg($errors, $_POST, 'nama');} ?></span
    >
  </div>
  <div>
    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900"
      >No. Telepon</label
    >
    <input
      type="text"
      name="telepon"
      id="telepon"
      placeholder="08xxxxxxxxx"
      value="<?php if (isset($_POST['telepon'])) {valinp($_POST, 'telepon');} ?>"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
      required
    />
    <span class="text-red-600 text-xs">
      <?php if (isset($_POST['telepon'])) {errMsg($errors, $_POST, 'telepon');} ?></span
    >
  </div>
</div>
<div>
  <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900"
    >Alamat</label
  >
  <input
    type="text"
    name="alamat"
    id="alamat"
    value="<?php if (isset($_POST['alamat'])) {valinp($_POST, 'alamat');} ?>"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
  <span class="text-red-600 text-xs">
    <?php if (isset($_POST['alamat'])) {errMsg($errors, $_POST, 'alamat');} ?></span
  >
</div>
<div>
  <label for="password" class="block mb-2 text-sm font-medium text-gray-900"
    >Password</label
  >
  <input
    type="password"
    name="password"
    id="password"
    placeholder="••••••••"
    value="<?php if (isset($_POST['password'])) {valinp($_POST, 'password');} ?>"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
  <span class="text-red-600 text-xs"
    ><?php if (isset($_POST['password'])) {errMsg($errors, $_POST, 'password');} ?></span
  >
</div>
<div>
  <label for="password2" class="block mb-2 text-sm font-medium text-gray-900"
    >Konfirmasi Password</label
  >
  <input
    type="password"
    name="password2"
    id="password2"
    placeholder="••••••••"
    value="<?php if (isset($_POST['password2'])) {valinp($_POST, 'password2');} ?>"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
  <span class="text-red-600 text-xs"
    ><?php if (isset($_POST['password2'])) {errMsg($errors, $_POST, 'password2');} ?></span
  >
</div>
<button
  type="submit"
  name="submit"
  value="Register"
  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
>
  Daftar
</button>
