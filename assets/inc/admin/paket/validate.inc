<?php
function validate(&$errors, $field_list, $field_name) {
    if ($field_name != 'gambar') {
        if (!isset($field_list[0][$field_name]) || empty(trim($field_list[0][$field_name]))) {
            $errors[$field_name] = "*$field_name tidak boleh kosong";
            return false;
        } else {
            return true;
        }
    }
}

// Prevent clear
function valinp(&$data, $val) {
    if (isset($data[$val])) {
        echo trim($data[$val]);
    }
}

// Display error message
function errMsg($data, $post, $val) {
    if (isset($data[$val])) {
        echo $data[$val];
    }
}

function validornot(&$errors, $post) {
    // Validate gambar
    if (isset($post[1]['gambar'])) {
        if (empty(trim($post[1]['gambar']['name'])) && !isset($post[0]['id'])) {
            $errors['gambar'] = "*gambar tidak boleh kosong";
        } elseif (!empty(trim($post[1]['gambar']['name']))) {
            $types = array("image/jpeg", "image/jpg", "image/png");
            if (!in_array($post[1]['gambar']['type'], $types)) {
                $errors['gambar'] = "*Hanya file JPEG, JPG, PNG!";
            }
            $maxSize = 5 * 1024 * 1024;
            if ($post[1]['gambar']['size'] > $maxSize) {
                $errors['gambar'] = "Ukuran file terlalu besar (Max = 5 MB)";
            }
        }
    }

    // Validate each field
    $fields_to_validate = ['nama', 'destinasi', 'harga', 'jemput', 'kapasitas', 'tanggal', 'deskripsi'];
    foreach ($fields_to_validate as $field_name) {
        validate($errors, $post, $field_name);
    }
}
?>
