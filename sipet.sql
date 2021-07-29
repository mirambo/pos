-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2013 at 08:48 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipet`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_category`
--

CREATE TABLE IF NOT EXISTS `accounts_category` (
  `accounts_category_id` int(10) NOT NULL AUTO_INCREMENT,
  `accounts_category_name` varchar(100) NOT NULL,
  `accounts_category_code` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accounts_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts_category`
--

INSERT INTO `accounts_category` (`accounts_category_id`, `accounts_category_name`, `accounts_category_code`, `date_recorded`) VALUES
(1, 'Fixed Asset', '001', '2013-09-11 13:25:40'),
(2, 'Current Assets', '004', '2013-09-11 13:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payables_ledger`
--

CREATE TABLE IF NOT EXISTS `accounts_payables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts_payables_ledger`
--

INSERT INTO `accounts_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Purchase of fixed asset ', '', '', '', 0, '', '2013-09-10 16:13:41', 0),
(2, 'Subcontractor Invoice innnn', '89000', '', '89000', 2, '1', '2013-09-11 09:10:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_receivables_ledger`
--

CREATE TABLE IF NOT EXISTS `accounts_receivables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sales_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accounts_receivables_ledger`
--

INSERT INTO `accounts_receivables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Service invoice SIPET/MP/INV-001/09-2013 for month September 2013', '  1140', '  1140', '', 2, '1', '2013-09-10 16:48:05', 0),
(2, 'Service invoice SIPET/MP/INV-001/09-2013 for month September 2013', '  1290', '  1290', '', 2, '1', '2013-09-11 14:43:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accounts_titles`
--

CREATE TABLE IF NOT EXISTS `accounts_titles` (
  `accounts_title_id` int(10) NOT NULL AUTO_INCREMENT,
  `accounts_category_id` int(100) NOT NULL,
  `accounts_title_name` varchar(100) NOT NULL,
  `accounts_title_code` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accounts_title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `accounts_titles`
--

INSERT INTO `accounts_titles` (`accounts_title_id`, `accounts_category_id`, `accounts_title_name`, `accounts_title_code`, `date_recorded`) VALUES
(2, 0, 'USD', '', '0000-00-00 00:00:00'),
(4, 0, 'SSP', '', '0000-00-00 00:00:00'),
(28, 0, 'SSP', '', '0000-00-00 00:00:00'),
(29, 0, 'SSP', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `airtickets`
--

CREATE TABLE IF NOT EXISTS `airtickets` (
  `airticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dep_town` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dep_date` varchar(100) NOT NULL,
  `dest_town` varchar(100) NOT NULL,
  `arrive_date` varchar(100) NOT NULL,
  `ret_date` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_comp` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_cost` varchar(11) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`airticket_id`),
  KEY `emp_status` (`flight_comp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `airtickets`
--

INSERT INTO `airtickets` (`airticket_id`, `emp_id`, `country`, `dep_town`, `dep_date`, `dest_town`, `arrive_date`, `ret_date`, `flight_comp`, `flight_no`, `flight_cost`, `remarks`, `status`, `date_recorded`) VALUES
(1, 7, 'Malaysia', 'Mongolia', ' 2013-04-01  ', 'Juba', ' 2013-04-30  ', ' 2013-05-24  ', 'Fly 540', '5X-CO456', '500', 'Good', 0, '2013-04-23 09:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `alert_logs`
--

CREATE TABLE IF NOT EXISTS `alert_logs` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `date_done` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `alert_logs`
--

INSERT INTO `alert_logs` (`log_id`, `action`, `date_done`) VALUES
(1, 'Work Permit Alert Send Successfully', '2013-05-08 12:45:05'),
(2, 'Work Permit Alert Send Successfully', '2013-05-08 12:45:13'),
(3, 'Work Permit Alert Send Successfully', '2013-05-08 13:33:08'),
(4, 'Work Permit Alert Send Successfully', '2013-05-08 13:33:15'),
(5, 'Work Permit Alert Send Successfully', '2013-05-10 16:34:37'),
(6, 'Work Permit Alert Send Successfully', '2013-05-10 16:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_staff`
--

CREATE TABLE IF NOT EXISTS `assigned_staff` (
  `assigned_staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `previous_bunch_id` int(11) NOT NULL,
  `bunch_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`assigned_staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assigned_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `assigned_staffold`
--

CREATE TABLE IF NOT EXISTS `assigned_staffold` (
  `assigned_staff_id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `project_manager` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `exit_date` date NOT NULL,
  `staff` int(10) NOT NULL,
  `work_place` varchar(100) NOT NULL,
  `segment` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_staffold`
--

INSERT INTO `assigned_staffold` (`assigned_staff_id`, `project_id`, `project_manager`, `entry_date`, `exit_date`, `staff`, `work_place`, `segment`, `status`) VALUES
(0, 11, 8, '2013-09-01', '2013-09-16', 26, 'Field', 'PP', 0),
(0, 11, 8, '2013-09-01', '2013-09-16', 10, 'Field', 'TL', 0),
(0, 11, 8, '2013-09-01', '2013-09-16', 8, 'Field', 'TL', 0),
(0, 11, 8, '2013-09-01', '2013-09-16', 15, 'Field', 'PP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_subcon_staff`
--

CREATE TABLE IF NOT EXISTS `assigned_subcon_staff` (
  `assigned_subcon_id` int(10) NOT NULL AUTO_INCREMENT,
  `assigned_subcon_project_id` int(10) NOT NULL,
  `subcontractor` int(10) NOT NULL,
  `date_subcontracted` date NOT NULL,
  `assigned_subcon_project_manager` int(10) NOT NULL,
  `assigned_subcon_staff` int(10) NOT NULL,
  `assigned_subcon_work_place` varchar(100) NOT NULL,
  `assigned_subcon_segment` varchar(100) NOT NULL,
  `assigned_subcon_status` int(10) NOT NULL,
  PRIMARY KEY (`assigned_subcon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assigned_subcon_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE IF NOT EXISTS `audit_trails` (
  `audit_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date_of_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(100) NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 21, '2013-09-10 15:32:48', 'Logged into the system'),
(2, 2, '2013-09-10 15:35:02', 'Created a new employee by the name 1 2 3 into the system'),
(3, 24, '2013-09-10 15:35:10', 'Logged into the system'),
(4, 20, '2013-09-10 15:37:38', 'Logged into the system'),
(5, 20, '2013-09-10 15:41:09', 'Recorded an petty cash income August petty cash worth  2500 into the system'),
(6, 24, '2013-09-10 15:48:12', 'Updated  details'),
(7, 24, '2013-09-10 15:48:21', 'Updated  details'),
(8, 24, '2013-09-10 15:48:39', 'Updated  details'),
(9, 20, '2013-09-10 15:48:49', 'Signed out of the system'),
(10, 23, '2013-09-10 16:01:11', 'Logged into the system'),
(11, 24, '2013-09-10 16:02:14', 'Updated  details'),
(12, 24, '2013-09-10 16:03:27', 'Logged into the system'),
(13, 24, '2013-09-10 16:07:21', 'Logged into the system'),
(14, 24, '2013-09-10 16:08:58', 'Logged into the system'),
(15, 24, '2013-09-10 16:09:30', 'Logged into the system'),
(16, 24, '2013-09-10 16:10:08', 'Logged into the system'),
(17, 23, '2013-09-10 16:11:29', 'Logged into the system'),
(18, 19, '2013-09-10 16:13:54', 'Signed out of the system'),
(19, 19, '2013-09-10 16:14:01', 'Logged into the system'),
(20, 19, '2013-09-10 16:14:08', 'Signed out of the system'),
(21, 19, '2013-09-10 16:28:24', 'Logged into the system'),
(22, 19, '2013-09-10 16:34:55', 'Signed out of the system'),
(23, 18, '2013-09-10 16:35:12', 'Logged into the system'),
(24, 18, '2013-09-10 16:35:15', 'Logged into the system'),
(25, 18, '2013-09-10 16:35:18', 'Signed out of the system'),
(26, 19, '2013-09-10 16:35:25', 'Logged into the system'),
(27, 19, '2013-09-10 16:35:55', 'Signed out of the system'),
(28, 18, '2013-09-10 16:36:12', 'Logged into the system'),
(29, 18, '2013-09-10 16:36:45', 'Signed out of the system'),
(30, 19, '2013-09-10 16:36:52', 'Logged into the system'),
(31, 19, '2013-09-10 16:40:29', 'Added a client into the system'),
(32, 19, '2013-09-10 16:41:02', 'Added a project from the system'),
(33, 19, '2013-09-10 16:59:49', 'Signed out of the system'),
(34, 23, '2013-09-10 17:00:50', 'Logged into the system'),
(35, 23, '2013-09-10 17:01:46', 'Signed out of the system'),
(36, 19, '2013-09-10 17:01:55', 'Logged into the system'),
(37, 19, '2013-09-10 17:14:03', 'Recorded an income Donation worth 10000 into the system'),
(38, 19, '2013-09-11 08:07:33', 'Logged into the system'),
(39, 19, '2013-09-11 08:08:02', 'Signed out of the system'),
(40, 23, '2013-09-11 08:08:09', 'Logged into the system'),
(41, 23, '2013-09-11 08:12:01', 'Signed out of the system'),
(42, 19, '2013-09-11 08:12:07', 'Logged into the system'),
(43, 19, '2013-09-11 08:14:00', 'Signed out of the system'),
(44, 23, '2013-09-11 08:14:08', 'Logged into the system'),
(45, 23, '2013-09-11 08:14:27', 'Signed out of the system'),
(46, 19, '2013-09-11 08:14:37', 'Logged into the system'),
(47, 0, '2013-09-11 08:15:32', 'Updated User Group Details'),
(48, 0, '2013-09-11 08:15:51', 'Updated User Group Details'),
(49, 19, '2013-09-11 08:15:53', 'Signed out of the system'),
(50, 23, '2013-09-11 08:15:58', 'Logged into the system'),
(51, 23, '2013-09-11 08:16:13', 'Signed out of the system'),
(52, 23, '2013-09-11 08:16:20', 'Logged into the system'),
(53, 23, '2013-09-11 08:16:28', 'Signed out of the system'),
(54, 19, '2013-09-11 08:16:33', 'Logged into the system'),
(55, 0, '2013-09-11 08:16:59', 'Updated User Group Details'),
(56, 19, '2013-09-11 08:17:01', 'Signed out of the system'),
(57, 23, '2013-09-11 08:17:07', 'Logged into the system'),
(58, 23, '2013-09-11 08:17:29', 'Signed out of the system'),
(59, 19, '2013-09-11 08:17:40', 'Logged into the system'),
(60, 0, '2013-09-11 08:19:00', 'Updated User Group Details'),
(61, 19, '2013-09-11 08:19:11', 'Signed out of the system'),
(62, 23, '2013-09-11 08:19:17', 'Logged into the system'),
(63, 23, '2013-09-11 08:19:37', 'Signed out of the system'),
(64, 19, '2013-09-11 08:19:43', 'Logged into the system'),
(65, 0, '2013-09-11 08:20:02', 'Updated User Group Details'),
(66, 19, '2013-09-11 08:43:00', 'Signed out of the system'),
(67, 23, '2013-09-11 08:47:11', 'Logged into the system'),
(68, 23, '2013-09-11 09:01:44', 'Recorded an income wewe worth 23000 into the system'),
(69, 23, '2013-09-11 09:21:53', 'Recorded an expense Rent worth 5600 into the system'),
(70, 162, '2013-09-11 09:26:48', 'Signed out of the system'),
(71, 23, '2013-09-11 09:26:53', 'Logged into the system'),
(72, 23, '2013-09-11 09:44:10', 'Recorded an expense Purchase of diesel worth 4500 into the system'),
(73, 23, '2013-09-11 10:05:34', 'Signed out of the system'),
(74, 19, '2013-09-11 10:05:50', 'Logged into the system'),
(75, 19, '2013-09-11 10:06:18', 'Signed out of the system'),
(76, 22, '2013-09-11 10:06:23', 'Logged into the system'),
(77, 22, '2013-09-11 11:40:25', 'Signed out of the system'),
(78, 23, '2013-09-11 11:40:31', 'Logged into the system'),
(79, 23, '2013-09-11 11:56:01', 'Signed out of the system'),
(80, 23, '2013-09-11 11:56:10', 'Logged into the system'),
(81, 23, '2013-09-11 12:51:59', 'Signed out of the system'),
(82, 19, '2013-09-11 12:52:06', 'Logged into the system'),
(83, 19, '2013-09-11 12:53:43', 'Signed out of the system'),
(84, 23, '2013-09-11 12:53:48', 'Logged into the system'),
(85, 23, '2013-09-11 12:54:05', 'Signed out of the system'),
(86, 19, '2013-09-11 12:54:10', 'Logged into the system'),
(87, 19, '2013-09-11 12:54:44', 'Signed out of the system'),
(88, 19, '2013-09-11 12:54:49', 'Logged into the system'),
(89, 19, '2013-09-11 12:54:53', 'Signed out of the system'),
(90, 23, '2013-09-11 12:54:59', 'Logged into the system'),
(91, 23, '2013-09-11 12:55:23', 'Signed out of the system'),
(92, 19, '2013-09-11 12:55:28', 'Logged into the system'),
(93, 19, '2013-09-11 12:55:58', 'Updated Sub Module Details'),
(94, 19, '2013-09-11 13:56:02', 'Signed out of the system'),
(95, 22, '2013-09-11 13:56:09', 'Logged into the system'),
(96, 22, '2013-09-11 13:56:37', 'Signed out of the system'),
(97, 19, '2013-09-11 13:56:44', 'Logged into the system'),
(98, 19, '2013-09-11 14:04:26', 'Signed out of the system'),
(99, 22, '2013-09-11 14:05:04', 'Logged into the system'),
(100, 22, '2013-09-11 14:13:51', 'Signed out of the system'),
(101, 19, '2013-09-11 14:13:59', 'Logged into the system'),
(102, 19, '2013-09-11 14:14:54', 'Signed out of the system'),
(103, 22, '2013-09-11 14:15:01', 'Logged into the system'),
(104, 22, '2013-09-11 14:19:10', 'Added a client into the system'),
(105, 22, '2013-09-11 14:20:59', 'Added a project from the system'),
(106, 22, '2013-09-11 14:32:28', 'Signed out of the system'),
(107, 19, '2013-09-11 14:32:47', 'Logged into the system'),
(108, 19, '2013-09-11 19:31:06', 'Logged into the system'),
(109, 19, '2013-09-11 21:29:12', 'Signed out of the system'),
(110, 21, '2013-09-11 21:29:19', 'Logged into the system'),
(111, 21, '2013-09-11 21:45:56', 'Logged into the system'),
(112, 21, '2013-09-11 23:08:01', 'Updated payroll details'),
(113, 21, '2013-09-12 06:04:47', 'Signed out of the system'),
(114, 19, '2013-09-12 06:04:53', 'Logged into the system'),
(115, 19, '2013-09-12 06:05:45', 'Updated Sub Module Details'),
(116, 19, '2013-09-12 06:06:39', 'Updated Sub Module Details'),
(117, 19, '2013-09-12 06:08:30', 'Signed out of the system'),
(118, 21, '2013-09-12 06:08:35', 'Logged into the system'),
(119, 21, '2013-09-12 06:21:01', 'Signed out of the system'),
(120, 19, '2013-09-12 06:21:08', 'Logged into the system'),
(121, 19, '2013-09-12 06:23:29', 'Signed out of the system'),
(122, 19, '2013-09-12 06:23:36', 'Logged into the system'),
(123, 19, '2013-09-12 06:24:11', 'Updated Sub Module Details'),
(124, 19, '2013-09-12 06:24:17', 'Signed out of the system'),
(125, 21, '2013-09-12 06:24:24', 'Logged into the system'),
(126, 21, '2013-09-12 07:49:15', 'Updated payroll details'),
(127, 21, '2013-09-12 07:50:02', 'Updated payroll details'),
(128, 21, '2013-09-12 07:51:14', 'Updated payroll details'),
(129, 21, '2013-09-12 09:13:30', 'Signed out of the system'),
(130, 19, '2013-09-12 09:13:41', 'Logged into the system'),
(131, 19, '2013-09-12 09:14:40', 'Signed out of the system'),
(132, 21, '2013-09-12 09:14:47', 'Logged into the system'),
(133, 21, '2013-09-12 09:15:13', 'Signed out of the system'),
(134, 21, '2013-09-12 09:15:28', 'Logged into the system'),
(135, 21, '2013-09-12 09:21:41', 'Signed out of the system'),
(136, 19, '2013-09-12 09:22:04', 'Logged into the system'),
(137, 19, '2013-09-12 09:22:30', 'Signed out of the system'),
(138, 20, '2013-09-12 09:22:38', 'Logged into the system'),
(139, 20, '2013-09-12 09:25:03', 'Signed out of the system'),
(140, 19, '2013-09-12 09:25:11', 'Logged into the system'),
(141, 19, '2013-09-12 09:48:58', 'Signed out of the system'),
(142, 23, '2013-09-12 09:49:05', 'Logged into the system'),
(143, 23, '2013-09-12 09:49:23', 'Signed out of the system'),
(144, 19, '2013-09-12 09:49:38', 'Logged into the system'),
(145, 19, '2013-09-12 09:51:41', 'Signed out of the system'),
(146, 21, '2013-09-12 09:51:47', 'Logged into the system'),
(147, 21, '2013-09-12 09:56:39', 'Updated payroll details'),
(148, 21, '2013-09-12 10:20:48', 'Updated payroll details'),
(149, 21, '2013-09-12 13:56:40', 'Signed out of the system'),
(150, 19, '2013-09-12 13:56:46', 'Logged into the system'),
(151, 20, '2013-09-12 15:11:20', 'Logged into the system'),
(152, 20, '2013-09-12 15:12:46', 'Signed out of the system'),
(153, 19, '2013-09-12 15:12:54', 'Logged into the system'),
(154, 19, '2013-09-12 15:13:09', 'Signed out of the system'),
(155, 20, '2013-09-12 15:13:18', 'Logged into the system'),
(156, 20, '2013-09-12 15:13:42', 'Signed out of the system'),
(157, 21, '2013-09-12 15:13:47', 'Logged into the system'),
(158, 21, '2013-09-12 15:14:03', 'Signed out of the system'),
(159, 20, '2013-09-12 15:14:11', 'Logged into the system'),
(160, 20, '2013-09-12 15:23:30', 'Recorded an petty cash income petty cash for month of September worth  2000 into the system'),
(161, 20, '2013-09-12 15:24:30', 'Recorded an petty cash expense Stationery worth  100 into the system'),
(162, 0, '2013-09-12 15:24:52', 'Edited petty expenses Stationery'),
(163, 20, '2013-09-12 15:28:36', 'Signed out of the system'),
(164, 19, '2013-09-12 15:28:45', 'Logged into the system'),
(165, 19, '2013-09-12 15:32:02', 'Signed out of the system'),
(166, 20, '2013-09-12 15:32:09', 'Logged into the system'),
(167, 20, '2013-09-12 15:47:49', 'Signed out of the system'),
(168, 21, '2013-09-12 15:48:06', 'Logged into the system'),
(169, 21, '2013-09-12 15:50:07', 'Signed out of the system'),
(170, 20, '2013-09-12 15:50:17', 'Logged into the system'),
(171, 20, '2013-09-12 15:51:26', 'Signed out of the system'),
(172, 21, '2013-09-12 15:51:32', 'Logged into the system'),
(173, 21, '2013-09-12 15:52:24', 'Signed out of the system'),
(174, 20, '2013-09-12 15:52:35', 'Logged into the system'),
(175, 20, '2013-09-12 16:04:52', 'Recorded an petty cash income petty cash for the month of August worth  2500 into the system'),
(176, 20, '2013-09-12 16:06:34', 'Recorded an petty cash expense refueling Vehicle No CE 751W worth  690 into the system'),
(177, 20, '2013-09-12 16:15:54', 'Recorded an petty cash income money in advance for the month of August worth  2500 into the system'),
(178, 20, '2013-09-12 16:18:54', 'Recorded an petty cash expense Refuel Vehicle No CE 749W worth  690 into the system'),
(179, 162, '2013-09-15 02:52:24', 'Signed out of the system'),
(180, 19, '2013-09-15 02:52:39', 'Logged into the system'),
(181, 0, '2013-09-15 03:05:21', 'Updated User Group Details'),
(182, 19, '2013-09-15 03:09:33', 'Updated Sub Module Details'),
(183, 19, '2013-09-15 03:21:05', 'Updated Sub Module Details'),
(184, 19, '2013-09-15 17:27:57', 'Signed out of the system'),
(185, 162, '2013-09-15 17:31:23', 'Signed out of the system'),
(186, 19, '2013-09-15 17:32:34', 'Logged into the system'),
(187, 19, '2013-09-15 17:40:59', 'Signed out of the system'),
(188, 162, '2013-09-16 02:56:52', 'Signed out of the system'),
(189, 19, '2013-09-16 02:57:21', 'Logged into the system'),
(190, 19, '2013-09-16 11:13:50', 'Signed out of the system'),
(191, 19, '2013-09-16 11:14:52', 'Logged into the system'),
(192, 0, '2013-09-16 11:24:56', 'Updated User Group Details');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `benefit_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`benefit_id`, `benefit_name`, `benefit_amount`) VALUES
(1, 'COLA', '16'),
(2, 'Housing', '18'),
(3, 'Clothing', '12'),
(6, '', ''),
(7, 'Medical', '9');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_log`
--

CREATE TABLE IF NOT EXISTS `benefit_log` (
  `benefit_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `banefit_name` varchar(100) NOT NULL,
  `benefit_amount` varchar(100) NOT NULL,
  `benefit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`benefit_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=349 ;

--
-- Dumping data for table `benefit_log`
--

INSERT INTO `benefit_log` (`benefit_log_id`, `payrol_basic_log_id`, `emp_id`, `banefit_name`, `benefit_amount`, `benefit_date`) VALUES
(1, 1, 1, 'Clothing', '2640', '2013-07-01 19:15:08'),
(2, 1, 1, 'COLA', '3520', '2013-07-01 19:15:08'),
(3, 1, 1, 'Housing', '3960', '2013-07-01 19:15:08'),
(4, 2, 2, 'Clothing', '4008', '2013-07-01 19:15:12'),
(5, 2, 2, 'COLA', '5344', '2013-07-01 19:15:12'),
(6, 2, 2, 'Housing', '6012', '2013-07-01 19:15:12'),
(7, 3, 4, 'Clothing', '2520', '2013-07-01 19:15:14'),
(8, 3, 4, 'COLA', '3360', '2013-07-01 19:15:14'),
(9, 3, 4, 'Housing', '3780', '2013-07-01 19:15:14'),
(10, 4, 6, 'Clothing', '2832', '2013-07-01 19:15:16'),
(11, 4, 6, 'COLA', '3776', '2013-07-01 19:15:16'),
(12, 4, 6, 'Housing', '4248', '2013-07-01 19:15:16'),
(13, 5, 7, 'Clothing', '840', '2013-07-01 19:15:17'),
(14, 5, 7, 'COLA', '1120', '2013-07-01 19:15:17'),
(15, 5, 7, 'Housing', '1260', '2013-07-01 19:15:17'),
(16, 6, 8, 'Clothing', '2100', '2013-07-01 19:15:19'),
(17, 6, 8, 'COLA', '2800', '2013-07-01 19:15:19'),
(18, 6, 8, 'Housing', '3150', '2013-07-01 19:15:19'),
(19, 7, 9, 'Clothing', '1920', '2013-07-01 19:15:21'),
(20, 7, 9, 'COLA', '2560', '2013-07-01 19:15:21'),
(21, 7, 9, 'Housing', '2880', '2013-07-01 19:15:21'),
(22, 8, 10, 'Clothing', '1680', '2013-07-01 19:15:23'),
(23, 8, 10, 'COLA', '2240', '2013-07-01 19:15:23'),
(24, 8, 10, 'Housing', '2520', '2013-07-01 19:15:23'),
(25, 9, 11, 'Clothing', '2637.6', '2013-07-01 19:15:25'),
(26, 9, 11, 'COLA', '3516.8', '2013-07-01 19:15:25'),
(27, 9, 11, 'Housing', '3956.4', '2013-07-01 19:15:25'),
(28, 10, 12, 'Clothing', '5472', '2013-07-01 19:15:27'),
(29, 10, 12, 'COLA', '7296', '2013-07-01 19:15:27'),
(30, 10, 12, 'Housing', '8208', '2013-07-01 19:15:27'),
(31, 11, 13, 'Clothing', '3894', '2013-07-01 19:15:29'),
(32, 11, 13, 'COLA', '5192', '2013-07-01 19:15:29'),
(33, 11, 13, 'Housing', '5841', '2013-07-01 19:15:29'),
(34, 12, 14, 'Clothing', '1536', '2013-07-01 19:15:30'),
(35, 12, 14, 'COLA', '2048', '2013-07-01 19:15:30'),
(36, 12, 14, 'Housing', '2304', '2013-07-01 19:15:30'),
(37, 13, 15, 'Clothing', '3948', '2013-07-01 19:15:32'),
(38, 13, 15, 'COLA', '5264', '2013-07-01 19:15:32'),
(39, 13, 15, 'Housing', '5922', '2013-07-01 19:15:32'),
(40, 14, 1, 'Clothing', '2640', '2013-06-04 19:20:47'),
(41, 14, 1, 'COLA', '3520', '2013-06-04 19:20:47'),
(42, 14, 1, 'Housing', '3960', '2013-06-04 19:20:47'),
(43, 15, 2, 'Clothing', '4008', '2013-06-04 19:20:49'),
(44, 15, 2, 'COLA', '5344', '2013-06-04 19:20:49'),
(45, 15, 2, 'Housing', '6012', '2013-06-04 19:20:49'),
(46, 16, 4, 'Clothing', '2520', '2013-06-04 19:20:51'),
(47, 16, 4, 'COLA', '3360', '2013-06-04 19:20:51'),
(48, 16, 4, 'Housing', '3780', '2013-06-04 19:20:51'),
(49, 17, 6, 'Clothing', '2832', '2013-06-04 19:20:53'),
(50, 17, 6, 'COLA', '3776', '2013-06-04 19:20:53'),
(51, 17, 6, 'Housing', '4248', '2013-06-04 19:20:53'),
(52, 18, 7, 'Clothing', '840', '2013-06-04 19:20:55'),
(53, 18, 7, 'COLA', '1120', '2013-06-04 19:20:55'),
(54, 18, 7, 'Housing', '1260', '2013-06-04 19:20:55'),
(55, 19, 8, 'Clothing', '2100', '2013-06-04 19:20:56'),
(56, 19, 8, 'COLA', '2800', '2013-06-04 19:20:56'),
(57, 19, 8, 'Housing', '3150', '2013-06-04 19:20:56'),
(58, 20, 9, 'Clothing', '1920', '2013-06-04 19:20:58'),
(59, 20, 9, 'COLA', '2560', '2013-06-04 19:20:58'),
(60, 20, 9, 'Housing', '2880', '2013-06-04 19:20:58'),
(61, 21, 10, 'Clothing', '1680', '2013-06-04 19:21:00'),
(62, 21, 10, 'COLA', '2240', '2013-06-04 19:21:00'),
(63, 21, 10, 'Housing', '2520', '2013-06-04 19:21:00'),
(64, 22, 11, 'Clothing', '2637.6', '2013-06-04 19:21:01'),
(65, 22, 11, 'COLA', '3516.8', '2013-06-04 19:21:01'),
(66, 22, 11, 'Housing', '3956.4', '2013-06-04 19:21:01'),
(67, 23, 12, 'Clothing', '5472', '2013-06-04 19:21:06'),
(68, 23, 12, 'COLA', '7296', '2013-06-04 19:21:06'),
(69, 23, 12, 'Housing', '8208', '2013-06-04 19:21:06'),
(70, 24, 13, 'Clothing', '3894', '2013-06-04 19:21:07'),
(71, 24, 13, 'COLA', '5192', '2013-06-04 19:21:07'),
(72, 24, 13, 'Housing', '5841', '2013-06-04 19:21:07'),
(73, 25, 14, 'Clothing', '1536', '2013-06-04 19:21:09'),
(74, 25, 14, 'COLA', '2048', '2013-06-04 19:21:09'),
(75, 25, 14, 'Housing', '2304', '2013-06-04 19:21:09'),
(76, 26, 15, 'Clothing', '3948', '2013-06-04 19:21:11'),
(77, 26, 15, 'COLA', '5264', '2013-06-04 19:21:11'),
(78, 26, 15, 'Housing', '5922', '2013-06-04 19:21:11'),
(79, 27, 1, 'Clothing', '2640', '2013-07-09 21:09:55'),
(80, 27, 1, 'COLA', '3520', '2013-07-09 21:09:55'),
(81, 27, 1, 'Housing', '3960', '2013-07-09 21:09:55'),
(82, 28, 2, 'Clothing', '4008', '2013-07-09 21:10:01'),
(83, 28, 2, 'COLA', '5344', '2013-07-09 21:10:01'),
(84, 28, 2, 'Housing', '6012', '2013-07-09 21:10:01'),
(85, 29, 4, 'Clothing', '2520', '2013-07-09 21:10:40'),
(86, 29, 4, 'COLA', '3360', '2013-07-09 21:10:40'),
(87, 29, 4, 'Housing', '3780', '2013-07-09 21:10:40'),
(88, 30, 6, 'Clothing', '2832', '2013-07-09 21:10:42'),
(89, 30, 6, 'COLA', '3776', '2013-07-09 21:10:42'),
(90, 30, 6, 'Housing', '4248', '2013-07-09 21:10:42'),
(91, 31, 7, 'Clothing', '840', '2013-07-09 21:10:44'),
(92, 31, 7, 'COLA', '1120', '2013-07-09 21:10:44'),
(93, 31, 7, 'Housing', '1260', '2013-07-09 21:10:44'),
(94, 32, 8, 'Clothing', '2100', '2013-07-09 21:10:46'),
(95, 32, 8, 'COLA', '2800', '2013-07-09 21:10:46'),
(96, 32, 8, 'Housing', '3150', '2013-07-09 21:10:46'),
(97, 33, 9, 'Clothing', '1920', '2013-07-09 21:10:49'),
(98, 33, 9, 'COLA', '2560', '2013-07-09 21:10:49'),
(99, 33, 9, 'Housing', '2880', '2013-07-09 21:10:49'),
(100, 34, 10, 'Clothing', '1680', '2013-07-09 21:10:51'),
(101, 34, 10, 'COLA', '2240', '2013-07-09 21:10:51'),
(102, 34, 10, 'Housing', '2520', '2013-07-09 21:10:51'),
(103, 35, 11, 'Clothing', '2637.6', '2013-07-09 21:10:54'),
(104, 35, 11, 'COLA', '3516.8', '2013-07-09 21:10:54'),
(105, 35, 11, 'Housing', '3956.4', '2013-07-09 21:10:54'),
(106, 36, 1, 'Clothing', '2640', '2013-08-15 21:11:56'),
(107, 36, 1, 'COLA', '3520', '2013-08-15 21:11:56'),
(108, 36, 1, 'Housing', '3960', '2013-08-15 21:11:56'),
(109, 37, 2, 'Clothing', '4008', '2013-08-15 21:11:59'),
(110, 37, 2, 'COLA', '5344', '2013-08-15 21:11:59'),
(111, 37, 2, 'Housing', '6012', '2013-08-15 21:11:59'),
(112, 38, 4, 'Clothing', '2520', '2013-08-15 21:12:01'),
(113, 38, 4, 'COLA', '3360', '2013-08-15 21:12:01'),
(114, 38, 4, 'Housing', '3780', '2013-08-15 21:12:01'),
(115, 39, 6, 'Clothing', '2832', '2013-08-15 21:12:03'),
(116, 39, 6, 'COLA', '3776', '2013-08-15 21:12:03'),
(117, 39, 6, 'Housing', '4248', '2013-08-15 21:12:03'),
(118, 40, 7, 'Clothing', '840', '2013-08-15 21:12:05'),
(119, 40, 7, 'COLA', '1120', '2013-08-15 21:12:05'),
(120, 40, 7, 'Housing', '1260', '2013-08-15 21:12:05'),
(121, 41, 8, 'Clothing', '2100', '2013-08-15 21:12:07'),
(122, 41, 8, 'COLA', '2800', '2013-08-15 21:12:07'),
(123, 41, 8, 'Housing', '3150', '2013-08-15 21:12:07'),
(124, 42, 9, 'Clothing', '1920', '2013-08-15 21:12:09'),
(125, 42, 9, 'COLA', '2560', '2013-08-15 21:12:09'),
(126, 42, 9, 'Housing', '2880', '2013-08-15 21:12:09'),
(127, 43, 10, 'Clothing', '1680', '2013-08-15 21:12:10'),
(128, 43, 10, 'COLA', '2240', '2013-08-15 21:12:10'),
(129, 43, 10, 'Housing', '2520', '2013-08-15 21:12:10'),
(130, 44, 1, 'Clothing', '2640', '2013-05-05 13:56:42'),
(131, 44, 1, 'COLA', '3520', '2013-05-05 13:56:42'),
(132, 44, 1, 'Housing', '3960', '2013-05-05 13:56:42'),
(133, 45, 2, 'Clothing', '4008', '2013-05-05 13:56:45'),
(134, 45, 2, 'COLA', '5344', '2013-05-05 13:56:45'),
(135, 45, 2, 'Housing', '6012', '2013-05-05 13:56:45'),
(136, 46, 4, 'Clothing', '2520', '2013-05-05 13:56:47'),
(137, 46, 4, 'COLA', '3360', '2013-05-05 13:56:47'),
(138, 46, 4, 'Housing', '3780', '2013-05-05 13:56:47'),
(139, 47, 6, 'Clothing', '2832', '2013-05-05 13:56:49'),
(140, 47, 6, 'COLA', '3776', '2013-05-05 13:56:49'),
(141, 47, 6, 'Housing', '4248', '2013-05-05 13:56:49'),
(142, 48, 7, 'Clothing', '840', '2013-05-05 13:56:51'),
(143, 48, 7, 'COLA', '1120', '2013-05-05 13:56:51'),
(144, 48, 7, 'Housing', '1260', '2013-05-05 13:56:51'),
(145, 49, 8, 'Clothing', '2100', '2013-05-05 13:56:53'),
(146, 49, 8, 'COLA', '2800', '2013-05-05 13:56:53'),
(147, 49, 8, 'Housing', '3150', '2013-05-05 13:56:53'),
(148, 50, 9, 'Clothing', '1920', '2013-05-05 13:56:55'),
(149, 50, 9, 'COLA', '2560', '2013-05-05 13:56:55'),
(150, 50, 9, 'Housing', '2880', '2013-05-05 13:56:55'),
(151, 51, 10, 'Clothing', '1680', '2013-05-05 13:56:58'),
(152, 51, 10, 'COLA', '2240', '2013-05-05 13:56:58'),
(153, 51, 10, 'Housing', '2520', '2013-05-05 13:56:58'),
(154, 52, 1, 'Clothing', '2640', '2013-05-05 15:10:44'),
(155, 52, 1, 'COLA', '3520', '2013-05-05 15:10:44'),
(156, 52, 1, 'Housing', '3960', '2013-05-05 15:10:44'),
(157, 53, 2, 'Clothing', '4008', '2013-05-05 15:10:47'),
(158, 53, 2, 'COLA', '5344', '2013-05-05 15:10:47'),
(159, 53, 2, 'Housing', '6012', '2013-05-05 15:10:47'),
(160, 54, 4, 'Clothing', '2520', '2013-05-05 15:10:49'),
(161, 54, 4, 'COLA', '3360', '2013-05-05 15:10:49'),
(162, 54, 4, 'Housing', '3780', '2013-05-05 15:10:49'),
(163, 55, 6, 'Clothing', '2832', '2013-05-05 15:10:51'),
(164, 55, 6, 'COLA', '3776', '2013-05-05 15:10:51'),
(165, 55, 6, 'Housing', '4248', '2013-05-05 15:10:51'),
(166, 56, 7, 'Clothing', '840', '2013-05-05 15:10:53'),
(167, 56, 7, 'COLA', '1120', '2013-05-05 15:10:53'),
(168, 56, 7, 'Housing', '1260', '2013-05-05 15:10:53'),
(169, 57, 8, 'Clothing', '2100', '2013-05-05 15:10:56'),
(170, 57, 8, 'COLA', '2800', '2013-05-05 15:10:56'),
(171, 57, 8, 'Housing', '3150', '2013-05-05 15:10:56'),
(172, 58, 9, 'Clothing', '1920', '2013-05-05 15:10:59'),
(173, 58, 9, 'COLA', '2560', '2013-05-05 15:10:59'),
(174, 58, 9, 'Housing', '2880', '2013-05-05 15:10:59'),
(175, 59, 10, 'Clothing', '1680', '2013-05-05 15:11:02'),
(176, 59, 10, 'COLA', '2240', '2013-05-05 15:11:02'),
(177, 59, 10, 'Housing', '2520', '2013-05-05 15:11:02'),
(178, 60, 1, 'Clothing', '2640', '2013-05-05 15:14:46'),
(179, 60, 1, 'COLA', '3520', '2013-05-05 15:14:46'),
(180, 60, 1, 'Housing', '3960', '2013-05-05 15:14:46'),
(181, 61, 2, 'Clothing', '4008', '2013-05-05 15:14:48'),
(182, 61, 2, 'COLA', '5344', '2013-05-05 15:14:48'),
(183, 61, 2, 'Housing', '6012', '2013-05-05 15:14:48'),
(184, 62, 4, 'Clothing', '2520', '2013-05-05 15:14:50'),
(185, 62, 4, 'COLA', '3360', '2013-05-05 15:14:50'),
(186, 62, 4, 'Housing', '3780', '2013-05-05 15:14:50'),
(187, 63, 6, 'Clothing', '2832', '2013-05-05 15:14:52'),
(188, 63, 6, 'COLA', '3776', '2013-05-05 15:14:52'),
(189, 63, 6, 'Housing', '4248', '2013-05-05 15:14:52'),
(190, 64, 7, 'Clothing', '840', '2013-05-05 15:14:54'),
(191, 64, 7, 'COLA', '1120', '2013-05-05 15:14:54'),
(192, 64, 7, 'Housing', '1260', '2013-05-05 15:14:54'),
(193, 65, 8, 'Clothing', '2100', '2013-05-05 15:14:56'),
(194, 65, 8, 'COLA', '2800', '2013-05-05 15:14:56'),
(195, 65, 8, 'Housing', '3150', '2013-05-05 15:14:56'),
(196, 66, 9, 'Clothing', '1920', '2013-05-05 15:14:58'),
(197, 66, 9, 'COLA', '2560', '2013-05-05 15:14:58'),
(198, 66, 9, 'Housing', '2880', '2013-05-05 15:14:58'),
(199, 67, 10, 'Clothing', '1680', '2013-05-05 15:15:00'),
(200, 67, 10, 'COLA', '2240', '2013-05-05 15:15:00'),
(201, 67, 10, 'Housing', '2520', '2013-05-05 15:15:00'),
(202, 68, 1, 'Clothing', '2640', '2013-05-05 21:12:19'),
(203, 68, 1, 'COLA', '3520', '2013-05-05 21:12:19'),
(204, 68, 1, 'Housing', '3960', '2013-05-05 21:12:19'),
(205, 69, 2, 'Clothing', '4008', '2013-05-05 21:12:22'),
(206, 69, 2, 'COLA', '5344', '2013-05-05 21:12:22'),
(207, 69, 2, 'Housing', '6012', '2013-05-05 21:12:22'),
(208, 70, 4, 'Clothing', '2520', '2013-05-05 21:12:24'),
(209, 70, 4, 'COLA', '3360', '2013-05-05 21:12:24'),
(210, 70, 4, 'Housing', '3780', '2013-05-05 21:12:24'),
(211, 71, 6, 'Clothing', '2832', '2013-05-05 21:12:26'),
(212, 71, 6, 'COLA', '3776', '2013-05-05 21:12:26'),
(213, 71, 6, 'Housing', '4248', '2013-05-05 21:12:26'),
(214, 72, 7, 'Clothing', '840', '2013-05-05 21:12:28'),
(215, 72, 7, 'COLA', '1120', '2013-05-05 21:12:28'),
(216, 72, 7, 'Housing', '1260', '2013-05-05 21:12:28'),
(217, 73, 8, 'Clothing', '2100', '2013-05-05 21:12:30'),
(218, 73, 8, 'COLA', '2800', '2013-05-05 21:12:30'),
(219, 73, 8, 'Housing', '3150', '2013-05-05 21:12:30'),
(220, 74, 9, 'Clothing', '1920', '2013-05-05 21:12:32'),
(221, 74, 9, 'COLA', '2560', '2013-05-05 21:12:32'),
(222, 74, 9, 'Housing', '2880', '2013-05-05 21:12:32'),
(223, 75, 10, 'Clothing', '1680', '2013-05-05 21:12:34'),
(224, 75, 10, 'COLA', '2240', '2013-05-05 21:12:34'),
(225, 75, 10, 'Housing', '2520', '2013-05-05 21:12:34'),
(226, 76, 1, 'Clothing', '2640', '2013-05-05 21:17:49'),
(227, 76, 1, 'COLA', '3520', '2013-05-05 21:17:49'),
(228, 76, 1, 'Housing', '3960', '2013-05-05 21:17:49'),
(229, 77, 2, 'Clothing', '4008', '2013-05-05 21:17:51'),
(230, 77, 2, 'COLA', '5344', '2013-05-05 21:17:51'),
(231, 77, 2, 'Housing', '6012', '2013-05-05 21:17:51'),
(232, 78, 4, 'Clothing', '2520', '2013-05-05 21:17:54'),
(233, 78, 4, 'COLA', '3360', '2013-05-05 21:17:54'),
(234, 78, 4, 'Housing', '3780', '2013-05-05 21:17:54'),
(235, 79, 6, 'Clothing', '2832', '2013-05-05 21:17:56'),
(236, 79, 6, 'COLA', '3776', '2013-05-05 21:17:56'),
(237, 79, 6, 'Housing', '4248', '2013-05-05 21:17:56'),
(238, 80, 7, 'Clothing', '840', '2013-05-05 21:17:58'),
(239, 80, 7, 'COLA', '1120', '2013-05-05 21:17:58'),
(240, 80, 7, 'Housing', '1260', '2013-05-05 21:17:58'),
(241, 81, 8, 'Clothing', '2100', '2013-05-05 21:18:00'),
(242, 81, 8, 'COLA', '2800', '2013-05-05 21:18:00'),
(243, 81, 8, 'Housing', '3150', '2013-05-05 21:18:00'),
(244, 82, 9, 'Clothing', '1920', '2013-05-05 21:18:02'),
(245, 82, 9, 'COLA', '2560', '2013-05-05 21:18:02'),
(246, 82, 9, 'Housing', '2880', '2013-05-05 21:18:02'),
(247, 83, 10, 'Clothing', '1680', '2013-05-05 21:18:04'),
(248, 83, 10, 'COLA', '2240', '2013-05-05 21:18:04'),
(249, 83, 10, 'Housing', '2520', '2013-05-05 21:18:04'),
(250, 84, 1, 'Clothing', '2640', '2013-05-05 21:24:34'),
(251, 84, 1, 'COLA', '3520', '2013-05-05 21:24:34'),
(252, 84, 1, 'Housing', '3960', '2013-05-05 21:24:34'),
(253, 85, 2, 'Clothing', '4008', '2013-05-05 21:24:37'),
(254, 85, 2, 'COLA', '5344', '2013-05-05 21:24:37'),
(255, 85, 2, 'Housing', '6012', '2013-05-05 21:24:37'),
(256, 86, 4, 'Clothing', '2520', '2013-05-05 21:24:39'),
(257, 86, 4, 'COLA', '3360', '2013-05-05 21:24:39'),
(258, 86, 4, 'Housing', '3780', '2013-05-05 21:24:39'),
(259, 87, 6, 'Clothing', '2832', '2013-05-05 21:24:41'),
(260, 87, 6, 'COLA', '3776', '2013-05-05 21:24:41'),
(261, 87, 6, 'Housing', '4248', '2013-05-05 21:24:41'),
(262, 88, 7, 'Clothing', '840', '2013-05-05 21:24:43'),
(263, 88, 7, 'COLA', '1120', '2013-05-05 21:24:43'),
(264, 88, 7, 'Housing', '1260', '2013-05-05 21:24:43'),
(265, 89, 8, 'Clothing', '2100', '2013-05-05 21:24:45'),
(266, 89, 8, 'COLA', '2800', '2013-05-05 21:24:45'),
(267, 89, 8, 'Housing', '3150', '2013-05-05 21:24:45'),
(268, 90, 9, 'Clothing', '1920', '2013-05-05 21:24:47'),
(269, 90, 9, 'COLA', '2560', '2013-05-05 21:24:47'),
(270, 90, 9, 'Housing', '2880', '2013-05-05 21:24:47'),
(271, 91, 10, 'Clothing', '1680', '2013-05-05 21:24:49'),
(272, 91, 10, 'COLA', '2240', '2013-05-05 21:24:49'),
(273, 91, 10, 'Housing', '2520', '2013-05-05 21:24:49'),
(274, 92, 1, 'Clothing', '2640', '2013-05-05 21:28:17'),
(275, 92, 1, 'COLA', '3520', '2013-05-05 21:28:17'),
(276, 92, 1, 'Housing', '3960', '2013-05-05 21:28:17'),
(277, 93, 2, 'Clothing', '4008', '2013-05-05 21:28:19'),
(278, 93, 2, 'COLA', '5344', '2013-05-05 21:28:19'),
(279, 93, 2, 'Housing', '6012', '2013-05-05 21:28:19'),
(280, 94, 4, 'Clothing', '2520', '2013-05-05 21:28:21'),
(281, 94, 4, 'COLA', '3360', '2013-05-05 21:28:21'),
(282, 94, 4, 'Housing', '3780', '2013-05-05 21:28:21'),
(283, 95, 6, 'Clothing', '2832', '2013-05-05 21:28:22'),
(284, 95, 6, 'COLA', '3776', '2013-05-05 21:28:22'),
(285, 95, 6, 'Housing', '4248', '2013-05-05 21:28:22'),
(286, 96, 7, 'Clothing', '840', '2013-05-05 21:28:24'),
(287, 96, 7, 'COLA', '1120', '2013-05-05 21:28:24'),
(288, 96, 7, 'Housing', '1260', '2013-05-05 21:28:24'),
(289, 97, 8, 'Clothing', '2100', '2013-05-05 21:28:26'),
(290, 97, 8, 'COLA', '2800', '2013-05-05 21:28:26'),
(291, 97, 8, 'Housing', '3150', '2013-05-05 21:28:26'),
(292, 98, 9, 'Clothing', '1920', '2013-05-05 21:28:28'),
(293, 98, 9, 'COLA', '2560', '2013-05-05 21:28:28'),
(294, 98, 9, 'Housing', '2880', '2013-05-05 21:28:28'),
(295, 99, 10, 'Clothing', '1680', '2013-05-05 21:28:29'),
(296, 99, 10, 'COLA', '2240', '2013-05-05 21:28:29'),
(297, 99, 10, 'Housing', '2520', '2013-05-05 21:28:29'),
(298, 100, 1, 'Clothing', '2640', '2013-05-09 09:54:17'),
(299, 100, 1, 'COLA', '3520', '2013-05-09 09:54:17'),
(300, 100, 1, 'Housing', '3960', '2013-05-09 09:54:17'),
(301, 101, 1, 'Clothing', '2640', '2013-05-09 10:00:41'),
(302, 101, 1, 'COLA', '3520', '2013-05-09 10:00:41'),
(303, 101, 1, 'Housing', '3960', '2013-05-09 10:00:41'),
(304, 102, 2, 'Clothing', '4008', '2013-05-09 10:00:47'),
(305, 102, 2, 'COLA', '5344', '2013-05-09 10:00:47'),
(306, 102, 2, 'Housing', '6012', '2013-05-09 10:00:47'),
(307, 103, 4, 'Clothing', '2520', '2013-05-09 10:01:17'),
(308, 103, 4, 'COLA', '3360', '2013-05-09 10:01:17'),
(309, 103, 4, 'Housing', '3780', '2013-05-09 10:01:17'),
(310, 104, 6, 'Clothing', '2832', '2013-05-09 10:01:20'),
(311, 104, 6, 'COLA', '3776', '2013-05-09 10:01:20'),
(312, 104, 6, 'Housing', '4248', '2013-05-09 10:01:20'),
(313, 105, 7, 'Clothing', '840', '2013-05-09 10:01:23'),
(314, 105, 7, 'COLA', '1120', '2013-05-09 10:01:23'),
(315, 105, 7, 'Housing', '1260', '2013-05-09 10:01:23'),
(316, 106, 8, 'Clothing', '2100', '2013-05-09 10:01:26'),
(317, 106, 8, 'COLA', '2800', '2013-05-09 10:01:26'),
(318, 106, 8, 'Housing', '3150', '2013-05-09 10:01:26'),
(319, 107, 9, 'Clothing', '1920', '2013-05-09 10:01:28'),
(320, 107, 9, 'COLA', '2560', '2013-05-09 10:01:28'),
(321, 107, 9, 'Housing', '2880', '2013-05-09 10:01:28'),
(322, 108, 10, 'Clothing', '1680', '2013-05-09 10:01:31'),
(323, 108, 10, 'COLA', '2240', '2013-05-09 10:01:31'),
(324, 108, 10, 'Housing', '2520', '2013-05-09 10:01:31'),
(325, 109, 1, 'Clothing', '2640', '2013-07-27 04:09:05'),
(326, 109, 1, 'COLA', '3520', '2013-07-27 04:09:05'),
(327, 109, 1, 'Housing', '3960', '2013-07-27 04:09:05'),
(328, 110, 2, 'Clothing', '4008', '2013-07-27 04:09:08'),
(329, 110, 2, 'COLA', '5344', '2013-07-27 04:09:08'),
(330, 110, 2, 'Housing', '6012', '2013-07-27 04:09:08'),
(331, 111, 4, 'Clothing', '2520', '2013-07-27 04:09:10'),
(332, 111, 4, 'COLA', '3360', '2013-07-27 04:09:10'),
(333, 111, 4, 'Housing', '3780', '2013-07-27 04:09:10'),
(334, 112, 6, 'Clothing', '2832', '2013-07-27 04:09:12'),
(335, 112, 6, 'COLA', '3776', '2013-07-27 04:09:12'),
(336, 112, 6, 'Housing', '4248', '2013-07-27 04:09:12'),
(337, 113, 7, 'Clothing', '840', '2013-07-27 04:09:14'),
(338, 113, 7, 'COLA', '1120', '2013-07-27 04:09:14'),
(339, 113, 7, 'Housing', '1260', '2013-07-27 04:09:14'),
(340, 114, 8, 'Clothing', '2100', '2013-07-27 04:09:17'),
(341, 114, 8, 'COLA', '2800', '2013-07-27 04:09:17'),
(342, 114, 8, 'Housing', '3150', '2013-07-27 04:09:17'),
(343, 115, 9, 'Clothing', '1920', '2013-07-27 04:09:20'),
(344, 115, 9, 'COLA', '2560', '2013-07-27 04:09:20'),
(345, 115, 9, 'Housing', '2880', '2013-07-27 04:09:20'),
(346, 116, 10, 'Clothing', '1680', '2013-07-27 04:09:22'),
(347, 116, 10, 'COLA', '2240', '2013-07-27 04:09:22'),
(348, 116, 10, 'Housing', '2520', '2013-07-27 04:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `billsheets`
--

CREATE TABLE IF NOT EXISTS `billsheets` (
  `billsheet_id` int(10) NOT NULL AUTO_INCREMENT,
  `billsheet_no` varchar(100) NOT NULL,
  `billsheet_ttl` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `bunch_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`billsheet_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `billsheets`
--

INSERT INTO `billsheets` (`billsheet_id`, `billsheet_no`, `billsheet_ttl`, `client_id`, `bunch_id`, `user_id`, `date_generated`, `status`) VALUES
(1, 'SPTBN0001/2013', '63201', 1, 3, 1, '2013-03-23 12:21:53', 0),
(2, 'SPTBN0002/2013', '48201', 6, 1, 1, '2013-03-23 12:27:29', 0),
(3, 'SPTBN0003/2013', '202800', 6, 1, 1, '2013-04-02 12:29:14', 0),
(4, 'SPTBN0004/2013', '70800', 6, 2, 1, '2013-04-02 13:02:27', 0),
(5, 'SPTBN0005/2013', '0', 5, 0, 1, '2013-04-20 09:33:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `block_id` int(10) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(100) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `block_name`) VALUES
(45, 'Unity'),
(46, 'Paloch');

-- --------------------------------------------------------

--
-- Table structure for table `bunch`
--

CREATE TABLE IF NOT EXISTS `bunch` (
  `bunch_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `block_id` int(10) NOT NULL,
  `project_manager_id` int(10) NOT NULL,
  `period_from` varchar(100) NOT NULL,
  `period_to` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`bunch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bunch`
--

INSERT INTO `bunch` (`bunch_id`, `client_id`, `block_id`, `project_manager_id`, `period_from`, `period_to`, `date_recorded`, `status`) VALUES
(1, 6, 1, 1, ' 2013-03-20  ', ' 2013-03-29  ', '2013-03-21 16:04:30', 0),
(2, 6, 1, 1, ' 2013-03-31  ', ' 2013-04-25  ', '2013-03-21 16:09:05', 0),
(3, 1, 4, 3, ' 2013-03-19  ', ' 2013-03-29  ', '2013-03-21 16:35:53', 0),
(4, 1, 4, 3, ' 2013-03-31  ', ' 2013-04-30  ', '2013-03-22 11:01:55', 0),
(5, 2, 1, 2, ' 2013-03-04  ', ' 2013-03-26  ', '2013-03-22 17:36:37', 0),
(6, 6, 1, 1, ' 2013-04-24  ', ' 2013-04-30  ', '2013-04-03 11:45:17', 0),
(7, 6, 1, 1, ' 2013-04-30  ', ' 2013-05-31  ', '2013-04-02 12:28:10', 0),
(8, 5, 1, 2, ' 2013-04-16  ', ' 2013-04-30  ', '2013-04-09 00:31:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bunchold`
--

CREATE TABLE IF NOT EXISTS `bunchold` (
  `bunch_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `block_id` int(10) NOT NULL,
  `project_manager_id` int(10) NOT NULL,
  `period_from` varchar(100) NOT NULL,
  `period_to` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`bunch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bunchold`
--


-- --------------------------------------------------------

--
-- Table structure for table `cash_ledger`
--

CREATE TABLE IF NOT EXISTS `cash_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cash_ledger`
--

INSERT INTO `cash_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Cash Income Received on Donation', '10000', '10000', '', 2, '1', '2013-09-10 17:14:03'),
(2, 'Cash Income Received on wewe', '23000', '23000', '', 4, '2.9854', '2013-09-11 09:01:44'),
(3, 'Cash Expenses Paid on Rent', '-5600', '', '5600', 2, '1', '2013-09-11 09:21:53'),
(4, 'Shares for Sipake', '735000', '735000', '', 2, '1', '2013-09-11 09:30:35'),
(5, 'Shares for Nilepet', '765000', '765000', '', 2, '1', '2013-09-11 09:31:18'),
(6, 'Cash Expenses Paid on Purchase of diesel', '-4500', '', '4500', 4, '2.9854', '2013-09-11 09:44:10'),
(7, 'Visa Renewal Payment for  Richard Jino', '-300', '', '300', 2, '1', '2013-09-12 09:24:15'),
(8, 'Work Permit Renewal Payment for  Richard Jino', '-100', '', '100', 2, '1', '2013-09-12 14:18:37'),
(9, 'Work Permit Renewal Payment for  Richard Jino', '-566', '', '566', 2, '1', '2013-09-12 14:20:30'),
(10, 'Petty Expense Stationery', '-100', '', '100', 2, '1', '2013-09-12 15:24:30'),
(11, 'Visa Renewal Payment for Martin Chung', '-50', '', '50', 2, '1', '2013-09-12 15:40:22'),
(12, 'Visa Renewal Payment for William Ruto', '-50', '', '50', 2, '1', '2013-09-12 15:55:37'),
(13, 'Petty Expense refueling Vehicle No CE 751W', '-690', '', '690', 4, '2.9854', '2013-09-12 16:06:34'),
(14, 'Petty Expense Refuel Vehicle No CE 749W', '-690', '', '690', 4, '2.9854', '2013-09-12 16:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `cdp`
--

CREATE TABLE IF NOT EXISTS `cdp` (
  `cdp_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `vanue` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `total_part` int(10) NOT NULL,
  `male_part` varchar(100) NOT NULL,
  `female_part` varchar(100) NOT NULL,
  `facillitator` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `sponsor3` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cdp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cdp`
--

INSERT INTO `cdp` (`cdp_id`, `institution_id`, `user_id`, `country`, `date`, `vanue`, `topic`, `total_part`, `male_part`, `female_part`, `facillitator`, `sponsor1`, `sponsor2`, `sponsor3`, `remarks`, `date_recorded`) VALUES
(2, 1, 2, 'American Samoa', ' 2012-08-05  ', 'Lilongwe', 'Nature', 59, '56', '32', 'Kijabe', 'AMREF', 'SSFA', 'ROBA', 'good', '0000-00-00 00:00:00'),
(3, 2, 3, 'Bangladesh', ' 2012-09-23  ', 'Bangi', 'Marijuana', 0, '34', '12', 'Sign Shah', '3', '', '', '', '0000-00-00 00:00:00'),
(4, 1, 2, 'American Samoa', ' 2012-10-08  ', 'Kawangware', 'Drug Abuse', 20, '23', '4500', 'John Kuria', 'Amref', '', '', 'good turn up', '0000-00-00 00:00:00'),
(6, 1, 6, 'Andorra', ' 2013-01-14  ', 'Eastleigh', 'Women Empowerement', 34, '12', '23', 'End One, Spane One', 'USAID', 'Kenya Government', 'UKAID', 'Good', '0000-00-00 00:00:00'),
(7, 2, 6, 'Austria', ' 2013-01-15  ', 'Thika Institute', 'HIV/AIDS', 420, '400', '20', 'John Kuria', 'USAID', 'UKAID', '', 'Att.', '0000-00-00 00:00:00'),
(8, 1, 1, 'American Samoa', ' 2013-01-07  ', 'Area 4', 'Wining', 21, '222', '890', 'Justus Okanayo', 'Afyainfo', '', '', 'good in deed', '2013-01-22 18:52:12'),
(9, 3, 1, '', '', '', '', 0, '', '', '', '', '', '', '', '2013-03-15 16:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `block_id` int(10) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_town` varchar(100) NOT NULL,
  `c_paddress` varchar(100) NOT NULL,
  `c_phone` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `c_name`, `block_id`, `c_address`, `c_town`, `c_paddress`, `c_phone`, `contact_person`, `c_email`, `c_date_created`, `status`) VALUES
(15, 'GPOC', 45, 'Juba', 'Juba', '', '', '', '', '2013-09-10 16:40:29', 0),
(16, 'DPOC', 46, '33', 'Juba', '3455', 'RRR', 'FF', 'griffinsosero@yahoo.com', '2013-09-11 14:19:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE IF NOT EXISTS `client_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`transaction_id`, `client_id`, `transaction`, `amount`, `date_recorded`) VALUES
(1, 16, 'Service invoice SIPET/MP/INV-001/09-2013 for month September 2013', '  1290', '2013-09-11 14:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `curr_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(100) NOT NULL,
  `curr_initials` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`curr_id`, `curr_name`, `curr_initials`, `curr_rate`, `date_recorded`) VALUES
(2, 'US Dolars', 'USD', '1', '0000-00-00 00:00:00'),
(4, 'South Sudanese Pounds', 'SSP', '2.9854', '0000-00-00 00:00:00'),
(28, 'South Sudanese Pounds', 'SSP', '2.9854', '0000-00-00 00:00:00'),
(29, 'South Sudanese Pounds', 'SSP', '3.222', '2013-09-11 11:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `data_id_gen`
--

CREATE TABLE IF NOT EXISTS `data_id_gen` (
  `data_id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_id_gen`
--

INSERT INTO `data_id_gen` (`data_id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deduction_id` int(10) NOT NULL AUTO_INCREMENT,
  `deduction_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deduction_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `deduction_name`, `deduction_amount`) VALUES
(1, 'Employees S.I.C', '8');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_logs`
--

CREATE TABLE IF NOT EXISTS `deduction_logs` (
  `loan_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `deduction_name` varchar(100) NOT NULL,
  `deduction_amount` varchar(100) NOT NULL,
  `deduction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `deduction_logs`
--

INSERT INTO `deduction_logs` (`loan_log_id`, `payrol_basic_log_id`, `emp_id`, `deduction_name`, `deduction_amount`, `deduction_date`) VALUES
(1, 1, 1, 'Employees S.I.C', '1760', '2013-07-01 19:15:08'),
(2, 2, 2, 'Employees S.I.C', '2672', '2013-07-01 19:15:12'),
(3, 3, 4, 'Employees S.I.C', '1680', '2013-07-01 19:15:14'),
(4, 4, 6, 'Employees S.I.C', '1888', '2013-07-01 19:15:16'),
(5, 5, 7, 'Employees S.I.C', '560', '2013-07-01 19:15:17'),
(6, 6, 8, 'Employees S.I.C', '1400', '2013-07-01 19:15:19'),
(7, 7, 9, 'Employees S.I.C', '1280', '2013-07-01 19:15:21'),
(8, 8, 10, 'Employees S.I.C', '1120', '2013-07-01 19:15:23'),
(9, 9, 11, 'Employees S.I.C', '1758.4', '2013-07-01 19:15:25'),
(10, 10, 12, 'Employees S.I.C', '3648', '2013-07-01 19:15:27'),
(11, 11, 13, 'Employees S.I.C', '2596', '2013-07-01 19:15:29'),
(12, 12, 14, 'Employees S.I.C', '1024', '2013-07-01 19:15:30'),
(13, 13, 15, 'Employees S.I.C', '2632', '2013-07-01 19:15:32'),
(14, 14, 1, 'Employees S.I.C', '1760', '2013-06-04 19:20:47'),
(15, 15, 2, 'Employees S.I.C', '2672', '2013-06-04 19:20:49'),
(16, 16, 4, 'Employees S.I.C', '1680', '2013-06-04 19:20:51'),
(17, 17, 6, 'Employees S.I.C', '1888', '2013-06-04 19:20:53'),
(18, 18, 7, 'Employees S.I.C', '560', '2013-06-04 19:20:55'),
(19, 19, 8, 'Employees S.I.C', '1400', '2013-06-04 19:20:56'),
(20, 20, 9, 'Employees S.I.C', '1280', '2013-06-04 19:20:58'),
(21, 21, 10, 'Employees S.I.C', '1120', '2013-06-04 19:21:00'),
(22, 22, 11, 'Employees S.I.C', '1758.4', '2013-06-04 19:21:01'),
(23, 23, 12, 'Employees S.I.C', '3648', '2013-06-04 19:21:06'),
(24, 24, 13, 'Employees S.I.C', '2596', '2013-06-04 19:21:07'),
(25, 25, 14, 'Employees S.I.C', '1024', '2013-06-04 19:21:09'),
(26, 26, 15, 'Employees S.I.C', '2632', '2013-06-04 19:21:11'),
(27, 27, 1, 'Employees S.I.C', '1760', '2013-07-09 21:09:55'),
(28, 28, 2, 'Employees S.I.C', '2672', '2013-07-09 21:10:01'),
(29, 29, 4, 'Employees S.I.C', '1680', '2013-07-09 21:10:40'),
(30, 30, 6, 'Employees S.I.C', '1888', '2013-07-09 21:10:42'),
(31, 31, 7, 'Employees S.I.C', '560', '2013-07-09 21:10:44'),
(32, 32, 8, 'Employees S.I.C', '1400', '2013-07-09 21:10:46'),
(33, 33, 9, 'Employees S.I.C', '1280', '2013-07-09 21:10:49'),
(34, 34, 10, 'Employees S.I.C', '1120', '2013-07-09 21:10:51'),
(35, 35, 11, 'Employees S.I.C', '1758.4', '2013-07-09 21:10:54'),
(36, 36, 1, 'Employees S.I.C', '1760', '2013-08-15 21:11:56'),
(37, 37, 2, 'Employees S.I.C', '2672', '2013-08-15 21:11:59'),
(38, 38, 4, 'Employees S.I.C', '1680', '2013-08-15 21:12:01'),
(39, 39, 6, 'Employees S.I.C', '1888', '2013-08-15 21:12:03'),
(40, 40, 7, 'Employees S.I.C', '560', '2013-08-15 21:12:05'),
(41, 41, 8, 'Employees S.I.C', '1400', '2013-08-15 21:12:07'),
(42, 42, 9, 'Employees S.I.C', '1280', '2013-08-15 21:12:09'),
(43, 43, 10, 'Employees S.I.C', '1120', '2013-08-15 21:12:10'),
(44, 44, 1, 'Employees S.I.C', '1760', '2013-05-05 13:56:42'),
(45, 45, 2, 'Employees S.I.C', '2672', '2013-05-05 13:56:45'),
(46, 46, 4, 'Employees S.I.C', '1680', '2013-05-05 13:56:47'),
(47, 47, 6, 'Employees S.I.C', '1888', '2013-05-05 13:56:49'),
(48, 48, 7, 'Employees S.I.C', '560', '2013-05-05 13:56:51'),
(49, 49, 8, 'Employees S.I.C', '1400', '2013-05-05 13:56:53'),
(50, 50, 9, 'Employees S.I.C', '1280', '2013-05-05 13:56:55'),
(51, 51, 10, 'Employees S.I.C', '1120', '2013-05-05 13:56:58'),
(52, 52, 1, 'Employees S.I.C', '1760', '2013-05-05 15:10:44'),
(53, 53, 2, 'Employees S.I.C', '2672', '2013-05-05 15:10:47'),
(54, 54, 4, 'Employees S.I.C', '1680', '2013-05-05 15:10:49'),
(55, 55, 6, 'Employees S.I.C', '1888', '2013-05-05 15:10:51'),
(56, 56, 7, 'Employees S.I.C', '560', '2013-05-05 15:10:53'),
(57, 57, 8, 'Employees S.I.C', '1400', '2013-05-05 15:10:56'),
(58, 58, 9, 'Employees S.I.C', '1280', '2013-05-05 15:10:59'),
(59, 59, 10, 'Employees S.I.C', '1120', '2013-05-05 15:11:02'),
(60, 60, 1, 'Employees S.I.C', '1760', '2013-05-05 15:14:46'),
(61, 61, 2, 'Employees S.I.C', '2672', '2013-05-05 15:14:48'),
(62, 62, 4, 'Employees S.I.C', '1680', '2013-05-05 15:14:50'),
(63, 63, 6, 'Employees S.I.C', '1888', '2013-05-05 15:14:52'),
(64, 64, 7, 'Employees S.I.C', '560', '2013-05-05 15:14:54'),
(65, 65, 8, 'Employees S.I.C', '1400', '2013-05-05 15:14:56'),
(66, 66, 9, 'Employees S.I.C', '1280', '2013-05-05 15:14:58'),
(67, 67, 10, 'Employees S.I.C', '1120', '2013-05-05 15:15:00'),
(68, 68, 1, 'Employees S.I.C', '1760', '2013-05-05 21:12:19'),
(69, 69, 2, 'Employees S.I.C', '2672', '2013-05-05 21:12:22'),
(70, 70, 4, 'Employees S.I.C', '1680', '2013-05-05 21:12:24'),
(71, 71, 6, 'Employees S.I.C', '1888', '2013-05-05 21:12:26'),
(72, 72, 7, 'Employees S.I.C', '560', '2013-05-05 21:12:28'),
(73, 73, 8, 'Employees S.I.C', '1400', '2013-05-05 21:12:30'),
(74, 74, 9, 'Employees S.I.C', '1280', '2013-05-05 21:12:32'),
(75, 75, 10, 'Employees S.I.C', '1120', '2013-05-05 21:12:34'),
(76, 76, 1, 'Employees S.I.C', '1760', '2013-05-05 21:17:49'),
(77, 77, 2, 'Employees S.I.C', '2672', '2013-05-05 21:17:51'),
(78, 78, 4, 'Employees S.I.C', '1680', '2013-05-05 21:17:54'),
(79, 79, 6, 'Employees S.I.C', '1888', '2013-05-05 21:17:56'),
(80, 80, 7, 'Employees S.I.C', '560', '2013-05-05 21:17:58'),
(81, 81, 8, 'Employees S.I.C', '1400', '2013-05-05 21:18:00'),
(82, 82, 9, 'Employees S.I.C', '1280', '2013-05-05 21:18:02'),
(83, 83, 10, 'Employees S.I.C', '1120', '2013-05-05 21:18:04'),
(84, 84, 1, 'Employees S.I.C', '1760', '2013-05-05 21:24:34'),
(85, 85, 2, 'Employees S.I.C', '2672', '2013-05-05 21:24:37'),
(86, 86, 4, 'Employees S.I.C', '1680', '2013-05-05 21:24:39'),
(87, 87, 6, 'Employees S.I.C', '1888', '2013-05-05 21:24:41'),
(88, 88, 7, 'Employees S.I.C', '560', '2013-05-05 21:24:43'),
(89, 89, 8, 'Employees S.I.C', '1400', '2013-05-05 21:24:45'),
(90, 90, 9, 'Employees S.I.C', '1280', '2013-05-05 21:24:47'),
(91, 91, 10, 'Employees S.I.C', '1120', '2013-05-05 21:24:49'),
(92, 92, 1, 'Employees S.I.C', '1760', '2013-05-05 21:28:17'),
(93, 93, 2, 'Employees S.I.C', '2672', '2013-05-05 21:28:19'),
(94, 94, 4, 'Employees S.I.C', '1680', '2013-05-05 21:28:21'),
(95, 95, 6, 'Employees S.I.C', '1888', '2013-05-05 21:28:22'),
(96, 96, 7, 'Employees S.I.C', '560', '2013-05-05 21:28:24'),
(97, 97, 8, 'Employees S.I.C', '1400', '2013-05-05 21:28:26'),
(98, 98, 9, 'Employees S.I.C', '1280', '2013-05-05 21:28:28'),
(99, 99, 10, 'Employees S.I.C', '1120', '2013-05-05 21:28:29'),
(100, 100, 1, 'Employees S.I.C', '1760', '2013-05-09 09:54:17'),
(101, 101, 1, 'Employees S.I.C', '1760', '2013-05-09 10:00:41'),
(102, 102, 2, 'Employees S.I.C', '2672', '2013-05-09 10:00:47'),
(103, 103, 4, 'Employees S.I.C', '1680', '2013-05-09 10:01:17'),
(104, 104, 6, 'Employees S.I.C', '1888', '2013-05-09 10:01:20'),
(105, 105, 7, 'Employees S.I.C', '560', '2013-05-09 10:01:23'),
(106, 106, 8, 'Employees S.I.C', '1400', '2013-05-09 10:01:26'),
(107, 107, 9, 'Employees S.I.C', '1280', '2013-05-09 10:01:28'),
(108, 108, 10, 'Employees S.I.C', '1120', '2013-05-09 10:01:31'),
(109, 109, 1, 'Employees S.I.C', '1760', '2013-07-27 04:09:05'),
(110, 110, 2, 'Employees S.I.C', '2672', '2013-07-27 04:09:08'),
(111, 111, 4, 'Employees S.I.C', '1680', '2013-07-27 04:09:10'),
(112, 112, 6, 'Employees S.I.C', '1888', '2013-07-27 04:09:12'),
(113, 113, 7, 'Employees S.I.C', '560', '2013-07-27 04:09:14'),
(114, 114, 8, 'Employees S.I.C', '1400', '2013-07-27 04:09:17'),
(115, 115, 9, 'Employees S.I.C', '1280', '2013-07-27 04:09:20'),
(116, 116, 10, 'Employees S.I.C', '1120', '2013-07-27 04:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(8, 'Cost/Estimator'),
(3, 'Leadership'),
(9, 'Engineer Office'),
(7, 'Audit'),
(10, 'Procurement'),
(11, 'Finance'),
(12, 'Planning/Control');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosis_id` int(10) NOT NULL AUTO_INCREMENT,
  `outreach_record_id` int(10) NOT NULL,
  `disease_id` int(10) NOT NULL,
  `total_pat` int(10) NOT NULL,
  `male_pat` int(10) NOT NULL,
  `female_pat` int(10) NOT NULL,
  `child_pat` int(10) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`diagnosis_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `outreach_record_id`, `disease_id`, `total_pat`, `male_pat`, `female_pat`, `child_pat`, `remarks`) VALUES
(1, 1, 8, 45, 32, 32, 22, 'Good\r\n'),
(3, 3, 3, 32, 21, 19, 34, 'good attendance\r\n'),
(4, 7, 3, 56, 46, 21, 23, 'nice'),
(5, 8, 1, 34, 11, 34, 21, 'sss'),
(6, 9, 8, 444, 222, 34, 21, 'www'),
(7, 11, 4, 222222, 222222, 222222, 22, 'good'),
(8, 12, 1, 300, 200, 50, 50, 'Good Record'),
(9, 12, 1, 300, 200, 50, 50, 'Good Record'),
(12, 14, 7, 5, 5, 5, 5, 'Indeed good');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosisold`
--

CREATE TABLE IF NOT EXISTS `diagnosisold` (
  `diagnosis_id` int(10) NOT NULL AUTO_INCREMENT,
  `outreach_record_id` int(10) NOT NULL,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_from` varchar(100) NOT NULL,
  `date_to` varchar(100) NOT NULL,
  `cat_male` int(10) NOT NULL,
  `cat_female` int(10) NOT NULL,
  `cat_child` int(10) NOT NULL,
  `glauc_male` int(10) NOT NULL,
  `glauc_female` int(10) NOT NULL,
  `glauc_child` int(10) NOT NULL,
  `trauma_male` int(10) NOT NULL,
  `trauma_female` int(10) NOT NULL,
  `trauma_child` int(10) NOT NULL,
  `cornea_ulcers_male` int(10) NOT NULL,
  `cornea_ulcers_female` int(10) NOT NULL,
  `cornea_ulcers_child` int(10) NOT NULL,
  `uveitis_male` int(10) NOT NULL,
  `uveitis_female` int(10) NOT NULL,
  `uveitis_child` int(10) NOT NULL,
  `conjuct_male` int(10) NOT NULL,
  `conjuct_female` int(10) NOT NULL,
  `conjuct_child` int(10) NOT NULL,
  `reflective_error_male` int(10) NOT NULL,
  `reflective_error_female` int(10) NOT NULL,
  `reflective_error_child` int(10) NOT NULL,
  `squint_male` int(10) NOT NULL,
  `squint_female` int(10) NOT NULL,
  `squint_child` int(10) NOT NULL,
  `others_male` int(10) NOT NULL,
  `others_female` int(10) NOT NULL,
  `others_child` int(10) NOT NULL,
  PRIMARY KEY (`diagnosis_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `diagnosisold`
--

INSERT INTO `diagnosisold` (`diagnosis_id`, `outreach_record_id`, `institution_id`, `user_id`, `date_from`, `date_to`, `cat_male`, `cat_female`, `cat_child`, `glauc_male`, `glauc_female`, `glauc_child`, `trauma_male`, `trauma_female`, `trauma_child`, `cornea_ulcers_male`, `cornea_ulcers_female`, `cornea_ulcers_child`, `uveitis_male`, `uveitis_female`, `uveitis_child`, `conjuct_male`, `conjuct_female`, `conjuct_child`, `reflective_error_male`, `reflective_error_female`, `reflective_error_child`, `squint_male`, `squint_female`, `squint_child`, `others_male`, `others_female`, `others_child`) VALUES
(1, 1, 2, 2, ' 2012-09-10  ', ' 2012-09-20  ', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(4, 4, 2, 1, ' 2012-11-05  ', ' 2012-11-30  ', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(3, 3, 2, 2, ' 2012-09-11  ', ' 2012-09-26  ', 66, 66, 44, 78, 43, 23, 90, 3, 6, 5, 78, 43, 66, 43, 90, 43, 67, 32, 65, 32, 677, 32, 42, 56, 78, 709, 432);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE IF NOT EXISTS `diseases` (
  `disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`disease_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_id`, `disease_name`, `description`, `status`) VALUES
(1, 'Conjuctivitis', '', 0),
(2, 'Refractive Error', '', 0),
(3, 'Squint', '', 0),
(6, 'Corneal Ulcers', '', 0),
(7, 'Cataract Surgeries', '', 0),
(8, 'Others', '', 0),
(10, 'Uveitis', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `drop_down`
--

CREATE TABLE IF NOT EXISTS `drop_down` (
  `dropdown_id` int(10) NOT NULL AUTO_INCREMENT,
  `form_field_id` int(10) NOT NULL,
  `dropdown_name` varchar(100) NOT NULL,
  PRIMARY KEY (`dropdown_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `drop_down`
--

INSERT INTO `drop_down` (`dropdown_id`, `form_field_id`, `dropdown_name`) VALUES
(1, 5, 'Male'),
(2, 5, 'Female'),
(3, 13, 'Father'),
(4, 13, 'Distant Relative'),
(5, 15, 'Father'),
(6, 15, 'Mother'),
(7, 15, 'Cousin'),
(8, 13, 'Aunt'),
(9, 13, 'Son'),
(10, 13, 'Daughter'),
(11, 3, 'Male'),
(12, 3, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `education_description`
--

CREATE TABLE IF NOT EXISTS `education_description` (
  `education_bg_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `education_description` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`education_bg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `education_description`
--

INSERT INTO `education_description` (`education_bg_id`, `emp_id`, `education_description`, `status`) VALUES
(4, 5, 'Did masters in HR management', 0),
(3, 3, 'PhD Masters', 0),
(5, 7, 'Langas Primary School, Then Wareng High School, Kenyata University', 0),
(6, 26, 'Dgreedddddddd', 0),
(7, 26, 'Dgreedddddddd', 0),
(8, 11, 'University of Indiana masters in ecosystem', 0),
(9, 4, 'Primary School education', 0),
(10, 2, 'Learnt very well', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE IF NOT EXISTS `email_config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `smtpHost` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `smtpUser` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `smtpPass` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `smtpPort` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `security` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `mailfrom` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `mailto` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `body` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `smtpHost`, `smtpUser`, `smtpPass`, `smtpPort`, `security`, `mailfrom`, `mailto`, `subject`, `body`) VALUES
(1, 'ssl://smtp.gmail.com', 'updateosero', 'mogeni86', '465', 'ssl', 'updateosero@gmail.com', 'gosero@topsoftchoice.com', 'Hi', 'Have a good day');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `emp_fname` varchar(100) NOT NULL,
  `emp_mname` varchar(100) NOT NULL,
  `emp_lname` varchar(100) NOT NULL,
  `department_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `begining_date_of_first_job` varchar(100) NOT NULL,
  `joining_date` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `work_place` varchar(100) NOT NULL,
  `staff_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `employment_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `height` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `weight` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `blood_group` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `place_of_birth` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `terminate` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `nation_code` (`joining_date`),
  KEY `job_title_code` (`weight`),
  KEY `emp_status` (`height`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_no`, `emp_fname`, `emp_mname`, `emp_lname`, `department_id`, `title`, `gender`, `dob`, `nationality`, `begining_date_of_first_job`, `joining_date`, `work_place`, `staff_type`, `employment_type`, `marital_status`, `religion`, `height`, `weight`, `blood_group`, `place_of_birth`, `photo`, `status`, `terminate`) VALUES
(1, 'RS001', 'Everett ', 'Kamandala', 'Minga', '3', '6', 'Male', '2013-04-07', 'Southern Sudanese', ' 2013-04-09  ', ' 2013-04-09  ', '1', '1', 'Permanent', 'Single', 'Christian', '21', '43', 'A+', 'Juba', 'CAM00075.jpg', 0, 0),
(2, 'RS002', ' Richard', 'Kenyi ', 'Jino', '7', '7', 'Male', '2013-04-14', 'Southern Sudanese', ' 2013-04-01  ', ' 2013-04-17  ', '1', '1', 'Permanent', 'Married', 'Christian', '21', '34', 'A+', 'Juba', 'categories.png', 0, 0),
(4, 'RS003', 'Charity  ', 'Lekea ', 'Mananyu', '8', '8', 'Male', '2013-04-09', 'Southern Sudanese', ' 2013-04-15  ', ' 2013-04-22  ', '1', '1', 'Permanent', 'Married', 'Christian', '21', '34', 'AB+', 'Juba', 'CAM00135.jpg', 0, 0),
(6, 'RS005', ' Innocent ', 'Ewot ', 'Ohide', '9', '20', 'Male', '2013-04-08', 'Southern Sudanese', ' 2013-04-15  ', ' 2013-04-23  ', '7', '1', '0', 'Single', 'Christian', '40', '5', 'A+', 'Nairobi', 'Boston City Flow.jpg', 0, 0),
(7, 'RS007', ' Abiel ', 'Peter ', 'Monywach', '9', '21', 'Male', '2013-04-15', 'Southern Sudanese', ' 2013-04-15  ', ' 2013-04-16  ', '7', '1', 'Permanent', 'Single', 'Christian', '56', '78', 'A+', 'Juba', '', 0, 0),
(8, 'RS008', ' Clement ', 'Manosona ', 'Lako', '9', '22', 'Male', '2013-04-15', 'Southern Sudanese', ' 2013-04-08  ', ' 2013-04-23  ', '7', '1', 'Contract', 'Separated', 'Muslim', '6', '54', 'AB+', 'deng', '', 1, 0),
(9, 'RS009', 'Aluong', ' Garang ', 'Nhial', '9', '24', 'Male', '2013-04-08', 'South Sudanesse', '', ' 2013-06-17  ', '7', '1', 'Permanent', 'Single', 'Christian', '345', '87', 'A-', 'Juba', 'Boston City Flow.jpg', 1, 0),
(10, 'RS010', ' James ', 'Simon ', 'Ajak Akwang', '9', '26', 'Male', '2013-04-15', 'Southern Sudanese', ' 2013-04-14  ', ' 2013-04-22  ', '7', '1', 'Permanent', '0', '', '', '', '0', '', '', 1, 0),
(11, 'RS011', 'Mohd ', 'Nadziri ', 'Bin Ismail', '9', '18', 'Male', '2013-04-15', 'Malaysia', ' 2013-04-14  ', ' 2013-04-24  ', '7', '2', 'Contract', 'Single', 'Christian', '6', '5', '0', '', '', 0, 0),
(12, 'RS012', ' Zawawi ', 'Bin ', 'Zainol', '9', '21', 'Male', '2013-04-10', 'Malaysia', ' 2013-04-08  ', ' 2013-04-26  ', '7', '2', 'Contract', 'Single', 'Muslim', '12', '23', 'A+', 'Malaysa', 'Boston City Flow.jpg', 0, 0),
(13, 'RS013', ' Jajah ', 'Enab ', 'Komaruddin', '9', '23', 'Male', '2013-04-08', 'Malaysia', ' 2013-04-15  ', ' 2013-04-23  ', '7', '2', 'Permanent', 'Single', '', '', '', '0', '', 'safaricom-logo.png', 0, 0),
(37, 'RS037', 'Griffins', 'Mogeni', 'Osero', '', '', 'Female', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'passportphoto.jpg', 0, 0),
(15, 'RS0198', ' Prasad ', 'Shrikrishna ', 'Devdhar', '11', '24', 'Male', '2013-04-16', 'Malaysia', ' 2013-04-15  ', ' 2013-04-16  ', '7', '2', 'Permanent', 'Single', 'Hindu', '34', '', '0', '', 'CAM00182.jpg', 1, 0),
(26, 'RE026', 'Martin', 'Cingel', 'Chung', '9', '24', 'Male', '2013-06-05', 'Czech', ' 2013-06-18  ', ' 2013-06-02  ', '7', '2', 'Permanent', 'Single', 'Christian', '23.4', '200', 'A-', 'Czech', 'Boston City Flow.jpg', 1, 0),
(25, 'RE025', 'Johnstone', 'Muthama', 'Kingoo', '8', '4', 'Male', '2013-04-15', 'Kenyan', ' 2013-04-15  ', ' 2013-04-16  ', '7', '2', '0', 'Single', 'Christian', '65', '76', 'B+', 'Juba', '', 0, 0),
(35, 'RS035', 'Joseph', 'Kamotho', 'Moi', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'logo.png', 0, 0),
(34, 'RS034', 'William', 'Samoei', 'Ruto', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', '', 0, 0),
(36, 'RS036', 'Dianah', 'Kerubo', 'Nyabuto', '8', '14', 'Female', '0000-00-00', 'Kenyan', ' 2013-09-09  ', ' 2013-09-16  ', '1', '1', '', '', 'Christian', '', '76', 'AB+', 'Kisii', 'CAM00303.jpg', 0, 0),
(39, 'RS1', 'Adm', 'Adm', 'Adm', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(40, 'RS2', 'HR', 'HR', 'HR', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(41, 'RS3', 'OM', 'OM', 'OM', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(42, 'RS4', 'FIN', 'FIN', 'FIN', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(43, 'RS5', 'MANGE', 'MANGE', 'MANGE', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(44, 'RS060', 'Emmanuel', 'Gabriel Gele', 'Mattia', '0', '0', '', '0000-00-00', '', '', '', '0', '1', '0', '0', '', '', '', '0', '', '', 0, 0),
(45, 'RS045', '1', '2', '3', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exited_shareholder`
--

CREATE TABLE IF NOT EXISTS `exited_shareholder` (
  `exited_shareholder_id` int(10) NOT NULL AUTO_INCREMENT,
  `shares_id` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `reason` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`exited_shareholder_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exited_shareholder`
--

INSERT INTO `exited_shareholder` (`exited_shareholder_id`, `shares_id`, `reason`, `status`) VALUES
(1, '1', 'ded', 0),
(2, '2', 'resigned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `curr_id` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`expense_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `description`, `curr_id`, `curr_rate`, `amount`, `mop`, `date_of_transaction`) VALUES
(1, 1, 'test 3000', '2', '1', '459879', 'Cash', '2013-04-27 15:16:53'),
(4, 23, 'Rent', '2', '1', '5600', 'Cash', '2013-09-11 09:21:53'),
(5, 23, 'Purchase of diesel', '4', '2.9854', '4500', 'Cash', '2013-09-11 09:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_ledger`
--

CREATE TABLE IF NOT EXISTS `expenses_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=335 ;

--
-- Dumping data for table `expenses_ledger`
--

INSERT INTO `expenses_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(20, 'genearl expense', '30000', '30000', '', 4, '2.98677', '2013-04-27 15:08:25'),
(21, 'test 3000', '459879', '459879', '', 2, '1', '2013-09-08 13:25:53'),
(22, 'expensessd', '34000', '34000', '', 4, '2.98677', '2013-04-27 15:21:25'),
(316, 'Salary for exp Johnstone Kingoo for month May 2013', '32900', '32900', '', 2, '2.9854', '2013-05-09 10:03:10'),
(317, 'Salary for exp Martin Chung for month May 2013', '25000', '25000', '', 2, '2.9854', '2013-05-09 10:03:13'),
(315, 'Salary for exp  Prasad  Devdhar for month May 2013', '32900', '32900', '', 2, '2.9854', '2013-05-09 10:03:05'),
(313, 'Salary for exp  Jajah  Komaruddin for month May 2013', '32450', '32450', '', 2, '2.9854', '2013-05-09 10:03:00'),
(314, 'Salary for exp  Mohd Redzuan  Rafiee for month May 2013', '12800', '12800', '', 2, '2.9854', '2013-05-09 10:03:02'),
(312, 'Salary for exp  Zawawi  Zainol for month May 2013', '45600', '45600', '', 2, '2.9854', '2013-05-09 10:02:58'),
(311, 'Salary for exp Mohd  Bin Ismail for month May 2013', '21980', '21980', '', 2, '2.9854', '2013-05-09 10:02:56'),
(303, 'Salary for nat  James  Ajak Akwang for month May 2013', '11929.073357', '11929.073357', '', 2, '2.9854', '2013-05-09 10:01:31'),
(302, 'Salary for nat Aluong Nhial for month May 2013', '13631.073357', '13631.073357', '', 2, '2.9854', '2013-05-09 10:01:28'),
(301, 'Salary for nat  Clement  Lako for month May 2013', '14907.573357', '14907.573357', '', 2, '2.9854', '2013-05-09 10:01:26'),
(300, 'Salary for nat  Abiel  Monywach for month May 2013', '5972.073357', '5972.073357', '', 2, '2.9854', '2013-05-09 10:01:23'),
(299, 'Salary for nat  Innocent  Ohide for month May 2013', '20098.673357', '20098.673357', '', 2, '2.9854', '2013-05-09 10:01:20'),
(298, 'Salary for nat Charity   Mananyu for month May 2013', '17886.073357', '17886.073357', '', 2, '2.9854', '2013-05-09 10:01:17'),
(297, 'Salary for nat  Richard Jino for month May 2013', '28438.473357', '28438.473357', '', 2, '2.9854', '2013-05-09 10:00:47'),
(296, 'Salary for nat Everett  Minga for month May 2013', '18737.073357', '18737.073357', '', 2, '2.9854', '2013-05-09 10:00:41'),
(318, 'Salary for nat Everett  Minga for month July 2013', '18737.073357004', '18737.073357004', '', 2, '2.9854', '2013-07-27 04:09:05'),
(319, 'Salary for nat  Richard Jino for month July 2013', '28438.473357004', '28438.473357004', '', 2, '2.9854', '2013-07-27 04:09:08'),
(320, 'Salary for nat Charity   Mananyu for month July 2013', '17886.073357004', '17886.073357004', '', 2, '2.9854', '2013-07-27 04:09:10'),
(321, 'Salary for nat  Innocent  Ohide for month July 2013', '20098.673357004', '20098.673357004', '', 2, '2.9854', '2013-07-27 04:09:12'),
(322, 'Salary for nat  Abiel  Monywach for month July 2013', '5972.0733570041', '5972.0733570041', '', 2, '2.9854', '2013-07-27 04:09:14'),
(323, 'Salary for nat  Clement  Lako for month July 2013', '14907.573357004', '14907.573357004', '', 2, '2.9854', '2013-07-27 04:09:17'),
(324, 'Salary for nat Aluong Nhial for month July 2013', '13631.073357004', '13631.073357004', '', 2, '2.9854', '2013-07-27 04:09:20'),
(325, 'Salary for nat  James  Ajak Akwang for month July 2013', '11929.073357004', '11929.073357004', '', 2, '2.9854', '2013-07-27 04:09:22'),
(327, 'General Air Ticket for Juma Abdala', '32000', '32000', '', 2, '1', '2013-09-09 11:31:07'),
(328, 'Rent', '5600', '5600', '', 2, '1', '2013-09-11 09:21:53'),
(329, 'Purchase of diesel', '4500', '4500', '', 4, '2.9854', '2013-09-11 09:44:10'),
(330, 'Visa Renewal for  Richard Jino', '300', '300', '', 2, '1', '2013-09-12 09:24:15'),
(331, 'Work Permit Renewal for  Richard Jino', '100', '100', '', 2, '1', '2013-09-12 14:18:37'),
(332, 'Work Permit Renewal for  Richard Jino', '566', '566', '', 2, '1', '2013-09-12 14:20:30'),
(333, 'Visa Renewal for Martin Chung', '50', '50', '', 2, '1', '2013-09-12 15:40:22'),
(334, 'Visa Renewal for William Ruto', '50', '50', '', 2, '1', '2013-09-12 15:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `exp_benefits`
--

CREATE TABLE IF NOT EXISTS `exp_benefits` (
  `benefit_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exp_benefits`
--

INSERT INTO `exp_benefits` (`benefit_id`, `benefit_name`, `benefit_amount`) VALUES
(1, 'Safety Allowance', '30'),
(2, 'Regional Allowance', '20');

-- --------------------------------------------------------

--
-- Table structure for table `exp_pay_slips`
--

CREATE TABLE IF NOT EXISTS `exp_pay_slips` (
  `payslip_id` int(10) NOT NULL AUTO_INCREMENT,
  `payslip_no` varchar(100) NOT NULL,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `gross_salary` varchar(100) NOT NULL,
  `ttl_allowances` varchar(100) NOT NULL,
  `ttl_deductions` varchar(100) NOT NULL,
  `net_salary` varchar(100) NOT NULL,
  `date_printed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_printed2` varchar(100) NOT NULL,
  `month_printed` varchar(100) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `exp_pay_slips`
--

INSERT INTO `exp_pay_slips` (`payslip_id`, `payslip_no`, `payrol_basic_log_id`, `emp_id`, `gross_salary`, `ttl_allowances`, `ttl_deductions`, `net_salary`, `date_printed`, `date_printed2`, `month_printed`) VALUES
(60, 'SPTEX0079/2013', 79, 26, '25000', '82715', '3735', '25000', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(59, 'SPTEX0080/2013', 80, 25, '7500', '70215', '1110', '7500', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(58, 'SPTEX0082/2013', 82, 11, '21980', '66465', '3282', '21980', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(57, 'SPTEX0081/2013', 81, 12, '45600', '55475', '6825', '45600', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(56, 'SPTEX0083/2013', 83, 13, '32450', '32675', '4852', '32450', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(55, 'SPTEX0084/2013', 84, 15, '32900', '16450', '4920', '32900', '2013-09-12 10:30:07', '2013-09-12', 'September 2013');

-- --------------------------------------------------------

--
-- Table structure for table `family_status`
--

CREATE TABLE IF NOT EXISTS `family_status` (
  `family_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `family_address` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `family_members` longtext COLLATE latin1_general_ci NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`family_status_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `family_status`
--

INSERT INTO `family_status` (`family_status_id`, `emp_id`, `family_address`, `zip_code`, `family_members`, `status`) VALUES
(5, 7, '2407 - Eldoret', '+254', 'Zacharia Onyonka', 0),
(4, 5, '2564', '254', 'zxzx', 0),
(3, 5, '', '254', 'John Kimari, Issack Lenaula', 0),
(6, 26, 'der', '254', 'Zack, John, KImani', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets`
--

CREATE TABLE IF NOT EXISTS `fixed_assets` (
  `fixed_asset_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_purchased` date NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `dep_value` varchar(100) NOT NULL,
  `salvage_value` varchar(100) NOT NULL,
  `dep_perc` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fixed_assets`
--

INSERT INTO `fixed_assets` (`fixed_asset_id`, `fixed_asset_name`, `description`, `date_purchased`, `currency`, `curr_rate`, `value`, `dep_value`, `salvage_value`, `dep_perc`, `amount_paid`, `date_recorded`, `status`) VALUES
(1, 'Ofiice Laptops', 'new ones', '2013-09-02', 2, '1', '230000', '44000', '10000', '5', '230000', '2013-09-09 03:16:37', 0),
(2, 'Van and Cars', 'dsdsd', '2013-09-01', 2, '1', '560000', '48000', '320000', '5', '560000', '2013-09-09 03:21:42', 0),
(3, 'House and Land', 'rr', '2013-09-02', 4, '2.9854', '4500000', '729183.33333333', '124900', '6', '4500000', '2013-09-09 03:23:24', 0),
(4, '', '', '0000-00-00', 0, '', '', '', '', '', '', '2013-09-10 16:13:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assetsold`
--

CREATE TABLE IF NOT EXISTS `fixed_assetsold` (
  `fixed_asset_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_purchased` date NOT NULL,
  `qnty` int(10) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `ttl_value` varchar(100) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `dep_perc` varchar(100) NOT NULL,
  `dep_value` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fixed_assetsold`
--

INSERT INTO `fixed_assetsold` (`fixed_asset_id`, `fixed_asset_name`, `description`, `date_purchased`, `qnty`, `unit_cost`, `ttl_value`, `currency`, `curr_rate`, `dep_perc`, `dep_value`, `amount_paid`, `date_recorded`, `status`) VALUES
(1, 'Dell Computer Laptop', 'dell', '2013-02-01', 2, '2000', '4000', 2, '1', '2', '80', '4000', '2013-04-28 06:00:29', 0),
(3, 'Van and Cars', 'dell', '2013-04-30', 1, '2000000', '2000000', 4, '2.98677', '2', '40000', '2000000', '2013-04-28 06:50:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets_ledger`
--

CREATE TABLE IF NOT EXISTS `fixed_assets_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `fixed_assets_ledger`
--

INSERT INTO `fixed_assets_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Purchase of fixed asset Dell Computer Laptop', '4000', '4000', '', 2, '1', '2013-04-28 06:00:29'),
(3, 'Purchase of fixed asset Van and Cars', '2000000', '2000000', '', 4, '2.98677', '2013-04-28 06:50:46'),
(4, 'Purchase of fixed asset Van and Cars', '560000', '560000', '', 2, '1', '2013-09-09 03:21:42'),
(5, 'Purchase of fixed asset House and Land', '4500000', '4500000', '', 4, '2.9854', '2013-09-09 03:23:24'),
(6, 'Purchase of fixed asset ', '', '', '', 0, '', '2013-09-10 16:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets_payments`
--

CREATE TABLE IF NOT EXISTS `fixed_assets_payments` (
  `fixed_assets_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_id` int(10) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fixed_assets_payments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fixed_assets_payments`
--

INSERT INTO `fixed_assets_payments` (`fixed_assets_payments_id`, `fixed_asset_id`, `currency`, `curr_rate`, `amount_paid`, `date_recorded`) VALUES
(10, 1, 1, '1', '230000', '2013-09-09 04:02:45'),
(8, 2, 2, '1', '560000', '2013-09-09 03:21:42'),
(9, 3, 4, '2.9854', '4500000', '2013-09-09 03:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE IF NOT EXISTS `form_fields` (
  `form_field_id` int(10) NOT NULL AUTO_INCREMENT,
  `form_section_id` int(10) NOT NULL,
  `form_field_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `form_field_type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `sort_order` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`form_field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`form_field_id`, `form_section_id`, `form_field_name`, `form_field_type`, `sort_order`, `status`) VALUES
(1, 1, 'First Name', 'TextBox', 1, 0),
(2, 1, 'Date Of Birth', 'calendar', 3, 0),
(3, 1, 'Gender', 'Select', 21, 0),
(4, 1, 'Place Of Birth', 'TextBox', 3, 0),
(6, 7, 'Gross Salary / Net Salary', 'TextBox', 3, 0),
(7, 7, 'Effective Date', 'calendar', 5, 0),
(8, 4, 'Passport Number', 'TextBox', 3, 0),
(9, 2, 'Visa Number', 'TextBox', 4, 0),
(10, 2, 'Visa Date Of Issue', 'calendar', 4, 0),
(11, 5, 'xx', 'Select', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_sections`
--

CREATE TABLE IF NOT EXISTS `form_sections` (
  `form_section_id` int(10) NOT NULL AUTO_INCREMENT,
  `form_section_name` varchar(100) NOT NULL,
  `sort_order` int(10) NOT NULL,
  PRIMARY KEY (`form_section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `form_sections`
--

INSERT INTO `form_sections` (`form_section_id`, `form_section_name`, `sort_order`) VALUES
(1, 'Employees Bio Data Details', 8),
(2, 'Employee Visa Details', 15),
(3, 'Employee Education Background', 2),
(4, 'Passport Details', 19),
(5, 'Prizes And Honours', 4),
(6, 'Dependant Details', 29),
(7, 'Salary Details', 3);

-- --------------------------------------------------------

--
-- Table structure for table `genairtickets`
--

CREATE TABLE IF NOT EXISTS `genairtickets` (
  `genairticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `dep_town` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dep_date` varchar(100) NOT NULL,
  `dest_town` varchar(100) NOT NULL,
  `arrive_date` varchar(100) NOT NULL,
  `ret_date` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_comp` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_cost` varchar(11) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`genairticket_id`),
  KEY `emp_status` (`flight_comp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `genairtickets`
--

INSERT INTO `genairtickets` (`genairticket_id`, `full_name`, `dep_town`, `dep_date`, `dest_town`, `arrive_date`, `ret_date`, `flight_comp`, `flight_no`, `flight_cost`, `remarks`, `status`, `date_recorded`) VALUES
(7, 'Juma Abdala', 'Monroe', ' 2013-09-02  ', 'Juba', ' 2013-09-24  ', ' 2013-09-30  ', 'KQ234', '456876', '32000', 'travelled ', 0, '2013-09-09 11:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `general_ledger`
--

CREATE TABLE IF NOT EXISTS `general_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Purchase of Fixed Asset ()', '', '', '', 0, '', '2013-09-10 16:13:41', 0),
(2, 'Accounts Payables ( Purchase of Fixed Asset  )', '-', '', '', 0, '', '2013-09-10 16:13:41', 0),
(3, 'Service invoice(SIPET/MP/INV-001/09-2013) for month September 2013', '-  1140', '', '  1140', 2, '1', '2013-09-10 16:48:05', 0),
(4, 'Accounts Receivables invoice SIPET/MP/INV-001/09-2013 for month September 2013', '  1140', '  1140', '', 2, '1', '2013-09-10 16:48:05', 0),
(5, 'Donation', '-10000', '', '10000', 2, '1', '2013-09-10 17:14:03', 0),
(6, 'Cash Income Received on Donation', '10000', '10000', '', 2, '1', '2013-09-10 17:14:03', 0),
(7, 'wewe', '-23000', '', '23000', 4, '2.9854', '2013-09-11 09:01:44', 0),
(8, 'Cash Income Received on wewe', '23000', '23000', '', 4, '2.9854', '2013-09-11 09:01:44', 0),
(9, ' Subcontractor Invoice innnn', '89000', '89000', '', 2, '1', '2013-09-11 09:10:57', 0),
(10, 'Accounts Payables (Subcontractor Invoice innnn)', '-89000', '', '89000', 2, '1', '2013-09-11 09:10:57', 0),
(11, 'Rent', '5600', '5600', '', 2, '1', '2013-09-11 09:21:53', 0),
(12, 'Cash Expenses Paid on Rent', '-5600', '', '5600', 2, '1', '2013-09-11 09:21:53', 0),
(13, 'Shares for Sipake', '-735000', '', '735000', 2, '1', '2013-09-11 09:30:35', 0),
(14, 'Cash Shares for Sipake', '735000', '735000', '', 2, '1', '2013-09-11 09:30:35', 0),
(15, 'Shares for Nilepet', '-765000', '', '765000', 2, '1', '2013-09-11 09:31:18', 0),
(16, 'Cash Shares for Nilepet', '765000', '765000', '', 2, '1', '2013-09-11 09:31:18', 0),
(17, 'Purchase of diesel', '4500', '4500', '', 4, '2.9854', '2013-09-11 09:44:10', 0),
(18, 'Cash Expenses Paid on Purchase of diesel', '-4500', '', '4500', 4, '2.9854', '2013-09-11 09:44:10', 0),
(19, 'Service invoice(SIPET/MP/INV-001/09-2013) for month September 2013', '-  1290', '', '  1290', 2, '1', '2013-09-11 14:43:19', 0),
(20, 'Accounts Receivables invoice SIPET/MP/INV-001/09-2013 for month September 2013', '  1290', '  1290', '', 2, '1', '2013-09-11 14:43:19', 0),
(21, 'Visa Renewal Payment for  Richard Jino', '-300', '', '300', 2, '1', '2013-09-12 09:24:15', 0),
(22, 'Visa Renewal Expenses for  Richard Jino', '300', '300', '', 2, '1', '2013-09-12 09:24:15', 0),
(23, 'Work Permit Renewal Payment for  Richard Jino', '-100', '', '100', 2, '1', '2013-09-12 14:18:37', 0),
(24, 'Work Permit Renewal Expenses for  Richard Jino', '100', '100', '', 2, '1', '2013-09-12 14:18:37', 0),
(25, 'Work Permit Renewal Payment for  Richard Jino', '-566', '', '566', 2, '1', '2013-09-12 14:20:30', 0),
(26, 'Work Permit Renewal Expenses for  Richard Jino', '566', '566', '', 2, '1', '2013-09-12 14:20:30', 0),
(27, 'Visa Renewal Payment for Martin Chung', '-50', '', '50', 2, '1', '2013-09-12 15:40:22', 0),
(28, 'Visa Renewal Expenses for Martin Chung', '50', '50', '', 2, '1', '2013-09-12 15:40:22', 0),
(29, 'Visa Renewal Payment for William Ruto', '-50', '', '50', 2, '1', '2013-09-12 15:55:37', 0),
(30, 'Visa Renewal Expenses for William Ruto', '50', '50', '', 2, '1', '2013-09-12 15:55:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gledger`
--

CREATE TABLE IF NOT EXISTS `gledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gledger`
--

INSERT INTO `gledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'dsdsds', '-wwewe', '', 'wwewe', 2, '97.2', '2013-04-03 17:28:31', 0),
(2, 'Cash Income Received on dsdsds', 'wwewe', 'wwewe', '', 2, '97.2', '2013-04-03 17:28:31', 0),
(3, 'rent', '300', '300', '', 2, '97.2', '2013-04-04 05:18:53', 0),
(4, 'Cash Expenses Paid on rent', '-300', '', '300', 2, '97.2', '2013-04-04 05:18:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_id_gen`
--

CREATE TABLE IF NOT EXISTS `history_id_gen` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `history_id_gen`
--

INSERT INTO `history_id_gen` (`history_id`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `hr_form_logs`
--

CREATE TABLE IF NOT EXISTS `hr_form_logs` (
  `hr_form_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `form_id` int(10) NOT NULL,
  `data_id` int(11) NOT NULL,
  `response` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`hr_form_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hr_form_logs`
--

INSERT INTO `hr_form_logs` (`hr_form_log_id`, `form_id`, `data_id`, `response`) VALUES
(1, 1, 2, 'Griffins Osero'),
(2, 2, 2, ' 2013-09-01  '),
(3, 3, 2, 'Male'),
(4, 4, 2, 'Eldoret'),
(5, 9, 2, 'V456VXXXX'),
(6, 10, 2, ' 2013-09-24  '),
(7, 8, 2, 'P45673PP'),
(8, 6, 2, '4500'),
(9, 7, 2, ' 2013-09-15  ');

-- --------------------------------------------------------

--
-- Table structure for table `hr_form_logs_history`
--

CREATE TABLE IF NOT EXISTS `hr_form_logs_history` (
  `hr_form_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `form_id` int(10) NOT NULL,
  `data_id` int(11) NOT NULL,
  `history_id` int(11) NOT NULL,
  `response` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`hr_form_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `hr_form_logs_history`
--

INSERT INTO `hr_form_logs_history` (`hr_form_log_id`, `form_id`, `data_id`, `history_id`, `response`) VALUES
(1, 1, 2, 1, 'Griffins Osero'),
(2, 2, 2, 1, ' 2013-09-01  '),
(3, 3, 2, 1, 'Male'),
(4, 4, 2, 1, 'Eldoret'),
(5, 9, 2, 1, 'V456'),
(6, 10, 2, 1, ' 2013-09-15  '),
(7, 8, 2, 1, '45677'),
(8, 6, 2, 1, '4500'),
(9, 7, 2, 1, ' 2013-09-15  '),
(10, 1, 2, 2, 'Griffins Osero'),
(11, 2, 2, 2, ' 2013-09-01  '),
(12, 3, 2, 2, 'Male'),
(13, 4, 2, 2, 'Eldoret'),
(14, 9, 2, 2, 'V456'),
(15, 10, 2, 2, ' 2013-09-15  '),
(16, 8, 2, 2, 'P45673PP'),
(17, 6, 2, 2, '4500'),
(18, 7, 2, 2, ' 2013-09-15  '),
(19, 1, 2, 3, 'Griffins Osero'),
(20, 2, 2, 3, ' 2013-09-01  '),
(21, 3, 2, 3, 'Male'),
(22, 4, 2, 3, 'Eldoret'),
(23, 9, 2, 3, 'V456V'),
(24, 10, 2, 3, ' 2013-09-15  '),
(25, 8, 2, 3, 'P45673PP'),
(26, 6, 2, 3, '4500'),
(27, 7, 2, 3, ' 2013-09-15  '),
(28, 1, 2, 4, 'Griffins Osero'),
(29, 2, 2, 4, ' 2013-09-01  '),
(30, 3, 2, 4, 'Male'),
(31, 4, 2, 4, 'Eldoret'),
(32, 9, 2, 4, 'V456VXXXX'),
(33, 10, 2, 4, ' 2013-09-24  '),
(34, 8, 2, 4, 'P45673PP'),
(35, 6, 2, 4, '4500'),
(36, 7, 2, 4, ' 2013-09-15  ');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `user_id`, `description`, `curr_id`, `curr_rate`, `amount`, `mop`, `date_of_transaction`) VALUES
(1, 1, 'General one', 2, '1', '3500000', 'Cash', '2013-09-08 10:59:24'),
(3, 24, 'etret', 2, '1', '3000000', 'Cash', '2013-09-10 09:57:17'),
(4, 24, 'Go', 4, '2.9854', '500000', 'Bank Transfer', '2013-09-10 09:57:41'),
(5, 19, 'Test income', 2, '1', '34000', 'Cash', '2013-09-10 14:52:07'),
(6, 19, 'Donation', 2, '1', '10000', 'Cash', '2013-09-10 17:14:03'),
(7, 23, 'wewe', 4, '2.9854', '23000', 'Cash', '2013-09-11 09:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `income_ledger`
--

CREATE TABLE IF NOT EXISTS `income_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `income_ledger`
--

INSERT INTO `income_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'General one', '4000000', '', '4000000', 2, '1', '2013-04-27 14:54:14'),
(2, 'Grant from governament', '32499', '', '32499', 2, '1', '2013-09-08 12:58:12'),
(3, 'etret', '3000000', '', '3000000', 2, '1', '2013-09-10 09:57:17'),
(4, 'Go', '500000', '', '500000', 4, '2.9854', '2013-09-10 09:57:41'),
(5, 'Test income', '34000', '', '34000', 2, '1', '2013-09-10 14:52:07'),
(6, 'Donation', '10000', '', '10000', 2, '1', '2013-09-10 17:14:03'),
(7, 'wewe', '23000', '', '23000', 4, '2.9854', '2013-09-11 09:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `insitution`
--

CREATE TABLE IF NOT EXISTS `insitution` (
  `institution_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(100) NOT NULL,
  PRIMARY KEY (`institution_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `insitution`
--

INSERT INTO `insitution` (`institution_id`, `institution_name`) VALUES
(1, 'University Of Nairobi'),
(2, 'Kenyatta University'),
(3, 'SIPET Engineering Services Limited'),
(4, 'Chuka University');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) NOT NULL,
  `contract_no` varchar(100) NOT NULL,
  `days_spent` varchar(10) NOT NULL,
  `manhours_amount` varchar(100) NOT NULL,
  `visa_charges` varchar(10) NOT NULL,
  `per_dem` varchar(10) NOT NULL,
  `flight_charges` varchar(10) NOT NULL,
  `invoice_ttl` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `month_generated` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_no`, `contract_no`, `days_spent`, `manhours_amount`, `visa_charges`, `per_dem`, `flight_charges`, `invoice_ttl`, `client_id`, `project_id`, `user_id`, `date_generated`, `month_generated`, `status`) VALUES
(1, 'SIPET/MP/INV-001/09-2013', '56YTY  ', '3', '1290', '0', '0', '0', '  1290', 16, 11, 19, '2013-09-11 14:43:19', 'September ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_generated` varchar(100) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoice_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
  `job_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`job_cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`job_cat_id`, `job_cat_name`) VALUES
(1, 'National'),
(2, 'Expertriate');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `loan_id` int(10) NOT NULL AUTO_INCREMENT,
  `loan_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `default_amount` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loan_id`, `loan_name`, `default_amount`) VALUES
(1, 'Morgage', '70000');

-- --------------------------------------------------------

--
-- Table structure for table `man_hours`
--

CREATE TABLE IF NOT EXISTS `man_hours` (
  `man_hours_id` int(10) NOT NULL AUTO_INCREMENT,
  `man_hours_value` varchar(100) NOT NULL,
  PRIMARY KEY (`man_hours_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `man_hours`
--

INSERT INTO `man_hours` (`man_hours_id`, `man_hours_value`) VALUES
(2, '12'),
(3, '6');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `sort_order` int(10) NOT NULL,
  `link` longtext NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `sort_order`, `link`, `description`, `status`) VALUES
(1, 'Home', 1, '<li class="top"><a href="home.php?monitor=monitor" class="top_link"><span>Home</span></a></li>', 'Home Page', 0),
(3, 'System Settings', 2, '<a href="#" id="products" class="top_link"><span class="down">System Settings</span></a>', 'System settings', 0),
(4, 'Access Control', 3, '<a href="#" id="services" class="top_link"><span class="down">Access Control</span></a>', 'Manage access levels', 0),
(5, 'Projects And Contracts', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Projects And Contracts</span></a>', 'Project managenet panel', 0),
(6, 'Human Resource Managenement', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Human Resource Managenement</span></a>', 'Management of human resource', 0),
(7, 'General Transactions', 5, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Finance And Accounting', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Finance And Accounting</span></a>', 'desk', 0),
(9, 'Consolidated System Reports', 8, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Consolidated System Reports</span></a>', 'General Reports for administrator', 0),
(11, 'Staff Details Management', 1, '<a href="home.php?viewpostgraduate=viewpostgraduate" id="services" class="top_link"><span class="down">Staff Details Management</span></a>', 'Employees self service', 0),
(12, 'Print My Payslip', 5, '<a href="home.php?viewpayslip=viewpayslip" id="services" class="top_link"><span class="down">Print My Payslip</span></a>', 'Print My Payslip', 0),
(13, 'Audit Trails', 100, '<a href="home.php?audittrails=audittrails" id="services" class="top_link"><span class="down">Audit Trails</span></a>', '', 0),
(14, 'Approving Financial Transactions', 5, '<a href="home.php?audittrails=audittrails" id="services" class="top_link"><span class="down">Approving Financial Transactions</span></a>', '', 0),
(16, 'Peter Test', 5, '<a href="home.php?petertest=petertest" id="services" class="top_link"><span class="down">Peter Test</span></a>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_submodules`
--

CREATE TABLE IF NOT EXISTS `modules_submodules` (
  `modules_submodules_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `sub_module_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`modules_submodules_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `modules_submodules`
--

INSERT INTO `modules_submodules` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
(20, 3, 6, 0),
(19, 3, 5, 0),
(18, 3, 4, 0),
(17, 3, 3, 0),
(16, 3, 2, 0),
(15, 3, 1, 0),
(7, 4, 7, 0),
(8, 4, 8, 0),
(9, 4, 9, 0),
(10, 4, 10, 0),
(96, 5, 11, 0),
(97, 5, 57, 0),
(98, 5, 56, 0),
(99, 5, 23, 0),
(100, 5, 14, 0),
(108, 6, 43, 0),
(106, 5, 59, 0),
(105, 5, 58, 0),
(94, 5, 12, 0),
(37, 7, 20, 0),
(38, 7, 21, 0),
(39, 7, 22, 0),
(59, 7, 34, 0),
(41, 8, 24, 0),
(60, 8, 34, 0),
(56, 8, 25, 0),
(44, 8, 27, 0),
(61, 9, 36, 0),
(46, 8, 29, 0),
(47, 9, 33, 0),
(50, 9, 30, 0),
(51, 9, 31, 0),
(52, 9, 32, 0),
(55, 8, 26, 0),
(58, 8, 35, 0),
(64, 9, 38, 0),
(63, 9, 37, 0),
(65, 9, 26, 0),
(66, 4, 39, 0),
(84, 6, 52, 0),
(87, 6, 50, 0),
(85, 6, 48, 0),
(89, 6, 47, 0),
(80, 6, 49, 0),
(103, 5, 6, 0),
(81, 6, 46, 0),
(102, 5, 53, 0),
(90, 6, 45, 0),
(95, 5, 15, 0),
(104, 5, 55, 0),
(111, 6, 61, 0),
(107, 5, 54, 0),
(109, 6, 44, 0),
(110, 3, 60, 0),
(112, 6, 62, 0),
(113, 6, 63, 0),
(114, 5, 64, 0);

-- --------------------------------------------------------

--
-- Table structure for table `natairtickets`
--

CREATE TABLE IF NOT EXISTS `natairtickets` (
  `airticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `dep_town` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dep_date` varchar(100) NOT NULL,
  `dest_town` varchar(100) NOT NULL,
  `arrive_date` varchar(100) NOT NULL,
  `ret_date` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_comp` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `flight_cost` varchar(11) NOT NULL,
  `remarks` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`airticket_id`),
  KEY `emp_status` (`flight_comp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `natairtickets`
--

INSERT INTO `natairtickets` (`airticket_id`, `emp_id`, `dep_town`, `dep_date`, `dest_town`, `arrive_date`, `ret_date`, `flight_comp`, `flight_no`, `flight_cost`, `remarks`, `status`, `date_recorded`) VALUES
(3, 2, 'Juba', ' 2013-04-14  ', 'kol', ' 2013-04-22  ', ' 2013-04-29  ', 'Fly 540', '4567', '340', 'sasa', 0, '2013-04-25 13:43:57'),
(2, 6, 'Juba', ' 2013-05-15  ', 'Mahan', ' 2013-04-16  ', ' 2013-04-30  ', 'Fly 540', '34TY', '210', 'good', 0, '2013-05-09 09:18:53'),
(5, 11, 'Juba', ' 2013-04-08  ', 'Juba', ' 2013-04-24  ', ' 2013-04-30  ', 'Fly 540', '3456ty', '389', 'dood', 0, '2013-04-25 13:58:45'),
(6, 14, 'Juba', ' 2013-04-14  ', 'kol', ' 2013-04-14  ', ' 2013-04-22  ', 'Fly 540', 'ftr543', '210', 'good', 0, '2013-04-25 14:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `net_profit`
--

CREATE TABLE IF NOT EXISTS `net_profit` (
  `net_profit_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`net_profit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `net_profit`
--

INSERT INTO `net_profit` (`net_profit_id`, `amount`, `date_recorded`) VALUES
(1, '6211370.8326076', '2013-09-11 08:49:28'),
(2, '6211370.8326076', '2013-09-11 08:49:28'),
(3, '6211370.8326076', '2013-09-11 08:49:28'),
(4, '6211370.8326076', '2013-09-11 08:49:28'),
(5, '6211370.8326076', '2013-09-11 08:49:28'),
(6, '6211370.8326076', '2013-09-11 08:49:28'),
(7, '6211370.8326076', '2013-09-11 08:49:28'),
(8, '6211370.8326076', '2013-09-11 08:49:28'),
(9, '6211370.8326076', '2013-09-11 08:49:28'),
(10, '6211370.8326076', '2013-09-11 08:49:28'),
(11, '6211370.8326076', '2013-09-11 08:49:28'),
(12, '6211370.8326076', '2013-09-11 08:49:28'),
(13, '6211370.8326076', '2013-09-11 08:49:28'),
(14, '6211370.8326076', '2013-09-11 08:49:28'),
(15, '6211370.8326076', '2013-09-11 08:49:28'),
(16, '6211370.8326076', '2013-09-11 08:49:28'),
(17, '6211370.8326076', '2013-09-11 08:49:28'),
(18, '6211370.8326076', '2013-09-11 08:49:28'),
(19, '6211370.8326076', '2013-09-11 08:49:28'),
(20, '6211370.8326076', '2013-09-11 08:49:28'),
(21, '6211370.8326076', '2013-09-11 08:49:28'),
(22, '6211370.8326076', '2013-09-11 08:49:28'),
(40, '6211370.8326076', '2013-09-11 08:49:28'),
(39, '6211370.8326076', '2013-09-11 08:49:28'),
(41, '6211370.8326076', '2013-09-11 08:49:28'),
(42, '6211370.8326076', '2013-09-11 08:49:28'),
(43, '6211370.8326076', '2013-09-11 08:49:28'),
(26, '6211370.8326076', '2013-09-11 08:49:28'),
(23, '6211370.8326076', '2013-09-11 08:49:28'),
(24, '6211370.8326076', '2013-09-11 08:49:28'),
(25, '6211370.8326076', '2013-09-11 08:49:28'),
(27, '6211370.8326076', '2013-09-11 08:49:28'),
(28, '6211370.8326076', '2013-09-11 08:49:28'),
(31, '6211370.8326076', '2013-09-11 08:49:28'),
(37, '6211370.8326076', '2013-09-11 08:49:28'),
(30, '6211370.8326076', '2013-09-11 08:49:28'),
(29, '6211370.8326076', '2013-09-11 08:49:28'),
(38, '6211370.8326076', '2013-09-11 08:49:28'),
(36, '6211370.8326076', '2013-09-11 08:49:28'),
(32, '6211370.8326076', '2013-09-11 08:49:28'),
(33, '6211370.8326076', '2013-09-11 08:49:28'),
(34, '6211370.8326076', '2013-09-11 08:49:28'),
(35, '6211370.8326076', '2013-09-11 08:49:28'),
(45, '6211370.8326076', '2013-09-11 08:49:28'),
(44, '6211370.8326076', '2013-09-11 08:49:28'),
(50, '6211370.8326076', '2013-09-11 08:49:28'),
(49, '6211370.8326076', '2013-09-11 08:49:28'),
(48, '6211370.8326076', '2013-09-11 08:49:28'),
(46, '6211370.8326076', '2013-09-11 08:49:28'),
(47, '6211370.8326076', '2013-09-11 08:49:28'),
(51, '6211370.8326076', '2013-09-11 08:49:28'),
(52, '6211370.8326076', '2013-09-11 08:49:28'),
(53, '6211370.8326076', '2013-09-11 08:49:28'),
(54, '6211370.8326076', '2013-09-11 08:49:28'),
(55, '6211370.8326076', '2013-09-11 08:49:28'),
(56, '6211370.8326076', '2013-09-11 08:49:28'),
(57, '6211370.8326076', '2013-09-11 08:49:28'),
(58, '6211370.8326076', '2013-09-11 08:49:28'),
(59, '6211370.8326076', '2013-09-11 08:49:28'),
(60, '6211370.8326076', '2013-09-11 08:49:28'),
(61, '6211370.8326076', '2013-09-11 08:49:28'),
(62, '6211370.8326076', '2013-09-11 08:49:28'),
(63, '6211370.8326076', '2013-09-11 08:49:28'),
(64, '6211370.8326076', '2013-09-11 08:49:28'),
(65, '6211370.8326076', '2013-09-11 08:49:28'),
(66, '6211370.8326076', '2013-09-11 08:49:28'),
(67, '6211370.8326076', '2013-09-11 08:49:28'),
(68, '6211370.8326076', '2013-09-11 08:49:28'),
(69, '6211370.8326076', '2013-09-11 08:49:28'),
(70, '6211370.8326076', '2013-09-11 08:49:28'),
(71, '6211370.8326076', '2013-09-11 08:49:28'),
(72, '6211370.8326076', '2013-09-11 08:49:28'),
(73, '6211370.8326076', '2013-09-11 08:49:28'),
(74, '6211370.8326076', '2013-09-11 08:49:28'),
(75, '6211370.8326076', '2013-09-11 08:49:28'),
(76, '6211370.8326076', '2013-09-11 08:49:28'),
(77, '6211370.8326076', '2013-09-11 08:49:28'),
(78, '6211370.8326076', '2013-09-11 08:49:28'),
(79, '6211370.8326076', '2013-09-11 08:49:28'),
(80, '6211370.8326076', '2013-09-11 08:49:28'),
(81, '6211370.8326076', '2013-09-11 08:49:28'),
(82, '6211370.8326076', '2013-09-11 08:49:28'),
(83, '6211370.8326076', '2013-09-11 08:49:28'),
(84, '6211370.8326076', '2013-09-11 08:49:28'),
(85, '6211370.8326076', '2013-09-11 08:49:28'),
(86, '6211370.8326076', '2013-09-11 08:49:28'),
(87, '6211370.8326076', '2013-09-11 08:49:28'),
(88, '6211370.8326076', '2013-09-11 08:49:28'),
(89, '6211370.8326076', '2013-09-11 08:49:28'),
(90, '6211370.8326076', '2013-09-11 08:49:28'),
(91, '6211370.8326076', '2013-09-11 08:49:28'),
(92, '6211370.8326076', '2013-09-11 08:49:28'),
(93, '6211370.8326076', '2013-09-11 08:49:28'),
(94, '6211370.8326076', '2013-09-11 08:49:28'),
(95, '6211370.8326076', '2013-09-11 08:49:20'),
(96, '6302474.9928541', '2013-09-11 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `nhif_block`
--

CREATE TABLE IF NOT EXISTS `nhif_block` (
  `nhif_block_id` int(20) NOT NULL AUTO_INCREMENT,
  `nhif_max` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nhif_min` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nhif_amount` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`nhif_block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nhif_block`
--

INSERT INTO `nhif_block` (`nhif_block_id`, `nhif_max`, `nhif_min`, `nhif_amount`) VALUES
(1, '1000', '0', '100'),
(2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `off_duty_staff`
--

CREATE TABLE IF NOT EXISTS `off_duty_staff` (
  `assigned_staff_id` int(11) NOT NULL,
  `project_id` int(10) NOT NULL,
  `project_manager` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `exit_date` date NOT NULL,
  `staff` int(10) NOT NULL,
  `work_place` varchar(100) NOT NULL,
  `segment` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `off_duty_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `omclients`
--

CREATE TABLE IF NOT EXISTS `omclients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_town` varchar(100) NOT NULL,
  `c_paddress` varchar(100) NOT NULL,
  `c_phone` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `omclients`
--

INSERT INTO `omclients` (`client_id`, `c_name`, `c_address`, `c_town`, `c_paddress`, `c_phone`, `contact_person`, `c_email`, `c_date_created`, `status`) VALUES
(1, 'South Sudan Co.', 'dsds', 'dsdsd', 'dsds', 'dsdsd', 'fgfgf', 'updateosero@gmail.com', '2013-03-27 03:29:39', 0),
(2, 'Salba Khirr Firm', 'cvcv', 'vcv', 'vcvcv', 'cvcvc', 'bbb', 'griffinsosero@yahoo.com', '2013-03-27 03:30:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omconsultants`
--

CREATE TABLE IF NOT EXISTS `omconsultants` (
  `consultant_id` int(10) NOT NULL AUTO_INCREMENT,
  `cons_name` varchar(100) NOT NULL,
  `cons_address` varchar(100) NOT NULL,
  `cons_town` varchar(100) NOT NULL,
  `cons_cp_address` varchar(100) NOT NULL,
  `cons_phone` varchar(100) NOT NULL,
  `cons_contact_person` varchar(100) NOT NULL,
  `cons_email` varchar(100) NOT NULL,
  `cons_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`consultant_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `omconsultants`
--

INSERT INTO `omconsultants` (`consultant_id`, `cons_name`, `cons_address`, `cons_town`, `cons_cp_address`, `cons_phone`, `cons_contact_person`, `cons_email`, `cons_date_created`, `status`) VALUES
(1, 'Wartsilla', 'P.O. BOX 236', 'Ayaibei', 'Kibo Street', '0973244', 'Won Ike', 'info@watsilla.com', '2013-05-09 13:29:20', 0),
(2, 'CPECC', 'P.O. BOX 234', 'Juba', 'Juba City Street', '07342511', 'Khirr', 'updateosero@gmail.com', '2013-05-09 13:28:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omjobtitle_locations`
--

CREATE TABLE IF NOT EXISTS `omjobtitle_locations` (
  `omjobtitle_location_id` int(10) NOT NULL AUTO_INCREMENT,
  `omjob_title_id` int(10) NOT NULL,
  `omlocation_id` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`omjobtitle_location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `omjobtitle_locations`
--

INSERT INTO `omjobtitle_locations` (`omjobtitle_location_id`, `omjob_title_id`, `omlocation_id`, `status`) VALUES
(1, 6, 1, 0),
(2, 11, 2, 0),
(3, 12, 2, 0),
(4, 13, 2, 0),
(5, 14, 2, 0),
(6, 5, 1, 0),
(7, 8, 1, 0),
(8, 9, 1, 0),
(9, 4, 1, 0),
(10, 2, 1, 0),
(11, 3, 1, 0),
(12, 10, 1, 0),
(13, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `omjob_titles`
--

CREATE TABLE IF NOT EXISTS `omjob_titles` (
  `omjob_title_id` int(10) NOT NULL AUTO_INCREMENT,
  `omjob_title_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`omjob_title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `omjob_titles`
--

INSERT INTO `omjob_titles` (`omjob_title_id`, `omjob_title_name`, `status`) VALUES
(1, 'Project Manager', 0),
(2, 'General Manager', 0),
(15, 'Document Controller', 0),
(4, 'Managing Director', 0),
(5, 'Supervisor', 0),
(6, 'President', 0),
(7, 'Internal Audit Manager', 1),
(8, 'Cost Estimation Controller', 1),
(18, 'Technical Cordinator', 0),
(19, 'Operations& Maintaince Manager', 0),
(11, 'Driver & Maintenance', 0),
(16, 'Accounts Officer', 0),
(14, 'Office Assistant', 0),
(20, 'Mechanical Engineer', 0),
(21, 'Electrical Engineer', 0),
(22, 'Instru & Control Engineer', 0),
(23, 'Senior Technician', 0),
(24, 'Technician', 0),
(25, 'Logistic & Aviation', 0),
(26, 'Transmission Line Technician', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omjob_titlesold`
--

CREATE TABLE IF NOT EXISTS `omjob_titlesold` (
  `omjob_title_id` int(10) NOT NULL AUTO_INCREMENT,
  `omjob_title_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`omjob_title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `omjob_titlesold`
--

INSERT INTO `omjob_titlesold` (`omjob_title_id`, `omjob_title_name`, `status`) VALUES
(2, 'O & M  Manager', 1),
(3, 'Operation Supervisors', 1),
(4, 'Mechanical Engineer', 1),
(5, 'Electrical Engineer', 1),
(6, 'C&I Engineer', 1),
(7, 'Shift supervisor', 1),
(8, 'Electrical Technician', 1),
(9, 'Mechanical  Technicians', 1),
(10, 'Operators PP1,2 and PS1', 1),
(11, ' Transmission line and Substation supervisors ', 1),
(12, 'Transmission line shift supervisor', 1),
(13, 'Substation Technicians', 1),
(14, 'Transmission line Technicians', 1);

-- --------------------------------------------------------

--
-- Table structure for table `omlocations`
--

CREATE TABLE IF NOT EXISTS `omlocations` (
  `omlocation_id` int(10) NOT NULL AUTO_INCREMENT,
  `omlocation_name` varchar(100) NOT NULL,
  PRIMARY KEY (`omlocation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `omlocations`
--

INSERT INTO `omlocations` (`omlocation_id`, `omlocation_name`) VALUES
(1, 'Power Plant'),
(2, 'Transmission Lines and Substations');

-- --------------------------------------------------------

--
-- Table structure for table `omper_day_rates`
--

CREATE TABLE IF NOT EXISTS `omper_day_rates` (
  `omper_day_rates_id` int(10) NOT NULL AUTO_INCREMENT,
  `omjob_title_id` int(10) NOT NULL,
  `job_cat_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`omper_day_rates_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `omper_day_rates`
--

INSERT INTO `omper_day_rates` (`omper_day_rates_id`, `omjob_title_id`, `job_cat_id`, `amount`, `status`) VALUES
(1, 20, 1, '600', 0),
(2, 20, 2, '900', 0),
(3, 21, 2, '793', 0),
(4, 22, 2, '1110', 0),
(16, 23, 1, '680', 0),
(6, 26, 2, '565', 0),
(7, 18, 2, '750', 0),
(8, 23, 2, '645', 0),
(9, 21, 1, '540', 0),
(10, 22, 1, '210', 0),
(18, 24, 2, '670', 0),
(12, 26, 1, '410', 0),
(17, 18, 1, '200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omstaff`
--

CREATE TABLE IF NOT EXISTS `omstaff` (
  `omstaff_id` int(10) NOT NULL AUTO_INCREMENT,
  `consultant_id` int(10) NOT NULL,
  `f_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `m_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nationality` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `job_title_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `job_cat_id` int(11) NOT NULL,
  `work_place_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`omstaff_id`),
  KEY `emp_status` (`gender`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `omstaff`
--

INSERT INTO `omstaff` (`omstaff_id`, `consultant_id`, `f_name`, `m_name`, `l_name`, `telephone`, `email`, `nationality`, `gender`, `job_title_id`, `job_cat_id`, `work_place_id`, `status`, `date_recorded`) VALUES
(1, 2, 'Mayor', ' Dong', 'Dida', '09765', 'updateosero@gmail.com', 'Southern Sudan', 'Male', '11', 2, 7, 1, '2013-07-30 06:05:21'),
(4, 0, 'Isaack ', 'Ochieny', 'Onyango', '09765', 'griffinsosero123@yahoo.com', 'Kenyan', 'Male', '13', 2, 0, 1, '2013-03-27 11:55:32'),
(5, 0, 'Griffins', '', 'Onsano', '073233', 'griffinsosero@yahoo.com', 'Ugandan', 'Male', '7', 2, 0, 1, '2013-03-27 11:51:35'),
(6, 0, 'Justus ', 'Omini', 'Nyanaro', '073233', 'updateosero@gmail.com', 'Kenyan', 'Male', '26', 1, 7, 1, '2013-04-16 14:34:17'),
(7, 1, 'Danson', 'Muchemi', 'Karanja', '09765', 'updateosero@gmail.com', 'Kenyan', 'Male', '1', 1, 7, 1, '2013-07-30 05:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `om_assigned_staff`
--

CREATE TABLE IF NOT EXISTS `om_assigned_staff` (
  `om_assigned_staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `om_previous_bunch_id` int(11) NOT NULL,
  `om_bunch_id` int(10) NOT NULL,
  `omstaff_id` int(10) NOT NULL,
  `omjob_title_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`om_assigned_staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `om_assigned_staff`
--

INSERT INTO `om_assigned_staff` (`om_assigned_staff_id`, `om_previous_bunch_id`, `om_bunch_id`, `omstaff_id`, `omjob_title_id`, `status`) VALUES
(1, 0, 1, 3, 4, '0'),
(2, 0, 2, 5, 7, '0'),
(3, 0, 3, 4, 13, '0'),
(4, 0, 4, 2, 9, '0'),
(5, 0, 6, 1, 4, '0');

-- --------------------------------------------------------

--
-- Table structure for table `om_bunch`
--

CREATE TABLE IF NOT EXISTS `om_bunch` (
  `om_bunch_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_cat_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `consultant_id` int(10) NOT NULL,
  `period_from` varchar(100) NOT NULL,
  `period_to` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`om_bunch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `om_bunch`
--

INSERT INTO `om_bunch` (`om_bunch_id`, `job_cat_id`, `client_id`, `consultant_id`, `period_from`, `period_to`, `date_recorded`, `status`) VALUES
(1, 1, 2, 2, ' 2013-03-18  ', ' 2013-03-28  ', '2013-03-27 11:49:01', 0),
(2, 2, 2, 2, ' 2013-03-11  ', ' 2013-03-26  ', '2013-03-27 11:51:27', 0),
(3, 2, 2, 2, ' 2013-03-11  ', ' 2013-03-25  ', '2013-03-27 11:55:25', 0),
(4, 1, 2, 2, ' 2013-03-12  ', ' 2013-03-18  ', '2013-03-27 11:56:12', 0),
(5, 2, 2, 1, ' 2013-03-04  ', ' 2013-03-26  ', '2013-03-27 11:56:48', 0),
(6, 2, 1, 2, ' 2013-03-04  ', ' 2013-03-29  ', '2013-03-29 07:37:09', 0),
(7, 2, 2, 2, ' 2013-03-10  ', ' 2013-03-26  ', '2013-03-30 05:15:42', 0),
(8, 1, 2, 2, ' 2013-03-04  ', ' 2013-03-25  ', '2013-03-30 06:10:55', 0),
(9, 2, 2, 2, ' 2013-03-11  ', ' 2013-03-18  ', '2013-03-30 06:11:13', 0),
(10, 2, 2, 2, ' 2013-03-03  ', ' 2013-03-20  ', '2013-03-30 06:11:48', 0),
(11, 2, 1, 1, ' 2013-04-08  ', ' 2013-08-22  ', '2013-04-07 17:09:05', 0),
(12, 2, 5, 2, ' 2013-04-01  ', ' 2013-04-14  ', '2013-04-09 00:27:06', 0),
(13, 2, 5, 2, ' 2013-04-07  ', ' 2013-04-15  ', '2013-04-09 04:50:30', 0),
(14, 2, 6, 2, ' 2013-04-07  ', ' 2013-04-22  ', '2013-04-09 04:54:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `operation_id` int(10) NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(100) NOT NULL,
  `operation_description` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`operation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`operation_id`, `operation_name`, `operation_description`, `status`) VALUES
(1, 'PMC', 'Project Management and Services', '0'),
(2, 'O&M', 'Operation and Maintanance Sevices (O&M)', '0'),
(3, 'General Engineering', 'General Engineering Services', '0');

-- --------------------------------------------------------

--
-- Table structure for table `other_training`
--

CREATE TABLE IF NOT EXISTS `other_training` (
  `other_training_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `other_training_description` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`other_training_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `other_training`
--

INSERT INTO `other_training` (`other_training_id`, `emp_id`, `other_training_description`, `status`) VALUES
(5, 5, 'Other training', 0),
(6, 7, 'CCNA Certified, Oracle Certified, MSCE Proffessionall\r\nICDL', 0),
(7, 26, 'other trainign', 0),
(8, 4, 'MSIC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `outreach_record`
--

CREATE TABLE IF NOT EXISTS `outreach_record` (
  `outreach_record_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_from` varchar(100) NOT NULL,
  `date_to` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `fac_male` int(10) NOT NULL,
  `fac_female` int(10) NOT NULL,
  `res_male` int(10) NOT NULL,
  `res_female` int(10) NOT NULL,
  `pat_male` int(10) NOT NULL,
  `pat_female` int(10) NOT NULL,
  `pat_child` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`outreach_record_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `outreach_record`
--

INSERT INTO `outreach_record` (`outreach_record_id`, `institution_id`, `user_id`, `date_from`, `date_to`, `location`, `fac_male`, `fac_female`, `res_male`, `res_female`, `pat_male`, `pat_female`, `pat_child`, `date_recorded`) VALUES
(3, 1, 6, ' 2013-01-08  ', ' 2013-01-06  ', 'Mathare north', 21, 22, 19, 29, 31, 39, 21, '0000-00-00 00:00:00'),
(4, 2, 1, ' 2013-01-07  ', ' 2013-01-22  ', ' Kamukunji', 45, 43, 33, 23, 23, 33, 332, '0000-00-00 00:00:00'),
(8, 2, 1, ' 2013-01-22  ', ' 2013-01-30  ', 'Kisumu Ndogo', 21, 456, 2345, 23, 21, 23, 33, '0000-00-00 00:00:00'),
(14, 1, 6, ' 2013-01-01  ', ' 2013-01-08  ', 'Lang''ata', 5, 5, 5, 5, 5, 5, 5, '2013-01-22 12:57:34'),
(15, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, '2013-03-17 16:37:43'),
(16, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, '2013-03-17 16:38:41'),
(17, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, '2013-03-17 16:39:50');

-- --------------------------------------------------------

--
-- Table structure for table `paye_block`
--

CREATE TABLE IF NOT EXISTS `paye_block` (
  `paye_block_id` int(20) NOT NULL AUTO_INCREMENT,
  `paye_max` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `paye_min` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `paye_rate` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`paye_block_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `paye_block`
--

INSERT INTO `paye_block` (`paye_block_id`, `paye_max`, `paye_min`, `paye_rate`) VALUES
(1, '300', '0', '0'),
(2, '5000', '301', '10'),
(3, 'Maximum', '5001', '15');

-- --------------------------------------------------------

--
-- Table structure for table `payrol_basic_log`
--

CREATE TABLE IF NOT EXISTS `payrol_basic_log` (
  `payrol_basic_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `basic_pay` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `gross_pay` varchar(100) NOT NULL,
  `working_days` varchar(100) NOT NULL,
  `overtime1` varchar(100) NOT NULL,
  `overtime_amnt1` varchar(100) NOT NULL,
  `overtime2` varchar(100) NOT NULL,
  `overtime_amnt2` varchar(100) NOT NULL,
  `otherpayment` varchar(100) NOT NULL,
  `taxable_income` varchar(100) NOT NULL,
  `tax` int(100) NOT NULL,
  `comp_sic_rate` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payrol_basic_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `payrol_basic_log`
--

INSERT INTO `payrol_basic_log` (`payrol_basic_log_id`, `emp_id`, `basic_pay`, `curr_rate`, `gross_pay`, `working_days`, `overtime1`, `overtime_amnt1`, `overtime2`, `overtime_amnt2`, `otherpayment`, `taxable_income`, `tax`, `comp_sic_rate`, `date_paid`, `payment_month`, `status`) VALUES
(106, 8, '17500 ', '2.9854', '9450', '30', '0', '0', '0', '0', '0', '8050', 1192, '2975', '2013-05-09 10:01:26', 'May 2013', 0),
(107, 9, '16000 ', '2.9854', '8640', '30', '0', '0', '0', '0', '0', '7360', 1088, '2720', '2013-05-09 10:01:28', 'May 2013', 0),
(108, 10, '14000 ', '2.9854', '7560', '30', '0', '0', '0', '0', '0', '6440', 950, '2380', '2013-05-09 10:01:31', 'May 2013', 0),
(105, 7, '7000 ', '2.9854', '3780', '30', '0', '0', '0', '0', '0', '3220', 467, '1190', '2013-05-09 10:01:23', 'May 2013', 0),
(104, 6, '23600 ', '2.9854', '12744', '30', '0', '0', '0', '0', '0', '10856', 1613, '4012', '2013-05-09 10:01:20', 'May 2013', 0),
(103, 4, '21000 ', '2.9854', '11340', '30', '0', '0', '0', '0', '0', '9660', 1433, '3570', '2013-05-09 10:01:17', 'May 2013', 0),
(102, 2, '33400 ', '2.9854', '18036', '30', '0', '0', '0', '0', '0', '15364', 2289, '5678', '2013-05-09 10:00:47', 'May 2013', 0),
(101, 1, '22000 ', '2.9854', '11880', '30', '0', '0', '0', '0', '0', '10120', 1502, '3740', '2013-05-09 10:00:41', 'May 2013', 0),
(109, 1, '22000 ', '2.9854', '11880', '30', '0', '0', '0', '0', '0', '10120', 1503, '3740', '2013-07-27 04:09:05', 'July 2013', 0),
(110, 2, '33400 ', '2.9854', '18036', '30', '0', '0', '0', '0', '0', '15364', 2290, '5678', '2013-07-27 04:09:08', 'July 2013', 0),
(111, 4, '21000 ', '2.9854', '11340', '30', '0', '0', '0', '0', '0', '9660', 1434, '3570', '2013-07-27 04:09:10', 'July 2013', 0),
(112, 6, '23600 ', '2.9854', '12744', '30', '0', '0', '0', '0', '0', '10856', 1613, '4012', '2013-07-27 04:09:12', 'July 2013', 0),
(113, 7, '7000 ', '2.9854', '3780', '30', '0', '0', '0', '0', '0', '3220', 468, '1190', '2013-07-27 04:09:14', 'July 2013', 0),
(114, 8, '17500 ', '2.9854', '9450', '30', '0', '0', '0', '0', '0', '8050', 1192, '2975', '2013-07-27 04:09:17', 'July 2013', 0),
(115, 9, '16000 ', '2.9854', '8640', '30', '0', '0', '0', '0', '0', '7360', 1089, '2720', '2013-07-27 04:09:20', 'July 2013', 0),
(116, 10, '14000 ', '2.9854', '7560', '30', '0', '0', '0', '0', '0', '6440', 951, '2380', '2013-07-27 04:09:22', 'July 2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payrol_basic_log_batch`
--

CREATE TABLE IF NOT EXISTS `payrol_basic_log_batch` (
  `payrol_basic_log_batch_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `basic_pay` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `gross_pay` varchar(100) NOT NULL,
  `working_days` varchar(100) NOT NULL,
  `overtime1` varchar(100) NOT NULL,
  `overtime_amnt1` varchar(100) NOT NULL,
  `overtime2` varchar(100) NOT NULL,
  `overtime_amnt2` varchar(100) NOT NULL,
  `otherpayment` varchar(100) NOT NULL,
  `cola` varchar(100) NOT NULL,
  `housing` varchar(100) NOT NULL,
  `clothing` varchar(100) NOT NULL,
  `taxable_income` varchar(100) NOT NULL,
  `tax` int(100) NOT NULL,
  `comp_sic_rate` varchar(100) NOT NULL,
  `emp_sic_rate` varchar(100) NOT NULL,
  `net_salary` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payrol_basic_log_batch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `payrol_basic_log_batch`
--

INSERT INTO `payrol_basic_log_batch` (`payrol_basic_log_batch_id`, `emp_id`, `basic_pay`, `curr_rate`, `gross_pay`, `working_days`, `overtime1`, `overtime_amnt1`, `overtime2`, `overtime_amnt2`, `otherpayment`, `cola`, `housing`, `clothing`, `taxable_income`, `tax`, `comp_sic_rate`, `emp_sic_rate`, `net_salary`, `date_paid`, `payment_month`, `status`) VALUES
(112, 8, '17500', '2.9854', '9450', '30', '60', '3543.75', '20', '1575', '0', '2800', '3150', '2100', '8050', 1192, '2975', '1400', '28076.323357004', '2013-09-12 10:18:50', 'September 2013', 0),
(111, 6, '23600', '2.9854', '12744', '30', '60', '4779', '20', '2124', '0', '3776', '4248', '2832', '10856', 1613, '4012', '1888', '37857.673357004', '2013-09-12 10:18:50', 'September 2013', 0),
(110, 2, '3200', '2.9854', '1728', '30', '0', '0', '0', '0', '0', '512', '576', '384', '1472', 1462, '544', '256', '1482', '2013-09-12 10:18:50', 'September 2013', 0),
(109, 10, '14000', '2.9854', '7560', '30', '60', '2835', '20', '1260', '0', '2240', '2520', '1680', '6440', 951, '2380', '1120', '22464.073357004', '2013-09-12 10:18:50', 'September 2013', 0),
(108, 7, '7000', '2.9854', '3780', '30', '60', '1417.5', '20', '630', '0', '1120', '1260', '840', '3220', 468, '1190', '560', '11239.573357004', '2013-09-12 10:18:50', 'September 2013', 0),
(107, 1, '22000', '2.9854', '11880', '30', '60', '4455', '20', '1980', '0', '3520', '3960', '2640', '10120', 1503, '3740', '1760', '35292.073357004', '2013-09-12 10:18:50', 'September 2013', 0),
(106, 9, '16000', '2.9854', '8640', '30', '60', '3240', '20', '1440', '0', '2560', '2880', '1920', '7360', 1089, '2720', '1280', '25671.073357004', '2013-09-12 10:18:50', 'September 2013', 0),
(105, 4, '21000', '2.9854', '11340', '30', '60', '4252.5', '20', '1890', '0', '3360', '3780', '2520', '9660', 1434, '3570', '1680', '33688.573357004', '2013-09-12 10:18:50', 'September 2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payrol_expbasic_log`
--

CREATE TABLE IF NOT EXISTS `payrol_expbasic_log` (
  `payrol_basic_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `net_pay_stnd` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `basic_salary` varchar(100) NOT NULL,
  `working_days` varchar(100) NOT NULL,
  `vacation_days` varchar(100) NOT NULL,
  `vacation_amount` varchar(100) NOT NULL,
  `overtime1` varchar(100) NOT NULL,
  `overtime_amnt1` varchar(100) NOT NULL,
  `safety_allowance` varchar(100) NOT NULL,
  `regional_allowance` varchar(100) NOT NULL,
  `otherpayment` varchar(100) NOT NULL,
  `tax_percentage` varchar(100) NOT NULL,
  `tax` int(100) NOT NULL,
  `other_deductions` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payrol_basic_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `payrol_expbasic_log`
--

INSERT INTO `payrol_expbasic_log` (`payrol_basic_log_id`, `emp_id`, `net_pay_stnd`, `curr_rate`, `basic_salary`, `working_days`, `vacation_days`, `vacation_amount`, `overtime1`, `overtime_amnt1`, `safety_allowance`, `regional_allowance`, `otherpayment`, `tax_percentage`, `tax`, `other_deductions`, `date_paid`, `payment_month`, `status`) VALUES
(84, 15, '32900', '2.9854', '16450', '30', '0', '0', '0', '0', '9870', '6580', '0', '0.15', 4920, '0', '2013-09-12 10:18:50', 'September 2013', 0),
(83, 13, '32450', '2.9854', '16225', '30', '0', '0', '0', '0', '9735', '6490', '0', '0.15', 4852, '0', '2013-09-12 10:18:50', 'September 2013', 0),
(81, 12, '45600', '2.9854', '22800', '30', '0', '0', '0', '0', '13680', '9120', '0', '0.15', 6825, '0', '2013-09-12 10:18:50', 'September 2013', 0),
(82, 11, '21980', '2.9854', '10990', '30', '0', '0', '0', '0', '6594', '4396', '0', '0.15', 3282, '0', '2013-09-12 10:18:50', 'September 2013', 0),
(80, 25, '7500', '2.9854', '3750', '30', '0', '0', '0', '0', '2250', '1500', '0', '0.15', 1110, '0', '2013-09-12 10:18:50', 'September 2013', 0),
(79, 26, '25000', '2.9854', '12500', '30', '0', '0', '0', '0', '7500', '5000', '0', '0.15', 3735, '0', '2013-09-12 10:18:50', 'September 2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payrol_expbasic_log_batch`
--

CREATE TABLE IF NOT EXISTS `payrol_expbasic_log_batch` (
  `payrol_basic_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `net_pay_stnd` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `basic_salary` varchar(100) NOT NULL,
  `working_days` varchar(100) NOT NULL,
  `vacation_days` varchar(100) NOT NULL,
  `vacation_amount` varchar(100) NOT NULL,
  `overtime1` varchar(100) NOT NULL,
  `overtime_amnt1` varchar(100) NOT NULL,
  `safety_allowance` varchar(100) NOT NULL,
  `regional_allowance` varchar(100) NOT NULL,
  `otherpayment` varchar(100) NOT NULL,
  `tax_percentage` varchar(100) NOT NULL,
  `tax` int(100) NOT NULL,
  `other_deductions` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payrol_basic_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `payrol_expbasic_log_batch`
--

INSERT INTO `payrol_expbasic_log_batch` (`payrol_basic_log_id`, `emp_id`, `net_pay_stnd`, `curr_rate`, `basic_salary`, `working_days`, `vacation_days`, `vacation_amount`, `overtime1`, `overtime_amnt1`, `safety_allowance`, `regional_allowance`, `otherpayment`, `tax_percentage`, `tax`, `other_deductions`, `date_paid`, `payment_month`, `status`) VALUES
(133, 26, '25000', '2.9854', '12500', '30', '0', '0', '0', '0', '7500', '5000', '0', '0.15', 3734, '0', '2013-05-09 10:03:13', 'May 2013', 0),
(132, 25, '32900', '2.9854', '16450', '30', '0', '0', '0', '0', '9870', '6580', '0', '0.15', 4919, '0', '2013-05-09 10:03:10', 'May 2013', 0),
(131, 15, '32900', '2.9854', '16450', '30', '0', '0', '0', '0', '9870', '6580', '0', '0.15', 4919, '0', '2013-05-09 10:03:05', 'May 2013', 0),
(130, 14, '12800', '2.9854', '6400', '30', '0', '0', '0', '0', '3840', '2560', '0', '0.15', 1904, '0', '2013-05-09 10:03:02', 'May 2013', 0),
(129, 13, '32450', '2.9854', '16225', '30', '0', '0', '0', '0', '9735', '6490', '0', '0.15', 4852, '0', '2013-05-09 10:03:00', 'May 2013', 0),
(128, 12, '45600', '2.9854', '22800', '30', '0', '0', '0', '0', '13680', '9120', '0', '0.15', 6824, '0', '2013-05-09 10:02:58', 'May 2013', 0),
(127, 11, '21980', '2.9854', '10990', '30', '0', '0', '0', '0', '6594', '4396', '0', '0.15', 3281, '0', '2013-05-09 10:02:56', 'May 2013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pay_slips`
--

CREATE TABLE IF NOT EXISTS `pay_slips` (
  `payslip_id` int(10) NOT NULL AUTO_INCREMENT,
  `payslip_no` varchar(100) NOT NULL,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `gross_salary` varchar(100) NOT NULL,
  `ttl_allowances` varchar(100) NOT NULL,
  `ttl_deductions` varchar(100) NOT NULL,
  `net_salary` varchar(100) NOT NULL,
  `date_printed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_printed2` varchar(100) NOT NULL,
  `month_printed` varchar(100) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `pay_slips`
--

INSERT INTO `pay_slips` (`payslip_id`, `payslip_no`, `payrol_basic_log_id`, `emp_id`, `gross_salary`, `ttl_allowances`, `ttl_deductions`, `net_salary`, `date_printed`, `date_printed2`, `month_printed`) VALUES
(96, 'SPTPS105/2013', 105, 4, '21000', '15802.5', '3114', '33688.573357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(95, 'SPTPS106/2013', 106, 9, '16000', '12040', '2369', '25671.073357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(94, 'SPTPS107/2013', 107, 1, '22000', '16555', '3263', '35292.073357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(93, 'SPTPS108/2013', 108, 7, '7000', '5267.5', '1028', '11239.573357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(89, 'SPTPS112/2013', 112, 8, '17500', '13168.75', '2592', '28076.323357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(90, 'SPTPS111/2013', 111, 6, '23600', '17759', '3501', '37857.673357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(91, 'SPTPS110/2013', 110, 2, '3200', '1472', '1718', '1482', '2013-09-12 10:30:07', '2013-09-12', 'September 2013'),
(92, 'SPTPS109/2013', 109, 10, '14000', '10535', '2071', '22464.073357004', '2013-09-12 10:30:07', '2013-09-12', 'September 2013');

-- --------------------------------------------------------

--
-- Table structure for table `per_dm_charges`
--

CREATE TABLE IF NOT EXISTS `per_dm_charges` (
  `per_dm_charge_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `per_dm_charge_value` varchar(100) NOT NULL,
  PRIMARY KEY (`per_dm_charge_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `per_dm_charges`
--

INSERT INTO `per_dm_charges` (`per_dm_charge_id`, `curr_id`, `curr_rate`, `per_dm_charge_value`) VALUES
(1, 2, '1', '615'),
(2, 1, '1', '567'),
(3, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `per_hour_charge`
--

CREATE TABLE IF NOT EXISTS `per_hour_charge` (
  `per_hour_charge_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `per_hour_charge_value` varchar(100) NOT NULL,
  PRIMARY KEY (`per_hour_charge_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `per_hour_charge`
--

INSERT INTO `per_hour_charge` (`per_hour_charge_id`, `curr_id`, `curr_rate`, `per_hour_charge_value`) VALUES
(2, 2, '97.2', '500');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_expense`
--

CREATE TABLE IF NOT EXISTS `petty_cash_expense` (
  `petty_cash_expense_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`petty_cash_expense_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petty_cash_expense`
--

INSERT INTO `petty_cash_expense` (`petty_cash_expense_id`, `description`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 'Refuel Vehicle No CE 749W', 4, '2.9854', '690', '2013-09-12 16:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_income`
--

CREATE TABLE IF NOT EXISTS `petty_cash_income` (
  `petty_cash_income_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`petty_cash_income_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petty_cash_income`
--

INSERT INTO `petty_cash_income` (`petty_cash_income_id`, `description`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 'money in advance for the month of August', '4', '2.9854', '2500', '2013-09-12 16:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_ledger`
--

CREATE TABLE IF NOT EXISTS `petty_cash_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `money_in` varchar(100) NOT NULL,
  `money_out` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `petty_cash_ledger`
--

INSERT INTO `petty_cash_ledger` (`transaction_id`, `transactions`, `currency`, `curr_rate`, `amount`, `money_in`, `money_out`, `date_recorded`) VALUES
(1, 'money in advance for the month of August', 4, '2.9854', '2500', '', '2500', '2013-09-12 16:15:54'),
(2, 'Refuel Vehicle No CE 749W', 4, '2.9854', '-690', '690', '', '2013-09-12 16:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `post_grad_scholarship`
--

CREATE TABLE IF NOT EXISTS `post_grad_scholarship` (
  `post_grad_scholarship_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `admin_year` varchar(100) NOT NULL,
  `comp_year` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `sponsor3` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_grad_scholarship_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `post_grad_scholarship`
--

INSERT INTO `post_grad_scholarship` (`post_grad_scholarship_id`, `institution_id`, `user_id`, `full_name`, `gender`, `nationality`, `admin_year`, `comp_year`, `sponsor1`, `sponsor2`, `sponsor3`, `phone`, `email`, `remarks`, `date_recorded`) VALUES
(10, 2, 1, 'Maina Kageni', 'Male', 'Kenyan', '2013', '2016', 'Harambe stars, Nigeria', '', '', '0764321111', 'updateosero@gmail.com', 'Good in deed', '0000-00-00 00:00:00'),
(5, 2, 2, 'Welbeck Ouma', 'Male', 'Kenyan', '2020', '2020', 'Kabarak', '', '', '07411945', 'y@yahoo.com', '', '0000-00-00 00:00:00'),
(6, 2, 2, 'Kijana Wamwalwa', 'Male', 'Ugandan', '2010', '2007', 'KEMU', '', '', '09876', 'y@yahoo.com', 'good', '0000-00-00 00:00:00'),
(7, 1, 6, 'Joshua Waema', 'Male', 'Kenyan', '2007', '2016', 'Topsoftchoice Ltd', '', '', '07411943', 'info@topsoft.com', 'good', '0000-00-00 00:00:00'),
(8, 1, 6, 'William Ruto', 'Male', 'Kenyan', '2002', '2010', 'IEBC', 'CDF', 'Kenafric', '0702358399', 'griffinsosero123@yahoo.com', 'Good in deed', '0000-00-00 00:00:00'),
(9, 1, 6, 'Johnstone Kavuludi', 'Male', 'Ugandan', '2008', '2015', 'USAID', 'Kenya Government', 'KEMRI', '07411947', 'updateosero@gmail.com', 'Good in deed\r\n', '0000-00-00 00:00:00'),
(11, 3, 1, 'Lilian Anyango', 'Female', 'Kenyan', '2010', '2008', 'AMREF', 'UKAID', 'USAID', '0702358399', 'updateosero@gmail.com', 'nice', '2013-01-22 17:35:25'),
(12, 3, 1, '', 'Male', ' ', '', '', '', '', '', ' ', ' ', '', '2013-03-16 19:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `prize`
--

CREATE TABLE IF NOT EXISTS `prize` (
  `prize_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `prize_description` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`prize_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `prize`
--

INSERT INTO `prize` (`prize_id`, `emp_id`, `prize_description`, `status`) VALUES
(1, 5, 'Honors in sciense congress', 0),
(2, 7, 'Public speaking', 0),
(3, 26, 'good', 0),
(4, 26, 'congres', 0),
(5, 26, 'kkv', 0),
(6, 2, 'Science Congress', 0),
(7, 12, 'did well', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `operation_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL,
  `contract_no` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `operation_id`, `client_id`, `period_from`, `period_to`, `contract_no`, `date_recorded`, `status`) VALUES
(6, 2, 6, '2013-04-14', '2013-04-24', 'hytr', '2013-04-13 11:16:14', 1),
(2, 1, 5, '2013-04-17', '2013-12-13', 'ddertrt', '2013-04-13 11:18:23', 1),
(7, 1, 6, '2013-04-07', '2013-10-31', 'aasas', '2013-09-07 16:50:31', 1),
(10, 2, 15, '2013-06-03', '2013-12-31', '3333', '2013-09-10 16:42:15', 1),
(11, 1, 16, '2013-06-01', '2015-09-30', '56YTY', '2013-09-11 14:27:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchases_ledger`
--

CREATE TABLE IF NOT EXISTS `purchases_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `purchases_ledger`
--

INSERT INTO `purchases_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Subcontractor Invoice INV-2003', '500', '500', '', 2, '1', '2013-04-21 12:36:15', 0),
(2, 'Subcontractor Invoice 543', '78900', '78900', '', 2, '1', '2013-04-27 07:39:05', 0),
(3, 'Subcontractor Invoice InvWat209', '2000000', '2000000', '', 2, '1', '2013-04-27 14:33:09', 0),
(4, 'Subcontractor Invoice SIPET/SC/INV-002/05-2013', '463400', '463400', '', 2, '1', '2013-05-11 13:34:18', 0),
(5, 'Subcontractor Invoice SIPET/SC/INV-001/05-2013', '63123', '63123', '', 2, '1', '2013-05-11 13:58:17', 0),
(6, 'Subcontractor Invoice SIPET/SC/INV-002/05-2013', '63123', '63123', '', 2, '1', '2013-05-11 13:58:48', 0),
(7, 'Subcontractor Invoice SIPET/SC/INV-003/05-2013', '63123', '63123', '', 2, '1', '2013-05-11 13:59:18', 0),
(8, 'Subcontractor Invoice SIPET/SC/INV-004/05-2013', '63123', '63123', '', 2, '1', '2013-05-11 14:00:53', 0),
(9, 'Subcontractor Invoice 23', '500000', '500000', '', 2, '1', '2013-09-10 14:50:19', 0),
(10, 'Subcontractor Invoice innnn', '89000', '89000', '', 2, '1', '2013-09-11 09:10:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `refferal`
--

CREATE TABLE IF NOT EXISTS `refferal` (
  `refferal_id` int(10) NOT NULL AUTO_INCREMENT,
  `outreach_record_id` int(10) NOT NULL,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_from` varchar(100) NOT NULL,
  `date_to` varchar(100) NOT NULL,
  `ref_male` int(10) NOT NULL,
  `ref_female` int(10) NOT NULL,
  `ref_child` int(10) NOT NULL,
  PRIMARY KEY (`refferal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `refferal`
--

INSERT INTO `refferal` (`refferal_id`, `outreach_record_id`, `institution_id`, `user_id`, `date_from`, `date_to`, `ref_male`, `ref_female`, `ref_child`) VALUES
(1, 1, 2, 2, ' 2012-09-10  ', ' 2012-09-20  ', 4, 4, 4),
(4, 4, 2, 1, ' 2012-11-05  ', ' 2012-11-30  ', 5, 5, 5),
(3, 3, 2, 2, ' 2012-09-11  ', ' 2012-09-26  ', 76, 32, 12);

-- --------------------------------------------------------

--
-- Table structure for table `renewed_staff_work_permit`
--

CREATE TABLE IF NOT EXISTS `renewed_staff_work_permit` (
  `renewed_work_permit_id` int(10) NOT NULL AUTO_INCREMENT,
  `work_permit_id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `work_permit_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `charges` varchar(100) NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`renewed_work_permit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `renewed_staff_work_permit`
--

INSERT INTO `renewed_staff_work_permit` (`renewed_work_permit_id`, `work_permit_id`, `emp_id`, `work_permit_no`, `issue_date`, `charges`, `exp_date`, `issue_place`, `currency`, `curr_rate`, `status`, `date_recorded`) VALUES
(1, 4, 7, '6789', '2013-05-30', '450', '2013-07-31', 'Juba', 4, '1', 1, '2013-04-23 04:44:21'),
(2, 4, 7, 'good', '2013-05-23', '345', '2013-07-31', 'Juba', 4, '1', 0, '2013-04-23 04:46:14'),
(3, 6, 2, '1123', '2013-09-11', '100', '2013-10-10', 'Juba', 2, '1', 0, '2013-09-12 14:18:37'),
(4, 6, 2, '234', '2013-09-08', '566', '2013-09-25', 'Juba', 2, '1', 0, '2013-09-12 14:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `renewed_visas`
--

CREATE TABLE IF NOT EXISTS `renewed_visas` (
  `renewed_visa_id` int(10) NOT NULL AUTO_INCREMENT,
  `visa_details_id` int(11) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `visa_type` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `charges` varchar(100) NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`renewed_visa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `renewed_visas`
--

INSERT INTO `renewed_visas` (`renewed_visa_id`, `visa_details_id`, `emp_id`, `visa_type`, `issue_date`, `charges`, `exp_date`, `issue_place`, `currency`, `curr_rate`, `status`, `date_recorded`) VALUES
(1, 6, 7, 'Single', '2013-04-01', '500', '2014-04-30', 'Juba', 2, '2.985', 0, '2013-04-23 03:43:40'),
(2, 6, 7, 'Single', '2013-08-21', '55000', '2013-04-29', 'Juba', 4, '1', 0, '2013-05-09 08:35:31'),
(3, 6, 7, 'Single', '2013-01-07', '490', '2013-04-30', 'Juba', 4, '1', 0, '2013-04-23 04:19:18'),
(4, 6, 7, 'Single', '2013-05-01', '500', '2013-08-30', 'Juba', 4, '1', 0, '2013-04-23 04:21:52'),
(5, 10, 2, 'Single', '2013-09-11', '300', '2014-02-21', 'Juba', 2, '1', 0, '2013-09-12 09:24:15'),
(6, 7, 26, 'Single', '2013-09-09', '50', '2013-12-26', 'Juba', 2, '1', 0, '2013-09-12 15:40:22'),
(7, 12, 34, 'Single', '2013-09-26', '50', '2014-02-13', 'Juba', 2, '1', 0, '2013-09-12 15:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE IF NOT EXISTS `salary_details` (
  `salary_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `gross_pay` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`salary_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`salary_details_id`, `emp_id`, `gross_pay`, `grade`, `status`) VALUES
(14, 4, '21000', 'A', 1),
(13, 9, '16000', 'B', 1),
(26, 26, '25000', 'C', 0),
(11, 1, '22000', 'E', 1),
(10, 7, '7000', 'D', 0),
(15, 10, '14000', 'E', 1),
(27, 25, '7500', 'd', 0),
(17, 2, '3200', 'B', 1),
(22, 12, '45600', 'C', 1),
(19, 11, '21980', 'C', 1),
(20, 6, '23600', 'A', 1),
(21, 8, '17500', 'C', 1),
(23, 13, '32450', 'C', 1),
(24, 14, '12800', 'C', 1),
(25, 15, '32900', 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_ledger`
--

CREATE TABLE IF NOT EXISTS `sales_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sales_ledger`
--

INSERT INTO `sales_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Service invoice(SIPET/MP/INV-001/04-2013) for month ', '  82160', '', '  82160', 2, '1', '2013-04-27 07:34:04'),
(2, 'Service invoice(SIPET/MP/INV-002/05-2013) for month ', '  80826', '', '  80826', 2, '1', '2013-05-09 09:40:34'),
(3, 'Service invoice(SIPET/SC/INV-001/05-2013) for month ', '37050', '', '37050', 2, '1', '2013-05-11 14:05:21'),
(4, 'Service invoice(SIPET/SC/INV-001/05-2013) for month May 2013', '69289', '', '69289', 2, '1', '2013-05-11 14:07:39'),
(5, 'Service invoice(SIPET/SC/INV-002/05-2013) for month May 2013', '13419', '', '13419', 2, '1', '2013-05-11 14:18:08'),
(6, 'Service invoice(SIPET/SC/INV-003/05-2013) for month May 2013', '13419', '', '13419', 2, '1', '2013-05-11 14:20:33'),
(7, 'Service invoice(SIPET/SC/INV-004/05-2013) for month May 2013', '13419', '', '13419', 2, '1', '2013-05-11 14:21:00'),
(8, 'Service invoice(SIPET/SC/INV-005/05-2013) for month May 2013', '13419', '', '13419', 2, '1', '2013-05-11 14:21:18'),
(9, 'Service invoice(SIPET/SC/INV-006/05-2013) for month May 2013', '13419', '', '13419', 2, '1', '2013-05-11 14:21:49'),
(10, 'Service invoice(SIPET/SC/INV-001/05-2013) for month May 2013', '50945', '', '50945', 2, '1', '2013-05-11 14:31:10'),
(11, 'Service invoice(SIPET/SC/INV-001/05-2013) for month May 2013', '50945', '', '50945', 2, '1', '2013-05-11 14:31:58'),
(12, 'Service invoice(SIPET/SC/INV-001/05-2013) for month May 2013', '9000', '', '9000', 2, '1', '2013-05-11 14:34:29'),
(13, 'Service invoice(SIPET/MP/INV-001/05-2013) for month ', '  80826', '', '  80826', 2, '1', '2013-05-13 04:09:12'),
(14, 'Service invoice(SIPET/MP/INV-002/06-2013) for month ', '  11893', '', '  11893', 2, '1', '2013-06-02 08:21:10'),
(15, 'Service invoice(SIPET/MP/INV-003/09-2013) for month September 2013', '  0', '', '  0', 2, '1', '2013-09-10 04:13:04'),
(16, 'Service invoice(SIPET/MP/INV-001/09-2013) for month September 2013', '  1140', '', '  1140', 2, '1', '2013-09-10 16:48:05'),
(17, 'Service invoice(SIPET/MP/INV-001/09-2013) for month September 2013', '  1290', '', '  1290', 2, '1', '2013-09-11 14:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `savings_id` int(10) NOT NULL AUTO_INCREMENT,
  `savings_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `savings_amount` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`savings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`savings_id`, `savings_name`, `savings_amount`) VALUES
(1, 'Home', '4500');

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
  `shares_id` int(10) NOT NULL AUTO_INCREMENT,
  `share_holder_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `contact_person` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_joined` date NOT NULL,
  `perc_shares` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `shares_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `remarks` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shares_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`shares_id`, `share_holder_name`, `contact_person`, `date_joined`, `perc_shares`, `shares_amount`, `remarks`, `status`, `date_recorded`) VALUES
(1, 'Sipake', 'XXX', '2008-04-01', '49 ', '735000', 'test', 0, '2013-09-11 09:31:18'),
(2, 'Nilepet', 'dd', '2013-06-03', '51 ', '765000', 'ff', 0, '2013-09-11 09:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `sic_rate`
--

CREATE TABLE IF NOT EXISTS `sic_rate` (
  `sic_rate_id` int(20) NOT NULL AUTO_INCREMENT,
  `sic_employee` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `sic_employer` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`sic_rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sic_rate`
--

INSERT INTO `sic_rate` (`sic_rate_id`, `sic_employee`, `sic_employer`) VALUES
(3, '17', '89'),
(4, '179', '89'),
(5, '1799', '89'),
(6, '1799', '899'),
(7, '1799', '899'),
(8, '1799', '899'),
(9, '1799', '8998'),
(10, '17999', '8998'),
(11, '17999', '8998765'),
(12, '58', '98'),
(13, '588', '980'),
(14, '8', '17');

-- --------------------------------------------------------

--
-- Table structure for table `sipet_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `sipet_invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_generated` varchar(100) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sipet_invoice_payments`
--

INSERT INTO `sipet_invoice_payments` (`invoice_payment_id`, `month_generated`, `invoice_id`, `project_id`, `client_id`, `amount_received`, `mop`, `date_received`, `status`) VALUES
(1, 'May 2013', 1, 2, 5, '80000', 'Cash', '2013-05-13 04:32:24', 0),
(2, 'May 2013', 1, 2, 5, '826', 'Cash', '2013-05-13 04:33:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills_profile`
--

CREATE TABLE IF NOT EXISTS `skills_profile` (
  `skills_profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `english` varchar(100) NOT NULL,
  `arabic` varchar(100) NOT NULL,
  `chinese` varchar(100) NOT NULL,
  `other_languages` longtext NOT NULL,
  `word` varchar(100) NOT NULL,
  `excel` varchar(100) NOT NULL,
  `other_comp_skills` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`skills_profile_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skills_profile`
--

INSERT INTO `skills_profile` (`skills_profile_id`, `emp_id`, `english`, `arabic`, `chinese`, `other_languages`, `word`, `excel`, `other_comp_skills`, `status`) VALUES
(1, 5, 'Fluent', 'Fluent', 'Fluent', '', 'Practised', 'Practised', 'dsd', 0),
(2, 7, 'Fluent', 'Good', 'Fluent', '', 'Poor', 'Poor', '', 0),
(3, 26, 'Fluent', 'Poor', 'Fluent', 'Many other training on arabic especialyy turkey\r\nMany other training on arabic especialyy turkey\r\nMany other training on arabic especialyy turkey', 'Practised', 'Practised', 'Many other training', 0),
(4, 2, 'Fluent', 'Good', 'Fluent', 'Training in germany', 'Practised', 'Practised', 'Training in power point', 0);

-- --------------------------------------------------------

--
-- Table structure for table `specs_ids`
--

CREATE TABLE IF NOT EXISTS `specs_ids` (
  `specs_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `specs_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `specs_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`specs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `specs_ids`
--

INSERT INTO `specs_ids` (`specs_id`, `emp_id`, `specs_no`, `issue_date`, `exp_date`, `specs_remarks`, `status`) VALUES
(3, 5, '23444', '2013-04-08', '2013-04-15', 'fault', 0),
(2, 3, '23444', '2013-04-08', '2013-04-15', 'good', 0),
(4, 7, '0012', '2013-04-01', '2013-04-23', 'Given very late', 0),
(5, 26, 'SP2019', '2013-06-02', '2013-06-18', 'goddfrrrgtre', 0),
(6, 6, '23487', '2013-06-02', '2013-06-26', 'spec given', 0),
(7, 2, 'WR45', '2013-06-02', '2013-06-10', 'Good', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` int(10) NOT NULL AUTO_INCREMENT,
  `sponsor_name` varchar(100) NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`) VALUES
(2, 'IOM International Organization M'),
(3, 'AMREF - Flying Doctors');

-- --------------------------------------------------------

--
-- Table structure for table `staff_contacts`
--

CREATE TABLE IF NOT EXISTS `staff_contacts` (
  `staff_contact_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `ssmob1` varchar(100) NOT NULL,
  `ssmob2` varchar(100) NOT NULL,
  `comob1` varchar(100) NOT NULL,
  `comob2` varchar(100) NOT NULL,
  `sstel1` varchar(100) NOT NULL,
  `sstel2` varchar(100) NOT NULL,
  `cotel1` varchar(100) NOT NULL,
  `cotel2` varchar(100) NOT NULL,
  `office_email1` varchar(100) NOT NULL,
  `office_email2` varchar(100) NOT NULL,
  `private_email1` varchar(100) NOT NULL,
  `private_email2` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`staff_contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `staff_contacts`
--

INSERT INTO `staff_contacts` (`staff_contact_id`, `emp_id`, `ssmob1`, `ssmob2`, `comob1`, `comob2`, `sstel1`, `sstel2`, `cotel1`, `cotel2`, `office_email1`, `office_email2`, `private_email1`, `private_email2`, `status`) VALUES
(1, 6, '0999', '0859', '0723411943', '0714 214 009', '1198765', '119876598', '0020198', '09876543', 'gosero@topsoftchoice.com', 'gosero@webtribe.co.ke', 'updateosero@gmail.com', 'griffinsosero@yahoo.com', 0),
(3, 7, '0999', '0859', '', '', '2511', '25112', '', '', 'gosero@topsoftchoice.com', '', 'updateosero@gmail.com', '', 0),
(5, 26, '4567', '', 'ew555', '', '55555', '', '34454', '', 'gosero@topsoftchoice.com', '', 'updateosero@gmail.com', '', 0),
(6, 1, '555', '', '555', '', '555', '', '55', '', 'f@yahoo.com', '', 'f@yahoo.com', '', 0),
(7, 4, '555', '', '555', '', '555', '', '55', '', 'griffins@scgafrica.com', '', 'griffinsosero@yahoo.com', '', 0),
(8, 14, '5667', '', '5666', '', '565656', '', '656565', '', 'gosero@topsoftchoice.com', '', 'griffins@yahoo.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_contract`
--

CREATE TABLE IF NOT EXISTS `staff_contract` (
  `staff_contract_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `term_type` varchar(100) NOT NULL,
  `begin_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `probation_time` varchar(100) NOT NULL,
  `contract_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`staff_contract_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_contract`
--

INSERT INTO `staff_contract` (`staff_contract_id`, `emp_id`, `contract_type`, `term_type`, `begin_date`, `termination_date`, `probation_time`, `contract_remarks`, `status`) VALUES
(6, 26, 'Complete', 'Open', '2013-06-03', '2013-06-17', '2', 'termin', 0),
(5, 7, 'Open', 'Open', '2013-03-04', '2013-04-09', '10', 'Confedence in being arbsorbed', 0),
(4, 5, 'Delay', 'Open', '2013-04-08', '2013-04-15', '3', 'good', 0),
(7, 4, 'Document', 'Full', '2013-06-02', '2013-06-18', '2', 'ffind ended', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_ids`
--

CREATE TABLE IF NOT EXISTS `staff_ids` (
  `id_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `id_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `staff_ids`
--

INSERT INTO `staff_ids` (`id_id`, `emp_id`, `id_no`, `issue_date`, `exp_date`, `issue_place`, `id_remarks`, `status`) VALUES
(1, 3, '', '2013-04-01', '2013-04-29', 'China', 'drrews', 0),
(2, 5, '', '2013-04-07', '2013-04-15', 'Juba', 'good for real', 0),
(3, 7, '', '2013-04-08', '2013-04-29', 'Eldoret', 'Good in deed', 0),
(4, 26, '323', '2013-06-03', '2013-06-09', 'dr454', 'goodddddd', 0),
(5, 2, '3456', '2013-06-02', '2013-06-29', 'Mogadishu', 'good in deed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_passports`
--

CREATE TABLE IF NOT EXISTS `staff_passports` (
  `passport_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `passport_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `passport_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`passport_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_passports`
--

INSERT INTO `staff_passports` (`passport_details_id`, `emp_id`, `passport_no`, `issue_date`, `exp_date`, `issue_place`, `passport_remarks`, `status`) VALUES
(1, 3, '76543', '2013-04-08', '2013-04-18', 'Lnga', 'ssasa', 0),
(2, 4, '5677', '2013-04-08', '2013-04-30', 'Nairobi', 'good', 0),
(3, 5, '32789', '2013-04-07', '2013-04-02', 'Dar', 'good', 0),
(4, 7, 'A56986', '2012-03-11', '2022-04-07', 'Nairobi', 'Issued well', 0),
(5, 26, '4567', '2013-06-01', '2013-06-25', 'Czeck', 'good oneddffff', 0),
(6, 8, 'p8', '2013-06-02', '2013-06-10', 'China', 'dfdff', 0),
(7, 2, '56555', '2013-06-02', '2013-06-12', '5678', 'good one', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_timesheet`
--

CREATE TABLE IF NOT EXISTS `staff_timesheet` (
  `staff_timesheet_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `timesheet_date` date NOT NULL,
  `timesheet_mark` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`staff_timesheet_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `staff_timesheet`
--

INSERT INTO `staff_timesheet` (`staff_timesheet_id`, `staff`, `project_id`, `timesheet_date`, `timesheet_mark`, `date_recorded`, `status`) VALUES
(1, 6, 6, '0000-00-00', 'X', '2013-04-22 10:22:33', 0),
(2, 7, 6, '0000-00-00', 'X', '2013-04-22 10:22:33', 0),
(3, 11, 6, '0000-00-00', 'X', '2013-04-22 10:22:33', 0),
(4, 12, 6, '0000-00-00', 'X', '2013-04-22 10:22:33', 0),
(5, 6, 6, '0000-00-00', '', '2013-04-22 10:22:43', 0),
(6, 7, 6, '0000-00-00', '', '2013-04-22 10:22:43', 0),
(7, 11, 6, '0000-00-00', '', '2013-04-22 10:22:43', 0),
(8, 12, 6, '0000-00-00', '', '2013-04-22 10:22:43', 0),
(9, 6, 6, '2013-04-22', 'X', '2013-04-22 10:26:23', 0),
(10, 7, 6, '2013-04-22', 'X', '2013-04-22 10:26:23', 0),
(11, 11, 6, '2013-04-22', 'X', '2013-04-22 10:26:23', 0),
(12, 12, 6, '2013-04-22', 'X', '2013-04-22 10:26:23', 0),
(13, 6, 6, '2013-04-24', 'X', '2013-04-24 10:58:47', 0),
(14, 7, 6, '2013-04-24', 'X', '2013-04-24 10:58:47', 0),
(15, 11, 6, '2013-04-24', 'X', '2013-04-24 10:58:47', 0),
(16, 12, 6, '2013-04-24', 'X', '2013-04-24 10:58:47', 0),
(17, 6, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(18, 7, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(19, 8, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(20, 9, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(21, 10, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(22, 11, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(23, 12, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(24, 13, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(25, 14, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(26, 15, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(27, 26, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(28, 25, 2, '2013-05-01', 'X', '2013-05-09 09:29:44', 0),
(29, 6, 2, '2013-05-02', 'X', '2013-05-09 09:37:41', 0),
(30, 7, 2, '2013-05-02', 'X', '2013-05-09 09:37:41', 0),
(31, 8, 2, '2013-05-02', 'X', '2013-05-09 09:37:41', 0),
(32, 9, 2, '2013-05-02', 'X', '2013-05-09 09:37:41', 0),
(33, 10, 2, '2013-05-02', 'X', '2013-05-09 09:37:41', 0),
(34, 11, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(35, 12, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(36, 13, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(37, 14, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(38, 15, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(39, 26, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(40, 25, 2, '2013-05-02', 'Y', '2013-05-09 09:37:41', 0),
(41, 6, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(42, 7, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(43, 8, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(44, 9, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(45, 10, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(46, 11, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(47, 12, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(48, 13, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(49, 14, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(50, 15, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(51, 26, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(52, 25, 2, '2013-05-03', 'X', '2013-05-09 09:39:12', 0),
(53, 6, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(54, 7, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(55, 8, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(56, 9, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(57, 10, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(58, 11, 2, '2013-05-22', 'Y', '2013-05-21 08:17:40', 0),
(59, 12, 2, '2013-05-22', 'Y', '2013-05-21 08:17:40', 0),
(60, 13, 2, '2013-05-22', 'Y', '2013-05-21 08:17:40', 0),
(61, 14, 2, '2013-05-22', 'Y', '2013-05-21 08:17:40', 0),
(62, 15, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(63, 26, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(64, 25, 2, '2013-05-22', 'X', '2013-05-21 08:17:40', 0),
(65, 6, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(66, 7, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(67, 8, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(68, 9, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(69, 10, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(70, 11, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(71, 12, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(72, 13, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(73, 14, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(74, 15, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(75, 26, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(76, 25, 2, '2013-06-01', 'X', '2013-06-02 08:20:44', 0),
(77, 6, 10, '2013-09-10', 'X', '2013-09-10 16:44:19', 0),
(78, 7, 10, '2013-09-10', 'X', '2013-09-10 16:44:19', 0),
(79, 15, 10, '2013-09-10', 'Y', '2013-09-10 16:44:19', 0),
(80, 26, 10, '2013-09-10', 'Y', '2013-09-10 16:44:19', 0),
(81, 25, 10, '2013-09-10', 'Y', '2013-09-10 16:44:19', 0),
(82, 10, 11, '2013-09-11', 'X', '2013-09-11 14:28:58', 0),
(83, 8, 11, '2013-09-11', 'X', '2013-09-11 14:28:58', 0),
(84, 26, 11, '2013-09-11', 'X', '2013-09-11 14:28:58', 0),
(85, 15, 11, '2013-09-11', 'Y', '2013-09-11 14:28:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_titles`
--

CREATE TABLE IF NOT EXISTS `staff_titles` (
  `omjob_title_id` int(10) NOT NULL AUTO_INCREMENT,
  `omjob_title_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`omjob_title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `staff_titles`
--

INSERT INTO `staff_titles` (`omjob_title_id`, `omjob_title_name`, `status`) VALUES
(2, 'O & M  Manager', 1),
(3, 'Operation Supervisors', 1),
(4, 'Mechanical Engineer', 1),
(5, 'Electrical Engineer', 1),
(6, 'C&I Engineer', 1),
(7, 'Shift supervisor', 1),
(8, 'Electrical Technician', 1),
(9, 'Mechanical  Technicians', 1),
(10, 'Operators PP1,2 and PS1', 1),
(11, ' Transmission line and Substation supervisors ', 1),
(12, 'Transmission line shift supervisor', 1),
(13, 'Substation Technicians', 1),
(14, 'Transmission line Technicians', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE IF NOT EXISTS `staff_types` (
  `staff_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `staff_type_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`staff_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`staff_type_id`, `staff_type_name`, `status`) VALUES
(1, 'Management', 0),
(2, 'Engineer', 0),
(3, 'Skilled Worker', 0),
(4, 'Servicer', 0),
(7, 'Labour', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_visas`
--

CREATE TABLE IF NOT EXISTS `staff_visas` (
  `visa_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `visa_type` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `visa_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`visa_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `staff_visas`
--

INSERT INTO `staff_visas` (`visa_details_id`, `emp_id`, `visa_type`, `issue_date`, `exp_date`, `issue_place`, `visa_remarks`, `status`) VALUES
(3, 3, '45666', '2013-04-01', '2013-04-09', 'ssasas', '', 0),
(2, 3, 'Multiple', '2013-04-07', '2013-04-08', 'gg', '', 0),
(4, 3, '3245', '2013-04-07', '2013-04-14', 'del', '', 0),
(5, 5, 'Single', '2013-04-01', '2013-04-11', 'Nairobi', '', 0),
(6, 7, 'Single', '2013-04-02', '2013-05-07', 'Nairobi', 'Delayed Issue', 1),
(7, 26, 'Multiple', '2013-06-05', '2013-06-13', 'Czeck', 'good', 1),
(8, 9, 'Single', '2013-06-02', '2013-06-19', 'Juba', 'offeres one', 0),
(10, 2, 'Single', '2013-06-17', '2013-06-17', 'Kitale', 'in time', 1),
(11, 36, 'Single', '2013-09-09', '2013-09-26', 'Kitale', 'good to go', 0),
(12, 34, 'Multiple', '2013-09-12', '2013-09-25', 'Juba', 'new staff arrived', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_work_permit`
--

CREATE TABLE IF NOT EXISTS `staff_work_permit` (
  `work_permit_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `work_permit_no` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `issue_place` varchar(10) NOT NULL,
  `work_permit_remarks` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`work_permit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_work_permit`
--

INSERT INTO `staff_work_permit` (`work_permit_id`, `emp_id`, `work_permit_no`, `issue_date`, `exp_date`, `issue_place`, `work_permit_remarks`, `status`) VALUES
(1, 3, '78675', '2013-04-08', '2013-04-14', 'fora', '', 0),
(3, 5, '3458', '2013-04-07', '2013-04-26', '', '', 0),
(4, 7, '367822', '2013-04-14', '2013-04-30', 'Nairobi', '', 1),
(5, 26, '4555', '2013-06-02', '2013-06-26', 'Czeck', 'fffrrtt', 0),
(6, 2, '5677', '2013-06-03', '2013-06-10', 'Nairobi', 'food', 1),
(7, 36, '6789', '2013-09-02', '2013-09-02', 'Nairobi', 'issued with difficulty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcon_invoices`
--

CREATE TABLE IF NOT EXISTS `subcon_invoices` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `consultant_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `tom` varchar(10) NOT NULL,
  `days_spent` varchar(10) NOT NULL,
  `manhours_amount` varchar(100) NOT NULL,
  `visa_charges` varchar(10) NOT NULL,
  `per_dem` varchar(10) NOT NULL,
  `flight_charges` varchar(10) NOT NULL,
  `invoice_ttl` varchar(100) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` date NOT NULL,
  `month_generated` varchar(10) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subcon_invoices`
--

INSERT INTO `subcon_invoices` (`invoice_id`, `consultant_id`, `project_id`, `invoice_no`, `tom`, `days_spent`, `manhours_amount`, `visa_charges`, `per_dem`, `flight_charges`, `invoice_ttl`, `other_charges`, `user_id`, `date_generated`, `month_generated`, `remarks`, `date_recorded`, `status`) VALUES
(1, 2, 2, '23', '', '', '', '', '', '', '500000', '', 24, '2013-09-10', '2013-9', 're', '2013-09-10 14:50:19', 0),
(2, 2, 10, 'innnn', 'Bank Trans', '48', '45000', '7890', '45000', '5489', '89000', '58900', 23, '2013-09-11', '2013-9', 'good', '2013-09-11 09:10:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcon_invoices_to_client`
--

CREATE TABLE IF NOT EXISTS `subcon_invoices_to_client` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `consultant_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `tom` varchar(10) NOT NULL,
  `days_spent` varchar(10) NOT NULL,
  `manhours_amount` varchar(100) NOT NULL,
  `visa_charges` varchar(10) NOT NULL,
  `per_dem` varchar(10) NOT NULL,
  `flight_charges` varchar(10) NOT NULL,
  `invoice_ttl` varchar(100) NOT NULL,
  `other_charges` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` date NOT NULL,
  `month_generated` varchar(10) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subcon_invoices_to_client`
--

INSERT INTO `subcon_invoices_to_client` (`invoice_id`, `consultant_id`, `project_id`, `invoice_no`, `tom`, `days_spent`, `manhours_amount`, `visa_charges`, `per_dem`, `flight_charges`, `invoice_ttl`, `other_charges`, `user_id`, `date_generated`, `month_generated`, `remarks`, `status`) VALUES
(1, 2, 7, 'SIPET/SC/INV-001/05-2013', '30 days', '488', '2300', '400', '400', '1222', '9000', '4678', 10, '2013-05-11', 'May 2013', 'good in indeed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcon_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `subcon_invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_generated` varchar(100) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subcon_invoice_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `subcon_rates`
--

CREATE TABLE IF NOT EXISTS `subcon_rates` (
  `subcon_rates_id` int(10) NOT NULL AUTO_INCREMENT,
  `consultant_id` int(11) NOT NULL,
  `omjob_title_id` int(10) NOT NULL,
  `job_cat_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`subcon_rates_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subcon_rates`
--

INSERT INTO `subcon_rates` (`subcon_rates_id`, `consultant_id`, `omjob_title_id`, `job_cat_id`, `amount`, `status`) VALUES
(1, 0, 20, 2, '200', 0),
(2, 0, 20, 1, '310', 0),
(3, 0, 22, 1, '210', 0),
(4, 0, 22, 2, '430', 0),
(5, 0, 23, 2, '340', 0),
(6, 0, 26, 1, '420', 0),
(7, 0, 23, 1, '80', 0),
(8, 0, 26, 2, '330', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcon_to_client_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `subcon_to_client_invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `month_generated` varchar(100) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subcon_to_client_invoice_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `sub_module`
--

CREATE TABLE IF NOT EXISTS `sub_module` (
  `sub_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `sub_module_name` varchar(200) NOT NULL,
  `sort_order` int(10) NOT NULL,
  `sublink` longtext NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`sub_module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'Currency', 1, '<li><a href="home.php?newsponsor=newsponsor">Currencies</a></li>', 'Manage currency', 0),
(2, 3, 'Block Management', 1, '<li><a href="home.php?newunivesity=newunivesity">Blocks Managemnt</a></li>', 'Manage blocks', 0),
(3, 3, 'Job Categotiies and Titles', 3, '<li><a href="home.php?newinstitute=newinstitute">Job Categotiies and Titles</a></li>', 'Titles', 0),
(4, 3, 'PerDIEM Charges', 7, '<li><a href="home.php?perdm=perdm">Per Diem Charges</a></li>	', 'good', 0),
(5, 3, 'Clients Management', 8, '<li><a href="home.php?subspeciality=subspeciality">Clients Management</a></li>', 'Manages Clients', 0),
(6, 3, 'Subcontractors Management', 9, '<li><a href="home.php?omconsultants=omconsultants">Subcontractors Management</a></li>', '', 0),
(7, 4, 'User Group Management', 10, '<li><a href="home.php?newusergroup=newusergroup">User Group Management</a></li>', 'vbvb', 0),
(8, 4, 'Modules and Submodules', 11, '<li><a href="home.php?modules=modules">Modules and Submodules</a></li>', '', 0),
(9, 4, 'Modules User Group Relation', 12, '<li><a href="home.php?modulesusergroup=modulesusergroup">Modules User Group Relation</a></li>', '', 0),
(10, 4, 'Users Management', 13, '<li><a href="home.php?users=users">Users Management</a></li>', '', 0),
(11, 5, 'Initiate project', 15, '<li><a href="home.php?initiateproject=initiateproject">Initiate project</a></li>', '', 0),
(12, 5, 'Assign Staff to Projects', 16, '<li><a href="home.php?stafftoprojects=stafftoprojects">Assign Staff to Projects</a></li>', '', 0),
(13, 5, 'Sub Contract Project', 17, '<li><a href="home.php?subcontractprojects=subcontractprojects">Sub Contract Projects</a>\r\n						<ul class="fly">\r\n			<li><a href="home.php?omstaff=omstaff">Subcontrator Staff</a></li>\r\n			<li><a href="home.php?assingomstaff=assingomstaff">Assign Project To Subcontrator</a></li>\r\n			<li><a href="home.php?subconrate=subconrate">Subcontrators Rate</a></li>\r\n	\r\n			</ul>\r\n            </li>', '', 0),
(14, 5, 'Staff Time Sheets', 19, '<li><a href="home.php?viewstafftimesheet1=viewstafftimesheet1">Staff Time Sheets</a></li>', '', 0),
(15, 5, 'Daily Staff Rates', 21, '<li><a href="home.php?omrates=omrates">Daily Staff Rates</a></li>', '', 0),
(16, 5, 'Invoice Generation', 23, '<li><a href="#">Invoice Generation</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?generateinvoice=generateinvoice">SIPET Projects Invoice to Client</a></li>\r\n			<li><a href="home.php?subconinvoices=subconinvoices">Record Subcontractor''s Invoice</a></li>\r\n<li><a href="home.php?subconinvoicestoclient=subconinvoicestoclient"><span>Subcontractors Invoices To Client</span></a></li>\r\n			</ul></li>\r\n			\r\n			', '', 0),
(17, 6, 'HR Personel', 26, '<li><a href="home.php?postgraduate=postgraduate">HR Personel</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?prepostgraduate=prepostgraduate">Staff Management</a></li>\r\n			<li><a href="home.php?nhifrates=nhifrates">Employees S.I.C Rates</a></li>\r\n			<li><a href="home.php?benefitded=benefitded">Allowances</a></li>\r\n			<!--<li><a href="#">Perfomance And Appraisal</a></li>\r\n			<li><a href="#">Leave Management</a></li>-->\r\n			\r\n			</ul>\r\n</li>', '', 0),
(18, 6, 'HR Admin', 27, '<li><a href="home.php?postgraduate=postgraduate">HR Administration</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?viewincome=viewincome">General Income Management</a></li>\r\n			<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Management</a></li>\r\n			<li><a href="home.php?pettycash=pettycash">Petty Cash Book Transactions</a></li>\r\n			<li><a href="home.php?addsubspecialityreport=addsubspecialityreport">Staff Rotation</a></li>\r\n			<li><a href="home.php?processinterflight=processinterflight">Process Staff Air Tickets</a></li>\r\n			<li><a href="home.php?workpermitrenewals=workpermitrenewals">Visas and Work Permit Renewals</a></li>\r\n			\r\n			\r\n			</ul>\r\n</li>', '', 0),
(19, 6, 'Staff Payroll', 28, '<li><a href="home.php?postgraduate=postgraduate">HR Staff Payroll</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?payrollsettings=payrollsettings">Payroll Settings</a></li>\r\n<li><a href="home.php?batchpayroll=batchpayroll">Batch Payroll Processing</a></li>\r\n<li><a href="home.php?bnprocesspayroll=bnprocesspayroll">National Staff Payroll</a></li>\r\n			<li><a href="home.php?bnprocessexppayroll=bnprocessexppayroll">Expertriate Staff Payroll</a></li>\r\n			<!--<li><a href="home.php?processpayroll=processpayroll">Process President Allowances</a></li>-->\r\n			<li><a href="home.php?payrollsummaryreport=payrollsummaryreport">Payroll Summary Report</a></li>\r\n\r\n<li><a href="home.php?payrollreport=payrollreport">Payroll General Report</a></li>\r\n			\r\n			\r\n			</ul>\r\n</li>', '', 0),
(20, 7, 'Record General Income', 30, '<li><a href="home.php?viewincome=viewincome">Record General Income</a></li>', '', 0),
(21, 7, 'Record General Expenses', 31, '<li><a href="home.php?viewexpenses=viewexpenses">Record General Expenses</a></li>', '', 0),
(22, 7, 'Petty Cash Book', 32, '<li><a href="home.php?pettycash=pettycash">Petty Cash Book</a></li>', '', 0),
(23, 7, 'Staff Rotation', 33, '<li><a href="home.php?addsubspecialityreport=addsubspecialityreport">Staff Rotation</a></li>', '', 0),
(24, 8, 'Setup Financial Year', 34, '<li><a href="#"><span>Setup Financial Year</span></a></li>', '', 0),
(25, 8, 'Invoices', 35, '<li><a href="#"><span>Invoices</span></a>\r\n					    <ul class="fly">\r\n                        <li><a href="home.php?viewsubconinvoices=viewsubconinvoices"><span>Invoices from Subcontractors</span></a></li>\r\n\r\n<li><a href="home.php?viewsubconinvoicestoclient=viewsubconinvoicestoclient"><span>Subcontractors Invoices To Client</span></a></li>\r\n						<li><a href="home.php?viewinvoices=viewinvoices"><span>SIPET Projects Invoices</span></a></li>\r\n						\r\n						</ul></li>', '', 0),
(26, 8, 'Accounts Ledgers', 36, '<li><a href="#"><span>Accounts Ledgers</span></a>\r\n					    <ul class="fly">\r\n                        <li><a href="home.php?generalledger=generalledger"><span>General Ledger</span></a></li>\r\n<li><a href="home.php?serviceledger=serviceledger"><span>Service Revenue Ledger</span></a></li>\r\n						<li><a href="home.php?cashledger=cashledger"><span>Cash Ledger</span></a></li>\r\n						<li><a href="home.php?expensesledger=expensesledger"><span>Expenses Ledger</span></a></li>\r\n						<li><a href="home.php?arledger=arledger"><span>Accounts Receivable Ledger</span></a></li>\r\n						<li><a href="home.php?apledger=apledger"><span>Accounts Payables Ledger</span></a></li>\r\n						<li><a href="home.php?viewpettycashledger=viewpettycashledger"><span>Petty Cash Ledger</span></a></li>\r\n						<li><a href="home.php?faledger=faledger"><span>Fixed Asset Ledger</span></a></li>\r\n                        </ul>', '', 0),
(27, 8, 'Profit And Loss Account', 37, '<li><a href="home.php?tpla=tpla"><span>Profit and Loss Account</span></a></li>', '', 0),
(28, 8, 'Trial Balance', 39, '<li><a href="home.php?trialbalance=trialbalance"><span>Trial Balance</span></a></li>', '', 0),
(29, 8, 'Balance Shee', 40, '<li><a href="home.php?balancesheet=balancesheet"><span>Balance Sheet</span></a></li>', '', 0),
(30, 9, 'System Settings Reports', 1, '<li><a href="#"><span>System Settings Reports</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   \r\n			\r\n			<li><a href="home.php?viewomrates=viewomrates">Staff Daily Payment Rate</a></li>\r\n			<li><a href="home.php?viewperdm=viewperdm">Per Diem Charges</a></li>		\r\n                        <li><a href="home.php?viewsubspeciality=viewsubspeciality">Clients List</a></li>\r\n                       <li><a href="home.php?viewomconsultants=viewomconsultants">Subcontractor''s List</a></li>\r\n		\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(31, 9, 'Financial Report', 43, '<li><a href="view_balance_sheet.php"><span>Financial Reports</span></a>\r\n						<ul class="fly"><li><a href="home.php?viewsubconinvoices=viewsubconinvoices"><span>Subcontractors Invoices</span></a></li>\r\n						<li><a href="home.php?viewinvoices=viewinvoices"><span>Clients Invoices</span></a></li>\r\n						<li><a href="home.php?tpla=tpla"><span>Profit and Loss Account</span></a></li>\r\n<li><a href="home.php?viewsharecapital=viewsharecapital"><span>Shares Capital Reports</span></a></li>\r\n						<li><a href="home.php?balancesheet=balancesheet"><span>Balance Sheet</span></a></li>\r\n						\r\n						\r\n						</ul>\r\n						\r\n						\r\n						\r\n						\r\n						\r\n						\r\n						\r\n						</li>', '', 0),
(37, 9, 'HRM  Report', 21, '<li><a href="#"><span>HRM  Report</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   <li><a href="home.php?viewpostgraduate=viewpostgraduate">Staff List</a></li>\r\n			\r\n			<!--<li><a href="#">SIC Rates</a></li>\r\n			<li><a href="#">Allowances List</a></li>	-->	\r\n                        <li><a href="home.php?visarenewals=visarenewals">Visa Renewal Reports</a></li>\r\n                       <li><a href="home.php?workpermitrenewals=workpermitrenewals">Work Permit Renewal Reports</a></li\r\n\r\n <li><a href="home.php?viewprocessinterflight=viewprocessinterflight">Air Tickets Reports</a></li>\r\n <li><a href="home.php?adminpayrollexpreport=adminpayrollexpreport">Expertriate Payroll Report</a></li>\r\n <li><a href="home.php?adminpayrollreport=adminpayrollreport">National Payroll Report</a></li>\r\n <!--<li><a href="#">P.I.T Tax Report</a></li>\r\n <li><a href="#">S.I.C Deductions Reports</a></li>-->\r\n\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(33, 9, 'Audit Trails', 54, '<li><a href="home.php?audittrails=audittrails"><span>Audit Trails</span></a></li>', '', 0),
(34, 7, 'Fixed Asset Management', 50, '<li><a href="home.php?fixedasset=fixedasset">Fixed Asset Management</a></li>', 'Manages fixed asset management', 0),
(35, 8, 'Share Capital', 80, '<li><a href="home.php?sharecapital=sharecapital">Shares Capital</a></li>', 'Manages Shares for the organization', 0),
(36, 9, 'SIPET Projects Reports', 34, '<li><a href="#"><span>SIPET Projects Reports</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   <li><a href="#">HSE Reports</a></li>\r\n			\r\n			<li><a href="home.php?viewprojects=viewprojects">List Of Active Projects</a></li>\r\n			<li><a href="home.php?viewomstaff=viewomstaff">Subcontractor Staff List</a></li>		\r\n                        <li><a href="#">Subcontrator''s Staff to Project</a></li>\r\n                       <li><a href="home.php?viewsubconrate=viewsubconrate">Subcontractor''s Daily Rates</a></li\r\n\r\n <li><a href="home.php?adminviewstafftimesheet1=adminviewstafftimesheet1">Staff Timesheet Report</a></li>\r\n\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(38, 9, 'General Transactions Report', 21, '<li><a href="#"><span>General Transactions Report</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   <li><a href="home.php?viewincome=viewincome">General Income Report</a></li>\r\n			\r\n			<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Report</a></li>\r\n			<li><a href="home.php?viewpettycashledger=viewpettycashledger">Petty Cash Book Report</a></li>		\r\n                        <li><a href="home.php?viewfixedasset=viewfixedasset">Fixed Assets Report</a></li>\r\n                       \r\n\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(39, 4, 'Sub Module User Group Relation', 100, '<li><a href="home.php?usergroupsm=usergroupsm">Sub Module User Group Relation</a></li>', '', 0),
(40, 6, 'General Income Management', 88, '<li><a href="home.php?viewincome=viewincome">General Income Management</a></li>', '', 0),
(41, 6, 'General Expenses Management', 35, '<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Management</a></li>', '', 0),
(42, 6, 'Petty Cash Book Transactions', 49, '<li><a href="home.php?pettycash=pettycash">Petty Cash Book Transactions</a></li>', '', 0),
(43, 6, 'Process Staff Airtickets', 58, '<li><a href="home.php?processinterflight=processinterflight">Process Staff Airtickets</a></li>', '', 0),
(44, 6, 'Visas And Work Permit Renewals', 67, '<li><a href="home.php?workpermitrenewals=workpermitrenewals">Visas And Work Permit Renewals</a></li>', '', 0),
(45, 5, 'Staff Management', 77, '<li><a href="home.php?prepostgraduate=prepostgraduate">Staff Management</a></li>', '', 0),
(46, 6, 'Employees SIC Rates', 78, '<li><a href="home.php?nhifrates=nhifrates">Employees SIC Rates</a></li>', '', 0),
(47, 6, 'Staff Allowances', 98, '<li><a href="home.php?benefitded=benefitded">Staff Allowances</a></li>', '', 0),
(48, 6, 'Payroll Settings', 57, '<li><a href="home.php?payrollsettings=payrollsettings">Payroll Settings</a></li>', '', 0),
(49, 6, 'Batch Payroll Processing', 59, '<li><a href="home.php?batchpayroll=batchpayroll">Batch Payroll Processing</a></li>', '', 0),
(50, 6, 'Generate Employees Payslips', 90, '<li><a href="home.php?bnprocesspayroll=bnprocesspayroll">Generate Employees Payslips</a></li>', '', 0),
(51, 6, 'Process Expatriate Payroll', 99, '<li><a href="home.php?bnprocessexppayroll=bnprocessexppayroll">Process Expatriate Payroll</a></li>', '', 0),
(52, 6, 'Payroll General Report', 101, '<li><a href="home.php?payrollreport=payrollreport">Payroll General Report</a></li>', '', 0),
(53, 5, 'Sub Contractor Staff', 108, '<li><a href="home.php?omstaff=omstaff">Sub Contractor Staff</a></li>', '', 0),
(54, 5, 'Assign Projects To Subcontractor', 104, '<li><a href="home.php?assingomstaff=assingomstaff">Assign Projects To Subcontractor</a></li>', '', 0),
(55, 5, 'Subcontractors Rates', 107, '<li><a href="home.php?subconrate=subconrate">Subcontractors Rates</a></li>', '', 0),
(56, 5, 'SIPET Invoices to Clientsold', 88, '<li><a href="home.php?generateinvoice=generateinvoice>SIPET Invoices to Clients</a></li>', '', 0),
(57, 5, 'Record Subcontractor Invoice', 55, '<li><a href="home.php?subconinvoices=subconinvoices">Record Subcontractor Invoice</a></li>', '', 0),
(58, 6, 'Subcontrator''s Invoice to Client', 89, '<li><a href="home.php?subconinvoicestoclient=subconinvoicestoclient">Subcontrator''s Invoice to Client</a></li>', '', 0),
(59, 5, 'SIPET Invoices to Clients', 88, '<li><a href="home.php?generateinvoice=generateinvoice">SIPET Invoices to Clients</a></li>', '', 0),
(60, 3, 'Chart Of Accounts', 6, '<li><a href="home.php?chart=chart">Chart Of Accounts</a></li>', '', 0),
(61, 6, 'Cancel Payroll', 109, '<li><a href="home.php?cancelpayroll=cancelpayroll">Cancel Payroll</a></li>', '', 0),
(62, 6, 'Staff Details Forms Settings', 1, '<li><a href="home.php?addformsections=addformsections">Staff Details Forms Settings</a></li>', '', 0),
(63, 6, 'Add Staff', 2, '<li><a href="home.php?newstaff=newstaff">Add Staff</a></li>', '', 0),
(64, 5, 'Peter Test', 45, '<li><a href="home.php?petertest2=petertest2">Peter Test</a></li>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_speciality`
--

CREATE TABLE IF NOT EXISTS `sub_speciality` (
  `sub_speciality_id` int(10) NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ben_fname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `university_id` int(10) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `comp_date` varchar(100) NOT NULL,
  `subspecility_area` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `sponsor3` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_speciality_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sub_speciality`
--

INSERT INTO `sub_speciality` (`sub_speciality_id`, `institution_id`, `user_id`, `ben_fname`, `gender`, `nationality`, `university_id`, `start_date`, `comp_date`, `subspecility_area`, `phone`, `email`, `sponsor1`, `sponsor2`, `sponsor3`, `remarks`, `date_recorded`) VALUES
(2, 2, 2, 'Kinyanjui', 'Male', 'Kenyan', 1, ' 2012-09-17  ', ' 2012-09-26  ', 'Sports', '07411947', 'updateosero@gmail.com', 'AMREF', '', '', '', '2013-01-22 20:32:48'),
(3, 1, 2, 'Kinara', 'Female', 'Ugandan', 2, ' 2012-09-10  ', ' 2012-09-20  ', 'Hormones', '06754', 'gosero@topsoftchoice.com', 'Kamau and Co.', '', '', 'Indeed good', '2013-01-22 20:31:05'),
(4, 2, 2, 'Jalang''o', 'Male', 'Kenyan', 4, ' 2012-10-07  ', ' 2012-10-11  ', 'Opthalmology', '07411947', 'updateosero@gmail.com', 'Area MP', 'Watheka Co.', 'Western Africa', 'lesson full', '2013-01-22 20:30:46'),
(5, 2, 6, 'Wayne Rooney', 'Female', 'England', 3, ' 2012-11-04  ', ' 2012-11-27  ', 'Professional Football', '0764321111', 'wayn@rooney.com', 'Manchester United', 'England', 'Spain', 'Good attendance\r\n', '0000-00-00 00:00:00'),
(8, 2, 7, 'Manganga', 'Male', 'Ugandan', 2, ' 2013-01-07  ', ' 2013-01-15  ', 'General', '0764321111', 'tum@gmail.com', 'Tumaini Church', 'Yeath International', 'Buru Buru', 'Good for sure\r\n', '2013-01-22 20:32:27'),
(9, 3, 1, 'Oscar Kamau', 'Male', 'Tanzanian', 1, ' 2013-01-14  ', ' 2013-01-24  ', 'Education', '0764321111', 'updateosero@gmail.com', 'AMREF', 'UKAID', 'USAID', 'good', '2013-01-22 20:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE IF NOT EXISTS `supplier_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`transaction_id`, `supplier_id`, `transaction`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 2, 'Subcontractor Invoice InvWat209 month 2013-4 ', 2, '1', '2000000', '2013-04-27 14:33:09'),
(2, 2, 'Subcontractor Invoice SIPET/SC/INV-002/05-2013 month  ', 2, '1', '463400', '2013-05-11 13:34:18'),
(3, 2, 'Subcontractor Invoice SIPET/SC/INV-001/05-2013 month  ', 2, '1', '63123', '2013-05-11 13:58:17'),
(4, 2, 'Subcontractor Invoice SIPET/SC/INV-002/05-2013 month  ', 2, '1', '63123', '2013-05-11 13:58:48'),
(5, 2, 'Subcontractor Invoice SIPET/SC/INV-003/05-2013 month  ', 2, '1', '63123', '2013-05-11 13:59:18'),
(6, 2, 'Subcontractor Invoice SIPET/SC/INV-004/05-2013 month  ', 2, '1', '63123', '2013-05-11 14:00:53'),
(7, 6, 'Payment for Invoice No:InvWat209', -1000000, '2', '1', '2013-05-13 04:57:46'),
(8, 6, 'Payment for Invoice No:InvWat209', -30000, '2', '1', '2013-05-13 04:58:47'),
(9, 6, 'Payment for Invoice No:InvWat209', -970000, '2', '1', '2013-05-13 04:59:12'),
(10, 2, 'Subcontractor Invoice 23 month 2013-9 ', 2, '1', '500000', '2013-09-10 14:50:19'),
(11, 2, 'Subcontractor Invoice innnn month 2013-9 ', 2, '1', '89000', '2013-09-11 09:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `surgery`
--

CREATE TABLE IF NOT EXISTS `surgery` (
  `surgery_id` int(10) NOT NULL AUTO_INCREMENT,
  `outreach_record_id` int(11) NOT NULL,
  `institution_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_from` varchar(100) NOT NULL,
  `date_to` varchar(100) NOT NULL,
  `sur_cat_male` int(10) NOT NULL,
  `sur_cat_female` int(10) NOT NULL,
  `sur_cat_child` int(10) NOT NULL,
  `sur_trauma_male` int(10) NOT NULL,
  `sur_trauma_rep_female` int(10) NOT NULL,
  `sur_trauma_rep_child` int(10) NOT NULL,
  `sur_other_male` int(10) NOT NULL,
  `sur_other_female` int(10) NOT NULL,
  `sur_other_child` int(10) NOT NULL,
  PRIMARY KEY (`surgery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `surgery`
--

INSERT INTO `surgery` (`surgery_id`, `outreach_record_id`, `institution_id`, `user_id`, `date_from`, `date_to`, `sur_cat_male`, `sur_cat_female`, `sur_cat_child`, `sur_trauma_male`, `sur_trauma_rep_female`, `sur_trauma_rep_child`, `sur_other_male`, `sur_other_female`, `sur_other_child`) VALUES
(1, 1, 2, 2, ' 2012-09-10  ', ' 2012-09-20  ', 4, 4, 4, 4, 4, 4, 4, 4, 4),
(4, 4, 2, 1, ' 2012-11-05  ', ' 2012-11-30  ', 5, 5, 5, 5, 5, 5, 5, 5, 5),
(3, 3, 2, 2, ' 2012-09-11  ', ' 2012-09-26  ', 67, 32, 65, 54, 21, 67, 54, 32, 99);

-- --------------------------------------------------------

--
-- Table structure for table `temp_assigned_staff`
--

CREATE TABLE IF NOT EXISTS `temp_assigned_staff` (
  `temp_assigned_staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `previous_bunch_id` int(11) NOT NULL,
  `bunch_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`temp_assigned_staff_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_assigned_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_assigned_staffold`
--

CREATE TABLE IF NOT EXISTS `temp_assigned_staffold` (
  `temp_assigned_staff_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `project_manager` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `exit_date` date NOT NULL,
  `staff` int(10) NOT NULL,
  `work_place` varchar(100) NOT NULL,
  `segment` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`temp_assigned_staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `temp_assigned_staffold`
--


-- --------------------------------------------------------

--
-- Table structure for table `terminated_staff`
--

CREATE TABLE IF NOT EXISTS `terminated_staff` (
  `terminated_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`terminated_staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `terminated_staff`
--

INSERT INTO `terminated_staff` (`terminated_staff_id`, `staff_id`, `reason`, `status`) VALUES
(15, 32, 'delete', 0),
(14, 30, 'delete', 0),
(13, 27, 'delete', 0),
(12, 31, 'delete', 0),
(11, 28, 'delete\r\n', 0),
(10, 29, 'Just testing', 0),
(16, 33, 'good in deed\r\n', 0),
(17, 14, 'to be know later', 0),
(18, 38, 'Wrongly entered', 0),
(19, 38, 'badly entered', 0),
(20, 36, 'goof', 0),
(21, 38, 'googggg', 0),
(22, 37, 'gg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `user_group_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `islogged_in` int(1) NOT NULL DEFAULT '1',
  `allow_add` int(11) NOT NULL,
  `allow_edit` int(11) NOT NULL,
  `allow_delete` int(11) NOT NULL,
  `suspend` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_group_id`, `username`, `password`, `date_created`, `islogged_in`, `allow_add`, `allow_edit`, `allow_delete`, `suspend`) VALUES
(12, 4, 15, 'charity', '04bb585be4d4f0590061dd7a7045fff2', '2013-07-27 05:15:48', 0, 0, 0, 0, 0),
(11, 2, 2, 'richad', '39161bc1d1001b65cc4a7256fe93c74b', '2013-09-08 20:58:07', 0, 0, 1, 0, 0),
(19, 37, 15, 'osero', 'd97d3a75495b93f3c8ec2e1aea44b31a', '2013-09-16 11:14:52', 1, 1, 1, 1, 0),
(9, 1, 22, 'minga', '9461452b90a944d122b4f103bfec1fd5', '2013-09-10 14:34:56', 0, 1, 1, 1, 0),
(13, 12, 14, 'zawawi', '81dc9bdb52d04dc20036dbd8313ed055', '2013-09-08 20:58:03', 0, 1, 1, 1, 1),
(15, 9, 2, 'alu', 'b9839cf7b6959e0763df69ba8468d618', '2013-07-27 05:15:34', 0, 1, 1, 1, 0),
(16, 26, 2, 'chingel', '925d7518fc597af0e43f5606f9a51512', '2013-07-27 05:16:18', 0, 0, 0, 0, 0),
(17, 13, 2, 'enab', 'bb0ed6ad56f41c6de469776171261226', '2013-09-08 20:54:52', 0, 0, 0, 0, 0),
(18, 36, 2, 'diana', '3a23bb515e06d0e944ff916e79a7775c', '2013-09-10 16:36:45', 0, 1, 1, 1, 0),
(20, 39, 1, 'adm', '21232f297a57a5a743894a0e4a801fc3', '2013-09-12 15:52:35', 1, 1, 1, 1, 0),
(21, 40, 14, 'hr', 'adab7b701f23bb82014c8506d3dc784e', '2013-09-12 15:52:24', 0, 1, 1, 1, 0),
(22, 41, 13, 'om', 'd58da82289939d8c4ec4f40689c2847e', '2013-09-11 14:32:28', 0, 1, 1, 1, 0),
(23, 42, 20, 'fin', 'd79695776a5b40f7cadbee1f91a85c82', '2013-09-12 09:49:23', 0, 1, 1, 1, 0),
(24, 43, 21, 'mange', 'ec918fb7700c78f3e4f7a686974964ba', '2013-09-10 15:35:10', 1, 0, 0, 0, 0),
(25, 44, 15, 'cavagele', '499ac743107b47d68193efa4450c9108', '2013-09-10 14:50:45', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `description`) VALUES
(1, 'Administration', ''),
(2, 'Normal User', ''),
(13, 'Operation and Maintanance', ''),
(14, 'Human Resource Department', ''),
(15, 'Super Administrator', 'Super administrator'),
(20, 'Finance', ''),
(21, 'Management', ''),
(22, 'I.T Department', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_module`
--

CREATE TABLE IF NOT EXISTS `user_group_module` (
  `user_group_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_group_module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `user_group_module`
--

INSERT INTO `user_group_module` (`user_group_module_id`, `user_group_id`, `module_id`, `status`) VALUES
(72, 21, 8, 0),
(74, 21, 13, 0),
(71, 21, 7, 0),
(69, 21, 5, 0),
(65, 20, 3, 0),
(73, 21, 9, 0),
(9, 1, 10, 0),
(68, 21, 4, 0),
(67, 21, 3, 0),
(12, 2, 10, 0),
(64, 14, 3, 0),
(14, 13, 10, 0),
(63, 13, 3, 0),
(26, 14, 10, 0),
(17, 15, 1, 0),
(18, 15, 3, 0),
(19, 15, 4, 0),
(20, 15, 5, 0),
(21, 15, 6, 0),
(22, 15, 7, 0),
(23, 15, 8, 0),
(24, 15, 9, 0),
(25, 15, 10, 0),
(33, 15, 13, 0),
(70, 21, 6, 0),
(62, 22, 3, 0),
(37, 20, 1, 0),
(38, 20, 7, 0),
(39, 20, 8, 0),
(61, 1, 1, 0),
(60, 22, 13, 0),
(59, 22, 4, 0),
(58, 22, 1, 0),
(66, 21, 1, 0),
(56, 14, 6, 0),
(55, 14, 1, 0),
(54, 13, 5, 0),
(53, 13, 1, 0),
(52, 1, 7, 0),
(51, 1, 6, 0),
(75, 2, 11, 0),
(76, 20, 14, 0),
(77, 15, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_submodule`
--

CREATE TABLE IF NOT EXISTS `user_group_submodule` (
  `user_group_sub_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) NOT NULL,
  `sub_module_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_group_sub_module_id`),
  KEY `sub_module_id` (`sub_module_id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `user_group_submodule`
--

INSERT INTO `user_group_submodule` (`user_group_sub_module_id`, `user_group_id`, `sub_module_id`, `status`) VALUES
(1, 15, 39, 0),
(3, 15, 7, 0),
(4, 15, 8, 0),
(5, 15, 9, 0),
(6, 15, 10, 0),
(8, 15, 25, 0),
(9, 15, 26, 0),
(10, 15, 27, 0),
(11, 15, 29, 0),
(12, 15, 34, 0),
(13, 15, 35, 0),
(14, 15, 2, 0),
(15, 15, 1, 0),
(16, 15, 3, 0),
(17, 15, 4, 0),
(18, 15, 5, 0),
(19, 15, 6, 0),
(20, 15, 11, 0),
(21, 15, 12, 0),
(22, 15, 13, 0),
(23, 15, 14, 0),
(24, 15, 15, 0),
(25, 15, 16, 0),
(26, 15, 17, 0),
(27, 15, 18, 0),
(28, 15, 19, 0),
(29, 15, 20, 0),
(30, 15, 21, 0),
(31, 15, 22, 0),
(32, 15, 30, 0),
(33, 15, 38, 0),
(34, 15, 36, 0),
(35, 15, 31, 0),
(36, 15, 33, 0),
(37, 1, 18, 0),
(38, 1, 22, 0),
(39, 20, 20, 0),
(40, 20, 21, 0),
(41, 20, 34, 0),
(44, 13, 13, 0),
(47, 13, 16, 0),
(61, 21, 13, 0),
(64, 21, 16, 0),
(65, 21, 17, 0),
(66, 21, 19, 0),
(83, 14, 17, 0),
(85, 14, 40, 0),
(86, 15, 40, 0),
(87, 14, 19, 0),
(96, 15, 48, 0),
(97, 15, 49, 0),
(98, 15, 45, 0),
(99, 15, 46, 0),
(100, 15, 50, 0),
(101, 15, 47, 0),
(102, 15, 51, 0),
(103, 15, 52, 0),
(104, 15, 41, 0),
(105, 15, 23, 0),
(106, 15, 57, 0),
(107, 15, 56, 0),
(108, 15, 55, 0),
(109, 15, 53, 0),
(110, 15, 59, 0),
(111, 15, 58, 0),
(112, 15, 54, 0),
(113, 15, 43, 0),
(114, 15, 44, 0),
(115, 14, 48, 0),
(116, 14, 49, 0),
(117, 14, 45, 0),
(118, 14, 46, 0),
(119, 14, 50, 0),
(120, 14, 47, 0),
(121, 14, 51, 0),
(122, 14, 52, 0),
(123, 13, 6, 0),
(124, 13, 11, 0),
(125, 13, 12, 0),
(126, 13, 14, 0),
(127, 13, 15, 0),
(128, 13, 23, 0),
(129, 13, 57, 0),
(130, 13, 56, 0),
(131, 13, 59, 0),
(132, 13, 58, 0),
(133, 13, 54, 0),
(134, 13, 55, 0),
(135, 13, 53, 0),
(136, 1, 43, 0),
(137, 1, 44, 0),
(138, 20, 25, 0),
(139, 20, 26, 0),
(140, 20, 27, 0),
(141, 20, 29, 0),
(142, 20, 35, 0),
(143, 22, 2, 0),
(144, 22, 1, 0),
(145, 22, 3, 0),
(146, 22, 4, 0),
(147, 22, 5, 0),
(148, 22, 6, 0),
(149, 22, 7, 0),
(150, 22, 8, 0),
(151, 22, 9, 0),
(152, 22, 10, 0),
(153, 22, 39, 0),
(154, 20, 1, 0),
(155, 20, 4, 0),
(156, 14, 3, 0),
(157, 13, 2, 0),
(159, 13, 5, 0),
(160, 21, 2, 0),
(161, 21, 1, 0),
(162, 21, 3, 0),
(163, 21, 4, 0),
(164, 21, 5, 0),
(165, 21, 6, 0),
(166, 21, 11, 0),
(167, 21, 12, 0),
(168, 21, 14, 0),
(169, 21, 15, 0),
(170, 21, 23, 0),
(171, 21, 57, 0),
(172, 21, 56, 0),
(173, 21, 59, 0),
(174, 21, 58, 0),
(175, 21, 54, 0),
(176, 21, 55, 0),
(177, 21, 53, 0),
(178, 21, 48, 0),
(179, 21, 43, 0),
(180, 21, 49, 0),
(181, 21, 44, 0),
(182, 21, 45, 0),
(183, 21, 46, 0),
(184, 21, 50, 0),
(185, 21, 47, 0),
(186, 21, 51, 0),
(187, 21, 52, 0),
(188, 21, 20, 0),
(189, 21, 21, 0),
(190, 21, 22, 0),
(191, 21, 34, 0),
(192, 21, 25, 0),
(193, 21, 26, 0),
(194, 21, 27, 0),
(195, 21, 29, 0),
(196, 21, 35, 0),
(197, 21, 30, 0),
(198, 21, 38, 0),
(199, 21, 36, 0),
(200, 21, 31, 0),
(201, 21, 33, 0),
(202, 20, 60, 0),
(203, 15, 60, 0),
(204, 14, 61, 0),
(205, 15, 61, 0),
(206, 14, 62, 0),
(207, 15, 62, 0),
(208, 15, 63, 0),
(209, 15, 64, 0);

-- --------------------------------------------------------

--
-- Table structure for table `working_experience`
--

CREATE TABLE IF NOT EXISTS `working_experience` (
  `working_experience_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `working_experience_desc` longtext NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`working_experience_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `working_experience`
--

INSERT INTO `working_experience` (`working_experience_id`, `emp_id`, `working_experience_desc`, `status`) VALUES
(6, 5, 'Worked with air malaysia', 0),
(5, 5, 'Other training', 0),
(7, 7, '2008 - 2011 Worked with Safaricom. 2011 - Todate running own company', 0),
(8, 26, 'worked with myselfffdd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `working_experienceold`
--

CREATE TABLE IF NOT EXISTS `working_experienceold` (
  `other_training_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `other_training_description` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`other_training_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `working_experienceold`
--

INSERT INTO `working_experienceold` (`other_training_id`, `emp_id`, `other_training_description`, `status`) VALUES
(5, 5, 'Other training', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_place`
--

CREATE TABLE IF NOT EXISTS `work_place` (
  `work_place_id` int(10) NOT NULL AUTO_INCREMENT,
  `work_place_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`work_place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `work_place`
--

INSERT INTO `work_place` (`work_place_id`, `work_place_name`, `status`) VALUES
(1, 'Head Quarters', 0),
(7, 'Clients Premises', 1);
