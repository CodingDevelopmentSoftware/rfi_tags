-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 10:33 PM
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
-- Table structure for table `company_management`
--

CREATE TABLE `company_management` (
  `cid` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_management`
--

INSERT INTO `company_management` (`cid`, `company_name`, `status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Wavelinx Primate Limited', 1, 1, '2022-09-12 23:51:16', 1, '2022-09-13 13:14:13');

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
(1, 1, '2022-09-26 22:16:27', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(2, 1, '2022-09-27 23:44:17', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(3, 18, '2022-09-27 23:46:10', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(4, 1, '2022-09-28 00:19:34', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(5, 18, '2022-09-28 00:22:34', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(6, 18, '2022-09-28 00:26:24', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(7, 1, '2022-09-28 00:27:41', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(8, 18, '2022-09-28 00:28:36', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(9, 1, '2022-09-28 10:49:54', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(10, 18, '2022-09-28 10:55:58', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(11, 1, '2022-09-28 10:58:26', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(12, 18, '2022-09-28 22:48:13', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(13, 1, '2022-09-28 23:05:48', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(14, 18, '2022-09-28 23:07:56', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(15, 1, '2022-09-29 11:39:49', '::1', 'Chrome 105.0.0.0', 'Windows 10'),
(16, 19, '2022-09-29 11:40:10', '::1', 'Chrome 105.0.0.0', 'Windows 10');

-- --------------------------------------------------------

--
-- Table structure for table `project_management`
--

CREATE TABLE `project_management` (
  `pid` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `project_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_management`
--

INSERT INTO `project_management` (`pid`, `company_id`, `project_name`, `status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 1, 'Mc Tags', 1, 1, '2022-09-13 13:49:49', 1, '2022-09-14 01:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `tag_limit`
--

CREATE TABLE `tag_limit` (
  `id` int(11) NOT NULL,
  `total_limit` int(11) NOT NULL,
  `totel_scanned` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag_limit`
--

INSERT INTO `tag_limit` (`id`, `total_limit`, `totel_scanned`, `modified_by`, `modified_at`) VALUES
(1, 150, 0, 1, '2022-09-28 10:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `temp_excel`
--

CREATE TABLE `temp_excel` (
  `tid` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `type_of_tag` varchar(255) NOT NULL,
  `qr_and_bar_code_number` varchar(255) NOT NULL,
  `rfid_or_id` varchar(255) NOT NULL,
  `data_exist` tinyint(4) NOT NULL,
  `rfid_read_status` tinyint(4) NOT NULL,
  `qr_read_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_dt` datetime NOT NULL,
  `rfid_read_by` int(11) DEFAULT NULL,
  `rfid_read_dt` datetime DEFAULT NULL,
  `qr_read_by` int(11) DEFAULT NULL,
  `qr_read_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_excel`
--

INSERT INTO `temp_excel` (`tid`, `company_id`, `project_id`, `type_of_tag`, `qr_and_bar_code_number`, `rfid_or_id`, `data_exist`, `rfid_read_status`, `qr_read_status`, `status`, `created_by`, `created_dt`, `rfid_read_by`, `rfid_read_dt`, `qr_read_by`, `qr_read_dt`) VALUES
(1, 1, 1, 'soft label', '35A70218000000000000000000000030', '35A70218000000000000000000000030', 1, 0, 0, 1, 1, '2022-09-28 23:06:32', 19, '2022-09-30 02:00:10', NULL, NULL),
(2, 1, 1, 'soft label', '4E7E3970040000000000000000000030', '4E7E3970040000000000000000000030', 1, 0, 0, 1, 1, '2022-09-28 23:06:32', 19, '2022-09-30 02:00:20', NULL, NULL);

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
  `modified_dt` datetime DEFAULT NULL,
  `tag_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`user_id`, `first_name`, `last_name`, `phone_number`, `password`, `user_type`, `status`, `last_login`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `tag_count`) VALUES
(1, 'Admin', 'Singh', '1234567890', '21232f297a57a5a743894a0e4a801fc3', 's', 1, '2022-09-29 11:39:49', 1, '2019-09-13 21:56:49', NULL, NULL, 0),
(18, 'Deepu', 'Bhasin', '9915099247', 'e10adc3949ba59abbe56e057f20f883e', 'e', 1, '2022-09-28 23:07:56', 1, '2022-08-27 22:50:36', 1, '2022-08-28 00:38:55', 0),
(19, 'Sarbdeep', 'Singh', '1122334455', 'e10adc3949ba59abbe56e057f20f883e', 'e', 1, '2022-09-29 11:40:10', 1, '2022-09-06 10:39:29', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_management`
--
ALTER TABLE `company_management`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `loginactivity`
--
ALTER TABLE `loginactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_management`
--
ALTER TABLE `project_management`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tag_limit`
--
ALTER TABLE `tag_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_excel`
--
ALTER TABLE `temp_excel`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `rfid_or_id_index` (`rfid_or_id`),
  ADD KEY `qr_and_bar_code_number_index` (`qr_and_bar_code_number`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_management`
--
ALTER TABLE `company_management`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginactivity`
--
ALTER TABLE `loginactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_management`
--
ALTER TABLE `project_management`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag_limit`
--
ALTER TABLE `tag_limit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_excel`
--
ALTER TABLE `temp_excel`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
