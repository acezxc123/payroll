-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 02:28 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_applied_thermal`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  `status2` enum('in','out') CHARACTER SET utf8 NOT NULL,
  `collab_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`, `status2`, `collab_id`) VALUES
(4, 16, '2022-11-29', '06:44:52', 0, '00:00:00', 0, 'in', 'gWIaiZvvG3'),
(5, 12, '2022-12-12', '16:53:33', 0, '16:53:54', 0.0058333333333333, 'out', 'KQobY3vWsu'),
(6, 12, '2022-12-14', '16:15:01', 0, '00:00:00', 0, 'in', '9A2iAaoVnS'),
(7, 6, '2022-12-14', '16:15:09', 0, '00:00:00', 0, 'in', 'Enb97J4LXi'),
(8, 7, '2022-12-14', '16:15:18', 0, '00:00:00', 0, 'in', 'IEraoUH7r5'),
(9, 9, '2022-12-14', '16:27:17', 0, '00:00:00', 0, 'in', '8yHI6CD3wg');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `employee_salary` int(10) DEFAULT NULL,
  `schedule_id` int(10) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `merital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `identity_doc` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pf_account` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `position` varchar(500) NOT NULL,
  `branch` varchar(500) NOT NULL,
  `gsis` varchar(500) NOT NULL,
  `sss` varchar(500) NOT NULL,
  `tin` varchar(500) NOT NULL,
  `pagibig` varchar(500) NOT NULL,
  `stat` varchar(500) NOT NULL,
  `d_hired` date DEFAULT NULL,
  `elementary` varchar(255) NOT NULL,
  `secondary` varchar(255) NOT NULL,
  `vocational` varchar(255) NOT NULL,
  `graduate` varchar(255) NOT NULL,
  `work_exp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_code`, `employee_id`, `emp_password`, `first_name`, `middle_name`, `last_name`, `employee_salary`, `schedule_id`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `blood_group`, `photo`, `designation`, `department`, `pan_no`, `bank_name`, `account_no`, `ifsc_code`, `pf_account`, `created`, `position`, `branch`, `gsis`, `sss`, `tin`, `pagibig`, `stat`, `d_hired`, `elementary`, `secondary`, `vocational`, `graduate`, `work_exp`) VALUES
(2, '0001', '0001', '', 'Josh Glendon', 'Maravilla', 'Saguid', 0, 0, '07/13/1994', 'male', 'Single', 'Filipino', 'Block 6, Lot 7 Verdan Heights', 'Paranaque', 'Paranaque', 'Philippines', 'joshglendon@tasco-thermal.com', '09181625516', '', '', '', '', '', '', 'male.png', '', 'Sales & Operation', '', '', '', '', '', '0000-00-00 00:00:00', 'Sales', 'Applied Thermal Technology Solutions Corp.', '8373263794832736', '0474832639', '4566434344', '2536273894', '', NULL, '', '', '', '', ''),
(3, '0002', '0002', '', 'Princess Inna Angela', 'Javier', 'Maranan', 0, 0, '11/14/2022', 'female', 'Married', 'Filipino', 'Salambao, Obando', 'Obando', 'Manila', 'Philippines', 'princessangela@tasco-thermal.com', '09282537645', '', '', '', '', '', '', 'female.jpg', '', 'Sales & Operation', '', '', '', '', '', '0000-00-00 00:00:00', 'Operations', 'Applied Thermal Technology Solutions Corp.', '733737348929', '0536487346', '4859036453', '364746645959', '', NULL, '', '', '', '', ''),
(5, '0003', '0003', '', 'Jaydee', 'Castillo', 'Casa', 0, 0, '06/07/1994', 'male', 'Married', 'Filipino', 'St Agnes, Caloocan', 'Caloocan', 'Manila', 'Philippines', 'jaydeecasa@tasco-thermal.com', '09773547894', '', '', '', '', '', '', 'male.png', '', 'Finance & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'Admin', 'Applied Thermal Technology Solutions Corp.', '2536283802983472', '0437482694', '354694253748', '152784729347', '', NULL, '', '', '', '', ''),
(6, '0004', '0004', '', 'Cleotilde', 'Maravilla', 'Cabrera', 0, 0, '05/26/1993', 'female', 'Married', 'Filipino', '2nd Street, Taytay', 'Taytay', 'Manila', 'Philippines', 'cleotildecabrera@tasco-thermal.com', '09167263546', '', '', '', '', '', '', 'female.jpg', '', 'Sales & Operation', '', '', '', '', '', '0000-00-00 00:00:00', 'Sales', 'Maglev Air-Conditioning Company', '678523547629', '0587243973', '2638498756364', '876520981452', '', NULL, '', '', '', '', ''),
(7, '0005', '0005', '', 'Roland', 'Salazar', 'Retanal', 0, 0, '05/23/1992', 'male', 'Single', 'Filipino', 'A. Deguzman Street, Marikina', 'Marikina', 'Manila', 'Philippines', 'roland@tasco-thermal.com', '09238739953', '', '', '', '', '', '', 'male.png', '', 'Finance & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'Finance', 'Maglev Air-Conditioning Company', '2736489026354786', '0427942673', '253649635629', '096428374653', '', NULL, '', '', '', '', ''),
(8, '0006', '0006', '', 'Ralph Anthony', 'Diaz', 'Delocado', 0, 0, '09/13/1993', 'male', 'Single', 'Filipino', 'R. Soriano, Meycauayan', 'Meycauayan', 'Manila', 'Philippines', 'anthony@tasco-thermal.com', '09596273546', '', '', '', '', '', '', 'male.png', '', 'Service Department', '', '', '', '', '', '0000-00-00 00:00:00', 'Service', 'Maglev Air-Conditioning Company', '9836747263546736', '0836478293', '7362537489058', '987234537236', '', NULL, '', '', '', '', ''),
(9, '0007', '0007', '', 'Romnick', 'Halos', 'Calderon', 0, 0, '05/14/1990', 'male', 'Married', 'Filipino', 'Tandang Sora Ave., Quezon City', 'Quezon', 'Manila', 'Philippines', 'romnickcalderon@tasco-thermal.com', '09165552810', '', '', '', '', '', '', 'male.png', '', 'Controls Department', '', '', '', '', '', '0000-00-00 00:00:00', 'Controls', 'TS-I Energy Solutions Corp.', '2739482093746523', '0536286372', '943728362539', '092437236529', '', NULL, '', '', '', '', ''),
(10, '0008', '0008', '', 'Allan Jay', 'Gaisen', 'Moreno', 0, 0, '04/09/1989', 'male', 'Single', 'Filipino', 'Felix Avenue, Cainta', 'Cainta', 'Manila', 'Philippines', 'allanjaymoreno@tasco-thermal.com', '09896623354', '', '', '', '', '', '', 'male.png', '', 'Sales & Operation', '', '', '', '', '', '0000-00-00 00:00:00', 'Sales', 'Thermal Aircon Solutions Corp.', '3378229002344729', '0627384924', '893762539387', '632876119288', '', NULL, '', '', '', '', ''),
(11, '0009', '0009', '', 'Audric', 'Casa', 'Hernandez', 0, 0, '12/06/1993', 'male', 'Married', 'Filipino', 'Juan Luna, Cavite', 'Cavite', 'Manila', 'Philippines', 'audrichernandez@tasco-thermal.com', '09102273536', '', '', '', '', '', '', 'male.png', '', 'Purchasing', '', '', '', '', '', '0000-00-00 00:00:00', 'Purchasing', 'Thermal Solutions Inc', '7837665512990816', '0376283109', '672019284762', '637488992263', '', NULL, '', '', '', '', ''),
(12, '0010', '0010', '', 'Cris John ', 'Piday', 'Fundavilla', 0, 0, '05/06/1989', 'male', 'Single', 'Filipino', 'Villa Cecilla Subdivision, Antipolo', 'Antipolo', 'Manila', 'Philippines', 'cjfundavilla@tasco-thermal.com', '09196621432', '', '', '', '', '', '', 'male.png', '', 'Central Finance & Accounting ', '', '', '', '', '', '0000-00-00 00:00:00', 'Central Finance', 'Thermal Solutions Inc', '0015426126377715', '0482672516', '245167299091', '635512343399', '', NULL, '', '', '', '', ''),
(13, '0012', '0012', '', 'Bianca Rose', 'Manalo', 'Piday', 0, 0, '04/26/1982', 'female', 'Married', 'Filipino', 'Almar Subdivisions, Caloocan', 'Caloocan', 'Manila', 'Philippines', 'pidaybianca@tasco-thermal.com', '09142278910', '', '', '', '', '', '', 'female.jpg', '', 'HR & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'Admin', 'Thermal Solutions Inc', '9825364778810001', '0466712339', '672612899025', '899002451238', '', NULL, '', '', '', '', ''),
(14, '0011', '0011', '', 'Jaeriz Lei', 'Romano', 'Buncag', 0, 0, '05/20/1977', 'female', 'Widow', 'Filipino', 'V. Cruz Street, Pasay City', 'Pasay', 'Manila', 'Philippines', 'jaerizlei@tasco-thermal.com', '09104652433', '', '', '', '', '', '', 'female.jpg', '', 'Service Department', '', '', '', '', '', '0000-00-00 00:00:00', 'Service', 'Thermal Aircon Solutions Corp.', '6711245300091825', '0425187755', '928761524433', '112789016614', '', NULL, '', '', '', '', ''),
(15, '0013', '0013', '', 'Kim', 'Navarro', 'Reyes', 0, 0, '04/30/1993', 'male', 'Single', 'Filipino', 'Francisco Legaspi, Pasig City', 'Pasig', 'Manila', 'Philippines', 'kimreyes@tasco-thermal.com', '09285569014', '', '', '', '', '', '', 'male.png', '', 'Finance & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'Finance', 'Thermal Aircon Solutions Corp.', '2536478290376243', '0567618981', '267389253673', '090123441526', '', NULL, '', '', '', '', ''),
(16, '0014', '0014', '', 'Jon Rey', 'Casa', 'Padua', 0, 0, '09/10/1990', 'male', 'Married', 'Filipino', 'Panorama Street, Taguig City', 'Taguig', 'Manila', 'Philippines', 'jonreypadua@tasco-thermal.com', '09172451277', '', '', '', '', '', '', 'male.png', '', 'Energy Department', '', '', '', '', '', '0000-00-00 00:00:00', 'Energy Dept.', 'TS-I Energy Solutions Corp.', '1211426678123761', '0477480012', '780935234783', '623789001123', '', NULL, '', '', '', '', ''),
(17, '0015', '0015', '', 'Mark Clarence', 'Pisan', 'Arnega', 0, 0, '05/24/1986', 'male', 'Single', 'Filipino', '32nd Street, Caloocan City', 'Caloocan', 'Manila', 'Philippines', 'markclarence@tasco-thermal.com', '09056678912', '', '', '', '', '', '', 'male.png', '', 'Finance & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'Admin', 'TS-I Energy Solutions Corp.', '0955312451267891', '054422789100', '424455178902', '890012451267', '', NULL, '', '', '', '', ''),
(18, '422', '422', '', 'ace', 'q', 'zxc', NULL, 0, '05/20/1977', 'male', 'Single', 'Filipino', 'maligaya road\r\n37', 'Batangas', 'batangas', 'Philippines', 'test12345@gmail.com', '09181625511', '', '', '', '', '', '', '', '', 'Finance & Admin', '', '', '', '', '', '0000-00-00 00:00:00', 'dafaf', 'Thermal Aircon Solutions Corp.', '438343', '83438434', '76783873', '5615846432', '', '2022-12-01', 'awfa', 'awfwf', 'afwafaf', 'wfafwafa', 'washer');

-- --------------------------------------------------------

--
-- Table structure for table `employees123`
--

CREATE TABLE `employees123` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hectare_employee`
--

