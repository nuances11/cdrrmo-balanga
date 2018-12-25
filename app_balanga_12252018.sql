-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2018 at 03:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_balanga`
--

-- --------------------------------------------------------

--
-- Table structure for table `affected_population`
--

CREATE TABLE `affected_population` (
  `id` int(11) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `persons_affected` int(11) NOT NULL,
  `families` int(11) NOT NULL,
  `high_risk` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `affected_population`
--

INSERT INTO `affected_population` (`id`, `barangay`, `persons_affected`, `families`, `high_risk`, `created_at`, `updated_at`) VALUES
(1, 'dasdasdasd', 100, 200, NULL, '2018-12-01 06:13:52', '0000-00-00 00:00:00'),
(2, 'asdadfffff', 200, 245, NULL, '2018-12-01 06:14:00', '0000-00-00 00:00:00'),
(3, 'dfdffff', 3123, 1231, '1', '2018-12-01 06:14:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `show_post` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `is_archive` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `user_id`, `title`, `content`, `show_post`, `image`, `is_archive`, `updated_at`, `created_at`) VALUES
(1, 1, 'dasdasdasdas1111dfffaaaa', '<p><b>asdasdasdasdasdas<u>dasdasdas</u></b></p><p><b><u><br></u></b></p><p><b><u><span style=\"background-color: rgb(57, 123, 33);\">dasdasdasdas</span><br></u></b><br></p>', 1, 'uploads/posts/e0f414918066a56750b71a917decfbcd.png', 0, '2018-12-04 14:55:56', '2018-11-05 14:22:41'),
(2, 1, 'dasdasdas', '<p>dasdasdas<br></p>', 1, 'uploads/posts/d5cdc1bcb5bfcd4b0a7d42a0de8b13b9.png', 0, '2018-12-04 14:56:00', '2018-11-20 16:50:36'),
(3, 2, 'Staff Post', '<p>This is Lorem Ipsum<br></p>', 1, 'uploads/posts/a7aa738c8964ba128732cfecb6e0b7a8.png', 0, '0000-00-00 00:00:00', '2018-12-04 15:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `message_contact` text NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `first_name`, `last_name`, `address`, `phone_number`, `created_at`, `updated_at`, `message_contact`, `images`) VALUES
(4, 'dfsdf', 'dsfsdf', 'sdfsdfs', '09982918226', '2018-12-13 16:13:37', '0000-00-00 00:00:00', 'sdfsdfsdf', 'a:2:{i:0;a:14:{s:9:\"file_name\";s:36:\"5be331d8c604d090a194b7a0464a3f7d.png\";s:9:\"file_type\";s:9:\"image/png\";s:9:\"file_path\";s:49:\"C:/xampp/htdocs/balanga/uploads/contact_messages/\";s:9:\"full_path\";s:85:\"C:/xampp/htdocs/balanga/uploads/contact_messages/5be331d8c604d090a194b7a0464a3f7d.png\";s:8:\"raw_name\";s:32:\"5be331d8c604d090a194b7a0464a3f7d\";s:9:\"orig_name\";s:36:\"5be331d8c604d090a194b7a0464a3f7d.png\";s:11:\"client_name\";s:19:\"leveling - Copy.png\";s:8:\"file_ext\";s:4:\".png\";s:9:\"file_size\";d:882.17;s:8:\"is_image\";b:1;s:11:\"image_width\";i:869;s:12:\"image_height\";i:487;s:10:\"image_type\";s:3:\"png\";s:14:\"image_size_str\";s:24:\"width=\"869\" height=\"487\"\";}i:1;a:14:{s:9:\"file_name\";s:36:\"afd06657618cc9c6801d86f856ca837a.png\";s:9:\"file_type\";s:9:\"image/png\";s:9:\"file_path\";s:49:\"C:/xampp/htdocs/balanga/uploads/contact_messages/\";s:9:\"full_path\";s:85:\"C:/xampp/htdocs/balanga/uploads/contact_messages/afd06657618cc9c6801d86f856ca837a.png\";s:8:\"raw_name\";s:32:\"afd06657618cc9c6801d86f856ca837a\";s:9:\"orig_name\";s:36:\"afd06657618cc9c6801d86f856ca837a.png\";s:11:\"client_name\";s:12:\"leveling.png\";s:8:\"file_ext\";s:4:\".png\";s:9:\"file_size\";d:882.17;s:8:\"is_image\";b:1;s:11:\"image_width\";i:869;s:12:\"image_height\";i:487;s:10:\"image_type\";s:3:\"png\";s:14:\"image_size_str\";s:24:\"width=\"869\" height=\"487\"\";}}'),
(5, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:09:24', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(6, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:09:25', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(7, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:09:25', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(8, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:09:26', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(9, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:09:26', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(10, 'fsdfsdf', 'sdfsdf', 'sdfsdfsdf', '09982726335', '2018-12-17 13:10:04', '0000-00-00 00:00:00', 'saffasfasf', 'N;'),
(11, 'fsdfsdf', 'sdfsdfsdf', 'fsdfsdfsd', '09982726225', '2018-12-17 13:19:39', '0000-00-00 00:00:00', 'dasdasdasd', 'N;'),
(12, 'fsdfsdf', 'sdfsdfsdf', 'fsdfsdfsd', '09982726225', '2018-12-17 13:24:41', '0000-00-00 00:00:00', 'dasdasdasd', 'N;'),
(13, 'dfsfsdfsdf', 'sdfsdfsdfsd', 'fsdfsdfsd', '09181727364', '2018-12-17 13:25:17', '0000-00-00 00:00:00', 'sdfdsfsdfsdf', 'N;'),
(14, 'dfsfsdfsdf', 'sdfsdfsdfsd', 'fsdfsdfsd', '09181727364', '2018-12-17 13:25:21', '0000-00-00 00:00:00', 'sdfdsfsdfsdf', 'N;'),
(15, 'dfsfsdfsdf', 'sdfsdfsdfsd', 'fsdfsdfsd', '09181727364', '2018-12-17 13:28:51', '0000-00-00 00:00:00', 'sdfdsfsdfsdf', 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `evacuation_centers`
--

CREATE TABLE `evacuation_centers` (
  `id` int(11) NOT NULL,
  `evacuation_center` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuation_centers`
