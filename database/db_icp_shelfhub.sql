-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 14, 2025 at 02:19 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_icp_shelfhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`id`, `author`, `created_at`, `updated_at`) VALUES
(30, 'Adarna House', '2025-04-14 12:35:10', '2025-04-14 12:35:10'),
(31, 'Venice GD', '2025-04-14 12:43:17', '2025-04-14 12:43:17'),
(32, 'Lilit Abel​', '2025-04-14 12:49:47', '2025-04-14 12:49:47'),
(33, 'Vibal Group', '2025-04-14 12:56:00', '2025-04-14 12:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Education', '2023-12-03 07:51:47', '2023-12-03 08:09:18'),
(2, 'Motivation', '2023-12-03 07:56:06', '2023-12-03 07:56:06'),
(4, 'Fiction', '2023-12-03 08:09:24', '2023-12-03 08:09:24'),
(6, 'Romance', '2023-12-07 05:47:12', '2023-12-07 05:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `book_data`
--

CREATE TABLE `book_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `synopsis` varchar(2000) NOT NULL,
  `language` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `total_page` int(11) NOT NULL,
  `quantity_available` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_data`
--

INSERT INTO `book_data` (`id`, `title`, `cover_image`, `synopsis`, `language`, `publish_date`, `total_page`, `quantity_available`, `publisher_id`, `author_id`, `category_id`, `created_at`, `updated_at`) VALUES
(35, 'Ang Mahiyaing Manok​', '67fd01e19ec2a_1744634337.jpg', 'Ang Mahiyaing Manok (The Shy Chicken) is a delightful children\'s storybook that narrates the tale of a chicken who is too shy to interact with others. The story aims to teach children about overcoming shyness and the importance of social interaction. The book features vibrant illustrations and engaging narratives suitable for young readers.​', 'Filipino', '2004-04-15', 32, 5, 31, 30, 4, '2025-04-14 12:37:46', '2025-04-14 12:38:57'),
(36, 'Geothermal Energy', '67fd038a9c689_1744634762.jpg', 'This book explores the utilization of geothermal energy as a sustainable and renewable energy source. It covers the technical aspects of geothermal systems, their environmental benefits, and their role in the global energy landscape.', 'English', '2024-09-29', 200, 5, 32, 31, 1, '2025-04-14 12:46:02', '2025-04-14 12:46:02'),
(37, 'ON THE HISTORY OF THE FORMATION AND ACTIVITY OF THE WAQF ADMINISTRATION OF THE KUKELDASH MADRASAH (XVI-early XX centuries)', '67fd054ce8813_1744635212.jpg', 'The article examines the emergence of the Kukeldash Madrasah in Tashkent and the associated Waqf, studying the identity of the donor and creator of the madrasah, as well as the peculiarities of its functioning.', 'English', '2025-04-14', 50, 5, 33, 32, 1, '2025-04-14 12:51:25', '2025-04-14 12:53:32'),
(38, 'Real-World Math', '67fd06613004b_1744635489.png', 'Real-World Math addresses mathematical concepts by using both inductive and mastery learning approaches. It covers three content domains: numbers and algebra, measurement and geometry, and data and probability. The series emphasizes the application of mathematical concepts to real-world situations, moving beyond standard drills and problems.', 'English', '2023-10-18', 200, 5, 34, 33, 1, '2025-04-14 12:58:09', '2025-04-14 13:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `book_publisher`
--

CREATE TABLE `book_publisher` (
  `id` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_publisher`
--

INSERT INTO `book_publisher` (`id`, `publisher`, `created_at`, `updated_at`) VALUES
(31, 'Adarna House Inc.', '2025-04-14 12:34:41', '2025-04-14 12:34:41'),
(32, 'Venice GD', '2025-04-14 12:43:28', '2025-04-14 12:43:28'),
(33, 'Philippine Digital Library', '2025-04-14 12:50:02', '2025-04-14 12:50:02'),
(34, 'Vibal Group', '2025-04-14 12:55:28', '2025-04-14 12:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2023-12-03 15:12:10', '2023-12-04 03:36:43'),
(2, 'Rejected', '2023-12-03 15:12:24', '2023-12-04 03:36:47'),
(3, 'Accepted', '2023-12-03 15:12:28', '2023-12-04 03:36:50'),
(4, 'Borrowed', '2023-12-05 18:36:11', '2023-12-05 18:36:22'),
(5, 'Returned', '2023-12-05 18:36:15', '2023-12-05 18:36:24'),
(6, 'Request Return', '2023-12-05 18:46:44', '2023-12-05 18:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_borrow`
--

CREATE TABLE `transaction_borrow` (
  `id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_borrow`
--

INSERT INTO `transaction_borrow` (`id`, `borrow_date`, `return_date`, `quantity`, `status_id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(29, '2025-04-14', '2025-05-06', 1, 3, 2, 38, '2025-04-14 13:00:35', '2025-04-14 13:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_return`
--

CREATE TABLE `transaction_return` (
  `id` int(11) NOT NULL,
  `return_date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `fine_amount` decimal(10,0) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `borrow_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_return`
--

INSERT INTO `transaction_return` (`id`, `return_date`, `quantity`, `fine_amount`, `message`, `status_id`, `borrow_id`, `created_at`, `updated_at`) VALUES
(20, '2025-04-14', 1, '200', 'May punit yung cover ng book', 5, 29, '2025-04-14 13:00:56', '2025-04-14 13:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-28 13:39:37', '2023-11-28 13:39:37'),
(2, 1, 2, '2023-11-28 13:39:41', '2023-11-28 13:39:41'),
(3, 2, 2, '2023-11-28 13:46:28', '2023-11-28 13:46:28'),
(4, 1, 3, '2023-11-28 13:47:10', '2023-11-28 13:47:10'),
(5, 1, 4, '2023-11-28 13:47:20', '2023-11-28 13:47:20'),
(6, 1, 5, '2023-11-28 13:49:32', '2023-11-28 13:49:32'),
(8, 2, 7, '2023-11-30 12:10:25', '2023-11-30 12:10:25'),
(9, 1, 8, '2023-12-03 15:00:46', '2023-12-03 15:00:46'),
(11, 3, 2, '2023-12-04 05:46:18', '2023-12-04 05:46:18'),
(12, 3, 6, '2023-12-04 05:46:56', '2023-12-04 05:46:56'),
(13, 3, 9, '2023-12-04 05:47:05', '2023-12-04 05:47:05'),
(14, 3, 10, '2023-12-04 05:53:09', '2023-12-04 05:53:09'),
(15, 3, 5, '2023-12-04 18:01:58', '2023-12-04 18:01:58'),
(16, 1, 6, '2023-12-05 18:11:14', '2023-12-05 18:11:14'),
(17, 1, 9, '2023-12-05 18:11:18', '2023-12-05 18:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `first_name`, `last_name`, `username`, `avatar_image`, `email`, `password`, `gender`, `address`, `phone_number`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Rosh', 'Ingel', 'admin', '67fcfe62f1be2_1744633442.jpg', 'default@admin.com', '$2y$10$9qIq.wV45eOPwSV5hotkOe2fx/aNnbNFTnvXeDI8sceZXRodo0D8O', 'Male', 'Caloocan City', '09759224758', 1, '2023-01-28 13:35:18', '2025-04-14 12:24:03'),
(2, 'Bea', 'Navin', 'user', '67fcf7251a2b2_1744631589.jpg', 'default@user.com', '$2y$10$MsyHn8Ki9HRJiaNwNcYfEuQr0FABPXmvl4t7pkz22NtChjHbKvuqK', 'Female', 'Quezon City', '09827748621', 2, '2023-02-28 13:36:29', '2025-04-14 11:53:09'),
(26, 'Operator', 'System', 'operator', 'default_male.jpg', 'default@operator.com', '$2y$10$1KBuJ/LReucPykVghpjV4OsA0XiTKMmI3ma7b0hk1QBWIDq4BWimy', 'Male', 'Jl. Operator', '089123123', 3, '2023-12-04 05:48:42', '2023-12-04 05:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_log_action`
--

CREATE TABLE `user_log_action` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log_action`
--

INSERT INTO `user_log_action` (`id`, `user_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role \"User\" granted access to menu \"User\"', '2023-11-28 13:46:28', '2023-11-28 13:46:28'),
(2, 1, 'Role \"Administrator\" granted access to menu \"Menu\"', '2023-11-28 13:47:10', '2023-11-28 13:47:10'),
(3, 1, 'Role \"Administrator\" granted access to menu \"Submenu\"', '2023-11-28 13:47:20', '2023-11-28 13:47:20'),
(4, 1, 'Menu \"Log\" has been added!', '2023-11-28 13:49:24', '2023-11-28 13:49:24'),
(5, 1, 'Role \"Administrator\" granted access to menu \"Log\"', '2023-11-28 13:49:32', '2023-11-28 13:49:32'),
(6, 1, 'Submenu \"Action\" has been added!', '2023-11-28 13:49:54', '2023-11-28 13:49:54'),
(7, 1, 'Menu \"Book Master\" has been added!', '2023-11-29 05:37:42', '2023-11-29 05:37:42'),
(8, 1, 'Role \"Administrator\" granted access to menu \"Book Master\"', '2023-11-29 05:38:20', '2023-11-29 05:38:20'),
(9, 1, 'Profile edited!', '2023-11-29 05:38:42', '2023-11-29 05:38:42'),
(10, 1, 'Submenu \"Publisher\" has been added!', '2023-11-29 05:39:41', '2023-11-29 05:39:41'),
(11, 1, 'Submenu \"Book Publisher\" has been changed!', '2023-11-29 05:39:56', '2023-11-29 05:39:56'),
(12, 1, 'Submenu \"Book Author\" has been added!', '2023-11-29 05:40:16', '2023-11-29 05:40:16'),
(13, 1, 'Submenu \"Book Data\" has been added!', '2023-11-29 05:40:35', '2023-11-29 05:40:35'),
(14, 1, 'Submenu \"Book Publisher\" has been changed!', '2023-11-29 05:45:30', '2023-11-29 05:45:30'),
(15, 1, 'Submenu \"Book Publisher\" has been changed!', '2023-11-29 05:46:13', '2023-11-29 05:46:13'),
(16, 1, 'Submenu \"Book Publisher\" has been changed!', '2023-11-29 05:48:04', '2023-11-29 05:48:04'),
(17, 1, 'Menu \"Book Master\" has been change to \"Book\"!', '2023-11-29 05:49:14', '2023-11-29 05:49:14'),
(18, 1, 'Publisher \"Test Publisher\" has been added!', '2023-11-29 06:01:14', '2023-11-29 06:01:14'),
(19, 1, 'Publisher \"Test 2\" has been added!', '2023-11-29 06:05:20', '2023-11-29 06:05:20'),
(20, 1, 'Publisher \"Test\" has been added!', '2023-11-29 06:07:34', '2023-11-29 06:07:34'),
(21, 1, 'Publisher \"Test\" has been change to \"Test 1\"!', '2023-11-29 06:08:00', '2023-11-29 06:08:00'),
(22, 1, 'Publisher \"Test 2\" has been added!', '2023-11-29 06:08:25', '2023-11-29 06:08:25'),
(23, 1, 'Publisher \"Test 3\" has been added!', '2023-11-29 06:08:29', '2023-11-29 06:08:29'),
(24, 1, 'Publisher \"Test 4\" has been added!', '2023-11-29 06:08:33', '2023-11-29 06:08:33'),
(25, 1, 'Publisher \"Test 5\" has been added!', '2023-11-29 06:08:37', '2023-11-29 06:08:37'),
(26, 1, 'Publisher \"Test 5\" has been deleted!', '2023-11-29 06:10:30', '2023-11-29 06:10:30'),
(27, 1, 'Publisher \"Test 1\" has been deleted!', '2023-11-29 06:10:58', '2023-11-29 06:10:58'),
(28, 1, 'Publisher \"Test 2\" has been deleted!', '2023-11-29 06:11:05', '2023-11-29 06:11:05'),
(29, 1, 'Publisher \"Test 3\" has been deleted!', '2023-11-29 06:11:10', '2023-11-29 06:11:10'),
(30, 1, 'Publisher \"Test 4\" has been deleted!', '2023-11-29 06:11:12', '2023-11-29 06:11:12'),
(31, 1, 'Publisher \"R. Sandhika Galih dan Acep Hendra\" has been added!', '2023-11-29 06:11:36', '2023-11-29 06:11:36'),
(32, 1, 'Publisher \"George R. R. Martin\" has been added!', '2023-11-29 06:15:45', '2023-11-29 06:15:45'),
(33, 1, 'Publisher \"J. K. Rowling\" has been added!', '2023-11-29 06:15:57', '2023-11-29 06:15:57'),
(34, 1, 'Submenu \"Book Author\" has been changed!', '2023-11-29 06:19:26', '2023-11-29 06:19:26'),
(35, 1, 'Author \"Test 1\" has been added!', '2023-11-29 06:23:38', '2023-11-29 06:23:38'),
(36, 1, 'Author \"Test 2\" has been added!', '2023-11-29 06:24:36', '2023-11-29 06:24:36'),
(37, 1, 'Author \"Test 3\" has been added!', '2023-11-29 06:24:40', '2023-11-29 06:24:40'),
(38, 1, 'Author \"Test 4\" has been added!', '2023-11-29 06:24:44', '2023-11-29 06:24:44'),
(39, 1, 'Author \"Test 5\" has been added!', '2023-11-29 06:24:48', '2023-11-29 06:24:48'),
(40, 1, 'Author \"Test 5\" has been change to \"Test 5 edit\"!', '2023-11-29 06:27:46', '2023-11-29 06:27:46'),
(41, 1, 'Author \"Test 5 edit\" has been deleted!', '2023-11-29 06:28:31', '2023-11-29 06:28:31'),
(42, 1, 'Author \"Test 4\" has been deleted!', '2023-11-29 06:28:52', '2023-11-29 06:28:52'),
(43, 1, 'Author \"Test 3\" has been deleted!', '2023-11-29 06:28:55', '2023-11-29 06:28:55'),
(44, 1, 'Author \"Test 2\" has been deleted!', '2023-11-29 06:28:58', '2023-11-29 06:28:58'),
(45, 1, 'Author \"Test 1\" has been deleted!', '2023-11-29 06:29:00', '2023-11-29 06:29:00'),
(46, 1, 'Author \"R. Sandhika Galih dan Acep Hendra\" has been added!', '2023-11-29 06:29:26', '2023-11-29 06:29:26'),
(47, 1, 'Author \"George R. R. Martin\" has been added!', '2023-11-29 06:29:34', '2023-11-29 06:29:34'),
(48, 1, 'Author \"J. K. Rowling\" has been added!', '2023-11-29 06:29:41', '2023-11-29 06:29:41'),
(49, 1, 'Publisher \"R. Sandhika Galih dan Acep Hendra\" has been change to \"PT Inovasi Karya Mehendra\"!', '2023-11-29 06:30:08', '2023-11-29 06:30:08'),
(50, 1, 'Publisher \"George R. R. Martin\" has been change to \"Bantam Books\"!', '2023-11-29 06:30:15', '2023-11-29 06:30:15'),
(51, 1, 'Publisher \"J. K. Rowling\" has been change to \"Arthur A. Levine Books an imprint of Scholastic Inc.\"!', '2023-11-29 06:30:22', '2023-11-29 06:30:22'),
(52, 1, 'Submenu \"Book Data\" has been changed!', '2023-11-29 06:33:45', '2023-11-29 06:33:45'),
(53, 1, 'Admin \"admin\" has been added a new book \"DASAR-DASAR PEMROGRAMAN WEB\"', '2023-11-29 10:57:07', '2023-11-29 10:57:07'),
(54, 1, 'Admin \"admin\" has been added a new book \"DASAR-DASAR PEMROGRAMAN WEB\"', '2023-11-29 11:07:07', '2023-11-29 11:07:07'),
(55, 1, 'Admin \"admin\" has been added a new book \"A Game of Thrones\"', '2023-11-29 11:08:53', '2023-11-29 11:08:53'),
(56, 1, 'Admin \"admin\" has been added a new book \"A Game of Thrones\"', '2023-11-29 11:10:04', '2023-11-29 11:10:04'),
(57, 1, 'Admin \"admin\" has been added a new book \"Harry Potter and the Deathly Hallows\"', '2023-11-29 11:11:06', '2023-11-29 11:11:06'),
(58, 1, 'Admin \"admin\" has been added a new book \"Testing\"', '2023-11-29 11:17:28', '2023-11-29 11:17:28'),
(59, 1, 'Publisher \"Erik Robertson\" has been added!', '2023-11-30 05:57:48', '2023-11-30 05:57:48'),
(60, 1, 'Author \"Eric Robertson\" has been added!', '2023-11-30 05:58:19', '2023-11-30 05:58:19'),
(68, 1, 'A new book \"Control Your Mind and Master Your Feelings\" has been added!', '2023-11-30 06:13:34', '2023-11-30 06:13:34'),
(69, 1, 'Book \"Control Your Mind and Master Your Feeling\" has been updated!', '2023-11-30 06:14:52', '2023-11-30 06:14:52'),
(70, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been upadted!', '2023-11-30 06:21:29', '2023-11-30 06:21:29'),
(71, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been change to \"Control Your Mind and Master Your Feeling\"!', '2023-11-30 06:22:23', '2023-11-30 06:22:23'),
(72, 1, 'Book \"Control Your Mind and Master Your Feeling\" has been upadted!', '2023-11-30 06:22:55', '2023-11-30 06:22:55'),
(73, 1, 'Book \"Control Your Mind and Master Your Feeling\" has been change to \"Control Your Mind and Master Your Feelings\"!', '2023-11-30 06:23:50', '2023-11-30 06:23:50'),
(74, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been upadted!', '2023-11-30 06:32:53', '2023-11-30 06:32:53'),
(75, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been upadted!', '2023-11-30 06:33:03', '2023-11-30 06:33:03'),
(76, 1, 'Admin \"admin\" has been deleted book data \"Control Your Mind and Master Your Feelings\"!', '2023-11-30 06:39:02', '2023-11-30 06:39:02'),
(77, 1, 'A new book \"Control Your Mind and Master Your Feelings\" has been added!', '2023-11-30 06:39:43', '2023-11-30 06:39:43'),
(78, 1, 'Admin \"admin\" has been deleted book data \"Control Your Mind and Master Your Feelings\"!', '2023-11-30 06:40:00', '2023-11-30 06:40:00'),
(79, 1, 'A new book \"Control Your Mind and Master Your Feelings\" has been added!', '2023-11-30 06:41:12', '2023-11-30 06:41:12'),
(80, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been upadted!', '2023-11-30 06:41:24', '2023-11-30 06:41:24'),
(81, 1, 'Admin \"admin\" has been deleted book data \"Control Your Mind and Master Your Feelings\"!', '2023-11-30 06:41:30', '2023-11-30 06:41:30'),
(82, 1, 'A new book \"Control Your Mind and Master Your Feelings\" has been added!', '2023-11-30 07:40:55', '2023-11-30 07:40:55'),
(83, 1, 'Publisher \"HarperTrophy\" has been added!', '2023-11-30 08:10:16', '2023-11-30 08:10:16'),
(84, 1, 'Author \"C.S. Lewis\" has been added!', '2023-11-30 08:10:26', '2023-11-30 08:10:26'),
(85, 1, 'A new book \"Prince Caspian (Narnia)\" has been added!', '2023-11-30 08:11:36', '2023-11-30 08:11:36'),
(86, 1, 'Publisher \"Scholastic\" has been added!', '2023-11-30 08:12:23', '2023-11-30 08:12:23'),
(87, 1, 'A new book \"The Chronicles of Narnia (The Chronicles of Narnia)\" has been added!', '2023-11-30 08:13:43', '2023-11-30 08:13:43'),
(88, 1, 'Profile edited!', '2023-11-30 08:15:46', '2023-11-30 08:15:46'),
(89, 1, 'Publisher \"Random House\" has been added!', '2023-11-30 11:50:53', '2023-11-30 11:50:53'),
(90, 1, 'Author \"Mary Tillworth\" has been added!', '2023-11-30 11:51:03', '2023-11-30 11:51:03'),
(91, 1, 'A new book \"Dora\'s puppy, Perrito!\" has been added!', '2023-11-30 11:51:53', '2023-11-30 11:51:53'),
(92, 1, 'Publisher \"MIT Press\" has been added!', '2023-11-30 11:52:34', '2023-11-30 11:52:34'),
(93, 1, 'Author \"Jagdish N. Bhagwati\" has been added!', '2023-11-30 11:52:44', '2023-11-30 11:52:44'),
(94, 1, 'A new book \"The New international economic order\" has been added!', '2023-11-30 11:54:14', '2023-11-30 11:54:14'),
(95, 1, 'Author \"Sonia Sander\" has been added!', '2023-11-30 11:55:27', '2023-11-30 11:55:27'),
(96, 1, 'A new book \"3, 2, 1, liftoff!\" has been added!', '2023-11-30 11:56:31', '2023-11-30 11:56:31'),
(97, 1, 'Publisher \"DC Comics\" has been added!', '2023-11-30 11:57:21', '2023-11-30 11:57:21'),
(98, 1, 'Author \"Art Baltazar\" has been added!', '2023-11-30 11:57:30', '2023-11-30 11:57:30'),
(99, 1, 'A new book \"Tiny Titans\" has been added!', '2023-11-30 11:58:42', '2023-11-30 11:58:42'),
(100, 1, 'Publisher \"Thornes\" has been added!', '2023-11-30 11:59:58', '2023-11-30 11:59:58'),
(101, 1, 'Author \"Hilary Campbell\" has been added!', '2023-11-30 12:00:07', '2023-11-30 12:00:07'),
(102, 1, 'A new book \"Designing patterns\" has been added!', '2023-11-30 12:01:13', '2023-11-30 12:01:13'),
(103, 1, 'Publisher \"Harriman House\" has been added!', '2023-11-30 12:02:14', '2023-11-30 12:02:14'),
(104, 1, 'Author \"Morgan Housel\" has been added!', '2023-11-30 12:02:27', '2023-11-30 12:02:27'),
(105, 1, 'A new book \"The Psychology of Money\" has been added!', '2023-11-30 12:03:14', '2023-11-30 12:03:14'),
(106, 1, 'Menu \"Member\" has been added!', '2023-11-30 12:09:28', '2023-11-30 12:09:28'),
(107, 1, 'Submenu \"List Book\" has been added!', '2023-11-30 12:10:13', '2023-11-30 12:10:13'),
(108, 1, 'Role \"User\" granted access to menu \"Member\"', '2023-11-30 12:10:25', '2023-11-30 12:10:25'),
(109, 1, 'Submenu \"List Book\" has been deleted!', '2023-11-30 12:11:09', '2023-11-30 12:11:09'),
(110, 1, 'Submenu \"Dashboard\" has been added!', '2023-11-30 12:11:38', '2023-11-30 12:11:38'),
(111, 1, 'Submenu \"List Book\" has been added!', '2023-11-30 12:12:04', '2023-11-30 12:12:04'),
(112, 1, 'Publisher \"Test\" has been added!', '2023-12-01 11:29:04', '2023-12-01 11:29:04'),
(113, 1, 'Submenu \"Book Category\" has been added!', '2023-12-03 07:41:30', '2023-12-03 07:41:30'),
(114, 1, 'Category \"Fiction\" has been added!', '2023-12-03 07:51:47', '2023-12-03 07:51:47'),
(115, 1, 'Category \"Motivation\" has been added!', '2023-12-03 07:56:06', '2023-12-03 07:56:06'),
(116, 1, 'Category \"Test\" has been added!', '2023-12-03 07:56:13', '2023-12-03 07:56:13'),
(117, 1, 'Category \"Test\" has been change to \"Test2\"!', '2023-12-03 07:56:28', '2023-12-03 07:56:28'),
(118, 1, 'Category \"Test2\" has been change to \"Test\"!', '2023-12-03 07:56:56', '2023-12-03 07:56:56'),
(119, 1, 'Category \"Test\" has been deleted!', '2023-12-03 07:57:29', '2023-12-03 07:57:29'),
(120, 1, 'Submenu \"Book Data\" has been added!', '2023-12-03 08:08:47', '2023-12-03 08:08:47'),
(121, 1, 'Submenu \"Book Data\" has been deleted!', '2023-12-03 08:08:53', '2023-12-03 08:08:53'),
(122, 1, 'Category \"Fiction\" has been change to \"Education\"!', '2023-12-03 08:09:18', '2023-12-03 08:09:18'),
(123, 1, 'Category \"Fiction\" has been added!', '2023-12-03 08:09:24', '2023-12-03 08:09:24'),
(124, 1, 'Book \"A Game of Thrones\" has been upadted!', '2023-12-03 08:09:35', '2023-12-03 08:09:35'),
(125, 1, 'Book \"A Game of Thrones\" has been upadted!', '2023-12-03 08:10:56', '2023-12-03 08:10:56'),
(126, 1, 'Book \"Harry Potter and the Deathly Hallows\" has been upadted!', '2023-12-03 08:11:08', '2023-12-03 08:11:08'),
(127, 1, 'Book \"Control Your Mind and Master Your Feelings\" has been upadted!', '2023-12-03 08:11:23', '2023-12-03 08:11:23'),
(128, 1, 'Book \"Prince Caspian (Narnia)\" has been upadted!', '2023-12-03 08:11:31', '2023-12-03 08:11:31'),
(129, 1, 'Book \"The Chronicles of Narnia (The Chronicles of Narnia)\" has been upadted!', '2023-12-03 08:11:39', '2023-12-03 08:11:39'),
(130, 1, 'Book \"Dora\'s puppy, Perrito!\" has been upadted!', '2023-12-03 08:11:46', '2023-12-03 08:11:46'),
(131, 1, 'Book \"3, 2, 1, liftoff!\" has been upadted!', '2023-12-03 08:12:02', '2023-12-03 08:12:02'),
(132, 1, 'Book \"Tiny Titans\" has been upadted!', '2023-12-03 08:12:09', '2023-12-03 08:12:09'),
(133, 1, 'A new book \"Read People Like a Book\" has been added!', '2023-12-03 08:14:31', '2023-12-03 08:14:31'),
(134, 1, 'Publisher \"Pkcs Media, Inc.\" has been added!', '2023-12-03 08:15:33', '2023-12-03 08:15:33'),
(135, 1, 'Author \"Patrick King\" has been added!', '2023-12-03 08:16:37', '2023-12-03 08:16:37'),
(136, 1, 'Book \"Read People Like a Book\" has been upadted!', '2023-12-03 08:16:48', '2023-12-03 08:16:48'),
(137, 1, 'Admin \"admin\" has been deleted book data \"Read People Like a Book\"!', '2023-12-03 08:17:04', '2023-12-03 08:17:04'),
(138, 1, 'Book \"The New international economic order\" has been upadted!', '2023-12-03 10:12:00', '2023-12-03 10:12:00'),
(139, 1, 'Book \"Designing patterns\" has been upadted!', '2023-12-03 10:12:40', '2023-12-03 10:12:40'),
(140, 1, 'Category \"Test\" has been added!', '2023-12-03 14:33:43', '2023-12-03 14:33:43'),
(141, 1, 'Menu \"Status\" has been added!', '2023-12-03 15:00:20', '2023-12-03 15:00:20'),
(142, 1, 'Submenu \"Borrow\" has been added!', '2023-12-03 15:00:37', '2023-12-03 15:00:37'),
(143, 1, 'Role \"Administrator\" granted access to menu \"Status\"', '2023-12-03 15:00:46', '2023-12-03 15:00:46'),
(144, 1, 'Submenu \"Status Borrow\" has been changed!', '2023-12-03 15:02:07', '2023-12-03 15:02:07'),
(145, 1, 'Submenu \"List Status\" has been changed!', '2023-12-03 15:05:02', '2023-12-03 15:05:02'),
(146, 1, 'Status \"Pending\" has been added!', '2023-12-03 15:12:10', '2023-12-03 15:12:10'),
(147, 1, 'Status \"Rejected\" has been added!', '2023-12-03 15:12:24', '2023-12-03 15:12:24'),
(148, 1, 'Status \"Accepted\" has been added!', '2023-12-03 15:12:28', '2023-12-03 15:12:28'),
(149, 1, 'Status \"Test\" has been added!', '2023-12-03 15:12:35', '2023-12-03 15:12:35'),
(150, 1, 'Status \"Test\" has been deleted!', '2023-12-03 15:15:25', '2023-12-03 15:15:25'),
(151, 1, 'Status \"Testing\" has been added!', '2023-12-03 15:15:43', '2023-12-03 15:15:43'),
(152, 1, 'Status \"Testing\" has been change to \"Test\"!', '2023-12-03 15:15:48', '2023-12-03 15:15:48'),
(153, 1, 'Status \"Test\" has been deleted!', '2023-12-03 15:15:57', '2023-12-03 15:15:57'),
(154, 1, 'Category \"Test\" has been deleted!', '2023-12-04 04:59:42', '2023-12-04 04:59:42'),
(155, 2, 'Borrowed new book \"3, 2, 1, liftoff!\"!', '2023-12-04 05:03:17', '2023-12-04 05:03:17'),
(156, 1, 'Submenu \"List Borrow\" has been added!', '2023-12-04 05:17:57', '2023-12-04 05:17:57'),
(157, 1, 'Submenu \"List Return\" has been added!', '2023-12-04 05:18:26', '2023-12-04 05:18:26'),
(158, 1, 'Menu \"Request\" has been added!', '2023-12-04 05:38:18', '2023-12-04 05:38:18'),
(159, 1, 'Submenu \"Request Borrow\" has been added!', '2023-12-04 05:38:59', '2023-12-04 05:38:59'),
(160, 1, 'Role \"Administrator\" granted access to menu \"Request\"', '2023-12-04 05:39:04', '2023-12-04 05:39:04'),
(161, 1, 'Submenu \"Request Return\" has been added!', '2023-12-04 05:39:34', '2023-12-04 05:39:34'),
(162, 1, 'Role \"Operator\" has been added!', '2023-12-04 05:46:03', '2023-12-04 05:46:03'),
(163, 1, 'Role \"Operator\" granted access to menu \"User\"', '2023-12-04 05:46:18', '2023-12-04 05:46:18'),
(164, 1, 'Role \"Operator\" granted access to menu \"Book\"', '2023-12-04 05:46:56', '2023-12-04 05:46:56'),
(165, 1, 'Role \"Operator\" granted access to menu \"Request\"', '2023-12-04 05:47:05', '2023-12-04 05:47:05'),
(166, 1, 'Role \"Administrator\" granted no access to menu \"Book\"', '2023-12-04 05:47:15', '2023-12-04 05:47:15'),
(167, 1, 'Role \"Administrator\" granted no access to menu \"Request\"', '2023-12-04 05:47:19', '2023-12-04 05:47:19'),
(168, 1, 'Admin \"admin\" has been change user data \"operator\"!', '2023-12-04 05:49:15', '2023-12-04 05:49:15'),
(169, 1, 'Menu \"Operator\" has been added!', '2023-12-04 05:53:03', '2023-12-04 05:53:03'),
(170, 1, 'Role \"Operator\" granted access to menu \"Operator\"', '2023-12-04 05:53:09', '2023-12-04 05:53:09'),
(171, 1, 'Submenu \"Dashboard\" has been added!', '2023-12-04 05:53:34', '2023-12-04 05:53:34'),
(172, 2, 'Profile edited!', '2023-12-04 07:05:43', '2023-12-04 07:05:43'),
(173, 26, 'Operator has been accepted borrow!', '2023-12-04 17:46:20', '2023-12-04 17:46:20'),
(174, 26, 'Operator has been accepted borrow!', '2023-12-04 17:47:15', '2023-12-04 17:47:15'),
(175, 26, 'Operator has been rejected borrow!', '2023-12-04 17:48:01', '2023-12-04 17:48:01'),
(176, 26, 'Operator has been rejected borrow!', '2023-12-04 17:48:15', '2023-12-04 17:48:15'),
(177, 2, 'Borrowed new book \"Harry Potter and the Deathly Hallows\"!', '2023-12-04 17:55:41', '2023-12-04 17:55:41'),
(178, 1, 'Role \"Operator\" granted access to menu \"Log\"', '2023-12-04 18:01:58', '2023-12-04 18:01:58'),
(179, 1, 'Role \"Administrator\" granted access to menu \"Book\"', '2023-12-05 18:11:14', '2023-12-05 18:11:14'),
(180, 1, 'Role \"Administrator\" granted access to menu \"Request\"', '2023-12-05 18:11:18', '2023-12-05 18:11:18'),
(181, 2, 'Borrowed new book \"Harry Potter and the Deathly Hallows\"!', '2023-12-05 18:17:37', '2023-12-05 18:17:37'),
(182, 1, 'Operator has been accepted borrow!', '2023-12-05 18:23:58', '2023-12-05 18:23:58'),
(183, 1, 'Status \"Borrowed\" has been added!', '2023-12-05 18:36:11', '2023-12-05 18:36:11'),
(184, 1, 'Status \"Returned\" has been added!', '2023-12-05 18:36:15', '2023-12-05 18:36:15'),
(185, 1, 'Status \"Request Return\" has been added!', '2023-12-05 18:46:44', '2023-12-05 18:46:44'),
(186, 2, 'Borrowed new book \"3, 2, 1, liftoff!\"!', '2023-12-05 18:47:31', '2023-12-05 18:47:31'),
(187, 1, 'Operator has been accepted borrow!', '2023-12-05 18:47:46', '2023-12-05 18:47:46'),
(188, 2, 'Borrowed new book \"Designing patterns\"!', '2023-12-05 19:09:29', '2023-12-05 19:09:29'),
(189, 1, 'Operator has been accepted borrow!', '2023-12-05 19:09:51', '2023-12-05 19:09:51'),
(190, 2, 'Request return borrowed book successfully!', '2023-12-06 07:59:17', '2023-12-06 07:59:17'),
(191, 2, 'Request return borrowed book successfully!', '2023-12-06 10:32:08', '2023-12-06 10:32:08'),
(192, 1, 'Operator has been verify request return!', '2023-12-07 05:35:58', '2023-12-07 05:35:58'),
(193, 1, 'Operator has been verify request return!', '2023-12-07 05:40:37', '2023-12-07 05:40:37'),
(194, 26, 'Publisher \"Gramedia Pustaka Utama\" has been added!', '2023-12-07 05:45:35', '2023-12-07 05:45:35'),
(195, 26, 'Author \"Tere Liye\" has been added!', '2023-12-07 05:45:58', '2023-12-07 05:45:58'),
(196, 26, 'Category \"Romance\" has been added!', '2023-12-07 05:47:12', '2023-12-07 05:47:12'),
(197, 26, 'A new book \"Hujan\" has been added!', '2023-12-07 05:48:16', '2023-12-07 05:48:16'),
(198, 26, 'Publisher \"Prentice-Hall\" has been added!', '2023-12-07 05:53:18', '2023-12-07 05:53:18'),
(199, 26, 'Author \"Brian W. Kernighan, Dennis MacAlistair Ritchie, B. W. Kernighan, Ritchie Kernighan, Kernighan, Ritchie, and Dennis M. Ritchi\" has been added!', '2023-12-07 05:53:27', '2023-12-07 05:53:27'),
(200, 26, 'A new book \"The C programming language\" has been added!', '2023-12-07 05:54:39', '2023-12-07 05:54:39'),
(201, 26, 'Publisher \"Independently Published\" has been added!', '2023-12-07 05:56:26', '2023-12-07 05:56:26'),
(202, 26, 'Author \"Programming Languages Project\" has been added!', '2023-12-07 05:56:48', '2023-12-07 05:56:48'),
(203, 26, 'A new book \"Python Data Science\" has been added!', '2023-12-07 05:58:01', '2023-12-07 05:58:01'),
(204, 26, 'Author \"Motivation Diary\" has been added!', '2023-12-07 05:59:33', '2023-12-07 05:59:33'),
(205, 26, 'A new book \"Live Your DREAMS Whatever They May Be ...\" has been added!', '2023-12-07 06:00:41', '2023-12-07 06:00:41'),
(206, 26, 'Book \"Live Your DREAMS Whatever They May Be ...\" has been upadted!', '2023-12-07 06:00:58', '2023-12-07 06:00:58'),
(207, 26, 'Author \"Raymond Gething\" has been added!', '2023-12-07 06:02:23', '2023-12-07 06:02:23'),
(208, 26, 'A new book \"Motivation Noteook\" has been added!', '2023-12-07 06:03:02', '2023-12-07 06:03:02'),
(209, 26, 'Publisher \"Elsevier Science &amp; Technology Books\" has been added!', '2023-12-07 06:05:17', '2023-12-07 06:05:17'),
(210, 26, 'Author \"Brian H. Ross\" has been added!', '2023-12-07 06:05:24', '2023-12-07 06:05:24'),
(211, 26, 'A new book \"Psychology of Learning and Motivation\" has been added!', '2023-12-07 06:06:49', '2023-12-07 06:06:49'),
(212, 26, 'Book \"Psychology of Learning and Motivation\" has been upadted!', '2023-12-07 06:07:03', '2023-12-07 06:07:03'),
(213, 26, 'Publisher \"Academic Press\" has been added!', '2023-12-07 06:08:02', '2023-12-07 06:08:02'),
(214, 26, 'A new book \"The psychology of learning and motivation\" has been added!', '2023-12-07 06:09:02', '2023-12-07 06:09:02'),
(215, 26, 'Publisher \"Pearson/Allyn &amp; Bacon\" has been added!', '2023-12-07 06:11:01', '2023-12-07 06:11:01'),
(216, 26, 'Author \"Lambert Deckers\" has been added!', '2023-12-07 06:11:19', '2023-12-07 06:11:19'),
(217, 26, 'A new book \"Motivation\" has been added!', '2023-12-07 06:12:57', '2023-12-07 06:12:57'),
(218, 26, 'Publisher \"Center Point Large Print, 2023\" has been added!', '2023-12-07 06:17:21', '2023-12-07 06:17:21'),
(219, 26, 'Author \"Lucy Score\" has been added!', '2023-12-07 06:17:35', '2023-12-07 06:17:35'),
(220, 26, 'A new book \"Things We Never Got Over\" has been added!', '2023-12-07 06:19:12', '2023-12-07 06:19:12'),
(221, 26, 'Book \"Things We Never Got Over\" has been upadted!', '2023-12-07 06:22:38', '2023-12-07 06:22:38'),
(222, 26, 'Book \"Things We Never Got Over\" has been upadted!', '2023-12-07 06:25:25', '2023-12-07 06:25:25'),
(223, 26, 'Publisher \"Penguin Publishing Group, 2021\" has been added!', '2023-12-07 06:27:14', '2023-12-07 06:27:14'),
(224, 26, 'Author \"Emily Henry\" has been added!', '2023-12-07 06:27:21', '2023-12-07 06:27:21'),
(225, 26, 'A new book \"People We Meet on Vacation\" has been added!', '2023-12-07 06:28:50', '2023-12-07 06:28:50'),
(226, 26, 'Publisher \"Penguin Young Readers Group, 2023\" has been added!', '2023-12-07 06:30:00', '2023-12-07 06:30:00'),
(227, 26, 'Author \"Ali Hazelwood\" has been added!', '2023-12-07 06:30:11', '2023-12-07 06:30:11'),
(228, 26, 'A new book \"Check &amp; Mate\" has been added!', '2023-12-07 06:31:14', '2023-12-07 06:31:14'),
(229, 26, 'Publisher \"Penguin, 2022\" has been added!', '2023-12-07 06:34:05', '2023-12-07 06:34:05'),
(230, 26, 'A new book \"Love on the Brain\" has been added!', '2023-12-07 06:35:13', '2023-12-07 06:35:13'),
(231, 26, 'Publisher \"Penguin Publishing Group, 2023\" has been added!', '2023-12-07 06:36:32', '2023-12-07 06:36:32'),
(232, 26, 'Author \"Ashley Herring Blake\" has been added!', '2023-12-07 06:36:42', '2023-12-07 06:36:42'),
(233, 26, 'A new book \"Iris Kelly Doesn\'t Date\" has been added!', '2023-12-07 06:37:58', '2023-12-07 06:37:58'),
(234, 26, 'Book \"Iris Kelly Doesn\'t Date\" has been upadted!', '2023-12-07 06:38:56', '2023-12-07 06:38:56'),
(235, 26, 'Book \"Love on the Brain\" has been upadted!', '2023-12-07 06:39:44', '2023-12-07 06:39:44'),
(236, 26, 'Book \"Check &amp; Mate\" has been change to \"Check &amp;amp; Mate\"!', '2023-12-07 06:40:43', '2023-12-07 06:40:43'),
(237, 26, 'Book \"People We Meet on Vacation\" has been upadted!', '2023-12-07 06:41:46', '2023-12-07 06:41:46'),
(238, 26, 'Book \"Things We Never Got Over\" has been upadted!', '2023-12-07 06:42:24', '2023-12-07 06:42:24'),
(239, 2, 'Borrowed new book \"Iris Kelly Doesn\'t Date\"!', '2023-12-08 08:52:02', '2023-12-08 08:52:02'),
(240, 1, 'Operator has been rejected borrow!', '2023-12-08 08:53:50', '2023-12-08 08:53:50'),
(241, 2, 'Borrowed new book \"Iris Kelly Doesn\'t Date\"!', '2023-12-08 08:54:23', '2023-12-08 08:54:23'),
(242, 1, 'Operator has been accepted borrow!', '2023-12-08 08:54:45', '2023-12-08 08:54:45'),
(243, 2, 'Request return borrowed book successfully!', '2023-12-08 08:55:46', '2023-12-08 08:55:46'),
(244, 1, 'Operator has been verify request return!', '2023-12-08 09:02:03', '2023-12-08 09:02:03'),
(245, 2, 'Borrowed new book \"Iris Kelly Doesn\'t Date\"!', '2023-12-08 09:22:42', '2023-12-08 09:22:42'),
(246, 1, 'Operator has been accepted borrow!', '2023-12-08 09:22:55', '2023-12-08 09:22:55'),
(247, 2, 'Request return borrowed book successfully!', '2023-12-08 09:23:06', '2023-12-08 09:23:06'),
(248, 1, 'Operator has been verify request return!', '2023-12-08 09:32:14', '2023-12-08 09:32:14'),
(249, 2, 'Borrowed new book \"DASAR-DASAR PEMROGRAMAN WEB\"!', '2023-12-08 10:04:31', '2023-12-08 10:04:31'),
(250, 1, 'Operator has been accepted borrow!', '2023-12-08 10:04:47', '2023-12-08 10:04:47'),
(251, 2, 'Request return borrowed book successfully!', '2023-12-08 10:05:26', '2023-12-08 10:05:26'),
(252, 1, 'Operator has been verify request return!', '2023-12-08 10:05:40', '2023-12-08 10:05:40'),
(253, 1, 'Menu \"Test\" has been added!', '2023-12-08 15:33:50', '2023-12-08 15:33:50'),
(254, 1, 'Role \"Administrator\" granted access to menu \"Test\"', '2023-12-08 15:34:31', '2023-12-08 15:34:31'),
(255, 1, 'Submenu \"Testing Submenu\" has been added!', '2023-12-08 15:35:12', '2023-12-08 15:35:12'),
(256, 1, 'Role \"Administrator\" granted no access to menu \"Test\"', '2023-12-08 15:39:27', '2023-12-08 15:39:27'),
(257, 1, 'Role \"Administrator\" granted access to menu \"Test\"', '2023-12-08 15:40:25', '2023-12-08 15:40:25'),
(258, 1, 'Role \"Administrator\" granted no access to menu \"Test\"', '2023-12-08 15:41:31', '2023-12-08 15:41:31'),
(259, 1, 'Submenu \"Testing Submenu\" has been deleted!', '2023-12-08 15:41:51', '2023-12-08 15:41:51'),
(260, 1, 'Menu \"Test\" has been deleted!', '2023-12-08 15:42:08', '2023-12-08 15:42:08'),
(261, 2, 'Borrowed new book \"Love on the Brain\"!', '2023-12-08 15:57:12', '2023-12-08 15:57:12'),
(262, 1, 'Operator has been accepted borrow!', '2023-12-08 15:57:46', '2023-12-08 15:57:46'),
(263, 2, 'Request return borrowed book successfully!', '2023-12-08 15:58:03', '2023-12-08 15:58:03'),
(264, 1, 'Operator has been verify request return!', '2023-12-08 15:58:48', '2023-12-08 15:58:48'),
(265, 2, 'Borrowed new book \"The Chronicles of Narnia (The Chronicles of Narnia)\"!', '2023-12-11 07:17:02', '2023-12-11 07:17:02'),
(266, 26, 'Operator has been accepted borrow!', '2023-12-11 07:17:12', '2023-12-11 07:17:12'),
(267, 2, 'Borrowed new book \"The Psychology of Money\"!', '2023-12-11 07:25:01', '2023-12-11 07:25:01'),
(268, 26, 'Operator has been accepted borrow!', '2023-12-11 07:26:32', '2023-12-11 07:26:32'),
(269, 2, 'Borrowed new book \"The C programming language\"!', '2023-12-11 07:35:36', '2023-12-11 07:35:36'),
(270, 26, 'Operator has been accepted borrow!', '2023-12-11 07:43:34', '2023-12-11 07:43:34'),
(271, 2, 'Request return borrowed book successfully!', '2023-12-11 07:44:24', '2023-12-11 07:44:24'),
(272, 26, 'Operator has been verify request return!', '2023-12-11 07:44:39', '2023-12-11 07:44:39'),
(273, 2, 'Request return borrowed book successfully!', '2023-12-11 08:44:55', '2023-12-11 08:44:55'),
(274, 26, 'Operator has been verify request return!', '2023-12-11 08:45:11', '2023-12-11 08:45:11'),
(275, 2, 'Request return borrowed book successfully!', '2023-12-11 08:45:46', '2023-12-11 08:45:46'),
(276, 26, 'Operator has been verify request return!', '2023-12-11 08:45:56', '2023-12-11 08:45:56'),
(277, 2, 'Borrowed new book \"Hujan\"!', '2023-12-11 08:51:54', '2023-12-11 08:51:54'),
(278, 26, 'Operator has been accepted borrow!', '2023-12-11 08:52:17', '2023-12-11 08:52:17'),
(279, 2, 'Request return borrowed book successfully!', '2023-12-11 08:52:40', '2023-12-11 08:52:40'),
(280, 26, 'Operator has been verify request return!', '2023-12-11 08:53:15', '2023-12-11 08:53:15'),
(281, 2, 'Borrowed new book \"Tiny Titans\"!', '2023-12-11 08:55:04', '2023-12-11 08:55:04'),
(282, 26, 'Operator has been accepted borrow!', '2023-12-11 08:55:33', '2023-12-11 08:55:33'),
(283, 2, 'Request return borrowed book successfully!', '2023-12-11 08:56:53', '2023-12-11 08:56:53'),
(284, 26, 'Operator has been verify request return!', '2023-12-11 08:57:08', '2023-12-11 08:57:08'),
(285, 2, 'Borrowed new book \"Check & Mate\"!', '2023-12-11 08:57:51', '2023-12-11 08:57:51'),
(286, 26, 'Operator has been accepted borrow!', '2023-12-11 08:58:10', '2023-12-11 08:58:10'),
(287, 2, 'Request return borrowed book successfully!', '2023-12-11 09:06:18', '2023-12-11 09:06:18'),
(288, 26, 'Operator has been verify request return!', '2023-12-11 09:07:36', '2023-12-11 09:07:36'),
(289, 2, 'Borrowed new book \"People We Meet on Vacation\"!', '2023-12-11 09:23:47', '2023-12-11 09:23:47'),
(290, 26, 'Operator has been accepted borrow!', '2023-12-11 09:24:24', '2023-12-11 09:24:24'),
(291, 2, 'Request return borrowed book successfully!', '2023-12-11 09:26:17', '2023-12-11 09:26:17'),
(292, 26, 'Operator has been verify request return!', '2023-12-11 09:26:43', '2023-12-11 09:26:43'),
(293, 2, 'Borrowed new book \"Harry Potter and the Deathly Hallows\"!', '2023-12-11 09:27:27', '2023-12-11 09:27:27'),
(294, 26, 'Operator has been accepted borrow!', '2023-12-11 09:27:42', '2023-12-11 09:27:42'),
(295, 2, 'Request return borrowed book successfully!', '2023-12-11 09:29:56', '2023-12-11 09:29:56'),
(296, 26, 'Operator has been verify request return!', '2023-12-11 09:30:18', '2023-12-11 09:30:18'),
(297, 2, 'Borrowed new book \"Python Data Science\"!', '2023-12-11 09:31:25', '2023-12-11 09:31:25'),
(298, 26, 'Operator has been accepted borrow!', '2023-12-11 09:31:40', '2023-12-11 09:31:40'),
(299, 2, 'Request return borrowed book successfully!', '2023-12-11 09:32:29', '2023-12-11 09:32:29'),
(300, 26, 'Operator has been verify request return!', '2023-12-11 09:32:48', '2023-12-11 09:32:48'),
(301, 1, 'Role \"Administrator\" granted access to menu \"Member\"', '2023-12-11 09:36:11', '2023-12-11 09:36:11'),
(302, 1, 'Role \"Administrator\" granted no access to menu \"Member\"', '2023-12-11 09:36:35', '2023-12-11 09:36:35'),
(303, 2, 'Borrowed new book \"Iris Kelly Doesn\'t Date\"!', '2023-12-11 09:54:34', '2023-12-11 09:54:34'),
(304, 1, 'Operator has been accepted borrow!', '2023-12-11 09:56:02', '2023-12-11 09:56:02'),
(305, 2, 'Request return borrowed book successfully!', '2023-12-11 09:57:42', '2023-12-11 09:57:42'),
(306, 1, 'Operator has been verify request return!', '2023-12-11 09:58:05', '2023-12-11 09:58:05'),
(307, 25, 'Borrowed new book \"Check & Mate\"!', '2023-12-11 10:02:14', '2023-12-11 10:02:14'),
(308, 26, 'Operator has been accepted borrow!', '2023-12-11 10:02:57', '2023-12-11 10:02:57'),
(309, 25, 'Request return borrowed book successfully!', '2023-12-11 10:05:53', '2023-12-11 10:05:53'),
(310, 26, 'Operator has been verify request return!', '2023-12-11 10:06:15', '2023-12-11 10:06:15'),
(311, 25, 'Borrowed new book \"3, 2, 1, liftoff!\"!', '2023-12-11 10:08:10', '2023-12-11 10:08:10'),
(312, 26, 'Operator has been accepted borrow!', '2023-12-11 10:08:19', '2023-12-11 10:08:19'),
(313, 25, 'Borrowed new book \"The Psychology of Money\"!', '2023-12-11 10:15:45', '2023-12-11 10:15:45'),
(314, 26, 'Operator has been accepted borrow!', '2023-12-11 10:16:10', '2023-12-11 10:16:10'),
(316, 25, 'Request return borrowed book \"3, 2, 1, liftoff!\" successfully!', '2023-12-11 10:18:35', '2023-12-11 10:18:35'),
(317, 25, 'Request return borrowed book \"The Psychology of Money\" successfully!', '2023-12-11 10:20:18', '2023-12-11 10:20:18'),
(318, 26, 'Operator has been verify request return!', '2023-12-11 10:21:08', '2023-12-11 10:21:08'),
(319, 26, 'Operator has been verify request return!', '2023-12-11 10:21:15', '2023-12-11 10:21:15'),
(320, 25, 'Borrowed new book \"Iris Kelly Doesn\'t Date\"!', '2023-12-11 10:31:11', '2023-12-11 10:31:11'),
(321, 26, 'Operator has been rejected borrow!', '2023-12-11 10:31:52', '2023-12-11 10:31:52'),
(322, 1, 'Role \"User\" has been change to \"Member\"', '2023-12-11 14:41:58', '2023-12-11 14:41:58'),
(323, 1, 'Role \"Member\" has been change to \"User\"', '2023-12-11 14:43:18', '2023-12-11 14:43:18'),
(324, 1, 'Password changed!', '2025-04-14 11:44:41', '2025-04-14 11:44:41'),
(325, 1, 'Profile edited!', '2025-04-14 11:47:04', '2025-04-14 11:47:04'),
(326, 1, 'Profile edited!', '2025-04-14 11:47:38', '2025-04-14 11:47:38'),
(327, 1, 'Admin \"admin\" has been change user data \"user\"!', '2025-04-14 11:53:09', '2025-04-14 11:53:09'),
(328, 1, 'Admin \"admin\" has been deleted user data \"john_doe\"!', '2025-04-14 11:53:36', '2025-04-14 11:53:36'),
(329, 1, 'Profile edited!', '2025-04-14 11:53:56', '2025-04-14 11:53:56'),
(330, 1, 'Admin \"admin\" has been change user data \"jane_doe\"!', '2025-04-14 11:55:20', '2025-04-14 11:55:20'),
(331, 1, 'Profile edited!', '2025-04-14 11:56:03', '2025-04-14 11:56:03'),
(332, 1, 'Admin \"admin\" has been change user data \"michael_smith\"!', '2025-04-14 11:57:40', '2025-04-14 11:57:40'),
(333, 1, 'Admin \"admin\" has been change user data \"mia_bailey\"!', '2025-04-14 12:03:41', '2025-04-14 12:03:41'),
(334, 1, 'Admin \"admin\" has been deleted user data \"james_miller\"!', '2025-04-14 12:20:10', '2025-04-14 12:20:10'),
(335, 1, 'Admin \"admin\" has been deleted user data \"iron\"!', '2025-04-14 12:20:20', '2025-04-14 12:20:20'),
(336, 1, 'Admin \"admin\" has been deleted user data \"nick\"!', '2025-04-14 12:20:28', '2025-04-14 12:20:28'),
(337, 1, 'Admin \"admin\" has been deleted user data \"alice_johnson\"!', '2025-04-14 12:20:41', '2025-04-14 12:20:41'),
(338, 1, 'Admin \"admin\" has been deleted user data \"robert_williams\"!', '2025-04-14 12:21:43', '2025-04-14 12:21:43'),
(339, 1, 'Admin \"admin\" has been deleted user data \"emily_davis\"!', '2025-04-14 12:21:53', '2025-04-14 12:21:53'),
(340, 1, 'Admin \"admin\" has been deleted user data \"sophia_wilson\"!', '2025-04-14 12:22:01', '2025-04-14 12:22:01'),
(341, 1, 'Admin \"admin\" has been change user data \"admin\"!', '2025-04-14 12:24:03', '2025-04-14 12:24:03'),
(342, 1, 'Author \"Elmeryn Joy L. Cobre, Elsa S. Frago, Nelvin T. Olalia, Kyle S. Tingzon\" has been added!', '2025-04-14 12:30:43', '2025-04-14 12:30:43'),
(343, 1, 'Publisher \"Phoenix Publishing House\" has been added!', '2025-04-14 12:31:27', '2025-04-14 12:31:27'),
(344, 1, 'Publisher \"Phoenix Publishing House\" has been deleted!', '2025-04-14 12:34:32', '2025-04-14 12:34:32'),
(345, 1, 'Publisher \"Adarna House Inc.\" has been added!', '2025-04-14 12:34:41', '2025-04-14 12:34:41'),
(346, 1, 'Author \"Elmeryn Joy L. Cobre, Elsa S. Frago, Nelvin T. Olalia, Kyle S. Tingzon\" has been deleted!', '2025-04-14 12:35:03', '2025-04-14 12:35:03'),
(347, 1, 'Author \"Adarna House\" has been added!', '2025-04-14 12:35:10', '2025-04-14 12:35:10'),
(348, 1, 'A new book \"Ang Mahiyaing Manok​\" has been added!', '2025-04-14 12:37:46', '2025-04-14 12:37:46'),
(349, 1, 'Book \"Ang Mahiyaing Manok​\" has been upadted!', '2025-04-14 12:38:57', '2025-04-14 12:38:57'),
(350, 1, 'Author \"Venice GD\" has been added!', '2025-04-14 12:43:17', '2025-04-14 12:43:17'),
(351, 1, 'Publisher \"Venice GD\" has been added!', '2025-04-14 12:43:28', '2025-04-14 12:43:28'),
(352, 1, 'A new book \"Geothermal Energy\" has been added!', '2025-04-14 12:46:04', '2025-04-14 12:46:04'),
(353, 1, 'Author \"Lilit Abel​\" has been added!', '2025-04-14 12:49:47', '2025-04-14 12:49:47'),
(354, 1, 'Publisher \"Philippine Digital Library\" has been added!', '2025-04-14 12:50:02', '2025-04-14 12:50:02'),
(355, 1, 'A new book \"ON THE HISTORY OF THE FORMATION AND ACTIVITY OF THE WAQF ADMINISTRATION OF THE KUKELDASH MADRASAH (XVI-early XX centuries)\" has been added!', '2025-04-14 12:51:25', '2025-04-14 12:51:25'),
(356, 1, 'Book \"ON THE HISTORY OF THE FORMATION AND ACTIVITY OF THE WAQF ADMINISTRATION OF THE KUKELDASH MADRASAH (XVI-early XX centuries)\" has been upadted!', '2025-04-14 12:53:32', '2025-04-14 12:53:32'),
(357, 1, 'Publisher \"Real-World Math\" has been added!', '2025-04-14 12:55:28', '2025-04-14 12:55:28'),
(358, 1, 'Publisher \"Real-World Math\" has been change to \"Vibal Group\"!', '2025-04-14 12:55:49', '2025-04-14 12:55:49'),
(359, 1, 'Author \"Vibal Group\" has been added!', '2025-04-14 12:56:00', '2025-04-14 12:56:00'),
(360, 1, 'A new book \"Real-World Math\" has been added!', '2025-04-14 12:58:09', '2025-04-14 12:58:09'),
(361, 2, 'Borrowed new book \"Real-World Math\"!', '2025-04-14 13:00:35', '2025-04-14 13:00:35'),
(362, 1, 'Operator has been accepted borrow!', '2025-04-14 13:00:56', '2025-04-14 13:00:56'),
(363, 2, 'Request return borrowed book \"Real-World Math\" successfully!', '2025-04-14 13:01:34', '2025-04-14 13:01:34'),
(364, 1, 'Operator has been verify request return!', '2025-04-14 13:02:19', '2025-04-14 13:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-11-28 13:38:54', '2023-11-28 13:38:54'),
(2, 'User', '2023-11-28 13:38:54', '2023-11-28 13:38:54'),
(3, 'Menu', '2023-11-28 13:41:25', '2023-11-28 13:41:25'),
(4, 'Submenu', '2023-11-28 13:41:25', '2023-11-28 13:41:25'),
(5, 'Log', '2023-11-28 13:49:24', '2023-11-28 13:49:24'),
(6, 'Book', '2023-11-29 05:37:41', '2023-11-29 05:49:14'),
(7, 'Member', '2023-11-30 12:09:28', '2023-11-30 12:09:28'),
(8, 'Status', '2023-12-03 15:00:20', '2023-12-03 15:00:20'),
(9, 'Request', '2023-12-04 05:38:18', '2023-12-04 05:38:18'),
(10, 'Operator', '2023-12-04 05:53:03', '2023-12-04 05:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-11-28 13:38:01', '2023-11-28 13:38:01'),
(2, 'User', '2023-11-28 13:38:01', '2023-12-11 14:43:18'),
(3, 'Operator', '2023-12-04 05:46:03', '2023-12-04 05:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `title`, `url`, `icon`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'admin', 'bi bi-grid-fill', 1, '2023-11-28 13:39:24', '2023-11-28 13:39:24'),
(2, 'Role Access', 'admin/role', 'fas fa-fw fa-user-tie', 1, '2023-11-28 13:42:18', '2023-11-28 13:42:18'),
(3, 'User Data', 'admin/user_data', 'fas fa-fw fa-users', 1, '2023-11-28 13:43:11', '2023-11-28 13:43:11'),
(4, 'My Profile', 'user', 'bi bi-person-vcard', 2, '2023-11-28 13:44:47', '2023-11-28 13:44:47'),
(5, 'Change Password', 'user/change_password', 'bi bi-key', 2, '2023-11-28 13:45:36', '2023-11-28 13:45:36'),
(6, 'Menu Management', 'menu', 'bi bi-folder2', 3, '2023-11-28 13:48:10', '2023-11-28 13:48:10'),
(7, 'Submenu Management', 'submenu', 'bi bi-folder2-open', 4, '2023-11-28 13:48:59', '2023-11-28 13:48:59'),
(8, 'Action', 'log', 'bi bi-book', 5, '2023-11-28 13:49:54', '2023-11-28 13:49:54'),
(9, 'Book Publisher', 'book', 'bi bi-person-vcard', 6, '2023-11-29 05:39:41', '2023-11-29 05:48:04'),
(10, 'Book Author', 'book/book_author', 'fas fa-fw fa-user', 6, '2023-11-29 05:40:16', '2023-11-29 06:19:26'),
(13, 'Dashboard', 'member', 'bi bi-grid-fill', 7, '2023-11-30 12:11:38', '2023-11-30 12:11:38'),
(14, 'List Book', 'member/list_book', 'bi bi-book', 7, '2023-11-30 12:12:04', '2023-11-30 12:12:04'),
(15, 'Book Category', 'book/book_category', 'fas fa-fw fa-tag', 6, '2023-12-03 07:41:30', '2023-12-03 07:41:30'),
(16, 'Book Data', 'book/book_data', 'bi bi-book', 6, '2023-12-03 08:08:47', '2023-12-03 08:08:47'),
(17, 'List Status', 'status', 'bi bi-book', 8, '2023-12-03 15:00:37', '2023-12-03 15:05:02'),
(18, 'List Borrow', 'member/list_borrow', 'fas fa-fw fa-download', 7, '2023-12-04 05:17:57', '2023-12-04 05:17:57'),
(19, 'List Return', 'member/list_return', 'fas fa-fw fa-upload', 7, '2023-12-04 05:18:26', '2023-12-04 05:18:26'),
(20, 'Request Borrow', 'request', 'fas fa-fw fa-download', 9, '2023-12-04 05:38:58', '2023-12-04 05:38:58'),
(21, 'Request Return', 'request/return', 'fas fa-fw fa-upload', 9, '2023-12-04 05:39:34', '2023-12-04 05:39:34'),
(22, 'Dashboard', 'operator', 'bi bi-grid-fill', 10, '2023-12-04 05:53:33', '2023-12-04 05:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_data`
--
ALTER TABLE `book_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_publisher`
--
ALTER TABLE `book_publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_borrow`
--
ALTER TABLE `transaction_borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_return`
--
ALTER TABLE `transaction_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log_action`
--
ALTER TABLE `user_log_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_data`
--
ALTER TABLE `book_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `book_publisher`
--
ALTER TABLE `book_publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction_borrow`
--
ALTER TABLE `transaction_borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaction_return`
--
ALTER TABLE `transaction_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_log_action`
--
ALTER TABLE `user_log_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
