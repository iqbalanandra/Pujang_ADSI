<?php
include 'koneksi.php'; // sesuaikan dengan nama file koneksi Anda

// Query untuk mengambil satu buku secara acak
$query = "SELECT * FROM buku ORDER BY RAND() LIMIT 1";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $random_book = $result->fetch_assoc();
}
?>
