-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 06:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfidattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$89uX3LBy4mlU/DcBveQ1l.32nSianDP/E1MfUh.Z.6B4Z0ql3y7PK'),
(2, 'Admin2', 'admin2@gmail.com', 'fc8252c8dc55839967c58b9ad755a59b61b67c13227ddae4bd3f78a38bf394f7');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_tools`
--

CREATE TABLE `borrowed_tools` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `toolid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_tools`
--

INSERT INTO `borrowed_tools` (`id`, `userid`, `toolid`) VALUES
(1, 44, 22),
(2, 44, 23),
(3, 35, 23),
(4, 35, 22),
(5, 42, 22),
(6, 42, 22),
(7, 42, 22),
(8, 42, 22),
(9, 42, 22),
(10, 42, 23);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(6, 'BSAET ', '4-2', '477d95fc98dc5087', '2023-10-13', 1),
(7, 'dwad', 'ddaw', 'd68518af507755a5', '2023-11-26', 0),
(8, 'dwadwa', 'dawd', 'baa6f674add46c7f', '2023-12-08', 0),
(9, 'dwa', 'daw', '8b4d0abdb83bd20d', '2023-12-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `id` int(11) NOT NULL,
  `device_date` date NOT NULL,
  `tool_name` varchar(100) NOT NULL,
  `tool_descrip` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `borrow_qty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`id`, `device_date`, `tool_name`, `tool_descrip`, `quantity`, `borrow_qty`) VALUES
(22, '2023-11-29', 'pliers', 'pincers with parallel, flat, and typically serrated surfaces, used chiefly for gripping small objects or bending wire.', 10, 4),
(23, '2023-11-29', 'screwdriver', 'a hand tool for turning a screw, consisting of a handle attached to a long, narrow shank, usually of metal, which tapers and flattens out to a tip that fits into the slotted head of a screw.', 10, 2),
(24, '2023-11-29', 'hammer', 'a tool that has a heavy metal head attached to a handle and that is used for hitting nails or breaking things apart — see picture at carpentry; see also sledgehammer. b : a similar tool made usually of wood and used especially for hitting a surface to make a loud noise. an auctioneer\'s hammer.', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'None',
  `serialnumber` double NOT NULL DEFAULT 0,
  `gender` varchar(10) NOT NULL DEFAULT 'None',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `card_uid` varchar(30) NOT NULL,
  `card_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL,
  `device_uid` varchar(20) NOT NULL DEFAULT '0',
  `device_dep` varchar(20) NOT NULL DEFAULT '0',
  `add_card` tinyint(1) NOT NULL DEFAULT 0,
  `itemhold` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `serialnumber`, `gender`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`, `itemhold`) VALUES
(1, 'CHOY', 0, 'Female', 'None@gmail.com', '20112393', 0, '2023-10-14', '477d95fc98dc5087', '4-2', 1, 'tumbler'),
(4, 'CJ', 4, 'Male', 'None@gmail.com', '144114138', 1, '2023-10-14', '477d95fc98dc5087', '4-2', 1, 'cutter');

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `serialnumber` double NOT NULL,
  `card_uid` varchar(30) NOT NULL,
  `device_uid` varchar(20) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `card_out` tinyint(1) NOT NULL DEFAULT 0,
  `itemhold` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `username`, `serialnumber`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `card_out`, `itemhold`) VALUES
(31, 'ALLEN', 3, '1630248246', '477d95fc98dc5087', '4-2', '2023-10-13', '09:54:40', '10:33:56', 0, 'pliers'),
(32, 'CHOY', 1, '20112393', '477d95fc98dc5087', '4-2', '2023-10-13', '19:31:40', '19:39:06', 1, 'keyboard'),
(33, 'PATRICK', 2, '3140142252', '477d95fc98dc5087', '4-2', '2023-10-13', '19:31:42', '19:39:03', 1, 'cutter'),
(34, 'CJ', 4, '144114138', '477d95fc98dc5087', '4-2', '2023-10-13', '19:31:44', '19:39:10', 1, 'pliers'),
(35, 'CJ', 4, '144114138', '477d95fc98dc5087', '4-2', '2023-10-13', '19:39:29', '00:00:00', 0, 'tumbler'),
(36, 'CJ', 4, '144114138', '477d95fc98dc5087', '4-2', '2023-10-14', '09:54:35', '09:57:48', 1, 'cutter'),
(37, 'ALLEN', 3, '1630248246', '477d95fc98dc5087', '4-2', '2023-10-14', '09:54:40', '10:33:56', 1, 'pliers'),
(38, 'PATRICK', 2, '3140142252', '477d95fc98dc5087', '4-2', '2023-10-14', '09:54:45', '09:55:58', 1, 'cutter'),
(39, 'CHOY', 1, '20112393', '477d95fc98dc5087', '4-2', '2023-10-14', '09:54:47', '09:56:16', 1, 'keyboard'),
(40, 'PATRICK', 2, '3140142252', '477d95fc98dc5087', '4-2', '2023-10-14', '09:56:00', '09:56:21', 1, 'tumbler'),
(41, 'CHOY', 1, '20112393', '477d95fc98dc5087', '4-2', '2023-10-14', '09:56:24', '09:56:29', 1, 'tumbler'),
(42, 'PATRICK', 2, '3140142252', '477d95fc98dc5087', '4-2', '2023-10-14', '09:56:45', '00:00:00', 1, 'keyboard'),
(43, 'CHOY', 1, '20112393', '477d95fc98dc5087', '4-2', '2023-10-14', '09:56:49', '10:33:49', 1, 'keyboard'),
(44, 'CJ', 4, '144114138', '477d95fc98dc5087', '4-2', '2023-10-14', '10:33:44', '00:00:00', 0, 'keyboard'),
(45, 'CHOY', 1, '20112393', '477d95fc98dc5087', '4-2', '2023-10-14', '10:35:18', '15:39:45', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_tools`
--
ALTER TABLE `borrowed_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrowed_tools`
--
ALTER TABLE `borrowed_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
