-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 11:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pujang`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ISBN` varchar(15) NOT NULL,
  `judul` varchar(36) NOT NULL,
  `penulis` varchar(24) NOT NULL,
  `deskripsi` text NOT NULL,
  `src_gambar` varchar(36) NOT NULL,
  `published` varchar(36) NOT NULL,
  `language` varchar(16) NOT NULL,
  `publisher` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ISBN`, `judul`, `penulis`, `deskripsi`, `src_gambar`, `published`, `language`, `publisher`) VALUES
('9780062073488', 'Lalu Semuanya Lenyap', 'Agatha Christie', 'Buku ini bercerita tentang Sepuluh orang diundang ke sebuah rumah mewah dan modern di sebuah pulau di seberang pantai Devon. Sepuluh orang dengan rahasia kelam masing-masing, datang tanpa curiga pada sore musim panas yang indah. Tetapi tiba-tiba terjadi serentetan kejadian misterius. Pulau tersebut berubah menjadi pulau maut yang mengerikan ketika orang-orang itu tewas satu demi satu... Novel Agatha Christie yang paling mencekam dan mendengangkan! Cerita detektif tanpa detektif!', '../image/cover/3.png', '1939', 'Indonesia', 'St. Martin\'s Griffin'),
('9780156012195', 'The Little Prince', 'Antoine de Saint-Exupéry', 'The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris, and his release to live in London with his daughter Lucie whom he had never met. The story is set against the conditions that led up to the French Revolution and the Reign of Terror.', '../image/cover/4.png', '1945', 'English', 'Gallimard'),
('9780307887436', 'Ready Player One', 'Ernest Cline', 'IN THE YEAR 2044, reality is an ugly place. The only time teenage Wade Watts really feels alive is when he\'s jacked into the virtual utopia known as the OASIS. Wade\'s devoted his life to studying the puzzles hidden within this world\'s digital confines, puzzles that are based on their creator\'s obsession with the pop culture of decades past and that promise massive power and fortune to whoever can unlock them.  But when Wade stumbles upon the first clue, he finds himself beset by players willing to kill to take this ultimate prize. The race is on, and if Wade\'s going to survive, he\'ll have to win—and confront the real world he\'s always been so desperate to escape.', '../image/cover/6.png', '2011', 'English', 'Crown Publisher'),
('9780345445605', 'The Hobbit', 'J.R.R Tolkien', 'The Hobbit is set in Middle-earth and follows home-loving Bilbo Baggins, the hobbit of the title, who joins the wizard Gandalf and the thirteen dwarves of Thorin\'s Company, on a quest to reclaim the dwarves\' home and treasure from the dragon Smaug. Bilbo\'s journey takes him from his peaceful rural surroundings into more sinister territory.', '../image/cover/2.png', '1937', 'English', 'George Allen & Unwin'),
('9780553418026', 'The Martian', 'Andy welt', 'Six days ago, astronaut Mark Watney became one of the first people to walk on Mars. Now, he’s sure he’ll be the first person to die there. After a dust storm nearly kills him and forces his crew to evacuate while thinking him dead, Mark finds himself stranded and completely alone with no way to even signal Earth that he’s alive—and even if he could get word out, his supplies would be gone long before a rescue could arrive.  Chances are, though, he won’t have time to starve to death. The damaged machinery, unforgiving environment, or plain-old “human error” are much more likely to kill him first.', '../image/cover/5.png', '2011', 'English', 'Ballantine Books'),
('9781250076960', 'Six Of Crows', 'Leigh Bardugo', 'Ketterdam: a bustling hub of international trade where anything can be had for the right price—and no one knows that better than criminal prodigy Kaz Brekker. Kaz is offered a chance at a deadly heist that could make him rich beyond his wildest dreams. But he can’t pull it off alone. . . .', '../image/cover/7.png', '2015', 'English', 'Henry Holt'),
('9781503219700', 'A Tale of Two Cities', 'Charles Dickens', 'It was the best of times, it was the worst of times, it was the age of wisdom, it was the age of foolishness, it was the epoch of belief, it was the epoch of incredulity, it was the season of Light, it was the season of Darkness, it was the spring of hope, it was the winter of despair, we had everything before us, we had nothing before us, we were all going direct to Heaven, we were all going direct the other way—in short, the period was so far like the present period, that some of its noisiest authorities insisted on its being received, for good or for evil, in the superlative degree of comparison only.', '../image/cover/1.png', '1859', 'English', 'Chapman & Hall'),
('9783442178582', 'Atomic Habits', 'James Clear', 'If you\'re having trouble changing your habits, the problem isn\'t you. The problem is your system. Bad habits repeat themselves again and again not because you don\'t want to change, but because you have the wrong system for change. You do not rise to the level of your goals. You fall to the level of your systems. Here, you\'ll get a proven system that can take you to new heights.', '../image/cover/8.png', '2018', 'English', 'Avery');

-- --------------------------------------------------------

--
-- Table structure for table `popular_books`
--

CREATE TABLE `popular_books` (
  `ISBN` varchar(15) NOT NULL,
  `judul` varchar(36) NOT NULL,
  `penulis` varchar(24) NOT NULL,
  `deskripsi` text NOT NULL,
  `src_gambar` varchar(36) NOT NULL,
  `published` varchar(8) NOT NULL,
  `language` varchar(16) NOT NULL,
  `publisher` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_books`
