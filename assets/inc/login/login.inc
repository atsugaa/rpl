<div>
  <label for="username" class="block mb-2 text-sm font-medium text-gray-900"
    >Username</label
  >
  <input
    type="text"
    name="id"
    id="id"
    value="<?php if (isset($_POST['id'])) {valinp($_POST, 'id');} ?>"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    placeholder="Masukkan Nama"
    required
  />
  <span class="text-red-600 text-xs"
    ><?php if (isset($_POST['id'])) {errMsg($errors, $_POST, 'id');} ?></span
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
  <span class="text-red-600 text-xs">
    <?php if (isset($_POST['password'])) {errMsg($errors, $_POST, 'password');} ?></span
  >
</div>
<button
  type="submit"
  name="submit"
  value="Login"
  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
>
  Masuk
</button>
