-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 09:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `sex` varchar(25) NOT NULL,
  `dob` date DEFAULT NULL,
  `constituency_id` int(20) NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `sex`, `dob`, `constituency_id`, `avatar`, `date_created`) VALUES
(18, 'Racheal', '', 'Mweemba', 'rachealmweemba950@gmail.com', 'bb7d75881ccfd60b21d1046441f42cc6', 'FEMALE', '1998-08-30', 8, 'no-image-available.png', '2023-09-11 12:39:55'),
(21, 'Albertina', '', 'Mwale', 'albertinamwale@gmail.com', '94133c84e5bff4e882e0914f3665a6b0', 'FEMALE', '2004-05-24', 8, 'no-image-available.png', '2023-09-18 09:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `email_id` int(20) NOT NULL,
  `staff_id` int(20) NOT NULL,
  `app_type` varchar(20) NOT NULL,
  `amount` text NOT NULL,
  `district_id` int(20) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `zone` varchar(100) NOT NULL,
  `constituency_id` int(20) NOT NULL,
  `phy_address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `feedback` text NOT NULL,
  `decision` text NOT NULL,
  `loan_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=Cleared, 0=Not Cleared',
  `club_reg_date` date DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `email_id`, `staff_id`, `app_type`, `amount`, `district_id`, `ward`, `zone`, `constituency_id`, `phy_address`, `phone`, `feedback`, `decision`, `loan_status`, `club_reg_date`, `date_created`) VALUES
(30, 5, 0, 0, 'Grant', '20000', 1, 'jack', 'Zone-2', 12, 'Jack Compound', '777488735', 'Cleared                                                                ', 'Yes', 1, '2020-11-08', '2023-11-11 09:48:20'),
(31, 15, 0, 0, 'Loan', '3000', 2, 'jack', 'Zone-10', 8, 'Kabwata', '', 'undertook the same previously   ', 'Yes', 1, '2022-07-12', '2023-11-12 17:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) NOT NULL,
  `bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`) VALUES
(1, 'ZANACO'),
(2, 'Bank ABC'),
(3, 'Stanbic Bank'),
(4, 'Investrust Bank'),
(5, 'Atrasmara Bank'),
(6, 'Indo Zambia Bank'),
(7, 'UBA'),
(8, 'Pan African Bank'),
(9, 'ZNBS');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `decision` text NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `bank_id` int(20) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `swift_code` varchar(50) NOT NULL,
  `acc_number` int(50) NOT NULL,
  `tpin_number` int(50) NOT NULL,
  `mm_wallet` varchar(100) NOT NULL,
  `any_training` text NOT NULL,
  `total_members` int(10) NOT NULL,
  `org_name` text NOT NULL,
  `training_duration` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `user_id`, `decision`, `feedback`, `comment`, `bank_id`, `branch`, `branch_code`, `swift_code`, `acc_number`, `tpin_number`, `mm_wallet`, `any_training`, `total_members`, `org_name`, `training_duration`, `date_created`) VALUES
