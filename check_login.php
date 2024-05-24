<?php
session_start();

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (!$login) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        $_SESSION['username'] = $username;
        $_SESSION['name'] = $nama;
        $_SESSION['level'] = $data['level'];

        switch ($data['level']) {
            case "admin":
                header("location:public/index.html");
                break;
            case "user":
                header("location:public/index.html");
                break;
            default:
                $error_message = "Level user tidak dikenal.";
        }
    } else {
        $error_message = "Username atau password salah.";
        header("location:public/login.html");
    }
} else {
    header("location:public/login.php");
}
?>