<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    echo "You must be logged in to update the book status.";
    exit;
}

// Ambil data dari request
$user_id = $_SESSION['id'];
$ISBN = $_POST['ISBN'];
$status = $_POST['status'];

// Validasi data
if (empty($ISBN) || empty($status)) {
    echo "Invalid data provided.";
    exit;
}

// Cek apakah data sudah ada
$sql_check = "SELECT * FROM user_buku WHERE id = ? AND ISBN = ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("is", $user_id, $ISBN);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // Data sudah ada, lakukan update
    $sql_update = "UPDATE user_buku SET status = ? WHERE id = ? AND ISBN = ?";
    $stmt_update = $koneksi->prepare($sql_update);
    $stmt_update->bind_param("sis", $status, $user_id, $ISBN);
    if ($stmt_update->execute()) {
        $_SESSION['message'] = "Book status updated successfully.";
    } else {
        $_SESSION['message'] = "Error updating book status: " . $stmt_update->error;
    }
    $stmt_update->close();
} else {
    // Data belum ada, lakukan insert
    $sql_insert = "INSERT INTO user_buku (id, ISBN, status) VALUES (?, ?, ?)";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("iss", $user_id, $ISBN, $status);
    if ($stmt_insert->execute()) {
        $_SESSION['message'] = "Book status added successfully.";
    } else {
        $_SESSION['message'] = "Error adding book status: " . $stmt_insert->error;
    }
    $stmt_insert->close();
}

$stmt_check->close();
$koneksi->close();

// Redirect kembali ke halaman buku
header("Location: public/book.php?ISBN=" . $ISBN);
exit;
?>
