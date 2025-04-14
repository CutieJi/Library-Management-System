-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2023 at 01:54 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3-boilerplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_log_action`
--

CREATE TABLE `user_log_action` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_log_action`
--

INSERT INTO `user_log_action` (`id`, `user_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role \"User\" granted access to menu \"User\"', '2023-11-28 13:46:28', '2023-11-28 13:46:28'),
(2, 1, 'Role \"Administrator\" granted access to menu \"Menu\"', '2023-11-28 13:47:10', '2023-11-28 13:47:10'),
(3, 1, 'Role \"Administrator\" granted access to menu \"Submenu\"', '2023-11-28 13:47:20', '2023-11-28 13:47:20'),
(4, 1, 'Menu \"Log\" has been added!', '2023-11-28 13:49:24', '2023-11-28 13:49:24'),
(5, 1, 'Role \"Administrator\" granted access to menu \"Log\"', '2023-11-28 13:49:32', '2023-11-28 13:49:32'),
(6, 1, 'Submenu \"Action\" has been added!', '2023-11-28 13:49:54', '2023-11-28 13:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_log_action`
--
ALTER TABLE `user_log_action`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_log_action`
--
ALTER TABLE `user_log_action`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
