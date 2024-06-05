-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 02:25 PM
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
(10, '991058862', '385800', 1, '2023-06-17 11:28:16'),
(15, '5851207128', '28200', 1, '2023-06-23 01:13:21'),
(16, '16595210101', '100000', 1, '2023-06-23 04:29:47'),
(17, '37136211101', '197500', 1, '2023-06-24 00:42:42');

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
(22, 10, '60000', '2023-06-17 11:28:16'),
(23, 10, '60000', '2023-06-17 11:28:20'),
(24, 10, '60000', '2023-06-17 11:28:22'),
(25, 10, '60000', '2023-06-17 11:28:51'),
(26, 10, '60000', '2023-06-17 11:31:13'),
(29, 10, '2000', '2023-06-17 21:41:54'),
(30, 10, '1000', '2023-06-17 21:48:30'),
(31, 10, '1000', '2023-06-17 21:49:59'),
(32, 10, '2000', '2023-06-17 21:52:48'),
(33, 10, '1000', '2023-06-17 22:24:45'),
(34, 10, '1000', '2023-06-17 22:53:47'),
(35, 10, '1000', '2023-06-17 22:59:03'),
(36, 10, '1000', '2023-06-17 23:00:07'),
(37, 10, '1000', '2023-06-17 23:05:09'),
(38, 10, '1000', '2023-06-17 23:06:38'),
(39, 10, '2000', '2023-06-17 23:08:25'),
(40, 10, '20000', '2023-06-17 23:11:31'),
(44, 10, '1000', '2023-06-18 16:23:23'),
(45, 10, '1000', '2023-06-18 17:38:15'),
(46, 10, '5000', '2023-06-18 17:44:02'),
(47, 10, '2000', '2023-06-18 17:46:56'),
(54, 10, '100000', '2023-06-19 09:47:57'),
(62, 15, '30000', '2023-06-23 01:13:21'),
(63, 10, '10000', '2023-06-23 02:38:54'),
(64, 16, '100000', '2023-06-23 04:29:49'),
(65, 17, '200000', '2023-06-24 00:42:42'),
(66, 10, '20000', '2023-06-24 18:10:07'),
(67, 10, '2000', '2023-06-27 15:18:20'),
(68, 10, '5000', '2023-06-27 15:21:13');

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
(1, 'alvin', 'john', 'maganga', '255766942299', 'mdachibin@gmail.com', 'udom', '1', 0, 'center plaza', 'MAGANGA', '2023-05-04 02:43:03', ''),
(2, 'justin', 'mahole', 'mahole', '255766942289', 'anjuma@gmail.com', 'udom', '2', 0, 'cafeteria 1', '1234', '2023-05-04 18:01:53', ''),
(3, 'john', 'masawe', 'anthony', '255766544555', 'jonjuma@gmail.com', '', '1', 1, '1', '1234', '2023-05-06 17:20:21', ''),
(4, 'Mary', 'john', 'James', '0778724078', 'asha@gmail.com', '', '1', 1, '1', '1234', '2023-05-07 17:33:03', '');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardNumber` varchar(200) NOT NULL,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardNumber`, `createdAt`) VALUES
('16595210101', '2023-06-23 04:07:03'),
('37136211101', '2023-06-24 00:29:10'),
('5851207128', '2023-06-23 01:04:48'),
('991058862', '2023-06-22 22:35:01');

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
('5851207128', 'moza', 'baut', 'khamisi', 'female', '0672186750', '222', 1, '2023-06-23 01:09:09', ''),
('16595210101', 'fereji', 'hamis', 'hamis', 'male', '0673299948', '1236', 1, '2023-06-23 04:21:30', ''),
('37136211101', 'elly', 'alfred', 'thadeo', 'male', '0676016085', '123', 1, '2023-06-24 00:40:55', ''),
('991058862', 'rehema', 'ally', 'Omary', 'male', '0766942256', '123', 1, '2023-06-17 14:10:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `deletedmenu`
--

CREATE TABLE `deletedmenu` (
  `id` int(11) NOT NULL,
  `deletedFoodId` int(11) NOT NULL,
  `deletedAt` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `deletedBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deletedmenu`
--

INSERT INTO `deletedmenu` (`id`, `deletedFoodId`, `deletedAt`, `deletedBY`) VALUES
(46, 23, '2023-06-23 01:20:57', 2),
(47, 22, '2023-06-24 00:59:54', 2),
(48, 25, '2023-06-24 01:00:07', 2);

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
(22, 'Wali Kuku', 2500, '2023-06-23 01:17:46', ''),
(23, 'supu', 1500, '2023-06-23 01:18:02', ''),
(24, 'wali nyama', 2000, '2023-06-23 01:18:21', ''),
(25, 'mandazi', 500, '2023-06-23 01:18:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `foodreport`
--

CREATE TABLE `foodreport` (
  `id` int(11) NOT NULL,
  `foodReportId` int(11) NOT NULL,
  `cardnumber` varchar(200) NOT NULL,
  `createdAt` varchar(200) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodreport`
--

INSERT INTO `foodreport` (`id`, `foodReportId`, `cardnumber`, `createdAt`) VALUES
(337, 25, '991058862', '2023-06-23 01:23:11'),
(338, 22, '991058862', '2023-06-23 01:23:33'),
(341, 24, '991058862', '2023-06-24 18:00:53'),
(342, 24, '991058862', '2023-06-27 15:17:44'),
(343, 24, '991058862', '2023-06-27 15:23:37'),
(344, 23, '991058862', '2023-06-27 15:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `menufood`
--

CREATE TABLE `menufood` (
  `id` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT current_timestamp(),
  `createdBY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menufood`
--

INSERT INTO `menufood` (`id`, `created_at`, `createdBY`) VALUES
(23, '2023-06-27 15:17:17', 3),
(24, '2023-06-23 01:19:47', 2),
(25, '2023-06-27 15:17:17', 3);

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
  ADD UNIQUE KEY `id` (`id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `balance_recharge`
--
ALTER TABLE `balance_recharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `foodreport`
--
ALTER TABLE `foodreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `scanneddata`
--
ALTER TABLE `scanneddata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `temporaryfood`
--
ALTER TABLE `temporaryfood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
