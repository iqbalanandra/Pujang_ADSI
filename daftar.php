<?php
session_start();

// menghubungkan php dengan koneksi database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pujang';

$koneksi = mysqli_connect($host, $user, $password, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // menangkap data yang dikirim dari form pendaftaran
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = 'user'; // Set default level to 'user'


    // cek apakah email sudah digunakan
    $cek_email = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($cek_email) > 0) {
        $error_message = "Email sudah terdaftar. Silakan gunakan email lain.";
    } else {
        // menyimpan data ke database
        $query = "INSERT INTO users (username, nama, email, password, level) VALUES ('$username', '$name', '$email', '$password', '$level')";
        if (mysqli_query($koneksi, $query)) {
            $success_message = "Pendaftaran berhasil! Silakan login.";

            header('Location: public/login.html');
            exit; // Hentikan eksekusi kode selanjutnya

        } else {
            $error_message = "Pendaftaran gagal: " . mysqli_error($koneksi);
        }
    }
}
?>