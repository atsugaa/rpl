<div>
  <label
    for="titik"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Tempat Penjemputan</label
  >
  <input
    type="text"
    name="titik"
    id="titik"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
</div>
<div>
  <label
    for="password"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Durasi</label
  >
  <div
    class="flex gap-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
  >
    <label for="start" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pergi</label>
    <input class="text-sm border-0" type="date" name="start" id="start" 
      min="<?php
        $date = new DateTime(date('Y-m-d'));
        $date->modify('+2 day');
        echo $date->format('Y-m-d');
      ?>"
      max="<?php
        $date->modify('+5 day');
       echo $date->format('Y-m-d');
      ?>"
      required/>
    <label for="end" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Pulang</label>
    <input class="text-sm border-0" type="date" name="end" id="end"
      min="<?php
        $end = new DateTime(date('Y-m-d'));
        $end->modify('+3 day');
        echo $end->format('Y-m-d');
      ?>"
      max="<?php
        $end->modify('+29 day');
        echo $end->format('Y-m-d');
      ?>"
      required
    />
  </div>
</div>
<div>
  <label
    class="block mb-2 text-sm font-medium text-gray-900"
    >Harga<label
  >
  <input type="hidden" name="total" value="<?=$kendaraan['HARGA_KENDARAAN']?>">
  <h2 class="text-2xl text-bold"><?= "Rp " . number_format($kendaraan["HARGA_KENDARAAN"], 0, ',', '.');?> per hari</h2>
</div>
<div>
  <label
    for="catatan"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Catatan</label
  >
  <textarea
    type="text"
    name="catatan"
    id="catatan"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  ></textarea>
</div>
<button
  id="pay-button"
  type="submit"
  name="submit"
  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
>
  Pesan
</button>