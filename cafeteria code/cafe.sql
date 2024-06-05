-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 06:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `Ccardnumber` varchar(200) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `balanceStatus` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `Ccardnumber`, `balance`, `balanceStatus`, `created_at`) VALUES
(19, '5851207128', '24000', 1, '2023-07-21 10:43:58'),
(21, '991058862', '328000', 1, '2023-07-21 10:51:02'),
(22, '37136211101', '170000', 1, '2023-07-21 16:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `balance_recharge`
--

CREATE TABLE `balance_recharge` (
  `id` int(11) NOT NULL,
  `rechargeid` int(11) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance_recharge`
--

INSERT INTO `balance_recharge` (`id`, `rechargeid`, `balance`, `created_at`) VALUES
(74, 19, '20000', '2023-07-21 10:43:58'),
(76, 21, '300000', '2023-07-21 10:51:02'),
(77, 21, '5000', '2023-07-21 10:54:08'),
(79, 22, '50000', '2023-07-21 16:57:00'),
(80, 22, '150000', '2023-07-26 19:02:02'),
(81, 21, '2000', '2023-07-27 17:38:40'),
(82, 21, '20000', '2023-07-27 19:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `billingowner`
--

CREATE TABLE `billingowner` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `SecondName` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `usertype` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `createdAt` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `updatedAT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cafereriaowner`
--

CREATE TABLE `cafereriaowner` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `SecondName` varchar(200) NOT NULL,
  `Lastname` varchar(200) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `college` varchar(150) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 0,
  `cafeteria` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `createdAt` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `updatedAT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafereriaowner`
--

INSERT INTO `cafereriaowner` (`id`, `FirstName`, `SecondName`, `Lastname`, `Phonenumber`, `email`, `address`, `college`, `usertype`, `cafeteria`, `password`, `createdAt`, `updatedAT`) VALUES
(1, 'innocent', 'samwel', 'mahenge', '255625634681', 'innovic19@gmail.com', 'MUST', '1', 0, 'IKUTI', 'MAMA BONGE', '2024-05-19 02:43:03', ''),
(2, 'samwel', 'maharage', 'ndugu', '255762345612', 'sam@gmail.com', 'MUST', '2', 0, 'cafeteria 1', '1234', '2024-05-19 18:01:53', ''),
(3, 'agness', 'richard', 'mihayo', '255745672134', 'agness@gmail.com', '', '1', 1, '1', '1234', '2024-05-19 17:20:21', ''),
(4, 'yolanda', 'omary', 'bakari', '25567897261', 'yolanda@gmail.com', '', '1', 1, '1', '1234', '2024-05-19 17:33:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardNumber` varchar(200) NOT NULL,
  `card_status` int(11) NOT NULL DEFAULT 0,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardNumber`, `card_status`, `createdAt`) VALUES
('16595210101', 0, 'current_timestamp()'),
('37136211101', 0, '2024-05-19 16:50:55'),
('5851207128', 1, '2024-05-19 10:36:43'),
('991058862', 1, '2024-05-19 10:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cardNumber` varchar(200) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `MiddleName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `card_status` int(11) NOT NULL,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `updatedAt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cardNumber`, `FirstName`, `MiddleName`, `lastName`, `gender`, `phoneNumber`, `password`, `card_status`, `createdAt`, `updatedAt`) VALUES
('991058862', 'agness', 'richard', 'mihayo', 'female', '0735222759', '123', 1, '2024-05-19 10:40:37', ''),
('37136211101', 'innocent', 'samwel', 'mahenge', 'male', '0746672710', '123', 1, '2024-05-19 19:01:31', ''),
('5851207128', 'yolanda', 'omary', 'bakari', 'female', '0766942256', '123', 1, '2024-05-19 10:43:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `deletedmenu`
--

CREATE TABLE `deletedmenu` (
  `id` int(11) NOT NULL,
  `fromMenuId` int(11) NOT NULL,
  `deletedFoodId` int(11) NOT NULL,
  `deletestatus` int(11) NOT NULL,
  `deletedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deletedBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deletedmenu`
--

INSERT INTO `deletedmenu` (`id`, `fromMenuId`, `deletedFoodId`, `deletestatus`, `deletedAt`, `deletedBY`) VALUES
(24, 14, 22, 0, '2024-05-19 15:08:07', 3),
(25, 15, 24, 0, '2024-05-19 15:08:07', 3),
(26, 16, 27, 1, '2024-05-19 15:09:34', 3),
(27, 17, 28, 1, '2024-05-19 15:08:59', 3),
(28, 18, 28, 1, '2024-05-19 15:11:06', 3),
(29, 19, 29, 0, '2024-05-19 15:14:02', 3),
(30, 20, 24, 0, '2024-05-19 15:14:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodId` int(11) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `updatedAt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodId`, `foodname`, `amount`, `createdAt`, `updatedAt`) VALUES
(22, 'Wali Kuku', 2500, '2024-05-19 01:17:46', ''),
(24, 'wali nyama', 2000, '2024-05-19 01:18:21', ''),
(27, 'wali makange', 2500, '2024-05-08 00:01:38', ''),
(28, 'chips mayai', 2500, '2024-05-19 12:35:54', ''),
(29, 'ugali mayai', 1500, '2024-05-19 10:34:22', ''),
(30, 'ugali mishikaki', 1500, '2024-05-19 10:34:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `foodreport`
--

CREATE TABLE `foodreport` (
  `id` int(11) NOT NULL,
  `foodReportId` int(11) NOT NULL,
  `cardnumber` varchar(200) NOT NULL,
  `ticket` char(2) NOT NULL,
  `ticket_status` int(11) NOT NULL DEFAULT 0,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodreport`
--

INSERT INTO `foodreport` (`id`, `foodReportId`, `cardnumber`, `ticket`, `ticket_status`, `createdAt`) VALUES
(650, 29, '991058862', 'PR', 1, '2024-05-19 14:06:29'),
(656, 22, '5851207128', 'RT', 1, '2024-05-19 14:17:11'),
(658, 22, '5851207128', 'BE', 1, '2024-05-19 14:19:05'),
(660, 22, '5851207128', 'QR', 1, '2024-05-19 14:20:58'),
(663, 22, '5851207128', 'OG', 1, '2024-05-19 14:23:27'),
(666, 22, '991058862', 'MD', 1, '2024-05-19 15:14:51'),
(668, 29, '991058862', 'IT', 1, '2024-05-19 17:45:58'),
(669, 22, '37136211101', 'BQ', 1, '2024-05-19 17:50:14'),
(671, 22, '991058862', 'XW', 1, '2024-05-19 8:53:14'),
(673, 29, '991058862', 'NE', 1, '2024-05-19 18:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `menufood`
--

CREATE TABLE `menufood` (
  `menuid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `createdBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menufood`
--

INSERT INTO `menufood` (`menuid`, `id`, `status`, `created_at`, `createdBY`) VALUES
(14, 22, 2, '2023-07-26 18:08:07', 3),
(15, 24, 2, '2023-07-26 18:08:07', 3),
(16, 27, 1, '2023-07-26 18:08:08', 3),
(17, 28, 1, '2023-07-26 18:08:08', 3),
(18, 28, 1, '2023-07-26 18:10:16', 3),
(19, 29, 2, '2023-07-26 18:14:02', 3),
(20, 24, 2, '2023-07-26 18:14:14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `scanneddata`
--

CREATE TABLE `scanneddata` (
  `id` int(11) NOT NULL,
  `Usercardnumber` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporaryfood`
--

CREATE TABLE `temporaryfood` (
  `id` int(11) NOT NULL,
  `foodId` int(11) NOT NULL,
  `cardnumber` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unservedorder`
--

CREATE TABLE `unservedorder` (
  `number` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `food` varchar(100) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `ticket` char(2) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `orderCreatedAt` varchar(150) NOT NULL,
  `deletedAt` varchar(150) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unservedorder`
--

INSERT INTO `unservedorder` (`number`, `id`, `food`, `cardnumber`, `ticket`, `comment`, `orderCreatedAt`, `deletedAt`) VALUES
(12, 612, 'wali makange', 2147483647, 'JR', 'balance returned and order deleted', '2023-07-21 14:07:03', '2023-07-21 14:09:36'),
(13, 611, 'Wali Kuku', 991058862, 'XT', 'balance returned and order deleted', '2023-07-21 14:06:37', '2023-07-21 14:15:22'),
(14, 613, 'wali nyama', 991058862, 'GV', 'balance returned and order deleted', '2023-07-21 14:18:59', '2023-07-21 14:20:19'),
(15, 614, 'wali nyama', 991058862, 'XI', 'balance returned and order deleted', '2023-07-21 14:19:33', '2023-07-21 14:20:20'),
(16, 617, 'Wali Kuku', 2147483647, 'IN', 'balance returned and order deleted', '2023-07-21 14:24:50', '2023-07-21 14:26:33'),
(17, 618, 'Wali Kuku', 2147483647, 'TF', 'balance returned and order deleted', '2023-07-21 14:25:34', '2023-07-21 14:26:34'),
(18, 615, 'Wali Kuku', 991058862, 'UE', 'balance returned and order deleted', '2023-07-21 14:23:18', '2023-07-21 14:26:34'),
(19, 616, 'wali makange', 991058862, 'NQ', 'balance returned and order deleted', '2023-07-21 14:23:45', '2023-07-21 14:26:34'),
(20, 620, 'Wali Kuku', 2147483647, 'EJ', 'balance returned and order deleted', '2023-07-21 15:09:54', '2023-07-21 16:01:27'),
(21, 619, 'Wali Kuku', 991058862, 'EE', 'balance returned and order deleted', '2023-07-21 15:09:42', '2023-07-21 16:01:28'),
(22, 625, 'wali nyama', 2147483647, 'YV', 'balance returned and order deleted', '2023-07-21 16:05:36', '2023-07-21 16:08:20'),
(23, 622, 'Wali Kuku', 991058862, 'RD', 'balance returned and order deleted', '2023-07-21 16:04:34', '2023-07-21 16:08:23'),
(24, 623, 'Wali Kuku', 991058862, 'IL', 'balance returned and order deleted', '2023-07-21 16:04:57', '2023-07-21 16:08:23'),
(25, 624, 'wali makange', 991058862, 'BR', 'balance returned and order deleted', '2023-07-21 16:05:10', '2023-07-21 16:08:23'),
(26, 632, 'ugali mayai', 2147483647, 'UF', 'balance returned and order deleted', '2023-07-21 17:03:31', '2023-07-26 18:45:20'),
(27, 631, 'wali makange', 991058862, 'QV', 'balance returned and order deleted', '2023-07-21 17:03:15', '2023-07-26 18:45:21'),
(28, 642, 'Wali Kuku', 991058862, 'UI', 'balance returned and order deleted', '2023-07-26 18:33:55', '2023-07-26 18:45:21'),
(29, 629, 'wali nyama', 2147483647, 'JQ', 'balance returned and order deleted', '2023-07-21 17:00:50', '2023-07-26 18:45:21'),
(30, 645, 'Wali Kuku', 2147483647, 'BD', 'balance returned and order deleted', '2023-07-26 19:06:09', '2023-07-27 13:16:54'),
(31, 647, 'ugali mayai', 2147483647, 'XA', 'balance returned and order deleted', '2023-07-26 19:06:48', '2023-07-27 13:16:54'),
(32, 649, 'wali nyama', 991058862, 'JI', 'balance returned and order deleted', '2023-07-27 13:48:29', '2023-07-27 13:51:33'),
(33, 651, 'wali nyama', 991058862, 'VQ', 'balance returned and order deleted', '2023-07-27 14:08:07', '2023-07-27 14:08:12'),
(34, 653, 'Wali Kuku', 2147483647, 'FM', 'balance returned and order deleted', '2023-07-27 14:13:06', '2023-07-27 14:14:19'),
(35, 652, 'Wali Kuku', 991058862, 'RG', 'balance returned and order deleted', '2023-07-27 14:12:34', '2023-07-27 14:14:19'),
(36, 655, 'Wali Kuku', 2147483647, 'VT', 'balance returned and order deleted', '2023-07-27 14:16:47', '2023-07-27 14:17:25'),
(37, 655, 'Wali Kuku', 2147483647, 'VT', 'balance returned and order deleted', '2023-07-27 14:16:47', '2023-07-27 14:18:08'),
(38, 655, 'Wali Kuku', 2147483647, 'VT', 'balance returned and order deleted', '2023-07-27 14:16:47', '2023-07-27 14:18:29'),
(39, 657, 'Wali Kuku', 2147483647, 'SB', 'balance returned and order deleted', '2023-07-27 14:18:50', '2023-07-27 14:19:37'),
(40, 659, 'Wali Kuku', 2147483647, 'ZD', 'balance returned and order deleted', '2023-07-27 14:20:40', '2023-07-27 14:21:19'),
(41, 661, 'Wali Kuku', 2147483647, 'HI', 'balance returned and order deleted', '2023-07-27 14:22:05', '2023-07-27 14:22:53'),
(42, 662, 'Wali Kuku', 2147483647, 'EJ', 'balance returned and order deleted', '2023-07-27 14:22:43', '2023-07-27 14:22:54'),
(43, 664, 'Wali Kuku', 2147483647, 'IW', 'balance returned and order deleted', '2023-07-27 14:23:41', '2023-07-27 14:24:23'),
(44, 665, 'Wali Kuku', 2147483647, 'UN', 'balance returned and order deleted', '2023-07-27 14:23:56', '2023-07-27 14:24:23'),
(45, 667, 'Wali Kuku', 991058862, 'TX', 'balance returned and order deleted', '2023-07-27 16:37:04', '2023-07-27 18:46:36'),
(46, 670, 'wali nyama', 2147483647, 'WE', 'balance returned and order deleted', '2023-07-27 17:50:30', '2023-07-27 18:46:40'),
(47, 672, 'wali nyama', 991058862, 'WE', 'balance returned and order deleted', '2023-07-27 18:53:30', '2023-07-27 18:57:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ccardnumber` (`Ccardnumber`);

--
-- Indexes for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balancekey` (`rechargeid`);

--
-- Indexes for table `billingowner`
--
ALTER TABLE `billingowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafereriaowner`
--
ALTER TABLE `cafereriaowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardNumber`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`phoneNumber`),
  ADD UNIQUE KEY `cardNumber` (`cardNumber`,`phoneNumber`);

--
-- Indexes for table `deletedmenu`
--
ALTER TABLE `deletedmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deletedFoodId` (`deletedFoodId`),
  ADD KEY `deletedby` (`deletedBY`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`),
  ADD UNIQUE KEY `foodname` (`foodname`);

--
-- Indexes for table `foodreport`
--
ALTER TABLE `foodreport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodkey` (`foodReportId`),
  ADD KEY `foodreport_ibfk_1` (`cardnumber`);

--
-- Indexes for table `menufood`
--
ALTER TABLE `menufood`
  ADD PRIMARY KEY (`menuid`),
  ADD UNIQUE KEY `id_status` (`id`,`status`,`menuid`),
  ADD KEY `createdBY` (`createdBY`);

--
-- Indexes for table `scanneddata`
--
ALTER TABLE `scanneddata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporaryfood`
--
ALTER TABLE `temporaryfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unservedorder`
--
ALTER TABLE `unservedorder`
  ADD PRIMARY KEY (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `billingowner`
--
ALTER TABLE `billingowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cafereriaowner`
--
ALTER TABLE `cafereriaowner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deletedmenu`
--
ALTER TABLE `deletedmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `foodreport`
--
ALTER TABLE `foodreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674;

--
-- AUTO_INCREMENT for table `menufood`
--
ALTER TABLE `menufood`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `scanneddata`
--
ALTER TABLE `scanneddata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temporaryfood`
--
ALTER TABLE `temporaryfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unservedorder`
--
ALTER TABLE `unservedorder`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`Ccardnumber`) REFERENCES `card` (`cardNumber`) ON DELETE CASCADE;

--
-- Constraints for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  ADD CONSTRAINT `balancekey` FOREIGN KEY (`rechargeid`) REFERENCES `balance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customerkey` FOREIGN KEY (`cardNumber`) REFERENCES `card` (`cardNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deletedmenu`
--
ALTER TABLE `deletedmenu`
  ADD CONSTRAINT `deletedby` FOREIGN KEY (`deletedBY`) REFERENCES `cafereriaowner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deletedmenu_ibfk_1` FOREIGN KEY (`deletedFoodId`) REFERENCES `food` (`foodId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foodreport`
--
ALTER TABLE `foodreport`
  ADD CONSTRAINT `foodkey` FOREIGN KEY (`foodReportId`) REFERENCES `food` (`foodId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foodreport_ibfk_1` FOREIGN KEY (`cardnumber`) REFERENCES `card` (`cardNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menufood`
--
ALTER TABLE `menufood`
  ADD CONSTRAINT `menufood_ibfk_1` FOREIGN KEY (`id`) REFERENCES `food` (`foodId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menufood_ibfk_2` FOREIGN KEY (`createdBY`) REFERENCES `cafereriaowner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
