-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 03:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpo_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin', 'bpoadmin@123', 'admin123', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `folderpath` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `description`, `startdate`, `enddate`, `status`, `filename`, `folderpath`, `amount`, `user_id`) VALUES
(1, 'dd', 'dd', '2024-03-12', '2024-03-30', 'Completed', '', '', 1000, 4),
(4, 'efef', 'efef', '2024-03-12', '2024-03-29', 'Not started', '', '', 0, 2),
(5, 'effefw', 'feef', '2024-03-27', '2024-03-31', 'Not started', '', '', 0, 2),
(7, 'data', 'ssvsv', '2024-03-20', '2024-03-31', 'Not started', '', '', 0, 2),
(8, 'entry', 'vdve', '2024-03-22', '2024-03-31', 'Not started', '', '', 0, 2),
(9, 'egeg', 'eeg', '2024-03-18', '2024-03-30', 'Not started', '', '', 0, 2),
(10, 'evew', 'evew', '2024-03-12', '2024-03-14', 'Not started', '', '', 0, 2),
(11, 'eve', 'vew', '2024-03-12', '2024-03-22', 'Not started', '', '', 0, 2),
(12, 'data entry', 'this is data', '2024-03-15', '2024-03-30', 'Not started', '', '', 0, 2),
(13, 'cww', 'ww', '2024-03-28', '2024-03-30', 'Not started', '', '', 0, 2),
(14, 'qqq', 'qqq', '2024-03-07', '2024-03-29', 'Not started', '', '', 0, 2),
(15, 'wwc', 'cwwc', '2024-03-12', '2024-03-13', 'Not started', '', '', 0, 2),
(16, 'ww', 'ww', '2024-03-18', '2024-03-22', 'Not started', '', '', 0, 2),
(17, 's', 's', '2024-03-20', '2024-03-30', 'Not started', '', 'uploads/', 0, 2),
(18, 'my', 'data', '2024-03-13', '2024-03-30', 'Not started', 'e-EPIC_ZKF2520708.pdf', 'uploads/', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `filename` varchar(100) NOT NULL,
  `fileup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`filename`, `fileup`) VALUES
('', ''),
('', 'uploads/'),
('', 'uploads/'),
('IT 03.pdf', 'uploads/'),
('My Contacts 1.pdf', 'uploads/'),
('B.Tech.IT (1).pdf', 'uploads/'),
('NS exercise-1.docx', 'uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`amount`) VALUES
(100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `company` text NOT NULL,
  `position` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `password`, `company`, `position`, `address`) VALUES
(1, 'barath', 'barat@gmail.com', 2147483647, 'barath123', 'bpo', 'manager', 'chennai'),
(2, 'abi', 'abi@123', 123457890, 'abi123', 'bpo', 'manager', 'chennai'),
(3, 'irfan', 'irfan@123', 2147483647, 'irfan123', 'pink', 'manager', 'walaja'),
(4, 'ramya', 'ramya@123', 2147483647, 'chilly', 'sga', 'manager', 'chennai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
