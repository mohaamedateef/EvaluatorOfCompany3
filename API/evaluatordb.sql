-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 01:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evaluatordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `recommendcompany`
--

CREATE TABLE `recommendcompany` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `job` text NOT NULL,
  `salary` float NOT NULL,
  `timefrom` time NOT NULL,
  `timeto` time NOT NULL,
  `interests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendcompany`
--

INSERT INTO `recommendcompany` (`id`, `name`, `address`, `job`, `salary`, `timefrom`, `timeto`, `interests`) VALUES
(1, 'Vodafone', 'Dokki,Giza', 'Call Center', 1590, '00:00:49', '00:00:13', 'Good English'),
(2, 'Orange', '90 Street , New Cairo', 'Sales Manager', 15000, '10:00:00', '17:00:00', 'Great Skills');

-- --------------------------------------------------------

--
-- Table structure for table `recommendquiz`
--

CREATE TABLE `recommendquiz` (
  `title` text NOT NULL,
  `interest` text NOT NULL,
  `gender` text NOT NULL,
  `skills` text NOT NULL,
  `id` int(11) NOT NULL,
  `company` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendquiz`
--

INSERT INTO `recommendquiz` (`title`, `interest`, `gender`, `skills`, `id`, `company`) VALUES
('check english', 'have english course ', ' both', 'good in grammer and accent', 1, 'vodafone'),
('computer quiz ', 'learn basics of computer', 'male', 'excel and word course', 2, 'orange'),
('agent course', 'good accent', 'female', 'can communicate with people in good way', 3, 'vodafone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recommendcompany`
--
ALTER TABLE `recommendcompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendquiz`
--
ALTER TABLE `recommendquiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recommendcompany`
--
ALTER TABLE `recommendcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
