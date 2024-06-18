<?php
include '../koneksi.php';

$sql = "SELECT * FROM buku";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Katalogisasi Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import "https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css";
        @import "https://cdn.jsdelivr.net/npm/@tailwindcss/line-clamp@0.2.1";

        .table-container {
            width: 90%;
            margin: 0 auto;
        }
        
        body {
            background-image: linear-gradient(to right, black, red);
            background-size: 10% 100%;
            background-repeat: no-repeat;
        }
        .h1-daftar {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
            padding: 10px 0;
            z-index: 1;
            border-bottom: 1px solid #ccc;
        }
        .table-wrapper {
            max-height: 60vh;
            overflow-y: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            white-space: normal;
        }
        th {
            position: sticky;
            top: 0;
            background-color: white;
            z-index: 2;
        }
        td.description {
            max-width: 300px;
            overflow-wrap: break-word;
        }
        .action-buttons a {
            display: flex;
            align-items: center;
        }
        .action-buttons svg {
            margin-right: 0.5rem;
        }
        .data-exit{
            position: absolute;
            top: 10px;
            right: 8px;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <a href="login.html" class="data-exit bg-red-500 text-white p-2 rounded-full inline-flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-10a1 1 0 10-2 0v2a1 1 0 002 0V8zm-1 6a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
        </svg>
        Exit
    </a>
    <div class="container mx-auto p-4 table-container border rounded-lg shadow-lg bg-white">
        <h1 class="h1-daftar text-2xl font-bold mb-4 text-center">Daftar Buku</h1>
        <div class="text-right mb-6">
            <a href="admincreate.php" class="data-tambah bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>
        <div class="table-wrapper">
            <table class="tabel-tr min-w-full bg-white border">
                <thead>
                    <tr>
                        <th class="py-2 px-3 border">ISBN</th>
                        <th class="py-2 px-3 border">Judul</th>
                        <th class="py-2 px-3 border">Penulis</th>
                        <th class="py-2 px-3 border">Deskripsi</th>
                        <th class="py-2 px-3 border">Gambar</th>
                        <th class="py-2 px-3 border">Terbit</th>
                        <th class="py-2 px-3 border">Bahasa</th>
                        <th class="py-2 px-3 border">Penerbit</th>
                        <th class="py-2 px-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="border px-4 py-2"><?php echo $row['ISBN']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['judul']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['penulis']; ?></td>
                        <td class="border px-4 py-2 description"><?php echo $row['deskripsi']; ?></td>
                        <td class="border px-4 py-2">
                            <img src="<?php echo $row['src_gambar']; ?>" alt="Gambar Buku" class="w-16 h-16">
                        </td>
                        <td class="border px-4 py-2"><?php echo $row['published']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['language']; ?></td>
                        <td class="border px-4 py-2"><?php echo $row['publisher']; ?></td>
                        <td class="border px-4 py-2 flex justify-around space-x-2 action-buttons">
                            <a href="adminedit.php?ISBN=<?php echo $row['ISBN']; ?>" class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828zM6 12v2H4a2 2 0 01-2-2V4a2 2 0 012-2h8a2 2 0 012 2v2h-2V4H4v8h2z"/>
                                </svg>
                                Edit
                            </a>
                            <a href="admindelete.php?ISBN=<?php echo $row['ISBN']; ?>" class="bg-red-500 text-white px-4 py-2 rounded flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v4a1 1 0 002 0V7zm-1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
                                </svg>
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
