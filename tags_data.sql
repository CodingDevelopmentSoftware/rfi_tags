-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 02:11 PM
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
  `last_login` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`user_id`, `first_name`, `last_name`, `phone_number`, `password`, `user_type`, `status`, `last_login`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Admin', 'Singh', '1234567890', '21232f297a57a5a743894a0e4a801fc3', 's', 1, '2022-08-28 17:36:00', 1, '2019-09-13 21:56:49', NULL, NULL),
(18, 'Deepu', 'Bhasin', '9915099247', 'e10adc3949ba59abbe56e057f20f883e', 'e', 1, '2022-08-28 17:35:50', 1, '2022-08-27 22:50:36', 1, '2022-08-28 00:38:55');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
