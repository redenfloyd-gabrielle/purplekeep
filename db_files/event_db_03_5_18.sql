-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 02:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcementID` int(11) NOT NULL,
  `announcementTitle` varchar(255) NOT NULL,
  `announcementDetails` varchar(500) NOT NULL,
  `announcementStatus` enum('OnGoing','Finished') NOT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardId` int(11) NOT NULL,
  `cardCode` varchar(10) NOT NULL,
  `cardAmount` int(11) NOT NULL,
  `cardStatus` tinyint(1) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `cardCreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` enum('active','deleted','','') NOT NULL DEFAULT 'active',
  `checkoutID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkId` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `checkCreatedOn` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `checkTotal` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

CREATE TABLE `event_info` (
  `event_id` int(11) NOT NULL,
  `event_date_start` datetime NOT NULL,
  `event_date_end` datetime NOT NULL,
  `no_tickets_total` int(11) NOT NULL,
  `total_no_addedTickets` int(11) NOT NULL,
  `total_tickets_amtSold` int(11) NOT NULL,
  `event_status` enum('Pending','Approved','Rejected') DEFAULT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_details` text,
  `event_category` enum('Appearance','Attraction','Retreat','Training','Concert','Conference','Convention','Gala','Festival','Competition','Meeting','Party','Rally','Screening','Seminar','Tour','Other') NOT NULL,
  `event_venue` text NOT NULL,
  `event_isActive` tinyint(1) NOT NULL DEFAULT '1',
  `event_picture` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `region_code` enum('NCR','CAR','MIMAROPA','ARMM','Region I','Region II','Region III','Region IV-A','Region V','Region VI','Region VII','Region VIII','Region IX','Region X','Region XI','Region XII','Region XIII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `region_code`) VALUES
(1, 'Caloocan', 'NCR'),
(2, 'Las Piñas', 'NCR'),
(3, 'Makati', 'NCR'),
(4, 'Malabon', 'NCR'),
(5, 'Mandaluyong', 'NCR'),
(6, 'Manila', 'NCR'),
(7, 'Marikina', 'NCR'),
(8, 'Muntinlupa', 'NCR'),
(9, 'Navotas', 'NCR'),
(10, 'Parañaque', 'NCR'),
(11, 'Pasay', 'NCR'),
(12, 'Pasig', 'NCR'),
(13, 'Pateros', 'NCR'),
(14, 'Quezon City', 'NCR'),
(15, 'San Juan', 'NCR'),
(16, 'Taguig', 'NCR'),
(17, 'Valenzuela', 'NCR'),
(18, 'Bohol', 'Region VII'),
(19, 'Cebu', 'Region VII'),
(20, 'Negros Oriental', 'Region VII'),
(21, 'Siquijor', 'Region VII'),
(22, 'Ilocos Norte', 'Region I'),
(23, 'Ilocos Sur', 'Region I'),
(24, 'La Union', 'Region I'),
(25, 'Pangasinan', 'Region I'),
(26, 'Abra', 'CAR'),
(27, 'Apayao', 'CAR'),
(28, 'Benguet', 'CAR'),
(29, 'Ifugao', 'CAR'),
(30, 'Kalinga', 'CAR'),
(31, 'Mountain Province', 'CAR'),
(32, 'Baguio', 'CAR'),
(33, 'Batanes', 'Region II'),
(34, 'Cagayan', 'Region II'),
(35, 'Isabela', 'Region II'),
(36, 'Nueva Vizcaya', 'Region II'),
(37, 'Quirino', 'Region II'),
(38, 'Aurora', 'Region III'),
(39, 'Bataan', 'Region III'),
(40, 'Bulacan', 'Region III'),
(41, 'Nueva Ecija', 'Region III'),
(42, 'Pampanga', 'Region III'),
(43, 'Tarlac', 'Region III'),
(44, 'Zambales', 'Region III'),
(45, 'Angeles', 'Region III'),
(46, 'Olongapo', 'Region III'),
(47, 'Batangas', 'Region IV-A'),
(49, 'Cavite', 'Region IV-A'),
(50, 'Laguna', 'Region IV-A'),
(51, 'Quezon', 'Region IV-A'),
(52, 'Rizal', 'Region IV-A'),
(53, 'Lucena', 'Region IV-A'),
(54, 'Marinduque', 'MIMAROPA'),
(55, 'Occidental Mindoro', 'MIMAROPA'),
(56, 'Oriental Mindoro', 'MIMAROPA'),
(57, 'Palawan', 'MIMAROPA'),
(58, 'Romblon', 'MIMAROPA'),
(59, 'Puerto Princesa', 'MIMAROPA'),
(60, 'Albay', 'Region V'),
(61, 'Camarines Norte', 'Region V'),
(62, 'Camarines Sur', 'Region V'),
(63, 'Catanduanes', 'Region V'),
(64, 'Masbate', 'Region V'),
(65, 'Sorsogon', 'Region V'),
(66, 'Aklan', 'Region VI'),
(67, 'Antique', 'Region VI'),
(68, 'Capiz', 'Region VI'),
(69, 'Guimaras', 'Region VI'),
(70, 'Iloilo', 'Region VI'),
(71, 'Negros Occidental', 'Region VI'),
(72, 'Bacolod City', 'Region VI'),
(73, 'Iloilo City', 'Region VI'),
(74, 'Biliran', 'Region VIII'),
(75, 'Eastern Samar', 'Region VIII'),
(76, 'Leyte', 'Region VIII'),
(77, 'Northern Samar', 'Region VIII'),
(78, 'Samar', 'Region VIII'),
(79, 'Southern Leyte', 'Region VIII'),
(80, 'Tacloban', 'Region VIII'),
(81, 'Zamboanga del Norte', 'Region IX'),
(82, 'Zamboanga del Sur', 'Region IX'),
(83, 'Zamboanga Sibugay', 'Region IX'),
(84, 'Zamboanga City', 'Region IX'),
(85, 'Isabela City', 'Region IX'),
(86, 'Bukidnon', 'Region X'),
(87, 'Camiguin', 'Region X'),
(88, 'Lanao del Norte', 'Region X'),
(89, 'Misamis Occidental', 'Region X'),
(90, 'Misamis Oriental', 'Region X'),
(91, 'Cagayan de Oro', 'Region X'),
(92, 'Iligan', 'Region X'),
(93, 'Compostela Valley', 'Region XI'),
(94, 'Davao del Norte', 'Region XI'),
(95, 'Davao del Sur', 'Region XI'),
(96, 'Davao Occidental', 'Region XI'),
(97, 'Davao Oriental', 'Region XI'),
(98, 'Davao City', 'Region XI'),
(99, 'Cotabato', 'Region XII'),
(100, 'Sarangani', 'Region XII'),
(101, 'South Cotabato', 'Region XII'),
(102, 'Sultan Kudarat', 'Region XII'),
(103, 'Cotabato City', 'Region XII'),
(104, 'General Santos', 'Region XII'),
(105, 'Agusan del Norte', 'Region XIII'),
(106, 'Agusan del Sur', 'Region XIII'),
(107, 'Dinagat Islands', 'Region XIII'),
(108, 'Surigao del Norte', 'Region XIII'),
(109, 'Surigao del Sur', 'Region XIII'),
(110, 'Basilan', 'ARMM'),
(111, 'Lanao del Sur', 'ARMM'),
(112, 'Maguindanao', 'ARMM'),
(113, 'Sulu', 'ARMM'),
(114, 'Tawi-Tawi', 'ARMM');

-- --------------------------------------------------------

--
-- Table structure for table `notification_item`
--

CREATE TABLE `notification_item` (
  `user` int(11) NOT NULL,
  `announcement` int(11) NOT NULL,
  `isViewed` tinyint(1) NOT NULL DEFAULT '0',
  `notifID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `date_sold` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_type_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `ticket_type_id` int(11) NOT NULL,
  `ticket_name` varchar(50) DEFAULT NULL,
  `price` float NOT NULL,
  `ticket_count` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Regular','Admin','Superadmin','') NOT NULL,
  `upgradedBy` int(11) NOT NULL,
  `user_status` enum('Active','Banned','Deleted') NOT NULL DEFAULT 'Active',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `user_imgpath` varchar(260) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `load_amt` float NOT NULL DEFAULT '0',
  `addedBy` int(11) DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `user_name`, `password`, `user_type`, `upgradedBy`, `user_status`, `first_name`, `last_name`, `middle_initial`, `user_imgpath`, `email`, `birthdate`, `gender`, `contact_no`, `load_amt`, `addedBy`, `updatedBy`, `addedAt`, `updatedAt`) VALUES
