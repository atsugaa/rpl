<div class="form-field">
    <label for="gambar">Upload Gambar : </label>
    <input type="file" name="gambar" id="gambar">
    <small> <?php if (isset($_FILES['gambar'])) { errMsg($errors, $_FILES, 'gambar'); } ?> </small>
</div>
<div class="form-field">
    <label for="nama">Nama Kendaraan : </label>
    <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) { valinp($_POST, 'nama'); } ?>">
    <small> <?php if (isset($_POST['nama'])) { errMsg($errors, $_POST, 'nama'); } ?> </small>
</div>
<div class="form-field">
    <label for="harga">Harga Kendaraan : </label>
    <input type="text" name="harga" id="harga" value="<?php if (isset($_POST['harga'])) { valinp($_POST, 'harga'); } ?>">
    <small> <?php if (isset($_POST['harga'])) { errMsg($errors, $_POST, 'harga'); } ?> </small>
</div>
<div class="form-field">
    <label for="deskripsi">Deskripsi Kendaraan : </label>
    <input type="text" name="deskripsi" id="deskripsi" value="<?php if (isset($_POST['deskripsi'])) { valinp($_POST, 'deskripsi'); } ?>">
    <small> <?php if (isset($_POST['deskripsi'])) { errMsg($errors, $_POST, 'deskripsi'); } ?> </small>
</div>
