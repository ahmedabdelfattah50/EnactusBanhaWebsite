-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 01:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enactus`
--

-- --------------------------------------------------------

--
-- Table structure for table `hosters`
--

CREATE TABLE `hosters` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `commity_name` varchar(50) DEFAULT NULL,
  `season_year` varchar(15) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `university_name` varchar(50) NOT NULL,
  `college_name` varchar(70) NOT NULL,
  `college_year` varchar(10) NOT NULL,
  `about_hoster` varchar(300) NOT NULL,
  `facebook_link` varchar(150) DEFAULT NULL,
  `twitter_link` varchar(150) DEFAULT NULL,
  `instgram_link` varchar(150) DEFAULT NULL,
  `linkedin_link` varchar(150) DEFAULT NULL,
  `admin_trust` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosters`
--

INSERT INTO `hosters` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `birthdate`, `mobile`, `photo`, `commity_name`, `season_year`, `position_name`, `university_name`, `college_name`, `college_year`, `about_hoster`, `facebook_link`, `twitter_link`, `instgram_link`, `linkedin_link`, `admin_trust`) VALUES
(4, 'Ahmed', 'Abdel-Fattah', 'Ahmed_Abdo', 'pro.ahmed.abdelfattah@gmail.com', '$2y$10$jDJgVOMat/q/rLWZ3KdPtefchjMjm3bzd9pT9Y1wnLZd..GxIGnEK', '1999-02-07', '01022635745', 'sdfdsfdsf', NULL, '2016/2017', 'President', 'Benha', 'Computers and Artificial Intelligence', '4', 'dsfsdfsdfdsfsd', NULL, NULL, NULL, NULL, 1),
(5, 'Ahmed', 'Abdel-Fattah', 'Ahmed_Abdo2', 'amr@gmail.com', '$2y$10$jDJgVOMat/q/rLWZ3KdPtefchjMjm3bzd9pT9Y1wnLZd..GxIGnEK', '1999-02-07', '01022635775', 'sdfdsfdsf', NULL, '2016/2017', 'Member', 'Benha', 'Computers and Artificial Intelligence', '4', 'dsfsdfsdfdsfsd', NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `phone` int(11) NOT NULL,
  `commity` varchar(255) NOT NULL,
  `season` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `collage_name` varchar(255) NOT NULL,
  `collage_year` int(255) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `linked_in` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT '0',
  `old_member` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `email`, `birthday`, `phone`, `commity`, `season`, `university`, `collage_name`, `collage_year`, `about`, `facebook`, `twitter`, `insta`, `linked_in`, `img`, `old_member`) VALUES
(4, 'Amr', 'Mohamed', 'amr@gmail.com', '2000-07-15', 1115343143, 'Logistics', '2020 / 2021', 'benha', 'bfcai', 4, 'dkjfhjklsdhfljhsadkljfh sjkldhflkj dhajkfl hsdklj hfklhdkjasfhkljadshfjklhdslkfj asdfasdf sdaf sdaf asdf', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', '266567_client.png', 0),
(15, 'Amr', 'Mohamedasd', 'amr@gmail.com123', '2021-07-14', 2147483647, 'ER', '2013 / 2014', 'benha', 'bfcai', 2, 'asdfad', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', '199347_client.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(5, 'Head'),
(4, 'IT Manager'),
(7, 'Member'),
(1, 'President'),
(3, 'Project Director'),
(6, 'Vice Head'),
(2, 'Vice President');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hosters`
--
ALTER TABLE `hosters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `commity_name` (`commity_name`),
  ADD KEY `season_year` (`season_year`),
  ADD KEY `university_name` (`university_name`),
  ADD KEY `college_name` (`college_name`),
  ADD KEY `position_name` (`position_name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hosters`
--
ALTER TABLE `hosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
