<?php
	require_once('../base.php');
	require_once('../database.php');
	session_start();
	if (!isset($_SESSION['admin'])) {
		header("Location: ../index.php");
		exit();
	}
	include(BASEPATH."/assets/inc/admin/layouts/header.php");?>
	<div class="content_edit">
		<div class="w-full my-4 max-w-lg mx-auto">
			<h1 class="text-xl font-bold mb-5">Edit Profil</h1>
			<form action="edit.php" method="POST">
				<?php
					$table = 'user';
					$id = $_SESSION['id'];
					$inc = BASEPATH.'/assets/inc/admin/edit/edit.inc';
					require  BASEPATH .'/assets/inc/admin/edit/validate.inc';
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
	<?php include("../../assets/inc/admin/layouts/footer.php");?>
</body>
</html>