-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:21 PM
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
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `section_name`, `content`) VALUES
(1, 'Vision', 'Create better, more sustainable Egyptian communities.'),
(2, 'Mission', 'Engage the next generation of entrepr- eneurial leaders to use innovation and business principles for the improvement of the Egyptian community'),
(3, 'Goal', 'Train Generation To inovative and green soulutions'),
(4, 'Entrepreneurial', 'Having the perspective to see an opportunity and the talent to create value from that opportunity.'),
(5, 'Action', 'The willingness to do something and the commitment to see it through even when the outcome is not guaranteed.'),
(6, 'Us', 'A group of people who see themselves connected in some important way; individuals that are part of a greater whole.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `messsage` varchar(2555) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `messsage`, `time`) VALUES
(7, 'Amr Mohamed', 'amr@gmail.com', 2147483647, 'hello this is the first message from website ababbababbdaskjb ajsbdkjasd\r\nsdfa\r\nas\r\nf\r\nasdf\r\nasd\r\nfasdfhasd hfdsf af asdf asdfdf', '2021/06/20 . 10:58:44'),
(10, 'Amr Mohamed', 'amr@gmail.com', 2147483647, 'hello this is the first message from website ababbababbdaskjb ajsbdkjasd\r\nsdfa\r\nas\r\nf\r\nasdf\r\nasd\r\nfasdfhasd hfdsf af asdf asdfdf', '2021/06/20 . 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `ename` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eyear` varchar(255) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descrip` text CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `ename`, `eyear`, `img`, `descrip`, `link`) VALUES
(1, 'ENACTUS', '2022', 'images.jpg', 'HJVY,VJ,HNKJNFDVN,JDKVBZCDDKF', 'http://localhost/phpmyadmin/tbl_change.php?db=enactus&table=event'),
(2, 'shine up', '2019', 'icons8-admin-settings-male-100.png', 'kbejgfhfffffffhfhhffhhfhfhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'http://localhost/enactus-gh-pages/add_event.php');

-- --------------------------------------------------------

--
-- Table structure for table `hosters`
--

CREATE TABLE `hosters` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `commity_name` varchar(50) NOT NULL DEFAULT 'Heigh Board',
  `season_year` varchar(15) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  `university_name` varchar(50) NOT NULL,
  `college_name` varchar(70) NOT NULL,
  `college_year` varchar(10) NOT NULL,
  `about_hoster` varchar(300) NOT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `instgram` varchar(150) DEFAULT NULL,
  `linked_in` varchar(150) DEFAULT NULL,
  `old` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hosters`
--

INSERT INTO `hosters` (`id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `phone`, `photo`, `commity_name`, `season_year`, `position_name`, `university_name`, `college_name`, `college_year`, `about_hoster`, `facebook`, `twitter`, `instgram`, `linked_in`, `old`) VALUES
(4, 'Ahmed', 'Abdel-Fattah', 'pro.ahmed.abdelfattah@gmail.com', '$2y$10$jDJgVOMat/q/rLWZ3KdPtefchjMjm3bzd9pT9Y1wnLZd..GxIGnEK', '1999-02-07', '01022635745', 'sdfdsfdsf', 'Heigh Board', '2016/2017', 'President', 'Benha', 'Computers and Artificial Intelligence', '4', 'dsfsdfsdfdsfsd', NULL, NULL, NULL, NULL, 1),
(13, 'Amr', 'Mohamed', 'amr@gmail.com', '$2y$10$6dzX5a8dS/.YqXj8WBDlcep36z8myN5WTGsSeUCU9n2eKsv6.L9OS', '2000-07-15', '02121321321', '954078_client.png', 'Media', '2011 / 2012', 'Head', 'benha', 'bfcai', '4', 'adadas', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 1),
(14, 'Amr', 'Mohamed', 'amr123@gmail.com', '$2y$10$Ak3nrbEfG1hMYsCsZ2NIo.mZcvbTUqzLIq629W0oHpfxhQrrCi5iu', '2000-07-15', '+2011153431', '579189_add_motor.png', 'PM', '2010 / 2011', 'Head', 'benha', 'bfcai', '3', 'adsasdasdasds', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 1);

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
(20, 'Amr', 'Mohamed', 'amr@gmail.comaas', '2000-07-15', 2147483647, 'Presentation', '2020 / 2021', 'benha', 'bfcai', 4, 'asdasdasdasdasdasdsad', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', '149252_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'PRIVATE',
  `email` varchar(50) NOT NULL DEFAULT 'PRIVATE',
  `commity` varchar(50) NOT NULL,
  `season` varchar(50) NOT NULL,
  `current_season` varchar(50) NOT NULL,
  `opinion` varchar(255) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opinion`
--

INSERT INTO `opinion` (`id`, `name`, `email`, `commity`, `season`, `current_season`, `opinion`, `time`) VALUES
(2, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '', 'thanks', '2021/07/19 . 09:59:41'),
(4, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:04:09'),
(5, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:04:20'),
(6, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2021', 'thanks', '2021/07/19 . 10:04:33'),
(7, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:04:52'),
(8, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2021-1', 'thanks', '2021/07/19 . 10:05:18'),
(10, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:06:00'),
(11, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:06:12'),
(12, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:06:45'),
(13, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '202122020', 'thanks', '2021/07/19 . 10:06:56'),
(14, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '20212020', 'thanks', '2021/07/19 . 10:07:17'),
(15, 'Amr Mohamed', 'amr@gmail.com', 'Logistics', '2020 / 2021', '2020', 'thanks', '2021/07/19 . 10:07:29'),
(16, 'Amr Mohamed', 'amr@gmail.com', 'HR', '2014 / 2015', '2020', 'asdasdasd', '2021/07/19 . 10:08:41'),
(17, 'Amr Mohamed', 'amr@gmail.com', 'HR', '2010 / 2011', '4041', 'asdasdasdas', '2021/07/19 . 10:09:31'),
(18, 'Amr Mohamed', 'amr@gmail.com', 'HR', '2010 / 2011', '2021', 'asdasdasdas', '2021/07/19 . 10:09:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hosters`
--
ALTER TABLE `hosters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`phone`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `commity_name` (`commity_name`),
  ADD KEY `season_year` (`season_year`),
  ADD KEY `university_name` (`university_name`),
  ADD KEY `college_name` (`college_name`),
  ADD KEY `position_name` (`position_name`),
  ADD KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hosters`
--
ALTER TABLE `hosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
