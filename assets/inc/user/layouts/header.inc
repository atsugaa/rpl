<?php
    if (isset($_SESSION['id'])) { ?>
        <div class=""> 
            <div class="navbar">
                <div class="leftnavbar">
                    <a href="<?php echo BASEURL; ?>/app/user/index.php" class="logo"><img class="img-logo" src="<?php echo BASEURL; ?> /assets/img/logo.jpg" alt="logo"></a>
                </div>
                <nav class="rightnavbar">
                    <ul>
                        <li><a href="<?php echo BASEURL; ?>/app/user/index.php">Home</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/user/armada/index.php">Sewa Armada</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/user/paket/index.php">Pesan Paket</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/user/profile.php">Akun</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <?php } else { ?>
        <div class=""> 
            <div class="navbar">
                <div class="leftnavbar">
                    <a href="<?php echo BASEURL; ?>/app/user/index.php" class="logo"><img class="img-logo" src="<?php echo BASEURL; ?> /assets/img/logo.jpg" alt="logo"></a>
                </div>
                <nav class="rightnavbar">
                    <ul>
                        <li><a href="<?php echo BASEURL; ?>/app/user/index.php">Home</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/user/armada/index.php">Sewa Armada</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/user/paket/index.php">Pesan Paket</a></li>
                        <li><a href="<?php echo BASEURL; ?>/app/login.php">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    <?php }
?>