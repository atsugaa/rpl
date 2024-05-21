<h2 class="text-2xl text-bold"><?= $paket["NAMA_PAKET"]; ?></h2>
<input type="hidden" name="id_paket" id="" value="<?= $paket['ID_PAKET']?>">
<div>
  <label
    for="titik"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Tempat Penjemputan</label
  >
  <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="titik">
      <option value="" selected disabled>Pilih Titik Jemput</option>
      <?php
        $dests = explode(",", $paket["JEMPUT_PAKET"]);
        foreach ($dests as $dest) : ?>
            <option value="<?= $dest ?>" ><?= $dest ?></option>
        <?php endforeach; ?>
  </select>
</div>
<div>
  <label
    for="jumlah"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Jumlah Pesanan</label
  >
  <input
    type="number"
    name="jumlah"
    id="jumlah"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
</div>
<div>
  <label
    class="block mb-2 text-sm font-medium text-gray-900"
    >Harga<label
  >
  <input type="hidden" name="total" value="<?=$paket['HARGA_PAKET']?>">
  <h2 class="text-2xl text-bold"><?= "Rp " . number_format($paket["HARGA_PAKET"], 0, ',', '.');?> per orang</h2>
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