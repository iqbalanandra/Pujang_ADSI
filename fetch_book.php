<?php
include 'koneksi.php';

$sql = "SELECT ISBN, judul, penulis, deskripsi, src_gambar, published, language, publisher FROM buku"; // Adjust the column names and table name as per your database
$result = $koneksi->query($sql);

$books = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

$koneksi->close();
?>