--

INSERT INTO `evacuation_centers` (`id`, `evacuation_center`, `created_at`, `updated_at`) VALUES
(2, '11111sasas', '2018-11-20 16:25:59', '2018-11-20 16:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `flood`
--

CREATE TABLE `flood` (
  `id` int(11) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `risk` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flood`
--

INSERT INTO `flood` (`id`, `barangay`, `risk`, `created_at`, `updated_at`) VALUES
(2, 'dasdasdasd', 'Medium', '2018-11-12 12:53:51', '0000-00-00 00:00:00'),
(3, 'sdasdasdasd', 'High', '2018-11-12 12:55:13', '0000-00-00 00:00:00'),
(4, 'dasdadasd', 'Low', '2018-11-12 12:56:27', '0000-00-00 00:00:00'),
(5, 'dasdasdasd', 'Medium', '2018-11-20 16:50:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `user_type`, `created_at`, `updated_at`, `password`) VALUES
(1, 'admin@balangacdrrmo.com', 'Admin', 'Admin', 1, '2018-11-01 12:45:15', '2018-12-25 11:59:12', '$2y$10$rB9zyRUwrpAuDaSERjbng.IXsy99F7sjdExhiaJPNsnMK25IvwylW'),
(2, 'sample@sample.com', 'Staff', ' Sample', 2, '2018-12-04 15:13:30', '2018-12-25 13:30:17', '$2y$10$L/NtW1he9fa1ahzIGUEgzuApdBQ8lMan5J5n9dLdV3eDVYlk97aNS');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_and_driver`
--

CREATE TABLE `vehicle_and_driver` (
  `id` int(11) NOT NULL,
  `vehicle` varchar(200) NOT NULL,
  `driver` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_and_driver`
--

INSERT INTO `vehicle_and_driver` (`id`, `vehicle`, `driver`, `created_at`, `updated_at`) VALUES
(1, 'Sasakyan', 'Driver1', '2018-12-01 06:58:06', '2018-12-01 06:58:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affected_population`
--
ALTER TABLE `affected_population`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evacuation_centers`
--
ALTER TABLE `evacuation_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flood`
--
ALTER TABLE `flood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_and_driver`
--
ALTER TABLE `vehicle_and_driver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affected_population`
--
ALTER TABLE `affected_population`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `evacuation_centers`
--
ALTER TABLE `evacuation_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flood`
--
ALTER TABLE `flood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_and_driver`
--
ALTER TABLE `vehicle_and_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
