-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2015 at 05:28 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garage_system`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accounting_terminologies`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `accounts_payables_ledger`
--

INSERT INTO `accounts_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Purchase Order LPO No:BD0002/2014', '3120', '', '3120', 6, '1', '2014-12-20 12:42:22', 'po2'),
(2, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2014-12-20 12:42:22', 'fc2'),
(3, 'Cancel Purchase Order LPO No:BD0005/2014 (CANCELLED)', '-', '', '', 6, '1', '2014-12-24 16:50:59', 'cancpo5'),
(4, 'Cancel Purchase Order LPO No:BD0004/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:51:15', 'cancpo4'),
(5, 'Cancel Purchase Order LPO No:BD0003/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:51:50', 'cancpo3'),
(6, 'Cancel Purchase Order LPO No:BD0001/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:52:07', 'cancpo1'),
(7, 'Purchase Order LPO No:BD0006/2015', '3560', '', '3560', 6, '1', '2015-01-03 09:26:07', 'po6'),
(8, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-03 09:26:07', 'fc6'),
(9, 'Purchase Order LPO No:BD0024/2015', '4000', '', '4000', 6, '1', '2015-01-07 14:12:02', 'po24'),
(10, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:12:02', 'fc24'),
(11, 'Purchase Order LPO No:BD0019/2015', '20160', '', '20160', 6, '1', '2015-01-07 14:13:32', 'po19'),
(12, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:13:32', 'fc19'),
(13, 'Purchase Order LPO No:BD0017/2015', '11440', '', '11440', 6, '1', '2015-01-07 14:13:58', 'po17'),
(14, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:13:58', 'fc17'),
(15, 'Purchase Order LPO No:BD0016/2015', '17840', '', '17840', 6, '1', '2015-01-07 14:14:23', 'po16'),
(16, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:14:23', 'fc16'),
(17, 'Purchase Order LPO No:BD0015/2015', '9700', '', '9700', 6, '1', '2015-01-07 14:15:06', 'po15'),
(18, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:15:06', 'fc15'),
(19, 'Purchase Order LPO No:BD0023/2015', '13950', '', '13950', 6, '1', '2015-01-07 14:15:42', 'po23'),
(20, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-07 14:15:42', 'fc23'),
(21, 'Purchase Order LPO No:BD0034/2015', '34550', '', '34550', 6, '1', '2015-01-11 09:17:19', 'po34'),
(22, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-11 09:17:19', 'fc34'),
(23, 'Purchase Order LPO No:BD0033/2015', '31800', '', '31800', 6, '1', '2015-01-11 09:17:33', 'po33'),
(24, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-11 09:17:33', 'fc33'),
(25, 'Purchase Order LPO No:BD0027/2015', '8900', '', '8900', 6, '1', '2015-01-14 06:21:33', 'po27'),
(26, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-14 06:21:33', 'fc27'),
(27, 'Purchase Order LPO No:BD0038/2015', '5927', '', '5927', 6, '1', '2015-01-14 07:01:24', 'po38'),
(28, 'Freight Charges for Goods Supplied By:Local Purchase', '670', '', '670', 6, '1', '2015-01-14 07:01:24', 'fc38'),
(29, 'Purchase Order LPO No:BD0043/2015', '531', '', '531', 6, '1', '2015-01-14 14:48:28', 'po43'),
(30, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-14 14:48:28', 'fc43'),
(31, 'Purchase Order LPO No:BD0035/2015', '1000', '', '1000', 6, '1', '2015-01-16 14:32:10', 'po35'),
(32, 'Freight Charges for Goods Supplied By:Local Purchase', '0', '', '0', 6, '1', '2015-01-16 14:32:10', 'fc35');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `accounts_receivables_ledger`
--

INSERT INTO `accounts_receivables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Customer Payment Receipt No : (MGSR0001/2015) Received from  Engen petrol station', '-12000', '', '12000', 6, '1', '2015-01-13 14:21:18', 'crsp1'),
(2, 'Cancelation Of Credit sales Invoice  Reason ()', '-', '', '', 0, '', '2015-01-15 08:02:09', 'cns'),
(3, 'Labour Sales Inv No:73 To Team Fergie Transporters Ltd', '12480', '12480', '', 6, '1', '2015-01-15 10:10:13', 'inv73'),
(4, 'Labour Sales Inv No:75 To Long term view capital ltd', '1610', '1610', '', 6, '1', '2015-01-16 10:29:47', 'inv75'),
(5, 'Labour Sales Inv No:74 To Jackson Muraya', '2980', '2980', '', 6, '1', '2015-01-16 10:35:25', 'inv74'),
(6, 'Labour Sales Inv No:72 To Team Fergie Transporters Ltd', '12860', '12860', '', 6, '1', '2015-01-16 10:39:20', 'inv72'),
(7, 'Labour Sales Inv No:71 To Team Fergie Transporters Ltd', '21590', '21590', '', 6, '1', '2015-01-18 03:44:41', 'inv71'),
(8, 'Labour Sales Inv No: To ', '12860', '12860', '', 6, '1', '2015-01-18 03:53:32', 'inv'),
(9, 'Labour Sales Inv No: To ', '12860', '12860', '', 6, '1', '2015-01-18 03:54:09', 'inv'),
(10, 'Labour Sales Inv No: To ', '12860', '12860', '', 6, '1', '2015-01-18 03:56:13', 'inv'),
(11, 'Labour Sales Inv No:69 To Team Fergie Transporters Ltd', '16060', '16060', '', 6, '1', '2015-01-18 04:05:19', 'inv69'),
(12, 'Labour Sales Inv No:67 To Long term view capital ltd', '7110', '7110', '', 6, '1', '2015-01-18 04:08:16', 'inv67'),
(13, 'Labour Sales Inv No:70 To Long term view capital ltd', '12860', '12860', '', 6, '1', '2015-01-18 04:09:17', 'inv70'),
(14, 'Customer Payment Receipt No : (MGSR0002/2015) Received from  martha Njenga', '-3200', '', '3200', 6, '1', '2015-01-19 16:11:37', 'crsp2');

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

--
-- Dumping data for table `additional_investments`
--


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

--
-- Dumping data for table `additional_investments_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `all_rfq`
--

INSERT INTO `all_rfq` (`all_rfq_id`, `rfq_no`, `supplier_id`, `rfq_code`, `user_id`, `date_generated`, `status`) VALUES
(1, 'RFQ0001/2014', 26, 1, 64, '2014-12-24 16:57:05', 2),
(2, 'RFQ0002/2014', 2, 0, 64, '2014-12-24 17:11:21', 1),
(3, 'RFQ0003/2015', 2, 4, 19, '2015-01-03 11:41:30', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `approved_client_payment`
--

INSERT INTO `approved_client_payment` (`approved_client_payment_id`, `invoice_payment_id`, `approving_user_id`, `date_approved`, `status`) VALUES
(1, 2, 19, '2015-01-19 16:11:37', 0),
(2, 1, 19, '2015-01-19 16:15:27', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `approved_lpo`
--

INSERT INTO `approved_lpo` (`approved_lpo_id`, `order_code`, `approving_user_id`, `date_approved`, `status`) VALUES
(1, 2, 64, '2014-12-20 12:42:22', 0),
(2, 6, 64, '2015-01-03 09:26:07', 0),
(3, 24, 64, '2015-01-07 14:12:02', 0),
(4, 19, 64, '2015-01-07 14:13:32', 0),
(5, 17, 64, '2015-01-07 14:13:58', 0),
(6, 16, 64, '2015-01-07 14:14:23', 0),
(7, 15, 64, '2015-01-07 14:15:06', 0),
(8, 23, 64, '2015-01-07 14:15:42', 0),
(9, 34, 64, '2015-01-11 09:17:19', 0),
(10, 33, 64, '2015-01-11 09:17:33', 0),
(11, 27, 19, '2015-01-14 06:21:33', 0),
(12, 38, 19, '2015-01-14 07:01:24', 0),
(13, 43, 19, '2015-01-14 14:48:28', 0),
(14, 35, 19, '2015-01-16 14:32:10', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `approved_payroll`
--

INSERT INTO `approved_payroll` (`approved_payroll_id`, `payroll_id`, `date_approved`, `approving_user_id`, `status`) VALUES
(1, 8, '2015-01-20 03:01:33', 19, 1),
(2, 7, '2015-01-20 03:02:32', 19, 1),
(3, 6, '2015-01-20 03:02:38', 19, 1),
(4, 10, '2015-01-20 04:46:38', 19, 1),
(5, 11, '2015-01-20 06:26:35', 19, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assigned_job_card`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=239 ;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 62, '2014-12-18 16:02:52', 'Update the flat rate cost'),
(2, 2, '2014-12-19 13:17:17', 'Edited employee details by the name Jonah   JOnah   Jonah '),
(3, 19, '2014-12-19 13:36:45', 'Viewed all recorded cheque deposits'),
(4, 64, '2014-12-20 12:42:22', 'Approved LPO: No BD0002/2014'),
(5, 64, '2014-12-20 12:43:35', 'Received 2 O ring Kit - 3 inch (Pieces) into the warehous'),
(6, 64, '2014-12-20 12:43:48', 'Received 21 O ring Kit - 2 inch (Pieces) into the warehous'),
(7, 64, '2014-12-20 12:44:06', 'Received 36 O ring Kit - 3 inch (Pieces) into the warehous'),
(8, 64, '2014-12-20 12:44:25', 'Deleted a product O ring Kit - 3 inch(Pieces)  from the warehouse'),
(9, 64, '2014-12-20 12:45:36', 'Received 34 O ring Kit - 3 inch (Pieces) into the warehous'),
(10, 64, '2014-12-20 12:45:45', 'Received 3 O ring Kit - 2 inch (Pieces) into the warehous'),
(11, 64, '2014-12-20 12:54:02', 'Released 1  () into the warehous'),
(12, 64, '2014-12-20 12:54:19', 'Released 1  () into the warehous'),
(13, 64, '2014-12-20 12:55:07', 'Released 3  () into the warehous'),
(14, 64, '2014-12-20 12:55:19', 'Released 1  () into the warehous'),
(15, 64, '2014-12-23 15:01:21', 'Deleted a released item from the system'),
(16, 64, '2014-12-23 15:01:25', 'Deleted a released item from the system'),
(17, 64, '2014-12-23 15:33:52', 'Updates Sales Transactions'),
(18, 64, '2014-12-23 16:02:03', 'Released 1  () into the warehous'),
(19, 64, '2014-12-23 16:02:24', 'Released 1  () into the warehous'),
(20, 64, '2014-12-24 15:44:25', 'Created a supplier  TOOLCRAFTS LTD into the system'),
(21, 64, '2014-12-24 15:52:43', 'Released 1  () into the warehous'),
(22, 64, '2014-12-24 15:52:57', 'Released 1  () into the warehous'),
(23, 64, '2014-12-24 16:50:59', 'Canceled Purchase Order BD0005/2014'),
(24, 64, '2014-12-24 16:51:15', 'Canceled Purchase Order BD0004/2014'),
(25, 64, '2014-12-24 16:51:50', 'Canceled Purchase Order BD0003/2014'),
(26, 64, '2014-12-24 16:52:07', 'Canceled Purchase Order BD0001/2014'),
(27, 64, '2014-12-24 16:53:14', 'Requested for a quotation'),
(28, 64, '2014-12-24 16:54:38', 'Requested for a quotation'),
(29, 64, '2014-12-24 16:56:01', 'Updates Sales Transactions'),
(30, 64, '2014-12-24 16:57:05', 'Canceled RFQ '),
(31, 62, '2014-12-30 12:47:02', 'Update the flat rate cost'),
(32, 62, '2014-12-30 12:47:22', 'Update the flat rate cost'),
(33, 64, '2015-01-03 09:26:07', 'Approved LPO: No BD0006/2015'),
(34, 19, '2015-01-03 11:41:28', 'Requested for a quotation'),
(35, 19, '2015-01-03 13:09:48', 'Received 4 AT transmission (Pieces) into the warehous'),
(36, 64, '2015-01-05 09:33:24', 'Released 4  () into the warehous'),
(37, 64, '2015-01-05 09:33:47', 'Released 1  () into the warehous'),
(38, 64, '2015-01-05 15:46:08', 'Released 1  () into the warehous'),
(39, 64, '2015-01-05 15:46:27', 'Released 1  () into the warehous'),
(40, 64, '2015-01-06 07:59:47', 'Created a supplier  WAGDAH MOTORS into the system'),
(41, 64, '2015-01-06 10:37:52', 'Created a supplier  IMPALA AUTO SPARES into the system'),
(42, 64, '2015-01-06 12:29:10', 'Deleted a purchase order transaction'),
(43, 64, '2015-01-06 12:29:13', 'Deleted a purchase order transaction'),
(44, 64, '2015-01-06 13:31:34', 'Updates Sales Transactions'),
(45, 64, '2015-01-07 08:06:20', 'Updates Sales Transactions'),
(46, 64, '2015-01-07 08:12:03', 'Updates Sales Transactions'),
(47, 64, '2015-01-07 14:12:02', 'Approved LPO: No BD0024/2015'),
(48, 64, '2015-01-07 14:13:32', 'Approved LPO: No BD0019/2015'),
(49, 64, '2015-01-07 14:13:58', 'Approved LPO: No BD0017/2015'),
(50, 64, '2015-01-07 14:14:23', 'Approved LPO: No BD0016/2015'),
(51, 64, '2015-01-07 14:15:06', 'Approved LPO: No BD0015/2015'),
(52, 64, '2015-01-07 14:15:42', 'Approved LPO: No BD0023/2015'),
(53, 64, '2015-01-07 14:17:06', 'Received 10 Spark Plugs BKR6E2756 (Pieces) into the warehous'),
(54, 64, '2015-01-07 14:17:20', 'Received 8 Spark Plugs BP6ES-7811 (Pieces) into the warehous'),
(55, 64, '2015-01-07 14:17:35', 'Received 8 Spark Plugs BP6EY-6278 (Pieces) into the warehous'),
(56, 64, '2015-01-07 14:17:48', 'Received 10 Spark Plugs BCP5ES-7810 (Pieces) into the warehous'),
(57, 64, '2015-01-07 14:18:01', 'Received 8 Spark plugs BKR6EYA4195 (Pieces) into the warehous'),
(58, 64, '2015-01-07 14:18:16', 'Received 10 Spark Plugs Denso K16Single (Pieces) into the warehous'),
(59, 64, '2015-01-07 14:18:31', 'Received 10 Spark Plugs Denso K16Double (Pieces) into the warehous'),
(60, 64, '2015-01-07 14:18:41', 'Received 10 Spark Plugs Denso Q20 Single (Pieces) into the warehous'),
(61, 64, '2015-01-07 14:18:54', 'Received 10 Spark Plugs  K20Double (Pieces) into the warehous'),
(62, 64, '2015-01-07 14:20:52', 'Received 2 Air filterAA090 (Pieces) into the warehous'),
(63, 64, '2015-01-07 14:21:01', 'Received 2 Air filterAA070 (Pieces) into the warehous'),
(64, 64, '2015-01-07 14:21:12', 'Received 2 Air filterP2J-003 (Pieces) into the warehous'),
(65, 64, '2015-01-07 14:21:26', 'Received 2 Air filterPNB003 (Pieces) into the warehous'),
(66, 64, '2015-01-07 14:21:36', 'Received 2 Air filterEB300 (Pieces) into the warehous'),
(67, 64, '2015-01-07 14:21:53', 'Received 2 Air filter50060 (Pieces) into the warehous'),
(68, 64, '2015-01-07 14:22:05', 'Received 4 Air filteB1010 (Pieces) into the warehous'),
(69, 64, '2015-01-07 14:22:23', 'Received 2 Air filterPWJ-A10 (Pieces) into the warehous'),
(70, 64, '2015-01-07 14:22:34', 'Received 2 Air filter67060 (Pieces) into the warehous'),
(71, 64, '2015-01-07 14:22:47', 'Received 2 Air filter47010 (Pieces) into the warehous'),
(72, 64, '2015-01-07 14:22:59', 'Received 2 Air filter4M400 (Pieces) into the warehous'),
(73, 64, '2015-01-07 14:23:48', 'Received 10 Spark plugs 8H516 (Pieces) into the warehous'),
(74, 64, '2015-01-07 14:24:17', 'Received 6 Air filter11050 (Pieces) into the warehous'),
(75, 64, '2015-01-07 14:24:30', 'Received 6 Air filter11090 (Pieces) into the warehous'),
(76, 64, '2015-01-07 14:24:39', 'Received 6 Air filter15070 (Pieces) into the warehous'),
(77, 64, '2015-01-07 14:24:48', 'Received 6 Air filter16020 (Pieces) into the warehous'),
(78, 64, '2015-01-07 14:24:59', 'Received 6 Air filter21030 (Pieces) into the warehous'),
(79, 64, '2015-01-07 14:26:19', 'Received 12 Air filter21050 (Pieces) into the warehous'),
(80, 64, '2015-01-07 14:26:34', 'Received 12 Air filter22020 (Pieces) into the warehous'),
(81, 64, '2015-01-07 14:26:49', 'Received 6 Air filter23030 (Pieces) into the warehous'),
(82, 64, '2015-01-07 14:28:03', 'Received 2 Air filter35020 (Pieces) into the warehous'),
(83, 64, '2015-01-07 14:28:14', 'Received 6 Air filter74020 (Pieces) into the warehous'),
(84, 64, '2015-01-07 14:28:33', 'Received 6 Air filter73C10 (Pieces) into the warehous'),
(85, 64, '2015-01-07 14:29:48', 'Received 6 Air filter77A10 (Pieces) into the warehous'),
(86, 64, '2015-01-07 14:29:59', 'Received 6 Air filter41B00 (Pieces) into the warehous'),
(87, 64, '2015-01-07 14:30:54', 'Received 12 Air filterV0100 (Pieces) into the warehous'),
(88, 64, '2015-01-07 14:31:03', 'Received 6 Air filter20040 (Pieces) into the warehous'),
(89, 64, '2015-01-07 14:31:16', 'Received 6 Air filter2810 (Pieces) into the warehous'),
(90, 64, '2015-01-07 14:31:25', 'Received 2 Air filter70050 (Pieces) into the warehous'),
(91, 64, '2015-01-07 14:31:38', 'Received 2 Air filter74060 (Pieces) into the warehous'),
(92, 64, '2015-01-07 14:31:50', 'Received 2 Air filterMv188 (Pieces) into the warehous'),
(93, 64, '2015-01-07 14:32:02', 'Received 2 Air filterMv266 (Pieces) into the warehous'),
(94, 64, '2015-01-07 14:32:20', 'Received 2 Air filter22600 (Pieces) into the warehous'),
(95, 64, '2015-01-07 14:32:31', 'Received 2 Air filterED500 (Pieces) into the warehous'),
(96, 64, '2015-01-07 14:32:41', 'Received 2 Air filte31110 (Pieces) into the warehous'),
(97, 64, '2015-01-07 14:33:10', 'Received 2 Air filter31120 (Pieces) into the warehous'),
(98, 64, '2015-01-07 14:33:22', 'Received 2 Air filter50040 (Pieces) into the warehous'),
(99, 64, '2015-01-07 14:33:35', 'Received 2 Air filter97402 (Pieces) into the warehous'),
(100, 64, '2015-01-07 14:34:25', 'Received 12 Fuel FilterMB220900 (Pieces) into the warehous'),
(101, 64, '2015-01-07 14:34:33', 'Received 12 Fuel Filter64010 (Pieces) into the warehous'),
(102, 64, '2015-01-07 14:34:41', 'Received 12 Oil Filter Toyota10001/03001 (Pieces) into the warehous'),
(103, 64, '2015-01-07 14:34:52', 'Received 12 Oil Filter Toyota03006 (Pieces) into the warehous'),
(104, 64, '2015-01-07 14:35:07', 'Received 12 Oil Filter Nissan65F00 (Pieces) into the warehous'),
(105, 64, '2015-01-07 14:35:22', 'Received 12 Oil Filter Mark x-31020/80 (Pieces) into the warehous'),
(106, 64, '2015-01-07 14:35:32', 'Received 12 Oil Filter Toyota Passo-37010 (Pieces) into the warehous'),
(107, 64, '2015-01-07 14:35:44', 'Received 12 Oil Filter 20001/30002 (Pieces) into the warehous'),
(108, 64, '2015-01-07 14:35:56', 'Received 12 Oil Filter MD135737 (Pieces) into the warehous'),
(109, 64, '2015-01-08 13:11:05', 'Created a supplier  BASELINE MOTORS SPARE into the system'),
(110, 64, '2015-01-08 16:03:56', 'Created a supplier  POWER FLOW SERVICES into the system'),
(111, 64, '2015-01-10 12:13:27', 'Released 1  () into the warehous'),
(112, 64, '2015-01-10 17:19:42', 'Updates Sales Transactions'),
(113, 64, '2015-01-10 17:20:22', 'Updates Sales Transactions'),
(114, 64, '2015-01-11 08:52:31', 'Created a supplier  BITMOS AOTO SUPPLIES into the system'),
(115, 64, '2015-01-11 09:17:19', 'Approved LPO: No BD0034/2015'),
(116, 64, '2015-01-11 09:17:33', 'Approved LPO: No BD0033/2015'),
(117, 64, '2015-01-11 09:18:03', 'Received 2 Brake padsKD2718 (Pieces) into the warehous'),
(118, 64, '2015-01-11 09:18:15', 'Received 2 Brake padsKD2780 (Pieces) into the warehous'),
(119, 64, '2015-01-11 09:18:23', 'Received 2 Brake padsKD2701 (Pieces) into the warehous'),
(120, 64, '2015-01-11 09:18:33', 'Received 2 Brake padsKD2725 (Pieces) into the warehous'),
(121, 64, '2015-01-11 09:18:43', 'Received 2 Brake padsKD2203 (Pieces) into the warehous'),
(122, 64, '2015-01-11 09:24:03', 'Received 1 Brake padsKD2208 (Pieces) into the warehous'),
(123, 64, '2015-01-11 09:24:14', 'Received 2 Brake padsKD2798 (Pieces) into the warehous'),
(124, 64, '2015-01-11 09:24:27', 'Received 2 Brake padsKD2740 (Pieces) into the warehous'),
(125, 64, '2015-01-11 09:24:45', 'Received 1 Brake padsKD2457 (Pieces) into the warehous'),
(126, 64, '2015-01-11 09:25:13', 'Received 1 Brake padsKD1740 (Pieces) into the warehous'),
(127, 64, '2015-01-11 09:25:27', 'Received 2 Brake padsKD2739 (Pieces) into the warehous'),
(128, 64, '2015-01-11 09:25:36', 'Received 2 Brake padsKD2776 (Pieces) into the warehous'),
(129, 64, '2015-01-11 09:25:45', 'Received 2 Brake padsKD1739 (Pieces) into the warehous'),
(130, 64, '2015-01-11 09:25:59', 'Received 2 Brake padsKD1735 (Pieces) into the warehous'),
(131, 64, '2015-01-11 09:26:09', 'Received 2 Brake padsKD2606/07 (Pieces) into the warehous'),
(132, 64, '2015-01-11 09:26:19', 'Received 2 Brake pads liningX288 (Pieces) into the warehous'),
(133, 64, '2015-01-11 09:26:30', 'Received 2 Brake pads liningAK2342 (Pieces) into the warehous'),
(134, 64, '2015-01-11 09:26:42', 'Received 2 Brake padsGDB7075S (Pieces) into the warehous'),
(135, 64, '2015-01-11 09:27:00', 'Received 2 Brake  liningNQR (Pieces) into the warehous'),
(136, 64, '2015-01-11 09:27:11', 'Received 2 Brake lining ProboxBS-K2358 (Pieces) into the warehous'),
(137, 64, '2015-01-11 09:27:32', 'Received 12 Fuel Filterz700 (Pieces) into the warehous'),
(138, 64, '2015-01-11 09:27:40', 'Received 12 Oil Filter6DBOB-0309-A (Pieces) into the warehous'),
(139, 64, '2015-01-11 09:27:47', 'Received 12 Air Cleaner NQR (Pieces) into the warehous'),
(140, 64, '2015-01-12 11:30:59', 'Released 1  () into the warehous'),
(141, 64, '2015-01-12 11:31:24', 'Released 1  () into the warehous'),
(142, 64, '2015-01-12 11:31:39', 'Released 1  () into the warehous'),
(143, 64, '2015-01-12 11:31:54', 'Released 1  () into the warehous'),
(144, 64, '2015-01-12 11:32:06', 'Released 1  () into the warehous'),
(145, 64, '2015-01-12 11:32:51', 'Released 1  () into the warehous'),
(146, 64, '2015-01-12 11:33:06', 'Released 1  () into the warehous'),
(147, 64, '2015-01-12 11:33:19', 'Released 1  () into the warehous'),
(148, 64, '2015-01-12 11:33:36', 'Released 1  () into the warehous'),
(149, 64, '2015-01-12 11:34:03', 'Released 1  () into the warehous'),
(150, 64, '2015-01-12 11:34:28', 'Released 1  () into the warehous'),
(151, 64, '2015-01-12 11:34:42', 'Released 1  () into the warehous'),
(152, 64, '2015-01-12 11:35:12', 'Released 1  () into the warehous'),
(153, 64, '2015-01-12 11:35:25', 'Released 1  () into the warehous'),
(154, 64, '2015-01-12 11:36:15', 'Released 1  () into the warehous'),
(155, 64, '2015-01-12 11:36:40', 'Released 1  () into the warehous'),
(156, 64, '2015-01-12 11:37:40', 'Released 1  () into the warehous'),
(157, 64, '2015-01-12 11:37:54', 'Released 1  () into the warehous'),
(158, 64, '2015-01-12 11:38:41', 'Released 1  () into the warehous'),
(159, 64, '2015-01-12 11:38:57', 'Released 1  () into the warehous'),
(160, 64, '2015-01-12 11:39:08', 'Released 1  () into the warehous'),
(161, 64, '2015-01-12 11:39:19', 'Released 1  () into the warehous'),
(162, 64, '2015-01-12 11:39:30', 'Released 1  () into the warehous'),
(163, 64, '2015-01-12 11:42:18', 'Released 1  () into the warehous'),
(164, 64, '2015-01-12 11:42:28', 'Released 1  () into the warehous'),
(165, 64, '2015-01-12 11:42:38', 'Released 1  () into the warehous'),
(166, 64, '2015-01-12 11:42:50', 'Released 1  () into the warehous'),
(167, 64, '2015-01-12 11:43:00', 'Released 1  () into the warehous'),
(168, 64, '2015-01-12 11:43:56', 'Released 1  () into the warehous'),
(169, 64, '2015-01-12 11:44:09', 'Released 3  () into the warehous'),
(170, 64, '2015-01-12 16:10:54', 'Deleted a purchase order transaction'),
(171, 69, '2015-01-12 16:32:10', 'Recorded Loan Received from Longterm View Capital Limited into the system'),
(172, 69, '2015-01-12 16:32:32', 'Viewed all recorded cheque deposits'),
(173, 69, '2015-01-12 16:34:05', 'Viewed all recorded cheque deposits'),
(174, 19, '2015-01-13 14:21:18', 'Received Invoice Payment from Engen petrol station'),
(175, 2, '2015-01-13 15:37:29', 'Created a new employee by the name       into the system'),
(176, 2, '2015-01-13 15:40:06', 'Created a new employee by the name  JOan     into the system'),
(177, 2, '2015-01-13 15:40:30', 'Created a new employee by the name  Issack     into the system'),
(178, 2, '2015-01-13 15:43:33', 'Created a new employee by the name Frankline Lagat     into the system'),
(179, 2, '2015-01-13 15:48:08', 'Created a new employee by the name  Joakim     into the system'),
(180, 19, '2015-01-14 05:54:47', 'Updates Sales Transactions'),
(181, 19, '2015-01-14 05:57:23', 'Updates Sales Transactions'),
(182, 19, '2015-01-14 05:57:59', 'Updates Sales Transactions'),
(183, 19, '2015-01-14 05:59:52', 'Updated an invoice trasaction'),
(184, 19, '2015-01-14 06:01:26', 'Updated an invoice trasaction'),
(185, 19, '2015-01-14 06:01:51', 'Updates Sales Transactions'),
(186, 19, '2015-01-14 06:02:02', 'Updated an invoice trasaction'),
(187, 19, '2015-01-14 06:21:33', 'Approved LPO: No BD0027/2015'),
(188, 19, '2015-01-14 07:01:24', 'Approved LPO: No BD0038/2015'),
(189, 19, '2015-01-14 07:17:01', 'Updated an invoice trasaction'),
(190, 19, '2015-01-14 07:18:27', 'Updated an invoice trasaction'),
(191, 19, '2015-01-14 07:21:03', 'Updated an invoice trasaction'),
(192, 19, '2015-01-14 07:33:43', 'Deleted a purchase order transaction'),
(193, 19, '2015-01-14 14:48:28', 'Approved LPO: No BD0043/2015'),
(194, 162, '2015-01-15 05:03:58', 'Edited station details'),
(195, 162, '2015-01-15 05:04:10', 'Edited station details'),
(196, 2, '2015-01-15 05:24:24', 'Edited employee details by the name  John       Mbadi     Ochieng '),
(197, 2, '2015-01-15 07:23:45', 'Edited employee details by the name Frankline Lagat       '),
(198, 2, '2015-01-15 07:45:08', 'Edited employee details by the name  Issack       '),
(199, 2, '2015-01-15 07:48:11', 'Edited employee details by the name  JOan       '),
(200, 19, '2015-01-15 08:02:09', 'Canceled an Invoice No '),
(201, 64, '2015-01-16 09:41:45', 'Released 2  () into the warehous'),
(202, 64, '2015-01-16 09:41:59', 'Released 3  () into the warehous'),
(203, 64, '2015-01-16 09:42:17', 'Released 1  () into the warehous'),
(204, 19, '2015-01-16 14:32:10', 'Approved LPO: No BD0035/2015'),
(205, 19, '2015-01-18 04:29:02', 'Canceled a Submitted Invoice No 75'),
(206, 19, '2015-01-18 04:35:42', 'Canceled a Submitted Invoice No 68'),
(207, 19, '2015-01-18 04:38:25', 'Canceled a Submitted Invoice No 66'),
(208, 19, '2015-01-18 05:36:13', 'Canceled Purchase Order BD0032/2015'),
(209, 19, '2015-01-18 05:57:32', 'Created a supplier  Kamau wa kioi into the system'),
(210, 19, '2015-01-18 05:59:26', 'Created a supplier  Iso into the system'),
(211, 2, '2015-01-18 06:13:51', 'Created a new employee by the name       into the system'),
(212, 2, '2015-01-18 06:14:23', 'Created a new employee by the name       into the system'),
(213, 2, '2015-01-18 06:15:36', 'Created a new employee by the name       into the system'),
(214, 2, '2015-01-18 06:19:17', 'Edited employee details by the name         '),
(215, 2, '2015-01-18 06:19:33', 'Edited employee details by the name            '),
(216, 2, '2015-01-18 07:44:44', 'Edited employee details by the name  JOan          '),
(217, 2, '2015-01-18 07:45:20', 'Edited employee details by the name Jonah    JOnah    Jonah  '),
(218, 19, '2015-01-19 04:49:39', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(219, 19, '2015-01-19 04:50:44', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(220, 19, '2015-01-19 05:01:57', 'Edited Salary Advance Paid To Frankline Lagat       '),
(221, 19, '2015-01-19 05:20:04', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(222, 19, '2015-01-19 05:20:46', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(223, 19, '2015-01-19 05:22:34', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(224, 19, '2015-01-19 06:25:19', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(225, 19, '2015-01-19 06:39:49', 'Edited Salary Advance Paid To Jonah    JOnah    Jonah  '),
(226, 19, '2015-01-19 06:47:57', 'Edited Salary Advance Paid To Frankline Lagat       '),
(227, 19, '2015-01-19 16:11:37', 'Received Invoice Payment from martha Njenga'),
(228, 19, '2015-01-20 03:31:54', 'Edited Salary Advance Paid To Frankline Lagat       '),
(229, 19, '2015-01-20 04:06:06', 'Edited deduction type details'),
(230, 19, '2015-01-20 04:06:21', 'Edited deduction type details'),
(231, 19, '2015-01-20 04:17:05', 'Edited benefit type details'),
(232, 19, '2015-01-20 04:18:19', 'Edited benefit type details'),
(233, 19, '2015-01-20 04:18:24', 'Edited benefit type details'),
(234, 0, '2015-01-20 04:18:30', 'Deleted benefit type details'),
(235, 0, '2015-01-20 04:19:09', 'Deleted benefit type details'),
(236, 0, '2015-01-20 04:19:16', 'Deleted deduction type details'),
(237, 0, '2015-01-20 04:20:19', 'Deleted deduction type details'),
(238, 2, '2015-01-20 05:52:49', 'Edited employee details by the name  Issack          ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1588 ;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 19, '2014-12-18 13:46:38', 'Logged Into the system'),
(2, 19, '2014-12-18 14:15:45', 'Signed out of the system'),
(3, 19, '2014-12-18 14:16:38', 'Logged Into the system'),
(4, 19, '2014-12-18 14:35:55', 'Signed out of the system'),
(5, 62, '2014-12-18 14:36:43', 'Logged Into the system'),
(6, 62, '2014-12-18 15:01:12', 'Added a booking for Juma Kimotho of vehicle KAT 291S into the system'),
(7, 62, '2014-12-18 15:09:31', 'Update a preliminary job card task (17) into the system'),
(8, 62, '2014-12-18 15:10:08', 'Update a customer belonging (tools(jack jack handle,plug spanner)) into the system'),
(9, 62, '2014-12-18 15:26:42', 'Signed out of the system'),
(10, 63, '2014-12-18 15:28:15', 'Logged Into the system'),
(11, 63, '2014-12-18 15:29:41', 'Clocked in a job card no 1 into the system '),
(12, 63, '2014-12-18 15:32:11', 'Stopped a task in a job card no 1 into the system '),
(13, 63, '2014-12-18 15:33:29', 'Resumed a task in a job card no 1 into the system '),
(14, 63, '2014-12-18 15:37:01', 'Finished a task in job card no 1 into the system '),
(15, 63, '2014-12-18 15:40:27', 'Signed out of the system'),
(16, 62, '2014-12-18 15:41:46', 'Logged Into the system'),
(17, 62, '2014-12-18 15:42:09', 'Signed out of the system'),
(18, 19, '2014-12-18 15:42:17', 'Logged Into the system'),
(19, 19, '2014-12-18 15:43:01', 'Signed out of the system'),
(20, 62, '2014-12-18 15:43:25', 'Logged Into the system'),
(21, 62, '2014-12-18 15:46:13', 'Signed out of the system'),
(22, 19, '2014-12-18 15:46:20', 'Logged Into the system'),
(23, 19, '2014-12-18 15:46:42', 'Signed out of the system'),
(24, 62, '2014-12-18 15:47:01', 'Logged Into the system'),
(25, 62, '2014-12-18 16:30:02', 'Signed out of the system'),
(26, 0, '2014-12-18 16:30:10', 'Signed out of the system'),
(27, 62, '2014-12-19 08:54:35', 'Logged Into the system'),
(28, 62, '2014-12-19 08:54:59', 'Signed out of the system'),
(29, 19, '2014-12-19 11:51:45', 'Logged Into the system'),
(30, 19, '2014-12-19 12:13:39', 'Signed out of the system'),
(31, 62, '2014-12-19 12:14:13', 'Logged Into the system'),
(32, 62, '2014-12-19 12:16:15', 'Added a booking for Engen petrol station of vehicle n/a into the system'),
(33, 0, '2014-12-19 12:20:06', 'Update a booking for Engen petrol station of vehicle n/a into the system'),
(34, 62, '2014-12-19 12:21:29', 'Update a quotation task (21) into the system'),
(35, 62, '2014-12-19 12:34:22', 'Added a booking for Engen petrol station of vehicle n/a into the system'),
(36, 62, '2014-12-19 12:41:27', 'Added a booking for Long term view capital ltd of vehicle KBV 863P into the system'),
(37, 62, '2014-12-19 12:46:39', 'Created labour cost matrix into the system '),
(38, 62, '2014-12-19 12:47:26', 'Created labour cost matrix into the system '),
(39, 62, '2014-12-19 12:47:54', 'Created labour cost matrix into the system '),
(40, 62, '2014-12-19 12:48:22', 'Update a preliminary job card task (13) into the system'),
(41, 62, '2014-12-19 12:49:13', 'Created labour cost matrix into the system '),
(42, 62, '2014-12-19 12:49:51', 'Created labour cost matrix into the system '),
(43, 62, '2014-12-19 12:50:24', 'Created labour cost matrix into the system '),
(44, 62, '2014-12-19 12:50:45', 'Update a preliminary job card task (19) into the system'),
(45, 62, '2014-12-19 12:51:06', 'Deleted Job Card Item from the system'),
(46, 62, '2014-12-19 12:51:34', 'Added more job card parts details into the system'),
(47, 62, '2014-12-19 12:54:13', 'Signed out of the system'),
(48, 19, '2014-12-19 12:54:25', 'Logged Into the system'),
(49, 19, '2014-12-19 12:54:40', 'Clocked in a job card no 2 into the system '),
(50, 19, '2014-12-19 12:54:50', 'Clocked in a job card no 2 into the system '),
(51, 19, '2014-12-19 12:54:55', 'Clocked in a job card no 2 into the system '),
(52, 19, '2014-12-19 12:55:04', 'Clocked in a job card no 2 into the system '),
(53, 19, '2014-12-19 12:55:32', 'Finished a task in job card no 2 into the system '),
(54, 19, '2014-12-19 12:56:41', 'Finished a task in job card no 2 into the system '),
(55, 19, '2014-12-19 12:56:47', 'Finished a task in job card no 2 into the system '),
(56, 19, '2014-12-19 12:56:54', 'Finished a task in job card no 2 into the system '),
(57, 19, '2014-12-19 13:46:05', 'Added a booking for willis Asiko of vehicle KAW 779W into the system'),
(58, 19, '2014-12-19 13:49:29', 'Created labour cost matrix into the system '),
(59, 19, '2014-12-19 13:49:47', 'Created labour cost matrix into the system '),
(60, 19, '2014-12-19 13:50:04', 'Created labour cost matrix into the system '),
(61, 19, '2014-12-19 13:50:36', 'Update a preliminary job card task (10) into the system'),
(62, 19, '2014-12-19 13:51:52', 'Clocked in a job card no 3 into the system '),
(63, 19, '2014-12-19 13:52:06', 'Finished a task in job card no 3 into the system '),
(64, 19, '2014-12-19 13:59:38', 'Update a invoice task (22) into the system'),
(65, 19, '2014-12-19 13:59:43', 'Update a invoice task (22) into the system'),
(66, 19, '2014-12-19 14:02:51', 'Signed out of the system'),
(67, 62, '2014-12-20 11:13:06', 'Logged Into the system'),
(68, 62, '2014-12-20 11:16:34', 'Added a booking for martha Njenga of vehicle KBG 849V into the system'),
(69, 19, '2014-12-20 12:06:45', 'Logged Into the system'),
(70, 19, '2014-12-20 12:12:42', 'Signed out of the system'),
(71, 64, '2014-12-20 12:13:01', 'Logged Into the system'),
(72, 64, '2014-12-20 12:22:53', 'Created an item O ring Kit - 3 inch into the system'),
(73, 64, '2014-12-20 12:24:10', 'Created an item O ring Kit - 2 inch into the system'),
(74, 64, '2014-12-20 12:57:17', 'Signed out of the system'),
(75, 19, '2014-12-20 12:57:29', 'Logged Into the system'),
(76, 19, '2014-12-20 12:58:38', 'Signed out of the system'),
(77, 64, '2014-12-20 12:58:53', 'Logged Into the system'),
(78, 64, '2014-12-20 13:03:02', 'Created an item pop rivets into the system'),
(79, 64, '2014-12-20 13:04:53', 'Created an item cotton waste rugs into the system'),
(80, 64, '2014-12-20 13:06:24', 'Created an item Brake fluid into the system'),
(81, 64, '2014-12-20 13:07:18', 'Created an item cable ties into the system'),
(82, 64, '2014-12-20 13:08:05', 'Created an item MASKING TAPE into the system'),
(83, 64, '2014-12-20 13:08:58', 'Created an item INSUTAING TAPE into the system'),
(84, 64, '2014-12-20 13:09:43', 'Created an item JUBILEE CLIPS into the system'),
(85, 64, '2014-12-20 13:10:45', 'Created an item ARADITE into the system'),
(86, 64, '2014-12-20 13:11:22', 'Created an item SUPER GLUE into the system'),
(87, 64, '2014-12-20 13:11:59', 'Created an item BATTERY TERMINAL into the system'),
(88, 64, '2014-12-20 13:12:50', 'Created an item BRAZING WIRE into the system'),
(89, 64, '2014-12-20 13:13:50', 'Created an item CLEAR SILICON TUBES into the system'),
(90, 64, '2014-12-20 13:14:38', 'Created an item CARBURATOR CLEANER into the system'),
(91, 64, '2014-12-20 13:15:15', 'Created an item DISTILLED WATER into the system'),
(92, 64, '2014-12-20 13:15:51', 'Created an item DRIIL BITS into the system'),
(93, 64, '2014-12-20 13:16:41', 'Created an item DUST MASK into the system'),
(94, 64, '2014-12-20 13:17:25', 'Created an item EMERY PAPERS into the system'),
(95, 64, '2014-12-20 13:18:07', 'Created an item FRONT REFLECTORS into the system'),
(96, 64, '2014-12-20 13:18:55', 'Created an item HACKSAWB BLADES into the system'),
(97, 64, '2014-12-20 13:19:35', 'Created an item MOLY SLIP GREASE into the system'),
(98, 64, '2014-12-20 13:20:20', 'Created an item MUTTON CLOTH into the system'),
(99, 64, '2014-12-20 13:21:01', 'Created an item RADIATOR COOLANT into the system'),
(100, 64, '2014-12-20 13:21:44', 'Created an item REAR CHEVRONS into the system'),
(101, 64, '2014-12-20 13:22:40', 'Created an item REAR REFLECTORS into the system'),
(102, 64, '2014-12-20 13:23:24', 'Created an item SOLDERING WIRE into the system'),
(103, 64, '2014-12-20 13:24:10', 'Created an item WD 40 SPRAY into the system'),
(104, 64, '2014-12-20 13:24:46', 'Created an item WELDING WIRE into the system'),
(105, 64, '2014-12-20 13:27:05', 'Created an item DEGREASER DETERGENT into the system'),
(106, 64, '2014-12-20 13:27:50', 'Created an item ASSORTED COPPER WASHER into the system'),
(107, 64, '2014-12-20 13:28:39', 'Created an item ELECTRICAL WIRE into the system'),
(108, 64, '2014-12-20 13:40:46', 'Signed out of the system'),
(109, 19, '2014-12-20 13:40:55', 'Logged Into the system'),
(110, 19, '2014-12-20 13:42:16', 'Signed out of the system'),
(111, 64, '2014-12-20 13:46:02', 'Logged Into the system'),
(112, 64, '2014-12-20 14:09:22', 'Signed out of the system'),
(113, 62, '2014-12-22 15:34:45', 'Logged Into the system'),
(114, 62, '2014-12-22 15:54:17', 'Signed out of the system'),
(115, 62, '2014-12-22 16:15:28', 'Logged Into the system'),
(116, 62, '2014-12-23 09:22:29', 'Logged Into the system'),
(117, 62, '2014-12-23 09:32:35', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBZ 348B into the system'),
(118, 62, '2014-12-23 09:43:00', 'Update a preliminary job card task (16) into the system'),
(119, 0, '2014-12-23 09:53:19', 'Update a booking for Njuguna of vehicle KBZ 348B into the system'),
(120, 64, '2014-12-23 10:02:41', 'Logged Into the system'),
(121, 64, '2014-12-23 10:04:14', 'Updated a item O ring Kit  details'),
(122, 64, '2014-12-23 10:04:32', 'deleted an item from the system'),
(123, 64, '2014-12-23 10:11:33', 'Update a requisition parts details into the system'),
(124, 64, '2014-12-23 10:11:42', 'Update a requisition parts details into the system'),
(125, 64, '2014-12-23 10:13:04', 'Update a preliminary job card task (16) into the system'),
(126, 62, '2014-12-23 10:17:40', 'Logged Into the system'),
(127, 62, '2014-12-23 10:23:23', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBY 754G into the system'),
(128, 62, '2014-12-23 10:32:04', 'Update a preliminary job card details details into the system'),
(129, 62, '2014-12-23 10:32:23', 'Update a preliminary job card details details into the system'),
(130, 62, '2014-12-23 10:37:34', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBY 755G into the system'),
(131, 62, '2014-12-23 10:47:29', 'Added a booking for Long term view capital ltd of vehicle KBV 079P into the system'),
(132, 62, '2014-12-23 10:53:02', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBL 145L into the system'),
(133, 62, '2014-12-23 11:01:31', 'Added a booking for Long term view capital ltd of vehicle KBV 599Z into the system'),
(134, 62, '2014-12-23 11:18:20', 'Added a booking for Long term view capital ltd of vehicle KBY 756G into the system'),
(135, 63, '2014-12-23 11:23:39', 'Logged Into the system'),
(136, 63, '2014-12-23 11:26:44', 'Clocked in a job card no 11 into the system '),
(137, 63, '2014-12-23 11:28:02', 'Finished a task in job card no 11 into the system '),
(138, 63, '2014-12-23 11:28:38', 'Clocked in a job card no 10 into the system '),
(139, 63, '2014-12-23 11:29:08', 'Finished a task in job card no 10 into the system '),
(140, 63, '2014-12-23 11:30:04', 'Clocked in a job card no 9 into the system '),
(141, 63, '2014-12-23 11:30:25', 'Finished a task in job card no 9 into the system '),
(142, 63, '2014-12-23 11:30:44', 'Clocked in a job card no 9 into the system '),
(143, 63, '2014-12-23 11:31:04', 'Finished a task in job card no 9 into the system '),
(144, 63, '2014-12-23 11:31:22', 'Clocked in a job card no 8 into the system '),
(145, 63, '2014-12-23 11:31:40', 'Finished a task in job card no 8 into the system '),
(146, 63, '2014-12-23 11:31:55', 'Clocked in a job card no 8 into the system '),
(147, 63, '2014-12-23 11:32:10', 'Finished a task in job card no 8 into the system '),
(148, 63, '2014-12-23 11:32:23', 'Clocked in a job card no 7 into the system '),
(149, 63, '2014-12-23 11:32:50', 'Finished a task in job card no 7 into the system '),
(150, 63, '2014-12-23 11:33:24', 'Clocked in a job card no 6 into the system '),
(151, 63, '2014-12-23 11:33:51', 'Finished a task in job card no 6 into the system '),
(152, 63, '2014-12-23 11:34:11', 'Clocked in a job card no 6 into the system '),
(153, 63, '2014-12-23 11:34:28', 'Finished a task in job card no 6 into the system '),
(154, 63, '2014-12-23 11:35:01', 'Clocked in a job card no 5 into the system '),
(155, 63, '2014-12-23 11:36:51', 'Stopped a task in a job card no 5 into the system '),
(156, 62, '2014-12-23 11:37:50', 'Logged Into the system'),
(157, 62, '2014-12-23 11:40:16', 'Logged Into the system'),
(158, 62, '2014-12-23 11:40:20', 'Signed out of the system'),
(159, 63, '2014-12-23 11:40:53', 'Logged Into the system'),
(160, 64, '2014-12-23 11:43:47', 'Logged Into the system'),
(161, 64, '2014-12-23 11:44:32', 'Logged Into the system'),
(162, 64, '2014-12-23 11:45:42', 'Signed out of the system'),
(163, 62, '2014-12-23 11:45:59', 'Logged Into the system'),
(164, 62, '2014-12-23 12:05:30', 'Logged Into the system'),
(165, 62, '2014-12-23 12:19:11', 'Update a invoice task (11) into the system'),
(166, 62, '2014-12-23 12:20:47', 'Update a invoice task (11) into the system'),
(167, 62, '2014-12-23 12:25:18', 'Update a invoice task (11) into the system'),
(168, 62, '2014-12-23 12:29:23', 'Created an labour task Replace clutch master cylinder into the system '),
(169, 62, '2014-12-23 12:31:48', 'Created labour cost matrix into the system '),
(170, 62, '2014-12-23 12:34:13', 'Created an labour task Injector pump calibration into the system '),
(171, 62, '2014-12-23 12:34:52', 'Update labour task Injector pump calibration details into the system '),
(172, 62, '2014-12-23 12:37:43', 'Created labour cost matrix into the system '),
(173, 62, '2014-12-23 12:38:24', 'Created labour cost matrix into the system '),
(174, 62, '2014-12-23 12:39:20', 'Created labour cost matrix into the system '),
(175, 62, '2014-12-23 12:39:52', 'Created labour cost matrix into the system '),
(176, 62, '2014-12-23 12:40:25', 'Created labour cost matrix into the system '),
(177, 62, '2014-12-23 12:46:37', 'Created an labour task Replace brake seals into the system '),
(178, 62, '2014-12-23 12:47:13', 'Created labour cost matrix into the system '),
(179, 62, '2014-12-23 12:50:00', 'Created labour cost matrix into the system '),
(180, 62, '2014-12-23 12:50:20', 'Created labour cost matrix into the system '),
(181, 62, '2014-12-23 12:51:39', 'Created an labour task rectified headlights into the system '),
(182, 62, '2014-12-23 12:52:42', 'Created an labour task Replace alternator "o"ring into the system '),
(183, 62, '2014-12-23 12:52:58', 'Created an labour task replace fanbelt into the system '),
(184, 62, '2014-12-23 12:53:30', 'Created an labour task Brakes adjustment into the system '),
(185, 62, '2014-12-23 12:53:50', 'Created an labour task Door stopper welding into the system '),
(186, 62, '2014-12-23 12:54:20', 'Created an labour task Cable adjustment into the system '),
(187, 62, '2014-12-23 12:54:59', 'Created an labour task Ignition system rectification into the system '),
(188, 62, '2014-12-23 12:55:25', 'Created an labour task radio rectification into the system '),
(189, 62, '2014-12-23 12:56:19', 'Created an labour task Front wheel cylinder rubbers replacement into the system '),
(190, 62, '2014-12-23 12:56:41', 'Created an labour task Horn rectification into the system '),
(191, 62, '2014-12-23 12:58:12', 'Created labour cost matrix into the system '),
(192, 62, '2014-12-23 12:58:33', 'Created labour cost matrix into the system '),
(193, 62, '2014-12-23 12:58:50', 'Created labour cost matrix into the system '),
(194, 62, '2014-12-23 12:59:38', 'Created labour cost matrix into the system '),
(195, 62, '2014-12-23 12:59:54', 'Created labour cost matrix into the system '),
(196, 62, '2014-12-23 13:00:09', 'Created labour cost matrix into the system '),
(197, 62, '2014-12-23 13:01:22', 'Created labour cost matrix into the system '),
(198, 62, '2014-12-23 13:01:49', 'Created labour cost matrix into the system '),
(199, 62, '2014-12-23 13:02:07', 'Created labour cost matrix into the system '),
(200, 62, '2014-12-23 13:02:38', 'Created labour cost matrix into the system '),
(201, 62, '2014-12-23 13:02:53', 'Created labour cost matrix into the system '),
(202, 62, '2014-12-23 13:03:12', 'Created labour cost matrix into the system '),
(203, 62, '2014-12-23 13:03:44', 'Created labour cost matrix into the system '),
(204, 62, '2014-12-23 13:04:00', 'Created labour cost matrix into the system '),
(205, 62, '2014-12-23 13:04:19', 'Created labour cost matrix into the system '),
(206, 62, '2014-12-23 13:04:45', 'Created labour cost matrix into the system '),
(207, 62, '2014-12-23 13:05:00', 'Created labour cost matrix into the system '),
(208, 62, '2014-12-23 13:05:13', 'Created labour cost matrix into the system '),
(209, 62, '2014-12-23 13:05:42', 'Created labour cost matrix into the system '),
(210, 62, '2014-12-23 13:06:05', 'Created labour cost matrix into the system '),
(211, 62, '2014-12-23 13:06:19', 'Created labour cost matrix into the system '),
(212, 62, '2014-12-23 13:07:09', 'Created labour cost matrix into the system '),
(213, 62, '2014-12-23 13:07:28', 'Created labour cost matrix into the system '),
(214, 62, '2014-12-23 13:07:44', 'Created labour cost matrix into the system '),
(215, 62, '2014-12-23 13:09:26', 'Created labour cost matrix into the system '),
(216, 62, '2014-12-23 13:09:38', 'Created labour cost matrix into the system '),
(217, 62, '2014-12-23 13:09:48', 'Created labour cost matrix into the system '),
(218, 62, '2014-12-23 13:10:04', 'Created labour cost matrix into the system '),
(219, 62, '2014-12-23 13:10:27', 'Created labour cost matrix into the system '),
(220, 62, '2014-12-23 13:11:49', 'Created labour cost matrix into the system '),
(221, 62, '2014-12-23 13:12:39', 'Logged Into the system'),
(222, 62, '2014-12-23 13:13:39', 'Update a invoice task (24) into the system'),
(223, 62, '2014-12-23 13:14:02', 'Update a invoice task (26) into the system'),
(224, 62, '2014-12-23 13:15:50', 'Update a preliminary job card task (24) into the system'),
(225, 62, '2014-12-23 13:16:10', 'Update a preliminary job card task (35) into the system'),
(226, 62, '2014-12-23 13:18:38', 'Logged Into the system'),
(227, 62, '2014-12-23 13:31:32', 'Update a preliminary job card task (23) into the system'),
(228, 62, '2014-12-23 13:33:56', 'Created an labour task clutch adjustment into the system '),
(229, 62, '2014-12-23 13:34:38', 'Created an labour task Front wheel bearing adj into the system '),
(230, 62, '2014-12-23 13:35:42', 'Created an labour task Clutch plate replacement into the system '),
(231, 62, '2014-12-23 13:36:39', 'Created an labour task Rear wheel cylinder rubbers into the system '),
(232, 62, '2014-12-23 13:37:10', 'Created an labour task Wheel Alignment into the system '),
(233, 62, '2014-12-23 13:37:23', 'Created an labour task Wheel Balancing into the system '),
(234, 62, '2014-12-23 13:38:23', 'Created an labour task Replace indicator bulbs into the system '),
(235, 62, '2014-12-23 13:38:40', 'Created an labour task Replace brake bulbs into the system '),
(236, 62, '2014-12-23 13:40:15', 'Created an labour task Rear brake lights replacement into the system '),
(237, 62, '2014-12-23 13:43:35', 'Created an labour task wheel studs replacement into the system '),
(238, 62, '2014-12-23 13:49:14', 'Created labour cost matrix into the system '),
(239, 62, '2014-12-23 13:49:52', 'Created labour cost matrix into the system '),
(240, 62, '2014-12-23 13:50:13', 'Created labour cost matrix into the system '),
(241, 62, '2014-12-23 13:51:24', 'Created labour cost matrix into the system '),
(242, 62, '2014-12-23 13:51:55', 'Created labour cost matrix into the system '),
(243, 62, '2014-12-23 13:53:53', 'Created labour cost matrix into the system '),
(244, 62, '2014-12-23 14:11:53', 'Created an labour task Battery terminal replacement into the system '),
(245, 62, '2014-12-23 14:12:10', 'Created an labour task Battery water refill into the system '),
(246, 62, '2014-12-23 14:12:26', 'Created an labour task Puncture repair into the system '),
(247, 62, '2014-12-23 14:12:46', 'Created an labour task side mirror repair into the system '),
(248, 62, '2014-12-23 14:13:42', 'Created an labour task Front crankshaft seal into the system '),
(249, 62, '2014-12-23 14:14:01', 'Created an labour task Rear crankshaft seal into the system '),
(250, 62, '2014-12-23 14:14:24', 'Created an labour task Diesel pipes replacements into the system '),
(251, 62, '2014-12-23 14:14:44', 'Created an labour task Repair speed governor into the system '),
(252, 62, '2014-12-23 14:30:06', 'Signed out of the system'),
(253, 63, '2014-12-23 14:30:34', 'Logged Into the system'),
(254, 63, '2014-12-23 14:31:10', 'Resumed a task in a job card no 5 into the system '),
(255, 63, '2014-12-23 14:33:47', 'Signed out of the system'),
(256, 62, '2014-12-23 14:34:10', 'Logged Into the system'),
(257, 62, '2014-12-23 14:35:46', 'Update labour task Speed governor repair details into the system '),
(258, 62, '2014-12-23 14:36:08', 'Update labour task Speed governor repair details into the system '),
(259, 62, '2014-12-23 14:36:17', 'Update labour task Speed governor repair details into the system '),
(260, 62, '2014-12-23 14:38:52', 'Signed out of the system'),
(261, 63, '2014-12-23 14:39:31', 'Logged Into the system'),
(262, 63, '2014-12-23 14:40:34', 'Finished a task in job card no 5 into the system '),
(263, 63, '2014-12-23 14:40:46', 'Signed out of the system'),
(264, 62, '2014-12-23 14:45:48', 'Logged Into the system'),
(265, 62, '2014-12-23 14:49:31', 'Created an item clutch master cylinder into the system'),
(266, 62, '2014-12-23 14:50:07', 'Signed out of the system'),
(267, 64, '2014-12-23 14:50:44', 'Logged Into the system'),
(268, 64, '2014-12-23 14:53:01', 'Signed out of the system'),
(269, 62, '2014-12-23 14:53:18', 'Logged Into the system'),
(270, 64, '2014-12-23 14:55:40', 'Logged Into the system'),
(271, 64, '2014-12-23 14:56:34', 'Signed out of the system'),
(272, 63, '2014-12-23 14:56:49', 'Logged Into the system'),
(273, 63, '2014-12-23 14:59:53', 'Signed out of the system'),
(274, 64, '2014-12-23 15:00:01', 'Logged Into the system'),
(275, 64, '2014-12-23 15:05:02', 'Updated a item Brake fluid details'),
(276, 64, '2014-12-23 15:13:48', 'Signed out of the system'),
(277, 62, '2014-12-23 15:14:06', 'Logged Into the system'),
(278, 62, '2014-12-23 15:15:29', 'Added more job card parts details into the system'),
(279, 62, '2014-12-23 15:15:55', 'Update a preliminary job card parts details into the system'),
(280, 62, '2014-12-23 15:16:21', 'Added more job card parts details into the system'),
(281, 62, '2014-12-23 15:21:45', 'Added more invoice tasks (23) into the system'),
(282, 64, '2014-12-23 15:29:00', 'Logged Into the system'),
(283, 64, '2014-12-23 15:29:41', 'Logged Into the system'),
(284, 62, '2014-12-23 15:41:02', 'Logged Into the system'),
(285, 62, '2014-12-23 15:45:19', 'Added a booking for Njuguna of vehicle KBZ 348B into the system'),
(286, 62, '2014-12-23 15:46:56', 'Signed out of the system'),
(287, 63, '2014-12-23 15:47:07', 'Logged Into the system'),
(288, 63, '2014-12-23 15:47:27', 'Clocked in a job card no 12 into the system '),
(289, 63, '2014-12-23 15:47:40', 'Finished a task in job card no 12 into the system '),
(290, 63, '2014-12-23 15:48:03', 'Signed out of the system'),
(291, 62, '2014-12-23 15:48:13', 'Logged Into the system'),
(292, 62, '2014-12-23 15:48:51', 'Signed out of the system'),
(293, 63, '2014-12-23 15:49:04', 'Logged Into the system'),
(294, 63, '2014-12-23 15:49:30', 'Clocked in a job card no 11 into the system '),
(295, 63, '2014-12-23 15:53:19', 'Signed out of the system'),
(296, 62, '2014-12-23 15:53:35', 'Logged Into the system'),
(297, 62, '2014-12-23 15:53:54', 'Added a booking for Njuguna of vehicle KBZ 348B into the system'),
(298, 62, '2014-12-23 15:55:47', 'Signed out of the system'),
(299, 63, '2014-12-23 15:56:01', 'Logged Into the system'),
(300, 63, '2014-12-23 15:56:52', 'Finished a task in job card no 11 into the system '),
(301, 63, '2014-12-23 15:57:05', 'Clocked in a job card no 13 into the system '),
(302, 63, '2014-12-23 15:57:08', 'Signed out of the system'),
(303, 64, '2014-12-23 15:57:25', 'Logged Into the system'),
(304, 63, '2014-12-23 16:03:05', 'Logged Into the system'),
(305, 63, '2014-12-23 16:03:24', 'Finished a task in job card no 13 into the system '),
(306, 63, '2014-12-23 16:03:31', 'Signed out of the system'),
(307, 62, '2014-12-23 16:03:45', 'Logged Into the system'),
(308, 62, '2014-12-23 16:17:09', 'Signed out of the system'),
(309, 62, '2014-12-23 16:18:37', 'Logged Into the system'),
(310, 62, '2014-12-23 16:22:08', 'Update a preliminary job card task (24) into the system'),
(311, 62, '2014-12-23 16:23:36', 'Update a preliminary job card task (35) into the system'),
(312, 62, '2014-12-23 16:25:01', 'Update a preliminary job card task (29) into the system'),
(313, 62, '2014-12-23 16:25:18', 'Update a preliminary job card task (30) into the system'),
(314, 62, '2014-12-23 16:35:24', 'Update a preliminary job card task (24) into the system'),
(315, 62, '2014-12-23 16:35:55', 'Update a preliminary job card task (25) into the system'),
(316, 62, '2014-12-23 16:41:02', 'Update invoice details details into the system'),
(317, 62, '2014-12-23 16:41:40', 'Update invoice details details into the system'),
(318, 62, '2014-12-23 16:46:47', 'Update a preliminary job card task (27) into the system'),
(319, 62, '2014-12-23 16:48:18', 'Update a preliminary job card task (26) into the system'),
(320, 62, '2014-12-23 16:49:43', 'Update a preliminary job card task (28) into the system'),
(321, 62, '2014-12-23 16:58:02', 'Update a preliminary job card task (32) into the system'),
(322, 62, '2014-12-23 16:58:26', 'Update a preliminary job card task (31) into the system'),
(323, 62, '2014-12-23 16:58:41', 'Update a preliminary job card task (24) into the system'),
(324, 62, '2014-12-23 17:00:16', 'Update a preliminary job card task (24) into the system'),
(325, 62, '2014-12-23 17:00:53', 'Update a preliminary job card task (33) into the system'),
(326, 62, '2014-12-23 17:01:05', 'Update a preliminary job card task (29) into the system'),
(327, 62, '2014-12-23 17:02:39', 'Added more job card tasks (29) into the system'),
(328, 62, '2014-12-23 17:06:26', 'Added more job card tasks (33) into the system'),
(329, 62, '2014-12-23 17:07:10', 'Deleted Job Card Task from the system'),
(330, 62, '2014-12-23 17:07:37', 'Deleted Job Card Task from the system'),
(331, 62, '2014-12-23 17:07:42', 'Deleted Job Card Task from the system'),
(332, 62, '2014-12-23 17:08:24', 'Added more job card tasks (26) into the system'),
(333, 62, '2014-12-23 17:09:14', 'Update a preliminary job card task (35) into the system'),
(334, 62, '2014-12-23 17:14:37', 'Update a preliminary job card task (24) into the system'),
(335, 62, '2014-12-23 17:15:16', 'Update a preliminary job card task (26) into the system'),
(336, 62, '2014-12-24 09:25:21', 'Logged Into the system'),
(337, 62, '2014-12-24 09:31:55', 'Added a booking for Long term view capital ltd of vehicle KBY 755G into the system'),
(338, 62, '2014-12-24 09:43:01', 'Signed out of the system'),
(339, 63, '2014-12-24 09:44:27', 'Logged Into the system'),
(340, 63, '2014-12-24 09:45:23', 'Clocked in a job card no 7 into the system '),
(341, 63, '2014-12-24 10:16:14', 'Signed out of the system'),
(342, 62, '2014-12-24 10:16:27', 'Logged Into the system'),
(343, 64, '2014-12-24 10:22:11', 'Logged Into the system'),
(344, 64, '2014-12-24 10:23:28', 'Signed out of the system'),
(345, 0, '2014-12-24 10:23:35', 'Signed out of the system'),
(346, 62, '2014-12-24 10:23:56', 'Logged Into the system'),
(347, 62, '2014-12-24 10:24:33', 'Added a booking for Long term view capital ltd of vehicle KBY 755G into the system'),
(348, 62, '2014-12-24 10:31:02', 'Added a booking for Team Fergie Transporters Ltd of vehicle Kbv 863F into the system'),
(349, 62, '2014-12-24 10:33:57', 'Signed out of the system'),
(350, 63, '2014-12-24 10:34:11', 'Logged Into the system'),
(351, 63, '2014-12-24 10:34:27', 'Clocked in a job card no 15 into the system '),
(352, 63, '2014-12-24 10:34:39', 'Stopped a task in a job card no 15 into the system '),
(353, 63, '2014-12-24 10:39:43', 'Signed out of the system'),
(354, 64, '2014-12-24 10:40:07', 'Logged Into the system'),
(355, 64, '2014-12-24 10:41:24', 'Created an item On & Off switch into the system'),
(356, 64, '2014-12-24 10:42:30', 'Created an item Bulb single into the system'),
(357, 64, '2014-12-24 10:43:45', 'Created an item Bulb double into the system'),
(358, 64, '2014-12-24 10:44:49', 'Created an item Horn fuse amp10 into the system'),
(359, 64, '2014-12-24 10:45:19', 'Created an item Horn fuse amp15 into the system'),
(360, 64, '2014-12-24 10:46:31', 'Updated a item Horn fuse amp10 details'),
(361, 64, '2014-12-24 10:46:34', 'Updated a item Horn fuse amp10 details'),
(362, 64, '2014-12-24 10:46:54', 'Updated a item Horn fuse amp15 details'),
(363, 64, '2014-12-24 10:57:43', 'Signed out of the system'),
(364, 62, '2014-12-24 10:58:37', 'Logged Into the system'),
(365, 62, '2014-12-24 11:07:49', 'Added more job card parts details into the system'),
(366, 62, '2014-12-24 11:08:33', 'Signed out of the system'),
(367, 64, '2014-12-24 11:08:42', 'Logged Into the system'),
(368, 64, '2014-12-24 11:09:51', 'Created an item Omo into the system'),
(369, 64, '2014-12-24 11:09:54', 'Signed out of the system'),
(370, 62, '2014-12-24 11:10:36', 'Logged Into the system'),
(371, 62, '2014-12-24 11:11:18', 'Update a preliminary job card parts details into the system'),
(372, 62, '2014-12-24 11:12:26', 'Signed out of the system'),
(373, 62, '2014-12-24 11:12:37', 'Logged Into the system'),
(374, 62, '2014-12-24 11:12:41', 'Signed out of the system'),
(375, 63, '2014-12-24 11:12:54', 'Logged Into the system'),
(376, 63, '2014-12-24 11:13:15', 'Resumed a task in a job card no 15 into the system '),
(377, 63, '2014-12-24 11:13:48', 'Signed out of the system'),
(378, 62, '2014-12-24 11:14:01', 'Logged Into the system'),
(379, 62, '2014-12-24 11:17:41', 'Added more job card parts details into the system'),
(380, 62, '2014-12-24 11:21:56', 'Signed out of the system'),
(381, 64, '2014-12-24 11:22:06', 'Logged Into the system'),
(382, 64, '2014-12-24 11:22:59', 'Updated a item Bulb double 24v details'),
(383, 64, '2014-12-24 11:23:02', 'Updated a item Bulb double 24v details'),
(384, 64, '2014-12-24 11:23:32', 'Updated a item Bulb single 12v details'),
(385, 64, '2014-12-24 11:23:42', 'Updated a item Bulb single 12v details'),
(386, 64, '2014-12-24 11:28:05', 'Created an item Bulb single 24v into the system'),
(387, 64, '2014-12-24 11:29:46', 'Created an item Bulb double 12V into the system'),
(388, 64, '2014-12-24 11:31:07', 'Signed out of the system'),
(389, 63, '2014-12-24 11:32:45', 'Logged Into the system'),
(390, 63, '2014-12-24 11:33:25', 'Finished a task in job card no 15 into the system '),
(391, 63, '2014-12-24 11:34:14', 'Signed out of the system'),
(392, 64, '2014-12-24 11:34:25', 'Logged Into the system'),
(393, 64, '2014-12-24 11:35:27', 'Created an item head light helogen 24v into the system'),
(394, 64, '2014-12-24 11:36:07', 'Created an item head light helogen 12v into the system'),
(395, 64, '2014-12-24 11:37:34', 'Created an item indicator bulb 24v into the system'),
(396, 64, '2014-12-24 11:38:41', 'Created an item indicator bulb 12v into the system'),
(397, 64, '2014-12-24 11:39:03', 'Updated a item indicator bulb 24v details'),
(398, 64, '2014-12-24 11:41:08', 'Created an item Starplex grease(caltex)1/2kg into the system'),
(399, 64, '2014-12-24 11:52:16', 'Signed out of the system'),
(400, 62, '2014-12-24 11:52:35', 'Logged Into the system'),
(401, 62, '2014-12-24 11:52:46', 'Signed out of the system'),
(402, 63, '2014-12-24 11:52:57', 'Logged Into the system'),
(403, 63, '2014-12-24 11:53:21', 'Finished a task in job card no 7 into the system '),
(404, 63, '2014-12-24 11:53:50', 'Signed out of the system'),
(405, 62, '2014-12-24 11:54:05', 'Logged Into the system'),
(406, 62, '2014-12-24 11:55:28', 'Added more job card parts details into the system'),
(407, 62, '2014-12-24 12:33:06', 'Updated a item Double Bulb 12V details'),
(408, 62, '2014-12-24 12:34:03', 'Updated a item  Double Bulb 24v details'),
(409, 62, '2014-12-24 12:34:05', 'Updated a item  Double Bulb 24v details'),
(410, 62, '2014-12-24 12:34:31', 'Updated a item Single Bulb  12v details'),
(411, 62, '2014-12-24 12:35:07', 'Updated a item  Single Bulb 24v details'),
(412, 62, '2014-12-24 12:35:09', 'Updated a item  Single Bulb 24v details'),
(413, 62, '2014-12-24 12:37:07', 'Updated a item Single Bulb  12v details'),
(414, 62, '2014-12-24 12:38:04', 'Updated a item Single Bulb  12v details'),
(415, 62, '2014-12-24 12:38:50', 'Updated a item Double Bulb 12V details'),
(416, 62, '2014-12-24 12:42:13', 'Updated a item  Double Bulb 24v details'),
(417, 62, '2014-12-24 12:42:23', 'Updated a item  Single Bulb 24v details'),
(418, 62, '2014-12-24 12:42:57', 'Updated a item Double Bulb 12V details'),
(419, 62, '2014-12-24 12:43:24', 'Updated a item ELECTRICAL WIRE details'),
(420, 62, '2014-12-24 12:44:04', 'Updated a item head light helogen 12v details'),
(421, 62, '2014-12-24 12:44:24', 'Updated a item head light helogen 24v details'),
(422, 62, '2014-12-24 12:44:44', 'Updated a item Horn fuse amp10 details'),
(423, 62, '2014-12-24 12:44:59', 'Updated a item indicator bulb 12v details'),
(424, 62, '2014-12-24 12:45:20', 'Updated a item Horn fuse amp15 details'),
(425, 62, '2014-12-24 12:45:37', 'Updated a item indicator bulb 24v details'),
(426, 62, '2014-12-24 12:46:01', 'Updated a item INSUTAING TAPE details'),
(427, 62, '2014-12-24 12:46:36', 'Updated a item On & Off switch details'),
(428, 62, '2014-12-24 12:46:55', 'Updated a item Single Bulb  12v details'),
(429, 62, '2014-12-24 12:47:17', 'Updated a item WELDING WIRE details'),
(430, 62, '2014-12-24 12:47:43', 'Updated a item WELDING RODS details'),
(431, 62, '2014-12-24 12:48:07', 'Updated a item BRAZING WIRE details'),
(432, 62, '2014-12-24 12:49:06', 'Updated a item INSULATING TAPE details'),
(433, 62, '2014-12-24 13:19:01', 'Logged Into the system'),
(434, 62, '2014-12-24 13:19:28', 'Added more job card parts details into the system'),
(435, 62, '2014-12-24 14:31:14', 'Signed out of the system'),
(436, 64, '2014-12-24 14:32:41', 'Logged Into the system'),
(437, 64, '2014-12-24 15:31:52', 'Logged Into the system'),
(438, 64, '2014-12-24 15:33:40', 'Updated a item Omo 500grms details'),
(439, 64, '2014-12-24 15:36:05', 'Updated a item Omo 500grms details'),
(440, 64, '2014-12-24 15:36:48', 'Signed out of the system'),
(441, 64, '2014-12-24 15:36:57', 'Logged Into the system'),
(442, 64, '2014-12-24 17:53:11', 'Logged Into the system'),
(443, 64, '2014-12-24 17:55:01', 'Logged Into the system'),
(444, 64, '2014-12-24 17:55:08', 'Logged Into the system'),
(445, 64, '2014-12-24 17:57:22', 'Signed out of the system'),
(446, 62, '2014-12-27 09:06:47', 'Logged Into the system'),
(447, 62, '2014-12-27 09:07:56', 'Added a booking for Long term view capital ltd of vehicle KBY 754G into the system'),
(448, 62, '2014-12-27 09:15:31', 'Created an item Gear mountain into the system'),
(449, 62, '2014-12-27 09:16:27', 'Created an item Engine mountain into the system'),
(450, 62, '2014-12-27 09:17:41', 'Created an item Shock absorbers into the system'),
(451, 62, '2014-12-27 09:19:40', 'Created an item Rear shock absorbers into the system'),
(452, 62, '2014-12-27 09:21:16', 'Created an item Kingpin into the system'),
(453, 62, '2014-12-27 09:22:39', 'Created an item Pilot bearings into the system'),
(454, 62, '2014-12-27 09:24:15', 'Created an item Upper clutch kit into the system'),
(455, 62, '2014-12-27 09:25:28', 'Created an item Bottom clutch kit into the system'),
(456, 62, '2014-12-27 09:26:37', 'Created an item Ball joints into the system'),
(457, 62, '2014-12-27 09:27:47', 'Created an item Thyrod into the system'),
(458, 62, '2014-12-27 09:28:32', 'Updated a item Engine mountain details'),
(459, 62, '2014-12-27 09:30:42', 'Updated a item Front shock absorber details'),
(460, 62, '2014-12-27 09:30:57', 'deleted an item from the system'),
(461, 62, '2014-12-27 09:32:29', 'Created an item Air filter into the system'),
(462, 62, '2014-12-27 09:33:44', 'Created an item Isuzu Diesel filter into the system'),
(463, 62, '2014-12-27 09:35:17', 'Created an item Isuzu oil filter into the system'),
(464, 62, '2014-12-27 09:37:54', 'Created an item Engine oil(caltex) into the system'),
(465, 62, '2014-12-27 09:40:53', 'Created an item Battery acid into the system'),
(466, 62, '2014-12-27 10:48:08', 'Signed out of the system'),
(467, 64, '2014-12-27 10:48:29', 'Logged Into the system'),
(468, 62, '2014-12-29 11:13:26', 'Logged Into the system'),
(469, 62, '2014-12-29 11:14:04', 'Signed out of the system'),
(470, 62, '2014-12-29 11:14:44', 'Logged Into the system'),
(471, 62, '2014-12-29 11:15:21', 'Logged Into the system'),
(472, 62, '2014-12-29 14:21:16', 'Logged Into the system'),
(473, 62, '2014-12-29 14:24:54', 'Added a booking for Long term view capital ltd of vehicle KBY 756G into the system'),
(474, 62, '2014-12-29 14:29:36', 'Signed out of the system'),
(475, 63, '2014-12-29 14:30:08', 'Logged Into the system'),
(476, 63, '2014-12-29 14:30:27', 'Clocked in a job card no 17 into the system '),
(477, 63, '2014-12-29 14:30:42', 'Clocked in a job card no 17 into the system '),
(478, 63, '2014-12-29 14:35:51', 'Signed out of the system'),
(479, 62, '2014-12-29 14:36:29', 'Logged Into the system'),
(480, 62, '2014-12-29 14:57:33', 'Added more job card parts details into the system'),
(481, 62, '2014-12-29 14:59:47', 'Added more job card tasks (47) into the system'),
(482, 62, '2014-12-29 15:07:43', 'Update a preliminary job card parts details into the system'),
(483, 62, '2014-12-29 15:08:03', 'Signed out of the system'),
(484, 63, '2014-12-29 15:08:22', 'Logged Into the system'),
(485, 63, '2014-12-29 15:08:50', 'Finished a task in job card no 17 into the system '),
(486, 63, '2014-12-29 15:09:02', 'Finished a task in job card no 17 into the system '),
(487, 63, '2014-12-29 15:09:14', 'Signed out of the system'),
(488, 62, '2014-12-29 15:09:29', 'Logged Into the system'),
(489, 62, '2014-12-29 15:18:08', 'Added a booking for Long term view capital ltd of vehicle KBW 145L into the system'),
(490, 62, '2014-12-29 15:19:03', 'Deleted Job Card Task from the system'),
(491, 62, '2014-12-29 15:19:23', 'Added more job card tasks (47) into the system'),
(492, 62, '2014-12-29 15:22:12', 'Created labour cost matrix into the system '),
(493, 62, '2014-12-29 15:22:24', 'Created labour cost matrix into the system '),
(494, 62, '2014-12-29 15:22:38', 'Created labour cost matrix into the system '),
(495, 62, '2014-12-29 15:24:08', 'Created labour cost matrix into the system '),
(496, 62, '2014-12-29 15:24:20', 'Created labour cost matrix into the system '),
(497, 62, '2014-12-29 15:24:33', 'Created labour cost matrix into the system '),
(498, 62, '2014-12-29 15:25:23', 'Update a preliminary job card task (47) into the system'),
(499, 62, '2014-12-29 15:55:33', 'Signed out of the system'),
(500, 63, '2014-12-29 15:55:44', 'Logged Into the system'),
(501, 63, '2014-12-29 15:57:58', 'Signed out of the system'),
(502, 62, '2014-12-29 16:42:07', 'Logged Into the system'),
(503, 62, '2014-12-29 16:44:25', 'Added a booking for Joel Njuguna of vehicle KAW  374M into the system'),
(504, 62, '2014-12-29 16:46:49', 'Signed out of the system'),
(505, 63, '2014-12-29 16:47:00', 'Logged Into the system'),
(506, 63, '2014-12-29 16:47:13', 'Clocked in a job card no 19 into the system '),
(507, 63, '2014-12-29 16:47:22', 'Signed out of the system'),
(508, 62, '2014-12-29 16:47:34', 'Logged Into the system'),
(509, 62, '2014-12-29 16:49:57', 'Created an labour task drain and refill engine oil into the system '),
(510, 62, '2014-12-29 16:50:57', 'Created labour cost matrix into the system '),
(511, 62, '2014-12-29 16:52:21', 'Deleted Job Card Task from the system'),
(512, 62, '2014-12-29 16:52:34', 'Added more job card tasks (54) into the system'),
(513, 62, '2014-12-29 16:53:12', 'Created an labour task replace spark plugs into the system '),
(514, 62, '2014-12-29 16:53:45', 'Created labour cost matrix into the system '),
(515, 62, '2014-12-29 16:54:30', 'Added more job card tasks (55) into the system'),
(516, 62, '2014-12-29 16:57:05', 'Signed out of the system'),
(517, 63, '2014-12-29 16:57:17', 'Logged Into the system'),
(518, 63, '2014-12-29 16:58:09', 'Clocked in a job card no 19 into the system '),
(519, 63, '2014-12-29 17:00:26', 'Clocked in a job card no 19 into the system '),
(520, 63, '2014-12-29 17:00:39', 'Finished a task in job card no 19 into the system '),
(521, 63, '2014-12-29 17:00:54', 'Finished a task in job card no 19 into the system '),
(522, 63, '2014-12-29 17:01:10', 'Signed out of the system'),
(523, 62, '2014-12-29 17:01:23', 'Logged Into the system'),
(524, 62, '2014-12-29 17:08:54', 'Signed out of the system'),
(525, 63, '2014-12-29 17:09:07', 'Logged Into the system'),
(526, 63, '2014-12-29 17:09:26', 'Signed out of the system'),
(527, 62, '2014-12-29 17:09:38', 'Logged Into the system'),
(528, 62, '2014-12-30 09:14:52', 'Logged Into the system'),
(529, 62, '2014-12-30 09:16:01', 'Created labour cost matrix into the system '),
(530, 62, '2014-12-30 09:16:17', 'Created labour cost matrix into the system '),
(531, 62, '2014-12-30 09:17:51', 'Created labour cost matrix into the system '),
(532, 62, '2014-12-30 09:18:13', 'Created labour cost matrix into the system '),
(533, 62, '2014-12-30 09:19:11', 'Created labour cost matrix into the system '),
(534, 62, '2014-12-30 09:19:28', 'Created labour cost matrix into the system '),
(535, 62, '2014-12-30 09:19:45', 'Created labour cost matrix into the system '),
(536, 62, '2014-12-30 09:47:35', 'Added a booking for Long term view capital ltd of vehicle KBY 755G into the system'),
(537, 62, '2014-12-30 09:48:21', 'Created an labour task Overheating into the system '),
(538, 62, '2014-12-30 09:49:27', 'Created labour cost matrix into the system '),
(539, 62, '2014-12-30 09:50:23', 'Signed out of the system'),
(540, 63, '2014-12-30 09:50:41', 'Logged Into the system'),
(541, 63, '2014-12-30 09:50:57', 'Clocked in a job card no 20 into the system '),
(542, 63, '2014-12-30 10:03:02', 'Finished a task in job card no 20 into the system '),
(543, 63, '2014-12-30 10:03:06', 'Signed out of the system'),
(544, 62, '2014-12-30 10:03:19', 'Logged Into the system'),
(545, 62, '2014-12-30 12:45:11', 'Logged Into the system'),
(546, 62, '2014-12-30 13:13:06', 'Signed out of the system'),
(547, 62, '2014-12-30 13:41:40', 'Logged Into the system'),
(548, 62, '2014-12-30 13:44:13', 'Added a booking for Mr. of vehicle KBT 800Z into the system'),
(549, 62, '2014-12-30 13:44:26', 'Signed out of the system'),
(550, 62, '2014-12-30 14:10:59', 'Logged Into the system'),
(551, 62, '2014-12-30 14:12:24', 'Signed out of the system'),
(552, 62, '2014-12-30 14:47:47', 'Logged Into the system'),
(553, 62, '2014-12-30 14:54:47', 'Signed out of the system'),
(554, 64, '2014-12-30 14:54:59', 'Logged Into the system'),
(555, 64, '2014-12-30 14:55:39', 'Signed out of the system'),
(556, 62, '2014-12-30 14:55:51', 'Logged Into the system'),
(557, 62, '2014-12-30 14:56:50', 'Update a preliminary job card parts details into the system'),
(558, 62, '2014-12-30 15:06:02', 'Update a preliminary job card task (24) into the system'),
(559, 62, '2014-12-30 15:06:07', 'Update a preliminary job card task (26) into the system'),
(560, 62, '2014-12-30 15:06:31', 'Update a preliminary job card task (56) into the system'),
(561, 62, '2014-12-30 15:07:39', 'Update a preliminary job card task (17) into the system'),
(562, 62, '2014-12-30 15:08:06', 'Update a preliminary job card task (29) into the system'),
(563, 62, '2014-12-30 15:08:46', 'Update a preliminary job card parts details into the system'),
(564, 62, '2014-12-30 15:09:11', 'Update a preliminary job card parts details into the system'),
(565, 62, '2014-12-30 15:09:41', 'Update a preliminary job card task (56) into the system'),
(566, 62, '2014-12-30 15:09:59', 'Update a preliminary job card task (47) into the system'),
(567, 62, '2014-12-30 15:10:07', 'Update a preliminary job card parts details into the system'),
(568, 62, '2014-12-30 15:10:49', 'Update a preliminary job card task (10) into the system'),
(569, 62, '2014-12-30 15:11:15', 'Update a preliminary job card task (33) into the system'),
(570, 62, '2014-12-30 15:11:23', 'Update a preliminary job card parts details into the system'),
(571, 62, '2014-12-30 15:29:43', 'Update invoice details details into the system'),
(572, 62, '2014-12-30 15:29:52', 'Update a invoice task (29) into the system'),
(573, 62, '2014-12-30 15:29:55', 'Update a invoice task (47) into the system'),
(574, 62, '2014-12-30 15:30:49', 'Update a invoice task (47) into the system'),
(575, 62, '2014-12-30 15:31:00', 'Update invoice details details into the system'),
(576, 62, '2014-12-30 15:31:32', 'Update invoice details details into the system'),
(577, 62, '2014-12-30 15:31:36', 'Update a invoice task (24) into the system'),
(578, 62, '2014-12-30 15:31:39', 'Update a invoice task (26) into the system'),
(579, 62, '2014-12-30 15:33:15', 'Update a invoice task (24) into the system'),
(580, 62, '2014-12-30 15:33:19', 'Update a invoice task (26) into the system'),
(581, 62, '2014-12-30 15:33:35', 'Update a invoice task (24) into the system'),
(582, 62, '2014-12-30 15:33:38', 'Update a invoice task (35) into the system'),
(583, 62, '2014-12-30 15:33:45', 'Update invoice details details into the system'),
(584, 62, '2014-12-30 15:34:17', 'Update a invoice task (24) into the system'),
(585, 62, '2014-12-30 15:34:22', 'Update a invoice task (28) into the system'),
(586, 62, '2014-12-30 15:34:27', 'Update a invoice task (27) into the system'),
(587, 62, '2014-12-30 15:34:32', 'Update a invoice task (26) into the system'),
(588, 62, '2014-12-30 15:34:40', 'Update a invoice task (28) into the system'),
(589, 62, '2014-12-30 15:35:05', 'Update invoice details details into the system'),
(590, 62, '2014-12-30 15:35:26', 'Update a invoice task (26) into the system'),
(591, 62, '2014-12-30 15:35:58', 'Update a invoice task (24) into the system'),
(592, 62, '2014-12-30 15:36:01', 'Update a invoice task (35) into the system'),
(593, 62, '2014-12-30 15:36:05', 'Update a invoice task (29) into the system'),
(594, 62, '2014-12-30 15:36:09', 'Update a invoice task (29) into the system'),
(595, 62, '2014-12-30 15:36:13', 'Update a invoice task (30) into the system'),
(596, 62, '2014-12-30 15:36:20', 'Update invoice details details into the system'),
(597, 62, '2014-12-30 15:38:19', 'Update labour matrix details into the system'),
(598, 62, '2014-12-30 15:38:45', 'Update labour matrix details into the system'),
(599, 62, '2014-12-30 15:39:14', 'Update labour matrix details into the system'),
(600, 62, '2014-12-30 15:40:34', 'Update labour matrix details into the system'),
(601, 62, '2014-12-30 15:41:17', 'Update labour matrix details into the system'),
(602, 62, '2014-12-30 15:42:55', 'Update a invoice task (26) into the system'),
(603, 62, '2014-12-30 15:43:56', 'Update a invoice task (24) into the system'),
(604, 62, '2014-12-30 15:44:00', 'Update a invoice task (33) into the system'),
(605, 62, '2014-12-30 15:44:05', 'Update a invoice task (29) into the system'),
(606, 62, '2014-12-30 15:44:12', 'Update invoice details details into the system'),
(607, 62, '2014-12-30 15:44:32', 'Update a invoice task (24) into the system'),
(608, 62, '2014-12-30 15:44:38', 'Update a invoice task (31) into the system'),
(609, 62, '2014-12-30 15:44:42', 'Update a invoice task (32) into the system'),
(610, 62, '2014-12-30 15:44:49', 'Update invoice details details into the system'),
(611, 62, '2014-12-30 15:45:15', 'Update a invoice task (24) into the system'),
(612, 62, '2014-12-30 15:45:18', 'Update a invoice task (35) into the system'),
(613, 62, '2014-12-30 15:45:26', 'Update invoice details details into the system'),
(614, 62, '2014-12-30 15:45:57', 'Update a invoice task (24) into the system'),
(615, 62, '2014-12-30 15:46:00', 'Update a invoice task (26) into the system'),
(616, 62, '2014-12-30 15:46:07', 'Update invoice details details into the system'),
(617, 62, '2014-12-30 16:22:31', 'Signed out of the system'),
(618, 62, '2014-12-30 16:47:49', 'Logged Into the system'),
(619, 62, '2014-12-30 16:49:12', 'Signed out of the system'),
(620, 62, '2014-12-31 08:16:23', 'Logged Into the system'),
(621, 62, '2014-12-31 08:18:06', 'Added a booking for Long term view capital ltd of vehicle KBV 863P into the system'),
(622, 62, '2014-12-31 09:13:09', 'Logged Into the system'),
(623, 62, '2014-12-31 09:14:33', 'Added a booking for Nelson of vehicle others into the system'),
(624, 62, '2014-12-31 09:17:22', 'Created an labour task oil filter into the system '),
(625, 62, '2014-12-31 09:17:35', 'Created an labour task diesel filter into the system '),
(626, 62, '2014-12-31 09:18:14', 'Created an labour task Rear oil seal isuzu into the system '),
(627, 62, '2014-12-31 09:18:28', 'Created an labour task front oil seal isuzu into the system '),
(628, 62, '2014-12-31 09:18:44', 'Created an labour task brake linings isuzu into the system '),
(629, 62, '2014-12-31 09:19:58', 'Added a booking for Nelson of vehicle others into the system'),
(630, 62, '2014-12-31 09:22:38', 'Update quotation details details into the system'),
(631, 62, '2014-12-31 09:25:56', 'Update a quotation parts details into the system'),
(632, 62, '2014-12-31 10:03:27', 'Logged Into the system'),
(633, 62, '2014-12-31 10:04:32', 'Added a booking for Long term view capital ltd of vehicle KBY 756G into the system'),
(634, 62, '2014-12-31 10:12:20', 'Created an labour task Replace inner oil seal into the system '),
(635, 62, '2014-12-31 10:12:44', 'Created an labour task Replace outer oil seal into the system '),
(636, 62, '2014-12-31 10:15:01', 'Created labour cost matrix into the system '),
(637, 62, '2014-12-31 10:15:16', 'Created labour cost matrix into the system '),
(638, 62, '2014-12-31 10:22:37', 'Logged Into the system'),
(639, 62, '2014-12-31 10:23:47', 'Deleted a booking from the system'),
(640, 62, '2014-12-31 10:24:46', 'Added a booking for Long term view capital ltd of vehicle KBY 756G into the system'),
(641, 62, '2014-12-31 10:27:16', 'Deleted Job Card Item from the system'),
(642, 62, '2014-12-31 10:28:38', 'Signed out of the system'),
(643, 63, '2014-12-31 10:28:47', 'Logged Into the system'),
(644, 63, '2014-12-31 10:29:07', 'Clocked in a job card no 21 into the system '),
(645, 63, '2014-12-31 10:29:27', 'Clocked in a job card no 21 into the system '),
(646, 63, '2014-12-31 10:29:40', 'Stopped a task in a job card no 21 into the system '),
(647, 63, '2014-12-31 10:29:51', 'Stopped a task in a job card no 21 into the system '),
(648, 63, '2014-12-31 10:30:03', 'Signed out of the system'),
(649, 62, '2014-12-31 10:30:17', 'Logged Into the system');
INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(650, 62, '2014-12-31 10:31:17', 'Added a booking for Long term view capital ltd of vehicle KBV 863P into the system'),
(651, 62, '2014-12-31 10:33:33', 'Signed out of the system'),
(652, 63, '2014-12-31 10:33:44', 'Logged Into the system'),
(653, 63, '2014-12-31 10:33:59', 'Clocked in a job card no 22 into the system '),
(654, 63, '2014-12-31 10:34:11', 'Finished a task in job card no 22 into the system '),
(655, 63, '2014-12-31 10:34:18', 'Signed out of the system'),
(656, 62, '2014-12-31 10:34:28', 'Logged Into the system'),
(657, 62, '2014-12-31 10:38:57', 'Update labour matrix details into the system'),
(658, 62, '2014-12-31 10:39:42', 'Logged Into the system'),
(659, 62, '2014-12-31 10:39:59', 'Update a preliminary job card task (56) into the system'),
(660, 62, '2014-12-31 10:46:48', 'Signed out of the system'),
(661, 63, '2014-12-31 10:46:59', 'Logged Into the system'),
(662, 63, '2014-12-31 10:47:05', 'Resumed a task in a job card no 21 into the system '),
(663, 63, '2014-12-31 10:47:09', 'Resumed a task in a job card no 21 into the system '),
(664, 63, '2014-12-31 10:47:12', 'Signed out of the system'),
(665, 62, '2014-12-31 10:47:35', 'Logged Into the system'),
(666, 62, '2014-12-31 10:54:23', 'Update a preliminary job card task (47) into the system'),
(667, 62, '2014-12-31 11:28:46', 'Logged Into the system'),
(668, 62, '2014-12-31 11:28:57', 'Signed out of the system'),
(669, 63, '2014-12-31 11:29:07', 'Logged Into the system'),
(670, 63, '2014-12-31 11:29:21', 'Finished a task in job card no 21 into the system '),
(671, 63, '2014-12-31 11:29:30', 'Finished a task in job card no 21 into the system '),
(672, 63, '2014-12-31 11:29:48', 'Signed out of the system'),
(673, 62, '2014-12-31 11:30:04', 'Logged Into the system'),
(674, 62, '2014-12-31 14:15:25', 'Logged Into the system'),
(675, 62, '2014-12-31 14:18:11', 'Added a booking for Long term view capital ltd of vehicle KBY 754G into the system'),
(676, 62, '2014-12-31 14:19:20', 'Created an labour task replace brake linings into the system '),
(677, 62, '2014-12-31 14:20:00', 'Created labour cost matrix into the system '),
(678, 62, '2014-12-31 16:22:09', 'Update a preliminary job card task (24) into the system'),
(679, 62, '2014-12-31 16:22:13', 'Update a preliminary job card task (33) into the system'),
(680, 62, '2014-12-31 16:22:18', 'Update a preliminary job card task (29) into the system'),
(681, 62, '2014-12-31 16:25:26', 'Update a preliminary job card task (24) into the system'),
(682, 62, '2014-12-31 16:25:29', 'Update a preliminary job card task (35) into the system'),
(683, 62, '2014-12-31 16:25:34', 'Update a preliminary job card task (29) into the system'),
(684, 62, '2014-12-31 16:25:39', 'Update a preliminary job card task (29) into the system'),
(685, 62, '2014-12-31 16:25:44', 'Update a preliminary job card task (30) into the system'),
(686, 62, '2014-12-31 16:33:55', 'Update a preliminary job card task (24) into the system'),
(687, 62, '2014-12-31 16:33:59', 'Update a preliminary job card task (25) into the system'),
(688, 62, '2014-12-31 16:34:04', 'Update a preliminary job card task (27) into the system'),
(689, 62, '2014-12-31 16:34:07', 'Update a preliminary job card task (26) into the system'),
(690, 62, '2014-12-31 16:34:11', 'Update a preliminary job card task (28) into the system'),
(691, 62, '2014-12-31 16:37:58', 'Update a preliminary job card task (32) into the system'),
(692, 62, '2014-12-31 16:38:01', 'Update a preliminary job card task (31) into the system'),
(693, 62, '2014-12-31 16:38:05', 'Update a preliminary job card task (24) into the system'),
(694, 64, '2015-01-02 08:35:58', 'Logged Into the system'),
(695, 64, '2015-01-02 08:47:36', 'Signed out of the system'),
(696, 62, '2015-01-02 08:47:46', 'Logged Into the system'),
(697, 62, '2015-01-02 08:49:02', 'Signed out of the system'),
(698, 64, '2015-01-02 08:49:11', 'Logged Into the system'),
(699, 64, '2015-01-02 08:50:37', 'Created an item gear oil into the system'),
(700, 64, '2015-01-02 08:52:28', 'Created an item diesel into the system'),
(701, 64, '2015-01-02 08:52:47', 'Signed out of the system'),
(702, 62, '2015-01-02 08:52:59', 'Logged Into the system'),
(703, 62, '2015-01-02 08:53:26', 'Added more job card parts details into the system'),
(704, 62, '2015-01-02 08:53:52', 'Update a preliminary job card parts details into the system'),
(705, 62, '2015-01-02 08:54:12', 'Update a preliminary job card parts details into the system'),
(706, 62, '2015-01-02 08:54:48', 'Added more job card parts details into the system'),
(707, 62, '2015-01-02 08:55:23', 'Added more job card parts details into the system'),
(708, 62, '2015-01-02 09:19:23', 'Signed out of the system'),
(709, 64, '2015-01-02 09:21:05', 'Logged Into the system'),
(710, 64, '2015-01-02 09:23:36', 'Updated a item Engine oil5ltrs(monograde details'),
(711, 64, '2015-01-02 09:25:14', 'Created an item Engine oil 5ltrs multi grade into the system'),
(712, 64, '2015-01-02 09:26:29', 'Updated a item Battery acid details'),
(713, 64, '2015-01-02 09:27:26', 'Updated a item Starplex grease(caltex)1/2kg details'),
(714, 64, '2015-01-02 09:45:04', 'Updated a item Starplex grease(caltex)1/2kg details'),
(715, 64, '2015-01-02 09:48:42', 'Updated a item Brake fluid details'),
(716, 64, '2015-01-02 09:49:29', 'Updated a item gear oil details'),
(717, 64, '2015-01-02 09:49:32', 'Updated a item gear oil details'),
(718, 64, '2015-01-02 09:56:12', 'Signed out of the system'),
(719, 62, '2015-01-02 09:56:26', 'Logged Into the system'),
(720, 62, '2015-01-02 09:58:36', 'Added a booking for Mr. Julius of vehicle KAT 353K into the system'),
(721, 62, '2015-01-02 09:59:22', 'Created an labour task Wheel changing into the system '),
(722, 62, '2015-01-02 10:00:01', 'Created labour cost matrix into the system '),
(723, 62, '2015-01-02 10:01:00', 'Update labour matrix details into the system'),
(724, 62, '2015-01-02 10:01:33', 'Update labour matrix details into the system'),
(725, 0, '2015-01-02 10:10:08', 'Update a booking for Mr. Julius of vehicle KAT 353K into the system'),
(726, 62, '2015-01-02 10:10:17', 'Update a preliminary job card task (65) into the system'),
(727, 62, '2015-01-02 10:11:15', 'Created labour cost matrix into the system '),
(728, 62, '2015-01-02 10:11:37', 'Update labour matrix details into the system'),
(729, 62, '2015-01-02 10:11:59', 'Update a preliminary job card task (65) into the system'),
(730, 62, '2015-01-02 10:16:52', 'Update labour matrix details into the system'),
(731, 62, '2015-01-02 10:17:14', 'Update labour matrix details into the system'),
(732, 62, '2015-01-02 10:17:31', 'Update labour matrix details into the system'),
(733, 62, '2015-01-02 10:18:10', 'Created labour cost matrix into the system '),
(734, 62, '2015-01-02 10:23:03', 'Added a booking for Long term view capital ltd of vehicle KBY 755G into the system'),
(735, 62, '2015-01-02 10:25:31', 'Created an labour task Replace exhaust gasket into the system '),
(736, 62, '2015-01-02 10:26:37', 'Created labour cost matrix into the system '),
(737, 62, '2015-01-02 10:47:02', 'Created an labour task greasing into the system '),
(738, 62, '2015-01-02 10:47:48', 'Created labour cost matrix into the system '),
(739, 62, '2015-01-02 10:48:07', 'Update labour matrix details into the system'),
(740, 62, '2015-01-02 11:00:57', 'Signed out of the system'),
(741, 63, '2015-01-02 11:01:11', 'Logged Into the system'),
(742, 63, '2015-01-02 11:02:27', 'Clocked in a job card no 25 into the system '),
(743, 63, '2015-01-02 11:53:48', 'Finished a task in job card no 25 into the system '),
(744, 63, '2015-01-02 11:54:03', 'Clocked in a job card no 25 into the system '),
(745, 63, '2015-01-02 11:54:25', 'Finished a task in job card no 25 into the system '),
(746, 63, '2015-01-02 11:54:44', 'Clocked in a job card no 25 into the system '),
(747, 63, '2015-01-02 11:54:59', 'Stopped a task in a job card no 25 into the system '),
(748, 64, '2015-01-02 12:16:13', 'Logged Into the system'),
(749, 64, '2015-01-02 12:21:59', 'Created an item Air transmission fluid 500ml into the system'),
(750, 64, '2015-01-02 12:24:34', 'Created an item Air transmission fluid 5ltrs into the system'),
(751, 64, '2015-01-02 15:21:09', 'Signed out of the system'),
(752, 62, '2015-01-02 15:21:28', 'Logged Into the system'),
(753, 62, '2015-01-02 15:42:52', 'Deleted Job Card Task from the system'),
(754, 62, '2015-01-02 15:43:52', 'Created an labour task Exhaust welding into the system '),
(755, 62, '2015-01-02 15:45:15', 'Created an labour task separator labour into the system '),
(756, 62, '2015-01-02 15:46:28', 'Created an labour task Kingpin replacement into the system '),
(757, 62, '2015-01-02 15:48:16', 'Created an labour task snake light wiring into the system '),
(758, 64, '2015-01-03 08:35:55', 'Logged Into the system'),
(759, 64, '2015-01-03 08:40:12', 'Signed out of the system'),
(760, 62, '2015-01-03 08:40:25', 'Logged Into the system'),
(761, 62, '2015-01-03 08:41:23', 'Added a booking for Long term view capital ltd of vehicle KBY 754G into the system'),
(762, 62, '2015-01-03 09:14:50', 'Signed out of the system'),
(763, 19, '2015-01-03 09:14:59', 'Logged Into the system'),
(764, 19, '2015-01-03 09:21:01', 'Signed out of the system'),
(765, 64, '2015-01-03 09:21:12', 'Logged Into the system'),
(766, 64, '2015-01-03 09:46:55', 'Signed out of the system'),
(767, 19, '2015-01-03 09:47:03', 'Logged Into the system'),
(768, 19, '2015-01-03 10:03:20', 'Signed out of the system'),
(769, 64, '2015-01-03 10:03:29', 'Logged Into the system'),
(770, 64, '2015-01-03 10:12:22', 'Created an item Air filterAA090 into the system'),
(771, 64, '2015-01-03 10:13:00', 'Created an item Air filterAA070 into the system'),
(772, 64, '2015-01-03 10:14:16', 'Created an item Air filterP2J003 into the system'),
(773, 64, '2015-01-03 10:15:41', 'Created an item Air filterPNB002 into the system'),
(774, 64, '2015-01-03 10:17:46', 'Created an item Air filterEB300 into the system'),
(775, 64, '2015-01-03 10:18:21', 'Created an item Air filter50060 into the system'),
(776, 64, '2015-01-03 10:19:01', 'Created an item Air filteB1010 into the system'),
(777, 64, '2015-01-03 10:19:54', 'Created an item Air filtePWJ-A10 into the system'),
(778, 64, '2015-01-03 10:20:41', 'Created an item Air filte67060 into the system'),
(779, 64, '2015-01-03 10:22:58', 'Signed out of the system'),
(780, 19, '2015-01-03 10:23:22', 'Logged Into the system'),
(781, 19, '2015-01-03 10:24:16', 'Signed out of the system'),
(782, 19, '2015-01-03 10:24:26', 'Logged Into the system'),
(783, 19, '2015-01-03 10:24:41', 'Signed out of the system'),
(784, 62, '2015-01-03 10:25:08', 'Logged Into the system'),
(785, 62, '2015-01-03 10:28:19', 'Added a booking for Mr. Julius of vehicle KAT 353K into the system'),
(786, 62, '2015-01-03 11:40:26', 'Signed out of the system'),
(787, 19, '2015-01-03 11:40:36', 'Logged Into the system'),
(788, 19, '2015-01-03 11:40:53', 'Signed out of the system'),
(789, 19, '2015-01-03 11:41:03', 'Logged Into the system'),
(790, 19, '2015-01-03 12:31:27', 'Signed out of the system'),
(791, 19, '2015-01-03 12:31:36', 'Logged Into the system'),
(792, 19, '2015-01-03 12:31:47', 'Signed out of the system'),
(793, 19, '2015-01-03 12:33:49', 'Logged Into the system'),
(794, 19, '2015-01-03 12:36:36', 'Added a booking for Engen petrol station of vehicle n/a into the system'),
(795, 19, '2015-01-03 12:57:00', 'Signed out of the system'),
(796, 19, '2015-01-03 12:57:07', 'Logged Into the system'),
(797, 64, '2015-01-05 07:48:30', 'Logged Into the system'),
(798, 64, '2015-01-05 07:49:54', 'Created an item Air filter4M400 into the system'),
(799, 64, '2015-01-05 07:51:20', 'Updated a item Air filter67060 details'),
(800, 64, '2015-01-05 07:51:22', 'Updated a item Air filter67060 details'),
(801, 64, '2015-01-05 07:51:44', 'Updated a item Air filterPWJ-A10 details'),
(802, 64, '2015-01-05 07:52:25', 'Created an item Air filter11050 into the system'),
(803, 64, '2015-01-05 07:53:39', 'Created an item Air filter11090 into the system'),
(804, 64, '2015-01-05 07:54:26', 'Created an item Air filter15070 into the system'),
(805, 64, '2015-01-05 07:55:04', 'Created an item Air filter16020 into the system'),
(806, 64, '2015-01-05 07:55:41', 'Created an item Air filter21030 into the system'),
(807, 64, '2015-01-05 07:56:41', 'Created an item Air filter21050 into the system'),
(808, 64, '2015-01-05 07:57:16', 'Updated a item Air filter11050 details'),
(809, 64, '2015-01-05 07:57:42', 'Updated a item Air filter11050 details'),
(810, 64, '2015-01-05 07:58:19', 'Created an item Air filter22020 into the system'),
(811, 64, '2015-01-05 07:59:06', 'Created an item Air filter23030 into the system'),
(812, 64, '2015-01-05 07:59:47', 'Created an item Air filter35020 into the system'),
(813, 64, '2015-01-05 08:00:51', 'Created an item Air filter73C10 into the system'),
(814, 64, '2015-01-05 08:01:52', 'Created an item Air filter74020 into the system'),
(815, 64, '2015-01-05 08:02:29', 'Created an item Air filter77A10 into the system'),
(816, 64, '2015-01-05 08:03:13', 'Created an item Air filter41300 into the system'),
(817, 64, '2015-01-05 08:04:49', 'Created an item Air filterV0100 into the system'),
(818, 64, '2015-01-05 08:08:39', 'Created an item Air filter20040 into the system'),
(819, 64, '2015-01-05 08:09:14', 'Created an item Air filter2810 into the system'),
(820, 64, '2015-01-05 08:09:51', 'Created an item Air filter70050 into the system'),
(821, 64, '2015-01-05 08:10:32', 'Created an item Air filter74060 into the system'),
(822, 64, '2015-01-05 08:11:32', 'Created an item Air filterMv188 into the system'),
(823, 64, '2015-01-05 08:13:37', 'Created an item Air filterMv266 into the system'),
(824, 64, '2015-01-05 08:22:23', 'Created an item Air filter22600 into the system'),
(825, 64, '2015-01-05 08:22:54', 'Updated a item Air filter11050 details'),
(826, 64, '2015-01-05 08:24:46', 'Signed out of the system'),
(827, 62, '2015-01-05 08:24:59', 'Logged Into the system'),
(828, 62, '2015-01-05 08:32:02', 'Added a booking for  Mr. Beutah Maroko of vehicle KBT 617W into the system'),
(829, 62, '2015-01-05 08:49:39', 'Update a customer belonging (4 carmats) into the system'),
(830, 62, '2015-01-05 08:50:42', 'Added more job card tasks (22) into the system'),
(831, 62, '2015-01-05 08:50:56', 'Deleted Job Card Task from the system'),
(832, 62, '2015-01-05 09:02:31', 'Update a preliminary job card details details into the system'),
(833, 62, '2015-01-05 09:04:11', 'Signed out of the system'),
(834, 65, '2015-01-05 09:04:30', 'Logged Into the system'),
(835, 65, '2015-01-05 09:04:52', 'Signed out of the system'),
(836, 66, '2015-01-05 09:05:03', 'Logged Into the system'),
(837, 66, '2015-01-05 09:05:25', 'Clocked in a job card no 27 into the system '),
(838, 66, '2015-01-05 09:05:38', 'Signed out of the system'),
(839, 62, '2015-01-05 09:05:49', 'Logged Into the system'),
(840, 62, '2015-01-05 09:06:50', 'Signed out of the system'),
(841, 66, '2015-01-05 09:06:58', 'Logged Into the system'),
(842, 66, '2015-01-05 09:07:41', 'Clocked in a job card no 27 into the system '),
(843, 66, '2015-01-05 09:13:42', 'Signed out of the system'),
(844, 65, '2015-01-05 09:14:08', 'Logged Into the system'),
(845, 65, '2015-01-05 09:14:15', 'Signed out of the system'),
(846, 62, '2015-01-05 09:14:27', 'Logged Into the system'),
(847, 62, '2015-01-05 09:15:15', 'Signed out of the system'),
(848, 65, '2015-01-05 09:16:06', 'Logged Into the system'),
(849, 65, '2015-01-05 09:16:41', 'Signed out of the system'),
(850, 66, '2015-01-05 09:16:51', 'Logged Into the system'),
(851, 66, '2015-01-05 09:17:29', 'Stopped a task in a job card no 27 into the system '),
(852, 66, '2015-01-05 09:17:37', 'Resumed a task in a job card no 27 into the system '),
(853, 66, '2015-01-05 09:17:52', 'Finished a task in job card no 27 into the system '),
(854, 66, '2015-01-05 09:22:44', 'Signed out of the system'),
(855, 64, '2015-01-05 09:23:10', 'Logged Into the system'),
(856, 64, '2015-01-05 09:25:23', 'Created an item Spark plugs into the system'),
(857, 64, '2015-01-05 09:27:08', 'Created an item ENGINE OIL4LTRS into the system'),
(858, 64, '2015-01-05 09:28:06', 'Updated a item Spark plugs details'),
(859, 64, '2015-01-05 09:28:51', 'Updated a item Spark plugs 8H516 details'),
(860, 64, '2015-01-05 09:34:43', 'Signed out of the system'),
(861, 62, '2015-01-05 09:34:59', 'Logged Into the system'),
(862, 62, '2015-01-05 09:44:52', 'Signed out of the system'),
(863, 64, '2015-01-05 09:45:01', 'Logged Into the system'),
(864, 64, '2015-01-05 09:45:33', 'Updated a item ENGINE OIL4LTRS details'),
(865, 64, '2015-01-05 09:45:35', 'Signed out of the system'),
(866, 62, '2015-01-05 09:45:56', 'Logged Into the system'),
(867, 62, '2015-01-05 09:54:21', 'Signed out of the system'),
(868, 64, '2015-01-05 09:54:31', 'Logged Into the system'),
(869, 64, '2015-01-05 09:58:14', 'Signed out of the system'),
(870, 62, '2015-01-05 09:58:25', 'Logged Into the system'),
(871, 62, '2015-01-05 10:00:28', 'Deleted Job Card Task from the system'),
(872, 62, '2015-01-05 10:11:55', 'Update a preliminary job card task (24) into the system'),
(873, 62, '2015-01-05 10:12:05', 'Update a preliminary job card task (28) into the system'),
(874, 62, '2015-01-05 10:13:11', 'Signed out of the system'),
(875, 64, '2015-01-05 10:13:23', 'Logged Into the system'),
(876, 64, '2015-01-05 10:13:43', 'Signed out of the system'),
(877, 62, '2015-01-05 10:16:02', 'Logged Into the system'),
(878, 62, '2015-01-05 10:16:50', 'Logged Into the system'),
(879, 62, '2015-01-05 10:19:12', 'Signed out of the system'),
(880, 64, '2015-01-05 10:19:23', 'Logged Into the system'),
(881, 64, '2015-01-05 10:20:16', 'Updated a item Air filterAA090 details'),
(882, 64, '2015-01-05 10:21:52', 'Updated a item Air filterAA070 details'),
(883, 64, '2015-01-05 10:21:54', 'Signed out of the system'),
(884, 62, '2015-01-05 10:22:27', 'Logged Into the system'),
(885, 62, '2015-01-05 10:29:57', 'Signed out of the system'),
(886, 64, '2015-01-05 10:30:12', 'Logged Into the system'),
(887, 64, '2015-01-05 10:35:26', 'Created an item category service parts into the system '),
(888, 64, '2015-01-05 10:35:57', 'Created an item category Repair parts into the system '),
(889, 64, '2015-01-05 10:39:21', 'Updated a item Air filteB1010 details'),
(890, 64, '2015-01-05 10:40:34', 'Updated a item Air filter11050 details'),
(891, 64, '2015-01-05 10:40:48', 'Updated a item Air filter11050 details'),
(892, 64, '2015-01-05 10:40:54', 'Updated a item Air filter11050 details'),
(893, 64, '2015-01-05 10:40:58', 'Updated a item Air filter11050 details'),
(894, 64, '2015-01-05 10:41:31', 'Updated a item Air filter11090 details'),
(895, 64, '2015-01-05 10:41:46', 'Updated a item Air filter15070 details'),
(896, 64, '2015-01-05 10:41:58', 'Updated a item Air filter16020 details'),
(897, 64, '2015-01-05 10:42:37', 'Updated a item Air filter20040 details'),
(898, 64, '2015-01-05 10:42:52', 'Updated a item Air filter21030 details'),
(899, 64, '2015-01-05 10:43:05', 'Updated a item Air filter21050 details'),
(900, 64, '2015-01-05 10:43:19', 'Updated a item Air filter22020 details'),
(901, 64, '2015-01-05 10:43:34', 'Updated a item Air filter22600 details'),
(902, 64, '2015-01-05 10:43:47', 'Updated a item Air filter23030 details'),
(903, 64, '2015-01-05 10:44:25', 'Updated a item Air filter2810 details'),
(904, 64, '2015-01-05 10:44:46', 'Updated a item Air filter35020 details'),
(905, 64, '2015-01-05 10:45:06', 'Updated a item Air filter41300 details'),
(906, 64, '2015-01-05 10:45:33', 'Updated a item Air filter74020 details'),
(907, 64, '2015-01-05 10:45:54', 'Updated a item Air filter4M400 details'),
(908, 64, '2015-01-05 10:46:00', 'Updated a item Air filter4M400 details'),
(909, 64, '2015-01-05 10:46:28', 'Updated a item Air filter67060 details'),
(910, 64, '2015-01-05 10:46:43', 'Updated a item Air filter70050 details'),
(911, 64, '2015-01-05 10:47:02', 'Updated a item Air filter73C10 details'),
(912, 64, '2015-01-05 10:47:25', 'Updated a item Air filter50060 details'),
(913, 64, '2015-01-05 10:47:28', 'Updated a item Air filter50060 details'),
(914, 64, '2015-01-05 10:47:32', 'Updated a item Air filter50060 details'),
(915, 64, '2015-01-05 10:48:05', 'Updated a item Air filter74060 details'),
(916, 64, '2015-01-05 10:48:20', 'Updated a item Air filterV0100 details'),
(917, 64, '2015-01-05 10:48:37', 'Updated a item Air filterMv266 details'),
(918, 64, '2015-01-05 10:48:57', 'Updated a item Air filterMv266 details'),
(919, 64, '2015-01-05 10:49:12', 'Updated a item Air filterEB300 details'),
(920, 64, '2015-01-05 10:49:52', 'Updated a item Air filterPNB002 details'),
(921, 64, '2015-01-05 10:50:13', 'Updated a item Air filterAA090 details'),
(922, 64, '2015-01-05 10:50:36', 'Updated a item Air filterPWJ-A10 details'),
(923, 64, '2015-01-05 10:51:16', 'Updated a item Air filterPWJ-A10 details'),
(924, 64, '2015-01-05 10:51:32', 'Updated a item Air filterPWJ-A10 details'),
(925, 64, '2015-01-05 10:51:49', 'Updated a item Air filter77A10 details'),
(926, 64, '2015-01-05 10:53:05', 'Updated a item Air filter77A10 details'),
(927, 64, '2015-01-05 10:54:28', 'Updated a item Air filterMv266 details'),
(928, 64, '2015-01-05 10:55:00', 'Updated a item Air filter11050 details'),
(929, 64, '2015-01-05 10:55:10', 'Updated a item Air filter11050 details'),
(930, 64, '2015-01-05 10:55:19', 'Updated a item Air filter11090 details'),
(931, 64, '2015-01-05 11:03:28', 'Updated a item Air filterMv188 details'),
(932, 64, '2015-01-05 11:04:10', 'Updated a item Air filterMv188 details'),
(933, 64, '2015-01-05 11:05:28', 'Updated a item Air filter details'),
(934, 64, '2015-01-05 11:06:33', 'Updated a item Air filter11050 details'),
(935, 64, '2015-01-05 11:08:23', 'Updated a item Air filter11090 details'),
(936, 64, '2015-01-05 11:13:12', 'Updated a item Air filteB1010 details'),
(937, 64, '2015-01-05 11:15:06', 'Updated a item Air filter15070 details'),
(938, 64, '2015-01-05 11:18:07', 'Updated a item Air filter20040 details'),
(939, 64, '2015-01-05 11:19:07', 'Updated a item Air filter16020 details'),
(940, 64, '2015-01-05 11:19:59', 'Updated a item Air filter21030 details'),
(941, 64, '2015-01-05 11:20:26', 'Updated a item Air filter21030 details'),
(942, 64, '2015-01-05 11:20:34', 'Updated a item Air filter21030 details'),
(943, 64, '2015-01-05 11:22:19', 'Updated a item Air filter21050 details'),
(944, 64, '2015-01-05 11:24:18', 'Updated a item Air filter22020 details'),
(945, 64, '2015-01-05 11:26:05', 'Updated a item Air filter22600 details'),
(946, 64, '2015-01-05 11:27:00', 'Updated a item Air filter23030 details'),
(947, 64, '2015-01-05 11:27:51', 'Updated a item Air filter2810 details'),
(948, 64, '2015-01-05 11:28:57', 'Updated a item Air filter35020 details'),
(949, 64, '2015-01-05 11:31:39', 'Updated a item Air filter41B00 details'),
(950, 64, '2015-01-05 11:41:40', 'Updated a item Air filterAA090 details'),
(951, 64, '2015-01-05 11:42:32', 'Updated a item Air filterAA070 details'),
(952, 64, '2015-01-05 11:44:41', 'Updated a item Air filterP2J-003 details'),
(953, 64, '2015-01-05 11:45:53', 'Updated a item Air filterPNB003 details'),
(954, 64, '2015-01-05 11:46:32', 'Updated a item Air filterEB300 details'),
(955, 64, '2015-01-05 11:46:39', 'Updated a item Air filterEB300 details'),
(956, 64, '2015-01-05 11:47:20', 'Updated a item Air filter50060 details'),
(957, 64, '2015-01-05 11:47:59', 'Updated a item Air filteB1010 details'),
(958, 64, '2015-01-05 11:50:12', 'Updated a item Air filterPWJ-A10 details'),
(959, 64, '2015-01-05 11:50:58', 'Updated a item Air filter67060 details'),
(960, 64, '2015-01-05 11:54:21', 'deleted an item from the system'),
(961, 64, '2015-01-05 11:54:55', 'Updated a item Air transmission fluid 500ml details'),
(962, 64, '2015-01-05 12:03:26', 'Updated a item Air filterPNB003 details'),
(963, 64, '2015-01-05 12:09:12', 'Updated a item Air filter73C10 details'),
(964, 64, '2015-01-05 12:09:58', 'Updated a item Air filter77A10 details'),
(965, 64, '2015-01-05 12:12:45', 'Updated a item Air filterV0100 details'),
(966, 64, '2015-01-05 12:16:25', 'Updated a item Air filter2810 details'),
(967, 64, '2015-01-05 12:17:26', 'Updated a item Air filter70050 details'),
(968, 64, '2015-01-05 12:18:11', 'Updated a item Air filter74060 details'),
(969, 64, '2015-01-05 12:20:06', 'Updated a item Air filterMv266 details'),
(970, 64, '2015-01-05 12:23:49', 'Created an item Air filterED500 into the system'),
(971, 64, '2015-01-05 12:24:22', 'Updated a item Air transmission fluid 5ltrs details'),
(972, 64, '2015-01-05 12:26:17', 'Created an item Air filte31110 into the system'),
(973, 64, '2015-01-05 12:27:10', 'Created an item Air filter31120 into the system'),
(974, 64, '2015-01-05 12:28:34', 'Created an item Air filter50040 into the system'),
(975, 64, '2015-01-05 12:29:11', 'Created an item Air filter79402 into the system'),
(976, 64, '2015-01-05 12:30:49', 'Updated a item Air filter31120 details'),
(977, 64, '2015-01-05 12:33:03', 'Updated a item Air filter74020 details'),
(978, 64, '2015-01-05 12:33:36', 'Updated a item Air filter79402 details'),
(979, 64, '2015-01-05 12:39:48', 'Created an item Air filter47010 into the system'),
(980, 64, '2015-01-05 12:42:40', 'Created an item Oil FilterMB220900 into the system'),
(981, 64, '2015-01-05 12:47:26', 'Updated a item Fuel FilterMB220900 details'),
(982, 64, '2015-01-05 12:48:40', 'Created an item Fuel Filter64010 into the system'),
(983, 64, '2015-01-05 12:56:54', 'Created an item Oil Filter Toyota10001/03001 into the system'),
(984, 64, '2015-01-05 12:57:56', 'Created an item Oil Filter Toyota03006 into the system'),
(985, 64, '2015-01-05 12:59:46', 'Created an item Oil Filter Nissan65F00 into the system'),
(986, 64, '2015-01-05 13:01:18', 'Created an item Oil Filter Mark x-31020/80 into the system'),
(987, 64, '2015-01-05 13:02:33', 'Created an item Oil Filter Toyota Passo-37010 into the system'),
(988, 64, '2015-01-05 13:04:51', 'Created an item Oil Filter 20001/30002 into the system'),
(989, 64, '2015-01-05 13:05:58', 'Created an item Oil Filter MD135737 into the system'),
(990, 64, '2015-01-05 13:18:01', 'Updated a item Spark plugs 8H516 details'),
(991, 64, '2015-01-05 13:21:02', 'Created an item Spark Plugs BKR6E2756 into the system'),
(992, 64, '2015-01-05 13:26:45', 'Created an item Spark Plugs BP6ES-7811 into the system'),
(993, 64, '2015-01-05 13:28:18', 'Created an item Spark Plugs BP6EY-6278 into the system'),
(994, 64, '2015-01-05 13:29:33', 'Created an item Spark Plugs BCP5ES-7810 into the system'),
(995, 64, '2015-01-05 13:32:33', 'Updated a item Spark Plugs BCP5ES-7810 details'),
(996, 64, '2015-01-05 13:35:03', 'Created an item Spark plugs BKR6EYA4195 into the system'),
(997, 64, '2015-01-05 13:35:33', 'Signed out of the system'),
(998, 19, '2015-01-05 13:37:07', 'Logged Into the system'),
(999, 19, '2015-01-05 13:49:05', 'Clocked in a job card no 26 into the system '),
(1000, 19, '2015-01-05 13:51:22', 'Signed out of the system'),
(1001, 64, '2015-01-05 13:51:33', 'Logged Into the system'),
(1002, 64, '2015-01-05 13:52:41', 'Signed out of the system'),
(1003, 19, '2015-01-05 13:52:53', 'Logged Into the system'),
(1004, 19, '2015-01-05 13:59:41', 'Signed out of the system'),
(1005, 67, '2015-01-05 13:59:54', 'Logged Into the system'),
(1006, 67, '2015-01-05 14:00:25', 'Signed out of the system'),
(1007, 19, '2015-01-05 14:00:33', 'Logged Into the system'),
(1008, 19, '2015-01-05 14:04:18', 'Signed out of the system'),
(1009, 67, '2015-01-05 14:04:30', 'Logged Into the system'),
(1010, 67, '2015-01-05 14:22:22', 'Signed out of the system'),
(1011, 19, '2015-01-05 14:29:10', 'Logged Into the system'),
(1012, 19, '2015-01-05 14:53:13', 'Signed out of the system'),
(1013, 68, '2015-01-05 14:53:27', 'Logged Into the system'),
(1014, 68, '2015-01-05 14:53:36', 'Signed out of the system'),
(1015, 19, '2015-01-05 14:53:43', 'Logged Into the system'),
(1016, 19, '2015-01-05 14:53:57', 'Signed out of the system'),
(1017, 68, '2015-01-05 14:54:05', 'Logged Into the system'),
(1018, 19, '2015-01-05 14:59:52', 'Logged Into the system'),
(1019, 19, '2015-01-05 15:02:32', 'Signed out of the system'),
(1020, 64, '2015-01-05 15:03:15', 'Logged Into the system'),
(1021, 64, '2015-01-05 15:06:41', 'Created an item Spark Plugs Denso K16Single into the system'),
(1022, 64, '2015-01-05 15:08:25', 'Created an item Spark Plugs Denso K16Double into the system'),
(1023, 64, '2015-01-05 15:10:33', 'Created an item Spark Plugs Denso Q20 Single into the system'),
(1024, 64, '2015-01-05 15:12:27', 'Created an item Spark Plugs  K20Double into the system'),
(1025, 64, '2015-01-05 15:16:20', 'Signed out of the system'),
(1026, 62, '2015-01-05 15:16:43', 'Logged Into the system'),
(1027, 62, '2015-01-05 15:18:04', 'Created an labour task Replace rear axle tube into the system '),
(1028, 62, '2015-01-05 15:18:28', 'Created an labour task Replace top radiator hose into the system '),
(1029, 62, '2015-01-05 15:19:09', 'Created labour cost matrix into the system '),
(1030, 62, '2015-01-05 15:19:38', 'Created labour cost matrix into the system '),
(1031, 62, '2015-01-05 15:20:20', 'Added more job card tasks (72) into the system'),
(1032, 62, '2015-01-05 15:21:39', 'Created an labour task Replace diesel filter into the system '),
(1033, 62, '2015-01-05 15:22:09', 'Created labour cost matrix into the system '),
(1034, 62, '2015-01-05 15:25:53', 'Signed out of the system'),
(1035, 64, '2015-01-05 15:26:03', 'Logged Into the system'),
(1036, 64, '2015-01-05 15:30:17', 'Updated a item gear box oil details'),
(1037, 64, '2015-01-05 15:31:13', 'Signed out of the system'),
(1038, 62, '2015-01-05 15:31:28', 'Logged Into the system'),
(1039, 62, '2015-01-05 15:34:31', 'Signed out of the system'),
(1040, 64, '2015-01-05 15:34:40', 'Logged Into the system'),
(1041, 64, '2015-01-05 15:36:23', 'Updated a item gear box oil details'),
(1042, 64, '2015-01-05 15:36:32', 'Updated a item Gear box oil details'),
(1043, 64, '2015-01-05 15:39:36', 'Created an item Air filter06050 into the system'),
(1044, 64, '2015-01-05 15:47:01', 'Signed out of the system'),
(1045, 62, '2015-01-05 15:47:18', 'Logged Into the system'),
(1046, 62, '2015-01-05 15:48:50', 'Added more invoice tasks (72) into the system'),
(1047, 62, '2015-01-05 15:59:20', 'Update a preliminary job card task (26) into the system'),
(1048, 62, '2015-01-05 15:59:24', 'Update a preliminary job card task (24) into the system'),
(1049, 62, '2015-01-05 15:59:36', 'Update a preliminary job card task (24) into the system'),
(1050, 62, '2015-01-05 16:02:10', 'Update a preliminary job card task (29) into the system'),
(1051, 62, '2015-01-05 16:11:16', 'Update a invoice task (33) into the system'),
(1052, 62, '2015-01-05 16:11:55', 'Update a preliminary job card task (33) into the system'),
(1053, 62, '2015-01-05 16:15:28', 'Update a preliminary job card task (73) into the system'),
(1054, 62, '2015-01-05 16:18:29', 'Updated Company Contact Details'),
(1055, 62, '2015-01-05 16:26:38', 'Update a preliminary job card task (56) into the system'),
(1056, 62, '2015-01-05 16:27:17', 'Added more job card tasks (73) into the system'),
(1057, 0, '2015-01-05 16:31:56', 'Update a booking for Long term view capital ltd of vehicle KBV 863F into the system'),
(1058, 62, '2015-01-05 16:33:49', 'Update a preliminary job card task (64) into the system'),
(1059, 62, '2015-01-05 16:40:54', 'Signed out of the system'),
(1060, 62, '2015-01-05 16:42:12', 'Logged Into the system'),
(1061, 62, '2015-01-05 16:47:55', 'Added a booking for Long term view capital ltd of vehicle KBV 599Z into the system'),
(1062, 62, '2015-01-05 16:48:37', 'Created an labour task Replace  clutch unit into the system '),
(1063, 62, '2015-01-05 16:48:54', 'Created an labour task Replace front wheel bearing into the system '),
(1064, 62, '2015-01-05 16:50:47', 'Signed out of the system'),
(1065, 65, '2015-01-05 16:51:56', 'Logged Into the system'),
(1066, 65, '2015-01-05 16:53:12', 'Clocked in a job card no 28 into the system '),
(1067, 65, '2015-01-05 16:53:24', 'Signed out of the system'),
(1068, 63, '2015-01-05 16:53:38', 'Logged Into the system'),
(1069, 63, '2015-01-05 16:53:59', 'Clocked in a job card no 28 into the system '),
(1070, 63, '2015-01-05 16:54:16', 'Finished a task in job card no 26 into the system '),
(1071, 63, '2015-01-05 16:54:27', 'Signed out of the system'),
(1072, 62, '2015-01-05 16:54:39', 'Logged Into the system'),
(1073, 62, '2015-01-05 16:57:05', 'Created labour cost matrix into the system '),
(1074, 62, '2015-01-05 16:57:28', 'Update labour matrix details into the system'),
(1075, 62, '2015-01-05 16:57:50', 'Update a preliminary job card task (40) into the system'),
(1076, 64, '2015-01-06 07:57:08', 'Logged Into the system'),
(1077, 64, '2015-01-06 08:26:23', 'Signed out of the system'),
(1078, 62, '2015-01-06 08:26:36', 'Logged Into the system'),
(1079, 65, '2015-01-06 09:11:00', 'Logged Into the system'),
(1080, 65, '2015-01-06 09:11:18', 'Finished a task in job card no 28 into the system '),
(1081, 65, '2015-01-06 09:11:28', 'Signed out of the system'),
(1082, 66, '2015-01-06 09:11:42', 'Logged Into the system'),
(1083, 66, '2015-01-06 09:12:01', 'Signed out of the system'),
(1084, 63, '2015-01-06 09:12:14', 'Logged Into the system'),
(1085, 63, '2015-01-06 09:12:28', 'Finished a task in job card no 28 into the system '),
(1086, 63, '2015-01-06 09:12:31', 'Signed out of the system'),
(1087, 62, '2015-01-06 09:12:47', 'Logged Into the system'),
(1088, 62, '2015-01-06 09:20:05', 'Created labour cost matrix into the system '),
(1089, 62, '2015-01-06 09:20:48', 'Update a preliminary job card task (76) into the system'),
(1090, 62, '2015-01-06 09:21:07', 'Update a preliminary job card task (38) into the system'),
(1091, 62, '2015-01-06 09:31:36', 'Deleted labour task from the system '),
(1092, 62, '2015-01-06 09:32:57', 'Update labour task Clutch Overhaul details into the system '),
(1093, 62, '2015-01-06 09:33:30', 'Update labour matrix details into the system'),
(1094, 62, '2015-01-06 09:34:33', 'Update labour matrix details into the system'),
(1095, 62, '2015-01-06 09:34:57', 'Update a preliminary job card task (76) into the system'),
(1096, 62, '2015-01-06 09:35:03', 'Update a preliminary job card task (38) into the system'),
(1097, 62, '2015-01-06 09:59:48', 'Update labour matrix details into the system'),
(1098, 62, '2015-01-06 10:00:45', 'Update a invoice task (38) into the system'),
(1099, 62, '2015-01-06 10:00:49', 'Update a invoice task (76) into the system'),
(1100, 62, '2015-01-06 10:19:20', 'Update labour matrix details into the system'),
(1101, 62, '2015-01-06 10:22:07', 'Added a booking for Jackson Muraya of vehicle others into the system'),
(1102, 62, '2015-01-06 10:23:27', 'Signed out of the system'),
(1103, 64, '2015-01-06 10:26:35', 'Logged Into the system'),
(1104, 64, '2015-01-06 10:29:35', 'Created an item Clutch plate  corolla 110 into the system'),
(1105, 64, '2015-01-06 10:31:13', 'Created an item Pressure plate corolla 110 into the system'),
(1106, 64, '2015-01-06 10:33:13', 'Created an item Oil Filter Probox petrol into the system'),
(1107, 64, '2015-01-06 10:34:44', 'Created an item Brake pads probox into the system'),
(1108, 64, '2015-01-06 10:44:01', 'Updated a item Clutch plate  corolla 110 details'),
(1109, 64, '2015-01-06 10:45:14', 'Updated a item Pressure plate corolla 110 details'),
(1110, 64, '2015-01-06 10:45:40', 'Updated a item Brake pads probox details'),
(1111, 64, '2015-01-06 10:45:49', 'Signed out of the system'),
(1112, 62, '2015-01-06 10:46:01', 'Logged Into the system'),
(1113, 62, '2015-01-06 10:47:07', 'Added a booking for Jackson Muraya of vehicle Others into the system'),
(1114, 62, '2015-01-06 10:51:11', 'Signed out of the system'),
(1115, 64, '2015-01-06 10:51:31', 'Logged Into the system'),
(1116, 64, '2015-01-06 10:53:12', 'Signed out of the system'),
(1117, 62, '2015-01-06 10:53:24', 'Logged Into the system'),
(1118, 62, '2015-01-06 10:53:48', 'Added more job card tasks (38) into the system'),
(1119, 62, '2015-01-06 10:55:58', 'Signed out of the system'),
(1120, 64, '2015-01-06 10:56:08', 'Logged Into the system'),
(1121, 64, '2015-01-06 12:25:02', 'Signed out of the system'),
(1122, 64, '2015-01-06 12:25:10', 'Logged Into the system'),
(1123, 64, '2015-01-06 12:56:27', 'Updated a item Air filter97402 details'),
(1124, 64, '2015-01-06 12:58:21', 'Updated a item Air filter47010 details'),
(1125, 64, '2015-01-06 12:58:54', 'Updated a item Air filter47010 details'),
(1126, 64, '2015-01-06 13:04:20', 'Created an item Air filter50060 into the system'),
(1127, 64, '2015-01-06 13:04:55', 'Updated a item Air filterMv188 details'),
(1128, 64, '2015-01-06 13:05:17', 'Updated a item Air filterMv266 details'),
(1129, 64, '2015-01-06 15:37:36', 'Signed out of the system'),
(1130, 62, '2015-01-06 15:37:48', 'Logged Into the system'),
(1131, 62, '2015-01-06 15:39:11', 'Added a booking for Long term view capital ltd of vehicle KBW 145L into the system'),
(1132, 62, '2015-01-06 15:40:17', 'Created an labour task Replace passenger lights into the system '),
(1133, 62, '2015-01-06 15:41:07', 'Signed out of the system'),
(1134, 65, '2015-01-06 15:41:55', 'Logged Into the system'),
(1135, 65, '2015-01-06 15:42:30', 'Clocked in a job card no 29 into the system '),
(1136, 65, '2015-01-06 15:43:06', 'Stopped a task in a job card no 29 into the system '),
(1137, 65, '2015-01-06 15:43:13', 'Signed out of the system'),
(1138, 66, '2015-01-06 15:46:17', 'Logged Into the system'),
(1139, 66, '2015-01-06 15:49:36', 'Clocked in a job card no 29 into the system '),
(1140, 66, '2015-01-06 15:56:33', 'Signed out of the system'),
(1141, 62, '2015-01-06 15:56:47', 'Logged Into the system'),
(1142, 62, '2015-01-06 15:57:11', 'Added more job card tasks (28) into the system'),
(1143, 62, '2015-01-06 15:57:15', 'Signed out of the system'),
(1144, 63, '2015-01-06 15:57:26', 'Logged Into the system'),
(1145, 63, '2015-01-06 15:57:39', 'Clocked in a job card no 29 into the system '),
(1146, 63, '2015-01-06 15:58:34', 'Signed out of the system'),
(1147, 62, '2015-01-06 15:58:54', 'Logged Into the system'),
(1148, 62, '2015-01-06 15:59:43', 'Created labour cost matrix into the system '),
(1149, 62, '2015-01-06 16:00:17', 'Signed out of the system'),
(1150, 66, '2015-01-06 16:00:27', 'Logged Into the system'),
(1151, 66, '2015-01-06 16:01:37', 'Finished a task in job card no 29 into the system '),
(1152, 66, '2015-01-06 16:01:47', 'Signed out of the system'),
(1153, 62, '2015-01-06 16:02:05', 'Logged Into the system'),
(1154, 62, '2015-01-06 16:02:21', 'Update a preliminary job card task (77) into the system'),
(1155, 62, '2015-01-06 16:26:06', 'Signed out of the system'),
(1156, 64, '2015-01-07 07:48:38', 'Logged Into the system'),
(1157, 64, '2015-01-07 07:48:39', 'Logged Into the system'),
(1158, 64, '2015-01-07 07:57:54', 'Updated a item Spark plugs 8H516 details'),
(1159, 64, '2015-01-07 08:01:32', 'Updated a item Spark plugs 8H516 details'),
(1160, 64, '2015-01-07 08:03:03', 'Logged Into the system'),
(1161, 64, '2015-01-07 08:50:32', 'Signed out of the system'),
(1162, 62, '2015-01-07 08:59:33', 'Logged Into the system'),
(1163, 64, '2015-01-07 12:27:30', 'Logged Into the system'),
(1164, 64, '2015-01-07 14:11:41', 'Logged Into the system'),
(1165, 64, '2015-01-07 15:20:00', 'Signed out of the system'),
(1166, 62, '2015-01-07 15:20:31', 'Logged Into the system'),
(1167, 62, '2015-01-07 15:22:18', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBY 755G into the system'),
(1168, 62, '2015-01-07 15:25:52', 'Signed out of the system'),
(1169, 66, '2015-01-07 15:26:42', 'Logged Into the system'),
(1170, 66, '2015-01-07 15:27:42', 'Clocked in a job card no 30 into the system '),
(1171, 66, '2015-01-07 15:28:11', 'Signed out of the system'),
(1172, 65, '2015-01-07 15:35:16', 'Logged Into the system'),
(1173, 65, '2015-01-07 15:36:13', 'Clocked in a job card no 30 into the system '),
(1174, 65, '2015-01-07 15:36:27', 'Resumed a task in a job card no 29 into the system '),
(1175, 65, '2015-01-07 15:37:03', 'Finished a task in job card no 29 into the system '),
(1176, 65, '2015-01-07 15:50:02', 'Signed out of the system'),
(1177, 66, '2015-01-07 15:50:17', 'Logged Into the system'),
(1178, 66, '2015-01-07 15:51:18', 'Stopped a task in a job card no 30 into the system '),
(1179, 66, '2015-01-07 15:52:18', 'Resumed a task in a job card no 30 into the system '),
(1180, 66, '2015-01-07 15:52:41', 'Finished a task in job card no 30 into the system '),
(1181, 66, '2015-01-07 15:54:21', 'Signed out of the system'),
(1182, 62, '2015-01-07 16:39:54', 'Logged Into the system'),
(1183, 62, '2015-01-07 16:40:04', 'Deleted Job Card Task from the system'),
(1184, 62, '2015-01-07 16:49:39', 'Signed out of the system'),
(1185, 62, '2015-01-08 08:33:46', 'Logged Into the system'),
(1186, 62, '2015-01-08 09:15:13', 'Created an labour task Draglink labour into the system '),
(1187, 62, '2015-01-08 09:18:28', 'Created labour cost matrix into the system '),
(1188, 62, '2015-01-08 09:19:22', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBY 755G into the system'),
(1189, 62, '2015-01-08 09:20:08', 'Added more job card tasks (78) into the system'),
(1190, 66, '2015-01-08 09:33:47', 'Logged Into the system'),
(1191, 66, '2015-01-08 09:36:48', 'Clocked in a job card no 31 into the system '),
(1192, 66, '2015-01-08 09:37:22', 'Stopped a task in a job card no 31 into the system '),
(1193, 66, '2015-01-08 09:37:29', 'Signed out of the system'),
(1194, 62, '2015-01-08 10:41:01', 'Logged Into the system'),
(1195, 62, '2015-01-08 10:48:11', 'Signed out of the system'),
(1196, 62, '2015-01-08 11:57:25', 'Logged Into the system'),
(1197, 62, '2015-01-08 11:58:05', 'Signed out of the system'),
(1198, 64, '2015-01-08 12:13:26', 'Logged Into the system'),
(1199, 64, '2015-01-08 12:15:23', 'Updated a item indicator bulb 24v details'),
(1200, 64, '2015-01-08 12:16:53', 'Updated a item indicator bulb single 24v details'),
(1201, 64, '2015-01-08 12:18:34', 'Updated a item indicator bulb double 12v details'),
(1202, 64, '2015-01-08 12:19:11', 'Updated a item indicator bulb single 24v details'),
(1203, 64, '2015-01-08 12:31:35', 'Signed out of the system'),
(1204, 62, '2015-01-08 12:31:45', 'Logged Into the system'),
(1205, 62, '2015-01-08 12:32:33', 'Signed out of the system'),
(1206, 64, '2015-01-08 12:35:46', 'Logged Into the system'),
(1207, 64, '2015-01-08 12:45:48', 'Created an item horn relay into the system'),
(1208, 64, '2015-01-08 13:19:34', 'Updated a item Kingpin details'),
(1209, 64, '2015-01-08 14:37:40', 'Signed out of the system'),
(1210, 66, '2015-01-08 14:37:56', 'Logged Into the system'),
(1211, 66, '2015-01-08 14:38:50', 'Resumed a task in a job card no 31 into the system '),
(1212, 66, '2015-01-08 15:29:02', 'Finished a task in job card no 31 into the system '),
(1213, 66, '2015-01-08 15:30:42', 'Signed out of the system'),
(1214, 64, '2015-01-08 15:30:53', 'Logged Into the system'),
(1215, 64, '2015-01-08 15:31:06', 'Signed out of the system'),
(1216, 62, '2015-01-08 15:31:19', 'Logged Into the system'),
(1217, 62, '2015-01-08 15:37:21', 'Signed out of the system'),
(1218, 64, '2015-01-08 15:39:32', 'Logged Into the system'),
(1219, 64, '2015-01-08 15:44:45', 'Signed out of the system'),
(1220, 64, '2015-01-08 15:45:02', 'Logged Into the system'),
(1221, 64, '2015-01-08 15:52:15', 'Created an item RADIO into the system'),
(1222, 64, '2015-01-08 16:09:30', 'Created an item battery into the system'),
(1223, 62, '2015-01-08 17:00:08', 'Logged Into the system'),
(1224, 62, '2015-01-08 17:09:43', 'Logged Into the system'),
(1225, 62, '2015-01-08 17:12:30', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBZ 348B into the system'),
(1226, 0, '2015-01-08 17:16:03', 'Update a booking for Team Fergie Transporters Ltd of vehicle KBZ 348B into the system'),
(1227, 0, '2015-01-08 17:21:16', 'Update a booking for Team Fergie Transporters Ltd of vehicle KBZ 348B into the system'),
(1228, 62, '2015-01-08 17:21:28', 'Deleted Job Card Task from the system'),
(1229, 62, '2015-01-08 17:21:38', 'Signed out of the system'),
(1230, 66, '2015-01-08 17:21:50', 'Logged Into the system'),
(1231, 66, '2015-01-08 17:22:06', 'Clocked in a job card no 32 into the system '),
(1232, 66, '2015-01-08 17:31:49', 'Finished a task in job card no 32 into the system '),
(1233, 66, '2015-01-08 17:36:42', 'Signed out of the system'),
(1234, 62, '2015-01-09 08:13:39', 'Logged Into the system'),
(1235, 62, '2015-01-09 08:24:53', 'Signed out of the system'),
(1236, 64, '2015-01-09 08:25:01', 'Logged Into the system'),
(1237, 62, '2015-01-09 08:55:17', 'Logged Into the system'),
(1238, 62, '2015-01-09 08:56:35', 'Added a booking for Long term view capital ltd of vehicle KBW 145L into the system'),
(1239, 62, '2015-01-09 08:57:13', 'Created an labour task repair exhaust gasket into the system '),
(1240, 62, '2015-01-09 08:57:39', 'Created labour cost matrix into the system '),
(1241, 64, '2015-01-09 09:52:07', 'Logged Into the system'),
(1242, 64, '2015-01-09 10:16:43', 'Logged Into the system'),
(1243, 64, '2015-01-09 10:54:16', 'Created an item Oil seal inner into the system'),
(1244, 64, '2015-01-09 13:37:49', 'Updated a item RADIO details'),
(1245, 64, '2015-01-09 13:38:52', 'Updated a item Kingpin details'),
(1246, 64, '2015-01-09 13:39:12', 'Updated a item horn relay details'),
(1247, 64, '2015-01-09 13:49:28', 'Created an item Fuel Filterz700 into the system'),
(1248, 64, '2015-01-09 13:50:44', 'Created an item Oil Filter6DBOB-0309-A into the system'),
(1249, 64, '2015-01-09 13:52:08', 'Created an item Air Cleaner NQR into the system'),
(1250, 64, '2015-01-09 13:52:53', 'Updated a item Oil Filter6DBOB-0309-A details'),
(1251, 64, '2015-01-09 13:57:29', 'Updated a item Oil Filter6DBOB-0309-A details'),
(1252, 64, '2015-01-09 16:37:14', 'Updated a item Oil Filter6DBOB-0309-A details'),
(1253, 64, '2015-01-09 16:44:42', 'Signed out of the system'),
(1254, 64, '2015-01-09 17:17:56', 'Logged Into the system'),
(1255, 64, '2015-01-09 17:30:46', 'Created an item Brake padsKD2718 into the system'),
(1256, 64, '2015-01-09 17:32:10', 'Created an item Brake padsKD2780 into the system'),
(1257, 64, '2015-01-09 17:32:49', 'Created an item Brake padsKD2701 into the system'),
(1258, 64, '2015-01-10 08:09:51', 'Logged Into the system'),
(1259, 64, '2015-01-10 08:11:49', 'Created an item tie rod end into the system'),
(1260, 64, '2015-01-10 08:12:40', 'Created an item drah links into the system'),
(1261, 64, '2015-01-10 08:14:00', 'Updated a item head light helogen 24v details'),
(1262, 64, '2015-01-10 08:15:09', 'Updated a item head light helogen 24v details'),
(1263, 64, '2015-01-10 08:19:19', 'Updated a item head light helogen 24v details'),
(1264, 64, '2015-01-10 08:20:25', 'Created an item Brake padsKD2725 into the system'),
(1265, 64, '2015-01-10 08:21:06', 'Created an item Brake padsKD2203 into the system'),
(1266, 64, '2015-01-10 08:22:26', 'Updated a item Brake padsKD2725 details'),
(1267, 64, '2015-01-10 08:23:48', 'Created an item Brake padsKD2208 into the system'),
(1268, 64, '2015-01-10 08:25:51', 'Created an item Brake padsKD2798 into the system'),
(1269, 64, '2015-01-10 08:26:36', 'Created an item Brake padsKD2740 into the system'),
(1270, 64, '2015-01-10 08:27:31', 'Created an item Brake padsKD2457 into the system'),
(1271, 64, '2015-01-10 08:28:07', 'Created an item Brake padsKD1740 into the system'),
(1272, 64, '2015-01-10 08:28:59', 'Created an item Brake padsKD2739 into the system'),
(1273, 64, '2015-01-10 08:29:30', 'Created an item Brake padsKD2776 into the system'),
(1274, 64, '2015-01-10 08:30:12', 'Created an item Brake padsKD1739 into the system'),
(1275, 64, '2015-01-10 08:30:41', 'Created an item Brake padsKD1735 into the system'),
(1276, 64, '2015-01-10 08:31:11', 'Created an item Brake padsKD2606/07 into the system'),
(1277, 64, '2015-01-10 08:31:50', 'Created an item Brake padsGDB7075S into the system'),
(1278, 64, '2015-01-10 08:37:58', 'Signed out of the system'),
(1279, 62, '2015-01-10 08:38:21', 'Logged Into the system'),
(1280, 62, '2015-01-10 08:40:18', 'Added more job card tasks (22) into the system'),
(1281, 62, '2015-01-10 08:41:22', 'Added more job card tasks (26) into the system'),
(1282, 62, '2015-01-10 08:42:29', 'Added more job card tasks (32) into the system'),
(1283, 62, '2015-01-10 08:44:37', 'Deleted Job Card Task from the system'),
(1284, 62, '2015-01-10 08:47:12', 'Created an labour task repair suspension system into the system '),
(1285, 62, '2015-01-10 08:48:30', 'Created labour cost matrix into the system '),
(1286, 62, '2015-01-10 08:49:13', 'Added more job card tasks (80) into the system'),
(1287, 62, '2015-01-10 08:50:50', 'Signed out of the system'),
(1288, 64, '2015-01-10 08:51:04', 'Logged Into the system'),
(1289, 64, '2015-01-10 08:52:51', 'Updated a item drag links details'),
(1290, 64, '2015-01-10 10:01:09', 'Signed out of the system'),
(1291, 62, '2015-01-10 10:01:23', 'Logged Into the system'),
(1292, 62, '2015-01-10 10:05:34', 'Signed out of the system'),
(1293, 64, '2015-01-10 10:05:47', 'Logged Into the system'),
(1294, 64, '2015-01-10 10:14:38', 'Created an item battery water into the system'),
(1295, 64, '2015-01-10 10:16:36', 'Created an item ENGINE OIL10LTRS into the system'),
(1296, 64, '2015-01-10 10:20:16', 'Signed out of the system'),
(1297, 62, '2015-01-10 10:20:27', 'Logged Into the system'),
(1298, 62, '2015-01-10 10:38:47', 'Added a booking for Engen petrol station of vehicle KAM 457U into the system'),
(1299, 62, '2015-01-10 10:39:34', 'Created an labour task Drain diesel  into the system '),
(1300, 62, '2015-01-10 10:40:13', 'Created labour cost matrix into the system '),
(1301, 0, '2015-01-10 10:45:06', 'Update a booking for Engen petrol station of vehicle KAM 457U into the system'),
(1302, 62, '2015-01-10 10:56:43', 'Added more job card tasks (47) into the system'),
(1303, 62, '2015-01-10 11:02:49', 'Update labour matrix details into the system'),
(1304, 62, '2015-01-10 11:38:49', 'Added a booking for Omwanza Ombati of vehicle KCA 020R into the system'),
(1305, 62, '2015-01-10 11:39:21', 'Signed out of the system'),
(1306, 66, '2015-01-10 11:41:02', 'Logged Into the system'),
(1307, 66, '2015-01-10 11:41:59', 'Clocked in a job card no 35 into the system '),
(1308, 66, '2015-01-10 11:58:43', 'Signed out of the system'),
(1309, 62, '2015-01-10 11:59:04', 'Logged Into the system'),
(1310, 0, '2015-01-10 12:06:30', 'Update a booking for Omwanza Ombati of vehicle KCA 020R into the system'),
(1311, 62, '2015-01-10 12:06:41', 'Update a preliminary job card task (54) into the system'),
(1312, 62, '2015-01-10 12:07:41', 'Update labour matrix details into the system'),
(1313, 62, '2015-01-10 12:08:24', 'Update labour matrix details into the system'),
(1314, 62, '2015-01-10 12:09:09', 'Added More customer belonging () into the system'),
(1315, 62, '2015-01-10 12:09:32', 'Update a customer belonging (2 jackets) into the system');
INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1316, 62, '2015-01-10 12:09:51', 'Added More customer belonging () into the system'),
(1317, 62, '2015-01-10 12:10:03', 'Update a customer belonging (magazine) into the system'),
(1318, 62, '2015-01-10 12:10:12', 'Update a preliminary job card task (54) into the system'),
(1319, 62, '2015-01-10 12:11:17', 'Signed out of the system'),
(1320, 64, '2015-01-10 12:11:31', 'Logged Into the system'),
(1321, 64, '2015-01-10 12:14:03', 'Signed out of the system'),
(1322, 62, '2015-01-10 12:14:15', 'Logged Into the system'),
(1323, 62, '2015-01-10 12:33:59', 'Added more job card tasks (22) into the system'),
(1324, 62, '2015-01-10 12:34:40', 'Update a preliminary job card task (22) into the system'),
(1325, 62, '2015-01-10 12:34:49', 'Deleted Job Card Task from the system'),
(1326, 62, '2015-01-10 12:39:21', 'Signed out of the system'),
(1327, 66, '2015-01-10 12:39:43', 'Logged Into the system'),
(1328, 66, '2015-01-10 12:40:24', 'Finished a task in job card no 35 into the system '),
(1329, 66, '2015-01-10 12:40:44', 'Signed out of the system'),
(1330, 62, '2015-01-10 12:40:55', 'Logged Into the system'),
(1331, 0, '2015-01-10 12:43:43', 'Update a booking for Omwanza Ombati of vehicle KCA 020R into the system'),
(1332, 64, '2015-01-10 16:54:02', 'Logged Into the system'),
(1333, 64, '2015-01-10 17:03:24', 'Updated a item Oil seal inner details'),
(1334, 64, '2015-01-10 17:03:57', 'Created an item Oil seal outer into the system'),
(1335, 64, '2015-01-10 17:09:21', 'Created an item Bearing rear outer into the system'),
(1336, 64, '2015-01-10 17:11:06', 'Created an item Bearing rear inner into the system'),
(1337, 64, '2015-01-10 17:13:15', 'Created an item bearing front inner into the system'),
(1338, 64, '2015-01-10 17:14:02', 'Created an item bearing front outer into the system'),
(1339, 64, '2015-01-11 08:29:34', 'Created an item Brake padsKD2607 into the system'),
(1340, 64, '2015-01-11 08:30:26', 'Created an item Brake pads liningX288 into the system'),
(1341, 64, '2015-01-11 08:31:48', 'Created an item Brake pads lining2342 into the system'),
(1342, 64, '2015-01-11 08:33:08', 'Created an item Brake pads liningGDB7075S into the system'),
(1343, 64, '2015-01-11 08:34:03', 'Created an item Brake pads liningNQR into the system'),
(1344, 64, '2015-01-11 08:36:03', 'Created an item Brake lining ProboxBS-K2358 into the system'),
(1345, 64, '2015-01-11 08:36:38', 'Updated a item Brake lining ProboxBS-K2358 details'),
(1346, 64, '2015-01-11 08:36:54', 'Updated a item Brake lining ProboxBS-K2358 details'),
(1347, 64, '2015-01-11 08:37:32', 'Updated a item Air Cleaner NQR details'),
(1348, 64, '2015-01-11 08:38:28', 'Updated a item Brake  liningNQR details'),
(1349, 64, '2015-01-11 08:39:30', 'deleted an item from the system'),
(1350, 64, '2015-01-11 08:39:59', 'Updated a item Brake padsGDB7075S details'),
(1351, 64, '2015-01-11 08:40:39', 'Updated a item Brake pads liningAK2342 details'),
(1352, 64, '2015-01-11 08:41:12', 'Updated a item Brake pads liningX288 details'),
(1353, 64, '2015-01-11 08:41:53', 'Updated a item Brake padsKD2607 details'),
(1354, 64, '2015-01-11 08:42:37', 'Updated a item Brake padsKD1735 details'),
(1355, 64, '2015-01-11 08:42:56', 'Updated a item Brake padsKD1739 details'),
(1356, 64, '2015-01-11 08:43:24', 'Updated a item Brake padsKD2776 details'),
(1357, 64, '2015-01-11 08:43:47', 'Updated a item Brake padsKD2739 details'),
(1358, 64, '2015-01-11 08:44:17', 'Updated a item Brake padsKD1740 details'),
(1359, 64, '2015-01-11 08:44:39', 'Updated a item Brake padsKD2457 details'),
(1360, 64, '2015-01-11 08:44:59', 'Updated a item Brake padsKD2740 details'),
(1361, 64, '2015-01-11 08:45:21', 'Updated a item Brake padsKD2798 details'),
(1362, 64, '2015-01-11 08:45:43', 'Updated a item Brake padsKD2208 details'),
(1363, 64, '2015-01-11 08:46:04', 'Updated a item Brake padsKD2203 details'),
(1364, 64, '2015-01-11 08:46:38', 'Updated a item Brake padsKD2725 details'),
(1365, 64, '2015-01-11 08:46:57', 'Updated a item Brake padsKD2701 details'),
(1366, 64, '2015-01-11 08:47:21', 'Updated a item Brake padsKD2780 details'),
(1367, 64, '2015-01-11 08:50:45', 'Updated a item Oil Filter6DBOB-0309-A details'),
(1368, 64, '2015-01-12 08:37:33', 'Logged Into the system'),
(1369, 64, '2015-01-12 08:39:56', 'Signed out of the system'),
(1370, 62, '2015-01-12 08:40:16', 'Logged Into the system'),
(1371, 62, '2015-01-12 08:41:05', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBL 145L into the system'),
(1372, 62, '2015-01-12 08:43:36', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBY 754G into the system'),
(1373, 62, '2015-01-12 08:46:17', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBV 863F into the system'),
(1374, 62, '2015-01-12 08:48:55', 'Added a booking for Team Fergie Transporters Ltd of vehicle KBW 599Z into the system'),
(1375, 62, '2015-01-12 08:50:38', 'Added a booking for Long term view capital ltd of vehicle KBY 756G into the system'),
(1376, 62, '2015-01-12 08:52:09', 'Added a booking for Long term view capital ltd of vehicle KBW 145L into the system'),
(1377, 62, '2015-01-12 08:52:56', 'Signed out of the system'),
(1378, 66, '2015-01-12 08:53:04', 'Logged Into the system'),
(1379, 66, '2015-01-12 08:53:28', 'Clocked in a job card no 41 into the system '),
(1380, 66, '2015-01-12 08:53:42', 'Clocked in a job card no 40 into the system '),
(1381, 66, '2015-01-12 08:53:51', 'Clocked in a job card no 39 into the system '),
(1382, 66, '2015-01-12 08:54:01', 'Clocked in a job card no 38 into the system '),
(1383, 66, '2015-01-12 08:54:13', 'Clocked in a job card no 36 into the system '),
(1384, 66, '2015-01-12 08:54:25', 'Clocked in a job card no 31 into the system '),
(1385, 66, '2015-01-12 08:54:36', 'Signed out of the system'),
(1386, 65, '2015-01-12 08:54:48', 'Logged Into the system'),
(1387, 65, '2015-01-12 08:55:11', 'Clocked in a job card no 41 into the system '),
(1388, 65, '2015-01-12 08:55:31', 'Clocked in a job card no 40 into the system '),
(1389, 65, '2015-01-12 08:55:40', 'Clocked in a job card no 40 into the system '),
(1390, 65, '2015-01-12 08:55:57', 'Clocked in a job card no 39 into the system '),
(1391, 65, '2015-01-12 08:56:10', 'Clocked in a job card no 38 into the system '),
(1392, 65, '2015-01-12 08:56:19', 'Clocked in a job card no 37 into the system '),
(1393, 65, '2015-01-12 08:56:29', 'Clocked in a job card no 37 into the system '),
(1394, 65, '2015-01-12 08:56:35', 'Signed out of the system'),
(1395, 64, '2015-01-12 08:56:49', 'Logged Into the system'),
(1396, 64, '2015-01-12 09:16:12', 'Signed out of the system'),
(1397, 63, '2015-01-12 09:16:23', 'Logged Into the system'),
(1398, 63, '2015-01-12 09:16:35', 'Clocked in a job card no 39 into the system '),
(1399, 63, '2015-01-12 09:16:42', 'Clocked in a job card no 38 into the system '),
(1400, 63, '2015-01-12 09:16:50', 'Clocked in a job card no 37 into the system '),
(1401, 63, '2015-01-12 09:16:58', 'Clocked in a job card no 36 into the system '),
(1402, 63, '2015-01-12 09:17:14', 'Signed out of the system'),
(1403, 62, '2015-01-12 09:17:25', 'Logged Into the system'),
(1404, 62, '2015-01-12 09:26:33', 'Update a preliminary job card task (38) into the system'),
(1405, 62, '2015-01-12 09:26:35', 'Signed out of the system'),
(1406, 63, '2015-01-12 09:26:46', 'Logged Into the system'),
(1407, 63, '2015-01-12 09:26:59', 'Signed out of the system'),
(1408, 62, '2015-01-12 11:12:22', 'Logged Into the system'),
(1409, 62, '2015-01-12 11:12:57', 'Signed out of the system'),
(1410, 64, '2015-01-12 11:13:16', 'Logged Into the system'),
(1411, 64, '2015-01-12 11:13:32', 'Signed out of the system'),
(1412, 62, '2015-01-12 11:13:43', 'Logged Into the system'),
(1413, 62, '2015-01-12 11:14:16', 'Signed out of the system'),
(1414, 64, '2015-01-12 11:14:24', 'Logged Into the system'),
(1415, 64, '2015-01-12 11:15:16', 'Signed out of the system'),
(1416, 62, '2015-01-12 11:15:31', 'Logged Into the system'),
(1417, 62, '2015-01-12 11:16:01', 'Signed out of the system'),
(1418, 64, '2015-01-12 11:16:09', 'Logged Into the system'),
(1419, 64, '2015-01-12 11:45:03', 'Signed out of the system'),
(1420, 62, '2015-01-12 11:45:13', 'Logged Into the system'),
(1421, 62, '2015-01-12 11:46:57', 'Deleted Job Card Task from the system'),
(1422, 62, '2015-01-12 11:47:55', 'Deleted Job Card Task from the system'),
(1423, 62, '2015-01-12 11:48:35', 'Deleted Job Card Task from the system'),
(1424, 62, '2015-01-12 11:49:08', 'Added more job card tasks (33) into the system'),
(1425, 62, '2015-01-12 11:50:12', 'Deleted Job Card Task from the system'),
(1426, 62, '2015-01-12 11:51:22', 'Deleted Job Card Task from the system'),
(1427, 62, '2015-01-12 11:51:38', 'Update a preliminary job card task (47) into the system'),
(1428, 62, '2015-01-12 11:52:14', 'Signed out of the system'),
(1429, 63, '2015-01-12 11:52:23', 'Logged Into the system'),
(1430, 63, '2015-01-12 11:52:41', 'Finished a task in job card no 39 into the system '),
(1431, 63, '2015-01-12 11:52:56', 'Finished a task in job card no 37 into the system '),
(1432, 63, '2015-01-12 11:53:08', 'Finished a task in job card no 36 into the system '),
(1433, 63, '2015-01-12 11:53:16', 'Signed out of the system'),
(1434, 66, '2015-01-12 11:53:26', 'Logged Into the system'),
(1435, 66, '2015-01-12 11:53:40', 'Finished a task in job card no 40 into the system '),
(1436, 66, '2015-01-12 11:53:49', 'Finished a task in job card no 38 into the system '),
(1437, 66, '2015-01-12 11:54:00', 'Finished a task in job card no 36 into the system '),
(1438, 66, '2015-01-12 11:54:18', 'Finished a task in job card no 31 into the system '),
(1439, 66, '2015-01-12 11:54:21', 'Signed out of the system'),
(1440, 65, '2015-01-12 11:54:29', 'Logged Into the system'),
(1441, 65, '2015-01-12 11:54:45', 'Clocked in a job card no 38 into the system '),
(1442, 65, '2015-01-12 11:55:00', 'Finished a task in job card no 40 into the system '),
(1443, 65, '2015-01-12 11:55:14', 'Finished a task in job card no 39 into the system '),
(1444, 65, '2015-01-12 11:55:25', 'Finished a task in job card no 38 into the system '),
(1445, 65, '2015-01-12 11:55:38', 'Finished a task in job card no 37 into the system '),
(1446, 65, '2015-01-12 11:55:57', 'Finished a task in job card no 30 into the system '),
(1447, 65, '2015-01-12 11:56:05', 'Signed out of the system'),
(1448, 62, '2015-01-12 11:56:17', 'Logged Into the system'),
(1449, 67, '2015-01-12 12:27:38', 'Logged Into the system'),
(1450, 67, '2015-01-12 12:30:42', 'Signed out of the system'),
(1451, 69, '2015-01-12 12:30:57', 'Logged Into the system'),
(1452, 69, '2015-01-12 12:39:48', 'Signed out of the system'),
(1453, 69, '2015-01-12 13:32:40', 'Logged Into the system'),
(1454, 69, '2015-01-12 13:50:12', 'Signed out of the system'),
(1455, 66, '2015-01-12 13:50:39', 'Logged Into the system'),
(1456, 69, '2015-01-12 13:56:25', 'Logged Into the system'),
(1457, 69, '2015-01-12 14:11:08', 'Signed out of the system'),
(1458, 66, '2015-01-12 14:18:15', 'Logged Into the system'),
(1459, 66, '2015-01-12 14:19:14', 'Stopped a task in a job card no 41 into the system '),
(1460, 66, '2015-01-12 15:19:04', 'Signed out of the system'),
(1461, 62, '2015-01-12 15:23:28', 'Logged Into the system'),
(1462, 62, '2015-01-12 15:24:41', 'Update a invoice parts details into the system'),
(1463, 62, '2015-01-12 15:28:06', 'Signed out of the system'),
(1464, 66, '2015-01-12 15:28:14', 'Logged Into the system'),
(1465, 66, '2015-01-12 15:28:20', 'Resumed a task in a job card no 41 into the system '),
(1466, 66, '2015-01-12 15:28:40', 'Signed out of the system'),
(1467, 62, '2015-01-12 15:28:57', 'Logged Into the system'),
(1468, 62, '2015-01-12 15:44:09', 'Logged Into the system'),
(1469, 62, '2015-01-12 15:52:33', 'Signed out of the system'),
(1470, 64, '2015-01-12 15:52:43', 'Logged Into the system'),
(1471, 64, '2015-01-12 16:22:14', 'Signed out of the system'),
(1472, 69, '2015-01-12 16:22:29', 'Logged Into the system'),
(1473, 69, '2015-01-12 16:24:37', 'Signed out of the system'),
(1474, 69, '2015-01-12 16:28:34', 'Logged Into the system'),
(1475, 69, '2015-01-12 16:36:38', 'Signed out of the system'),
(1476, 66, '2015-01-12 16:36:57', 'Logged Into the system'),
(1477, 66, '2015-01-12 16:37:16', 'Finished a task in job card no 41 into the system '),
(1478, 66, '2015-01-12 16:37:23', 'Signed out of the system'),
(1479, 63, '2015-01-12 16:37:33', 'Logged Into the system'),
(1480, 63, '2015-01-12 16:37:45', 'Finished a task in job card no 41 into the system '),
(1481, 63, '2015-01-12 16:37:47', 'Signed out of the system'),
(1482, 69, '2015-01-12 16:38:25', 'Logged Into the system'),
(1483, 69, '2015-01-12 16:41:16', 'Signed out of the system'),
(1484, 64, '2015-01-12 16:41:46', 'Logged Into the system'),
(1485, 64, '2015-01-12 16:43:30', 'Updated a item Clutch plate  details'),
(1486, 64, '2015-01-12 16:50:16', 'Signed out of the system'),
(1487, 62, '2015-01-12 16:51:10', 'Logged Into the system'),
(1488, 62, '2015-01-12 16:52:29', 'Created labour cost matrix into the system '),
(1489, 62, '2015-01-12 16:52:59', 'Created labour cost matrix into the system '),
(1490, 62, '2015-01-12 16:53:24', 'Created labour cost matrix into the system '),
(1491, 62, '2015-01-12 16:55:43', 'Update a preliminary job card task (70) into the system'),
(1492, 62, '2015-01-12 17:05:32', 'Signed out of the system'),
(1493, 64, '2015-01-13 09:37:58', 'Logged Into the system'),
(1494, 64, '2015-01-13 09:38:45', 'Signed out of the system'),
(1495, 62, '2015-01-13 09:39:29', 'Logged Into the system'),
(1496, 62, '2015-01-13 09:40:27', 'Signed out of the system'),
(1497, 64, '2015-01-13 09:40:35', 'Logged Into the system'),
(1498, 64, '2015-01-13 10:35:17', 'Signed out of the system'),
(1499, 19, '2015-01-13 10:35:29', 'Logged Into the system'),
(1500, 19, '2015-01-13 15:30:38', 'Signed out of the system'),
(1501, 19, '2015-01-13 15:30:47', 'Logged Into the system'),
(1502, 19, '2015-01-13 15:31:04', 'Signed out of the system'),
(1503, 19, '2015-01-13 15:31:10', 'Logged Into the system'),
(1504, 19, '2015-01-13 15:31:40', 'Signed out of the system'),
(1505, 19, '2015-01-13 15:31:48', 'Logged Into the system'),
(1506, 19, '2015-01-13 15:58:03', 'Signed out of the system'),
(1507, 19, '2015-01-13 15:58:10', 'Logged Into the system'),
(1508, 19, '2015-01-13 16:05:06', 'Deleted Invoice Item from the system'),
(1509, 19, '2015-01-13 16:09:52', 'Deleted Invoice Task from the system'),
(1510, 19, '2015-01-14 03:10:01', 'Added a booking for Engen petrol station of vehicle n/a into the system'),
(1511, 162, '2015-01-14 05:06:02', 'Signed out of the system'),
(1512, 19, '2015-01-14 05:06:13', 'Logged Into the system'),
(1513, 19, '2015-01-14 07:13:36', 'Added more lpo items into the system'),
(1514, 19, '2015-01-14 07:16:00', 'Added more lpo items into the system'),
(1515, 19, '2015-01-14 07:16:29', 'Added more lpo items into the system'),
(1516, 19, '2015-01-14 07:31:17', 'Added more lpo items into the system'),
(1517, 19, '2015-01-14 08:08:25', 'Updated Sub Module Details'),
(1518, 19, '2015-01-14 08:08:26', 'Updated Sub Module Details'),
(1519, 19, '2015-01-14 09:12:51', 'Signed out of the system'),
(1520, 19, '2015-01-14 13:08:52', 'Logged Into the system'),
(1521, 19, '2015-01-14 13:10:17', 'Signed out of the system'),
(1522, 19, '2015-01-14 13:10:36', 'Logged Into the system'),
(1523, 19, '2015-01-14 13:11:06', 'Signed out of the system'),
(1524, 66, '2015-01-14 13:11:13', 'Logged Into the system'),
(1525, 66, '2015-01-14 14:47:36', 'Signed out of the system'),
(1526, 66, '2015-01-14 14:47:51', 'Logged Into the system'),
(1527, 66, '2015-01-14 14:48:06', 'Signed out of the system'),
(1528, 19, '2015-01-14 14:48:11', 'Logged Into the system'),
(1529, 19, '2015-01-15 04:17:32', 'Logged Into the system'),
(1530, 162, '2015-01-15 04:43:19', 'Updated Sub Module Details'),
(1531, 162, '2015-01-15 05:05:59', 'Signed out of the system'),
(1532, 19, '2015-01-15 05:06:06', 'Logged Into the system'),
(1533, 19, '2015-01-15 07:19:09', 'Updated Sub Module Details'),
(1534, 19, '2015-01-15 07:20:34', 'Updated Sub Module Details'),
(1535, 19, '2015-01-15 15:19:11', 'Logged Into the system'),
(1536, 19, '2015-01-15 16:11:09', 'Added a booking for Engen petrol station of vehicle n/a into the system'),
(1537, 19, '2015-01-16 09:32:55', 'Logged Into the system'),
(1538, 19, '2015-01-16 09:35:03', 'Signed out of the system'),
(1539, 62, '2015-01-16 09:35:12', 'Logged Into the system'),
(1540, 62, '2015-01-16 09:35:29', 'Added a booking for Jackson Muraya of vehicle others into the system'),
(1541, 62, '2015-01-16 09:36:22', 'Signed out of the system'),
(1542, 64, '2015-01-16 09:36:34', 'Logged Into the system'),
(1543, 64, '2015-01-16 09:37:32', 'Signed out of the system'),
(1544, 19, '2015-01-16 09:37:47', 'Logged Into the system'),
(1545, 19, '2015-01-16 09:39:09', 'Signed out of the system'),
(1546, 63, '2015-01-16 09:39:20', 'Logged Into the system'),
(1547, 63, '2015-01-16 09:39:34', 'Clocked in a job card no 42 into the system '),
(1548, 63, '2015-01-16 09:39:43', 'Finished a task in job card no 42 into the system '),
(1549, 63, '2015-01-16 09:39:47', 'Signed out of the system'),
(1550, 62, '2015-01-16 09:39:55', 'Logged Into the system'),
(1551, 62, '2015-01-16 09:41:04', 'Signed out of the system'),
(1552, 64, '2015-01-16 09:41:12', 'Logged Into the system'),
(1553, 64, '2015-01-16 09:42:20', 'Signed out of the system'),
(1554, 62, '2015-01-16 09:42:30', 'Logged Into the system'),
(1555, 62, '2015-01-16 09:49:13', 'Signed out of the system'),
(1556, 19, '2015-01-16 09:49:21', 'Logged Into the system'),
(1557, 19, '2015-01-16 09:49:43', 'Signed out of the system'),
(1558, 19, '2015-01-16 09:49:51', 'Logged Into the system'),
(1559, 19, '2015-01-16 09:49:57', 'Signed out of the system'),
(1560, 69, '2015-01-16 09:50:03', 'Logged Into the system'),
(1561, 69, '2015-01-16 10:18:28', 'Signed out of the system'),
(1562, 19, '2015-01-16 10:18:34', 'Logged Into the system'),
(1563, 19, '2015-01-16 10:19:04', 'Signed out of the system'),
(1564, 62, '2015-01-16 10:19:15', 'Logged Into the system'),
(1565, 62, '2015-01-16 10:28:52', 'Signed out of the system'),
(1566, 69, '2015-01-16 10:29:03', 'Logged Into the system'),
(1567, 69, '2015-01-16 10:48:16', 'Signed out of the system'),
(1568, 19, '2015-01-16 10:48:22', 'Logged Into the system'),
(1569, 1, '2015-01-18 02:38:43', 'Signed out of the system'),
(1570, 19, '2015-01-18 02:38:53', 'Logged Into the system'),
(1571, 19, '2015-01-18 05:08:45', 'Updated Sub Module Details'),
(1572, 19, '2015-01-18 06:44:43', 'Updated Sub Module Details'),
(1573, 19, '2015-01-18 06:45:01', 'Updated Sub Module Details'),
(1574, 19, '2015-01-18 06:48:00', 'Updated Sub Module Details'),
(1575, 19, '2015-01-19 15:33:57', 'Updated Sub Module Details'),
(1576, 19, '2015-01-19 15:35:04', 'Updated Sub Module Details'),
(1577, 19, '2015-01-19 15:35:57', 'Updated Sub Module Details'),
(1578, 19, '2015-01-19 16:38:38', 'Updated Sub Module Details'),
(1579, 19, '2015-01-19 20:57:04', 'Logged Into the system'),
(1580, 19, '2015-01-20 03:55:25', 'Created a deduction type NSSF into the system '),
(1581, 19, '2015-01-20 04:13:39', 'Created a benefit type House Allowance into the system '),
(1582, 19, '2015-01-20 04:18:09', 'Created a benefit type Hardhip llowances into the system '),
(1583, 19, '2015-01-20 04:20:11', 'Created a deduction type Shortages into the system '),
(1584, 19, '2015-01-20 04:59:08', 'Updated Sub Module Details'),
(1585, 19, '2015-01-20 04:59:20', 'Updated Sub Module Details'),
(1586, 19, '2015-01-20 05:54:09', 'Created a benefit type Commuter Allowance into the system '),
(1587, 19, '2015-01-20 18:26:58', 'Logged Into the system');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bad_debts`
--


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
  `branch_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `account_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `account_number` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `branch_name`, `account_name`, `account_number`) VALUES
(4, 'Barclays Bank Kenya Limited', 'Queensway House', 'My Mechanic Auto Garage', '2023268235'),
(5, 'Kenya Commercial Bank', 'KIMATHI ', 'My Mechanic Auto Garage', '11439501');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_ledger`
--

INSERT INTO `bank_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Salary Payments To : Frankline Lagat        For Month Of : February 2015', '-373200 ', '', '373200 ', 0, '', '2015-01-20 03:02:55', 'payrol8'),
(2, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-19100 ', '', '19100 ', 0, '', '2015-01-20 03:02:55', 'payrol7'),
(3, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-374500 ', '', '374500 ', 0, '', '2015-01-20 03:02:55', 'payrol6'),
(4, 'Salary Payments To :  Issack        For Month Of : January 2015', '-225070 ', '', '225070 ', 0, '', '2015-01-20 04:46:55', 'payrol10');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bank_statement`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`benefit_id`, `emp_id`, `payroll_id`, `benefit_log_id`, `benefit_name`, `benefit_amount`, `benefit_month`) VALUES
(11, 5, 10, 1, 'House Allowance', '2305', 'January 2015'),
(12, 4, 9, 1, 'House Allowance', '3400', 'January 2015'),
(13, 5, 11, 3, 'Commuter Allowance', '800', 'February 2015'),
(14, 5, 11, 1, 'House Allowance', '840', 'February 2015');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_logs`
--

CREATE TABLE IF NOT EXISTS `benefit_logs` (
  `benefit_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `benefit_log_name` varchar(100) NOT NULL,
  PRIMARY KEY (`benefit_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `benefit_logs`
--

INSERT INTO `benefit_logs` (`benefit_log_id`, `benefit_log_name`) VALUES
(1, 'House Allowance'),
(3, 'Commuter Allowance');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `customer_id`, `reg_no`, `vehicle_make`, `vehicle_model`, `chasis_no`, `engine_range_id`, `engine`, `trim_code`, `odometer`, `fuel_tank`, `booking_date`, `user_id`, `status`) VALUES
(1, 1, 'KAT 291S', 'Toyota', 'NZE', 'JTBW23803065154', 1, '1300', 'YE14', '219969', 'Quatre tank', '2014-12-18', 62, 1),
(2, 2, 'n/a', '', '', '', 1, '', '', '', '', '2014-12-19', 62, 1),
(3, 2, 'n/a', '', '', '', 999, '', '', '', '', '2014-12-19', 62, 1),
(4, 3, 'KBV 863P', 'Isuzu', 'NQR', '', 3, '3500', '', '', '', '2014-12-19', 62, 1),
(5, 4, 'KAW 779W', 'Toyota', 'Premio', '', 1, '1700', '', '', '', '2014-12-20', 19, 1),
(6, 5, 'KBG 849V', 'Toyota', 'Premio', '', 1, '1500', '', '214587', '', '2014-12-22', 62, 1),
(7, 6, 'KBZ 348B', 'Isuzu', 'NQR', 'JAANIR66PC7101658', 3, '4334', 'c7101658', '43942', 'Quatre tank', '2014-12-23', 62, 1),
(8, 7, 'KBY 754G', 'Isuzu', 'NQR', 'JAANIR66PC7101418', 3, '', '', '49154', '3/4', '2014-12-23', 62, 1),
(9, 7, 'KBY 755G', 'Isuzu', 'NQR', 'C7101481', 3, '', '', '50881', '3/4', '2014-12-23', 62, 1),
(10, 3, 'KBV 079P', 'Isuzu', 'NQR', '', 3, '', '', '', '', '2014-12-23', 62, 1),
(11, 7, 'KBL 145L', 'Isuzu', 'NQR', '', 3, '', '', '', '3/4', '2014-12-23', 62, 1),
(12, 3, 'KBV 599Z', 'Isuzu', 'NQR', '', 3, '', '', '', '3/4', '2014-12-23', 62, 1),
(13, 3, 'KBY 756G', 'Isuzu', 'NQR', '', 3, '', '', '', '3/4', '2014-12-23', 62, 1),
(14, 6, 'KBZ 348B', 'Isuzu', 'NQR', 'JAANIR66PC7101658', 3, '4334', 'c7101658', '43942', 'Quatre tank', '2014-12-23', 62, 1),
(15, 6, 'KBZ 348B', 'Isuzu', 'NQR', 'JAANIR66PC7101658', 3, '4334', 'c7101658', '43942', 'Quatre tank', '2014-12-23', 62, 1),
(16, 3, 'KBY 755G', 'Isuzu', 'NQR', 'C7101481', 3, '4334', '', '', '', '2014-12-24', 62, 0),
(17, 3, 'KBY 755G', 'Isuzu', 'NQR', 'C7101481', 3, '4334', '', '', '', '2014-12-24', 62, 1),
(18, 7, 'Kbv 863F', 'Isuzu', 'NQR', 'PC7100504', 3, '4334', '', '8322', '', '2014-12-24', 62, 1),
(19, 3, 'KBY 754G', 'Isuzu', 'NQR', '', 3, '4334', '', '', '', '2014-12-27', 62, 1),
(20, 3, 'KBY 756G', 'Isuzu', 'NQR', 'JAAN1R66PC7101417', 3, '4334', '729/158', '94296', 'Quatre tank', '2014-12-29', 62, 1),
(21, 3, 'KBW 145L', 'Isuzu', 'NQR', 'JAAN1R66PC7100919', 3, '4334', '729/158', '11800', 'FULL', '2014-12-29', 62, 1),
(22, 8, 'KAW  374M', 'Subaru', 'Impreza', 'GF1F54R', 1, '1498', '810', '176344', 'Half tank', '2014-12-29', 62, 1),
(23, 3, 'KBY 755G', 'Isuzu', 'NQR', 'JAAN1R66PC7101481', 3, '4334', '729/158', '51493', 'FULL', '2014-12-30', 62, 1),
(24, 9, 'KBT 800Z', 'Mercedez Benz', 'C230', 'WDC2030402R190046', 2, '2000', '', '', '', '2014-12-30', 62, 0),
(25, 3, 'KBV 863P', 'Isuzu', 'NQR', 'PC710054', 3, '3500', '', '', 'FULL', '2014-12-31', 62, 0),
(26, 10, 'others', 'Isuzu', 'NQR', '', 3, '', '', '', '', '2014-12-31', 62, 0),
(27, 10, 'others', 'Isuzu', 'NQR', '', 3, '', '', '', '', '2014-12-31', 62, 1),
(29, 3, 'KBY 756G', 'Isuzu', 'NQR', 'JAAN1R66PC7101417', 3, '4334', '729/158', '44102', '3/4', '2014-12-31', 62, 1),
(30, 3, 'KBV 863F', 'Isuzu', 'NQR', 'PC7100504', 3, '3500', '', '', '', '2014-12-31', 62, 1),
(31, 3, 'KBY 754G', 'Isuzu', 'NQR', 'JAANIR66PC7101418', 3, '4334', '', '94296', '', '2014-12-31', 62, 1),
(32, 11, 'KAT 353K', 'Toyota', '103', 'REE103V', 1, '1290', 'LB12', '144350', 'FULL', '2015-01-02', 62, 1),
(33, 3, 'KBY 755G', 'Isuzu', 'NQR', 'C7101481', 3, '4334', '729/158', '', '', '2015-01-02', 62, 1),
(34, 3, 'KBY 754G', 'Isuzu', 'NQR', 'JAANIR66PC7101418', 3, '4334', '729/158', '94926', '', '2015-01-03', 62, 1),
(35, 11, 'KAT 353K', 'Toyota', '103', 'REE103V', 1, '1290', 'LB12', '144350', 'FULL', '2015-01-03', 62, 0),
(36, 2, 'n/a', '', '', '', 1, '', '', '', '', '2015-01-05', 19, 0),
(37, 12, 'KBT 617W', 'KIA', 'SPORTAGE', 'KNAPC8115C7319425', 1, '1600', 'D5UWK', '23735', '', '2015-01-05', 62, 1),
(38, 3, 'KBV 599Z', 'Isuzu', 'NQR', 'C7100628', 3, '4334', '729/158', '82471', '3/4', '2015-01-05', 62, 1),
(39, 13, 'others', 'Corolla', 'AE110', '', 1, '', '', '', '', '2015-01-06', 62, 0),
(40, 13, 'Others', 'Corolla', 'AE110', '', 1, '', '', '', '', '2015-01-06', 62, 1),
(41, 3, 'KBW 145L', 'Isuzu', 'NQR', 'JAAN1R66PC7100919', 3, '4334', '729/158', '11800', '3/4', '2015-01-06', 62, 1),
(42, 7, 'KBY 755G', 'Isuzu', 'NQR', 'JAAN1R66PC7101481', 3, '4334', '729/158', '50881', '3/4', '2015-01-07', 62, 1),
(43, 7, 'KBY 755G', 'Isuzu', 'NQR', 'JAAN1R66PC7101481', 3, '', '', '50881', 'FULL', '2015-01-08', 62, 1),
(44, 7, 'KBZ 348B', 'Isuzu', 'NQR', 'JAANIR66PC7101658', 3, '4334', '729/158', '46181', '', '2015-01-08', 62, 1),
(45, 3, 'KBW 145L', 'Isuzu', 'NQR', 'JAAN1R66PC7100919', 3, '4334', '729/158', '11800', 'FULL', '2015-01-09', 62, 1),
(46, 2, 'KAM 457U', 'Toyota', 'COROLLA  SE', '', 1, '1600', '', '', '', '2015-01-10', 62, 1),
(47, 14, 'KCA 020R', 'Toyota', 'Hillux KUN25R', 'PN133JV2508541386', 2, '2494', 'GD10', '', '', '2015-01-10', 62, 1),
(48, 7, 'KBL 145L', 'Isuzu', 'NQR', '', 3, '4334', '729/158', '', '3/4', '2015-01-12', 62, 1),
(49, 7, 'KBY 754G', 'Isuzu', 'NQR', 'JAANIR66PC7101418', 3, '4334', '729/158', '49154', '3/4', '2015-01-12', 62, 1),
(50, 7, 'KBV 863F', 'Isuzu', 'NQR', 'PC7100504', 3, '4334', '729/158', '8322', '', '2015-01-12', 62, 1),
(51, 7, 'KBW 599Z', 'Isuzu', 'NQR', '', 3, '4334', '729/158', '', '', '2015-01-12', 62, 1),
(52, 3, 'KBY 756G', 'Isuzu', 'NQR', '', 3, '4334', '729/158', '', '3/4', '2015-01-12', 62, 1),
(53, 3, 'KBW 145L', 'Isuzu', 'NQR', 'JAAN1R66PC7100919', 3, '4334', '729/158', '11800', 'FULL', '2015-01-12', 62, 1),
(54, 2, 'n/a', '', '', '', 1, '', '', '', '', '2015-01-14', 19, 0),
(55, 2, 'n/a', '', '', '', 1, '', '', '', '', '2015-01-05', 19, 0),
(56, 13, 'others', 'Corolla', 'AE110', '', 1, '', '', '', '', '2015-01-04', 62, 1);

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
(1, 'RFQ0001/2014', 1, 'CANCELED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_cash_sales`
--

CREATE TABLE IF NOT EXISTS `cancelled_cash_sales` (
  `cancelled_cash_sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `sales_code` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_cash_sales_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cancelled_cash_sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `cancelled_invoices`
--

CREATE TABLE IF NOT EXISTS `cancelled_invoices` (
  `cancelled_invoice_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(100) NOT NULL,
  `canceling_user` int(10) NOT NULL,
  `reasons` varchar(100) NOT NULL,
  `date_cancelled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cancelled_invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cancelled_invoices`
--

INSERT INTO `cancelled_invoices` (`cancelled_invoice_id`, `invoice_id`, `canceling_user`, `reasons`, `date_cancelled`, `status`) VALUES
(1, 0, 0, '', '0000-00-00 00:00:00', 0),
(2, 75, 19, '', '2015-01-18 04:29:02', 0),
(3, 68, 19, 'Poorly generated', '2015-01-18 04:35:42', 0),
(4, 66, 19, 'Not yet cancelled', '2015-01-18 04:38:25', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cancelled_lpo`
--

INSERT INTO `cancelled_lpo` (`cancelled_po_id`, `lpo_no`, `order_code`, `reasons`, `status`) VALUES
(1, 'BD0005/2014', 5, 'CANCELLED', 0),
(2, 'BD0004/2014', 4, 'CANCELED', 0),
(3, 'BD0003/2014', 3, 'CANCELED', 0),
(4, 'BD0001/2014', 1, 'CANCELED', 0),
(5, 'BD0032/2015', 32, 'Poorly generated', 0);

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

--
-- Dumping data for table `cash_deposits`
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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `cash_ledger`
--

INSERT INTO `cash_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-18 06:38:49', 'payrol21'),
(2, 'Deduction of Salary Advance From Staff :  JOan           for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(3, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(4, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(5, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-18 07:54:53', 'payrol2'),
(6, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(7, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(8, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(9, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', ' ', ' ', '', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(10, 'Advance Payments To : Frankline Lagat       ', '-10000', '', '10000', 6, '1', '2015-01-19 04:38:58', 'sadv1'),
(11, 'Advance Payments To :  Joakim    ', '-12000', '', '12000', 6, '1', '2015-01-19 04:44:42', 'sadv2'),
(12, 'Advance Payments To : Jonah    JOnah    Jonah  ', '-6000', '', '6000', 6, '1', '2015-01-19 04:45:31', 'sadv3'),
(13, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '4500 ', '4500 ', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(14, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '4500 ', '4500 ', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(15, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', ' ', ' ', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(16, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '4500 ', '4500 ', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(17, 'Customer Payment Receipt No : (MGSR0002/2015) Received from  martha Njenga', '3200', '3200', '', 6, '1', '2015-01-19 16:11:37', 'crsp2'),
(18, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', '4500  ', '4500  ', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(19, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '5500  ', '5500  ', '', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(20, 'Advance Payments To :  Issack          ', '-5000', '', '5000', 6, '1', '2015-01-20 06:25:50', 'sadv4');

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

--
-- Dumping data for table `cash_sales`
--


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

--
-- Dumping data for table `cash_sales_payments`
--


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

--
-- Dumping data for table `cash_withdrawal`
--


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

--
-- Dumping data for table `cheque_deposits`
--


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

--
-- Dumping data for table `cheque_withdrawals`
--


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
  `monthly_statement` int(11) NOT NULL,
  `statement_date` date NOT NULL,
  `c_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `c_name`, `c_address`, `c_town`, `c_street`, `c_paddress`, `c_phone`, `c_telephone`, `contact_person`, `c_email`, `monthly_statement`, `statement_date`, `c_date_created`) VALUES
(1, 'Juma Kimotho', '12314', 'Nairobi', '', '12314', '0711328141', '', '', 'jkimotho25@gmail.com', 0, '0000-00-00', '2014-12-18 15:01:12'),
(2, 'Engen petrol station', '', '', '', '', '', '', '', '', 0, '0000-00-00', '2014-12-19 12:16:15'),
(3, 'Long term view capital ltd', '', 'Nairobi', '', '', '', '', 'freddy', '', 0, '0000-00-00', '2014-12-19 12:41:27'),
(4, 'willis Asiko', '1214', 'Nairobi', '', '1214', '527123', '', '', '123@gmail.com', 0, '0000-00-00', '2014-12-19 13:46:05'),
(5, 'martha Njenga', '2145', '', '', '2145', '', '', '', 'fifi@gmail.com', 0, '0000-00-00', '2014-12-20 11:16:34'),
(6, 'Team Fergie Transporters Ltd', '100584-00100 Nairobi', 'Nairobi', '', '100584-00100 Nairobi', '', '', 'Driver', '', 0, '0000-00-00', '2014-12-23 09:32:35'),
(7, 'Team Fergie Transporters Ltd', '100584-00100 Nairobi', '', '', '100584-00100 Nairobi', '202211334', '', 'Fred Tirimba', '', 0, '0000-00-00', '2014-12-23 10:23:22'),
(8, 'Joel Njuguna', '', 'Rongai', '', '', '0723889208', '', '', '', 0, '0000-00-00', '2014-12-29 16:44:25'),
(9, 'Mr.', '', '', '', '', '', '', '', '', 0, '0000-00-00', '2014-12-30 13:44:13'),
(10, 'Nelson', '', '', '', '', '', '', '', '', 0, '0000-00-00', '2014-12-31 09:14:33'),
(11, 'Mr. Julius', '', 'Nairobi', '', '', '0727853854', '', '', '', 0, '0000-00-00', '2015-01-02 09:58:36'),
(12, ' Mr. Beutah Maroko', '', 'Rongai', '', '', '0722167369', '', '', 'beutah@gmail.com', 0, '0000-00-00', '2015-01-05 08:32:02'),
(13, 'Jackson Muraya', '', '', '', '', '0772307782/0722307782', '', '', '', 0, '0000-00-00', '2015-01-06 10:22:07'),
(14, 'Omwanza Ombati', '40450200', '', '', '40450200', '0727727249', '', '', 'omwanza .ombati.gmail.com', 0, '0000-00-00', '2015-01-10 11:38:48');

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

--
-- Dumping data for table `client_opening_bal_payment`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`transaction_id`, `client_id`, `sales_code`, `transaction`, `amount`, `date_recorded`) VALUES
(1, 0, 'cns', 'Cancelation Of Credit sales Invoice  Reason ()', '-0', '2015-01-15 08:02:09'),
(2, 0, 'cns75', 'Cancelation Of sales Invoice 75 Reason ()', '-1610', '2015-01-18 04:29:02'),
(3, 3, 'cns68', 'Cancelation Of sales Invoice 68 Reason (Poorly generated)', '-12860', '2015-01-18 04:35:42'),
(4, 14, 'cns66', 'Cancelation Of sales Invoice 66 Reason (Not yet cancelled)', '-5680', '2015-01-18 04:38:25');

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

--
-- Dumping data for table `client_transactionsold`
--


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
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`commision_expected_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commisions_expected`
--


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

--
-- Dumping data for table `commision_paid`
--


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

--
-- Dumping data for table `commision_payments`
--


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

--
-- Dumping data for table `comm_payment_receipt`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_contacts`
--

INSERT INTO `company_contacts` (`contacts_id`, `cont_person`, `phone`, `telephone`, `email`, `fax`, `street`, `building`, `address`, `town`) VALUES
(1, 'My Mechanic Auto Garage', '+254 702 358 399 (Mobile)', '+254(05)38004579 (Office)', 'info@mymechanic.co.ke', 'www.mymechanic.co.ke', 'Ongata Rongai  Road', 'The Bench Place', '100584-0101', 'Nairobi, Kenya');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `com_payables_ledger`
--

INSERT INTO `com_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Counter Commission payable to : Jonah  JOnah  Jonah for the month of December 2014', '-', '', '', 6, '1', '2014-12-19 13:13:56', 'payrol1'),
(2, 'Counter Previous Balance for staff: Jonah  JOnah  Jonah before the month of December 2014', '-0', '0', '', 6, '1', '2014-12-19 13:13:56', 'payrol1'),
(3, 'Net Amount payable to :Jonah  JOnah  Jonahfor the month of December 2014', '20500 ', '', '20500 ', 6, '1', '2014-12-19 13:13:56', 'net1'),
(4, 'Salary Payments To : Jonah   JOnah   Jonah  For Month Of : December 2014', '-20500', '20500', '', 6, '1', '2014-12-19 13:19:38', 'payrol1'),
(5, 'Counter Commission payable to : Frankline Lagat     for the month of February 2015', '-', '', '', 6, '1', '2015-01-14 07:46:18', 'payrol4'),
(6, 'Counter Previous Balance for staff: Frankline Lagat     before the month of February 2015', '-0', '0', '', 6, '1', '2015-01-14 07:46:18', 'payrol4'),
(7, 'Net Amount payable to :Frankline Lagat    for the month of February 2015', '45000 ', '', '45000 ', 6, '1', '2015-01-14 07:46:18', 'net4'),
(8, 'Counter Commission payable to :  Issack     for the month of February 2015', '-', '', '', 6, '1', '2015-01-14 07:49:39', 'payrol5'),
(9, 'Counter Previous Balance for staff:  Issack     before the month of February 2015', '-0', '0', '', 6, '1', '2015-01-14 07:49:39', 'payrol5'),
(10, 'Net Amount payable to : Issack    for the month of February 2015', '6500 ', '', '6500 ', 6, '1', '2015-01-14 07:49:39', 'net5'),
(11, 'Counter Commission payable to :  Issack     for the month of January 2015', '-', '', '', 6, '1', '2015-01-14 07:53:26', 'payrol6'),
(12, 'Counter Previous Balance for staff:  Issack     before the month of January 2015', '-6500', '6500', '', 6, '1', '2015-01-14 07:53:26', 'payrol6'),
(13, 'Net Amount payable to : Issack    for the month of January 2015', '6500 ', '', '6500 ', 6, '1', '2015-01-14 07:53:26', 'net6'),
(18, 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 06:25:22', 'payrol11'),
(17, 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 06:25:22', 'payrol11'),
(16, 'Net Amount payable to : Joakim    for the month of January 2015', '17700 ', '', '17700 ', 6, '1', '2015-01-14 07:55:42', 'net7'),
(19, 'Net Amount payable to : Joakim    for the month of January 2015', '23700 ', '', '23700 ', 6, '1', '2015-01-15 06:25:22', 'net11'),
(20, 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 06:25:49', 'payrol11'),
(21, 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 06:25:49', 'payrol11'),
(22, 'Net Amount payable to : Joakim    for the month of January 2015', '23700 ', '', '23700 ', 6, '1', '2015-01-15 06:25:49', 'net11'),
(23, 'Salary Payments To :  Joakim     For Month Of : January 2015', '-23700', '23700', '', 6, '1', '2015-01-15 06:26:49', 'payrol11'),
(24, 'Counter Commission payable to : Frankline Lagat     for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 06:31:43', 'payrol10'),
(25, 'Counter Previous Balance for staff: Frankline Lagat     before the month of January 2015', '-43030', '43030', '', 6, '1', '2015-01-15 06:31:43', 'payrol10'),
(26, 'Net Amount payable to :Frankline Lagat    for the month of January 2015', '41060 ', '', '41060 ', 6, '1', '2015-01-15 06:31:43', 'net10'),
(27, 'Salary Payments To : Frankline Lagat     For Month Of : January 2015', '-41000', '41000', '', 6, '1', '2015-01-15 06:32:05', 'payrol10'),
(28, 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 06:51:07', 'payrol11'),
(29, 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 06:51:07', 'payrol11'),
(30, 'Net Amount payable to : Joakim    for the month of January 2015', '25440 ', '', '25440 ', 6, '1', '2015-01-15 06:51:07', 'net11'),
(31, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 07:30:57', 'payrol14'),
(32, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 07:30:57', 'payrol14'),
(33, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '179000 ', '', '179000 ', 6, '1', '2015-01-15 07:30:57', 'net14'),
(34, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-179000', '179000', '', 6, '1', '2015-01-15 07:31:18', 'payrol14'),
(35, 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 07:34:08', 'payrol15'),
(36, 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 07:34:08', 'payrol15'),
(37, 'Net Amount payable to : Joakim    for the month of January 2015', '34000 ', '', '34000 ', 6, '1', '2015-01-15 07:34:08', 'net15'),
(38, 'Salary Payments To :  Joakim     For Month Of : January 2015', '-34000', '34000', '', 6, '1', '2015-01-15 07:34:32', 'payrol15'),
(39, 'Salary Payments To :  Issack        For Month Of : January 2015', '-23000', '23000', '', 6, '1', '2015-01-15 07:47:01', 'payrol16'),
(40, 'Counter Commission payable to :  JOan        for the month of January 2015', '-', '', '', 6, '1', '2015-01-15 07:49:28', 'payrol18'),
(41, 'Counter Previous Balance for staff:  JOan        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-15 07:49:28', 'payrol18'),
(42, 'Net Amount payable to : JOan       for the month of January 2015', '18000 ', '', '18000 ', 6, '1', '2015-01-15 07:49:28', 'net18'),
(43, 'Salary Payments To :  JOan        For Month Of : January 2015', '-18000', '18000', '', 6, '1', '2015-01-15 07:49:49', 'payrol18'),
(44, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 06:38:49', 'payrol21'),
(45, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-18 06:38:49', 'payrol21'),
(46, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-18 06:38:49', 'net21'),
(47, 'Salary Payments To : Jonah   JOnah   Jonah  For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:31:21', 'payrol20'),
(48, 'Counter Commission payable to :  JOan           for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(49, 'Counter Previous Balance for staff:  JOan           before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(50, 'Net Amount payable to : JOan          for the month of January 2015', '18000 ', '', '18000 ', 6, '1', '2015-01-18 07:46:59', 'net3'),
(51, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(52, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(53, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-18 07:47:04', 'net1'),
(54, 'Salary Payments To :  JOan           For Month Of : January 2015', '-18000 ', '18000 ', '', 0, '', '2015-01-18 07:47:12', 'payrol3'),
(55, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-18 07:47:12', 'payrol1'),
(56, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(57, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(58, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-18 07:51:07', 'net2'),
(59, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:51:19', 'payrol1'),
(60, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:54:54', 'payrol2'),
(61, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-18 07:54:54', 'payrol2'),
(62, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-18 07:54:54', 'net2'),
(63, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:55:06', 'payrol1'),
(64, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:57:17', 'payrol1'),
(65, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:57:19', 'payrol1'),
(66, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:57:20', 'payrol1'),
(67, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:57:22', 'payrol1'),
(68, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-18 07:57:23', 'payrol1'),
(69, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(70, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(71, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-19 01:53:52', 'net1'),
(72, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-19 02:19:14', 'payrol1'),
(73, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(74, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(75, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-19 02:21:10', 'net1'),
(76, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-19 02:21:19', 'payrol2'),
(77, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-19 02:21:19', 'payrol1'),
(78, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(79, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(80, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-19 02:38:45', 'net1'),
(81, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-19 02:38:57', 'payrol3'),
(82, 'Salary Payments To :  John       Mbadi     Ochieng  For Month Of : January 2015', '-60000 ', '60000 ', '', 0, '', '2015-01-19 02:38:57', 'payrol2'),
(83, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-19 02:38:57', 'payrol1'),
(84, 'Salary Payments To :  Issack        For Month Of : January 2015', '-23000 ', '23000 ', '', 0, '', '2015-01-19 02:41:42', 'payrol4'),
(85, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(86, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '0', '', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(87, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-19 02:46:20', 'net2'),
(88, 'Salary Payments To :  Issack        For Month Of : January 2015', '-23000 ', '23000 ', '', 0, '', '2015-01-19 02:57:47', 'payrol4'),
(89, 'Salary Payments To :  John       Mbadi     Ochieng  For Month Of : January 2015', '-60000 ', '60000 ', '', 0, '', '2015-01-19 02:57:47', 'payrol3'),
(90, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-19 02:57:47', 'payrol2'),
(91, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-20000 ', '20000 ', '', 0, '', '2015-01-19 02:57:47', 'payrol1'),
(92, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(93, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(94, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '', '375500 ', 6, '1', '2015-01-19 07:30:17', 'net19'),
(95, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(96, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(97, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '', '375500 ', 6, '1', '2015-01-19 07:34:20', 'net1'),
(98, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-375500 ', '375500 ', '', 0, '', '2015-01-19 07:53:53', 'payrol1'),
(99, 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', '', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(100, 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', '', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(101, 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '380000 ', '', '380000 ', 6, '1', '2015-01-19 08:52:02', 'net5'),
(102, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(103, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(104, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '', '375500 ', 6, '1', '2015-01-19 08:52:07', 'net4'),
(105, 'Salary Payments To : Frankline Lagat        For Month Of : February 2015', '-380000 ', '380000 ', '', 0, '', '2015-01-19 08:52:21', 'payrol5'),
(106, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-375500 ', '375500 ', '', 0, '', '2015-01-19 08:52:21', 'payrol4'),
(107, 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', '', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(108, 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', '', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(109, 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '373200 ', '', '373200 ', 6, '1', '2015-01-20 03:01:33', 'net8'),
(110, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(111, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(112, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '374500 ', '', '374500 ', 6, '1', '2015-01-20 03:02:38', 'net6'),
(113, 'Salary Payments To : Frankline Lagat        For Month Of : February 2015', '-373200 ', '373200 ', '', 0, '', '2015-01-20 03:02:55', 'payrol8'),
(114, 'Salary Payments To : Jonah    JOnah    Jonah   For Month Of : January 2015', '-19100 ', '19100 ', '', 0, '', '2015-01-20 03:02:55', 'payrol7'),
(115, 'Salary Payments To : Frankline Lagat        For Month Of : January 2015', '-374500 ', '374500 ', '', 0, '', '2015-01-20 03:02:55', 'payrol6'),
(116, 'Salary Payments To :  Issack        For Month Of : January 2015', '-225070 ', '225070 ', '', 0, '', '2015-01-20 04:46:55', 'payrol10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `confirmed_invoice`
--

INSERT INTO `confirmed_invoice` (`confirmed_invoice_id`, `invoice_id`, `booking_id`, `job_card_id`, `customer_id`, `confirm_user_id`, `date_confirmed`, `closed_status`) VALUES
(1, 73, 48, 36, 7, 19, '2015-01-15 10:10:13', 0),
(2, 75, 53, 41, 3, 69, '2015-01-16 10:29:47', 0),
(3, 74, 56, 42, 13, 69, '2015-01-16 10:35:25', 0),
(4, 72, 49, 37, 7, 69, '2015-01-16 10:39:19', 0),
(5, 71, 50, 38, 7, 19, '2015-01-18 03:44:41', 0),
(6, 0, 0, 0, 0, 19, '2015-01-18 03:53:32', 0),
(7, 0, 0, 0, 0, 19, '2015-01-18 03:54:08', 0),
(8, 0, 0, 0, 0, 19, '2015-01-18 03:56:13', 0),
(9, 69, 51, 39, 7, 19, '2015-01-18 04:05:18', 0),
(10, 67, 52, 40, 3, 19, '2015-01-18 04:08:16', 0),
(11, 70, 52, 40, 3, 19, '2015-01-18 04:09:17', 0);

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

--
-- Dumping data for table `credit_notes`
--


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
(2, 'USD', '88'),
(3, 'POUNDS', '120');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_person`, `address`, `town`, `email`, `phone`) VALUES
(1, 'Juma Kimotho', '', '12314', 'Nairobi', 'jkimotho25@gmail.com', '0711328141'),
(2, 'Engen petrol station', '', '100584-00100 Nairobi', '', 'info@ltvcapital.co.ke', '202211334'),
(3, 'Long term view capital ltd', 'freddy', '', 'Nairobi', '', ''),
(4, 'willis Asiko', '', '1214', 'Nairobi', '123@gmail.com', '527123'),
(5, 'martha Njenga', '', '2145', '', 'fifi@gmail.com', ''),
(6, 'Njuguna', 'Geoffrey Ndonye', '12406-00400', 'Nairobi', '', '0722527317'),
(7, 'Team Fergie Transporters Ltd', 'Fred Tirimba', '100584-00100 Nairobi', '', '', '202211334'),
(8, 'Joel Njuguna', '', '', 'Rongai', '', '0723889208'),
(9, 'Mr.', '', '', '', '', ''),
(10, 'Nelson', '', '', '', '', ''),
(11, 'Mr. Julius', '', '', 'Nairobi', '', '0727853854'),
(12, ' Mr. Beutah Maroko', '', '', 'Rongai', 'beutah@gmail.com', '0722167369'),
(13, 'Jackson Muraya', '', '', '', '', '0772307782/0722307782'),
(14, 'Omwanza Ombati', '', '40450200', 'Rongai', 'omwanza .ombati.gmail.com', '0727727249');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `customer_item`
--

INSERT INTO `customer_item` (`customer_item_id`, `booking_id`, `job_card_id`, `customer_item_name`, `user_id`, `date_generated`, `status`) VALUES
(1, 1, 1, '2 spare tyres', 62, '2014-12-18 15:08:33', 0),
(2, 1, 1, 'umbrellas', 62, '2014-12-18 15:08:33', 0),
(3, 1, 1, 'first aid kit', 62, '2014-12-18 15:08:33', 0),
(4, 1, 1, 'life jacket', 62, '2014-12-18 15:08:33', 0),
(5, 1, 1, '6 speakers', 62, '2014-12-18 15:08:33', 0),
(6, 1, 1, '4 carmats', 62, '2014-12-18 15:08:33', 0),
(7, 1, 1, 'tools(jack jack handle,plug spanner)', 62, '2014-12-18 15:08:33', 0),
(8, 1, 1, 'aerial', 62, '2014-12-18 15:08:33', 0),
(9, 1, 1, 'radio,remote control', 62, '2014-12-18 15:08:33', 0),
(10, 1, 1, 'fire extinguisher', 62, '2014-12-18 15:08:33', 0),
(11, 1, 1, 'cheque book,magazine', 62, '2014-12-18 15:08:33', 0),
(12, 1, 1, '', 62, '2014-12-18 15:08:33', 0),
(13, 1, 1, '', 62, '2014-12-18 15:08:33', 0),
(14, 4, 2, 'Jack', 62, '2014-12-19 12:45:16', 0),
(15, 4, 2, 'wheel spanner', 62, '2014-12-19 12:45:16', 0),
(16, 4, 2, 'radio face', 62, '2014-12-19 12:45:16', 0),
(17, 4, 2, '', 62, '2014-12-19 12:45:16', 0),
(18, 5, 3, 'umbrellas', 19, '2014-12-19 13:47:41', 0),
(19, 5, 3, 'jacket', 19, '2014-12-19 13:47:41', 0),
(20, 6, 4, 'bag', 62, '2014-12-20 11:18:30', 0),
(21, 6, 4, 'shoes', 62, '2014-12-20 11:18:30', 0),
(22, 6, 4, 'coat', 62, '2014-12-20 11:18:30', 0),
(23, 7, 5, '', 62, '2014-12-23 09:41:14', 0),
(24, 8, 6, '', 62, '2014-12-23 10:30:19', 0),
(25, 9, 7, '', 62, '2014-12-23 10:41:19', 0),
(26, 10, 8, '', 62, '2014-12-23 10:50:28', 0),
(27, 11, 9, '', 62, '2014-12-23 10:54:19', 0),
(28, 12, 10, '', 62, '2014-12-23 11:02:44', 0),
(29, 13, 11, '', 62, '2014-12-23 11:19:02', 0),
(30, 14, 12, '', 62, '2014-12-23 15:46:32', 0),
(31, 15, 13, '', 62, '2014-12-23 15:55:33', 0),
(32, 17, 14, '', 62, '2014-12-24 10:25:26', 0),
(33, 18, 15, '', 62, '2014-12-24 10:33:53', 0),
(34, 19, 16, '', 62, '2014-12-27 09:13:04', 0),
(35, 20, 17, '', 62, '2014-12-29 14:27:23', 0),
(36, 21, 18, '', 62, '2014-12-29 15:18:44', 0),
(37, 22, 19, 'Umbrella,3 carmats', 62, '2014-12-29 16:46:42', 0),
(38, 23, 20, '', 62, '2014-12-30 09:50:19', 0),
(39, 29, 21, '', 62, '2014-12-31 10:27:06', 0),
(40, 30, 22, '', 62, '2014-12-31 10:31:53', 0),
(41, 31, 23, '', 62, '2014-12-31 15:57:54', 0),
(42, 32, 24, '', 62, '2015-01-02 10:02:43', 0),
(43, 33, 25, '', 62, '2015-01-02 10:50:33', 0),
(44, 34, 26, '', 62, '2015-01-03 08:41:48', 0),
(45, 37, 27, 'cheque book', 62, '2015-01-05 08:41:07', 0),
(46, 37, 27, 'black bag', 62, '2015-01-05 08:41:07', 0),
(47, 37, 27, 'remote', 62, '2015-01-05 08:41:07', 0),
(48, 37, 27, 'envelopes', 62, '2015-01-05 08:41:07', 0),
(49, 37, 27, '4 carmats', 62, '2015-01-05 08:41:07', 0),
(50, 38, 28, '', 62, '2015-01-05 16:50:43', 0),
(51, 41, 29, '', 62, '2015-01-06 15:40:59', 0),
(52, 42, 30, '', 62, '2015-01-07 15:24:33', 0),
(53, 43, 31, '', 62, '2015-01-08 09:19:42', 0),
(54, 44, 32, '', 62, '2015-01-08 17:13:14', 0),
(55, 45, 33, '', 62, '2015-01-09 08:58:05', 0),
(56, 46, 34, '', 62, '2015-01-10 10:41:07', 0),
(57, 47, 35, '2 jackets', 62, '2015-01-10 11:39:17', 0),
(58, 47, 35, '8 carmats', 62, '2015-01-10 12:09:09', 0),
(59, 47, 35, 'magazine', 62, '2015-01-10 12:09:51', 0),
(60, 48, 36, '', 62, '2015-01-12 08:42:06', 0),
(61, 49, 37, '', 62, '2015-01-12 08:44:22', 0),
(62, 50, 38, '', 62, '2015-01-12 08:46:57', 0),
(63, 51, 39, '', 62, '2015-01-12 08:49:37', 0),
(64, 52, 40, '', 62, '2015-01-12 08:51:22', 0),
(65, 53, 41, '', 62, '2015-01-12 08:52:45', 0),
(66, 56, 42, '', 62, '2015-01-16 09:35:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE IF NOT EXISTS `customer_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `customer_transactions`
--

INSERT INTO `customer_transactions` (`transaction_id`, `customer_id`, `transaction`, `amount`, `transaction_date`, `transaction_code`, `status`) VALUES
(1, 2, 'Customer Payment Receipt No:MGSR0001/2015', '-12000', '2015-01-13', 'crsp1', 0),
(2, 7, 'Labour Sales Inv No:73', '12480', '2015-01-15', 'inv73', 0),
(3, 3, 'Labour Sales Inv No:75', '1610', '2015-01-16', 'inv75', 0),
(4, 13, 'Labour Sales Inv No:74', '2980', '2015-01-16', 'inv74', 0),
(5, 7, 'Labour Sales Inv No:72', '12860', '2015-01-16', 'inv72', 0),
(6, 7, 'Labour Sales Inv No:71', '21590', '2015-01-18', 'inv71', 0),
(7, 0, 'Labour Sales Inv No:', '12860', '2015-01-18', 'inv', 0),
(8, 0, 'Labour Sales Inv No:', '12860', '2015-01-18', 'inv', 0),
(9, 0, 'Labour Sales Inv No:', '12860', '2015-01-18', 'inv', 0),
(10, 7, 'Labour Sales Inv No:69', '16060', '2015-01-18', 'inv69', 0),
(11, 3, 'Labour Sales Inv No:67', '7110', '2015-01-18', 'inv67', 0),
(12, 3, 'Labour Sales Inv No:70', '12860', '2015-01-18', 'inv70', 0),
(13, 5, 'Customer Payment Receipt No:MGSR0002/2015', '-3200', '2015-01-19', 'crsp2', 0);

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

--
-- Dumping data for table `custom_clearance`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `custom_clearance_ledger`
--

INSERT INTO `custom_clearance_ledger` (`transaction_id`, `transactions`, `order_code`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`) VALUES
(1, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc2', '0', '0', '', 6, '1', '2014-12-20 12:42:22'),
(2, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc6', '0', '0', '', 6, '1', '2015-01-03 09:26:07'),
(3, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc24', '0', '0', '', 6, '1', '2015-01-07 14:12:02'),
(4, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc19', '0', '0', '', 6, '1', '2015-01-07 14:13:32'),
(5, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc17', '0', '0', '', 6, '1', '2015-01-07 14:13:58'),
(6, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc16', '0', '0', '', 6, '1', '2015-01-07 14:14:23'),
(7, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc15', '0', '0', '', 6, '1', '2015-01-07 14:15:06'),
(8, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc23', '0', '0', '', 6, '1', '2015-01-07 14:15:42'),
(9, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc34', '0', '0', '', 6, '1', '2015-01-11 09:17:19'),
(10, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc33', '0', '0', '', 6, '1', '2015-01-11 09:17:33'),
(11, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc27', '0', '0', '', 6, '1', '2015-01-14 06:21:33'),
(12, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc38', '670', '670', '', 6, '1', '2015-01-14 07:01:24'),
(13, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc43', '0', '0', '', 6, '1', '2015-01-14 14:48:29'),
(14, 'Freight Charges for Goods Supplied By:Local Purchase', 'fc35', '0', '0', '', 6, '1', '2015-01-16 14:32:10');

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

--
-- Dumping data for table `debit_notes`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`deduction_id`, `emp_id`, `payroll_id`, `deduction_log_id`, `deduction_name`, `deduction_amount`, `deduction_month`) VALUES
(9, 5, 11, 2, 'N.S.S.F', '320', 'February 2015'),
(7, 5, 10, 2, 'N.S.S.F', '3207', 'January 2015'),
(8, 5, 10, 1, 'P.A.Y.E', '2300', 'January 2015'),
(10, 5, 11, 1, 'P.A.Y.E', '160', 'February 2015');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_logs`
--

CREATE TABLE IF NOT EXISTS `deduction_logs` (
  `deduction_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `deduction_log_name` varchar(100) NOT NULL,
  PRIMARY KEY (`deduction_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `deduction_logs`
--

INSERT INTO `deduction_logs` (`deduction_log_id`, `deduction_log_name`) VALUES
(1, 'P.A.Y.E'),
(2, 'N.S.S.F');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `discount_allowed_ledger`
--

INSERT INTO `discount_allowed_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Labour Sales Inv No:73 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-15 10:10:13', 'inv73'),
(2, 'Labour Sales Inv No:75 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-16 10:29:47', 'inv75'),
(3, 'Labour Sales Inv No:74 To Jackson Muraya', '0', '0', '', 6, '1', '2015-01-16 10:35:25', 'inv74'),
(4, 'Labour Sales Inv No:72 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-16 10:39:20', 'inv72'),
(5, 'Labour Sales Inv No:71 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-18 03:44:41', 'inv71'),
(6, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:53:32', 'inv'),
(7, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:54:09', 'inv'),
(8, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:56:13', 'inv'),
(9, 'Labour Sales Inv No:69 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-18 04:05:19', 'inv69'),
(10, 'Labour Sales Inv No:67 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-18 04:08:16', 'inv67'),
(11, 'Labour Sales Inv No:70 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-18 04:09:17', 'inv70');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `doubtful_debts`
--


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

--
-- Dumping data for table `doubtful_debts_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_no`, `national_id`, `emp_firstname`, `emp_middle_name`, `emp_lastname`, `emp_phone`, `emp_email`, `pin_no`, `town`, `marital_status`, `nationality`, `dob`, `gender`, `nhif_no`, `nssf_no`, `job_title_id`, `job_email`, `kin`, `kin_phone`, `emp_status`, `department`, `joined_date`, `bank_name`, `bank_branch`, `bank_account_name`, `bank_account_number`, `status`, `basic_sal`) VALUES
(1, 'BDS1  ', ' 24567789  ', 'Jonah  ', ' JOnah  ', ' Jonah  ', ' 0743567  ', 'jon@gmail.com', ' n/a  ', 'Nairobi  ', 'Single', ' Kenyan  ', '1990-12-02', 'Male', '', '   ', 'Technician  ', 'jon@garage.com', '', '', 'Parmanent', ' Workshop ', '2014-10-06', 'National Bank', 'Harambee Avenue', 'Jonah', '3456789', 0, '20000'),
(2, 'BDS2    ', '32785499 ', ' John ', '     Mbadi    ', 'Ochieng ', '09765433 ', 'updateosero@gmail.com', 'A10983 ', 'Nairobi ', 'Married', 'Kenyan ', '2014-12-10', 'Male', '6744', '     ', 'Workshop Supervisor ', 'jon@garage.com', '', '', 'Parmanent', '4', '2014-11-03', 'Equity Bank', 'Kayole', 'John MBadi', '56774449896', 0, '60000'),
(10, 'BDS10 ', '   ', '   ', '   ', '   ', '   ', '', '   ', '   ', '0', '   ', '0000-00-00', 'Female', '', '   ', '   ', '', 'Osama Bin Kweli', '073452', '0', '', '0000-00-00', '', '', '', '', 0, ''),
(4, 'BDS4 ', '   ', ' JOan  ', '   ', '   ', '   ', '', '   ', '   ', '0', '   ', '0000-00-00', 'Female', '', '   ', '   ', '', '', '', '0', '3', '0000-00-00', 'Bank of Baroda', 'Eldoret Branch', 'Joan', '896423', 0, '18000'),
(5, 'BDS5 ', '   ', ' Issack  ', '   ', '   ', '   ', '', '   ', '   ', '0', '   ', '0000-00-00', 'Female', '', '   ', '   ', '', '', '', '0', '4', '0000-00-00', '', '', '', '', 0, '40000'),
(6, 'BDS6 ', '  ', 'Frankline Lagat ', '  ', '  ', '  ', '', '  ', '  ', '0', '  ', '0000-00-00', 'Male', '', '  ', '  ', '', '', '', '0', '3', '0000-00-00', 'Equity Bank', 'Tom MBoya', 'Frankline Kurgat', '0963232323', 0, '380000'),
(7, 'BDS7 ', ' ', ' Joakim', ' ', ' ', ' ', '', ' ', ' ', '0', ' ', '0000-00-00', '', '', ' ', ' ', '\r\n', '', '', '0', '1', '0000-00-00', '', '', '', '', 0, ''),
(9, 'BDS8 ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', '0', ' ', '0000-00-00', '', '', ' ', ' ', '\r\n', 'Kinmani', 'Child', '0', '', '0000-00-00', '', '', '', '', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `engine_range`
--

INSERT INTO `engine_range` (`engine_range_id`, `min_capacity`, `max_capacity`, `status`) VALUES
(1, '1000', '1990', 0),
(2, '2000', '2999', 0),
(3, '3000', '4000', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `estimates`
--


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

--
-- Dumping data for table `exited_shares`
--


-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expenses_id` int(10) NOT NULL AUTO_INCREMENT,
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

--
-- Dumping data for table `expenses`
--


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

--
-- Dumping data for table `expenses_receipts`
--


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
  `status` int(10) NOT NULL,
  PRIMARY KEY (`fixed_asset_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fixed_assets`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fixed_assets_ledger`
--


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

--
-- Dumping data for table `fixed_assets_payments`
--


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

--
-- Dumping data for table `fixed_assets_paymentsold`
--


-- --------------------------------------------------------

--
-- Table structure for table `fixed_asset_category`
--

CREATE TABLE IF NOT EXISTS `fixed_asset_category` (
  `fixed_asset_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fixed_asset_category_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `fixed_asset_dep_perc` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`fixed_asset_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `fixed_asset_category`
--

INSERT INTO `fixed_asset_category` (`fixed_asset_category_id`, `fixed_asset_category_name`, `fixed_asset_dep_perc`) VALUES
(1, 'Plants and Machinery', '22'),
(2, 'Furniture', '17');

-- --------------------------------------------------------

--
-- Table structure for table `flat_rate_cost`
--

CREATE TABLE IF NOT EXISTS `flat_rate_cost` (
  `flat_rate_cost_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `flat_rate_cost_amount` varchar(100) NOT NULL,
  PRIMARY KEY (`flat_rate_cost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `flat_rate_cost`
--

INSERT INTO `flat_rate_cost` (`flat_rate_cost_id`, `flat_rate_cost_amount`) VALUES
(1, '1600'),
(2, '1200'),
(3, '1000'),
(4, '1000');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `general_expenses_ledger`
--

INSERT INTO `general_expenses_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Counter Commission payable to :  JOan           for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(2, 'Counter Previous Balance for staff:  JOan           before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(3, 'Net Amount payable to : JOan          for the month of January 2015', '18000 ', '18000 ', '', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(4, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(5, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(6, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(7, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(8, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(9, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(10, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-18 07:54:54', 'payrol2'),
(11, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-18 07:54:54', 'payrol2'),
(12, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-18 07:54:54', 'payrol2'),
(13, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(14, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(15, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(16, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(17, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(18, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(19, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(20, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(21, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(22, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(23, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', '', '0', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(24, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(25, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(26, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(27, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '375500 ', '', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(28, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(29, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(30, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '375500 ', '', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(31, 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', '', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(32, 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', '', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(33, 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '380000 ', '380000 ', '', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(34, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(35, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(36, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', '375500 ', '', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(37, 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', '', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(38, 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', '', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(39, 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '373200 ', '373200 ', '', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(40, 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', '', '', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(41, 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', '', '', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(42, 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '374500 ', '374500 ', '', 6, '1', '2015-01-20 03:02:38', 'payrol6');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Accounts Receivables (Customer Payment Receipt No : MGSR0001/2015)', '-12000', '', '12000', 6, '1', '2015-01-13 14:21:18', 'crsp1'),
(2, 'Customer Payment ( Receipt No : MGSR0001/2015)', '12000', '12000', '', 6, '1', '2015-01-13 14:21:18', 'crsp1'),
(3, 'Accounts Receivables (Customer Payment Receipt No : MGSR0002/2015)', '-3200', '', '3200', 6, '1', '2015-01-19 16:11:37', 'crsp2'),
(4, 'Customer Payment ( Receipt No : MGSR0002/2015)', '3200', '3200', '', 6, '1', '2015-01-19 16:11:37', 'crsp2');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `income_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `curr_id` varchar(100) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `client_bank` varchar(100) NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_drawn` date NOT NULL,
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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `income_ledger`
--


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

--
-- Dumping data for table `incurred_prepaid_expenses`
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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `inventory_ledger`
--

INSERT INTO `inventory_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Received 2 O ring Kit - 3 inch (Pieces) into the warehouse', '240', '240', '', 6, '1', '2014-12-20 12:43:35', 'recp1'),
(2, 'Received 21 O ring Kit - 2 inch (Pieces) into the warehouse', '2730', '2730', '', 6, '1', '2014-12-20 12:43:48', 'recp2'),
(4, 'Received 34 O ring Kit - 3 inch (Pieces) into the warehouse', '4080', '4080', '', 6, '1', '2014-12-20 12:45:36', 'recp4'),
(5, 'Received 3 O ring Kit - 2 inch (Pieces) into the warehouse', '390', '390', '', 6, '1', '2014-12-20 12:45:45', 'recp5'),
(6, 'Received 4 AT transmission (Pieces) into the warehouse', '3560', '3560', '', 6, '1', '2015-01-03 13:09:48', 'recp6'),
(7, 'Received 10 Spark Plugs BKR6E2756 (Pieces) into the warehouse', '1750', '1750', '', 6, '1', '2015-01-07 14:17:06', 'recp7'),
(8, 'Received 8 Spark Plugs BP6ES-7811 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:17:20', 'recp8'),
(9, 'Received 8 Spark Plugs BP6EY-6278 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:17:35', 'recp9'),
(10, 'Received 10 Spark Plugs BCP5ES-7810 (Pieces) into the warehouse', '1600', '1600', '', 6, '1', '2015-01-07 14:17:48', 'recp10'),
(11, 'Received 8 Spark plugs BKR6EYA4195 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:18:01', 'recp11'),
(12, 'Received 10 Spark Plugs Denso K16Single (Pieces) into the warehouse', '1650', '1650', '', 6, '1', '2015-01-07 14:18:16', 'recp12'),
(13, 'Received 10 Spark Plugs Denso K16Double (Pieces) into the warehouse', '1750', '1750', '', 6, '1', '2015-01-07 14:18:31', 'recp13'),
(14, 'Received 10 Spark Plugs Denso Q20 Single (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:18:41', 'recp14'),
(15, 'Received 10 Spark Plugs  K20Double (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-07 14:18:54', 'recp15'),
(16, 'Received 2 Air filterAA090 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:20:52', 'recp16'),
(17, 'Received 2 Air filterAA070 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:21:01', 'recp17'),
(18, 'Received 2 Air filterP2J-003 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:21:12', 'recp18'),
(19, 'Received 2 Air filterPNB003 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:21:26', 'recp19'),
(20, 'Received 2 Air filterEB300 (Pieces) into the warehouse', '800', '800', '', 6, '1', '2015-01-07 14:21:36', 'recp20'),
(21, 'Received 2 Air filter50060 (Pieces) into the warehouse', '800', '800', '', 6, '1', '2015-01-07 14:21:53', 'recp21'),
(22, 'Received 4 Air filteB1010 (Pieces) into the warehouse', '1600', '1600', '', 6, '1', '2015-01-07 14:22:05', 'recp22'),
(23, 'Received 2 Air filterPWJ-A10 (Pieces) into the warehouse', '1100', '1100', '', 6, '1', '2015-01-07 14:22:23', 'recp23'),
(24, 'Received 2 Air filter67060 (Pieces) into the warehouse', '1100', '1100', '', 6, '1', '2015-01-07 14:22:34', 'recp24'),
(25, 'Received 2 Air filter47010 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:22:47', 'recp25'),
(26, 'Received 2 Air filter4M400 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-07 14:22:59', 'recp26'),
(27, 'Received 10 Spark plugs 8H516 (Pieces) into the warehouse', '4000', '4000', '', 6, '1', '2015-01-07 14:23:48', 'recp27'),
(28, 'Received 6 Air filter11050 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:17', 'recp28'),
(29, 'Received 6 Air filter11090 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:30', 'recp29'),
(30, 'Received 6 Air filter15070 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:39', 'recp30'),
(31, 'Received 6 Air filter16020 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:48', 'recp31'),
(32, 'Received 6 Air filter21030 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:59', 'recp32'),
(33, 'Received 12 Air filter21050 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:26:19', 'recp33'),
(34, 'Received 12 Air filter22020 (Pieces) into the warehouse', '2400', '2400', '', 6, '1', '2015-01-07 14:26:34', 'recp34'),
(35, 'Received 6 Air filter23030 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:26:49', 'recp35'),
(36, 'Received 2 Air filter35020 (Pieces) into the warehouse', '440', '440', '', 6, '1', '2015-01-07 14:28:03', 'recp36'),
(37, 'Received 6 Air filter74020 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:28:14', 'recp37'),
(38, 'Received 6 Air filter73C10 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:28:33', 'recp38'),
(39, 'Received 6 Air filter77A10 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:29:48', 'recp39'),
(40, 'Received 6 Air filter41B00 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:29:59', 'recp40'),
(41, 'Received 12 Air filterV0100 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:30:54', 'recp41'),
(42, 'Received 6 Air filter20040 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:31:03', 'recp42'),
(43, 'Received 6 Air filter2810 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:31:16', 'recp43'),
(44, 'Received 2 Air filter70050 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:31:25', 'recp44'),
(45, 'Received 2 Air filter74060 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:31:38', 'recp45'),
(46, 'Received 2 Air filterMv188 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:31:50', 'recp46'),
(47, 'Received 2 Air filterMv266 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:32:02', 'recp47'),
(48, 'Received 2 Air filter22600 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:32:20', 'recp48'),
(49, 'Received 2 Air filterED500 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:32:31', 'recp49'),
(50, 'Received 2 Air filte31110 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:32:41', 'recp50'),
(51, 'Received 2 Air filter31120 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:33:10', 'recp51'),
(52, 'Received 2 Air filter50040 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:33:22', 'recp52'),
(53, 'Received 2 Air filter97402 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:33:35', 'recp53'),
(54, 'Received 12 Fuel FilterMB220900 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:34:25', 'recp54'),
(55, 'Received 12 Fuel Filter64010 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:34:33', 'recp55'),
(56, 'Received 12 Oil Filter Toyota10001/03001 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:34:41', 'recp56'),
(57, 'Received 12 Oil Filter Toyota03006 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:34:52', 'recp57'),
(58, 'Received 12 Oil Filter Nissan65F00 (Pieces) into the warehouse', '1440', '1440', '', 6, '1', '2015-01-07 14:35:07', 'recp58'),
(59, 'Received 12 Oil Filter Mark x-31020/80 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:35:22', 'recp59'),
(60, 'Received 12 Oil Filter Toyota Passo-37010 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:35:32', 'recp60'),
(61, 'Received 12 Oil Filter 20001/30002 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-07 14:35:44', 'recp61'),
(62, 'Received 12 Oil Filter MD135737 (Pieces) into the warehouse', '1440', '1440', '', 6, '1', '2015-01-07 14:35:56', 'recp62'),
(63, 'Received 2 Brake padsKD2718 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:03', 'recp63'),
(64, 'Received 2 Brake padsKD2780 (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:18:15', 'recp64'),
(65, 'Received 2 Brake padsKD2701 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:23', 'recp65'),
(66, 'Received 2 Brake padsKD2725 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:33', 'recp66'),
(67, 'Received 2 Brake padsKD2203 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:18:43', 'recp67'),
(68, 'Received 1 Brake padsKD2208 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-11 09:24:03', 'recp68'),
(69, 'Received 2 Brake padsKD2798 (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:24:14', 'recp69'),
(70, 'Received 2 Brake padsKD2740 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-11 09:24:27', 'recp70'),
(71, 'Received 1 Brake padsKD2457 (Pieces) into the warehouse', '950', '950', '', 6, '1', '2015-01-11 09:24:45', 'recp71'),
(72, 'Received 1 Brake padsKD1740 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-11 09:25:13', 'recp72'),
(73, 'Received 2 Brake padsKD2739 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:25:27', 'recp73'),
(74, 'Received 2 Brake padsKD2776 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-11 09:25:36', 'recp74'),
(75, 'Received 2 Brake padsKD1739 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:25:45', 'recp75'),
(76, 'Received 2 Brake padsKD1735 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:25:59', 'recp76'),
(77, 'Received 2 Brake padsKD2606/07 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:26:09', 'recp77'),
(78, 'Received 2 Brake pads liningX288 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-11 09:26:19', 'recp78'),
(79, 'Received 2 Brake pads liningAK2342 (Pieces) into the warehouse', '1300', '1300', '', 6, '1', '2015-01-11 09:26:30', 'recp79'),
(80, 'Received 2 Brake padsGDB7075S (Pieces) into the warehouse', '1900', '1900', '', 6, '1', '2015-01-11 09:26:42', 'recp80'),
(81, 'Received 2 Brake  liningNQR (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:27:00', 'recp81'),
(82, 'Received 2 Brake lining ProboxBS-K2358 (Pieces) into the warehouse', '2400', '2400', '', 6, '1', '2015-01-11 09:27:11', 'recp82'),
(83, 'Received 12 Fuel Filterz700 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:27:32', 'recp83'),
(84, 'Received 12 Oil Filter6DBOB-0309-A (Pieces) into the warehouse', '7800', '7800', '', 6, '1', '2015-01-11 09:27:40', 'recp84'),
(85, 'Received 12 Air Cleaner NQR (Pieces) into the warehouse', '22200', '22200', '', 6, '1', '2015-01-11 09:27:47', 'recp85'),
(86, 'Cancelation of sales product under Invoice ', '0', '0', '', 6, '1', '2015-01-15 08:02:09', 'cns'),
(87, 'Sales for Item Air Cleaner NQR-ACNQR of the Inv No:', '1', '1', '', 6, '1', '2015-01-18 03:56:13', 'inv145'),
(88, 'Sales for Item battery water- of the Inv No:', '1', '1', '', 6, '1', '2015-01-18 03:56:13', 'inv164'),
(89, 'Sales for Item ENGINE OIL10LTRS- of the Inv No:', '1', '1', '', 6, '1', '2015-01-18 03:56:13', 'inv165'),
(90, 'Sales for Item Oil Filter6DBOB-0309-A-OF6DBOB of the Inv No:', '1', '1', '', 6, '1', '2015-01-18 03:56:13', 'inv144'),
(91, 'Sales for Item Fuel Filterz700-FFZ700 of the Inv No:', '1', '1', '', 6, '1', '2015-01-18 03:56:13', 'inv143'),
(92, 'Sales for Item Air Cleaner NQR-ACNQR of the Inv No:69', '8', '8', '', 6, '1', '2015-01-18 04:05:18', 'inv145'),
(93, 'Sales for Item battery water- of the Inv No:69', '9', '9', '', 6, '1', '2015-01-18 04:05:18', 'inv164'),
(94, 'Sales for Item Oil Filter6DBOB-0309-A-OF6DBOB of the Inv No:69', '4', '4', '', 6, '1', '2015-01-18 04:05:18', 'inv144'),
(95, 'Sales for Item Fuel Filterz700-FFZ700 of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv143'),
(96, 'Sales for Item Air Cleaner NQR-ACNQR of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv145'),
(97, 'Sales for Item battery water- of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv164'),
(98, 'Sales for Item ENGINE OIL10LTRS- of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv165'),
(99, 'Sales for Item Fuel Filterz700-FFZ700 of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv143'),
(100, 'Sales for Item Oil Filter6DBOB-0309-A-OF6DBOB of the Inv No:69', '0', '0', '', 6, '1', '2015-01-18 04:05:18', 'inv144'),
(101, 'Sales for Item Air Cleaner NQR-ACNQR of the Inv No:67', '1850', '1850', '', 6, '1', '2015-01-18 04:08:16', 'inv145'),
(102, 'Sales for Item battery water- of the Inv No:67', '120', '120', '', 6, '1', '2015-01-18 04:08:16', 'inv164'),
(103, 'Sales for Item ENGINE OIL10LTRS- of the Inv No:67', '3400', '3400', '', 6, '1', '2015-01-18 04:08:16', 'inv165'),
(104, 'Sales for Item Oil Filter6DBOB-0309-A-OF6DBOB of the Inv No:67', '650', '650', '', 6, '1', '2015-01-18 04:08:16', 'inv144'),
(105, 'Sales for Item Fuel Filterz700-FFZ700 of the Inv No:67', '150', '150', '', 6, '1', '2015-01-18 04:08:16', 'inv143'),
(106, 'Sales for Item Air Cleaner NQR-ACNQR of the Inv No:70', '-1850', '', '1850', 6, '1', '2015-01-18 04:09:17', 'inv145'),
(107, 'Sales for Item battery water- of the Inv No:70', '-120', '', '120', 6, '1', '2015-01-18 04:09:17', 'inv164'),
(108, 'Sales for Item ENGINE OIL10LTRS- of the Inv No:70', '-3400', '', '3400', 6, '1', '2015-01-18 04:09:17', 'inv165'),
(109, 'Sales for Item Oil Filter6DBOB-0309-A-OF6DBOB of the Inv No:70', '-650', '', '650', 6, '1', '2015-01-18 04:09:17', 'inv144'),
(110, 'Sales for Item Fuel Filterz700-FFZ700 of the Inv No:70', '-150', '', '150', 6, '1', '2015-01-18 04:09:17', 'inv143');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `booking_id`, `job_card_id`, `customer_id`, `invoice_no`, `currency`, `curr_rate`, `user_id`, `terms`, `date_generated`, `discount_perc`, `discount_value`, `vat`, `vat_value`, `labour_cost`, `invoice_date`, `confirm_status`) VALUES
(1, 1, 1, 1, '', 6, '1', 62, 'cash', '2014-12-18 16:17:38', '', '', 1, '', '', '2014-12-18', 0),
(2, 4, 2, 3, '', 6, '1', 0, 'Paid after 30 days', '2014-12-19 13:10:36', '', '', 0, '', '', '2014-12-19', 0),
(3, 5, 3, 4, '', 6, '1', 0, 'cash', '2014-12-19 13:53:43', '1', '', 1, '', '', '2014-12-20', 0),
(4, 6, 4, 5, '', 6, '1', 0, 'cash', '2014-12-20 11:20:12', '', '', 1, '', '', '2014-12-22', 0),
(5, 6, 4, 5, '', 6, '1', 0, 'cash', '2014-12-20 11:22:26', '', '', 1, '', '', '2014-12-22', 0),
(6, 1, 1, 1, '', 6, '1', 0, 'cash', '2014-12-23 11:54:25', '', '', 0, '', '', '2014-12-23', 0),
(7, 4, 2, 3, '', 6, '1', 0, 'cash', '2014-12-23 11:58:24', '', '', 0, '', '', '2014-12-23', 0),
(8, 13, 11, 3, '', 6, '1', 0, 'cash', '2014-12-23 12:13:40', '', '', 0, '', '', '2014-12-23', 0),
(9, 12, 10, 3, '', 6, '1', 0, 'cash', '2014-12-23 13:21:40', '', '', 1, '', '', '2014-12-23', 0),
(10, 12, 10, 3, '', 6, '1', 0, 'cash', '2014-12-23 13:22:32', '', '', 0, '', '', '2014-12-23', 0),
(11, 11, 9, 7, '', 6, '1', 0, 'cash', '2014-12-23 13:25:28', '', '', 0, '', '', '2014-12-23', 0),
(12, 8, 6, 7, '', 6, '1', 0, 'cash', '2014-12-23 14:05:55', '', '', 0, '', '', '2014-12-23', 0),
(13, 7, 5, 6, '', 6, '1', 0, 'cash', '2014-12-23 15:20:55', '', '', 1, '', '', '2014-12-23', 0),
(14, 7, 5, 6, '', 6, '1', 0, '', '2014-12-23 15:22:33', '1', '', 1, '', '', '2014-12-23', 0),
(15, 7, 5, 6, '', 6, '1', 0, 'cash', '2014-12-23 15:23:24', '1', '', 1, '', '', '2014-12-23', 0),
(16, 7, 5, 6, '', 6, '1', 0, 'cash', '2014-12-23 15:39:00', '', '', 1, '', '', '2014-12-23', 0),
(17, 15, 13, 6, '', 6, '1', 0, 'cash', '2014-12-23 16:05:24', '15', '', 1, '', '', '2014-12-23', 0),
(18, 9, 7, 7, '', 6, '1', 0, 'cash', '2014-12-23 16:31:26', '', '', 1, '', '', '2014-12-23', 0),
(19, 9, 7, 7, '', 6, '1', 0, 'cash', '2014-12-23 16:32:35', '', '', 0, '', '', '2014-12-23', 0),
(20, 10, 8, 3, '', 6, '1', 0, 'cash', '2014-12-23 16:53:22', '', '', 0, '', '', '2014-12-23', 0),
(21, 12, 10, 3, '', 6, '1', 0, 'cash', '2014-12-23 17:12:57', '', '', 0, '', '', '2014-12-23', 0),
(22, 13, 11, 3, '', 6, '1', 0, 'cash', '2014-12-23 17:16:45', '', '', 0, '', '', '2014-12-23', 0),
(23, 21, 18, 3, '', 6, '1', 0, 'cash', '2014-12-29 15:28:57', '', '', 0, '', '', '2014-12-29', 0),
(24, 22, 19, 8, '', 6, '1', 0, 'cash', '2014-12-29 17:01:51', '', '', 1, '', '', '2014-12-29', 0),
(25, 22, 19, 8, '', 6, '1', 0, 'cash', '2014-12-29 17:02:47', '', '', 1, '', '', '2014-12-29', 0),
(26, 22, 19, 8, '', 6, '1', 0, '', '2014-12-29 17:03:40', '', '', 0, '', '', '2014-12-29', 0),
(27, 20, 17, 3, '', 6, '1', 0, 'cash', '2014-12-29 17:11:35', '', '', 0, '', '', '2014-12-29', 0),
(28, 23, 20, 3, '', 6, '1', 0, 'cash', '2014-12-30 10:04:20', '', '', 0, '', '', '2014-12-30', 0),
(29, 30, 22, 3, '', 6, '1', 0, 'cash', '2014-12-31 10:35:03', '', '', 0, '', '', '2014-12-31', 0),
(30, 23, 20, 3, '', 6, '1', 0, '', '2014-12-31 10:40:50', '', '', 0, '', '', '2014-12-31', 0),
(31, 21, 18, 3, '', 6, '1', 0, '', '2014-12-31 10:43:56', '', '', 0, '', '', '2014-12-29', 0),
(32, 21, 18, 3, '', 6, '1', 0, '', '2014-12-31 10:53:38', '', '', 0, '', '', '2014-12-31', 0),
(33, 20, 17, 3, '', 6, '1', 0, '', '2014-12-31 10:55:50', '', '', 0, '', '', '2014-12-31', 0),
(34, 20, 17, 3, '', 6, '1', 0, '', '2014-12-31 16:20:33', '', '', 0, '', '', '2014-12-31', 0),
(35, 8, 6, 7, '', 6, '1', 0, '', '2014-12-31 16:24:04', '', '', 0, '', '', '2014-12-31', 0),
(36, 9, 7, 7, '', 6, '1', 0, 'cash', '2014-12-31 16:31:57', '', '', 0, '', '', '2014-12-31', 0),
(37, 10, 8, 3, '', 6, '1', 0, '', '2014-12-31 16:36:45', '', '', 0, '', '', '2014-12-31', 0),
(38, 29, 21, 3, '', 6, '1', 0, 'cash', '2015-01-02 09:15:33', '', '', 0, '', '', '2015-01-02', 0),
(39, 37, 27, 12, '', 6, '1', 0, 'cash', '2015-01-05 09:37:31', '', '', 0, '', '', '2015-01-05', 0),
(40, 37, 27, 12, '', 6, '1', 0, 'cash', '2015-01-05 09:48:51', '', '', 0, '', '', '2015-01-05', 0),
(41, 37, 27, 12, '', 6, '1', 0, 'cash', '2015-01-05 09:51:16', '', '', 0, '', '', '2015-01-05', 0),
(42, 37, 27, 12, '', 6, '1', 0, 'cash', '2015-01-05 09:52:41', '', '', 0, '', '', '2015-01-05', 0),
(43, 10, 8, 3, '', 6, '1', 0, 'cash', '2015-01-05 10:24:48', '', '', 0, '', '', '2015-01-05', 0),
(44, 12, 10, 3, '', 6, '1', 0, 'cash', '2015-01-05 10:27:43', '', '', 0, '', '', '2015-01-05', 0),
(45, 29, 21, 3, '', 6, '1', 0, 'cash', '2015-01-05 15:50:24', '', '', 0, '', '', '2015-01-05', 0),
(46, 11, 9, 7, '', 6, '1', 0, 'cash', '2015-01-05 15:54:05', '', '', 0, '', '', '2015-01-05', 0),
(47, 13, 11, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:01:18', '', '', 0, '', '', '2015-01-05', 0),
(48, 17, 14, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:04:02', '', '', 0, '', '', '2015-01-05', 0),
(49, 18, 15, 7, '', 6, '1', 0, 'cash', '2015-01-05 16:11:04', '', '', 0, '', '', '2015-01-05', 0),
(50, 18, 15, 7, '', 6, '1', 0, 'cash', '2015-01-05 16:13:04', '', '', 0, '', '', '2015-01-05', 0),
(51, 19, 16, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:16:46', '', '', 0, '', '', '2015-01-05', 0),
(52, 20, 17, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:23:58', '', '', 0, '', '', '2015-01-05', 0),
(53, 21, 18, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:25:35', '', '', 0, '', '', '2015-01-05', 0),
(54, 23, 20, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:28:39', '', '', 0, '', '', '2015-01-05', 0),
(55, 30, 22, 3, '', 6, '1', 0, 'CASH', '2015-01-05 16:32:51', '', '', 0, '', '', '2015-01-05', 0),
(56, 31, 23, 3, '', 6, '1', 0, 'CASH', '2015-01-05 16:36:57', '', '', 0, '', '', '2015-01-05', 0),
(57, 33, 25, 3, '', 6, '1', 0, 'cash', '2015-01-05 16:58:53', '', '', 0, '', '', '2015-01-05', 0),
(58, 34, 26, 3, '', 6, '1', 0, 'cash', '2015-01-05 17:00:25', '', '', 0, '', '', '2015-01-05', 0),
(59, 38, 28, 3, '', 6, '1', 0, 'cash', '2015-01-06 09:39:10', '', '', 0, '', '', '2015-01-06', 0),
(60, 42, 30, 7, '', 6, '1', 0, '', '2015-01-07 16:41:00', '', '', 0, '', '', '2015-01-07', 0),
(61, 41, 29, 3, '', 6, '1', 0, '', '2015-01-07 16:45:41', '', '', 0, '', '', '2015-01-07', 0),
(62, 9, 7, 7, '', 6, '1', 0, '', '2015-01-08 08:37:09', '', '', 0, '', '', '2015-01-08', 0),
(63, 43, 31, 7, '', 6, '1', 0, 'cash', '2015-01-10 10:36:19', '', '', 0, '', '', '2015-01-10', 0),
(64, 46, 34, 2, '', 6, '1', 0, '', '2015-01-10 10:48:08', '', '', 0, '', '', '2015-01-10', 0),
(65, 43, 31, 7, '', 6, '1', 0, 'cash', '2015-01-10 10:59:36', '', '', 0, '', '', '2015-01-10', 0),
(66, 47, 35, 14, '', 6, '1', 0, 'cash', '2015-01-10 12:42:29', '', '', 0, '', '', '2015-01-10', 2),
(67, 52, 40, 3, '', 6, '1', 0, 'cash', '2015-01-12 11:56:45', '', '', 0, '', '', '2015-01-12', 1),
(68, 52, 40, 3, '', 6, '1', 0, 'cash', '2015-01-12 11:58:28', '', '', 0, '', '', '2015-01-12', 2),
(69, 51, 39, 7, '', 6, '1', 0, 'cash', '2015-01-12 12:20:16', '', '', 0, '', '', '2015-01-12', 1),
(70, 52, 40, 3, '', 6, '1', 0, 'cash', '2015-01-12 15:26:43', '', '', 0, '', '', '2015-01-12', 1),
(71, 50, 38, 7, '', 6, '1', 0, '', '2015-01-12 15:31:04', '', '', 0, '', '', '2015-01-12', 1),
(72, 49, 37, 7, '', 6, '1', 0, 'cash', '2015-01-12 15:34:03', '', '', 0, '', '', '2015-01-12', 1),
(73, 48, 36, 7, '', 6, '1', 0, 'cash', '2015-01-12 15:35:37', '', '', 0, '', '', '2015-01-12', 1),
(74, 56, 42, 13, '', 6, '1', 0, '', '2015-01-16 09:43:33', '', '', 0, '', '', '2015-01-16', 1),
(75, 53, 41, 3, '', 6, '1', 62, '', '2015-01-16 10:27:14', '', '', 0, '', '', '2015-01-07', 2);

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

--
-- Dumping data for table `invoices`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoices_old`
--

CREATE TABLE IF NOT EXISTS `invoices_old` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `user_id` int(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoices_old`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`invoice_item_id`, `booking_id`, `job_card_id`, `invoice_id`, `item_id`, `item_quantity`, `item_cost`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 1, 2, '320', 6, '1', 62, '2014-12-18 16:17:38', 0),
(2, 1, 1, 1, 4, 2, '', 6, '1', 62, '2014-12-18 16:17:38', 0),
(3, 1, 1, 1, 5, 3, '', 6, '1', 62, '2014-12-18 16:17:38', 0),
(4, 15, 13, 17, 14, 1, '320', 6, '1', 0, '2014-12-23 16:05:24', 0),
(5, 15, 13, 17, 42, 1, '5400', 6, '1', 0, '2014-12-23 16:05:24', 0),
(6, 37, 27, 39, 107, 4, '445', 6, '1', 0, '2015-01-05 09:37:31', 0),
(7, 37, 27, 39, 108, 1, '1495', 6, '1', 0, '2015-01-05 09:37:31', 0),
(8, 37, 27, 40, 107, 4, '445', 6, '1', 0, '2015-01-05 09:48:51', 0),
(9, 37, 27, 40, 108, 1, '1300', 6, '1', 0, '2015-01-05 09:48:51', 0),
(10, 37, 27, 41, 107, 4, '445', 6, '1', 0, '2015-01-05 09:51:16', 0),
(11, 37, 27, 41, 108, 1, '1300', 6, '1', 0, '2015-01-05 09:51:16', 0),
(12, 37, 27, 42, 107, 4, '445', 6, '1', 0, '2015-01-05 09:52:41', 0),
(13, 37, 27, 42, 108, 1, '1300', 6, '1', 0, '2015-01-05 09:52:41', 0),
(14, 29, 21, 45, 71, 1, '2200', 6, '1', 0, '2015-01-05 15:50:24', 0),
(15, 29, 21, 45, 14, 1, '320', 6, '1', 0, '2015-01-05 15:50:24', 0),
(16, 47, 35, 66, 69, 1, '2000', 6, '1', 0, '2015-01-10 12:42:29', 0),
(17, 52, 40, 67, 145, 1, '2130', 6, '1', 0, '2015-01-12 11:56:45', 0),
(18, 52, 40, 67, 164, 1, '150', 6, '1', 0, '2015-01-12 11:56:45', 0),
(19, 52, 40, 67, 165, 1, '3910', 6, '1', 0, '2015-01-12 11:56:45', 0),
(20, 52, 40, 67, 144, 1, '747', 6, '1', 0, '2015-01-12 11:56:45', 0),
(21, 52, 40, 67, 143, 1, '173', 6, '1', 0, '2015-01-12 11:56:45', 0),
(22, 52, 40, 68, 145, 1, '2130', 6, '1', 0, '2015-01-12 11:58:28', 0),
(23, 52, 40, 68, 164, 1, '150', 6, '1', 0, '2015-01-12 11:58:28', 0),
(24, 52, 40, 68, 165, 1, '3910', 6, '1', 0, '2015-01-12 11:58:28', 0),
(25, 52, 40, 68, 144, 1, '747', 6, '1', 0, '2015-01-12 11:58:29', 0),
(26, 52, 40, 68, 143, 1, '173', 6, '1', 0, '2015-01-12 11:58:29', 0),
(27, 51, 39, 69, 145, 1, '2130', 6, '1', 0, '2015-01-12 12:20:17', 0),
(28, 51, 39, 69, 164, 1, '150', 6, '1', 0, '2015-01-12 12:20:17', 0),
(29, 51, 39, 69, 144, 1, '747', 6, '1', 0, '2015-01-12 12:20:17', 0),
(30, 51, 39, 69, 143, 1, '173', 6, '1', 0, '2015-01-12 12:20:17', 0),
(31, 51, 39, 69, 145, 1, '2130', 6, '1', 0, '2015-01-12 12:20:17', 0),
(32, 51, 39, 69, 164, 1, '150', 6, '1', 0, '2015-01-12 12:20:17', 0),
(33, 51, 39, 69, 165, 1, '3910', 6, '1', 0, '2015-01-12 12:20:17', 0),
(34, 51, 39, 69, 143, 1, '173', 6, '1', 0, '2015-01-12 12:20:17', 0),
(35, 51, 39, 69, 144, 1, '747', 6, '1', 0, '2015-01-12 12:20:17', 0),
(36, 52, 40, 70, 145, 1, '2130', 6, '1', 0, '2015-01-12 15:26:43', 0),
(37, 52, 40, 70, 164, 1, '150', 6, '1', 0, '2015-01-12 15:26:43', 0),
(38, 52, 40, 70, 165, 1, '3910', 6, '1', 0, '2015-01-12 15:26:43', 0),
(39, 52, 40, 70, 144, 1, '747', 6, '1', 0, '2015-01-12 15:26:43', 0),
(40, 52, 40, 70, 143, 1, '173', 6, '1', 0, '2015-01-12 15:26:43', 0),
(41, 50, 38, 71, 145, 1, '2130', 6, '1', 0, '2015-01-12 15:31:05', 0),
(42, 50, 38, 71, 165, 1, '3910', 6, '1', 0, '2015-01-12 15:31:05', 0),
(43, 50, 38, 71, 164, 1, '150', 6, '1', 0, '2015-01-12 15:31:05', 0),
(44, 50, 38, 71, 140, 1, '8500', 6, '1', 0, '2015-01-12 15:31:05', 0),
(45, 49, 37, 72, 145, 1, '2130', 6, '1', 0, '2015-01-12 15:34:04', 0),
(46, 49, 37, 72, 164, 1, '150', 6, '1', 0, '2015-01-12 15:34:04', 0),
(47, 49, 37, 72, 165, 1, '3910', 6, '1', 0, '2015-01-12 15:34:04', 0),
(48, 49, 37, 72, 144, 1, '747', 6, '1', 0, '2015-01-12 15:34:04', 0),
(49, 49, 37, 72, 143, 1, '173', 6, '1', 0, '2015-01-12 15:34:04', 0),
(50, 48, 36, 73, 145, 1, '2130', 6, '1', 0, '2015-01-12 15:35:37', 0),
(51, 48, 36, 73, 165, 1, '3910', 6, '1', 0, '2015-01-12 15:35:37', 0),
(52, 48, 36, 73, 144, 1, '747', 6, '1', 0, '2015-01-12 15:35:37', 0),
(53, 48, 36, 73, 143, 1, '173', 6, '1', 0, '2015-01-12 15:35:37', 0),
(54, 56, 42, 74, 133, 2, '518', 6, '1', 0, '2015-01-16 09:43:34', 0),
(55, 56, 42, 74, 110, 3, '403', 6, '1', 0, '2015-01-16 09:43:34', 0),
(56, 56, 42, 74, 45, 1, '160', 6, '1', 0, '2015-01-16 09:43:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE IF NOT EXISTS `invoice_payments` (
  `invoice_payment_id` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`invoice_payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `invoice_payments`
--

INSERT INTO `invoice_payments` (`invoice_payment_id`, `sales_code_id`, `client_id`, `sales_rep`, `receipt_no`, `amount_received`, `decription`, `currency_code`, `curr_rate`, `mop`, `ref_no`, `date_paid`, `client_bank`, `our_bank`, `date_received`, `status`) VALUES
(1, 0, 2, '19', 'MGSR0001/2015', '12000', '', '6', '1', '4', '56ttew', '2015-01-13', '', 0, '2015-01-13 14:21:18', 1),
(2, 0, 5, '19', 'MGSR0002/2015', '3200', '', '6', '1', '1', '5679', '2015-01-19', '', 0, '2015-01-19 15:29:13', 1),
(3, 0, 3, '19', 'MGSR0003/2015', '34000', '', '6', '1', '1', 'tyre', '2015-01-08', '', 0, '2015-01-19 16:34:03', 0);

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

--
-- Dumping data for table `invoice_paymentsold`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `invoice_task`
--

INSERT INTO `invoice_task` (`invoice_task_id`, `booking_id`, `job_card_id`, `invoice_id`, `task_name`, `task_cost`, `task_remarks`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, '17', '800', '', 6, '1', 62, '2014-12-18 16:17:38', 0),
(2, 4, 2, 2, '17', '720', 'Cells were checked, Battery Water refillled, Repired', 6, '1', 0, '2014-12-19 13:10:36', 0),
(3, 4, 2, 2, '22', '5760', 'Oil Filter was changed, Wiper was replaced', 6, '1', 0, '2014-12-19 13:10:36', 0),
(4, 5, 3, 3, '22', '2760', 'changed oil filter', 6, '1', 0, '2014-12-19 13:53:43', 0),
(5, 6, 4, 4, '0', '0', '', 6, '1', 0, '2014-12-20 11:20:12', 0),
(6, 6, 4, 5, '6', '9600', 'it was repaired', 6, '1', 0, '2014-12-20 11:22:26', 0),
(7, 1, 1, 6, '0', '0', '1. Calibrated injector pump 2. Rectified headlights.', 6, '1', 0, '2014-12-23 11:54:25', 0),
(8, 4, 2, 7, '0', '0', '', 6, '1', 0, '2014-12-23 11:58:24', 0),
(9, 13, 11, 8, '24', '2000', 'the injector pump was calibrated', 6, '1', 0, '2014-12-23 12:13:40', 0),
(10, 13, 11, 8, '26', '1000', 'the headlights were rectified', 6, '1', 0, '2014-12-23 12:13:40', 0),
(11, 12, 10, 9, '0', '0', '', 6, '1', 0, '2014-12-23 13:21:41', 0),
(12, 12, 10, 10, '24', '2000', '', 6, '1', 0, '2014-12-23 13:22:32', 0),
(13, 12, 10, 10, '35', '500', '', 6, '1', 0, '2014-12-23 13:22:32', 0),
(14, 11, 9, 11, '24', '2000', '', 6, '1', 0, '2014-12-23 13:25:28', 0),
(15, 11, 9, 11, '31', '500', '', 6, '1', 0, '2014-12-23 13:25:28', 0),
(16, 11, 9, 11, '32', '2000', '', 6, '1', 0, '2014-12-23 13:25:28', 0),
(17, 8, 6, 12, '24', '2000', '', 6, '1', 0, '2014-12-23 14:05:55', 0),
(18, 8, 6, 12, '33', '1000', '', 6, '1', 0, '2014-12-23 14:05:55', 0),
(19, 8, 6, 12, '29', '500', '', 6, '1', 0, '2014-12-23 14:05:55', 0),
(20, 7, 5, 13, '23', '1440', '', 6, '1', 0, '2014-12-23 15:20:55', 0),
(21, 7, 0, 13, '23', '1440', '', 6, '1', 62, '2014-12-23 15:21:45', 0),
(22, 7, 5, 14, '23', '1440', '', 6, '1', 0, '2014-12-23 15:22:33', 0),
(23, 7, 5, 15, '23', '1440', '', 6, '1', 0, '2014-12-23 15:23:24', 0),
(24, 7, 5, 16, '23', '1440', '', 6, '1', 0, '2014-12-23 15:39:00', 0),
(25, 15, 13, 17, '23', '1440', '', 6, '1', 0, '2014-12-23 16:05:24', 0),
(26, 9, 7, 18, '0', '0', '', 6, '1', 0, '2014-12-23 16:31:26', 0),
(27, 9, 7, 19, '24', '2000', '', 6, '1', 0, '2014-12-23 16:32:35', 0),
(28, 9, 7, 19, '35', '500', '', 6, '1', 0, '2014-12-23 16:32:35', 0),
(29, 9, 7, 19, '29', '500', '', 6, '1', 0, '2014-12-23 16:32:35', 0),
(30, 9, 7, 19, '30', '500', '', 6, '1', 0, '2014-12-23 16:32:35', 0),
(31, 10, 8, 20, '24', '2000', '', 6, '1', 0, '2014-12-23 16:53:22', 0),
(32, 10, 8, 20, '28', '500', '', 6, '1', 0, '2014-12-23 16:53:22', 0),
(33, 10, 8, 20, '27', '2000', '', 6, '1', 0, '2014-12-23 16:53:22', 0),
(34, 10, 8, 20, '26', '1000', '', 6, '1', 0, '2014-12-23 16:53:23', 0),
(35, 10, 8, 20, '28', '500', '', 6, '1', 0, '2014-12-23 16:53:23', 0),
(36, 12, 10, 21, '24', '2000', '', 6, '1', 0, '2014-12-23 17:12:58', 0),
(37, 12, 10, 21, '35', '500', '', 6, '1', 0, '2014-12-23 17:12:58', 0),
(38, 13, 11, 22, '24', '2000', '', 6, '1', 0, '2014-12-23 17:16:45', 0),
(39, 13, 11, 22, '26', '2000', '', 6, '1', 0, '2014-12-23 17:16:45', 0),
(40, 21, 18, 23, '47', '200', '2 Battery water was reffilled', 6, '1', 0, '2014-12-29 15:28:57', 0),
(41, 22, 19, 24, '0', '0', '', 6, '1', 0, '2014-12-29 17:01:51', 0),
(42, 22, 19, 25, '54', '600', '', 6, '1', 0, '2014-12-29 17:02:47', 0),
(43, 22, 19, 25, '55', '600', '', 6, '1', 0, '2014-12-29 17:02:47', 0),
(44, 22, 19, 26, '54', '600', '', 6, '1', 0, '2014-12-29 17:03:40', 0),
(45, 22, 19, 26, '55', '600', '', 6, '1', 0, '2014-12-29 17:03:41', 0),
(46, 20, 17, 27, '29', '500', '', 6, '1', 0, '2014-12-29 17:11:35', 0),
(47, 20, 17, 27, '47', '200', '', 6, '1', 0, '2014-12-29 17:11:35', 0),
(48, 23, 20, 28, '56', '960', '', 6, '1', 0, '2014-12-30 10:04:20', 0),
(49, 30, 22, 29, '29', '500', '', 6, '1', 0, '2014-12-31 10:35:03', 0),
(50, 23, 20, 30, '56', '1500', '', 6, '1', 0, '2014-12-31 10:40:50', 0),
(51, 21, 18, 31, '47', '200', '', 6, '1', 0, '2014-12-31 10:43:57', 0),
(52, 21, 18, 32, '47', '200', '2 bottles of b/water was refilled', 6, '1', 0, '2014-12-31 10:53:38', 0),
(53, 20, 17, 33, '17', '600', '', 6, '1', 0, '2014-12-31 10:55:50', 0),
(54, 20, 17, 33, '47', '200', '2 bottles of b/water was refilled', 6, '1', 0, '2014-12-31 10:55:50', 0),
(55, 20, 17, 33, '29', '500', '', 6, '1', 0, '2014-12-31 10:55:50', 0),
(56, 20, 17, 34, '17', '600', '', 6, '1', 0, '2014-12-31 16:20:33', 0),
(57, 20, 17, 34, '29', '500', '', 6, '1', 0, '2014-12-31 16:20:33', 0),
(58, 20, 17, 34, '47', '200', '', 6, '1', 0, '2014-12-31 16:20:33', 0),
(59, 8, 6, 35, '24', '2000', '', 6, '1', 0, '2014-12-31 16:24:05', 0),
(60, 8, 6, 35, '33', '1000', '', 6, '1', 0, '2014-12-31 16:24:05', 0),
(61, 8, 6, 35, '29', '500', '', 6, '1', 0, '2014-12-31 16:24:05', 0),
(62, 9, 7, 36, '24', '2000', '', 6, '1', 0, '2014-12-31 16:31:57', 0),
(63, 9, 7, 36, '35', '500', '', 6, '1', 0, '2014-12-31 16:31:57', 0),
(64, 9, 7, 36, '29', '500', '', 6, '1', 0, '2014-12-31 16:31:57', 0),
(65, 9, 7, 36, '30', '500', '', 6, '1', 0, '2014-12-31 16:31:57', 0),
(66, 10, 8, 37, '24', '2000', '', 6, '1', 0, '2014-12-31 16:36:46', 0),
(67, 10, 8, 37, '25', '2000', '', 6, '1', 0, '2014-12-31 16:36:46', 0),
(68, 10, 8, 37, '27', '2000', '', 6, '1', 0, '2014-12-31 16:36:46', 0),
(69, 10, 8, 37, '26', '1000', '', 6, '1', 0, '2014-12-31 16:36:46', 0),
(70, 10, 8, 37, '28', '500', '', 6, '1', 0, '2014-12-31 16:36:46', 0),
(71, 29, 21, 38, '63', '1500', '', 6, '1', 0, '2015-01-02 09:15:33', 0),
(72, 29, 21, 38, '28', '500', '', 6, '1', 0, '2015-01-02 09:15:33', 0),
(73, 37, 27, 39, '48', '0', '', 6, '1', 0, '2015-01-05 09:37:31', 0),
(74, 37, 27, 40, '0', '0', '', 6, '1', 0, '2015-01-05 09:48:51', 0),
(75, 37, 27, 41, '55', '500', '', 6, '1', 0, '2015-01-05 09:51:16', 0),
(76, 37, 27, 41, '22', '2300', '', 6, '1', 0, '2015-01-05 09:51:16', 0),
(77, 37, 27, 42, '22', '2300', '', 6, '1', 0, '2015-01-05 09:52:41', 0),
(78, 10, 8, 43, '24', '2000', '', 6, '1', 0, '2015-01-05 10:24:49', 0),
(79, 10, 8, 43, '25', '2000', '', 6, '1', 0, '2015-01-05 10:24:49', 0),
(80, 10, 8, 43, '27', '2000', '', 6, '1', 0, '2015-01-05 10:24:49', 0),
(81, 10, 8, 43, '28', '500', '', 6, '1', 0, '2015-01-05 10:24:49', 0),
(82, 12, 10, 44, '24', '2000', '', 6, '1', 0, '2015-01-05 10:27:43', 0),
(83, 12, 10, 44, '35', '500', '', 6, '1', 0, '2015-01-05 10:27:43', 0),
(84, 29, 0, 38, '72', '4000', '', 6, '1', 62, '2015-01-05 15:48:50', 0),
(85, 29, 21, 45, '28', '500', '', 6, '1', 0, '2015-01-05 15:50:24', 0),
(86, 29, 21, 45, '63', '1500', '', 6, '1', 0, '2015-01-05 15:50:24', 0),
(87, 29, 21, 45, '72', '4000', '', 6, '1', 0, '2015-01-05 15:50:24', 0),
(88, 11, 9, 46, '32', '2000', '', 6, '1', 0, '2015-01-05 15:54:05', 0),
(89, 11, 9, 46, '24', '2000', '', 6, '1', 0, '2015-01-05 15:54:05', 0),
(90, 11, 9, 46, '31', '500', '', 6, '1', 0, '2015-01-05 15:54:05', 0),
(91, 13, 11, 47, '24', '2000', '', 6, '1', 0, '2015-01-05 16:01:18', 0),
(92, 13, 11, 47, '26', '1000', '', 6, '1', 0, '2015-01-05 16:01:18', 0),
(93, 17, 14, 48, '29', '500', '', 6, '1', 0, '2015-01-05 16:04:02', 0),
(94, 18, 15, 49, '33', '1000', '', 6, '1', 0, '2015-01-05 16:11:04', 0),
(95, 18, 15, 50, '33', '1000', '', 6, '1', 0, '2015-01-05 16:13:04', 0),
(96, 19, 16, 51, '73', '500', '', 6, '1', 0, '2015-01-05 16:16:46', 0),
(97, 20, 17, 52, '17', '600', '', 6, '1', 0, '2015-01-05 16:23:58', 0),
(98, 20, 17, 52, '29', '500', '', 6, '1', 0, '2015-01-05 16:23:58', 0),
(99, 20, 17, 52, '47', '200', '', 6, '1', 0, '2015-01-05 16:23:58', 0),
(100, 21, 18, 53, '47', '200', '', 6, '1', 0, '2015-01-05 16:25:35', 0),
(101, 23, 20, 54, '56', '1500', '', 6, '1', 0, '2015-01-05 16:28:39', 0),
(102, 23, 20, 54, '73', '500', '', 6, '1', 0, '2015-01-05 16:28:39', 0),
(103, 30, 22, 55, '29', '500', '', 6, '1', 0, '2015-01-05 16:32:51', 0),
(104, 31, 23, 56, '64', '2000', '', 6, '1', 0, '2015-01-05 16:36:57', 0),
(105, 33, 25, 57, '67', '800', '', 6, '1', 0, '2015-01-05 16:58:53', 0),
(106, 33, 25, 57, '40', '1000', '', 6, '1', 0, '2015-01-05 16:58:53', 0),
(107, 34, 26, 58, '47', '200', '', 6, '1', 0, '2015-01-05 17:00:25', 0),
(108, 38, 28, 59, '38', '3000', '', 6, '1', 0, '2015-01-06 09:39:10', 0),
(109, 38, 28, 59, '76', '1000', '', 6, '1', 0, '2015-01-06 09:39:10', 0),
(110, 42, 30, 60, '29', '500', '', 6, '1', 0, '2015-01-07 16:41:00', 0),
(111, 41, 29, 61, '29', '500', '', 6, '1', 0, '2015-01-07 16:45:42', 0),
(112, 41, 29, 61, '77', '500', '', 6, '1', 0, '2015-01-07 16:45:42', 0),
(113, 41, 29, 61, '28', '500', '', 6, '1', 0, '2015-01-07 16:45:42', 0),
(114, 9, 7, 62, '24', '2000', '', 6, '1', 0, '2015-01-08 08:37:09', 0),
(115, 9, 7, 62, '35', '500', '', 6, '1', 0, '2015-01-08 08:37:09', 0),
(116, 9, 7, 62, '29', '500', '', 6, '1', 0, '2015-01-08 08:37:09', 0),
(117, 9, 7, 62, '30', '500', '', 6, '1', 0, '2015-01-08 08:37:09', 0),
(118, 43, 31, 63, '78', '2000', 'a new draglink was replaced', 6, '1', 0, '2015-01-10 10:36:19', 0),
(119, 43, 31, 63, '22', '4800', 'drained and refilled oil,changed oil and diesel filters,replaced air cleaner', 6, '1', 0, '2015-01-10 10:36:19', 0),
(120, 43, 31, 63, '26', '1000', 'right headlight was replaced', 6, '1', 0, '2015-01-10 10:36:19', 0),
(121, 43, 31, 63, '80', '1000', 'relay and thyrod ends were replaced', 6, '1', 0, '2015-01-10 10:36:19', 0),
(122, 46, 34, 64, '81', '1000', 'diesel was drained from the tank ', 6, '1', 0, '2015-01-10 10:48:09', 0),
(123, 43, 31, 65, '78', '2000', 'a new draglink was replaced', 6, '1', 0, '2015-01-10 10:59:36', 0),
(124, 43, 31, 65, '22', '4800', 'drained and refilled oil,changed oil and diesel filters,replaced air cleaner', 6, '1', 0, '2015-01-10 10:59:37', 0),
(125, 43, 31, 65, '26', '1000', 'right headlight was replaced', 6, '1', 0, '2015-01-10 10:59:37', 0),
(126, 43, 31, 65, '80', '1000', 'relay and thyrod ends were replaced', 6, '1', 0, '2015-01-10 10:59:37', 0),
(127, 43, 31, 65, '47', '200', '3bottles of battery water was refilled', 6, '1', 0, '2015-01-10 10:59:37', 0),
(128, 47, 35, 66, '22', '3200', 'drained and refilled engine oil', 6, '1', 0, '2015-01-10 12:42:29', 0),
(129, 52, 40, 67, '0', '0', '', 6, '1', 0, '2015-01-12 11:56:45', 0),
(130, 52, 40, 68, '22', '4800', 'drained and refilled oil,changed oil and diesel filters,replaced air cleaner', 6, '1', 0, '2015-01-12 11:58:28', 0),
(131, 52, 40, 68, '47', '200', '1 bottle of battery water was refilled', 6, '1', 0, '2015-01-12 11:58:28', 0),
(132, 51, 39, 69, '22', '4800', 'drained and refilled oil,changed oil and diesel filters,replaced air cleaner', 6, '1', 0, '2015-01-12 12:20:17', 0),
(133, 51, 39, 69, '47', '200', '1 bottle of battery water was refilled', 6, '1', 0, '2015-01-12 12:20:17', 0),
(134, 52, 40, 70, '22', '4800', 'Oil Filter was changed, Wiper was replaced', 6, '1', 0, '2015-01-12 15:26:43', 0),
(135, 52, 40, 70, '47', '200', '1 bottle of battery water was refilled', 6, '1', 0, '2015-01-12 15:26:43', 0),
(136, 50, 38, 71, '22', '4800', 'Oil Filter was changed, Wiper was replaced', 6, '1', 0, '2015-01-12 15:31:05', 0),
(137, 50, 38, 71, '47', '200', '1 bottle of battery water was refilled', 6, '1', 0, '2015-01-12 15:31:05', 0),
(138, 50, 38, 71, '33', '1000', 'a new radio was installed', 6, '1', 0, '2015-01-12 15:31:05', 0),
(139, 49, 37, 72, '22', '4800', 'Oil Filter was changed, Wiper was replaced', 6, '1', 0, '2015-01-12 15:34:03', 0),
(140, 49, 37, 72, '47', '200', '1 bottle of battery water was refilled', 6, '1', 0, '2015-01-12 15:34:04', 0),
(141, 48, 36, 73, '22', '4800', 'Oil Filter was changed, Wiper was replaced', 6, '1', 0, '2015-01-12 15:35:37', 0),
(142, 56, 42, 74, '31', '500', 'Good for real', 6, '1', 0, '2015-01-16 09:43:34', 0),
(143, 53, 41, 75, '1', '1400', 'Goods Remarks', 6, '1', 62, '2015-01-16 10:27:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `pack_size` varchar(11) NOT NULL,
  `reorder_level` varchar(100) NOT NULL,
  `curr_bp` varchar(100) NOT NULL,
  `curr_sp` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `cat_id`, `item_name`, `item_code`, `pack_size`, `reorder_level`, `curr_bp`, `curr_sp`, `description`, `status`) VALUES
(1, 1, 'Head light', 'HL678', '7', '30', '240', '320', 'good', 0),
(4, 2, 'Diesel injection pump', 'DIP', '120', '67', '2300', '3200', 'Diesel injection pump', 0),
(5, 2, 'AT transmission', 'ATT53', '200', '20', '3400', '3800', 'AT transmission', 0),
(6, 3, 'Front shock absorber', 'FSA98', '400', 'Pieces', '1800', '2200', 'Front shock absorber', 0),
(7, 5, 'Sand Paper', 'SP876', '120', 'Pieces', '1200', '3400', 'goods', 0),
(8, 5, 'Grease', '678907', 'Pieces', '10', '5600', '6200', '', 0),
(9, 5, 'Oil', 'Oil67', 'Pieces', '45', '780', '1110', '', 0),
(42, 3, 'clutch master cylinder', 'CMC01', 'Pieces', '2', '4500', '5400', '', 0),
(11, 5, 'O ring Kit ', 'OK002', 'Pieces', '10', '130', '160', '', 0),
(12, 5, 'pop rivets', 'poo3', 'Pieces', '5', '200', '250', '', 0),
(13, 5, 'cotton waste rugs', 'C0004', 'Pieces', '10', '20', '25', '', 0),
(14, 5, 'Brake fluid', 'F005', 'Pieces', '10', '130', '320', '', 0),
(15, 5, 'cable ties', 'C006', 'Pieces', '10', '50', '60', '', 0),
(16, 5, 'MASKING TAPE', 'M007', 'Pieces', '10', '60', '65', '', 0),
(17, 1, 'INSULATING TAPE', 'IN008', 'Pieces', '6', '130', '35', '', 0),
(18, 5, 'JUBILEE CLIPS', 'J009', 'Pieces', '20', '10', '10', '', 0),
(19, 5, 'ARADITE', 'AR010', 'Pieces', '10', '50', '60', '', 0),
(20, 5, 'SUPER GLUE', 'S0011', 'Pieces', '12', '30', '40', '', 0),
(21, 5, 'BATTERY TERMINAL', 'BA0012', 'Pieces', '30', '15', '25', '', 0),
(22, 1, 'BRAZING WIRE', 'BR0013', 'Pieces', '12', '90', '100', '', 0),
(23, 5, 'CLEAR SILICON TUBES', 'CL0014', 'Pieces', '12', '150', '200', '', 0),
(24, 5, 'CARBURATOR CLEANER', 'CA0015', 'Pieces', '10', '200', '250', '', 0),
(25, 5, 'DISTILLED WATER', 'DI0016', 'Pieces', '12', '100', '120', '', 0),
(26, 5, 'DRIIL BITS', 'DR00017', 'Pieces', '12', '100', '120', '', 0),
(27, 5, 'DUST MASK', 'DU0018', 'Pieces', '4', '100', '120', '', 0),
(28, 5, 'EMERY PAPERS', 'EM0019', 'Pieces', '2', '140', '150`', '', 0),
(29, 5, 'FRONT REFLECTORS', 'FR0020', 'Pieces', '20', '240', '250', '', 0),
(30, 5, 'HACKSAWB BLADES', 'HA0021', 'Pieces', '20', '90', '100', '', 0),
(31, 5, 'MOLY SLIP GREASE', 'MO 0022', 'Pieces', '20', '200', '200', '', 0),
(32, 5, 'MUTTON CLOTH', 'MU0023', 'Pieces', '10', '50', '60', '', 0),
(33, 5, 'RADIATOR COOLANT', 'RA0024', 'Pieces', '24', '150', '200', '', 0),
(34, 5, 'REAR CHEVRONS', 'RE', 'Pieces', '5', '400', '500', '0', 0),
(35, 5, 'REAR REFLECTORS', 'RA0025', 'Pieces', '24', '250', '300', '', 0),
(36, 5, 'SOLDERING WIRE', 'SO0026', 'Pieces', '12', '30', '50', '', 0),
(37, 5, 'WD 40 SPRAY', 'WD0027', 'Pieces', '6', '250', '300', '', 0),
(38, 1, 'WELDING RODS', 'WE0028', 'Pieces', '4', '150', '180', '', 0),
(39, 5, 'DEGREASER DETERGENT', 'DE0029', 'Pieces', '5', '800', '900', '', 0),
(40, 5, 'ASSORTED COPPER WASHER', 'AS0030', 'Pieces', '20', '60', '80', '', 0),
(41, 1, 'ELECTRICAL WIRE', 'EL0031', 'Pieces', '3', '1200', '1500', '', 0),
(43, 1, 'On & Off switch', 'sw', 'Pieces', '2', '100', '150', '', 0),
(44, 1, 'Single Bulb  12v', 'SUB12', 'Pieces', '10', '120', '160', '', 0),
(45, 1, ' Double Bulb 24v', 'Bud', 'Pieces', '10', '130', '160', '', 0),
(46, 1, 'Horn fuse amp10', 'HF10', 'Pieces', '12', '100', '150', '', 0),
(47, 1, 'Horn fuse amp15', 'HF15', 'Pieces', '10', '100', '150', '', 0),
(48, 5, 'Omo 500grms', 'OM', 'Pieces', '4', '145', '', '', 0),
(49, 1, ' Single Bulb 24v', 'BS24', 'Pieces', '12', '100', '150', '', 0),
(50, 1, 'Double Bulb 12V', 'DB12', 'Pieces', '12', '80', '100', '', 0),
(51, 7, 'head light helogen 24v', 'HH24', 'Pieces', '12', '500', '500', '', 0),
(52, 1, 'head light helogen 12v', 'HH12', 'Pieces', '12', '100', '120', '', 0),
(53, 1, 'indicator bulb single 24v', 'IDB24', 'Pieces', '12', '50', '58', '', 0),
(54, 1, 'indicator bulb double 12v', 'IDB12', 'Pieces', '12', '50', '58', '', 0),
(55, 5, 'Starplex grease(caltex)1/2kg', 'SPG', 'Pieces', '12', '320', '450', '', 0),
(56, 3, 'Gear mountain', 'Gm', 'Pieces', '2', '1500', '2500', '', 0),
(57, 2, 'Engine mountain', 'Em', 'Pieces', '2', '3500', '4500', '', 0),
(66, 6, 'Air filter', 'AF', 'Pieces', '5', '1100', '1265', '', 0),
(59, 4, 'Rear shock absorbers', 'RSH AB', 'Pieces', '2', '1200', '1800', '', 0),
(60, 7, 'Kingpin', 'KPN', 'Pieces', '2', '3500', '4025', '', 0),
(61, 4, 'Pilot bearings', 'PIB', 'Pieces', '3', '2000', '2500', '', 0),
(62, 3, 'Upper clutch kit', 'UPPC KIT', 'Pieces', '2', '800', '1200', '', 0),
(63, 4, 'Bottom clutch kit', 'BC KIT', 'Pieces', '2', '800', '1500', '', 0),
(64, 4, 'Ball joints', 'BLL JOI', 'Pieces', '4', '2000', '2500', '', 0),
(65, 4, 'Thyrod', 'thy', 'Pieces', '5', '1000', '1500', '', 0),
(67, 2, 'Isuzu Diesel filter', 'DF', 'Pieces', '5', '200', '500', '', 0),
(68, 2, 'Isuzu oil filter', 'ISZ O FIL', 'Pieces', '5', '550', '750', '', 0),
(69, 2, 'Engine oil5ltrs(monograde', 'EOIL', 'Pieces', '4', '1680', '2000', '', 0),
(70, 5, 'Battery acid', 'BACD', 'Pieces', '12', '150', '250', '', 0),
(71, 5, 'Gear box oil', 'Gbo', 'Pieces', '6', '1890', '2200', '', 0),
(72, 5, 'diesel', 'Ds', 'Pieces', '12', '181', '181', '', 0),
(73, 5, 'Engine oil 5ltrs multi grade', 'EOMG', 'Pieces', '10', '2050', '3000', '', 0),
(74, 6, 'Air transmission fluid 500ml', 'ATF', 'Pieces', '12', '250', '288', '', 0),
(75, 6, 'Air transmission fluid 5ltrs', 'ATF5', 'Pieces', '12', '1900', '2200', '', 0),
(76, 6, 'Air filterAA090', 'AFAA090-SUBARU LEGACY', 'Pieces', '12', '300', '345', '', 0),
(77, 6, 'Air filterAA070', 'AFAA070-SUBARU FORESTER', 'Pieces', '12', '350', '402.5', '', 0),
(78, 6, 'Air filterP2J-003', 'AFP2J-003-HONDA CRV SQUARE', 'Pieces', '12', '300', '345', '', 0),
(79, 6, 'Air filterPNB003', 'AFPNB003-HONDA CVR CYLINDER', 'Pieces', '12', '350', '403', '', 0),
(80, 6, 'Air filterEB300', 'AFEB300-NISSAN NARAVA', 'Pieces', '12', '400', '460', '', 0),
(82, 6, 'Air filteB1010', 'AF1010-TOYOTA RUSH', 'Pieces', '12', '400', '460', '', 0),
(83, 6, 'Air filterPWJ-A10', 'AFPWL-A10-HONDA FIT&HONDA AIRWAVE', 'Pieces', '12', '550', '633', '', 0),
(84, 6, 'Air filter67060', 'AF67060-PRADO', 'Pieces', '12', '550', '633', '', 0),
(85, 6, 'Air filter4M400', 'ATF4M400', 'Pieces', '12', '500', '575', '', 0),
(86, 6, 'Air filter11050', 'AF11050 starlet/duet', 'Pieces', '12', '220', '253', '', 0),
(87, 6, 'Air filter11090', 'AF11090- corolla AE90/100', 'Pieces', '12', '200', '230', '', 0),
(88, 6, 'Air filter15070', 'AF15070- Corolla 110', 'Pieces', '6', '200', '230', '', 0),
(89, 6, 'Air filter16020', 'AF16020-caldina', 'Pieces', '6', '200', '230', '', 0),
(90, 6, 'Air filter21030', 'ATF21030-probox/succeed', 'Pieces', '6', '200', '230', '', 0),
(91, 6, 'Air filter21050', 'ATF21050-corolla ZZE,New fielder, premio', 'Pieces', '6', '200', '230', '', 0),
(92, 6, 'Air filter22020', 'AF22020-NZE,Premio,allex,Noah,Fielder,Voxy,Wish', 'Pieces', '6', '200', '230', '', 0),
(93, 6, 'Air filter23030', 'AF23030-Vitz/platz', 'Pieces', '6', '200', '230', '', 0),
(94, 6, 'Air filter35020', 'ATF35020-TOWNACE,NOAH OLD MODEL', 'Pieces', '6', '220', '253', '', 0),
(95, 6, 'Air filter73C10', 'ATF73C10-NISSAN B14', 'Pieces', '6', '200', '230', '', 0),
(96, 6, 'Air filter74020', 'AF74020-PREMIOM /CARINA', 'Pieces', '6', '220', '253', '', 0),
(97, 6, 'Air filter77A10', 'AF77A10-NISSAN B13', 'Pieces', '6', '220', '253', '', 0),
(98, 6, 'Air filter41B00', 'AF41B00- NISSAN MARCH', 'Pieces', '6', '220', '253', '', 0),
(99, 6, 'Air filterV0100', 'AFV0100NISSANB15.WINGROAD,SUBARU', 'Pieces', '6', '220', '253', '', 0),
(100, 6, 'Air filter20040', 'AF20040-Rav4,Kluger,Harrier', 'Pieces', '6', '250', '288', '', 0),
(101, 6, 'Air filter2810', 'AF28010-RAV 4', 'Pieces', '6', '250', '288', '', 0),
(102, 6, 'Air filter70050', 'AF70050-RAV 4', 'Pieces', '6', '250', '288', '', 0),
(103, 6, 'Air filter74060', 'AF74060-HARRIER NEW MODEL', 'Pieces', '6', '300', '345', '', 0),
(104, 6, 'Air filterMv188', 'AFMR188657-Mitsubishi lancer', 'Pieces', '6', '250', '253', '', 0),
(105, 6, 'Air filterMv266', 'AMR266849-MITSUBISHI GALANT', 'Pieces', '6', '250', '288', '', 0),
(106, 6, 'Air filter22600', 'AF22600-Nissan,Vernette', 'Pieces', '6', '300', '345', '', 0),
(107, 6, 'Spark plugs 8H516', 'SP8H516', 'Pieces', '6', '400', '445', '', 0),
(108, 5, 'ENGINE OIL4LTRS', 'EOL4', 'Pieces', '4', '1300', '1300', '', 0),
(109, 6, 'Air filterED500', 'AFED500-NISSAN TIIDA,NOTE,NEW WING ROAD', 'Pieces', '12', '250', '288', '', 0),
(110, 6, 'Air filte31110', 'AF31110-MARK X', 'Pieces', '12', '350', '403', '', 0),
(111, 6, 'Air filter31120', 'AF31120 RAV 4', 'Pieces', '12', '300', '345', '', 0),
(112, 6, 'Air filter50040', 'AF50040-LAND CRUISER PRADO', 'Pieces', '12', '350', '403', '', 0),
(113, 6, 'Air filter97402', 'AF97402-PASSO', 'Pieces', '12', '300', '345', '', 0),
(114, 6, 'Air filter47010', 'AF47010-Air conditioner toyota', 'Pieces', '12', '350', '403', '', 0),
(115, 6, 'Fuel FilterMB220900', 'FFMB220900', 'Pieces', '12', '220', '253', '', 0),
(116, 6, 'Fuel Filter64010', 'FF64010', 'Pieces', '12', '220', '253', '', 0),
(117, 6, 'Oil Filter Toyota10001/03001', 'OF10001/03001', 'Pieces', '6', '100', '115', '', 0),
(118, 6, 'Oil Filter Toyota03006', 'OF03006', 'Pieces', '6', '250', '288', '', 0),
(119, 6, 'Oil Filter Nissan65F00', 'OF65F00', 'Pieces', '6', '120', '138', '', 0),
(120, 6, 'Oil Filter Mark x-31020/80', 'OF31020/80', 'Pieces', '6', '250', '288', '', 0),
(121, 6, 'Oil Filter Toyota Passo-37010', 'OF37010', 'Pieces', '6', '250', '288', '', 0),
(122, 6, 'Oil Filter 20001/30002', 'OF20001/30002', 'Pieces', '6', '150', '173', '', 0),
(123, 6, 'Oil Filter MD135737', 'OFMD135737', 'Pieces', '6', '120', '138', '', 0),
(124, 6, 'Spark Plugs BKR6E2756', 'SPBKR6E2756', 'Pieces', '12', '175', '202', '', 0),
(125, 6, 'Spark Plugs BP6ES-7811', 'SPBP6ES7811', 'Pieces', '12', '150', '173', '', 0),
(126, 6, 'Spark Plugs BP6EY-6278', 'SPBP6EY6278', 'Pieces', '12', '150', '173', '', 0),
(127, 6, 'Spark Plugs BCP5ES-7810', 'SPBCP5ES7810', 'Pieces', '12', '150', '184', '', 0),
(128, 6, 'Spark plugs BKR6EYA4195', 'SP BKR6EYA4195', 'Pieces', '12', '188', '215', '', 0),
(129, 6, 'Spark Plugs Denso K16Single', 'SPDK16S', 'Pieces', '12', '165', '190', '', 0),
(130, 6, 'Spark Plugs Denso K16Double', 'SPDK16D', 'Pieces', '12', '175', '202', '', 0),
(131, 6, 'Spark Plugs Denso Q20 Single', 'SPDQ20S', 'Pieces', '12', '150', '173', '', 0),
(132, 6, 'Spark Plugs  K20Double', 'SPK20D', 'Pieces', '12', '180', '207', '', 0),
(133, 6, 'Air filter06050', 'AF06050', 'Pieces', '12', '450', '518', '', 0),
(134, 7, 'Clutch plate ', 'cp', 'Pieces', '4', '4500', '5175', '', 0),
(135, 7, 'Pressure plate corolla 110', 'PPC110', 'Pieces', '4', '5000', '6325', '', 0),
(136, 6, 'Oil Filter Probox petrol', 'OF(Probox petrol)', 'Pieces', '4', '150', '173', '', 0),
(137, 6, 'Brake pads probox', 'Bpp', 'Pieces', '4', '1200', '1380', '', 0),
(138, 6, 'Air filter50060', 'AF50060 TOYOTA CROWN', 'Pieces', '12', '400', '460', '', 0),
(139, 1, 'horn relay', 'HR', 'Pieces', '24', '700', '805', '', 0),
(140, 1, 'RADIO', '', 'Pieces', '', '8000', '8500', '', 0),
(141, 1, 'battery', '', 'Pieces', '', '26000', '26500', '', 0),
(142, 6, 'Oil seal inner', '', 'Pieces', '', '450', '460', '', 0),
(143, 6, 'Fuel Filterz700', 'FFZ700', 'Pieces', '', '150', '173', '', 0),
(144, 6, 'Oil Filter6DBOB-0309-A', 'OF6DBOB', 'Pieces', '12', '650', '747', '', 0),
(145, 6, 'Air Cleaner NQR', 'ACNQR', 'Pieces', '6', '1850', '2130', '', 0),
(146, 7, 'Brake padsKD2718', 'BK2718', 'Pieces', '12', '850', '980', '', 0),
(147, 7, 'Brake padsKD2780', 'BPKD2780', 'Pieces', '12', '1300', '1495', '', 0),
(148, 7, 'Brake padsKD2701', 'BPKD2701', 'Pieces', '6', '850', '980', '', 0),
(149, 7, 'tie rod end', '', 'Pieces', '', '8000', '9200', '', 0),
(150, 7, 'drag links', '', 'Pieces', '', '13000', '14950', '', 0),
(151, 7, 'Brake padsKD2725', 'BPKD2725', 'Pieces', '6', '850', '980', '', 0),
(152, 7, 'Brake padsKD2203', 'BPKD2203', 'Pieces', '6', '900', '1035', '', 0),
(153, 7, 'Brake padsKD2208', 'BPKD2208', 'Pieces', '6', '1000', '1150', '', 0),
(154, 7, 'Brake padsKD2798', 'BPKD2798', 'Pieces', '6', '1300', '1495', '', 0),
(155, 7, 'Brake padsKD2740', 'BPKD2740', 'Pieces', '6', '750', '863', '', 0),
(156, 7, 'Brake padsKD2457', 'BPKD2457', 'Pieces', '6', '950', '1035', '', 0),
(157, 7, 'Brake padsKD1740', 'BPKD1740', 'Pieces', '6', '1000', '1150', '', 0),
(158, 7, 'Brake padsKD2739', 'BPKD2739', 'Pieces', '6', '900', '1035', '', 0),
(159, 7, 'Brake padsKD2776', 'BPKD2776', 'Pieces', '6', '750', '863', '', 0),
(160, 7, 'Brake padsKD1739', 'BPKD1739', 'Pieces', '6', '850', '980', '', 0),
(161, 7, 'Brake padsKD1735', 'BPKD1735', 'Pieces', '12', '900', '1035', '', 0),
(162, 7, 'Brake padsKD2606/07', '', 'Pieces', '12', '900', '1035', '', 0),
(163, 7, 'Brake padsGDB7075S', 'BPGDN7075S', 'Pieces', '12', '950', '1150', '', 0),
(164, 6, 'battery water', '', 'Pieces', '', '120', '150', '', 0),
(165, 6, 'ENGINE OIL10LTRS', '', 'Pieces', '', '3400', '3910', '', 0),
(166, 6, 'Oil seal outer', '', 'Pieces', '', '450', '575', '', 0),
(167, 6, 'Bearing rear outer', '', 'Pieces', '', '1700', '1955', '', 0),
(168, 6, 'Bearing rear inner', '', 'Pieces', '', '1800', '2070', '', 0),
(169, 6, 'bearing front inner', '', 'Pieces', '', '2800', '3220', '', 0),
(170, 6, 'bearing front outer', '', 'Pieces', '', '2600', '2990', '', 0),
(171, 7, 'Brake padsKD2607', 'BPKD2607/06', 'Pieces', '6', '900', '1035', '', 0),
(172, 7, 'Brake pads liningX288', 'BPLX288', 'Pieces', '6', '600', '750', '', 0),
(173, 7, 'Brake pads liningAK2342', 'AK2342', 'Pieces', '6', '650', '747', '', 0),
(175, 7, 'Brake  liningNQR', 'BPLNQ', 'Pieces', '4', '1300', '1495', '', 0),
(176, 7, 'Brake lining ProboxBS-K2358', 'BS-K2358', 'Pieces', '6', '1200', '1380', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_category`
--

CREATE TABLE IF NOT EXISTS `items_category` (
  `cat_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` longtext NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `items_category`
--

INSERT INTO `items_category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Electrical Parts', ''),
(2, 'Engine Parts', ''),
(3, 'Chassis Parts', ''),
(4, 'Body Parts', ''),
(5, 'Consumables', ''),
(6, 'service parts', ''),
(7, 'Repair parts', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE IF NOT EXISTS `jobtitles` (
  `job_title_id` int(20) NOT NULL AUTO_INCREMENT,
  `job_title_name` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`job_title_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jobtitles`
--


-- --------------------------------------------------------

--
-- Table structure for table `job_cards`
--

CREATE TABLE IF NOT EXISTS `job_cards` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `job_cards`
--

INSERT INTO `job_cards` (`job_card_id`, `booking_id`, `customer_id`, `job_card_no`, `currency`, `curr_rate`, `start_date`, `end_date`, `user_id`, `vehicle_description`, `date_generated`, `assigned_status`, `invoice_status`, `quotation_status`, `approved_quotation_status`, `closed_status`) VALUES
(1, 1, 1, '', 6, '1', '2014-12-18', '2014-12-18', 62, 'there was a dent at the back passenger door,and a scratch at the left front bumper', '2014-12-18 15:08:33', 0, 1, 0, 0, 1),
(2, 4, 3, '', 6, '1', '2014-12-19', '2014-12-19', 62, 'left headlight dim', '2014-12-19 12:45:15', 0, 1, 0, 0, 1),
(3, 5, 4, '', 6, '1', '2014-12-20', '2014-12-20', 19, 'dent on the drivers door', '2014-12-19 13:47:41', 0, 1, 0, 0, 1),
(4, 6, 5, '', 6, '1', '2014-12-22', '2014-12-22', 62, 'scratch on the rear bumper', '2014-12-20 11:18:30', 0, 1, 0, 0, 1),
(5, 7, 6, '', 6, '1', '2014-12-23', '2014-12-23', 62, 'The bus is in good condition,no dents or scratches', '2014-12-23 09:41:14', 0, 1, 0, 0, 1),
(6, 8, 7, '', 6, '1', '2014-12-23', '2014-12-23', 62, 'the bus was in good condition outer and inner appearance', '2014-12-23 10:30:19', 0, 1, 0, 0, 1),
(7, 9, 7, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 10:41:18', 0, 1, 0, 0, 1),
(8, 10, 3, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 10:50:28', 0, 1, 0, 0, 1),
(9, 11, 7, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 10:54:19', 0, 1, 0, 0, 1),
(10, 12, 3, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 11:02:44', 0, 1, 0, 0, 1),
(11, 13, 3, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 11:19:02', 0, 1, 0, 0, 1),
(12, 14, 6, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 15:46:32', 0, 0, 0, 0, 1),
(13, 15, 6, '', 6, '1', '2014-12-23', '2014-12-23', 62, '', '2014-12-23 15:55:33', 0, 1, 0, 0, 1),
(14, 17, 3, '', 6, '1', '2014-12-24', '2014-12-24', 62, '', '2014-12-24 10:25:26', 0, 1, 0, 0, 1),
(15, 18, 7, '', 6, '1', '2014-12-24', '2014-12-24', 62, '', '2014-12-24 10:33:53', 0, 1, 0, 0, 1),
(16, 19, 3, '', 6, '1', '2014-12-27', '2014-12-27', 62, '', '2014-12-27 09:13:03', 0, 1, 0, 0, 1),
(17, 20, 3, '', 6, '1', '2014-12-29', '2014-12-29', 62, '', '2014-12-29 14:27:23', 0, 1, 0, 0, 1),
(18, 21, 3, '', 6, '1', '2014-12-29', '2014-12-29', 62, '', '2014-12-29 15:18:44', 0, 1, 0, 0, 1),
(19, 22, 8, '', 6, '1', '2014-12-29', '2014-12-29', 62, '', '2014-12-29 16:46:42', 0, 1, 0, 0, 1),
(20, 23, 3, '', 6, '1', '2014-12-30', '2014-12-30', 62, '', '2014-12-30 09:50:19', 0, 1, 0, 0, 1),
(21, 29, 3, '', 6, '1', '2014-12-31', '2014-12-31', 62, '', '2014-12-31 10:27:06', 0, 1, 0, 0, 1),
(22, 30, 3, '', 6, '1', '2014-12-31', '2014-12-31', 62, '', '2014-12-31 10:31:53', 0, 1, 0, 0, 1),
(23, 31, 3, '', 6, '1', '2014-12-24', '2014-12-31', 62, '', '2014-12-31 15:57:54', 0, 1, 0, 0, 1),
(24, 32, 11, '', 6, '1', '2015-01-02', '2015-01-02', 62, '', '2015-01-02 10:02:43', 0, 0, 0, 0, 0),
(25, 33, 3, '', 6, '1', '2015-01-02', '2015-01-02', 62, '', '2015-01-02 10:50:33', 0, 1, 0, 0, 1),
(26, 34, 3, '', 6, '1', '2015-01-03', '2015-01-03', 62, '', '2015-01-03 08:41:48', 0, 1, 0, 0, 1),
(27, 37, 12, '', 6, '1', '2015-01-05', '2015-01-05', 62, 'The vehicle is in good condition it has no dents and scratch''s,it is well maintained.', '2015-01-05 08:41:07', 0, 1, 0, 0, 1),
(28, 38, 3, '', 6, '1', '2015-01-05', '2015-01-05', 62, '', '2015-01-05 16:50:43', 0, 1, 0, 0, 1),
(29, 41, 3, '', 6, '1', '2015-01-06', '2015-01-06', 62, '', '2015-01-06 15:40:59', 0, 1, 0, 0, 1),
(30, 42, 7, '', 6, '1', '2015-01-07', '2015-01-07', 62, '', '2015-01-07 15:24:33', 0, 1, 0, 0, 1),
(31, 43, 7, '', 6, '1', '2015-01-08', '2015-01-08', 62, '', '2015-01-08 09:19:41', 0, 1, 0, 0, 1),
(32, 44, 7, '', 6, '1', '2015-01-08', '2015-01-08', 62, '', '2015-01-08 17:13:13', 0, 0, 0, 0, 1),
(33, 45, 3, '', 6, '1', '2015-01-09', '2015-01-09', 62, '', '2015-01-09 08:58:05', 0, 0, 0, 0, 0),
(34, 46, 2, '', 6, '1', '2015-01-10', '2015-01-10', 62, '', '2015-01-10 10:41:07', 0, 1, 0, 0, 1),
(35, 47, 14, '', 6, '1', '2015-01-10', '2015-01-10', 62, '', '2015-01-10 11:39:16', 0, 1, 0, 0, 1),
(36, 48, 7, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:42:06', 0, 1, 0, 0, 1),
(37, 49, 7, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:44:22', 0, 1, 0, 0, 1),
(38, 50, 7, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:46:56', 0, 1, 0, 0, 1),
(39, 51, 7, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:49:37', 0, 1, 0, 0, 1),
(40, 52, 3, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:51:22', 0, 1, 0, 0, 1),
(41, 53, 3, '', 6, '1', '2015-01-12', '2015-01-12', 62, '', '2015-01-12 08:52:45', 0, 1, 0, 0, 1),
(42, 56, 13, '', 6, '1', '2015-01-05', '2015-01-14', 62, '', '2015-01-16 09:35:51', 0, 1, 0, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=143 ;

--
-- Dumping data for table `job_card_clock`
--

INSERT INTO `job_card_clock` (`job_card_clock_id`, `booking_id`, `job_card_id`, `job_card_task_id`, `task_id`, `clock_type`, `clock_technician_id`, `date_clocked`, `remarks`, `out_period`, `resume_period`) VALUES
(1, 1, 1, 1, 17, 'inn', 63, '2014-12-18 15:29:41', 'started', '', ''),
(2, 1, 1, 1, 17, 'out', 63, '2014-12-18 15:32:11', 'w4app', '0.02', ''),
(3, 1, 1, 1, 17, 'res', 63, '2014-12-18 15:33:29', '', '', '0.01'),
(4, 1, 1, 1, 17, 'fin', 63, '2014-12-18 15:37:01', 'complited', '0.07', ''),
(5, 4, 2, 5, 14, 'inn', 19, '2014-12-19 12:54:40', 'started', '', ''),
(6, 4, 2, 2, 21, 'inn', 19, '2014-12-19 12:54:50', 'started', '', ''),
(7, 4, 2, 3, 13, 'inn', 19, '2014-12-19 12:54:55', 'strtaed', '', ''),
(8, 4, 2, 4, 19, 'inn', 19, '2014-12-19 12:55:03', 'started', '', ''),
(9, 4, 2, 5, 14, 'fin', 19, '2014-12-19 12:55:32', 'finished', '0.00', ''),
(10, 4, 2, 2, 21, 'fin', 19, '2014-12-19 12:56:41', 'finished', '0.01', ''),
(11, 4, 2, 3, 13, 'fin', 19, '2014-12-19 12:56:47', 'finished', '0.01', ''),
(12, 4, 2, 4, 19, 'fin', 19, '2014-12-19 12:56:54', 'finished', '0.01', ''),
(13, 5, 3, 6, 10, 'inn', 19, '2014-12-19 13:51:52', 'started', '', ''),
(14, 5, 3, 6, 10, 'fin', 19, '2014-12-19 13:52:06', 'completed', '0.00', ''),
(15, 13, 11, 27, 6, 'inn', 63, '2014-12-23 11:26:44', 'started', '', ''),
(16, 13, 11, 27, 6, 'fin', 63, '2014-12-23 11:28:02', 'finished', '0.01', ''),
(17, 12, 10, 25, 10, 'inn', 63, '2014-12-23 11:28:38', 'started', '', ''),
(18, 12, 10, 25, 10, 'fin', 63, '2014-12-23 11:29:08', 'finished', '0.00', ''),
(19, 11, 9, 23, 2, 'inn', 63, '2014-12-23 11:30:04', 'started', '', ''),
(20, 11, 9, 23, 2, 'fin', 63, '2014-12-23 11:30:25', 'finished', '0.00', ''),
(21, 11, 9, 22, 10, 'inn', 63, '2014-12-23 11:30:44', 'started', '', ''),
(22, 11, 9, 22, 10, 'fin', 63, '2014-12-23 11:31:03', 'finished', '0.00', ''),
(23, 10, 8, 19, 10, 'inn', 63, '2014-12-23 11:31:22', 'started', '', ''),
(24, 10, 8, 19, 10, 'fin', 63, '2014-12-23 11:31:40', 'finished', '0.00', ''),
(25, 10, 8, 17, 4, 'inn', 63, '2014-12-23 11:31:55', 'started', '', ''),
(26, 10, 8, 17, 4, 'fin', 63, '2014-12-23 11:32:10', 'finished', '0.00', ''),
(27, 9, 7, 15, 10, 'inn', 63, '2014-12-23 11:32:22', 'started', '', ''),
(28, 9, 7, 15, 10, 'fin', 63, '2014-12-23 11:32:50', 'finished', '0.00', ''),
(29, 8, 6, 11, 22, 'inn', 63, '2014-12-23 11:33:24', 'started', '', ''),
(30, 8, 6, 11, 22, 'fin', 63, '2014-12-23 11:33:51', 'finished', '0.00', ''),
(31, 8, 6, 9, 14, 'inn', 63, '2014-12-23 11:34:11', 'started', '', ''),
(32, 8, 6, 9, 14, 'fin', 63, '2014-12-23 11:34:28', 'finished', '0.00', ''),
(33, 7, 5, 8, 16, 'inn', 63, '2014-12-23 11:35:01', 'started', '', ''),
(34, 7, 5, 8, 16, 'out', 63, '2014-12-23 11:36:51', 'W4P', '0.01', ''),
(35, 7, 5, 8, 23, 'res', 63, '2014-12-23 14:31:09', '', '', '2.54'),
(36, 7, 5, 8, 23, 'fin', 63, '2014-12-23 14:40:34', 'job completed', '3.05', ''),
(37, 14, 12, 28, 23, 'inn', 63, '2014-12-23 15:47:27', 'started', '', ''),
(38, 14, 12, 28, 23, 'fin', 63, '2014-12-23 15:47:40', 'completed', '0.00', ''),
(39, 13, 11, 26, 11, 'inn', 63, '2014-12-23 15:49:30', 'started', '', ''),
(40, 13, 11, 26, 11, 'fin', 63, '2014-12-23 15:56:52', 'completed', '0.07', ''),
(41, 15, 13, 29, 23, 'inn', 63, '2014-12-23 15:57:04', 'started', '', ''),
(42, 15, 13, 29, 23, 'fin', 63, '2014-12-23 16:03:23', 'completed', '0.06', ''),
(43, 9, 7, 14, 29, 'inn', 63, '2014-12-24 09:45:23', 'started', '', ''),
(44, 18, 15, 34, 33, 'inn', 63, '2014-12-24 10:34:27', 'started', '', ''),
(45, 18, 15, 34, 33, 'out', 63, '2014-12-24 10:34:39', 'W4P', '0.00', ''),
(46, 18, 15, 34, 33, 'res', 63, '2014-12-24 11:13:15', '', '', '0.38'),
(47, 18, 15, 34, 33, 'fin', 63, '2014-12-24 11:33:25', 'finished', '0.58', ''),
(48, 9, 7, 14, 29, 'fin', 63, '2014-12-24 11:53:21', 'finished', '2.07', ''),
(49, 20, 17, 37, 29, 'inn', 63, '2014-12-29 14:30:27', 'started', '', ''),
(50, 20, 17, 36, 17, 'inn', 63, '2014-12-29 14:30:42', 'started', '', ''),
(51, 20, 17, 37, 29, 'fin', 63, '2014-12-29 15:08:50', 'CMPLT', '0.38', ''),
(52, 20, 17, 36, 17, 'fin', 63, '2014-12-29 15:09:02', 'CMPLT', '0.38', ''),
(53, 22, 19, 41, 22, 'inn', 63, '2014-12-29 16:47:13', 'started', '', ''),
(54, 22, 19, 43, 55, 'inn', 63, '2014-12-29 16:58:09', 'started', '', ''),
(55, 22, 19, 42, 54, 'inn', 63, '2014-12-29 17:00:26', 'started', '', ''),
(56, 22, 19, 43, 55, 'fin', 63, '2014-12-29 17:00:39', 'completed', '0.02', ''),
(57, 22, 19, 42, 54, 'fin', 63, '2014-12-29 17:00:54', 'completed', '0.00', ''),
(58, 23, 20, 44, 56, 'inn', 63, '2014-12-30 09:50:57', 'start', '', ''),
(59, 23, 20, 44, 56, 'fin', 63, '2014-12-30 10:03:02', 'completed', '0.12', ''),
(60, 29, 21, 46, 63, 'inn', 63, '2014-12-31 10:29:07', 'start', '', ''),
(61, 29, 21, 45, 28, 'inn', 63, '2014-12-31 10:29:27', 'started', '', ''),
(62, 29, 21, 46, 63, 'out', 63, '2014-12-31 10:29:40', 'W4P', '0.00', ''),
(63, 29, 21, 45, 28, 'out', 63, '2014-12-31 10:29:51', 'W4P', '0.00', ''),
(64, 30, 22, 47, 29, 'inn', 63, '2014-12-31 10:33:59', 'started', '', ''),
(65, 30, 22, 47, 29, 'fin', 63, '2014-12-31 10:34:11', 'completed', '0.00', ''),
(66, 29, 21, 46, 63, 'res', 63, '2014-12-31 10:47:05', '', '', '0.17'),
(67, 29, 21, 45, 28, 'res', 63, '2014-12-31 10:47:09', '', '', '0.17'),
(68, 29, 21, 46, 63, 'fin', 63, '2014-12-31 11:29:21', 'cmplt', '1.00', ''),
(69, 29, 21, 45, 28, 'fin', 63, '2014-12-31 11:29:30', 'cmplt', '1.00', ''),
(70, 33, 25, 51, 67, 'inn', 63, '2015-01-02 11:02:27', 'started', '', ''),
(71, 33, 25, 51, 67, 'fin', 63, '2015-01-02 11:53:48', 'completed', '0.51', ''),
(72, 33, 25, 52, 40, 'inn', 63, '2015-01-02 11:54:03', 'started', '', ''),
(73, 33, 25, 52, 40, 'fin', 63, '2015-01-02 11:54:25', 'completed', '0.00', ''),
(74, 33, 25, 50, 66, 'inn', 63, '2015-01-02 11:54:44', 'started', '', ''),
(75, 33, 25, 50, 66, 'out', 63, '2015-01-02 11:54:59', 'W4P', '0.00', ''),
(76, 37, 27, 56, 22, 'inn', 66, '2015-01-05 09:05:25', 'started', '', ''),
(77, 37, 27, 55, 55, 'inn', 66, '2015-01-05 09:07:41', 'started', '', ''),
(78, 37, 27, 56, 22, 'out', 66, '2015-01-05 09:17:29', 'w4P', '0.12', ''),
(79, 37, 27, 56, 22, 'res', 66, '2015-01-05 09:17:37', '', '', '0.00'),
(80, 37, 27, 56, 22, 'fin', 66, '2015-01-05 09:17:52', 'FINISHED', '0.12', ''),
(81, 34, 26, 53, 47, 'inn', 19, '2015-01-05 13:49:04', 'started', '', ''),
(82, 38, 28, 59, 76, 'inn', 65, '2015-01-05 16:53:12', 'started', '', ''),
(83, 38, 28, 60, 75, 'inn', 63, '2015-01-05 16:53:59', 'started', '', ''),
(84, 34, 26, 53, 47, 'fin', 63, '2015-01-05 16:54:16', 'complete', '3.05', ''),
(85, 38, 28, 59, 76, 'fin', 65, '2015-01-06 09:11:18', 'finished', '16.18', ''),
(86, 38, 28, 60, 75, 'fin', 63, '2015-01-06 09:12:28', 'finished', '16.18', ''),
(87, 41, 29, 62, 77, 'inn', 65, '2015-01-06 15:42:30', 'started', '', ''),
(88, 41, 29, 62, 77, 'out', 65, '2015-01-06 15:43:06', 'w4p', '0.00', ''),
(89, 41, 29, 61, 29, 'inn', 66, '2015-01-06 15:49:36', 'started', '', ''),
(90, 41, 29, 63, 28, 'inn', 63, '2015-01-06 15:57:39', 'started', '', ''),
(91, 41, 29, 61, 29, 'fin', 66, '2015-01-06 16:01:37', 'completed', '0.12', ''),
(92, 42, 30, 65, 33, 'inn', 66, '2015-01-07 15:27:42', 'started', '', ''),
(93, 42, 30, 64, 29, 'inn', 65, '2015-01-07 15:36:13', 'STARTED', '', ''),
(94, 41, 29, 62, 77, 'res', 65, '2015-01-07 15:36:27', '', '', '0.00'),
(95, 41, 29, 62, 77, 'fin', 65, '2015-01-07 15:37:03', 'FINISH', '23.54', ''),
(96, 42, 30, 65, 33, 'out', 66, '2015-01-07 15:51:18', 'COMPLETED', '0.23', ''),
(97, 42, 30, 65, 33, 'res', 66, '2015-01-07 15:52:18', '', '', '0.01'),
(98, 42, 30, 65, 33, 'fin', 66, '2015-01-07 15:52:41', 'COMPLETED', '0.24', ''),
(99, 43, 31, 66, 78, 'inn', 66, '2015-01-08 09:36:48', 'started', '', ''),
(100, 43, 31, 66, 78, 'out', 66, '2015-01-08 09:37:22', 'w4p', '0.00', ''),
(101, 43, 31, 66, 78, 'res', 66, '2015-01-08 14:38:50', '', '', '5.01'),
(102, 43, 31, 66, 78, 'fin', 66, '2015-01-08 15:29:02', 'completed', '5.52', ''),
(103, 44, 32, 67, 29, 'inn', 66, '2015-01-08 17:22:06', 'started', '', ''),
(104, 44, 32, 67, 29, 'fin', 66, '2015-01-08 17:31:49', 'finished', '0.09', ''),
(105, 47, 35, 75, 54, 'inn', 66, '2015-01-10 11:41:59', 'started', '', ''),
(106, 47, 35, 75, 22, 'fin', 66, '2015-01-10 12:40:24', 'completed', '0.58', ''),
(107, 53, 41, 91, 70, 'inn', 66, '2015-01-12 08:53:28', 'Started', '', ''),
(108, 52, 40, 88, 22, 'inn', 66, '2015-01-12 08:53:41', 'started', '', ''),
(109, 51, 39, 87, 29, 'inn', 66, '2015-01-12 08:53:51', 'started', '', ''),
(110, 50, 38, 82, 22, 'inn', 66, '2015-01-12 08:54:01', 'started', '', ''),
(111, 48, 36, 76, 22, 'inn', 66, '2015-01-12 08:54:13', 'started', '', ''),
(112, 43, 31, 69, 22, 'inn', 66, '2015-01-12 08:54:25', 'started', '', ''),
(113, 53, 41, 92, 38, 'inn', 65, '2015-01-12 08:55:11', 'started', '', ''),
(114, 52, 40, 90, 35, 'inn', 65, '2015-01-12 08:55:31', 'Started', '', ''),
(115, 52, 40, 89, 47, 'inn', 65, '2015-01-12 08:55:40', 'started', '', ''),
(116, 51, 39, 86, 47, 'inn', 65, '2015-01-12 08:55:57', 'started', '', ''),
(117, 50, 38, 83, 47, 'inn', 65, '2015-01-12 08:56:10', 'started', '', ''),
(118, 49, 37, 81, 47, 'inn', 65, '2015-01-12 08:56:18', 'started', '', ''),
(119, 49, 37, 80, 35, 'inn', 65, '2015-01-12 08:56:28', 'started', '', ''),
(120, 51, 39, 85, 22, 'inn', 63, '2015-01-12 09:16:35', 'started', '', ''),
(121, 50, 38, 84, 29, 'inn', 63, '2015-01-12 09:16:42', 'started', '', ''),
(122, 49, 37, 79, 22, 'inn', 63, '2015-01-12 09:16:50', 'started', '', ''),
(123, 48, 36, 78, 29, 'inn', 63, '2015-01-12 09:16:58', 'started', '', ''),
(124, 51, 39, 85, 22, 'fin', 63, '2015-01-12 11:52:41', 'completed', '2.36', ''),
(125, 49, 37, 79, 22, 'fin', 63, '2015-01-12 11:52:56', 'completed', '2.36', ''),
(126, 48, 36, 78, 47, 'fin', 63, '2015-01-12 11:53:08', 'completed', '2.36', ''),
(127, 52, 40, 88, 22, 'fin', 66, '2015-01-12 11:53:40', 'completed', '2.59', ''),
(128, 50, 38, 82, 22, 'fin', 66, '2015-01-12 11:53:49', 'completed', '2.59', ''),
(129, 48, 36, 76, 22, 'fin', 66, '2015-01-12 11:53:59', 'completed', '2.59', ''),
(130, 43, 31, 69, 22, 'fin', 66, '2015-01-12 11:54:18', 'completed', '2.59', ''),
(131, 50, 38, 93, 33, 'inn', 65, '2015-01-12 11:54:45', 'started', '', ''),
(132, 52, 40, 89, 47, 'fin', 65, '2015-01-12 11:55:00', 'completed', '2.59', ''),
(133, 51, 39, 86, 47, 'fin', 65, '2015-01-12 11:55:14', 'completed', '2.59', ''),
(134, 50, 38, 83, 47, 'fin', 65, '2015-01-12 11:55:25', 'completed', '2.59', ''),
(135, 49, 37, 81, 47, 'fin', 65, '2015-01-12 11:55:38', 'completed', '2.59', ''),
(136, 42, 30, 64, 29, 'fin', 65, '2015-01-12 11:55:57', 'completed', '116.19', ''),
(137, 53, 41, 91, 70, 'out', 66, '2015-01-12 14:19:14', 'w4p', '5.25', ''),
(138, 53, 41, 91, 70, 'res', 66, '2015-01-12 15:28:20', '', '', '1.09'),
(139, 53, 41, 91, 70, 'fin', 66, '2015-01-12 16:37:16', 'completed', '7.43', ''),
(140, 53, 41, 92, 38, 'fin', 63, '2015-01-12 16:37:45', 'completed', '7.42', ''),
(141, 56, 42, 94, 6, 'inn', 63, '2015-01-16 09:39:34', 'started', '', ''),
(142, 56, 42, 94, 6, 'fin', 63, '2015-01-16 09:39:43', 'finished', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_card_item`
--

CREATE TABLE IF NOT EXISTS `job_card_item` (
  `job_card_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_cost` varchar(10) NOT NULL,
  `curr_id` int(10) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`job_card_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `job_card_item`
--

INSERT INTO `job_card_item` (`job_card_item_id`, `booking_id`, `job_card_id`, `item_id`, `item_quantity`, `item_cost`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`) VALUES
(1, 1, 1, 1, 2, '320', 6, '1', 62, '2014-12-18 15:08:33', 0),
(2, 4, 2, 8, 3, '6200', 6, '1', 62, '2014-12-19 12:45:16', 0),
(4, 4, 2, 5, 2, '3800', 6, '1', 62, '2014-12-19 12:45:16', 0),
(5, 4, 2, 9, 1, '1110', 6, '1', 62, '2014-12-19 12:51:34', 0),
(6, 5, 3, 4, 2, '3200', 6, '1', 19, '2014-12-19 13:47:41', 0),
(7, 5, 3, 8, 1, '6200', 6, '1', 19, '2014-12-19 13:47:41', 0),
(8, 6, 4, 0, 0, '', 6, '1', 62, '2014-12-20 11:18:30', 0),
(9, 7, 5, 0, 0, '', 6, '1', 62, '2014-12-23 09:41:14', 0),
(10, 8, 6, 0, 0, '', 6, '1', 62, '2014-12-23 10:30:19', 0),
(11, 9, 7, 0, 0, '', 6, '1', 62, '2014-12-23 10:41:19', 0),
(12, 10, 8, 0, 0, '', 6, '1', 62, '2014-12-23 10:50:28', 0),
(13, 11, 9, 0, 0, '', 6, '1', 62, '2014-12-23 10:54:19', 0),
(14, 12, 10, 0, 0, '', 6, '1', 62, '2014-12-23 11:02:44', 0),
(15, 13, 11, 0, 0, '', 6, '1', 62, '2014-12-23 11:19:02', 0),
(16, 7, 5, 42, 1, '5400', 6, '1', 62, '2014-12-23 15:15:29', 0),
(17, 7, 5, 14, 1, '320', 6, '1', 62, '2014-12-23 15:16:21', 0),
(18, 14, 12, 42, 1, '5400', 6, '1', 62, '2014-12-23 15:46:32', 0),
(19, 14, 12, 14, 1, '320', 6, '1', 62, '2014-12-23 15:46:32', 0),
(20, 15, 13, 42, 1, '5400', 6, '1', 62, '2014-12-23 15:55:33', 0),
(21, 15, 13, 14, 1, '320', 6, '1', 62, '2014-12-23 15:55:33', 0),
(22, 17, 14, 14, 2, '320', 6, '1', 62, '2014-12-24 10:25:26', 0),
(23, 18, 15, 0, 0, '', 6, '1', 62, '2014-12-24 10:33:53', 0),
(24, 17, 14, 48, 1, '145', 6, '1', 62, '2014-12-24 11:07:49', 0),
(25, 17, 14, 55, 1, '450', 6, '1', 62, '2014-12-24 11:17:41', 0),
(26, 18, 15, 43, 1, '150', 6, '1', 62, '2014-12-24 11:55:28', 0),
(27, 18, 15, 45, 1, '160', 6, '1', 62, '2014-12-24 13:19:28', 0),
(28, 19, 16, 0, 0, '', 6, '1', 62, '2014-12-27 09:13:04', 0),
(29, 20, 17, 0, 0, '', 6, '1', 62, '2014-12-29 14:27:23', 0),
(30, 20, 17, 25, 2, '120', 6, '1', 62, '2014-12-29 14:57:33', 0),
(31, 21, 18, 25, 2, '120', 6, '1', 62, '2014-12-29 15:18:44', 0),
(32, 22, 19, 0, 0, '', 6, '1', 62, '2014-12-29 16:46:42', 0),
(33, 23, 20, 0, 0, '', 6, '1', 62, '2014-12-30 09:50:19', 0),
(35, 30, 22, 0, 0, '', 6, '1', 62, '2014-12-31 10:31:53', 0),
(36, 31, 23, 0, 0, '', 6, '1', 62, '2014-12-31 15:57:54', 0),
(37, 29, 21, 72, 1, '181', 6, '1', 62, '2015-01-02 08:53:26', 0),
(38, 29, 21, 71, 1, '1500', 6, '1', 62, '2015-01-02 08:54:48', 0),
(39, 29, 21, 55, 1, '450', 6, '1', 62, '2015-01-02 08:55:23', 0),
(40, 32, 24, 0, 0, '', 6, '1', 62, '2015-01-02 10:02:43', 0),
(41, 33, 25, 55, 2, '450', 6, '1', 62, '2015-01-02 10:50:33', 0),
(42, 33, 25, 25, 2, '120', 6, '1', 62, '2015-01-02 10:50:33', 0),
(43, 34, 26, 0, 0, '', 6, '1', 62, '2015-01-03 08:41:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_card_task`
--

CREATE TABLE IF NOT EXISTS `job_card_task` (
  `job_card_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_time` varchar(100) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `flat_rate_cost` varchar(100) NOT NULL,
  `task_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `clocked_in_status` int(11) NOT NULL,
  `clocked_out_status` int(11) NOT NULL,
  `finished_status` int(11) NOT NULL,
  PRIMARY KEY (`job_card_task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `job_card_task`
--

INSERT INTO `job_card_task` (`job_card_task_id`, `booking_id`, `job_card_id`, `task_id`, `task_time`, `technician_id`, `flat_rate_cost`, `task_cost`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`, `clocked_in_status`, `clocked_out_status`, `finished_status`) VALUES
(1, 1, 1, 17, '0.5', 63, '1600', '800', 6, '1', 62, '2014-12-18 15:08:33', 0, 1, 0, 1),
(2, 4, 2, 21, '8.5', 63, '1200', '10200', 6, '1', 62, '2014-12-19 12:45:15', 0, 1, 0, 1),
(3, 4, 2, 13, '1.2', 63, '1200', '1440', 6, '1', 62, '2014-12-19 12:45:15', 0, 1, 0, 1),
(4, 4, 2, 19, '2.5', 63, '1200', '3000', 6, '1', 62, '2014-12-19 12:45:15', 0, 1, 0, 1),
(5, 4, 2, 14, '1.5', 63, '1200', '1800', 6, '1', 62, '2014-12-19 12:45:16', 0, 1, 0, 1),
(6, 5, 3, 10, '0.2', 63, '1200', '240', 6, '1', 19, '2014-12-19 13:47:41', 0, 1, 0, 1),
(7, 6, 4, 6, '8.0', 63, '1200', '9600', 6, '1', 62, '2014-12-20 11:18:30', 0, 0, 0, 0),
(8, 7, 5, 23, '1.2', 63, '1200', '1440', 6, '1', 62, '2014-12-23 09:41:14', 0, 1, 0, 1),
(9, 8, 6, 24, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:30:19', 0, 1, 0, 1),
(10, 8, 6, 33, '1', 63, '1000', '1000', 6, '1', 62, '2014-12-23 10:30:19', 0, 0, 0, 0),
(11, 8, 6, 29, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:30:19', 0, 1, 0, 1),
(12, 9, 7, 24, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:41:18', 0, 0, 0, 0),
(13, 9, 7, 35, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:41:18', 0, 0, 0, 0),
(14, 9, 7, 29, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:41:18', 0, 1, 0, 1),
(15, 9, 7, 30, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:41:19', 0, 1, 0, 1),
(16, 10, 8, 24, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:50:28', 0, 0, 0, 0),
(17, 10, 8, 25, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:50:28', 0, 1, 0, 1),
(18, 10, 8, 27, '2', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:50:28', 0, 0, 0, 0),
(19, 10, 8, 26, '1', 63, '1000', '1000', 6, '1', 62, '2014-12-23 10:50:28', 0, 1, 0, 1),
(20, 10, 8, 28, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:50:28', 0, 0, 0, 0),
(21, 11, 9, 32, '2', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:54:19', 0, 0, 0, 0),
(22, 11, 9, 31, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-23 10:54:19', 0, 1, 0, 1),
(23, 11, 9, 24, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 10:54:19', 0, 1, 0, 1),
(24, 12, 10, 24, '2.', 63, '1200', '2400', 6, '1', 62, '2014-12-23 11:02:44', 0, 0, 0, 0),
(26, 13, 11, 24, '2.', 63, '1000', '2000', 6, '1', 62, '2014-12-23 11:19:02', 0, 1, 0, 1),
(27, 13, 11, 26, '1', 63, '1000', '1000', 6, '1', 62, '2014-12-23 11:19:02', 0, 1, 0, 1),
(28, 14, 12, 23, '1.2', 63, '1200', '1440', 6, '1', 62, '2014-12-23 15:46:32', 0, 1, 0, 1),
(29, 15, 13, 23, '1.2', 63, '1200', '1440', 6, '1', 62, '2014-12-23 15:55:33', 0, 1, 0, 1),
(32, 12, 10, 35, '0.5', 63, '1200', '600', 6, '1', 62, '2014-12-23 17:08:24', 0, 0, 0, 0),
(33, 17, 14, 29, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-24 10:25:26', 0, 0, 0, 0),
(34, 18, 15, 33, '1', 63, '1000', '1000', 6, '1', 62, '2014-12-24 10:33:53', 0, 1, 0, 1),
(35, 19, 16, 73, '0.5', 66, '1000', '500', 6, '1', 62, '2014-12-27 09:13:04', 0, 0, 0, 0),
(36, 20, 17, 17, '0.6', 63, '1000', '600', 6, '1', 62, '2014-12-29 14:27:23', 0, 1, 0, 1),
(37, 20, 17, 29, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-29 14:27:23', 0, 1, 0, 1),
(38, 20, 17, 47, '0.2', 63, '1000', '200', 6, '1', 62, '2014-12-29 14:59:47', 0, 0, 0, 0),
(40, 21, 18, 47, '0.2', 63, '1000', '200', 6, '1', 62, '2014-12-29 15:19:23', 0, 0, 0, 0),
(42, 22, 19, 54, '0.5', 63, '1200', '600', 6, '1', 62, '2014-12-29 16:52:34', 0, 1, 0, 1),
(43, 22, 19, 55, '0.5', 63, '1200', '600', 6, '1', 62, '2014-12-29 16:54:30', 0, 1, 0, 1),
(44, 23, 20, 56, '1.5', 63, '1000', '1500', 6, '1', 62, '2014-12-30 09:50:19', 0, 1, 0, 1),
(45, 29, 21, 28, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-31 10:27:06', 0, 1, 0, 1),
(46, 29, 21, 63, '1.5', 63, '1000', '1500', 6, '1', 62, '2014-12-31 10:27:06', 0, 1, 0, 1),
(47, 30, 22, 29, '0.5', 63, '1000', '500', 6, '1', 62, '2014-12-31 10:31:53', 0, 1, 0, 1),
(48, 31, 23, 64, '2', 63, '1000', '2000', 6, '1', 62, '2014-12-31 15:57:54', 0, 0, 0, 0),
(49, 32, 24, 65, '0.5', 63, '1000', '500', 6, '1', 62, '2015-01-02 10:02:43', 0, 0, 0, 0),
(51, 33, 25, 67, '0.8', 63, '1000', '800', 6, '1', 62, '2015-01-02 10:50:33', 0, 1, 0, 1),
(52, 33, 25, 40, '1', 63, '1000', '1000', 6, '1', 62, '2015-01-02 10:50:33', 0, 1, 0, 1),
(53, 34, 26, 47, '0.2', 63, '1000', '200', 6, '1', 62, '2015-01-03 08:41:48', 0, 1, 0, 1),
(56, 37, 27, 22, '2.3', 66, '1000', '2300', 6, '1', 62, '2015-01-05 08:50:42', 0, 1, 0, 1),
(57, 29, 21, 72, '4', 66, '1000', '4000', 6, '1', 62, '2015-01-05 15:20:20', 0, 0, 0, 0),
(58, 23, 20, 73, '0.5', 66, '1000', '500', 6, '1', 62, '2015-01-05 16:27:17', 0, 0, 0, 0),
(59, 38, 28, 76, '1', 65, '1000', '1000', 6, '1', 62, '2015-01-05 16:50:43', 0, 1, 0, 1),
(60, 38, 28, 38, '2', 63, '1000', '2000', 6, '1', 62, '2015-01-05 16:50:43', 0, 1, 0, 1),
(61, 41, 29, 29, '0.5', 66, '1000', '500', 6, '1', 62, '2015-01-06 15:40:59', 0, 1, 0, 1),
(62, 41, 29, 77, '0.5', 65, '1000', '500', 6, '1', 62, '2015-01-06 15:40:59', 0, 1, 0, 1),
(63, 41, 29, 28, '0.5', 63, '1000', '500', 6, '1', 62, '2015-01-06 15:57:11', 0, 1, 0, 0),
(64, 42, 30, 29, '0.5', 65, '1000', '500', 6, '1', 62, '2015-01-07 15:24:33', 0, 1, 0, 1),
(65, 43, 31, 78, '2', 0, '1000', '2000', 6, '1', 62, '2015-01-08 09:19:42', 0, 0, 0, 0),
(66, 43, 31, 78, '2', 66, '1000', '2000', 6, '1', 62, '2015-01-08 09:20:08', 0, 1, 0, 1),
(67, 44, 32, 29, '0.5', 66, '1000', '500', 6, '1', 62, '2015-01-08 17:13:13', 0, 1, 0, 1),
(68, 45, 33, 79, '1', 63, '1000', '1000', 6, '1', 62, '2015-01-09 08:58:05', 0, 0, 0, 0),
(69, 43, 31, 22, '4.8', 66, '1000', '4800', 6, '1', 62, '2015-01-10 08:40:18', 0, 1, 0, 1),
(70, 43, 31, 26, '1', 65, '1000', '1000', 6, '1', 62, '2015-01-10 08:41:22', 0, 0, 0, 0),
(72, 43, 31, 80, '1', 65, '1000', '1000', 6, '1', 62, '2015-01-10 08:49:13', 0, 0, 0, 0),
(73, 46, 34, 81, '1', 65, '1000', '1000', 6, '1', 62, '2015-01-10 10:41:07', 0, 0, 0, 0),
(74, 43, 31, 47, '0.2', 65, '1000', '200', 6, '1', 62, '2015-01-10 10:56:43', 0, 0, 0, 0),
(75, 47, 35, 22, '3.2', 66, '1000', '3200', 6, '1', 62, '2015-01-10 11:39:16', 0, 1, 0, 1),
(76, 48, 36, 22, '4.8', 66, '1000', '4800', 6, '1', 62, '2015-01-12 08:42:06', 0, 1, 0, 1),
(78, 48, 36, 47, '0.2', 63, '1000', '200', 6, '1', 62, '2015-01-12 08:42:06', 0, 1, 0, 1),
(79, 49, 37, 22, '4.8', 63, '1000', '4800', 6, '1', 62, '2015-01-12 08:44:22', 0, 1, 0, 1),
(81, 49, 37, 47, '0.2', 65, '1000', '200', 6, '1', 62, '2015-01-12 08:44:22', 0, 1, 0, 1),
(82, 50, 38, 22, '4.8', 66, '1000', '4800', 6, '1', 62, '2015-01-12 08:46:57', 0, 1, 0, 1),
(83, 50, 38, 47, '0.2', 65, '1000', '200', 6, '1', 62, '2015-01-12 08:46:57', 0, 1, 0, 1),
(85, 51, 39, 22, '4.8', 63, '1000', '4800', 6, '1', 62, '2015-01-12 08:49:37', 0, 1, 0, 1),
(86, 51, 39, 47, '0.2', 65, '1000', '200', 6, '1', 62, '2015-01-12 08:49:37', 0, 1, 0, 1),
(88, 52, 40, 22, '4.8', 66, '1000', '4800', 6, '1', 62, '2015-01-12 08:51:22', 0, 1, 0, 1),
(89, 52, 40, 47, '0.2', 65, '1000', '200', 6, '1', 62, '2015-01-12 08:51:22', 0, 1, 0, 1),
(91, 53, 41, 70, '3', 66, '1000', '3000', 6, '1', 62, '2015-01-12 08:52:45', 0, 1, 0, 1),
(92, 53, 41, 38, '3', 63, '1000', '3000', 6, '1', 62, '2015-01-12 08:52:45', 0, 1, 0, 1),
(93, 50, 38, 33, '1', 65, '1000', '1000', 6, '1', 62, '2015-01-12 11:49:08', 0, 1, 0, 0),
(94, 56, 42, 6, '8.0', 63, '1000', '8000', 6, '1', 62, '2015-01-16 09:35:51', 0, 1, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `labour_cost_matrix`
--

INSERT INTO `labour_cost_matrix` (`labour_cost_matrix_id`, `task_id`, `engine_range_id`, `flat_rate_hrs`, `flat_rate_cost`, `status`) VALUES
(7, 5, 1, '7.5', 1350, 0),
(8, 5, 2, '8.5', 1680, 0),
(9, 5, 3, '8.8', 1975, 0),
(10, 3, 1, '28.0', 2200, 0),
(11, 3, 2, '29.0', 21600, 0),
(12, 3, 3, '32.0', 32000, 0),
(13, 1, 1, '3.2', 1690, 0),
(14, 1, 2, '5.4', 1978, 0),
(15, 1, 3, '1.4', 1247, 0),
(16, 2, 1, '11.0', 2190, 0),
(17, 2, 2, '12.5', 1290, 0),
(18, 2, 3, '15.0', 8900, 0),
(19, 4, 1, '12.4', 1350, 0),
(20, 4, 2, '16.2', 1872, 0),
(21, 4, 3, '16.1', 4896, 0),
(22, 17, 1, '0.5', 0, 0),
(23, 17, 2, '0.2', 1560, 0),
(24, 17, 3, '0.6', 1500, 0),
(25, 14, 1, '1.5', 1700, 0),
(26, 14, 2, '1.5', 1800, 0),
(27, 14, 3, '1.5', 1700, 0),
(28, 16, 1, '1.0', 2400, 0),
(29, 16, 2, '1.0', 2890, 0),
(30, 16, 3, '2.0', 2789, 0),
(31, 6, 1, '8.0', 10, 0),
(32, 6, 2, '19.8', 1800, 0),
(33, 6, 3, '9.5', 1478, 0),
(34, 21, 1, '4.0', 1200, 0),
(35, 21, 2, '3.2', 1695, 0),
(36, 21, 3, '8.5', 1600, 0),
(37, 22, 1, '2.3', 1412, 0),
(38, 22, 2, '3.2', 1458, 0),
(39, 22, 3, '4.8', 2100, 0),
(40, 7, 1, '3.1', 0, 0),
(41, 13, 1, '0.2', 0, 0),
(42, 13, 2, '0.8', 0, 0),
(43, 13, 3, '1.2', 0, 0),
(44, 19, 2, '1.8', 0, 0),
(45, 19, 1, '1.5', 0, 0),
(46, 19, 3, '2.5', 0, 0),
(47, 10, 1, '0.2', 0, 0),
(48, 10, 2, '1.2', 0, 0),
(49, 10, 3, '1.8', 0, 0),
(50, 23, 3, '1.2', 0, 0),
(51, 24, 3, '2.', 0, 0),
(52, 24, 2, '2.', 0, 0),
(53, 23, 2, '1.2', 0, 0),
(54, 24, 1, '1.2', 0, 0),
(55, 23, 1, '1.2', 0, 0),
(56, 25, 3, '2.', 0, 0),
(57, 25, 2, '2.', 0, 0),
(58, 25, 1, '1.8', 0, 0),
(59, 27, 3, '2', 0, 0),
(60, 27, 2, '2', 0, 0),
(61, 27, 1, '1.5', 0, 0),
(62, 35, 3, '0.5', 0, 0),
(63, 35, 2, '0.5', 0, 0),
(64, 35, 1, '0.5', 0, 0),
(65, 26, 3, '1', 0, 0),
(66, 26, 2, '0.8', 0, 0),
(67, 26, 1, '0.8', 0, 0),
(68, 33, 3, '1', 0, 0),
(69, 33, 2, '1', 0, 0),
(70, 33, 1, '1', 0, 0),
(71, 30, 3, '0.5', 0, 0),
(72, 30, 2, '0.5', 0, 0),
(73, 30, 1, '0.5', 0, 0),
(74, 31, 3, '0.5', 0, 0),
(75, 31, 2, '0.5', 0, 0),
(76, 31, 1, '0.5', 0, 0),
(77, 34, 3, '1', 0, 0),
(78, 34, 2, '1', 0, 0),
(79, 34, 1, '1', 0, 0),
(80, 28, 3, '0.5', 0, 0),
(81, 28, 2, '0.5', 0, 0),
(82, 28, 1, '0.5', 0, 0),
(83, 29, 3, '0.5', 0, 0),
(84, 29, 2, '0.5', 0, 0),
(85, 29, 1, '0.5', 0, 0),
(86, 32, 3, '2', 0, 0),
(87, 32, 1, '2', 0, 0),
(88, 32, 2, '2', 0, 0),
(89, 38, 3, '3', 0, 0),
(90, 38, 2, '2.5', 0, 0),
(91, 38, 1, '2', 0, 0),
(92, 36, 3, '0.5', 0, 0),
(93, 36, 2, '0.5', 0, 0),
(94, 36, 1, '0.2', 0, 0),
(95, 47, 3, '0.2', 0, 0),
(96, 47, 2, '0.2', 0, 0),
(97, 47, 1, '0.2', 0, 0),
(98, 46, 3, '0.2', 0, 0),
(99, 46, 2, '0.2', 0, 0),
(100, 46, 1, '0.2', 0, 0),
(101, 54, 1, '0.5', 0, 0),
(102, 55, 1, '0.5', 0, 0),
(103, 54, 2, '0.8', 0, 0),
(104, 54, 3, '1', 0, 0),
(105, 55, 2, '0.5', 0, 0),
(106, 55, 3, '0.8', 0, 0),
(107, 45, 1, '1.2', 0, 0),
(108, 45, 2, '1.2', 0, 0),
(109, 45, 3, '1.5', 0, 0),
(110, 56, 3, '1.5', 0, 0),
(111, 62, 3, '1.5', 0, 0),
(112, 63, 3, '1.5', 0, 0),
(113, 64, 3, '2', 0, 0),
(114, 65, 2, '0.1', 0, 0),
(115, 65, 1, '0.1', 0, 0),
(116, 65, 3, '0.2', 0, 0),
(117, 66, 3, '1', 0, 0),
(118, 67, 3, '0.8', 0, 0),
(119, 72, 3, '4', 0, 0),
(120, 73, 3, '0.5', 0, 0),
(121, 74, 3, '0.5', 0, 0),
(122, 40, 3, '1', 0, 0),
(123, 76, 3, '1', 0, 0),
(124, 77, 3, '0.5', 0, 0),
(125, 78, 3, '2', 0, 0),
(126, 79, 3, '1', 0, 0),
(127, 80, 3, '1', 0, 0),
(128, 81, 1, '1', 0, 0),
(129, 70, 3, '3', 0, 0),
(130, 70, 2, '2', 0, 0),
(131, 70, 1, '2', 0, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loans_ledger`
--


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

--
-- Dumping data for table `loan_given`
--


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

--
-- Dumping data for table `loan_given_repayments`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loan_received`
--

INSERT INTO `loan_received` (`loan_received_id`, `lenders_name`, `lenders_address`, `lenders_phone`, `lenders_email`, `lenders_town`, `currency_code`, `curr_rate`, `loan_amount`, `mop`, `cheque_no`, `ref_no`, `client_bank`, `our_bank`, `date_drawn`, `period_years`, `period_months`, `date_recorded`) VALUES
(1, 'Longterm View Capital Limited', '', '0723404874', 'info@ltvcapital.co.ke', '', '6', '1', '35085', 2, '000047', '', 'Family Bank', 0, ' 2015-01-12  ', 0, 2, '2015-01-12 16:32:10');

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

--
-- Dumping data for table `loan_repayments`
--


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

--
-- Dumping data for table `loan_repaymentsold`
--


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

--
-- Dumping data for table `lpo`
--


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

--
-- Dumping data for table `minor_terminologies`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `misc_expenses_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `sort_order`, `link`, `description`, `status`) VALUES
(1, 'Home', 1, '<li class="top"><a href="home.php?monitor=monitor" class="top_link"><span>Home</span></a></li>', 'Home Page', 0),
(3, 'Master', 3, '<a href="#" id="products" class="top_link"><span class="down">Master</span></a>', 'Master', 0),
(4, 'Access', 2, '<a href="#" id="services" class="top_link"><span class="down">Access</span></a>', 'Access Controll', 0),
(24, 'Settings', 2, '<a href="#" id="products" class="top_link"><span class="down">Settings</span></a>', '', 0),
(25, 'Inventory Accounts', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Inventory Accounts</span></a>', '', 0),
(6, 'Quotations', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Quotations</span></a>', 'Quotations', 0),
(7, 'General Transactions', 7, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Reports', 81, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Reports</span></a>', 'System Reports', 0),
(26, 'Point Of Sale', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Point Of Sale</span></a>', '', 0),
(27, 'General Transactions Accounts', 5, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', '', 0),
(11, 'Bookings', 3, '<a href="#" id="services" class="top_link"><span class="down">Bookings</span></a>', 'Vehicle Bookings', 0),
(31, 'Audit Trails Accounts', 10, '<a href="audit_trails.php" id="privacy" class="top_link"><span class="down">Audit Trails</span></a>', '', 0),
(13, 'Audit Trails', 100, '<li class="top"><a href="home.php?audittrails=audittrails"  class="top_link"><span>Audit Trails</span></a></li>', '', 0),
(14, 'Sales', 5, '<a href="home.php?audittrails=audittrails" id="services" class="top_link"><span class="down">Sales</span></a>', '', 0),
(16, 'Inventory', 5, '<a href="#" id="services" class="top_link"><span class="down">Inventory</span></a>', '', 0),
(17, 'Job Cards', 5, '<a href="#" id="services" class="top_link"><span class="down">Job Cards</span></a>', 'Job Cards Management', 0),
(30, 'Customers', 9, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Customers</span></a>', '', 0),
(29, 'Staff Affairs', 8, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Staff</span></a>', '', 0),
(28, 'Financials', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Financials</span></a>', '', 0),
(32, 'Banking', 5, '<a href="#" id="services" class="top_link"><span class="down">Banking</span></a>', '', 0),
(33, 'Bank Reconcilliation', 5, '<a href="#" id="services" class="top_link"><span class="down">Bank Reconcilliation</span></a>', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=268 ;

--
-- Dumping data for table `modules_submodules`
--

INSERT INTO `modules_submodules` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
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
(257, 14, 121, 0),
(258, 29, 132, 0),
(262, 29, 120, 0),
(260, 29, 226, 0),
(261, 29, 227, 0),
(264, 29, 228, 0),
(265, 14, 229, 0),
(266, 14, 230, 0),
(267, 29, 231, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mop`
--

CREATE TABLE IF NOT EXISTS `mop` (
  `mop_id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_name` varchar(100) NOT NULL,
  PRIMARY KEY (`mop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mop`
--

INSERT INTO `mop` (`mop_id`, `mop_name`) VALUES
(1, 'Cash'),
(2, 'Cheque'),
(3, 'Electronic Transfer'),
(4, 'M-pesa');

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

--
-- Dumping data for table `net_profit`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nilepet.currency`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notes_payables_ledger`
--

INSERT INTO `notes_payables_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Loan Received from Longterm View Capital Limited', '35085', '', '35085', 6, '1', '2015-01-12 16:32:10', 'lnrec1');

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

--
-- Dumping data for table `notes_receivables_ledger`
--


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

--
-- Dumping data for table `opening_stock_ledger`
--


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
  `mop_id` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `freight_charge` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`order_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `order_code_get`
--

INSERT INTO `order_code_get` (`order_code_id`, `shipper_id`, `supplier_id`, `user_id`, `lpo_no`, `mop_id`, `currency`, `curr_rate`, `freight_charge`, `comments`, `date_generated`, `status`) VALUES
(1, 4, 2, 64, 'BD0001/2014', 1, 6, '1', '0', 'To be supplied by the end of the week', '2014-12-20 12:27:33', 1),
(2, 4, 2, 64, 'BD0002/2014', 1, 6, '1', '0', 'To be supplied by the end of the week', '2014-12-20 12:31:01', 2),
(3, 4, 7, 64, 'BD0003/2014', 2, 6, '1', '0', 'TO BE DELIVERED ON ', '2014-12-20 13:34:41', 1),
(4, 4, 10, 64, 'BD0004/2014', 2, 6, '1', '', '', '2014-12-23 15:30:53', 1),
(5, 4, 26, 64, 'BD0005/2014', 2, 6, '1', '0', '', '2014-12-24 16:07:16', 1),
(6, 4, 2, 64, 'BD0006/2015', 2, 6, '1', '0', 'test', '2015-01-03 09:24:04', 2),
(43, 4, 27, 66, 'BD0043/2015', 1, 6, '1', '0', 'net 30 days', '2015-01-14 14:46:28', 2),
(12, 4, 28, 64, 'BD0012/2015', 1, 6, '1', '1', '', '2015-01-06 12:25:29', 0),
(13, 4, 28, 64, 'BD0013/2015', 1, 6, '1', '399', '', '2015-01-06 12:30:28', 0),
(14, 4, 27, 64, 'BD0014/2015', 2, 6, '1', '0', '', '2015-01-06 12:33:51', 0),
(15, 4, 27, 64, 'BD0015/2015', 2, 6, '1', '0', '', '2015-01-06 13:07:37', 2),
(16, 4, 27, 64, 'BD0016/2015', 2, 6, '1', '0', '', '2015-01-06 13:16:43', 2),
(17, 4, 27, 64, 'BD0017/2015', 2, 6, '1', '6770', '', '2015-01-06 13:25:21', 2),
(18, 4, 27, 64, 'BD0018/2015', 2, 6, '1', '0', '', '2015-01-06 13:33:07', 0),
(19, 4, 27, 64, 'BD0019/2015', 2, 6, '1', '0', '', '2015-01-07 07:49:14', 2),
(20, 4, 27, 64, 'BD0020/2015', 2, 6, '1', '0', '', '2015-01-07 07:55:04', 0),
(21, 4, 27, 64, 'BD0021/2015', 2, 6, '1', '0', '', '2015-01-07 07:59:06', 0),
(23, 4, 27, 64, 'BD0023/2015', 2, 6, '1', '0', '', '2015-01-07 08:03:43', 2),
(24, 4, 27, 64, 'BD0024/2015', 2, 6, '1', '0', '', '2015-01-07 08:15:51', 2),
(25, 4, 4, 64, 'BD0025/2015', 2, 6, '1', '0', '', '2015-01-07 12:45:18', 0),
(27, 4, 29, 64, 'BD0027/2015', 1, 6, '1', '0', '', '2015-01-08 15:53:24', 2),
(29, 4, 30, 64, 'BD0029/2015', 1, 6, '1', '6777', '', '2015-01-08 16:11:08', 0),
(30, 4, 29, 64, 'BD0030/2015', 1, 6, '1', '0', '', '2015-01-09 08:25:30', 0),
(32, 4, 29, 64, 'BD0032/2015', 1, 6, '1', '0', '', '2015-01-10 17:17:36', 1),
(33, 4, 27, 64, 'BD0033/2015', 2, 6, '1', '0', '', '2015-01-11 08:48:23', 2),
(34, 4, 31, 64, 'BD0034/2015', 2, 6, '1', '0', '', '2015-01-11 08:52:56', 2),
(35, 4, 29, 64, 'BD0035/2015', 1, 6, '1', '0', '', '2015-01-12 16:04:28', 2),
(36, 4, 3, 19, 'BD0036/2015', 3, 6, '1', '50', 'goods', '2015-01-14 03:06:59', 0),
(37, 4, 2, 162, 'BD0037/2015', 1, 6, '1', '0', 'no terems', '2015-01-14 04:46:47', 0),
(38, 4, 15, 162, 'BD0038/2015', 1, 6, '1', '670', '', '2015-01-14 04:52:26', 2),
(39, 4, 14, 162, 'BD0039/2015', 3, 6, '1', '670', '', '2015-01-14 04:54:51', 0),
(40, 4, 16, 162, 'BD0040/2015', 1, 6, '1', '670', '', '2015-01-14 04:57:34', 0),
(41, 4, 17, 19, 'BD0041/2015', 4, 6, '1', '897', 'no comment', '2015-01-14 05:10:02', 0),
(42, 4, 13, 19, 'BD0042/2015', 1, 6, '1', '456', '', '2015-01-14 06:50:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pack_size`
--

CREATE TABLE IF NOT EXISTS `pack_size` (
  `pack_size_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pack_size` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`pack_size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pack_size`
--


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

--
-- Dumping data for table `partial_invoice_payments`
--


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
  `comm_due` int(100) NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_month` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `emp_id`, `payroll_no`, `basic_pay`, `net_pay`, `unpaid_balance`, `salary_advance`, `comm_due`, `date_paid`, `payment_month`, `status`) VALUES
(8, 6, 'PS0008/2015', '', '373200 ', '', '4500  ', 0, '0000-00-00 00:00:00', 'February 2015', 1),
(6, 6, 'PS0006/2015', '', '374500 ', '', '5500  ', 0, '0000-00-00 00:00:00', 'January 2015', 1),
(7, 1, 'PS0007/2015', '', '19100 ', '', '900  ', 0, '0000-00-00 00:00:00', 'January 2015', 1),
(9, 4, 'PS0009/2015', '', '', '', '', 0, '0000-00-00 00:00:00', 'January 2015', 0),
(10, 5, 'PS0010/2015', '', '225070 ', '', '0  ', 0, '0000-00-00 00:00:00', 'January 2015', 1),
(11, 5, 'PS0011/2015', '', '37960 ', '', '3200  ', 0, '0000-00-00 00:00:00', 'February 2015', 1);

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
  `date_printed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_printed2` varchar(100) NOT NULL,
  `month_printed` varchar(100) NOT NULL,
  PRIMARY KEY (`payslip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pay_slips`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `pending_purchases_ledger`
--

INSERT INTO `pending_purchases_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Purchase Order LPO No:BD0002/2014', '3120', '3120', '', 6, '1', '2014-12-20 12:42:22', 'po2'),
(2, 'Received 2 O ring Kit - 3 inch (Pieces) into the warehouse', '-240', '', '240', 6, '1', '2014-12-20 12:43:35', 'recp1'),
(3, 'Received 21 O ring Kit - 2 inch (Pieces) into the warehouse', '-2730', '', '2730', 6, '1', '2014-12-20 12:43:48', 'recp2'),
(4, 'Received 36 O ring Kit - 3 inch (Pieces) into the warehouse', '-4320', '', '4320', 6, '1', '2014-12-20 12:44:06', 'recp3'),
(5, 'Received 34 O ring Kit - 3 inch (Pieces) into the warehouse', '-4080', '', '4080', 6, '1', '2014-12-20 12:45:36', 'recp4'),
(6, 'Received 3 O ring Kit - 2 inch (Pieces) into the warehouse', '-390', '', '390', 6, '1', '2014-12-20 12:45:45', 'recp5'),
(7, 'Purchase Order LPO No:BD0006/2015', '3560', '3560', '', 6, '1', '2015-01-03 09:26:07', 'po6'),
(8, 'Received 4 AT transmission (Pieces) into the warehouse', '-3560', '', '3560', 6, '1', '2015-01-03 13:09:48', 'recp6'),
(9, 'Purchase Order LPO No:BD0024/2015', '4000', '4000', '', 6, '1', '2015-01-07 14:12:02', 'po24'),
(10, 'Purchase Order LPO No:BD0019/2015', '20160', '20160', '', 6, '1', '2015-01-07 14:13:32', 'po19'),
(11, 'Purchase Order LPO No:BD0017/2015', '11440', '11440', '', 6, '1', '2015-01-07 14:13:58', 'po17'),
(12, 'Purchase Order LPO No:BD0016/2015', '17840', '17840', '', 6, '1', '2015-01-07 14:14:23', 'po16'),
(13, 'Purchase Order LPO No:BD0015/2015', '9700', '9700', '', 6, '1', '2015-01-07 14:15:06', 'po15'),
(14, 'Purchase Order LPO No:BD0023/2015', '13950', '13950', '', 6, '1', '2015-01-07 14:15:42', 'po23'),
(15, 'Received 10 Spark Plugs BKR6E2756 (Pieces) into the warehouse', '-1750', '', '1750', 6, '1', '2015-01-07 14:17:06', 'recp7'),
(16, 'Received 8 Spark Plugs BP6ES-7811 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:17:20', 'recp8'),
(17, 'Received 8 Spark Plugs BP6EY-6278 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:17:35', 'recp9'),
(18, 'Received 10 Spark Plugs BCP5ES-7810 (Pieces) into the warehouse', '-1600', '', '1600', 6, '1', '2015-01-07 14:17:48', 'recp10'),
(19, 'Received 8 Spark plugs BKR6EYA4195 (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-07 14:18:01', 'recp11'),
(20, 'Received 10 Spark Plugs Denso K16Single (Pieces) into the warehouse', '-1650', '', '1650', 6, '1', '2015-01-07 14:18:16', 'recp12'),
(21, 'Received 10 Spark Plugs Denso K16Double (Pieces) into the warehouse', '-1750', '', '1750', 6, '1', '2015-01-07 14:18:31', 'recp13'),
(22, 'Received 10 Spark Plugs Denso Q20 Single (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-07 14:18:41', 'recp14'),
(23, 'Received 10 Spark Plugs  K20Double (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-07 14:18:54', 'recp15'),
(24, 'Received 2 Air filterAA090 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:20:52', 'recp16'),
(25, 'Received 2 Air filterAA070 (Pieces) into the warehouse', '-700', '', '700', 6, '1', '2015-01-07 14:21:01', 'recp17'),
(26, 'Received 2 Air filterP2J-003 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:21:12', 'recp18'),
(27, 'Received 2 Air filterPNB003 (Pieces) into the warehouse', '-700', '', '700', 6, '1', '2015-01-07 14:21:26', 'recp19'),
(28, 'Received 2 Air filterEB300 (Pieces) into the warehouse', '-800', '', '800', 6, '1', '2015-01-07 14:21:36', 'recp20'),
(29, 'Received 2 Air filter50060 (Pieces) into the warehouse', '-800', '', '800', 6, '1', '2015-01-07 14:21:53', 'recp21'),
(30, 'Received 4 Air filteB1010 (Pieces) into the warehouse', '-1600', '', '1600', 6, '1', '2015-01-07 14:22:05', 'recp22'),
(31, 'Received 2 Air filterPWJ-A10 (Pieces) into the warehouse', '-1100', '', '1100', 6, '1', '2015-01-07 14:22:23', 'recp23'),
(32, 'Received 2 Air filter67060 (Pieces) into the warehouse', '-1100', '', '1100', 6, '1', '2015-01-07 14:22:34', 'recp24'),
(33, 'Received 2 Air filter47010 (Pieces) into the warehouse', '-700', '', '700', 6, '1', '2015-01-07 14:22:47', 'recp25'),
(34, 'Received 2 Air filter4M400 (Pieces) into the warehouse', '-1000', '', '1000', 6, '1', '2015-01-07 14:22:59', 'recp26'),
(35, 'Received 10 Spark plugs 8H516 (Pieces) into the warehouse', '-4000', '', '4000', 6, '1', '2015-01-07 14:23:48', 'recp27'),
(36, 'Received 6 Air filter11050 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:24:17', 'recp28'),
(37, 'Received 6 Air filter11090 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:24:30', 'recp29'),
(38, 'Received 6 Air filter15070 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:24:39', 'recp30'),
(39, 'Received 6 Air filter16020 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:24:48', 'recp31'),
(40, 'Received 6 Air filter21030 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:24:59', 'recp32'),
(41, 'Received 12 Air filter21050 (Pieces) into the warehouse', '-2640', '', '2640', 6, '1', '2015-01-07 14:26:19', 'recp33'),
(42, 'Received 12 Air filter22020 (Pieces) into the warehouse', '-2400', '', '2400', 6, '1', '2015-01-07 14:26:34', 'recp34'),
(43, 'Received 6 Air filter23030 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:26:49', 'recp35'),
(44, 'Received 2 Air filter35020 (Pieces) into the warehouse', '-440', '', '440', 6, '1', '2015-01-07 14:28:03', 'recp36'),
(45, 'Received 6 Air filter74020 (Pieces) into the warehouse', '-1320', '', '1320', 6, '1', '2015-01-07 14:28:14', 'recp37'),
(46, 'Received 6 Air filter73C10 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:28:33', 'recp38'),
(47, 'Received 6 Air filter77A10 (Pieces) into the warehouse', '-1320', '', '1320', 6, '1', '2015-01-07 14:29:48', 'recp39'),
(48, 'Received 6 Air filter41B00 (Pieces) into the warehouse', '-1320', '', '1320', 6, '1', '2015-01-07 14:29:59', 'recp40'),
(49, 'Received 12 Air filterV0100 (Pieces) into the warehouse', '-2640', '', '2640', 6, '1', '2015-01-07 14:30:54', 'recp41'),
(50, 'Received 6 Air filter20040 (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-07 14:31:03', 'recp42'),
(51, 'Received 6 Air filter2810 (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-07 14:31:16', 'recp43'),
(52, 'Received 2 Air filter70050 (Pieces) into the warehouse', '-500', '', '500', 6, '1', '2015-01-07 14:31:25', 'recp44'),
(53, 'Received 2 Air filter74060 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:31:38', 'recp45'),
(54, 'Received 2 Air filterMv188 (Pieces) into the warehouse', '-500', '', '500', 6, '1', '2015-01-07 14:31:50', 'recp46'),
(55, 'Received 2 Air filterMv266 (Pieces) into the warehouse', '-500', '', '500', 6, '1', '2015-01-07 14:32:02', 'recp47'),
(56, 'Received 2 Air filter22600 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:32:20', 'recp48'),
(57, 'Received 2 Air filterED500 (Pieces) into the warehouse', '-500', '', '500', 6, '1', '2015-01-07 14:32:31', 'recp49'),
(58, 'Received 2 Air filte31110 (Pieces) into the warehouse', '-700', '', '700', 6, '1', '2015-01-07 14:32:41', 'recp50'),
(59, 'Received 2 Air filter31120 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:33:10', 'recp51'),
(60, 'Received 2 Air filter50040 (Pieces) into the warehouse', '-700', '', '700', 6, '1', '2015-01-07 14:33:22', 'recp52'),
(61, 'Received 2 Air filter97402 (Pieces) into the warehouse', '-600', '', '600', 6, '1', '2015-01-07 14:33:35', 'recp53'),
(62, 'Received 12 Fuel FilterMB220900 (Pieces) into the warehouse', '-2640', '', '2640', 6, '1', '2015-01-07 14:34:25', 'recp54'),
(63, 'Received 12 Fuel Filter64010 (Pieces) into the warehouse', '-2640', '', '2640', 6, '1', '2015-01-07 14:34:33', 'recp55'),
(64, 'Received 12 Oil Filter Toyota10001/03001 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-07 14:34:41', 'recp56'),
(65, 'Received 12 Oil Filter Toyota03006 (Pieces) into the warehouse', '-3000', '', '3000', 6, '1', '2015-01-07 14:34:52', 'recp57'),
(66, 'Received 12 Oil Filter Nissan65F00 (Pieces) into the warehouse', '-1440', '', '1440', 6, '1', '2015-01-07 14:35:07', 'recp58'),
(67, 'Received 12 Oil Filter Mark x-31020/80 (Pieces) into the warehouse', '-3000', '', '3000', 6, '1', '2015-01-07 14:35:22', 'recp59'),
(68, 'Received 12 Oil Filter Toyota Passo-37010 (Pieces) into the warehouse', '-3000', '', '3000', 6, '1', '2015-01-07 14:35:32', 'recp60'),
(69, 'Received 12 Oil Filter 20001/30002 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-07 14:35:44', 'recp61'),
(70, 'Received 12 Oil Filter MD135737 (Pieces) into the warehouse', '-1440', '', '1440', 6, '1', '2015-01-07 14:35:56', 'recp62'),
(71, 'Purchase Order LPO No:BD0034/2015', '34550', '34550', '', 6, '1', '2015-01-11 09:17:19', 'po34'),
(72, 'Purchase Order LPO No:BD0033/2015', '31800', '31800', '', 6, '1', '2015-01-11 09:17:33', 'po33'),
(73, 'Received 2 Brake padsKD2718 (Pieces) into the warehouse', '-1700', '', '1700', 6, '1', '2015-01-11 09:18:03', 'recp63'),
(74, 'Received 2 Brake padsKD2780 (Pieces) into the warehouse', '-2600', '', '2600', 6, '1', '2015-01-11 09:18:15', 'recp64'),
(75, 'Received 2 Brake padsKD2701 (Pieces) into the warehouse', '-1700', '', '1700', 6, '1', '2015-01-11 09:18:23', 'recp65'),
(76, 'Received 2 Brake padsKD2725 (Pieces) into the warehouse', '-1700', '', '1700', 6, '1', '2015-01-11 09:18:33', 'recp66'),
(77, 'Received 2 Brake padsKD2203 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-11 09:18:43', 'recp67'),
(78, 'Received 1 Brake padsKD2208 (Pieces) into the warehouse', '-1000', '', '1000', 6, '1', '2015-01-11 09:24:03', 'recp68'),
(79, 'Received 2 Brake padsKD2798 (Pieces) into the warehouse', '-2600', '', '2600', 6, '1', '2015-01-11 09:24:14', 'recp69'),
(80, 'Received 2 Brake padsKD2740 (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-11 09:24:27', 'recp70'),
(81, 'Received 1 Brake padsKD2457 (Pieces) into the warehouse', '-950', '', '950', 6, '1', '2015-01-11 09:24:45', 'recp71'),
(82, 'Received 1 Brake padsKD1740 (Pieces) into the warehouse', '-1000', '', '1000', 6, '1', '2015-01-11 09:25:13', 'recp72'),
(83, 'Received 2 Brake padsKD2739 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-11 09:25:27', 'recp73'),
(84, 'Received 2 Brake padsKD2776 (Pieces) into the warehouse', '-1500', '', '1500', 6, '1', '2015-01-11 09:25:36', 'recp74'),
(85, 'Received 2 Brake padsKD1739 (Pieces) into the warehouse', '-1700', '', '1700', 6, '1', '2015-01-11 09:25:45', 'recp75'),
(86, 'Received 2 Brake padsKD1735 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-11 09:25:59', 'recp76'),
(87, 'Received 2 Brake padsKD2606/07 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-11 09:26:09', 'recp77'),
(88, 'Received 2 Brake pads liningX288 (Pieces) into the warehouse', '-1200', '', '1200', 6, '1', '2015-01-11 09:26:19', 'recp78'),
(89, 'Received 2 Brake pads liningAK2342 (Pieces) into the warehouse', '-1300', '', '1300', 6, '1', '2015-01-11 09:26:30', 'recp79'),
(90, 'Received 2 Brake padsGDB7075S (Pieces) into the warehouse', '-1900', '', '1900', 6, '1', '2015-01-11 09:26:42', 'recp80'),
(91, 'Received 2 Brake  liningNQR (Pieces) into the warehouse', '-2600', '', '2600', 6, '1', '2015-01-11 09:27:00', 'recp81'),
(92, 'Received 2 Brake lining ProboxBS-K2358 (Pieces) into the warehouse', '-2400', '', '2400', 6, '1', '2015-01-11 09:27:11', 'recp82'),
(93, 'Received 12 Fuel Filterz700 (Pieces) into the warehouse', '-1800', '', '1800', 6, '1', '2015-01-11 09:27:32', 'recp83'),
(94, 'Received 12 Oil Filter6DBOB-0309-A (Pieces) into the warehouse', '-7800', '', '7800', 6, '1', '2015-01-11 09:27:40', 'recp84'),
(95, 'Received 12 Air Cleaner NQR (Pieces) into the warehouse', '-22200', '', '22200', 6, '1', '2015-01-11 09:27:47', 'recp85'),
(96, 'Purchase Order LPO No:BD0027/2015', '8900', '8900', '', 6, '1', '2015-01-14 06:21:33', 'po27'),
(97, 'Purchase Order LPO No:BD0038/2015', '5927', '5927', '', 6, '1', '2015-01-14 07:01:24', 'po38'),
(98, 'Purchase Order LPO No:BD0043/2015', '531', '531', '', 6, '1', '2015-01-14 14:48:28', 'po43'),
(99, 'Purchase Order LPO No:BD0035/2015', '1000', '1000', '', 6, '1', '2015-01-16 14:32:10', 'po35');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
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
  `year_recorded` varchar(10) NOT NULL,
  PRIMARY KEY (`ploughed_back_dividend`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ploughed_back_dividend`
--


-- --------------------------------------------------------

--
-- Table structure for table `prepaid_expenses`
--

CREATE TABLE IF NOT EXISTS `prepaid_expenses` (
  `prepaid_expenses_id` int(10) NOT NULL AUTO_INCREMENT,
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

--
-- Dumping data for table `prepaid_expenses`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prepaid_expenses_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `prepaid_salary_ledger`
--

INSERT INTO `prepaid_salary_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Deduction of Salary Advance From Staff : Jonah  JOnah  Jonah for the month of December 2014', '- ', ' ', ' ', 6, '1', '2014-12-19 13:13:56', 'payrol1'),
(2, 'Deduction of Salary Advance From Staff : Frankline Lagat     for the month of February 2015', '- ', ' ', ' ', 6, '1', '2015-01-14 07:46:18', 'payrol4'),
(3, 'Deduction of Salary Advance From Staff :  Issack     for the month of February 2015', '- ', ' ', ' ', 6, '1', '2015-01-14 07:49:39', 'payrol5'),
(4, 'Deduction of Salary Advance From Staff :  Issack     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-14 07:53:26', 'payrol6'),
(6, 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 06:25:22', 'payrol11'),
(7, 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 06:25:49', 'payrol11'),
(8, 'Deduction of Salary Advance From Staff : Frankline Lagat     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 06:31:43', 'payrol10'),
(9, 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 06:51:07', 'payrol11'),
(10, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 07:30:57', 'payrol14'),
(11, 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 07:34:08', 'payrol15'),
(12, 'Deduction of Salary Advance From Staff :  JOan        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-15 07:49:28', 'payrol18'),
(13, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-18 06:38:49', 'payrol21'),
(14, 'Deduction of Salary Advance From Staff :  JOan           for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-18 07:46:59', 'payrol3'),
(15, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-18 07:47:04', 'payrol1'),
(16, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-18 07:51:07', 'payrol2'),
(17, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-18 07:54:53', 'payrol2'),
(18, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-19 01:53:52', 'payrol1'),
(19, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-19 02:21:10', 'payrol1'),
(20, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-19 02:38:45', 'payrol1'),
(21, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', ' ', ' ', 6, '1', '2015-01-19 02:46:20', 'payrol2'),
(22, 'Advance Payments To : Frankline Lagat       ', '10000', '10000', '', 6, '1', '2015-01-19 04:38:58', 'sadv1'),
(23, 'Advance Payments To :  Joakim    ', '12000', '12000', '', 6, '1', '2015-01-19 04:44:42', 'sadv2'),
(24, 'Advance Payments To : Jonah    JOnah    Jonah  ', '6000', '6000', '', 6, '1', '2015-01-19 04:45:31', 'sadv3'),
(25, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', ' ', '4500 ', 6, '1', '2015-01-19 07:30:17', 'payrol19'),
(26, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', ' ', '4500 ', 6, '1', '2015-01-19 07:34:20', 'payrol1'),
(27, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', '- ', ' ', ' ', 6, '1', '2015-01-19 08:52:02', 'payrol5'),
(28, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', ' ', '4500 ', 6, '1', '2015-01-19 08:52:07', 'payrol4'),
(29, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', '-4500  ', ' ', '4500  ', 6, '1', '2015-01-20 03:01:33', 'payrol8'),
(30, 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-5500  ', ' ', '5500  ', 6, '1', '2015-01-20 03:02:38', 'payrol6'),
(31, 'Advance Payments To :  Issack          ', '5000', '5000', '', 6, '1', '2015-01-20 06:25:50', 'sadv4');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `product_name`, `prod_code`, `pack_size`, `weight`, `reorder_level`, `curr_sp`, `curr_bp`, `currency_code`, `exchange_rate`, `status`) VALUES
(1, 1, 'Head light', 'HL678', 'Pieces', '', '30', '320', '240', '6', '1', 0),
(4, 2, 'Diesel injection pump', 'DIP', 'Pieces', '', '67', '3200', '2300', '6', '1', 0),
(5, 2, 'AT transmission', 'ATT53', 'Pieces', '', '20', '3800', '3400', '6', '1', 0),
(6, 3, 'Front shock absorber', 'FSA98', 'Pieces', '', 'Pieces', '2200', '1800', '6', '1', 0),
(7, 5, 'Sand Paper', 'SP876', 'Pieces', '', '120', '3400', '1200', '6', '1', 0),
(8, 5, 'Grease', '678907', 'Pieces', '', '10', '6200', '5600', '6', '1', 0),
(9, 5, 'Oil', 'Oil67', 'Pieces', '', '45', '1110', '780', '6', '1', 0),
(42, 3, 'clutch master cylinder', 'CMC01', 'Pieces', '', '2', '5400', '4500', '6', '1', 0),
(11, 5, 'O ring Kit ', 'OK002', 'Pieces', '', '10', '160', '130', '6', '1', 0),
(12, 5, 'pop rivets', 'poo3', 'Pieces', '', '5', '250', '200', '6', '1', 0),
(13, 5, 'cotton waste rugs', 'C0004', 'Pieces', '', '10', '25', '20', '6', '1', 0),
(14, 5, 'Brake fluid', 'F005', 'Pieces', '', '10', '320', '130', '6', '1', 0),
(15, 5, 'cable ties', 'C006', 'Pieces', '', '10', '60', '50', '6', '1', 0),
(16, 5, 'MASKING TAPE', 'M007', 'Pieces', '', '10', '65', '60', '6', '1', 0),
(17, 1, 'INSULATING TAPE', 'IN008', 'Pieces', '', '6', '35', '130', '6', '1', 0),
(18, 5, 'JUBILEE CLIPS', 'J009', 'Pieces', '', '20', '10', '10', '6', '1', 0),
(19, 5, 'ARADITE', 'AR010', 'Pieces', '', '10', '60', '50', '6', '1', 0),
(20, 5, 'SUPER GLUE', 'S0011', 'Pieces', '', '12', '40', '30', '6', '1', 0),
(21, 5, 'BATTERY TERMINAL', 'BA0012', 'Pieces', '', '30', '25', '15', '6', '1', 0),
(22, 1, 'BRAZING WIRE', 'BR0013', 'Pieces', '', '12', '100', '90', '6', '1', 0),
(23, 5, 'CLEAR SILICON TUBES', 'CL0014', 'Pieces', '', '12', '200', '150', '6', '1', 0),
(24, 5, 'CARBURATOR CLEANER', 'CA0015', 'Pieces', '', '10', '250', '200', '6', '1', 0),
(25, 5, 'DISTILLED WATER', 'DI0016', 'Pieces', '', '12', '120', '100', '6', '1', 0),
(26, 5, 'DRIIL BITS', 'DR00017', 'Pieces', '', '12', '120', '100', '6', '1', 0),
(27, 5, 'DUST MASK', 'DU0018', 'Pieces', '', '4', '120', '100', '6', '1', 0),
(28, 5, 'EMERY PAPERS', 'EM0019', 'Pieces', '', '2', '150`', '140', '6', '1', 0),
(29, 5, 'FRONT REFLECTORS', 'FR0020', 'Pieces', '', '20', '250', '240', '6', '1', 0),
(30, 5, 'HACKSAWB BLADES', 'HA0021', 'Pieces', '', '20', '100', '90', '6', '1', 0),
(31, 5, 'MOLY SLIP GREASE', 'MO 0022', 'Pieces', '', '20', '200', '200', '6', '1', 0),
(32, 5, 'MUTTON CLOTH', 'MU0023', 'Pieces', '', '10', '60', '50', '6', '1', 0),
(33, 5, 'RADIATOR COOLANT', 'RA0024', 'Pieces', '', '24', '200', '150', '6', '1', 0),
(34, 5, 'REAR CHEVRONS', 'RE', 'Pieces', '', '5', '500', '400', '6', '1', 0),
(35, 5, 'REAR REFLECTORS', 'RA0025', 'Pieces', '', '24', '300', '250', '6', '1', 0),
(36, 5, 'SOLDERING WIRE', 'SO0026', 'Pieces', '', '12', '50', '30', '6', '1', 0),
(37, 5, 'WD 40 SPRAY', 'WD0027', 'Pieces', '', '6', '300', '250', '6', '1', 0),
(38, 1, 'WELDING RODS', 'WE0028', 'Pieces', '', '4', '180', '150', '6', '1', 0),
(39, 5, 'DEGREASER DETERGENT', 'DE0029', 'Pieces', '', '5', '900', '800', '6', '1', 0),
(40, 5, 'ASSORTED COPPER WASHER', 'AS0030', 'Pieces', '', '20', '80', '60', '6', '1', 0),
(41, 1, 'ELECTRICAL WIRE', 'EL0031', 'Pieces', '', '3', '1500', '1200', '6', '1', 0),
(43, 1, 'On & Off switch', 'sw', 'Pieces', '', '2', '150', '100', '6', '1', 0),
(44, 1, 'Single Bulb  12v', 'SUB12', 'Pieces', '', '10', '160', '120', '6', '1', 0),
(45, 1, ' Double Bulb 24v', 'Bud', 'Pieces', '', '10', '160', '130', '6', '1', 0),
(46, 1, 'Horn fuse amp10', 'HF10', 'Pieces', '', '12', '150', '100', '6', '1', 0),
(47, 1, 'Horn fuse amp15', 'HF15', 'Pieces', '', '10', '150', '100', '6', '1', 0),
(48, 5, 'Omo 500grms', 'OM', 'Pieces', '', '4', '', '145', '6', '1', 0),
(49, 1, ' Single Bulb 24v', 'BS24', 'Pieces', '', '12', '150', '100', '6', '1', 0),
(50, 1, 'Double Bulb 12V', 'DB12', 'Pieces', '', '12', '100', '80', '6', '1', 0),
(51, 7, 'head light helogen 24v', 'HH24', 'Pieces', '', '12', '500', '500', '6', '1', 0),
(52, 1, 'head light helogen 12v', 'HH12', 'Pieces', '', '12', '120', '100', '6', '1', 0),
(53, 1, 'indicator bulb single 24v', 'IDB24', 'Pieces', '', '12', '58', '50', '6', '1', 0),
(54, 1, 'indicator bulb double 12v', 'IDB12', 'Pieces', '', '12', '58', '50', '6', '1', 0),
(55, 5, 'Starplex grease(caltex)1/2kg', 'SPG', 'Pieces', '', '12', '450', '320', '6', '1', 0),
(56, 3, 'Gear mountain', 'Gm', 'Pieces', '', '2', '2500', '1500', '6', '1', 0),
(57, 2, 'Engine mountain', 'Em', 'Pieces', '', '2', '4500', '3500', '6', '1', 0),
(66, 6, 'Air filter', 'AF', 'Pieces', '', '5', '1265', '1100', '6', '1', 0),
(59, 4, 'Rear shock absorbers', 'RSH AB', 'Pieces', '', '2', '1800', '1200', '6', '1', 0),
(60, 7, 'Kingpin', 'KPN', 'Pieces', '', '2', '4025', '3500', '6', '1', 0),
(61, 4, 'Pilot bearings', 'PIB', 'Pieces', '', '3', '2500', '2000', '6', '1', 0),
(62, 3, 'Upper clutch kit', 'UPPC KIT', 'Pieces', '', '2', '1200', '800', '6', '1', 0),
(63, 4, 'Bottom clutch kit', 'BC KIT', 'Pieces', '', '2', '1500', '800', '6', '1', 0),
(64, 4, 'Ball joints', 'BLL JOI', 'Pieces', '', '4', '2500', '2000', '6', '1', 0),
(65, 4, 'Thyrod', 'thy', 'Pieces', '', '5', '1500', '1000', '6', '1', 0),
(67, 2, 'Isuzu Diesel filter', 'DF', 'Pieces', '', '5', '500', '200', '6', '1', 0),
(68, 2, 'Isuzu oil filter', 'ISZ O FIL', 'Pieces', '', '5', '750', '550', '6', '1', 0),
(69, 2, 'Engine oil5ltrs(monograde', 'EOIL', 'Pieces', '', '4', '2000', '1680', '6', '1', 0),
(70, 5, 'Battery acid', 'BACD', 'Pieces', '', '12', '250', '150', '6', '1', 0),
(71, 5, 'Gear box oil', 'Gbo', 'Pieces', '', '6', '2200', '1890', '6', '1', 0),
(72, 5, 'diesel', 'Ds', 'Pieces', '', '12', '181', '181', '6', '1', 0),
(73, 5, 'Engine oil 5ltrs multi grade', 'EOMG', 'Pieces', '', '10', '3000', '2050', '6', '1', 0),
(74, 6, 'Air transmission fluid 500ml', 'ATF', 'Pieces', '', '12', '288', '250', '6', '1', 0),
(75, 6, 'Air transmission fluid 5ltrs', 'ATF5', 'Pieces', '', '12', '2200', '1900', '6', '1', 0),
(76, 6, 'Air filterAA090', 'AFAA090-SUBARU LEGACY', 'Pieces', '', '12', '345', '300', '6', '1', 0),
(77, 6, 'Air filterAA070', 'AFAA070-SUBARU FORESTER', 'Pieces', '', '12', '402.5', '350', '6', '1', 0),
(78, 6, 'Air filterP2J-003', 'AFP2J-003-HONDA CRV SQUARE', 'Pieces', '', '12', '345', '300', '6', '1', 0),
(79, 6, 'Air filterPNB003', 'AFPNB003-HONDA CVR CYLINDER', 'Pieces', '', '12', '403', '350', '6', '1', 0),
(80, 6, 'Air filterEB300', 'AFEB300-NISSAN NARAVA', 'Pieces', '', '12', '460', '400', '6', '1', 0),
(82, 6, 'Air filteB1010', 'AF1010-TOYOTA RUSH', 'Pieces', '', '12', '460', '400', '6', '1', 0),
(83, 6, 'Air filterPWJ-A10', 'AFPWL-A10-HONDA FIT&HONDA AIRWAVE', 'Pieces', '', '12', '633', '550', '6', '1', 0),
(84, 6, 'Air filter67060', 'AF67060-PRADO', 'Pieces', '', '12', '633', '550', '6', '1', 0),
(85, 6, 'Air filter4M400', 'ATF4M400', 'Pieces', '', '12', '575', '500', '6', '1', 0),
(86, 6, 'Air filter11050', 'AF11050 starlet/duet', 'Pieces', '', '12', '253', '220', '6', '1', 0),
(87, 6, 'Air filter11090', 'AF11090- corolla AE90/100', 'Pieces', '', '12', '230', '200', '6', '1', 0),
(88, 6, 'Air filter15070', 'AF15070- Corolla 110', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(89, 6, 'Air filter16020', 'AF16020-caldina', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(90, 6, 'Air filter21030', 'ATF21030-probox/succeed', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(91, 6, 'Air filter21050', 'ATF21050-corolla ZZE,New fielder, premio', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(92, 6, 'Air filter22020', 'AF22020-NZE,Premio,allex,Noah,Fielder,Voxy,Wish', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(93, 6, 'Air filter23030', 'AF23030-Vitz/platz', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(94, 6, 'Air filter35020', 'ATF35020-TOWNACE,NOAH OLD MODEL', 'Pieces', '', '6', '253', '220', '6', '1', 0),
(95, 6, 'Air filter73C10', 'ATF73C10-NISSAN B14', 'Pieces', '', '6', '230', '200', '6', '1', 0),
(96, 6, 'Air filter74020', 'AF74020-PREMIOM /CARINA', 'Pieces', '', '6', '253', '220', '6', '1', 0),
(97, 6, 'Air filter77A10', 'AF77A10-NISSAN B13', 'Pieces', '', '6', '253', '220', '6', '1', 0),
(98, 6, 'Air filter41B00', 'AF41B00- NISSAN MARCH', 'Pieces', '', '6', '253', '220', '6', '1', 0),
(99, 6, 'Air filterV0100', 'AFV0100NISSANB15.WINGROAD,SUBARU', 'Pieces', '', '6', '253', '220', '6', '1', 0),
(100, 6, 'Air filter20040', 'AF20040-Rav4,Kluger,Harrier', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(101, 6, 'Air filter2810', 'AF28010-RAV 4', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(102, 6, 'Air filter70050', 'AF70050-RAV 4', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(103, 6, 'Air filter74060', 'AF74060-HARRIER NEW MODEL', 'Pieces', '', '6', '345', '300', '6', '1', 0),
(104, 6, 'Air filterMv188', 'AFMR188657-Mitsubishi lancer', 'Pieces', '', '6', '253', '250', '6', '1', 0),
(105, 6, 'Air filterMv266', 'AMR266849-MITSUBISHI GALANT', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(106, 6, 'Air filter22600', 'AF22600-Nissan,Vernette', 'Pieces', '', '6', '345', '300', '6', '1', 0),
(107, 6, 'Spark plugs 8H516', 'SP8H516', 'Pieces', '', '6', '445', '400', '6', '1', 0),
(108, 5, 'ENGINE OIL4LTRS', 'EOL4', 'Pieces', '', '4', '1300', '1300', '6', '1', 0),
(109, 6, 'Air filterED500', 'AFED500-NISSAN TIIDA,NOTE,NEW WING ROAD', 'Pieces', '', '12', '288', '250', '6', '1', 0),
(110, 6, 'Air filte31110', 'AF31110-MARK X', 'Pieces', '', '12', '403', '350', '6', '1', 0),
(111, 6, 'Air filter31120', 'AF31120 RAV 4', 'Pieces', '', '12', '345', '300', '6', '1', 0),
(112, 6, 'Air filter50040', 'AF50040-LAND CRUISER PRADO', 'Pieces', '', '12', '403', '350', '6', '1', 0),
(113, 6, 'Air filter97402', 'AF97402-PASSO', 'Pieces', '', '12', '345', '300', '6', '1', 0),
(114, 6, 'Air filter47010', 'AF47010-Air conditioner toyota', 'Pieces', '', '12', '403', '350', '6', '1', 0),
(115, 6, 'Fuel FilterMB220900', 'FFMB220900', 'Pieces', '', '12', '253', '220', '6', '1', 0),
(116, 6, 'Fuel Filter64010', 'FF64010', 'Pieces', '', '12', '253', '220', '6', '1', 0),
(117, 6, 'Oil Filter Toyota10001/03001', 'OF10001/03001', 'Pieces', '', '6', '115', '100', '6', '1', 0),
(118, 6, 'Oil Filter Toyota03006', 'OF03006', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(119, 6, 'Oil Filter Nissan65F00', 'OF65F00', 'Pieces', '', '6', '138', '120', '6', '1', 0),
(120, 6, 'Oil Filter Mark x-31020/80', 'OF31020/80', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(121, 6, 'Oil Filter Toyota Passo-37010', 'OF37010', 'Pieces', '', '6', '288', '250', '6', '1', 0),
(122, 6, 'Oil Filter 20001/30002', 'OF20001/30002', 'Pieces', '', '6', '173', '150', '6', '1', 0),
(123, 6, 'Oil Filter MD135737', 'OFMD135737', 'Pieces', '', '6', '138', '120', '6', '1', 0),
(124, 6, 'Spark Plugs BKR6E2756', 'SPBKR6E2756', 'Pieces', '', '12', '202', '175', '6', '1', 0),
(125, 6, 'Spark Plugs BP6ES-7811', 'SPBP6ES7811', 'Pieces', '', '12', '173', '150', '6', '1', 0),
(126, 6, 'Spark Plugs BP6EY-6278', 'SPBP6EY6278', 'Pieces', '', '12', '173', '150', '6', '1', 0),
(127, 6, 'Spark Plugs BCP5ES-7810', 'SPBCP5ES7810', 'Pieces', '', '12', '184', '150', '6', '1', 0),
(128, 6, 'Spark plugs BKR6EYA4195', 'SP BKR6EYA4195', 'Pieces', '', '12', '215', '188', '6', '1', 0),
(129, 6, 'Spark Plugs Denso K16Single', 'SPDK16S', 'Pieces', '', '12', '190', '165', '6', '1', 0),
(130, 6, 'Spark Plugs Denso K16Double', 'SPDK16D', 'Pieces', '', '12', '202', '175', '6', '1', 0),
(131, 6, 'Spark Plugs Denso Q20 Single', 'SPDQ20S', 'Pieces', '', '12', '173', '150', '6', '1', 0),
(132, 6, 'Spark Plugs  K20Double', 'SPK20D', 'Pieces', '', '12', '207', '180', '6', '1', 0),
(133, 6, 'Air filter06050', 'AF06050', 'Pieces', '', '12', '518', '450', '6', '1', 0),
(134, 7, 'Clutch plate ', 'cp', 'Pieces', '', '4', '5175', '4500', '6', '1', 0),
(135, 7, 'Pressure plate corolla 110', 'PPC110', 'Pieces', '', '4', '6325', '5000', '6', '1', 0),
(136, 6, 'Oil Filter Probox petrol', 'OF(Probox petrol)', 'Pieces', '', '4', '173', '150', '6', '1', 0),
(137, 6, 'Brake pads probox', 'Bpp', 'Pieces', '', '4', '1380', '1200', '6', '1', 0),
(138, 6, 'Air filter50060', 'AF50060 TOYOTA CROWN', 'Pieces', '', '12', '460', '400', '6', '1', 0),
(139, 1, 'horn relay', 'HR', 'Pieces', '', '24', '805', '700', '6', '1', 0),
(140, 1, 'RADIO', '', 'Pieces', '', '', '8500', '8000', '6', '1', 0),
(141, 1, 'battery', '', 'Pieces', '', '', '26500', '26000', '6', '1', 0),
(142, 6, 'Oil seal inner', '', 'Pieces', '', '', '460', '450', '6', '1', 0),
(143, 6, 'Fuel Filterz700', 'FFZ700', 'Pieces', '', '', '173', '150', '6', '1', 0),
(144, 6, 'Oil Filter6DBOB-0309-A', 'OF6DBOB', 'Pieces', '', '12', '747', '650', '6', '1', 0),
(145, 6, 'Air Cleaner NQR', 'ACNQR', 'Pieces', '', '6', '2130', '1850', '6', '1', 0),
(146, 7, 'Brake padsKD2718', 'BK2718', 'Pieces', '', '12', '980', '850', '6', '1', 0),
(147, 7, 'Brake padsKD2780', 'BPKD2780', 'Pieces', '', '12', '1495', '1300', '6', '1', 0),
(148, 7, 'Brake padsKD2701', 'BPKD2701', 'Pieces', '', '6', '980', '850', '6', '1', 0),
(149, 7, 'tie rod end', '', 'Pieces', '', '', '9200', '8000', '6', '1', 0),
(150, 7, 'drag links', '', 'Pieces', '', '', '14950', '13000', '6', '1', 0),
(151, 7, 'Brake padsKD2725', 'BPKD2725', 'Pieces', '', '6', '980', '850', '6', '1', 0),
(152, 7, 'Brake padsKD2203', 'BPKD2203', 'Pieces', '', '6', '1035', '900', '6', '1', 0),
(153, 7, 'Brake padsKD2208', 'BPKD2208', 'Pieces', '', '6', '1150', '1000', '6', '1', 0),
(154, 7, 'Brake padsKD2798', 'BPKD2798', 'Pieces', '', '6', '1495', '1300', '6', '1', 0),
(155, 7, 'Brake padsKD2740', 'BPKD2740', 'Pieces', '', '6', '863', '750', '6', '1', 0),
(156, 7, 'Brake padsKD2457', 'BPKD2457', 'Pieces', '', '6', '1035', '950', '6', '1', 0),
(157, 7, 'Brake padsKD1740', 'BPKD1740', 'Pieces', '', '6', '1150', '1000', '6', '1', 0),
(158, 7, 'Brake padsKD2739', 'BPKD2739', 'Pieces', '', '6', '1035', '900', '6', '1', 0),
(159, 7, 'Brake padsKD2776', 'BPKD2776', 'Pieces', '', '6', '863', '750', '6', '1', 0),
(160, 7, 'Brake padsKD1739', 'BPKD1739', 'Pieces', '', '6', '980', '850', '6', '1', 0),
(161, 7, 'Brake padsKD1735', 'BPKD1735', 'Pieces', '', '12', '1035', '900', '6', '1', 0),
(162, 7, 'Brake padsKD2606/07', '', 'Pieces', '', '12', '1035', '900', '6', '1', 0),
(163, 7, 'Brake padsGDB7075S', 'BPGDN7075S', 'Pieces', '', '12', '1150', '950', '6', '1', 0),
(164, 6, 'battery water', '', 'Pieces', '', '', '150', '120', '6', '1', 0),
(165, 6, 'ENGINE OIL10LTRS', '', 'Pieces', '', '', '3910', '3400', '6', '1', 0),
(166, 6, 'Oil seal outer', '', 'Pieces', '', '', '575', '450', '6', '1', 0),
(167, 6, 'Bearing rear outer', '', 'Pieces', '', '', '1955', '1700', '6', '1', 0),
(168, 6, 'Bearing rear inner', '', 'Pieces', '', '', '2070', '1800', '6', '1', 0),
(169, 6, 'bearing front inner', '', 'Pieces', '', '', '3220', '2800', '6', '1', 0),
(170, 6, 'bearing front outer', '', 'Pieces', '', '', '2990', '2600', '6', '1', 0),
(171, 7, 'Brake padsKD2607', 'BPKD2607/06', 'Pieces', '', '6', '1035', '900', '6', '1', 0),
(172, 7, 'Brake pads liningX288', 'BPLX288', 'Pieces', '', '6', '750', '600', '6', '1', 0),
(173, 7, 'Brake pads liningAK2342', 'AK2342', 'Pieces', '', '6', '747', '650', '6', '1', 0),
(175, 7, 'Brake  liningNQR', 'BPLNQ', 'Pieces', '', '4', '1495', '1300', '6', '1', 0),
(176, 7, 'Brake lining ProboxBS-K2358', 'BS-K2358', 'Pieces', '', '6', '1380', '1200', '6', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cat_desc` longtext COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Electrical Parts', ''),
(2, 'Engine Parts', ''),
(3, 'Chassis Parts', ''),
(4, 'Body Parts', ''),
(5, 'Consumables', ''),
(6, 'service parts', ''),
(7, 'Repair parts', '');

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `purchases_ledger`
--

INSERT INTO `purchases_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Received 2 O ring Kit - 3 inch (Pieces) into the warehouse', '240', '240', '', 6, '1', '2014-12-20 12:43:35', 'recp1'),
(2, 'Received 21 O ring Kit - 2 inch (Pieces) into the warehouse', '2730', '2730', '', 6, '1', '2014-12-20 12:43:48', 'recp2'),
(3, 'Received 36 O ring Kit - 3 inch (Pieces) into the warehouse', '4320', '4320', '', 6, '1', '2014-12-20 12:44:06', 'recp3'),
(4, 'Received 34 O ring Kit - 3 inch (Pieces) into the warehouse', '4080', '4080', '', 6, '1', '2014-12-20 12:45:36', 'recp4'),
(5, 'Received 3 O ring Kit - 2 inch (Pieces) into the warehouse', '390', '390', '', 6, '1', '2014-12-20 12:45:45', 'recp5'),
(6, 'Cancel Purchase Order LPO No:BD0005/2014 (CANCELLED)', '-', '', '', 6, '1', '2014-12-24 16:50:59', 'cancpo5'),
(7, 'Cancel Purchase Order LPO No:BD0004/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:51:15', 'cancpo4'),
(8, 'Cancel Purchase Order LPO No:BD0003/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:51:50', 'cancpo3'),
(9, 'Cancel Purchase Order LPO No:BD0001/2014 (CANCELED)', '-', '', '', 6, '1', '2014-12-24 16:52:07', 'cancpo1'),
(10, 'Received 4 AT transmission (Pieces) into the warehouse', '3560', '3560', '', 6, '1', '2015-01-03 13:09:48', 'recp6'),
(11, 'Received 10 Spark Plugs BKR6E2756 (Pieces) into the warehouse', '1750', '1750', '', 6, '1', '2015-01-07 14:17:06', 'recp7'),
(12, 'Received 8 Spark Plugs BP6ES-7811 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:17:20', 'recp8'),
(13, 'Received 8 Spark Plugs BP6EY-6278 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:17:35', 'recp9'),
(14, 'Received 10 Spark Plugs BCP5ES-7810 (Pieces) into the warehouse', '1600', '1600', '', 6, '1', '2015-01-07 14:17:48', 'recp10'),
(15, 'Received 8 Spark plugs BKR6EYA4195 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:18:01', 'recp11'),
(16, 'Received 10 Spark Plugs Denso K16Single (Pieces) into the warehouse', '1650', '1650', '', 6, '1', '2015-01-07 14:18:16', 'recp12'),
(17, 'Received 10 Spark Plugs Denso K16Double (Pieces) into the warehouse', '1750', '1750', '', 6, '1', '2015-01-07 14:18:31', 'recp13'),
(18, 'Received 10 Spark Plugs Denso Q20 Single (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:18:41', 'recp14'),
(19, 'Received 10 Spark Plugs  K20Double (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-07 14:18:54', 'recp15'),
(20, 'Received 2 Air filterAA090 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:20:52', 'recp16'),
(21, 'Received 2 Air filterAA070 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:21:01', 'recp17'),
(22, 'Received 2 Air filterP2J-003 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:21:12', 'recp18'),
(23, 'Received 2 Air filterPNB003 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:21:26', 'recp19'),
(24, 'Received 2 Air filterEB300 (Pieces) into the warehouse', '800', '800', '', 6, '1', '2015-01-07 14:21:36', 'recp20'),
(25, 'Received 2 Air filter50060 (Pieces) into the warehouse', '800', '800', '', 6, '1', '2015-01-07 14:21:53', 'recp21'),
(26, 'Received 4 Air filteB1010 (Pieces) into the warehouse', '1600', '1600', '', 6, '1', '2015-01-07 14:22:05', 'recp22'),
(27, 'Received 2 Air filterPWJ-A10 (Pieces) into the warehouse', '1100', '1100', '', 6, '1', '2015-01-07 14:22:23', 'recp23'),
(28, 'Received 2 Air filter67060 (Pieces) into the warehouse', '1100', '1100', '', 6, '1', '2015-01-07 14:22:34', 'recp24'),
(29, 'Received 2 Air filter47010 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:22:47', 'recp25'),
(30, 'Received 2 Air filter4M400 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-07 14:22:59', 'recp26'),
(31, 'Received 10 Spark plugs 8H516 (Pieces) into the warehouse', '4000', '4000', '', 6, '1', '2015-01-07 14:23:48', 'recp27'),
(32, 'Received 6 Air filter11050 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:17', 'recp28'),
(33, 'Received 6 Air filter11090 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:30', 'recp29'),
(34, 'Received 6 Air filter15070 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:39', 'recp30'),
(35, 'Received 6 Air filter16020 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:48', 'recp31'),
(36, 'Received 6 Air filter21030 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:24:59', 'recp32'),
(37, 'Received 12 Air filter21050 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:26:19', 'recp33'),
(38, 'Received 12 Air filter22020 (Pieces) into the warehouse', '2400', '2400', '', 6, '1', '2015-01-07 14:26:34', 'recp34'),
(39, 'Received 6 Air filter23030 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:26:49', 'recp35'),
(40, 'Received 2 Air filter35020 (Pieces) into the warehouse', '440', '440', '', 6, '1', '2015-01-07 14:28:03', 'recp36'),
(41, 'Received 6 Air filter74020 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:28:14', 'recp37'),
(42, 'Received 6 Air filter73C10 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:28:33', 'recp38'),
(43, 'Received 6 Air filter77A10 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:29:48', 'recp39'),
(44, 'Received 6 Air filter41B00 (Pieces) into the warehouse', '1320', '1320', '', 6, '1', '2015-01-07 14:29:59', 'recp40'),
(45, 'Received 12 Air filterV0100 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:30:54', 'recp41'),
(46, 'Received 6 Air filter20040 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:31:03', 'recp42'),
(47, 'Received 6 Air filter2810 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-07 14:31:16', 'recp43'),
(48, 'Received 2 Air filter70050 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:31:25', 'recp44'),
(49, 'Received 2 Air filter74060 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:31:38', 'recp45'),
(50, 'Received 2 Air filterMv188 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:31:50', 'recp46'),
(51, 'Received 2 Air filterMv266 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:32:02', 'recp47'),
(52, 'Received 2 Air filter22600 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:32:20', 'recp48'),
(53, 'Received 2 Air filterED500 (Pieces) into the warehouse', '500', '500', '', 6, '1', '2015-01-07 14:32:31', 'recp49'),
(54, 'Received 2 Air filte31110 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:32:41', 'recp50'),
(55, 'Received 2 Air filter31120 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:33:10', 'recp51'),
(56, 'Received 2 Air filter50040 (Pieces) into the warehouse', '700', '700', '', 6, '1', '2015-01-07 14:33:22', 'recp52'),
(57, 'Received 2 Air filter97402 (Pieces) into the warehouse', '600', '600', '', 6, '1', '2015-01-07 14:33:35', 'recp53'),
(58, 'Received 12 Fuel FilterMB220900 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:34:25', 'recp54'),
(59, 'Received 12 Fuel Filter64010 (Pieces) into the warehouse', '2640', '2640', '', 6, '1', '2015-01-07 14:34:33', 'recp55'),
(60, 'Received 12 Oil Filter Toyota10001/03001 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-07 14:34:41', 'recp56'),
(61, 'Received 12 Oil Filter Toyota03006 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:34:52', 'recp57'),
(62, 'Received 12 Oil Filter Nissan65F00 (Pieces) into the warehouse', '1440', '1440', '', 6, '1', '2015-01-07 14:35:07', 'recp58'),
(63, 'Received 12 Oil Filter Mark x-31020/80 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:35:22', 'recp59'),
(64, 'Received 12 Oil Filter Toyota Passo-37010 (Pieces) into the warehouse', '3000', '3000', '', 6, '1', '2015-01-07 14:35:32', 'recp60'),
(65, 'Received 12 Oil Filter 20001/30002 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-07 14:35:44', 'recp61'),
(66, 'Received 12 Oil Filter MD135737 (Pieces) into the warehouse', '1440', '1440', '', 6, '1', '2015-01-07 14:35:56', 'recp62'),
(67, 'Received 2 Brake padsKD2718 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:03', 'recp63'),
(68, 'Received 2 Brake padsKD2780 (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:18:15', 'recp64'),
(69, 'Received 2 Brake padsKD2701 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:23', 'recp65'),
(70, 'Received 2 Brake padsKD2725 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:18:33', 'recp66'),
(71, 'Received 2 Brake padsKD2203 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:18:43', 'recp67'),
(72, 'Received 1 Brake padsKD2208 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-11 09:24:03', 'recp68'),
(73, 'Received 2 Brake padsKD2798 (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:24:14', 'recp69'),
(74, 'Received 2 Brake padsKD2740 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-11 09:24:27', 'recp70'),
(75, 'Received 1 Brake padsKD2457 (Pieces) into the warehouse', '950', '950', '', 6, '1', '2015-01-11 09:24:45', 'recp71'),
(76, 'Received 1 Brake padsKD1740 (Pieces) into the warehouse', '1000', '1000', '', 6, '1', '2015-01-11 09:25:13', 'recp72'),
(77, 'Received 2 Brake padsKD2739 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:25:27', 'recp73'),
(78, 'Received 2 Brake padsKD2776 (Pieces) into the warehouse', '1500', '1500', '', 6, '1', '2015-01-11 09:25:36', 'recp74'),
(79, 'Received 2 Brake padsKD1739 (Pieces) into the warehouse', '1700', '1700', '', 6, '1', '2015-01-11 09:25:45', 'recp75'),
(80, 'Received 2 Brake padsKD1735 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:25:59', 'recp76'),
(81, 'Received 2 Brake padsKD2606/07 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:26:09', 'recp77'),
(82, 'Received 2 Brake pads liningX288 (Pieces) into the warehouse', '1200', '1200', '', 6, '1', '2015-01-11 09:26:19', 'recp78'),
(83, 'Received 2 Brake pads liningAK2342 (Pieces) into the warehouse', '1300', '1300', '', 6, '1', '2015-01-11 09:26:30', 'recp79'),
(84, 'Received 2 Brake padsGDB7075S (Pieces) into the warehouse', '1900', '1900', '', 6, '1', '2015-01-11 09:26:42', 'recp80'),
(85, 'Received 2 Brake  liningNQR (Pieces) into the warehouse', '2600', '2600', '', 6, '1', '2015-01-11 09:27:00', 'recp81'),
(86, 'Received 2 Brake lining ProboxBS-K2358 (Pieces) into the warehouse', '2400', '2400', '', 6, '1', '2015-01-11 09:27:11', 'recp82'),
(87, 'Received 12 Fuel Filterz700 (Pieces) into the warehouse', '1800', '1800', '', 6, '1', '2015-01-11 09:27:32', 'recp83'),
(88, 'Received 12 Oil Filter6DBOB-0309-A (Pieces) into the warehouse', '7800', '7800', '', 6, '1', '2015-01-11 09:27:40', 'recp84'),
(89, 'Received 12 Air Cleaner NQR (Pieces) into the warehouse', '22200', '22200', '', 6, '1', '2015-01-11 09:27:47', 'recp85');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `purchases_returns_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_order_id`, `order_code`, `product_id`, `description`, `quantity`, `vendor_prc`, `date_generated`, `status`) VALUES
(1, 2, 10, '', '36', '120', '2014-12-20 12:34:29', 0),
(2, 2, 11, '', '24', '130', '2014-12-20 12:34:57', 0),
(3, 4, 14, '', '48', '320', '2014-12-23 15:31:43', 1),
(4, 4, 42, '', '2', '4500', '2014-12-23 15:32:15', 1),
(5, 5, 20, '', '2', 'F.O.C', '2014-12-24 16:08:11', 1),
(6, 6, 5, '', '4', '890', '2015-01-03 09:24:19', 0),
(10, 13, 135, '', '1', '5500', '2015-01-06 12:31:05', 0),
(9, 13, 134, '', '1', '4500', '2015-01-06 12:30:44', 0),
(11, 14, 76, '', '2', '300', '2015-01-06 12:34:38', 0),
(12, 14, 77, '', '2', '350', '2015-01-06 12:35:02', 0),
(13, 14, 78, '', '2', '300', '2015-01-06 12:35:32', 0),
(14, 14, 79, '', '2', '350', '2015-01-06 12:35:57', 0),
(15, 14, 80, '', '2', '400', '2015-01-06 12:36:23', 0),
(16, 14, 82, '', '4', '400', '2015-01-06 12:37:37', 0),
(17, 14, 83, '', '2', '550', '2015-01-06 12:37:55', 0),
(18, 14, 84, '', '2', '550', '2015-01-06 12:39:04', 0),
(19, 14, 85, '', '2', '500', '2015-01-06 12:39:37', 0),
(20, 14, 86, '', '6', '200', '2015-01-06 12:40:23', 0),
(21, 14, 87, '', '6', '200', '2015-01-06 12:40:44', 0),
(22, 14, 88, '', '6', '200', '2015-01-06 12:41:06', 0),
(23, 14, 89, '', '2', '200', '2015-01-06 12:42:06', 0),
(24, 14, 90, '', '6', '200', '2015-01-06 12:42:29', 0),
(25, 14, 91, '', '12', '220', '2015-01-06 12:42:59', 0),
(26, 14, 92, '', '12', '200', '2015-01-06 12:43:18', 0),
(27, 14, 93, '', '6', '200', '2015-01-06 12:43:45', 0),
(28, 14, 94, '', '2', '220', '2015-01-06 12:44:12', 0),
(29, 14, 96, '', '6', '220', '2015-01-06 12:44:59', 0),
(30, 14, 95, '', '6', '200', '2015-01-06 12:45:31', 0),
(31, 14, 97, '', '6', '220', '2015-01-06 12:46:42', 0),
(32, 14, 98, '', '2', '220', '2015-01-06 12:48:19', 0),
(33, 14, 99, '', '12', '220', '2015-01-06 12:48:51', 0),
(34, 14, 100, '', '6', '250', '2015-01-06 12:49:20', 0),
(35, 14, 101, '', '6', '250', '2015-01-06 12:49:48', 0),
(36, 14, 102, '', '2', '250', '2015-01-06 12:50:28', 0),
(37, 14, 103, '', '2', '300', '2015-01-06 12:50:57', 0),
(38, 14, 106, '', '2', '300', '2015-01-06 12:52:13', 0),
(39, 14, 109, '', '2', '250', '2015-01-06 12:52:46', 0),
(40, 14, 110, '', '2', '350', '2015-01-06 12:53:10', 0),
(41, 14, 111, '', '2', '300', '2015-01-06 12:53:31', 0),
(42, 14, 112, '', '2', '350', '2015-01-06 12:54:03', 0),
(43, 15, 76, '', '2', '300', '2015-01-06 13:07:54', 0),
(44, 15, 77, '', '2', '350', '2015-01-06 13:08:14', 0),
(45, 15, 78, '', '2', '300', '2015-01-06 13:08:35', 0),
(46, 15, 79, '', '2', '350', '2015-01-06 13:08:54', 0),
(47, 15, 80, '', '2', '400', '2015-01-06 13:09:10', 0),
(48, 15, 138, '', '2', '400', '2015-01-06 13:09:32', 0),
(49, 15, 82, '', '4', '400', '2015-01-06 13:09:52', 0),
(50, 15, 83, '', '2', '550', '2015-01-06 13:10:45', 0),
(51, 15, 84, '', '2', '550', '2015-01-06 13:11:05', 0),
(52, 15, 114, '', '2', '350', '2015-01-06 13:11:46', 0),
(53, 15, 85, '', '2', '500', '2015-01-06 13:12:24', 0),
(54, 16, 86, '', '6', '200', '2015-01-06 13:17:01', 0),
(55, 16, 87, '', '6', '200', '2015-01-06 13:17:16', 0),
(56, 16, 88, '', '6', '200', '2015-01-06 13:17:30', 0),
(57, 16, 89, '', '6', '200', '2015-01-06 13:17:44', 0),
(58, 16, 90, '', '6', '200', '2015-01-06 13:18:05', 0),
(59, 16, 91, '', '12', '220', '2015-01-06 13:18:30', 0),
(60, 16, 92, '', '12', '200', '2015-01-06 13:18:51', 0),
(61, 16, 93, '', '6', '200', '2015-01-06 13:19:19', 0),
(62, 16, 94, '', '2', '220', '2015-01-06 13:19:43', 0),
(63, 16, 96, '', '6', '220', '2015-01-06 13:20:58', 0),
(64, 16, 95, '', '6', '200', '2015-01-06 13:21:17', 0),
(65, 16, 97, '', '6', '220', '2015-01-06 13:21:39', 0),
(66, 16, 98, '', '6', '220', '2015-01-06 13:23:50', 0),
(67, 17, 99, '', '12', '220', '2015-01-06 13:25:40', 0),
(68, 17, 100, '', '6', '250', '2015-01-06 13:26:04', 0),
(69, 17, 101, '', '6', '250', '2015-01-06 13:26:32', 0),
(70, 17, 102, '', '2', '250', '2015-01-06 13:27:03', 0),
(71, 17, 103, '', '2', '300', '2015-01-06 13:27:35', 0),
(72, 17, 104, '', '2', '250', '2015-01-06 13:27:59', 0),
(73, 17, 105, '', '2', '250', '2015-01-06 13:28:18', 0),
(74, 17, 106, '', '2', '300', '2015-01-06 13:28:42', 0),
(75, 17, 109, '', '2', '250', '2015-01-06 13:29:08', 0),
(76, 17, 110, '', '2', '350', '2015-01-06 13:29:31', 0),
(77, 17, 111, '', '2', '300', '2015-01-06 13:29:47', 0),
(78, 17, 112, '', '2', '350', '2015-01-06 13:30:06', 0),
(79, 17, 113, '', '2', '300', '2015-01-06 13:30:30', 0),
(80, 18, 115, '', '12', '220', '2015-01-06 13:33:26', 0),
(81, 18, 116, '', '12', '220', '2015-01-06 13:33:41', 0),
(82, 18, 117, '', '12', '100', '2015-01-06 13:34:05', 0),
(83, 18, 118, '', '12', '250', '2015-01-06 13:34:44', 0),
(84, 18, 119, '', '12', '120', '2015-01-06 13:35:09', 0),
(85, 18, 120, '', '12', '250', '2015-01-06 13:37:45', 0),
(86, 18, 121, '', '12', '250', '2015-01-06 13:38:05', 0),
(87, 18, 122, '', '12', '150', '2015-01-06 13:38:27', 0),
(88, 19, 115, '', '12', '220', '2015-01-07 07:49:42', 0),
(89, 19, 116, '', '12', '220', '2015-01-07 07:50:15', 0),
(90, 19, 117, '', '12', '100', '2015-01-07 07:50:36', 0),
(91, 19, 118, '', '12', '250', '2015-01-07 07:51:01', 0),
(92, 19, 119, '', '12', '120', '2015-01-07 07:52:03', 0),
(93, 19, 120, '', '12', '250', '2015-01-07 07:52:37', 0),
(94, 19, 121, '', '12', '250', '2015-01-07 07:53:13', 0),
(95, 19, 122, '', '12', '150', '2015-01-07 07:53:31', 0),
(96, 19, 123, '', '12', '120', '2015-01-07 07:53:49', 0),
(97, 20, 124, '', '10', '175', '2015-01-07 07:55:37', 0),
(98, 21, 124, '', '10', '175', '2015-01-07 07:59:56', 0),
(99, 23, 124, '', '10', '175', '2015-01-07 08:04:49', 0),
(100, 23, 125, '', '8', '150', '2015-01-07 08:05:42', 0),
(101, 23, 126, '', '8', '150', '2015-01-07 08:06:52', 0),
(102, 23, 127, '', '10', '160', '2015-01-07 08:07:15', 0),
(103, 23, 128, '', '8', '187.5', '2015-01-07 08:08:04', 0),
(104, 23, 129, '', '10', '165', '2015-01-07 08:08:36', 0),
(105, 23, 130, '', '10', '175', '2015-01-07 08:08:52', 0),
(106, 23, 131, '', '10', '150', '2015-01-07 08:09:16', 0),
(107, 23, 132, '', '10', '180', '2015-01-07 08:09:50', 0),
(108, 24, 107, '', '10', '400', '2015-01-07 08:16:57', 0),
(109, 27, 53, '', '12', '50', '2015-01-08 15:53:58', 0),
(110, 27, 54, '', '12', '50', '2015-01-08 15:54:48', 0),
(111, 27, 60, '', '2', '3500', '2015-01-08 15:56:45', 0),
(112, 27, 139, '', '1', '700', '2015-01-08 15:57:54', 0),
(113, 29, 141, '', '1', '26000', '2015-01-08 16:12:13', 0),
(114, 30, 140, '', '2', '8000', '2015-01-09 08:25:55', 0),
(115, 32, 142, '', '3', '450', '2015-01-10 17:18:12', 1),
(116, 32, 166, '', '3', '450', '2015-01-10 17:18:30', 1),
(117, 32, 167, '', '2', '1800', '2015-01-10 17:19:27', 1),
(118, 32, 168, '', '2', '1600', '2015-01-10 17:20:58', 1),
(119, 32, 169, '', '2', '2600', '2015-01-10 17:22:26', 1),
(120, 32, 170, '', '2', '2800', '2015-01-10 17:22:59', 1),
(121, 33, 143, '', '12', '150', '2015-01-11 08:48:49', 0),
(122, 33, 144, '', '12', '650', '2015-01-11 08:49:08', 0),
(123, 33, 145, '', '12', '1850', '2015-01-11 08:49:28', 0),
(124, 34, 146, '', '2', '850', '2015-01-11 08:53:44', 0),
(125, 34, 147, '', '2', '1300', '2015-01-11 08:54:10', 0),
(126, 34, 148, '', '2', '850', '2015-01-11 08:54:27', 0),
(127, 34, 151, '', '2', '850', '2015-01-11 08:54:47', 0),
(128, 34, 152, '', '2', '900', '2015-01-11 08:55:09', 0),
(129, 34, 153, '', '1', '1000', '2015-01-11 08:55:29', 0),
(130, 34, 154, '', '2', '1300', '2015-01-11 08:55:46', 0),
(131, 34, 155, '', '2', '750', '2015-01-11 08:56:14', 0),
(132, 34, 156, '', '1', '950', '2015-01-11 08:56:40', 0),
(133, 34, 157, '', '1', '1000', '2015-01-11 08:56:56', 0),
(134, 34, 158, '', '2', '900', '2015-01-11 08:57:18', 0),
(135, 34, 159, '', '2', '750', '2015-01-11 08:57:38', 0),
(136, 34, 160, '', '2', '850', '2015-01-11 08:58:53', 0),
(137, 34, 161, '', '2', '900', '2015-01-11 09:00:07', 0),
(138, 34, 162, '', '2', '900', '2015-01-11 09:00:41', 0),
(139, 34, 172, '', '2', '600', '2015-01-11 09:06:14', 0),
(140, 34, 173, '', '2', '650', '2015-01-11 09:12:28', 0),
(141, 34, 163, '', '2', '950', '2015-01-11 09:13:06', 0),
(142, 34, 175, '', '2', '1300', '2015-01-11 09:13:48', 0),
(143, 34, 176, '', '2', '1200', '2015-01-11 09:14:15', 0),
(144, 35, 1, '', '2', '500', '2015-01-12 16:05:28', 0),
(146, 37, 45, '', '500', '120', '2015-01-14 04:46:47', 0),
(147, 38, 111, '', '3', '789', '2015-01-14 04:52:26', 0),
(148, 38, 49, '', '4', '890', '2015-01-14 04:52:26', 0),
(149, 39, 45, '', '1', '166', '2015-01-14 04:54:51', 0),
(150, 39, 92, '', '1', '190', '2015-01-14 04:54:51', 0),
(151, 39, 99, '', '1', '189', '2015-01-14 04:54:51', 0),
(152, 40, 91, '', '1', '3', '2015-01-14 04:57:34', 0),
(153, 40, 100, '', '2', '4', '2015-01-14 04:57:34', 0),
(154, 40, 93, '', '2', '6', '2015-01-14 04:57:34', 0),
(155, 40, 145, '', '1', '7', '2015-01-14 04:57:34', 0),
(156, 41, 87, '', '4', '677', '2015-01-14 05:10:02', 0),
(157, 41, 88, '', '3', '120', '2015-01-14 05:10:02', 0),
(158, 42, 92, '', '4', '102', '2015-01-14 06:50:25', 0),
(159, 42, 101, '', '6', '111', '2015-01-14 06:50:25', 0),
(160, 42, 75, '', '3', '167', '2015-01-14 06:50:25', 0),
(161, 42, 101, '', '3', '78', '2015-01-14 06:50:25', 0),
(162, 29, 49, '', '2', '230', '2015-01-14 07:13:36', 0),
(163, 12, 145, '', '6', '56', '2015-01-14 07:16:00', 0),
(164, 12, 89, '', '56', '230', '2015-01-14 07:16:29', 0),
(166, 43, 106, '', '2', '102', '2015-01-14 14:46:28', 0),
(167, 43, 88, '', '3', '109', '2015-01-14 14:46:28', 0);

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

--
-- Dumping data for table `purchase_orderrrr`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotation_id`, `booking_id`, `job_card_id`, `customer_id`, `quotation_no`, `currency`, `curr_rate`, `user_id`, `terms`, `date_generated`, `discount_perc`, `discount_value`, `vat`, `vat_value`, `quotation_date`, `convert_status`, `quotation_type`) VALUES
(1, 5, 0, 3, '', 6, '1', 19, 'Net 30 days', '2014-12-05 15:50:27', '1', '', 1, '', '2014-12-02', 0, 'gq'),
(2, 7, 0, 5, '', 6, '1', 19, 'Net 30 days', '2014-12-06 12:35:29', '1', '', 1, '', '2014-12-06', 0, 'gq'),
(3, 2, 0, 2, '', 6, '1', 62, 'Net ', '2014-12-19 12:18:43', '1', '', 1, '', '2014-12-19', 0, 'gq'),
(4, 3, 0, 2, '', 6, '1', 62, 'cash', '2014-12-19 12:36:00', '', '', 1, '', '2014-12-19', 0, 'gq'),
(5, 27, 0, 10, '', 6, '1', 62, '', '2014-12-31 09:22:18', '', '', 0, '', '2014-12-31', 0, 'gq'),
(6, 40, 0, 13, '', 6, '1', 62, 'CASH', '2015-01-06 10:48:19', '', '', 0, '', '2015-01-06', 0, 'gq');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quotation_item`
--

INSERT INTO `quotation_item` (`quotation_item_id`, `booking_id`, `job_card_id`, `quotation_id`, `item_id`, `item_quantity`, `item_cost`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`) VALUES
(1, 2, 0, 3, 6, 2, '2200', 6, '1', 62, '2014-12-19 12:18:43', 0),
(2, 2, 0, 3, 1, 1, '320', 6, '1', 62, '2014-12-19 12:18:43', 0),
(3, 3, 0, 4, 4, 2, '3200', 6, '1', 62, '2014-12-19 12:36:00', 0),
(4, 3, 0, 4, 6, 3, '2200', 6, '1', 62, '2014-12-19 12:36:00', 0),
(5, 27, 0, 5, 66, 1, '1500', 6, '1', 62, '2014-12-31 09:22:18', 0),
(6, 27, 0, 5, 9, 1, '1110', 6, '1', 62, '2014-12-31 09:22:18', 0),
(7, 27, 0, 5, 67, 1, '500', 6, '1', 62, '2014-12-31 09:22:18', 0),
(8, 27, 0, 5, 68, 1, '750', 6, '1', 62, '2014-12-31 09:22:18', 0),
(9, 40, 0, 6, 134, 1, '5175', 6, '1', 62, '2015-01-06 10:48:19', 0),
(10, 40, 0, 6, 135, 1, '6325', 6, '1', 62, '2015-01-06 10:48:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_task`
--

CREATE TABLE IF NOT EXISTS `quotation_task` (
  `quotation_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_time` varchar(100) NOT NULL,
  `flat_rate_cost` varchar(100) NOT NULL,
  `task_cost` varchar(100) NOT NULL,
  `curr_id` int(11) NOT NULL,
  `exchange_rate` varchar(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`quotation_task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quotation_task`
--

INSERT INTO `quotation_task` (`quotation_task_id`, `booking_id`, `quotation_id`, `task_id`, `task_time`, `flat_rate_cost`, `task_cost`, `curr_id`, `exchange_rate`, `user_id`, `date_generated`, `status`) VALUES
(1, 2, 3, 21, '4.0', '1200', '4800', 6, '1', 62, '2014-12-19 12:18:43', 0),
(2, 3, 4, 0, '', '1200', '0', 6, '1', 62, '2014-12-19 12:36:00', 0),
(3, 27, 5, 21, '8.5', '1000', '8500', 6, '1', 62, '2014-12-31 09:22:18', 0),
(4, 40, 6, 0, '', '1000', '0', 6, '1', 62, '2015-01-06 10:48:19', 0),
(5, 40, 6, 38, '2', '1000', '2000', 6, '1', 62, '2015-01-06 10:53:48', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quotation_taskold`
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
  `order_code_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity_rec` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `received_stock`
--

INSERT INTO `received_stock` (`received_stock_id`, `order_code_id`, `product_id`, `quantity_rec`, `currency_code`, `curr_rate`, `delivery_date`, `expiry_date`, `status`, `date_received`) VALUES
(1, 2, 10, '2', 6, '1', '2014-12-20', '0000-00-00', 1, '2014-12-20 12:43:35'),
(2, 2, 11, '21', 6, '1', '2014-12-20', '0000-00-00', 1, '2014-12-20 12:43:48'),
(4, 2, 10, '34', 6, '1', '2014-12-22', '0000-00-00', 1, '2014-12-20 12:45:36'),
(5, 2, 11, '3', 6, '1', '2014-12-23', '0000-00-00', 1, '2014-12-20 12:45:45'),
(6, 6, 5, '4', 6, '1', '2015-01-04', '0000-00-00', 1, '2015-01-03 13:09:48'),
(7, 23, 124, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:17:06'),
(8, 23, 125, '8', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:17:20'),
(9, 23, 126, '8', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:17:35'),
(10, 23, 127, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:17:48'),
(11, 23, 128, '8', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:18:01'),
(12, 23, 129, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:18:16'),
(13, 23, 130, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:18:31'),
(14, 23, 131, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:18:41'),
(15, 23, 132, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:18:54'),
(16, 15, 76, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:20:52'),
(17, 15, 77, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:21:01'),
(18, 15, 78, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:21:12'),
(19, 15, 79, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:21:26'),
(20, 15, 80, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:21:36'),
(21, 15, 138, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:21:53'),
(22, 15, 82, '4', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:22:05'),
(23, 15, 83, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:22:23'),
(24, 15, 84, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:22:34'),
(25, 15, 114, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:22:47'),
(26, 15, 85, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:22:59'),
(27, 24, 107, '10', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:23:48'),
(28, 16, 86, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:24:17'),
(29, 16, 87, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:24:30'),
(30, 16, 88, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:24:39'),
(31, 16, 89, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:24:48'),
(32, 16, 90, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:24:59'),
(33, 16, 91, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:26:19'),
(34, 16, 92, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:26:34'),
(35, 16, 93, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:26:49'),
(36, 16, 94, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:28:03'),
(37, 16, 96, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:28:14'),
(38, 16, 95, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:28:33'),
(39, 16, 97, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:29:48'),
(40, 16, 98, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:29:59'),
(41, 17, 99, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:30:54'),
(42, 17, 100, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:31:03'),
(43, 17, 101, '6', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:31:16'),
(44, 17, 102, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:31:25'),
(45, 17, 103, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:31:38'),
(46, 17, 104, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:31:50'),
(47, 17, 105, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:32:02'),
(48, 17, 106, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:32:20'),
(49, 17, 109, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:32:31'),
(50, 17, 110, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:32:41'),
(51, 17, 111, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:33:10'),
(52, 17, 112, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:33:22'),
(53, 17, 113, '2', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:33:35'),
(54, 19, 115, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:34:25'),
(55, 19, 116, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:34:33'),
(56, 19, 117, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:34:41'),
(57, 19, 118, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:34:52'),
(58, 19, 119, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:35:07'),
(59, 19, 120, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:35:22'),
(60, 19, 121, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:35:32'),
(61, 19, 122, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:35:44'),
(62, 19, 123, '12', 6, '1', '2015-01-07', '0000-00-00', 1, '2015-01-07 14:35:56'),
(63, 34, 146, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:18:03'),
(64, 34, 147, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:18:15'),
(65, 34, 148, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:18:23'),
(66, 34, 151, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:18:33'),
(67, 34, 152, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:18:43'),
(68, 34, 153, '1', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:24:03'),
(69, 34, 154, '2', 6, '1', '2015-01-12', '0000-00-00', 1, '2015-01-11 09:24:14'),
(70, 34, 155, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:24:27'),
(71, 34, 156, '1', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:24:45'),
(72, 34, 157, '1', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:25:13'),
(73, 34, 158, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:25:27'),
(74, 34, 159, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:25:36'),
(75, 34, 160, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:25:45'),
(76, 34, 161, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:25:59'),
(77, 34, 162, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:26:09'),
(78, 34, 172, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:26:19'),
(79, 34, 173, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:26:30'),
(80, 34, 163, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:26:42'),
(81, 34, 175, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:27:00'),
(82, 34, 176, '2', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:27:11'),
(83, 33, 143, '12', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:27:32'),
(84, 33, 144, '12', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:27:40'),
(85, 33, 145, '12', 6, '1', '2015-01-11', '0000-00-00', 1, '2015-01-11 09:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `received_stockold`
--

CREATE TABLE IF NOT EXISTS `received_stockold` (
  `received_stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_code_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity_rec` varchar(100) NOT NULL,
  `currency_code` int(10) NOT NULL,
  `curr_rate` varchar(100) NOT NULL,
  `delivery_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`received_stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `received_stockold`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `received_stock_garage`
--


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

--
-- Dumping data for table `reconciled_bank_balance`
--


-- --------------------------------------------------------

--
-- Table structure for table `reconciled_system_balance`
--

CREATE TABLE IF NOT EXISTS `reconciled_system_balance` (
  `reconciled_system_balance_id` int(10) NOT NULL AUTO_INCREMENT,
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

--
-- Dumping data for table `reconciled_system_balance`
--


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
-- Table structure for table `released_item`
--

CREATE TABLE IF NOT EXISTS `released_item` (
  `released_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `requisition_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `released_quantity` int(11) NOT NULL,
  `date_released` date NOT NULL,
  `receiving_person` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `approved_invoice_status` int(11) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`released_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `released_item`
--

INSERT INTO `released_item` (`released_item_id`, `booking_id`, `job_card_id`, `requisition_id`, `item_id`, `released_quantity`, `date_released`, `receiving_person`, `status`, `approved_invoice_status`, `date_recorded`) VALUES
(3, 6, 4, 1, 10, 3, '2014-12-20', 'Joseph', 0, 0, '2014-12-20 12:55:07'),
(4, 6, 4, 1, 10, 1, '2014-12-20', 'Joseph', 0, 0, '2014-12-20 12:55:19'),
(5, 15, 13, 4, 14, 1, '2014-12-23', 'stanly', 0, 0, '2014-12-23 16:02:03'),
(6, 15, 13, 4, 42, 1, '2014-12-23', 'stanly', 0, 0, '2014-12-23 16:02:24'),
(7, 6, 4, 1, 11, 1, '2014-12-24', 'stanly', 0, 0, '2014-12-24 15:52:43'),
(8, 6, 4, 1, 11, 1, '2014-12-24', 'stanly', 0, 0, '2014-12-24 15:52:57'),
(9, 37, 27, 5, 107, 4, '2015-01-05', 'kinyua', 0, 0, '2015-01-05 09:33:24'),
(10, 37, 27, 5, 108, 1, '2015-01-05', 'kinyua', 0, 0, '2015-01-05 09:33:47'),
(11, 29, 21, 6, 71, 1, '2015-01-05', 'kinyua', 0, 0, '2015-01-05 15:46:08'),
(12, 29, 21, 6, 14, 1, '2015-01-05', 'kinyua', 0, 0, '2015-01-05 15:46:27'),
(13, 47, 35, 9, 69, 1, '2015-01-10', 'kinyua', 0, 0, '2015-01-10 12:13:27'),
(14, 48, 36, 10, 145, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(15, 48, 36, 10, 165, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(16, 48, 36, 10, 144, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(17, 48, 36, 10, 143, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(18, 48, 36, 10, 164, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(19, 49, 37, 11, 145, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(20, 49, 37, 11, 164, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(21, 49, 37, 11, 165, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(22, 49, 37, 11, 144, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(23, 49, 37, 11, 143, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(24, 50, 38, 12, 145, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(25, 50, 38, 12, 165, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(26, 50, 38, 12, 164, 1, '2015-01-12', 'kinyanjui', 0, 1, '2015-01-18 03:56:13'),
(27, 50, 38, 12, 140, 1, '2015-01-12', 'kinyanjui', 0, 0, '2015-01-12 11:35:25'),
(28, 51, 39, 13, 145, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(29, 51, 39, 13, 164, 1, '2015-01-12', 'kinyanjui', 0, 1, '2015-01-18 03:56:13'),
(30, 51, 39, 13, 144, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(31, 51, 39, 13, 143, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(32, 52, 40, 14, 145, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(33, 52, 40, 14, 164, 1, '2015-01-12', 'kinyanjui', 0, 1, '2015-01-18 03:56:13'),
(34, 52, 40, 14, 165, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(35, 52, 40, 14, 144, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(36, 52, 40, 14, 143, 1, '2015-01-12', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(37, 51, 39, 15, 145, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(38, 51, 39, 15, 164, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(39, 51, 39, 15, 165, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(40, 51, 39, 15, 143, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(41, 51, 39, 15, 144, 1, '2015-01-12', 'stanly', 0, 1, '2015-01-18 03:56:13'),
(42, 43, 31, 8, 165, 1, '2015-01-08', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(43, 43, 31, 8, 164, 3, '2015-01-08', 'kinyua', 0, 1, '2015-01-18 03:56:13'),
(44, 56, 42, 17, 133, 2, '2015-01-16', 'Stanley', 0, 0, '2015-01-16 09:41:45'),
(45, 56, 42, 17, 110, 3, '2015-01-05', 'Jairud', 0, 0, '2015-01-16 09:41:59'),
(46, 56, 42, 17, 45, 1, '2015-01-16', 'Joram', 0, 0, '2015-01-16 09:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE IF NOT EXISTS `requisition` (
  `requisition_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `requisition_no` varchar(100) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `user_id` int(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requisition_date` date NOT NULL,
  `dispatch_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`requisition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`requisition_id`, `booking_id`, `job_card_id`, `requisition_no`, `remarks`, `user_id`, `date_generated`, `requisition_date`, `dispatch_status`, `status`) VALUES
(1, 6, 4, '', 'Parts requested late', 64, '2014-12-20 12:48:59', '2014-12-20', 0, 0),
(2, 1, 1, '', 'ISSUE', 64, '2014-12-20 13:29:38', '2014-12-20', 0, 0),
(3, 1, 1, '', 'to be issued', 64, '2014-12-23 10:08:21', '2014-12-23', 0, 0),
(4, 15, 13, '', 'issued', 64, '2014-12-23 16:00:50', '2014-12-23', 0, 0),
(5, 37, 27, '', 'Requested', 64, '2015-01-05 09:31:57', '2015-01-05', 0, 0),
(6, 29, 21, '', 'To be issued', 64, '2015-01-05 15:42:26', '2015-01-05', 0, 0),
(7, 43, 31, '', '', 64, '2015-01-10 09:52:25', '2015-01-10', 0, 0),
(8, 43, 31, '', '', 64, '2015-01-10 10:18:16', '2015-01-10', 0, 0),
(9, 47, 35, '', 'issued', 64, '2015-01-10 12:12:23', '2015-01-10', 0, 0),
(10, 48, 36, '', 'issued', 64, '2015-01-12 11:18:53', '2015-01-12', 0, 0),
(11, 49, 37, '', 'issued', 64, '2015-01-12 11:22:13', '2015-01-12', 0, 0),
(12, 50, 38, '', 'issued', 64, '2015-01-12 11:24:22', '2015-01-12', 0, 0),
(13, 51, 39, '', 'issued', 64, '2015-01-12 11:27:13', '2015-01-12', 0, 0),
(14, 52, 40, '', 'issued', 64, '2015-01-12 11:29:23', '2015-01-12', 0, 0),
(15, 51, 39, '', '', 64, '2015-01-12 11:41:23', '2015-01-12', 0, 0),
(16, 46, 34, '', '', 64, '2015-01-13 09:44:31', '2015-01-13', 0, 0),
(17, 56, 42, '', '', 64, '2015-01-16 09:37:23', '2015-01-05', 0, 0);

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
  `dispatch_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`requisition_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `requisition_item`
--

INSERT INTO `requisition_item` (`requisition_item_id`, `booking_id`, `job_card_id`, `requisition_id`, `item_id`, `item_quantity`, `dispatch_status`, `status`) VALUES
(1, 6, 4, 1, 11, 2, 0, 0),
(2, 6, 4, 1, 10, 4, 0, 0),
(3, 1, 1, 2, 27, 2, 0, 0),
(4, 1, 1, 3, 14, 2, 0, 0),
(5, 1, 1, 3, 27, 2, 0, 0),
(6, 15, 13, 4, 14, 1, 0, 0),
(7, 15, 13, 4, 42, 1, 0, 0),
(8, 37, 27, 5, 107, 4, 0, 0),
(9, 37, 27, 5, 108, 1, 0, 0),
(10, 29, 21, 6, 71, 1, 0, 0),
(11, 29, 21, 6, 14, 1, 0, 0),
(12, 43, 31, 7, 144, 1, 0, 0),
(13, 43, 31, 7, 143, 1, 0, 0),
(14, 43, 31, 7, 145, 1, 0, 0),
(15, 43, 31, 7, 1, 3, 0, 0),
(16, 43, 31, 7, 149, 2, 0, 0),
(17, 43, 31, 7, 150, 1, 0, 0),
(18, 43, 31, 8, 165, 1, 0, 0),
(19, 43, 31, 8, 164, 3, 0, 0),
(20, 47, 35, 9, 69, 1, 0, 0),
(21, 48, 36, 10, 145, 1, 0, 0),
(22, 48, 36, 10, 165, 1, 0, 0),
(23, 48, 36, 10, 144, 1, 0, 0),
(24, 48, 36, 10, 143, 1, 0, 0),
(25, 48, 36, 10, 164, 1, 0, 0),
(26, 49, 37, 11, 145, 1, 0, 0),
(27, 49, 37, 11, 164, 1, 0, 0),
(28, 49, 37, 11, 165, 1, 0, 0),
(29, 49, 37, 11, 144, 1, 0, 0),
(30, 49, 37, 11, 143, 1, 0, 0),
(31, 50, 38, 12, 145, 1, 0, 0),
(32, 50, 38, 12, 165, 1, 0, 0),
(33, 50, 38, 12, 164, 1, 0, 0),
(34, 50, 38, 12, 140, 1, 0, 0),
(35, 51, 39, 13, 145, 1, 0, 0),
(36, 51, 39, 13, 164, 1, 0, 0),
(37, 51, 39, 13, 164, 1, 0, 0),
(38, 51, 39, 13, 143, 1, 0, 0),
(39, 51, 39, 13, 144, 1, 0, 0),
(40, 52, 40, 14, 145, 1, 0, 0),
(41, 52, 40, 14, 164, 1, 0, 0),
(42, 52, 40, 14, 165, 1, 0, 0),
(43, 52, 40, 14, 144, 1, 0, 0),
(44, 52, 40, 14, 143, 1, 0, 0),
(45, 51, 39, 15, 145, 1, 0, 0),
(46, 51, 39, 15, 164, 1, 0, 0),
(47, 51, 39, 15, 165, 1, 0, 0),
(48, 51, 39, 15, 143, 1, 0, 0),
(49, 51, 39, 15, 144, 1, 0, 0),
(50, 46, 34, 16, 130, 4, 0, 0),
(51, 56, 42, 17, 133, 2, 0, 0),
(52, 56, 42, 17, 110, 3, 0, 0),
(53, 56, 42, 17, 45, 1, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`rfq_id`, `temp_rfq_id`, `supplier_id`, `user_id`, `product_id`, `product_code`, `rfq_code`, `quantity`, `date_generated`, `status`) VALUES
(1, 1, 26, 64, 21, 'BA0012', 1, '100', '2014-12-24 16:53:14', 1),
(2, 2, 26, 64, 16, 'M007', 1, '120', '2014-12-24 16:54:38', 1),
(3, 1, 2, 19, 43, 'sw', 4, '2', '2015-01-03 11:41:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rfq_code_get`
--

CREATE TABLE IF NOT EXISTS `rfq_code_get` (
  `rfq_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`rfq_code_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rfq_code_get`
--

INSERT INTO `rfq_code_get` (`rfq_code_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `salary_expenses_ledger`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `salary_payments`
--

INSERT INTO `salary_payments` (`salary_payment_id`, `emp_id`, `payroll_id`, `receipt_no`, `amount_received`, `decription`, `currency_code`, `curr_rate`, `mop`, `ref_no`, `date_paid`, `month_paid`, `client_bank`, `our_bank`, `date_received`, `status`) VALUES
(1, 6, 8, 'PS0001/2015', '373200 ', 'Salary Payment for Frankline Lagat        for the month of February 2015', '6', '1', '3', '', '2015-01-20', 'February 2015', '', 4, '2015-01-20 03:02:55', 0),
(2, 1, 7, 'PS0002/2015', '19100 ', 'Salary Payment for Jonah    JOnah    Jonah   for the month of January 2015', '6', '1', '3', '', '2015-01-20', 'January 2015', '', 4, '2015-01-20 03:02:55', 0),
(3, 6, 6, 'PS0003/2015', '374500 ', 'Salary Payment for Frankline Lagat        for the month of January 2015', '6', '1', '3', '', '2015-01-20', 'January 2015', '', 4, '2015-01-20 03:02:55', 0),
(4, 5, 10, 'PS0004/2015', '225070 ', 'Salary Payment for  Issack        for the month of January 2015', '6', '1', '3', '', '2015-01-20', 'January 2015', '', 4, '2015-01-20 04:46:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `sales_code_id` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `lease` int(11) NOT NULL,
  `foc` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `vat_value` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `discount_value` varchar(100) NOT NULL,
  `date_generated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `supplier_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `salesreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `salesreturns_code_gen` (
  `salesreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_code` int(11) NOT NULL,
  PRIMARY KEY (`salesreturn_code_gen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `salesreturns_code_gen`
--


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

--
-- Dumping data for table `sales_bounced_cheques`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales_code`
--


-- --------------------------------------------------------

--
-- Table structure for table `sales_code_get`
--

CREATE TABLE IF NOT EXISTS `sales_code_get` (
  `sales_code_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sales_code_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales_code_get`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sales_ledger`
--

INSERT INTO `sales_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `sales_code`) VALUES
(1, 'Cancelation Of Credit sales Invoice  Reason ()', '-', '', '', 0, '', '2015-01-15 08:02:09', 'cns'),
(2, 'Labour Sales Inv No:73 To Team Fergie Transporters Ltd', '12480', '', '12480', 6, '1', '2015-01-15 10:10:13', 'inv73'),
(3, 'Labour Sales Inv No:75 To Long term view capital ltd', '1610', '', '1610', 6, '1', '2015-01-16 10:29:47', 'inv75'),
(4, 'Labour Sales Inv No:74 To Jackson Muraya', '2980', '', '2980', 6, '1', '2015-01-16 10:35:25', 'inv74'),
(5, 'Labour Sales Inv No:72 To Team Fergie Transporters Ltd', '12860', '', '12860', 6, '1', '2015-01-16 10:39:20', 'inv72'),
(6, 'Labour Sales Inv No:71 To Team Fergie Transporters Ltd', '21590', '', '21590', 6, '1', '2015-01-18 03:44:41', 'inv71'),
(7, 'Labour Sales Inv No: To ', '12860', '', '12860', 6, '1', '2015-01-18 03:53:32', 'inv'),
(8, 'Labour Sales Inv No: To ', '12860', '', '12860', 6, '1', '2015-01-18 03:54:09', 'inv'),
(9, 'Labour Sales Inv No: To ', '12860', '', '12860', 6, '1', '2015-01-18 03:56:13', 'inv'),
(10, 'Labour Sales Inv No:69 To Team Fergie Transporters Ltd', '16060', '', '16060', 6, '1', '2015-01-18 04:05:19', 'inv69'),
(11, 'Labour Sales Inv No:67 To Long term view capital ltd', '7110', '', '7110', 6, '1', '2015-01-18 04:08:16', 'inv67'),
(12, 'Labour Sales Inv No:70 To Long term view capital ltd', '12860', '', '12860', 6, '1', '2015-01-18 04:09:17', 'inv70');

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

--
-- Dumping data for table `sales_receipt`
--


-- --------------------------------------------------------

--
-- Table structure for table `sales_returns`
--

CREATE TABLE IF NOT EXISTS `sales_returns` (
  `sales_returns_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `selling_price` varchar(100) NOT NULL,
  `sales_return_code_id` int(11) NOT NULL,
  `sales_code_id` int(10) NOT NULL,
  `sales_return_quantity` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_returns_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales_returns`
--


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

--
-- Dumping data for table `sales_returns_code`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales_return_ledger`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shareholder_transactions`
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
  `currency` int(10) NOT NULL,
  `curr_rate` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `mop` int(11) NOT NULL,
  `cheque_no` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ref_no` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `date_paid` datetime NOT NULL,
  `client_bank` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `our_bank` int(11) NOT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shares_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shares`
--


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
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_code` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shares_ledger`
--


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

--
-- Dumping data for table `shares_withdrawal`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`shipper_id`, `shipper_name`, `address`, `town`, `phone`, `email`, `status`) VALUES
(1, 'Taran Agencis Limited', 'Yuwu, China', 'Yiwu', '+8615067914472', 'ismaciil207@hotmail.com', 0),
(2, 'By Air to JKIA', 'Nairobi', 'Nairobi, K', 'N/A', 'hhassan@briskdiagnostics.com', 0),
(5, 'Shipped By Supplier', 'n/a', 'n/a', 'n/a', 'na@y.com', 0),
(4, 'Local Purchase', 'Local Purchase', 'Nairobi, K', 'N/A', 'info@briskdiagnostics.com', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `shippers_transactions`
--

INSERT INTO `shippers_transactions` (`transaction_id`, `shipper_id`, `order_code`, `transaction`, `amount`, `currency`, `curr_rate`, `date_recorded`) VALUES
(1, 4, 'fc2', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2014-12-20 12:42:22'),
(2, 4, 'fc6', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-03 09:26:07'),
(3, 4, 'fc24', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:12:02'),
(4, 4, 'fc19', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:13:32'),
(5, 4, 'fc17', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:13:58'),
(6, 4, 'fc16', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:14:23'),
(7, 4, 'fc15', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:15:06'),
(8, 4, 'fc23', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-07 14:15:42'),
(9, 4, 'fc34', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-11 09:17:19'),
(10, 4, 'fc33', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-11 09:17:33'),
(11, 4, 'fc27', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-14 06:21:33'),
(12, 4, 'fc38', 'Freight Charges for Goods Supplied By:Local Purchase', '670', 6, '1', '2015-01-14 07:01:24'),
(13, 4, 'fc43', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-14 14:48:29'),
(14, 4, 'fc35', 'Freight Charges for Goods Supplied By:Local Purchase', '0', 6, '1', '2015-01-16 14:32:10');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff_advance`
--

INSERT INTO `staff_advance` (`staff_advance_id`, `receipt_no`, `emp_id`, `amount_received`, `install`, `decription`, `currency_code`, `curr_rate`, `mop`, `ref_no`, `date_paid`, `month_paid`, `client_bank`, `our_bank`, `date_received`, `status`) VALUES
(1, 'BRSP0001/2015', 6, '10000', '5500', 'Short', '6', '1', '1', 'n', '2015-01-12', 'January 2015', '', 0, '2015-01-19 04:38:58', 0),
(2, 'BRSP0002/2015', 7, '12000', '', 'Salary Advance', '6', '1', '1', '4566', '2015-01-06', 'January 2015', '', 0, '2015-01-19 04:44:42', 0),
(3, 'BRSP0003/2015', 1, '6000', '900', 'sasa', '6', '1', '1', '34555', '2015-01-19', 'January 2015', '', 0, '2015-01-19 04:45:31', 0),
(4, 'BRSP0004/2015', 5, '5000', '3200', '', '6', '1', '1', '', '2015-01-06', 'January 2015', '', 0, '2015-01-20 06:25:50', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff_advance_repayment`
--

INSERT INTO `staff_advance_repayment` (`staff_advance_repayment_id`, `emp_id`, `payroll_id`, `amount_repaid`, `month_paid`, `date_repaid`, `status`) VALUES
(7, 1, 7, '900 ', 'January 2015', '2015-01-20 02:49:44', 0),
(6, 6, 6, '5500 ', 'January 2015', '2015-01-20 02:49:24', 0),
(8, 6, 8, '4500 ', 'February 2015', '2015-01-20 02:56:16', 0),
(9, 5, 10, '0 ', 'January 2015', '2015-01-20 04:45:24', 0),
(10, 5, 11, '3200 ', 'February 2015', '2015-01-20 06:26:15', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `staff_transactions`
--

INSERT INTO `staff_transactions` (`transaction_id`, `emp_id`, `order_code`, `transaction`, `amount`, `currency`, `curr_rate`, `date_recorded`) VALUES
(1, 1, 'payrol1', 'Deduction of Salary Advance From Staff : Jonah  JOnah  Jonah for the month of December 2014', '- ', 6, '1', '2014-12-19 13:13:56'),
(2, 1, 'payrol1', 'Counter Commission payable to : Jonah  JOnah  Jonah for the month of December 2014', '-', 6, '1', '2014-12-19 13:13:56'),
(3, 1, 'payrol1', 'Counter Previous Balance for staff: Jonah  JOnah  Jonah before the month of December 2014', '-0', 6, '1', '2014-12-19 13:13:56'),
(4, 1, 'payrol1', 'Net Amount payable to :Jonah  JOnah  Jonahfor the month of December 2014', '20500 ', 6, '1', '2014-12-19 13:13:56'),
(5, 1, 'payrol1', 'Salary Payment for the month of December 2014', '-20500', 6, '1', '2014-12-19 13:19:38'),
(6, 6, 'payrol4', 'Deduction of Salary Advance From Staff : Frankline Lagat     for the month of February 2015', '- ', 6, '1', '2015-01-14 07:46:18'),
(7, 6, 'payrol4', 'Counter Commission payable to : Frankline Lagat     for the month of February 2015', '-', 6, '1', '2015-01-14 07:46:18'),
(8, 6, 'payrol4', 'Counter Previous Balance for staff: Frankline Lagat     before the month of February 2015', '-0', 6, '1', '2015-01-14 07:46:18'),
(9, 6, 'payrol4', 'Net Amount payable to :Frankline Lagat    for the month of February 2015', '45000 ', 6, '1', '2015-01-14 07:46:18'),
(10, 5, 'payrol5', 'Deduction of Salary Advance From Staff :  Issack     for the month of February 2015', '- ', 6, '1', '2015-01-14 07:49:39'),
(11, 5, 'payrol5', 'Counter Commission payable to :  Issack     for the month of February 2015', '-', 6, '1', '2015-01-14 07:49:39'),
(12, 5, 'payrol5', 'Counter Previous Balance for staff:  Issack     before the month of February 2015', '-0', 6, '1', '2015-01-14 07:49:39'),
(13, 5, 'payrol5', 'Net Amount payable to : Issack    for the month of February 2015', '6500 ', 6, '1', '2015-01-14 07:49:39'),
(14, 5, 'payrol6', 'Deduction of Salary Advance From Staff :  Issack     for the month of January 2015', '- ', 6, '1', '2015-01-14 07:53:26'),
(15, 5, 'payrol6', 'Counter Commission payable to :  Issack     for the month of January 2015', '-', 6, '1', '2015-01-14 07:53:26'),
(16, 5, 'payrol6', 'Counter Previous Balance for staff:  Issack     before the month of January 2015', '-6500', 6, '1', '2015-01-14 07:53:26'),
(17, 5, 'payrol6', 'Net Amount payable to : Issack    for the month of January 2015', '6500 ', 6, '1', '2015-01-14 07:53:26'),
(24, 7, 'payrol11', 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', 6, '1', '2015-01-15 06:25:22'),
(23, 7, 'payrol11', 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', 6, '1', '2015-01-15 06:25:22'),
(22, 7, 'payrol11', 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', 6, '1', '2015-01-15 06:25:22'),
(25, 7, 'payrol11', 'Net Amount payable to : Joakim    for the month of January 2015', '23700 ', 6, '1', '2015-01-15 06:25:22'),
(26, 7, 'payrol11', 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', 6, '1', '2015-01-15 06:25:49'),
(27, 7, 'payrol11', 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', 6, '1', '2015-01-15 06:25:49'),
(28, 7, 'payrol11', 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', 6, '1', '2015-01-15 06:25:49'),
(29, 7, 'payrol11', 'Net Amount payable to : Joakim    for the month of January 2015', '23700 ', 6, '1', '2015-01-15 06:25:49'),
(30, 7, 'payrol11', 'Salary Payment for the month of January 2015', '-23700', 6, '1', '2015-01-15 06:26:49'),
(31, 6, 'payrol10', 'Deduction of Salary Advance From Staff : Frankline Lagat     for the month of January 2015', '- ', 6, '1', '2015-01-15 06:31:43'),
(32, 6, 'payrol10', 'Counter Commission payable to : Frankline Lagat     for the month of January 2015', '-', 6, '1', '2015-01-15 06:31:43'),
(33, 6, 'payrol10', 'Counter Previous Balance for staff: Frankline Lagat     before the month of January 2015', '-43030', 6, '1', '2015-01-15 06:31:43'),
(34, 6, 'payrol10', 'Net Amount payable to :Frankline Lagat    for the month of January 2015', '41060 ', 6, '1', '2015-01-15 06:31:43'),
(35, 6, 'payrol10', 'Salary Payment for the month of January 2015', '-41000', 6, '1', '2015-01-15 06:32:05'),
(36, 7, 'payrol11', 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', 6, '1', '2015-01-15 06:51:07'),
(37, 7, 'payrol11', 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', 6, '1', '2015-01-15 06:51:07'),
(38, 7, 'payrol11', 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', 6, '1', '2015-01-15 06:51:07'),
(39, 7, 'payrol11', 'Net Amount payable to : Joakim    for the month of January 2015', '25440 ', 6, '1', '2015-01-15 06:51:07'),
(40, 6, 'payrol14', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-15 07:30:57'),
(41, 6, 'payrol14', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-15 07:30:57'),
(42, 6, 'payrol14', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-15 07:30:57'),
(43, 6, 'payrol14', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '179000 ', 6, '1', '2015-01-15 07:30:57'),
(44, 6, 'payrol14', 'Salary Payment for the month of January 2015', '-179000', 6, '1', '2015-01-15 07:31:18'),
(45, 7, 'payrol15', 'Deduction of Salary Advance From Staff :  Joakim     for the month of January 2015', '- ', 6, '1', '2015-01-15 07:34:08'),
(46, 7, 'payrol15', 'Counter Commission payable to :  Joakim     for the month of January 2015', '-', 6, '1', '2015-01-15 07:34:08'),
(47, 7, 'payrol15', 'Counter Previous Balance for staff:  Joakim     before the month of January 2015', '-0', 6, '1', '2015-01-15 07:34:08'),
(48, 7, 'payrol15', 'Net Amount payable to : Joakim    for the month of January 2015', '34000 ', 6, '1', '2015-01-15 07:34:08'),
(49, 7, 'payrol15', 'Salary Payment for the month of January 2015', '-34000', 6, '1', '2015-01-15 07:34:32'),
(50, 5, 'payrol16', 'Salary Payment for the month of January 2015', '-23000', 6, '1', '2015-01-15 07:47:01'),
(51, 4, 'payrol18', 'Deduction of Salary Advance From Staff :  JOan        for the month of January 2015', '- ', 6, '1', '2015-01-15 07:49:28'),
(52, 4, 'payrol18', 'Counter Commission payable to :  JOan        for the month of January 2015', '-', 6, '1', '2015-01-15 07:49:28'),
(53, 4, 'payrol18', 'Counter Previous Balance for staff:  JOan        before the month of January 2015', '-0', 6, '1', '2015-01-15 07:49:28'),
(54, 4, 'payrol18', 'Net Amount payable to : JOan       for the month of January 2015', '18000 ', 6, '1', '2015-01-15 07:49:28'),
(55, 4, 'payrol18', 'Salary Payment for the month of January 2015', '-18000', 6, '1', '2015-01-15 07:49:49'),
(56, 6, 'payrol21', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-18 06:38:49'),
(57, 6, 'payrol21', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-18 06:38:49'),
(58, 6, 'payrol21', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-18 06:38:49'),
(59, 6, 'payrol21', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-18 06:38:49'),
(60, 1, 'payrol20', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:31:21'),
(61, 4, 'payrol3', 'Deduction of Salary Advance From Staff :  JOan           for the month of January 2015', '- ', 6, '1', '2015-01-18 07:46:59'),
(62, 4, 'payrol3', 'Counter Commission payable to :  JOan           for the month of January 2015', '-', 6, '1', '2015-01-18 07:46:59'),
(63, 4, 'payrol3', 'Counter Previous Balance for staff:  JOan           before the month of January 2015', '-0', 6, '1', '2015-01-18 07:46:59'),
(64, 4, 'payrol3', 'Net Amount payable to : JOan          for the month of January 2015', '18000 ', 6, '1', '2015-01-18 07:46:59'),
(65, 6, 'payrol1', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-18 07:47:04'),
(66, 6, 'payrol1', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-18 07:47:04'),
(67, 6, 'payrol1', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-18 07:47:04'),
(68, 6, 'payrol1', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-18 07:47:04'),
(69, 4, 'payrol3', 'Salary Payment for the month of January 2015', '-18000 ', 0, '', '2015-01-18 07:47:12'),
(70, 6, 'payrol1', 'Salary Payment for the month of January 2015', '-380000 ', 0, '', '2015-01-18 07:47:12'),
(71, 6, 'payrol2', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-18 07:51:07'),
(72, 6, 'payrol2', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-18 07:51:07'),
(73, 6, 'payrol2', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-18 07:51:07'),
(74, 6, 'payrol2', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-18 07:51:07'),
(75, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:51:19'),
(76, 6, 'payrol2', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-18 07:54:53'),
(77, 6, 'payrol2', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-18 07:54:54'),
(78, 6, 'payrol2', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-18 07:54:54'),
(79, 6, 'payrol2', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-18 07:54:54'),
(80, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:55:06'),
(81, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:57:17'),
(82, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:57:19'),
(83, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:57:20'),
(84, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:57:22'),
(85, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-18 07:57:23'),
(86, 6, 'payrol1', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-19 01:53:52'),
(87, 6, 'payrol1', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 01:53:52'),
(88, 6, 'payrol1', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-19 01:53:52'),
(89, 6, 'payrol1', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-19 01:53:52'),
(90, 6, 'payrol1', 'Salary Payment for the month of January 2015', '-380000 ', 0, '', '2015-01-19 02:19:14'),
(91, 6, 'payrol1', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-19 02:21:10'),
(92, 6, 'payrol1', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 02:21:10'),
(93, 6, 'payrol1', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-19 02:21:10'),
(94, 6, 'payrol1', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-19 02:21:10'),
(95, 1, 'payrol2', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-19 02:21:19'),
(96, 6, 'payrol1', 'Salary Payment for the month of January 2015', '-380000 ', 0, '', '2015-01-19 02:21:19'),
(97, 6, 'payrol1', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-19 02:38:45'),
(98, 6, 'payrol1', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 02:38:45'),
(99, 6, 'payrol1', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-19 02:38:45'),
(100, 6, 'payrol1', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-19 02:38:45'),
(101, 1, 'payrol3', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-19 02:38:57'),
(102, 2, 'payrol2', 'Salary Payment for the month of January 2015', '-60000 ', 0, '', '2015-01-19 02:38:57'),
(103, 6, 'payrol1', 'Salary Payment for the month of January 2015', '-380000 ', 0, '', '2015-01-19 02:38:57'),
(104, 5, 'payrol4', 'Salary Payment for the month of January 2015', '-23000 ', 0, '', '2015-01-19 02:41:42'),
(105, 6, 'payrol2', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '- ', 6, '1', '2015-01-19 02:46:20'),
(106, 6, 'payrol2', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 02:46:20'),
(107, 6, 'payrol2', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-0', 6, '1', '2015-01-19 02:46:20'),
(108, 6, 'payrol2', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '380000 ', 6, '1', '2015-01-19 02:46:20'),
(109, 5, 'payrol4', 'Salary Payment for the month of January 2015', '-23000 ', 0, '', '2015-01-19 02:57:47'),
(110, 2, 'payrol3', 'Salary Payment for the month of January 2015', '-60000 ', 0, '', '2015-01-19 02:57:47'),
(111, 6, 'payrol2', 'Salary Payment for the month of January 2015', '-380000 ', 0, '', '2015-01-19 02:57:47'),
(112, 1, 'payrol1', 'Salary Payment for the month of January 2015', '-20000 ', 0, '', '2015-01-19 02:57:47'),
(113, 6, 'sadv1', 'Staff Advance Payments made on  2015-01-12   ', '10000', 6, '1', '2015-01-19 04:38:58'),
(114, 7, 'sadv2', 'Advance Payments made on  2015-01-06   ', '12000', 6, '1', '2015-01-19 04:44:42'),
(115, 1, 'sadv3', 'Advance Payments made on  2015-01-19   ', '6000', 6, '1', '2015-01-19 04:45:31'),
(116, 6, 'payrol19', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', 6, '1', '2015-01-19 07:30:17'),
(117, 6, 'payrol19', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 07:30:17'),
(118, 6, 'payrol19', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', 6, '1', '2015-01-19 07:30:17'),
(119, 6, 'payrol19', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', 6, '1', '2015-01-19 07:30:17'),
(120, 6, 'payrol1', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', 6, '1', '2015-01-19 07:34:20'),
(121, 6, 'payrol1', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 07:34:20'),
(122, 6, 'payrol1', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', 6, '1', '2015-01-19 07:34:20'),
(123, 6, 'payrol1', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', 6, '1', '2015-01-19 07:34:20'),
(124, 6, 'payrol1', 'Salary Payment for the month of January 2015', '-375500 ', 0, '', '2015-01-19 07:53:53'),
(125, 6, 'payrol5', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', '- ', 6, '1', '2015-01-19 08:52:02'),
(126, 6, 'payrol5', 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', 6, '1', '2015-01-19 08:52:02'),
(127, 6, 'payrol5', 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', 6, '1', '2015-01-19 08:52:02'),
(128, 6, 'payrol5', 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '380000 ', 6, '1', '2015-01-19 08:52:02'),
(129, 6, 'payrol4', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-4500 ', 6, '1', '2015-01-19 08:52:07'),
(130, 6, 'payrol4', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-19 08:52:07'),
(131, 6, 'payrol4', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', 6, '1', '2015-01-19 08:52:07'),
(132, 6, 'payrol4', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '375500 ', 6, '1', '2015-01-19 08:52:07'),
(133, 6, 'payrol5', 'Salary Payment for the month of February 2015', '-380000 ', 0, '', '2015-01-19 08:52:21'),
(134, 6, 'payrol4', 'Salary Payment for the month of January 2015', '-375500 ', 0, '', '2015-01-19 08:52:21'),
(135, 6, 'payrol8', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of February 2015', '-4500  ', 6, '1', '2015-01-20 03:01:33'),
(136, 6, 'payrol8', 'Counter Commission payable to : Frankline Lagat        for the month of February 2015', '-', 6, '1', '2015-01-20 03:01:33'),
(137, 6, 'payrol8', 'Counter Previous Balance for staff: Frankline Lagat        before the month of February 2015', '-', 6, '1', '2015-01-20 03:01:33'),
(138, 6, 'payrol8', 'Net Amount payable to :Frankline Lagat       for the month of February 2015', '373200 ', 6, '1', '2015-01-20 03:01:33'),
(139, 6, 'payrol6', 'Deduction of Salary Advance From Staff : Frankline Lagat        for the month of January 2015', '-5500  ', 6, '1', '2015-01-20 03:02:38'),
(140, 6, 'payrol6', 'Counter Commission payable to : Frankline Lagat        for the month of January 2015', '-', 6, '1', '2015-01-20 03:02:38'),
(141, 6, 'payrol6', 'Counter Previous Balance for staff: Frankline Lagat        before the month of January 2015', '-', 6, '1', '2015-01-20 03:02:38'),
(142, 6, 'payrol6', 'Net Amount payable to :Frankline Lagat       for the month of January 2015', '374500 ', 6, '1', '2015-01-20 03:02:38'),
(143, 6, 'payrol8', 'Salary Payment for the month of February 2015', '-373200 ', 0, '', '2015-01-20 03:02:55'),
(144, 1, 'payrol7', 'Salary Payment for the month of January 2015', '-19100 ', 0, '', '2015-01-20 03:02:55'),
(145, 6, 'payrol6', 'Salary Payment for the month of January 2015', '-374500 ', 0, '', '2015-01-20 03:02:55'),
(146, 5, 'payrol10', 'Salary Payment for the month of January 2015', '-225070 ', 0, '', '2015-01-20 04:46:55'),
(147, 5, 'sadv4', 'Advance Payments made on  2015-01-06   ', '5000', 6, '1', '2015-01-20 06:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `station_id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` varchar(100) NOT NULL,
  PRIMARY KEY (`station_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station_name`) VALUES
(3, 'Garage Station'),
(4, 'Restaurant Section'),
(5, 'Patrol Station');

-- --------------------------------------------------------

--
-- Table structure for table `stockreturns_code_gen`
--

CREATE TABLE IF NOT EXISTS `stockreturns_code_gen` (
  `stockreturn_code_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` int(10) NOT NULL,
  PRIMARY KEY (`stockreturn_code_gen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stockreturns_code_gen`
--


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

--
-- Dumping data for table `stock_payments`
--


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

--
-- Dumping data for table `stock_returns`
--


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

--
-- Dumping data for table `sub_cat_terminologies`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
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
(132, 1, 'Approve Payroll', 10, '<li><a href="approve_payroll.php"><span>Approve Payroll</span></a></li>', '', 0),
(18, 6, 'Overall Productivity', 3, '<li><a href="home.php?postgraduate=postgraduate">Overall Productivity</a></li>', 'Overall Productivity', 0),
(123, 7, 'Cash Sales', 9, '<li><a href="begin_cash_sales.php"><span>Cash Sales</span></a></li>', '', 0),
(124, 9, 'Staff Deductions Reports', 33, '<li><a href="view_comm_payments.php"><span>Staff Deductions Reports</span></a></li>', '', 0),
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
(110, 3, 'Payroll Reports', 34, '<li><a href="view_approved_payroll.php"><span>Payroll Reports</span></a>	\r\n						\r\n						</li>', '', 0),
(111, 5, 'Purchases Transactions', 19, '<li><a href="receive_stock.php"><span>Purchases Transactions</span></a></li>', '', 0),
(112, 5, 'Stock Procurement', 1, '<li><a href=""><span>Stock Procurement</span></a>\r\n				<div><ul>\r\n                \r\n				\r\n				<li><a href="begin_order.php"><span>Create Purchase Order</span></a></li>\r\n				<li><a href="begin_rfq.php"><span>Request for Quotation</span></a></li>\r\n\r\n\r\n            </ul></div>', '', 0),
(113, 5, 'Products Management', 23, '<li><a href="view_prod.php"><span>Products Management</span></a></li>\r\n			\r\n			', '', 0),
(114, 6, 'Invoice Generation', 1, '<li><a href="begin_invoice.php"><span>Invoice Generation</span></a></li>', '', 0),
(115, 6, 'Generate Quotation', 8, '<li><a href="begin_quote.php"><span>Generate Quotation</span></a></li>', '', 0),
(116, 12, 'Manage Employees', 1, '<li><a href="view_employees.php"><span>Manage Employees</a></li>', '', 0),
(117, 6, 'Balance Sheets', 109, '<li><a href="view_balance_sheet.php"><span>Balance Sheet</span></a></li>', '', 0),
(118, 3, 'Chart Of Accounts', 10, '<li><a href="view_terminology.php">Chart Of Accounts</a></li>', '', 0),
(119, 6, 'Sales Transactions', 28, '<li><a href="pay_invoice.php"><span>Sales Transactions</span></a></li>', '', 0),
(120, 1, 'Staff Benefits Report', 2, '<li><a href="view_staff_benefits.php"><span>Staff Benefits Report</span></a>\r\n						\r\n						\r\n						\r\n						\r\n						</li>', '', 0),
(228, 29, 'Process Salary Payments', 12, '<li><a href="process_salary_payment.php">Process Salary Payments</a></li>', '', 0),
(229, 14, 'Approve Clients Payments', 7, '<li><a href="approve_client_payment.php">Approve Clients Payments</a></li>', '', 0),
(230, 14, 'View Approved Clients Payments', 8, '<li><a href="view_approved_client_payments.php">View Approved Clients Payments</a></li>', '', 0),
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
(203, 6, 'View Canceled Invoices', 3, '<li><a href="home.php?viewvisarenewals=viewvisarenewals">View Canceled Invoices</a></li>', '', 0),
(204, 6, 'View Recived Invoice Payments', 7, '<li><a href="view_invoice_payments.php">View Received Invoice Payments</a></li>', '', 0),
(205, 6, 'View Generated Quotations', 9, '<li><a href="view_quotations.php">View Generated Quotations</a></li>', '', 0),
(206, 6, 'Assign Commision Rate To Sales Rep', 9, '<li><a href="assign_commision.php">Assign Commission Rate</a></li>', '', 0),
(207, 6, 'View Commission Rates', 10, '<li><a href="view_ass_commisions.php">View Commission Rates</a></li>', '', 0),
(208, 6, 'View Commissions Report', 11, '<li><a href="view_comm_payments.php">View Commissions Report</a></li>', '', 0),
(209, 6, 'Pay Staff Commission', 10, '<li><a href="pay_commission.php">Pay Staff Commission</a></li>', '', 0),
(210, 9, 'View Staff Statement', 22, '<li><a href="view_staff_statement.php">View Staff Statement</a></li>', '', 0),
(211, 9, 'Record Staff Advance', 5, '<li><a href="add_staff_advance.php">Record Staff Advance</a></li>', '', 0),
(212, 9, 'Process Payroll', 6, '<li><a href="generate_payroll.php">Process Payroll</a></li>', '', 0),
(213, 9, 'Terminate Staff', 40, '<li><a href="terminate_staff.php">Terminate Staff</a></li>', '', 0),
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
(225, 28, 'Bank Ledger', 10, '<li><a href="view_bank_ledger.php">Cash Ledger</a></li>', '', 0),
(226, 24, 'Payroll Settings', 4, '<li><a href="add_station.php">Payroll Settings</a></li>', '', 0),
(227, 24, 'View Approved Payroll', 11, '<li><a href="view_approved_payroll.php">View Approved Payroll</a></li>', '', 0),
(231, 29, 'Print Payroll Register', 34, '<li><a href="begin_print_payroll_register.php">Print Payroll Register</a></li>', '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `cont_person`, `country`, `postal`, `town`, `phone`, `email`, `date_reg`) VALUES
(33, ' Iso', 'JOseph', 'Albania', '', '', '0743567', 'updateosero@gmail.com', '2015-01-18 05:59:26'),
(32, ' Kamau wa kioi', 'Njoro', 'Afganistan', '895', 'Nairobi', '984', 'updateosero@gmail.com', '2015-01-18 05:57:32'),
(26, ' TOOLCRAFTS LTD', 'Sales 0722655848', 'Kenya', '651345/6513456', 'Nairobi', '0722655848', 'info@toolcrafts.com', '2014-12-24 15:44:25'),
(27, ' WAGDAH MOTORS', 'DAVID', 'Kenya', 'wagdah.motors@gmail.com', 'Nairobi', '0729577416', 'wagdah.motors@gmail.com', '2015-01-06 07:59:47'),
(28, ' IMPALA AUTO SPARES', 'MR', 'Kenya', 'N/A', 'Nairobi', '0722633128', 'impala@gmail.com', '2015-01-06 10:37:52'),
(29, ' BASELINE MOTORS SPARE', 'MR', 'Kenya', 'N/A', 'Rongai', '0720367854', 'baseline@yahoo.com', '2015-01-08 13:11:05'),
(30, ' POWER FLOW SERVICES', 'JOSHUA', 'Kenya', '', '', '0722958705', 'JOSHUA@YAHOO.COM', '2015-01-08 16:03:56'),
(31, ' BITMOS AOTO SUPPLIES', 'MR', 'Kenya', '', '', '0727082956', 'wagdah.motors@gmail.com', '2015-01-11 08:52:31');

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
  PRIMARY KEY (`supplier_payments_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `supplier_payments`
--


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

--
-- Dumping data for table `supplier_receipt`
--


-- --------------------------------------------------------

--
-- Table structure for table `supplier_transactions`
--

CREATE TABLE IF NOT EXISTS `supplier_transactions` (
  `transaction_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `transaction` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `curr_rate` varchar(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `supplier_transactions`
--

INSERT INTO `supplier_transactions` (`transaction_id`, `supplier_id`, `order_code`, `transaction`, `currency`, `curr_rate`, `amount`, `date_recorded`) VALUES
(1, 2, 'po2', 'Purchase Order LPO No:BD0002/2014', 6, '1', '3120', '2014-12-20 12:42:22'),
(2, 26, 'cancpo5', 'Cancel Purchase Order LPO No:BD0005/2014 (CANCELLED)', 6, '1', '-', '2014-12-24 16:50:59'),
(3, 10, 'cancpo4', 'Cancel Purchase Order LPO No:BD0004/2014 (CANCELED)', 6, '1', '-', '2014-12-24 16:51:15'),
(4, 7, 'cancpo3', 'Cancel Purchase Order LPO No:BD0003/2014 (CANCELED)', 6, '1', '-', '2014-12-24 16:51:50'),
(5, 2, 'cancpo1', 'Cancel Purchase Order LPO No:BD0001/2014 (CANCELED)', 6, '1', '-', '2014-12-24 16:52:07'),
(6, 2, 'po6', 'Purchase Order LPO No:BD0006/2015', 6, '1', '3560', '2015-01-03 09:26:07'),
(7, 27, 'po24', 'Purchase Order LPO No:BD0024/2015', 6, '1', '4000', '2015-01-07 14:12:02'),
(8, 27, 'po19', 'Purchase Order LPO No:BD0019/2015', 6, '1', '20160', '2015-01-07 14:13:32'),
(9, 27, 'po17', 'Purchase Order LPO No:BD0017/2015', 6, '1', '11440', '2015-01-07 14:13:58'),
(10, 27, 'po16', 'Purchase Order LPO No:BD0016/2015', 6, '1', '17840', '2015-01-07 14:14:23'),
(11, 27, 'po15', 'Purchase Order LPO No:BD0015/2015', 6, '1', '9700', '2015-01-07 14:15:06'),
(12, 27, 'po23', 'Purchase Order LPO No:BD0023/2015', 6, '1', '13950', '2015-01-07 14:15:42'),
(13, 31, 'po34', 'Purchase Order LPO No:BD0034/2015', 6, '1', '34550', '2015-01-11 09:17:19'),
(14, 27, 'po33', 'Purchase Order LPO No:BD0033/2015', 6, '1', '31800', '2015-01-11 09:17:33'),
(15, 29, 'po27', 'Purchase Order LPO No:BD0027/2015', 6, '1', '8900', '2015-01-14 06:21:33'),
(16, 15, 'po38', 'Purchase Order LPO No:BD0038/2015', 6, '1', '5927', '2015-01-14 07:01:24'),
(17, 27, 'po43', 'Purchase Order LPO No:BD0043/2015', 6, '1', '531', '2015-01-14 14:48:28'),
(18, 29, 'po35', 'Purchase Order LPO No:BD0035/2015', 6, '1', '1000', '2015-01-16 14:32:10'),
(19, 29, 'cancpo32', 'Cancel Purchase Order LPO No:BD0032/2015 (Poorly generated)', 6, '1', '-', '2015-01-18 05:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(100) NOT NULL,
  `task_desc` longtext NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_desc`) VALUES
(1, 'CAMSHAFT GEAR R&R', '\r\n'),
(2, 'PARTIAL ENGINE ASSY R&R', ''),
(3, 'ENGINE OVERHAUL', ''),
(4, 'SHORT BLOCK ASSY R&R', ''),
(5, 'ENGINE ASSY R&R', ''),
(6, 'CYLINDER HEAD GASKET', ''),
(7, 'ENGINE MOUNTING  AND/OR INSULATOR R/R(ONE SIDE)', ''),
(8, 'OIL PAN GASKET OR SEAL PACKING', ''),
(9, 'TIMING BELT ', ''),
(10, 'RADIATOR RESERVE TANK ASSEMBLY', ''),
(11, 'WATER  PUMP BEARING', ''),
(12, 'TURBOCHARGER  ASSY R/R', ''),
(13, 'EXHAUST MANIFOLD GASKET R', ''),
(14, 'BRAKE CALIPER REPLACEMENT FRONT OR REAR ASSY ', ''),
(15, 'FRONT BRAKE DISC ONE SIDE  GRIND', ''),
(16, 'BRAKE WHEEL CYLINDER CUP KIT BOTH SIDES', ''),
(17, 'BATTERY TEST', ''),
(18, 'STARTER BRUSH HOLDER ASSEMBLY', ''),
(19, 'DISTRIBUTOR CAP', ''),
(20, 'WINDSHIELD WIPER LINK', ''),
(21, 'MAJOR SERVICE', ''),
(22, 'MINOR SERVICE', ''),
(23, 'Replace clutch master cylinder', ''),
(24, 'Injector pump calibration', ''),
(25, 'Replace brake seals', ''),
(26, 'rectified headlights', ''),
(27, 'Replace alternator "o"ring', ''),
(28, 'replace fanbelt', ''),
(29, 'Brakes adjustment', ''),
(30, 'Door stopper welding', ''),
(31, 'Cable adjustment', ''),
(32, 'Ignition system rectification', ''),
(33, 'radio rectification', ''),
(34, 'Front wheel cylinder rubbers replacement', ''),
(35, 'Horn rectification', ''),
(36, 'clutch adjustment', ''),
(37, 'Front wheel bearing adj', ''),
(38, 'Clutch Overhaul', ''),
(39, 'Rear wheel cylinder rubbers', ''),
(40, 'Wheel Alignment', ''),
(41, 'Wheel Balancing', ''),
(42, 'Replace indicator bulbs', ''),
(43, 'Replace brake bulbs', ''),
(44, 'Rear brake lights replacement', ''),
(45, 'wheel studs replacement', ''),
(46, 'Battery terminal replacement', ''),
(47, 'Battery water refill', ''),
(48, 'Puncture repair', ''),
(49, 'side mirror repair', ''),
(50, 'Front crankshaft seal', ''),
(51, 'Rear crankshaft seal', ''),
(52, 'Diesel pipes replacements', ''),
(53, 'Speed governor repair', ''),
(54, 'drain and refill engine oil', ''),
(55, 'replace spark plugs', ''),
(56, 'Overheating', ''),
(57, 'oil filter', ''),
(58, 'diesel filter', ''),
(59, 'Rear oil seal isuzu', ''),
(60, 'front oil seal isuzu', ''),
(61, 'brake linings isuzu', ''),
(62, 'Replace inner oil seal', ''),
(63, 'Replace outer oil seal', ''),
(64, 'replace brake linings', ''),
(65, 'Wheel changing', ''),
(66, 'Replace exhaust gasket', ''),
(67, 'greasing', ''),
(68, 'Exhaust welding', ''),
(69, 'separator labour', ''),
(70, 'Kingpin replacement', ''),
(71, 'snake light wiring', ''),
(72, 'Replace rear axle tube', ''),
(73, 'Replace top radiator hose', ''),
(74, 'Replace diesel filter', ''),
(76, 'Replace front wheel bearing', ''),
(77, 'Replace passenger lights', ''),
(78, 'Draglink labour', ''),
(79, 'repair exhaust gasket', ''),
(80, 'repair suspension system', ''),
(81, 'Drain diesel ', '');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_purchase_order`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `temp_rfq`
--


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

--
-- Dumping data for table `temp_sales`
--


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

--
-- Dumping data for table `temp_sales_returns`
--


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

--
-- Dumping data for table `temp_stock_returns`
--


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

--
-- Dumping data for table `transport_charges`
--


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
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `phone`, `email`, `user_group_id`, `username`, `password`, `date_created`, `islogged_in`, `allow_add`, `allow_view`, `allow_edit`, `allow_delete`, `suspend`, `area_id`) VALUES
(19, 'Griffins Osero Mogeni', '0777777777', 'updateosero@gmail.com', 15, 'osero', 'd97d3a75495b93f3c8ec2e1aea44b31a', '2014-01-24 22:02:33', 0, 1, 1, 1, 1, 0, 0),
(65, 'Gabriel Kinyanjui', '0723953763', 'kinyanjuigabriel@gmail.com', 30, 'kinyanjui', '93dd4de5cddba2c733c65f233097f05a', '2015-01-05 08:35:50', 0, 1, 1, 1, 1, 0, 0),
(64, 'Lazarus Kisilu', '0722154270', 'lazkis@yahoo.com', 39, 'lazarus', 'a4a6a33a3c5fb414fef69b653c591e0a', '2014-12-20 12:10:12', 0, 1, 1, 1, 1, 0, 0),
(63, 'Stanley Njoroge', '0708302642', 'njorogestanly@gmail.com', 30, 'stanly', '1970eb6d24986b86a3a8dad510c6c057', '2014-12-18 14:31:47', 0, 1, 1, 0, 0, 0, 0),
(62, 'Martha Nyambura', '0712116927', 'marthanjenga.mn@gmail.com', 41, 'martha', '3003051f6d158f6687b8a820c46bfa80', '2014-12-18 14:27:02', 0, 1, 1, 1, 1, 0, 0),
(66, 'Joseph Kinyua', '', 'josephkinyua638@gmail.com', 15, 'kinyua', 'deedadcac9ce6df2d4c6997f025b9517', '2015-01-05 08:36:46', 0, 1, 1, 1, 1, 0, 0),
(67, 'Daniel Ndungu', '0723736114', 'kamundaniel@gmail.com', 1, 'daniel', '3cc697419ea18cc98d525999665cb94a', '2015-01-05 13:58:52', 0, 1, 1, 1, 1, 0, 0),
(68, 'Juma Kimotho', '0711328141', 'jkimotho25@gmail.com', 41, 'jumaki', 'c23521c09ef5076381159d1b5953cb63', '2015-01-05 14:31:03', 0, 1, 1, 1, 1, 0, 0),
(69, 'Joseph Macharia', '0723404874', '', 40, 'Mash', 'c2177d4a10ba4d1778bc34562d05f55c', '2015-01-12 12:30:34', 0, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `description`) VALUES
(1, 'Administration', ''),
(15, 'Super Administrator', 'Main System Administrators'),
(30, 'Technicians', 'Vehicle Mechanics'),
(36, 'Workshop Managers', ''),
(37, 'Workshop Supervisors', ''),
(38, 'Management', ''),
(39, 'Workshop Store Keepers', ''),
(40, 'Accounts And Finance', ''),
(41, 'Service Department', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

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
(78, 24, 5, 0),
(79, 15, 11, 0),
(110, 15, 23, 0),
(81, 15, 17, 0),
(83, 30, 1, 0),
(85, 33, 1, 0),
(86, 33, 17, 0),
(87, 33, 18, 0),
(88, 24, 1, 0),
(89, 24, 6, 0),
(90, 24, 17, 0),
(91, 24, 18, 0),
(93, 30, 17, 0),
(94, 15, 14, 0),
(95, 15, 8, 0),
(96, 15, 16, 0),
(97, 34, 1, 0),
(98, 34, 3, 0),
(99, 34, 6, 0),
(100, 34, 11, 0),
(101, 34, 14, 0),
(102, 34, 16, 0),
(103, 34, 17, 0),
(116, 15, 19, 0),
(115, 15, 9, 0),
(114, 15, 20, 0),
(113, 15, 21, 0),
(111, 15, 6, 0),
(112, 15, 7, 0),
(118, 15, 22, 0),
(121, 15, 29, 0),
(122, 15, 28, 0),
(123, 15, 32, 0),
(124, 15, 33, 0),
(125, 36, 1, 0),
(126, 36, 3, 0),
(127, 36, 4, 0),
(134, 37, 1, 0),
(129, 36, 6, 0),
(130, 36, 11, 0),
(131, 36, 13, 0),
(132, 36, 16, 0),
(133, 36, 17, 0),
(135, 37, 3, 0),
(136, 37, 6, 0),
(137, 37, 8, 0),
(138, 37, 11, 0),
(139, 37, 16, 0),
(140, 37, 17, 0),
(141, 37, 13, 0),
(142, 39, 1, 0),
(143, 39, 3, 0),
(144, 39, 6, 0),
(145, 39, 16, 0),
(146, 40, 1, 0),
(147, 40, 3, 0),
(148, 40, 6, 0),
(149, 40, 7, 0),
(150, 40, 13, 0),
(151, 40, 14, 0),
(152, 40, 16, 0),
(153, 40, 28, 0),
(154, 40, 32, 0),
(155, 40, 33, 0),
(156, 38, 1, 0),
(157, 38, 8, 0),
(158, 38, 28, 0),
(159, 38, 3, 0),
(160, 38, 13, 0),
(161, 38, 4, 0),
(162, 38, 7, 0),
(164, 38, 16, 0),
(165, 38, 29, 0),
(166, 38, 32, 0),
(168, 41, 1, 0),
(169, 41, 3, 0),
(170, 41, 25, 0),
(171, 41, 6, 0),
(172, 41, 11, 0),
(173, 41, 17, 0),
(176, 41, 4, 0),
(175, 39, 17, 0),
(177, 1, 8, 0),
(178, 1, 3, 0),
(179, 1, 4, 0),
(181, 1, 11, 0),
(192, 41, 8, 0),
(183, 1, 13, 0),
(184, 1, 14, 0),
(185, 1, 16, 0),
(186, 1, 17, 0),
(188, 1, 29, 0),
(189, 1, 28, 0),
(190, 1, 32, 0),
(191, 1, 33, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=573 ;

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
(13, 15, 35, 0),
(14, 15, 2, 0),
(15, 15, 1, 0),
(16, 15, 3, 0),
(17, 15, 4, 0),
(18, 15, 5, 0),
(19, 15, 6, 0),
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
(209, 15, 64, 0),
(210, 15, 65, 0),
(211, 14, 65, 0),
(212, 15, 66, 0),
(213, 20, 66, 0),
(214, 24, 6, 0),
(215, 24, 5, 0),
(216, 24, 67, 0),
(217, 15, 68, 0),
(218, 15, 71, 0),
(219, 15, 72, 0),
(220, 15, 69, 0),
(221, 15, 73, 0),
(222, 15, 11, 0),
(225, 30, 48, 0),
(226, 30, 43, 0),
(232, 30, 68, 0),
(233, 15, 34, 0),
(234, 15, 74, 0),
(235, 15, 28, 0),
(236, 34, 2, 0),
(237, 34, 3, 0),
(238, 34, 5, 0),
(239, 34, 73, 0),
(240, 34, 65, 0),
(241, 34, 1, 0),
(242, 34, 62, 0),
(243, 34, 34, 0),
(244, 34, 71, 0),
(245, 34, 72, 0),
(246, 34, 41, 0),
(247, 34, 46, 0),
(248, 34, 12, 0),
(249, 34, 49, 0),
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
(278, 30, 54, 0),
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
(292, 15, 123, 0),
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
(332, 15, 217, 0),
(333, 15, 181, 0),
(334, 15, 172, 0),
(335, 15, 218, 0),
(336, 15, 219, 0),
(337, 15, 220, 0),
(338, 15, 221, 0),
(339, 15, 222, 0),
(340, 15, 223, 0),
(341, 15, 224, 0),
(342, 36, 7, 0),
(343, 36, 9, 0),
(344, 36, 39, 0),
(345, 36, 10, 0),
(346, 36, 3, 0),
(347, 36, 43, 0),
(348, 36, 44, 0),
(349, 36, 65, 0),
(350, 36, 1, 0),
(351, 36, 221, 0),
(352, 36, 62, 0),
(353, 36, 34, 0),
(354, 36, 63, 0),
(355, 36, 71, 0),
(356, 36, 72, 0),
(357, 36, 220, 0),
(358, 36, 222, 0),
(359, 36, 70, 0),
(360, 36, 217, 0),
(361, 36, 54, 0),
(362, 36, 177, 0),
(363, 36, 15, 0),
(364, 36, 20, 0),
(365, 36, 18, 0),
(366, 36, 25, 0),
(367, 36, 27, 0),
(368, 37, 73, 0),
(369, 37, 43, 0),
(370, 37, 44, 0),
(371, 37, 65, 0),
(372, 37, 1, 0),
(373, 37, 221, 0),
(374, 37, 62, 0),
(375, 37, 169, 0),
(376, 37, 34, 0),
(377, 37, 63, 0),
(378, 37, 71, 0),
(379, 37, 72, 0),
(380, 37, 220, 0),
(381, 37, 222, 0),
(382, 37, 70, 0),
(383, 37, 217, 0),
(384, 37, 54, 0),
(385, 37, 177, 0),
(386, 37, 15, 0),
(387, 37, 20, 0),
(388, 37, 18, 0),
(389, 39, 5, 0),
(390, 39, 73, 0),
(391, 39, 169, 0),
(392, 39, 223, 0),
(393, 39, 224, 0),
(394, 39, 171, 0),
(395, 39, 218, 0),
(396, 39, 172, 0),
(397, 39, 219, 0),
(398, 39, 173, 0),
(399, 39, 174, 0),
(400, 39, 181, 0),
(401, 39, 177, 0),
(402, 40, 75, 0),
(403, 40, 157, 0),
(404, 40, 3, 0),
(405, 40, 165, 0),
(406, 40, 138, 0),
(407, 40, 136, 0),
(408, 40, 44, 0),
(409, 40, 169, 0),
(410, 40, 34, 0),
(411, 40, 217, 0),
(412, 40, 41, 0),
(413, 40, 46, 0),
(414, 40, 203, 0),
(415, 40, 141, 0),
(416, 40, 204, 0),
(417, 40, 123, 0),
(418, 40, 214, 0),
(419, 40, 108, 0),
(420, 40, 191, 0),
(421, 40, 192, 0),
(422, 40, 193, 0),
(423, 40, 194, 0),
(424, 40, 195, 0),
(425, 40, 133, 0),
(426, 40, 101, 0),
(427, 40, 134, 0),
(428, 40, 117, 0),
(429, 40, 116, 0),
(430, 40, 211, 0),
(431, 40, 212, 0),
(432, 40, 210, 0),
(433, 40, 110, 0),
(434, 40, 213, 0),
(435, 40, 182, 0),
(436, 40, 187, 0),
(437, 40, 183, 0),
(438, 40, 189, 0),
(439, 40, 184, 0),
(440, 40, 188, 0),
(441, 40, 185, 0),
(442, 40, 190, 0),
(443, 40, 171, 0),
(444, 40, 218, 0),
(445, 40, 172, 0),
(446, 40, 219, 0),
(447, 40, 173, 0),
(448, 40, 174, 0),
(449, 40, 200, 0),
(450, 40, 180, 0),
(451, 40, 177, 0),
(452, 40, 125, 0),
(453, 40, 126, 0),
(454, 40, 127, 0),
(455, 40, 128, 0),
(456, 40, 129, 0),
(457, 40, 140, 0),
(458, 40, 199, 0),
(459, 38, 138, 0),
(460, 38, 136, 0),
(461, 38, 44, 0),
(462, 1, 222, 0),
(463, 38, 41, 0),
(464, 38, 46, 0),
(465, 38, 203, 0),
(466, 38, 204, 0),
(467, 38, 214, 0),
(468, 38, 108, 0),
(469, 38, 224, 0),
(470, 38, 218, 0),
(471, 38, 172, 0),
(472, 38, 219, 0),
(473, 38, 173, 0),
(474, 38, 174, 0),
(475, 38, 180, 0),
(476, 38, 177, 0),
(477, 38, 183, 0),
(478, 38, 189, 0),
(479, 38, 185, 0),
(480, 38, 190, 0),
(481, 38, 133, 0),
(482, 38, 134, 0),
(483, 38, 117, 0),
(484, 38, 128, 0),
(485, 38, 129, 0),
(486, 38, 116, 0),
(487, 38, 210, 0),
(488, 38, 110, 0),
(489, 38, 15, 0),
(490, 38, 20, 0),
(491, 38, 18, 0),
(492, 38, 60, 0),
(493, 38, 25, 0),
(494, 38, 27, 0),
(495, 38, 29, 0),
(496, 38, 7, 0),
(497, 38, 10, 0),
(498, 38, 3, 0),
(499, 38, 165, 0),
(500, 40, 121, 0),
(501, 41, 2, 0),
(502, 41, 3, 0),
(503, 41, 5, 0),
(504, 41, 73, 0),
(505, 41, 43, 0),
(506, 41, 44, 0),
(507, 41, 65, 0),
(508, 41, 1, 0),
(509, 41, 221, 0),
(510, 41, 62, 0),
(511, 41, 169, 0),
(512, 41, 34, 0),
(513, 41, 63, 0),
(514, 41, 71, 0),
(515, 41, 72, 0),
(516, 41, 220, 0),
(517, 41, 222, 0),
(519, 41, 217, 0),
(520, 39, 136, 0),
(521, 39, 220, 0),
(522, 39, 222, 0),
(523, 41, 10, 0),
(524, 40, 70, 0),
(525, 1, 75, 0),
(526, 1, 2, 0),
(527, 1, 165, 0),
(528, 1, 125, 0),
(529, 1, 126, 0),
(530, 1, 129, 0),
(531, 1, 7, 0),
(532, 1, 9, 0),
(533, 1, 39, 0),
(534, 1, 10, 0),
(535, 1, 157, 0),
(536, 1, 3, 0),
(537, 1, 5, 0),
(538, 1, 73, 0),
(539, 1, 138, 0),
(540, 1, 136, 0),
(541, 1, 65, 0),
(542, 1, 1, 0),
(543, 1, 221, 0),
(544, 1, 62, 0),
(545, 1, 169, 0),
(546, 1, 34, 0),
(547, 1, 63, 0),
(548, 1, 71, 0),
(549, 1, 72, 0),
(550, 1, 220, 0),
(551, 1, 70, 0),
(552, 1, 217, 0),
(553, 1, 54, 0),
(554, 1, 41, 0),
(555, 1, 46, 0),
(556, 1, 203, 0),
(557, 1, 141, 0),
(558, 1, 204, 0),
(559, 1, 123, 0),
(560, 1, 214, 0),
(561, 1, 121, 0),
(562, 1, 108, 0),
(563, 41, 75, 0),
(564, 15, 132, 0),
(566, 15, 226, 0),
(567, 15, 227, 0),
(569, 15, 228, 0),
(570, 15, 229, 0),
(571, 15, 230, 0),
(572, 15, 231, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `vat_ledger`
--

INSERT INTO `vat_ledger` (`transaction_id`, `transactions`, `amount`, `debit`, `credit`, `currency_code`, `curr_rate`, `date_recorded`, `order_code`) VALUES
(1, 'Labour Sales Inv No:73 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-15 10:10:13', 'inv73'),
(2, 'Labour Sales Inv No:75 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-16 10:29:47', 'inv75'),
(3, 'Labour Sales Inv No:74 To Jackson Muraya', '0', '0', '', 6, '1', '2015-01-16 10:35:25', 'inv74'),
(4, 'Labour Sales Inv No:72 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-16 10:39:20', 'inv72'),
(5, 'Labour Sales Inv No:71 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-18 03:44:41', 'inv71'),
(6, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:53:32', 'inv'),
(7, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:54:09', 'inv'),
(8, 'Labour Sales Inv No: To ', '0', '0', '', 6, '1', '2015-01-18 03:56:13', 'inv'),
(9, 'Labour Sales Inv No:69 To Team Fergie Transporters Ltd', '0', '0', '', 6, '1', '2015-01-18 04:05:19', 'inv69'),
(10, 'Labour Sales Inv No:67 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-18 04:08:16', 'inv67'),
(11, 'Labour Sales Inv No:70 To Long term view capital ltd', '0', '0', '', 6, '1', '2015-01-18 04:09:17', 'inv70');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_engine`
--

CREATE TABLE IF NOT EXISTS `vehicle_engine` (
  `vehicle_engine_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehicle_engine_size` varchar(100) NOT NULL,
  `vehicle_make_desc` longtext NOT NULL,
  PRIMARY KEY (`vehicle_engine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `vehicle_engine`
--

INSERT INTO `vehicle_engine` (`vehicle_engine_id`, `vehicle_engine_size`, `vehicle_make_desc`) VALUES
(1, '1000', ''),
(2, '1500', ''),
(3, '1800', ''),
(4, '2000', ''),
(5, '2500', ''),
(6, '3000', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make`
--

CREATE TABLE IF NOT EXISTS `vehicle_make` (
  `vehicle_make_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehicle_make_name` varchar(100) NOT NULL,
  `vehicle_make_desc` longtext NOT NULL,
  PRIMARY KEY (`vehicle_make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicle_make`
--

INSERT INTO `vehicle_make` (`vehicle_make_id`, `vehicle_make_name`, `vehicle_make_desc`) VALUES
(1, 'Toyota', ''),
(2, 'Subaru', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_model`
--

CREATE TABLE IF NOT EXISTS `vehicle_model` (
  `vehicle_model_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vehicle_make_id` int(20) DEFAULT NULL,
  `vehicle_model_name` varchar(100) DEFAULT NULL,
  `vehicle_model_desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vehicle_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vehicle_model`
--

INSERT INTO `vehicle_model` (`vehicle_model_id`, `vehicle_make_id`, `vehicle_model_name`, `vehicle_model_desc`) VALUES
(1, 2, 'Imprezza', '');

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

