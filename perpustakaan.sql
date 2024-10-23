-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 08:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Data Peminjam Harian` ()   BEGIN
    SELECT * FROM loans WHERE DATE(loan_date) = CURDATE();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Jumlah Peminjan Mingguan` ()   BEGIN
    DECLARE start_date DATE;
    DECLARE end_date DATE;
    DECLARE jumlah_peminjaman INT;

    SET start_date = CURDATE() - INTERVAL WEEKDAY(CURDATE()) DAY;
    SET end_date = start_date + INTERVAL 6 DAY;

    SELECT COUNT(*) INTO jumlah_peminjaman 
    FROM loans 
    WHERE loan_date BETWEEN start_date AND end_date;

    SELECT jumlah_peminjaman AS Jumlah_Peminjaman_Mingguan;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Peminjam Harian` ()   BEGIN
    DECLARE jumlah_peminjaman INT;

    SELECT COUNT(*) INTO jumlah_peminjaman 
    FROM loans 
    WHERE DATE(loan_date) = CURDATE();

    SELECT jumlah_peminjaman AS Jumlah_Peminjaman_Harian;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publication_year` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `describe_book` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `writer`, `publisher`, `publication_year`, `image`, `describe_book`, `stok`) VALUES
(7, 'Negeri 5 Menara', 'JK Rowling', 'Gramedia', '2020', '5_menara1.jpg', 'ini adalah deskripsi buku', 20),
(8, 'The Smith', 'JK Rowling', 'Gramedia', '2020', 'logic1.jpg', 'ini adalah buku', 57),
(9, 'Red Handed', 'JK Rowling', 'Gramedia', '2020', 'red_handed1.jpg', 'adesda', 121),
(10, 'Everything Fvcked', 'Hanasohi', 'Gramedia', '2020', 'everything_fvcked.jpg', 'this is the best book itw', 34),
(11, 'Heads Up', 'James Bound', 'Gramedia', '2019', 'heads_up1.jpg', 'this is the best book itw', 20),
(12, 'Enough About You', 'Alfredo C', 'Gramedia', '2022', 'enough_about_you.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam maxime libero quis architecto. Deserunt voluptatibus pariatur eveniet rerum, magnam laboriosam sapiente blanditiis et. Eius nostrum, consequuntur reiciendis ipsum voluptate sint architecto natus dolores, dicta aperiam, accusamus maxime quis vero. Sequi aspernatur rem assumenda eligendi placeat? Neque velit aut quaerat quas tempora itaque ratione consequatur architecto harum. Repellendus molestiae, voluptatibus adipisci reprehenderit rerum asperiores? Corporis, ex facere deserunt veritatis suscipit quia recusandae assumenda adipisci sed inventore.\r\n', 120),
(13, 'Diary', 'JK Rowling', 'Gramedia', '2020', 'diary.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam maxime libero quis architecto. Deserunt voluptatibus pariatur eveniet rerum, magnam laboriosam sapiente blanditiis et. Eius nostrum, consequuntur reiciendis ipsum voluptate sint architecto natus dolores, dicta aperiam, accusamus maxime quis vero. Sequi aspernatur rem assumenda eligendi placeat? Neque velit aut quaerat quas tempora itaque ratione consequatur architecto harum. Repellendus molestiae, voluptatibus adipisci reprehenderit rerum asperiores? Corporis, ex facere deserunt veritatis suscipit quia recusandae assumenda adipisci sed inventore.\r\n', 123),
(14, 'Talk Like Ted', 'Alfredo C', 'Gramedia', '2019', 'talk_like_ted.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam maxime libero quis architecto. Deserunt voluptatibus pariatur eveniet rerum, magnam laboriosam sapiente blanditiis et. Eius nostrum, consequuntur reiciendis ipsum voluptate sint architecto natus dolores, dicta aperiam, accusamus maxime quis vero. Sequi aspernatur rem assumenda eligendi placeat? Neque velit aut quaerat quas tempora itaque ratione consequatur architecto harum. Repellendus molestiae, voluptatibus adipisci reprehenderit rerum asperiores? Corporis, ex facere deserunt veritatis suscipit quia recusandae assumenda adipisci sed inventore.\r\n', 21),
(15, 'Bulan', 'Ahmad B', 'Gramedia', '2020', 'bulan.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam maxime libero quis architecto. Deserunt voluptatibus pariatur eveniet rerum, magnam laboriosam sapiente blanditiis et. Eius nostrum, consequuntur reiciendis ipsum voluptate sint architecto natus dolores, dicta aperiam, accusamus maxime quis vero. Sequi aspernatur rem assumenda eligendi placeat? Neque velit aut quaerat quas tempora itaque ratione consequatur architecto harum. Repellendus molestiae, voluptatibus adipisci reprehenderit rerum asperiores? Corporis, ex facere deserunt veritatis suscipit quia recusandae assumenda adipisci sed inventore.\r\n', 12),
(16, 'Dua Garis Biru', 'Ahmad B', 'Gramedia', '2020', 'dua_garis_biru.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam maxime libero quis architecto. Deserunt voluptatibus pariatur eveniet rerum, magnam laboriosam sapiente blanditiis et. Eius nostrum, consequuntur reiciendis ipsum voluptate sint architecto natus dolores, dicta aperiam, accusamus maxime quis vero. Sequi aspernatur rem assumenda eligendi placeat? Neque velit aut quaerat quas tempora itaque ratione consequatur architecto harum. Repellendus molestiae, voluptatibus adipisci reprehenderit rerum asperiores? Corporis, ex facere deserunt veritatis suscipit quia recusandae assumenda adipisci sed inventore.\r\n', 123),
(17, 'Never Split', 'Ahmad B', 'Gramedia', '2020', 'never_split.jpg', 'the best book', 21),
(22, 'sas', 'asas', 'Gramedia', '2020', 'wimpy_kid5.jpg', 'asas', 21);

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `book_categories_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`book_categories_id`, `book_id`, `categories_id`) VALUES
(2, 4, 4),
(3, 5, 3),
(4, 6, 2),
(5, 7, 2),
(6, 8, 2),
(7, 9, 1),
(8, 10, 2),
(9, 11, 7),
(10, 12, 8),
(11, 13, 8),
(12, 14, 2),
(13, 15, 8),
(14, 16, 8),
(15, 17, 6),
(16, 22, 2),
(17, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `name_categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name_categories`) VALUES
(1, 'Businnes dan Economics'),
(2, 'Psyschology'),
(4, 'School'),
(6, 'Sastra'),
(7, 'Social'),
(8, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `loans_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` varchar(255) NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `extensions_id` int(1) NOT NULL,
  `confirm_rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loans_id`, `users_id`, `book_id`, `author_id`, `loan_date`, `return_date`, `status`, `extensions_id`, `confirm_rate`) VALUES
(42, 7, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Assessed', 0, 1),
(44, 17, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Assessed', 1, 1),
(45, 17, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Assessed', 1, 1),
(46, 17, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Finished', 0, 0),
(47, 7, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Assessed', 0, 1),
(51, 7, 4, 'Yusuf', '2024-03-06', '2024-03-06', 'Finished', 1, 0),
(53, 7, 7, 'Yusuf', '2024-03-06', '2024-03-06', 'Finished', 0, 0),
(54, 7, 8, 'Yusuf', '2024-03-07', '2024-03-07', 'Finished', 0, 0),
(56, 17, 11, 'Eislan Yusuf', '2024-03-07', '2024-03-07', 'Assessed', 0, 1),
(57, 17, 9, 'Yusuf', '2024-03-07', '2024-03-07', 'Finished', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_collections`
--

