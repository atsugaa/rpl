<div class="login">
    <div class="form-field">
        <label>Username :</label>
        <input type="text" name="id" id="id" value="<?php if (isset($_POST['id'])) {valinp($_POST, 'id');} ?>">
        <small> <?php if (isset($_POST['id'])) {errMsg($errors, $_POST, 'id');} ?> </small>
    </div>
    <div class="form-field">
        <label>Password :</label>
        <input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {valinp($_POST, 'password');} ?>">
        <small> <?php if (isset($_POST['password'])) {errMsg($errors, $_POST, 'password');} ?> </small>
    </div>
    <div class="form-field">
        <input type="submit" name="submit" value="Login">
        Belum memiliki akun ? <a href="user/register.php">Register</a>
    </div>
</div>
