<div>
  <label
    for="titik"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Tempat Penjemputan :</label
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
    for="start"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Tanggal Sewa :</label
  >
  <input
    type="date"
    name="start"
    id="start"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    
    min="<?php
      $date = new DateTime(date('Y-m-d'));
      $date->modify('+2 day');
      echo $date->format('Y-m-d');
    ?>"
    max="<?php
      $date->modify('+5 day');
      echo $date->format('Y-m-d');
    ?>"
    required
  />
</div>
<div>
  <label
    for="end"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Tanggal Kembali :</label
  >
  <input
    type="date"
    name="end"
    id="end"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    
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
<div>
  <label
    for="catatan"
    class="block mb-2 text-sm font-medium text-gray-900"
    >Catatan :</label
  >
  <input
    type="textarea"
    name="catatan"
    id="catatan"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    required
  />
</div>
<button
  type="submit" id="pay-button"
  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
>
  Pesan
</button>