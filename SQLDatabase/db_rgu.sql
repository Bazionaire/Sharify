-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 08:22 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rgu`
--

-- --------------------------------------------------------

--
-- Table structure for table `activate_account`
--

CREATE TABLE `activate_account` (
  `id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(200) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `aboutme` varchar(2000) NOT NULL,
  `role` varchar(20) NOT NULL,
  `activated` varchar(1) NOT NULL DEFAULT 'y',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `title`, `lastname`, `firstname`, `location`, `email`, `address`, `country`, `photo`, `aboutme`, `role`, `activated`, `datecreated`) VALUES
(2, 'Baz', 'Baz', '', 'Khil', 'Baz', 'Amsterdam', 'Baz@gmail.com', '', '', 'icons.png', '', 'admin', 'y', '2018-12-14 16:03:00'),
(3, 'Muska', 'Muska', '', 'Khil', 'Muska', '', 'Muska@gmail.com', '', '', 'icons.png', '', 'teamleader', 'y', '2019-04-16 14:04:18'),
(69, 'Zenny', 'Zenny', '', 'Zen', 'Zan', '', 'Zenny@gmail.com', '', '', 'icons.png', '', 'member', 'y', '2019-04-16 14:13:15'),
(70, 'Bazzy', 'Bazzy', '', 'Bazzy', 'Baz', '', 'Bazzy@gmail.com', '', '', 'icons.png', '', 'teamleader', 'y', '2019-04-19 17:48:55'),
(71, 'Hamza@gmail.com', 'Hamza', '', 'Hamza', 'Khil', '', 'Hamza@gmail.com', '', '', '', '', 'teamleader', 'y', '2020-04-22 23:39:08'),
(102, 'stef@gmail.com', 'stef', '', 'stef', 'stef', '', 'stef@gmail.com', '', '', '', '', 'member', 'y', '2020-04-25 15:57:16'),
(103, 'Student', 'Student', '', 'Student', 'Student', '', 'Student', '', '', '', '', 'member', 'y', '2020-04-27 03:40:37'),
(104, 'Student', 'Student', '', 'Student', 'Student', '', 'Student', '', '', '', '', 'member', 'y', '2020-04-27 03:40:53'),
(105, 'Boy', 'Boy', '', 'Boy', 'Boy', '', 'Boy', '', '', '', '', 'member', 'y', '2020-04-27 03:41:16'),
(106, 'Boyy@gmail.com', 'Boyy', '', 'Boyy', 'Boyy', '', 'Boyy@gmail.com', '', '', '', '', 'member', 'y', '2020-04-27 03:41:36'),
(107, 'team@gmail.com', 'team', '', 'Test', 'Test', '', 'team@gmail.com', '', '', '', '', 'teamleader', 'y', '2020-04-27 17:54:08'),
(108, 'Test@gmail.com', 'Test', '', 'test', 'Test', '', 'Test@gmail.com', '', '', '', '', 'teamleader', 'y', '2020-05-01 04:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `paper_assigned`
--

CREATE TABLE `paper_assigned` (
  `id` int(9) NOT NULL,
  `paperid` int(9) NOT NULL,
  `userid` int(9) NOT NULL,
  `duration` int(9) NOT NULL,
  `status` varchar(1) NOT NULL,
  `dateassigned` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_assigned`
--

INSERT INTO `paper_assigned` (`id`, `paperid`, `userid`, `duration`, `status`, `dateassigned`) VALUES
(1, 1, 69, 10, 'c', '2019-04-16 14:22:01'),
(2, 4, 69, 15, '', '2019-04-17 12:51:21'),
(3, 4, 68, 15, '', '2019-04-17 12:51:30'),
(4, 8, 69, 10, 'c', '2019-04-20 11:56:17'),
(5, 10, 69, 15, 'c', '2020-04-25 17:58:53'),
(6, 11, 69, 15, '', '2020-04-27 00:00:04'),
(7, 9, 69, 15, '', '2020-04-27 00:00:55'),
(8, 12, 69, 15, '', '2020-04-27 00:08:07'),
(9, 13, 104, 15, '', '2020-05-01 05:27:55'),
(10, 14, 69, 15, 'c', '2020-05-01 05:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(9) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(20) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `code`, `datecreated`) VALUES
(1, 'Business Intelligence', 'BI', '2019-04-16 14:03:37'),
(2, 'Cryptocurrency Predicting', 'CRYP', '2019-04-19 18:34:44'),
(4, 'Artificial Intelligence', 'AI', '2020-04-23 01:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE `projects_users` (
  `id` int(9) NOT NULL,
  `projectid` int(9) NOT NULL,
  `userid` int(9) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `projectid`, `userid`, `datecreated`) VALUES
(1, 1, 68, '2019-04-16 14:05:02'),
(2, 1, 70, '2019-04-19 18:26:06'),
(3, 1, 3, '2020-04-22 19:36:15'),
(4, 2, 69, '2020-04-22 19:36:22'),
(5, 3, 73, '2020-04-22 23:40:45'),
(6, 2, 70, '2020-04-23 01:06:02'),
(7, 2, 71, '2020-04-25 17:49:43'),
(8, 4, 69, '2020-04-26 23:52:36'),
(9, 1, 69, '2020-04-26 23:52:53'),
(10, 1, 107, '2020-04-27 17:54:37'),
(11, 1, 69, '2020-05-01 04:50:39'),
(12, 4, 69, '2020-05-01 05:40:57'),
(13, 1, 69, '2020-05-01 05:41:03'),
(14, 2, 69, '2020-05-01 05:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(9) NOT NULL,
  `paperid` int(9) NOT NULL,
  `submitedby` int(9) NOT NULL,
  `comment` varchar(3000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `paperid`, `submitedby`, `comment`, `file`, `datecreated`) VALUES
(1, 1, 69, 'It was a great work...I commend the author.', 'Project Work 1 - Research Paper Sharing App.docx', '2019-04-16 14:24:02'),
(2, 8, 69, 'A well written article on the programmatic and analytic prowess of python in bioinformatics. This is explores intermediate and advance subject areas in bioinformatics.\r\n\r\nI will like to see more of the algorithms analysed to give people more clarity on the implementations.', 'My Review Comments.docx', '2019-04-20 12:22:28'),
(3, 10, 69, 'Its a nice paperr', '', '2020-04-26 23:54:38'),
(4, 10, 69, 'Its a nice paperr', '', '2020-04-26 23:55:50'),
(5, 10, 69, 'its a good review', 'Intranet CW Baz Khil.pdf', '2020-04-26 23:57:20'),
(6, 14, 69, 'test', 'Review11.pdf', '2020-05-01 05:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `submit_papers`
--

CREATE TABLE `submit_papers` (
  `id` int(9) NOT NULL,
  `projectid` int(9) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `file` varchar(100) NOT NULL,
  `submitedby` int(9) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 's',
  `datesubmitted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_papers`
--

INSERT INTO `submit_papers` (`id`, `projectid`, `title`, `description`, `file`, `submitedby`, `status`, `datesubmitted`) VALUES
(9, 2, 'How to make Money in bitcoin', 'This is a way to make money in crypto', 'Intranet CW Baz Khil.docx', 3, 'r', '2020-04-25 17:40:50'),
(10, 4, 'How AI is becoming the new thing', 'this is how AI will run the world', 'AI ruling the world.docx', 3, 'r', '2020-04-25 17:41:59'),
(11, 1, 'How Business Intelligence is the new thing', 'Business is Business', 'Bi the new.pdf', 3, 'r', '2020-04-26 23:28:10'),
(12, 2, 'How it changed the world', 'changing the world this crypto', 'Intranet CW Baz Khil.pdf', 69, 'r', '2020-04-26 23:56:50'),
(13, 4, 'AI is awesome', 'awesome AI', 'CMM007 Coursework Part 1.pdf', 3, 'r', '2020-04-27 00:09:13'),
(14, 2, 'testing', 'testing', 'Ttesttt.pdf', 3, 'r', '2020-05-01 05:33:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activate_account`
--
ALTER TABLE `activate_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_assigned`
--
ALTER TABLE `paper_assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_papers`
--
ALTER TABLE `submit_papers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activate_account`
--
ALTER TABLE `activate_account`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `paper_assigned`
--
ALTER TABLE `paper_assigned`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects_users`
--
ALTER TABLE `projects_users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submit_papers`
--
ALTER TABLE `submit_papers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
