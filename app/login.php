<?php
	require_once('base.php');
	require_once('database.php');
	require '../assets/inc/login/validate.inc';
	session_start();
	if (isset($_SESSION['admin'])) {
		header('location: admin/index.php');
		exit();
	} elseif (isset($_SESSION['user'])) {
		header('location: user/index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hilal Travel | Login</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css" />
</head>
  <body
    class="flex flex-col w-full h-screen lg:h-full bg-blue-600 justify-center items-center md:bg-no-repeat md:bg-cover lg:relative md:bg-image-bromo"
  >
    <!-- ======================================== START LOGIN ========================================  -->
    <div
      class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-14 lg:absolute right-36 top-[10%]"
    >
      <form class="space-y-6" action="login.php" method="POST">
        <h5 class="text-xl font-medium text-gray-900">
          Welcome to <span class="font-bold text-blue-600">Hilal Travel</span>
        </h5>
        <h2 class="text-2xl text-bold">Masuk</h2>
        <p>
          Tidak punya akun ?
          <a href="user/register.php" class="text-blue-500">Daftar</a>
        </p>
		<?php
				$inc = '../assets/inc/login/login.inc';
	            $errors = array();
	            if (isset($_POST['submit'])) {
	            	validornot($_POST, $errors, $inc);
	            } else {
	                include $inc;
	            }
			?>
      </form>
    </div>
    <!-- ===================================== END LOGIN =========================================== -->
    <div
      class="w-full h-[50vh] bg-blue-600 px-32 py-5 text-white hidden lg:block"
    >
      <a href="/index.html">
        <h1 class="text-xl">Hilal Travel</h1>
      </a>
      <div class="flex w-1/3 xl:w-1/2 items-center">
        <div class="xl:flex flex-col gap-3 hidden">
          <h2 class="text-2xl font-bold">Masuk</h2>
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
