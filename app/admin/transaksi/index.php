<?php
    $title = "Transaksi";
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ../index.php");
        exit();
    }
    require('../../base.php');
    require("../../database.php");
include(BASEPATH."/assets/inc/admin/layouts/header.php");
?>
<?php include(BASEPATH."/assets/inc/admin/layouts/footer.php");?>