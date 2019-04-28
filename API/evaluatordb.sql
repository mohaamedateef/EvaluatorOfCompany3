-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 09:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

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
-- Table structure for table `appliedcandidate`
--

CREATE TABLE `appliedcandidate` (
  `fullName` text NOT NULL,
  `email` text NOT NULL,
  `mobileNumber` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `skills` text NOT NULL,
  `passedQuizzes` text NOT NULL,
  `interests` text NOT NULL,
  `id` int(11) NOT NULL,
  `vacancy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `appliedcandidate`
--

INSERT INTO `appliedcandidate` (`fullName`, `email`, `mobileNumber`, `age`, `gender`, `address`, `skills`, `passedQuizzes`, `interests`, `id`, `vacancy`) VALUES
('Ahmed Saleh', 'ahmed.saleh.harby@gmail.com', 123, 21, 'male', '123', 'english', 'english, java', 'java', 1, 'java'),
('Atef', 'atef@gmail.com', 123, 21, 'male', '123', 'english', 'english, java', 'java', 2, 'java'),
('abdelbaset', 'abdelbaset@gmail.com', 123, 21, 'male', '123', 'english', 'english, java', 'c++', 3, 'java'),
('saleh', 'saleh@gmail.com', 123, 21, 'male', '123', 'english', 'english, java', 'java', 4, 'c++'),
('mohamed', 'mohamed@gmail.com', 123, 21, 'male', '123', 'english', 'english, java', 'java', 5, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `recommendationformula`
--

CREATE TABLE `recommendationformula` (
  `id` int(11) NOT NULL,
  `fromula` text NOT NULL,
  `companyname` text NOT NULL,
  `companyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendationformula`
--

INSERT INTO `recommendationformula` (`id`, `fromula`, `companyname`, `companyid`) VALUES
(1, 'C++ Quizzes Score => 25 and English test score > 85', 'IBM', 2020),
(2, 'Java Score => 10 and age > 30', 'Microsoft', 2016),
(3, 'IQ Test => 110 and Experience Years > 3', 'Google', 2000),
(6, 'Solid Principle Score > 11', 'Facebook', 2030);

-- --------------------------------------------------------

--
-- Table structure for table `recommendcandidates`
--

CREATE TABLE `recommendcandidates` (
  `id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `skills` text NOT NULL,
  `interests_skill_score` int(11) NOT NULL,
  `interests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendcandidates`
--

INSERT INTO `recommendcandidates` (`id`, `full_name`, `email`, `mobile_number`, `age`, `gender`, `address`, `skills`, `interests_skill_score`, `interests`) VALUES
(1, 'Mohamed Atef', 'mohamedatef@gmail.com', 1001234567, 21, 'Male', 'Giza', 'Java', 25, 'english'),
(2, 'Mohamed Moustafa', 'mohamedmoustafa@gmail.com', 1005555555, 20, 'Male', 'Giza', 'Java, PHP and C++.', 50, 'english'),
(3, 'Ahmed Saleh', 'a.shaleh@gmail.com', 12345677, 25, 'Male', 'Haram, Giza.', 'PHP, CSS and HTML.', 25, 'PHP');

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
-- Indexes for table `appliedcandidate`
--
ALTER TABLE `appliedcandidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendationformula`
--
ALTER TABLE `recommendationformula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendcandidates`
--
ALTER TABLE `recommendcandidates`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appliedcandidate`
--
ALTER TABLE `appliedcandidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recommendationformula`
--
ALTER TABLE `recommendationformula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recommendcandidates`
--
ALTER TABLE `recommendcandidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recommendcompany`
--
ALTER TABLE `recommendcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
