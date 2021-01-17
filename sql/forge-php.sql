-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 04:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--
CREATE DATABASE IF NOT EXISTS `forge` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forge`;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu` varchar(500) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `execute` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu`, `icon`, `execute`) VALUES
('Create Menu Profile', 'fas fa-plus-square', 'menu.php'),
('File Management', 'fa fa-dashboard', NULL),
('Home', 'fas fa-home', 'dashboard.php'),
('User Add', NULL, 'register.php'),
('User Control', NULL, NULL),
('User Management', 'fas fa-users', NULL),
('User Statistics', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `moduleName` varchar(100) NOT NULL,
  `moduleProcess` varchar(1000) NOT NULL,
  `blacklist` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `moduleName`, `moduleProcess`, `blacklist`) VALUES
(1, 'Dir Management', '../controller/dirManagement.php', NULL),
(2, 'Records', '../controller/records.php', NULL),
(3, 'Logs', '../controller/filemanage.php', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `label` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `label`, `description`) VALUES
(1, 'Admin', 'A test profile for developent'),
(2, 'Encoder', 'Data and File Encoder');

-- --------------------------------------------------------

--
-- Table structure for table `profileModules`
--

CREATE TABLE `profileModules` (
  `id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `type` enum('header','submenu') NOT NULL,
  `menu` varchar(500) NOT NULL,
  `rights` enum('R','W') NOT NULL,
  `parent` varchar(500) DEFAULT NULL,
  `blacklist` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileModules`
--

INSERT INTO `profileModules` (`id`, `prof_id`, `type`, `menu`, `rights`, `parent`, `blacklist`) VALUES
(1, 1, 'header', 'Home', 'W', '', ''),
(2, 1, 'header', 'Create Menu Profile', 'W', '', NULL),
(5, 1, 'header', 'User Management', 'W', '', NULL),
(6, 1, 'submenu', 'User Add', 'W', 'User Management', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `pdf` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `password`, `fname`, `mname`, `lname`, `role`, `prof_id`, `pdf`) VALUES
(5, 201801017, '$2y$10$UZMZLq2J2VFSqUAt4UqozOSE7WFmif63GnOUG0i/wObI4HXAM3U7.', 'Dino ', 'Reyes', 'Gomez', 'Administrator', 1, ''),
(20, 17, '$2y$10$jRpnSVoQTjpsE/niascQr.5JpDTOvYRnb.aUsHRfh/ooy1ee.TbIe', 'Dino', 'Reyes', 'Gomez', 'Administrator', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileModules`
--
ALTER TABLE `profileModules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof_id` (`prof_id`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `prof_id` (`prof_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profileModules`
--
ALTER TABLE `profileModules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profileModules`
--
ALTER TABLE `profileModules`
  ADD CONSTRAINT `profileModules_ibfk_5` FOREIGN KEY (`menu`) REFERENCES `menu` (`menu`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
