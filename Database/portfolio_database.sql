-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 10:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `duration_from` int(11) DEFAULT NULL,
  `duration_to` int(11) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `marks` decimal(4,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `duration_from`, `duration_to`, `qualification`, `university`, `marks`, `status`, `created_at`) VALUES
(8, 2014, 2018, 'BE', 'IMED', '4.00', 0, '2024-03-12 05:35:03'),
(9, 2012, 2012, 'MCA', 'CBAA', '4.00', 1, '2024-03-12 06:16:52'),
(10, 2013, 2016, 'MTECH', 'ABC', '4.00', 0, '2024-03-12 06:17:19'),
(12, 2014, 2012, 'MCA', 'CBAA', '4.00', 0, '2024-03-12 06:29:12'),
(13, 2012, 2014, 'hhh', 'shfkhs', '4.00', 0, '2024-03-14 06:32:46'),
(14, 2012, 2014, 'MCA', 'CBAA', '4.00', 0, '2024-03-14 06:33:05'),
(15, 2012, 2014, 'MTECH', 'ABCD', '4.00', 1, '2024-03-14 09:00:48'),
(20, 2012, 2014, 'yo', '', '0.00', 0, '2024-03-14 09:54:37'),
(22, 2012, 2014, '', '', '0.00', 1, '2024-03-14 10:29:46'),
(23, 2014, 2018, 'BE', 'IMED,BVP', '4.00', 0, '2024-03-15 05:46:22'),
(24, 2012, 2014, '', '', '0.00', 1, '2024-03-15 05:53:08'),
(26, 2012, 2014, 'yo', 'IMED', '0.00', 0, '2024-03-21 05:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration_from` int(11) DEFAULT NULL,
  `duration_to` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `organization`, `description`, `duration_from`, `duration_to`, `status`, `date_added`) VALUES
(1, 'Dev', 'org', '<p><span style=\"color: rgb(0, 0, 0);\">asdadad</span></p>', 2012, 2014, 1, '2024-03-15 11:00:36'),
(2, 'Sales Dev', 'org', '<p><span style=\"color: rgb(0, 0, 0);\">sdadad</span></p>', 2012, 2014, 1, '2024-03-15 11:01:41'),
(6, 'Dev', 'org', '<p><span style=\"color: rgb(0, 0, 0);\">wqwqweqw</span></p>', 2012, 2014, 1, '2024-03-18 11:45:51'),
(7, 'SEO', '', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span></span></p>', 2012, 2024, 0, '2024-03-18 12:07:46'),
(8, 'SEO', '', '<p><span style=\"color: rgb(0, 0, 0);\">test﻿</span></p>', 2012, 2024, 0, '2024-03-18 12:20:10'),
(9, 'SEO', 'org m', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span>test﻿</span></p>', 2012, 2024, 0, '2024-03-18 12:22:32'),
(10, 'SEO', 'dhfkhjds', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span>﻿</span></p>', 2012, 2024, 0, '2024-03-18 12:22:45'),
(12, 'SEO', '', '<p><span style=\"color: rgb(0, 0, 0);\">active test﻿</span></p>', 2012, 2024, 0, '2024-03-18 12:23:17'),
(13, 'SEO', '', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span>active test﻿</span></p>', 2012, 2024, 1, '2024-03-18 12:23:27'),
(14, 'SEO', 'org drupal', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span>﻿</span></p>', 2012, 2024, 0, '2024-03-21 05:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `project_name`, `image_url`, `category`, `heading`, `description`, `project_link`, `date_added`, `date_updated`) VALUES
(19, 'Test19', 'uploads/portfolio/icons-06.png', 'Test Category19', '', '<p><span style=\"color: rgb(0, 0, 0);\">cvbcvbcvbc</span></p>', 'https://github.com/', '2024-03-11 06:16:18', '2024-03-11 01:46:40'),
(20, 'sasfasfafs', 'uploads/portfolio/icons-07.png', 'assfaff', 'asfafsaf', '<p><span style=\"color: rgb(0, 0, 0);\">this is a test desk</span></p>', 'https://github.com/', '2024-03-11 06:21:46', '2024-03-21 01:09:55'),
(21, 'B-cool', 'uploads/portfolio/photoshop.png', 'Test Category', '', '<p><span style=\"color: rgb(0, 0, 0);\">﻿</span><span style=\"color: rgb(225, 65, 65);\">B-cool </span><span style=\"color: rgb(9, 109, 20);\">dskkjsjkjkfsdkhkjfsd</span></p>', '', '2024-03-11 06:27:43', '2024-03-14 07:56:03'),
(23, 'Dell', 'uploads/portfolio/icons-14.png', 'dell test', 'Test Head', '<p><span style=\"color: rgb(0, 0, 0);\"><span class=\"ql-cursor\">﻿</span>dell desc</span></p>', 'https://github.com/', '2024-03-11 06:31:40', '2024-03-11 02:01:57'),
(27, 'kjhgfdsfdghj', 'uploads/portfolio/bike-front.jpg', 'gfdsadfghg', '', '<p><span style=\"color: rgb(0, 0, 0);\">dsffsfsfsf </span><strong style=\"color: rgb(0, 0, 0);\"><em><u>bike</u></em></strong></p>', '', '2024-03-14 10:21:38', '2024-03-14 07:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`, `created_at`) VALUES
(1, NULL, 'admin@gmail.com', '$2y$10$1p8De1r6IraU4L9j/l3Sxuzn4/j23SE9uv4Ry79G0e9Z0fNqRq4J2', NULL, '2024-03-04 09:47:00'),
(2, 'Apu', 'apu@gmail.com', '$2y$10$booxv3hdZlycz5BXZ6ZdCuJlHAy6APX5.DKtW2J1bNaQ8KfNTJwgO', NULL, '2024-03-04 10:44:58'),
(3, 'admin', 'admin1@gmail.com', '$2y$10$kn01tSWWWoMZD8FWLkK0oeLUkSSFYawn4gpszaLHVDgGNBUqlgBgG', NULL, '2024-03-04 11:29:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
