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
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(8, 'Action', 'log', 'bi bi-book', 5, '2023-11-28 13:49:54', '2023-11-28 13:49:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
