<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dist/output.css" />
    <title>Hilal Travel | Paket Wisata</title>
  </head>
  <body>
    <header>
      <nav
        class="w-full flex justify-between py-4 lg:py-5 px-6 md:px-8 lg21vw2 bg-blue-600 text-white"
      >
        <div class="company">
          <a href="/">
            <h2 class="text-xl font-semibold tracking-wide">Hilal Travel</h2>
          </a>
        </div>
        <div class="menu">
          <img src="img/Vector.png" alt="" class="block sm:hidden" />
          <ul class="hidden sm:flex justify-between w-96 lg:w-[430px]">
            <li>
              <a
                href="/index.html"
                class="p-2 hover:bg-blue-500 hover:rounded-sm hover:font-bold tracking-wide text-sm"
                >Home</a
              >
            </li>
            <li>
              <a
                href="/sewaArmada.html"
                class="p-2 hover:bg-blue-500 hover:rounded-sm hover:font-bold tracking-wide text-sm"
                >Sewa Armada</a
              >
            </li>
            <li>
              <a
                href="paketWisata.html"
                class="p-2 hover:bg-blue-500 hover:rounded-sm hover:font-bold tracking-wide text-sm"
                >Paket Wisata</a
              >
            </li>
            <li>
              <a
                href="login.html"
                class="p-2 hover:bg-blue-500 hover:rounded-sm hover:font-bold tracking-wide text-sm"
                >Login</a
              >
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main class="flex justify-center p-16">
      <div
        class="w-1/2 p-4 bg-white border border-gray-200 rounded-lg backdrop-blur-xl sm:p-6 md:p-14"
      >
        <h5 class="text-xl font-medium text-gray-900 text-center">
          From Reservasi
        </h5>
        <form class="space-y-6" action="#">
          <h2 class="text-2xl text-bold">Wisata Bromo</h2>
          <div>
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Nama Lengkap</label
            >
            <input
              type="text"
              name="name"
              id="name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <span class="text-red-600 text-xs">Nama tidak sesuai</span>
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >No Telp</label
            >
            <input
              type="text"
              name="tempat"
              id="tampat"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <span class="text-red-600 text-xs">No Telp tidak sesuai</span>
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Point Penjemputan</label
            >
            <input
              type="text"
              name="tempat"
              id="tampat"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            />
            <span class="text-red-600 text-xs">Tempat tidak sesuai</span>
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
              <label for="" class="">Tanggal Pergi</label>
              <input class="text-sm border-0" type="date" name="" id="" />
              <label for="" class="">Tanggal Pulang</label>
              <input class="text-sm border-0" type="date" name="" id="" />
            </div>
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Harga</label
            >
            <h2 class="text-2xl text-bold">Rp. 2.000.000,-</h2>
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900"
              >Keterangan</label
            >
            <textarea
              type="ket"
              name="password"
              id="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              required
            ></textarea>
            <span class="text-red-600 text-xs">Password tidak sesuai</span>
          </div>
          <button
            type="submit"
            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >
            Masuk
          </button>
        </form>
      </div>
    </main>
    <footer
      class="flex flex-col-reverse md:flex-row justify-center gap-y-6 md:justify-evenly items-center py-12 md:p-28 bg-blue-600"
    >
      <div class="w-[70vw] text-white text-sm text-center md:text-left">
        <h1 class="md:text-3xl font-bold text-xl mb-6">Hubungi kami</h1>
        <ul>
          <li>
            <img src="" alt="" />
            <h3>
              Dsn. Kejambon Ds. Gondang Kec. Gondang Kab. Mojokerto, Jawa Timur
            </h3>
          </li>
          <li>
            <img src="" alt="" />
            <h3>pt.hilaltrans</h3>
          </li>
          <li>
            <img src="" alt="" />
            <h3>Puma. Tour</h3>
          </li>
          <li>
            <img src="" alt="" />
            <h3>085553-535-353</h3>
          </li>
        </ul>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4323.908650200603!2d112.49006259076637!3d-7.614320684708444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7873cf733e4c99%3A0xefeba1a30ca5c076!2sSMAS%20ISLAM%20DIPONEGORO%20GONDANG%20MOJOKERTO!5e0!3m2!1sid!2sid!4v1715310800182!5m2!1sid!2sid"
        class="w-3/4 sm:w-1/2 lg:w-[45%] aspect-square"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </footer>
    <div class="w-full text-sm bg-black text-center p-3 text-white">
      Copyright 2024 | PT. Hilal Paripurna Purnama
    </div>
  </body>
</html>
