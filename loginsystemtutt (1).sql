-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 12:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystemtutt`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(0, 'Phase1_Overview_2022.pdf', '2023-04-30 15:39:38', '1'),
(15, 'background.jpg', '2023-04-17 08:03:18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(4, 'mandisambokazi10@gmail.com', '7915cb0a50f0c91b', '$2y$10$04.0dNTIuC.y7.mkqgVbGeIWl6o8MM1X7PGCzwR.zqURCp8BB.tBO', '1683023783'),
(12, '', 'c2b95d4980dc8a29', '$2y$10$lq40XmlGcwqr1cqwJ7.jEe49nmcgq21h7ML.6r.D8v7d1OLiUYUeC', '1684069896'),
(14, '218005716@stu.ukzn.ac.za', '3c8bf816eb3fba45', '$2y$10$lxf5lZsi22VaOM1y9Z53mO1gQu0KOY3jNTqzzqgFZoZXdJCpZC9vS', '1684070949'),
(15, 'GeloRhee@gmail.com', 'e0ecb842777b17b7', '$2y$10$wZZgVwXKd2L8g3lODvYmruMMlD2oGbpD9cgWTl8PrEBrqpVsMYk3i', '1684071127');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'Danny123', 'Danny@gmail.com', '$2y$10$k5yLsCtwlUx2vk/3xzGvC.cSGpnzlFItf49HJAIaulkflG/8sjtjW'),
(2, 'gisa', 'gisa@gmail.com', '$2y$10$4OpS5G2BjYOewKBwofAJzOoWnBd2pwE3dp0WP4COAiofgGGjNxJR6'),
(3, 'Duda', 'ntandosmiley@gmail.com', '$2y$10$1O/wxHKPg8p5y7addLHUaeCLfsUIrAA/GzuJaJ8mU6DtyJOAf8mdC'),
(4, 'AngelMbokazi', 'mandisambokazi10@gmail.com', '$2y$10$qjXJobNYHTyOqPZN2ZL26.11ytI6Q.9lSngFSa5TQmRhPpn5qTdOi'),
(5, 'Admin', 'Admin@gmail.com', '$2y$10$SRI7aoSnc8L/EPKFSgEFSeQ8dO6TZy9jYJHITYHqy2oGnScxCFlYW'),
(6, 'Mari', 'Mary@gmail.com', '$2y$10$iIgFGwRffmJVqSDyyEuZeObtAL2Hbgcb.v.R6JEStCd8Pom5W/6z6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
