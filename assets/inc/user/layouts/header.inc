<nav class="bg-blue-600 w-full border-gray-200 sticky top-0 z-10">
  <div
    class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
  >
    <a
      href="<?php echo BASEURL; ?>/app/user/index.php"
      class="flex items-center space-x-3 rtl:space-x-reverse"
    >
      <span
        class="self-center text-xl font-semibold whitespace-nowrap text-white"
        >Hilal Travel</span
      >
    </a>
    <button
      data-collapse-toggle="navbar-default"
      type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
      aria-controls="navbar-default"
      aria-expanded="false"
    >
      <svg
        class="w-5 h-5"
        aria-hidden="true"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 17 14"
      >
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15"
        />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul
        class="font-medium text-sm flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent"
      >
        <li>
          <a
            href="<?php echo BASEURL; ?>/app/user/index.php"
            class="block rounded text-white bg-blue-600 hover:bg-slate-300 md:text-black md:border-0 p-2 md:hover:bg-blue-500 hover:rounded-sm"
            aria-current="page"
            >Home</a
          >
        </li>
        <li>
          <a
            href="<?php echo BASEURL; ?>/app/user/armada/index.php"
            class="block text-gray-900 rounded hover:bg-slate-300 md:text-white md:border-0 p-2 md:hover:bg-blue-500 hover:rounded-sm"
            >Sewa Armada</a
          >
        </li>
        <li>
          <a
            href="<?php echo BASEURL; ?>/app/user/paket/index.php"
            class="block text-gray-900 rounded hover:bg-slate-300 md:text-white md:border-0 p-2 md:hover:bg-blue-500 hover:rounded-sm"
            >Paket Wisata</a
          >
        </li>
        <?php if (isset($_SESSION['id'])) { ?>
        <li>
          <a
            href="<?php echo BASEURL; ?>/app/user/profile.php"
            class="block text-gray-900 rounded hover:bg-slate-300 md:text-white md:border-0 p-2 md:hover:bg-blue-500 hover:rounded-sm"
            >Profil</a
          >
        </li>
        <?php } else { ?>
        <li>
          <a
            href="<?php echo BASEURL; ?>/app/login.php"
            class="block text-gray-900 rounded hover:bg-slate-300 md:text-white md:border-0 p-2 md:hover:bg-blue-500 hover:rounded-sm"
            >Login</a
          >
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
