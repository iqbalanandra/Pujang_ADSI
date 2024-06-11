<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isbn = $_POST['isbn'];

    // Path to your PDF file
    $file_path = 'public/konten_buku/' . $isbn . '.pdf';

    // Check if the file exists
    if (file_exists($file_path)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($file_path) . '"');
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        readfile($file_path);
        exit;
    } else {
        echo 'The file does not exist.';
    }
} else {
    echo 'Invalid request method.';
}
?>
