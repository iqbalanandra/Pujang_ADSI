<?php
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    die('User ID not set in session');
}

$user_id = $_SESSION['id'];

// Check if connection to the database is established
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$query = "SELECT COUNT(DISTINCT b.penulis) as total_authors 
          FROM user_buku ub
          JOIN buku b ON ub.ISBN = b.ISBN
          WHERE ub.status IS NOT NULL AND ub.id = ?";

// Prepare the statement
$stmt = $koneksi->prepare($query);
if (!$stmt) {
    die("Statement preparation failed: " . $koneksi->error);
}

// Bind the parameter
if (!$stmt->bind_param("i", $user_id)) {
    die("Parameter binding failed: " . $stmt->error);
}

// Execute the statement
if (!$stmt->execute()) {
    die("Statement execution failed: " . $stmt->error);
}

// Get the result
$result = $stmt->get_result();
if (!$result) {
    die("Getting result failed: " . $stmt->error);
}

$total_authors = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_authors = $row['total_authors'];
}

// Close the statement
$stmt->close();

// Close the connection
$koneksi->close();

?>