(1, 'timoteo', '7D6ECC2E16DC040356AE49CFCBE3A36D428E0C64D66C44E95D753EA1CAEF44347A1D4C59AB9942D5531BC60638B429984C0AF27144AF0E9B49446338807CE399', 'Admin', 0, 'Active', 'Timothy', 'Doe', 'J', '', 'timoteo@gmail.com', '1997-08-01', 'Male', '09231569795', 5000, NULL, NULL, '2018-02-21 20:24:28', '2018-02-21 20:24:28'),
(2, 'harvey', '93E3545BCC181B039B5B3AD091A6C30139CE6A85C1615A2ABB9D450491CF8A0DECF7C4D2C9FDFD62FD76EFAE01583A3F6EBF521BC9A02E64BAF663487EC751DA', 'Superadmin', 0, 'Active', 'Harvey', 'Doe', 'K', '', 'harvey@gmail.com', '1996-02-12', 'Male', '09231564848', 4000, NULL, NULL, '2018-02-21 20:26:05', '2018-02-21 20:26:05'),
(3, 'crystal', '9BC35193EE927E4047CE28012E893ED2366852ADEDE6F7699F6D92B4496DEAA5FDE1B90143ACA4BBEE8416D522FB88468E570514BE07139F07F94A8C39A335C1', 'Regular', 0, 'Active', 'Crystal', 'Lovegood', 'G', '', 'crystal@gmail.com', '1996-11-07', 'Male', '09567815989', 141, NULL, NULL, '2018-02-21 20:27:32', '2018-03-05 14:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_event_preference`
--

CREATE TABLE `user_event_preference` (
  `user_event_preference_id` int(11) NOT NULL,
  `preference_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `addedBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `addedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardId`),
  ADD KEY `cardId` (`cardId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkId`);

--
-- Indexes for table `event_info`
--
ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_info_fk` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `notification_item`
--
ALTER TABLE `notification_item`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_fk1` (`user_id`),
  ADD KEY `ticket_fk2` (`ticket_type_id`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`ticket_type_id`),
  ADD KEY `ticket_type_fk1` (`event_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  ADD PRIMARY KEY (`user_event_preference_id`),
  ADD KEY `user_event_preference_fk1` (`user_id`),
  ADD KEY `user_event_preference_fk2` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cardId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_info`
--
ALTER TABLE `event_info`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `notification_item`
--
ALTER TABLE `notification_item`
  MODIFY `notifID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ticket_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_event_preference`
--
ALTER TABLE `user_event_preference`
  MODIFY `user_event_preference_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `user_account` (`account_id`);

--
-- Constraints for table `event_info`
--
ALTER TABLE `event_info`
  ADD CONSTRAINT `event_info_fk` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `event_info_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_fk1` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`account_id`),
  ADD CONSTRAINT `ticket_fk2` FOREIGN KEY (`ticket_type_id`) REFERENCES `ticket_type` (`ticket_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
