<div class="form-field">
    <label for="gambar">Upload Gambar:</label>
    <input type="file" name="gambar" id="gambar">
    <small> <?php if (isset($_FILES['gambar'])) { errMsg($errors, $_FILES, 'gambar'); } ?> </small>
</div>
<div class="form-field">
    <label for="nama">Nama Paket:</label>
    <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) { valinp($_POST, 'nama'); } ?>">
    <small> <?php if (isset($_POST['nama'])) { errMsg($errors, $_POST, 'nama'); } ?> </small>
</div>
<div class="form-field">
    <label for="destinasi">Destinasi Paket:</label>
    <input type="text" name="destinasi" id="destinasi" value="<?php if (isset($_POST['destinasi'])) { valinp($_POST, 'destinasi'); } ?>">
    <small> <?php if (isset($_POST['destinasi'])) { errMsg($errors, $_POST, 'destinasi'); } ?> </small>
</div>
<div class="form-field">
    <label for="harga">Harga:</label>
    <input type="number" name="harga" id="harga" value="<?php if (isset($_POST['harga'])) { valinp($_POST, 'harga'); } ?>">
    <small> <?php if (isset($_POST['harga'])) { errMsg($errors, $_POST, 'harga'); } ?> </small>
</div>
<div class="form-field">
    <label for="jemput">Lokasi Jemput:</label>
    <input type="text" name="jemput" id="jemput" value="<?php if (isset($_POST['jemput'])) { valinp($_POST, 'jemput'); } ?>">
    <small> <?php if (isset($_POST['jemput'])) { errMsg($errors, $_POST, 'jemput'); } ?> </small>
</div>
<div class="form-field">
    <label for="kapasitas">Kapasitas:</label>
    <input type="number" name="kapasitas" id="kapasitas" value="<?php if (isset($_POST['kapasitas'])) { valinp($_POST, 'kapasitas'); } ?>">
    <small> <?php if (isset($_POST['kapasitas'])) { errMsg($errors, $_POST, 'kapasitas'); } ?> </small>
</div>
<div class="form-field">
    <label for="tanggal">Tanggal Paket:</label>
    <input type="datetime-local" name="tanggal" id="tanggal" value="<?php if (isset($_POST['tanggal'])) { valinp($_POST, 'tanggal'); } ?>">
    <small> <?php if (isset($_POST['tanggal'])) { errMsg($errors, $_POST, 'tanggal'); } ?> </small>
</div>
<div class="form-field">
    <label for="deskripsi">Deskripsi:</label>
    <textarea name="deskripsi" id="deskripsi"><?php if (isset($_POST['deskripsi'])) { valinp($_POST, 'deskripsi'); } ?></textarea>
    <small> <?php if (isset($_POST['deskripsi'])) { errMsg($errors, $_POST, 'deskripsi'); } ?> </small>
</div>