--

INSERT INTO `popular_books` (`ISBN`, `judul`, `penulis`, `deskripsi`, `src_gambar`, `published`, `language`, `publisher`) VALUES
('9780140436623', 'Akademi Crypto', 'Timothy Ronald', 'Dalam kesempatan tersebut, Akademi Crypto juga meluncurkan berjudul Crypto Trading Guide. Dijelaskan, buku tersebut berisi tentang cara trading Crypto dari nol, dengan cara yang benar. Buku tersebut dapat digunakan untuk mengenal Crypto hingga menjadi ahli.', '../image/cover/12.png', '2024', 'Indonesia', 'Crypto Academy'),
('9780140439123', '10 Dosa Besar Soeharto', 'Wimanjaya K. Liotohe', 'zine- zine pendobrak kediktatoran orba soeharto dan digagas oleh para konseptor reformasi ini terdiri dari beberapa edisi, yang didalamnya dikemukakan fakta fakta berbahaya baik dari segi ekonomi , sosial, dan politik dari rezim suharto dan keluarganya ini, benar benar buku perlawanan!', '../image/cover/11.jpg', '1998', 'Indonesia', 'N/A'),
('9780140439199', 'The Art of War', 'Sun Tzu', 'Twenty-Five Hundred years ago, Sun Tzu wrote this classic book of military strategy based on Chinese warfare and military thought. Since that time, all levels of military have used the teaching on Sun Tzu to warfare and civilization have adapted these teachings for use in politics, business and everyday life. The Art of War is a book which should be used to gain advantage of opponents in the boardroom and battlefield alike.', '../image/cover/10.jpg', '500 BCE', 'English', '‎Filiquarian'),
('9793062797', 'Laskar Pelangi', 'Andrea Hirata', 'Mereka bersekolah dan belajar pada kelas yang sama dari kelas 1 SD sampai kelas 3 SMP, dan menyebut diri mereka sebagai Laskar Pelangi. Pada bagian-bagian akhir cerita, anggota Laskar Pelangi bertambah satu anak perempuan yang bernama Flo, seorang murid pindahan. Keterbatasan yang ada bukan membuat mereka putus asa, tetapi malah membuat mereka terpacu untuk dapat melakukan sesuatu yang lebih baik.', '../image/cover/9.jpg', '2005', 'Indonesia', 'Bentang Pustaka');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id_quote` int(11) NOT NULL,
  `kutipan` text NOT NULL,
  `dikutip` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id_quote`, `kutipan`, `dikutip`) VALUES
(660, 'Are you the strongest because you\'re Satoru Gojo? Or are you Satoru Gojo because you\'re the strongest?', 'Suguru Geto'),
(661, 'If you want a thing done well, do it yourself.', 'Napoleon Bonaparte'),
(662, 'If you cannot do great things, do small things in a great way', 'Napoleon Hill'),
(663, 'There is nothing impossible to him who will try', 'Alexander the Great'),
(665, 'Ayo baca buku!', 'Cella Baca Buku');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '123', 'admin'),
(2, 'iqbal', 'Muhammad Iqbal Anandra', 'iqbal@gmail.com', '321', 'user'),
(3, 'a', '', 'a@gmail.com', 'a', 'user'),
(5, 'ehlen', 'ahlan', 'alen@gmail.com', 'lope', 'user'),
(7, 'Jambi', 'Rifqi', 'jambi@gmail.com', 'jambialltheway', 'user'),
(8, 'arip', 'Arip Saputra', 'arip@gmail.com', 'arip', 'user'),
(9, 'fer', 'bintang fer', 'bintang@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_buku`
--

CREATE TABLE `user_buku` (
  `id_user_buku` int(11) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `popular_books`
--
ALTER TABLE `popular_books`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id_quote`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_buku`
--
ALTER TABLE `user_buku`
  ADD PRIMARY KEY (`id_user_buku`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id_quote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_buku`
--
ALTER TABLE `user_buku`
  ADD CONSTRAINT `user_buku_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `buku` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_buku_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
