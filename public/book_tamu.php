<?php
session_start();
include "../koneksi.php";
$isbn = $_GET["ISBN"];
$user_id = $_SESSION['id'];

// Ambil data buku
$sql_buku = "SELECT * FROM buku WHERE ISBN='$isbn'";
$data_buku = mysqli_query($koneksi, $sql_buku);
$buku = mysqli_fetch_array($data_buku);

// Ambil status buku untuk user yang sudah login
$sql_status = "SELECT status, is_favorite FROM user_buku WHERE ISBN='$isbn' AND id='$user_id'";
$data_status = mysqli_query($koneksi, $sql_status);
$status = mysqli_fetch_array($data_status);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/output.css">
    <script src="https://kit.fontawesome.com/51f0e2cb62.js" crossorigin="anonymous"></script>
</head>

<style>
    .search-bar {
        width: 700px;
        height: 45px;
        display: flex;
        align-items: center;
        border-radius: 0.375rem;
        position: relative;
    }

    .search-bar input {
        height: 45px;
        border-radius: 0.375rem;
        width: 100%;
        padding-right: 2.5rem;
        padding-left: 1rem;
    }

    .search-bar i {
        position: absolute;
        right: 1rem;
        color: #6b7280;
    }

    .i-star::after {
        display: block;
        width: 30px;
        height: 30px;
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffffff' d='m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z'/%3E%3C/svg%3E");
    }

    .i-star.favorite::after {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23f2eb31' d='m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08z'/%3E%3C/svg%3E");
    }
</style>

<body class="bg-body">
    <div class="flex flex-col h-screen">
        <!-- Background -->
        <div class="h-screen w-[428px] bg-gradient-to-r to-[#EA3137] from-[#2C323D] from-[-50px] fixed z-[-1]"></div>

        <!-- Header -->
        <div class="w-full h-[80px] flex items-center justify-between">
            <!-- Container Search Bar -->
            <div class="mx-20 shadow-md search-bar">
                <input type="text" name="Search" id="search">
                <a href="#"><i class="fa-solid fa-magnifying-glass fa-lg"></i></a>
            </div>

            <!-- Profile -->
            <div class="w-[200px] h-full flex items-center mx-20">
                <span class="i-notifikasi"></span>
                <?php if (isset($_SESSION['src_profile']) && isset($_SESSION['nama'])) : ?>
                    <img src="<?php echo htmlspecialchars($_SESSION['src_profile']); ?>" style="width:56px; height:56px" alt="Profile Image" class="rounded-full w-14 h-14">
                    <p><?php echo htmlspecialchars($_SESSION['nama']); ?></p>
                <?php else : ?>
                    <img src="https://via.placeholder.com/56" style="width:56px; height:56px" alt="Dummy Image" class="rounded-full w-14 h-14">
                    <p>Guest</p>
                <?php endif; ?>
                <span class="i-down"></span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex items-center justify-center w-full h-screen relative">
            <!-- Content Container -->
            <?php if ($buku) { ?>
                <div class="w-[1005px] h-[607px] flex justify-center items-center gap-8 relative left-[-50px]">
                    <img style="width: 347px; height:545px;" src="<?php echo $buku["src_gambar"] ?>" alt="cover buku" class="drop-shadow-pekat">

                    <div class="w-[511px] h-[547px] flex flex-col">
                        <!-- Container Judul -->
                        <div class="h-auto w-auto font-neuton">
                            <h1 class="text-[28px] text-[#868181] leading-[0.75]"><?php echo $buku["published"] ?></h1>
                            <h2 class="text-[42px] leading-[1.0]"><?php echo $buku["judul"] ?></h2>
                            <h3 class="text-[28px] text-[#868181] leading-tight"><?php echo $buku["penulis"] ?></h3>
                            <h4 class="flex items-center text-[20px] font-roboto font-semibold">8.6/10</h4>
                        </div>
                        <!-- Deskripsi -->
                        <div class="w-full h-[288px] font-poppins text-md mt-3">
                            <?php echo $buku["deskripsi"] ?>
                        </div>

                        <div class="flex items-center flex-grow w-full">
                            <!-- Tombol baca -->
                            <form method="POST" action="../read_book.php">
                                <input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
                                <button type="submit" class="bg-[#EA3137] w-[115px] h-[43px] rounded-lg text-white font-semibold mr-4 text-lg tracking-widest">Read</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Tombol Back -->
            <a href="index_tamu.php">
                <div class="h-[79px] w-[79px] bg-merah rounded-full flex justify-center items-center absolute bottom-0 right-0 m-4">
                    <span class="i-back"></span>
                </div>
            </a>
        </div>
    </div>
</body>

</html>