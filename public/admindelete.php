
<?php
include 'koneksi.php';

$ISBN = $_GET['ISBN'];

$sql = "DELETE FROM buku WHERE ISBN='$ISBN'";

if ($koneksi->query($sql) === TRUE) {
    header("Location: adminkatalogiasibuku.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
