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
    <div class="flex flex-col h-screen">
        <!-- Background -->
        <div class=" h-screen w-[428px] bg-gradient-to-r to-[#EA3137] from-[#2C323D] fixed z-[-1]">
        </div>

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
        <!-- Main Content -->
        <div class="w-full h-screen flex justify-center items-center">
            <!-- Content Container -->
            <div class="w-[1005px] h-[607px] bg-cyan-300 flex  justify-center items-center gap-3">
            <img style="width: 347px; height:545px;" src="https://placehold.co/347x545" alt="cover buku">

            <div class="bg-pink-200 w-[511px] h-[547px] flex flex-col">
                <!-- Container Judul -->
                <div class="bg-blue-300 w-[210px] h-auto font-neuton">

                    <h1 class="text-[28px] text-[#868181] leading-tight">1937</h1>
                    <h2 class ="text-[42px] leading-[1.0]">The Hobbit</h2>
                    <h3 class="text-[28px] text-[#868181] leading-tight">J.R.R Tolkien</h3>
                    <h4 class="flex items-center text-[20px] font-roboto  font-semibold leading-tight leading"><span class="i-star"></span>8.6/10</h4>
            
                </div> 
                <!-- Deskripsi -->
                <div class="bg-green-300 w-full h-[288px] font-neuton">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, sequi voluptatibus nihil assumenda accusantium exercitationem error similique soluta atque dolorem blanditiis nesciunt quibusdam, quidem voluptate, necessitatibus vel dolore enim placeat non maiores nostrum. Consequuntur tenetur dolor, blanditiis consectetur laudantium officia pariatur velit eius quo. Quo pariatur repellendus laborum consectetur corporis?
                </div>
            <div class="bg-zinc-200 w-full flex flex-grow items-center">
                <button class="bg-[#EA3137] w-[115px] h-[43px] rounded-lg text-white font-semibold mr-4 ">Completed</button>
                <button class="bg-[#fff] w-[135px] h-[43px] rounded-lg text-black font-semibold flex items-center justify-center  "><span class="i-bookmark"></span>Read Later</button>
                <span class="i-star"> </span>
            </div>
            </div>
            </div>
            
        </div>
    </div>



</body>

</html>