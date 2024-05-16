<?php
	require_once('../base.php');
	require_once('../database.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hilal Travel | Daftar</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
  </head>
  <body
    class="flex flex-col w-full h-screen lg:h-full bg-blue-600 justify-center items-center md:bg-no-repeat md:bg-cover lg:relative md:bg-image-bromo"
  >
    <!-- ===================================== START DAFTAR =========================================== -->
    <div
      class="w-full max-w-[32rem] p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:px-14 md:py-12 lg:absolute right-36 top-[2%]"
    >
      <form class="space-y-6" action="register.php" method="POST">
        <h2 class="text-2xl text-bold">
          Daftar <span class="font-bold text-blue-600">Hilal Travel</span>
        </h2>
        <p>
          Sudah punya akun ?
          <a href="../login.php" class="text-blue-500">Masuk</a>
        </p>
        <?php
			$inc = BASEPATH.'/assets/inc/user/register/register.inc';
			$reg =  BASEPATH .'/assets/inc/user/register/validate.inc';
			require $reg;
			$errors = array();
			if (isset($_POST['submit'])) {
				validornot($errors, $_POST, $inc);
				if ($errors) {
					include $inc;
				} else {
					add($_POST);
					echo "<h1>Registrasi berhasil !</h1>";
					echo 'Anda akan diarahkan ke <a href="../index.php">Halaman login</a>';
					header("refresh:3;url=../index.php");
					exit();
				}
			} else {
				include $inc;
			}
		?>
      </form >
    </div>
    <!-- ===================================== END DAFTAR ============================================== -->
    <div
      class="w-full h-[50vh] bg-blue-600 px-32 py-5 text-white hidden lg:block"
    >
      <a href="#">
        <h1 class="text-xl">Hilal Travel</h1>
      </a>
      <div class="flex w-1/3 xl:w-1/2 items-center">
        <div class="xl:flex flex-col gap-3 hidden">
          <h2 class="text-2xl font-bold">Daftar</h2>
          <h3>Lorem ipsum, dolor sit amet</h3>
          <p class="text-sm">
            consectetur adipisicing elit. Accusantium tempora labore doloremque
            blanditiis aspernatur qui omnis eligendi amet debitis velit.
          </p>
        </div>
        <img
          src="<?= BASEURL ?>/assets/img/ilustrasi_login.png"
          alt=""
        />
      </div>
    </div>
    <div class="w-full h-[50vh] hidden lg:block"></div>
  </body>
</html>
