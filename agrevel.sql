-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 10:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agrevel`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(10) NOT NULL AUTO_INCREMENT,
  `account_cat_id` int(10) NOT NULL,
  `account_type_id` int(10) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) NOT NULL,
  `status1` int(1) NOT NULL,
  `status2` int(1) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_category`
--

CREATE TABLE IF NOT EXISTS `account_category` (
  `account_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `account_cat_name` varchar(100) NOT NULL,
  `account_cat_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`account_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `account_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `account_cat_id` int(10) NOT NULL,
  `account_type_name` varchar(100) NOT NULL,
  `account_type_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`account_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `additional_investments`
--

CREATE TABLE IF NOT EXISTS `additional_investments` (
  `additional_investments_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `shareholder_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`additional_investments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `additional_investments_ledger`
--

CREATE TABLE IF NOT EXISTS `additional_investments_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adjusted_items`
--

CREATE TABLE IF NOT EXISTS `adjusted_items` (
  `adjusted_item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `quantity_adjusted` varchar(100) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `reason` longtext NOT NULL,
  `date_adjusted` date NOT NULL,
  `status` int(1) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`adjusted_item_id`),
  KEY `supplier_id` (`unit_price`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `all_rfq`
--

CREATE TABLE IF NOT EXISTS `all_rfq` (
  `all_rfq_id` int(10) NOT NULL AUTO_INCREMENT,
  `rfq_no` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `rfq_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`all_rfq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `apparatus_cat`
--

CREATE TABLE IF NOT EXISTS `apparatus_cat` (
  `app_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `app_cat_desc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`app_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approved_client_payment`
--

CREATE TABLE IF NOT EXISTS `approved_client_payment` (
  `approved_client_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_payment_id` int(11) NOT NULL,
  `approving_user_id` int(10) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`approved_client_payment_id`),
  KEY `supplier_id` (`approving_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approved_job_cards`
--

CREATE TABLE IF NOT EXISTS `approved_job_cards` (
  `approved_job_card_id` int(10) NOT NULL AUTO_INCREMENT,
  `job_card_id` int(11) NOT NULL,
  `approving_user_id` int(10) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`approved_job_card_id`),
  KEY `supplier_id` (`approving_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approved_lpo`
--

CREATE TABLE IF NOT EXISTS `approved_lpo` (
  `approved_lpo_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code` int(11) NOT NULL,
  `approving_user_id` int(10) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`approved_lpo_id`),
  KEY `supplier_id` (`approving_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `approved_payroll`
--

CREATE TABLE IF NOT EXISTS `approved_payroll` (
  `approved_payroll_id` int(10) NOT NULL AUTO_INCREMENT,
  `payroll_id` int(10) NOT NULL,
  `date_approved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approving_user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`approved_payroll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_job_card`
--

CREATE TABLE IF NOT EXISTS `assigned_job_card` (
  `assigned_job_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `job_card_task_id` int(11) NOT NULL,
  `begin_date` date NOT NULL,
  `begin_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `technician_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_status` int(11) NOT NULL,
  PRIMARY KEY (`assigned_job_card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `audit_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date_of_event` datetime NOT NULL,
  `action` varchar(200) NOT NULL,
  PRIMARY KEY (`audit_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=288 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 19, '2015-06-15 10:49:59', 'Updates Sales Items details'),
(2, 19, '2015-06-15 11:25:02', 'Updated an LPO transaction trasaction'),
(3, 19, '2015-06-15 11:25:15', 'Updated an LPO transaction trasaction'),
(4, 19, '2015-06-15 11:25:27', 'Updated an LPO transaction trasaction'),
(5, 19, '2015-06-15 11:35:14', 'Approved LPO: No BD0001/2015'),
(6, 19, '2015-06-15 12:57:13', 'Received 6  () into the warehous'),
(7, 19, '2015-06-15 12:57:13', 'Received 3  () into the warehous'),
(8, 19, '2015-06-15 13:06:06', 'Updated an LPO transaction trasaction'),
(9, 19, '2015-06-15 13:42:30', 'edited freight cost'),
(10, 19, '2015-06-15 14:03:07', 'edited advance margin'),
(11, 19, '2015-06-15 14:04:28', 'edited advance margin'),
(12, 19, '2015-06-15 14:11:39', 'edited advance margin'),
(13, 19, '2015-06-15 14:15:01', 'edited advance margin'),
(14, 19, '2015-06-15 14:15:13', 'edited advance margin'),
(15, 19, '2015-06-15 14:19:36', 'edited advance margin'),
(16, 19, '2015-06-15 14:36:08', 'Approved LPO: No BD0002/2015'),
(17, 19, '2015-06-15 14:36:42', 'Received 20  () into the warehous'),
(18, 19, '2015-06-15 14:37:51', 'edited advance margin'),
(19, 19, '2015-08-24 05:43:28', 'Edited chart of accounts details'),
(20, 19, '2015-08-24 05:44:24', 'Edited chart of accounts details'),
(21, 19, '2015-08-24 05:44:32', 'Edited chart of accounts details'),
(22, 19, '2015-08-24 05:44:39', 'Edited chart of accounts details'),
(23, 19, '2015-08-24 05:44:45', 'Edited chart of accounts details'),
(24, 19, '2015-08-24 05:44:58', 'Edited chart of accounts details'),
(25, 19, '2015-08-24 05:45:59', 'Edited chart of accounts details'),
(26, 19, '2015-08-24 05:46:21', 'Edited chart of accounts details'),
(27, 19, '2015-08-24 06:21:21', 'Edited chart of accounts details'),
(28, 19, '2015-08-24 14:53:15', 'Edited chart of accounts details'),
(29, 19, '2015-08-24 15:40:13', 'Edited chart of accounts details'),
(30, 19, '2015-08-24 15:46:32', 'Edited chart of accounts details'),
(31, 19, '2015-08-24 15:47:18', 'Edited chart of accounts details'),
(32, 19, '2015-08-24 15:48:04', 'Edited chart of accounts details'),
(33, 19, '2015-08-24 17:25:12', 'Edited chart of accounts details'),
(34, 19, '2015-08-24 17:27:59', 'Edited chart of accounts details'),
(35, 162, '2015-08-26 15:40:49', 'Created a supplier  Stratam General Suppliers into the system'),
(36, 162, '2015-08-26 17:04:59', 'Created a supplier  Kinyanjui and Sons into the system'),
(37, 162, '2015-08-26 17:07:14', 'Created a supplier  Jared Suppliers Limited into the system'),
(38, 162, '2015-08-27 04:09:48', 'Received 450 Motorolla X15 () into the warehous'),
(39, 162, '2015-08-27 04:09:48', 'Received 40 Samsung Note5 () into the warehous'),
(40, 162, '2015-08-27 04:16:13', 'Updated an LPO transaction trasaction'),
(41, 162, '2015-08-27 04:26:26', 'Received 7 Alcatel Mobile () into the warehous'),
(42, 162, '2015-08-27 04:26:26', 'Received 9 Nokia N870 () into the warehous'),
(43, 162, '2015-08-27 04:41:47', 'edited freight cost'),
(44, 162, '2015-08-27 04:43:40', 'edited freight cost'),
(45, 162, '2015-08-27 04:49:28', 'edited freight cost'),
(46, 162, '2015-08-27 04:50:08', 'edited freight cost'),
(47, 162, '2015-08-27 05:40:35', 'Updated details of received Nokia N870 () to the warehouse transaction'),
(48, 162, '2015-08-27 05:41:44', 'Updated details of received Motorolla X15 () to the warehouse transaction'),
(49, 162, '2015-08-27 11:35:26', 'Received 100 Motorolla X15 () into the warehous'),
(50, 162, '2015-08-27 11:37:57', 'edited freight cost'),
(51, 162, '2015-08-27 11:47:20', 'edited freight cost'),
(52, 162, '2015-08-27 12:10:29', 'edited freight cost'),
(53, 162, '2015-08-27 12:41:36', 'edited freight cost'),
(54, 162, '2015-08-27 12:47:14', 'Received 10 Infinix () into the warehous'),
(55, 162, '2015-08-27 12:47:14', 'Received 15 LG007 () into the warehous'),
(56, 162, '2015-08-27 12:52:43', 'Received 8 Motorolla X15 () into the warehous'),
(57, 162, '2015-08-27 12:52:43', 'Received 6 Techno T341 () into the warehous'),
(58, 162, '2015-08-27 13:16:19', 'Received 0 Motorolla X15 () into the warehous'),
(59, 162, '2015-08-27 13:16:19', 'Received 0 Techno T341 () into the warehous'),
(60, 162, '2015-08-27 13:27:05', 'Received 0 Motorolla X15 () into the warehous'),
(61, 162, '2015-08-27 13:27:05', 'Received 0 Techno T341 () into the warehous'),
(62, 162, '2015-08-27 17:21:01', 'Updates Sales Items details'),
(63, 162, '2015-08-28 03:03:24', 'Updates Sales Items details'),
(64, 162, '2015-08-28 21:44:58', 'Updates Sales Items details'),
(65, 162, '2015-08-28 21:45:25', 'Updates Sales Items details'),
(66, 162, '2015-08-28 22:00:51', 'Edited chart of accounts details'),
(67, 162, '2015-08-29 13:05:42', 'Updates Sales Items details'),
(68, 162, '2015-08-29 14:02:56', 'Edited chart of accounts details'),
(69, 19, '2015-08-30 04:09:56', 'Updated Sales details'),
(70, 19, '2015-08-30 04:11:07', 'Updated Sales details'),
(71, 19, '2015-08-30 04:13:40', 'Updated Sales details'),
(72, 19, '2015-08-30 04:15:43', 'Updated Sales details'),
(73, 19, '2015-08-30 04:16:20', 'Updated Sales details'),
(74, 19, '2015-08-30 04:16:29', 'Updated Sales details'),
(75, 19, '2015-08-30 04:38:49', 'Updated Sales details'),
(76, 19, '2015-08-30 04:45:54', 'Updated Sales details'),
(77, 19, '2015-08-30 04:49:42', 'Updated Sales details'),
(78, 19, '2015-08-30 04:51:05', 'Updated Sales details'),
(79, 19, '2015-08-30 04:53:04', 'Updated Sales details'),
(80, 19, '2015-08-30 05:02:08', 'Updated Sales details'),
(81, 19, '2015-08-30 05:12:39', 'Updated Sales details'),
(82, 19, '2015-08-30 05:27:02', 'Updated Sales details'),
(83, 19, '2015-08-30 05:27:28', 'Updated Sales details'),
(84, 19, '2015-08-30 05:28:02', 'Updated Sales details'),
(85, 19, '2015-08-30 05:28:34', 'Updated Sales details'),
(86, 19, '2015-08-30 05:31:10', 'Updates Sales Items details'),
(87, 19, '2015-08-30 05:37:22', 'Updated Sales details'),
(88, 19, '2015-08-30 05:41:11', 'Updates Sales Items details'),
(89, 19, '2015-08-30 05:47:05', 'Updated Sales details'),
(90, 19, '2015-08-30 05:47:38', 'Updates Sales Items details'),
(91, 19, '2015-08-30 05:48:07', 'Updated Sales details'),
(92, 19, '2015-08-30 05:49:21', 'Edited chart of accounts details'),
(93, 19, '2015-08-30 05:49:32', 'Updated Sales details'),
(94, 19, '2015-08-30 06:01:59', 'Updated Sales details'),
(95, 19, '2015-08-31 03:38:09', 'Updated Sales details'),
(96, 19, '2015-08-31 04:12:06', 'Canceled a Invoice No 14'),
(97, 19, '2015-08-31 04:16:47', 'Canceled a Invoice No 15'),
(98, 19, '2015-08-31 04:20:29', 'Canceled a Invoice No 10'),
(99, 19, '2015-08-31 04:29:53', 'Canceled a Invoice No 17'),
(100, 19, '2015-08-31 05:14:36', 'Canceled a cash sales receipt No 18'),
(101, 19, '2015-08-31 05:21:30', 'Canceled a cash sales receipt No 19'),
(102, 19, '2015-08-31 05:27:04', 'Canceled a cash sales receipt No 18'),
(103, 19, '2015-08-31 05:29:29', 'Canceled a cash sales receipt No 19'),
(104, 19, '2015-08-31 05:30:53', 'Canceled a cash sales receipt No 20'),
(105, 19, '2015-09-02 05:20:10', 'Updated Customer payments details received from '),
(106, 19, '2015-09-02 05:21:06', 'Updated Customer payments details received from '),
(107, 19, '2015-09-02 05:23:54', 'Updated Customer payments details received from Brisk Diagnostics Limited'),
(108, 19, '2015-09-02 05:50:29', 'Updated Customer payments details received from Joska Trading Company'),
(109, 19, '2015-09-02 05:57:51', 'Updated Customer payments details received from Joska Trading Company'),
(110, 19, '2015-09-02 05:59:48', 'Updated Customer payments details received from Joska Trading Company'),
(111, 19, '2015-09-02 06:06:52', 'Updated Customer payments details received from Joska Trading Company'),
(112, 19, '2015-09-02 06:08:12', 'Updated Customer payments details received from Brisk Diagnostics Limited'),
(113, 19, '2015-09-02 06:11:33', 'Updated Customer payments details received from Brisk Diagnostics Limited'),
(114, 19, '2015-09-02 06:19:37', 'Updated Customer payments details received from Joska Trading Company'),
(115, 19, '2015-09-02 06:21:07', 'Updated Customer payments details received from Joska Trading Company'),
(116, 19, '2015-09-02 06:21:58', 'Updated Customer payments details received from Joska Trading Company'),
(117, 19, '2015-09-02 06:25:58', 'Updated Customer payments details received from Test customer'),
(118, 19, '2015-09-02 06:26:40', 'Updated Customer payments details received from Joska Trading Company'),
(119, 19, '2015-09-02 06:34:10', 'Deleted Invoice payment/Client Payments received from '),
(120, 19, '2015-09-02 11:35:33', 'Updated Customer payments details received from Brisk Diagnostics Limited'),
(121, 19, '2015-09-02 14:45:10', 'Updated an Sales Returns transaction trasaction'),
(122, 19, '2015-09-02 14:55:44', 'Updates Sales Returns Items Transactions'),
(123, 19, '2015-09-02 15:00:50', 'Updates Sales Returns Items Transactions'),
(124, 19, '2015-09-02 15:13:29', 'Deleted a sales return item transaction'),
(125, 19, '2015-09-02 15:14:41', 'Updated an Sales Returns transaction trasaction'),
(126, 19, '2015-09-02 18:12:33', 'Viewed all recorded cheque deposits'),
(127, 19, '2015-09-02 18:13:27', 'Viewed all recorded cheque deposits'),
(128, 19, '2015-09-02 18:13:56', 'Viewed all recorded cheque deposits'),
(129, 19, '2015-09-02 18:16:18', 'Viewed all recorded cheque deposits'),
(130, 19, '2015-09-02 19:57:01', 'Deleted fund transfer transactions'),
(131, 19, '2015-09-02 19:58:17', 'Deleted fund transfer transactions'),
(132, 19, '2015-09-02 19:59:13', 'Deleted fund transfer transactions'),
(133, 19, '2015-09-02 20:00:26', 'Deleted fund transfer transactions'),
(134, 19, '2015-09-04 06:20:38', 'Updated an LPO transaction trasaction'),
(135, 19, '2015-09-04 06:32:15', 'Updated an LPO transaction trasaction'),
(136, 19, '2015-09-04 06:32:42', 'Updated an LPO transaction trasaction'),
(137, 19, '2015-09-04 10:31:20', 'Received 4 N105 () into the warehous'),
(138, 19, '2015-09-04 10:31:20', 'Received 2 Techno T341 () into the warehous'),
(139, 19, '2015-09-04 10:31:20', 'Received 1 Motorolla X15 () into the warehous'),
(140, 19, '2015-09-04 10:31:20', 'Received 2 Samsung Galaxy S4 () into the warehous'),
(141, 19, '2015-09-04 10:31:20', 'Received 5 Nokia N870 () into the warehous'),
(142, 19, '2015-09-04 10:32:09', 'Received 4 N105 () into the warehous'),
(143, 19, '2015-09-04 10:32:09', 'Received 2 Techno T341 () into the warehous'),
(144, 19, '2015-09-04 10:32:09', 'Received 1 Motorolla X15 () into the warehous'),
(145, 19, '2015-09-04 10:32:09', 'Received 2 Samsung Galaxy S4 () into the warehous'),
(146, 19, '2015-09-04 10:32:09', 'Received 5 Nokia N870 () into the warehous'),
(147, 19, '2015-09-04 10:33:42', 'Received 4 N105 () into the warehous'),
(148, 19, '2015-09-04 10:33:42', 'Received 3 Techno T341 () into the warehous'),
(149, 19, '2015-09-04 10:33:42', 'Received 3 Motorolla X15 () into the warehous'),
(150, 19, '2015-09-04 10:33:42', 'Received 2 Samsung Galaxy S4 () into the warehous'),
(151, 19, '2015-09-04 10:33:42', 'Received 2 Nokia N870 () into the warehous'),
(152, 19, '2015-09-04 11:05:52', 'Received 2 N105 () into the warehous'),
(153, 19, '2015-09-04 11:05:52', 'Received 0 Techno T341 () into the warehous'),
(154, 19, '2015-09-04 11:05:52', 'Received 1 Motorolla X15 () into the warehous'),
(155, 19, '2015-09-04 11:05:52', 'Received 1 Samsung Galaxy S4 () into the warehous'),
(156, 19, '2015-09-04 11:05:52', 'Received 4 Nokia N870 () into the warehous'),
(157, 19, '2015-09-04 11:08:57', 'Received 20 Nokia N870 () into the warehous'),
(158, 19, '2015-09-04 11:08:57', 'Received 5 Motorolla X15 () into the warehous'),
(159, 19, '2015-09-04 11:10:03', 'Received 0 Nokia N870 () into the warehous'),
(160, 19, '2015-09-04 11:10:03', 'Received 0 Motorolla X15 () into the warehous'),
(161, 19, '2015-09-04 11:37:25', 'Received 450 Motorolla X15 () into the warehous'),
(162, 19, '2015-09-04 11:37:25', 'Received 40 Samsung Note5 () into the warehous'),
(163, 19, '2015-09-04 11:37:25', 'Received 10 LG007 () into the warehous'),
(164, 19, '2017-05-28 23:35:42', 'Received 6 N105 () into the warehous'),
(165, 19, '2017-05-28 23:35:42', 'Received 3 Techno T341 () into the warehous'),
(166, 19, '2017-05-28 23:35:42', 'Received 4 Motorolla X15 () into the warehous'),
(167, 19, '2017-05-28 23:35:42', 'Received 3 Samsung Galaxy S4 () into the warehous'),
(168, 19, '2017-05-28 23:35:42', 'Received 6 Nokia N870 () into the warehous'),
(169, 19, '2017-05-28 23:35:42', 'Received 5 Motorolla X15 () into the warehous'),
(170, 19, '2017-05-28 23:35:42', 'Received 16 Nokia N535 () into the warehous'),
(171, 77, '2017-07-14 04:30:13', 'Updates Sales Items details'),
(172, 77, '2017-07-14 04:30:57', 'Updates Sales Items details'),
(173, 19, '2017-07-14 15:25:45', 'Updated Sales details'),
(174, 19, '2017-07-14 15:26:01', 'Updated Sales details'),
(175, 19, '2017-07-14 15:26:08', 'Updated Sales details'),
(176, 19, '2017-07-14 15:26:18', 'Updated Sales details'),
(177, 19, '2017-07-14 15:26:28', 'Updated Sales details'),
(178, 19, '2017-07-14 15:27:07', 'Updated Sales details'),
(179, 19, '2017-07-14 15:27:18', 'Updated Sales details'),
(180, 19, '2017-07-14 15:41:10', 'Updated Sales details'),
(181, 19, '2017-07-14 15:41:38', 'Updated Sales details'),
(182, 19, '2017-07-14 15:42:12', 'Updated Sales details'),
(183, 19, '2017-07-14 15:42:28', 'Updated Sales details'),
(184, 19, '2017-07-15 03:58:40', 'Updated Sales details'),
(185, 19, '2017-07-15 03:58:59', 'Updated Sales details'),
(186, 19, '2017-07-15 03:59:08', 'Updated Sales details'),
(187, 19, '2017-07-15 04:25:43', 'Received 10 ACETAMINOPHEN () into the warehous'),
(188, 19, '2017-07-15 04:25:43', 'Received 20 Super Curl 120ml () into the warehous'),
(189, 19, '2017-07-15 04:29:24', 'Received 1000 METHYLBENZOQUATE () into the warehous'),
(190, 19, '2017-07-15 04:52:41', 'Updated Sales details'),
(191, 100, '2017-07-15 05:56:56', 'Received 4 BENZYLADENINE () into the warehous'),
(192, 100, '2017-07-15 06:01:46', 'Received 5 ACETAMINOPHEN () into the warehous'),
(193, 100, '2017-07-15 06:04:09', 'Received 3 BENZYLADENINE () into the warehous'),
(194, 100, '2017-07-15 06:04:09', 'Received 2 METHYLBENZOQUATE () into the warehous'),
(195, 19, '2017-07-15 06:16:45', 'Received 12 ACETAMINOPHEN () into the warehous'),
(196, 19, '2017-07-15 06:16:45', 'Received 200 BENZYLADENINE () into the warehous'),
(197, 19, '2017-07-15 06:16:45', 'Received 80 METHYLBENZOQUATE () into the warehous'),
(198, 19, '2017-07-15 06:16:45', 'Received 30 Super Curl 120ml () into the warehous'),
(199, 19, '2017-07-15 16:42:35', 'Received 6 ACETAMINOPHEN () into the warehous'),
(200, 19, '2017-07-15 16:42:35', 'Received 45 Super Curl 120ml () into the warehous'),
(201, 77, '2017-08-15 00:51:10', 'Updated an invoice trasaction'),
(202, 77, '2017-08-15 00:51:20', 'Updated an invoice trasaction'),
(203, 77, '2017-08-15 00:51:35', 'Updated an invoice trasaction'),
(204, 77, '2017-08-15 00:54:57', 'Deleted a purchase order transaction'),
(205, 77, '2017-08-15 01:15:18', 'Updated an invoice trasaction'),
(206, 77, '2017-08-15 01:15:24', 'Updated an invoice trasaction'),
(207, 77, '2017-08-15 01:16:06', 'Updated an invoice trasaction'),
(208, 77, '2017-08-15 01:16:32', 'Updated an invoice trasaction'),
(209, 77, '2017-08-15 01:16:42', 'Updated an invoice trasaction'),
(210, 77, '2017-08-15 01:17:09', 'Updated an invoice trasaction'),
(211, 77, '2017-08-15 01:17:16', 'Updated an invoice trasaction'),
(212, 77, '2017-08-15 01:17:22', 'Updated an invoice trasaction'),
(213, 77, '2017-08-15 01:17:28', 'Updated an invoice trasaction'),
(214, 77, '2017-08-15 01:17:33', 'Updated an invoice trasaction'),
(215, 77, '2017-08-15 01:17:44', 'Updated an invoice trasaction'),
(216, 19, '2017-08-15 01:40:28', 'Updated an invoice trasaction'),
(217, 19, '2017-08-15 01:40:39', 'Updated an invoice trasaction'),
(218, 19, '2017-08-15 01:40:47', 'Updated an invoice trasaction'),
(219, 19, '2017-08-15 01:41:00', 'Updated an invoice trasaction'),
(220, 19, '2017-08-15 01:41:11', 'Updated an invoice trasaction'),
(221, 19, '2017-08-15 01:45:44', 'Canceled Purchase Order BD0006/2017'),
(222, 19, '2017-08-15 01:46:01', 'Canceled Purchase Order BD0003/2017'),
(223, 100, '2017-08-15 09:14:31', 'Received 56 ACETAMINOPHEN () into the warehous'),
(224, 100, '2017-08-15 09:18:45', 'Received 56 ACETAMINOPHEN () into the warehous'),
(225, 100, '2017-08-15 09:26:23', 'Received 60 ACETAMINOPHEN () into the warehous'),
(226, 100, '2017-08-15 10:13:29', 'Created a supplier Njiru Suppliers into the system'),
(227, 100, '2017-08-15 10:19:37', 'Received 3 ACETAMINOPHEN () into the warehous'),
(228, 19, '2017-08-16 03:16:23', 'Received 45 ACETAMINOPHEN () into the warehous'),
(229, 19, '2017-08-16 03:18:14', 'Updated an invoice trasaction'),
(230, 19, '2017-08-16 03:56:26', 'Edited payments paid to supplier '),
(231, 19, '2017-08-16 03:57:02', 'Edited payments paid to supplier '),
(232, 19, '2017-08-16 03:59:13', 'Deleted Supplier Payments Details made to  MAXAMUD'),
(233, 19, '2017-08-16 04:05:02', 'Deleted Supplier Payments Details made to  MAXAMUD'),
(234, 19, '2017-08-16 04:30:34', 'Updated Sales details'),
(235, 19, '2017-08-17 04:21:54', 'Updated Sales details'),
(236, 19, '2017-08-17 04:28:48', 'Updated Sales details'),
(237, 19, '2017-08-17 04:34:06', 'Updated Sales details'),
(238, 19, '2017-08-17 04:59:58', 'Updated Sales details'),
(239, 19, '2017-08-17 06:23:27', 'Viewed all recorded cash withdrawals'),
(240, 19, '2017-08-17 15:52:34', 'edited user currency euro'),
(241, 19, '2017-08-17 16:14:33', 'Received 60 Nemarid Super 200ml () into the warehous'),
(242, 19, '2017-08-17 16:14:33', 'Received 90 Multicure 2.5% 1L () into the warehous'),
(243, 19, '2017-08-17 16:14:33', 'Received 100 Nemarid Super 500ml () into the warehous'),
(244, 19, '2017-08-17 17:01:24', 'Edited payments paid to supplier '),
(245, 19, '2017-08-17 17:11:36', 'Updated Sales details'),
(246, 19, '2017-08-17 17:22:08', 'Received 200 Nemarid Super 200ml () into the warehous'),
(247, 19, '2017-08-20 04:30:50', 'Created a supplier Centtech Technologies into the system'),
(248, 19, '2017-08-20 05:11:16', 'Updated an invoice trasaction'),
(249, 19, '2017-08-20 05:12:17', 'Updated an invoice trasaction'),
(250, 19, '2017-08-20 05:12:36', 'Updated an invoice trasaction'),
(251, 19, '2017-08-20 05:13:27', 'Updated an invoice trasaction'),
(252, 19, '2017-08-20 05:13:41', 'Updated an invoice trasaction'),
(253, 100, '2017-08-20 06:14:02', 'Received 7 Multicure 10% 120ml () into the warehous'),
(254, 100, '2017-08-20 06:14:02', 'Received 6 Multicure 2.5% 500ml () into the warehous'),
(255, 100, '2017-08-20 06:17:27', 'Received 56 Multicure 2.5% 1L () into the warehous'),
(256, 100, '2017-08-20 06:17:27', 'Received 7 Brude Lee () into the warehous'),
(257, 19, '2017-08-21 10:36:38', 'Updated Sales details'),
(258, 19, '2017-08-21 10:37:55', 'Updated Sales details'),
(259, 19, '2017-08-21 10:38:03', 'Updated Sales details'),
(260, 19, '2017-08-21 10:50:11', 'Updated Sales details'),
(261, 19, '2017-08-21 10:55:56', 'Updated Sales details'),
(262, 19, '2017-08-21 10:56:50', 'Updated Sales details'),
(263, 19, '2017-08-21 11:17:58', 'Updates Sales Items details'),
(264, 19, '2017-08-21 11:29:17', 'Received 60 Brude Lee () into the warehous'),
(265, 19, '2017-08-21 13:34:23', 'Updated Sales details'),
(266, 19, '2017-08-21 13:35:27', 'Updated Sales details'),
(267, 19, '2017-08-21 13:36:17', 'Updated Sales details'),
(268, 77, '2017-08-21 15:03:30', 'Deleted Invoice payment/Client Payments received from Yetu Invetsments Limited'),
(269, 77, '2017-08-21 18:00:42', 'Updated Customer payments details received from Yetu Invetsments Limited'),
(270, 77, '2017-08-21 18:10:07', 'Deleted Invoice payment/Client Payments received from Lena Agrovet'),
(271, 77, '2017-08-21 18:10:26', 'Updated Customer payments details received from Lena Agrovet'),
(272, 77, '2017-08-21 18:12:33', 'Updated Customer payments details received from Lena Agrovet'),
(273, 77, '2017-08-21 18:13:22', 'Updated Customer payments details received from Yetu Invetsments Limited'),
(274, 77, '2017-08-21 18:27:30', 'Deleted Invoice payment/Client Payments received from Yetu Invetsments Limited'),
(275, 19, '2017-08-22 01:19:34', 'Received 2 Nemarid Super 200ml () into the warehous'),
(276, 19, '2017-08-22 01:39:30', 'Received 1 Nemarid Super 200ml () into the warehous'),
(277, 19, '2017-08-22 01:46:46', 'Received 2 Multicure 2.5% 1L () into the warehous'),
(278, 19, '2017-08-22 02:31:45', 'Updated Sales details'),
(279, 19, '2017-08-22 02:39:42', 'Updated Sales details'),
(280, 19, '2017-08-22 02:41:07', 'Updated Sales details'),
(281, 19, '2017-08-22 08:23:14', 'Created a supplier Karen Supplies Limited into the system'),
(282, 19, '2017-08-22 09:02:44', 'Updated an invoice trasaction'),
(283, 19, '2017-08-22 09:22:40', 'Received 10 Multicure 2.5% 1L () into the warehous'),
(284, 19, '2017-08-22 09:24:30', 'Received 10 Multicure 2.5% 1L () into the warehous'),
(285, 19, '2017-08-22 09:33:09', 'Received 15 Nemarid Super 200ml () into the warehous'),
(286, 19, '2017-08-22 10:39:19', 'Received 5 Hardex 1L () into the warehous'),
(287, 19, '2017-08-22 10:40:20', 'Received 5 Hardex 1L () into the warehous');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trails`
--

CREATE TABLE IF NOT EXISTS `audit_trails` (
  `audit_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date_of_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` longtext NOT NULL,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 19, '2015-06-15 06:57:24', 'Created a customer Cash Sale into the system'),
(2, 19, '2015-06-15 07:02:00', 'Created a customer Yusuf into the system'),
(3, 19, '2015-06-18 08:21:30', 'Logged Into the system'),
(4, 19, '2015-07-01 09:16:36', 'Logged Into the system'),
(5, 19, '2015-07-02 02:25:25', 'Logged Into the system'),
(6, 19, '2015-07-22 11:49:24', 'Logged Into the system'),
(7, 19, '2015-08-24 00:34:10', 'Logged Into the system'),
(8, 19, '2015-08-24 00:48:46', 'Logged Into the system'),
(9, 19, '2015-08-24 01:11:16', 'Updated Sub Module Details'),
(10, 19, '2015-08-24 13:42:45', 'Signed out of the system'),
(11, 83, '2015-08-24 13:42:57', 'Logged Into the system'),
(12, 83, '2015-08-24 13:44:58', 'Logged Into the system'),
(13, 83, '2015-08-24 13:46:28', 'Logged Into the system'),
(14, 83, '2015-08-24 13:46:35', 'Signed out of the system'),
(15, 19, '2015-08-24 13:46:43', 'Logged Into the system'),
(16, 19, '2015-08-24 13:58:13', 'Created an item  into the system'),
(17, 19, '2015-08-26 01:47:03', 'Created an item Samsung Galaxy S4 into the system'),
(18, 32, '2015-08-26 02:21:52', 'Created an item Infinix into the system'),
(19, 32, '2015-08-26 02:24:25', 'Created an item LG007 into the system'),
(20, 32, '2015-08-26 02:26:51', 'Created an item Motorolla X15 into the system'),
(21, 32, '2015-08-26 02:32:15', 'Created an item Samsung Note3 into the system'),
(22, 32, '2015-08-26 02:56:42', 'Created an item HTC 360 into the system'),
(23, 32, '2015-08-26 09:10:05', 'Updated a item 345 details'),
(24, 32, '2015-08-26 09:11:14', 'Updated a item Alcatel Mobile details'),
(25, 32, '2015-08-26 09:12:02', 'Updated a item N105 details'),
(26, 32, '2015-08-26 09:12:15', 'Updated a item N105 details'),
(27, 32, '2015-08-26 09:12:55', 'Updated a item Nokia N870 details'),
(28, 32, '2015-08-26 09:13:23', 'Updated a item T341 details'),
(29, 32, '2015-08-26 09:13:40', 'Updated a item Techno T341 details'),
(30, 32, '2015-08-26 09:19:56', 'deleted an item from the system'),
(31, 32, '2015-08-26 09:22:06', 'Created an item Samsung Note5 into the system'),
(32, 162, '2015-08-26 09:52:19', 'Created an item Samsung Tablet into the system'),
(33, 162, '2015-08-26 09:55:54', 'Updated Sub Module Details'),
(34, 162, '2015-08-26 11:37:00', 'Updated Sub Module Details'),
(35, 162, '2015-08-26 12:01:33', 'Created a customer Brisk Diagnostics Limited into the system'),
(36, 162, '2015-08-26 12:06:59', 'Created a customer Joska Trading Company into the system'),
(37, 162, '2015-08-26 12:09:18', 'Created a customer Test customer into the system'),
(38, 162, '2015-08-26 12:13:32', 'Created a customer Joyce Laboso into the system'),
(39, 162, '2015-08-26 12:23:03', 'Updated Sub Module Details'),
(40, 162, '2015-08-26 12:23:04', 'Updated Sub Module Details'),
(41, 162, '2015-08-26 12:50:36', 'Deleted a customer from the system'),
(42, 162, '2015-08-26 12:51:45', 'Created a customer Victor Wanyama into the system'),
(43, 162, '2015-08-26 12:52:07', 'Deleted a customer from the system'),
(44, 162, '2015-08-26 13:36:34', 'Updated Sub Module Details'),
(45, 162, '2015-08-27 00:52:04', 'Added more lpo items into the system'),
(46, 162, '2015-08-27 01:18:34', 'Updated Sub Module Details'),
(47, 162, '2015-08-27 13:15:18', 'Updated Sub Module Details'),
(48, 162, '2015-08-27 13:15:27', 'Updated Sub Module Details'),
(49, 162, '2015-08-27 13:16:03', 'Updated Sub Module Details'),
(50, 162, '2015-08-27 14:24:44', 'Added sales items into the system'),
(51, 162, '2015-08-29 03:22:26', 'Created an item Mulika Mwizi into the system'),
(52, 162, '2015-08-29 10:39:14', 'Updated Sub Module Details'),
(53, 162, '2015-08-29 11:21:37', 'Signed out of the system'),
(54, 19, '2015-08-29 11:21:45', 'Logged Into the system'),
(55, 19, '2015-08-30 00:22:03', 'Signed out of the system'),
(56, 83, '2015-08-30 00:22:12', 'Logged Into the system'),
(57, 83, '2015-08-30 00:24:08', 'Signed out of the system'),
(58, 19, '2015-08-30 00:24:16', 'Logged Into the system'),
(59, 19, '2015-08-31 00:38:36', 'Added sales items into the system'),
(60, 19, '2015-08-31 00:42:58', 'Signed out of the system'),
(61, 83, '2015-08-31 00:43:15', 'Logged Into the system'),
(62, 83, '2015-08-31 01:11:24', 'Signed out of the system'),
(63, 19, '2015-08-31 01:11:32', 'Logged Into the system'),
(64, 19, '2015-08-31 01:28:12', 'Added sales items into the system'),
(65, 19, '2015-08-31 04:04:46', 'Signed out of the system'),
(66, 83, '2015-08-31 04:04:58', 'Logged Into the system'),
(67, 19, '2015-09-02 00:34:54', 'Logged Into the system'),
(68, 19, '2015-09-02 00:44:24', 'Updated Sub Module Details'),
(69, 162, '2015-09-02 00:53:45', 'Signed out of the system'),
(70, 19, '2015-09-02 00:53:53', 'Logged Into the system'),
(71, 19, '2015-09-02 09:36:38', 'Logged Into the system'),
(72, 19, '2015-09-02 12:11:51', 'Added more sales returns items into the system'),
(73, 19, '2015-09-02 12:21:24', 'Updated Sub Module Details'),
(74, 19, '2015-09-02 12:22:57', 'Updated Sub Module Details'),
(75, 19, '2015-09-02 12:23:45', 'Updated Sub Module Details'),
(76, 19, '2015-09-02 12:26:58', 'Updated Sub Module Details'),
(77, 19, '2015-09-02 23:54:35', 'Updated Sub Module Details'),
(78, 19, '2015-09-02 23:56:17', 'Updated Sub Module Details'),
(79, 19, '2015-09-02 23:56:29', 'Updated Sub Module Details'),
(80, 19, '2015-09-04 01:11:31', 'Logged Into the system'),
(81, 0, '2015-09-04 01:24:20', 'Updated User Group Details'),
(82, 0, '2015-09-04 01:30:23', 'Updated User Group Details'),
(83, 19, '2015-09-04 01:36:34', 'Updated Sub Module Details'),
(84, 19, '2015-09-04 01:38:31', 'Updated Sub Module Details'),
(85, 19, '2015-09-04 01:39:35', 'Updated Sub Module Details'),
(86, 19, '2015-09-04 02:31:53', 'Updated Sub Module Details'),
(87, 19, '2015-09-04 02:32:50', 'Updated Sub Module Details'),
(88, 19, '2015-09-04 03:03:48', 'Signed out of the system'),
(89, 83, '2015-09-04 03:03:58', 'Logged Into the system'),
(90, 83, '2015-09-04 03:04:37', 'Signed out of the system'),
(91, 19, '2015-09-04 03:04:46', 'Logged Into the system'),
(92, 19, '2015-09-04 10:25:52', 'Updated Sub Module Details'),
(93, 19, '2015-09-04 12:31:22', 'Signed out of the system'),
(94, 19, '2015-09-04 12:32:09', 'Logged Into the system'),
(95, 19, '2015-09-04 12:38:48', 'Created an item Nokia 105 into the system'),
(96, 19, '2015-09-04 12:43:04', 'Created a customer Jamaaa Centre into the system'),
(97, 19, '2015-09-04 17:14:11', 'Created an item Nokia N535 into the system'),
(98, 76, '2015-09-08 00:28:13', 'Signed out of the system'),
(99, 19, '2015-09-08 00:28:23', 'Logged Into the system'),
(100, 19, '2017-05-28 20:29:40', 'Logged Into the system'),
(101, 19, '2017-05-28 20:37:34', 'Signed out of the system'),
(102, 83, '2017-05-28 20:37:46', 'Logged Into the system'),
(103, 83, '2017-05-28 20:40:39', 'Signed out of the system'),
(104, 19, '2017-05-28 20:40:44', 'Logged Into the system'),
(105, 19, '2017-05-28 20:41:40', 'Signed out of the system'),
(106, 19, '2017-07-12 08:31:30', 'Logged Into the system'),
(107, 19, '2017-07-12 08:34:14', 'Update item category NOKIA details into the system '),
(108, 19, '2017-07-12 08:47:57', 'Logged Into the system'),
(109, 19, '2017-07-12 09:12:53', 'Logged Into the system'),
(110, 19, '2017-07-12 09:13:38', 'Logged Into the system'),
(111, 19, '2017-07-12 09:16:55', 'Update item category Fertilizers details into the system '),
(112, 19, '2017-07-12 09:26:30', 'Update item category Pesticides details into the system '),
(113, 19, '2017-07-12 09:27:16', 'Update item category Insectisides details into the system '),
(114, 19, '2017-07-12 09:34:06', 'Created an item ACETAMINOPHEN into the system'),
(115, 19, '2017-07-12 09:43:23', 'Updated a item ACETAMINOPHEN details'),
(116, 19, '2017-07-12 09:43:28', 'Updated a item ACETAMINOPHEN details'),
(117, 19, '2017-07-12 09:44:38', 'Created an item ACETAMINOPHEN into the system'),
(118, 19, '2017-07-12 09:45:15', 'Created an item BENZYLADENINE into the system'),
(119, 19, '2017-07-12 09:46:55', 'Created an item METHYLBENZOQUATE into the system'),
(120, 19, '2017-07-12 11:57:06', 'Logged Into the system'),
(121, 19, '2017-07-12 12:13:25', 'Created an item Super Curl 120ml into the system'),
(122, 19, '2017-07-13 13:27:33', 'Logged Into the system'),
(123, 19, '2017-07-13 13:41:13', 'Updated Company Contact Details'),
(124, 19, '2017-07-13 13:42:38', 'Updated Company Contact Details'),
(125, 19, '2017-07-13 13:44:36', 'Updated Company Contact Details'),
(126, 32, '2017-07-13 17:19:30', 'Signed out of the system'),
(127, 19, '2017-07-13 17:19:39', 'Logged Into the system'),
(128, 0, '2017-07-13 17:36:55', 'Update customer Brisk Diagnostics Limited details into the system '),
(129, 0, '2017-07-13 23:26:17', 'Updated User Group Details'),
(130, 0, '2017-07-13 23:27:21', 'Updated User Group Details'),
(131, 0, '2017-07-13 23:27:30', 'Updated User Group Details'),
(132, 32, '2017-07-13 23:30:59', 'Updated Sub Module Details'),
(133, 32, '2017-07-13 23:32:19', 'Updated Sub Module Details'),
(134, 19, '2017-07-14 11:46:48', 'Logged Into the system'),
(135, 19, '2017-07-14 11:47:57', 'Created a customer Insurance Society Of Kenya into the system'),
(136, 19, '2017-07-14 12:50:41', 'Logged Into the system'),
(137, 19, '2017-07-14 13:15:29', 'Updated Company Contact Details'),
(138, 19, '2017-07-14 13:28:08', 'Updated Company Contact Details'),
(139, 0, '2017-07-14 17:12:15', 'Update customer Brisk Diagnostics Limited details into the system '),
(140, 19, '2017-07-15 00:55:51', 'Created a customer Brisk Diagnostics Limited into the system'),
(141, 19, '2017-07-15 00:56:13', 'Created a customer The Tanganyika Juniour School into the system'),
(142, 19, '2017-07-15 00:56:23', 'Created a customer Horn Of Africa Consultancy Limited into the system'),
(143, 19, '2017-07-15 00:56:36', 'Created a customer Centtech Technologies into the system'),
(144, 0, '2017-07-15 01:35:38', 'Update customer Centtech Technologies details into the system '),
(145, 0, '2017-07-15 01:48:52', 'Update customer Centtech Technologies details into the system '),
(146, 0, '2017-07-15 01:51:39', 'Update customer Centtech Technologies details into the system '),
(147, 0, '2017-07-15 01:53:17', 'Update customer Centtech Technologies details into the system '),
(148, 19, '2017-07-15 01:57:34', 'Updated Sub Module Details'),
(149, 19, '2017-07-15 02:02:47', 'Updated Sub Module Details'),
(150, 100, '2017-07-15 03:15:29', 'Signed out of the system'),
(151, 19, '2017-07-15 03:15:34', 'Logged Into the system'),
(152, 19, '2017-07-15 03:21:53', 'Added sales items into the system'),
(153, 19, '2017-07-15 03:36:42', 'Updated Company Contact Details'),
(154, 19, '2017-07-15 03:37:24', 'Updated Company Contact Details'),
(155, 19, '2017-07-15 04:00:42', 'Updated Sub Module Details'),
(156, 19, '2017-07-15 04:00:48', 'Updated Sub Module Details'),
(157, 19, '2017-07-15 04:01:00', 'Updated Sub Module Details'),
(158, 19, '2017-07-15 04:01:11', 'Updated Sub Module Details'),
(159, 19, '2017-07-15 04:30:03', 'Updated Sub Module Details'),
(160, 19, '2017-07-15 04:30:11', 'Updated Sub Module Details'),
(161, 19, '2017-07-15 04:34:30', 'Updated Sub Module Details'),
(162, 19, '2017-07-15 04:34:53', 'Updated Sub Module Details'),
(163, 19, '2017-07-15 04:37:32', 'Updated Sub Module Details'),
(164, 19, '2017-07-15 04:42:54', 'Updated Sub Module Details'),
(165, 19, '2017-07-15 04:43:47', 'Signed out of the system'),
(166, 19, '2017-07-15 04:43:55', 'Logged Into the system'),
(167, 19, '2017-07-15 06:13:44', 'Logged Into the system'),
(168, 19, '2017-07-15 08:19:47', 'Logged Into the system'),
(169, 19, '2017-07-17 10:22:37', 'Logged Into the system'),
(170, 19, '2017-07-18 10:35:13', 'Logged Into the system'),
(171, 19, '2017-07-25 02:54:50', 'Logged Into the system'),
(172, 19, '2017-08-13 04:41:20', 'Logged Into the system'),
(173, 19, '2017-08-14 17:19:05', 'Logged Into the system'),
(174, 19, '2017-08-14 19:10:46', 'Created an item Pseti45666 into the system'),
(175, 77, '2017-08-14 19:23:01', 'Created an item Amonia DAP into the system'),
(176, 77, '2017-08-14 19:23:38', 'deleted an item from the system'),
(177, 77, '2017-08-14 19:23:41', 'deleted an item from the system'),
(178, 77, '2017-08-14 19:24:22', 'Created an item Amonia DAP2 into the system'),
(179, 77, '2017-08-14 19:27:52', 'Created an item Kimera into the system'),
(180, 77, '2017-08-14 19:52:36', 'Updated an item Super Curl 120ml into the system'),
(181, 77, '2017-08-14 19:52:37', 'Updated an item  into the system'),
(182, 77, '2017-08-14 19:52:38', 'Updated an item  into the system'),
(183, 77, '2017-08-14 19:52:39', 'Updated an item  into the system'),
(184, 77, '2017-08-14 19:52:40', 'Updated an item  into the system'),
(185, 77, '2017-08-14 19:52:49', 'Updated an item  into the system'),
(186, 77, '2017-08-14 19:52:49', 'Updated an item  into the system'),
(187, 77, '2017-08-14 19:52:50', 'Updated an item  into the system'),
(188, 77, '2017-08-14 19:52:50', 'Updated an item  into the system'),
(189, 77, '2017-08-14 19:52:50', 'Updated an item  into the system'),
(190, 77, '2017-08-14 19:52:50', 'Updated an item  into the system'),
(191, 77, '2017-08-14 19:52:50', 'Updated an item  into the system'),
(192, 77, '2017-08-14 20:32:13', 'Updated an item  into the system'),
(193, 77, '2017-08-14 20:32:34', 'Updated an item ACETAMINOPHEN into the system'),
(194, 77, '2017-08-14 20:32:43', 'Updated an item ACETAMINOPHEN into the system'),
(195, 77, '2017-08-14 20:32:50', 'Updated an item ACETAMINOPHEN into the system'),
(196, 77, '2017-08-14 20:50:55', 'Created an item ACETAMINOPHEN into the system'),
(197, 100, '2017-08-14 21:02:28', 'Signed out of the system'),
(198, 19, '2017-08-14 21:02:32', 'Logged Into the system'),
(199, 19, '2017-08-14 21:02:54', 'Updated an item ACETAMINOPHEN into the system'),
(200, 19, '2017-08-14 21:04:47', 'Updated an item ACETAMINOPHEN into the system'),
(201, 77, '2017-08-14 21:54:36', 'Added more lpo items into the system'),
(202, 77, '2017-08-14 22:27:52', 'Signed out of the system'),
(203, 19, '2017-08-14 22:27:57', 'Logged Into the system'),
(204, 100, '2017-08-15 06:25:25', 'Updated Sub Module Details'),
(205, 19, '2017-08-16 00:09:54', 'Logged Into the system'),
(206, 19, '2017-08-16 01:18:18', 'Created a customer Mulembe Sacco into the system'),
(207, 19, '2017-08-17 01:09:41', 'Logged Into the system'),
(208, 77, '2017-08-17 03:30:33', 'Signed out of the system'),
(209, 19, '2017-08-17 03:30:37', 'Logged Into the system'),
(210, 19, '2017-08-17 11:59:23', 'Logged Into the system'),
(211, 19, '2017-08-17 12:02:37', 'Created an item category Agriculture into the system '),
(212, 19, '2017-08-17 12:02:53', 'Created an item category Environment into the system '),
(213, 19, '2017-08-17 12:03:01', 'Created an item category Vetinary into the system '),
(214, 19, '2017-08-17 12:03:13', 'Created an item category Aquatic Life into the system '),
(215, 19, '2017-08-17 12:12:29', 'Updated an item Nemarid Super 1L into the system'),
(216, 19, '2017-08-17 12:18:57', 'Created an item Nemarid Super 200ml into the system'),
(217, 19, '2017-08-17 12:24:02', 'Created an item Multicure 2.5% 1L into the system'),
(218, 19, '2017-08-17 12:24:57', 'Created an item Multicure 2.5% 500ml into the system'),
(219, 19, '2017-08-17 12:25:46', 'Created an item Multicure 10% 1L into the system'),
(220, 19, '2017-08-17 12:26:57', 'Created an item Multicure 10% 120ml into the system'),
(221, 19, '2017-08-17 13:15:50', 'Created a customer Lena  into the system'),
(222, 0, '2017-08-17 13:16:18', 'Update customer Lena Agrovet details into the system '),
(223, 0, '2017-08-17 14:03:36', 'Update customer Lena Agrovet details into the system '),
(224, 19, '2017-08-17 17:17:28', 'Logged Into the system'),
(225, 19, '2017-08-18 05:23:21', 'Logged Into the system'),
(226, 19, '2017-08-20 00:47:58', 'Logged Into the system'),
(227, 19, '2017-08-20 00:53:14', 'Created an item Multicure 10% 500ml into the system'),
(228, 19, '2017-08-20 01:02:03', 'Created an item Nemarid Super 120ml into the system'),
(229, 19, '2017-08-20 01:04:45', 'Created an item Brude Lee into the system'),
(230, 100, '2017-08-20 03:24:22', 'Signed out of the system'),
(231, 19, '2017-08-20 03:24:32', 'Logged Into the system'),
(232, 19, '2017-08-20 21:21:22', 'Logged Into the system'),
(233, 19, '2017-08-20 21:58:53', 'Created a customer Yetu Invetsments Limited into the system'),
(234, 19, '2017-08-20 22:04:15', 'Update customer Yetu Invetsments Limited details into the system '),
(235, 19, '2017-08-20 22:05:08', 'Update customer Yetu Invetsments Limited details into the system '),
(236, 19, '2017-08-20 22:05:14', 'Update customer Yetu Invetsments Limited details into the system '),
(237, 19, '2017-08-20 22:05:59', 'Update customer Yetu Invetsments Limited details into the system '),
(238, 19, '2017-08-20 22:06:02', 'Update customer Yetu Invetsments Limited details into the system '),
(239, 19, '2017-08-20 22:06:13', 'Update customer Yetu Invetsments Limited details into the system '),
(240, 19, '2017-08-20 22:08:06', 'Update customer Yetu Invetsments Limited details into the system '),
(241, 19, '2017-08-20 22:27:26', 'Update customer Yetu Invetsments Limited details into the system '),
(242, 77, '2017-08-21 15:48:31', 'Updated Sub Module Details'),
(243, 77, '2017-08-21 16:06:33', 'Created a customer Bukeko Investments Ltd into the system'),
(244, 19, '2017-08-21 20:26:43', 'Logged Into the system'),
(245, 19, '2017-08-21 20:33:23', 'Update customer Bukeko Investments Ltd details into the system '),
(246, 19, '2017-08-21 20:34:06', 'Update customer Lena Agrovet details into the system '),
(247, 19, '2017-08-21 20:34:16', 'Update customer Yetu Invetsments Limited details into the system '),
(248, 19, '2017-08-21 20:36:57', 'Updated Sub Module Details'),
(249, 19, '2017-08-21 20:37:07', 'Updated Sub Module Details'),
(250, 19, '2017-08-21 21:12:47', 'Updated Sub Module Details'),
(251, 19, '2017-08-22 00:14:30', 'Updated Sub Module Details'),
(252, 19, '2017-08-22 00:14:53', 'Updated Sub Module Details'),
(253, 19, '2017-08-22 00:39:36', 'Updated Sub Module Details'),
(254, 19, '2017-08-22 05:21:37', 'Created an item Vigorex 1L  into the system'),
(255, 19, '2017-08-22 06:10:03', 'Updated Company Contact Details'),
(256, 19, '2017-08-22 06:36:15', 'Created a customer Hello Investments Limited into the system'),
(257, 19, '2017-08-22 07:25:30', 'Updated Sub Module Details'),
(258, 19, '2017-08-22 07:26:27', 'Updated Sub Module Details'),
(259, 19, '2017-08-22 07:27:31', 'Updated Sub Module Details'),
(260, 19, '2017-08-22 07:36:56', 'Created an item Hardex 1L into the system');

-- --------------------------------------------------------

--
-- Table structure for table `bad_debts_ledger`
--

CREATE TABLE IF NOT EXISTS `bad_debts_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(10) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `branch_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `account_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `account_number` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `branch_name`, `account_name`, `account_number`) VALUES
(1, 'DOLAR ACC', '', '', ''),
(3, 'TURWAQ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE IF NOT EXISTS `bank_branches` (
  `branch_id` int(10) NOT NULL AUTO_INCREMENT,
  `bank_id` int(10) DEFAULT NULL,
  `branch_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_ledger`
--

CREATE TABLE IF NOT EXISTS `bank_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_statement`
--

CREATE TABLE IF NOT EXISTS `bank_statement` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `mop` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `benefit_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `benefit_log_id` int(11) NOT NULL,
  `benefit_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_month` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `benefit_logs`
--

CREATE TABLE IF NOT EXISTS `benefit_logs` (
  `benefit_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_log_name` varchar(100) NOT NULL,
  `default_benefit_amount` varchar(100) NOT NULL,
  `benefit_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`benefit_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `vehicle_make` varchar(100) DEFAULT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `chasis_no` varchar(100) NOT NULL,
  `engine_range_id` int(11) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `trim_code` varchar(100) NOT NULL,
  `odometer` varchar(100) NOT NULL,
  `fuel_tank` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_all_rfqs`
--

CREATE TABLE IF NOT EXISTS `cancelled_all_rfqs` (
  `cancelled_all_rfqs_id` int(10) NOT NULL AUTO_INCREMENT,
  `rfq_no` varchar(100) NOT NULL,
  `rfq_code` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_all_rfqs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_cash_sales`
--

CREATE TABLE IF NOT EXISTS `cancelled_cash_sales` (
  `cancelled_cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_id` int(10) NOT NULL,
  `canceling_user` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `date_cancelled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_cash_sales_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_invoices`
--

CREATE TABLE IF NOT EXISTS `cancelled_invoices` (
  `cancelled_invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(100) NOT NULL,
  `canceling_user` int(10) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `date_cancelled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_lpo`
--

CREATE TABLE IF NOT EXISTS `cancelled_lpo` (
  `cancelled_po_id` int(10) NOT NULL AUTO_INCREMENT,
  `lpo_no` varchar(100) NOT NULL,
  `order_code` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_po_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_quotations`
--

CREATE TABLE IF NOT EXISTS `cancelled_quotations` (
  `cancelled_quotation_id` int(10) NOT NULL AUTO_INCREMENT,
  `quote_no` varchar(100) NOT NULL,
  `quote_code` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_quotation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_stock_transfer`
--

CREATE TABLE IF NOT EXISTS `cancelled_stock_transfer` (
  `cancelled_stock_transfer_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_transfer_id` varchar(100) NOT NULL,
  `canceling_user` int(10) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `date_cancelled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_stock_transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_deposits`
--

CREATE TABLE IF NOT EXISTS `cash_deposits` (
  `cash_deposit_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `deposit_slip_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `bank_deposited` int(11) NOT NULL,
  `person_dep` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `date_deposited` date NOT NULL,
  `comments` longtext NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`cash_deposit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_sale`
--

CREATE TABLE IF NOT EXISTS `cash_sale` (
  `cash_sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quotation_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `terms` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount_perc` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `vat` int(11) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `quotation_date` date NOT NULL,
  `convert_status` int(11) NOT NULL,
  `quotation_type` varchar(11) NOT NULL,
  PRIMARY KEY (`cash_sale_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_sales`
--

CREATE TABLE IF NOT EXISTS `cash_sales` (
  `cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_cash_sales_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `sales_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount_perc` int(11) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cash_sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_sales_payments`
--

CREATE TABLE IF NOT EXISTS `cash_sales_payments` (
  `cash_sales_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `ttl_amount` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `cash_paid` int(11) NOT NULL,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cash_sales_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_sale_task`
--

CREATE TABLE IF NOT EXISTS `cash_sale_task` (
  `quotation_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`quotation_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cash_withdrawal`
--

CREATE TABLE IF NOT EXISTS `cash_withdrawal` (
  `cash_withdrawal_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `withdrawal_slip_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `bank_withdrawn` int(11) NOT NULL,
  `person_withdrawn` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `date_withdrawn` date NOT NULL,
  `comments` longtext NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`cash_withdrawal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_deposits`
--

CREATE TABLE IF NOT EXISTS `cheque_deposits` (
  `cheque_deposit_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `bank_deposited` int(11) NOT NULL,
  `cheque_drawer` varchar(100) NOT NULL,
  `date_drawn` date NOT NULL,
  `date_deposited` date NOT NULL,
  `comments` longtext NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`cheque_deposit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_withdrawals`
--

CREATE TABLE IF NOT EXISTS `cheque_withdrawals` (
  `cheque_withdrawal_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `bank_withdrawn` int(11) NOT NULL,
  `date_drawn` date NOT NULL,
  `date_withdrawn` date NOT NULL,
  `comments` longtext NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`cheque_withdrawal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_town` varchar(100) NOT NULL,
  `c_street` varchar(100) NOT NULL,
  `c_paddress` varchar(100) NOT NULL,
  `c_phone` varchar(100) NOT NULL,
  `c_telephone` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `incharge` int(11) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `monthly_statement` int(11) NOT NULL,
  `statement_date` date NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_discount`
--

CREATE TABLE IF NOT EXISTS `client_discount` (
  `client_discount_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `comm_perc` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`client_discount_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `client_discount`
--

INSERT INTO `client_discount` (`client_discount_id`, `client_id`, `comm_perc`, `status`) VALUES
(1, 83, '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_opening_bal_payment`
--

CREATE TABLE IF NOT EXISTS `client_opening_bal_payment` (
  `client_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`client_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE IF NOT EXISTS `client_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_transactionsold`
--

CREATE TABLE IF NOT EXISTS `client_transactionsold` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_transactionsold2`
--

CREATE TABLE IF NOT EXISTS `client_transactionsold2` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `closed_accounts`
--

CREATE TABLE IF NOT EXISTS `closed_accounts` (
  `closed_accounts_id` int(11) NOT NULL AUTO_INCREMENT,
  `financial_year_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_closed` date NOT NULL,
  `status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  PRIMARY KEY (`closed_accounts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `closed_accounts_transactions`
--

CREATE TABLE IF NOT EXISTS `closed_accounts_transactions` (
  `closed_accounts_transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `closed_account_id` int(11) NOT NULL,
  `ledger_no` varchar(11) NOT NULL,
  `transactions` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_generated` date NOT NULL,
  `date_closed` date NOT NULL,
  `transaction_code` varchar(10) NOT NULL,
  `date_closed_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  PRIMARY KEY (`closed_accounts_transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commisions`
--

CREATE TABLE IF NOT EXISTS `commisions` (
  `commision_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `comm_perc` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `commisions`
--

INSERT INTO `commisions` (`commision_id`, `user_id`, `comm_perc`, `status`) VALUES
(1, 83, '12', 0),
(2, 84, '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `commisions_expected`
--

CREATE TABLE IF NOT EXISTS `commisions_expected` (
  `commision_expected_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) NOT NULL,
  `tll_commision` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_expected_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commision_earned`
--

CREATE TABLE IF NOT EXISTS `commision_earned` (
  `commision_earned_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_rep` int(10) NOT NULL,
  `amount_earned` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_earned` date NOT NULL,
  `status` int(1) NOT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`commision_earned_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `commision_earned`
--

INSERT INTO `commision_earned` (`commision_earned_id`, `sales_rep`, `amount_earned`, `currency_code`, `curr_rate`, `date_earned`, `status`, `sales_id`) VALUES
(1, 83, '0', '7', '1', '2017-08-22', 0, 16),
(2, 83, '125.96', '7', '1', '2017-08-22', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `commision_paid`
--

CREATE TABLE IF NOT EXISTS `commision_paid` (
  `commision_paid_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_rep` int(10) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_paid_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `commision_payments`
--

CREATE TABLE IF NOT EXISTS `commision_payments` (
  `commision_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `invoice_payment_id` int(11) NOT NULL,
  `sales_rep` int(10) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month_paid` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `paid_status` int(1) NOT NULL,
  PRIMARY KEY (`commision_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comm_payment_receipt`
--

CREATE TABLE IF NOT EXISTS `comm_payment_receipt` (
  `comm_payment_receipt_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `amnt_rec` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `sales_rep` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`comm_payment_receipt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_contacts`
--

CREATE TABLE IF NOT EXISTS `company_contacts` (
  `contacts_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont_person` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telephone` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pin` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `fax` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `street` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `building` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `town` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `invoice_terms` longtext COLLATE latin1_general_ci NOT NULL,
  `job_card_terms` longtext COLLATE latin1_general_ci NOT NULL,
  `receipt_terms` longtext COLLATE latin1_general_ci NOT NULL,
  `quotation_terms` longtext COLLATE latin1_general_ci NOT NULL,
  `credit_note_terms` longtext COLLATE latin1_general_ci NOT NULL,
  `company_description` longtext COLLATE latin1_general_ci NOT NULL,
  `lpo_terms` longtext COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`contacts_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_contacts`
--

INSERT INTO `company_contacts` (`contacts_id`, `cont_person`, `phone`, `telephone`, `pin`, `email`, `fax`, `street`, `building`, `address`, `town`, `invoice_terms`, `job_card_terms`, `receipt_terms`, `quotation_terms`, `credit_note_terms`, `company_description`, `lpo_terms`) VALUES
(1, 'AGREVAL EAST AFICA LIMITED', '+254 721 888 444, +254 780 44 88 11', '+254 20 22 44 888', 'P051551418R', 'info@agreval.co.ke', 'www.agreval.co.ke', 'MOMBASA ROAD', 'ALPHA CENTRE, UNIT 83', '33035 - 00600', 'NAIROBI , KENYA', '', 'please make sure your order', 'thanks for your payments', 'this quotation is valid for 30 days', 'pleas pay the credit', 'service you can trust', 'we will delivery with in 3 working days');

-- --------------------------------------------------------

--
-- Table structure for table `com_payables_ledger`
--

CREATE TABLE IF NOT EXISTS `com_payables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_invoice`
--

CREATE TABLE IF NOT EXISTS `confirmed_invoice` (
  `confirmed_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `confirm_user_id` int(100) NOT NULL,
  `date_confirmed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `closed_status` int(11) NOT NULL,
  PRIMARY KEY (`confirmed_invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `costing_item`
--

CREATE TABLE IF NOT EXISTS `costing_item` (
  `costing_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `costing_item_name` varchar(100) NOT NULL,
  `costing_unit_id` int(11) NOT NULL,
  `costing_item_desc` longtext NOT NULL,
  PRIMARY KEY (`costing_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cost_of_production_ledger`
--

CREATE TABLE IF NOT EXISTS `cost_of_production_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note`
--

CREATE TABLE IF NOT EXISTS `credit_note` (
  `credit_note_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quotation_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `terms` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount_perc` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `vat` int(11) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `credit_note_date` date NOT NULL,
  `convert_status` int(11) NOT NULL,
  `quotation_type` varchar(11) NOT NULL,
  PRIMARY KEY (`credit_note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE IF NOT EXISTS `credit_notes` (
  `credit_note_id` int(10) NOT NULL AUTO_INCREMENT,
  `credit_note_no` varchar(100) NOT NULL,
  `ttl_sales_return` varchar(100) NOT NULL,
  `refund_amount` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `salesreturn_code` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`credit_note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_payments`
--

CREATE TABLE IF NOT EXISTS `credit_note_payments` (
  `credit_note_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `sales_rep` varchar(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`credit_note_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_task`
--

CREATE TABLE IF NOT EXISTS `credit_note_task` (
  `credit_note_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `credit_note_id` int(11) NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`credit_note_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `curr_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(100) NOT NULL,
  `exchange_rate` varchar(100) NOT NULL,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`curr_id`, `curr_name`, `exchange_rate`) VALUES
(2, 'USD', '7'),
(7, 'KSHS', '1'),
(8, 'EURO', '117');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_code` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `incharge` int(11) NOT NULL,
  `credit_limit` varchar(100) NOT NULL,
  `credit_days` varchar(100) NOT NULL,
  `region_id` int(11) NOT NULL,
  `opening_balance` varchar(100) NOT NULL,
  `opening_balance_date` date NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_code`, `contact_person`, `address`, `town`, `email`, `phone`, `pin`, `incharge`, `credit_limit`, `credit_days`, `region_id`, `opening_balance`, `opening_balance_date`) VALUES
(1, 'Lena Agrovet', 'A90', 'Lena', '', '', '', '', '', 14, '20000', '30', 1, '', '0000-00-00'),
(2, 'Yetu Invetsments Limited', '5060', 'Paul Osero', '3450', 'NAIROBI , KENYA', 'yetu@yahoo.com', '076543278999', '7899', 14, '12000', '60', 2, '92000', '2017-08-07'),
(3, 'Bukeko Investments Ltd', '7890', 'Nyamu', '', '', '', '', '', 14, '', '', 4, '0', '2017-08-21'),
(4, 'Hello Investments Limited', 'HIL001', '', '', '', '', '', '', 14, '100000', '30', 3, '0', '2017-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_item`
--

CREATE TABLE IF NOT EXISTS `customer_item` (
  `customer_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_item_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`customer_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_refund`
--

CREATE TABLE IF NOT EXISTS `customer_refund` (
  `customer_refund_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`customer_refund_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_region`
--

CREATE TABLE IF NOT EXISTS `customer_region` (
  `region_id` int(10) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) NOT NULL,
  `region_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer_region`
--

INSERT INTO `customer_region` (`region_id`, `region_name`, `region_desc`) VALUES
(1, 'Central Region', ''),
(2, 'North Rift Region', ''),
(3, 'Eastern Region', ''),
(4, 'Western Region', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE IF NOT EXISTS `customer_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `transaction` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`transaction_id`, `customer_id`, `transaction`, `amount`, `transaction_date`, `transaction_code`, `shop_id`, `status1`, `status2`) VALUES
(1, 4, 'Opening Balance', '0', '2017-08-22', 'custop4', 14, 0, 0),
(2, 2, 'Invoice Sales <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '983.68', '2017-08-22', 'csh15', 0, 0, 0),
(3, 3, 'Invoice Sales <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '3618', '2017-08-22', 'csh16', 0, 0, 0),
(4, 3, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=1&receipt_no=00001"> Receipt No : 00001</a> Received from Bukeko Investments Ltd', '-2000', '2017-08-22', 'crsp1', 0, 0, 0),
(5, 3, 'Invoice Sales <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '2519.2', '2017-08-22', 'csh17', 0, 0, 0),
(6, 3, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=2&receipt_no=00002"> Receipt No : 00002</a> Received from Bukeko Investments Ltd', '-2519.2', '2017-08-22', 'crsp2', 0, 0, 0),
(7, 1, 'Invoice Sales <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '6025.04', '2017-08-22', 'csh18', 0, 0, 0),
(8, 1, 'Invoice Sales <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '6602.5', '2017-08-22', 'csh19', 0, 0, 0),
(9, 1, 'Invoice Sales <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '6800', '2017-08-22', 'csh20', 0, 0, 0),
(10, 2, 'Invoice Sales <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '17000', '2017-08-22', 'csh21', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactionsold`
--

CREATE TABLE IF NOT EXISTS `customer_transactionsold` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `custom_clearance`
--

CREATE TABLE IF NOT EXISTS `custom_clearance` (
  `custom_clearance_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `curr_id` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`custom_clearance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `custom_clearance_ledger`
--

CREATE TABLE IF NOT EXISTS `custom_clearance_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

CREATE TABLE IF NOT EXISTS `debit_notes` (
  `debit_note_id` int(10) NOT NULL AUTO_INCREMENT,
  `debit_note_no` varchar(100) NOT NULL,
  `ttl_stock_return` varchar(100) NOT NULL,
  `refund_amount` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `stockreturn_code` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`debit_note_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deduction_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `deduction_log_id` int(11) NOT NULL,
  `deduction_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deduction_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deduction_month` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_logs`
--

CREATE TABLE IF NOT EXISTS `deduction_logs` (
  `deduction_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `deduction_log_name` varchar(100) NOT NULL,
  `default_deduction_amount` varchar(100) NOT NULL,
  `deduction_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`deduction_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `discount_allowed_ledger`
--

CREATE TABLE IF NOT EXISTS `discount_allowed_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dividends`
--

CREATE TABLE IF NOT EXISTS `dividends` (
  `dividend_id` int(10) NOT NULL AUTO_INCREMENT,
  `shares_id` int(10) NOT NULL,
  `financial_year_id` int(10) NOT NULL,
  `dividend_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dividend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doubtful_debts`
--

CREATE TABLE IF NOT EXISTS `doubtful_debts` (
  `doubtful_debt_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`doubtful_debt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doubtful_debts_ledger`
--

CREATE TABLE IF NOT EXISTS `doubtful_debts_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(100) NOT NULL,
  `national_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `emp_firstname` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `emp_middle_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `emp_lastname` varchar(100) NOT NULL,
  `emp_phone` varchar(100) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `pin_no` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `town` varchar(100) NOT NULL,
  `marital_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nationality` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nhif_no` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nssf_no` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `job_title_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `job_email` varchar(100) NOT NULL,
  `kin` varchar(100) NOT NULL,
  `kin_phone` varchar(100) NOT NULL,
  `emp_status` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `joined_date` date DEFAULT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `bank_account_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `basic_sal` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `nation_code` (`pin_no`),
  KEY `job_title_code` (`nhif_no`),
  KEY `emp_status` (`gender`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `engine_range`
--

CREATE TABLE IF NOT EXISTS `engine_range` (
  `engine_range_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_capacity` varchar(10) NOT NULL,
  `max_capacity` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`engine_range_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE IF NOT EXISTS `estimates` (
  `estimates_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `curr_sp` varchar(100) DEFAULT NULL,
  `discout` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `estimates_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `job_card_status` int(11) NOT NULL,
  `inventory_status` int(11) NOT NULL,
  PRIMARY KEY (`estimates_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rate_loss_ledger`
--

CREATE TABLE IF NOT EXISTS `exchange_rate_loss_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rate_variation_ledger`
--

CREATE TABLE IF NOT EXISTS `exchange_rate_variation_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exited_shares`
--

CREATE TABLE IF NOT EXISTS `exited_shares` (
  `exited_shares_id` int(10) NOT NULL AUTO_INCREMENT,
  `exiting_sharesholder_id` int(10) NOT NULL,
  `ben_shareholder_id` int(11) NOT NULL,
  `exit_mode` int(1) NOT NULL,
  `net_exiting_shares` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `shares_transfered` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `shares_withdrawn` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`exited_shares_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exited_shares_payments`
--

CREATE TABLE IF NOT EXISTS `exited_shares_payments` (
  `exited_shares_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code_id` int(11) NOT NULL,
  `shares_id` int(11) NOT NULL,
  `sales_rep` varchar(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`exited_shares_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expenses_id` int(10) NOT NULL AUTO_INCREMENT,
  `exp_cat_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`expenses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

CREATE TABLE IF NOT EXISTS `expenses_categories` (
  `exp_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_category_name` varchar(100) NOT NULL,
  `expense_category_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`exp_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_receipts`
--

CREATE TABLE IF NOT EXISTS `expenses_receipts` (
  `expenses_receipts_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `amnt_rec` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`expenses_receipts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expired_stock`
--

CREATE TABLE IF NOT EXISTS `expired_stock` (
  `expired_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`expired_stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE IF NOT EXISTS `financial_year` (
  `financial_year_id` int(10) NOT NULL AUTO_INCREMENT,
  `start_fyear` varchar(100) NOT NULL,
  `end_fyear` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`financial_year_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets`
--

CREATE TABLE IF NOT EXISTS `fixed_assets` (
  `fixed_asset_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_name` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_purchased` date NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `dep_value` varchar(100) NOT NULL,
  `fixed_asset_category_id` int(11) NOT NULL,
  `useful_life` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `depreciation_date` date NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets_payments`
--

CREATE TABLE IF NOT EXISTS `fixed_assets_payments` (
  `fixed_asset_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `fixed_asset_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`fixed_asset_repayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets_paymentsold`
--

CREATE TABLE IF NOT EXISTS `fixed_assets_paymentsold` (
  `fixed_assets_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_id` int(10) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fixed_assets_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_asset_category`
--

CREATE TABLE IF NOT EXISTS `fixed_asset_category` (
  `fixed_asset_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fixed_asset_category_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `fixed_asset_dep_perc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`fixed_asset_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flat_rate_cost`
--

CREATE TABLE IF NOT EXISTS `flat_rate_cost` (
  `flat_rate_cost_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `flat_rate_cost_amount` varchar(100) NOT NULL,
  PRIMARY KEY (`flat_rate_cost_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `freight_charges`
--

CREATE TABLE IF NOT EXISTS `freight_charges` (
  `freight_charge_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(11) NOT NULL,
  `freight_charge_amount` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  `status3` int(11) NOT NULL,
  PRIMARY KEY (`freight_charge_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fund_transfer`
--

CREATE TABLE IF NOT EXISTS `fund_transfer` (
  `fund_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_from` int(11) NOT NULL,
  `transfer_to` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `memo` longtext NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_transfered` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`fund_transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `general_expenses_ledger`
--

CREATE TABLE IF NOT EXISTS `general_expenses_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `incurred_prepaid_expenses`
--

CREATE TABLE IF NOT EXISTS `incurred_prepaid_expenses` (
  `incurred_prepaid_expenses_id` int(10) NOT NULL AUTO_INCREMENT,
  `prepaid_expenses_id` int(11) NOT NULL,
  `amount_incurred` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` int(11) NOT NULL,
  `date_incurred` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`incurred_prepaid_expenses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_ledger`
--

CREATE TABLE IF NOT EXISTS `inventory_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `terms` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount_perc` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `vat` int(11) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `labour_cost` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `confirm_status` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) NOT NULL,
  `invoice_ttl` varchar(100) NOT NULL,
  `inv_bal` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `doubt_ful_status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE IF NOT EXISTS `invoice_item` (
  `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_cost` varchar(10) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`invoice_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sales_rep` varchar(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `dep_by` mediumtext NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`invoice_payment_id`, `sales_id`, `customer_id`, `sales_rep`, `shop_id`, `receipt_no`, `amount_received`, `decription`, `currency_code`, `curr_rate`, `mop`, `dep_by`, `ref_no`, `date_paid`, `client_bank`, `our_bank`, `date_received`, `status`) VALUES
(1, 16, 3, '19', 0, '00001', '2000', '', '7', '1', '1', 'Hussein', '77689', '2017-08-22', '', 0, '2017-08-22 07:16:18', 0),
(2, 17, 3, '19', 0, '00002', '2519.2', '', '7', '1', '1', 'Hussein', '6789', '2017-08-22', '', 0, '2017-08-22 07:20:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_paymentsold`
--

CREATE TABLE IF NOT EXISTS `invoice_paymentsold` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_task`
--

CREATE TABLE IF NOT EXISTS `invoice_task` (
  `invoice_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `task_name` longtext NOT NULL,
  `task_cost` varchar(100) NOT NULL,
  `task_remarks` longtext NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`invoice_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `item_code` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `reorder_level` varchar(100) NOT NULL,
  `curr_bp` varchar(100) NOT NULL,
  `curr_sp` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `opening_balance` varchar(10) NOT NULL,
  `opening_bal_date` date NOT NULL,
  `adjusted_bp` varchar(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_code`, `cat_id`, `reorder_level`, `curr_bp`, `curr_sp`, `description`, `opening_balance`, `opening_bal_date`, `adjusted_bp`, `status`, `status1`, `status2`) VALUES
(1, 'Nemarid Super 1L', 'NEMS003', 3, '200', '150', '350', '3% Concentration Levamisole hydrochloride PH Eur for sheep, goats and cattles.', '1000', '2017-08-17', '', 0, 0, 0),
(2, 'Nemarid Super 500ml', 'NEMS002', 3, '500', '80', '120', '', '1000', '2017-08-17', '', 0, 0, 0),
(3, 'Nemarid Super 200ml', 'NEMS001', 3, '500', '260', '530', '', '1000', '2017-08-17', '', 0, 0, 0),
(4, 'Multicure 2.5% 1L', 'MC25003', 3, '10', '370', '670', '', '150', '2017-08-17', '', 0, 0, 0),
(5, 'Multicure 2.5% 500ml', 'MC25002', 3, '4', '670', '1200', '', '90', '2017-08-17', '', 0, 0, 0),
(6, 'Multicure 10% 1L', 'MC10003', 3, '120', '800', '1350', '', '34', '2017-08-17', '', 0, 0, 0),
(7, 'Multicure 10% 120ml', 'MC10001', 3, '9', '360', '890', '', '14', '2017-08-17', '', 0, 0, 0),
(8, 'Multicure 10% 500ml', 'ggggg', 4, '5', '180', '380', 'goods', '13', '2017-08-20', '', 0, 0, 0),
(9, 'Nemarid Super 120ml', 'bhtttt', 4, '30', '670', '1390', 'goods', '34', '2017-08-20', '', 0, 0, 0),
(10, 'Brude Lee', 'BL', 2, '78', '690', '1080', 'goods', '456', '2017-08-20', '', 0, 0, 0),
(11, 'Vigorex 1L ', 'VGRX003', 1, '10', '230', '330', 'blue', '30', '2017-08-22', '', 0, 0, 0),
(12, 'Hardex 1L', 'HD001', 3, '10', '2000', '3400', 'desc', '0', '2017-08-22', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
  `cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` longtext NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Agriculture', ''),
(2, 'Environment', ''),
(3, 'Vetinary', ''),
(4, 'Aquatic Life', '');

-- --------------------------------------------------------

--
-- Table structure for table `item_transactions`
--

CREATE TABLE IF NOT EXISTS `item_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL,
  `memo` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `l_day` varchar(10) NOT NULL,
  `l_month` varchar(10) NOT NULL,
  `l_year` varchar(10) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `item_transactions`
--

INSERT INTO `item_transactions` (`transaction_id`, `item_id`, `memo`, `quantity`, `transaction_date`, `l_day`, `l_month`, `l_year`, `transaction_code`, `user_id`, `shop_id`, `status1`, `status`) VALUES
(1, 11, 'Inventory Opening Balance for item Vigorex 1L ', '30', '2017-08-22', '22', '08', '2017', 'itemop11', 19, 0, 0, 0),
(2, 4, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=1">Delivery Note No:00001</a>', '10', '2017-08-22', '22', '08', '2017', 'srt saleret1', 19, 0, 0, 0),
(3, 4, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=2">Delivery Note No:00002</a>', '10', '2017-07-22', '22', '07', '2017', 'srt saleret2', 19, 0, 0, 0),
(4, 3, 'Received 15 Nemarid Super 200ml (NEMS001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=18&order_code=3">Delivery Note No:00003</a>', '15', '2017-07-16', '16', '07', '2017', 'srt saleret3', 19, 0, 0, 0),
(5, 3, 'Sold 2 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '-2', '2017-08-22', '22', '08', '2017', 'csh1 sale15', 19, 0, 0, 0),
(6, 4, 'Sold 6 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '-6', '2017-08-22', '22', '08', '2017', 'csh2 sale16', 19, 0, 0, 0),
(7, 4, 'Sold 4 Multicure 2.5% 1L <i>(Batch No :659087). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '-4', '2017-08-22', '22', '08', '2017', 'csh3 sale17', 19, 0, 0, 0),
(8, 3, 'Sold 14 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '-14', '2017-08-22', '22', '08', '2017', 'csh4 sale18', 19, 0, 0, 0),
(9, 9, 'Sold 5 Nemarid Super 120ml <i>(Batch No :). Mfg.Date : 0000-00-00. Exp. Date : 0000-00-00.</i> bhtttt through invoice sale <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '-5', '2017-08-22', '22', '08', '2017', 'csh5 sale19', 19, 0, 0, 0),
(10, 12, 'Inventory Opening Balance for item Hardex 1L', '0', '2017-08-22', '22', '08', '2017', 'itemop12', 19, 0, 0, 0),
(11, 12, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=4">Delivery Note No:00004</a>', '5', '2017-07-21', '21', '07', '2017', 'srt saleret4', 19, 0, 0, 0),
(12, 12, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=5">Delivery Note No:00005</a>', '5', '2017-08-16', '16', '08', '2017', 'srt saleret5', 19, 0, 0, 0),
(13, 12, 'Sold 2 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '-2', '2017-08-22', '22', '08', '2017', 'csh6 sale20', 19, 0, 0, 0),
(14, 12, 'Sold 5 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '-5', '2017-08-22', '22', '08', '2017', 'csh7 sale21', 19, 0, 0, 0),
(15, 0, 'Sold 10 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : . Exp. Date : .</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '-10', '2017-08-22', '22', '08', '2017', 'csh sale17', 19, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE IF NOT EXISTS `jobtitles` (
  `job_title_id` int(20) NOT NULL AUTO_INCREMENT,
  `job_title_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`job_title_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_cards`
--

CREATE TABLE IF NOT EXISTS `job_cards` (
  `job_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `general_remarks` longtext NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(100) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sale_type` varchar(10) NOT NULL,
  `bal_date` date NOT NULL,
  `canceled_status` int(11) NOT NULL,
  `approved_status` int(11) NOT NULL,
  `closed_status` int(11) NOT NULL,
  PRIMARY KEY (`job_card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_clock`
--

CREATE TABLE IF NOT EXISTS `job_card_clock` (
  `job_card_clock_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `job_card_task_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `clock_type` varchar(10) NOT NULL,
  `clock_technician_id` int(11) NOT NULL,
  `date_clocked` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` longtext NOT NULL,
  `out_period` varchar(100) NOT NULL,
  `resume_period` varchar(100) NOT NULL,
  PRIMARY KEY (`job_card_clock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_old`
--

CREATE TABLE IF NOT EXISTS `job_card_old` (
  `job_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `job_card_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(100) NOT NULL,
  `vehicle_description` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assigned_status` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `quotation_status` int(11) NOT NULL,
  `approved_quotation_status` int(11) NOT NULL,
  `closed_status` int(11) NOT NULL,
  PRIMARY KEY (`job_card_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_task`
--

CREATE TABLE IF NOT EXISTS `job_card_task` (
  `job_card_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `start_from` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `clocked_in_status` int(11) NOT NULL,
  `clocked_out_status` int(11) NOT NULL,
  `finished_status` int(11) NOT NULL,
  PRIMARY KEY (`job_card_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `labour_cost_matrix`
--

CREATE TABLE IF NOT EXISTS `labour_cost_matrix` (
  `labour_cost_matrix_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(10) NOT NULL,
  `engine_range_id` int(10) NOT NULL,
  `flat_rate_hrs` varchar(11) NOT NULL,
  `flat_rate_cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`labour_cost_matrix_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ledger_transactions`
--

CREATE TABLE IF NOT EXISTS `ledger_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `account_cat_id` int(11) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `memo` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `l_day` varchar(10) NOT NULL,
  `l_month` varchar(10) NOT NULL,
  `l_year` varchar(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transaction_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `ledger_transactions`
--

INSERT INTO `ledger_transactions` (`transaction_id`, `account_cat_id`, `account_type_id`, `account_id`, `shop_id`, `memo`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `transaction_date`, `l_day`, `l_month`, `l_year`, `date_recorded`, `transaction_code`, `closing_status`, `closing_date`, `status`, `status1`, `status2`, `user_id`) VALUES
(1, 0, 0, 7, 0, 'Inventory Opening Balance for item Vigorex 1L ', '6900', '6900', '', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 05:21:37', 'itemop11', 0, '0000-00-00', 0, 0, 0, 19),
(2, 0, 0, 6, 0, 'Inventory Opening Balance for item Vigorex 1L ', '6900', '', '6900', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 05:21:37', 'itemop11', 0, '0000-00-00', 0, 0, 0, 19),
(3, 0, 0, 10, 14, 'Supplier Opening Balance for supplier Karen Supplies Limited', '4500', '4500', '', 8, '130', '2017-08-22', '22', '08', '2017', '2017-08-22 05:23:14', 'supop5', 0, '0000-00-00', 0, 0, 0, 19),
(4, 0, 0, 3, 14, 'Supplier Opening Balance for supplier Karen Supplies Limited', '4500', '', '4500', 8, '130', '2017-08-22', '22', '08', '2017', '2017-08-22 05:23:14', 'supop5', 0, '0000-00-00', 0, 0, 0, 19),
(5, 0, 0, 7, 0, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=1">Delivery Note No:00001</a>', '0', '0', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:22:41', 'recst2', 0, '0000-00-00', 0, 0, 0, 19),
(6, 0, 0, 3, 0, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=1">Delivery Note No:00001</a>', '0', '', '0', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:22:41', 'recst2', 0, '0000-00-00', 0, 0, 0, 19),
(7, 0, 0, 7, 0, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=2">Delivery Note No:00002</a>', '0', '0', '', 7, '1', '2017-07-22', '22', '07', '2017', '2017-08-22 06:24:30', 'recst3', 0, '0000-00-00', 0, 0, 0, 19),
(8, 0, 0, 3, 0, 'Received 10 Multicure 2.5% 1L (MC25003)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=17&order_code=2">Delivery Note No:00002</a>', '0', '', '0', 7, '1', '2017-07-22', '22', '07', '2017', '2017-08-22 06:24:30', 'recst3', 0, '0000-00-00', 0, 0, 0, 19),
(9, 0, 0, 7, 0, 'Received 15 Nemarid Super 200ml (NEMS001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=18&order_code=3">Delivery Note No:00003</a>', '0', '0', '', 8, '117', '2017-07-16', '16', '07', '2017', '2017-08-22 06:33:09', 'recst4', 0, '0000-00-00', 0, 0, 0, 19),
(10, 0, 0, 3, 0, 'Received 15 Nemarid Super 200ml (NEMS001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=18&order_code=3">Delivery Note No:00003</a>', '0', '', '0', 8, '117', '2017-07-16', '16', '07', '2017', '2017-08-22 06:33:09', 'recst4', 0, '0000-00-00', 0, 0, 0, 19),
(11, 0, 0, 8, 14, 'Opening Balance', '0', '0', '', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:36:15', 'custop4', 0, '0000-00-00', 0, 0, 0, 19),
(12, 0, 0, 9, 14, 'Opening Balance', '0', '', '0', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:36:15', 'custop4', 0, '0000-00-00', 0, 0, 0, 19),
(13, 0, 0, 4, 0, 'Sold 2 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '520', '520', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:43:21', 'csh1', 0, '0000-00-00', 0, 0, 0, 19),
(14, 0, 0, 7, 0, 'Sold 2 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '-520', '', '520', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:43:21', 'csh1', 0, '0000-00-00', 0, 0, 0, 19),
(15, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '983.68', '983.68', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:39:24', 'csh15', 0, '0000-00-00', 0, 0, 0, 19),
(16, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=15">Invoice No:15</a>', '983.68', '', '983.68', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:39:24', 'csh15', 0, '0000-00-00', 0, 0, 0, 19),
(17, 0, 0, 4, 0, 'Sold 6 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '2220', '2220', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:48:29', 'csh2', 0, '0000-00-00', 0, 0, 0, 19),
(18, 0, 0, 7, 0, 'Sold 6 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '-2220', '', '2220', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:48:29', 'csh2', 0, '0000-00-00', 0, 0, 0, 19),
(19, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '3618', '3618', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:48:29', 'csh16', 0, '0000-00-00', 0, 0, 0, 19),
(20, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=16">Invoice No:16</a>', '3618', '', '3618', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 06:48:29', 'csh16', 0, '0000-00-00', 0, 0, 0, 19),
(21, 0, 0, 0, 0, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=1&receipt_no=00001"> Receipt No : 00001</a> Received from Bukeko Investments Ltd', '2000', '2000', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:16:18', 'crsp1', 0, '0000-00-00', 0, 0, 0, 19),
(22, 0, 0, 8, 0, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=1&receipt_no=00001"> Receipt No : 00001</a> Received from Bukeko Investments Ltd', '-2000', '', '2000', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:16:18', 'crsp1', 0, '0000-00-00', 0, 0, 0, 19),
(23, 0, 0, 4, 0, 'Sold 4 Multicure 2.5% 1L <i>(Batch No :659087). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '1480', '1480', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:56:58', 'csh3', 0, '0000-00-00', 0, 0, 0, 19),
(24, 0, 0, 7, 0, 'Sold 4 Multicure 2.5% 1L <i>(Batch No :659087). Mfg.Date : 2017-08-01. Exp. Date : 2017-08-21.</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '-1480', '', '1480', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:56:58', 'csh3', 0, '0000-00-00', 0, 0, 0, 19),
(25, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '2519.2', '2519.2', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:56:58', 'csh17', 0, '0000-00-00', 0, 0, 0, 19),
(26, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '2519.2', '', '2519.2', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:56:58', 'csh17', 0, '0000-00-00', 0, 0, 0, 19),
(27, 0, 0, 0, 0, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=2&receipt_no=00002"> Receipt No : 00002</a> Received from Bukeko Investments Ltd', '2519.2', '2519.2', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:20:50', 'crsp2', 0, '0000-00-00', 0, 0, 0, 19),
(28, 0, 0, 8, 0, 'Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id=2&receipt_no=00002"> Receipt No : 00002</a> Received from Bukeko Investments Ltd', '-2519.2', '', '2519.2', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:20:50', 'crsp2', 0, '0000-00-00', 0, 0, 0, 19),
(29, 0, 0, 4, 0, 'Sold 14 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '3640', '3640', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:29:08', 'csh4', 0, '0000-00-00', 0, 0, 0, 19),
(30, 0, 0, 7, 0, 'Sold 14 Nemarid Super 200ml <i>(Batch No :). Mfg.Date : 2017-08-01. Exp. Date : 2017-09-12.</i> NEMS001 through invoice sale <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '-3640', '', '3640', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:29:08', 'csh4', 0, '0000-00-00', 0, 0, 0, 19),
(31, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '6025.04', '6025.04', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:29:08', 'csh18', 0, '0000-00-00', 0, 0, 0, 19),
(32, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=18">Invoice No:18</a>', '6025.04', '', '6025.04', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:29:08', 'csh18', 0, '0000-00-00', 0, 0, 0, 19),
(33, 0, 0, 4, 0, 'Sold 5 Nemarid Super 120ml <i>(Batch No :). Mfg.Date : 0000-00-00. Exp. Date : 0000-00-00.</i> bhtttt through invoice sale <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '3350', '3350', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:31:01', 'csh5', 0, '0000-00-00', 0, 0, 0, 19),
(34, 0, 0, 7, 0, 'Sold 5 Nemarid Super 120ml <i>(Batch No :). Mfg.Date : 0000-00-00. Exp. Date : 0000-00-00.</i> bhtttt through invoice sale <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '-3350', '', '3350', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:31:01', 'csh5', 0, '0000-00-00', 0, 0, 0, 19),
(35, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '6602.5', '6602.5', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:31:01', 'csh19', 0, '0000-00-00', 0, 0, 0, 19),
(36, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=19">Invoice No:19</a>', '6602.5', '', '6602.5', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:31:01', 'csh19', 0, '0000-00-00', 0, 0, 0, 19),
(37, 0, 0, 7, 0, 'Inventory Opening Balance for item Hardex 1L', '0', '0', '', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:36:56', 'itemop12', 0, '0000-00-00', 0, 0, 0, 19),
(38, 0, 0, 6, 0, 'Inventory Opening Balance for item Hardex 1L', '0', '', '0', 6, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:36:56', 'itemop12', 0, '0000-00-00', 0, 0, 0, 19),
(39, 0, 0, 7, 0, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=4">Delivery Note No:00004</a>', '0', '0', '', 7, '1', '2017-07-21', '21', '07', '2017', '2017-08-22 07:39:19', 'recst6', 0, '0000-00-00', 0, 0, 0, 19),
(40, 0, 0, 3, 0, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=4">Delivery Note No:00004</a>', '0', '', '0', 7, '1', '2017-07-21', '21', '07', '2017', '2017-08-22 07:39:19', 'recst6', 0, '0000-00-00', 0, 0, 0, 19),
(41, 0, 0, 7, 0, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=5">Delivery Note No:00005</a>', '0', '0', '', 7, '1', '2017-08-16', '16', '08', '2017', '2017-08-22 07:40:20', 'recst7', 0, '0000-00-00', 0, 0, 0, 19),
(42, 0, 0, 3, 0, 'Received 5 Hardex 1L (HD001)  through delivery note <a href="receive_stock_to_warehouse.php?success=1&order_code_id=19&order_code=5">Delivery Note No:00005</a>', '0', '', '0', 7, '1', '2017-08-16', '16', '08', '2017', '2017-08-22 07:40:20', 'recst7', 0, '0000-00-00', 0, 0, 0, 19),
(43, 0, 0, 4, 0, 'Sold 2 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '4000', '4000', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:41:44', 'csh6', 0, '0000-00-00', 0, 0, 0, 19),
(44, 0, 0, 7, 0, 'Sold 2 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '-4000', '', '4000', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:41:44', 'csh6', 0, '0000-00-00', 0, 0, 0, 19),
(45, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '6800', '6800', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:41:06', 'csh20', 0, '0000-00-00', 0, 0, 0, 19),
(46, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=20">Invoice No:20</a>', '6800', '', '6800', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:41:06', 'csh20', 0, '0000-00-00', 0, 0, 0, 19),
(47, 0, 0, 4, 0, 'Sold 5 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '10000', '10000', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:42:43', 'csh7', 0, '0000-00-00', 0, 0, 0, 19),
(48, 0, 0, 7, 0, 'Sold 5 Hardex 1L <i>(Batch No :1234). Mfg.Date : 2017-08-08. Exp. Date : 2017-08-31.</i> HD001 through invoice sale <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '-10000', '', '10000', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:42:43', 'csh7', 0, '0000-00-00', 0, 0, 0, 19),
(49, 0, 0, 0, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '17000', '17000', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:42:43', 'csh21', 0, '0000-00-00', 0, 0, 0, 19),
(50, 0, 0, 5, 0, 'Invoice Sales <a href="generate_invoice.php?sales_id=21">Invoice No:21</a>', '17000', '', '17000', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:42:43', 'csh21', 0, '0000-00-00', 0, 0, 0, 19),
(51, 0, 0, 4, 0, 'Sold 10 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : . Exp. Date : .</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '0', '0', '', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:52:12', 'csh', 0, '0000-00-00', 0, 0, 0, 19),
(52, 0, 0, 7, 0, 'Sold 10 Multicure 2.5% 1L <i>(Batch No :). Mfg.Date : . Exp. Date : .</i> MC25003 through invoice sale <a href="generate_invoice.php?sales_id=17">Invoice No:17</a>', '-0', '', '0', 7, '1', '2017-08-22', '22', '08', '2017', '2017-08-22 07:52:12', 'csh', 0, '0000-00-00', 0, 0, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `loan_id` int(10) NOT NULL AUTO_INCREMENT,
  `loan_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `default_amount` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loans_ledger`
--

CREATE TABLE IF NOT EXISTS `loans_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_given`
--

CREATE TABLE IF NOT EXISTS `loan_given` (
  `loan_given_id` int(10) NOT NULL AUTO_INCREMENT,
  `lenders_name` varchar(100) NOT NULL,
  `lenders_address` varchar(100) NOT NULL,
  `lenders_phone` varchar(100) NOT NULL,
  `lenders_email` varchar(100) NOT NULL,
  `lenders_town` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `period_years` int(10) NOT NULL,
  `period_months` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_given_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_given_repayments`
--

CREATE TABLE IF NOT EXISTS `loan_given_repayments` (
  `loan_given_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `loan_given_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`loan_given_repayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_logs`
--

CREATE TABLE IF NOT EXISTS `loan_logs` (
  `savings_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `loan_name` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `loan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`savings_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_received`
--

CREATE TABLE IF NOT EXISTS `loan_received` (
  `loan_received_id` int(10) NOT NULL AUTO_INCREMENT,
  `lenders_name` varchar(100) NOT NULL,
  `lenders_address` varchar(100) NOT NULL,
  `lenders_phone` varchar(100) NOT NULL,
  `lenders_email` varchar(100) NOT NULL,
  `lenders_town` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `loan_amount` varchar(100) NOT NULL,
  `mop` int(11) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_drawn` varchar(100) NOT NULL,
  `period_years` int(10) NOT NULL,
  `period_months` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_received_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayments`
--

CREATE TABLE IF NOT EXISTS `loan_repayments` (
  `loan_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `loan_received_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`loan_repayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loan_repaymentsold`
--

CREATE TABLE IF NOT EXISTS `loan_repaymentsold` (
  `loan_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `loan_received_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`loan_repayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lpo`
--

CREATE TABLE IF NOT EXISTS `lpo` (
  `lpo_id` int(10) NOT NULL AUTO_INCREMENT,
  `comments` char(200) NOT NULL,
  `lpo_no` varchar(100) NOT NULL,
  `lpo_amount` varchar(100) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `freight_charges` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`lpo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `minor_terminologies`
--

CREATE TABLE IF NOT EXISTS `minor_terminologies` (
  `minor_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `terminology_id` int(11) NOT NULL,
  `minor_terminology_name` varchar(100) NOT NULL,
  PRIMARY KEY (`minor_terminology_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `misc_expenses_ledger`
--

CREATE TABLE IF NOT EXISTS `misc_expenses_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `sort_order`, `link`, `description`, `status`) VALUES
(1, 'Home', 1, '<li class="top"><a href="home.php?monitor=monitor" class="top_link"><span>Home</span></a></li>', 'Home Page', 0),
(3, 'Master', 3, '<a href="#" id="products" class="top_link"><span class="down">Master</span></a>', 'Master', 0),
(4, 'Access', 2, '<a href="#" id="services" class="top_link"><span class="down">Access</span></a>', 'Access Controll', 0),
(24, 'Settings', 2, '<a href="#" id="products" class="top_link"><span class="down">Settings</span></a>', '', 0),
(25, 'Retail Report', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Retail Report</span></a>', 'Retail Report', 0),
(6, 'Quotations', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Quotations</span></a>', 'Quotations', 0),
(7, 'General Transactions', 7, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Reports', 81, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Reports</span></a>', 'System Reports', 0),
(13, 'Audit Trails', 100, '<li class="top"><a href="home.php?audittrails=audittrails"  class="top_link"><span>Audit Trails</span></a></li>', '', 0),
(14, 'Sales', 5, '<a href="home.php?audittrails=audittrails" id="services" class="top_link"><span class="down">Sales</span></a>', '', 0),
(16, 'Inventory', 5, '<a href="#" id="services" class="top_link"><span class="down">Inventory</span></a>', '', 0),
(17, 'Sales ', 4, '<a href="#" id="services" class="top_link"><span class="down">Sales</span></a>', 'Job Cards Management', 0),
(28, 'Company & Financials', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Company & Financials</span></a>', 'Company & Financials', 0),
(32, 'Banking', 5, '<a href="#" id="services" class="top_link"><span class="down">Banking</span></a>', '', 0),
(33, 'Bank Reconcilliation', 5, '<a href="#" id="services" class="top_link"><span class="down">Bank Reconcilliation</span></a>', '', 0),
(34, 'Lists', 4, '<a href="#" id="services" class="top_link"><span class="down">Lists</span></a>', 'Lists', 0),
(35, 'Customers', 4, '<a href="#" id="services" class="top_link"><span class="down">Customers</span></a>', 'Customers', 0),
(36, 'Vendors', 4, '<a href="#" id="services" class="top_link"><span class="down">Vendors</span></a>', 'Vendors', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_account`
--

CREATE TABLE IF NOT EXISTS `modules_account` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `sort_order` int(10) NOT NULL,
  `link` longtext NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `modules_account`
--

INSERT INTO `modules_account` (`module_id`, `module_name`, `sort_order`, `link`, `description`, `status`) VALUES
(3, 'Settings', 2, '<a href="#" id="products" class="top_link"><span class="down">Settings</span></a>', 'System settings', 0),
(5, 'Inventory Accounts', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Inventory</span></a>', 'Project managenet panel', 0),
(6, 'Point Of Sale', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Point Of Sale</span></a>', 'Management of human resource', 0),
(7, 'General Transactions Accounts', 5, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Financials', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Financials</span></a>', 'desk', 0),
(9, 'Employees And Payroll', 8, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Employees And Payroll</span></a>', 'General Reports for administrator', 0),
(11, 'Customers', 9, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Customers</span></a>', '', 0),
(12, 'Audit Trails Accounts', 10, '<a href="audit_trails.php" id="privacy" class="top_link"><span class="down">Audit Trails</span></a>', '', 0),
(14, 'Banking', 5, '<a href="#" id="services" class="top_link"><span class="down">Banking</span></a>', '', 0),
(15, 'Bank Reconcilliation', 5, '<a href="#" id="services" class="top_link"><span class="down">Bank Reconcilliation</span></a>', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=348 ;

--
-- Dumping data for table `modules_submodules`
--

INSERT INTO `modules_submodules` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
(19, 3, 5, 0),
(124, 11, 1, 0),
(17, 3, 3, 0),
(302, 34, 73, 0),
(252, 11, 221, 0),
(7, 4, 7, 0),
(8, 4, 8, 0),
(9, 4, 9, 0),
(10, 4, 10, 0),
(141, 6, 62, 0),
(38, 7, 21, 0),
(39, 7, 22, 0),
(171, 7, 40, 0),
(41, 8, 24, 0),
(146, 8, 6, 0),
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
(144, 14, 46, 0),
(140, 3, 73, 0),
(123, 5, 67, 0),
(129, 6, 34, 0),
(116, 8, 60, 0),
(159, 19, 79, 0),
(160, 19, 80, 0),
(126, 11, 65, 0),
(121, 4, 45, 0),
(290, 17, 236, 0),
(136, 17, 72, 0),
(295, 14, 71, 0),
(155, 3, 75, 0),
(299, 16, 41, 0),
(161, 19, 81, 0),
(167, 19, 84, 0),
(166, 19, 83, 0),
(165, 19, 82, 0),
(168, 19, 85, 0),
(169, 19, 87, 0),
(170, 19, 86, 0),
(172, 7, 89, 0),
(173, 7, 88, 0),
(174, 7, 90, 0),
(175, 7, 92, 0),
(176, 7, 93, 0),
(177, 7, 95, 0),
(178, 7, 94, 0),
(179, 7, 96, 0),
(180, 7, 97, 0),
(181, 20, 37, 0),
(182, 20, 98, 0),
(183, 20, 99, 0),
(184, 20, 28, 0),
(185, 20, 100, 0),
(319, 28, 241, 0),
(191, 8, 15, 0),
(192, 8, 20, 0),
(193, 8, 18, 0),
(194, 3, 165, 0),
(195, 3, 157, 0),
(321, 32, 182, 0),
(207, 14, 141, 0),
(212, 14, 204, 0),
(334, 32, 184, 0),
(317, 32, 61, 0),
(222, 33, 192, 0),
(223, 33, 191, 0),
(285, 14, 215, 0),
(227, 7, 127, 0),
(228, 7, 129, 0),
(229, 7, 125, 0),
(320, 28, 240, 0),
(232, 7, 128, 0),
(233, 7, 199, 0),
(235, 28, 117, 0),
(237, 28, 134, 0),
(239, 29, 116, 0),
(240, 29, 110, 0),
(241, 29, 212, 0),
(242, 29, 211, 0),
(243, 29, 213, 0),
(244, 29, 210, 0),
(245, 3, 138, 0),
(246, 3, 136, 0),
(328, 8, 239, 0),
(262, 29, 120, 0),
(260, 29, 226, 0),
(293, 14, 239, 0),
(281, 14, 217, 0),
(266, 14, 230, 0),
(267, 29, 231, 0),
(270, 25, 229, 0),
(271, 25, 218, 0),
(298, 25, 41, 0),
(273, 25, 230, 0),
(274, 25, 46, 0),
(275, 25, 219, 0),
(277, 25, 233, 0),
(300, 14, 229, 0),
(279, 14, 65, 0),
(294, 7, 126, 0),
(296, 14, 123, 0),
(301, 34, 226, 0),
(303, 35, 3, 0),
(304, 36, 136, 0),
(305, 36, 171, 0),
(306, 36, 181, 0),
(307, 35, 71, 0),
(308, 35, 123, 0),
(309, 35, 217, 0),
(310, 35, 46, 0),
(311, 35, 141, 0),
(313, 35, 121, 0),
(314, 35, 216, 0),
(322, 17, 71, 0),
(323, 17, 3, 0),
(324, 17, 123, 0),
(325, 17, 141, 0),
(326, 17, 217, 0),
(327, 17, 46, 0),
(329, 8, 191, 0),
(341, 8, 242, 0),
(333, 36, 200, 0),
(332, 8, 194, 0),
(335, 32, 188, 0),
(336, 32, 187, 0),
(337, 32, 185, 0),
(338, 32, 190, 0),
(339, 32, 183, 0),
(340, 32, 189, 0),
(342, 8, 243, 0),
(343, 8, 244, 0),
(344, 8, 245, 0),
(345, 8, 246, 0),
(346, 8, 247, 0),
(347, 35, 248, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules_submodulesold`
--

CREATE TABLE IF NOT EXISTS `modules_submodulesold` (
  `modules_submodules_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `sub_module_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`modules_submodules_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=258 ;

--
-- Dumping data for table `modules_submodulesold`
--

INSERT INTO `modules_submodulesold` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
(19, 3, 5, 0),
(124, 11, 1, 0),
(17, 3, 3, 0),
(16, 3, 2, 0),
(252, 11, 221, 0),
(7, 4, 7, 0),
(8, 4, 8, 0),
(9, 4, 9, 0),
(10, 4, 10, 0),
(141, 6, 62, 0),
(38, 7, 21, 0),
(39, 7, 22, 0),
(171, 7, 40, 0),
(41, 8, 24, 0),
(146, 8, 6, 0),
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
(251, 17, 220, 0),
(144, 14, 46, 0),
(140, 3, 73, 0),
(123, 5, 67, 0),
(129, 6, 34, 0),
(116, 8, 60, 0),
(159, 19, 79, 0),
(160, 19, 80, 0),
(126, 11, 65, 0),
(188, 17, 54, 0),
(121, 4, 45, 0),
(142, 14, 41, 0),
(139, 17, 70, 0),
(136, 17, 72, 0),
(137, 17, 71, 0),
(155, 3, 75, 0),
(189, 3, 43, 0),
(187, 6, 63, 0),
(254, 16, 223, 0),
(161, 19, 81, 0),
(167, 19, 84, 0),
(166, 19, 83, 0),
(165, 19, 82, 0),
(168, 19, 85, 0),
(169, 19, 87, 0),
(170, 19, 86, 0),
(172, 7, 89, 0),
(173, 7, 88, 0),
(174, 7, 90, 0),
(175, 7, 92, 0),
(176, 7, 93, 0),
(177, 7, 95, 0),
(178, 7, 94, 0),
(179, 7, 96, 0),
(180, 7, 97, 0),
(181, 20, 37, 0),
(182, 20, 98, 0),
(183, 20, 99, 0),
(184, 20, 28, 0),
(185, 20, 100, 0),
(190, 3, 44, 0),
(191, 8, 15, 0),
(192, 8, 20, 0),
(193, 8, 18, 0),
(194, 3, 165, 0),
(195, 3, 157, 0),
(196, 6, 169, 0),
(197, 16, 173, 0),
(198, 16, 200, 0),
(199, 16, 181, 0),
(200, 16, 174, 0),
(201, 16, 180, 0),
(202, 16, 177, 0),
(203, 16, 171, 0),
(253, 17, 222, 0),
(205, 14, 123, 0),
(206, 14, 108, 0),
(207, 14, 141, 0),
(248, 16, 172, 0),
(255, 16, 224, 0),
(210, 14, 203, 0),
(211, 14, 214, 0),
(212, 14, 204, 0),
(213, 32, 184, 0),
(214, 32, 188, 0),
(215, 32, 182, 0),
(216, 32, 187, 0),
(217, 32, 185, 0),
(218, 32, 190, 0),
(219, 32, 183, 0),
(220, 32, 189, 0),
(221, 33, 194, 0),
(222, 33, 192, 0),
(223, 33, 191, 0),
(224, 33, 195, 0),
(225, 33, 193, 0),
(226, 7, 140, 0),
(227, 7, 127, 0),
(228, 7, 129, 0),
(229, 7, 125, 0),
(230, 7, 126, 0),
(256, 28, 225, 0),
(232, 7, 128, 0),
(233, 7, 199, 0),
(234, 28, 133, 0),
(235, 28, 117, 0),
(236, 28, 103, 0),
(237, 28, 134, 0),
(238, 28, 101, 0),
(239, 29, 116, 0),
(240, 29, 110, 0),
(241, 29, 212, 0),
(242, 29, 211, 0),
(243, 29, 213, 0),
(244, 29, 210, 0),
(245, 3, 138, 0),
(246, 3, 136, 0),
(247, 17, 217, 0),
(249, 16, 218, 0),
(250, 16, 219, 0),
(257, 14, 121, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mop`
--

CREATE TABLE IF NOT EXISTS `mop` (
  `mop_id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_name` varchar(100) NOT NULL,
  PRIMARY KEY (`mop_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mop`
--

INSERT INTO `mop` (`mop_id`, `mop_name`) VALUES
(1, 'Cash'),
(2, 'Cheque'),
(3, 'Electronic Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `net_profit`
--

CREATE TABLE IF NOT EXISTS `net_profit` (
  `net_profit_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`net_profit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes_payables_ledger`
--

CREATE TABLE IF NOT EXISTS `notes_payables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notes_receivables_ledger`
--

CREATE TABLE IF NOT EXISTS `notes_receivables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_area`
--

CREATE TABLE IF NOT EXISTS `nrc_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country_id` varchar(50) DEFAULT NULL,
  `area_code` varchar(50) DEFAULT NULL,
  `area_name` varchar(50) DEFAULT NULL,
  `area_desc` text,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_balances`
--

CREATE TABLE IF NOT EXISTS `opening_balances` (
  `opening_balance_id` int(10) NOT NULL AUTO_INCREMENT,
  `terminology_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`opening_balance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `opening_stock_ledger`
--

CREATE TABLE IF NOT EXISTS `opening_stock_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_code_get`
--

CREATE TABLE IF NOT EXISTS `order_code_get` (
  `order_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lpo_no` varchar(100) NOT NULL,
  `mop_id` varchar(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `freight_charge` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `lpo_expiry_date` date NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  `payment_schedule` longtext NOT NULL,
  PRIMARY KEY (`order_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `order_code_get`
--

INSERT INTO `order_code_get` (`order_code_id`, `shipper_id`, `supplier_id`, `user_id`, `lpo_no`, `mop_id`, `currency`, `curr_rate`, `freight_charge`, `comments`, `ref_no`, `lpo_expiry_date`, `date_generated`, `status`, `received_status`, `payment_schedule`) VALUES
(1, 0, 1, 77, 'BD0001/2017', '1', 7, '1', '', 'Need items urgently', '', '0000-00-00', '2017-08-15', 2, 0, 'r'),
(2, 0, 2, 77, 'BD0002/2017', '2', 7, '1', '', 'yyyy', '', '0000-00-00', '2017-08-15', 2, 0, 'ggggg'),
(3, 0, 6, 77, 'BD0003/2017', '3', 7, '1', '', 'Needed Urgently', '', '0000-00-00', '2017-08-09', 2, 0, 'payment'),
(4, 0, 2, 77, 'BD0004/2017', '2', 7, '1', '', 'gfrr', '', '0000-00-00', '2017-08-15', 2, 0, 'iii'),
(5, 0, 1, 19, 'BD0005/2017', '3', 2, '7', '', 'for sure', '', '0000-00-00', '2017-08-15', 2, 0, 'in tme'),
(6, 0, 7, 19, 'BD0006/2017', '1', 8, '132\r\n', '', 'sure', '', '0000-00-00', '2017-08-08', 2, 0, 'quick'),
(7, 0, 8, 100, 'BD0007/2017', '1', 7, '1', '', '30 days in advance', '', '0000-00-00', '2017-08-15', 2, 0, '30 days in advance'),
(8, 0, 8, 100, 'BD0008/2017', '1', 7, '1', '', 'goods', '', '0000-00-00', '2017-08-15', 2, 0, 'one comment'),
(9, 0, 4, 19, 'BD0009/2017', '1', 7, '1', '', 'fdfdfdf', '', '0000-00-00', '2017-08-16', 2, 0, 'dfdfdfd'),
(10, 0, 1, 19, 'BD0010/2017', '3', 8, '15', '', '', '', '0000-00-00', '2017-08-17', 2, 0, 'Cash in advance 50%'),
(11, 0, 2, 19, 'BD0011/2017', '1', 7, '1', '', 'comments', '', '0000-00-00', '2017-08-17', 2, 0, 'advance 30 days'),
(12, 0, 2, 19, 'BD0012/2017', '3', 2, '7', '', 'goods', 'u', '2017-05-26', '2017-08-20', 2, 0, 'payments within 30 days'),
(13, 0, 2, 100, 'BD0013/2017', '3', 8, '117', '', '6', '6', '2017-08-07', '2017-08-20', 2, 0, '6'),
(14, 0, 2, 19, '00014', '1', 8, '117', '', 'goods', '56', '2017-08-21', '2017-08-21', 2, 0, '90 days'),
(15, 0, 2, 19, '00015', '1', 8, '117', '', 'd', 'd', '2017-08-15', '2017-08-22', 2, 0, '40 days'),
(16, 0, 2, 19, '00016', '2', 7, '1', '', 'gooda in deed', '8', '2017-08-15', '2017-08-22', 2, 0, '40 days'),
(17, 0, 2, 19, '00017', '2', 7, '1', '', 'remarks', '678', '2017-08-24', '2017-08-22', 2, 0, '30 days'),
(18, 0, 4, 19, '00018', '1', 8, '117', '', '45', '67', '2017-08-15', '2017-08-22', 2, 0, '45'),
(19, 0, 2, 19, '00019', '1', 7, '1', '', 'del', '567', '2017-08-15', '2017-08-22', 2, 0, '45 days');

-- --------------------------------------------------------

--
-- Table structure for table `partial_invoice_payments`
--

CREATE TABLE IF NOT EXISTS `partial_invoice_payments` (
  `partial_invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code_id` int(11) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`partial_invoice_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `payroll_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `payroll_no` varchar(100) NOT NULL,
  `basic_pay` varchar(100) NOT NULL,
  `net_pay` varchar(100) NOT NULL,
  `unpaid_balance` varchar(100) NOT NULL,
  `salary_advance` varchar(100) NOT NULL,
  `comm_due` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payrol_basic_log`
--

CREATE TABLE IF NOT EXISTS `payrol_basic_log` (
  `payrol_basic_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `basic_pay` varchar(100) NOT NULL,
  `comm_pay` int(10) NOT NULL,
  `tax` int(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payrol_basic_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `ttl_deductions` varchar(100) NOT NULL,
  `net_salary` varchar(100) NOT NULL,
  `date_printed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_printed2` varchar(100) NOT NULL,
  `month_printed` varchar(100) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pending_purchases_ledger`
--

CREATE TABLE IF NOT EXISTS `pending_purchases_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_expense`
--

CREATE TABLE IF NOT EXISTS `petty_cash_expense` (
  `petty_cash_expense_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` int(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`petty_cash_expense_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_income`
--

CREATE TABLE IF NOT EXISTS `petty_cash_income` (
  `petty_cash_income_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`petty_cash_income_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_ledger`
--

CREATE TABLE IF NOT EXISTS `petty_cash_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `money_in` varchar(100) NOT NULL,
  `money_out` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ploughed_back_dividend`
--

CREATE TABLE IF NOT EXISTS `ploughed_back_dividend` (
  `ploughed_back_dividend` int(10) NOT NULL AUTO_INCREMENT,
  `shares_id` int(10) NOT NULL,
  `dividend_id` int(10) NOT NULL,
  `financial_year_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `dividend` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year_recorded` varchar(10) NOT NULL,
  PRIMARY KEY (`ploughed_back_dividend`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prepaid_expenses`
--

CREATE TABLE IF NOT EXISTS `prepaid_expenses` (
  `prepaid_expenses_id` int(10) NOT NULL AUTO_INCREMENT,
  `exp_cat_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`prepaid_expenses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prepaid_expenses_ledger`
--

CREATE TABLE IF NOT EXISTS `prepaid_expenses_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prepaid_expenses_payments`
--

CREATE TABLE IF NOT EXISTS `prepaid_expenses_payments` (
  `prepaid_expenses_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `prepaid_expenses_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`prepaid_expenses_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prepaid_salary_ledger`
--

CREATE TABLE IF NOT EXISTS `prepaid_salary_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE IF NOT EXISTS `products_old` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `prod_code` varchar(100) NOT NULL,
  `pack_size` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `reorder_level` varchar(100) NOT NULL,
  `curr_sp` varchar(100) NOT NULL,
  `curr_bp` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `exchange_rate` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cat_desc` longtext COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proforma`
--

CREATE TABLE IF NOT EXISTS `proforma` (
  `sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `comm_perc` varchar(10) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` int(11) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `sale_date` varchar(100) NOT NULL,
  `sale_type` varchar(100) NOT NULL,
  `canceled_status` varchar(100) NOT NULL,
  `approved_status` varchar(100) NOT NULL,
  `general_remarks` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_no` varchar(10) NOT NULL,
  `delivery_address` longtext NOT NULL,
  `delivered_by` longtext NOT NULL,
  `paid` int(11) NOT NULL,
  `days_taken` varchar(10) NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `supplier_id` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proforma_item`
--

CREATE TABLE IF NOT EXISTS `proforma_item` (
  `sales_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `man_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `item_cost` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sales_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_returns_ledger`
--

CREATE TABLE IF NOT EXISTS `purchases_returns_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `purchase_order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`purchase_order_id`),
  KEY `supplier_id` (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_order_id`, `order_code`, `product_id`, `description`, `quantity`, `vendor_prc`, `date_generated`, `status`) VALUES
(1, 17, 4, '', '20', '370', '2017-08-22 05:27:13', 0),
(2, 18, 3, '', '15', '260', '2017-08-22 06:26:21', 0),
(3, 19, 12, '', '10', '2000', '2017-08-22 07:38:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orderrrr`
--

CREATE TABLE IF NOT EXISTS `purchase_orderrrr` (
  `purchase_order_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_purchase_order_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_agent_id` int(11) NOT NULL,
  `payment_term_id` varchar(100) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `order_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `ttl` varchar(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`purchase_order_id`),
  KEY `supplier_id` (`supplier_id`,`product_id`),
  KEY `shipping_agent_id` (`shipping_agent_id`,`payment_term_id`,`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE IF NOT EXISTS `purchase_returns` (
  `purchase_returns_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipper_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `debit_note_no` varchar(100) NOT NULL,
  `mop_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `freight_charge` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  PRIMARY KEY (`purchase_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns_items`
--

CREATE TABLE IF NOT EXISTS `purchase_returns_items` (
  `purchase_returns_items_id` int(10) NOT NULL AUTO_INCREMENT,
  `purchase_returns_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`purchase_returns_items_id`),
  KEY `supplier_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE IF NOT EXISTS `quotation` (
  `quotation_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quotation_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `terms` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount_perc` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `vat` int(11) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `quotation_date` date NOT NULL,
  `convert_status` int(11) NOT NULL,
  `quotation_type` varchar(11) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `quotation_id` int(10) NOT NULL AUTO_INCREMENT,
  `quotation_no` varchar(100) NOT NULL,
  `quotation_ttl` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `quote_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`quotation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_item`
--

CREATE TABLE IF NOT EXISTS `quotation_item` (
  `quotation_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_cost` varchar(10) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`quotation_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_task`
--

CREATE TABLE IF NOT EXISTS `quotation_task` (
  `quotation_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `service_item_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`quotation_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_taskold`
--

CREATE TABLE IF NOT EXISTS `quotation_taskold` (
  `quotation_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `task_name` longtext NOT NULL,
  `task_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`quotation_task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
  `quote_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_quote_id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `payment_terms` varchar(100) NOT NULL,
  `delivery_terms` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `quote_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount_perc` int(11) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`quote_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote_code_gen`
--

CREATE TABLE IF NOT EXISTS `quote_code_gen` (
  `qoute_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`qoute_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reagents_cat`
--

CREATE TABLE IF NOT EXISTS `reagents_cat` (
  `reag_cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reag_cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `reag_cat_desc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`reag_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `received_stock`
--

CREATE TABLE IF NOT EXISTS `received_stock` (
  `received_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(10) NOT NULL,
  `stock_code_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity_rec` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `man_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `received_stock`
--

INSERT INTO `received_stock` (`received_stock_id`, `order_code_id`, `stock_code_id`, `product_id`, `quantity_rec`, `currency_code`, `curr_rate`, `delivery_date`, `man_date`, `expiry_date`, `status`, `date_received`, `user_id`, `batch_no`) VALUES
(1, 0, 0, 11, '30', 0, '', '2017-08-22', '0000-00-00', '0000-00-00', 1, '2017-08-22 05:21:37', 19, ''),
(2, 17, 1, 4, '10', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087'),
(3, 17, 2, 4, '10', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654'),
(4, 18, 3, 3, '15', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909'),
(5, 0, 0, 12, '0', 0, '', '2017-08-22', '0000-00-00', '0000-00-00', 1, '2017-08-22 07:36:56', 19, ''),
(6, 19, 4, 12, '5', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234'),
(7, 19, 5, 12, '5', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567');

-- --------------------------------------------------------

--
-- Table structure for table `received_stock_batch`
--

CREATE TABLE IF NOT EXISTS `received_stock_batch` (
  `received_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(10) NOT NULL,
  `stock_code_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity_rec` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `man_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `batch_number` varchar(11) NOT NULL,
  `sold` int(11) NOT NULL,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `received_stock_batch`
--

INSERT INTO `received_stock_batch` (`received_stock_id`, `order_code_id`, `stock_code_id`, `product_id`, `quantity_rec`, `currency_code`, `curr_rate`, `delivery_date`, `man_date`, `expiry_date`, `status`, `date_received`, `user_id`, `batch_number`, `sold`) VALUES
(1, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(2, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(3, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(4, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(5, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(6, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(7, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(8, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(9, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(10, 17, 1, 4, '1', 7, '1', '2017-08-22', '2017-08-01', '2017-08-21', 1, '2017-08-22 06:22:40', 19, '659087', 0),
(11, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(12, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(13, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(14, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(15, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(16, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(17, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(18, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(19, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(20, 17, 2, 4, '1', 7, '1', '2017-07-22', '2017-08-08', '2017-08-20', 1, '2017-08-22 06:24:30', 19, '87654', 1),
(21, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(22, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(23, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(24, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(25, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(26, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(27, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(28, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(29, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(30, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(31, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(32, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(33, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(34, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(35, 18, 3, 3, '1', 8, '117', '2017-07-16', '2017-08-01', '2017-09-12', 1, '2017-08-22 06:33:09', 19, '5678909', 1),
(36, 19, 4, 12, '1', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234', 1),
(37, 19, 4, 12, '1', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234', 1),
(38, 19, 4, 12, '1', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234', 1),
(39, 19, 4, 12, '1', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234', 1),
(40, 19, 4, 12, '1', 7, '1', '2017-07-21', '2017-08-08', '2017-08-31', 1, '2017-08-22 07:39:19', 19, '1234', 1),
(41, 19, 5, 12, '1', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567', 0),
(42, 19, 5, 12, '1', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567', 1),
(43, 19, 5, 12, '1', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567', 0),
(44, 19, 5, 12, '1', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567', 0),
(45, 19, 5, 12, '1', 7, '1', '2017-08-16', '2017-08-08', '2017-08-30', 1, '2017-08-22 07:40:20', 19, '4567', 1);

-- --------------------------------------------------------

--
-- Table structure for table `received_stock_code`
--

CREATE TABLE IF NOT EXISTS `received_stock_code` (
  `stock_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(11) NOT NULL,
  `delivery_note_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `batch_noyyyyy` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  PRIMARY KEY (`stock_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `received_stock_code`
--

INSERT INTO `received_stock_code` (`stock_code_id`, `order_code_id`, `delivery_note_no`, `currency`, `curr_rate`, `delivery_date`, `batch_noyyyyy`, `shop_id`, `user_id`, `status1`) VALUES
(1, 17, '00001', 7, '1', '2017-08-22', '', 0, 19, 0),
(2, 17, '00002', 7, '1', '2017-07-22', '', 0, 19, 0),
(3, 18, '00003', 8, '117', '2017-07-16', '', 0, 19, 0),
(4, 19, '00004', 7, '1', '2017-07-21', '', 0, 19, 0),
(5, 19, '00005', 7, '1', '2017-08-16', '', 0, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `received_stock_expense`
--

CREATE TABLE IF NOT EXISTS `received_stock_expense` (
  `received_stock_expense_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(10) NOT NULL,
  `stock_code_id` int(11) NOT NULL,
  `account_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`received_stock_expense_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `received_stock_garage`
--

CREATE TABLE IF NOT EXISTS `received_stock_garage` (
  `received_stock_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `quant_rec` varchar(100) DEFAULT NULL,
  `date_received` varchar(100) NOT NULL,
  `comments` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reconciled_bank_balance`
--

CREATE TABLE IF NOT EXISTS `reconciled_bank_balance` (
  `reconciled_bank_balance_id` int(10) NOT NULL AUTO_INCREMENT,
  `bank_id` int(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `system_balance` varchar(100) NOT NULL,
  `effect` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `adding_amount` varchar(100) NOT NULL,
  `reducing_amount` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_done` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`reconciled_bank_balance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reconciled_system_balance`
--

CREATE TABLE IF NOT EXISTS `reconciled_system_balance` (
  `reconciled_system_balance_id` int(10) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `bank_id` int(100) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `system_balance` varchar(100) NOT NULL,
  `effect` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `amount` varchar(100) NOT NULL,
  `adding_amount` varchar(100) NOT NULL,
  `reducing_amount` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_done` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`reconciled_system_balance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reconciliation_code`
--

CREATE TABLE IF NOT EXISTS `reconciliation_code` (
  `reconciliation_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`reconciliation_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recovered_bad_debts`
--

CREATE TABLE IF NOT EXISTS `recovered_bad_debts` (
  `recovered_bad_debts_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`recovered_bad_debts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report_dates`
--

CREATE TABLE IF NOT EXISTS `report_dates` (
  `report_date_id` int(10) NOT NULL AUTO_INCREMENT,
  `report_date_name` varchar(100) NOT NULL,
  `report_date_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`report_date_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `requisition_item`
--

CREATE TABLE IF NOT EXISTS `requisition_item` (
  `requisition_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_value` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`requisition_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `returned_stock`
--

CREATE TABLE IF NOT EXISTS `returned_stock` (
  `returned_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `quantity_returned` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`returned_stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE IF NOT EXISTS `rfq` (
  `rfq_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_rfq_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `rfq_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`rfq_id`),
  KEY `supplier_id` (`supplier_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rfq_code_get`
--

CREATE TABLE IF NOT EXISTS `rfq_code_get` (
  `rfq_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rfq_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salaries_payables_ledger`
--

CREATE TABLE IF NOT EXISTS `salaries_payables_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_expenses_ledger`
--

CREATE TABLE IF NOT EXISTS `salary_expenses_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_payments`
--

CREATE TABLE IF NOT EXISTS `salary_payments` (
  `salary_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `month_paid` varchar(100) NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`salary_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `comm_perc` varchar(10) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` int(11) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `sale_date` varchar(100) NOT NULL,
  `sale_type` varchar(100) NOT NULL,
  `canceled_status` varchar(100) NOT NULL,
  `approved_status` varchar(100) NOT NULL,
  `general_remarks` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_no` varchar(10) NOT NULL,
  `delivery_address` longtext NOT NULL,
  `delivered_by` longtext NOT NULL,
  `paid` int(11) NOT NULL,
  `days_taken` varchar(10) NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `supplier_id` (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `customer_id`, `invoice_no`, `sales_rep`, `comm_perc`, `currency`, `curr_rate`, `vat`, `discount`, `user_id`, `shop_id`, `sale_date`, `sale_type`, `canceled_status`, `approved_status`, `general_remarks`, `date_generated`, `order_no`, `delivery_address`, `delivered_by`, `paid`, `days_taken`) VALUES
(1, 2, 'Yet/Aug/0001', 83, '12', 7, 1, '1', '7', 19, 0, '2017-08-21', 'cr', '0', '1', '60 days', '2017-08-20 22:36:42', '67', 'Yetu Invetsments Limited\r\n3450\r\nNAIROBI , KENYA\r\nyetu@yahoo.com\r\n076543278999', '', 0, ''),
(2, 2, '00002', 83, '12', 7, 1, '1', '5', 19, 0, '2017-08-21', 'cr', '0', '1', '30 days', '2017-08-21 07:55:38', '45', 'Yetu Invetsments Limited\r\n3450\r\nNAIROBI , KENYA\r\nyetu@yahoo.com\r\n076543278999', '', 1, ''),
(3, 2, '00003', 83, '12', 7, 1, '1', '6', 19, 0, '2017-08-21', 'cr', '0', '1', '60 days credit', '2017-08-21 08:16:06', '5', 'Yetu Invetsments Limited\r\n3450\r\nNAIROBI , KENYA\r\nyetu@yahoo.com\r\n076543278999', 'Jonah Maina', 1, ''),
(4, 1, '00004', 83, '12', 7, 1, '0', '5', 77, 0, '2017-08-21', 'cr', '0', '1', '3o days', '2017-08-21 11:26:19', '67', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'Dan mwangi', 1, ''),
(5, 3, '00005', 83, '12', 7, 1, '1', '', 77, 0, '2017-08-21', 'cr', '0', '1', '45 days', '2017-08-21 16:07:29', '3456', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', 'Kimani June', 0, ''),
(6, 3, '00006', 84, '6', 7, 1, '1', '', 77, 0, '2017-08-21', 'cr', '0', '1', '30 days', '2017-08-21 16:16:30', '45', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', 'grgory', 0, ''),
(7, 1, '00007', 83, '12', 7, 1, '1', '', 19, 0, ' 2017-07-04  ', 'cr', '0', '1', 'goo terms', '2017-08-21 23:29:12', '76', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'Issack', 1, '0'),
(8, 1, '00008', 83, '12', 7, 1, '0', '', 19, 0, '2017-07-22', 'cr', '0', '1', '30 days', '2017-08-21 23:31:27', '7', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'Noman', 1, '5'),
(9, 1, '00009', 83, '12', 7, 1, '0', '', 19, 0, '2017-08-22', 'cr', '0', '1', '777', '2017-08-21 23:33:51', '7', 'Lena Agrovet\r\n\r\n\r\n\r\n', '89999', 1, '6'),
(10, 3, '00010', 83, '12', 7, 1, '0', '', 19, 0, '2017-08-22', 'cr', '0', '1', '30 days', '2017-08-21 23:36:14', '7', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', 'james', 1, '0'),
(11, 3, '00011', 83, '12', 7, 1, '0', '0', 19, 0, '2017-08-22', 'cr', '0', '1', '7777', '2017-08-21 23:39:23', '7', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', '7', 1, '0'),
(12, 3, '00012', 83, '12', 7, 1, '0', '', 19, 0, ' 2017-07-04  ', 'cr', '0', '1', '77', '2017-08-21 23:40:57', '77', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', '7777777', 1, '49'),
(13, 3, '00013', 84, '6', 7, 1, '0', '', 19, 0, '2017-08-22', 'cr', '0', '1', '', '2017-08-22 00:20:35', '', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', '', 0, ''),
(14, 3, '00014', 83, '12', 7, 1, '1', '', 19, 0, '2017-08-22', 'cr', '0', '1', '', '2017-08-22 00:21:38', '', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', '', 0, ''),
(15, 2, '00015', 84, '', 7, 1, '1', '20', 19, 0, '2017-08-22', 'cr', '0', '1', '30 days', '2017-08-22 06:39:22', '567', 'Yetu Invetsments Limited\r\n3450\r\nNyeri\r\nyetu@yahoo.com\r\n076543278999', 'G4S', 0, ''),
(16, 3, '00016', 83, '', 7, 1, '0', '10', 19, 0, '2017-08-22', 'cr', '0', '1', '45 days', '2017-08-22 06:48:28', '5', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', 'EMS', 0, ''),
(17, 3, '00017', 83, '5', 7, 1, '0', '6', 19, 0, '2017-08-22', 'cr', '0', '1', '45 days', '2017-08-22 07:19:51', '5', 'Bukeko Investments Ltd\r\n\r\n\r\n\r\n', 'EMS', 1, '0'),
(18, 1, '00018', 83, '5', 7, 1, '1', '30', 19, 0, '2017-08-22', 'cr', '0', '1', '45', '2017-08-22 07:29:07', '6', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'EMS', 0, ''),
(19, 1, '00019', 83, '5', 7, 1, '0', '5', 19, 0, '2017-08-22', 'cr', '0', '1', '', '2017-08-22 07:31:00', '678', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'EMS', 0, ''),
(20, 1, '00020', 83, '5', 7, 1, '0', '', 19, 0, '2017-08-22', 'cr', '0', '1', '5 dYS', '2017-08-22 07:41:05', '5', 'Lena Agrovet\r\n\r\n\r\n\r\n', 'EMS', 0, ''),
(21, 2, '00021', 83, '5', 7, 1, '0', '', 19, 0, '2017-08-22', 'cr', '0', '1', '4', '2017-08-22 07:42:42', '6', 'Yetu Invetsments Limited\r\n3450\r\nNAIROBI , KENYA\r\nyetu@yahoo.com\r\n076543278999', 'G4S', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `salesreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `salesreturns_code_gen` (
  `salesreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_code` int(11) NOT NULL,
  PRIMARY KEY (`salesreturn_code_gen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_bounced_cheques`
--

CREATE TABLE IF NOT EXISTS `sales_bounced_cheques` (
  `sales_bounced_cheques_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_payment_id` int(11) NOT NULL,
  `amount_bounced` varchar(10) NOT NULL,
  `bank_charges` varchar(100) NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sales_bounced_cheques_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_code`
--

CREATE TABLE IF NOT EXISTS `sales_code` (
  `sales_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep_id` int(11) NOT NULL,
  `terms` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` int(11) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `sale_date` date NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `sale_type` varchar(1) NOT NULL,
  `display` int(11) NOT NULL,
  PRIMARY KEY (`sales_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_code_get`
--

CREATE TABLE IF NOT EXISTS `sales_code_get` (
  `sales_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sales_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

CREATE TABLE IF NOT EXISTS `sales_item` (
  `sales_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `man_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `item_cost` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sales_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`sales_item_id`, `sales_id`, `shop_id`, `item_id`, `item_quantity`, `man_date`, `expiry_date`, `batch_no`, `item_cost`, `user_id`, `date_generated`, `status`) VALUES
(1, 15, 0, 3, 2, '2017-08-01', '2017-09-12', '5678909', '530', 19, '2017-08-22', 0),
(2, 16, 0, 4, 6, '2017-08-01', '2017-08-21', '659087', '670', 19, '2017-08-22', 0),
(3, 17, 0, 4, 4, '2017-08-01', '2017-08-21', '659087', '670', 19, '2017-08-22', 0),
(4, 18, 0, 3, 14, '2017-08-01', '2017-09-12', '5678909', '530', 19, '2017-08-22', 0),
(5, 19, 0, 9, 5, '0000-00-00', '0000-00-00', '', '1390', 19, '2017-08-22', 0),
(6, 20, 0, 12, 2, '2017-08-08', '2017-08-31', '1234', '3400', 19, '2017-08-22', 0),
(7, 21, 0, 12, 5, '2017-08-08', '2017-08-31', '1234', '3400', 19, '2017-08-22', 0);

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
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_receipt`
--

CREATE TABLE IF NOT EXISTS `sales_receipt` (
  `sales_rep_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `amnt_rec` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `sales_code_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_rep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE IF NOT EXISTS `sales_returns` (
  `sales_returns_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `credit_note_no` varchar(100) NOT NULL,
  `mop_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `freight_charge` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  `received_status` int(11) NOT NULL,
  PRIMARY KEY (`sales_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns_code`
--

CREATE TABLE IF NOT EXISTS `sales_returns_code` (
  `sales_return_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_code_id` int(11) NOT NULL,
  `credit_note_no` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_return_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns_items`
--

CREATE TABLE IF NOT EXISTS `sales_returns_items` (
  `sales_returns_items_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_returns_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_returns_items_id`),
  KEY `supplier_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns_ledger`
--

CREATE TABLE IF NOT EXISTS `sales_returns_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `sales_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_fixed_asset_payment`
--

CREATE TABLE IF NOT EXISTS `sale_fixed_asset_payment` (
  `sale_fixed_asset_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `fixed_asset_id` int(10) NOT NULL,
  `current_value` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sale_fixed_asset_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `savings_id` int(10) NOT NULL AUTO_INCREMENT,
  `savings_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `savings_amount` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`savings_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `savings_log`
--

CREATE TABLE IF NOT EXISTS `savings_log` (
  `savings_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `payrol_basic_log_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `saving_name` varchar(100) NOT NULL,
  `savings_amount` varchar(100) NOT NULL,
  `savings_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`savings_log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_item`
--

CREATE TABLE IF NOT EXISTS `service_item` (
  `service_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `service_item_name` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `service_item_desc` longtext NOT NULL,
  PRIMARY KEY (`service_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shareholder_transactions`
--

CREATE TABLE IF NOT EXISTS `shareholder_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `shareholder_id` int(10) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE IF NOT EXISTS `shares` (
  `shares_id` int(10) NOT NULL AUTO_INCREMENT,
  `share_holder_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `contact_person` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `next_of_kin` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `perc_shares` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `shares_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `mop` int(11) NOT NULL,
  `cheque_no` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ref_no` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shares_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shares_ledger`
--

CREATE TABLE IF NOT EXISTS `shares_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` date NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `closing_status` int(11) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shares_withdrawal`
--

CREATE TABLE IF NOT EXISTS `shares_withdrawal` (
  `shares_withdrawal_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `shareholder_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`shares_withdrawal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE IF NOT EXISTS `shippers` (
  `shipper_id` int(10) NOT NULL AUTO_INCREMENT,
  `shipper_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`shipper_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipper_name`, `address`, `town`, `phone`, `email`, `status`) VALUES
(0, 'Local ', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippers_transactions`
--

CREATE TABLE IF NOT EXISTS `shippers_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `shipper_id` int(10) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `shop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_cat_id` int(11) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `shop_description` longtext,
  `shop_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_advance`
--

CREATE TABLE IF NOT EXISTS `staff_advance` (
  `staff_advance_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `install` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `month_paid` varchar(100) NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`staff_advance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_advance_repayment`
--

CREATE TABLE IF NOT EXISTS `staff_advance_repayment` (
  `staff_advance_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `amount_repaid` varchar(100) NOT NULL,
  `month_paid` varchar(100) NOT NULL,
  `date_repaid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`staff_advance_repayment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_transactions`
--

CREATE TABLE IF NOT EXISTS `staff_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `stockreturns_code_gen` (
  `stockreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`stockreturn_code_gen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_payments`
--

CREATE TABLE IF NOT EXISTS `stock_payments` (
  `stock_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `lpo_no` varchar(100) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `cost_of_stock` varchar(100) NOT NULL,
  `amnt_paid` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `exchange_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_drawn` date NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`stock_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_returns`
--

CREATE TABLE IF NOT EXISTS `stock_returns` (
  `stock_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(10) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `vendor_price` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `stockreturn_code` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `stock_return_quantity` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer`
--

CREATE TABLE IF NOT EXISTS `stock_transfer` (
  `stock_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_date` date NOT NULL,
  `shop_from` int(11) NOT NULL,
  `shop_to` int(100) NOT NULL,
  `releasing_person` varchar(100) NOT NULL,
  `receiving_person` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY (`stock_transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_items`
--

CREATE TABLE IF NOT EXISTS `stock_transfer_items` (
  `stock_transfer_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_transfer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `transfer_quantity` varchar(11) NOT NULL,
  `date_released` date NOT NULL,
  `status` int(11) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`stock_transfer_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat_terminologies`
--

CREATE TABLE IF NOT EXISTS `sub_cat_terminologies` (
  `sub_cat_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `minor_terminology_id` int(11) NOT NULL,
  `sub_cat_teminology` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_cat_terminology_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=249 ;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'Stock Transfer', 8, '<li><a href="begin_stock_transfer.php">Stock Transfer</a></li>', 'Stock Transfer', 0),
(2, 3, 'Shops Management', 2, '<li><a href="home.php?settlementreport=settlementreport">Shops Management</a></li>', 'Shops Management', 0),
(3, 3, 'Customer Centre', 1, '<li><a href="home.php?viewproject=viewproject">Customer Centre</a></li>', 'Customer Centre', 0),
(4, 3, 'Record Purchase Returns', 41, '<li><a href="record_purchase_returns.php">Record Purchase Returns</a></li>	', 'Record Purchase Returns', 0),
(5, 3, 'Items Categories', 8, '<li><a href="home.php?viewsubproject=viewsubproject">Items Categories</a></li>', 'Items Categories', 0),
(7, 4, 'User Group Management', 10, '<li><a href="home.php?newusergroup=newusergroup">User Group Management</a></li>', 'vbvb', 0),
(8, 4, 'Modules and Submodules', 11, '<li><a href="home.php?modules=modules">Modules and Submodules</a></li>', '', 0),
(9, 4, 'Modules User Group Relation', 12, '<li><a href="home.php?modulesusergroup=modulesusergroup">Modules User Group Relation</a></li>', '', 0),
(10, 4, 'Users Management', 14, '<li><a href="home.php?viewusers=viewusers">Users Management</a></li>', '', 0),
(12, 5, 'Receive Items To The Inventory', 16, '<li><a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Receive Items To The Inventory</a></li>', '', 0),
(133, 3, 'Accounts Ledgers', 3, '<li><a href="#"><span>Accounts Ledgers</span></a>\r\n						<div><ul>\r\n                        <li><a href="view_ledger.php?type=11"><span>Petty Cash Ledger</span></a></li>\r\n						<li><a href="view_ledger.php?type=2"><span>Sales Revenue Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=3"><span>Stock Inventoty Ledger</span></a></li>\r\n\r\n<li><a href="view_ledger.php?type=4"><span>Sales Returns Ledger</span></a></li>\r\n\r\n\r\n						<li><a href="view_ledger.php?type=9"><span>Purchases Ledger</span></a></li>\r\n\r\n<li><a href="view_ledger.php?type=24"><span>Pending Purchases Ledger</span></a></li>\r\n\r\n<li><a href="view_ledger.php?type=5"><span>Purchases Returns Ledger</span></a></li>\r\n						<li><a href="view_ledger.php?type=6"><span>Cash Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=7"><span>Bank Ledger</span></a></li>\r\n						<li><a href="view_ledger.php?type=8"><span>Expenses Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=23"><span>Prepaid Expenses Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=10"><span>Income Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=12"><span>Accounts Receivable Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=13"><span>Notes Receivable Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=14"><span>Notes Payables Ledger</span></a></li>\r\n						<li><a href="view_ledger.php?type=15"><span>Accounts Payables Ledger</span></a></li>\r\n					\r\n<li><a href="view_ledger.php?type=17"><span>Shares Capital Ledger</span></a></li>\r\n<li><a href="view_ledger.php?type=18"><span>Additional Investments Ledger</span></a></li>\r\n						<li><a href="view_ledger.php?type=19"><span>Cost Of Production Ledger</span></a></li>\r\n					\r\n						<li><a href="view_ledger.php?type=22"><span>Fixed Asset Ledger</span></a></li>\r\n                        </ul></div>', '', 0),
(235, 28, 'Close Financial Accounts', 70, '<li><a href="close_accounts.php">Close Financial Accounts</a></li>', '', 0),
(129, 8, 'Fixed Assets', 39, '<li><a href="add_fixed_asset.php"><span>Fixed Assets</span></a></li>', '', 0),
(123, 7, 'Enter Cash Sales', 3, '<li><a href="generate_cash_sales.php"><span>Enter Cash Sales</span></a></li>', 'Enter Cash Sales', 0),
(125, 8, 'Expenses', 34, '<li><a href="view_expenses.php"><span>Expenses</span></a></li>', '', 0),
(126, 8, 'Other Income', 35, '<li><a href="view_income.php"><span>Other Income</span></a></li>', '', 0),
(127, 8, 'Petty Cash', 36, '<li><a href="add_petty_cash_expense.php"><span>Petty Cash</span></a></li>', '', 0),
(128, 8, 'Loan Received', 37, '<li><a href="add_loan.php"><span>Loans</span></a></li>', '', 0),
(121, 7, 'Sales Returns', 30, '<li><a href="view_sales_returns.php"><span>Sales Returns</span></a></li>', '', 0),
(27, 8, 'Sales Commissiin Report', 37, '<li><a href="home.php?submit_biweekly=submit_biweekly"><span>Sales Commission Reports</span></a></li>', 'submit_biweekly=submit_biweekly', 0),
(29, 8, 'Credit and Payment Reports', 40, '<li><a href="home.php?view_biweekly=view_biweekly"><span>Credit and Payment Reports</span></a></li>', '', 0),
(101, 3, 'Shares Capital', 3, '<li><a href="#"><span>Capital Account</span></a>\r\n						<div><ul>\r\n                        <li><a href="view_shares.php"><span>Shares Capital</span></a></li>\r\n						<li><a href="view_shares.php"><span>Statement of Owners Equity</span></a></li>\r\n<!--<li><a href="adjust_shares.php"><span>Adjust Share Holders Balance</span></a></li>-->\r\n\r\n<li><a href="exit_shareholder.php"><span>Exit Share Holder</span></a></li>\r\n						\r\n						\r\n                         </ul></div>', '', 0),
(102, 3, 'View Stock Availlability', 1, '<li><a href="all_stock.php"><span>View Stock Availlability</span></a></li>', '', 0),
(103, 3, 'Opening Balances', 3, ' <li><a href="add_client_opening_balance.php"><span>Opening Balances</span></a>\r\n				\r\n				\r\n				</li>', '', 0),
(104, 3, 'Product Categories Management', 69, '<li><a href="view_mach_cat.php"><span>Product Categories Management</span></a></li>', '', 0),
(105, 3, 'General Settings', 8, '<li><a href="view_currency.php"><span>General Settings</span></a></li>', '', 0),
(106, 3, 'Company Settings', 9, '<li><a href="add_contacts.php"><span>Company Settings</span></a></li>', '', 0),
(107, 3, 'Stock in Warehouse', 15, '<li><a href="closing_stock.php"><span>Stock in Warehouse</span></a></li>', '', 0),
(108, 3, 'Price List', 40, '<li><a href="price_list.php"><span>Price List</span></a></li>', '', 0),
(109, 5, 'Purchases Returns', 24, '<li><a href="view_debit_notes.php"><span>Purchases Returns</span></a></li>', '', 0),
(111, 5, 'Purchases Transactions', 19, '<li><a href="receive_stock.php"><span>Purchases Transactions</span></a></li>', '', 0),
(113, 5, 'Products Management', 23, '<li><a href="view_prod.php"><span>Products Management</span></a></li>\r\n			\r\n			', '', 0),
(114, 6, 'Receive Items With Bill', 42, '<li><a href="begin_invoice.php"><span>Receive Items With Bill</span></a></li>', 'Receive Items With Bill', 0),
(115, 6, 'Generate Quotation', 8, '<li><a href="begin_quote.php"><span>Generate Quotation</span></a></li>', '', 0),
(117, 6, 'Company Balance Sheets', 7, '<li><a href="view_balance_sheet.php"><span>Company Balance Sheets</span></a></li>', '', 0),
(119, 6, 'Sales Transactions', 28, '<li><a href="pay_invoice.php"><span>Sales Transactions</span></a></li>', '', 0),
(229, 14, 'Approve Customer Payments', 7, '<li><a href="pre_approve_customer_payments.php">Approve Customer Payments</a></li>', '', 0),
(230, 14, 'Customer Payments (Approved)', 8, '<li><a href="view_approved_client_payments.php">Customer Payments (Approved)</a></li>', '', 0),
(34, 7, 'View Generated Quotations', 2, '<li><a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a></li>', 'View Generated Quotations', 0),
(169, 5, 'Request For Quotation', 1, '<li><a href="begin_rfq.php">Request For Quotation</a></li>', '', 0),
(170, 5, 'View Requests For Quotation', 2, '<li><a href="view_rfq.php">View Requests For Quotations</a></li>', '', 0),
(171, 5, 'Create Purchase Order', 3, '<li><a href="begin_order.php">Create Purchase Order</a></li>', '', 0),
(172, 5, 'View Purchase Orders', 4, '<li><a href="view_lpos.php">View Purchase Orders</a></li>', '', 0),
(173, 5, 'Cancel Purchase Order', 5, '<li><a href="confirmed_orders.php">Cancel Purchase Order</a></li>', '', 0),
(174, 5, 'View Canceled Purchase Order', 6, '<li><a href="view_cancelled_lpos.php">View Canceled Purchase Order</a></li>', '', 0),
(163, 3, 'Add New Product', 8, '<li><a href="add_stock.php">Add Product</a></li>', '', 0),
(164, 3, 'View All Products', 9, '<li><a href="view_prod.php">View All Products</a></li>', '', 0),
(165, 3, 'Add Bank Account', 19, '<li><a href="add_bank.php">Add Bank Account</a></li>', '', 0),
(166, 3, 'View Bank Accounts', 20, '<li><a href="view_banks.php">View Bank Accounts</a></li>', '', 0),
(39, 4, 'Sub Module User Group Relation', 13, '<li><a href="home.php?usergroupsm=usergroupsm">Sub Module User Group Relation</a></li>', '', 0),
(162, 3, 'View Products Categories', 7, '<li><a href="view_mach_cat.php">View Products Categories</a></li>', '', 0),
(41, 6, 'Stock Level', 44, '<li><a href="closing_stock.php">Stock Level</a></li>', '', 0),
(161, 3, 'Add Product Product Category', 6, '<li><a href="add_machine_cat.php">Add Product Product Category</a></li>', '', 0),
(43, 6, 'Service Item Managment', 58, '<li><a href="home.php?settlementreport=settlementreport">Service Item Managment</a></li>', 'Service Item Managment', 0),
(44, 6, 'Setup Cost for Service', 67, '<li><a href="home.php?viewreneworkpermit2=viewreneworkpermit2">Setup Cost for Service</a></li>', '', 0),
(46, 6, 'View Invoices ', 2, '<li><a href="home.php?view_biweekly=view_biweekly">View Invoices </a></li>', 'View Invoices ', 0),
(160, 4, 'Update Company Details', 5, '<li><a href="view_company_contacts.php">Update Company Details</a></li>', '', 0),
(159, 3, 'Set Up Company Details', 3, '<li><a href="add_contacts.php">Set Up Company Details</a></li>', '', 0),
(49, 6, 'View Stock Inventory', 59, '<li><a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a></li>', '', 0),
(158, 3, 'Update Currencies', 2, '<li><a href="view_currency.php">Update Currencies</a></li>', '', 0),
(156, 4, 'View All Users', 17, '<li><a href="view_user.php">View All Users</a></li>', '', 0),
(157, 3, 'Add Currency', 1, '<li><a href="add_currency.php">Add Currency</a></li>', '', 0),
(155, 4, 'Add User', 16, '<li><a href="add_user.php">Add User</a></li>', '', 0),
(154, 4, 'Dettach Submodule From Usergroup', 15, '<li><a href="view_usergroupsm.php">Dettach Submodule From Usergroup</a></li>', '', 0),
(54, 5, 'Jobcard Clock In And Clock Out', 104, '<li><a href="home.php?assingomstaff=assingomstaff">Technician Clock In And Clock Out</a></li>', '', 0),
(153, 4, 'Attach Submodules To Usergroup', 14, '<li><a href="usergroupsm.php">Attach Submodules To Usergroup</a></li>', '', 0),
(152, 4, 'Dettach Submodules From Modules', 13, '<li><a href="unassign_module_submodule.php">Dettach Submodules From Modules</a></li>', '', 0),
(151, 4, 'Attach Submodules To Modules', 12, '<li><a href="assign_module_submodule.php">Attach Submodules To Modules</a></li>', '', 0),
(150, 4, 'Dettach Modules from Usergroup', 11, '<li><a href="unassign_module_usergroup.php">Dettach Modules from Usergroup</a></li>', '', 0),
(61, 6, 'Fund Transfer', 3, '<li><a href="add_fund_transfer.php">Fund Transfer</a></li>', '', 0),
(62, 6, 'Transfer Items', 8, '<li><a href="transfer_items.php">Transfer Items</a></li>', '', 0),
(63, 6, 'Create Credit Memoooooooooooo', 2, '<li><a href="record_sales_returns.php">Create Credit Memoooooooooooo</a></li>', 'Create Credit Memo\r\n', 0),
(149, 4, 'Attach Modules To User Groups', 10, '<li><a href="assign_module_usergroup.php">Attach Modules To User Groups</a></li>', '', 0),
(65, 6, 'Customer Refund', 40, '<li><a href="customer_refund.php">Customer Refund</a></li>', '', 0),
(148, 4, 'View All Sub Modules', 8, '<li><a href="view_sub_modules.php">View All Sub Modules</a></li>', '', 0),
(147, 4, 'Add Sub-Module', 7, '<li><a href="add_sub_module.php">Add Sub-Module</a></li>', '', 0),
(145, 4, 'Add Module', 4, '<li><a href="add_module.php">Add Module</a></li>', '', 0),
(146, 4, 'View All Modules', 6, '<li><a href="view_modules.php">View All Modules</a></li>', '', 0),
(144, 4, 'View All User Groups', 2, '<li><a href="view_user_groups.php">View All User Groups</a></li>', '', 0),
(70, 17, 'Close Job Card', 5, '<li><a href="home.php?settlementreportc=settlementreportc">Close Job Card</a></li>', 'Close Job Card', 0),
(71, 17, 'Create Invoice', 2, '<li><a href="generate_invoice.php">Create Invoice</a></li>', 'Create Invoice', 0),
(72, 17, 'View Sales Commission', 35, '<li><a href="home.php?submit_biweekly=submit_biweekly">View Sales Commission</a></li>', 'View Sales Commission', 0),
(73, 3, 'Items Managements', 9, '<li><a href="home.php?viewsetuptemplate=viewsetuptemplate">Items Managements</a></li>', '', 0),
(74, 3, 'Create Vihicle Models', 1, '<li><a href="home.php?newsponsor=newsponsor">Create Vehicle Models</a></li>', 'Create Vihicle Models', 0),
(75, 3, 'Company Details / Settings', 1, '<li><a href="home.php?viewcompetency=viewcompetency">Company Details / Settings</a></li>', '', 0),
(143, 4, 'Add User Group', 1, '<li><a href="add_user_groups.php">Add User Group</a></li>', '', 0),
(141, 6, 'Receive Payments', 6, '<li><a href="receive_client_payment.php">Receive Payments</a></li>', 'Receive Payments', 0),
(138, 15, 'Our Shipping Agents', 34, '<li><a href="view_ship.php"><span>Our Shipping Agents</span></a></li>', '', 0),
(137, 13, 'Our Clients', 21, '<li><a href="view_customers.php"><span>Our Clients</span></a></li>', '', 0),
(136, 16, 'Vendor Centre', 1, ' <li><a href="view_supplier.php"><span>Vendor Centre</span></a></li>', 'Vendor Centre', 0),
(134, 1, 'Company Profit and Loss Account', 5, '<li><a href="view_tpla.php"><span>Company Profit and Loss Account</span></a></li>', '', 0),
(176, 5, 'View Canceled RFQ', 3, '<li><a href="view_canceled_rfq.php">View Canceled RFQ</a></li>', '', 0),
(177, 3, 'Items Availlability In The Store', 11, '<li><a href="closing_stock.php">Items Availlability In The Store</a></li>', '', 0),
(178, 5, 'View Debit Notes', 12, '<li><a href="view_debit_notes.php">View Debit Notes</a></li>', '', 0),
(180, 5, 'View Payments To Suppliers', 9, '<li><a href="view_stock_payments.php">View Payments To Suppliers</a></li>', '', 0),
(181, 3, 'Receive Items', 7, '<li><a href="receive_stock.php">Receive Items</a></li>', '', 0),
(182, 14, 'Write Cheque', 1, '<li><a href="write_cheque.php">Write Cheque</a></li>', 'Write Cheque', 0),
(183, 14, 'View All Cheque Deposits', 2, '<li><a href="view_cheque_deposits.php">View All Cheque Deposits</a></li>', '', 0),
(184, 14, 'Record Cash Deposit', 4, '<li><a href="cash_deposit.php">Record Cash Deposit</a></li>', '', 0),
(185, 14, 'View All Cash Deposits', 6, '<li><a href="view_cash_deposits.php">View All Cash Deposits</a></li>', '', 0),
(186, 14, 'Bank Reconcilliations', 8, '<li><a href="#">Bank Reconcilliations</a></li>', '', 0),
(187, 14, 'Record Cheque Withdrawal', 2, '<li><a href="cheque_withdrawal.php">Record Cheque Withdrawal</a></li>', '', 0),
(188, 14, 'Record Cash Withdrawals', 6, '<li><a href="cash_withdrawal.php">Record Cash Withdrawals</a></li>', '', 0),
(189, 14, 'View All Cheque Withdrawals', 2, '<li><a href="view_cheque_withdrawals.php">View All Cheque Withdrawals</a></li>', '', 0),
(190, 14, 'View All Cash Withdrawals', 6, '<li><a href="view_cash_withdrawal.php">View All Cash Withdrawals</a></li>', '', 0),
(191, 3, 'Inventory Report', 1, '<li><a href="stock_level.php">Inventory Report</a></li>', '', 0),
(192, 15, 'Reconcile System Balance', 2, '<li><a href="reconcile_system_balance1.php">Reconcile System Balance</a></li>', '', 0),
(193, 15, 'View Reconciled System Balance', 3, '<li><a href="view_reconciled_system_balance1.php">View Reconciled System Balance</a></li>', '', 0),
(194, 3, 'Customer Balance/Creditors Reports', 4, '<li><a href="view_customer_balances.php">Creditors Reports</a></li>', '', 0),
(195, 15, 'View Reconciled Bank Balance', 5, '<li><a href="view_reconciled_bank_balance1.php">View Reconciled Bank Balance</a></li>', '', 0),
(196, 9, 'Record Staff Salary Payment', 200, '<li><a href="record_salary_payment.php">Record Staff Salary Payment</a></li>', '', 0),
(198, 6, 'Receive Payments From Clients', 100, '<li><a href="pre_bepaid.php">Receive Payments From Clients</a></li>', '', 0),
(199, 7, 'Prepaid Expenses', 101, '<li><a href="add_prepaid_expenses.php">Prepaid Expenses</a></li>', '', 0),
(200, 6, 'Pay Supplier (Order Payment)', 7, '<li><a href="pay_supplier.php">Pay Supplier (Order Payment)</a></li>', '', 0),
(201, 3, 'New Receive Stock To Warehouse', 900, '<li><a href="new_receive_stock.php">New Receive Stock To Warehouse</a></li>', '', 0),
(202, 6, 'View All Generated Invoices', 2, '<li><a href="view_invoices.php">View All Generated Invoices</a></li>', '', 0),
(203, 6, 'View Canceled Invoices', 3, '<li><a href="home.php?viewvisarenewals=viewvisarenewals">View Canceled Invoices</a></li>', '', 0),
(204, 6, 'View Customer Payments (Unapproved)', 7, '<li><a href="view_invoice_payments.php">Customer Payments(Unapproved)</a></li>', '', 0),
(205, 6, 'View Generated Quotations', 9, '<li><a href="view_quotations.php">View Generated Quotations</a></li>', '', 0),
(208, 6, 'View Commissions Report', 11, '<li><a href="view_comm_payments.php">View Commissions Report</a></li>', '', 0),
(239, 14, 'Sales Report', 1, '<li><a href="home.php?viewvisarenewals=viewvisarenewals">Sales Report</a></li>', '', 0),
(214, 1, 'View Cash Sales (Unapproved)', 10, '<li><a href="home.php?addformsections=addformsections">View Cash Sales (Unapproved)</a></li>', '', 0),
(215, 6, 'Create Credit Memo', 12, '<li><a href="record_sales_returns.php">Create Credit Memo</a></li>', 'Create Credit Memo', 0),
(216, 6, 'View Sales Return(Credit Notes)', 13, '<li><a href="view_sales_returns.php">View Sales Return(Credit Notes)</a></li>', '', 0),
(217, 17, 'View Cash Sales', 5, '<li><a href="home.php?processnatflight=processnatflight">View Cash Sales</a></li>', '', 0),
(218, 16, 'Approve Purchase Order', 3, '<li><a href="pre_approve_lpo.php">Approve Purchase Order</a></li>', '', 0),
(219, 16, 'View Approved LPOs', 4, '<li><a href="view_approved_lpo.php">View Approved LPOs</a></li>', '', 0),
(220, 17, 'Create Requisition Form', 3, '<li><a href="home.php?familystatus=familystatus">Create Requisition Form</a></li>', '', 0),
(237, 17, 'View Job Cards (Canceled)', 60, '<li><a href="home.php?newsponsor=newsponsor">View Job Cards (Canceled)</a></li>', 'View Job Cards (Canceled)', 0),
(236, 17, 'Sales Rep and Commissions', 34, '<li><a href="home.php?areareportc=areareportc">Sales Rep and Commissions</a></li>', '', 0),
(223, 16, 'Suppliers Refund', 43, '<li><a href="supplier_refund.php">Suppliers Refund</a></li>', '', 0),
(224, 16, 'View Received Items to the Store', 40, '<li><a href="view_all_released_items.php">View Received Items to the Store</a></li>', 'View Received Items to the Store', 0),
(225, 28, 'Bank Ledger', 10, '<li><a href="view_bank_ledger.php">Cash Ledger</a></li>', '', 0),
(226, 24, 'Chart Of Accounts', 4, '<li><a href="view_station.php">Chart Of Accounts</a></li>', '', 0),
(227, 24, 'View Approved Payroll', 11, '<li><a href="view_approved_payroll.php">View Approved Payroll</a></li>', '', 0),
(231, 29, 'Print Payroll Register', 34, '<li><a href="begin_print_payroll_register.php">Print Payroll Register</a></li>', '', 0),
(232, 14, 'Cancel Approved Invoices', 2, '<li><a href="home.php?addformfields=addformfields">Cancel Approved Invoices</a></li>', '', 0),
(233, 29, 'View Canceled Approved Invoices', 2, '<li><a href="home.php?viewformfields=viewformfields">View Canceled Approved Invoices</a></li>', '', 0),
(234, 1, 'View Approved Cash Sales ', 1, '<li><a href="home.php?benefitded=benefitded">View Approved Cash Sales </a></li>', '', 0),
(238, 14, 'View Cash Sales (Approved)', 11, '<li><a href="home.php?processnatflightc=processnatflightc">View Cash Sales (Approved)</a></li>', '', 0),
(240, 28, 'Shops Profit and Loss Account', 6, '<li><a href="view_tpla.php">Shops Profit and Loss Account</a></li>', '', 0),
(241, 28, 'Shops Balance Sheet', 8, '<li><a href="view_balance_sheet.php">Shops Balance Sheets</a></li>', '', 0),
(242, 8, 'Region Sales Report', 3, '<li><a href="region_sales_report.php">Region Sales Report</a></li>', '', 0),
(243, 8, 'Item Performance Report', 6, '<li><a href="item_perfomance_report.php">Product Performance Report</a></li>', '', 0),
(244, 8, 'Product Aging Report', 8, '<li><a href="item_expiry_aging_report.php">Product Aging Report</a></li>', '', 0),
(245, 8, 'Customer Performance Report', 5, '<li><a href="customer_perfomance.php">Customer Performance</a></li>', '', 0),
(246, 8, 'Sales Rep Performance Report', 37, '<li><a href="sales_rep_performance.php">Sales Rep Performance Report</a></li>', '', 0),
(247, 8, 'Debtors Report', 4, '<li><a href="view_supplier_balances.php">Debtors Report</a></li>', '', 0),
(248, 35, 'Proforma Invoice', 12, '<li><a href="generate_proforma_invoice.php">Proforma Invoice</a></li>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_module_garage`
--

CREATE TABLE IF NOT EXISTS `sub_module_garage` (
  `sub_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `sub_module_name` varchar(200) NOT NULL,
  `sort_order` int(10) NOT NULL,
  `sublink` longtext NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`sub_module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `sub_module_garage`
--

INSERT INTO `sub_module_garage` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'Shares Capital', 3, '<li><a href="#"><span>Capital Account</span></a>\r\n						<div><ul>\r\n                        <li><a href="view_shares.php"><span>Shares Capital</span></a></li>\r\n						<li><a href="equity1.php"><span>Statement of Owners Equity</span></a></li>\r\n<li><a href="adjust_shares.php"><span>Adjust Share Holders Balance</span></a></li>\r\n\r\n<li><a href="exit_shareholder.php"><span>Exit Share Holder</span></a></li>\r\n						\r\n						\r\n                         </ul></div>', 'Shares Capital', 1),
(2, 3, 'View Stock Availlability', 1, '<li><a href="all_stock.php"><span>View Stock Availlability</span></a></li>', 'Manage blocks', 1),
(3, 3, 'Opening Balances', 2, ' <li><a href="#"><span>Opening Balances</span></a>\r\n				\r\n				<div><ul id="fly">\r\n				<!--<li><a href="add_inventory_opening_balance.php"><span>Accounting Balance</span></a></li>-->\r\n				<li><a href="add_client_opening_balance.php"><span>Customers Balance</span></a></li>\r\n\r\n\r\n            </ul></div>\r\n				\r\n				\r\n				</li>', 'Titles', 1),
(4, 3, 'Product Categories Management', 69, '<li><a href="view_mach_cat.php"><span>Product Categories Management</span></a></li>', 'product cat', 1),
(5, 3, 'General Settings', 8, '<li><a href="view_currency.php"><span>General Settings</span></a></li>', 'Manages Clients', 1),
(6, 3, 'Company Settings', 9, '<li><a href="add_contacts.php"><span>Company Settings</span></a></li>', '', 1),
(11, 5, 'Stock in Warehouse', 15, '<li><a href="closing_stock.php"><span>Stock in Warehouse</span></a></li>', '', 0),
(12, 5, 'Price List', 40, '<li><a href="price_list.php"><span>Price List</span></a></li>', '', 1),
(13, 5, 'Purchases Returns', 24, '<li><a href="view_debit_notes.php"><span>Purchases Returns</span></a></li>', '', 0),
(41, 34, 'Payroll Reports', 24, '<li><a href="view_payslips.php"><span>Payroll Reports</span></a>	\r\n						\r\n						</li>', '', 1),
(14, 5, 'Purchases Transactions', 19, '<li><a href="receive_stock.php"><span>Purchases Transactions</span></a></li>', '', 0),
(15, 5, 'Stock Procurement', 1, '<li><a href=""><span>Stock Procurement</span></a>\r\n				<div><ul>\r\n                \r\n				\r\n				<li><a href="begin_order.php"><span>Create Purchase Order</span></a></li>\r\n				<li><a href="begin_rfq.php"><span>Request for Quotation</span></a></li>\r\n\r\n\r\n            </ul></div>', '', 0),
(16, 5, 'Products Management', 23, '<li><a href="view_prod.php"><span>Products Management</span></a></li>\r\n			\r\n			', '', 1),
(17, 6, 'Invoice Generation', 1, '<li><a href="begin_invoice.php"><span>Invoice Generation</span></a></li>', '', 1),
(18, 6, 'Generate Quotation', 8, '<li><a href="begin_quote.php"><span>Generate Quotation</span></a></li>', '', 1),
(38, 12, 'Manage Employees', 1, '<li><a href="view_employees.php"><span>Manage Employees</a></li>', '', 1),
(37, 6, 'Balance Sheets', 109, '<li><a href="view_balance_sheet.php"><span>Balance Sheet</span></a></li>', '', 1),
(46, 3, 'Chart Of Accounts', 10, '<li><a href="view_terminology.php">Chart Of Accounts</a></li>', '', 1),
(19, 6, 'Sales Transactions', 28, '<li><a href="pay_invoice.php"><span>Sales Transactions</span></a></li>', '', 0),
(39, 12, 'Payroll Master', 23, '<li><a href="#"><span>Payroll Master</span></a>\r\n						<div><ul>\r\n                       <!--<li><a href="view_banks.php"><span>Banks and Branches</span></a></li>-->\r\n						<li><a href="view_nhif.php"><span>NHIF Rates</span></a></li>\r\n						<li><a href="view_paye.php"><span>PAYE Tax Blocks</span></a></li>\r\n						<li><a href="add_deductions.php"><span>Benefits and Deductions</span></a></li>\r\n						<!--<li><a href="add_loan_type.php"><span>Loans and Savings</span></a></li>-->\r\n						\r\n						\r\n                         </ul></div>\r\n						\r\n						\r\n						\r\n						</li>', '', 1),
(20, 7, 'Sales Returns', 30, '<li><a href="view_sales_returns.php"><span>Sales Returns</span></a></li>', '', 0),
(21, 7, 'Bad Debts Transactions', 31, '<li><a href="bad_debts.php"><span>Bad Debts Transactions</span></a></li>', '', 1),
(22, 7, 'Cash Sales', 9, '<li><a href="begin_cash_sales.php"><span>Cash Sales</span></a></li>', '', 1),
(23, 7, 'Sales Commission', 33, '<li><a href="view_comm_payments.php"><span>Sales Commission</span></a></li>', '', 0),
(24, 8, 'Record General Expenses', 34, '<li><a href="view_expenses.php"><span>Record General Expenses</span></a></li>', '', 1),
(25, 8, 'Record General Income', 35, '<li><a href="view_income.php"><span>Record General Income</span></a></li>', '', 1),
(26, 8, 'Petty Cash Transactions', 36, '<li><a href="add_petty_cash_expense.php"><span>Petty Cash Transactions</span></a></li>', '', 1),
(27, 8, 'Record Loan Received', 37, '<li><a href="add_loan.php"><span>Record Loan Received</span></a></li>', '', 1),
(28, 8, 'Record Fixed Assets', 39, '<li><a href="add_fixed_asset.php"><span>Record Fixed Assets</span></a></li>', '', 1),
(29, 8, 'Record Depreciation', 40, '<li><a href="depreciation.php"><span>Record Depreciation</span></a></li>', '', 1),
(30, 9, 'Setup Financial Year', 1, '<li><a href="add_fyear.php"><span>Setup Financial Year</span></a></li>', '', 1),
(31, 9, 'Exchange Rate Variations', 43, '<li><a href="exchange_rate_variations.php"><span>Exchange Rate Variations</span></a></li>', '', 1),
(32, 9, 'Accounts Ledgers', 3, '<li><a href="#"><span>Accounts Ledgers</span></a>\r\n						<div><ul>\r\n                        <li><a href="general_ledger.php"><span>General Ledger</span></a></li>\r\n						<li><a href="sales_ledger.php"><span>Sales Revenue Ledger</span></a></li>\r\n<li><a href="inventory_ledger.php"><span>Stock Inventoty Ledger</span></a></li>\r\n\r\n<li><a href="sales_return_ledger.php"><span>Sales Returns Ledger</span></a></li>\r\n\r\n\r\n						<li><a href="purchases_ledger.php"><span>Purchases Ledger</span></a></li>\r\n\r\n<li><a href="purchase_returns_ledger.php"><span>Purchases Returns Ledger</span></a></li>\r\n						<li><a href="view_cash_ledger.php"><span>Cash Ledger</span></a></li>\r\n						<li><a href="view_expenses_ledger.php"><span>All Expenses Ledger</span></a></li>\r\n\r\n<li><a href="custom_clearance_ledger.php"><span>Custom And Clearance Ledger</span></a></li>\r\n\r\n<li><a href="salaries_ledger.php"><span>Salaries and Commission Ledger</span></a></li>\r\n\r\n<li><a href="com_payables_ledger.php"><span>Salary and Commision Payable</span></a></li>\r\n						<li><a href="accounts_receivables_ledger.php"><span>Accounts Receivable Ledger</span></a></li>\r\n<li><a href="notes_receivables_ledger.php"><span>Notes Receivable Ledger</span></a></li>\r\n<li><a href="notes_payable_ledger.php"><span>Notes Payables Ledger</span></a></li>\r\n						<li><a href="accounts_payables_ledger.php"><span>Accounts Payables Ledger</span></a></li>\r\n						<li><a href="view_loan_ledger.php"><span>Loan Ledger</span></a></li>\r\n						<li><a href="doubtful_debts_ledger.php"><span>Doubtful Debts Ledger</span></a></li>\r\n						<li><a href="bad_debts_ledger.php"><span>Bad Debts Ledger</span></a></li>\r\n						<li><a href="view_petty_cash_ledger.php"><span>Petty Cash Ledger</span></a></li>\r\n						<li><a href="fixed_asset_ledger.php"><span>Fixed Asset Ledger</span></a></li>\r\n                        </ul></div>', '', 1),
(33, 9, 'Profit and Loss Account', 37, '<li><a href="view_tpla.php"><span>Profit and Loss Account</span></a></li>', '', 1),
(34, 7, 'Debtors and Creditors', 50, '<li><a href="#"><span>Debtors and Creditors</span></a>\r\n						<div><ul>\r\n\r\n                        <li><a href="view_sales_returns.php"><span>Credit Notes</span></a></li>\r\n						<li><a href="view_debit_notes.php"><span>Debit Notes</span></a></li>\r\n						\r\n						\r\n						\r\n                         </ul></div>\r\n                        </li>', 'Manages fixed asset management', 1),
(42, 12, 'Our Suppliers', 45, ' <li><a href="view_supplier.php"><span>Our Suppliers</span></a></li>', '', 1),
(43, 13, 'Our Clients', 21, '<li><a href="view_customers.php"><span>Our Clients</span></a></li>', '', 1),
(44, 15, 'Our Shipping Agents', 34, '<li><a href="view_ship.php"><span>Our Shipping Agents</span></a></li>', '', 1),
(45, 3, 'View Invoices Generated Accounts', 2, '<li><a href="view_invoices.php">View Invoices Generated Accounts</a></li>', '', 1),
(47, 7, 'Custom Clearance Tax & Freight', 100, '<li><a href="add_transport_expenses.php">Custom Clearance Tax & Freight</a></li>', '', 1),
(48, 6, 'Receive Invoice Payments', 6, '<li><a href="pre_bepaid.php">Receive Invoice Payments</a></li>', '', 1),
(49, 3, 'Banks Accounts Management', 70, '<li><a href="add_bank.php">Banks Accounts Management</a></li>', '', 1),
(50, 4, 'Add User Group', 1, '<li><a href="add_user_groups.php">Add User Group</a></li>', '', 1),
(51, 4, 'View All User Groups', 2, '<li><a href="view_user_groups.php">View All User Groups</a></li>', '', 1),
(52, 4, 'Add Module', 4, '<li><a href="add_module.php">Add Module</a></li>', '', 1),
(53, 4, 'View All Modules', 6, '<li><a href="view_modules.php">View All Modules</a></li>', '', 1),
(54, 4, 'Add Sub-Module', 7, '<li><a href="add_sub_module.php">Add Sub-Module</a></li>', '', 1),
(55, 4, 'View All Sub Modules', 8, '<li><a href="view_sub_modules.php">View All Sub Modules</a></li>', '', 1),
(56, 4, 'Attach Modules To User Groups', 10, '<li><a href="assign_module_usergroup.php">Attach Modules To User Groups</a></li>', '', 1),
(57, 4, 'Dettach Modules from Usergroup', 11, '<li><a href="unassign_module_usergroup.php">Dettach Modules from Usergroup</a></li>', '', 1),
(58, 4, 'Attach Submodules To Modules', 12, '<li><a href="assign_module_submodule.php">Attach Submodules To Modules</a></li>', '', 1),
(59, 4, 'Dettach Submodules From Modules', 13, '<li><a href="unassign_module_submodule.php">Dettach Submodules From Modules</a></li>', '', 1),
(60, 4, 'Attach Submodules To Usergroup', 14, '<li><a href="usergroupsm.php">Attach Submodules To Usergroup</a></li>', '', 1),
(61, 4, 'Dettach Submodule From Usergroup', 15, '<li><a href="view_usergroupsm.php">Dettach Submodule From Usergroup</a></li>', '', 1),
(62, 4, 'Add User', 16, '<li><a href="add_user.php">Add User</a></li>', '', 1),
(63, 4, 'View All Users', 17, '<li><a href="view_user.php">View All Users</a></li>', '', 1),
(64, 3, 'Add Currency', 1, '<li><a href="add_currency.php">Add Currency</a></li>', '', 1),
(65, 3, 'Update Currencies', 2, '<li><a href="view_currency.php">Update Currencies</a></li>', '', 1),
(66, 3, 'Set Up Company Details', 3, '<li><a href="add_contacts.php">Set Up Company Details</a></li>', '', 0),
(67, 4, 'Update Company Details', 5, '<li><a href="view_company_contacts.php">Update Company Details</a></li>', '', 0),
(68, 3, 'Add Product Product Category', 6, '<li><a href="add_machine_cat.php">Add Product Product Category</a></li>', '', 1),
(69, 3, 'View Products Categories', 7, '<li><a href="view_mach_cat.php">View Products Categories</a></li>', '', 0),
(70, 3, 'Add New Product', 8, '<li><a href="add_stock.php">Add Product</a></li>', '', 1),
(71, 3, 'View All Products', 9, '<li><a href="view_prod.php">View All Products</a></li>', '', 0),
(72, 3, 'Add Bank Account', 19, '<li><a href="add_bank.php">Add Bank Account</a></li>', '', 1),
(73, 3, 'View Bank Accounts', 20, '<li><a href="view_banks.php">View Bank Accounts</a></li>', '', 1),
(74, 3, 'Add Pack Size', 9, '<li><a href="add_packsize.php">Add Pack Size</a></li>', '', 0),
(75, 3, 'View Pack Sizes', 10, '<li><a href="#">View Pack Sizes</a></li>', '', 0),
(76, 5, 'Request For Quotation', 1, '<li><a href="begin_rfq.php">Request For Quotation</a></li>', '', 1),
(77, 5, 'View Requests For Quotation', 2, '<li><a href="view_rfq.php">View Requests For Quotations</a></li>', '', 1),
(78, 5, 'Create Purchase Order', 3, '<li><a href="begin_order.php">Create Purchase Order</a></li>', '', 1),
(79, 5, 'View Purchase Orders', 4, '<li><a href="view_lpos.php">View Purchase Orders</a></li>', '', 1),
(80, 5, 'Cancel Purchase Order', 5, '<li><a href="confirmed_orders.php">Cancel Purchase Order</a></li>', '', 1),
(81, 5, 'View Canceled Purchase Order', 6, '<li><a href="view_cancelled_lpos.php">View Canceled Purchase Order</a></li>', '', 1),
(82, 5, 'View Suppliers Receipts', 7, '<li><a href="view_supplier_receipts.php">View Suppliers Receipts</a></li>', '', 1),
(83, 5, 'View Canceled RFQ', 3, '<li><a href="view_canceled_rfq.php">View Canceled RFQ</a></li>', '', 1),
(84, 5, 'View stock in the warehouse', 11, '<li><a href="closing_stock.php">View stock in the Warehouse</a></li>', '', 1),
(85, 5, 'View Debit Notes', 12, '<li><a href="view_debit_notes.php">View Debit Notes</a></li>', '', 1),
(86, 5, 'Products Expiry Condition', 19, '<li><a href="view_prod_condition.php">Products Expiry Condition</a></li>', '', 0),
(88, 5, 'View Payments To Suppliers', 9, '<li><a href="view_stock_payments.php">View Payments To Suppliers</a></li>', '', 1),
(87, 5, 'Receive Stock To Warehouse', 7, '<li><a href="receive_stock.php">Receive Stock To Warehouse</a></li>', '', 1),
(89, 14, 'Record Cheque Deposit', 1, '<li><a href="cheque_deposit.php">Record Cheque Deposit</a></li>', '', 1),
(90, 14, 'View All Cheque Deposits', 2, '<li><a href="view_cheque_deposits.php">View All Cheque Deposits</a></li>', '', 1),
(91, 14, 'Record Cash Deposit', 4, '<li><a href="cash_deposit.php">Record Cash Deposit</a></li>', '', 1),
(92, 14, 'View All Cash Deposits', 6, '<li><a href="view_cash_deposits.php">View All Cash Deposits</a></li>', '', 1),
(93, 14, 'Bank Reconcilliations', 8, '<li><a href="#">Bank Reconcilliations</a></li>', '', 0),
(94, 14, 'Record Cheque Withdrawal', 2, '<li><a href="cheque_withdrawal.php">Record Cheque Withdrawal</a></li>', '', 1),
(95, 14, 'Record Cash Withdrawals', 6, '<li><a href="cash_withdrawal.php">Record Cash Withdrawals</a></li>', '', 1),
(96, 14, 'View All Cheque Withdrawals', 2, '<li><a href="view_cheque_withdrawals.php">View All Cheque Withdrawals</a></li>', '', 1),
(97, 14, 'View All Cash Withdrawals', 6, '<li><a href="view_cash_withdrawal.php">View All Cash Withdrawals</a></li>', '', 1),
(98, 15, 'View System Bank Balance', 1, '<li><a href="view_bank_balance1.php">View System Bank Balance</a></li>', '', 1),
(99, 15, 'Reconcile System Balance', 2, '<li><a href="reconcile_system_balance1.php">Reconcile System Balance</a></li>', '', 1),
(100, 15, 'View Reconciled System Balance', 3, '<li><a href="view_reconciled_system_balance1.php">View Reconciled System Balance</a></li>', '', 1),
(101, 15, 'Reconcile Bank Balance', 4, '<li><a href="reconcile_bank_balance1.php">Reconcile Bank Balance</a></li>', '', 1),
(102, 15, 'View Reconciled Bank Balance', 5, '<li><a href="view_reconciled_bank_balance1.php">View Reconciled Bank Balance</a></li>', '', 1),
(103, 9, 'Record Staff Salary Payment', 200, '<li><a href="record_salary_payment.php">Record Staff Salary Payment</a></li>', '', 1),
(104, 7, 'Record Loan Given Out', 38, '<li><a href="add_loan_given_out.php">Record Loan Given Out</a></li>', '', 1),
(105, 6, 'Receive Payments From Clients', 100, '<li><a href="pre_bepaid.php">Receive Payments From Clients</a></li>', '', 1),
(106, 7, 'Record Prepaid Expenses', 101, '<li><a href="add_prepaid_expenses.php">Recored Prepaid Expenses</a></li>', '', 1),
(107, 6, 'Pay Supplier (Order Payment)', 7, '<li><a href="pay_supplier.php">Pay Supplier (Order Payment)</a></li>', '', 1),
(108, 5, 'New Receive Stock To Warehouse', 900, '<li><a href="new_receive_stock.php">New Receive Stock To Warehouse</a></li>', '', 0),
(109, 6, 'View All Generated Invoices', 2, '<li><a href="view_invoices.php">View All Generated Invoices</a></li>', '', 1),
(110, 6, 'View Canceled Invoices', 3, '<li><a href="view_cancelled_invoices.php">View Canceled Invoices</a></li>', '', 1),
(111, 6, 'View Recived Invoice Payments', 7, '<li><a href="view_invoice_payments.php">View Received Invoice Payments</a></li>', '', 1),
(112, 6, 'View Generated Quotations', 9, '<li><a href="view_quotations.php">View Generated Quotations</a></li>', '', 1),
(113, 6, 'Assign Commision Rate To Sales Rep', 9, '<li><a href="assign_commision.php">Assign Commission Rate</a></li>', '', 1),
(114, 6, 'View Commission Rates', 10, '<li><a href="view_ass_commisions.php">View Commission Rates</a></li>', '', 1),
(115, 6, 'View Commissions Report', 11, '<li><a href="view_comm_payments.php">View Commissions Report</a></li>', '', 1),
(116, 6, 'Pay Staff Commission', 10, '<li><a href="pay_commission.php">Pay Staff Commission</a></li>', '', 0),
(117, 9, 'View Staff Statement', 22, '<li><a href="view_staff_statement.php">View Staff Statement</a></li>', '', 1),
(118, 9, 'Record Staff Advance', 5, '<li><a href="add_staff_advance.php">Record Staff Advance</a></li>', '', 1),
(119, 9, 'Process Payroll', 6, '<li><a href="generate_payroll.php">Process Payroll</a></li>', '', 1),
(120, 9, 'Terminate Staff', 25, '<li><a href="terminate_staff.php">Terminate Staff</a></li>', '', 1),
(121, 9, 'View Cash Sales Generated', 10, '<li><a href="view_cash_sales.php">View Cash Sales Generated</a></li>', '', 1),
(122, 6, 'Record Sales Returns', 12, '<li><a href="view_inv_sales_returns.php">Record Sales Returns</a></li>', '', 1),
(123, 6, 'View Sales Return(Credit Notes)', 13, '<li><a href="view_sales_returns.php">View Sales Return(Credit Notes)</a></li>', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_module_old`
--

CREATE TABLE IF NOT EXISTS `sub_module_old` (
  `sub_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `module_id` int(10) NOT NULL,
  `sub_module_name` varchar(200) NOT NULL,
  `sort_order` int(10) NOT NULL,
  `sublink` longtext NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`sub_module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Dumping data for table `sub_module_old`
--

INSERT INTO `sub_module_old` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'View All Bookings', 2, '<li><a href="home.php?viewhrforms=viewhrforms">View Bookings</a></li>', 'View Bookings', 0),
(2, 3, 'Vehicle Make and Models', 2, '<li><a href="home.php?viewuniversity=viewuniversity">Vehicle Make and Models</a></li>', 'Create Vehicle Make', 0),
(3, 3, 'Customer Database', 3, '<li><a href="home.php?viewproject=viewproject">Customer Database</a></li>', 'Customer Database', 0),
(4, 3, 'Project Implementation Location', 2, '<li><a href="home.php?viewlocation=viewlocation">Project Implementation Location</a></li>	', 'good', 0),
(5, 3, 'Items Categories', 8, '<li><a href="home.php?viewsubproject=viewsubproject">Items Categories</a></li>', 'Items Categories', 0),
(6, 3, 'List Of Pending Estimates', 89, '<li><a href="home.php?editsettlements=editsettlements">List Of Pending Estimates</a></li>', '', 0),
(7, 4, 'User Group Management', 10, '<li><a href="home.php?newusergroup=newusergroup">User Group Management</a></li>', 'vbvb', 0),
(8, 4, 'Modules and Submodules', 11, '<li><a href="home.php?modules=modules">Modules and Submodules</a></li>', '', 0),
(9, 4, 'Modules User Group Relation', 12, '<li><a href="home.php?modulesusergroup=modulesusergroup">Modules User Group Relation</a></li>', '', 0),
(10, 4, 'Users Management', 14, '<li><a href="home.php?users=users">Users Management</a></li>', '', 0),
(12, 5, 'Receive Items To The Inventory', 16, '<li><a href="home.php?viewsubprojectcountry=viewsubprojectcountry">Receive Items To The Inventory</a></li>', '', 0),
(133, 3, 'Accounts Ledgers', 3, '<li><a href="#"><span>Accounts Ledgers</span></a>\r\n						<div><ul>\r\n                        <li><a href="general_ledger.php"><span>General Ledger</span></a></li>\r\n						<li><a href="sales_ledger.php"><span>Sales Revenue Ledger</span></a></li>\r\n<li><a href="inventory_ledger.php"><span>Stock Inventoty Ledger</span></a></li>\r\n\r\n<li><a href="sales_return_ledger.php"><span>Sales Returns Ledger</span></a></li>\r\n\r\n\r\n						<li><a href="purchases_ledger.php"><span>Purchases Ledger</span></a></li>\r\n\r\n<li><a href="purchase_returns_ledger.php"><span>Purchases Returns Ledger</span></a></li>\r\n						<li><a href="view_cash_ledger.php"><span>Cash Ledger</span></a></li>\r\n<li><a href="view_bank_ledger.php"><span>Bank  Ledger</span></a></li>\r\n						<li><a href="view_expenses_ledger.php"><span>All Expenses Ledger</span></a></li>\r\n\r\n<li><a href="custom_clearance_ledger.php"><span>Custom And Clearance Ledger</span></a></li>\r\n\r\n<li><a href="salaries_ledger.php"><span>Salaries and Commission Ledger</span></a></li>\r\n\r\n<li><a href="com_payables_ledger.php"><span>Salary and Commision Payable</span></a></li>\r\n						<li><a href="accounts_receivables_ledger.php"><span>Accounts Receivable Ledger</span></a></li>\r\n<li><a href="notes_receivables_ledger.php"><span>Notes Receivable Ledger</span></a></li>\r\n<li><a href="notes_payable_ledger.php"><span>Notes Payables Ledger</span></a></li>\r\n						<li><a href="accounts_payables_ledger.php"><span>Accounts Payables Ledger</span></a></li>\r\n						<li><a href="view_loan_ledger.php"><span>Loan Ledger</span></a></li>\r\n<li><a href="view_shares_ledger.php"><span>Shares Capital Ledger</span></a></li>\r\n<li><a href="view_additional_investments_ledger.php"><span>Additional Investments Ledger</span></a></li>\r\n						<li><a href="doubtful_debts_ledger.php"><span>Doubtful Debts Ledger</span></a></li>\r\n						<li><a href="bad_debts_ledger.php"><span>Bad Debts Ledger</span></a></li>\r\n						<li><a href="view_petty_cash_ledger.php"><span>Petty Cash Ledger</span></a></li>\r\n\r\n\r\n						<li><a href="fixed_asset_ledger.php"><span>Fixed Asset Ledger</span></a></li>\r\n                        </ul></div>', '', 0),
(15, 5, 'Technician Efficiency Reports', 1, '<li><a href="home.php?benefitded=benefitded">Technician Efficiency Reports</a></li>', 'Technician Efficiency Reports', 0),
(16, 5, 'Invoice Generation', 23, '<li><a href="#">Invoice Generation</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?generateinvoice=generateinvoice">SIPET Projects Invoice to Client</a></li>\r\n			<li><a href="home.php?subconinvoices=subconinvoices">Record Subcontractor''s Invoice</a></li>\r\n<li><a href="home.php?subconinvoicestoclient=subconinvoicestoclient"><span>Subcontractors Invoices To Client</span></a></li>\r\n			</ul></li>\r\n			\r\n			', '', 0),
(129, 8, 'Record Fixed Assets', 39, '<li><a href="add_fixed_asset.php"><span>Record Fixed Assets</span></a></li>', '', 0),
(130, 8, 'Record Depreciation', 40, '<li><a href="depreciation.php"><span>Record Depreciation</span></a></li>', '', 0),
(131, 9, 'Setup Financial Year', 1, '<li><a href="add_fyear.php"><span>Setup Financial Year</span></a></li>', '', 0),
(132, 9, 'Exchange Rate Variations', 43, '<li><a href="exchange_rate_variations.php"><span>Exchange Rate Variations</span></a></li>', '', 0),
(18, 6, 'Overall Productivity', 3, '<li><a href="home.php?postgraduate=postgraduate">Overall Productivity</a></li>', 'Overall Productivity', 0),
(123, 7, 'Cash Sales', 9, '<li><a href="begin_cash_sales.php"><span>Cash Sales</span></a></li>', '', 0),
(124, 7, 'Sales Commission', 33, '<li><a href="view_comm_payments.php"><span>Sales Commission</span></a></li>', '', 0),
(125, 8, 'Record General Expenses', 34, '<li><a href="view_expenses.php"><span>Record General Expenses</span></a></li>', '', 0),
(126, 8, 'Record General Income', 35, '<li><a href="view_income.php"><span>Record General Income</span></a></li>', '', 0),
(127, 8, 'Petty Cash Transactions', 36, '<li><a href="add_petty_cash_expense.php"><span>Petty Cash Transactions</span></a></li>', '', 0),
(128, 8, 'Record Loan Received', 37, '<li><a href="add_loan.php"><span>Record Loan Received</span></a></li>', '', 0),
(20, 7, 'Labour Utilization Report', 2, '<li><a href="home.php?viewdeduction=viewdeduction">Labour Utilization Report</a></li>', 'Labour Utilization Report', 0),
(122, 7, 'Bad Debts Transactions', 31, '<li><a href="bad_debts.php"><span>Bad Debts Transactions</span></a></li>', '', 0),
(121, 7, 'Sales Returns', 30, '<li><a href="view_sales_returns.php"><span>Sales Returns</span></a></li>', '', 0),
(25, 8, 'Vehicles Bookings', 35, '<li><a href="home.php?viewhrforms=viewhrforms"><span>Vehicles Bookings</span></a>					   </li>\r\n						\r\n						', '', 0),
(27, 8, 'Job Cards Created', 37, '<li><a href="home.php?areareportc=areareportc"><span>Job Cards Created</span></a></li>', 'Job Cards Created', 0),
(29, 8, 'Invoices Generated', 40, '<li><a href="home.php?view_biweekly=view_biweekly"><span>Invoices Generated</span></a></li>', '', 0),
(101, 3, 'Shares Capital', 3, '<li><a href="#"><span>Capital Account</span></a>\r\n						<div><ul>\r\n                        <li><a href="view_shares.php"><span>Shares Capital</span></a></li>\r\n						<li><a href="equity1.php"><span>Statement of Owners Equity</span></a></li>\r\n<li><a href="adjust_shares.php"><span>Adjust Share Holders Balance</span></a></li>\r\n\r\n<li><a href="exit_shareholder.php"><span>Exit Share Holder</span></a></li>\r\n						\r\n						\r\n                         </ul></div>', '', 0),
(102, 3, 'View Stock Availlability', 1, '<li><a href="all_stock.php"><span>View Stock Availlability</span></a></li>', '', 0),
(103, 3, 'Opening Balances', 3, ' <li><a href="#"><span>Opening Balances</span></a>\r\n				\r\n				<div><ul id="fly">\r\n				<!--<li><a href="add_inventory_opening_balance.php"><span>Accounting Balance</span></a></li>-->\r\n				<li><a href="add_client_opening_balance.php"><span>Customers Balance</span></a></li>\r\n\r\n\r\n            </ul></div>\r\n				\r\n				\r\n				</li>', '', 0),
(104, 3, 'Product Categories Management', 69, '<li><a href="view_mach_cat.php"><span>Product Categories Management</span></a></li>', '', 0),
(105, 3, 'General Settings', 8, '<li><a href="view_currency.php"><span>General Settings</span></a></li>', '', 0),
(106, 3, 'Company Settings', 9, '<li><a href="add_contacts.php"><span>Company Settings</span></a></li>', '', 0),
(107, 3, 'Stock in Warehouse', 15, '<li><a href="closing_stock.php"><span>Stock in Warehouse</span></a></li>', '', 0),
(108, 5, 'Price List', 40, '<li><a href="price_list.php"><span>Price List</span></a></li>', '', 0),
(109, 5, 'Purchases Returns', 24, '<li><a href="view_debit_notes.php"><span>Purchases Returns</span></a></li>', '', 0),
(110, 34, 'Payroll Reports', 24, '<li><a href="view_payslips.php"><span>Payroll Reports</span></a>	\r\n						\r\n						</li>', '', 0),
(111, 5, 'Purchases Transactions', 19, '<li><a href="receive_stock.php"><span>Purchases Transactions</span></a></li>', '', 0),
(112, 5, 'Stock Procurement', 1, '<li><a href=""><span>Stock Procurement</span></a>\r\n				<div><ul>\r\n                \r\n				\r\n				<li><a href="begin_order.php"><span>Create Purchase Order</span></a></li>\r\n				<li><a href="begin_rfq.php"><span>Request for Quotation</span></a></li>\r\n\r\n\r\n            </ul></div>', '', 0),
(113, 5, 'Products Management', 23, '<li><a href="view_prod.php"><span>Products Management</span></a></li>\r\n			\r\n			', '', 0),
(114, 6, 'Invoice Generation', 1, '<li><a href="begin_invoice.php"><span>Invoice Generation</span></a></li>', '', 0),
(115, 6, 'Generate Quotation', 8, '<li><a href="begin_quote.php"><span>Generate Quotation</span></a></li>', '', 0),
(116, 12, 'Manage Employees', 1, '<li><a href="view_employees.php"><span>Manage Employees</a></li>', '', 0),
(117, 6, 'Balance Sheets', 109, '<li><a href="view_balance_sheet.php"><span>Balance Sheet</span></a></li>', '', 0),
(118, 3, 'Chart Of Accounts', 10, '<li><a href="view_terminology.php">Chart Of Accounts</a></li>', '', 0),
(119, 6, 'Sales Transactions', 28, '<li><a href="pay_invoice.php"><span>Sales Transactions</span></a></li>', '', 0),
(120, 12, 'Payroll Master', 23, '<li><a href="#"><span>Payroll Master</span></a>\r\n						<div><ul>\r\n                       <!--<li><a href="view_banks.php"><span>Banks and Branches</span></a></li>-->\r\n						<li><a href="view_nhif.php"><span>NHIF Rates</span></a></li>\r\n						<li><a href="view_paye.php"><span>PAYE Tax Blocks</span></a></li>\r\n						<li><a href="add_deductions.php"><span>Benefits and Deductions</span></a></li>\r\n						<!--<li><a href="add_loan_type.php"><span>Loans and Savings</span></a></li>-->\r\n						\r\n						\r\n                         </ul></div>\r\n						\r\n						\r\n						\r\n						</li>', '', 0),
(34, 7, 'View Generated Quotations', 2, '<li><a href="home.php?viewsettlements=viewsettlements">View Generated Quotations</a></li>', 'View Generated Quotations', 0),
(35, 8, 'List Of Actulaized Estimates', 80, '<li><a href="home.php?assignsubprojectend=assignsubprojectend">List Of Actulaized Estimates</a></li>', 'List Of Actulaized Estimates', 0),
(169, 5, 'Request For Quotation', 1, '<li><a href="begin_rfq.php">Request For Quotation</a></li>', '', 0),
(170, 5, 'View Requests For Quotation', 2, '<li><a href="view_rfq.php">View Requests For Quotations</a></li>', '', 0),
(171, 5, 'Create Purchase Order', 3, '<li><a href="begin_order.php">Create Purchase Order</a></li>', '', 0),
(172, 5, 'View Purchase Orders', 4, '<li><a href="view_lpos.php">View Purchase Orders</a></li>', '', 0),
(173, 5, 'Cancel Purchase Order', 5, '<li><a href="confirmed_orders.php">Cancel Purchase Order</a></li>', '', 0),
(174, 5, 'View Canceled Purchase Order', 6, '<li><a href="view_cancelled_lpos.php">View Canceled Purchase Order</a></li>', '', 0),
(163, 3, 'Add New Product', 8, '<li><a href="add_stock.php">Add Product</a></li>', '', 0),
(164, 3, 'View All Products', 9, '<li><a href="view_prod.php">View All Products</a></li>', '', 0),
(165, 3, 'Add Bank Account', 19, '<li><a href="add_bank.php">Add Bank Account</a></li>', '', 0),
(166, 3, 'View Bank Accounts', 20, '<li><a href="view_banks.php">View Bank Accounts</a></li>', '', 0),
(167, 3, 'Add Pack Size', 9, '<li><a href="add_packsize.php">Add Pack Size</a></li>', '', 0),
(168, 3, 'View Pack Sizes', 10, '<li><a href="#">View Pack Sizes</a></li>', '', 0),
(39, 4, 'Sub Module User Group Relation', 13, '<li><a href="home.php?usergroupsm=usergroupsm">Sub Module User Group Relation</a></li>', '', 0),
(162, 3, 'View Products Categories', 7, '<li><a href="view_mach_cat.php">View Products Categories</a></li>', '', 0),
(41, 6, 'Approve Submited Invoice', 1, '<li><a href="home.php?submit_biweekly2=submit_biweekly2">Approve Submited Invoice</a></li>', '', 0),
(161, 3, 'Add Product Product Category', 6, '<li><a href="add_machine_cat.php">Add Product Product Category</a></li>', '', 0),
(43, 6, 'Labour Task Management', 58, '<li><a href="home.php?settlementreport=settlementreport">Labour Task Management</a></li>', 'Labour Task Management', 0),
(44, 6, 'Labour Cost Matrix', 67, '<li><a href="home.php?viewreneworkpermit2=viewreneworkpermit2">Labour Cost Matrix</a></li>', '', 0),
(46, 6, 'View Approved Invoices', 2, '<li><a href="home.php?view_biweekly=view_biweekly">View Approved Invoices</a></li>', '', 0),
(160, 4, 'Update Company Details', 5, '<li><a href="view_company_contacts.php">Update Company Details</a></li>', '', 0),
(159, 3, 'Set Up Company Details', 3, '<li><a href="add_contacts.php">Set Up Company Details</a></li>', '', 0),
(49, 6, 'View Stock Inventory', 59, '<li><a href="home.php?assignsubproject=assignsubproject">View Stock Inventory</a></li>', '', 0),
(158, 3, 'Update Currencies', 2, '<li><a href="view_currency.php">Update Currencies</a></li>', '', 0),
(156, 4, 'View All Users', 17, '<li><a href="view_user.php">View All Users</a></li>', '', 0),
(157, 3, 'Add Currency', 1, '<li><a href="add_currency.php">Add Currency</a></li>', '', 0),
(155, 4, 'Add User', 16, '<li><a href="add_user.php">Add User</a></li>', '', 0),
(154, 4, 'Dettach Submodule From Usergroup', 15, '<li><a href="view_usergroupsm.php">Dettach Submodule From Usergroup</a></li>', '', 0),
(54, 5, 'Jobcard Clock In And Clock Out', 104, '<li><a href="home.php?assingomstaff=assingomstaff">Technician Clock In And Clock Out</a></li>', '', 0),
(153, 4, 'Attach Submodules To Usergroup', 14, '<li><a href="usergroupsm.php">Attach Submodules To Usergroup</a></li>', '', 0),
(152, 4, 'Dettach Submodules From Modules', 13, '<li><a href="unassign_module_submodule.php">Dettach Submodules From Modules</a></li>', '', 0),
(151, 4, 'Attach Submodules To Modules', 12, '<li><a href="assign_module_submodule.php">Attach Submodules To Modules</a></li>', '', 0),
(150, 4, 'Dettach Modules from Usergroup', 11, '<li><a href="unassign_module_usergroup.php">Dettach Modules from Usergroup</a></li>', '', 0),
(60, 3, 'Customer Statement', 6, '<li><a href="home.php?viewproject=viewproject">Customer Statement</a></li>', '', 0),
(61, 6, 'Assign Job Card To Technician', 3, '<li><a href="home.php?addcompetency=addcompetency">Assign Job Card To Technician</a></li>', '', 0),
(62, 6, 'Generate Quotation', 1, '<li><a href="home.php?viewcountries=viewcountries">Generate Quotation</a></li>', '', 0),
(63, 6, 'Convert Quotation To Job Card', 2, '<li><a href="home.php?newsponsor=newsponsor">Convert Quotation To Job Card</a></li>', 'Convert Quotation To Job Card', 0),
(149, 4, 'Attach Modules To User Groups', 10, '<li><a href="assign_module_usergroup.php">Attach Modules To User Groups</a></li>', '', 0),
(65, 6, 'Book A Vehicle', 1, '<li><a href="home.php?viewcountries=viewcountries">Book A Vehicle</a></li>', '', 0),
(148, 4, 'View All Sub Modules', 8, '<li><a href="view_sub_modules.php">View All Sub Modules</a></li>', '', 0),
(147, 4, 'Add Sub-Module', 7, '<li><a href="add_sub_module.php">Add Sub-Module</a></li>', '', 0),
(145, 4, 'Add Module', 4, '<li><a href="add_module.php">Add Module</a></li>', '', 0),
(146, 4, 'View All Modules', 6, '<li><a href="view_modules.php">View All Modules</a></li>', '', 0),
(144, 4, 'View All User Groups', 2, '<li><a href="view_user_groups.php">View All User Groups</a></li>', '', 0),
(70, 17, 'Close Job Card', 5, '<li><a href="home.php?settlementreportc=settlementreportc">Close Job Card</a></li>', 'Close Job Card', 0),
(71, 17, 'Create a Job Card', 1, '<li><a href="home.php?viewcountries=viewcountries">Create a Job Card</a></li>', 'Create a Job Card', 0),
(72, 17, 'View Job Cards', 2, '<li><a href="home.php?areareportc=areareportc">View Job Cards</a></li>', 'View Job Cards', 0),
(73, 3, 'Items Managements', 9, '<li><a href="home.php?viewsetuptemplate=viewsetuptemplate">Items Managements</a></li>', '', 0),
(74, 3, 'Create Vihicle Models', 1, '<li><a href="home.php?newsponsor=newsponsor">Create Vehicle Models</a></li>', 'Create Vihicle Models', 0),
(75, 3, 'Company Details / Settings', 1, '<li><a href="home.php?viewcompetency=viewcompetency">Company Details / Settings</a></li>', '', 0),
(143, 4, 'Add User Group', 1, '<li><a href="add_user_groups.php">Add User Group</a></li>', '', 0),
(142, 3, 'Banks Accounts Management', 70, '<li><a href="add_bank.php">Banks Accounts Management</a></li>', '', 0),
(141, 6, 'Record Clients Payments', 6, '<li><a href="receive_client_payment.php">Record Clients Payments</a></li>', '', 0),
(140, 7, 'Custom Clearance Tax & Freight', 100, '<li><a href="add_transport_expenses.php">Custom Clearance Tax & Freight</a></li>', '', 0),
(139, 3, 'View Invoices Generated Accounts', 2, '<li><a href="view_invoices.php">View Invoices Generated Accounts</a></li>', '', 0),
(138, 15, 'Our Shipping Agents', 34, '<li><a href="view_ship.php"><span>Our Shipping Agents</span></a></li>', '', 0),
(137, 13, 'Our Clients', 21, '<li><a href="view_customers.php"><span>Our Clients</span></a></li>', '', 0),
(136, 12, 'Our Suppliers', 45, ' <li><a href="view_supplier.php"><span>Our Suppliers</span></a></li>', '', 0),
(135, 7, 'Debtors and Creditors', 50, '<li><a href="#"><span>Debtors and Creditors</span></a>\r\n						<div><ul>\r\n\r\n                        <li><a href="view_sales_returns.php"><span>Credit Notes</span></a></li>\r\n						<li><a href="view_debit_notes.php"><span>Debit Notes</span></a></li>\r\n						\r\n						\r\n						\r\n                         </ul></div>\r\n                        </li>', '', 0),
(134, 9, 'Profit and Loss Account', 37, '<li><a href="view_tpla.php"><span>Profit and Loss Account</span></a></li>', '', 0),
(175, 5, 'View Suppliers Receipts', 7, '<li><a href="view_supplier_receipts.php">View Suppliers Receipts</a></li>', '', 0),
(176, 5, 'View Canceled RFQ', 3, '<li><a href="view_canceled_rfq.php">View Canceled RFQ</a></li>', '', 0),
(177, 3, 'Items Availlability In The Store', 11, '<li><a href="closing_stock.php">Items Availlability In The Store</a></li>', '', 0),
(178, 5, 'View Debit Notes', 12, '<li><a href="view_debit_notes.php">View Debit Notes</a></li>', '', 0),
(179, 5, 'Products Expiry Condition', 19, '<li><a href="view_prod_condition.php">Products Expiry Condition</a></li>', '', 0),
(180, 5, 'View Payments To Suppliers', 9, '<li><a href="view_stock_payments.php">View Payments To Suppliers</a></li>', '', 0),
(181, 3, 'Receive Item To The Store', 7, '<li><a href="receive_stock.php">Receive Item To The Store</a></li>', '', 0),
(182, 14, 'Record Cheque Deposit', 1, '<li><a href="cheque_deposit.php">Record Cheque Deposit</a></li>', '', 0),
(183, 14, 'View All Cheque Deposits', 2, '<li><a href="view_cheque_deposits.php">View All Cheque Deposits</a></li>', '', 0),
(184, 14, 'Record Cash Deposit', 4, '<li><a href="cash_deposit.php">Record Cash Deposit</a></li>', '', 0),
(185, 14, 'View All Cash Deposits', 6, '<li><a href="view_cash_deposits.php">View All Cash Deposits</a></li>', '', 0),
(186, 14, 'Bank Reconcilliations', 8, '<li><a href="#">Bank Reconcilliations</a></li>', '', 0),
(187, 14, 'Record Cheque Withdrawal', 2, '<li><a href="cheque_withdrawal.php">Record Cheque Withdrawal</a></li>', '', 0),
(188, 14, 'Record Cash Withdrawals', 6, '<li><a href="cash_withdrawal.php">Record Cash Withdrawals</a></li>', '', 0),
(189, 14, 'View All Cheque Withdrawals', 2, '<li><a href="view_cheque_withdrawals.php">View All Cheque Withdrawals</a></li>', '', 0),
(190, 14, 'View All Cash Withdrawals', 6, '<li><a href="view_cash_withdrawal.php">View All Cash Withdrawals</a></li>', '', 0),
(191, 15, 'View System Bank Balance', 1, '<li><a href="view_bank_balance1.php">View System Bank Balance</a></li>', '', 0),
(192, 15, 'Reconcile System Balance', 2, '<li><a href="reconcile_system_balance1.php">Reconcile System Balance</a></li>', '', 0),
(193, 15, 'View Reconciled System Balance', 3, '<li><a href="view_reconciled_system_balance1.php">View Reconciled System Balance</a></li>', '', 0),
(194, 15, 'Reconcile Bank Balance', 4, '<li><a href="reconcile_bank_balance1.php">Reconcile Bank Balance</a></li>', '', 0),
(195, 15, 'View Reconciled Bank Balance', 5, '<li><a href="view_reconciled_bank_balance1.php">View Reconciled Bank Balance</a></li>', '', 0),
(196, 9, 'Record Staff Salary Payment', 200, '<li><a href="record_salary_payment.php">Record Staff Salary Payment</a></li>', '', 0),
(197, 7, 'Record Loan Given Out', 38, '<li><a href="add_loan_given_out.php">Record Loan Given Out</a></li>', '', 0),
(198, 6, 'Receive Payments From Clients', 100, '<li><a href="pre_bepaid.php">Receive Payments From Clients</a></li>', '', 0),
(199, 7, 'Record Prepaid Expenses', 101, '<li><a href="add_prepaid_expenses.php">Recored Prepaid Expenses</a></li>', '', 0),
(200, 6, 'Pay Supplier (Order Payment)', 7, '<li><a href="pay_supplier.php">Pay Supplier (Order Payment)</a></li>', '', 0),
(201, 3, 'New Receive Stock To Warehouse', 900, '<li><a href="new_receive_stock.php">New Receive Stock To Warehouse</a></li>', '', 0),
(202, 6, 'View All Generated Invoices', 2, '<li><a href="view_invoices.php">View All Generated Invoices</a></li>', '', 0),
(203, 6, 'View Canceled Invoices', 3, '<li><a href="view_cancelled_invoices.php">View Canceled Invoices</a></li>', '', 0),
(204, 6, 'View Recived Invoice Payments', 7, '<li><a href="view_invoice_payments.php">View Received Invoice Payments</a></li>', '', 0),
(205, 6, 'View Generated Quotations', 9, '<li><a href="view_quotations.php">View Generated Quotations</a></li>', '', 0),
(206, 6, 'Assign Commision Rate To Sales Rep', 9, '<li><a href="assign_commision.php">Assign Commission Rate</a></li>', '', 0),
(207, 6, 'View Commission Rates', 10, '<li><a href="view_ass_commisions.php">View Commission Rates</a></li>', '', 0),
(208, 6, 'View Commissions Report', 11, '<li><a href="view_comm_payments.php">View Commissions Report</a></li>', '', 0),
(209, 6, 'Pay Staff Commission', 10, '<li><a href="pay_commission.php">Pay Staff Commission</a></li>', '', 0),
(210, 9, 'View Staff Statement', 22, '<li><a href="view_staff_statement.php">View Staff Statement</a></li>', '', 0),
(211, 9, 'Record Staff Advance', 5, '<li><a href="add_staff_advance.php">Record Staff Advance</a></li>', '', 0),
(212, 9, 'Process Payroll', 6, '<li><a href="generate_payroll.php">Process Payroll</a></li>', '', 0),
(213, 9, 'Terminate Staff', 25, '<li><a href="terminate_staff.php">Terminate Staff</a></li>', '', 0),
(214, 9, 'View Cash Sales Generated', 10, '<li><a href="view_cash_sales.php">View Cash Sales Generated</a></li>', '', 0),
(215, 6, 'Record Sales Returns', 12, '<li><a href="view_inv_sales_returns.php">Record Sales Returns</a></li>', '', 0),
(216, 6, 'View Sales Return(Credit Notes)', 13, '<li><a href="view_sales_returns.php">View Sales Return(Credit Notes)</a></li>', '', 0),
(217, 17, 'View Submited Invoice', 5, '<li><a href="home.php?processnatflight=processnatflight">View Submited Invoice</a></li>', '', 0),
(218, 16, 'Approve Purchase Order', 3, '<li><a href="approve_lpo.php">Approve Purchase Order</a></li>', '', 0),
(219, 16, 'View Approved LPOs', 4, '<li><a href="view_approved_lpo.php">View Approved LPOs</a></li>', '', 0),
(220, 17, 'Create Requisition Form', 3, '<li><a href="home.php?familystatus=familystatus">Create Requisition Form</a></li>', '', 0),
(221, 11, 'View Pending Bookings', 3, '<li><a href="home.php?pending_booking=pending_booking">View Pending Bookings</a></li>', 'View Pending Bookings', 0),
(222, 17, 'View Requisitions Created', 4, '<li><a href="home.php?viewfamilystatus=viewfamilystatus">View Requisitions Created</a></li>', '', 0),
(223, 16, 'Release Items From Store', 1, '<li><a href="home.php?adminpayrollexpreport=adminpayrollexpreport">Release Items From Store</a></li>', '', 0),
(224, 16, 'View Released Items From Store', 1, '<li><a href="view_all_released_items.php">View Released Items From Store</a></li>', '', 0),
(225, 28, 'Bank Ledger', 10, '<li><a href="view_bank_ledger.php">Cash Ledger</a></li>', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cont_person` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `postal` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `town` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `cont_person`, `country`, `postal`, `town`, `phone`, `email`, `date_reg`) VALUES
(1, 'GGI ', 'Samson', 'Germany', '-', 'Germany', '98654', 'sma@yahoo.com', '2017-08-17 12:36:49'),
(2, 'Nairobi Suppliers Limited', 'James', 'Kenya', '-', '-', '-', '-', '2017-08-17 12:42:17'),
(3, 'Miguna Miguna Suppliers Limited', 'Miguna', 'Algeria', 'Laba', 'Kartoum', '9877', 'email@email.com', '2017-08-20 01:27:05'),
(4, 'Centtech Technologies', 'Osero', 'Kenya', 'City Center', 'NAIROBI , KENYA', '9000', 'info@globalbro.com', '2017-08-20 01:30:50'),
(5, 'Karen Supplies Limited', 'Persin B', 'Kenya', '', '', '', '', '2017-08-22 05:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE IF NOT EXISTS `supplier_payments` (
  `supplier_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`supplier_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_receipt`
--

CREATE TABLE IF NOT EXISTS `supplier_receipt` (
  `supplier_receipt_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `amnt_rec` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`supplier_receipt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_refund`
--

CREATE TABLE IF NOT EXISTS `supplier_refund` (
  `supplier_refund_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`supplier_refund_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE IF NOT EXISTS `supplier_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `transaction` longtext NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(10) NOT NULL,
  `credit` varchar(10) NOT NULL,
  `date_recorded` date NOT NULL,
  `shop_id` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`transaction_id`, `supplier_id`, `order_code`, `transaction`, `currency`, `curr_rate`, `amount`, `debit`, `credit`, `date_recorded`, `shop_id`, `status1`, `status2`) VALUES
(1, 5, 'supop5', 'Supplier Opening Balance for supplier Karen Supplies Limited', 8, '130', '-4500', '4500', '', '2017-08-22', 14, 0, 0),
(2, 2, 'ord17', 'Order <a href="begin_order.php?order_code=17"> LPO No:00017</a> generated', 7, '1', '7400', '7400', '', '2017-08-22', 0, 0, 0),
(3, 4, 'ord18', 'Order <a href="begin_order.php?order_code=18"> LPO No:00018</a> generated', 8, '117', '3900', '3900', '', '2017-08-22', 0, 0, 0),
(4, 2, 'ord19', 'Order <a href="begin_order.php?order_code=19"> LPO No:00019</a> generated', 7, '1', '20000', '20000', '', '2017-08-22', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(100) NOT NULL,
  `task_desc` longtext NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `taxblocs`
--

CREATE TABLE IF NOT EXISTS `taxblocs` (
  `tax_bloc_id` int(20) NOT NULL AUTO_INCREMENT,
  `tax_max` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `tax_min` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `tax_rate` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`tax_bloc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_cash_sales`
--

CREATE TABLE IF NOT EXISTS `temp_cash_sales` (
  `temp_cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `sales_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount_perc` int(11) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`temp_cash_sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_purchase_order`
--

CREATE TABLE IF NOT EXISTS `temp_purchase_order` (
  `temp_purchase_order_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_agent_id` int(11) NOT NULL,
  `payment_term_id` varchar(100) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `order_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `ttl` varchar(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`temp_purchase_order_id`),
  KEY `supplier_id` (`supplier_id`,`product_id`),
  KEY `shipping_agent_id` (`shipping_agent_id`,`payment_term_id`,`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_quote`
--

CREATE TABLE IF NOT EXISTS `temp_quote` (
  `temp_quote_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `payment_terms` varchar(100) NOT NULL,
  `delivery_terms` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `quote_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount_perc` int(11) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`temp_quote_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_rfq`
--

CREATE TABLE IF NOT EXISTS `temp_rfq` (
  `temp_rfq_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `rfq_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`temp_rfq_id`),
  KEY `supplier_id` (`supplier_id`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales`
--

CREATE TABLE IF NOT EXISTS `temp_sales` (
  `temp_sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `currency_code` varchar(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `sales_code` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount_perc` int(11) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`temp_sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales_returns`
--

CREATE TABLE IF NOT EXISTS `temp_sales_returns` (
  `temp_sales_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `salesreturn_code` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `sales_rep` int(10) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `sales_return_quantity` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`temp_sales_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_stock_returns`
--

CREATE TABLE IF NOT EXISTS `temp_stock_returns` (
  `temp_stock_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_returns_id` int(10) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `vendor_price` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `stockreturn_code` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `stock_return_quantity` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`temp_stock_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_items`
--

CREATE TABLE IF NOT EXISTS `transfer_items` (
  `transfer_item_id` int(10) NOT NULL AUTO_INCREMENT,
  `transfer_item_code_id` int(11) NOT NULL,
  `item_id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `vendor_prc` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`transfer_item_id`),
  KEY `supplier_id` (`item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transfer_items`
--

INSERT INTO `transfer_items` (`transfer_item_id`, `transfer_item_code_id`, `item_id`, `description`, `quantity`, `vendor_prc`, `date_generated`, `status`) VALUES
(1, 3, 11, '', '3', '', '2015-09-03 00:41:22', 0),
(2, 4, 9, '', '5', '', '2015-09-03 00:43:27', 0),
(3, 5, 8, '', '5', '4500', '2015-09-03 00:44:20', 0),
(4, 6, 11, '', '7', '4850', '2015-09-03 01:31:38', 0),
(5, 7, 18, '', '3', '3550', '2015-09-04 17:22:14', 0),
(6, 8, 18, '', '5', '3550', '2015-09-04 17:32:58', 0),
(7, 9, 1, '', '', '230', '2017-07-15 03:19:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_items_code`
--

CREATE TABLE IF NOT EXISTS `transfer_items_code` (
  `transfer_item_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_from` int(11) NOT NULL,
  `transfer_to` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transfer_no` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` date NOT NULL,
  `status` int(11) NOT NULL,
  `status2` int(11) NOT NULL,
  PRIMARY KEY (`transfer_item_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `transfer_items_code`
--

INSERT INTO `transfer_items_code` (`transfer_item_code_id`, `transfer_from`, `transfer_to`, `user_id`, `transfer_no`, `comments`, `date_generated`, `status`, `status2`) VALUES
(1, 2, 1, 19, '', '', '0000-00-00', 2, 0),
(2, 2, 1, 19, '', '', '0000-00-00', 2, 0),
(3, 2, 1, 19, 'BD0003/2015', '', '0000-00-00', 2, 0),
(4, 2, 15, 19, 'BD0004/2015', '', '2015-09-03', 2, 0),
(5, 1, 15, 19, 'BD0005/2015', '', '2015-09-03', 2, 0),
(6, 14, 2, 19, 'TR0006/2015', '', '2015-09-03', 2, 0),
(7, 1, 14, 19, 'TR0007/2015', '', '2015-09-04', 2, 0),
(8, 1, 14, 19, 'TR0008/2015', '', '2015-09-04', 2, 0),
(9, 14, 1, 19, 'TR0009/2017', '', '2017-07-15', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transport_charges`
--

CREATE TABLE IF NOT EXISTS `transport_charges` (
  `transport_charges_id` int(10) NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(100) NOT NULL,
  `shipper_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `decription` longtext NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `date_paid` date NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`transport_charges_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `unit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `unit_desc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_group_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `islogged_in` int(1) NOT NULL DEFAULT '1',
  `allow_add` int(11) NOT NULL,
  `allow_view` int(11) NOT NULL,
  `allow_edit` int(11) NOT NULL,
  `allow_delete` int(11) NOT NULL,
  `suspend` int(11) NOT NULL,
  `incharge` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `phone`, `email`, `user_group_id`, `username`, `password`, `date_created`, `islogged_in`, `allow_add`, `allow_view`, `allow_edit`, `allow_delete`, `suspend`, `incharge`) VALUES
(19, 'Griffo uuu KImani', '0777777777', 'updateosero@gmail.com', 15, 'osero', 'd97d3a75495b93f3c8ec2e1aea44b31a', '2014-01-24 08:02:33', 0, 1, 1, 1, 1, 0, 14),
(83, 'Hussein Abdille Mohamed<br>', '', '', 35, 'hussein', '86a5f0f949bb55dab4626fa9716b16af', '2015-08-24 13:42:22', 0, 1, 1, 1, 1, 0, 14),
(84, 'Victor Omondi', '', '', 35, 'victor', 'ffc150a160d37e92012c196b6af4160d', '2017-07-13 17:50:15', 0, 1, 1, 1, 1, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `description`) VALUES
(1, 'Administration', ''),
(15, 'Super Administrator', 'Main System Administrators'),
(34, 'Shop Operator', ''),
(35, 'Sales Representatives', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_garage`
--

CREATE TABLE IF NOT EXISTS `user_group_garage` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_group_garage`
--

INSERT INTO `user_group_garage` (`user_group_id`, `user_group_name`, `description`) VALUES
(15, 'Super Administrator', 'Super administrator'),
(21, 'Sales Repersentative ', ''),
(22, 'Finance & Administration', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `user_group_module`
--

INSERT INTO `user_group_module` (`user_group_module_id`, `user_group_id`, `module_id`, `status`) VALUES
(17, 15, 1, 0),
(18, 15, 3, 0),
(19, 15, 4, 0),
(25, 15, 10, 0),
(243, 15, 13, 0),
(220, 1, 14, 0),
(110, 15, 23, 0),
(219, 1, 13, 0),
(96, 15, 16, 0),
(116, 15, 19, 0),
(115, 15, 9, 0),
(114, 15, 20, 0),
(113, 15, 21, 0),
(118, 15, 22, 0),
(227, 35, 1, 0),
(239, 35, 33, 0),
(238, 35, 32, 0),
(237, 35, 28, 0),
(236, 35, 17, 0),
(235, 35, 16, 0),
(234, 35, 14, 0),
(233, 35, 13, 0),
(231, 35, 7, 0),
(230, 35, 6, 0),
(229, 35, 25, 0),
(228, 35, 3, 0),
(222, 1, 17, 0),
(221, 1, 16, 0),
(217, 1, 7, 0),
(216, 1, 6, 0),
(232, 35, 8, 0),
(214, 1, 3, 0),
(213, 1, 1, 0),
(240, 1, 25, 0),
(209, 34, 1, 0),
(242, 34, 14, 0),
(244, 34, 16, 0),
(248, 15, 17, 0),
(246, 15, 35, 0),
(247, 15, 36, 0),
(249, 15, 8, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=767 ;

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
(14, 15, 2, 0),
(642, 15, 1, 0),
(16, 15, 3, 0),
(17, 15, 4, 0),
(18, 15, 5, 0),
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
(86, 15, 40, 0),
(96, 15, 48, 0),
(97, 15, 49, 0),
(99, 15, 46, 0),
(100, 15, 50, 0),
(101, 15, 47, 0),
(102, 15, 51, 0),
(103, 15, 52, 0),
(644, 15, 232, 0),
(105, 15, 23, 0),
(106, 15, 57, 0),
(107, 15, 56, 0),
(108, 15, 55, 0),
(109, 15, 53, 0),
(110, 15, 59, 0),
(111, 15, 58, 0),
(112, 15, 54, 0),
(114, 15, 44, 0),
(203, 15, 60, 0),
(205, 15, 61, 0),
(207, 15, 62, 0),
(209, 15, 64, 0),
(210, 15, 65, 0),
(212, 15, 66, 0),
(217, 15, 68, 0),
(218, 15, 71, 0),
(219, 15, 72, 0),
(220, 15, 69, 0),
(221, 15, 73, 0),
(222, 15, 11, 0),
(233, 15, 34, 0),
(234, 15, 74, 0),
(235, 15, 28, 0),
(250, 15, 75, 0),
(251, 15, 77, 0),
(252, 15, 76, 0),
(253, 15, 78, 0),
(254, 15, 79, 0),
(255, 15, 80, 0),
(256, 15, 81, 0),
(257, 15, 82, 0),
(258, 15, 83, 0),
(259, 15, 84, 0),
(260, 15, 85, 0),
(261, 15, 86, 0),
(262, 15, 87, 0),
(263, 15, 88, 0),
(264, 15, 89, 0),
(265, 15, 90, 0),
(266, 15, 92, 0),
(267, 15, 93, 0),
(268, 15, 94, 0),
(269, 15, 95, 0),
(270, 15, 96, 0),
(271, 15, 97, 0),
(272, 15, 37, 0),
(273, 15, 98, 0),
(274, 15, 99, 0),
(275, 15, 100, 0),
(276, 15, 70, 0),
(277, 15, 63, 0),
(279, 15, 43, 0),
(280, 15, 157, 0),
(281, 15, 165, 0),
(282, 15, 169, 0),
(283, 15, 173, 0),
(284, 15, 174, 0),
(285, 15, 200, 0),
(286, 15, 180, 0),
(287, 15, 177, 0),
(288, 15, 171, 0),
(289, 15, 203, 0),
(290, 15, 141, 0),
(291, 15, 204, 0),
(641, 15, 234, 0),
(293, 15, 214, 0),
(294, 15, 215, 0),
(295, 15, 122, 0),
(296, 15, 108, 0),
(297, 15, 198, 0),
(298, 15, 182, 0),
(299, 15, 187, 0),
(300, 15, 183, 0),
(301, 15, 189, 0),
(302, 15, 184, 0),
(303, 15, 188, 0),
(304, 15, 185, 0),
(305, 15, 190, 0),
(306, 15, 191, 0),
(307, 15, 192, 0),
(308, 15, 194, 0),
(309, 15, 195, 0),
(310, 15, 193, 0),
(311, 15, 125, 0),
(312, 15, 126, 0),
(313, 15, 127, 0),
(314, 15, 128, 0),
(315, 15, 197, 0),
(316, 15, 129, 0),
(317, 15, 140, 0),
(318, 15, 199, 0),
(319, 15, 103, 0),
(320, 15, 133, 0),
(321, 15, 134, 0),
(322, 15, 117, 0),
(323, 15, 101, 0),
(324, 15, 116, 0),
(325, 15, 211, 0),
(326, 15, 212, 0),
(328, 15, 110, 0),
(329, 15, 213, 0),
(330, 15, 138, 0),
(331, 15, 136, 0),
(760, 15, 242, 0),
(333, 15, 181, 0),
(334, 15, 172, 0),
(335, 15, 218, 0),
(336, 15, 219, 0),
(337, 15, 220, 0),
(338, 15, 221, 0),
(339, 15, 222, 0),
(340, 15, 223, 0),
(341, 15, 224, 0),
(564, 15, 132, 0),
(566, 15, 226, 0),
(567, 15, 227, 0),
(569, 15, 228, 0),
(646, 15, 230, 0),
(643, 15, 41, 0),
(572, 15, 231, 0),
(584, 15, 233, 0),
(645, 15, 229, 0),
(588, 34, 10, 0),
(589, 34, 75, 0),
(590, 34, 3, 0),
(591, 34, 5, 0),
(592, 34, 73, 0),
(593, 34, 165, 0),
(594, 34, 136, 0),
(596, 34, 1, 0),
(597, 34, 221, 0),
(598, 34, 62, 0),
(599, 34, 34, 0),
(600, 34, 63, 0),
(601, 34, 71, 0),
(602, 34, 72, 0),
(603, 34, 70, 0),
(747, 15, 236, 0),
(605, 34, 46, 0),
(606, 34, 233, 0),
(607, 34, 203, 0),
(608, 34, 141, 0),
(609, 34, 204, 0),
(610, 34, 229, 0),
(611, 34, 230, 0),
(612, 34, 214, 0),
(613, 34, 108, 0),
(614, 34, 171, 0),
(615, 34, 218, 0),
(616, 34, 172, 0),
(617, 34, 219, 0),
(618, 34, 173, 0),
(619, 34, 174, 0),
(620, 34, 200, 0),
(621, 34, 181, 0),
(622, 34, 180, 0),
(623, 34, 177, 0),
(624, 34, 182, 0),
(625, 34, 187, 0),
(626, 34, 183, 0),
(627, 34, 189, 0),
(628, 34, 184, 0),
(629, 34, 188, 0),
(630, 34, 185, 0),
(631, 34, 190, 0),
(632, 34, 125, 0),
(633, 34, 126, 0),
(634, 34, 127, 0),
(635, 34, 128, 0),
(636, 34, 129, 0),
(637, 34, 140, 0),
(638, 34, 199, 0),
(647, 15, 114, 0),
(648, 15, 235, 0),
(649, 1, 3, 0),
(650, 1, 5, 0),
(651, 1, 73, 0),
(652, 1, 136, 0),
(653, 1, 43, 0),
(654, 1, 62, 0),
(655, 1, 34, 0),
(656, 1, 234, 0),
(657, 1, 46, 0),
(658, 1, 233, 0),
(659, 1, 219, 0),
(660, 1, 230, 0),
(661, 1, 71, 0),
(662, 1, 72, 0),
(663, 1, 70, 0),
(664, 1, 217, 0),
(665, 1, 203, 0),
(666, 1, 141, 0),
(667, 1, 204, 0),
(668, 1, 214, 0),
(669, 1, 215, 0),
(670, 1, 65, 0),
(671, 1, 171, 0),
(672, 1, 172, 0),
(673, 1, 173, 0),
(674, 1, 174, 0),
(675, 1, 200, 0),
(676, 1, 181, 0),
(677, 1, 180, 0),
(678, 1, 177, 0),
(679, 1, 224, 0),
(680, 1, 4, 0),
(681, 1, 125, 0),
(682, 1, 127, 0),
(683, 1, 199, 0),
(684, 35, 75, 0),
(685, 35, 157, 0),
(686, 35, 2, 0),
(687, 35, 3, 0),
(688, 35, 5, 0),
(689, 35, 73, 0),
(690, 35, 165, 0),
(691, 35, 138, 0),
(692, 35, 136, 0),
(693, 35, 43, 0),
(694, 35, 62, 0),
(695, 35, 34, 0),
(696, 35, 41, 0),
(697, 35, 234, 0),
(698, 35, 46, 0),
(699, 35, 233, 0),
(700, 35, 218, 0),
(701, 35, 219, 0),
(702, 35, 229, 0),
(703, 35, 230, 0),
(704, 35, 1, 0),
(705, 35, 72, 0),
(706, 35, 217, 0),
(707, 35, 203, 0),
(708, 35, 141, 0),
(709, 35, 204, 0),
(710, 35, 214, 0),
(711, 35, 215, 0),
(712, 35, 65, 0),
(713, 35, 171, 0),
(714, 35, 172, 0),
(715, 35, 173, 0),
(716, 35, 174, 0),
(717, 35, 200, 0),
(718, 35, 181, 0),
(719, 35, 180, 0),
(720, 35, 177, 0),
(721, 35, 224, 0),
(722, 35, 4, 0),
(723, 35, 114, 0),
(724, 35, 223, 0),
(725, 35, 182, 0),
(726, 35, 187, 0),
(727, 35, 183, 0),
(728, 35, 189, 0),
(729, 35, 184, 0),
(730, 35, 188, 0),
(731, 35, 185, 0),
(732, 35, 190, 0),
(733, 35, 191, 0),
(734, 35, 192, 0),
(735, 35, 133, 0),
(736, 35, 103, 0),
(737, 35, 101, 0),
(738, 35, 225, 0),
(739, 35, 134, 0),
(740, 35, 117, 0),
(741, 35, 235, 0),
(742, 35, 125, 0),
(743, 35, 127, 0),
(744, 35, 128, 0),
(745, 35, 129, 0),
(746, 35, 199, 0),
(748, 1, 236, 0),
(749, 15, 237, 0),
(750, 1, 237, 0),
(751, 15, 238, 0),
(752, 15, 239, 0),
(753, 1, 239, 0),
(761, 15, 243, 0),
(755, 34, 123, 0),
(756, 34, 217, 0),
(757, 34, 41, 0),
(758, 15, 240, 0),
(759, 15, 241, 0),
(762, 15, 244, 0),
(763, 15, 245, 0),
(764, 15, 246, 0),
(765, 15, 247, 0),
(766, 15, 248, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_shop`
--

CREATE TABLE IF NOT EXISTS `user_shop` (
  `user_shop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` int(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`user_shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE IF NOT EXISTS `vat` (
  `vat_id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_percentage` varchar(100) NOT NULL,
  PRIMARY KEY (`vat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vat_ledger`
--

CREATE TABLE IF NOT EXISTS `vat_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn_dividends`
--

CREATE TABLE IF NOT EXISTS `withdrawn_dividends` (
  `withdrawn_dividend_id` int(10) NOT NULL AUTO_INCREMENT,
  `shares_id` int(10) NOT NULL,
  `dividend_id` int(10) NOT NULL,
  `financial_year_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dividend` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`withdrawn_dividend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `write_cheque_code`
--

CREATE TABLE IF NOT EXISTS `write_cheque_code` (
  `stock_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(11) NOT NULL,
  `delivery_note_no` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status1` int(11) NOT NULL,
  `status2` int(10) NOT NULL,
  PRIMARY KEY (`stock_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `write_cheque_code`
--

INSERT INTO `write_cheque_code` (`stock_code_id`, `order_code_id`, `delivery_note_no`, `currency`, `curr_rate`, `delivery_date`, `shop_id`, `user_id`, `status1`, `status2`) VALUES
(1, 1, 'TRD0001/2015', 7, '1', '2015-09-04', 14, 19, 0, 0),
(2, 1, 'TRD0002/2015', 7, '1', '2015-09-04', 14, 19, 0, 0),
(3, 2, 'TRD0003/2015', 7, '1', '2015-09-04', 14, 19, 0, 0),
(4, 2, 'TRD0004/2015', 7, '1', '2015-09-04', 14, 19, 0, 0),
(5, 3, 'TRD0005/2015', 7, '1', '2015-09-04', 14, 19, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
