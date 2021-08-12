-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 08:05 PM
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
(1, 'Vision', 'Create better'),
(2, 'Mission', 'Engage the next generation of entrepr- eneurial leaders to use innovation and business principles for the improvement of the Egyptian community'),
(3, 'Goal', 'Train Generation To inovative and green soulutions'),
(4, 'Entrepreneurial', 'Having the perspective to see an opportunity and the talent to create value from that opportunity.'),
(5, 'Action', 'The willingness to do something and the commitment to see it through even when the outcome is not guaranteed.'),
(6, 'Us', 'A group of people who see themselves connected in some important way; individuals that are part of a greater whole.');

-- --------------------------------------------------------

--
-- Table structure for table `collage`
--

CREATE TABLE `collage` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collage`
--

INSERT INTO `collage` (`id`, `name`) VALUES
(1, 'Computers and Artificial Intelligence');

-- --------------------------------------------------------

--
-- Table structure for table `commity`
--

CREATE TABLE `commity` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbreviation` varchar(10) NOT NULL,
  `describtion` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commity`
--

INSERT INTO `commity` (`id`, `name`, `abbreviation`, `describtion`) VALUES
(2, 'IT', 'IT', 'sfsdf dsfsd fsd fsd'),
(3, 'PM', 'PM', 'fdsfsdgsafsdfsd'),
(4, 'HR', 'HR', 'sdfsdf sdsdHR HR'),
(5, 'Presentation', 'Presentati', 'PresentationPresentationPresentation'),
(6, 'Media', 'Media', 'MediaMediaMediaMedia'),
(7, 'ER', 'ER', 'ERERERERERER'),
(8, 'Logistics', 'Logistics', 'LogisticsLogisticsLogisticsLogistics');

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
(7, 'Amr Mohamed', 'amr@gmail.com', 2147483647, 'hello this is the first message from website ababbababbdaskjb ajsbdkjasd\r\nsdfa\r\nas\r\nf\r\nasdf\r\nasd\r\nfasdfhasd hfdsf af asdf asdfdf', '2021/06/20 . 10:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `e_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_season` varchar(255) CHARACTER SET utf8 NOT NULL,
  `main_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `imgs_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_1` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_3` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_4` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_1` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_1_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_2` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_2_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_3` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_3_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_4` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_4_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_5` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_5_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_6` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_6_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_7` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_7_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_8` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_8_link` text CHARACTER SET utf8 DEFAULT NULL,
  `speaker_9` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_9_link` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_10` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `speaker_10_link` varchar(255) DEFAULT NULL,
  `e_location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descrip` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `e_name`, `e_season`, `main_img`, `imgs_link`, `img_1`, `img_2`, `img_3`, `img_4`, `speaker_1`, `speaker_1_link`, `speaker_2`, `speaker_2_link`, `speaker_3`, `speaker_3_link`, `speaker_4`, `speaker_4_link`, `speaker_5`, `speaker_5_link`, `speaker_6`, `speaker_6_link`, `speaker_7`, `speaker_7_link`, `speaker_8`, `speaker_8_link`, `speaker_9`, `speaker_9_link`, `speaker_10`, `speaker_10_link`, `e_location`, `descrip`) VALUES
(8, 'Shine Up 1', '2016/2017', 'eventMainImg_E7pOm70X0AYDAmq.jpeg', 'https://getbootstrap.com/docs/4.0/utilities/flex/', 'eventImg2_930bedd316d91076b522754bad4da78f.jpg', '', '', '', 'aaaaaaaa', 'aaaaaa', 'ddfdfd', 'ddddd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Benha, Qulipia, Misr Public Library', 'Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Minima Fuga Ut Illum Optio, Sequi Aut Impedit Assumenda Tempore! Cupiditate Molestiae Modi, Sunt Ad Eos Amet Excepturi Quibusdam In Libero Expedita.'),
(9, 'asd', '2016/2017', 'eventMainImg_233165256_2905614716369771_7261450223430389434_n.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'srefe', 'efeefe'),
(10, 'asd', '2016/2017', 'eventMainImg_233165256_2905614716369771_7261450223430389434_n.jpg', '', '', '', '', '', 'dfdfd', 'https://www.facebook.com/', 'dfdfddde', 'https://www.facebook.com/', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'srefe', 'efeefe'),
(11, 'rr', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 'tttt', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'eeeeee', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 'drerrrrrrr', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 'fffrfrrerrrr', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'dddfdfdfdfd', '2016/2017', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(4, 'Ahmed', 'Abdel-Fattah', 'pro.ahmed.abdelfattah@gmail.com', '$2y$10$8zTf5JGXO4Lctw9mur3SaORW3d1oQnNHcvvq42UFVF.EHxoq7ryaK', '1999-02-07', '01022635745', '256684_', 'Heigh Board', '2016/2017', 'Head', 'Benha', 'Computers and Artificial Intelligence', '4', 'dsfsdfsdfdsfsd', '', '', '', '', 1),
(13, 'Amr', 'Mohamed', 'amr@gmail.com', '$2y$10$6dzX5a8dS/.YqXj8WBDlcep36z8myN5WTGsSeUCU9n2eKsv6.L9OS', '2000-07-15', '02121321321', '954078_client.png', 'Media', '2011 / 2012', 'Head', 'benha', 'bfcai', '4', 'adadas', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 1),
(14, 'Amr', 'Mohamed', 'amr123@gmail.com', '$2y$10$Ak3nrbEfG1hMYsCsZ2NIo.mZcvbTUqzLIq629W0oHpfxhQrrCi5iu', '2000-07-15', '+2011153431', '579189_add_motor.png', 'PM', '2010 / 2011', 'Head', 'benha', 'bfcai', '3', 'adsasdasdasds', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 1),
(15, 'teeeeee', 'tttt', 'teetttete@fr.cee', '$2y$10$POKYqSMSX9RCmOu4ypqLlOtkw5hpV5S5yMiwzTWhfqIjazRTykYJ2', '2021-08-11', '5124815', '461841_202146491_158448436325585_4125675622288411906_n.jpg', 'Presentation', '2016/2017', 'Vice Head', 'Benha', 'Computers and Artificial Intelligence', '3', 'ewfewewf wefwef we', 'https://www.facebook.com/profile.php?id=100004990806278', 'https://twitter.com/AhmedAb46585095', 'https://www.instagram.com/ahmed_abdelfattah6615/', 'https://www.linkedin.com/in/ahmed-abdel-fattah-a10b65172/', 0);

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
(20, 'Amr', 'Mohamed', 'amr@gmail.comaas', '2000-07-15', 2147483647, 'Presentation', '2020 / 2021', 'benha', 'bfcai', 4, 'asdasdasdasdasdasdsad', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', 'https://www.facebook.com/groups/505032686615017/permalink/1168971586887787/', '851325_202146491_158448436325585_4125675622288411906_n.jpg', 1),
(21, 'AAASD', 'memb', 'test@mem.com', '2021-08-11', 102235, 'Presentation', '2011 / 2012', 'Benha', 'Faculty of computers', 4, 'wefvdwferwfew few', 'https://github.com/', 'https://github.com/', 'https://github.com/', 'https://github.com/', '537277_E7pOm70X0AYDAmq.jpeg', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `year` varchar(15) NOT NULL,
  `active_season` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `year`, `active_season`) VALUES
(1, '2016/2017', 0);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `name`) VALUES
(1, 'Benha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collage`
--
ALTER TABLE `collage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commity`
--
ALTER TABLE `commity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `abbreviation` (`abbreviation`);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`year`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `collage`
--
ALTER TABLE `collage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commity`
--
ALTER TABLE `commity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hosters`
--
ALTER TABLE `hosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
