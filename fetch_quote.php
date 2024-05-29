<?php
    include 'koneksi.php';

    $sql = "SELECT kutipan, dikutip FROM quotes ORDER BY RAND() LIMIT 1";
    $result = $koneksi->query($sql);

    $quotes = $result->fetch_assoc();

?>