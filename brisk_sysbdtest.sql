-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 12:24 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `accounts_payables_ledger`
--

INSERT INTO `accounts_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'LPO No:BD0001/2013', '11700', '', '11700', 2, '84.1', '2013-05-18 17:54:53', 5),
(2, 'Cash ( Against PO No:BD0001/2013)', '-9000', '9000', '', 2, '84.1', '2013-05-18 17:57:18', 0),
(3, 'Cash ( Against PO No:BD0001/2013)', '-2070', '2070', '', 2, '84.1', '2013-05-18 18:17:53', 0),
(4, 'Cash ( Against PO No:BD0001/2013)', '-630', '630', '', 2, '84.1', '2013-05-18 18:19:52', 0),
(5, 'LPO No:BD0002/2013', '23021', '', '23021', 2, '84.1', '2013-05-18 18:52:57', 6),
(6, '', '-1000000  ', '1000000  ', '', 6, '1', '2013-05-20 09:35:42', 0),
(7, 'LPO No:BD0003/2013', '5724', '', '5724', 2, '84.1', '2013-05-21 19:16:30', 8),
(8, 'LPO No:BD0004/2013', '12613', '', '12613', 2, '84.1', '2013-05-21 19:45:58', 9),
(9, 'Debit Note No:BDDN0002/2013', '-4030', '4030', '', 2, '84.1', '2013-05-21 20:11:21', 0),
(10, 'Debit Note No:BDDN0003/2013', '-540', '540', '', 2, '84.1', '2013-05-21 20:12:42', 0),
(11, 'Cash payment of Fixed Asset Vehicle', '-1000000', '1000000', '', 6, '1', '2013-05-22 20:30:29', 0),
(12, 'Purchase of fixed asset Vehicle', '1000000', '', '1000000', 6, '1', '2013-05-22 20:30:29', 0),
(13, 'Purchase of fixed asset Chairs', '30000', '', '30000', 6, '1', '2013-05-22 20:44:27', 0),
(14, 'Payment for purchase of fixed asset ', '10000', '', '10000', 6, '1', '2013-05-23 08:14:01', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `accounts_receivables_ledger`
--

INSERT INTO `accounts_receivables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Inv No:BDINV0001/2013', '2000000', '2000000', '', 6, '1', '2013-05-18 18:13:52', 0),
(2, 'Debit Note No:BDDN0001/2013', '4500', '4500', '', 2, '84.1', '2013-05-18 18:45:19', 0),
(3, 'Inv No:BDINV0002/2013', '0', '0', '', 6, '1', '2013-05-18 18:50:29', 0),
(4, 'Inv No:BDINV0003/2013', '900000', '900000', '', 6, '1', '2013-05-18 18:54:52', 0),
(5, 'Receipt No:BDSR0001/2013', '-600000', '', '600000', 6, '1', '2013-05-18 18:58:36', 0),
(6, 'Cancelation Of Invoice BDINV0002/2013', '-0', '', '0', 6, '1', '2013-05-18 19:09:45', 0),
(7, 'Inv No:BDINV0004/2013', '4950000', '4950000', '', 6, '1', '2013-05-18 19:13:43', 0),
(8, 'Cash Receipt No:BDINV0004/2013', '-2000000', '', '2000000', 6, '1', '2013-05-18 19:13:43', 0),
(9, 'Credit Note No:BDCNT0001/2013', '-1000000', '', '1000000', 6, '1', '2013-05-18 19:14:52', 0),
(10, 'Cash Sales (Receipt No:BDCS0001/2013)', '1000000', '1000000', '', 6, '1', '2013-05-18 19:16:54', 0),
(11, 'Cash Sales Receipt (Receipt No:BDCS0001/2013)', '-1000000', '', '1000000', 6, '1', '2013-05-18 19:16:54', 0),
(12, 'Inv No:BDINV0005/2013', '4950000', '4950000', '', 6, '1', '2013-05-20 04:59:55', 0),
(13, 'Receipt No:BDSR0002/2013', '-4000000', '', '4000000', 6, '1', '2013-05-20 05:02:44', 0),
(14, 'Inv No:BDINV0006/2013', '5940000', '5940000', '', 6, '1', '2013-05-20 05:14:45', 0),
(15, 'Receipt No:BDSR0003/2013', '-5000000', '', '5000000', 6, '1', '2013-05-20 05:15:46', 0),
(16, 'Inv No:BDINV0007/2013', '3960000', '3960000', '', 6, '1', '2013-05-20 06:26:40', 0),
(24, 'Doubtful Debts for Invoice BDINV0004/2013', '-2950000', '', '2950000', 6, '1', '2013-05-20 23:43:04', 4),
(23, 'Write Off Bad debts for Inv: ', '-940000', '', '940000', 6, '1', '2013-05-20 23:11:37', 9),
(21, 'Doubtful Debts for Invoice BDINV0005/2013', '-950000', '', '950000', 6, '1', '2013-05-20 22:38:33', 8),
(22, 'Doubtful Debts Recovery for Inv: ', '950000', '950000', '', 6, '1', '2013-05-20 22:49:56', 8),
(25, 'Doubtful Debts Recovery for Inv: ', '2950000', '2950000', '', 6, '1', '2013-05-20 23:43:34', 4),
(26, 'Write Off Bad debts for Inv: BDINV0003/2013', '-300000', '', '300000', 6, '1', '2013-05-20 23:48:59', 3),
(27, 'Doubtful Debts Recovery for Inv: BDINV0007/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:39:17', 10),
(28, 'Inv No:BDINV0008/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:40:34', 0),
(29, 'Doubtful Debts for Invoice BDINV0008/2013', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:41:05', 11),
(30, 'Write Off Bad debts for Inv: BDINV0008/2013', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:41:46', 11),
(31, 'Inv No:BDINV0009/2013', '17820', '17820', '', 6, '1', '2013-05-21 19:42:17', 0),
(32, 'Cash Sales (Receipt No:BDCS0002/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 19:52:15', 0),
(33, 'Cash Sales Receipt (Receipt No:BDCS0002/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 19:52:15', 0),
(34, 'Credit Note No:BDCNT0002/2013', '-6000', '', '6000', 6, '1', '2013-05-21 19:59:30', 0),
(35, 'Credit Note No:BDCNT0003/2013', '-2000000', '', '2000000', 6, '1', '2013-05-21 20:03:53', 0),
(36, 'Credit Note No:BDCNT0004/2013', '-3000000', '', '3000000', 6, '1', '2013-05-21 20:05:34', 0),
(37, 'Inv No:BDINV0010/2013', '1960000', '1960000', '', 6, '1', '2013-05-21 20:27:52', 0),
(38, 'Credit Note No:BDCNT0005/2013', '-1000000', '', '1000000', 6, '1', '2013-05-21 20:31:17', 0),
(39, 'Cash Sales (Receipt No:BDCS0003/2013)', '2970000', '2970000', '', 6, '1', '2013-05-21 22:33:27', 0),
(40, 'Cash Sales Receipt (Receipt No:BDCS0003/2013)', '-2970000', '', '2970000', 6, '1', '2013-05-21 22:33:27', 0),
(41, 'Cash Sales (Receipt No:BDCS0004/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 22:37:24', 0),
(42, 'Cash Sales Receipt (Receipt No:BDCS0004/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 22:37:24', 0),
(43, 'Cash Sales (Receipt No:BDCS0005/2013)', '2000000', '2000000', '', 6, '1', '2013-05-21 22:42:12', 0),
(44, 'Cash Sales Receipt (Receipt No:BDCS0005/2013)', '-2000000', '', '2000000', 6, '1', '2013-05-21 22:42:12', 0),
(45, 'Cash Sales (Receipt No:BDCS0006/2013)', '5880', '5880', '', 6, '1', '2013-05-21 22:44:55', 0),
(46, 'Cash Sales Receipt (Receipt No:BDCS0006/2013)', '-5880', '', '5880', 6, '1', '2013-05-21 22:44:55', 0),
(47, 'Doubtful Debts for Invoice BDINV0010/2013', '-1960000', '', '1960000', 6, '1', '2013-05-22 19:28:35', 14),
(48, 'Doubtful Debts Recovery for Inv: BDINV0010/2013', '1960000', '1960000', '', 6, '1', '2013-05-22 19:35:20', 14),
(49, 'Inv No:BDINV0011/2013', '1980000', '1980000', '', 6, '1', '2013-05-22 19:42:42', 0),
(50, 'Receipt No:BDSR0004/2013', '-500000', '', '500000', 6, '1', '2013-05-22 19:44:59', 0),
(52, 'Inv No:BDINV0012/2013', '4950000', '4950000', '', 6, '1', '2013-05-23 06:22:07', 0),
(53, 'Inv No:BDINV0013/2013', '12000000', '12000000', '', 6, '1', '2013-05-23 06:26:36', 0),
(54, 'Inv No:BDINV0014/2013', '35640', '35640', '', 6, '1', '2013-05-23 06:40:59', 0),
(55, 'Inv No:BDINV0015/2013', '5940', '5940', '', 6, '1', '2013-05-23 06:42:07', 0),
(56, 'Client Opening Balance', '10000', '10000', '', 6, '1', '2013-05-23 07:02:47', 0),
(57, 'Client Wajir Hospital Opening Bal Payment', '-5000', '', '5000', 6, '1', '2013-05-23 08:00:57', 0),
(58, 'Client Wajir Hospital Opening Bal Payment', '-5000', '', '5000', 6, '1', '2013-05-23 08:05:04', 0),
(59, 'Client Opening Balance', '90000', '90000', '', 6, '1', '2013-05-23 08:14:43', 0),
(60, 'Client Topsoftchoice Limited (Topsoft) Opening Bal Payment', '-90000', '', '90000', 6, '1', '2013-05-23 08:15:30', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `all_rfq`
--

INSERT INTO `all_rfq` (`all_rfq_id`, `rfq_no`, `supplier_id`, `rfq_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'RFQ0001/2013', 1, 3, 10, '2013-05-18 13:48:17', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 10, '2013-05-18 09:24:53', 'Signed out of the system'),
(2, 0, '2013-05-18 09:24:57', 'Signed out of the system'),
(3, 0, '2013-05-18 09:25:01', 'Signed out of the system'),
(4, 10, '2013-05-18 11:25:46', 'Logged into the system'),
(5, 10, '2013-05-18 11:30:07', 'Signed out of the system'),
(6, 10, '2013-05-18 11:30:21', 'Logged into the system'),
(7, 10, '2013-05-18 12:00:12', 'Updated Company Contact Details'),
(8, 2, '2013-05-18 12:10:37', 'Created a new employee by the name  Collins  Ouma  Ouka into the system'),
(9, 2, '2013-05-18 12:35:51', 'Created a user by the name   into the system'),
(10, 10, '2013-05-18 12:35:56', 'Signed out of the system'),
(11, 16, '2013-05-18 12:36:03', 'Logged into the system'),
(12, 16, '2013-05-18 12:36:36', 'Signed out of the system'),
(13, 10, '2013-05-18 12:36:42', 'Logged into the system'),
(14, 10, '2013-05-18 12:40:40', 'Created a client Kheyba Hospital into the system'),
(15, 10, '2013-05-18 12:49:06', 'Created a shipper Kenya Airways into the system'),
(16, 10, '2013-05-18 13:26:39', 'Requested for a quotation'),
(17, 10, '2013-05-18 13:32:48', 'Recorded Loan Received from FCB Bank2 into the system'),
(18, 10, '2013-05-18 13:40:22', 'Requested for a quotation'),
(19, 10, '2013-05-18 13:40:39', 'Requested for a quotation'),
(20, 10, '2013-05-18 13:48:17', 'Canceled RFQ '),
(21, 10, '2013-05-18 13:48:58', 'Requested for a quotation'),
(22, 0, '2013-05-18 13:55:22', 'edited product Fully Auto Hematology Analyzer Machine'),
(23, 10, '2013-05-18 13:57:10', 'Updated his/her own profile'),
(24, 10, '2013-05-18 13:57:17', 'Generated a purchase order BD0001/2013 '),
(25, 10, '2013-05-18 14:04:51', 'Generated a purchase order BD0002/2013 '),
(26, 10, '2013-05-18 16:39:34', 'Generated a purchase order BD0003/2013 '),
(27, 10, '2013-05-18 17:07:33', 'Logged into the system'),
(28, 10, '2013-05-18 17:53:01', 'Generated a purchase order BD0001/2013 '),
(29, 10, '2013-05-18 17:54:53', 'Generated a purchase order BD0001/2013 '),
(30, 10, '2013-05-18 17:56:21', 'Recorded Loan Received from FCB Bank2 into the system'),
(31, 10, '2013-05-18 18:11:49', 'Recorded an expense Salary worth 1000000 into the system'),
(32, 10, '2013-05-18 18:13:17', 'Generated Invoice'),
(33, 10, '2013-05-18 18:13:39', 'Updates Sales Transactions'),
(34, 10, '2013-05-18 18:13:52', 'Generated a invoice BDINV0001/2013 '),
(35, 10, '2013-05-18 18:50:18', 'Generated Invoice'),
(36, 10, '2013-05-18 18:50:29', 'Generated a invoice BDINV0002/2013 '),
(37, 10, '2013-05-18 18:52:57', 'Generated a purchase order BD0002/2013 '),
(38, 10, '2013-05-18 18:54:24', 'Generated Invoice'),
(39, 10, '2013-05-18 18:54:39', 'Updates Sales Transactions'),
(40, 10, '2013-05-18 18:54:52', 'Generated a invoice BDINV0003/2013 '),
(41, 10, '2013-05-18 19:09:45', 'Canceled Purchase Order '),
(42, 10, '2013-05-18 19:12:54', 'Generated Invoice'),
(43, 10, '2013-05-18 19:13:17', 'Updates Sales Transactions'),
(44, 10, '2013-05-18 19:13:43', 'Generated a invoice BDINV0004/2013 '),
(45, 10, '2013-05-18 19:16:47', 'Cash Sales'),
(46, 10, '2013-05-19 21:26:48', 'Logged into the system'),
(47, 10, '2013-05-20 04:55:23', 'Generated Invoice'),
(48, 10, '2013-05-20 04:59:34', 'Generated Invoice'),
(49, 10, '2013-05-20 04:59:55', 'Generated a invoice BDINV0005/2013 '),
(50, 10, '2013-05-20 05:14:41', 'Generated Invoice'),
(51, 10, '2013-05-20 05:14:45', 'Generated a invoice BDINV0006/2013 '),
(52, 16, '2013-05-20 06:03:53', 'Logged into the system'),
(53, 10, '2013-05-20 06:13:51', 'Signed out of the system'),
(54, 10, '2013-05-20 06:13:58', 'Logged into the system'),
(55, 10, '2013-05-20 06:14:26', 'Logged into the system'),
(56, 10, '2013-05-20 06:15:00', 'Logged into the system'),
(57, 16, '2013-05-20 06:15:35', 'Signed out of the system'),
(58, 10, '2013-05-20 06:15:40', 'Logged into the system'),
(59, 10, '2013-05-20 06:26:37', 'Generated Invoice'),
(60, 10, '2013-05-20 06:26:40', 'Generated a invoice BDINV0007/2013 '),
(61, 10, '2013-05-20 09:35:42', 'edited accounting terminologies details for '),
(62, 10, '2013-05-20 11:29:24', 'Signed out of the system'),
(63, 0, '2013-05-20 11:29:27', 'Signed out of the system'),
(64, 10, '2013-05-20 15:26:06', 'Logged into the system'),
(65, 10, '2013-05-20 15:31:36', 'Updated his/her own profile'),
(66, 0, '2013-05-20 15:33:05', 'edited product Fully Auto Hematology Analyzer Machine'),
(67, 10, '2013-05-20 16:14:15', 'Logged into the system'),
(68, 10, '2013-05-20 18:08:55', 'Signed out of the system'),
(69, 10, '2013-05-20 18:09:01', 'Logged into the system'),
(70, 10, '2013-05-20 18:11:02', 'Logged into the system'),
(71, 10, '2013-05-21 00:41:08', 'Signed out of the system'),
(72, 0, '2013-05-21 00:41:19', 'Signed out of the system'),
(73, 10, '2013-05-21 08:38:07', 'Logged into the system'),
(74, 10, '2013-05-21 08:40:29', 'Generated Invoice'),
(75, 10, '2013-05-21 08:40:34', 'Generated a invoice BDINV0008/2013 '),
(76, 10, '2013-05-21 08:45:27', 'Signed out of the system'),
(77, 10, '2013-05-21 10:08:47', 'Logged into the system'),
(78, 10, '2013-05-21 10:11:57', 'Logged into the system'),
(79, 10, '2013-05-21 10:34:35', 'Logged into the system'),
(80, 10, '2013-05-21 12:33:53', 'Signed out of the system'),
(81, 10, '2013-05-21 18:30:07', 'Logged into the system'),
(82, 10, '2013-05-21 18:53:17', 'Logged into the system'),
(83, 0, '2013-05-21 19:06:31', 'Updated Sub Module Details'),
(84, 10, '2013-05-21 19:16:30', 'Generated a purchase order BD0003/2013 '),
(85, 0, '2013-05-21 19:18:21', 'Received products for P.O: BD0003/2013 into the system'),
(86, 10, '2013-05-21 19:42:15', 'Generated Invoice'),
(87, 10, '2013-05-21 19:42:17', 'Generated a invoice BDINV0009/2013 '),
(88, 10, '2013-05-21 19:45:58', 'Generated a purchase order BD0004/2013 '),
(89, 0, '2013-05-21 19:46:29', 'Received products for P.O: BD0004/2013 into the system'),
(90, 10, '2013-05-21 19:52:13', 'Cash Sales'),
(91, 10, '2013-05-21 20:27:49', 'Generated Invoice'),
(92, 10, '2013-05-21 20:27:52', 'Generated a invoice BDINV0010/2013 '),
(93, 10, '2013-05-21 21:02:07', 'Signed out of the system'),
(94, 10, '2013-05-21 22:32:01', 'Logged into the system'),
(95, 10, '2013-05-21 22:33:25', 'Cash Sales'),
(96, 10, '2013-05-21 22:35:53', 'Cash Sales'),
(97, 10, '2013-05-21 22:42:03', 'Cash Sales'),
(98, 10, '2013-05-21 22:44:02', 'Cash Sales'),
(99, 10, '2013-05-21 23:55:57', 'Signed out of the system'),
(100, 10, '2013-05-22 19:24:10', 'Logged into the system'),
(101, 10, '2013-05-22 19:42:26', 'Generated Invoice'),
(102, 10, '2013-05-22 19:42:42', 'Generated a invoice BDINV0011/2013 '),
(103, 10, '2013-05-22 20:09:34', 'Recorded an expense Office rent worth 10000 into the system'),
(104, 10, '2013-05-22 20:23:29', 'Recorded an petty cash income 1st Estab worth 30000 into the system'),
(105, 10, '2013-05-22 20:24:12', 'Recorded an petty cash expense office tea worth 300 into the system'),
(106, 10, '2013-05-22 20:47:31', 'Created a client hassan into the system'),
(107, 10, '2013-05-23 05:56:59', 'Signed out of the system'),
(108, 10, '2013-05-23 05:57:09', 'Logged into the system'),
(109, 10, '2013-05-23 06:16:51', 'Recorded an petty cash income 2nd Establishment worth 60000 into the system'),
(110, 10, '2013-05-23 06:22:04', 'Generated Invoice'),
(111, 10, '2013-05-23 06:22:07', 'Generated a invoice BDINV0012/2013 '),
(112, 10, '2013-05-23 06:26:34', 'Generated Invoice'),
(113, 10, '2013-05-23 06:26:36', 'Generated a invoice BDINV0013/2013 '),
(114, 10, '2013-05-23 06:40:56', 'Generated Invoice'),
(115, 10, '2013-05-23 06:40:59', 'Generated a invoice BDINV0014/2013 '),
(116, 10, '2013-05-23 06:42:05', 'Generated Invoice'),
(117, 10, '2013-05-23 06:42:07', 'Generated a invoice BDINV0015/2013 ');

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
(1, 10, 1, '3960000', 'not collectable', '6', '1', '2013-05-20 18:24:44', 0),
(2, 3, 3, '300000', 'dd', '6', '1', '2013-05-20 18:35:02', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bad_debts_ledger`
--

INSERT INTO `bad_debts_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Write Off Bad Debdts for Inv:', '940000', '940000', '', 6, '1', '2013-05-20 23:11:37'),
(2, 'Write Off Bad Debdts for Inv:BDINV0003/2013', '300000', '300000', '', 6, '1', '2013-05-20 23:48:59'),
(3, 'Write Off Bad Debdts for Inv:BDINV0008/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:41:46');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bank_branches`
--


-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `benefit_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `benefit_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`benefit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`benefit_id`, `benefit_name`, `benefit_amount`) VALUES
(1, 'General Allowance', '0'),
(2, 'COLA Allowance', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `benefit_log`
--

INSERT INTO `benefit_log` (`benefit_log_id`, `payrol_basic_log_id`, `emp_id`, `banefit_name`, `benefit_amount`, `benefit_date`) VALUES
(1, 1, 16, 'COLA Allowance', '0.00', '2013-05-20 04:36:08'),
(2, 1, 16, 'General Allowance', '0.00', '2013-05-20 04:36:08'),
(3, 2, 16, 'COLA Allowance', '0.00', '2013-05-20 04:47:40'),
(4, 2, 16, 'General Allowance', '0.00', '2013-05-20 04:47:40'),
(5, 3, 16, 'COLA Allowance', '0.00', '2013-05-20 04:52:24'),
(6, 3, 16, 'General Allowance', '0.00', '2013-05-20 04:52:24'),
(7, 4, 16, 'COLA Allowance', '0.00', '2013-05-20 05:03:45'),
(8, 4, 16, 'General Allowance', '0.00', '2013-05-20 05:03:45'),
(9, 5, 16, 'COLA Allowance', '0.00', '2013-05-20 05:19:21'),
(10, 5, 16, 'General Allowance', '0.00', '2013-05-20 05:19:21'),
(11, 6, 9, 'COLA Allowance', '0.00', '2013-05-20 05:26:28'),
(12, 6, 9, 'General Allowance', '0.00', '2013-05-20 05:26:28'),
(13, 7, 9, 'COLA Allowance', '0.00', '2013-05-20 05:33:31'),
(14, 7, 9, 'General Allowance', '0.00', '2013-05-20 05:33:31'),
(15, 8, 13, 'COLA Allowance', '0.00', '2013-05-20 05:34:01'),
(16, 8, 13, 'General Allowance', '0.00', '2013-05-20 05:34:01'),
(17, 9, 16, 'COLA Allowance', '0.00', '2013-05-20 05:34:15'),
(18, 9, 16, 'General Allowance', '0.00', '2013-05-20 05:34:15'),
(19, 10, 9, 'COLA Allowance', '0.00', '2013-05-20 05:35:21'),
(20, 10, 9, 'General Allowance', '0.00', '2013-05-20 05:35:21'),
(21, 11, 9, 'COLA Allowance', '0.00', '2013-05-20 05:38:47'),
(22, 11, 9, 'General Allowance', '0.00', '2013-05-20 05:38:47'),
(23, 12, 9, 'COLA Allowance', '0.00', '2013-05-20 05:39:56'),
(24, 12, 9, 'General Allowance', '0.00', '2013-05-20 05:39:56'),
(25, 13, 9, 'COLA Allowance', '0.00', '2013-05-20 05:40:17'),
(26, 13, 9, 'General Allowance', '0.00', '2013-05-20 05:40:17'),
(27, 14, 9, 'COLA Allowance', '0.00', '2013-05-20 05:43:16'),
(28, 14, 9, 'General Allowance', '0.00', '2013-05-20 05:43:16'),
(29, 15, 16, 'COLA Allowance', '0.00', '2013-05-20 15:28:50'),
(30, 15, 16, 'General Allowance', '0.00', '2013-05-20 15:28:50');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cancelled_all_rfqs`
--

INSERT INTO `cancelled_all_rfqs` (`cancelled_all_rfqs_id`, `rfq_no`, `rfq_code`, `reasons`, `status`) VALUES
(1, 'RFQ0001/2013', 3, 'dadly generted', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_invoices`
--

CREATE TABLE IF NOT EXISTS `cancelled_invoices` (
  `cancelled_invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) NOT NULL,
  `sales_code` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cancelled_invoices`
--

INSERT INTO `cancelled_invoices` (`cancelled_invoice_id`, `invoice_no`, `sales_code`, `reasons`, `status`) VALUES
(1, 'BDINV0002/2013', 2, 'Poorly generated', 0);

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

--
-- Dumping data for table `cancelled_lpo`
--


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

--
-- Dumping data for table `cancelled_quotations`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `cash_ledger`
--

INSERT INTO `cash_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Loan Received from FCB Bank2', '2000000', '2000000', '', 6, '1', '2013-05-18 17:56:21'),
(2, 'Payment against LPO NoBD0001/2013', '-9000', '', '9000', 2, '84.1', '2013-05-18 17:57:18'),
(3, 'Cash Expenses Paid on Salary', '-1000000', '', '1000000', 6, '1', '2013-05-18 18:11:49'),
(4, 'Payment against LPO NoBD0001/2013', '-2070', '', '2070', 2, '84.1', '2013-05-18 18:17:53'),
(5, 'Payment against LPO NoBD0001/2013', '-630', '', '630', 2, '84.1', '2013-05-18 18:19:52'),
(6, 'Sales receipt against Receipt No:BDSR0001/2013', '600000', '600000', '', 6, '1', '2013-05-18 18:58:36'),
(7, 'Sale Payment against (Inv No:BDINV0004/2013)', '2000000', '2000000', '', 6, '1', '2013-05-18 19:13:43'),
(8, 'Cash Sales Receipt (Receipt No:BDCS0001/2013)', '1000000', '1000000', '', 6, '1', '2013-05-18 19:16:54'),
(12, 'Sales receipt against Receipt No:BDSR0002/2013', '4000000', '4000000', '', 6, '1', '2013-05-20 05:02:44'),
(28, 'Cash Sales Receipt (Receipt No:BDCS0004/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 22:37:24'),
(14, 'Sales receipt against Receipt No:BDSR0003/2013', '5000000', '5000000', '', 6, '1', '2013-05-20 05:15:46'),
(27, 'Cash Sales Receipt (Receipt No:BDCS0003/2013)', '2970000', '2970000', '', 6, '1', '2013-05-21 22:33:27'),
(25, '', '-1000000', '', '1000000', 6, '1', '2013-05-20 22:36:55'),
(26, 'Cash Sales Receipt (Receipt No:BDCS0002/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 19:52:15'),
(29, 'Cash Sales Receipt (Receipt No:BDCS0005/2013)', '2000000', '2000000', '', 6, '1', '2013-05-21 22:42:12'),
(30, 'Cash Sales Receipt (Receipt No:BDCS0006/2013)', '5880', '5880', '', 6, '1', '2013-05-21 22:44:55'),
(31, 'Sales receipt against Receipt No:BDSR0004/2013', '500000', '500000', '', 6, '1', '2013-05-22 19:44:59'),
(35, 'Petty Cash Establishment 2nd Establishment', '-60000', '', '60000', 6, '1', '2013-05-23 06:16:51'),
(34, 'Purchase of fixed asset Vehicle', '-1000000', '', '1000000', 6, '1', '2013-05-22 20:30:29'),
(39, 'Payment for client Topsoftchoice Limited (Topsoft) Opening Bal', '90000', '90000', '', 6, '1', '2013-05-23 08:15:30'),
(37, 'Payment for client Wajir Hospital', '5000', '5000', '', 6, '1', '2013-05-23 08:00:57'),
(38, 'Payment for client Wajir Hospital', '5000', '5000', '', 6, '1', '2013-05-23 08:05:04');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cash_sales`
--

INSERT INTO `cash_sales` (`cash_sales_id`, `temp_cash_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `purchase_order_id`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(1, 1, 4, 10, 16, '6', '1', 6, 4, 'XXR', 5, '1', '1000000', '0', 0, '0', '2013-05-18 19:16:47', 1),
(2, 1, 2, 10, 16, '2', '84.1', 9, 2, 'RF003', 13, '2', '1000000', '0', 1, '20000', '2013-05-21 19:52:13', 1),
(3, 1, 2, 10, 16, '2', '84.1', 9, 2, 'RF003', 15, '3', '1000000', '0', 1, '30000', '2013-05-21 22:33:25', 1),
(4, 1, 6, 10, 16, '2', '84.1', 6, 4, 'XXR', 16, '2', '1000000', '0', 1, '20000', '2013-05-21 22:35:53', 1),
(5, 1, 6, 10, 16, '2', '84.1', 6, 4, 'XXR', 17, '2', '1000000', '0', 0, '0', '2013-05-21 22:42:03', 1),
(6, 1, 6, 10, 16, '2', '84.1', 8, 6, 'SG088', 18, '1', '6000', '0', 2, '120', '2013-05-21 22:44:02', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cash_sales_payments`
--

INSERT INTO `cash_sales_payments` (`cash_sales_payment_id`, `receipt_no`, `ttl_amount`, `currency_code`, `curr_rate`, `cash_paid`, `client_id`, `sales_code`, `user_id`, `sales_rep`, `date_generated`, `status`) VALUES
(1, 'BDCS0001/2013', '1000000', '6', '1', 1000000, 4, 5, 10, 16, '2013-05-18 19:16:54', 1),
(2, 'BDCS0002/2013', '1980000', '6', '1', 1980000, 2, 13, 10, 16, '2013-05-21 19:52:15', 1),
(3, 'BDCS0003/2013', '2970000', '6', '1', 2970000, 2, 15, 10, 16, '2013-05-21 22:33:27', 1),
(4, 'BDCS0004/2013', '1980000', '6', '1', 1980000, 6, 16, 10, 16, '2013-05-21 22:35:55', 1),
(5, 'BDCS0005/2013', '2000000', '6', '1', 2000000, 6, 17, 10, 16, '2013-05-21 22:42:12', 1),
(6, 'BDCS0006/2013', '5880', '6', '1', 5880, 6, 18, 10, 16, '2013-05-21 22:44:55', 1);

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
  `contact_person` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `c_name`, `c_address`, `c_town`, `c_street`, `c_paddress`, `c_phone`, `c_telephone`, `contact_person`, `c_email`, `c_date_created`) VALUES
(1, 'Madina Hospital', '99-0098', 'Nairobi - Kenya', 'Mogadishu Street', 'Eastliegh Mall 1st Floor Wing C', '0798076544', '+254 (0)2020 7869', 'Karanje Daniel', 'karanjem@madinahopsital.com', '2013-04-11 17:14:06'),
(2, 'Ladnan Hospital', '789-909', 'Nairobi', '', 'Eastliegh', '0722337322', '', 'Jama', 'Jama@yahoo.com', '2013-02-23 15:25:39'),
(3, 'Wajir Hospital', '777-0066', 'Wajir', '', 'Wajir Town', '0788665543', '', 'Farah', 'Wajirhospital@gmail.com', '2013-02-23 15:26:54'),
(4, 'Coast Hospital', '43567', 'Mombasa', 'Kenyatta Street', 'Mombasa', '072134', '+254 (0)2020 7867', 'Hussein Mohamed', 'gosero@topsoftchoice.com', '2013-04-11 17:43:20'),
(6, 'Topsoftchoice Limited (Topsoft)', '2407 - 00202', 'Nairobi - Kenya', '+254 (0)2020 7865', 'Campus Mall', '072411198', '+254 (0)2020 7865', 'Peter Kyalo', 'info@topsoftchoice.com', '2013-04-11 16:53:00'),
(7, 'Libken Agencies', '356', 'Nairobi - Kenya', 'Kigali Street', 'Jamia', '0745123', '0201234', 'Amin Hussein', 'info@libken.co.ke', '2013-05-18 07:06:55'),
(9, 'Kheyba Hospital', '2313', 'Nairobi - Kenya', 'University Way', 'Aniversary Towers 3rd Floor', '07433', '9875', 'Dr.Mohamed', 'info@khayba.co.ke', '2013-05-18 12:40:40'),
(10, 'hassan', '22', 'jhh', 'kan', 'del', '0977', '999', 'jama', 'Jama@yahoo.com', '2013-05-22 20:47:31');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client_opening_bal_payment`
--

INSERT INTO `client_opening_bal_payment` (`client_payment_id`, `client_id`, `amount_received`, `date_received`, `status`) VALUES
(1, 3, '5000', '2013-05-23 08:00:57', 0),
(2, 3, '-5000', '2013-05-23 08:05:04', 0),
(3, 6, '-90000', '2013-05-23 08:15:30', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`transaction_id`, `client_id`, `sales_code`, `transaction`, `amount`, `date_recorded`) VALUES
(1, 2, 0, 'Inv No:BDINV0011/2013', '1980000', '2013-05-22 19:43:58'),
(2, 2, 19, 'Receipt No:BDSR0004/2013', '-500000', '2013-05-22 19:44:59'),
(3, 10, 0, 'Opening Balance', '30000', '2013-05-22 20:48:16'),
(4, 0, 0, 'Inv No:BDINV0012/2013', '4950000', '2013-05-23 06:22:07'),
(5, 4, 21, 'Inv No:BDINV0013/2013', '12000000', '2013-05-23 06:26:36'),
(6, 4, 22, 'Inv No:BDINV0014/2013', '35640', '2013-05-23 06:40:59'),
(7, 4, 23, 'Inv No:BDINV0015/2013', '5940', '2013-05-23 06:42:07'),
(8, 3, 0, 'Opening Balance', '10000', '2013-05-23 07:02:47'),
(9, 3, 0, 'Opening Bal Payment', '-5000', '2013-05-23 08:04:24'),
(10, 3, 0, 'Opening Bal Payment', '-5000', '2013-05-23 08:05:04'),
(11, 6, 0, 'Opening Balance', '90000', '2013-05-23 08:14:43'),
(12, 6, 0, 'Opening Bal Payment', '-90000', '2013-05-23 08:15:30');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `commisions`
--

INSERT INTO `commisions` (`commision_id`, `user_id`, `comm_perc`, `status`) VALUES
(1, 13, '12', 0),
(2, 15, '8', 0),
(5, 16, '5', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `commisions_expected`
--

INSERT INTO `commisions_expected` (`commision_expected_id`, `invoice_no`, `tll_commision`, `currency_code`, `curr_rate`, `sales_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'BDINV0001/2013', '100000', '6', '1', 1, 16, '2013-05-18 18:13:52', 1),
(2, 'BDINV0002/2013', '0', '6', '1', 2, 16, '2013-05-18 19:09:45', 2),
(3, 'BDINV0003/2013', '45000', '6', '1', 3, 16, '2013-05-18 18:54:52', 1),
(4, 'BDINV0004/2013', '247500', '6', '1', 4, 16, '2013-05-18 19:13:43', 1),
(5, 'BDCS0001/2013', '50000', '6', '1', 5, 16, '2013-05-18 19:16:54', 1),
(6, 'BDINV0005/2013', '247500', '6', '1', 8, 16, '2013-05-20 04:59:55', 1),
(7, 'BDINV0006/2013', '297000', '6', '1', 9, 16, '2013-05-20 05:14:45', 1),
(8, 'BDINV0007/2013', '198000', '6', '1', 10, 16, '2013-05-20 06:26:40', 1),
(9, 'BDINV0008/2013', '0', '6', '1', 11, 10, '2013-05-21 08:40:34', 1),
(10, 'BDINV0009/2013', '0', '6', '1', 12, 14, '2013-05-21 19:42:17', 1),
(11, 'BDCS0002/2013', '99000', '6', '1', 13, 16, '2013-05-21 19:52:15', 1),
(12, 'BDINV0010/2013', '98000', '6', '1', 14, 16, '2013-05-21 20:27:52', 1),
(13, 'BDCS0003/2013', '148500', '6', '1', 15, 16, '2013-05-21 22:33:27', 1),
(14, 'BDCS0004/2013', '99000', '6', '1', 16, 16, '2013-05-21 22:35:55', 1),
(15, 'BDCS0005/2013', '100000', '6', '1', 17, 16, '2013-05-21 22:42:12', 1),
(16, 'BDCS0006/2013', '294', '6', '1', 18, 16, '2013-05-21 22:44:55', 1),
(17, 'BDINV0011/2013', '99000', '6', '1', 19, 16, '2013-05-22 19:42:42', 1),
(18, 'BDINV0012/2013', '247500', '6', '1', 20, 16, '2013-05-23 06:22:07', 1),
(19, 'BDINV0013/2013', '600000', '6', '1', 21, 16, '2013-05-23 06:26:36', 1),
(20, 'BDINV0014/2013', '1782', '6', '1', 22, 16, '2013-05-23 06:40:59', 1),
(21, 'BDINV0015/2013', '297', '6', '1', 23, 16, '2013-05-23 06:42:07', 1);

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
  `paid_status` int(1) NOT NULL,
  PRIMARY KEY (`commision_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `commision_payments`
--

INSERT INTO `commision_payments` (`commision_payment_id`, `sales_code`, `sales_rep`, `amount_paid`, `currency_code`, `curr_rate`, `date_paid`, `month_paid`, `status`, `paid_status`) VALUES
(1, 1, 0, '0', '6', '1', '2013-05-18 18:13:52', 'May 2013', 0, 0),
(2, 2, 0, '0', '6', '1', '2013-05-18 18:50:29', 'May 2013', 0, 0),
(3, 3, 0, '0', '6', '1', '2013-05-18 18:54:52', 'May 2013', 0, 0),
(4, 3, 16, '30000', '6', '1', '2013-05-20 16:34:30', 'May 2013', 0, 0),
(5, 4, 16, '100000', '6', '1', '2013-05-20 16:34:30', 'May 2013', 0, 0),
(6, 5, 16, '50000', '6', '1', '2013-05-20 16:34:30', 'May 2013', 1, 0),
(7, 8, 0, '0', '6', '1', '2013-05-20 04:59:55', 'May 2013', 0, 0),
(8, 8, 16, '200000', '6', '1', '2013-05-20 16:34:30', 'May 2013', 0, 0),
(9, 9, 0, '0', '6', '1', '2013-05-20 05:14:45', 'May 2013', 0, 0),
(10, 9, 16, '250000', '6', '1', '2013-05-20 16:34:30', 'May 2013', 0, 0),
(11, 10, 0, '0', '6', '1', '2013-05-20 06:26:40', 'May 2013', 0, 0),
(12, 11, 0, '0', '6', '1', '2013-05-21 08:40:34', 'May 2013', 0, 0),
(13, 12, 0, '0', '6', '1', '2013-05-21 19:42:17', 'May 2013', 0, 0),
(14, 13, 16, '99000', '6', '1', '2013-05-21 19:52:15', 'May 2013', 1, 0),
(15, 14, 0, '0', '6', '1', '2013-05-21 20:27:52', 'May 2013', 0, 0),
(16, 15, 16, '148500', '6', '1', '2013-05-21 22:33:27', 'May 2013', 1, 0),
(17, 17, 16, '100000', '6', '1', '2013-05-21 22:42:12', 'May 2013', 1, 0),
(18, 18, 16, '294', '6', '1', '2013-05-21 22:44:55', 'May 2013', 1, 0),
(19, 19, 0, '0', '6', '1', '2013-05-22 19:42:42', 'May 2013', 0, 0),
(20, 19, 16, '25000', '6', '1', '2013-05-22 19:44:59', 'May 2013', 0, 0),
(21, 20, 0, '0', '6', '1', '2013-05-23 06:22:07', 'May 2013', 0, 0),
(22, 21, 0, '0', '6', '1', '2013-05-23 06:26:36', 'May 2013', 0, 0),
(23, 22, 0, '0', '6', '1', '2013-05-23 06:40:59', 'May 2013', 0, 0),
(24, 23, 0, '0', '6', '1', '2013-05-23 06:42:07', 'May 2013', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_contacts`
--

CREATE TABLE IF NOT EXISTS `company_contacts` (
  `contacts_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont_person` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telephone` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `fax` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `street` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `building` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `town` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`contacts_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `company_contacts`
--

INSERT INTO `company_contacts` (`contacts_id`, `cont_person`, `phone`, `telephone`, `email`, `fax`, `street`, `building`, `address`, `town`) VALUES
(1, 'Brisk Diagnostics Staff', '+254 702 358 399', '+254(0) 538004579', 'info@briskdiagnostics.com', '', 'Kigali Street', 'Jamia Plaza 2nd Floor', '71089 - 00622', 'Nairobi - Kenya');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `credit_notes`
--

INSERT INTO `credit_notes` (`credit_note_id`, `credit_note_no`, `ttl_sales_return`, `refund_amount`, `client_id`, `sales_code`, `salesreturn_code`, `user_id`, `sales_rep`, `date_generated`, `status`) VALUES
(1, 'BDCNT0001/2013', '1000000', '1000000  ', 1, 1, 1, 10, 16, '2013-05-20 09:35:42', 0),
(2, 'BDCNT0002/2013', '6000', '', 2, 12, 2, 10, 14, '2013-05-21 19:59:30', 0),
(3, 'BDCNT0003/2013', '2000000', '', 3, 11, 3, 10, 10, '2013-05-21 20:03:53', 0),
(4, 'BDCNT0004/2013', '3000000', '', 1, 10, 4, 10, 16, '2013-05-21 20:05:34', 0),
(5, 'BDCNT0005/2013', '1000000', '', 1, 14, 5, 10, 16, '2013-05-21 20:31:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `curr_id` int(10) NOT NULL AUTO_INCREMENT,
  `curr_name` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  PRIMARY KEY (`curr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`curr_id`, `curr_name`, `curr_rate`) VALUES
(6, 'KSHS', '1'),
(2, 'USD', '84.1'),
(3, 'POUNDS', '120'),
(4, 'UAE', '29.88'),
(7, 'TShs', '21');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `debit_notes`
--

INSERT INTO `debit_notes` (`debit_note_id`, `debit_note_no`, `ttl_stock_return`, `refund_amount`, `currency`, `curr_rate`, `supplier_id`, `order_code`, `stockreturn_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'BDDN0001/2013', '4500', '', '2', '84.1', 1, 5, 1, 10, '2013-05-18 18:45:19', 0),
(2, 'BDDN0002/2013', '4030', '', '2', '84.1', 4, 9, 2, 10, '2013-05-21 20:11:21', 0),
(3, 'BDDN0003/2013', '540', '', '2', '84.1', 2, 8, 3, 10, '2013-05-21 20:12:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE IF NOT EXISTS `deductions` (
  `deduction_id` int(10) NOT NULL AUTO_INCREMENT,
  `deduction_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deduction_amount` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`deduction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `deduction_name`, `deduction_amount`) VALUES
(1, 'Salary Advance', '0'),
(2, 'copperate', '500');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `deduction_logs`
--

INSERT INTO `deduction_logs` (`loan_log_id`, `payrol_basic_log_id`, `emp_id`, `deduction_name`, `deduction_amount`, `deduction_date`) VALUES
(1, 1, 16, 'copperate', '500.00', '2013-05-20 04:36:08'),
(2, 1, 16, 'Salary Advance', '0.00', '2013-05-20 04:36:08'),
(3, 2, 16, 'copperate', '500.00', '2013-05-20 04:47:40'),
(4, 2, 16, 'Salary Advance', '0.00', '2013-05-20 04:47:40'),
(5, 3, 16, 'copperate', '500.00', '2013-05-20 04:52:24'),
(6, 3, 16, 'Salary Advance', '0.00', '2013-05-20 04:52:24'),
(7, 4, 16, 'copperate', '500.00', '2013-05-20 05:03:45'),
(8, 4, 16, 'Salary Advance', '0.00', '2013-05-20 05:03:45'),
(9, 5, 16, 'copperate', '500.00', '2013-05-20 05:19:21'),
(10, 5, 16, 'Salary Advance', '0.00', '2013-05-20 05:19:21'),
(11, 6, 9, 'copperate', '500.00', '2013-05-20 05:26:28'),
(12, 6, 9, 'Salary Advance', '0.00', '2013-05-20 05:26:28'),
(13, 7, 9, 'copperate', '500.00', '2013-05-20 05:33:31'),
(14, 7, 9, 'Salary Advance', '0.00', '2013-05-20 05:33:31'),
(15, 8, 13, 'copperate', '500.00', '2013-05-20 05:34:01'),
(16, 8, 13, 'Salary Advance', '0.00', '2013-05-20 05:34:01'),
(17, 9, 16, 'copperate', '500.00', '2013-05-20 05:34:15'),
(18, 9, 16, 'Salary Advance', '0.00', '2013-05-20 05:34:15'),
(19, 10, 9, 'copperate', '500.00', '2013-05-20 05:35:21'),
(20, 10, 9, 'Salary Advance', '0.00', '2013-05-20 05:35:21'),
(21, 11, 9, 'copperate', '500.00', '2013-05-20 05:38:47'),
(22, 11, 9, 'Salary Advance', '0.00', '2013-05-20 05:38:47'),
(23, 12, 9, 'copperate', '500.00', '2013-05-20 05:39:56'),
(24, 12, 9, 'Salary Advance', '0.00', '2013-05-20 05:39:56'),
(25, 13, 9, 'copperate', '500.00', '2013-05-20 05:40:17'),
(26, 13, 9, 'Salary Advance', '0.00', '2013-05-20 05:40:17'),
(27, 14, 9, 'copperate', '500.00', '2013-05-20 05:43:16'),
(28, 14, 9, 'Salary Advance', '0.00', '2013-05-20 05:43:16'),
(29, 15, 16, 'copperate', '500.00', '2013-05-20 15:28:50'),
(30, 15, 16, 'Salary Advance', '0.00', '2013-05-20 15:28:50');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `doubtful_debts`
--

INSERT INTO `doubtful_debts` (`doubtful_debt_id`, `sales_code`, `client_id`, `amount`, `reason`, `currency_code`, `curr_rate`, `date_received`, `status`) VALUES
(1, 10, 1, '3960000', 'client died', '6', '1', '2013-05-21 08:39:17', 1),
(2, 3, 3, '300000', 'dd', '6', '1', '2013-05-20 23:48:59', 2),
(4, 8, 9, '950000', 'gg', '6', '1', '2013-05-20 22:49:56', 1),
(3, 9, 9, '940000', 'dd', '6', '1', '2013-05-20 23:11:37', 2),
(5, 4, 4, '2950000', 'good', '6', '1', '2013-05-20 23:43:34', 1),
(6, 11, 3, '3960000', 'good', '6', '1', '2013-05-21 08:41:46', 2),
(7, 14, 1, '1960000', 'died', '6', '1', '2013-05-22 19:35:20', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `doubtful_debts_ledger`
--

INSERT INTO `doubtful_debts_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Doubtful Debts for Inv:BDINV0005/2013', '950000', '950000', '', 6, '1', '2013-05-20 22:38:33'),
(2, 'Doubtful  Debts Recovery for Inv:', '-950000', '', '950000', 6, '1', '2013-05-20 22:49:56'),
(3, 'Doubtful Debts for Inv:BDINV0004/2013', '2950000', '2950000', '', 6, '1', '2013-05-20 23:43:04'),
(4, 'Doubtful  Debts Recovery for Inv:', '-2950000', '', '2950000', 6, '1', '2013-05-20 23:43:34'),
(5, 'Doubtful  Debts Recovery for Inv:BDINV0007/2013', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:39:17'),
(6, 'Doubtful Debts for Inv:BDINV0008/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:41:05'),
(7, 'Doubtful Debts for Inv:BDINV0010/2013', '1960000', '1960000', '', 6, '1', '2013-05-22 19:28:35'),
(8, 'Doubtful  Debts Recovery for Inv:BDINV0010/2013', '-1960000', '', '1960000', 6, '1', '2013-05-22 19:35:20');

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
  `joined_date` date DEFAULT NULL,
  `status` int(10) NOT NULL,
  `basic_sal` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `nation_code` (`pin_no`),
  KEY `job_title_code` (`nhif_no`),
  KEY `emp_status` (`gender`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_no`, `national_id`, `emp_firstname`, `emp_middle_name`, `emp_lastname`, `emp_phone`, `emp_email`, `pin_no`, `town`, `marital_status`, `nationality`, `dob`, `gender`, `nhif_no`, `nssf_no`, `job_title_id`, `job_email`, `emp_status`, `department`, `joined_date`, `status`, `basic_sal`) VALUES
(9, 'BDS9      ', '24385821            ', ' Griffins            ', ' Osero                ', 'Mogeni            ', '0723411943            ', 'updateosero@gmail.com', ' 5677            ', 'Nairobi            ', 'Single', 'Kenyan            ', '2012-09-10', 'Male', '78654', 'KImani            ', 'Supervisor            ', 'mogeni@yahoo.com', 'Full Time Contract', 'Accounts         ', '2012-09-03', 0, '25000'),
(13, 'BDS13    ', '00044946   ', ' Hussein    ', ' Hassan   ', ' Abdulle   ', ' 0702358399   ', 'hhabdulle77@gmail.com', 'PI990   ', 'Nairobi   ', 'Married', 'Somali   ', '1977-05-06', 'Male', '', '    ', ' Director   ', 'hhassan@briskdiagnostics.com', 'Full Time Contract', ' Admin   ', '2011-01-02', 0, '28000'),
(16, 'BDS14 ', '24985674', ' Collins', ' Ouma', ' Ouka', ' 0723 876 387', 'collin@gmail.com', '897', 'Nairobi', 'Married', 'Kenyan', '2013-05-13', 'Male', '6789', '76543', 'Sales and Marketing Representative', 'collin@briskdiagnostics.com', 'Parmanent', ' Sales and Marketing', '2011-03-09', 0, '20000');

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

--
-- Dumping data for table `exchange_rate_loss_ledger`
--


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

--
-- Dumping data for table `exchange_rate_variation_ledger`
--


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

--
-- Dumping data for table `exited_shareholder`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `user_id`, `description`, `curr_id`, `curr_rate`, `amount`, `mop`, `date_of_transaction`) VALUES
(1, 10, 'Salary', '6', '1', '1000000', 'Cash', '2013-05-18 18:11:49');

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

--
-- Dumping data for table `expired_stock`
--


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
  `dep_perc` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fixed_assets`
--

INSERT INTO `fixed_assets` (`fixed_asset_id`, `fixed_asset_name`, `description`, `date_purchased`, `currency`, `curr_rate`, `value`, `dep_value`, `dep_perc`, `amount_paid`, `date_recorded`, `status`) VALUES
(1, 'Vehicle', 'Toyota vits K.f', '2013-05-01', 6, '1', '1000000', '20000', '2', '1000000', '2013-05-22 20:30:29', 0),
(2, 'Chairs', 'dd', '2013-05-01', 6, '1', '30000', '0', '0', '0', '2013-05-22 20:44:27', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fixed_assets_ledger`
--

INSERT INTO `fixed_assets_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Purchase of fixed asset Vehicle', '1000000', '1000000', '', 6, '1', '2013-05-22 20:30:29'),
(2, 'Purchase of fixed asset Chairs', '30000', '30000', '', 6, '1', '2013-05-22 20:44:27');

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
(1, 1, 6, '1', '1000000', '2013-05-22 20:30:29'),
(2, 3, 0, '', '', '2013-05-23 07:41:07');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Shares for Hussein Hassan', '-500000', '', '500000', 6, '1', '2013-05-18 13:08:53', 0),
(2, 'Cash Shares for Hussein Hassan', '500000', '500000', '', 6, '1', '2013-05-18 13:08:53', 0),
(3, 'Shares for Abdi Rahaman', '-1500000', '', '1500000', 6, '1', '2013-05-18 13:09:49', 0),
(4, 'Cash Shares for Abdi Rahaman', '1500000', '1500000', '', 6, '1', '2013-05-18 13:09:49', 0),
(5, 'Loan Received from FCB Bank2', '-3000000', '', '3000000', 6, '1', '2013-05-18 13:32:48', 0),
(6, 'Cash Loan Received from FCB Bank2', '3000000', '3000000', '', 6, '1', '2013-05-18 13:32:48', 0),
(7, 'Cash Loan Repayment for FCB Bank2', '-200000', '', '200000', 6, '1', '2013-05-18 13:35:21', 0),
(8, 'Loan Repayment for FCB Bank2', '200000', '200000', '', 6, '1', '2013-05-18 13:35:21', 0),
(9, 'Purchases Account (PO No:BD0001/2013)', '23700', '23700', '', 2, '84.1', '2013-05-18 13:57:17', 1),
(10, 'Accounts Payables (PO No:BD0001/2013)', '-23700', '', '23700', 2, '84.1', '2013-05-18 13:57:17', 1),
(11, 'Purchases Account (PO No:BD0002/2013)', '2540', '2540', '', 2, '84.1', '2013-05-18 14:04:51', 2),
(12, 'Accounts Payables (PO No:BD0002/2013)', '-2540', '', '2540', 2, '84.1', '2013-05-18 14:04:51', 2),
(13, 'Purchases Account (PO No:BD0003/2013)', '680', '680', '', 2, '84.1', '2013-05-18 16:39:34', 3),
(14, 'Accounts Payables (PO No:BD0003/2013)', '-680', '', '680', 2, '84.1', '2013-05-18 16:39:34', 3),
(15, 'Accounts Payables (PO No:BD0003/2013)', '680', '680', '', 2, '84.1', '2013-05-18 17:30:05', 0),
(16, 'Cash ( Against PO No:BD0003/2013)', '-680', '', '680', 2, '84.1', '2013-05-18 17:30:05', 0),
(17, 'Purchases Account (PO No:BD0001/2013)', '11700', '11700', '', 2, '84.1', '2013-05-18 17:54:53', 5),
(18, 'Accounts Payables (PO No:BD0001/2013)', '-11700', '', '11700', 2, '84.1', '2013-05-18 17:54:53', 5),
(19, 'Loan Received from FCB Bank2', '-2000000', '', '2000000', 6, '1', '2013-05-18 17:56:21', 0),
(20, 'Cash Loan Received from FCB Bank2', '2000000', '2000000', '', 6, '1', '2013-05-18 17:56:21', 0),
(21, 'Accounts Payables (PO No:BD0001/2013)', '9000', '9000', '', 2, '84.1', '2013-05-18 17:57:18', 0),
(22, 'Cash ( Against PO No:BD0001/2013)', '-9000', '', '9000', 2, '84.1', '2013-05-18 17:57:18', 0),
(23, 'Salary', '1000000', '1000000', '', 6, '1', '2013-05-18 18:11:49', 0),
(24, 'Cash Expenses Paid on Salary', '-1000000', '', '1000000', 6, '1', '2013-05-18 18:11:49', 0),
(25, 'Sales ( Against Inv No:BDINV0001/2013)', '-2000000', '', '2000000', 6, '1', '2013-05-18 18:13:52', 0),
(26, 'Accounts Receivables (Inv No:BDINV0001/2013)', '2000000', '2000000', '', 6, '1', '2013-05-18 18:13:52', 0),
(27, 'Accounts Payables (PO No:BD0001/2013)', '2070', '2070', '', 2, '84.1', '2013-05-18 18:17:53', 0),
(28, 'Cash ( Against PO No:BD0001/2013)', '-2070', '', '2070', 2, '84.1', '2013-05-18 18:17:53', 0),
(29, 'Accounts Payables (PO No:BD0001/2013)', '630', '630', '', 2, '84.1', '2013-05-18 18:19:52', 0),
(30, 'Cash ( Against PO No:BD0001/2013)', '-630', '', '630', 2, '84.1', '2013-05-18 18:19:52', 0),
(31, 'Purchases Returns Debit Note No:BDDN0001/2013', '-4500', '', '4500', 2, '84.1', '2013-05-18 18:45:19', 0),
(32, 'A/C Receivables Purchases Returns(Debit Note No:BDDN0001/2013)', '4500', '4500', '', 2, '84.1', '2013-05-18 18:45:19', 0),
(33, 'Sales ( Against Inv No:BDINV0002/2013)', '-0', '', '0', 6, '1', '2013-05-18 18:50:29', 0),
(34, 'Accounts Receivables (Inv No:BDINV0002/2013)', '0', '0', '', 6, '1', '2013-05-18 18:50:29', 0),
(35, 'Purchases Account (PO No:BD0002/2013)', '23021', '23021', '', 2, '84.1', '2013-05-18 18:52:57', 6),
(36, 'Accounts Payables (PO No:BD0002/2013)', '-23021', '', '23021', 2, '84.1', '2013-05-18 18:52:57', 6),
(37, 'Sales ( Against Inv No:BDINV0003/2013)', '-900000', '', '900000', 6, '1', '2013-05-18 18:54:52', 0),
(38, 'Accounts Receivables (Inv No:BDINV0003/2013)', '900000', '900000', '', 6, '1', '2013-05-18 18:54:52', 0),
(39, 'Accounts Receivables (Receipt No : BDSR0001/2013)', '-600000', '', '600000', 6, '1', '2013-05-18 18:58:36', 0),
(40, 'Cash ( Receipt No : BDSR0001/2013)', '600000', '600000', '', 6, '1', '2013-05-18 18:58:36', 0),
(41, 'Cancel Sales ( Against Inv No:)', '0', '0', '', 6, '1', '2013-05-18 19:09:45', 0),
(42, 'Cancel Accounts Receivables (Inv No:)', '-0', '', '0', 6, '1', '2013-05-18 19:09:45', 0),
(43, 'Sales ( Against Inv No:BDINV0004/2013)', '-4950000', '', '4950000', 6, '1', '2013-05-18 19:13:43', 0),
(44, 'Accounts Receivables (Inv No:BDINV0004/2013)', '4950000', '4950000', '', 6, '1', '2013-05-18 19:13:43', 0),
(45, 'Cash ( Against Inv No:BDINV0004/2013)', '2000000', '2000000', '', 6, '1', '2013-05-18 19:13:43', 0),
(46, 'Accounts Receivables (Inv No:BDINV0004/2013)', '-2000000', '', '2000000', 6, '1', '2013-05-18 19:13:43', 0),
(47, 'Sales Returns Credit Note No:BDCNT0001/2013', '1000000', '1000000', '', 6, '1', '2013-05-18 19:14:52', 0),
(48, 'A/C Receivables Credit Note No:BDCNT0001/2013', '-1000000', '', '1000000', 6, '1', '2013-05-18 19:14:52', 0),
(49, 'Cash Sales(Receipt No:BDCS0001/2013)', '-1000000', '', '1000000', 6, '1', '2013-05-18 19:16:54', 0),
(50, 'Account Receivables Cash Sales (Receipt No:BDCS0001/2013)', '1000000', '1000000', '', 6, '1', '2013-05-18 19:16:54', 0),
(51, 'Acount Receivable Cash Sales(Receipt No:BDCS0001/2013)', '-1000000', '', '1000000', 6, '1', '2013-05-18 19:16:54', 0),
(52, 'Cash Sales Receipt (Receipt No:BDCS0001/2013)', '1000000', '1000000', '', 6, '1', '2013-05-18 19:16:54', 0),
(53, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-199500', '', '199500', 6, '1', '2013-05-20 04:36:08', 0),
(54, 'Cash Payment for Salary of BDS14 ', '199500', '199500', '', 6, '1', '2013-05-20 04:36:08', 0),
(55, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-199500', '', '199500', 6, '1', '2013-05-20 04:47:40', 0),
(56, 'Cash Payment for Salary of BDS14 ', '199500', '199500', '', 6, '1', '2013-05-20 04:47:40', 0),
(57, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-199500', '', '199500', 6, '1', '2013-05-20 04:52:24', 0),
(58, 'Cash Payment for Salary of BDS14 ', '199500', '199500', '', 6, '1', '2013-05-20 04:52:24', 0),
(59, 'Sales ( Against Inv No:BDINV0005/2013)', '-4950000', '', '4950000', 6, '1', '2013-05-20 04:59:55', 0),
(60, 'Accounts Receivables (Inv No:BDINV0005/2013)', '4950000', '4950000', '', 6, '1', '2013-05-20 04:59:55', 0),
(61, 'Accounts Receivables (Receipt No : BDSR0002/2013)', '-4000000', '', '4000000', 6, '1', '2013-05-20 05:02:44', 0),
(62, 'Cash ( Receipt No : BDSR0002/2013)', '4000000', '4000000', '', 6, '1', '2013-05-20 05:02:44', 0),
(63, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-399500', '', '399500', 6, '1', '2013-05-20 05:03:45', 0),
(64, 'Cash Payment for Salary of BDS14 ', '399500', '399500', '', 6, '1', '2013-05-20 05:03:45', 0),
(65, 'Sales ( Against Inv No:BDINV0006/2013)', '-5940000', '', '5940000', 6, '1', '2013-05-20 05:14:45', 0),
(66, 'Accounts Receivables (Inv No:BDINV0006/2013)', '5940000', '5940000', '', 6, '1', '2013-05-20 05:14:45', 0),
(67, 'Accounts Receivables (Receipt No : BDSR0003/2013)', '-5000000', '', '5000000', 6, '1', '2013-05-20 05:15:46', 0),
(68, 'Cash ( Receipt No : BDSR0003/2013)', '5000000', '5000000', '', 6, '1', '2013-05-20 05:15:46', 0),
(69, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-649500', '', '649500', 6, '1', '2013-05-20 05:19:21', 0),
(70, 'Cash Payment for Salary of BDS14 ', '649500', '649500', '', 6, '1', '2013-05-20 05:19:21', 0),
(71, 'Salaries and Commission expenses for the month of May 2013 for employee BDS9      ', '-24500', '', '24500', 6, '1', '2013-05-20 05:26:28', 0),
(72, 'Cash Payment for Salary of BDS9      ', '24500', '24500', '', 6, '1', '2013-05-20 05:26:28', 0),
(73, 'Salaries and Commission expenses for the month of May 2013 for employee BDS9      ', '-24500', '', '24500', 6, '1', '2013-05-20 05:33:32', 0),
(74, 'Cash Payment for Salary of BDS9      ', '24500', '24500', '', 6, '1', '2013-05-20 05:33:32', 0),
(75, 'Salaries and Commission expenses for the month of May 2013 for employee BDS13    ', '-27500', '', '27500', 6, '1', '2013-05-20 05:34:01', 0),
(76, 'Cash Payment for Salary of BDS13    ', '27500', '27500', '', 6, '1', '2013-05-20 05:34:01', 0),
(77, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-649500', '', '649500', 6, '1', '2013-05-20 05:34:15', 0),
(78, 'Cash Payment for Salary of BDS14 ', '649500', '649500', '', 6, '1', '2013-05-20 05:34:15', 0),
(79, 'Salaries and Commission expenses for the month of May 2013 for employee BDS9      ', '-24500', '', '24500', 6, '1', '2013-05-20 05:39:56', 0),
(80, 'Cash Payment for Salary of BDS9      ', '24500', '24500', '', 6, '1', '2013-05-20 05:39:56', 0),
(81, 'Salaries and Commission expenses for the month of May 2013 for employee BDS9      ', '-24500', '', '24500', 6, '1', '2013-05-20 05:43:16', 0),
(82, 'Cash Payment for Salary of BDS9      ', '24500', '24500', '', 6, '1', '2013-05-20 05:43:16', 0),
(83, 'Sales ( Against Inv No:BDINV0007/2013)', '-3960000', '', '3960000', 6, '1', '2013-05-20 06:26:40', 0),
(84, 'Accounts Receivables (Inv No:BDINV0007/2013)', '3960000', '3960000', '', 6, '1', '2013-05-20 06:26:40', 0),
(85, 'Cash Refund for credit note BDCNT0001/2013', '-1000000  ', '', '-1000000  ', 6, '1', '2013-05-20 09:35:42', 0),
(86, 'A/C Payables Refund for credit note BDCNT0001/2013', '1000000  ', '1000000  ', '', 6, '1', '2013-05-20 09:35:42', 0),
(87, 'Salaries and Commission expenses for the month of May 2013 for employee BDS14 ', '-649500', '', '649500', 6, '1', '2013-05-20 15:28:51', 0),
(88, 'Cash Payment for Salary of BDS14 ', '649500', '649500', '', 6, '1', '2013-05-20 15:28:51', 0),
(89, 'Bad Debts for Inv:BDINV0007/2013', '3960000', '3960000', '', 6, '1', '2013-05-20 17:43:13', 0),
(90, 'Bad Debt Expense for Invoice BDINV0007/2013', '-3960000', '', '3960000', 6, '1', '2013-05-20 17:43:13', 0),
(91, 'Writting Off Bad Debts Of Invoice BDINV0007/2013', '3960000', '3960000', '', 6, '1', '2013-05-20 18:24:44', 0),
(92, 'A/R Writting Off Bad Debts Of Invoice BDINV0007/2013', '-3960000', '', '3960000', 6, '1', '2013-05-20 18:24:44', 0),
(93, 'Bad Debts for Inv:BDINV0003/2013', '300000', '300000', '', 6, '1', '2013-05-20 18:26:29', 0),
(94, 'Bad Debt Expense for Invoice BDINV0003/2013', '-300000', '', '300000', 6, '1', '2013-05-20 18:26:29', 0),
(95, 'Cash for Bad Debt Recovery for Inv: BDINV0007/2013', '3960000', '3960000', '', 6, '1', '2013-05-20 18:28:48', 0),
(96, 'Accounts Receivables(Bad Debt Recovery Inv No:BDINV0007/2013)', '-3960000', '', '3960000', 6, '1', '2013-05-20 18:28:48', 0),
(97, 'Writting Off Bad Debts Of Invoice BDINV0003/2013', '300000', '300000', '', 6, '1', '2013-05-20 18:35:02', 0),
(98, 'A/R Writting Off Bad Debts Of Invoice BDINV0003/2013', '-300000', '', '300000', 6, '1', '2013-05-20 18:35:02', 0),
(99, 'Doubtful Debts for Inv:BDINV0006/2013', '940000', '940000', '', 6, '1', '2013-05-20 19:27:39', 0),
(100, 'A/C Recv for Doubtful Debts for Invoice BDINV0006/2013', '-940000', '', '940000', 6, '1', '2013-05-20 19:27:39', 0),
(101, 'Doubtful Debts for Inv:BDINV0005/2013', '950000', '950000', '', 6, '1', '2013-05-20 22:38:33', 0),
(102, 'A/C Recv for Doubtful Debts for Invoice BDINV0005/2013', '-950000', '', '950000', 6, '1', '2013-05-20 22:38:33', 0),
(103, 'Doubtful debts Recovery for Inv: ', '-950000', '', '950000', 6, '1', '2013-05-20 22:49:56', 0),
(104, 'Accounts Receivables(Doubtful Debts Recovery Inv No:)', '950000', '950000', '', 6, '1', '2013-05-20 22:49:56', 0),
(105, 'Write Off Bad debts for Inv: ', '940000', '940000', '', 6, '1', '2013-05-20 23:11:37', 0),
(106, 'A/C Receivables(Write Off Bad debts Inv No:)', '-940000', '', '940000', 6, '1', '2013-05-20 23:11:37', 0),
(107, 'Doubtful Debts for Inv:BDINV0004/2013', '2950000', '2950000', '', 6, '1', '2013-05-20 23:43:04', 0),
(108, 'A/C Recv for Doubtful Debts for Invoice BDINV0004/2013', '-2950000', '', '2950000', 6, '1', '2013-05-20 23:43:04', 0),
(109, 'Doubtful debts Recovery for Inv: ', '-2950000', '', '2950000', 6, '1', '2013-05-20 23:43:34', 0),
(110, 'Accounts Receivables(Doubtful Debts Recovery Inv No:)', '2950000', '2950000', '', 6, '1', '2013-05-20 23:43:34', 0),
(111, 'Write Off Bad debts for Inv: BDINV0003/2013', '300000', '300000', '', 6, '1', '2013-05-20 23:48:59', 0),
(112, 'A/C Receivables(Write Off Bad debts Inv No:BDINV0003/2013)', '-300000', '', '300000', 6, '1', '2013-05-20 23:48:59', 0),
(113, 'Doubtful debts Recovery for Inv: BDINV0007/2013', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:39:17', 0),
(114, 'Accounts Receivables(Doubtful Debts Recovery Inv No:BDINV0007/2013)', '3960000', '3960000', '', 6, '1', '2013-05-21 08:39:17', 0),
(115, 'Sales ( Against Inv No:BDINV0008/2013)', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:40:34', 0),
(116, 'Accounts Receivables (Inv No:BDINV0008/2013)', '3960000', '3960000', '', 6, '1', '2013-05-21 08:40:34', 0),
(117, 'Doubtful Debts for Inv:BDINV0008/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:41:05', 0),
(118, 'A/C Recv for Doubtful Debts for Invoice BDINV0008/2013', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:41:05', 0),
(119, 'Write Off Bad debts for Inv: BDINV0008/2013', '3960000', '3960000', '', 6, '1', '2013-05-21 08:41:46', 0),
(120, 'A/C Receivables(Write Off Bad debts Inv No:BDINV0008/2013)', '-3960000', '', '3960000', 6, '1', '2013-05-21 08:41:46', 0),
(121, 'Purchases Account (PO No:BD0003/2013)', '5724', '5724', '', 2, '84.1', '2013-05-21 19:16:30', 8),
(122, 'Accounts Payables (PO No:BD0003/2013)', '-5724', '', '5724', 2, '84.1', '2013-05-21 19:16:30', 8),
(123, 'Sales ( Against Inv No:BDINV0009/2013)', '-17820', '', '17820', 6, '1', '2013-05-21 19:42:17', 0),
(124, 'Accounts Receivables (Inv No:BDINV0009/2013)', '17820', '17820', '', 6, '1', '2013-05-21 19:42:17', 0),
(125, 'Purchases Account (PO No:BD0004/2013)', '12613', '12613', '', 2, '84.1', '2013-05-21 19:45:58', 9),
(126, 'Accounts Payables (PO No:BD0004/2013)', '-12613', '', '12613', 2, '84.1', '2013-05-21 19:45:58', 9),
(127, 'Cash Sales(Receipt No:BDCS0002/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 19:52:15', 0),
(128, 'Account Receivables Cash Sales (Receipt No:BDCS0002/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 19:52:15', 0),
(129, 'Acount Receivable Cash Sales(Receipt No:BDCS0002/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 19:52:15', 0),
(130, 'Cash Sales Receipt (Receipt No:BDCS0002/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 19:52:15', 0),
(131, 'Sales Returns Credit Note No:BDCNT0002/2013', '6000', '6000', '', 6, '1', '2013-05-21 19:59:30', 0),
(132, 'A/C Receivables Credit Note No:BDCNT0002/2013', '-6000', '', '6000', 6, '1', '2013-05-21 19:59:30', 0),
(133, 'Sales Returns Credit Note No:BDCNT0003/2013', '2000000', '2000000', '', 6, '1', '2013-05-21 20:03:53', 0),
(134, 'A/C Receivables Credit Note No:BDCNT0003/2013', '-2000000', '', '2000000', 6, '1', '2013-05-21 20:03:53', 0),
(135, 'Sales Returns Credit Note No:BDCNT0004/2013', '3000000', '3000000', '', 6, '1', '2013-05-21 20:05:34', 0),
(136, 'A/C Receivables Credit Note No:BDCNT0004/2013', '-3000000', '', '3000000', 6, '1', '2013-05-21 20:05:34', 0),
(137, 'Purchases Returns Debit Note No:BDDN0002/2013', '4030', '', '4030', 2, '84.1', '2013-05-21 20:11:21', 0),
(138, 'A/C Payables Debit Note No:BDDN0002/2013', '-4030', '4030', '', 2, '84.1', '2013-05-21 20:11:21', 0),
(139, 'Purchases Returns Debit Note No:BDDN0003/2013', '540', '', '540', 2, '84.1', '2013-05-21 20:12:42', 0),
(140, 'A/C Payables Debit Note No:BDDN0003/2013', '-540', '540', '', 2, '84.1', '2013-05-21 20:12:42', 0),
(141, 'Sales ( Against Inv No:BDINV0010/2013)', '-1960000', '', '1960000', 6, '1', '2013-05-21 20:27:52', 0),
(142, 'Accounts Receivables (Inv No:BDINV0010/2013)', '1960000', '1960000', '', 6, '1', '2013-05-21 20:27:52', 0),
(143, 'Sales Returns Credit Note No:BDCNT0005/2013', '1000000', '1000000', '', 6, '1', '2013-05-21 20:31:17', 0),
(144, 'A/C Receivables Credit Note No:BDCNT0005/2013', '-1000000', '', '1000000', 6, '1', '2013-05-21 20:31:17', 0),
(145, 'Cash Sales(Receipt No:BDCS0003/2013)', '-2970000', '', '2970000', 6, '1', '2013-05-21 22:33:27', 0),
(146, 'Account Receivables Cash Sales (Receipt No:BDCS0003/2013)', '2970000', '2970000', '', 6, '1', '2013-05-21 22:33:27', 0),
(147, 'Acount Receivable Cash Sales(Receipt No:BDCS0003/2013)', '-2970000', '', '2970000', 6, '1', '2013-05-21 22:33:27', 0),
(148, 'Cash Sales Receipt (Receipt No:BDCS0003/2013)', '2970000', '2970000', '', 6, '1', '2013-05-21 22:33:27', 0),
(149, 'Cash Sales(Receipt No:BDCS0004/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 22:37:24', 0),
(150, 'Account Receivables Cash Sales (Receipt No:BDCS0004/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 22:37:24', 0),
(151, 'Acount Receivable Cash Sales(Receipt No:BDCS0004/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-21 22:37:24', 0),
(152, 'Cash Sales Receipt (Receipt No:BDCS0004/2013)', '1980000', '1980000', '', 6, '1', '2013-05-21 22:37:24', 0),
(153, 'Cash Sales(Receipt No:BDCS0005/2013)', '-2000000', '', '2000000', 6, '1', '2013-05-21 22:42:12', 0),
(154, 'Account Receivables Cash Sales (Receipt No:BDCS0005/2013)', '2000000', '2000000', '', 6, '1', '2013-05-21 22:42:12', 0),
(155, 'Acount Receivable Cash Sales(Receipt No:BDCS0005/2013)', '-2000000', '', '2000000', 6, '1', '2013-05-21 22:42:12', 0),
(156, 'Cash Sales Receipt (Receipt No:BDCS0005/2013)', '2000000', '2000000', '', 6, '1', '2013-05-21 22:42:12', 0),
(157, 'Cash Sales(Receipt No:BDCS0006/2013)', '-5880', '', '5880', 6, '1', '2013-05-21 22:44:55', 0),
(158, 'Account Receivables Cash Sales (Receipt No:BDCS0006/2013)', '5880', '5880', '', 6, '1', '2013-05-21 22:44:55', 0),
(159, 'Acount Receivable Cash Sales(Receipt No:BDCS0006/2013)', '-5880', '', '5880', 6, '1', '2013-05-21 22:44:55', 0),
(160, 'Cash Sales Receipt (Receipt No:BDCS0006/2013)', '5880', '5880', '', 6, '1', '2013-05-21 22:44:55', 0),
(161, 'Doubtful Debts for Inv:BDINV0010/2013', '1960000', '1960000', '', 6, '1', '2013-05-22 19:28:35', 0),
(162, 'A/C Recv for Doubtful Debts for Invoice BDINV0010/2013', '-1960000', '', '1960000', 6, '1', '2013-05-22 19:28:35', 0),
(163, 'Doubtful debts Recovery for Inv: BDINV0010/2013', '-1960000', '', '1960000', 6, '1', '2013-05-22 19:35:20', 0),
(164, 'Accounts Receivables(Doubtful Debts Recovery Inv No:BDINV0010/2013)', '1960000', '1960000', '', 6, '1', '2013-05-22 19:35:20', 0),
(165, 'Sales ( Against Inv No:BDINV0011/2013)', '-1980000', '', '1980000', 6, '1', '2013-05-22 19:42:42', 0),
(166, 'Accounts Receivables (Inv No:BDINV0011/2013)', '1980000', '1980000', '', 6, '1', '2013-05-22 19:42:42', 0),
(167, 'Accounts Receivables (Receipt No : BDSR0004/2013)', '-500000', '', '500000', 6, '1', '2013-05-22 19:44:59', 0),
(168, 'Cash ( Receipt No : BDSR0004/2013)', '500000', '500000', '', 6, '1', '2013-05-22 19:44:59', 0),
(169, 'Office rent', '10000', '10000', '', 6, '1', '2013-05-22 20:09:34', 0),
(170, 'Cash Expenses Paid on Office rent', '-10000', '', '10000', 6, '1', '2013-05-22 20:09:34', 0),
(171, 'Petty Cash Expenses office tea', '-300', '', '300', 6, '1', '2013-05-22 20:24:12', 0),
(172, 'Petty Cash office tea', '300', '300', '', 6, '1', '2013-05-22 20:24:12', 0),
(173, 'Cash payment of Fixed Asset Vehicle', '-1000000', '', '1000000', 6, '1', '2013-05-22 20:30:29', 0),
(174, 'Accounts Payables Payment of Fixed Asset Vehicle', '1000000', '1000000', '', 6, '1', '2013-05-22 20:30:29', 0),
(175, 'Purchase of Fixed Asset Vehicle', '1000000', '1000000', '', 6, '1', '2013-05-22 20:30:29', 0),
(176, 'Accounts Payables ( Purchase of Fixed Asset Vehicle )', '-1000000', '', '1000000', 6, '1', '2013-05-22 20:30:29', 0),
(177, 'Purchase of Fixed Asset (Chairs)', '30000', '30000', '', 6, '1', '2013-05-22 20:44:27', 0),
(178, 'Accounts Payables ( Purchase of Fixed Asset Chairs )', '-30000', '', '30000', 6, '1', '2013-05-22 20:44:27', 0),
(179, 'Petty Cash Expenses 2nd Establishment', '-60000', '', '60000', 6, '1', '2013-05-23 06:16:51', 0),
(180, 'Petty Cash 2nd Establishment', '60000', '60000', '', 6, '1', '2013-05-23 06:16:51', 0),
(181, 'Sales ( Against Inv No:BDINV0012/2013)', '-4950000', '', '4950000', 6, '1', '2013-05-23 06:22:07', 0),
(182, 'Accounts Receivables (Inv No:BDINV0012/2013)', '4950000', '4950000', '', 6, '1', '2013-05-23 06:22:07', 0),
(183, 'Sales ( Against Inv No:BDINV0013/2013)', '-12000000', '', '12000000', 6, '1', '2013-05-23 06:26:36', 0),
(184, 'Accounts Receivables (Inv No:BDINV0013/2013)', '12000000', '12000000', '', 6, '1', '2013-05-23 06:26:36', 0),
(185, 'Sales ( Against Inv No:BDINV0014/2013)', '-35640', '', '35640', 6, '1', '2013-05-23 06:40:59', 0),
(186, 'Accounts Receivables (Inv No:BDINV0014/2013)', '35640', '35640', '', 6, '1', '2013-05-23 06:40:59', 0),
(187, 'Sales ( Against Inv No:BDINV0015/2013)', '-5940', '', '5940', 6, '1', '2013-05-23 06:42:07', 0),
(188, 'Accounts Receivables (Inv No:BDINV0015/2013)', '5940', '5940', '', 6, '1', '2013-05-23 06:42:07', 0),
(189, 'Accounts payables payment for Fixed Asset ', '', '', '', 0, '', '2013-05-23 07:41:07', 0),
(190, 'Cash ( Payment of Fixed Asset  )', '-', '', '', 0, '', '2013-05-23 07:41:07', 0),
(191, 'Accounts Receivables Client Wajir Hospital Opening Bal Payment', '-5000', '', '5000', 6, '1', '2013-05-23 08:00:57', 0),
(192, 'Cash (Client Wajir Hospital Opening Bal Payment )', '5000', '5000', '', 6, '1', '2013-05-23 08:00:57', 0),
(193, 'Accounts Receivables Client Wajir Hospital Opening Bal Payment', '-5000', '', '5000', 6, '1', '2013-05-23 08:05:04', 0),
(194, 'Cash (Client Wajir Hospital Opening Bal Payment )', '5000', '5000', '', 6, '1', '2013-05-23 08:05:04', 0),
(195, 'Accounts Receivables Client Topsoftchoice Limited (Topsoft) Opening Bal Payment', '-90000', '', '90000', 6, '1', '2013-05-23 08:15:30', 0),
(196, 'Cash (Client Topsoftchoice Limited (Topsoft) Opening Bal Payment )', '90000', '90000', '', 6, '1', '2013-05-23 08:15:30', 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `income`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `income_ledger`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `inventory_ledger`
--

INSERT INTO `inventory_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Received 120 Surgery Kit into the warehouse', '5400', '5400', '', 2, '84.1', '2013-05-21 19:18:21', 8),
(2, 'Sold 3 Surgery Kit', '-135', '', '135', 2, '84.1', '2013-05-21 19:42:15', 12),
(3, 'Received 40 RF each 310 into the warehouse', '12400', '12400', '', 2, '84.1', '2013-05-21 19:46:29', 9),
(4, 'Sold 2 RF on cash', '-620', '', '620', 2, '84.1', '2013-05-21 19:52:13', 13),
(5, 'Client Returned 1 Surgery Kit', '45', '45', '', 2, '84.1', '2013-05-21 19:59:28', 12),
(6, ' Returned 2 X-Rays', '460', '460', '', 2, '84.1', '2013-05-21 20:03:51', 11),
(7, 'Madina Hospital Returned 3 X-Rays', '690', '690', '', 2, '84.1', '2013-05-21 20:05:32', 10),
(8, 'Returned 13  to supplier', '-4030', '', '4030', 2, '84.1', '2013-05-21 20:11:19', 0),
(9, 'Returned 12 Surgery Kit to supplier', '-540', '', '540', 2, '84.1', '2013-05-21 20:12:41', 0),
(10, 'Recorded 34 Operation Table as opening balance', '0', '0', '', 2, '86', '2013-05-21 20:17:25', 0),
(11, 'Recorded 32 GOT as opening balance', '1216', '1216', '', 2, '84.1', '2013-05-21 20:18:35', 0),
(12, 'Sold 2 X-Rays on credit', '-460', '', '460', 2, '84.1', '2013-05-21 20:27:49', 14),
(13, 'Madina Hospital Returned 1 X-Rays', '230', '230', '', 2, '84.1', '2013-05-21 20:31:15', 14),
(14, 'Sold 3 RF on cash', '-930', '', '930', 2, '84.1', '2013-05-21 22:33:25', 15),
(15, 'Sold 2 X-Rays on cash', '-460', '', '460', 2, '84.1', '2013-05-21 22:35:53', 16),
(16, 'Sold 2 X-Rays on cash', '-460', '', '460', 2, '84.1', '2013-05-21 22:42:03', 17),
(17, 'Sold 1 Surgery Kit on cash', '-45', '', '45', 2, '84.1', '2013-05-21 22:44:02', 18),
(18, 'Sold 2 X-Rays on credit', '-460', '', '460', 2, '84.1', '2013-05-22 19:42:26', 19),
(19, 'Sold 5 RF on credit', '-1550', '', '1550', 2, '84.1', '2013-05-23 06:22:04', 20),
(20, 'Sold 12 X-Rays on credit', '-2760', '', '2760', 2, '84.1', '2013-05-23 06:26:34', 21),
(21, 'Sold 6 Surgery Kit on credit', '-270', '', '270', 2, '84.1', '2013-05-23 06:40:56', 22),
(22, 'Sold 1 Surgery Kit on credit', '-45', '', '45', 2, '84.1', '2013-05-23 06:42:05', 23);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_no`, `invoice_ttl`, `inv_bal`, `currency_code`, `curr_rate`, `client_id`, `sales_code`, `user_id`, `sales_rep`, `date_generated`, `status`, `doubt_ful_status`) VALUES
(1, 'BDINV0001/2013', '2000000', '2000000', '6', '1', 1, 1, 10, 16, '2013-05-18 18:58:21', 1, 1),
(2, 'BDINV0002/2013', '0', '0', '6', '1', 4, 2, 10, 16, '2013-05-18 19:09:45', 2, 1),
(3, 'BDINV0003/2013', '900000', '300000', '6', '1', 3, 3, 10, 16, '2013-05-20 18:26:29', 1, 0),
(4, 'BDINV0004/2013', '4950000', '2950000', '6', '1', 4, 4, 10, 16, '2013-05-20 23:43:04', 1, 0),
(5, 'BDINV0005/2013', '4950000', '950000', '6', '1', 9, 8, 10, 16, '2013-05-20 22:38:33', 1, 0),
(6, 'BDINV0006/2013', '5940000', '940000', '6', '1', 9, 9, 10, 16, '2013-05-20 19:27:39', 1, 0),
(7, 'BDINV0007/2013', '3960000', '3960000', '6', '1', 1, 10, 10, 16, '2013-05-20 17:43:13', 1, 0),
(8, 'BDINV0008/2013', '3960000', '3960000', '6', '1', 3, 11, 10, 10, '2013-05-21 08:41:05', 1, 0),
(9, 'BDINV0009/2013', '17820', '17820', '6', '1', 2, 12, 10, 14, '2013-05-21 19:54:27', 1, 1),
(10, 'BDINV0010/2013', '1960000', '1960000', '6', '1', 1, 14, 10, 16, '2013-05-22 19:28:35', 1, 0),
(11, 'BDINV0011/2013', '1980000', '1480000', '6', '1', 2, 19, 10, 16, '2013-05-22 19:45:03', 1, 1),
(12, 'BDINV0012/2013', '4950000', '4950000', '6', '1', 4, 20, 10, 16, '2013-05-23 06:46:34', 1, 1),
(13, 'BDINV0013/2013', '12000000', '12000000', '6', '1', 4, 21, 10, 16, '2013-05-23 06:46:34', 1, 1),
(14, 'BDINV0014/2013', '35640', '35640', '6', '1', 4, 22, 10, 16, '2013-05-23 06:46:34', 1, 1),
(15, 'BDINV0015/2013', '5940', '5940', '6', '1', 4, 23, 10, 16, '2013-05-23 06:46:34', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`invoice_payment_id`, `sales_code`, `client_id`, `amount_received`, `currency_code`, `curr_rate`, `mop`, `date_received`, `status`) VALUES
(1, 1, 1, '', '6', '1', '', '2013-05-18 18:13:52', 0),
(2, 2, 4, '', '6', '1', '', '2013-05-18 18:50:29', 0),
(3, 3, 3, '', '6', '1', '', '2013-05-18 18:54:52', 0),
(4, 3, 3, '600000', '6', '1', 'Cash', '2013-05-18 18:58:36', 0),
(5, 4, 4, '2000000', '6', '1', 'Cash', '2013-05-18 19:13:43', 0),
(6, 7, 3, '', '6', '1', '', '2013-05-20 04:55:34', 0),
(7, 8, 9, '', '6', '1', '', '2013-05-20 04:59:55', 0),
(8, 8, 9, '4000000', '6', '1', 'Cash', '2013-05-20 05:02:44', 0),
(9, 9, 9, '', '6', '1', '', '2013-05-20 05:14:45', 0),
(10, 9, 9, '5000000', '6', '1', 'Cash', '2013-05-20 05:15:46', 0),
(11, 10, 1, '', '6', '1', '', '2013-05-20 06:26:40', 0),
(12, 11, 3, '', '6', '1', '', '2013-05-21 08:40:34', 0),
(13, 12, 2, '', '6', '1', '', '2013-05-21 19:42:17', 0),
(14, 14, 1, '', '6', '1', '', '2013-05-21 20:27:52', 0),
(15, 19, 2, '', '6', '1', '', '2013-05-22 19:42:42', 0),
(16, 19, 2, '500000', '6', '1', 'Cash', '2013-05-22 19:44:59', 0),
(17, 20, 4, '', '6', '1', '', '2013-05-23 06:22:07', 0),
(18, 21, 4, '', '6', '1', '', '2013-05-23 06:26:36', 0),
(19, 22, 4, '', '6', '1', '', '2013-05-23 06:40:59', 0),
(20, 23, 4, '', '6', '1', '', '2013-05-23 06:42:07', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loans_ledger`
--

INSERT INTO `loans_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Loan Received from FCB Bank2', '2000000', '', '2000000', 6, '1', '2013-05-18 17:56:21');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `loan_received`
--

INSERT INTO `loan_received` (`loan_received_id`, `lenders_name`, `lenders_address`, `lenders_phone`, `lenders_email`, `lenders_town`, `loan_amount`, `currency_code`, `curr_rate`, `period_years`, `period_months`, `date_recorded`) VALUES
(1, 'FCB Bank2', '2345', '985', 'f@gmail.com', 'Nairobi', '3000000', '6', '1', 2, 0, '2013-05-18 13:32:48'),
(2, 'FCB Bank2', '876', '45677', 'f@gmail.com', 'Nairobi', '2000000', '6', '1', 4, 2, '2013-05-18 17:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `loan_repayments`
--

CREATE TABLE IF NOT EXISTS `loan_repayments` (
  `loan_repayment_id` int(10) NOT NULL AUTO_INCREMENT,
  `loan_received_id` int(10) NOT NULL,
  `amount_received` varchar(100) NOT NULL,
  `currency_code` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `mop` varchar(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`loan_repayment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loan_repayments`
--

INSERT INTO `loan_repayments` (`loan_repayment_id`, `loan_received_id`, `amount_received`, `currency_code`, `curr_rate`, `mop`, `date_received`, `status`) VALUES
(1, 1, '200000', '6', '1', 'Cash', '2013-05-18 13:35:21', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lpo`
--

INSERT INTO `lpo` (`lpo_id`, `comments`, `lpo_no`, `lpo_amount`, `paid_amount`, `freight_charges`, `currency_code`, `curr_rate`, `supplier_id`, `order_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'bbb', 'BD0001/2013', '11700', '11700', '450', '2', '84.1', 1, 5, 10, '2013-05-18 18:19:52', 1),
(2, 'ff', 'BD0002/2013', '23021', '', '21', '2', '84.1', 4, 6, 10, '2013-05-18 18:52:57', 1),
(3, 'foof', 'BD0003/2013', '5724', '', '324', '2', '84.1', 2, 8, 10, '2013-05-21 19:16:30', 1),
(4, 'good', 'BD0004/2013', '12613', '', '', '2', '84.1', 4, 9, 10, '2013-05-21 19:45:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `minor_terminologies`
--

CREATE TABLE IF NOT EXISTS `minor_terminologies` (
  `minor_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `terminology_id` int(11) NOT NULL,
  `minor_terminology_name` varchar(100) NOT NULL,
  PRIMARY KEY (`minor_terminology_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `minor_terminologies`
--

INSERT INTO `minor_terminologies` (`minor_terminology_id`, `terminology_id`, `minor_terminology_name`) VALUES
(4, 1, 'Current Asset'),
(3, 1, 'Fixed Assets'),
(5, 3, 'Long-Term Liabilities'),
(6, 3, 'Short - Term Liabilities'),
(8, 4, 'Expenses'),
(9, 4, 'General Income'),
(10, 1, '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `sort_order`, `link`, `description`, `status`) VALUES
(1, 'Home', 1, '<li class="top"><a href="welcome.php" class="top_link"><span>Home</span></a></li>', 'Home Page', 0),
(3, 'System Settings', 2, '<a href="#" id="products" class="top_link"><span class="down">System Settings</span></a>', 'System settings', 0),
(4, 'Access Control', 1, '<a href="#" id="services" class="top_link"><span class="down">Access Control</span></a>', 'Manage access levels', 0),
(5, 'Stock Inventory', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Stock Inventory</span></a>', 'Project managenet panel', 0),
(6, 'Point Of Sale', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Point Of Sale</span></a>', 'Management of human resource', 0),
(7, 'General Transactions', 5, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Financial Accounts', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Financial Accounts</span></a>', 'desk', 0),
(9, 'Staff Payroll', 8, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Staff Payroll</span></a>', 'General Reports for administrator', 0),
(11, 'Our Customers', 9, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Our Customers</span></a>', '', 0),
(12, 'Audit Trails', 10, '<a href="audit_trails.php" id="privacy" class="top_link"><span class="down">Audit Trails</span></a>', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `modules_submodules`
--

INSERT INTO `modules_submodules` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
(1, 3, 6, 0),
(2, 3, 5, 0),
(49, 6, 21, 0),
(4, 4, 8, 0),
(5, 4, 9, 0),
(6, 4, 7, 0),
(7, 4, 10, 0),
(46, 3, 4, 0),
(9, 5, 13, 0),
(10, 5, 14, 0),
(11, 5, 11, 0),
(47, 3, 16, 0),
(13, 5, 15, 0),
(15, 6, 22, 0),
(16, 6, 18, 0),
(17, 6, 17, 0),
(18, 6, 12, 0),
(19, 6, 23, 0),
(20, 6, 20, 0),
(21, 6, 19, 0),
(22, 7, 26, 0),
(48, 3, 46, 0),
(24, 7, 28, 0),
(25, 7, 24, 0),
(26, 7, 25, 0),
(39, 9, 41, 0),
(38, 9, 39, 0),
(37, 8, 37, 0),
(36, 8, 1, 0),
(31, 8, 32, 0),
(32, 8, 3, 0),
(33, 8, 33, 0),
(50, 7, 27, 0),
(35, 8, 35, 0),
(44, 9, 40, 0),
(41, 11, 43, 0),
(42, 11, 42, 0),
(43, 11, 44, 0),
(45, 9, 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `net_profit`
--

CREATE TABLE IF NOT EXISTS `net_profit` (
  `net_profit_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`net_profit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `net_profit`
--

INSERT INTO `net_profit` (`net_profit_id`, `amount`, `date_recorded`) VALUES
(1, '46182104', '2013-05-23 07:41:27'),
(2, '46182104', '2013-05-23 07:41:27'),
(3, '46182104', '2013-05-23 07:41:27'),
(4, '46182104', '2013-05-23 07:41:27'),
(5, '46182104', '2013-05-23 07:41:27'),
(6, '46182104', '2013-05-23 07:41:27'),
(7, '46182104', '2013-05-23 07:41:27'),
(8, '46182104', '2013-05-23 07:41:27'),
(9, '46182104', '2013-05-23 07:41:27'),
(10, '46182104', '2013-05-23 07:41:27'),
(11, '46182104', '2013-05-23 07:41:27'),
(12, '46182104', '2013-05-23 07:41:27'),
(13, '46182104', '2013-05-23 07:41:27'),
(14, '46182104', '2013-05-23 07:41:27'),
(15, '46182104', '2013-05-23 07:41:27'),
(16, '46182104', '2013-05-23 07:41:27'),
(17, '46182104', '2013-05-23 07:41:27'),
(18, '46182104', '2013-05-23 07:41:27'),
(19, '46182104', '2013-05-23 07:41:27'),
(20, '46182104', '2013-05-23 07:41:27'),
(21, '46182104', '2013-05-23 07:41:27'),
(22, '46182104', '2013-05-23 07:41:27'),
(23, '46182104', '2013-05-23 07:41:27'),
(24, '46182104', '2013-05-23 07:41:27'),
(25, '46182104', '2013-05-23 07:41:27'),
(26, '46182104', '2013-05-23 07:41:27'),
(27, '46182104', '2013-05-23 07:41:27'),
(28, '46182104', '2013-05-23 07:41:27'),
(29, '46182104', '2013-05-23 07:41:27'),
(30, '46182104', '2013-05-23 07:41:27'),
(31, '46182104', '2013-05-23 07:41:27'),
(32, '46182104', '2013-05-23 07:41:27'),
(33, '46182104', '2013-05-23 07:41:27'),
(34, '46182104', '2013-05-23 07:41:27'),
(35, '46182104', '2013-05-23 07:41:27'),
(36, '46182104', '2013-05-23 07:41:27'),
(37, '46182104', '2013-05-23 07:41:27'),
(38, '46182104', '2013-05-23 07:41:27'),
(39, '46182104', '2013-05-23 07:41:27'),
(40, '46182104', '2013-05-23 06:42:53');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nhif_block`
--

INSERT INTO `nhif_block` (`nhif_block_id`, `nhif_max`, `nhif_min`, `nhif_amount`) VALUES
(1, '2000', '0', '300');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `payrol_basic_log`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pay_slips`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petty_cash_expense`
--

INSERT INTO `petty_cash_expense` (`petty_cash_expense_id`, `description`, `amount`, `date_recorded`) VALUES
(1, 'office tea', '300', '2013-05-22 20:24:12');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `petty_cash_income`
--

INSERT INTO `petty_cash_income` (`petty_cash_income_id`, `description`, `amount`, `date_recorded`) VALUES
(1, '2nd Establishment', '60000', '2013-05-23 06:16:51');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `petty_cash_ledger`
--

INSERT INTO `petty_cash_ledger` (`transaction_id`, `transactions`, `money_in`, `money_out`, `date_recorded`) VALUES
(1, '1st Estab', '30000', '30000', '2013-05-22 20:23:29'),
(2, 'office tea', '', '-300', '2013-05-22 20:24:12'),
(3, '2nd Establishment', '60000', '60000', '2013-05-23 06:16:51');

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
  `currency_code` varchar(100) NOT NULL,
  `exchange_rate` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `prod_code`, `pack_size`, `weight`, `reorder_level`, `curr_sp`, `curr_bp`, `currency_code`, `exchange_rate`, `status`) VALUES
(1, 1, 'Fully Auto Hematology Analyzer Machine', 'HA-22', '30mlx4', '20', '3', '1000000', '2250', '2', '84.1', 0),
(2, 1, 'RF', 'RF003', '30mlx4', '1210', '2', '1000000', '310', '2', '84.1', 0),
(3, 2, 'GOT', 'got0098', '30mlx6', '1', '3', '3000', '38', '2', '84.1', 0),
(4, 1, 'X-Rays', 'XXR', '30mlx4', '210', '5', '1000000', '230', '2', '84.1', 0),
(5, 3, 'Operation Table', 'TBLOP', '30mlx11', '213', '2', '690000', '320', '2', '86', 0),
(6, 1, 'Surgery Kit', 'SG088', '30mlx4', '200', '10', '6000', '45', '2', '84.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cat_desc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `purchases_ledger`
--

INSERT INTO `purchases_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'LPO No:BD0001/2013', '11700', '11700', '', 2, '84.1', '2013-05-18 17:54:53', 5),
(2, 'LPO No:BD0002/2013', '23021', '23021', '', 2, '84.1', '2013-05-18 18:52:57', 6),
(3, 'LPO No:BD0003/2013', '5724', '5724', '', 2, '84.1', '2013-05-21 19:16:30', 8),
(4, 'LPO No:BD0004/2013', '12613', '12613', '', 2, '84.1', '2013-05-21 19:45:58', 9);

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchases_returns_ledger`
--

INSERT INTO `purchases_returns_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Debit Note No:BDDN0001/2013', '4500', '', '4500', 2, '84.1', '2013-05-18 18:45:19', 0),
(2, 'Debit Note No:BDDN0002/2013', '4030', '', '4030', 2, '84.1', '2013-05-21 20:11:21', 0),
(3, 'Debit Note No:BDDN0003/2013', '540', '', '540', 2, '84.1', '2013-05-21 20:12:42', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_order_id`, `temp_purchase_order_id`, `supplier_id`, `user_id`, `shipping_agent_id`, `payment_term_id`, `currency_code`, `curr_rate`, `comments`, `product_id`, `product_code`, `order_code`, `quantity`, `vendor_prc`, `ttl`, `date_generated`, `status`) VALUES
(1, 1, 1, 10, 1, 'Cash', '2', '84.1', '', 1, 'HA-22', 1, '3', '22500', '', '2013-05-20 15:31:36', 1),
(2, 1, 3, 10, 6, 'Electronic Transfer', '2', '84.1', 'Note : Other Requirements\r\n1. Certificate Of Origin\r\n2. Original Commercial Invoice\r\n3. Packaging List\r\n4. AWB\r\n5. Please all items must be fresh produced - to avoid short expiry', 3, 'HA-22', 2, '3', '22500', '', '2013-05-20 15:31:36', 1),
(3, 1, 2, 10, 6, 'Electronic Transfer', '2', '84.1', 'comments', 3, 'HA-22', 3, '3', '22500', '', '2013-05-20 15:31:36', 1),
(4, 1, 3, 10, 6, 'Cash', '2', '84.1', 'coments', 1, 'HA-22', 4, '3', '22500', '', '2013-05-20 15:31:36', 1),
(5, 1, 1, 10, 6, 'Cash', '2', '84.1', 'bbb', 1, 'HA-22', 5, '3', '22500', '', '2013-05-20 15:31:36', 1),
(6, 1, 4, 10, 3, 'Cash', '2', '84.1', 'ff', 4, 'HA-22', 6, '3', '22500', '', '2013-05-20 15:31:36', 1),
(7, 1, 4, 10, 6, 'Cash', '2', '84.1', '', 1, 'HA-22', 7, '3', '22500', '', '2013-05-20 15:31:36', 1),
(8, 1, 2, 10, 1, 'Cash', '2', '84.1', 'foof', 6, 'SG088', 8, '120', '45', '', '2013-05-21 19:16:26', 1),
(9, 1, 4, 10, 6, 'Cash', '2', '84.1', 'good', 2, 'RF003', 9, '40', '310', '', '2013-05-21 19:45:56', 1);

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
  `vendor_price` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `received_stock`
--

INSERT INTO `received_stock` (`received_stock_id`, `purchase_order_id`, `order_code`, `product_id`, `supplier_id`, `quantity_rec`, `vendor_price`, `currency_code`, `curr_rate`, `delivery_date`, `expiry_date`, `status`, `date_received`) VALUES
(1, 5, 5, 1, 1, '5', '2250', 2, '84.1', '2013-05-05', '2013-05-30', 1, '2013-05-18 18:01:12'),
(2, 6, 6, 4, 4, '100', '230', 2, '84.1', '2013-05-05', '2013-05-29', 1, '2013-05-18 18:53:24'),
(3, 8, 8, 6, 2, '120', '45', 2, '84.1', '2013-05-01', '2013-05-22', 1, '2013-05-21 19:18:21'),
(4, 9, 9, 2, 4, '40', '310', 2, '84.1', '2013-05-05', '2013-05-31', 1, '2013-05-21 19:46:29');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `recovered_bad_debts`
--

INSERT INTO `recovered_bad_debts` (`recovered_bad_debts_id`, `sales_code`, `client_id`, `amount`, `reason`, `currency_code`, `curr_rate`, `date_received`, `status`) VALUES
(1, 10, 1, '3960000', 'collect', '6', '1', '2013-05-20 18:28:48', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`rfq_id`, `temp_rfq_id`, `supplier_id`, `user_id`, `product_id`, `product_code`, `rfq_code`, `quantity`, `date_generated`, `status`) VALUES
(1, 1, 2, 10, 1, 'HA-22', 2, '2', '2013-05-18 13:26:39', 1),
(2, 1, 1, 10, 1, 'HA-22', 3, '10', '2013-05-18 13:40:22', 1),
(3, 2, 1, 10, 3, 'got0098', 3, '100', '2013-05-18 13:40:39', 1),
(4, 1, 3, 10, 1, 'HA-22', 4, '100', '2013-05-18 13:48:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_code_get`
--

CREATE TABLE IF NOT EXISTS `rfq_code_get` (
  `rfq_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rfq_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rfq_code_get`
--

INSERT INTO `rfq_code_get` (`rfq_code_id`) VALUES
(1),
(2),
(3),
(4);

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

--
-- Dumping data for table `salaries_payables_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `salary_expenses_ledger`
--

INSERT INTO `salary_expenses_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(3, 'Salary', '1000000', '1000000', '', 6, '1', '2013-05-18 18:11:49');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `temp_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `purchase_order_id`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(1, 1, 1, 10, 16, '6', '1', 5, 1, 'HA-22', 1, '2', '1000000', '0', 0, '0', '2013-05-18 18:13:39', 1),
(2, 2, 4, 10, 16, '6', '1', 5, 1, 'HA-22', 2, '1', 'F.O.C', '0', 0, '0', '2013-05-18 19:09:45', 2),
(3, 3, 3, 10, 16, '6', '1', 6, 4, 'XXR', 3, '1', '1000000', '0', 10, '100000', '2013-05-18 18:54:39', 1),
(4, 4, 4, 10, 16, '6', '1', 6, 4, 'XXR', 4, '5', '1000000', '0', 1, '50000', '2013-05-18 19:12:54', 1),
(5, 5, 3, 10, 16, '6', '1', 6, 4, 'XXR', 7, '2', '1000000', '0', 2, '40000', '2013-05-20 04:55:23', 1),
(6, 6, 9, 10, 16, '6', '1', 6, 4, 'XXR', 8, '5', '1000000', '0', 1, '50000', '2013-05-20 04:59:34', 1),
(7, 7, 9, 10, 16, '6', '1', 6, 4, 'XXR', 9, '6', '1000000', '0', 1, '60000', '2013-05-20 05:14:41', 1),
(8, 8, 1, 10, 16, '6', '1', 6, 4, 'XXR', 10, '4', '1000000', '0', 1, '40000', '2013-05-20 06:26:37', 1),
(9, 9, 3, 10, 10, '6', '1', 6, 4, 'XXR', 11, '4', '1000000', '0', 1, '40000', '2013-05-21 08:40:29', 1),
(10, 10, 2, 10, 14, '2', '84.1', 8, 6, 'SG088', 12, '3', '6000', '0', 1, '180', '2013-05-21 19:42:15', 1),
(11, 11, 1, 10, 16, '2', '84.1', 6, 4, 'XXR', 14, '2', '1000000', '0', 2, '40000', '2013-05-21 20:27:49', 1),
(12, 12, 2, 10, 16, '2', '84.1', 6, 4, 'XXR', 19, '2', '1000000', '0', 1, '20000', '2013-05-22 19:42:26', 1),
(13, 13, 4, 10, 16, '2', '84.1', 9, 2, 'RF003', 20, '5', '1000000', '0', 1, '50000', '2013-05-23 06:22:04', 1),
(14, 14, 4, 10, 16, '2', '84.1', 6, 4, 'XXR', 21, '12', '1000000', '0', 0, '0', '2013-05-23 06:26:34', 1),
(15, 15, 4, 10, 16, '2', '84.1', 8, 6, 'SG088', 22, '6', '6000', '0', 1, '360', '2013-05-23 06:40:56', 1),
(16, 16, 4, 10, 16, '2', '84.1', 8, 6, 'SG088', 23, '1', '6000', '0', 1, '60', '2013-05-23 06:42:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `salesreturns_code_gen` (
  `salesreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_code` int(11) NOT NULL,
  PRIMARY KEY (`salesreturn_code_gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `salesreturns_code_gen`
--

INSERT INTO `salesreturns_code_gen` (`salesreturn_code_gen_id`, `sales_code`) VALUES
(1, 1),
(2, 12),
(3, 11),
(4, 10),
(5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `sales_code_get`
--

CREATE TABLE IF NOT EXISTS `sales_code_get` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(23);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sales_ledger`
--

INSERT INTO `sales_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Inv No:BDINV0001/2013', '2000000', '', '2000000', 6, '1', '2013-05-18 18:13:52'),
(2, 'Inv No:BDINV0002/2013', '0', '', '0', 6, '1', '2013-05-18 18:50:29'),
(3, 'Inv No:BDINV0003/2013', '900000', '', '900000', 6, '1', '2013-05-18 18:54:52'),
(4, 'Cancelation Of Invoice BDINV0002/2013', '-0', '0', '', 6, '1', '2013-05-18 19:09:45'),
(5, 'Inv No:BDINV0004/2013', '4950000', '', '4950000', 6, '1', '2013-05-18 19:13:43'),
(6, 'Cash Sales Receipt (Receipt No:BDCS0001/2013)', '1000000', '', '1000000', 6, '1', '2013-05-18 19:16:54'),
(7, 'Inv No:BDINV0005/2013', '4950000', '', '4950000', 6, '1', '2013-05-20 04:59:55'),
(8, 'Inv No:BDINV0006/2013', '5940000', '', '5940000', 6, '1', '2013-05-20 05:14:45'),
(9, 'Inv No:BDINV0007/2013', '3960000', '', '3960000', 6, '1', '2013-05-20 06:26:40'),
(10, 'Inv No:BDINV0008/2013', '3960000', '', '3960000', 6, '1', '2013-05-21 08:40:34'),
(11, 'Inv No:BDINV0009/2013', '17820', '', '17820', 6, '1', '2013-05-21 19:42:17'),
(12, 'Cash Sales Receipt (Receipt No:BDCS0002/2013)', '1980000', '', '1980000', 6, '1', '2013-05-21 19:52:15'),
(13, 'Inv No:BDINV0010/2013', '1960000', '', '1960000', 6, '1', '2013-05-21 20:27:52'),
(14, 'Cash Sales Receipt (Receipt No:BDCS0003/2013)', '2970000', '', '2970000', 6, '1', '2013-05-21 22:33:27'),
(15, 'Cash Sales Receipt (Receipt No:BDCS0004/2013)', '1980000', '', '1980000', 6, '1', '2013-05-21 22:37:24'),
(16, 'Cash Sales Receipt (Receipt No:BDCS0005/2013)', '2000000', '', '2000000', 6, '1', '2013-05-21 22:42:12'),
(17, 'Cash Sales Receipt (Receipt No:BDCS0006/2013)', '5880', '', '5880', 6, '1', '2013-05-21 22:44:55'),
(18, 'Inv No:BDINV0011/2013', '1980000', '', '1980000', 6, '1', '2013-05-22 19:42:42'),
(19, 'Inv No:BDINV0012/2013', '4950000', '', '4950000', 6, '1', '2013-05-23 06:22:07'),
(20, 'Inv No:BDINV0013/2013', '12000000', '', '12000000', 6, '1', '2013-05-23 06:26:36'),
(21, 'Inv No:BDINV0014/2013', '35640', '', '35640', 6, '1', '2013-05-23 06:40:59'),
(22, 'Inv No:BDINV0015/2013', '5940', '', '5940', 6, '1', '2013-05-23 06:42:07');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sales_receipt`
--

INSERT INTO `sales_receipt` (`sales_rep_id`, `receipt_no`, `amnt_rec`, `currency_code`, `curr_rate`, `mop`, `client_id`, `sales_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'BDSR0001/2013', '600000', '6', '1', 'Cash', 3, 3, 10, '2013-05-18 18:58:36', 0),
(2, 'BDSR0002/2013', '4000000', '6', '1', 'Cash', 9, 8, 10, '2013-05-20 05:02:44', 0),
(3, 'BDSR0003/2013', '5000000', '6', '1', 'Cash', 9, 9, 10, '2013-05-20 05:15:46', 0),
(4, 'BDSR0004/2013', '500000', '6', '1', 'Cash', 2, 19, 10, '2013-05-22 19:44:59', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales_returns`
--

INSERT INTO `sales_returns` (`sales_returns_id`, `product_code`, `product_id`, `purchase_order_id`, `selling_price`, `client_id`, `salesreturn_code`, `sales_code`, `sales_rep`, `invoice_id`, `sales_return_quantity`, `desc`, `date_returned`) VALUES
(1, 'HA-22', 1, 5, '1000000', 1, 1, 1, 16, 1, '1', 'defect', '2013-05-18 19:14:49'),
(2, '', 6, 8, '6000', 2, 2, 12, 14, 9, '1', 'defect', '2013-05-21 19:59:28'),
(3, '', 4, 6, '1000000', 3, 3, 11, 10, 8, '2', 'defect', '2013-05-21 20:03:51'),
(4, '', 4, 6, '1000000', 1, 4, 10, 16, 7, '3', 'defect', '2013-05-21 20:05:32'),
(5, '', 4, 6, '1000000', 1, 5, 14, 16, 10, '1', 'defect', '2013-05-21 20:31:15');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sales_return_ledger`
--

INSERT INTO `sales_return_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Credit Note No:BDCNT0001/2013', '1000000', '1000000', '', 6, '1', '2013-05-18 19:14:52'),
(2, 'Credit Note No:BDCNT0002/2013', '6000', '6000', '', 6, '1', '2013-05-21 19:59:30'),
(3, 'Credit Note No:BDCNT0003/2013', '2000000', '2000000', '', 6, '1', '2013-05-21 20:03:53'),
(4, 'Credit Note No:BDCNT0004/2013', '3000000', '3000000', '', 6, '1', '2013-05-21 20:05:34'),
(5, 'Credit Note No:BDCNT0005/2013', '1000000', '1000000', '', 6, '1', '2013-05-21 20:31:17');

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
  `status` int(1) NOT NULL DEFAULT '0',
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipper_name`, `address`, `town`, `phone`, `email`, `status`) VALUES
(1, 'Jommo Kenyatta Airport', '2345', 'Nairobi', '0723426754', 'jommo@jkia.co.ke', 2012),
(3, 'Eldoret International Airport', '7689999', 'Eldoret', '0723426754', 'mt@gmail.com', 0),
(6, 'Kenya Airways', 'P.O. BOX 2345', 'Nairobi', '024567', 'kq@kq.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stockreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `stockreturns_code_gen` (
  `stockreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`stockreturn_code_gen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stockreturns_code_gen`
--

INSERT INTO `stockreturns_code_gen` (`stockreturn_code_gen_id`, `order_code`) VALUES
(1, 5),
(2, 9),
(3, 8);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stock_payments`
--

INSERT INTO `stock_payments` (`stock_payments_id`, `lpo_no`, `cost_of_stock`, `amnt_paid`, `freight_charges`, `currency`, `exchange_rate`, `mop`, `supplier_id`, `order_code`, `user_id`, `date_paid`, `status`) VALUES
(1, 'BD0003/2013', '680', '680', '', '2', '84.1', 'Cash', 2, 3, 10, '2013-05-18 17:30:05', 0),
(2, 'BD0001/2013', '11700', '9000', '', '2', '84.1', 'Cash', 1, 5, 10, '2013-05-18 17:57:18', 0),
(3, 'BD0001/2013', '11700', '2070', '', '2', '84.1', 'Cash', 1, 5, 10, '2013-05-18 18:17:53', 0),
(4, 'BD0001/2013', '11700', '630', '', '2', '84.1', 'Cash', 1, 5, 10, '2013-05-18 18:19:52', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stock_returns`
--

INSERT INTO `stock_returns` (`stock_returns_id`, `product_code`, `purchase_order_id`, `product_id`, `vendor_price`, `currency`, `curr_rate`, `supplier_id`, `stockreturn_code`, `order_code`, `user_id`, `stock_return_quantity`, `reason`, `date_returned`) VALUES
(1, 'HA-22', 5, 1, '2250', '2', '84.1', 1, 1, 5, 10, '2', 'defect', '2013-05-18 18:45:16'),
(2, 'RF003', 9, 2, '310', '2', '84.1', 4, 2, 9, 10, '13', 'defect', '2013-05-21 20:11:19'),
(3, 'SG088', 8, 6, '45', '2', '84.1', 2, 3, 8, 10, '12', 'defect', '2013-05-21 20:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat_terminologies`
--

CREATE TABLE IF NOT EXISTS `sub_cat_terminologies` (
  `sub_cat_terminology_id` int(10) NOT NULL AUTO_INCREMENT,
  `minor_terminology_id` int(11) NOT NULL,
  `sub_cat_teminology` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_cat_terminology_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sub_cat_terminologies`
--

INSERT INTO `sub_cat_terminologies` (`sub_cat_terminology_id`, `minor_terminology_id`, `sub_cat_teminology`) VALUES
(1, 3, 'Furnitures'),
(2, 5, 'Loans'),
(3, 8, 'Rent Paid'),
(4, 4, 'Inventory'),
(5, 8, 'Electricity ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'Shares Capital', 3, '<li><a href="#"><span>Capital Account</span></a>\r\n						<div><ul>\r\n                        <li><a href="view_shares.php"><span>Shares Capital</span></a></li>\r\n						<li><a href="equity1.php"><span>Statement of Owners Equity</span></a></li>\r\n						\r\n						\r\n                         </ul></div>', 'Shares Capital', 0),
(2, 3, 'View Stock Availlability', 1, '<li><a href="all_stock.php"><span>View Stock Availlability</span></a></li>', 'Manage blocks', 0),
(3, 3, 'Opening Balances', 2, ' <li><a href="add_opening_balance.php"><span>Opening Balances</span></a>\r\n				\r\n				<div><ul id="fly">\r\n				<li><a href="add_cash_opening_balance.php"><span>Accounting Balance</span></a></li>\r\n				<li><a href="add_client_opening_balance.php"><span>Customers Balance</span></a></li>\r\n\r\n\r\n            </ul></div>\r\n				\r\n				\r\n				</li>', 'Titles', 0),
(4, 3, 'Product Categories Management', 98, '<li><a href="view_mach_cat.php"><span>Product Categories Management</span></a></li>', 'product cat', 0),
(5, 3, 'General Settings', 8, '<li><a href="view_currency.php"><span>General Settings</span></a></li>', 'Manages Clients', 0),
(6, 3, 'Company Settings', 9, '<li><a href="add_contacts.php"><span>Company Settings</span></a></li>', '', 0),
(7, 4, 'User Group Management', 10, '<li><a href="add_user_groups.php">User Group Management</a></li>', 'vbvb', 0),
(8, 4, 'Modules and Submodules', 11, '<li><a href="add_module.php">Modules and Submodules</a></li>', '', 0),
(9, 4, 'Modules User Group Relation', 12, '<li><a href="assign_module_usergroup.php">Modules User Group Relation</a></li>', '', 0),
(10, 4, 'Users Management', 13, '<li><a href="view_user.php">Users Management</a></li>', '', 0),
(11, 5, 'Stock in Warehouse', 15, '<li><a href="closing_stock.php"><span>Stock in Warehouse</span></a></li>', '', 0),
(12, 5, 'Our Price List', 16, '<li><a href="price_list.php"><span>Our Price List</span></a></li>', '', 0),
(13, 5, 'Purchases Returns', 24, '<li><a href="view_debit_notes.php"><span>Purchases Returns</span></a></li>', '', 0),
(41, 34, 'Payroll Reports', 24, '<li><a href="#"><span>Payroll Reports</span></a>\r\n						<div><ul>\r\n                \r\n				\r\n				        <li><a href="view_payslips.php"><span>Payslips</span></a></li>\r\n						<!--<li><a href="salaries_and_commission_payables_ledger.php"><span>Sal. & Com. Payables Ledger</span></a></li>-->\r\n					\r\n               \r\n              \r\n            </ul></div>\r\n						\r\n						</li>', '', 0),
(14, 5, 'Purchases Transactions', 19, '<li><a href="receive_stock.php"><span>Purchases Transactions</span></a></li>', '', 0),
(15, 5, 'Stock Procurement', 1, '<li><a href=""><span>Stock Procurement</span></a>\r\n				<div><ul>\r\n                \r\n				\r\n				<li><a href="begin_order.php"><span>Create Purchase Order</span></a></li>\r\n				<li><a href="begin_rfq.php"><span>Request for Quotation</span></a></li>\r\n\r\n\r\n            </ul></div>', '', 0),
(16, 5, 'Products Management', 23, '<li><a href="view_prod.php"><span>Products Management</span></a></li>\r\n			\r\n			', '', 0),
(17, 6, 'Invoice Generation', 26, '<li><a href="begin_invoice.php"><span>Invoice Generation</span></a></li>', '', 0),
(40, 13, 'Process Payroll', 23, '<li><a href="assoc_employees.php"><span>Process Payroll</span></a></li>', '', 0),
(18, 6, 'Generate Quotation', 27, '<li><a href="begin_quote.php"><span>Generate Quotation</span></a></li>', '', 0),
(38, 12, 'Manage Employees', 1, '<li><a href="view_employees.php"><span>Manage Employees</a></li>', '', 0),
(37, 6, 'Balance Sheets', 109, '<li><a href="view_balance_sheet.php"><span>Balance Sheet</span></a></li>', '', 0),
(46, 3, 'Chart Of Accounts', 10, '<li><a href="view_terminology.php">Chart Of Accounts</a></li>', '', 0),
(19, 6, 'Sales Transactions', 28, '<li><a href="pay_invoice.php"><span>Sales Transactions</span></a></li>', '', 0),
(39, 12, 'Payroll Master', 23, '<li><a href="#"><span>Payroll Master</span></a>\r\n						<div><ul>\r\n                       <!--<li><a href="view_banks.php"><span>Banks and Branches</span></a></li>-->\r\n						<li><a href="view_nhif.php"><span>NHIF Rates</span></a></li>\r\n						<li><a href="view_paye.php"><span>PAYE Tax Blocks</span></a></li>\r\n						<li><a href="add_deductions.php"><span>Benefits and Deductions</span></a></li>\r\n						<!--<li><a href="add_loan_type.php"><span>Loans and Savings</span></a></li>-->\r\n						\r\n						\r\n                         </ul></div>\r\n						\r\n						\r\n						\r\n						</li>', '', 0),
(20, 7, 'Sales Returns', 30, '<li><a href="view_sales_returns.php"><span>Sales Returns</span></a></li>', '', 0),
(21, 7, 'Bad Debts Transactions', 31, '<li><a href="bad_debts.php"><span>Bad Debts Transactions</span></a></li>', '', 0),
(22, 7, 'Cash Sales', 32, '<li><a href="begin_cash_sales.php"><span>Cash Sales</span></a></li>', '', 0),
(23, 7, 'Sales Commission', 33, '<li><a href="view_comm_payments.php"><span>Sales Commission</span></a></li>', '', 0),
(24, 8, 'Record General Expenses', 34, '<li><a href="view_expenses.php"><span>Record General Expenses</span></a></li>', '', 0),
(25, 8, 'Record General Income', 35, '<li><a href="view_income.php"><span>Record General Income</span></a></li>', '', 0),
(26, 8, 'Petty Cash Transactions', 36, '<li><a href="add_petty_cash_expense.php"><span>Petty Cash Transactions</span></a></li>', '', 0),
(27, 8, 'Record Loan Received', 37, '<li><a href="add_loan.php"><span>Record Loan Received</span></a></li>', '', 0),
(28, 8, 'Record Fixed Assets', 39, '<li><a href="add_fixed_asset.php"><span>Record Fixed Assets</span></a></li>', '', 0),
(29, 8, 'Record Depreciation', 40, '<li><a href="depreciation.php"><span>Record Depreciation</span></a></li>', '', 0),
(30, 9, 'Setup Financial Year', 1, '<li><a href="add_fyear.php"><span>Setup Financial Year</span></a></li>', '', 0),
(31, 9, 'Exchange Rate Variations', 43, '<li><a href="exchange_rate_variations.php"><span>Exchange Rate Variations</span></a></li>', '', 0),
(32, 9, 'Accounts Ledgers', 3, '<li><a href="#"><span>Accounts Ledgers</span></a>\r\n						<div><ul>\r\n                        <li><a href="general_ledger.php"><span>General Ledger</span></a></li>\r\n						<li><a href="sales_ledger.php"><span>Sales Revenue Ledger</span></a></li>\r\n<li><a href="inventory_ledger.php"><span>Stock Inventoty Ledger</span></a></li>\r\n\r\n<li><a href="sales_return_ledger.php"><span>Sales Returns Ledger</span></a></li>\r\n\r\n\r\n						<li><a href="purchases_ledger.php"><span>Purchases Ledger</span></a></li>\r\n\r\n<li><a href="purchase_returns_ledger.php"><span>Purchases Returns Ledger</span></a></li>\r\n						<li><a href="view_cash_ledger.php"><span>Cash Ledger</span></a></li>\r\n						<li><a href="view_expenses_ledger.php"><span>All Expenses Ledger</span></a></li>\r\n						<li><a href="accounts_receivables_ledger.php"><span>Accounts Receivable Ledger</span></a></li>\r\n						<li><a href="accounts_payables_ledger.php"><span>Accounts Payables Ledger</span></a></li>\r\n						<li><a href="view_loan_ledger.php"><span>Loan Ledger</span></a></li>\r\n						<li><a href="doubtful_debts_ledger.php"><span>Doubtful Debts Ledger</span></a></li>\r\n						<li><a href="bad_debts_ledger.php"><span>Bad Debts Ledger</span></a></li>\r\n						<li><a href="view_petty_cash_ledger.php"><span>Petty Cash Ledger</span></a></li>\r\n						<li><a href="fixed_asset_ledger.php"><span>Fixed Asset Ledger</span></a></li>\r\n                        </ul></div>', '', 0),
(33, 9, 'Profit and Loss Account', 37, '<li><a href="view_tpla.php"><span>Profit and Loss Account</span></a></li>', '', 0),
(34, 7, 'Debtors and Creditors', 50, '<li><a href="#"><span>Debtors and Creditors</span></a>\r\n						<div><ul>\r\n\r\n                        <li><a href="view_sales_returns.php"><span>Credit Notes</span></a></li>\r\n						<li><a href="view_debit_notes.php"><span>Debit Notes</span></a></li>\r\n						\r\n						\r\n						\r\n                         </ul></div>\r\n                        </li>', 'Manages fixed asset management', 0),
(42, 12, 'Our Suppliers', 45, ' <li><a href="view_supplier.php"><span>Our Suppliers</span></a></li>', '', 0),
(43, 13, 'Our Clients', 21, '<li><a href="view_customers.php"><span>Our Clients</span></a></li>', '', 0),
(44, 15, 'Our Shipping Agents', 34, '<li><a href="view_ship.php"><span>Our Shipping Agents</span></a></li>', '', 0),
(45, 3, 'sasasas', 234, '<li><a href="home.php?newsponsor=newsponsor">Currencies</a></li>', 'ssas', 0);

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
(1, ' Clindiag Systems Co. Ltd', 'Sara Wan', 'United State of America', 'Nanjing', 'Nanjing', '09089000000222', 'sara@clindiag.com', '2013-02-23 15:19:00'),
(2, ' Turk lab', 'Mr. Zankora', 'Tanzania', 'nunjagg', 'Istanbul', '009877665554', 'turklab@turklab.com', '2013-02-23 15:20:43'),
(3, ' Crown Health Care Kenya Ltd', 'Grace', 'Kenya', 'Westlands', 'Nairobi', '0788654222', 'grace@crownhealth.com', '2013-02-23 15:22:04'),
(4, 'Juba Investmentst', 'A. Minga', 'Uganda', 'Texas', 'Texas City', '+117654', 'juba@juba.com', '2013-05-18 07:08:26');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`transaction_id`, `supplier_id`, `order_code`, `transaction`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 1, 5, 'LPO No:BD0001/2013', 2, '84.1', '11700', '2013-05-18 17:54:53'),
(2, 1, 5, 'Payment against LPO NoBD0001/2013', 2, '84.1', '-9000', '2013-05-18 17:57:18'),
(3, 1, 5, 'Payment against LPO NoBD0001/2013', 2, '84.1', '-2070', '2013-05-18 18:17:53'),
(4, 1, 5, 'Payment against LPO NoBD0001/2013', 2, '84.1', '-630', '2013-05-18 18:19:52'),
(5, 1, 0, 'Debit Note No:BDDN0001/2013', 2, '84.1', '-4500', '2013-05-18 18:45:19'),
(6, 4, 6, 'LPO No:BD0002/2013', 2, '84.1', '23021', '2013-05-18 18:52:57'),
(7, 2, 8, 'LPO No:BD0003/2013', 2, '84.1', '5724', '2013-05-21 19:16:30'),
(8, 4, 9, 'LPO No:BD0004/2013', 2, '84.1', '12613', '2013-05-21 19:45:58'),
(9, 4, 0, 'Debit Note No:BDDN0002/2013', 2, '84.1', '-4030', '2013-05-21 20:11:21'),
(10, 2, 0, 'Debit Note No:BDDN0003/2013', 2, '84.1', '-540', '2013-05-21 20:12:42');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `temp_cash_sales`
--

INSERT INTO `temp_cash_sales` (`temp_cash_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(1, 6, 10, 16, '2', '84.1', 6, 'SG088', 18, '1', '6000', '0', 2, '120', '2013-05-21 22:44:02', 1);

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
(1, 4, 10, 6, 'Cash', '2', '84.1', 'good', 2, 'RF003', 9, '40', '310', '', '2013-05-21 19:45:56', 1);

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
(1, 3, 10, 1, 'HA-22', 4, '100', '2013-05-18 13:48:58', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `temp_sales`
--

INSERT INTO `temp_sales` (`temp_sales_id`, `client_id`, `user_id`, `sales_rep`, `currency_code`, `curr_rate`, `purchase_order_id`, `product_id`, `product_code`, `sales_code`, `quantity`, `selling_price`, `vat_value`, `discount_perc`, `discount_value`, `date_generated`, `status`) VALUES
(16, 4, 10, 16, '2', '84.1', 8, 6, 'SG088', 23, '1', '6000', '0', 1, '60', '2013-05-23 06:42:05', 1);

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
(1, '', 4, 6, '1000000', 1, 5, 14, 16, 10, '1', 'defect', '2013-05-21 20:31:15');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `temp_stock_returns`
--

INSERT INTO `temp_stock_returns` (`temp_stock_returns_id`, `stock_returns_id`, `product_code`, `purchase_order_id`, `product_id`, `vendor_price`, `currency`, `curr_rate`, `supplier_id`, `stockreturn_code`, `order_code`, `user_id`, `stock_return_quantity`, `reason`, `date_returned`) VALUES
(3, 3, 'SG088', 8, 6, '45', '2', '84.1', 2, 3, 8, 10, '12', 'defect', '2013-05-21 20:12:41');

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
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_id`, `user_group_id`, `username`, `password`, `date_created`, `islogged_in`) VALUES
(10, 9, 15, 'osero ', 'd97d3a75495b93f3c8ec2e1aea44b31a', '2013-05-23 05:57:09', 1),
(14, 13, 1, 'hussein ', '86a5f0f949bb55dab4626fa9716b16af', '2013-05-07 04:29:37', 0),
(13, 14, 19, 'zawawi     ', '81dc9bdb52d04dc20036dbd8313ed055', '2013-05-15 09:14:54', 0),
(15, 15, 17, 'collins ', 'd41d8cd98f00b204e9800998ecf8427e', '2013-05-15 09:37:09', 0),
(16, 16, 14, 'collo', '7d9ff7b0d33e227f435308ed73c053a4', '2013-05-20 06:15:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersold`
--

CREATE TABLE IF NOT EXISTS `usersold` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `usersold`
--

INSERT INTO `usersold` (`user_id`, `emp_id`, `group_id`, `username`, `password`, `date_created`, `status`) VALUES
(1, 9, 1, 'osero  ', 'osero', '2013-02-11 04:19:01', 1),
(12, 14, 3, 'admin', 'admin', '2013-04-11 18:07:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `description`) VALUES
(1, 'Administrator', ''),
(2, 'Normal User', ''),
(13, 'Costing And Estimation', ''),
(14, 'Human Resource Department', ''),
(15, 'Super Administrator', 'Super administrator'),
(17, 'Sales Representatives', 'Sales'),
(19, 'Marketing and Promotions', 'Market company products'),
(20, 'Customer Service', 'Front Office');

-- --------------------------------------------------------

--
-- Table structure for table `user_groupsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`
--

CREATE TABLE IF NOT EXISTS `user_groupsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_groupsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx`
--

INSERT INTO `user_groupsxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx` (`group_id`, `group_name`, `description`, `status`) VALUES
(1, 'Super Administrator', '', '0'),
(2, 'Administrator', '', '0'),
(3, 'Sales Representative', '', '0'),
(5, 'Normal User', '', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_group_module`
--

INSERT INTO `user_group_module` (`user_group_module_id`, `user_group_id`, `module_id`, `status`) VALUES
(1, 15, 1, 0),
(2, 15, 3, 0),
(3, 15, 4, 0),
(4, 15, 5, 0),
(5, 15, 6, 0),
(6, 15, 7, 0),
(7, 15, 8, 0),
(8, 15, 9, 0),
(14, 2, 6, 0),
(12, 15, 11, 0),
(11, 15, 12, 0),
(13, 1, 3, 0),
(15, 17, 1, 0),
(16, 17, 6, 0),
(17, 19, 1, 0),
(21, 14, 1, 0),
(19, 19, 6, 0),
(20, 19, 11, 0),
(22, 14, 8, 0),
(24, 14, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group_moduleold`
--

CREATE TABLE IF NOT EXISTS `user_group_moduleold` (
  `user_group_module_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) NOT NULL,
  `module_id` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`user_group_module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_group_moduleold`
--

INSERT INTO `user_group_moduleold` (`user_group_module_id`, `user_group_id`, `module_id`, `status`) VALUES
(1, 1, 1, 0),
(3, 1, 4, 0),
(5, 1, 6, 0),
(28, 14, 7, 0),
(8, 1, 9, 0),
(9, 1, 10, 0),
(10, 2, 1, 0),
(11, 2, 5, 0),
(12, 2, 10, 0),
(13, 13, 5, 0),
(14, 13, 10, 0),
(15, 14, 6, 0),
(26, 14, 10, 0),
(17, 15, 1, 0),
(18, 15, 3, 0),
(19, 15, 4, 0),
(20, 15, 5, 0),
(21, 15, 6, 0),
(22, 15, 7, 0),
(23, 15, 8, 0),
(24, 15, 9, 0),
(25, 15, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE IF NOT EXISTS `vat` (
  `vat_id` int(11) NOT NULL AUTO_INCREMENT,
  `vat_percentage` varchar(100) NOT NULL,
  PRIMARY KEY (`vat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vat`
--


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