CREATE TABLE `personal_collections` (
  `collections_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_collections`
--

INSERT INTO `personal_collections` (`collections_id`, `users_id`, `book_id`) VALUES
(3, 14, 4),
(6, 7, 4),
(7, 7, 7),
(8, 7, 9),
(9, 17, 15),
(10, 17, 16);

-- --------------------------------------------------------

--
-- Table structure for table `rate_book`
--

CREATE TABLE `rate_book` (
  `rate_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate_book`
--

INSERT INTO `rate_book` (`rate_id`, `book_id`, `users_id`, `rate`, `text`, `date`) VALUES
(6, 4, 7, 5, 'sudah', '0000-00-00'),
(7, 4, 7, 4, 'shetheth', '0000-00-00'),
(8, 4, 17, 5, 'halooo', '0000-00-00'),
(9, 4, 17, 3, 'erhyer', '2024-03-06'),
(10, 11, 17, 5, 'halo', '2024-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `username`, `password`, `email`, `address`, `telp`, `role`) VALUES
(7, 'Yusuf', 'eislan123', '123', 'eislan123@gmail.com', 'Dadapbong', '083822766924', 'Admin'),
(11, 'Eislan Yusuf', 'eislan123', '123', 'yusuf@gmail.com', '', '', 'Admin'),
(14, 'Naufali', 'naufali123', '123', 'naufali123@gmal.com', '', '', 'Users'),
(16, 'Aditya', 'eislan123', '123', 'aditya123@gmal.com', 'dasd', '083822766924', 'Users'),
(17, 'Anisa Hapsari', 'anisa', '123', 'anisa123@gmail.com', 'kentolan', '083822766924', 'Users'),
(19, 'Eislan Yusuf', 'eislan123', '123', 'yusuf111@gmail.com', '', '', 'Staff'),
(20, 'Eislan Yusuf', '', '123', 'eislan1234@gmail.com', '', '', 'Users'),
(21, 'Yusuffff', 'eislan12', '123', 'eislan@gmail.com', '', '', 'Staff'),
(22, 'Yusuf', 'eislan123', '123', 'yusuf123@gmail.com', '', '', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`book_categories_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`loans_id`);

--
-- Indexes for table `personal_collections`
--
ALTER TABLE `personal_collections`
  ADD PRIMARY KEY (`collections_id`);

--
-- Indexes for table `rate_book`
--
ALTER TABLE `rate_book`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `book_categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `loans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_collections`
--
ALTER TABLE `personal_collections`
  MODIFY `collections_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rate_book`
--
ALTER TABLE `rate_book`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
