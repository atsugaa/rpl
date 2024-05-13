<div class="form-field">
    <label>Nama Lengkap :</label>
    <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) {valinp($_POST, 'nama');} else {echo show($table, 'nama', $id);} ?>">
    <small> <?php if (isset($_POST['nama'])) {errMsg($errors, $_POST, 'nama');} ?> </small>
</div>
<div class="form-field">
    <label>Alamat :</label>
    <input type="text" name="alamat" id="alamat" value="<?php if (isset($_POST['alamat'])) {valinp($_POST, 'alamat');} else {echo show($table, 'alamat', $id);} ?>">
    <small> <?php if (isset($_POST['alamat'])) {errMsg($errors, $_POST, 'alamat');} ?> </small>
</div>
<div class="form-field">
    <label>Nomor Telepon :</label>
    <input type="text" name="telepon" id="telepon" value="<?php if (isset($_POST['telepon'])) {valinp($_POST, 'telepon');} else {echo show($table, 'telepon', $id);} ?>">
    <small> <?php if (isset($_POST['telepon'])) {errMsg($errors, $_POST, 'telepon');} ?> </small>
</div>
<div class="form-field">
    <input type="submit" name="submit" value="Edit Profil">
</div>