-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 11:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `book_image` varchar(111) NOT NULL,
  `book_author_name` varchar(111) NOT NULL,
  `book_publication_name` varchar(111) NOT NULL,
  `book_purchase_date` varchar(111) NOT NULL,
  `book_price` tinyint(50) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `available_qty` int(5) NOT NULL,
  `librarian_username` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`, `date`) VALUES
(9, 'লাল নীল দীপাবলি বা বাঙলা সাহিত্যের জীবনী', '230724012401.png', '    sokal khan', '        সাহিত্য ও সাহিত্যিক বিষয়ক প্রবন্ধ', '2023-07-17', 127, 50, 49, 'helal7123', '2023-07-24 11:24:01'),
(11, 'ছোটা ভীম : ছোটা ভীম আর গনেশ ঠাকুর', '230725082915.png', ' হীরেন চট্টোপাধ্যায় (অনুবাদক)', 'পশ্চিমবঙ্গের বই:', '2023-07-19', 127, 50, 50, 'helal7123', '2023-07-25 06:29:15'),
(12, 'php book', '230726105052.png', ' মোঃ কামরুজ্জামান নিটন', 'rokomari', '2023-07-26', 127, 10, 10, 'helal7123', '2023-07-26 08:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `issu_books`
--

CREATE TABLE `issu_books` (
  `id` int(5) NOT NULL,
  `student_id` int(55) NOT NULL,
  `book_id` int(55) NOT NULL,
  `book_issu_date` varchar(255) NOT NULL,
  `book_return_date` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issu_books`
--

INSERT INTO `issu_books` (`id`, `student_id`, `book_id`, `book_issu_date`, `book_return_date`, `date`) VALUES
(1, 3, 9, '25-07-23', '26-07-23', '2023-07-25 07:08:01'),
(2, 3, 9, '25-07-23', '26-07-23', '2023-07-25 18:36:20'),
(5, 3, 9, '25-07-23', '26-07-23', '2023-07-25 19:38:54'),
(7, 6, 11, '26-07-23', '26-07-23', '2023-07-26 05:24:05'),
(8, 6, 11, '26-07-23', '26-07-23', '2023-07-26 05:33:08'),
(9, 1, 9, '26-07-23', '26-07-23', '2023-07-26 05:44:47'),
(10, 3, 11, '26-07-23', '26-07-23', '2023-07-26 05:45:17'),
(11, 1, 9, '26-07-23', '26-07-23', '2023-07-26 05:46:09'),
(12, 6, 11, '26-07-23', '26-07-23', '2023-07-26 05:46:25'),
(13, 3, 9, '26-07-23', '26-07-23', '2023-07-26 05:55:26'),
(14, 3, 11, '26-07-23', '26-07-23', '2023-07-26 05:55:40'),
(15, 1, 9, '26-07-23', '', '2023-07-26 07:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

CREATE TABLE `libraian` (
  `id` int(3) NOT NULL,
  `fast_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `fast_name`, `last_name`, `email`, `user_name`, `password`, `date`) VALUES
(1, 'sokal', 'chowdhury', 'monsurhelal104@gmail.com', 'helal7123', '123456', '2023-07-18 06:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `reg` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg`, `phone`, `email`, `username`, `password`, `image`, `status`, `date`) VALUES
(1, 'sokal', 'chowdhury', '220046', '1917719659', '+ (123) 456-7890', 'monsurhelal104@gmail.com', 'sokal101', '123456', NULL, 1, '2023-07-15 11:22:36'),
(3, 'হাসেম কাজী ', 'কাজী ', '220046', '1910739045', '+ (123) 456-78902', 'monsurhelal102@gmail.com', 'helal7123', '$2y$10$gBnK3v.Wuap0UligsA2B0urn8ICnUkixZyplfReFpV2Cf44wQOCBy', NULL, 1, '2023-07-15 19:02:11'),
(6, 'মোঃ মনসুর', ' হাওলাদার', '19223367163', '1910739045', '+ (123) 456-78902444', 'monsurhelal1044@gmail.com', 'admin', '$2y$10$a3e7MnGTnK8YuuGur4sCCOiNUQUk4WNoIOZG2Hj4cCUmQco0VhJPK', NULL, 1, '2023-07-16 11:10:35'),
(9, 'sokal', 'chowdhury', '220046', '1917719659', '+ (123) 456-7890244422', 'monsurhelal10222@gmail.com', 'helal712311', '$2y$10$GALlj.5Gloc3b1sxCLFXdeRQsAvaiJUy1/lSwcwTYWXyM9iKbN2Rq', NULL, 0, '2023-07-16 19:44:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issu_books`
--
ALTER TABLE `issu_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraian`
--
ALTER TABLE `libraian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `issu_books`
--
ALTER TABLE `issu_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `libraian`
--
ALTER TABLE `libraian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
