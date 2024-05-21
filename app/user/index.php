<?php
	session_start();
    $title = "home";
    require('../base.php');
    require("../database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
</head>
<body class="index-user">
    <header class="inline">
        <?php include("../../assets/inc/user/layouts/header.inc") ?>
        <div
        style="background-image:url(<?=BASEURL?>/assets/img/unsplash_ujjgyvWwMZU.jpg)"
        class="w-full h-[40vh] md:h-[50vh] lg:h-[70vh] bg-no-repeat bg-cover bg-center bg-fixed"
      >
        <div
          class="w-full h-[40vh] md:h-[50vh] lg:h-[70vh] bg-black bg-opacity-35 flex justify-center items-center"
        >
          <h1 class="text-2xl md:text-4xl lg:text-5xl text-center text-white">
            <span class="font-bold text-3xl md:text-5xl lg:text-6xl"
              >One Stop<br />Travel Solutions</span
            ><br />Your Journey, Our Pleasure
          </h1>
        </div>
      </div>
       <!-- ========================================== END JUMBOTRON ================================================== -->
    </header>
    <main class="bg-slate-100">
      <!-- ========================= START PILIHAN ========================= -->
      <section
        class="w-full py-5 md:py-9 lg:py-20 flex flex-col md:flex-row justify-evenly items-center text-white"
      >
        <a href="<?=BASEURL?>/app/user/armada/index.php">
          <div
            class="w-[280px] h-[190px] sm:w-[360px] sm:h-[250px] md:w-[37vw] md:h-[22vw] bg-blue-600 rounded-lg overflow-hidden flex items-center drop-shadow-xl flex-col my-3"
          >
            <div class="overflow-hidden h-[290px] w-full">
              <img
                src="<?=BASEURL?>/assets/img/63fdb9789cf09.jpg"
                class="hover:scale-125 duration-75"
                alt=""
              />
            </div>
            <h2 class="font-bold m-2 lg:m-3">Sewa Armada</h2>
          </div>
        </a>
        <a href="<?=BASEURL?>/app/user/paket/index.php">
          <div
            class="w-[280px] h-[190px] sm:w-[360px] sm:h-[250px] md:w-[37vw] md:h-[22vw] bg-blue-600 rounded-lg overflow-hidden flex items-center drop-shadow-xl flex-col my-3"
          >
            <div class="overflow-hidden h-[290px] w-full">
              <img
                src="<?=BASEURL?>/assets/img/63fdb9789cf09.jpg"
                class="hover:scale-125 duration-75"
                alt=""
              />
            </div>
            <h2 class="font-bold m-2 lg:m-3">Paket Wisata</h2>
          </div>
        </a>
      </section>
      <!-- ========================= END PILIHAN ========================= -->
      <!-- ========================= START KENAPA HILAL ========================= -->
      <section
        class="w-full py-20 flex flex-col md:flex-row justify-evenly items-center"
      >
        <div class="w-80 mb-12">
          <img src="<?=BASEURL?>/assets/img/63fdb9789cf09.jpg" alt="" />
        </div>
        <div class="w-[78vw] md:w-[37vw]">
          <h2 class="text-2xl md:text-4xl font-extrabold mb-4 text-center">
            Kenapa Hilal Travel ?
          </h2>
          <div>
            <ol class="list-decimal font-bold">
              <li>
                <h2 class="font-xl mt-3">Berpengalan dan Terpercaya</h2>
                <p class="font-normal text-sm md:text-base">
                  Hilal Travel berpengalaman melayani perjalanan dan wisata.
                  Dipercaya oleh jutaan orang yang telah menikmati layanan Hilal
                  Travel.
                </p>
              </li>
              <li>
                <h2 class="font-xl mt-3">Mudah dan Felxibel</h2>
                <p class="font-normal text-sm md:text-base">
                  Siap membantu kemana pun tujuan anda dalam dan luar negeri,
                  apapun keperluan anda, wisata, gathering, study tour, kuliah
                  lapang, studi banding, dan lainnya. Fleksibel sesuai kebutuhan
                  anda.
                </p>
              </li>
              <li>
                <h2 class="font-xl mt-3">Profesional dan Ramah</h2>
                <p class="font-normal text-sm md:text-base">
                  Perjalanan anda semakin menyenangkan karena didampingi oleh
                  tim yang profesional, ramah, dan berpengalaman ciri khas
                  pelayanan hangat tim Hilal Travel.
                </p>
              </li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ========================= END KENAPA HILAL ========================= -->
      <!-- ========================= START PENDAPAT ========================= -->
      <section
        class="w-full hidden md:flex flex-col items-center justify-center pb-32"
      >
        <h1 class="m-12 text-2xl font-bold">Pendapat Meraka Tentang Kami</h1>
        <div class="flex justify-evenly lg:justify-center w-full lg:gap-10">
          <div
            class="w-40 h-48 lg:w-52 lg:h-64 rounded-md text-center py-5 px-3 bg-white drop-shadow-lg"
          >
            <h2 class="font-bold mb-3">Ibu May</h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. A,
              quasi.
            </p>
          </div>
          <div
            class="w-40 h-48 lg:w-52 lg:h-64 rounded-md text-center py-5 px-3 bg-white drop-shadow-lg"
          >
            <h2 class="font-bold mb-3">Ibu May</h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. A,
              quasi.
            </p>
          </div>
          <div
            class="w-40 h-48 lg:w-52 lg:h-64 rounded-md text-center py-5 px-3 bg-white drop-shadow-lg"
          >
            <h2 class="font-bold mb-3">Ibu May</h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. A,
              quasi.
            </p>
          </div>
          <div
            class="w-40 h-48 lg:w-52 lg:h-64 rounded-md text-center py-5 px-3 bg-white drop-shadow-lg"
          >
            <h2 class="font-bold mb-3">Ibu May</h2>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. A,
              quasi.
            </p>
          </div>
        </div>
      </section>
      <!-- ========================= END PENDAPAT ========================= -->
    </main>

	<?php include("../../assets/inc/user/layouts/footer.inc");?>
  <script src="<?=BASEURL?>/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>