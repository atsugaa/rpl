<div class="form-field">
	<label for="gambar">Upload Gambar : </label>
	<input type="file" name="gambar" id="gambar">
    <small> <?php if (isset($_FILES['gambar'])) {errMsg($errors, $_FILES, 'gambar');} ?> </small>
</div>
<div class="form-field">
	<label for="name">Nama Paket : </label>
	<input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) {valinp($_POST, 'nama');} else {if (isset($id)) {echo show('paket', 'nama', $id);}} ?>">
    <small> <?php if (isset($_POST['nama'])) {errMsg($errors, $_POST, 'nama');} ?> </small>
</div>
<div class="form-field">
	<label for="kapasitas"> Kapasitas : </label>
	<input type="text" name="kapasitas" id="kapasitas" value="<?php if (isset($_POST['kapasitas'])) {valinp($_POST, 'kapasitas');} else {if (isset($id)) {echo show('paket', 'kapasitas', $id);}} ?>">
    <small> <?php if (isset($_POST['kapasitas'])) {errMsg($errors, $_POST, 'kapasitas');} ?> </small>
</div>
<div class="form-field">
	<label for="harga">Harga : </label>
	<input type="text" name="harga" id="harga" value="<?php if (isset($_POST['harga'])) {valinp($_POST, 'harga');} else {if (isset($id)) {echo show('paket', 'harga', $id);}} ?>">
    <small> <?php if (isset($_POST['harga'])) {errMsg($errors, $_POST, 'harga');} ?> </small>
</div>
<div class="form-field">
	<label for="deskripsi"> Deskripsi : </label>
	<input type="text" name="deskripsi" id="deskripsi" value="<?php if (isset($_POST['deskripsi'])) {valinp($_POST, 'deskripsi');} else {if (isset($id)) {echo show('paket', 'deskripsi', $id);}} ?>">
    <small> <?php if (isset($_POST['deskripsi'])) {errMsg($errors, $_POST, 'deskripsi');} ?> </small>
</div>