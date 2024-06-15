<?php
    require_once('koneksi.php');
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['id'])) {
        header('Location: ../login.php');
        exit();
    }

    // Get ISBN and user ID
    $isbn = $_POST['isbn'];
    $user_id = $_SESSION['id'];

    // Toggle is_favorite status
    $query = "SELECT * FROM user_buku WHERE ISBN = '$isbn' AND id = '$user_id'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Book already in user_buku, update is_favorite
        $row = mysqli_fetch_assoc($result);
        $is_favorite = $row['is_favorite'] ? 0 : 1; // Toggle favorite status

        $update_query = "UPDATE user_buku SET is_favorite = $is_favorite WHERE ISBN = '$isbn' AND id = '$user_id'";
        mysqli_query($koneksi, $update_query);
    } else {
        // Book not in user_buku, add with is_favorite as 1 (favorite)
        $insert_query = "INSERT INTO user_buku (ISBN, id, status, is_favorite) VALUES ('$isbn', '$user_id', '', 1)";
        mysqli_query($koneksi, $insert_query);
    }

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>
