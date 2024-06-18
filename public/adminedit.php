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
    $src_gambar = $_POST['existing_src_gambar'];

    if ($_FILES['src_gambar']['name']) {
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
        $src_gambar = $cover_dir . basename($_FILES['src_gambar']['name']);
        move_uploaded_file($_FILES['src_gambar']['tmp_name'], $src_gambar);
    }

    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', deskripsi='$deskripsi', src_gambar='$src_gambar', published='$published', language='$language', publisher='$publisher' WHERE ISBN='$ISBN'";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: adminkatalogiasibuku.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
} else {
    $ISBN = $_GET['ISBN'];
    $sql = "SELECT * FROM buku WHERE ISBN='$ISBN'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: linear-gradient(to right, black, red);
        background-size: 10% 100%;
        background-repeat: no-repeat;
    }
    .edit-container {
        max-width: 500px; 
        max-height: 100vh; 
        overflow-y: auto; 
        margin: 0 auto; 
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: white; 
    }
    .h1-Edit {   
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        background-color: white;
        padding: 10px 0;
        z-index: 1;
        border-bottom: 1px solid #ccc;
    }
</style>

<body class="bg-gray-100">
    <div class="edit-container">
        <div class="container mx-auto p-4">
            <h1 class="h1-Edit text-2xl font-bold mb-4">Edit Buku</h1>
            <form action="adminedit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="ISBN" value="<?php echo $row['ISBN']; ?>">
                <div class="mb-4">
                    <label class="block text-gray-700">Judul</label>
                    <input type="text" name="judul" class="border rounded w-full py-2 px-3" value="<?php echo $row['judul']; ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Penulis</label>
                    <input type="text" name="penulis" class="border rounded w-full py-2 px-3" value="<?php echo $row['penulis']; ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="border rounded w-full py-2 px-3"><?php echo $row['deskripsi']; ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Gambar</label>
                    <input type="file" name="src_gambar" class="border rounded w-full py-2 px-3">
                    <input type="hidden" name="existing_src_gambar" value="<?php echo $row['src_gambar']; ?>">
                    <img src="<?php echo $row['src_gambar']; ?>" alt="Gambar Buku" class="w-16 h-16">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Terbit</label>
                    <input type="text" name="published" class="border rounded w-full py-2 px-3" value="<?php echo $row['published']; ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Bahasa</label>
                    <input type="text" name="language" class="border rounded w-full py-2 px-3" value="<?php echo $row['language']; ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Penerbit</label>
                    <input type="text" name="publisher" class="border rounded w-full py-2 px-3" value="<?php echo $row['publisher']; ?>">
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        Simpan
                    </button>
                    <a href="adminkatalogiasibuku.php" class="text-blue-500 hover:underline flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
