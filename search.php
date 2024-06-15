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
<script src="https://kit.fontawesome.com/51f0e2cb62.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="public/css/output.css">
    <style>
        .search-bar button i {
            color: #6b7280;
        }
        
    </style>
</head>

<body class="font-poppins">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->
        <div class="flex items-center justify-between bg-merah p-4 shadow-md sticky top-0 z-50">
            <div class="relative w-full max-w-xl">
                <form action="search.php" method="GET" class="flex items-center bg-gray-100 rounded-lg">
                    <input type="text" name="Search" id="search" class="w-full px-4 py-2 text-gray-700 bg-gray-100 rounded-l-lg focus:outline-none" placeholder="Search books..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button type="submit" class="px-4 py-2 bg-gray-100 rounded-r-lg"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                </form>
            </div>

            <div class="flex items-center space-x-4">
                <span class="i-notifikasi-white"></span>
                <?php if (isset($_SESSION['src_profile']) && isset($_SESSION['nama'])) : ?>
                    <img src="<?php echo htmlspecialchars($_SESSION['src_profile']); ?>" alt="Profile Image" class="w-14 h-14 rounded-full">
                    <p class="text-white"><?php echo htmlspecialchars($_SESSION['nama']); ?></p>
                <?php else : ?>
                    <img src="https://via.placeholder.com/56" alt="Dummy Image" class="w-14 h-14 rounded-full">
                    <p>Guest</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Search Results -->
        <div class="flex-grow p-6">
            <h2 class="text-2xl font-semibold mb-4">Search Results for "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
            <?php if ($result->num_rows > 0): ?>
                <div class="space-y-4">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="p-4 bg-white shadow rounded-lg">
                            <h3 class="text-xl font-bold hover:text-blue-500 ease-linear duration-200"><a href="public/book.php?ISBN=<?php echo htmlspecialchars($row['ISBN']); ?>"><?php echo htmlspecialchars($row['judul']); ?></a></h3>
                            <p class="text-gray-700"><strong>Author:</strong> <?php echo htmlspecialchars($row['penulis']); ?></p>
                            <p class="text-gray-700"><strong>Description:</strong> <?php echo htmlspecialchars($row['deskripsi']); ?></p>
                            <p class="text-gray-700"><strong>Published:</strong> <?php echo htmlspecialchars($row['published']); ?></p>
                            <p class="text-gray-700"><strong>Language:</strong> <?php echo htmlspecialchars($row['language']); ?></p>
                            <p class="text-gray-700"><strong>Publisher:</strong> <?php echo htmlspecialchars($row['publisher']); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-700">No results found for your search query.</p>
            <?php endif; ?>
        </div>

            <!-- Footer -->
            <div class="footer text-white bg-[#2C323D] w-full h-[205px] flex flex-col items-center p-4">
                <h1 class="text-lg font-bold font-robotoSlab">PUJANG</h1>
                <!-- Links -->
                <div class=" w-[378px] flex justify-around font-roboto font-semibold mt-2 tracking-widest">
                    <a href="">Home</a>
                    <a href="">About</a>
                    <a href="">Services</a>
                    <a href="">Blog</a>
                    <a href="">Contact</a>
                </div>
                <!-- Contacts Logo -->
                <div id="paling-bawah" class="w-[155px] h-auto flex flex-row justify-around my-6">
                    <div class="w-[43px] h-[43px] border border-white rounded-full flex justify-center items-center align-middle">
                        <span class="i-facebook"></span>
                    </div>

                    <div class="w-[43px] h-[43px] border border-white rounded-full flex justify-center items-center align-middle">
                        <span class="i-instagram"></span>
                    </div>

                    <div class="w-[43px] h-[43px] border border-white rounded-full flex justify-center items-center align-middle">
                        <span class="i-linkedin"></span>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="w-[300px] flex justify-center font-roboto tracking-widest" h-auto>
                    <p><span class="i-copyright"></span>2024 <span class="text-[#E6382D]">PUJANG</span>. All right reserved </p>
                </div>


            </div>
    </div>
</body>

</html>
