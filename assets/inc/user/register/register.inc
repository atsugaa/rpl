<div class="form-field">
    <label>Username :</label>
    <input type="text" name="id" id="id" value="<?php if (isset($_POST['id'])) {valinp($_POST, 'id');} ?>">
    <small> <?php if (isset($_POST['id'])) {errMsg($errors, $_POST, 'id');} ?> </small>
</div>
<div class="form-field">
    <label>Nama Lengkap :</label>
    <input type="text" name="nama" id="nama" value="<?php if (isset($_POST['nama'])) {valinp($_POST, 'nama');} ?>">
    <small> <?php if (isset($_POST['nama'])) {errMsg($errors, $_POST, 'nama');} ?> </small>
</div>
<div class="form-field">
    <label>No. Telepon :</label>
    <input type="text" name="telepon" id="telepon" value="<?php if (isset($_POST['telepon'])) {valinp($_POST, 'telepon');} ?>">
    <small> <?php if (isset($_POST['telepon'])) {errMsg($errors, $_POST, 'telepon');} ?> </small>
</div>
<div class="form-field">
    <label>Alamat :</label>
    <input type="text" name="alamat" id="alamat" value="<?php if (isset($_POST['alamat'])) {valinp($_POST, 'alamat');} ?>">
    <small> <?php if (isset($_POST['alamat'])) {errMsg($errors, $_POST, 'alamat');} ?> </small>
</div>
<div class="form-field">
    <label>Password :</label>
    <input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {valinp($_POST, 'password');} ?>">
    <small> <?php if (isset($_POST['password'])) {errMsg($errors, $_POST, 'password');} ?> </small>
</div>
<div class="form-field">
    <label>Konfirmasi Password :</label>
    <input type="password" name="password2" id="password2" value="<?php if (isset($_POST['password2'])) {valinp($_POST, 'password2');} ?>">
    <small> <?php if (isset($_POST['password2'])) {errMsg($errors, $_POST, 'password2');} ?> </small>
</div>
<div class="form-field">
    <input type="submit" name="submit" value="Register">
    Sudah memiliki akun ? <a href="../login.php">Login</a>
</div>