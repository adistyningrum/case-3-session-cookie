<?php
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mengecek apakah email dan password yang dimasukkan cocok dengan yang disimpan dalam cookie
    if (isset($_COOKIE['remembered_email']) && $_COOKIE['remembered_email'] === $email) {
        if (isset($_COOKIE['remembered_password']) && $_COOKIE['remembered_password'] === $password) {
            // Simpan email ke dalam session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            // Kirim respons Ajax
            echo "success";
            exit();
        } else {
            echo "password_mismatch";
            exit(); 
        }
    }

    // Validasi email dan password
    if (isValidEmail($email) && isValidPassword($password)) {
        // Set cookie untuk email dan password dengan masa berlaku 24 jam jika "Remember Me" dicentang
        if (isset($_POST['rememberMe']) && $_POST['rememberMe'] == 'on') {
            setcookie('remembered_email', $email, time() + 86400, '/');
            setcookie('remembered_password', $password, time() + 86400, '/');
        } else {
            setcookie('remembered_email', '', time() - 3600, '/');
            setcookie('remembered_password', '', time() - 3600, '/');
        }

        // Simpan email ke dalam session
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) && strpos($email, '@') !== false && strpos($email, '.') !== false;
}

function isValidPassword($password) {
    // Password harus memenuhi persyaratan panjang minimal 8 karakter dan mengandung alfabet, angka, serta simbol.
    $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d\s]).{8,}$/';
    return preg_match($regex, $password);
}