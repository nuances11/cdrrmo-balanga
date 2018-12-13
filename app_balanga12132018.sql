-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 03:15 PM
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
  `message_contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_message`
--

INSERT INTO `contact_message` (`id`, `first_name`, `last_name`, `address`, `phone_number`, `created_at`, `updated_at`, `message_contact`) VALUES
(1, 'John', 'Doe', 'Sample Address', '09171576436', '2018-12-11 15:06:58', '0000-00-00 00:00:00', 'Sample Message');

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
(1, 'admin@balangacdrrmo.com', 'Admin', 'Admin', 1, '2018-11-01 12:45:15', '0000-00-00 00:00:00', '$2y$10$MSHxM1dZPumCX2WbjsT5GuOlARI/dFX/sgDX3vJE2hzzDJ0XxhlKS'),
(2, 'sample@sample.com', 'Staff', ' Sample', 2, '2018-12-04 15:13:30', '2018-12-04 15:13:53', '$2y$10$0MFJAmu58E6ELFasn0Lop.JdKjHd3mQKqMEYFIr4.u62E7igjJQZi');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
