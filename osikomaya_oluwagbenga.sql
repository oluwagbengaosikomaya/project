-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 02:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_pass` varchar(255) DEFAULT NULL,
  `admin_user` varchar(100) DEFAULT NULL,
  `Lastloggedindate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`, `admin_user`, `Lastloggedindate`) VALUES
(3, '$2y$10$7LBln8abmsNQjbBeq1bYuO.7J6B646JdiEnj6oaD0Eg5h0U/VJ4UG\r\n', 'delthel', '2024-12-31 11:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(500) NOT NULL,
  `contact_message` varchar(3000) NOT NULL,
  `contact_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_time`) VALUES
(1, 'TIM COOK', 'cook@yahoo.com', 'Attention', 'This is just to notify the organisation.', '2025-01-09 08:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `DonationID` int(11) NOT NULL,
  `DonationAmount` varchar(100) DEFAULT NULL,
  `ProjectID` int(11) NOT NULL,
  `DonationDate` datetime DEFAULT current_timestamp(),
  `DonorID` int(11) NOT NULL,
  `PaymentAmount` varchar(100) DEFAULT NULL,
  `PaymentStatus` varchar(100) DEFAULT NULL,
  `ReferenceNo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorID` int(11) NOT NULL,
  `donor_fname` varchar(100) DEFAULT NULL,
  `donor_lname` varchar(100) DEFAULT NULL,
  `donor_address` varchar(255) DEFAULT NULL,
  `donor_phoneno` varchar(100) DEFAULT NULL,
  `donor_password` varchar(255) DEFAULT NULL,
  `donor_email` varchar(100) DEFAULT NULL,
  `donor_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `Date Registered` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor_amount`
--

CREATE TABLE `donor_amount` (
  `donor_amt_id` int(11) NOT NULL,
  `donor_amt_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_amount`
--

INSERT INTO `donor_amount` (`donor_amt_id`, `donor_amt_amount`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `guest_donor`
--

CREATE TABLE `guest_donor` (
  `guest_id` int(11) NOT NULL,
  `guest_fname` varchar(100) NOT NULL,
  `guest_lname` varchar(100) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_phoneno` varchar(225) NOT NULL,
  `guest_amount` float(10,2) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` enum('pending','failed','completed','') NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guest_donor`
--

INSERT INTO `guest_donor` (`guest_id`, `guest_fname`, `guest_lname`, `guest_email`, `guest_phoneno`, `guest_amount`, `txn_id`, `payment_status`, `created`, `modified`) VALUES
(77, 'kayode', 'samson', 'samson@yahoo.com', '080223', 600.00, '', '', '2024-12-31 07:02:21', '2024-12-31 07:02:21'),
(78, 'kayode', 'samson', 'samson@yahoo.com', '080223', 600.00, '', '', '2024-12-31 07:03:41', '2024-12-31 07:03:41'),
(79, 'wole', 'samuel', 'wale@yahoo.com', '08976', 909.00, '', '', '2024-12-31 07:19:59', '2024-12-31 07:19:59'),
(89, 'kayode', 'samson', 'mark@yahoo.com', '12345678', 9000.00, '', '', '2025-02-09 14:07:19', '2025-02-09 14:07:19'),
(90, 'simisola', 'opeyemi', 'simisola@gmail.com', '09093103031', 50000.00, '', '', '2025-02-09 16:33:30', '2025-02-09 16:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `news_id` int(11) NOT NULL,
  `news_fname` varchar(255) NOT NULL,
  `news_lname` varchar(255) NOT NULL,
  `news_email` varchar(255) NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`news_id`, `news_fname`, `news_lname`, `news_email`, `news_date`) VALUES
(1, 'gbenga', 'samson', 'gh@yahoo.com', '2025-01-06 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) NOT NULL,
  `payment_amount_paid` decimal(10,2) NOT NULL,
  `payment_donorId` int(11) NOT NULL,
  `payment_refno` varchar(255) NOT NULL,
  `payment_status` enum('pending','failed','completed','','') NOT NULL DEFAULT 'pending',
  `payment_recordaddedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `payment_method`, `payment_amount_paid`, `payment_donorId`, `payment_refno`, `payment_status`, `payment_recordaddedOn`) VALUES
(20, '2025-02-09 14:11:40', 'card', 1000.00, 10, '17391103001854341338', 'completed', '2025-02-09 14:11:40'),
(21, '2025-02-10 11:27:15', 'card', 1000.00, 11, '1739186835911000261', 'completed', '2025-02-10 11:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `payment1`
--

CREATE TABLE `payment1` (
  `payment1_id` int(11) NOT NULL,
  `payment1_date` datetime NOT NULL DEFAULT current_timestamp(),
  `paymen1_method` varchar(50) NOT NULL,
  `payment1_amount_paid` decimal(10,2) NOT NULL,
  `payment1_guest_id` int(11) NOT NULL,
  `payment1_guest_email` varchar(255) NOT NULL,
  `payment1_refno` varchar(255) NOT NULL,
  `payment1_status` enum('pending','failed','completed','') NOT NULL,
  `payment1_recordaddedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment1`
--

INSERT INTO `payment1` (`payment1_id`, `payment1_date`, `paymen1_method`, `payment1_amount_paid`, `payment1_guest_id`, `payment1_guest_email`, `payment1_refno`, `payment1_status`, `payment1_recordaddedOn`) VALUES
(11, '2025-02-09 14:07:19', 'card', 9000.00, 0, 'mark@yahoo.com', '17391100391367816247', 'completed', '2025-02-09 14:07:19'),
(12, '2025-02-09 16:33:30', 'card', 50000.00, 0, 'simisola@gmail.com', '1739118810778641441', 'completed', '2025-02-09 16:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_author` text NOT NULL,
  `post_description` text NOT NULL,
  `post_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ProjectID` int(11) NOT NULL,
  `ProjectName` varchar(100) DEFAULT NULL,
  `ProjectCoverPicture` varchar(100) DEFAULT NULL,
  `ProjectDescription` varchar(100) DEFAULT NULL,
  `ProjectAmount` varchar(100) DEFAULT NULL,
  `ProjectDateAdded` datetime DEFAULT current_timestamp(),
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`DonationID`,`ProjectID`,`DonorID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DonorID`);

--
-- Indexes for table `donor_amount`
--
ALTER TABLE `donor_amount`
  ADD PRIMARY KEY (`donor_amt_id`);

--
-- Indexes for table `guest_donor`
--
ALTER TABLE `guest_donor`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_donorId` (`payment_donorId`);

--
-- Indexes for table `payment1`
--
ALTER TABLE `payment1`
  ADD PRIMARY KEY (`payment1_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ProjectID`,`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `DonationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `DonorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donor_amount`
--
ALTER TABLE `donor_amount`
  MODIFY `donor_amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_donor`
--
ALTER TABLE `guest_donor`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment1`
--
ALTER TABLE `payment1`
  MODIFY `payment1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category` FOREIGN KEY (`CategoryID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `Donations` FOREIGN KEY (`DonationID`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `Project` FOREIGN KEY (`ProjectID`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
