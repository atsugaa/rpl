<?php
    //required & email terdaftar atau belum
    function validate(&$errors, $field_list, $field_name, $pattern, $errMsg) {
        $check = array("email", "id");
        if (in_array($field_name, $check)) {
            if (!db_check($field_list, $field_name)) {
                $errors[$field_name] = "*$field_name sudah terdaftar";
            }
        }
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

    //reset, prevent clear
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
    
    //all valid ?
    function validornot(&$errors, $post) {
        $pattern = array('id' => "/^[a-zA-Z0-9]{6,8}+$/", 'nama' => "/^[a-zA-Z\s]{3,55}+$/", 'telepon' => "/^(0)([0-9]{10,14})+$/", 'alamat' => "/^[a-zA-Z0-9\s\.,]+$/", 'password' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/");
        $msg = array('id' => "id terdiri dari 6-8 karakter", 'nama' => "nama tidak valid", 'telepon' => "nomor telepon tidak valid", 'alamat' => "", 'password' => "password terdiri dari setidaknya 8 karakter, memiliki minimal 1 huruf kapital, huruf kecil, angka, & karakter spesial (!@#$%^&*)");
        foreach ($post as $key => $value) {
            if (isset($pattern[$key])) {
                if (isset($post[$key])) {
                    validate($errors, $post, $key, $pattern[$key], $msg[$key]);
                } else {
                    include $inc;
                }
            } elseif ($key == 'password2') {
                if ($post[$key] != $post['password']) {
                    $errors[$key] = "*password tidak cocok";
                }
            }
        }
    }
?>