CREATE TABLE `hectare_employee` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `hectare` int(11) NOT NULL,
  `employee_salary` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `collab_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hectare_employee`
--

INSERT INTO `hectare_employee` (`id`, `employee_id`, `emp_id`, `firstname`, `lastname`, `hectare`, `employee_salary`, `date`, `collab_id`) VALUES
(1, 1, '', 'azer', 'asi', 1, 1200, '2022-11-21', 'ZNem5bssXT'),
(2, 16, '', 'Jon Rey', 'Padua', 1, 1200, '2022-11-28', 'ZLckrb6WEf'),
(3, 16, '', 'Jon Rey', 'Padua', 1, 1200, '2022-11-29', 'eEKcU0MpXF'),
(4, 16, '', 'Jon Rey', 'Padua', 1, 1200, '2022-11-29', 'gWIaiZvvG3'),
(5, 12, '', 'Cris John ', 'Fundavilla', 1, 1200, '2022-12-12', 'KQobY3vWsu'),
(6, 12, '', 'Cris John ', 'Fundavilla', 1, 1200, '2022-12-14', '9A2iAaoVnS'),
(7, 6, '', 'Cleotilde', 'Cabrera', 1, 1200, '2022-12-14', 'Enb97J4LXi'),
(8, 7, '', 'Roland', 'Retanal', 1, 1200, '2022-12-14', 'IEraoUH7r5'),
(9, 9, '', 'Romnick', 'Calderon', 1, 1200, '2022-12-14', '8yHI6CD3wg');

