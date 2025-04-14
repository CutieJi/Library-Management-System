-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 04:16 AM
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
(1, 'Default', 'Administrator', 'administrator', 'default_male.jpg', 'default@admin.com', '$2y$10$qHSMHjktzUu7Lwwv.CUaXOkBqWAsEkqhlqkgB3bjVTnb2cSQx32j2', 'Male', '1293 Fidler Drive, San Antonio, Texas, 78223', '12106496974', 1, '2023-01-28 13:35:18', '2023-11-28 14:18:28'),
(2, 'Default', 'User', 'user', 'default_female.jpg', 'default@user.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '861 Feathers Hooves Drive, Hicksville, New York, 11612', '16317191182', 2, '2023-02-28 13:36:29', '2023-11-28 14:18:32'),
(3, 'John', 'Doe', 'john_doe', 'default_male.jpg', 'john.doe@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '123 Main St', '08123123123', 2, '2023-03-28 14:17:43', '2023-11-28 14:18:54'),
(4, 'Jane', 'Doe', 'jane_doe', 'default_female.jpg', 'jane.doe@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '456 Oak St', '08123123124', 2, '2023-04-28 14:17:43', '2023-11-28 14:19:05'),
(5, 'Michael', 'Smith', 'michael_smith', 'default_male.jpg', 'michael.smith@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '789 Pine St', '08123123125', 2, '2023-05-28 14:17:43', '2023-11-28 14:19:09'),
(6, 'Alice', 'Johnson', 'alice_johnson', 'default_female.jpg', 'alice.johnson@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '101 Cedar St', '08123123126', 2, '2023-06-28 14:17:43', '2023-11-28 14:19:12'),
(7, 'Robert', 'Williams', 'robert_williams', 'default_male.jpg', 'robert.williams@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '202 Elm St', '08123123127', 2, '2023-07-28 14:17:43', '2023-11-28 14:19:16'),
(8, 'Emily', 'Davis', 'emily_davis', 'default_female.jpg', 'emily.davis@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '303 Maple St', '08123123128', 2, '2023-08-28 14:17:43', '2023-11-28 14:19:19'),
(9, 'William', 'Brown', 'william_brown', 'default_male.jpg', 'william.brown@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '404 Birch St', '08123123129', 2, '2023-09-28 14:17:43', '2023-11-28 14:19:23'),
(10, 'Olivia', 'Jones', 'olivia_jones', 'default_female.jpg', 'olivia.jones@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '505 Pine St', '08123123130', 2, '2023-10-28 14:17:43', '2023-11-28 14:19:27'),
(11, 'James', 'Miller', 'james_miller', 'default_male.jpg', 'james.miller@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '606 Oak St', '08123123131', 2, '2023-11-28 14:17:43', '2023-11-28 14:17:43'),
(12, 'Sophia', 'Wilson', 'sophia_wilson', '6565f7cb568f5_1701181387.jpg', 'sophia.wilson@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '707 Cedar St', '08123123132', 2, '2023-12-28 14:17:43', '2023-11-28 14:23:07'),
(13, 'Ethan', 'Moore', 'ethan_moore', 'default_male.jpg', 'ethan.moore@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '808 Elm St', '08123123133', 2, '2023-02-28 14:17:43', '2023-11-28 14:20:12'),
(14, 'Ava', 'Taylor', 'ava_taylor', 'default_female.jpg', 'ava.taylor@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '909 Maple St', '08123123134', 2, '2023-03-28 14:17:43', '2023-11-28 14:20:16'),
(15, 'Mason', 'White', 'mason_white', 'default_male.jpg', 'mason.white@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '1010 Birch St', '08123123135', 2, '2023-03-28 14:17:43', '2023-11-28 14:20:25'),
(16, 'Isabella', 'Clark', 'isabella_clark', 'default_female.jpg', 'isabella.clark@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '1111 Pine St', '08123123136', 2, '2023-04-28 14:17:43', '2023-11-28 14:20:33'),
(17, 'Noah', 'Hall', 'noah_hall', 'default_male.jpg', 'noah.hall@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '1212 Oak St', '08123123137', 2, '2023-06-28 14:17:43', '2023-11-28 14:20:37'),
(18, 'Emma', 'Lewis', 'emma_lewis', 'default_female.jpg', 'emma.lewis@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '1313 Cedar St', '08123123138', 2, '2023-07-28 14:17:43', '2023-11-28 14:20:45'),
(19, 'Liam', 'Harris', 'liam_harris', 'default_male.jpg', 'liam.harris@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '1414 Elm St', '08123123139', 2, '2023-07-28 14:17:43', '2023-11-28 14:20:48'),
(20, 'Olivia', 'Scott', 'olivia_scott', 'default_female.jpg', 'olivia.scott@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '1515 Maple St', '08123123140', 2, '2023-08-28 14:17:43', '2023-11-28 14:20:52'),
(21, 'Elijah', 'Carter', 'elijah_carter', 'default_male.jpg', 'elijah.carter@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '1616 Birch St', '08123123141', 2, '2023-08-28 14:17:43', '2023-11-28 14:20:56'),
(22, 'Ava', 'Turner', 'ava_turner', 'default_female.jpg', 'ava.turner@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '1717 Pine St', '08123123142', 2, '2023-10-28 14:17:43', '2023-11-28 14:21:04'),
(23, 'Logan', 'Cooper', 'logan_cooper', 'default_male.jpg', 'logan.cooper@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Male', '1818 Oak St', '08123123143', 2, '2023-11-28 14:17:43', '2023-11-28 14:17:43'),
(24, 'Charlotte', 'Ward', 'charlotte_ward', 'default_female.jpg', 'charlotte.ward@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '1919 Cedar St', '08123123144', 2, '2023-11-28 14:17:43', '2023-11-28 14:17:43'),
(25, 'Mia', 'Bailey', 'mia_bailey', '6565f7b320fc1_1701181363.jpg', 'mia.bailey@example.com', '$2y$10$KBHwyrQlVD8YYjOJwh/Ze.f8mq/ygHyVZ34FkmO8hVhV7iL4yJAXm', 'Female', '2020 Elm St', '08123123145', 2, '2023-12-28 14:17:43', '2023-11-28 14:22:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