(2, 5, 'Yes', 'Zamcash, 2000', 'Cleared', 6, 'Main', '565434', '9867432', 2147483647, 1234876565, 'David Mwelwa, 777488735', 'Entrepreneurship/Business Skills, Functional Literacy, Financial literacy', 34, 'Ciheb', '6months', '2023-11-11 17:27:31'),
(3, 15, 'Yes', 'Zamcash, 2500', 'Cleared', 4, 'Cairo branch', '5465345', '786545865', 2147483647, 2147483647, 'Bwalya chileshe, 77723335566', 'Entrepreneurship/Business Skills, Savings, Financial literacy', 50, 'dreams', '3months', '2023-11-12 17:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `cdf_committee`
--

CREATE TABLE `cdf_committee` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `staff_id` int(20) NOT NULL,
  `chair_name` varchar(100) NOT NULL,
  `decision_1` text NOT NULL,
  `reasons_1` text NOT NULL,
  `sign_2` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cdf_committee`
--

INSERT INTO `cdf_committee` (`id`, `user_id`, `staff_id`, `chair_name`, `decision_1`, `reasons_1`, `sign_2`, `date_created`) VALUES
(1, 15, 21, ' david mwelwa', 'Approved', ' Innovative Project', ' mwelwa', '2023-11-13 12:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `date_created`) VALUES
(2, 5, 'iugiufauytcytxy', '2023-11-02 20:09:41'),
(3, 5, 'Very good', '2023-11-02 23:51:37'),
(4, 5, 'I love Christine ', '2023-11-03 00:34:08'),
(5, 5, 'She\'s my favorite girl', '2023-11-03 00:34:36'),
(6, 15, 'jdfizgiubkjzbvcyuh hjvyuviuqgaik', '2023-11-03 10:47:26'),
(7, 15, 'yfsyufyugfiug  ayufyugfis', '2023-11-03 10:48:00'),
(8, 15, 'yufyubvkjbkjvyu viufar7fyukj', '2023-11-03 10:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `id` int(20) NOT NULL,
  `constituency` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `constituency`) VALUES
(1, 'Chawama Constituency'),
(2, 'Kanyama Constituency'),
(3, 'Matero Constituency'),
(4, 'Mandevu Constituency'),
(5, 'Roan Constituency'),
(6, 'Chipata Central'),
(7, 'Feira Constituency'),
(8, 'Chawama Constituency'),
(9, 'Vubwi Constituency'),
(10, 'Kabwata Constituency'),
(11, 'Kasama Central'),
(12, 'Munali Constituency');

-- --------------------------------------------------------

--
-- Table structure for table `declaration`
--

CREATE TABLE `declaration` (
  `id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_name` varchar(100) NOT NULL,
  `phy_address` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `app_nrc` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `day` text NOT NULL,
  `month_year` text NOT NULL,
  `sign` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `declaration`
--

INSERT INTO `declaration` (`id`, `user_id`, `app_name`, `phy_address`, `phone`, `app_nrc`, `start_date`, `day`, `month_year`, `sign`, `date_created`) VALUES
(1, 5, 'David Mwelwa', 'chillenje', 777488735, '622741521', '2023-11-11', 'Saturday', '2023-11', 'mwelwa.d', '2023-11-11 21:16:42'),
(2, 15, 'Bwalya Chileshe', 'Chibombo', 2147483647, '76545678456', '2023-11-12', 'Sunday', '2023-11', 'b.chileshe', '2023-11-12 17:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(20) NOT NULL,
  `district_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`) VALUES
(1, 'Lusaka'),
(2, 'Chibombo'),
(3, 'Chipata'),
(4, 'Chongwe'),
(5, 'Luanshya'),
(6, 'Mongu'),
(7, 'Katete'),
(8, 'Monze'),
(9, 'Livingstone');

-- --------------------------------------------------------

--
-- Table structure for table `document_list`
--

CREATE TABLE `document_list` (
  `id` int(30) NOT NULL,
  `doc_title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file_json` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_list`
--

INSERT INTO `document_list` (`id`, `doc_title`, `description`, `file_json`, `user_id`, `date_created`) VALUES
(1, 'Annual Performance Appraisal System', '&lt;p class=&quot;MsoNormal&quot; style=&quot;margin-left:21.25pt;text-indent:-21.25pt;mso-list:\r\nl0 level1 lfo1;tab-stops:list 21.25pt&quot;&gt;&lt;!--[if !supportLists]--&gt;&lt;span style=&quot;font-size:11.0pt;font-family:&amp;quot;Arial&amp;quot;,sans-serif;mso-fareast-font-family:\r\nArial&quot;&gt;1.&lt;span style=&quot;font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &amp;quot;Times New Roman&amp;quot;;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;\r\n&lt;/span&gt;&lt;/span&gt;&lt;!--[endif]--&gt;&lt;span style=&quot;font-size:11.0pt;font-family:&amp;quot;Arial&amp;quot;,sans-serif&quot;&gt;The\r\nfollow up action to be taken is a recommendation made by the supervisor taking\r\ninto account the rating, on both the targets and performance competencies. This\r\nrecommendation could either relate to skills development, reward or sanction.&lt;o:p&gt;&lt;/o:p&gt;&lt;/span&gt;&lt;/p&gt;															', '[\"1687516260_1687516140_1687515660_APAS MAURICE MANZI - August 2022.doc\"]', 1, '2023-06-23 12:31:19'),
(2, 'Job Description', 'Job Description', '[\"1691178960_FINAL DHO - COP20 JOB DESCRIPTIONS (1).pdf\"]', 1, '2023-08-04 21:56:57'),
(9, 'Pacra', 'Registration', '[\"1698935880_Human-Rights.pdf\"]', 5, '2023-11-02 16:38:32'),
(10, 'Pacra', 'registration', '[\"1699001580_nrc.pdf\",\"1699001580_acceptance_MoH.pdf\",\"1699001580_UNICEF.pdf\"]', 5, '2023-11-03 10:54:03'),
(11, 'Nrc', 'Identity', '[\"1699002240_CIDRZ.docx\"]', 5, '2023-11-03 11:04:30'),
(12, 'bank document', 'receipt', '[\"1699603320_acceptance_MoH.pdf\",\"1699603380_20211351079[1].doc\",\"1699603440_Ciheb-Zambia.docx\"]', 17, '2023-11-10 10:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `employee_list`
--

CREATE TABLE `employee_list` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `sex` varchar(25) NOT NULL,
  `dob` date DEFAULT NULL,
  `constituency_id` int(10) NOT NULL,
  `avatar` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_list`
--

INSERT INTO `employee_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `sex`, `dob`, `constituency_id`, `avatar`, `date_created`) VALUES
(18, 'Racheal', '', 'Mweemba', 'rachealmweemba950@gmail.com', 'bb7d75881ccfd60b21d1046441f42cc6', 'FEMALE', '1998-08-30', 12, 'no-image-available.png', '2023-09-11 12:39:55'),
(25, 'Nathan', '', 'Chisanga', 'nathanchisanga@gmail.com', '9db74df32b6cc2ac52be584bf279972b', 'MALE', '1998-08-12', 8, '1699804260_dmi.jpg', '2023-11-12 17:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `project_identity`
--

CREATE TABLE `project_identity` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `problems` text NOT NULL,
  `prob_address` varchar(200) NOT NULL,
  `proj_identity` text NOT NULL,
  `proj_benefit` varchar(200) NOT NULL,
  `direct_jobs` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_identity`
--

INSERT INTO `project_identity` (`id`, `user_id`, `problems`, `prob_address`, `proj_identity`, `proj_benefit`, `direct_jobs`, `date_created`) VALUES
(1, 5, ' iyfiayufyujb kjsvayufyfyu', ' yufy7fd7fa87 yuf76fdsayiudsfgyu', ' yufyuftiugikj', ' yueyugiugiuiugiuds\r\nyuagiufgjbkjz\r\nyjhbk', '10', '2023-11-11 10:22:20'),
(2, 15, ' aestghjvgcvh', ' trd6rd7tyfiugiu', ' trsrstryfyugiu', ' ', '32', '2023-11-12 17:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `short_form` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `cover_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `short_form`, `email`, `contact`, `address`, `about`, `cover_img`) VALUES
(1, 'Constituency Development Fund', '(CDF)', 'info@cdf.com', '+260 972862797', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `avatar`, `date_created`) VALUES
(5, 'David Mwelwa', 'davidgarciajr955@gmail.com', '55fc5b709962876903785fd64a6961e5', '', '2023-11-01 08:50:46'),
(10, 'Enock Phiri', 'enockphiri@gmail.com', '097870ffebc0fa3e655aabf6dbd1a777', '', '2023-11-01 12:29:31'),
(11, 'Sandra Moyo', 'sandramoyo@gmail.com', '3fc5586bed4fb9f745500c0605197924', '', '2023-11-01 13:01:42'),
(14, 'Racheal Mweemba', 'rachealmweemba950@gmail.com', 'bb7d75881ccfd60b21d1046441f42cc6', '', '2023-11-03 00:52:59'),
(15, 'Bwalya Chileshe', 'bwalyachileshe@gmail.com', 'aafb99c4fc0ed74409b0120aacbeb275', '', '2023-11-03 10:25:10'),
(17, 'Mapalo Nakamba', 'mapalonakamba@gmail.com', '336dbd65b52d024babf8af1b2fdae141', '', '2023-11-10 10:00:14'),
(18, 'Patrick Mwenya', 'patrickmwenya@gmail.com', '7cc2ae164fbe5a3b4fb70c2ecf667fe2', '', '2023-11-10 10:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `ward_committee`
--

CREATE TABLE `ward_committee` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `chair_name` varchar(100) NOT NULL,
  `decision_2` text NOT NULL,
  `reasons` text NOT NULL,
  `sign_1` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ward_committee`
--

INSERT INTO `ward_committee` (`id`, `user_id`, `staff_id`, `chair_name`, `decision_2`, `reasons`, `sign_1`, `date_created`) VALUES
(2, 15, 25, ' yvfyuysus', 'Recommended', ' fytufvuzhvuj', ' fusvduj', '2023-11-13 12:22:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdf_committee`
--
ALTER TABLE `cdf_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declaration`
--
ALTER TABLE `declaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_list`
--
ALTER TABLE `document_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_list`
--
ALTER TABLE `employee_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_identity`
--
ALTER TABLE `project_identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward_committee`
--
ALTER TABLE `ward_committee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cdf_committee`
--
ALTER TABLE `cdf_committee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `declaration`
--
ALTER TABLE `declaration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `document_list`
--
ALTER TABLE `document_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_list`
--
ALTER TABLE `employee_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `project_identity`
--
ALTER TABLE `project_identity`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ward_committee`
--
ALTER TABLE `ward_committee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
