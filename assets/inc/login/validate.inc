<?php
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
    
    //all valid ?
    function validornot($post, &$errors, $inc) {
        foreach ($post as $key => $value) {
            if (!isset($post[$key]) || empty(trim($post[$key]))) {
                $errors[$key] = "*$key tidak boleh kosong";
            }
        }
        if (db_check($post, 'id')) {
            if (!empty(trim($post['id']))) {
                $errors['id'] = "*id belum terdaftar";
            }
        } else {
            if (!check($post)) {
                $errors['password'] = "*password salah";
            }
        }
        if ($errors) {
            include $inc;
        } else {
            session_start();
            $_SESSION['id'] = $post['id'];
            if (is_admin($post['id']) == 1) {
                $_SESSION['admin'] = true;
                header("location: admin/index.php");
            } else {
                $_SESSION['user'] = true;
                header("location: user/index.php");
            }
            exit();
        }
    }
?>