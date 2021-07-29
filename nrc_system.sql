-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 12:04 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nrc_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `alloc`
--

CREATE TABLE IF NOT EXISTS `alloc` (
  `alloc_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`alloc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `alloc`
--

INSERT INTO `alloc` (`alloc_id`) VALUES
(1),
(2),
(3),
(4);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `audit_trails`
--

INSERT INTO `audit_trails` (`audit_id`, `user_id`, `date_of_event`, `action`) VALUES
(1, 19, '2014-01-24 10:02:33', 'Signed out of the system'),
(2, 19, '2014-01-24 11:08:35', 'Signed out of the system'),
(3, 19, '2014-01-25 05:52:28', 'Signed out of the system'),
(4, 19, '2014-01-25 08:42:01', 'Signed out of the system'),
(5, 19, '2014-01-25 11:37:12', 'Signed out of the system'),
(6, 19, '2014-01-25 12:48:46', 'Signed out of the system'),
(7, 19, '2014-01-26 06:39:20', 'Signed out of the system'),
(8, 19, '2014-01-26 21:13:24', 'Signed out of the system'),
(9, 0, '2014-01-26 21:13:30', 'Signed out of the system'),
(10, 19, '2014-01-27 05:59:30', 'Updated Sub Module Details'),
(11, 19, '2014-01-27 06:00:00', 'Updated Sub Module Details'),
(12, 19, '2014-01-27 06:00:46', 'Updated Sub Module Details'),
(13, 19, '2014-01-27 06:37:33', 'Updated Sub Module Details'),
(14, 19, '2014-01-27 06:39:00', 'Updated Sub Module Details'),
(15, 19, '2014-01-27 07:06:48', 'Updated Sub Module Details'),
(16, 19, '2014-01-27 07:08:16', 'Updated Sub Module Details'),
(17, 162, '2014-01-27 12:28:43', 'Signed out of the system'),
(18, 19, '2014-01-29 06:29:51', 'Signed out of the system'),
(19, 19, '2014-01-29 06:30:31', 'Signed out of the system'),
(20, 27, '2014-01-29 06:44:28', 'Signed out of the system'),
(21, 19, '2014-01-29 06:46:06', 'Signed out of the system'),
(22, 27, '2014-01-29 07:29:33', 'Signed out of the system'),
(23, 19, '2014-01-29 07:49:10', 'Signed out of the system'),
(24, 27, '2014-01-29 09:32:44', 'Signed out of the system'),
(25, 19, '2014-01-29 09:33:28', 'Signed out of the system'),
(26, 27, '2014-01-29 15:06:00', 'Signed out of the system'),
(27, 27, '2014-01-29 19:26:11', 'Signed out of the system'),
(28, 19, '2014-01-29 19:35:34', 'Signed out of the system'),
(29, 27, '2014-01-30 00:17:55', 'Signed out of the system'),
(30, 19, '2014-01-30 06:12:37', 'Signed out of the system'),
(31, 27, '2014-01-30 06:55:00', 'Signed out of the system'),
(32, 19, '2014-01-30 07:07:23', 'Signed out of the system'),
(33, 27, '2014-01-30 07:17:35', 'Signed out of the system'),
(34, 19, '2014-01-30 08:39:26', 'Signed out of the system'),
(35, 28, '2014-01-30 08:39:48', 'Signed out of the system'),
(36, 19, '2014-01-30 09:03:28', 'Signed out of the system'),
(37, 19, '2014-01-30 09:04:23', 'Signed out of the system'),
(38, 19, '2014-01-30 09:12:16', 'Signed out of the system'),
(39, 29, '2014-01-30 10:07:20', 'Signed out of the system'),
(40, 19, '2014-01-30 10:26:30', 'Signed out of the system'),
(41, 19, '2014-01-30 11:34:38', 'Signed out of the system'),
(42, 19, '2014-02-01 07:07:06', 'Signed out of the system'),
(43, 19, '2014-02-01 07:07:35', 'Signed out of the system'),
(44, 27, '2014-02-01 07:09:02', 'Signed out of the system'),
(45, 27, '2014-02-01 07:09:15', 'Signed out of the system'),
(46, 19, '2014-02-01 07:10:46', 'Signed out of the system'),
(47, 27, '2014-02-01 10:45:16', 'Signed out of the system'),
(48, 0, '2014-02-01 13:36:36', 'Signed out of the system'),
(49, 19, '2014-02-01 13:36:47', 'Signed out of the system'),
(50, 0, '2014-02-02 12:11:35', 'Updated User Group Details'),
(51, 19, '2014-02-02 12:15:26', 'Updated Sub Module Details'),
(52, 19, '2014-02-02 12:20:26', 'Updated Sub Module Details'),
(53, 19, '2014-02-02 12:20:26', 'Updated Sub Module Details'),
(54, 19, '2014-02-02 12:22:15', 'Updated Sub Module Details'),
(55, 19, '2014-02-02 12:23:36', 'Updated Sub Module Details'),
(56, 19, '2014-02-02 12:24:22', 'Updated Sub Module Details'),
(57, 19, '2014-02-02 12:25:43', 'Updated Sub Module Details'),
(58, 19, '2014-02-02 12:26:25', 'Updated Sub Module Details'),
(59, 19, '2014-02-02 12:27:16', 'Updated Sub Module Details'),
(60, 19, '2014-02-02 12:28:07', 'Updated Sub Module Details'),
(61, 19, '2014-02-02 12:28:56', 'Updated Sub Module Details'),
(62, 19, '2014-02-03 00:20:14', 'Signed out of the system'),
(63, 0, '2014-02-03 09:27:00', 'Signed out of the system'),
(64, 19, '2014-02-03 11:41:58', 'Signed out of the system'),
(65, 27, '2014-02-03 12:01:07', 'Signed out of the system'),
(66, 29, '2014-02-03 12:03:38', 'Signed out of the system'),
(67, 19, '2014-02-03 16:16:44', 'Signed out of the system'),
(68, 19, '2014-02-03 16:17:24', 'Signed out of the system'),
(69, 29, '2014-02-03 16:18:44', 'Signed out of the system'),
(70, 19, '2014-02-03 16:47:33', 'Signed out of the system'),
(71, 29, '2014-02-03 16:49:08', 'Signed out of the system'),
(72, 19, '2014-02-03 17:20:31', 'Signed out of the system'),
(73, 30, '2014-02-03 17:25:58', 'Signed out of the system'),
(74, 29, '2014-02-03 18:14:35', 'Signed out of the system'),
(75, 19, '2014-02-03 18:37:51', 'Signed out of the system'),
(76, 19, '2014-02-04 09:49:46', 'Signed out of the system'),
(77, 19, '2014-02-06 03:03:53', 'Signed out of the system'),
(78, 27, '2014-02-06 03:10:40', 'Signed out of the system'),
(79, 29, '2014-02-06 03:15:07', 'Signed out of the system'),
(80, 19, '2014-02-06 03:23:57', 'Signed out of the system'),
(81, 19, '2014-02-06 03:34:25', 'Signed out of the system'),
(82, 19, '2014-02-06 07:15:21', 'Signed out of the system'),
(83, 19, '2014-02-06 07:27:26', 'Signed out of the system'),
(84, 19, '2014-02-06 08:36:02', 'Signed out of the system'),
(85, 29, '2014-02-06 08:37:50', 'Signed out of the system'),
(86, 19, '2014-02-06 13:42:33', 'Signed out of the system'),
(87, 19, '2014-02-18 07:33:51', 'Signed out of the system'),
(88, 162, '2014-02-19 02:07:53', 'Signed out of the system'),
(89, 19, '2014-02-19 13:30:35', 'Signed out of the system'),
(90, 19, '2014-02-20 07:13:23', 'Signed out of the system'),
(91, 29, '2014-02-20 07:13:56', 'Signed out of the system'),
(92, 19, '2014-02-20 07:15:38', 'Signed out of the system'),
(93, 31, '2014-02-20 07:16:05', 'Signed out of the system'),
(94, 19, '2014-02-20 07:17:54', 'Signed out of the system'),
(95, 31, '2014-02-20 07:18:39', 'Signed out of the system'),
(96, 19, '2014-02-20 07:19:59', 'Signed out of the system'),
(97, 31, '2014-02-20 07:20:42', 'Signed out of the system'),
(98, 19, '2014-02-20 07:21:16', 'Signed out of the system'),
(99, 31, '2014-02-20 07:26:55', 'Signed out of the system'),
(100, 19, '2014-02-20 07:56:38', 'Signed out of the system'),
(101, 31, '2014-02-20 08:06:40', 'Signed out of the system'),
(102, 19, '2014-02-20 08:23:07', 'Signed out of the system'),
(103, 31, '2014-02-20 08:29:43', 'Signed out of the system'),
(104, 19, '2014-02-20 08:31:43', 'Signed out of the system'),
(105, 31, '2014-02-20 08:32:48', 'Signed out of the system'),
(106, 29, '2014-02-20 08:33:44', 'Signed out of the system'),
(107, 19, '2014-02-20 08:34:14', 'Signed out of the system'),
(108, 19, '2014-02-20 08:36:46', 'Signed out of the system'),
(109, 29, '2014-02-20 08:37:51', 'Signed out of the system'),
(110, 31, '2014-02-20 09:36:01', 'Signed out of the system'),
(111, 19, '2014-02-20 09:41:45', 'Updated Sub Module Details'),
(112, 19, '2014-02-20 09:45:00', 'Signed out of the system'),
(113, 31, '2014-02-20 10:18:40', 'Signed out of the system'),
(114, 29, '2014-02-20 10:19:24', 'Signed out of the system'),
(115, 31, '2014-02-20 10:37:01', 'Signed out of the system'),
(116, 29, '2014-02-20 10:38:58', 'Signed out of the system'),
(117, 31, '2014-02-20 10:40:51', 'Signed out of the system'),
(118, 19, '2014-02-20 10:50:36', 'Signed out of the system'),
(119, 31, '2014-02-20 10:51:05', 'Signed out of the system'),
(120, 19, '2014-02-20 12:00:46', 'Signed out of the system'),
(121, 19, '2014-02-20 16:03:06', 'Signed out of the system'),
(122, 19, '2014-02-20 17:20:54', 'Signed out of the system'),
(123, 31, '2014-02-21 02:37:04', 'Signed out of the system'),
(124, 19, '2014-02-21 02:39:20', 'Signed out of the system'),
(125, 31, '2014-02-21 03:03:23', 'Signed out of the system'),
(126, 19, '2014-02-21 07:48:36', 'Signed out of the system'),
(127, 31, '2014-02-21 07:50:34', 'Signed out of the system'),
(128, 19, '2014-02-21 11:06:06', 'Signed out of the system'),
(129, 31, '2014-02-21 11:11:49', 'Signed out of the system'),
(130, 19, '2014-02-24 06:36:41', 'Signed out of the system'),
(131, 31, '2014-02-24 07:00:27', 'Signed out of the system'),
(132, 0, '2014-02-24 07:00:31', 'Signed out of the system'),
(133, 19, '2014-02-24 14:52:47', 'Signed out of the system'),
(134, 19, '2014-02-25 07:56:07', 'Signed out of the system'),
(135, 31, '2014-02-25 07:59:09', 'Signed out of the system');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

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
(45, 'RS045', '1', '2', '3', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', '', 0, 0),
(46, 'RS046', 'PETER ', 'KYALO', 'KING''OO', '0', '18', 'Male', '0000-00-00', 'KENYAN', '', ' 2013-10-10  ', '0', '1', '0', 'Married', 'CHRISTIAN', '5.1', '60', '0', '', '4.jpg', 0, 0),
(47, 'RS047', 'abdi', 'Faraj', 'Mohammed', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'PC180662.JPG', 0, 0),
(48, 'RS048', 'Joshua', 'Omonid', 'hh', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'CAM00175.jpg', 0, 0);

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
(3, 'System Master', 3, '<a href="#" id="products" class="top_link"><span class="down">System Master</span></a>', 'System Master', 0),
(4, 'Access Control', 2, '<a href="#" id="services" class="top_link"><span class="down">Access Control</span></a>', 'Manage access levels', 0),
(5, 'Record Bi-Weekly Report', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Record Bi-Weekly Report</span></a>', 'Project managenet panel', 0),
(6, 'Bi-Weekly Reports', 4, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Bi-Weekly Reports</span></a>', 'Bi-Weekly Reports', 0),
(7, 'General Transactions', 5, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">General Transactions</span></a>', 'Panel that manages otherpanel', 0),
(8, 'Finance And Accounting', 6, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Finance And Accounting</span></a>', 'desk', 0),
(9, 'Consolidated System Reports', 8, '<a href="#nogo57" id="privacy" class="top_link"><span class="down">Consolidated System Reports</span></a>', 'General Reports for administrator', 0),
(11, 'Field Region Management', 3, '<a href="#" id="services" class="top_link"><span class="down">Field Region Management</span></a>', 'Field Region Management', 0),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `modules_submodules`
--

INSERT INTO `modules_submodules` (`modules_submodules_id`, `module_id`, `sub_module_id`, `status`) VALUES
(20, 3, 6, 0),
(19, 3, 5, 0),
(124, 11, 1, 0),
(17, 3, 3, 0),
(16, 3, 2, 0),
(125, 11, 4, 0),
(7, 4, 7, 0),
(8, 4, 8, 0),
(9, 4, 9, 0),
(10, 4, 10, 0),
(108, 6, 43, 0),
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
(130, 3, 68, 0),
(118, 6, 48, 0),
(103, 5, 6, 0),
(122, 5, 5, 0),
(123, 5, 67, 0),
(129, 6, 34, 0),
(116, 8, 60, 0),
(112, 6, 62, 0),
(113, 6, 63, 0),
(126, 11, 65, 0),
(127, 11, 11, 0),
(120, 4, 63, 0),
(121, 4, 45, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `nrc_area`
--

INSERT INTO `nrc_area` (`area_id`, `country_id`, `area_code`, `area_name`, `area_desc`) VALUES
(3, '8', 'Turkanagg', 'TR002333', 'ssddd'),
(5, '9', 'KKy', 'Malind', ''),
(6, '9', 'Uyrett', 'Kiambu Area', 'Ksashashasas'),
(7, '10', 'JJB', 'Juba', ''),
(8, '10', 'AR2323', 'JUBA OIL FIELDS', 'JUBA OIL FIELDS'),
(9, '9', 'NMB', 'Namanga Border', 'Namanga Border'),
(10, '11', 'SE007', 'Southern Ethiopia', 'Southern Ethiopia'),
(11, '11', 'WE08', 'Western Ethiopia', 'Western Ethiopia');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_biweekly`
--

CREATE TABLE IF NOT EXISTS `nrc_biweekly` (
  `bi_weekly_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `set_template_id` int(20) DEFAULT NULL,
  `settlement_id` int(11) NOT NULL,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_id` int(11) DEFAULT NULL,
  `period_id` int(11) DEFAULT NULL,
  `trans_date` date DEFAULT NULL,
  `bi_achieved` int(11) NOT NULL,
  `bi_male` int(20) DEFAULT NULL,
  `bi_female` int(20) DEFAULT NULL,
  `narrative` text,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`bi_weekly_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `nrc_biweekly`
--

INSERT INTO `nrc_biweekly` (`bi_weekly_id`, `set_template_id`, `settlement_id`, `project_id`, `sub_project_id`, `period_id`, `trans_date`, `bi_achieved`, `bi_male`, `bi_female`, `narrative`, `user_id`, `location_id`, `area_id`, `country_id`) VALUES
(1, 8, 4, 0, 2, 222, '2014-01-30', 0, 0, 0, '', 27, 0, 0, 0),
(2, 9, 4, 0, 2, 222, '2014-01-30', 0, 0, 0, '', 27, 0, 0, 0),
(3, 10, 4, 0, 2, 222, '2014-01-30', 0, 0, 0, '', 27, 0, 0, 0),
(4, 11, 4, 0, 2, 222, '2014-01-30', 0, 0, 0, '', 27, 0, 0, 0),
(5, 12, 4, 0, 2, 222, '2014-01-30', 0, 32, 11, 'Bore hole were rehabiliated but not completed', 27, 0, 0, 0),
(6, 13, 4, 0, 2, 222, '2014-01-30', 0, 23, 11, 'The benefiries appreciated alot on the ongoing rehabiliattion', 27, 0, 0, 0),
(7, 14, 4, 0, 2, 222, '2014-01-30', 0, 0, 0, 'Trained persons captured the ideas easily', 27, 0, 0, 0),
(8, 8, 4, 0, 2, 222, '2014-02-01', 0, 7, 2, '', 27, 0, 0, 0),
(9, 9, 4, 0, 2, 222, '2014-02-01', 0, 4, 5, '', 27, 0, 0, 0),
(10, 10, 4, 0, 2, 222, '2014-02-01', 0, 5, 2, '', 27, 0, 0, 0),
(11, 11, 4, 0, 2, 222, '2014-02-01', 0, 1, 2, '', 27, 0, 0, 0),
(12, 12, 4, 0, 2, 222, '2014-02-01', 0, 43, 35, 'n1', 27, 0, 0, 0),
(13, 13, 4, 0, 2, 222, '2014-02-01', 0, 13, 31, 'n1', 27, 0, 0, 0),
(14, 14, 4, 0, 2, 222, '2014-02-01', 0, 9, 19, 'n1', 27, 0, 0, 0),
(15, 5, 4, 0, 2, 222, '2014-02-01', 0, 20, 3, 'narrrrrr1', 27, 2, 0, 0),
(16, 6, 4, 0, 2, 222, '2014-02-01', 0, 2, 5, 'narrrrrr2', 27, 2, 0, 0),
(17, 7, 4, 0, 2, 222, '2014-02-01', 0, 3, 7, 'narrrrrr3', 27, 2, 0, 0),
(18, 5, 4, 0, 2, 222, '2014-02-03', 0, 3, 1, 'nnnnnnn', 29, 4, 6, 9),
(19, 6, 4, 0, 2, 222, '2014-02-03', 0, 3, 4, 'nnnnnnnnnn', 29, 4, 6, 9),
(20, 7, 4, 0, 2, 222, '2014-02-03', 0, 1, 3, 'nnnnnnnnnnnnn', 29, 4, 6, 9),
(21, 15, 5, 0, 3, 222, '2014-02-03', 0, 6, 9, 'Narration 3', 29, 7, 7, 10),
(22, 16, 5, 0, 3, 222, '2014-02-03', 0, 3, 2, 'Narration 4', 29, 7, 7, 10),
(23, 17, 5, 0, 3, 222, '2014-02-03', 0, 2, 3, 'Narration 5', 29, 7, 7, 10),
(24, 18, 5, 0, 4, 222, '2014-02-03', 0, 4, 5, 'n1', 29, 7, 7, 10),
(25, 19, 5, 0, 4, 222, '2014-02-03', 0, 2, 43, 'n2n', 29, 7, 7, 10),
(26, 20, 5, 0, 4, 222, '2014-02-03', 0, 3, 7, 'n3', 29, 7, 7, 10),
(27, 21, 5, 0, 4, 222, '2014-02-03', 0, 1, 1, 'n4', 29, 7, 7, 10),
(28, 18, 5, 0, 4, 222, '2014-02-06', 120, 70, 50, 'narration 1', 29, 7, 7, 10),
(29, 19, 5, 0, 4, 222, '2014-02-06', 70, 50, 20, 'narration 2', 29, 7, 7, 10),
(30, 20, 5, 0, 4, 222, '2014-02-06', 4, 1, 3, 'narration 3', 29, 7, 7, 10),
(31, 21, 5, 0, 4, 222, '2014-02-06', 5, 2, 3, 'narration 4', 29, 7, 7, 10),
(32, 23, 5, 0, 0, 222, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(33, 45, 5, 0, 0, 222, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(34, 46, 5, 0, 0, 222, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(35, 47, 5, 0, 0, 222, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(36, 49, 5, 0, 0, 222, '2014-02-20', 2, 5, 9, 'two shelter for 14 people build', 31, 7, 7, 10),
(37, 50, 5, 0, 0, 222, '2014-02-20', 10, 100, 34, '10 taps to serve 134 people constructed', 31, 7, 7, 10),
(38, 38, 5, 0, 0, 1, '2014-02-20', 20, 9, 11, 'good narative', 31, 7, 7, 10),
(39, 23, 5, 0, 0, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(40, 45, 5, 0, 0, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(41, 46, 5, 0, 0, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(42, 47, 5, 0, 0, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(43, 49, 5, 0, 0, 1, '2014-02-20', 2, 34, 20, 'two shelters constructed for 54 residents', 31, 7, 7, 10),
(44, 50, 5, 0, 0, 1, '2014-02-20', 4, 20, 15, '4 water taps set up for access by 35 people', 31, 7, 7, 10),
(45, 23, 5, 0, 12, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(46, 45, 5, 0, 12, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(47, 46, 5, 0, 12, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(48, 47, 5, 0, 12, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(49, 49, 5, 0, 12, 1, '2014-02-20', 0, 0, 0, '', 31, 7, 7, 10),
(50, 50, 5, 0, 12, 1, '2014-02-20', 23, 1, 3, 'v', 31, 7, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_cc`
--

CREATE TABLE IF NOT EXISTS `nrc_cc` (
  `cc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cc_code` varchar(100) DEFAULT NULL,
  `cc_name` varchar(100) DEFAULT NULL,
  `cc_desc` text,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `nrc_cc`
--

INSERT INTO `nrc_cc` (`cc_id`, `cc_code`, `cc_name`, `cc_desc`) VALUES
(1, 'Wash', 'Wash', 'Washe ded'),
(2, 'ED003 ', 'Education', 'Education'),
(3, 'FDS78', 'Food Security', ''),
(4, 'ICLA009', 'ICLA ', 'Iclas'),
(5, 'SH008 ', 'Shelter', 'Shelter'),
(8, 'FCL', 'Food In It', NULL),
(9, 'FCMM', 'Me and You', NULL),
(10, 'CC006', 'Protection', 'Protection of refugees');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_ccvsactivity`
--

CREATE TABLE IF NOT EXISTS `nrc_ccvsactivity` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sub_project_id` int(20) DEFAULT NULL,
  `total_target` int(20) DEFAULT NULL,
  `target_male` int(20) DEFAULT NULL,
  `target_female` int(20) DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_country`
--

CREATE TABLE IF NOT EXISTS `nrc_country` (
  `country_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(50) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `nrc_country`
--

INSERT INTO `nrc_country` (`country_id`, `country_code`, `country_name`) VALUES
(8, 'Burundi', 'Burund1'),
(9, 'KNY', 'Kenya'),
(10, 'SSD', 'Southern Sudan'),
(11, 'ETH002', 'Ethiopia');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_donor`
--

CREATE TABLE IF NOT EXISTS `nrc_donor` (
  `donor_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `donor_code` varchar(100) DEFAULT NULL,
  `donor_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `postal_address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `donor_desc` longtext NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nrc_donor`
--

INSERT INTO `nrc_donor` (`donor_id`, `donor_code`, `donor_name`, `contact_person`, `country`, `town`, `postal_address`, `phone`, `email`, `website`, `donor_desc`) VALUES
(1, 'ECHO', 'International Care', 'John Graham', 'Gabon', 'Nairobi', 'P.O. BOX 234', '879999', 'updateosero@gmail.com', 'www.kamau.com', 'goood'),
(3, 'UUC', 'Come home', '', 'Select Country...', '', '', '', '', '', ''),
(4, 'CHF', 'COMMON HUMANTARIAN FUND', 'FIFA', 'Kenya', 'NAIROBI', 'P.O 454545', '0202 546546', 'INFO@CHF.COM', 'WWW.CHF.COMMON', '');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_donorvsproject`
--

CREATE TABLE IF NOT EXISTS `nrc_donorvsproject` (
  `donorvsproject_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `donor_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`donorvsproject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nrc_donorvsproject`
--

INSERT INTO `nrc_donorvsproject` (`donorvsproject_id`, `project_id`, `donor_id`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_donor_details`
--

CREATE TABLE IF NOT EXISTS `nrc_donor_details` (
  `donor_details_id` bigint(1) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`donor_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nrc_donor_details`
--

INSERT INTO `nrc_donor_details` (`donor_details_id`, `donor_id`, `project_id`) VALUES
(6, 4, 3),
(5, 4, 2),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_location`
--

CREATE TABLE IF NOT EXISTS `nrc_location` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `country_id` int(20) DEFAULT NULL,
  `area_id` int(20) DEFAULT NULL,
  `location_code` varchar(100) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `location_desc` text,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `nrc_location`
--

INSERT INTO `nrc_location` (`location_id`, `country_id`, `area_id`, `location_code`, `location_name`, `location_desc`) VALUES
(1, 8, 2, 'ssasasmmmmmmm', 'sasa9999', 'sasaggg'),
(2, 9, 5, 'Banana009', 'Banana', 'ndizi'),
(4, 9, 6, 'Majani Loc', 'Majani ', 'Desx'),
(6, 8, 3, 'Location 67 ', 'Karumaindo', 'for real'),
(7, 10, 7, 'NST', 'Nile State', ''),
(8, 11, 10, 'AB008', 'Addis Ababa', 'Addis Ababa');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_project`
--

CREATE TABLE IF NOT EXISTS `nrc_project` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_code` varchar(100) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project_desc` text,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nrc_project`
--

INSERT INTO `nrc_project` (`project_id`, `project_code`, `project_name`, `start_date`, `end_date`, `project_desc`, `status`) VALUES
(1, 'BR002', 'Burao Shelter', '2014-01-16', '2014-01-31', 'projects', 1),
(2, 'BR003', 'Burao Food Provision', '2014-01-22', '2014-01-31', 'description', 1),
(3, 'SOFM1403', 'Kakuma South Sudan Refugee Program', '2014-01-01', '2014-12-30', 'To assist refugees from south Sudan due to Political instability.', 1),
(4, 'SOFL1404', 'HOUSING LAND AND PROPERTY', '2014-02-01', '2014-02-28', '200 HOUSE HOLDS SUPPORTED WITH CANCELLING SERVICES', 1),
(5, 'SMM999', 'Security Management', '2014-02-01', '2014-02-28', 'Security', 1),
(6, 'WSP098', 'Water and Sanitation Project', '2014-02-01', '2014-02-28', 'Water and Sanitation Project', 2),
(7, 'SM00233', 'Feeding of Refugee childred', '2014-02-01', '2014-02-28', 'sdfsdf', 2),
(8, 'SM00023', 'Clothing of Refugees', '2014-02-01', '2014-02-22', 'sdf', 1),
(9, 'SM0445', 'School Feeding programme', '2014-02-01', '2014-02-27', 'sdfdfs', 1),
(10, 'trtrt', 'trtrtrt', '2014-02-04', '2014-02-10', 'trtrt', 1),
(12, 'SOFM14111', 'General Shelter Construction', '2014-02-02', '2014-02-28', 'ff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_projectvsarea`
--

CREATE TABLE IF NOT EXISTS `nrc_projectvsarea` (
  `pa_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `area_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`pa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `nrc_projectvsarea`
--

INSERT INTO `nrc_projectvsarea` (`pa_id`, `project_id`, `alloc_id`, `area_id`) VALUES
(1, 5, 0, 1),
(2, 5, 0, 2),
(3, 6, 0, 2),
(4, 7, 0, 1),
(5, 7, 0, 2),
(6, 10, 0, 1),
(7, 10, 0, 2),
(8, 3, 0, 3),
(9, 3, 0, 5),
(10, 3, 0, 6),
(11, 4, 0, 7),
(12, 5, 0, 8),
(13, 5, 0, 9),
(14, 6, 0, 10),
(15, 7, 0, 3),
(16, 7, 0, 11),
(17, 8, 0, 3),
(18, 8, 0, 5),
(19, 9, 0, 3),
(20, 9, 0, 5),
(21, 1, 0, 7),
(22, 1, 0, 8),
(23, 1, 0, 6),
(24, 1, 0, 5),
(25, 1, 0, 9),
(26, 1, 0, 10),
(27, 1, 0, 3),
(28, 1, 0, 11),
(29, 12, 0, 7),
(30, 12, 0, 6),
(32, 4, 1, 5),
(33, 10, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_projectvscountry`
--

CREATE TABLE IF NOT EXISTS `nrc_projectvscountry` (
  `pc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `country_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `nrc_projectvscountry`
--

INSERT INTO `nrc_projectvscountry` (`pc_id`, `project_id`, `alloc_id`, `country_id`) VALUES
(1, 9, 0, 8),
(2, 9, 0, 9),
(3, 2, 0, 8),
(4, 2, 0, 11),
(5, 2, 0, 9),
(6, 2, 0, 10),
(7, 12, 0, 9),
(8, 4, 1, 9),
(9, 10, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_projectvslocation`
--

CREATE TABLE IF NOT EXISTS `nrc_projectvslocation` (
  `pl_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `location_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `nrc_projectvslocation`
--

INSERT INTO `nrc_projectvslocation` (`pl_id`, `project_id`, `alloc_id`, `location_id`) VALUES
(1, 7, 0, 1),
(2, 7, 0, 2),
(3, 8, 0, 2),
(6, 3, 0, 4),
(7, 3, 0, 6),
(8, 4, 0, 7),
(9, 5, 0, 7),
(10, 6, 0, 8),
(11, 7, 0, 7),
(12, 7, 0, 8),
(13, 8, 0, 1),
(14, 9, 0, 1),
(15, 1, 0, 8),
(16, 1, 0, 2),
(17, 1, 0, 6),
(18, 1, 0, 4),
(19, 1, 0, 7),
(20, 1, 0, 1),
(21, 12, 0, 8),
(22, 12, 0, 2),
(23, 12, 0, 6),
(24, 12, 0, 4),
(25, 12, 0, 7),
(26, 12, 0, 1),
(27, 4, 1, 2),
(28, 5, 0, 1),
(29, 10, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_projectvssettlement`
--

CREATE TABLE IF NOT EXISTS `nrc_projectvssettlement` (
  `ps_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `settlement_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `nrc_projectvssettlement`
--

INSERT INTO `nrc_projectvssettlement` (`ps_id`, `project_id`, `alloc_id`, `settlement_id`) VALUES
(1, 9, 0, 1),
(2, 9, 0, 2),
(3, 10, 0, 1),
(4, 3, 0, 2),
(5, 3, 0, 4),
(6, 4, 0, 5),
(7, 5, 0, 5),
(8, 6, 0, 6),
(9, 7, 0, 2),
(10, 7, 0, 4),
(11, 8, 0, 2),
(12, 9, 0, 2),
(13, 9, 0, 4),
(14, 2, 0, 5),
(15, 2, 0, 6),
(16, 2, 0, 4),
(17, 2, 0, 2),
(18, 12, 0, 5),
(19, 12, 0, 6),
(20, 12, 0, 4),
(21, 12, 0, 2),
(22, 4, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_project_details`
--

CREATE TABLE IF NOT EXISTS `nrc_project_details` (
  `project_id` int(20) DEFAULT NULL,
  `detail_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_id` int(20) DEFAULT NULL,
  `location_id` int(20) DEFAULT NULL,
  `settlement_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_report_period`
--

CREATE TABLE IF NOT EXISTS `nrc_report_period` (
  `period_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `period_from` date DEFAULT NULL,
  `period_to` varchar(20) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `status` int(20) DEFAULT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nrc_report_period`
--

INSERT INTO `nrc_report_period` (`period_id`, `period_from`, `period_to`, `description`, `year`, `month`, `status`) VALUES
(1, '2014-02-15', ' 2014-02-30  ', 'February 30th 2014', '', '', 1),
(2, '2014-01-01', ' 2014-01-15  ', 'January 15th 2014', '', '', 2),
(3, '2014-01-16', ' 2014-01-31  ', 'January 31st 2014', '', '', 2),
(4, '2014-03-01', ' 2014-03-15  ', 'March 15th 2014', '', '', 1),
(5, '2014-03-16', ' 2014-03-31  ', 'March 31st 2014', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_settlement`
--

CREATE TABLE IF NOT EXISTS `nrc_settlement` (
  `settlement_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_id` int(20) DEFAULT NULL,
  `location_id` int(20) DEFAULT NULL,
  `settlement_code` varchar(100) DEFAULT NULL,
  `settlement_name` varchar(100) DEFAULT NULL,
  `settlement_desc` text,
  PRIMARY KEY (`settlement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nrc_settlement`
--

INSERT INTO `nrc_settlement` (`settlement_id`, `area_id`, `location_id`, `settlement_code`, `settlement_name`, `settlement_desc`) VALUES
(2, 5, 5, 'MK455', 'Mikinsanoo', 'sssssssssssssssss'),
(4, 6, 4, 'SET009', 'Majani KIambu', 'into it'),
(5, 7, 7, 'DS009', 'Demadior Settlement', ''),
(6, 10, 8, 'HSSS08', 'Haille Selasia Settlemnt Scheme', 'Haille Selasia Settlemnt Scheme'),
(7, 5, 2, 'NSS', 'Njuguna Settlement Scheme', 'Njuguna Settlement Scheme');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_set_template`
--

CREATE TABLE IF NOT EXISTS `nrc_set_template` (
  `set_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `cc_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sub_project_id` int(11) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `target` varchar(11) NOT NULL,
  `target_male` varchar(100) NOT NULL,
  `target_female` varchar(100) NOT NULL,
  PRIMARY KEY (`set_template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `nrc_set_template`
--

INSERT INTO `nrc_set_template` (`set_template_id`, `location_id`, `area_id`, `country_id`, `cc_id`, `project_id`, `sub_project_id`, `activity`, `target`, `target_male`, `target_female`) VALUES
(1, 0, NULL, NULL, 2, 2, 1, 'Single family latrines constructed', '200', '21', '23'),
(2, 0, NULL, NULL, 2, 2, 1, 'Solar Lamps Distributed', '124', '100', '43'),
(3, 0, NULL, NULL, 2, 2, 1, 'Classrooms constructed', '432', '21', '67'),
(4, 0, NULL, NULL, 2, 2, 1, 'Stores rehabilitated', '321', '11', '98'),
(5, 0, NULL, NULL, 10, 2, 1, 'Monitors trained on English, computer and report writing', '211', '21', '12'),
(6, 0, NULL, NULL, 10, 2, 1, 'PMN/PMT coordination meetings conducted', '322', '34', '21'),
(7, 0, NULL, NULL, 10, 2, 1, 'NRC protection staff trained', '345', '43', '43'),
(8, 2, NULL, 9, 1, 2, 1, 'Hygiene Kits Distributed', '322', '300', '22'),
(9, 2, NULL, 9, 1, 2, 1, 'Family Shared Latrines Constructed', '244', '122', '122'),
(10, 2, NULL, 9, 1, 2, 1, 'Sanitation Toolkits Distributed', '111', '90', '21'),
(11, 2, NULL, 9, 1, 2, 1, 'Sensitization Campaigns Conducted', '432', '32', '400'),
(12, 0, NULL, NULL, 1, 3, 2, 'Boreholes rehabilitated', '300', '180', '120'),
(13, 0, NULL, NULL, 1, 3, 2, 'Communal Latrines constructed', '102', '80', '32'),
(14, 0, NULL, NULL, 1, 3, 2, 'Committees formed and trained', '98', '50', '48'),
(15, 0, NULL, NULL, 3, 2, 3, 'Fish Supply', '25', '10', '15'),
(16, 0, NULL, NULL, 3, 2, 3, 'Goat Meet Supply', '11', '6', '5'),
(17, 0, NULL, NULL, 3, 2, 3, 'Matumbo ya nyoka supply', '99', '69', '30'),
(18, 0, NULL, NULL, 5, 4, 4, '#shelters  constructed', '100', '60', '40'),
(19, 0, NULL, NULL, 5, 4, 4, '# of HHs receiving NFIs', '300', '150', '150'),
(20, 0, NULL, NULL, 5, 4, 4, '# of persons receiving NFIs', '400', '100', '300'),
(21, 0, NULL, NULL, 5, 4, 4, '# of settlement plans produced', '450', '150', '300'),
(22, 7, 7, 10, 4, 4, 4, 'Test Location set template', '20', '8', '12'),
(23, 7, 7, 10, 1, 4, 5, '#number of water tanks supplied', '23', '23', '23'),
(24, 7, 7, 10, 10, 5, 7, 'Provide Night Garmets to security personel', '120', '90', '30'),
(25, 7, 7, 10, 10, 5, 7, 'Construct Flood Lights', '70', '60', '10'),
(27, 8, NULL, NULL, 1, 6, 8, 'Deep Wells for sure', '150', '60', '90'),
(29, 8, NULL, NULL, 1, 0, 8, 'Wash rooms', '200', '120', '80'),
(31, 8, NULL, NULL, 1, 0, 8, 'Reliable Drainage Systemsrr', '128', '90', '38'),
(33, 2, NULL, 9, 1, 0, 1, 'Deep Wells for sure', '20', '12', '8'),
(34, 6, NULL, NULL, 4, 4, 4, 'Human Rights Placards', '210', '190', '20'),
(35, 6, NULL, NULL, 4, 4, 4, 'Activits renumenations', '90', '20', '70'),
(36, 6, NULL, NULL, 4, 4, 4, 'International Understanding Training', '102', '67', '45'),
(37, 6, NULL, NULL, 4, 4, 4, 'Test Karumaindao and project id', '80', '65', '15'),
(38, 7, 7, 10, 3, 2, 3, 'Import food import', '89', '45', '44'),
(39, 4, NULL, 9, 2, 4, 2, 'Classromms', '20', '12', '8'),
(40, 4, NULL, 9, 4, 6, 2, 'Reliable Drainage Systems 2', '222', '189', '133'),
(42, 4, NULL, 9, 1, 6, 2, 'Deep Wells for sure ', '150', '60', '90'),
(43, 4, NULL, 9, 1, 6, 2, 'Wash rooms ', '200', '120', '80'),
(44, 4, NULL, 9, 1, 6, 2, 'Reliable Drainage Systemsrr ', '128', '90', '38'),
(45, 7, 7, 10, 1, 6, 8, 'Deep Wells for sure ', '150', '60', '90'),
(46, 7, 7, 10, 1, 6, 8, 'Wash rooms ', '200', '120', '80'),
(47, 7, 7, 10, 1, 6, 8, 'Reliable Drainage Systemsrr ', '128', '90', '38'),
(48, 2, NULL, 9, 1, 12, 12, 'Construct temporary shelters', '100', '50', '50'),
(49, 7, 7, 10, 1, 12, 12, 'Construct temporary shelters ', '150', '50', '100'),
(50, 7, 7, 10, 1, 12, 12, 'Fitting Of water taps', '100', '40', '60'),
(51, 8, 10, 11, 2, 1, 11, '#Build temporary classrooms', '123', '400', '500'),
(52, 6, 3, 8, 1, 12, 12, 'Construct temporary shelters  ', '150', '50', '100'),
(53, 6, 3, 8, 1, 12, 12, 'Fitting Of water taps ', '100', '40', '60'),
(54, 6, 3, 8, 1, 12, 12, 'Provision of mobile plastic water tanks 10L each', '78', '700', '1300'),
(55, 4, 6, 9, 1, 12, 12, 'Construct temporary shelters ', '100', '50', '50');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_sprojectvscc`
--

CREATE TABLE IF NOT EXISTS `nrc_sprojectvscc` (
  `sproject_cc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cc_id` int(20) DEFAULT NULL,
  `sub_project_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sproject_cc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_subprojectvsarea`
--

CREATE TABLE IF NOT EXISTS `nrc_subprojectvsarea` (
  `spa_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `area_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`spa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `nrc_subprojectvsarea`
--

INSERT INTO `nrc_subprojectvsarea` (`spa_id`, `project_id`, `sub_project_id`, `alloc_id`, `area_id`) VALUES
(1, 1, 4, 0, 1),
(2, 1, 4, 0, 2),
(3, 2, 5, 0, 2),
(4, 9, 6, 0, 1),
(5, 2, 1, 0, 3),
(6, 2, 1, 0, 5),
(7, 2, 1, 0, 6),
(8, 3, 2, 0, 3),
(9, 3, 2, 0, 5),
(10, 3, 2, 0, 6),
(11, 2, 3, 0, 7),
(12, 4, 4, 0, 7),
(13, 4, 5, 0, 8),
(14, 4, 6, 0, 8),
(15, 5, 7, 0, 8),
(16, 5, 7, 0, 9),
(17, 6, 8, 0, 10),
(18, 6, 9, 0, 11),
(19, 6, 10, 0, 11),
(20, 1, 11, 0, 3),
(21, 1, 11, 0, 5),
(22, 12, 12, 0, 6),
(23, 12, 12, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_subprojectvscountry`
--

CREATE TABLE IF NOT EXISTS `nrc_subprojectvscountry` (
  `spa_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `country_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`spa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nrc_subprojectvscountry`
--

INSERT INTO `nrc_subprojectvscountry` (`spa_id`, `project_id`, `sub_project_id`, `alloc_id`, `country_id`) VALUES
(1, 1, 11, 0, 8),
(2, 1, 11, 0, 9),
(3, 1, 11, 0, 10),
(4, 12, 12, 0, 9),
(5, 12, 12, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_subprojectvslocation`
--

CREATE TABLE IF NOT EXISTS `nrc_subprojectvslocation` (
  `spl_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `location_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`spl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `nrc_subprojectvslocation`
--

INSERT INTO `nrc_subprojectvslocation` (`spl_id`, `project_id`, `sub_project_id`, `alloc_id`, `location_id`) VALUES
(1, 9, 6, 0, 1),
(2, 9, 6, 0, 2),
(3, 2, 1, 0, 1),
(4, 2, 1, 0, 2),
(5, 2, 1, 0, 4),
(6, 2, 1, 0, 6),
(7, 3, 2, 0, 1),
(8, 3, 2, 0, 2),
(9, 3, 2, 0, 4),
(10, 3, 2, 0, 6),
(11, 2, 3, 0, 7),
(12, 4, 4, 0, 7),
(13, 4, 6, 0, 7),
(14, 5, 7, 0, 7),
(15, 6, 8, 0, 8),
(16, 6, 9, 0, 8),
(17, 6, 10, 0, 8),
(18, 1, 11, 0, 7),
(19, 1, 11, 0, 8),
(20, 12, 12, 0, 1),
(21, 12, 12, 0, 2),
(22, 12, 12, 0, 4),
(23, 12, 12, 0, 6),
(24, 12, 12, 0, 7),
(25, 12, 12, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_subprojectvssettlement`
--

CREATE TABLE IF NOT EXISTS `nrc_subprojectvssettlement` (
  `sps_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_id` int(20) DEFAULT NULL,
  `alloc_id` int(11) NOT NULL,
  `settlement_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sps_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `nrc_subprojectvssettlement`
--

INSERT INTO `nrc_subprojectvssettlement` (`sps_id`, `project_id`, `sub_project_id`, `alloc_id`, `settlement_id`) VALUES
(1, 2, 1, 0, 2),
(2, 2, 1, 0, 4),
(3, 3, 2, 0, 2),
(4, 3, 2, 0, 4),
(5, 2, 3, 0, 5),
(6, 4, 6, 0, 5),
(7, 5, 7, 0, 5),
(8, 6, 8, 0, 6),
(9, 6, 9, 0, 6),
(10, 6, 10, 0, 6),
(11, 1, 11, 0, 5),
(12, 1, 11, 0, 6),
(13, 12, 12, 0, 2),
(14, 12, 12, 0, 4),
(15, 12, 12, 0, 5),
(16, 12, 12, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_sub_project`
--

CREATE TABLE IF NOT EXISTS `nrc_sub_project` (
  `sub_project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` int(20) DEFAULT NULL,
  `sub_project_code` varchar(100) DEFAULT NULL,
  `sub_project_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `sub_project_desc` text,
  PRIMARY KEY (`sub_project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nrc_sub_project`
--

INSERT INTO `nrc_sub_project` (`sub_project_id`, `project_id`, `sub_project_code`, `sub_project_name`, `start_date`, `end_date`, `sub_project_desc`) VALUES
(1, 2, 'BF0076', 'Supply Of Staple food', '2014-01-06', '2014-01-05', 'Supply of staple food'),
(2, 3, 'SOFE1403', 'Kakuma Rehabilitation Project', '2014-01-01', '2014-03-30', 'Rehabiitation of kakuma refugee camp.'),
(3, 2, 'SBJ29', 'Protein Food Sub-Projects', '2014-02-02', '2014-02-28', ''),
(4, 4, 'KVOZ', 'ADVOCACY', '2014-02-13', '2014-02-19', 'SDF'),
(5, 4, 'SF1001', 'SM1001', '2014-02-01', '2014-02-28', 'sdff'),
(6, 4, 'SF002', 'ARMY COUP REFUGEE FEEDING PROGRAMME', '2014-02-01', '2014-02-28', ''),
(7, 5, 'NS888', 'Night security', '2014-02-12', '2014-02-19', 'Night security'),
(8, 6, 'DDWW', 'Digging Of Water Wells', '2014-02-03', '2014-02-21', 'Digging Of Water Wells'),
(9, 6, 'SC99876', 'Sewages Construction', '2014-02-01', '2014-02-28', 'Sewages Construction'),
(10, 6, 'WP', 'Water Pipes', '2014-02-05', '2014-02-19', 'Water Pipes'),
(11, 1, 'SF003434', 'Building of Temporary Shelter', '2014-02-01', '2014-02-27', 'Building of Temporary Shelter'),
(12, 12, 'SF00411', 'Improvement of existing shelters', '2014-02-03', '2014-02-05', 'Improvement of existing shelters');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_sub_project_details`
--

CREATE TABLE IF NOT EXISTS `nrc_sub_project_details` (
  `sdetails_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sub_project_id` int(20) DEFAULT NULL,
  `area_id` int(20) DEFAULT NULL,
  `location_id` int(20) DEFAULT NULL,
  `settlement_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`sdetails_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nrc_system`
--

CREATE TABLE IF NOT EXISTS `nrc_system` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `nrc_system`
--

INSERT INTO `nrc_system` (`emp_id`, `employee_no`, `emp_fname`, `emp_mname`, `emp_lname`, `department_id`, `title`, `gender`, `dob`, `nationality`, `begining_date_of_first_job`, `joining_date`, `work_place`, `staff_type`, `employment_type`, `marital_status`, `religion`, `height`, `weight`, `blood_group`, `place_of_birth`, `photo`, `status`, `terminate`) VALUES
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
(45, 'RS045', '1', '2', '3', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', '', 0, 0),
(46, 'RS046', 'PETER ', 'KYALO', 'KING''OO', '0', '18', 'Male', '0000-00-00', 'KENYAN', '', ' 2013-10-10  ', '0', '1', '0', 'Married', 'CHRISTIAN', '5.1', '60', '0', '', '4.jpg', 0, 0),
(47, 'RS047', 'abdi', 'Faraj', 'Mohammed', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'PC180662.JPG', 0, 0),
(48, 'RS048', 'Joshua', 'Omonid', 'hh', '', '', '', '0000-00-00', '', '', '', '', '1', '', '', '', '', '', '', '', 'CAM00175.jpg', 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `sub_module`
--

INSERT INTO `sub_module` (`sub_module_id`, `module_id`, `sub_module_name`, `sort_order`, `sublink`, `description`, `status`) VALUES
(1, 3, 'Areas Management', 2, '<li><a href="home.php?newsponsor=newsponsor">Areas Management</a></li>', 'Manage areas', 0),
(2, 3, 'Donors Management', 1, '<li><a href="home.php?viewuniversity=viewuniversity">Donors Management</a></li>', 'Manage donors', 0),
(3, 3, 'Projects Management', 3, '<li><a href="home.php?viewproject=viewproject">Projects Management</a></li>', 'Titles', 0),
(4, 3, 'Project Implementation Location', 2, '<li><a href="home.php?viewlocation=viewlocation">Project Implementation Location</a></li>	', 'good', 0),
(5, 3, 'Sub-Projects Management', 8, '<li><a href="home.php?viewsubproject=viewsubproject">Sub-Projects Management</a></li>', 'Manages Clients', 0),
(6, 3, 'Core Competency Management', 9, '<li><a href="home.php?viewcompetency=viewcompetency">Core Competency Management </a></li>', '', 0),
(7, 4, 'User Group Management', 10, '<li><a href="home.php?newusergroup=newusergroup">User Group Management</a></li>', 'vbvb', 0),
(8, 4, 'Modules and Submodules', 11, '<li><a href="home.php?modules=modules">Modules and Submodules</a></li>', '', 0),
(9, 4, 'Modules User Group Relation', 12, '<li><a href="home.php?modulesusergroup=modulesusergroup">Modules User Group Relation</a></li>', '', 0),
(10, 4, 'Users Management', 13, '<li><a href="home.php?users=users">Users Management</a></li>', '', 0),
(11, 5, 'Settlements Management', 15, '<li><a href="home.php?viewsettlements=viewsettlements">Settlements Management</a></li>', '', 0),
(12, 5, 'Assign Staff to Projects', 16, '<li><a href="home.php?stafftoprojects=stafftoprojects">Assign Staff to Projects</a></li>', '', 0),
(13, 5, 'Sub Contract Project', 17, '<li><a href="home.php?subcontractprojects=subcontractprojects">Sub Contract Projects</a>\r\n						<ul class="fly">\r\n			<li><a href="home.php?omstaff=omstaff">Subcontrator Staff</a></li>\r\n			<li><a href="home.php?assingomstaff=assingomstaff">Assign Project To Subcontrator</a></li>\r\n			<li><a href="home.php?subconrate=subconrate">Subcontrators Rate</a></li>\r\n	\r\n			</ul>\r\n            </li>', '', 0),
(14, 5, 'Staff Time Sheets', 19, '<li><a href="home.php?viewstafftimesheet1=viewstafftimesheet1">Staff Time Sheets</a></li>', '', 0),
(15, 5, 'Daily Staff Rates', 21, '<li><a href="home.php?omrates=omrates">Daily Staff Rates</a></li>', '', 0),
(16, 5, 'Invoice Generation', 23, '<li><a href="#">Invoice Generation</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?generateinvoice=generateinvoice">SIPET Projects Invoice to Client</a></li>\r\n			<li><a href="home.php?subconinvoices=subconinvoices">Record Subcontractor''s Invoice</a></li>\r\n<li><a href="home.php?subconinvoicestoclient=subconinvoicestoclient"><span>Subcontractors Invoices To Client</span></a></li>\r\n			</ul></li>\r\n			\r\n			', '', 0),
(17, 6, 'HR Personel', 26, '<li><a href="home.php?postgraduate=postgraduate">HR Personel</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?prepostgraduate=prepostgraduate">Staff Management</a></li>\r\n			<li><a href="home.php?nhifrates=nhifrates">Employees S.I.C Rates</a></li>\r\n			<li><a href="home.php?benefitded=benefitded">Allowances</a></li>\r\n			<!--<li><a href="#">Perfomance And Appraisal</a></li>\r\n			<li><a href="#">Leave Management</a></li>-->\r\n			\r\n			</ul>\r\n</li>', '', 0),
(18, 6, 'HR Admin', 27, '<li><a href="home.php?postgraduate=postgraduate">HR Administration</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?viewincome=viewincome">General Income Management</a></li>\r\n			<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Management</a></li>\r\n			<li><a href="home.php?pettycash=pettycash">Petty Cash Book Transactions</a></li>\r\n			<li><a href="home.php?addsubspecialityreport=addsubspecialityreport">Staff Rotation</a></li>\r\n			<li><a href="home.php?processinterflight=processinterflight">Process Staff Air Tickets</a></li>\r\n			<li><a href="home.php?workpermitrenewals=workpermitrenewals">Visas and Work Permit Renewals</a></li>\r\n			\r\n			\r\n			</ul>\r\n</li>', '', 0),
(19, 6, 'Staff Payroll', 28, '<li><a href="home.php?postgraduate=postgraduate">HR Staff Payroll</a>\r\n			<ul class="fly">\r\n			<li><a href="home.php?payrollsettings=payrollsettings">Payroll Settings</a></li>\r\n<li><a href="home.php?batchpayroll=batchpayroll">Batch Payroll Processing</a></li>\r\n<li><a href="home.php?bnprocesspayroll=bnprocesspayroll">National Staff Payroll</a></li>\r\n			<li><a href="home.php?bnprocessexppayroll=bnprocessexppayroll">Expertriate Staff Payroll</a></li>\r\n			<!--<li><a href="home.php?processpayroll=processpayroll">Process President Allowances</a></li>-->\r\n			<li><a href="home.php?payrollsummaryreport=payrollsummaryreport">Payroll Summary Report</a></li>\r\n\r\n<li><a href="home.php?payrollreport=payrollreport">Payroll General Report</a></li>\r\n			\r\n			\r\n			</ul>\r\n</li>', '', 0),
(20, 7, 'Core Competencies And Subproject', 30, '<li><a href="home.php?income=income">Core Competencies And Subproject</a></li>', '', 0),
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
(34, 7, 'Area Level Reports', 50, '<li><a href="home.php?areareport=areareport">Area Level Reports</a></li>', 'Manages fixed asset management', 0),
(35, 8, 'Share Capital', 80, '<li><a href="home.php?sharecapital=sharecapital">Shares Capital</a></li>', 'Manages Shares for the organization', 0),
(36, 9, 'SIPET Projects Reports', 34, '<li><a href="#"><span>SIPET Projects Reports</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   <li><a href="#">HSE Reports</a></li>\r\n			\r\n			<li><a href="home.php?viewprojects=viewprojects">List Of Active Projects</a></li>\r\n			<li><a href="home.php?viewomstaff=viewomstaff">Subcontractor Staff List</a></li>		\r\n                        <li><a href="#">Subcontrator''s Staff to Project</a></li>\r\n                       <li><a href="home.php?viewsubconrate=viewsubconrate">Subcontractor''s Daily Rates</a></li\r\n\r\n <li><a href="home.php?adminviewstafftimesheet1=adminviewstafftimesheet1">Staff Timesheet Report</a></li>\r\n\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(38, 9, 'General Transactions Report', 21, '<li><a href="#"><span>General Transactions Report</span></a>\r\n			\r\n			<ul class="fly">\r\n\r\n		   <li><a href="home.php?viewincome=viewincome">General Income Report</a></li>\r\n			\r\n			<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Report</a></li>\r\n			<li><a href="home.php?viewpettycashledger=viewpettycashledger">Petty Cash Book Report</a></li>		\r\n                        <li><a href="home.php?viewfixedasset=viewfixedasset">Fixed Assets Report</a></li>\r\n                       \r\n\r\n		</ul>\r\n			\r\n			\r\n			\r\n			</li>', '', 0),
(39, 4, 'Sub Module User Group Relation', 100, '<li><a href="home.php?usergroupsm=usergroupsm">Sub Module User Group Relation</a></li>', '', 0),
(40, 6, 'General Income Management', 88, '<li><a href="home.php?viewincome=viewincome">General Income Management</a></li>', '', 0),
(41, 6, 'General Expenses Management', 35, '<li><a href="home.php?viewexpenses=viewexpenses">General Expenses Management</a></li>', '', 0),
(42, 6, 'Petty Cash Book Transactions', 49, '<li><a href="home.php?pettycash=pettycash">Petty Cash Book Transactions</a></li>', '', 0),
(43, 6, 'Settlement Level Report', 58, '<li><a href="home.php?settlementreport=settlementreport">Settlement Level Area</a></li>', '', 0),
(44, 6, 'Visas And Work Permit Renewals', 67, '<li><a href="home.php?workpermitrenewals=workpermitrenewals">Visas And Work Permit Renewals</a></li>', '', 0),
(45, 5, 'Staff Management', 77, '<li><a href="home.php?prepostgraduate=prepostgraduate">Staff Management</a></li>', '', 0),
(46, 6, 'Employees SIC Rates', 78, '<li><a href="home.php?nhifrates=nhifrates">Employees SIC Rates</a></li>', '', 0),
(47, 6, 'Staff Allowances', 98, '<li><a href="home.php?benefitded=benefitded">Staff Allowances</a></li>', '', 0),
(48, 6, 'Location Level Report', 57, '<li><a href="home.php?locationreport=locationreport">Location Level Area</a></li>', '', 0),
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
(62, 6, 'Country Level Reports', 1, '<li><a href="home.php?countryreport=countryreport">Country Level Reports</a></li>', '', 0),
(63, 6, 'Add Staff', 2, '<li><a href="home.php?newstaff=newstaff">Add Staff</a></li>', '', 0),
(64, 5, 'Peter Test', 45, '<li><a href="home.php?petertest2=petertest2">Peter Test</a></li>', '', 0),
(65, 6, 'Country Management', 1, '<li><a href="home.php?viewcountries=viewcountries">Country Management</a></li>', '', 0),
(66, 8, 'Settlements Management', 6, '<li><a href="home.php?journalentry=journalentry">Settlements Management</a></li>', '', 0),
(67, 5, 'Submit Bi-weekly Data', 0, '<li><a href="home.php?submit_biweekly=submit_biweekly">Submit Bi-weekly Data</a></li>', 'Module used by field Officers to Submit Biweekly Data', 0),
(68, 3, 'Report Submission Period Management', 100, '<li><a href="home.php?submission_period=submission_period">Submission Period Management</a></li>', '', 0);

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
  `allow_edit` int(11) NOT NULL,
  `allow_delete` int(11) NOT NULL,
  `suspend` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `phone`, `email`, `user_group_id`, `username`, `password`, `date_created`, `islogged_in`, `allow_add`, `allow_edit`, `allow_delete`, `suspend`, `location_id`) VALUES
(19, 'Griffins Osero Mogeni', '0777777777', 'updateosero@gmail.com', 15, 'osero', 'd97d3a75495b93f3c8ec2e1aea44b31a', '2014-01-24 10:02:33', 0, 1, 1, 1, 0, 6),
(31, 'catherin Onyango', '0723654879', 'cate@yahoo.com', 24, 'cate', '8540d0d7e1d8111279b63983697e2e37', '2014-02-20 07:15:34', 0, 1, 1, 1, 0, 7),
(27, 'Abdul Kadirr Musa', '', '', 24, 'abdi', '311eba6dada049960e16974e652ef134', '2014-01-29 06:30:28', 0, 1, 1, 1, 0, 2),
(28, 'Peter Peter', '09655', 'griffinsosero@yahoo.com', 14, 'peter', '827ccb0eea8a706c4c34a16891f84e7b', '2014-01-30 08:14:59', 0, 1, 0, 0, 0, 2),
(29, 'andrew', '0723876387', 'andrew@nrc.no', 24, 'andrew', 'd914e3ecf6cc481114a3f534a5faf90b', '2014-01-30 09:12:13', 0, 1, 1, 1, 0, 2),
(30, 'ISAAC NDOLO', '0734654987', 'isaa@nrc.no', 24, 'isaac', '84311803c723cad9fcda143909218a89', '2014-02-03 16:51:03', 0, 1, 1, 1, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `user_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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
(22, 'I.T Department', ''),
(23, 'Dadaab Users', 'Dadaab data entry clerks'),
(24, 'Data Entry Clerks', 'For field officer who enter data');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

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
(80, 15, 6, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;

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
(209, 15, 64, 0),
(210, 15, 65, 0),
(211, 14, 65, 0),
(212, 15, 66, 0),
(213, 20, 66, 0),
(214, 24, 6, 0),
(215, 24, 5, 0),
(216, 24, 67, 0),
(217, 15, 68, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