-- --------------------------------------------------------

--
-- Table structure for table `hectare_price`
--

CREATE TABLE `hectare_price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hectare_price`
--

INSERT INTO `hectare_price` (`id`, `price`) VALUES
(1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wy_admin`
--

CREATE TABLE `wy_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_code` varchar(255) NOT NULL,
  `admin_type` varchar(50) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_time` datetime NOT NULL,
  `company` int(10) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `delete_flag` int(10) NOT NULL DEFAULT 0 COMMENT '0-active 1-archive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_admin`
--

INSERT INTO `wy_admin` (`admin_id`, `admin_code`, `admin_type`, `admin_name`, `admin_email`, `admin_password`, `admin_time`, `company`, `company_name`, `delete_flag`) VALUES
(1, 'WY001', 'admin', 'Jonel Sarbelita', 'jonelsarbelita@tasco-thermal.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-04-18 02:22:37', 2, 'THERMAL SOLUTIONS INC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wy_attendance_old`
--

CREATE TABLE `wy_attendance_old` (
  `attendance_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `action_name` enum('punchin','punchout') NOT NULL,
  `action_time` time NOT NULL,
  `emp_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_branch`
--

CREATE TABLE `wy_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `delete_flag` int(11) NOT NULL DEFAULT 0 COMMENT '0-active 1-archieve\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wy_branch`
--

INSERT INTO `wy_branch` (`id`, `name`, `created_date`, `delete_flag`) VALUES
(1, 'Thermal Solutions Inc', '2022-11-26', 0),
(2, 'Maglev Air-Conditioning Company', '2022-11-26', 0),
(3, 'TS-I Energy Solutions Corp.', '2022-11-26', 0),
(4, 'Applied Thermal Technology Solutions Corp.', '2022-11-28', 0),
(5, 'Thermal Aircon Solutions Corp.', '2022-11-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wy_department`
--

CREATE TABLE `wy_department` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `delete_flag` int(10) NOT NULL DEFAULT 0 COMMENT '0-active 1-archive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wy_department`
--

INSERT INTO `wy_department` (`id`, `name`, `created_date`, `delete_flag`) VALUES
(3, 'Sales & Operation', '2022-11-28', 0),
(4, 'Finance & Admin', '2022-11-28', 0),
(5, 'Service Department', '2022-11-28', 0),
(6, 'Controls Department', '2022-11-28', 0),
(7, 'Energy Department', '2022-11-28', 0),
(8, 'Purchasing', '2022-11-28', 0),
(9, 'Central Finance & Accounting ', '2022-11-28', 0),
(10, 'HR & Admin', '2022-11-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wy_employees`
--

CREATE TABLE `wy_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `merital_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `identity_doc` varchar(255) NOT NULL,
  `identity_no` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `pf_account` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `position` varchar(500) NOT NULL,
  `branch` varchar(500) NOT NULL,
  `gsis` varchar(500) NOT NULL,
  `sss` varchar(500) NOT NULL,
  `tin` varchar(500) NOT NULL,
  `pagibig` varchar(500) NOT NULL,
  `stat` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_holidays`
--

CREATE TABLE `wy_holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_title` varchar(255) NOT NULL,
  `holiday_desc` varchar(255) NOT NULL,
  `holiday_date` varchar(50) NOT NULL,
  `holiday_type` varchar(50) NOT NULL DEFAULT 'compulsory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_leaves`
--

CREATE TABLE `wy_leaves` (
  `leave_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `leave_subject` varchar(255) NOT NULL,
  `leave_dates` varchar(255) NOT NULL,
  `leave_message` longtext NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_status` enum('pending','approve','reject') NOT NULL DEFAULT 'pending',
  `apply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_payheads`
--

CREATE TABLE `wy_payheads` (
  `payhead_id` int(11) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `payhead_desc` varchar(255) NOT NULL,
  `payhead_type` enum('earnings','deductions') NOT NULL DEFAULT 'earnings'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_payheads`
--

INSERT INTO `wy_payheads` (`payhead_id`, `payhead_name`, `payhead_desc`, `payhead_type`) VALUES
(1, 'Overtime', 'Overtime', 'earnings'),
(3, 'Income Tax', 'Income Tax', 'deductions'),
(4, 'Employee Provident Fund', 'Employee Provident Fund', 'deductions'),
(5, 'Loans & Advance', 'Loans & Advance', 'deductions'),
(7, 'Tardiness/Undertime', 'Tardiness/Undertime', 'deductions'),
(8, 'SSS Contribution', 'Tardiness/Undertime', 'deductions'),
(9, 'PHIC Contribution', 'PHIC Contribution', 'deductions'),
(12, 'Basic Salary', 'Basic Salary', 'earnings'),
(13, 'HMDF Contribution', 'HMDF Contribution', 'deductions');

-- --------------------------------------------------------

--
-- Table structure for table `wy_pay_structure`
--

CREATE TABLE `wy_pay_structure` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_id` int(11) NOT NULL,
  `default_salary` float(11,2) NOT NULL,
  `cut_off` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wy_pay_structure`
--

INSERT INTO `wy_pay_structure` (`salary_id`, `emp_code`, `payhead_id`, `default_salary`, `cut_off`) VALUES
(1, '22848', 11, 1000.00, NULL),
(2, '22848', 13, 100.00, NULL),
(3, '22848', 9, 675.00, NULL),
(4, '22848', 7, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wy_salaries`
--

CREATE TABLE `wy_salaries` (
  `salary_id` int(11) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `payhead_name` varchar(255) NOT NULL,
  `pay_amount` float(11,2) NOT NULL,
  `earning_total` float(11,2) NOT NULL,
  `deduction_total` float(11,2) NOT NULL,
  `net_salary` float(11,2) NOT NULL,
  `pay_type` enum('earnings','deductions') NOT NULL,
  `pay_month` varchar(255) NOT NULL,
  `generate_date` date NOT NULL,
  `cut-off-from` date DEFAULT NULL,
  `cut-off-from-to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wy_trainings`
--

CREATE TABLE `wy_trainings` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `facilitator` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `employees123`
--
ALTER TABLE `employees123`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hectare_employee`
--
ALTER TABLE `hectare_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hectare_price`
--
ALTER TABLE `hectare_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wy_admin`
--
ALTER TABLE `wy_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_code` (`admin_code`);

--
-- Indexes for table `wy_attendance_old`
--
ALTER TABLE `wy_attendance_old`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_branch`
--
ALTER TABLE `wy_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wy_department`
--
ALTER TABLE `wy_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wy_employees`
--
ALTER TABLE `wy_employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  ADD PRIMARY KEY (`payhead_id`);

--
-- Indexes for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `payhead_id` (`payhead_id`);

--
-- Indexes for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `wy_trainings`
--
ALTER TABLE `wy_trainings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employees123`
--
ALTER TABLE `employees123`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hectare_employee`
--
ALTER TABLE `hectare_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hectare_price`
--
ALTER TABLE `hectare_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wy_admin`
--
ALTER TABLE `wy_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wy_attendance_old`
--
ALTER TABLE `wy_attendance_old`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wy_branch`
--
ALTER TABLE `wy_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wy_department`
--
ALTER TABLE `wy_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wy_employees`
--
ALTER TABLE `wy_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wy_holidays`
--
ALTER TABLE `wy_holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wy_leaves`
--
ALTER TABLE `wy_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wy_payheads`
--
ALTER TABLE `wy_payheads`
  MODIFY `payhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wy_pay_structure`
--
ALTER TABLE `wy_pay_structure`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wy_salaries`
--
ALTER TABLE `wy_salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wy_trainings`
--
ALTER TABLE `wy_trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
