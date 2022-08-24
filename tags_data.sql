-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 09:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tags_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginactivity`
--

CREATE TABLE `loginactivity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `login_agent` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginactivity`
--

INSERT INTO `loginactivity` (`id`, `user_id`, `last_login`, `ip_address`, `login_agent`, `platform`) VALUES
(1, 7, '2022-08-25 00:33:07', '::1', 'Chrome 104.0.0.0', 'Windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` char(2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`user_id`, `first_name`, `last_name`, `phone_number`, `password`, `user_type`, `status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Admin', 'Singh', '1234567890', '827ccb0eea8a706c4c34a16891f84e7b', 's', 1, 1, '2019-09-13 21:56:49', NULL, NULL),
(7, 'deepinder', 'singh', '9915099247', '827ccb0eea8a706c4c34a16891f84e7b', 's', 1, 6, '2020-07-20 13:45:58', NULL, NULL),
(10, 'simranjeet', 'simgh', '', '', 'a', 1, 1, '2020-07-20 15:45:31', NULL, NULL),
(11, 'vinod', 'kumar', '', '', 's', 1, 1, '2020-07-27 12:24:10', NULL, NULL),
(12, 'ms choudhary', 'choudhary', '', '', 's', 1, 11, '2020-07-27 17:01:51', 11, '2020-07-28 11:38:04'),
(13, 'vinodh', 'k', '', '', 's', 1, 12, '2020-07-28 11:53:35', 11, '2020-07-28 14:45:55'),
(14, 'kirnesh', 'chaplot', '', '', 'a', 1, 11, '2020-08-05 09:16:36', NULL, NULL),
(15, 'manyak', 'purohit', '', '', 's', 1, 11, '2020-08-17 14:38:51', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginactivity`
--
ALTER TABLE `loginactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginactivity`
--
ALTER TABLE `loginactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
