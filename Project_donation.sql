-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 09:10 AM
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
(3, '$2y$10$KHPZwAjbXIPb/WdKPG28n.Nd0FeIiVyo1EeuyM8ZcFPTLktsd5n9G', 'delthel', '2024-12-31 11:59:53'),
(5, '$2y$10$paRtqVFkKjXU1WOwj2ptcee8miLjasXa/RIUiYq0IbtopMHJjmrk.', 'moat', '2025-03-21 13:41:42');

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

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorID`, `donor_fname`, `donor_lname`, `donor_address`, `donor_phoneno`, `donor_password`, `donor_email`, `donor_status`, `Date Registered`) VALUES
(17, 'samson', 'kayode', NULL, '07055108000', '$2y$10$arsSlOLg6wgUVNjw23mWLu24fbBDQzq2GhRAmMOWemyqDne/d5vE6', 'samson@yahoo.com', 'Active', '2025-04-02 11:19:44');

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
(26, '2025-04-02 11:20:02', 'card', 1000.00, 17, '1743589202924483228', 'pending', '2025-04-02 10:20:02');

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
  `ProjectName` varchar(225) DEFAULT NULL,
  `ProjectCoverPicture` varchar(1000) DEFAULT NULL,
  `ProjectDescription` mediumtext DEFAULT NULL,
  `ProjectAmount` varchar(100) DEFAULT NULL,
  `ProjectLocation` varchar(225) DEFAULT NULL,
  `ProjectManager` varchar(225) DEFAULT NULL,
  `ProjectDateAdded` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`ProjectID`, `ProjectName`, `ProjectCoverPicture`, `ProjectDescription`, `ProjectAmount`, `ProjectLocation`, `ProjectManager`, `ProjectDateAdded`) VALUES
(6, 'Give Food &amp; Bread to 2500 Families in Nigeria', '67ee2fb532a05.jpg', 'Summary\r\nThis project aims to provide essential relief services, including bread distribution on a daily basis and monthly food baskets, to approximately 2,500 families living in refugee camps along the Nigerian border. As families begin to gradually return to their villages and towns to rebuild their destroyed homes and start anew, others remain in the camps due to dire financial conditions. This project seeks to support both groups during this transitional phase.\r\n\r\nChallenge\r\nAfter years of displacement and suffering, many families in Nigeria have started returning to their homes following the end of oppressive rule. However, these families face enormous challenges, including rebuilding their homes, securing livelihoods, and meeting basic needs such as food. Meanwhile, families still living in camps due to financial difficulties continue to endure harsh conditions with limited access to essentials like bread, the primary source of food for most households.\r\n\r\nSolution\r\nThrough your generous donations, we will continue to provide daily bread to the most vulnerable families, ensuring they have access to this essential staple. Monthly food baskets will also be distributed to support both returning families and those who remain in camps. Each basket contains essential items such as rice, sugar, tomato paste, tea, oil, vegetable ghee, bulgur, and pasta, providing balanced nutrition to help families regain strength and stability during this transitional period.\r\n\r\nLong-Term Impact\r\nThis project will provide much-needed support to families as they rebuild their lives and homes after years of conflict and displacement. For those returning, it offers a lifeline during the challenging process of resettlement and reconstruction. For those remaining in camps, it ensures they receive basic nutrition and stability as they plan their next steps. Your donation, no matter the size, will play a vital role in creating a brighter, more hopeful future for Nigerian families.', '750,000', 'Northern Kaduna', 'Sanusi Bellow', '2025-04-03 06:50:29.208754'),
(7, 'Empower a Girl: For Self-Reliance', '67ee311a15360.jpg', 'Summary\r\nFrom 2016, Kole Intellectual Forum (KIFA) conducted an action research in Kole District Local Government of Uganda; and established that, children in the public primary schools in this area are performing poorly because of a number of weaknesses; however, inventions were made; the research revealed that: the major problem is being generated from the home of almost each and every child with the girl child most affected. KIFA intends to empower a girl child through Home Economics.\r\n\r\nChallenge\r\nAfter KIFA conducting action research in this area from 2016 to date; particularly, the poor performing public primary schools; their performance improved greatly; however, when the project team made a follow-up on them (pupils), the outcome revealed that: a greater percentage of them, to about 80% failed to go to the next level of a education because of the inability of their families to provide them with necessary school requirements.\r\n\r\nSolution\r\nThis project therefore intends to address this problem by empowering a girl child for self-reliance with the knowledge of Home Economics. Unlike the traditional lives of those had been in this area before, the aim of the project is to equip or skill these girls with this knowledge so that, they can be able to produce stable homes those are economically viable with the capacities to address education problems of their children and beyond.\r\n\r\n\r\nLong-Term Impact\r\nIn the long ran, if these girls out of schools in this area are empowered, with the knowledge of Home Economics; they will definitely produce economically viable homes that will benefit their society and at the same time be able to provide for their children the basic school requirements needed for their education; hence, leading to the improvement of their quality, sustainable and potential education.', '500000', 'Allen Ikeja', 'Kole Intellectual Forum', '2025-04-03 06:56:26.088812'),
(8, 'Lifeskills for 2,587 Children in SouthAfrica', '67ee325044125.jpg', 'Summary\r\nJoin Keep The Dream196 in changing 2,587 South African orphaned and vulnerable children&#039;s lives. The kids aged 5-26yrs, changing families, villages and eventually the country, by transferring life skills and infusing hope, we are impacting and building South Africa today. The children learn and apply for example: integrity, honesty &amp; self leadership in practical everyday situations. &quot;Turning 18 all I had to look forward to was learning to smoke and dying of AIDS, now I have hope&quot;- says Ronny.\r\n\r\nChallenge\r\nCrime, teenage pregnancy, poverty, HIV, unemployment and hopelessness are the main challenges confronting children in Greater Tzaneen. We work with 87 volunteers in 78 villages helping children to build resilience to over come often horrendous life situations and build on those success&#039;s so that the children will have the emotional, physical and spiritual strength to enter adulthood as leaders helping others to achieve their dreams.\r\n\r\nSolution\r\nWe use the Scouts model of cascade training and peer support to empower the children to make wise decisions about their lives from a value&#039;s based perspective. We have a code of conduct which the children agree to in order to participate in the project. The children then are involved in many different activities which are age and skills appropriate as they develop as young leaders. A feature of our project is that each group must be involved in a community project to give back to their village.\r\n\r\nLong-Term Impact\r\nIn 18 yrs we have worked with an excess of 15,000 children. - Teenage pregnancy has reduced from 13%provincially to 0.07% amongst our program. - Matric Pass rate of 91% governments pass rate is 62% - We have already produced doctors, lawyers, social workers, physio&#039;s, occupational therapists, teachers, nurses, mechanics, fitters, electricians etc The children have hope for a future and the skills to realize their dreams. We are changing South Africa - one child at a time!', '1,500,000', 'South Africa Embassy', 'Keep The Dream196', '2025-04-03 07:01:36.280342');

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
  ADD PRIMARY KEY (`ProjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `DonorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `donor_amount`
--
ALTER TABLE `donor_amount`
  MODIFY `donor_amt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_donor`
--
ALTER TABLE `guest_donor`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment1`
--
ALTER TABLE `payment1`
  MODIFY `payment1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `ProjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `Donations` FOREIGN KEY (`DonationID`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
