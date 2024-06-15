<?php
session_start();
include 'koneksi.php';

$searchQuery = '';
if (isset($_GET['Search'])) {
    $searchQuery = htmlspecialchars($_GET['Search']);
    $sql = "SELECT * FROM buku WHERE judul LIKE ? OR penulis LIKE ?";
    $stmt = $koneksi->prepare($sql);
    $searchTerm = '%' . $searchQuery . '%';
    $stmt->bind_param('ss', $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Redirect to home page if no search query is provided
    header("Location: public/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/output.css">
    <style>
        .search-results {
            margin: 20px;
        }

        .search-results h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .search-results .book {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .search-results .book h3 {
            font-size: 20px;
        }

        .search-results .book p {
            margin: 5px 0;
        }
    </style>
</head>

<body class="font-poppins">
    <div class="search-results">
        <h2>Search Results for "<?php echo $searchQuery; ?>"</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="book">
                    <h3><a href="public/book.php?ISBN=<?php echo htmlspecialchars($row['ISBN']); ?>"><?php echo htmlspecialchars($row['judul']); ?></a></h3>
                    <p><strong>Author:</strong> <?php echo htmlspecialchars($row['penulis']); ?></p>
                    <p><strong>Description:</strong> <?php echo htmlspecialchars($row['deskripsi']); ?></p>
                    <p><strong>Published:</strong> <?php echo htmlspecialchars($row['published']); ?></p>
                    <p><strong>Language:</strong> <?php echo htmlspecialchars($row['language']); ?></p>
                    <p><strong>Publisher:</strong> <?php echo htmlspecialchars($row['publisher']); ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No results found for your search query.</p>
        <?php endif; ?>
    </div>
</body>

</html>
