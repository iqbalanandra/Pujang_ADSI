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

        $_SESSION['username'] = $data['username'];  // Store username
        $_SESSION['nama'] = $data['nama'];          // Store nama
        $_SESSION['level'] = $data['level'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['src_profile'] = $data['src_profile'];

        switch ($data['level']) {
            case "admin":
                header("location:public/index.php");
                break;
            case "user":
                header("location:public/index.php");
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