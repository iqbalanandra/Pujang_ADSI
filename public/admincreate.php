<?php

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ISBN = $_POST['ISBN'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $deskripsi = $_POST['deskripsi'];
    $published = $_POST['published'];
    $language = $_POST['language'];
    $publisher = $_POST['publisher'];

    // Untuk gambar cover
    if ($_FILES['src_gambar']['name']) {
        $file_name = $_FILES['src_gambar']['name'];
        $file_tmp = $_FILES['src_gambar']['tmp_name'];
        
        // Tentukan path untuk folder image dan image/cover
        $image_dir = '../image/';
        $cover_dir = '../image/cover/';

        // Pastikan folder image tersedia, jika belum, buat folder tersebut
        if (!file_exists($image_dir)) {
            mkdir($image_dir, 0777, true);
        }
        if (!file_exists($cover_dir)) {
            mkdir($cover_dir, 0777, true);
        }

        // Pindahkan file gambar ke folder image/cover
        $src_gambar = $cover_dir . basename($file_name);
        move_uploaded_file($file_tmp, $src_gambar);
    } else {
        $src_gambar = null;
    }

    // Untuk konten buku (PDF)
    if ($_FILES['src_konten']['name']) {
        $file_name = $_FILES['src_konten']['name'];
        $file_tmp = $_FILES['src_konten']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Tentukan path untuk folder konten_buku
        $konten_buku_dir = '../public/konten_buku/';

        // Pastikan folder konten_buku tersedia, jika belum, buat folder tersebut
        if (!file_exists($konten_buku_dir)) {
            mkdir($konten_buku_dir, 0777, true);
        }

        // Ubah nama file PDF menjadi ISBN.pdf
        $nama_file_baru = $ISBN . '.pdf';
        $src_konten = $konten_buku_dir . $nama_file_baru;

        // Pindahkan file PDF ke folder konten_buku
        move_uploaded_file($file_tmp, $src_konten);
    } else {
        $src_konten = null;
    }

    header("Location: adminkatalogiasibuku.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: linear-gradient(to right, black, red);
            background-size: 10% 100%;
            background-repeat: no-repeat;
        }
        .form-container {
            max-width: 500px;
            max-height: 80vh; 
            overflow-y: auto; 
            margin: 0 auto; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white; 
        }
        .tambah-buku {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
            padding: 10px 0;
            z-index: 1;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="form-container">
        <h1 class="tambah-buku text-2xl font-bold mb-4">Tambah Buku Baru</h1>
        <form action="admincreate.php" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700">ISBN</label>
                <input type="text" name="ISBN" class="border rounded w-full py-2 px-3" >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Judul</label>
                <input type="text" name="judul" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Penulis</label>
                <input type="text" name="penulis" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" class="border rounded w-full py-2 px-3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Gambar</label>
                <input type="file" name="src_gambar" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Konten</label>
                <input type="file" name="src_konten" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tahun Terbit</label>
                <input type="text" name="published" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Bahasa</label>
                <input type="text" name="language" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Penerbit</label>
                <input type="text" name="publisher" class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9"/>
                    </svg>
                    Simpan
                </button>            
                <a href="adminkatalogiasibuku.php" class="flex items-center mt-4 text-blue-500 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7">
                    </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </body>
    </html>