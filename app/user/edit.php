<?php
	require_once('../base.php');
	require_once('../database.php');
	session_start();
	$title = "Edit-profil";
	if (!isset($_SESSION['user'])) {
		header("Location: ../index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<link rel="stylesheet" href="<?= BASEURL ?>/dist/output.css">
	<title>Edit - User</title>
</head>
<body>
	<?php include("../../assets/inc/user/layouts/header.inc") ?>
	<div class="flex my-20  justify-center items-center">
		<div class="w-1/3 ">
			<h1 class="font-bold text-xl mb-5">Edit Profil</h1>
			<form action="edit.php" method="POST">
				<?php
					$table = 'user';
					$id = $_SESSION['id'];
					$inc = BASEPATH.'/assets/inc/user/edit/edit.inc';
					require  BASEPATH .'/assets/inc/user/edit/validate.inc';
		            $errors = array();
		            if (isset($_POST['submit'])) {
		                validornot($errors, $_POST, $inc, $id, $table);
		                if ($errors) {
				            include $inc;
				        } else {
				            edit($errors, $_POST, $id);
				            echo "<h1>Edit Profil berhasil !</h1>";
				            include $inc;
				        }
		            } else {
		                include $inc;
		            }
				?>
			</form>
		</div>
	</div>
	<?php include("../../assets/inc/user/layouts/footer.inc");?>
</body>
</html>