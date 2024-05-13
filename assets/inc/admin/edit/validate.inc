
<?php
    //required & email terdaftar atau tidak
    function validate(&$errors, $field_list, $field_name, $pattern, $errMsg, $id, $table) {
        if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
            $errors[$field_name] = "*$field_name tidak boleh kosong";
            return false;
        } elseif (!preg_match($pattern, $field_list[$field_name])) {
            $errors[$field_name] = "*$errMsg";
            return false;
        } else {
            return true;
        }
    }
    //prevent clear
    function valinp(&$data, $val) {
        if (isset($data[$val])) {
            echo trim(htmlspecialchars($data[$val]));
        }
    }

    //display err msg
    function errMsg($data, $post, $val) {
        if (isset($data[$val])) {
            echo $data[$val];
        }
    }
    //validate all
    function validornot(&$errors, $post, $inc, $id, $table) {
        $pattern = array('nama' => "/^[a-zA-Z\s]{3,55}+$/", 'telepon' => "/^(0)([0-9]{10,14})+$/", 'alamat' => "/^[a-zA-Z0-9\s\.,]+$/");
        $msg = array('nama' => "nama tidak valid", 'telepon' => "nomor telepon tidak valid", 'alamat' => "");
        foreach ($post as $key => $value) {
            if (isset($pattern[$key])) {
                if (isset($post[$key])) {
                    validate($errors, $post, $key, $pattern[$key], $msg[$key], $id, $table);
                } else {
                    include $inc;
                }
            }
        }
    }
?>