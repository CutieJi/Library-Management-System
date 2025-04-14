-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2023 at 01:52 PM
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
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-28 13:39:37', '2023-11-28 13:39:37'),
(2, 1, 2, '2023-11-28 13:39:41', '2023-11-28 13:39:41'),
(3, 2, 2, '2023-11-28 13:46:28', '2023-11-28 13:46:28'),
(4, 1, 3, '2023-11-28 13:47:10', '2023-11-28 13:47:10'),
(5, 1, 4, '2023-11-28 13:47:20', '2023-11-28 13:47:20'),
(6, 1, 5, '2023-11-28 13:49:32', '2023-11-28 13:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` char(6) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `first_name`, `last_name`, `username`, `avatar_image`, `email`, `password`, `gender`, `address`, `phone_number`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Administrator', 'administrator', 'default_male.jpg', 'default@admin.com', '$2y$10$qHSMHjktzUu7Lwwv.CUaXOkBqWAsEkqhlqkgB3bjVTnb2cSQx32j2', 'Male', '1293 Fidler Drive, San Antonio, Texas, 78223', '12106496974', 1, '2023-11-28 13:35:18', '2023-11-28 13:35:18'),
(2, 'Default', 'User', 'user', 'default_female.jpg', 'default@user.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '861 Feathers Hooves Drive, Hicksville, New York, 11612', '16317191182', 2, '2023-11-28 13:36:29', '2023-11-28 13:36:29');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int NOT NULL,
  `menu` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-11-28 13:38:54', '2023-11-28 13:38:54'),
(2, 'User', '2023-11-28 13:38:54', '2023-11-28 13:38:54'),
(3, 'Menu', '2023-11-28 13:41:25', '2023-11-28 13:41:25'),
(4, 'Submenu', '2023-11-28 13:41:25', '2023-11-28 13:41:25'),
(5, 'Log', '2023-11-28 13:49:24', '2023-11-28 13:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2023-11-28 13:38:01', '2023-11-28 13:38:01'),
(2, 'User', '2023-11-28 13:38:01', '2023-11-28 13:38:01');

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
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_log_action`
--
ALTER TABLE `user_log_action`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
