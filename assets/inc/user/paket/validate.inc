<?php

    //display err msg
    function errMsg($data, $post, $val) {
        if (isset($data[$val])) {
            echo $data[$val];
        }
    }
    //validate all
    function validornot(&$errors, $post, $paket) {
        $sisa = $paket['KAPASITAS_PAKET'] - $post['jumlah'];
        if ($sisa < 0) {
            $errors['jumlah'] = '*Slot hanya tersisa '.$paket["KAPASITAS_PAKET"].' orang';
        }
    }
?>