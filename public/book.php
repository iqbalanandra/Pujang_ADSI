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
        /* Adjust color to match your design */
    }
</style>

<body>
    <!-- Header -->
    <div class="w-full h-[80px] bg-slate-600 flex items-center justify-between">
        <!-- Container Search Bar -->
        <div class="search-bar shadow-md mx-20 ">
            <input type="text" name="Search" id="search">
            <a href="#"><i class="fa-solid fa-magnifying-glass fa-lg"></i></a>
        </div>

        <!-- Profile -->
        <div class="w-[200px] h-full flex items-center mx-20">
            <span class="i-notifikasi"></span>
            <img src="https://via.placeholder.com/54" alt="Dummy Image" class="w-14 h-14 rounded-full">
            <p>Iqbal Anandra</p>
            <span class="i-down"></span>
        </div>
    </div>

</body>

</html>