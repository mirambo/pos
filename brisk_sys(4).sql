-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 05:16 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brisk_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting_terminologies`
--

CREATE TABLE IF NOT EXISTS `accounting_terminologies` (
  `terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `terminology_name` varchar(100) NOT NULL,
  `terminology_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`terminology_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accounting_terminologies`
--

INSERT INTO `accounting_terminologies` (`terminology_id`, `terminology_name`, `terminology_desc`) VALUES
(1, 'Assets', 'assets'),
(3, 'Liabilities', 'Liabilities\r\n'),
(4, 'Others ', 'Others');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accounts_payables_ledger`
--

INSERT INTO `accounts_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'LPO No:BD0001/2013', '610', '', '610', 2, '85', '2013-03-24 15:26:13', 44),
(2, 'Cash ( Against PO No:BD0001/2013)', '-150', '150', '', 2, '86', '2013-03-24 15:26:39', 0),
(3, 'Cash ( Against PO No:BD0001/2013)', '-200', '200', '', 2, '87', '2013-03-24 15:27:30', 0),
(4, 'Cash ( Against PO No:BD0001/2013)', '-260', '260', '', 2, '89', '2013-03-24 15:28:17', 0),
(5, 'LPO No:BD0002/2013', '4400', '', '4400', 2, '89', '2013-03-24 21:36:40', 46),
(6, 'LPO No:BD0003/2013', '770', '', '770', 2, '89', '2013-03-25 03:36:38', 48);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `accounts_receivables_ledger`
--

INSERT INTO `accounts_receivables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Inv No:BDINV0002/2013', '1287000', '1287000', '', 6, '1', '2013-03-24 17:06:28', 0),
(2, 'Receipt No:BDSR0011/2013', '-1000000', '', '1000000', 6, '1', '2013-03-24 17:09:33', 0),
(3, 'Inv No:BDINV0004/2013', '630500', '', '630500', 6, '1', '2013-03-24 17:17:18', 0),
(4, '', '1287000', '', '1287000', 6, '1', '2013-03-24 17:21:58', 0),
(5, '', '-1000000', '', '1000000', 6, '1', '2013-03-24 17:21:58', 0),
(6, 'Purchase Returns Debit Note No:BDDN0005/2013', '210', '210', '', 2, '89', '2013-03-25 03:57:39', 0),
(7, 'Purchase Returns Debit Note No:BDDN0006/2013', '3600', '3600', '', 2, '89', '2013-03-25 03:59:10', 0),
(8, 'Receipt No:BDSR0012/2013', '-1000000', '', '1000000', 6, '1', '2013-03-25 04:27:24', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `all_rfq`
--

INSERT INTO `all_rfq` (`all_rfq_id`, `rfq_no`, `supplier_id`, `rfq_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'RFQ0001/2013', 1, 1, 1, '2013-02-23 15:51:07', 1),
(2, 'RFQ0002/2013', 1, 2, 1, '2013-03-24 17:31:42', 1);

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

--
-- Dumping data for table `apparatus_cat`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 1, '2013-02-23 15:11:51', 'Logged into the system'),
(2, 1, '2013-02-23 15:13:13', 'Logged into the system'),
(3, 1, '2013-02-23 15:14:57', 'Logged into the system'),
(4, 1, '2013-02-23 15:19:00', 'Created a supplier  Clindiag Systems Co. Ltd into the system'),
(5, 1, '2013-02-23 15:20:43', 'Created a supplier  Turk lab into the system'),
(6, 1, '2013-02-23 15:22:04', 'Created a supplier  Crown Health Care Kenya Ltd into the system'),
(7, 1, '2013-02-23 15:24:19', 'Created a supplier  into the system'),
(8, 1, '2013-02-23 15:25:39', 'Created a supplier  into the system'),
(9, 1, '2013-02-23 15:26:54', 'Created a supplier  into the system'),
(10, 1, '2013-02-23 15:51:04', 'Requested for a quotation'),
(11, 1, '2013-02-23 15:54:45', 'Generated a purchase order '),
(12, 1, '2013-02-23 15:59:26', 'Updated his/her own profile'),
(13, 1, '2013-02-23 16:00:04', 'Updated his/her own profile'),
(14, 1, '2013-02-23 16:01:11', 'edited user currency USD'),
(15, 1, '2013-02-23 16:20:36', 'Generated Invoice'),
(16, 1, '2013-02-23 16:21:04', 'Generated Invoice'),
(17, 1, '2013-02-23 16:21:21', 'Updated his/her own profile'),
(18, 1, '2013-02-23 16:38:09', 'Logged into the system'),
(19, 2, '2013-02-23 16:39:23', 'Edited employee details by the name  Griffins             Osero              Mogeni           '),
(20, 2, '2013-02-23 16:40:01', 'Edited employee details by the name  Hussein    Hassan   Abdulle '),
(21, 1, '2013-02-23 16:40:21', 'Logged into the system'),
(22, 1, '2013-02-23 16:52:43', 'Logged into the system'),
(23, 1, '2013-02-23 17:03:44', 'Generated a purchase order '),
(24, 1, '2013-02-23 17:27:36', 'Generated a purchase order '),
(25, 1, '2013-02-23 17:32:21', 'Generated a purchase order '),
(26, 1, '2013-02-23 17:34:17', 'Generated a purchase order '),
(27, 1, '2013-02-23 18:01:13', 'Generated a purchase order '),
(28, 1, '2013-02-23 18:08:37', 'Generated a purchase order '),
(29, 1, '2013-02-23 18:12:17', 'Generated a purchase order '),
(30, 1, '2013-02-23 19:04:39', 'Generated a purchase order '),
(31, 1, '2013-02-23 19:07:10', 'Generated a purchase order '),
(32, 1, '2013-02-23 19:08:26', 'edited user currency USD'),
(33, 1, '2013-02-23 19:09:22', 'Generated a purchase order '),
(34, 1, '2013-02-23 19:29:30', 'Recorded an expense Customs clearance expenses worth 10000 into the system'),
(35, 1, '2013-02-23 19:32:42', 'Generated Invoice'),
(36, 1, '2013-02-23 19:33:00', 'Updated his/her own profile'),
(37, 1, '2013-02-23 19:59:43', 'Generated a purchase order '),
(38, 1, '2013-02-24 21:01:13', 'Generated a purchase order '),
(39, 1, '2013-02-24 21:31:41', 'Generated Invoice'),
(40, 0, '2013-02-25 05:00:17', 'edited product RF'),
(41, 1, '2013-02-25 05:00:47', 'Generated Invoice'),
(42, 1, '2013-02-25 05:01:54', 'Generated Invoice'),
(43, 1, '2013-02-25 05:24:23', 'Generated Invoice'),
(44, 1, '2013-02-25 05:51:11', 'Generated a purchase order '),
(45, 1, '2013-02-25 06:27:51', 'Generated a purchase order '),
(46, 1, '2013-02-25 06:30:49', 'Generated a purchase order '),
(47, 1, '2013-02-25 06:43:24', 'Generated a purchase order '),
(48, 1, '2013-02-25 07:17:35', 'Generated a purchase order '),
(49, 1, '2013-02-25 12:13:33', 'edited accounting terminologies details for Assets'),
(50, 1, '2013-02-25 14:37:34', 'Recorded an expense Rent worth 1000000 into the system'),
(51, 1, '2013-02-25 15:48:57', 'Generated Invoice'),
(52, 1, '2013-02-25 15:53:45', 'Recorded an expense salary worth 10000 into the system'),
(53, 1, '2013-02-25 15:54:59', 'Generated Invoice'),
(54, 1, '2013-02-26 04:33:52', 'Generated a purchase order '),
(55, 1, '2013-02-26 04:44:47', 'Generated a purchase order '),
(56, 1, '2013-02-26 05:29:26', 'Generated a purchase order '),
(57, 1, '2013-02-26 05:31:16', 'Generated a purchase order '),
(58, 1, '2013-02-26 05:35:24', 'Generated a purchase order '),
(59, 1, '2013-02-26 05:36:31', 'Generated a purchase order '),
(60, 1, '2013-02-26 10:33:54', 'Generated a purchase order '),
(61, 1, '2013-02-26 10:44:31', 'Generated a purchase order '),
(62, 1, '2013-02-26 10:48:59', 'Generated a purchase order '),
(63, 1, '2013-02-26 11:02:34', 'Generated a purchase order '),
(64, 1, '2013-02-26 11:18:07', 'Generated a purchase order '),
(65, 1, '2013-02-26 11:24:21', 'Generated a purchase order '),
(66, 1, '2013-02-28 04:22:10', 'Logged into the system'),
(67, 1, '2013-02-28 04:24:12', 'Generated a purchase order '),
(68, 1, '2013-02-28 04:32:08', 'Generated a purchase order '),
(69, 1, '2013-02-28 12:27:28', 'Edited fixed assets details for Office Furniture'),
(70, 1, '2013-02-28 12:36:40', 'Edited fixed assets details for Chair'),
(71, 1, '2013-03-02 10:28:35', 'Logged into the system'),
(72, 1, '2013-03-02 10:30:40', 'Logged into the system'),
(73, 1, '2013-03-02 12:09:12', 'Generated Invoice'),
(74, 1, '2013-03-02 12:19:44', 'Generated a purchase order '),
(75, 1, '2013-03-02 12:22:26', 'Generated Invoice'),
(76, 1, '2013-03-02 17:11:07', 'Generated a purchase order '),
(77, 1, '2013-03-02 17:14:00', 'Generated a purchase order '),
(78, 1, '2013-03-08 09:51:58', 'Logged into the system'),
(79, 1, '2013-03-10 17:44:51', 'Logged into the system'),
(80, 1, '2013-03-10 18:02:19', 'Generated Invoice'),
(81, 1, '2013-03-10 18:43:37', 'Generated Invoice'),
(82, 1, '2013-03-10 18:44:38', 'Generated Invoice'),
(83, 1, '2013-03-11 11:53:33', 'Generated a purchase order '),
(84, 1, '2013-03-12 06:03:53', 'Logged into the system'),
(85, 1, '2013-03-12 06:28:58', 'Generated a purchase order '),
(86, 1, '2013-03-13 13:37:39', 'Logged into the system'),
(87, 1, '2013-03-16 13:04:10', 'Logged into the system'),
(88, 1, '2013-03-24 04:32:49', 'Logged into the system'),
(89, 1, '2013-03-24 04:33:52', 'Generated a purchase order '),
(90, 1, '2013-03-24 04:41:18', 'Generated a purchase order '),
(91, 1, '2013-03-24 04:49:37', 'Generated a purchase order '),
(92, 1, '2013-03-24 14:11:48', 'Logged into the system'),
(93, 1, '2013-03-24 14:16:03', 'Generated a purchase order '),
(94, 1, '2013-03-24 14:28:35', 'Generated a purchase order '),
(95, 1, '2013-03-24 14:35:50', 'Generated a purchase order '),
(96, 1, '2013-03-24 14:48:32', 'Generated a purchase order '),
(97, 1, '2013-03-24 15:22:11', 'Generated a purchase order '),
(98, 1, '2013-03-24 15:26:11', 'Generated a purchase order '),
(99, 1, '2013-03-24 15:50:40', 'Recorded an income loan1 worth 600000 into the system'),
(100, 1, '2013-03-24 15:54:58', 'Recorded an income service revenue worth 100000 into the system'),
(101, 1, '2013-03-24 16:05:07', 'Recorded Loan Received from FCB Bank into the system'),
(102, 1, '2013-03-24 16:25:47', 'Created a supplier  into the system'),
(103, 1, '2013-03-24 16:30:31', 'Generated Invoice'),
(104, 1, '2013-03-24 16:35:24', 'Generated Invoice'),
(105, 1, '2013-03-24 16:44:41', 'Generated Invoice'),
(106, 1, '2013-03-24 16:51:46', 'Generated Invoice'),
(107, 1, '2013-03-24 16:53:53', 'Cash Sales'),
(108, 1, '2013-03-24 16:55:38', 'Cash Sales'),
(109, 1, '2013-03-24 17:06:24', 'Generated Invoice'),
(110, 1, '2013-03-24 17:07:38', 'Updated his/her own profile'),
(111, 1, '2013-03-24 17:10:20', 'Generated Invoice'),
(112, 1, '2013-03-24 17:17:00', 'Generated Invoice'),
(113, 1, '2013-03-24 17:21:44', 'Generated Invoice'),
(114, 1, '2013-03-24 17:31:32', 'Requested for a quotation'),
(115, 1, '2013-03-24 21:25:10', 'Logged into the system'),
(116, 1, '2013-03-24 21:36:02', 'Generated a purchase order '),
(117, 1, '2013-03-24 21:36:24', 'Updated his/her own profile'),
(118, 1, '2013-03-25 03:36:36', 'Generated a purchase order '),
(119, 1, '2013-03-25 04:13:49', 'Generated Invoice'),
(120, 1, '2013-03-25 05:27:07', 'Logged into the system');

-- --------------------------------------------------------

--
-- Table structure for table `bad_debts`
--

CREATE TABLE IF NOT EXISTS `bad_debts` (
  `bad_debt_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`bad_debt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bad_debts`
--

INSERT INTO `bad_debts` (`bad_debt_id`, `sales_code`, `client_id`, `amount`, `reason`, `currency_code`, `curr_rate`, `date_received`, `status`) VALUES
(1, 10, 1, '2000000', 'still died', '6', '1', '2013-02-25 15:52:17', 0),
(2, 11, 2, '3000000', 'dead', '6', '1', '2013-02-25 15:55:34', 0);

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

--
-- Dumping data for table `bad_debts_ledger`
--


-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `bank_id` int(10) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bank_initials` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banks`
--


-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE IF NOT EXISTS `bank_branches` (
  `branch_id` int(10) NOT NULL AUTO_INCREMENT,
  `bank_id` int(10) DEFAULT NULL,
  `branch_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bank_branches`
--

INSERT INTO `bank_branches` (`branch_id`, `bank_id`, `branch_name`) VALUES
(4, 2, 'Market'),
(5, 2, 'Queens Way'),
(6, 2, 'Kimathi Street'),
(7, 3, 'Utumishi House'),
(8, 3, 'University Way'),
(9, 3, 'Naivasha');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `benefit_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `benefits`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `benefit_log`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cash_ledger`
--

INSERT INTO `cash_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Sales receipt against Receipt No:BDSR0010/2013', '700000', '700000', '', 6, '1', '2013-03-24 16:52:09'),
(2, 'Sales receipt against Receipt No:BDSR0011/2013', '1000000', '1000000', '', 6, '1', '2013-03-24 17:09:33'),
(3, 'Sale Payment against (Inv No:BDINV0005/2013)', '1000000', '1000000', '', 6, '1', '2013-03-24 17:21:58'),
(4, 'Sales receipt against Receipt No:BDSR0012/2013', '1000000', '1000000', '', 6, '1', '2013-03-25 04:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `cash_sales`
--

CREATE TABLE IF NOT EXISTS `cash_sales` (
  `cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`cash_sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cash_sales`
--

INSERT INTO `cash_sales` (`cash_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(1, 4, 1, 0, '6', '1', 1, 'HA-22', 21, '1', '650000', '0', 0, '0', '2013-03-24 16:53:53', 1),
(2, 4, 1, 0, '6', '1', 1, 'HA-22', 22, '1', '650000', '0', 0, '0', '2013-03-24 16:55:38', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cash_sales_payments`
--

INSERT INTO `cash_sales_payments` (`cash_sales_payment_id`, `receipt_no`, `ttl_amount`, `currency_code`, `curr_rate`, `cash_paid`, `client_id`, `sales_code`, `user_id`, `sales_rep`, `date_generated`, `status`) VALUES
(1, 'BDCS0001/2013', '650000', '6', '1', 65000, 4, 21, 1, 0, '2013-03-24 16:54:20', 1),
(2, 'BDCS0002/2013', '650000', '6', '1', 650000, 4, 22, 1, 0, '2013-03-24 16:57:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_town` varchar(100) NOT NULL,
  `c_paddress` varchar(100) NOT NULL,
  `c_phone` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `opening_balance` varchar(100) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `c_name`, `c_address`, `c_town`, `c_paddress`, `c_phone`, `contact_person`, `c_email`, `c_date_created`, `opening_balance`) VALUES
(1, 'Madina Hospital', '99-0098', 'Nairobi', 'Eastliegh', '0798076544', 'Karanje', 'karanjem@madinahopsital.com', '2013-02-23 15:24:19', ''),
(2, 'Ladnan Hospital', '789-909', 'Nairobi', 'Eastliegh', '0722337322', 'Jama', 'Jama@yahoo.com', '2013-02-23 15:25:39', ''),
(3, 'Wajir Hospital', '777-0066', 'Wajir', 'Wajir Town', '0788665543', 'Farah', 'Wajirhospital@gmail.com', '2013-02-23 15:26:54', ''),
(4, 'Coast Hospital', '43567', 'Mombasa', 'Mombasa', '072134', 'Hussein', 'gosero@topsoftchoice.com', '2013-03-24 16:25:47', '56000');

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE IF NOT EXISTS `client_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`transaction_id`, `client_id`, `sales_code`, `transaction`, `amount`, `date_recorded`) VALUES
(1, 4, 0, 'Opening Balance', '100000', '2013-03-24 16:51:15'),
(2, 4, 20, 'Inv No:BDINV0001/2013', '1300000', '2013-03-24 16:51:51'),
(3, 4, 20, 'Receipt No:BDSR0010/2013', '-700000', '2013-03-24 16:52:09'),
(4, 4, 21, 'Cash Receipt No:BDCS0001/2013', '65000', '2013-03-24 16:54:20'),
(5, 4, 22, 'Cash Receipt No:BDCS0002/2013', '650000', '2013-03-24 16:57:26'),
(7, 4, 23, 'Receipt No:BDSR0011/2013', '-1000000', '2013-03-24 17:09:33'),
(9, 4, 25, 'Inv No:BDINV0004/2013', '-300000', '2013-03-24 17:17:18'),
(10, 4, 25, 'Inv No:BDINV0004/2013', '630500', '2013-03-24 17:17:18'),
(11, 4, 26, 'Inv No:BDINV0005/2013', '1287000', '2013-03-24 17:21:58'),
(12, 4, 26, 'Cash Receipt No:BDINV0005/2013', '-1000000', '2013-03-24 17:21:58'),
(13, 4, 24, 'Receipt No:BDSR0012/2013', '-1000000', '2013-03-25 04:27:24'),
(14, 4, 26, 'Credit Note No:BDCNT0001/2013', '-1300000', '2013-03-25 04:33:30'),
(15, 4, 0, 'Credit Note No:BDCNT0001/2013', '-1300000', '2013-03-25 04:33:30');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commisions`
--


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
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_expected_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commisions_expected`
--


-- --------------------------------------------------------

--
-- Table structure for table `commision_payments`
--

CREATE TABLE IF NOT EXISTS `commision_payments` (
  `commision_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `sales_rep` int(10) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `month_paid` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commision_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE IF NOT EXISTS `credit_notes` (
  `credit_note_id` int(10) NOT NULL AUTO_INCREMENT,
  `credit_note_no` varchar(100) NOT NULL,
  `ttl_sales_return` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `salesreturn_code` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`credit_note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `credit_notes`
--

INSERT INTO `credit_notes` (`credit_note_id`, `credit_note_no`, `ttl_sales_return`, `client_id`, `sales_code`, `salesreturn_code`, `user_id`, `sales_rep`, `date_generated`, `status`) VALUES
(1, 'BDCNT0001/2013', '1300000', 4, 26, 9, 1, 0, '2013-03-25 04:33:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `curr_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`curr_id`, `curr_name`, `curr_rate`) VALUES
(6, 'KSHS', '1'),
(2, 'USD', '89'),
(3, 'POUNDS', '78'),
(4, 'UAE', '29.88');

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

CREATE TABLE IF NOT EXISTS `debit_notes` (
  `debit_note_id` int(10) NOT NULL AUTO_INCREMENT,
  `debit_note_no` varchar(100) NOT NULL,
  `ttl_stock_return` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `stockreturn_code` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`debit_note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `debit_notes`
--

INSERT INTO `debit_notes` (`debit_note_id`, `debit_note_no`, `ttl_stock_return`, `currency`, `supplier_id`, `order_code`, `stockreturn_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'BDDN0001/2013', '500', '2', 1, 33, 2, 1, '2013-03-12 06:12:43', 0),
(2, 'BDDN0002/2013', '2799', '6', 3, 34, 3, 1, '2013-03-12 06:50:51', 0),
(3, 'BDDN0003/2013', '2904', '6', 3, 34, 3, 1, '2013-03-12 06:54:21', 0),
(4, 'BDDN0004/2013', '', '', 0, 0, 3, 1, '2013-03-12 07:01:53', 0),
(5, 'BDDN0005/2013', '210', '2', 1, 48, 4, 1, '2013-03-25 03:57:39', 0),
(6, 'BDDN0006/2013', '3810', '2', 3, 46, 5, 1, '2013-03-25 03:59:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deduction_id` int(10) NOT NULL AUTO_INCREMENT,
  `deduction_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deduction_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deductions`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deduction_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `dividends`
--

CREATE TABLE IF NOT EXISTS `dividends` (
  `dividend_id` int(10) NOT NULL AUTO_INCREMENT,
  `shares_id` int(10) NOT NULL,
  `financial_year_id` int(10) NOT NULL,
  `dividend_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`dividend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dividends`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doubtful_debts`
--

INSERT INTO `doubtful_debts` (`doubtful_debt_id`, `sales_code`, `client_id`, `amount`, `reason`, `currency_code`, `curr_rate`, `date_received`, `status`) VALUES
(1, 10, 1, '2000000', 'Client died', '6', '1', '2013-02-25 15:52:17', 1),
(2, 11, 2, '3000000', 'dead', '6', '1', '2013-02-25 15:55:34', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doubtful_debts_ledger`
--

INSERT INTO `doubtful_debts_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Doubtful Debts for Inv:BDINV0005/2013', '2000000', '2000000', '', 6, '1', '2013-02-25 15:51:26'),
(2, 'Bad Debt for Inv: BDINV0005/2013', '2000000', '', '-2000000', 6, '1', '2013-02-25 15:52:17'),
(3, 'Doubtful Debts for Inv:BDINV0006/2013', '3000000', '3000000', '', 6, '1', '2013-02-25 15:55:15'),
(4, 'Bad Debt for Inv: BDINV0006/2013', '3000000', '', '-3000000', 6, '1', '2013-02-25 15:55:34');

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
  `emp_status` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `department` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `job_cat_id` int(11) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` int(10) NOT NULL,
  `basic_sal` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `nation_code` (`pin_no`),
  KEY `job_title_code` (`nhif_no`),
  KEY `emp_status` (`gender`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_no`, `national_id`, `emp_firstname`, `emp_middle_name`, `emp_lastname`, `emp_phone`, `emp_email`, `pin_no`, `town`, `marital_status`, `nationality`, `dob`, `gender`, `nhif_no`, `nssf_no`, `job_title_id`, `job_email`, `emp_status`, `department`, `job_cat_id`, `joined_date`, `status`, `basic_sal`) VALUES
(9, 'BDS9     ', '24385821           ', ' Griffins           ', ' Osero             ', 'Mogeni           ', '0723411943           ', 'updateosero@gmail.com', ' 5677           ', 'Nairobi           ', 'Single', 'Kenyan           ', '2012-09-10', 'Male', '78654', 'KImani           ', 'Supervisor           ', 'mogeni@yahoo.com', 'Full Time Contract', 'Accounts        ', 0, '2012-09-03', 0, ''),
(13, 'BDS13  ', '00044946 ', ' Hussein  ', ' Hassan ', ' Abdulle ', ' 0702358399 ', 'hhabdulle77@gmail.com', 'PI990 ', 'Nairobi ', 'Married', 'Somali ', '1977-05-06', 'Male', '', '  ', ' Director ', 'hhassan@briskdiagnostics.com', 'Full Time Contract', ' Admin ', 0, '2011-01-02', 0, '');

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
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`expense_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `description`, `curr_id`, `curr_rate`, `amount`, `mop`, `date_of_transaction`) VALUES
(1, 1, 'Customs clearance expenses', '6', '1', '10000', 'Cash', '2013-02-23 19:29:30'),
(2, 1, 'Rent', '6', '1', '1000000', 'Cash', '2013-02-25 14:37:34'),
(3, 1, 'salary', '6', '1', '10000', 'Cash', '2013-02-25 15:53:45'),
(4, 1, 'Office Rent', '6', '1', '120000', 'Cheque', '2013-03-24 17:34:09');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expired_stock`
--

INSERT INTO `expired_stock` (`expired_stock_id`, `product_id`, `purchase_order_id`, `supplier_id`, `quantity`, `date_recorded`) VALUES
(1, 2, 1, 1, '34', '2013-03-25 04:08:55');

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

--
-- Dumping data for table `financial_year`
--


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
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fixed_assets`
--

INSERT INTO `fixed_assets` (`fixed_asset_id`, `fixed_asset_name`, `description`, `date_purchased`, `currency`, `curr_rate`, `value`, `dep_value`, `amount_paid`, `date_recorded`, `status`) VALUES
(1, 'Office Furniture', 'sdsd', '2013-02-12', 6, '1', '800000', '200', '50000', '2013-02-28 12:27:28', 0),
(2, 'Office Furniture', 'dfdfdf', '2013-02-26', 6, '1', '300000', '1000', '210000', '2013-02-28 12:31:10', 0),
(3, 'Chair', 'asasas', '2013-02-12', 6, '1', '120000', '200', '50000', '2013-02-28 12:36:40', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fixed_assets_ledger`
--

INSERT INTO `fixed_assets_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Purchase of fixed asset Chair', '120000', '120000', '', 6, '1', '2013-02-28 12:37:56');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fixed_assets_payments`
--

INSERT INTO `fixed_assets_payments` (`fixed_assets_payments_id`, `fixed_asset_id`, `currency`, `curr_rate`, `amount_paid`, `date_recorded`) VALUES
(1, 3, 6, '1', '50000', '2013-02-28 12:35:33'),
(2, 3, 6, '1', '70000', '2013-02-28 12:38:30');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Accounts Receivables (Receipt No : BDSR0010/2013)', '700000', '', '700000', 6, '1', '2013-03-24 16:52:09', 0),
(2, 'Cash ( Receipt No : BDSR0010/2013)', '700000', '700000', '', 6, '1', '2013-03-24 16:52:09', 0),
(3, 'Sales ( Against Inv No:BDINV0002/2013)', '1287000', '', '1287000', 6, '1', '2013-03-24 17:06:28', 0),
(4, 'Accounts Receivables (Inv No:BDINV0002/2013)', '1287000', '1287000', '', 6, '1', '2013-03-24 17:06:28', 0),
(5, 'Accounts Receivables (Receipt No : BDSR0011/2013)', '1000000', '', '1000000', 6, '1', '2013-03-24 17:09:33', 0),
(6, 'Cash ( Receipt No : BDSR0011/2013)', '1000000', '1000000', '', 6, '1', '2013-03-24 17:09:33', 0),
(7, 'Sales ( Against Inv No:BDINV0004/2013)', '-630500', '', '630500', 6, '1', '2013-03-24 17:17:18', 0),
(8, 'Accounts Receivables (Inv No:BDINV0004/2013)', '630500', '', '630500', 6, '1', '2013-03-24 17:17:18', 0),
(9, 'Cash ( Against Inv No:BDINV0004/2013)', '300000', '', '300000', 6, '1', '2013-03-24 17:17:18', 0),
(10, 'Accounts Receivables (Inv No:BDINV0004/2013)', '300000', '300000', '', 6, '1', '2013-03-24 17:17:18', 0),
(11, 'Sales ( Against Inv No:BDINV0005/2013)', '-1287000', '', '1287000', 6, '1', '2013-03-24 17:21:58', 0),
(12, 'Accounts Receivables (Inv No:BDINV0005/2013)', '1287000', '', '1287000', 6, '1', '2013-03-24 17:21:58', 0),
(13, 'Cash ( Against Inv No:BDINV0005/2013)', '1000000', '', '1000000', 6, '1', '2013-03-24 17:21:58', 0),
(14, 'Accounts Receivables (Inv No:BDINV0005/2013)', '1000000', '1000000', '', 6, '1', '2013-03-24 17:21:58', 0),
(15, 'Purchases Account (PO No:BD0002/2013)', '4400', '4400', '', 2, '89', '2013-03-24 21:36:40', 46),
(16, 'Accounts Payables (PO No:BD0002/2013)', '-4400', '', '4400', 2, '89', '2013-03-24 21:36:40', 46),
(17, 'Purchases Account (PO No:BD0003/2013)', '770', '770', '', 2, '89', '2013-03-25 03:36:38', 48),
(18, 'Accounts Payables (PO No:BD0003/2013)', '-770', '', '770', 2, '89', '2013-03-25 03:36:38', 48),
(19, 'Purchase Returns (Debit Note No:BDDN0005/2013)', '-210', '', '210', 2, '89', '2013-03-25 03:57:39', 0),
(20, 'Accounts Receivables (Debit Note No:BDDN0005/2013)', '210', '210', '', 2, '89', '2013-03-25 03:57:39', 0),
(21, 'Purchase Returns (Debit Note No:BDDN0006/2013)', '-3600', '', '3600', 2, '89', '2013-03-25 03:59:10', 0),
(22, 'Accounts Receivables (Debit Note No:BDDN0006/2013)', '3600', '3600', '', 2, '89', '2013-03-25 03:59:10', 0),
(23, 'Accounts Receivables (Receipt No : BDSR0012/2013)', '1000000', '', '1000000', 6, '1', '2013-03-25 04:27:24', 0),
(24, 'Cash ( Receipt No : BDSR0012/2013)', '1000000', '1000000', '', 6, '1', '2013-03-25 04:27:24', 0);

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
  `date_of_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`income_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `user_id`, `description`, `curr_id`, `curr_rate`, `amount`, `mop`, `date_of_transaction`) VALUES
(3, 1, 'service revenue', 6, '1', '100000', 'Cash', '2013-03-24 15:54:58');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income_ledger`
--

INSERT INTO `income_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'loan1', '600000', '', '600000', 6, '1', '2013-03-24 15:50:40'),
(2, 'service revenue', '100000', '', '100000', 6, '1', '2013-03-24 15:54:58');

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
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `doubt_ful_status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_no`, `invoice_ttl`, `inv_bal`, `currency_code`, `curr_rate`, `client_id`, `sales_code`, `user_id`, `sales_rep`, `date_generated`, `status`, `doubt_ful_status`) VALUES
(1, 'BDINV0001/2013', '1300000', '600000', '6', '1', 4, 20, 1, 0, '2013-03-24 17:09:18', 1, 1),
(2, 'BDINV0002/2013', '1287000', '287000', '6', '1', 4, 23, 1, 0, '2013-03-24 17:09:38', 1, 1),
(3, 'BDINV0003/2013', '1852500', '52500', '6', '1', 4, 24, 1, 0, '2013-03-25 04:27:32', 1, 1),
(4, 'BDINV0004/2013', '630500', '330500', '6', '1', 4, 25, 1, 0, '2013-03-25 04:25:25', 1, 1),
(5, 'BDINV0005/2013', '1287000', '287000', '6', '1', 4, 26, 1, 0, '2013-03-25 04:25:25', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`invoice_payment_id`, `sales_code`, `client_id`, `amount_received`, `currency_code`, `curr_rate`, `mop`, `date_received`, `status`) VALUES
(1, 20, 4, '', '6', '1', '', '2013-03-24 16:51:51', 0),
(2, 20, 4, '700000', '6', '1', 'Cash', '2013-03-24 16:52:09', 0),
(3, 23, 4, '', '6', '1', '', '2013-03-24 17:06:28', 0),
(4, 23, 4, '1000000', '6', '1', 'Cash', '2013-03-24 17:09:33', 0),
(5, 24, 4, '800000', '6', '1', 'Cheque', '2013-03-24 17:10:47', 0),
(6, 25, 4, '300000', '6', '1', 'Cash', '2013-03-24 17:17:17', 0),
(7, 26, 4, '1000000', '6', '1', 'Cash', '2013-03-24 17:21:58', 0),
(8, 24, 4, '1000000', '6', '1', 'Cash', '2013-03-25 04:27:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE IF NOT EXISTS `jobtitles` (
  `job_title_id` int(20) NOT NULL AUTO_INCREMENT,
  `job_title_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`job_title_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobtitles`
--

INSERT INTO `jobtitles` (`job_title_id`, `job_title_name`) VALUES
(1, 'Executive Director'),
(3, 'Software Developer'),
(4, 'Systems Engineer');

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

--
-- Dumping data for table `loans`
--


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

--
-- Dumping data for table `loan_logs`
--


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
  `loan_amount` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `period_years` int(10) NOT NULL,
  `period_months` int(10) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`loan_received_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loan_received`
--

INSERT INTO `loan_received` (`loan_received_id`, `lenders_name`, `lenders_address`, `lenders_phone`, `lenders_email`, `lenders_town`, `loan_amount`, `currency_code`, `curr_rate`, `period_years`, `period_months`, `date_recorded`) VALUES
(1, 'FCB Bank', '2344', '0722227322', 'updateosero@gmail.com', 'Nairobi', '320000', '6', '1', 2, 3, '2013-03-24 16:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `lpo`
--

CREATE TABLE IF NOT EXISTS `lpo` (
  `lpo_id` int(10) NOT NULL AUTO_INCREMENT,
  `comments` char(250) NOT NULL,
  `lpo_no` varchar(100) NOT NULL,
  `lpo_amount` varchar(100) NOT NULL,
  `paid_amount` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`lpo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lpo`
--

INSERT INTO `lpo` (`lpo_id`, `comments`, `lpo_no`, `lpo_amount`, `paid_amount`, `currency_code`, `curr_rate`, `supplier_id`, `order_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'test', 'BD0001/2013', '610', '610', '2', '85', 1, 44, 1, '2013-03-24 15:28:17', 1),
(2, 'feeds', 'BD0002/2013', '4400', '', '2', '89', 3, 46, 1, '2013-03-24 21:36:40', 1),
(3, 'dsdsd', 'BD0003/2013', '770', '', '2', '89', 1, 48, 1, '2013-03-25 03:39:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `minor_terminologies`
--

CREATE TABLE IF NOT EXISTS `minor_terminologies` (
  `minor_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `terminology_id` int(11) NOT NULL,
  `minor_terminology_name` varchar(100) NOT NULL,
  PRIMARY KEY (`minor_terminology_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `minor_terminologies`
--

INSERT INTO `minor_terminologies` (`minor_terminology_id`, `terminology_id`, `minor_terminology_name`) VALUES
(4, 1, 'Current Asset'),
(3, 1, 'Fixed Assets'),
(5, 3, 'Long-Term Liabilities'),
(6, 3, 'Short - Term Liabilities'),
(8, 4, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `net_profit`
--

CREATE TABLE IF NOT EXISTS `net_profit` (
  `net_profit_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`net_profit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `net_profit`
--

INSERT INTO `net_profit` (`net_profit_id`, `amount`, `date_recorded`) VALUES
(1, '0', '2013-02-23 15:16:50'),
(2, '-1020000', '2013-02-23 19:30:55'),
(3, '1380000', '2013-02-23 19:33:25'),
(4, '-20000', '2013-02-24 19:47:34'),
(5, '-10000', '2013-02-24 19:48:31'),
(6, '-1145000', '2013-02-24 21:10:57'),
(7, '-1139200', '2013-02-24 21:34:02'),
(8, '-139200', '2013-02-25 05:01:08'),
(9, '860800', '2013-02-25 05:02:10'),
(10, '1985800', '2013-02-25 05:14:14'),
(11, '985800', '2013-02-25 05:15:43'),
(12, '-14200', '2013-02-25 05:16:34'),
(13, '-24200', '2013-02-25 15:53:49'),
(14, '421120', '2013-02-28 04:29:27'),
(15, '146560', '2013-02-28 08:33:07'),
(16, '-426500', '2013-03-10 18:46:33'),
(17, '-885350', '2013-03-11 11:58:18'),
(18, '1029000', '2013-03-24 04:42:15'),
(19, '867300', '2013-03-24 04:47:02'),
(20, '778380', '2013-03-24 04:53:01'),
(21, '944210', '2013-03-24 15:39:57'),
(22, '1544210', '2013-03-24 15:52:59'),
(23, '1044210', '2013-03-24 15:58:03'),
(24, '-1097290', '2013-03-25 04:56:55');

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

--
-- Dumping data for table `nhif_block`
--


-- --------------------------------------------------------

--
-- Table structure for table `nilepet.currency`
--

CREATE TABLE IF NOT EXISTS `nilepet.currency` (
  `curr_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nilepet.currency`
--

INSERT INTO `nilepet.currency` (`curr_id`, `curr_name`, `curr_rate`) VALUES
(6, 'KSHS', '1'),
(2, 'USD', '101'),
(3, 'POUNDS', '112.5'),
(4, 'UAE', '29.88');

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

--
-- Dumping data for table `opening_balances`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_code_get`
--

CREATE TABLE IF NOT EXISTS `order_code_get` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `order_code_get`
--

INSERT INTO `order_code_get` (`gen_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48);

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

--
-- Dumping data for table `paye_block`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payrol_basic_log`
--

INSERT INTO `payrol_basic_log` (`payrol_basic_log_id`, `emp_id`, `basic_pay`, `comm_pay`, `tax`, `date_paid`, `payment_month`, `status`) VALUES
(1, 9, ' 70000', 0, 0, '2013-03-10 18:58:27', 'March 2013', 0);

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
  `date_printed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_printed2` varchar(100) NOT NULL,
  `month_printed` varchar(100) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_slips`
--

INSERT INTO `pay_slips` (`payslip_id`, `payslip_no`, `payrol_basic_log_id`, `emp_id`, `gross_salary`, `ttl_deductions`, `net_salary`, `date_printed`, `date_printed2`, `month_printed`) VALUES
(1, 'BDPS0001/2013', 1, 9, '70000', '0', '70000', '2013-03-10 18:58:27', '10-03-2013', 'March 2013');

-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_expense`
--

CREATE TABLE IF NOT EXISTS `petty_cash_expense` (
  `petty_cash_expense_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`petty_cash_expense_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `petty_cash_expense`
--


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

--
-- Dumping data for table `petty_cash_income`
--


-- --------------------------------------------------------

--
-- Table structure for table `petty_cash_ledger`
--

CREATE TABLE IF NOT EXISTS `petty_cash_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `money_in` varchar(100) NOT NULL,
  `money_out` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `petty_cash_ledger`
--


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
  PRIMARY KEY (`ploughed_back_dividend`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ploughed_back_dividend`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `prod_code` varchar(100) NOT NULL,
  `pack_size` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `reorder_level` varchar(100) NOT NULL,
  `curr_sp` varchar(100) NOT NULL,
  `curr_bp` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `prod_code`, `pack_size`, `weight`, `reorder_level`, `curr_sp`, `curr_bp`, `status`) VALUES
(1, 1, 'Fully Auto Hematology Analyzer Machine', 'HA-22', 'N/A', '20', '3', '650000', '250000', 0),
(2, 2, 'RF', 'RF003', '30mlx5', '1210', '2', '1000000', '1200', 0),
(3, 2, 'GOT', 'got0098', '30mlx6', '1', '3', '3000', '1500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cat_desc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Lab equipment', 'Laboratory Equipment and apparatus'),
(2, 'Lab Reagents', 'Laboratory Chemicals'),
(3, 'Hospital Furniture', 'Hospital eg. Bed, Delivery beds');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `purchases_ledger`
--

INSERT INTO `purchases_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'LPO No:BD0001/2013', '610', '610', '', 2, '85', '2013-03-24 15:26:13', 44),
(2, 'LPO No:BD0002/2013', '4400', '4400', '', 2, '89', '2013-03-24 21:36:40', 46),
(3, 'LPO No:BD0003/2013', '770', '770', '', 2, '89', '2013-03-25 03:36:38', 48),
(4, 'Purchase of Stock (Ordering)', '-210', '', '210', 2, '89', '2013-03-25 03:53:00', 48),
(5, 'Purchase of Stock (Ordering)', '-3600', '', '3600', 2, '89', '2013-03-25 03:53:43', 46),
(6, 'Purchase of Stock (Ordering)', '-1800', '', '1800', 2, '85', '2013-03-25 03:54:11', 44),
(7, 'Debit Note No:BDDN0005/2013', '-210', '', '210', 2, '89', '2013-03-25 03:57:39', 0),
(8, 'Debit Note No:BDDN0006/2013', '-3600', '', '3600', 2, '89', '2013-03-25 03:59:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_order_id`, `temp_purchase_order_id`, `supplier_id`, `user_id`, `shipping_agent_id`, `payment_term_id`, `currency_code`, `curr_rate`, `comments`, `product_id`, `product_code`, `order_code`, `quantity`, `vendor_prc`, `ttl`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 1, 'Cheque', '2', '101', 'good', 2, 'HA-22', 33, '4', '900', '', '2013-03-24 21:36:24', 1),
(2, 1, 3, 1, 1, 'Cheque', '6', '1', 'defect', 2, 'HA-22', 34, '4', '900', '', '2013-03-24 21:36:24', 1),
(3, 1, 1, 1, 1, 'Cash', '6', '1', 'good', 1, 'HA-22', 35, '4', '900', '', '2013-03-24 21:36:24', 1),
(4, 1, 3, 1, 1, 'Electronic Transfer', '2', '101', 'good', 2, 'HA-22', 36, '4', '900', '', '2013-03-24 21:36:24', 1),
(5, 1, 2, 1, 3, 'Cheque', '3', '112.5', 'good', 3, 'HA-22', 37, '4', '900', '', '2013-03-24 21:36:24', 1),
(6, 1, 3, 1, 1, 'Cash', '2', '85.5', 'test', 2, 'HA-22', 38, '4', '900', '', '2013-03-24 21:36:24', 1),
(7, 1, 1, 1, 3, 'Electronic Transfer', '2', '87', 'lpo test', 1, 'HA-22', 39, '4', '900', '', '2013-03-24 21:36:24', 1),
(8, 1, 2, 1, 1, 'Electronic Transfer', '2', '85', 'fr', 1, 'HA-22', 40, '4', '900', '', '2013-03-24 21:36:24', 1),
(9, 1, 3, 1, 3, 'Electronic Transfer', '2', '85', 'freight', 1, 'HA-22', 42, '4', '900', '', '2013-03-24 21:36:24', 1),
(10, 1, 1, 1, 1, 'Cheque', '2', '86', 'erer', 1, 'HA-22', 43, '4', '900', '', '2013-03-24 21:36:24', 1),
(11, 1, 1, 1, 1, 'Cheque', '2', '85', 'test', 1, 'HA-22', 44, '4', '900', '', '2013-03-24 21:36:24', 1),
(12, 1, 3, 1, 3, 'Cash', '2', '89', 'feeds', 1, 'HA-22', 46, '4', '900', '', '2013-03-24 21:36:24', 1),
(13, 1, 1, 1, 1, 'Cheque', '2', '89', 'dsdsd', 2, 'RF003', 48, '1', '210', '', '2013-03-25 03:39:07', 1);

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

--
-- Dumping data for table `quotations`
--


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

--
-- Dumping data for table `quote`
--


-- --------------------------------------------------------

--
-- Table structure for table `quote_code_gen`
--

CREATE TABLE IF NOT EXISTS `quote_code_gen` (
  `qoute_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`qoute_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quote_code_gen`
--


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

--
-- Dumping data for table `reagents_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `received_stock`
--

CREATE TABLE IF NOT EXISTS `received_stock` (
  `received_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `quantity_rec` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `received_stock`
--

INSERT INTO `received_stock` (`received_stock_id`, `purchase_order_id`, `order_code`, `product_id`, `supplier_id`, `quantity_rec`, `delivery_date`, `expiry_date`, `status`) VALUES
(1, 10, 13, 2, 1, '5', '2013-02-25', '2013-02-28', 1),
(2, 0, 0, 2, 0, '10', '0000-00-00', '2013-02-28', 1),
(3, 30, 30, 1, 2, '100', '2013-03-11', '2013-03-27', 1),
(4, 1, 33, 2, 1, '34', '2013-03-04', '2013-03-07', 1),
(5, 2, 34, 2, 3, '45', '2013-03-18', '2013-03-20', 1),
(6, 13, 48, 2, 1, '1', '2013-03-21', '2013-03-31', 1),
(7, 12, 46, 1, 3, '4', '2013-03-18', '2013-03-26', 1),
(8, 11, 44, 1, 1, '2', '2013-03-18', '2013-03-27', 1);

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

--
-- Dumping data for table `recovered_bad_debts`
--


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

--
-- Dumping data for table `returned_stock`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`rfq_id`, `temp_rfq_id`, `supplier_id`, `user_id`, `product_id`, `product_code`, `rfq_code`, `quantity`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 1, 'HA-22', 1, '5', '2013-02-23 15:51:04', 1),
(2, 1, 1, 1, 1, 'HA-22', 2, '8', '2013-03-24 17:31:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_code_get`
--

CREATE TABLE IF NOT EXISTS `rfq_code_get` (
  `rfq_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rfq_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rfq_code_get`
--

INSERT INTO `rfq_code_get` (`rfq_code_id`) VALUES
(1),
(2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salaries_payables_ledger`
--

INSERT INTO `salaries_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Salaries and Commission Payable for month February 2013', '0', '', '0', 6, '1', '2013-02-23 16:40:21');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `salary_expenses_ledger`
--

INSERT INTO `salary_expenses_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Rent', '1000000', '1000000', '', 6, '1', '2013-02-25 14:37:34'),
(2, 'Bad Debt for Inv: BDINV0005/2013', '2000000', '2000000', '', 6, '1', '2013-02-25 15:52:17'),
(3, 'salary', '10000', '10000', '', 6, '1', '2013-02-25 15:53:45'),
(4, 'Bad Debt for Inv: BDINV0006/2013', '3000000', '3000000', '', 6, '1', '2013-02-25 15:55:34'),
(5, 'Salaries and Commission expenses for the month of March 2013', '70000', '70000', '', 6, '1', '2013-03-10 18:58:27'),
(6, 'Office Rent', '120000', '120000', '', 6, '1', '2013-03-24 17:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_sales_id` int(10) NOT NULL,
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
  PRIMARY KEY (`sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `temp_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `purchase_order_id`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(1, 18, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 20, '2', '650000', '0', 0, '0', '2013-03-24 16:51:46', 1),
(3, 20, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 24, '3', '650000', '0', 5, '97500', '2013-03-24 17:10:20', 1),
(4, 21, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 25, '1', '650000', '0', 3, '19500', '2013-03-24 17:17:00', 1),
(5, 22, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 26, '2', '650000', '0', 1, '13000', '2013-03-24 17:21:44', 1),
(6, 23, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 28, '1', '650000', '0', 1, '6500', '2013-03-25 04:13:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `salesreturns_code_gen` (
  `salesreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_code` int(11) NOT NULL,
  PRIMARY KEY (`salesreturn_code_gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `salesreturns_code_gen`
--

INSERT INTO `salesreturns_code_gen` (`salesreturn_code_gen_id`, `sales_code`) VALUES
(1, 11),
(2, 10),
(3, 12),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(8, 13),
(9, 26);

-- --------------------------------------------------------

--
-- Table structure for table `sales_code_get`
--

CREATE TABLE IF NOT EXISTS `sales_code_get` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sales_code_get`
--

INSERT INTO `sales_code_get` (`gen_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_ledger`
--

INSERT INTO `sales_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Inv No:BDINV0002/2013', '1287000', '', '1287000', 6, '1', '2013-03-24 17:06:28'),
(2, 'Inv No:BDINV0003/2013', '1852500', '', '1852500', 6, '1', '2013-03-24 17:10:47'),
(3, 'Inv No:BDINV0004/2013', '630500', '', '630500', 6, '1', '2013-03-24 17:17:18'),
(4, '', '1287000', '', '1287000', 6, '1', '2013-03-24 17:21:58');

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
  `client_id` int(10) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_rep_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sales_receipt`
--

INSERT INTO `sales_receipt` (`sales_rep_id`, `receipt_no`, `amnt_rec`, `currency_code`, `curr_rate`, `mop`, `client_id`, `sales_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'BDSR0001/2013', '800000', '6', '1', 'Cheque', 1, 1, 1, '2013-02-23 16:24:23', 0),
(2, 'BDSR0002/2013', '2400000', '6', '1', 'Cheque', 2, 2, 1, '2013-02-23 19:39:07', 0),
(3, 'BDSR0003/2013', '5800', '6', '1', 'Cash', 1, 3, 1, '2013-02-24 21:35:12', 0),
(4, 'BDSR0004/2013', '1000000', '6', '1', 'Cash', 1, 7, 1, '2013-02-25 05:32:03', 0),
(5, 'BDSR0005/2013', '1000000', '6', '1', 'Cash', 1, 6, 1, '2013-02-25 05:32:36', 0),
(6, 'BDSR0006/2013', '1000000', '6', '1', 'Cash', 1, 5, 1, '2013-02-25 05:32:50', 0),
(7, 'BDSR0007/2013', '6435000', '6', '1', 'Cheque', 1, 16, 1, '2013-03-10 18:45:53', 0),
(8, 'BDSR0008/2013', '1000000', '6', '1', 'Cash', 4, 18, 1, '2013-03-24 16:36:15', 0),
(9, 'BDSR0009/2013', '700000', '6', '1', 'Cash', 4, 19, 1, '2013-03-24 16:45:33', 0),
(10, 'BDSR0010/2013', '700000', '6', '1', 'Cash', 4, 20, 1, '2013-03-24 16:52:09', 0),
(11, 'BDSR0011/2013', '1000000', '6', '1', 'Cash', 4, 23, 1, '2013-03-24 17:09:33', 0),
(12, 'BDSR0012/2013', '1000000', '6', '1', 'Cash', 4, 24, 1, '2013-03-25 04:27:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE IF NOT EXISTS `sales_returns` (
  `sales_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `purchase_order_id` int(10) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `client_id` int(10) NOT NULL,
  `salesreturn_code` int(11) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `sales_rep` int(10) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `sales_return_quantity` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_returns_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales_returns`
--

INSERT INTO `sales_returns` (`sales_returns_id`, `product_code`, `product_id`, `purchase_order_id`, `selling_price`, `client_id`, `salesreturn_code`, `sales_code`, `sales_rep`, `invoice_id`, `sales_return_quantity`, `desc`, `date_returned`) VALUES
(1, 'HA-22', 1, 30, '650000', 1, 7, 13, 0, 8, '1', 'defect', '2013-03-02 12:40:08'),
(2, 'HA-22', 1, 30, '650000', 1, 8, 13, 0, 8, '3', 'defect', '2013-03-02 12:40:56'),
(3, 'HA-22', 1, 30, '650000', 4, 9, 26, 0, 5, '2', 'defect', '2013-03-25 04:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_ledger`
--

CREATE TABLE IF NOT EXISTS `sales_return_ledger` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `transactions` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sales_return_ledger`
--

INSERT INTO `sales_return_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Inv No:BDINV0001/2013', '2400000', '', '2400000', 6, '1', '2013-02-23 19:33:08'),
(2, 'Inv No:BDINV0001/2013', '5800', '', '5800', 6, '1', '2013-02-24 21:32:06'),
(3, 'Inv No:BDINV0002/2013', '1000000', '', '1000000', 6, '1', '2013-02-25 05:00:55'),
(4, 'Inv No:BDINV0003/2013', '1000000', '', '1000000', 6, '1', '2013-02-25 05:01:57'),
(5, 'Credit Note No:BDCNT0001/2013', '-1000000', '1000000', '', 6, '1', '2013-02-25 05:15:29'),
(6, 'Credit Note No:BDCNT0002/2013', '-1000000', '1000000', '', 6, '1', '2013-02-25 05:16:17'),
(7, 'Inv No:BDINV0004/2013', '1000000', '', '1000000', 6, '1', '2013-02-25 05:24:25'),
(8, 'Inv No:BDINV0005/2013', '2000000', '', '2000000', 6, '1', '2013-02-25 15:50:34'),
(9, 'Inv No:BDINV0006/2013', '3000000', '', '3000000', 6, '1', '2013-02-25 15:55:02');

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

--
-- Dumping data for table `sale_fixed_asset_payment`
--


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

--
-- Dumping data for table `savings`
--


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

--
-- Dumping data for table `savings_log`
--


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
  `remarks` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`shares_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shares`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipper_name`, `address`, `town`, `phone`, `email`, `status`) VALUES
(1, 'Jommo Kenyatta Airport', '2345', 'Nairobi', '0723426754', 'jommo@jkia.co.ke', 2012),
(3, 'Eldoret International Airport', '768', 'Eldoret', '0723426754', 'eldoret@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stockreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `stockreturns_code_gen` (
  `stockreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`stockreturn_code_gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stockreturns_code_gen`
--

INSERT INTO `stockreturns_code_gen` (`stockreturn_code_gen_id`, `order_code`) VALUES
(1, 13),
(2, 33),
(3, 34),
(4, 48),
(5, 46);

-- --------------------------------------------------------

--
-- Table structure for table `stock_payments`
--

CREATE TABLE IF NOT EXISTS `stock_payments` (
  `stock_payments_id` int(10) NOT NULL AUTO_INCREMENT,
  `lpo_no` varchar(100) NOT NULL,
  `cost_of_stock` varchar(100) NOT NULL,
  `amnt_paid` varchar(100) NOT NULL,
  `freight_charges` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `exchange_rate` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`stock_payments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stock_payments`
--

INSERT INTO `stock_payments` (`stock_payments_id`, `lpo_no`, `cost_of_stock`, `amnt_paid`, `freight_charges`, `currency`, `exchange_rate`, `mop`, `supplier_id`, `order_code`, `user_id`, `date_paid`, `status`) VALUES
(1, 'BD0001/2013', '690', '300', '', '2', '88', 'Cash', 1, 43, 1, '2013-03-24 15:22:48', 0),
(2, 'BD0001/2013', '690', '390', '', '2', '78', 'Cash', 1, 43, 1, '2013-03-24 15:23:26', 0),
(3, 'BD0001/2013', '610', '150', '', '2', '86', 'Cash', 1, 44, 1, '2013-03-24 15:26:39', 0),
(4, 'BD0001/2013', '610', '200', '', '2', '87', 'Cheque', 1, 44, 1, '2013-03-24 15:27:30', 0),
(5, 'BD0001/2013', '610', '260', '', '2', '89', 'Cash', 1, 44, 1, '2013-03-24 15:28:17', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stock_returns`
--

INSERT INTO `stock_returns` (`stock_returns_id`, `product_code`, `purchase_order_id`, `product_id`, `vendor_price`, `currency`, `curr_rate`, `supplier_id`, `stockreturn_code`, `order_code`, `user_id`, `stock_return_quantity`, `reason`, `date_returned`) VALUES
(1, 'RF003', 13, 2, '210', '2', '89', 1, 4, 48, 1, '1', 'defect', '2013-03-25 03:57:37'),
(2, 'HA-22', 12, 1, '900', '2', '89', 3, 5, 46, 1, '4', 'defect', '2013-03-25 03:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat_terminologies`
--

CREATE TABLE IF NOT EXISTS `sub_cat_terminologies` (
  `sub_cat_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `minor_terminology_id` int(11) NOT NULL,
  `sub_cat_teminology` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_cat_terminology_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_cat_terminologies`
--

INSERT INTO `sub_cat_terminologies` (`sub_cat_terminology_id`, `minor_terminology_id`, `sub_cat_teminology`) VALUES
(1, 3, 'Furnitures'),
(2, 5, 'Loans'),
(3, 8, 'Rent Paid'),
(4, 4, 'Inventory');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `cont_person`, `country`, `postal`, `town`, `phone`, `email`, `date_reg`) VALUES
(1, ' Clindiag Systems Co. Ltd', 'Sara Wan', 'United State of America', 'Nanjing', 'Nanjing', '09089000000222', 'sara@clindiag.com', '2013-02-23 15:19:00'),
(2, ' Turk lab', 'Mr. Zankora', 'Tanzania', 'nunjagg', 'Istanbul', '009877665554', 'turklab@turklab.com', '2013-02-23 15:20:43'),
(3, ' Crown Health Care Kenya Ltd', 'Grace', 'Kenya', 'Westlands', 'Nairobi', '0788654222', 'grace@crownhealth.com', '2013-02-23 15:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE IF NOT EXISTS `supplier_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `order_code` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`transaction_id`, `supplier_id`, `order_code`, `transaction`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 1, 44, 'LPO No:BD0001/2013', 2, '85', '610', '2013-03-24 15:26:13'),
(2, 1, 44, 'Payment against LPO NoBD0001/2013', 2, '86', '-150', '2013-03-24 15:26:39'),
(3, 1, 44, 'Payment against LPO NoBD0001/2013', 2, '87', '-200', '2013-03-24 15:27:30'),
(4, 1, 44, 'Payment against LPO NoBD0001/2013', 2, '89', '-260', '2013-03-24 15:28:17'),
(5, 3, 46, 'LPO No:BD0002/2013', 2, '89', '4400', '2013-03-24 21:36:40'),
(6, 1, 48, 'LPO No:BD0003/2013', 2, '89', '770', '2013-03-25 03:36:38'),
(7, 1, 0, 'Debit Note No:BDDN0005/2013', 2, '89', '-210', '2013-03-25 03:57:39'),
(8, 3, 0, 'Debit Note No:BDDN0006/2013', 2, '89', '-3600', '2013-03-25 03:59:10');

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

--
-- Dumping data for table `taxblocs`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_cash_sales`
--

CREATE TABLE IF NOT EXISTS `temp_cash_sales` (
  `cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`cash_sales_id`),
  KEY `supplier_id` (`client_id`,`product_id`),
  KEY `shipping_agent_id` (`currency_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_cash_sales`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_purchase_order`
--

INSERT INTO `temp_purchase_order` (`temp_purchase_order_id`, `supplier_id`, `user_id`, `shipping_agent_id`, `payment_term_id`, `currency_code`, `curr_rate`, `comments`, `product_id`, `product_code`, `order_code`, `quantity`, `vendor_prc`, `ttl`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 'Cheque', '2', '89', 'dsdsd', 2, 'RF003', 48, '1', '210', '', '2013-03-25 03:36:36', 1);

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

--
-- Dumping data for table `temp_quote`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_rfq`
--

INSERT INTO `temp_rfq` (`temp_rfq_id`, `supplier_id`, `user_id`, `product_id`, `product_code`, `rfq_code`, `quantity`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 'HA-22', 2, '8', '2013-03-24 17:31:31', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `temp_sales`
--

INSERT INTO `temp_sales` (`temp_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `purchase_order_id`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(23, 4, 1, 0, '6', '1', 30, 1, 'HA-22', 28, '1', '650000', '0', 1, '6500', '2013-03-25 04:13:49', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_sales_returns`
--

INSERT INTO `temp_sales_returns` (`temp_sales_returns_id`, `product_code`, `product_id`, `purchase_order_id`, `selling_price`, `client_id`, `salesreturn_code`, `sales_code`, `sales_rep`, `invoice_id`, `sales_return_quantity`, `desc`, `date_returned`) VALUES
(1, 'HA-22', 1, 30, '650000', 4, 9, 26, 0, 5, '2', 'defect', '2013-03-25 04:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `temp_stock_returns`
--

CREATE TABLE IF NOT EXISTS `temp_stock_returns` (
  `temp_stock_returns_id` int(10) NOT NULL AUTO_INCREMENT,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `temp_stock_returns`
--

INSERT INTO `temp_stock_returns` (`temp_stock_returns_id`, `product_code`, `purchase_order_id`, `product_id`, `vendor_price`, `currency`, `curr_rate`, `supplier_id`, `stockreturn_code`, `order_code`, `user_id`, `stock_return_quantity`, `reason`, `date_returned`) VALUES
(1, 'RF003', 13, 2, '210', '2', '89', 1, 4, 48, 1, '1', 'defect', '2013-03-25 03:57:37'),
(2, 'HA-22', 12, 1, '900', '2', '89', 3, 5, 46, 1, '4', 'defect', '2013-03-25 03:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `group_id`, `username`, `password`, `date_created`, `status`) VALUES
(1, 9, 1, 'osero  ', 'osero', '2013-02-11 04:19:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`group_id`, `group_name`, `description`, `status`) VALUES
(1, 'Super Administrator', '', '0'),
(2, 'Administrator', '', '0'),
(3, 'Sales Representative', '', '0'),
(5, 'Normal User', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE IF NOT EXISTS `vat` (
  `vat_id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_percentage` varchar(100) NOT NULL,
  PRIMARY KEY (`vat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`vat_id`, `vat_percentage`) VALUES
(1, '16');

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

--
-- Dumping data for table `withdrawn_dividends`
--

