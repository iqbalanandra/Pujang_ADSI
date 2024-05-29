<?php
include 'koneksi.php';

$sql = "SELECT ISBN, judul, penulis, deskripsi, src_gambar, published, language, publisher FROM popular_books"; // Adjust the column names and table name as per your database
$result = $koneksi->query($sql);

$popular = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $popular[] = $row;
    }
}

$koneksi->close();
?>
