<?php
include 'koneksi.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM user_buku ub 
        LEFT JOIN buku b ON ub.ISBN = b.ISBN 
        LEFT JOIN users u ON ub.id = u.id   
        WHERE (
            ub.status = 'Completed' OR 
            ub.status = 'Reading' OR 
            ub.status = 'Plan to Read' OR 
            ub.status = 'On Hold' OR 
            ub.status = 'Dropped'
        ) 
        AND ub.id = ?"; // Adjust the column names and table name as per your database

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("i", $id);  // Use bind_param to avoid SQL injection
$stmt->execute();
$result = $stmt->get_result();

$buku_pribadi = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buku_pribadi[] = $row;
    }
}

$stmt->close();
$koneksi->close();
?>
