<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/output.css">

    <script src="https://kit.fontawesome.com/51f0e2cb62.js" crossorigin="anonymous"></script>
    <style>
        .main-container {
            display: flex;
            height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            width: 150px;
            flex-shrink: 0;
            background-color: #e60000;
            /* Adjust color to match your design */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
        }

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
            /* Adjust color to match your design */
        }

        .judul h1 {
            font-size: medium;
            font-family: 'Neuton';
            padding: 1px;
        }

        .judul {
            font-size: clamp(1rem, 2vw, 2rem);
            line-height: 1.2;
            /* Adjust as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .author p {
            font-size: 16px;
            font-family: 'Neuton';
            font-weight: lighter;
            color: #868181;


            display: flex;
            align-items: start;
        }

        .book {
            flex: 0 0 auto;
            margin-right: 20px;
        }

        .deskripsi-content {
            overflow-y: scroll;
        }
    </style>
</head>

<body class="font-poppins">
    <!-- Main Container -->
    <div class="main-container bg-body">
        <!-- Sidebar -->
        <div class="p-2 overflow-y-auto sidebar">
            <div class="p-2.5 mt-1 flex items-center justify-center">
                <img src="/PUJANG_ADSI/image/logo pujang.png" alt="logo">
            </div>

            <div class="h-[250px] flex flex-col items-center justify-around">
                <a class="i-home" href="#" id="i-home"></a>
                <a class="i-books" href="#" id="i-books"></a>
                <a class="i-setting" href="#" id="i-setting"></a>
                <a class="i-ask" href="#" id="i-ask"></a>
            </div>
            <!-- Log Out -->
            <a href="login.html"><span class="i-exit"></span></a>
        </div>

        <!-- Main Content -->
        <div class="w-full main-content">
            <!-- Header -->
            <div class="w-full pl-6 pr-6 h-[80px] flex items-center justify-between sticky top-0 bg-body z-50">
                <!-- Container Search Bar -->
                <div class="shadow-md search-bar flex items-center">
                    <form class="w-full h-full" action="../search.php" method="GET">
                        <input type="text" name="Search" id="search" class="flex w-full h-full p-2 border border-r-0 rounded-l-md">
                        <button class="bg-gray-200 p-2 rounded-r-md" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
                    </form>
                </div>

                <!-- Profile -->
                <div class="w-[200px] h-full flex items-center">
                    <span class="i-notifikasi"></span>
                        <img src="../image/profile/default.png" style="width:56px; height:56px" alt="Profile Image" class="rounded-full w-14 h-14">
                        <p>Guest</p>
                </div>
            </div>

            <!-- Main-Content -->
            <div id="paling-atas" class="w-full pl-6 pr-6 mt-4">
                <!-- Content 1 // Row 1-3 -->
                <div class="flex w-full h-auto mt-4 page-1">
                    <!-- Quote Container -->
                    <div class="relative w-[1078px] h-auto p-6 gap-3 f ex flex-col z-0">
                        <!-- Row 1 -->
                        <div class=" w-full h-[250px] flex justify-around">
                            <div class="container relative w-[700px] h-[250px] p-4">
                                <!-- Background Quote -->
                                <img src="../image/paper_texture.png" alt="Background Quote" class="absolute inset-0 z-0 object-cover w-full h-full rounded-md shadow-md">
                                <!-- Quote Content -->
                                <?php
                                include '../koneksi.php';
                                include '../fetch_quote.php';
                                if ($result->num_rows > 0) {
                                ?>
                                    <div class="relative z-10 flex flex-col">
                                        <div class="w-full h-full mb-5">
                                            <h1 class="text-2xl font-semibold text-black">Today's Quote</h1>
                                        </div>
                                        <div class="w-full h-full">
                                            <p class="text-black font-caveat font-semibold text-[30px]">"<?php echo htmlspecialchars($quotes['kutipan']) ?>"</p>
                                        </div>
                                        <div class="w-full h-full mt-1">
                                            <p class="text-black font-caveat text-[26px]">~<?php echo htmlspecialchars($quotes['dikutip']) ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- Banner Container -->
                            <?php
                            include '../banner.php';
                            ?>
                            <div class="w-[250px] h-[250px] p-3 flex justify-center align-middle">
                                <div class="flex items-center w-full px-3 bg-white rounded-xl">
                                    <img class="static mr-1 shadow-md" src="<?php echo $random_book['src_gambar']; ?>" alt="cover buku" style="width: 100px; height: 176px;">
                                    <!-- Banner Nav Container -->
                                    <div class="w-[119px] h-[176px] float-start">
                                        <h1 class="text-sm"> Have you read
                                            <?php echo $random_book['judul']; ?> by <?php echo $random_book['penulis']; ?> </h1>
                                        <a class=" flex items-center px-2 py-2 font-semibold text-[12px] bg-[#EA3137] text-white rounded-md shadow-sm hover:scale-110 ease-in-out duration-300" href="book.php?ISBN=<?php echo $random_book['ISBN']; ?>">Read Now <span class="flex i-open"></span></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Content 2 / Row 4- -->
                <div class="flex flex-col w-full h-auto px-6 page-2 ">
                    <!-- Row 5 -->
                    <!-- Book List -->
                    <h1 class="text-xl font-semibold font-roboto">Most Popular Books</h1>
                    <div class="flex flex-row flex-wrap w-full h-auto ">
                        <?php
                        include '../fetch_popular.php';

                        foreach ($popular as $popular_book) { ?>
                            <!-- Books -->
                            <div class="container bg-white w-[286px] h-[391px] rounded-md m-4 mb-2 flex flex-col shadow-md box-border border border-black">
                                <!-- Container Judul Buku -->
                                <div class="flex flex-col w-full h-auto text-center ">
                                    <a class="judul text-3xl font-neuton font-[500] align-text-bottom hover:text-blue-500 duration-300" href="book.php?ISBN=<?php echo $popular_book['ISBN'] ?>">
                                        <?php echo htmlspecialchars($popular_book['judul']); ?>
                                    </a>
                                    <h2 class="penulis text-lg font-neuton align-text-top text-[#868181]"><?php echo htmlspecialchars($popular_book['penulis']); ?></h2>
                                    <h3 class="text-sm align-text-top genre font-sanchez">Novel, History, Fiction</h3>
                                </div>
                                <!-- Container Row 2 List Buku -->
                                <div class="flex w-full h-auto deskripsi">
                                    <img src="<?php echo htmlspecialchars($popular_book['src_gambar']); ?>" alt="cover Buku" style="width : 153px ; height256px">
                                    <!-- Container Deskripsi -->
                                    <div class="deskripsi ml-2 w-full h-[256px] overflow-y-scroll">
                                        <p class="text-sm "><?php echo htmlspecialchars($popular_book['deskripsi']); ?></p>
                                    </div>
                                </div>
                                <!-- Perintilan -->
                                <div class="flex justify-around w-full mt-2 text-sm">
                                    <p><span class="font-semibold">Published :</span> <?php echo htmlspecialchars($popular_book['published']); ?></p>
                                    <p><span class="font-semibold">Language :</span> <?php echo htmlspecialchars($popular_book['language']); ?></p>
                                </div>
                                <div class="flex justify-center w-full h-full text-sm">
                                    <p><span class="font-semibold">Publisher :</span> <?php echo htmlspecialchars($popular_book['publisher']); ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                    <!-- Row 6 -->
                    <h1 id="newest-release" class="text-xl font-semibold font-roboto leading-tight">Newest Release</h1>
                    <div class="flex flex-row flex-wrap w-full h-auto ">



                        <?php include '../fetch_book.php';
                        include '../koneksi.php';
                        foreach ($books as $buku) { ?>
                            <!-- Books -->
                            <div class="container bg-white w-[286px] h-[391px] rounded-md m-4 mb-2 flex flex-col shadow-md box-border border border-black">
                                <!-- Container Judul Buku -->
                                <div class="flex flex-col w-full h-auto text-center ">
                                    <h1 class="judul text-3xl font-neuton font-[500] align-text-bottom hover:text-blue-500 duration-300">
                                        <a href="book.php?ISBN=<?php echo $buku['ISBN'] ?>">
                                            <?php echo htmlspecialchars($buku['judul']); ?>
                                        </a>
                                    </h1>
                                    <h2 class="penulis text-lg font-neuton align-text-top text-[#868181]"><?php echo htmlspecialchars($buku['penulis']); ?></h2>
                                    <h3 class="text-sm align-text-top genre font-sanchez">Novel, History, Fiction</h3>
                                </div>
                                <!-- Container Row 2 List Buku -->
                                <div class="flex w-full h-auto deskripsi">
                                    <img style="width: 153px; height: 256px" src="<?php echo htmlspecialchars($buku['src_gambar']); ?>" alt="cover Buku">
                                    <!-- Container Deskripsi -->
                                    <div class="deskripsi ml-2 w-full h-[256px] overflow-y-scroll">
                                        <p class="text-sm "> <?php echo htmlspecialchars($buku['deskripsi']); ?></p>
                                    </div>
                                </div>
                                <!-- Perintilan -->
                                <div class="flex justify-around w-full mt-2 text-sm">
                                    <p><span class="font-semibold">Published :</span> <?php echo htmlspecialchars($buku['published']); ?></p>
                                    <p><span class="font-semibold">Language :</span> <?php echo htmlspecialchars($buku['language']); ?></p>
                                </div>
                                <div class="flex justify-center w-full h-full text-sm">
                                    <p><span class="font-semibold">Publisher :</span> <?php echo htmlspecialchars($buku['publisher']); ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
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
    </div>

    <!-- Scroll by javascript -->
    <script>
        document.getElementById('i-books').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('newest-release').scrollIntoView({
                behavior: 'smooth'
            });
        });

        document.getElementById('i-home').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('paling-atas').scrollIntoView({
                behavior: 'smooth',
            });
        });

        document.getElementById('i-ask').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('paling-bawah').scrollIntoView({
                behavior: 'smooth',
            });
        });
    </script>
</body>

</html>