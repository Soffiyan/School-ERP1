-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 01:06 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `cantonment` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `createdby` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `cantonment`, `password`, `email`, `date`, `createdby`) VALUES
(3, 'admin', 'Belgaum', 'uiSKyd0C0gyCOQiC+wzOJO/2PeA0hEPREhKiRPMIJtODccP0R+r4rI6jlUVhY2bwcQWGgSkWuvEl2ZkmeI1xsA==', 'test@gmail.com', '2017-05-20', 'Belgaum');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_attend`
--

CREATE TABLE `attendence_attend` (
  `id` int(11) NOT NULL,
  `classs` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attendence` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `attendence_attend`
--

INSERT INTO `attendence_attend` (`id`, `classs`, `name`, `attendence`, `date`, `reason`) VALUES
(219, '1000', 'Sufiyan', 'Present', '2017-09-20', ''),
(220, '1000', 'Roshni', 'Present', '2017-09-20', ''),
(221, '1000', 'Sujit', 'Present', '2017-09-20', ''),
(222, '1000', 'Mahesh', 'Present', '2017-09-20', ''),
(223, '1000', 'Azmat Mulla', 'Present', '2017-09-20', ''),
(224, '1000', 'Vinayak', 'Present', '2017-09-20', ''),
(225, '1000', 'Virat', 'Present', '2017-09-20', ''),
(226, '1000', 'Pato', 'Present', '2017-09-20', ''),
(227, '1000', 'Alexander', 'Present', '2017-09-20', ''),
(228, '1000', 'Gerrard', 'Present', '2017-09-20', ''),
(229, '1000', 'Mascherano', 'Present', '2017-09-20', ''),
(230, '1000', 'George Danik', 'Half-day', '2017-09-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `mobile_no` varchar(64) NOT NULL,
  `company_address` text NOT NULL,
  `company_logo` varchar(150) NOT NULL,
  `remarks` text NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `company_name`, `mobile_no`, `company_address`, `company_logo`, `remarks`, `created_date`) VALUES
(2, 'Demo', 'rewr', '<p>\r\n	rewrew</p>\r\n', '54646-demo-center-logo.png', '<p>\r\n	rewrwerwe</p>\r\n', '2017-06-22 17:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_author`
--

CREATE TABLE `lib_add_author` (
  `id` int(11) NOT NULL,
  `author_code` text NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_author`
--

INSERT INTO `lib_add_author` (`id`, `author_code`, `author`) VALUES
(1, '1000', 'E-Balguruswamy'),
(2, '1001', 'Prakash-Yeri'),
(3, '1002', 'Mathew'),
(4, '1003', 'Thomas'),
(5, '1004', 'Christopher'),
(6, '1005', 'Cristiano-Ronaldo'),
(7, '1006', 'Ruman-Pathan');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_book`
--

CREATE TABLE `lib_add_book` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publications` varchar(60) NOT NULL,
  `year_passing` varchar(25) NOT NULL,
  `no_pages` varchar(25) NOT NULL,
  `isbn_no` varchar(50) NOT NULL,
  `volume` varchar(25) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `purchasing_date` varchar(15) NOT NULL,
  `printing_date` varchar(15) NOT NULL,
  `no_copies` varchar(15) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `purchasing_prince_single_copy` varchar(25) NOT NULL,
  `location` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `accession_no` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title_brief` text NOT NULL,
  `reg_date` varchar(12) NOT NULL,
  `reg_year` varchar(12) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_book`
--

INSERT INTO `lib_add_book` (`id`, `title`, `author`, `publications`, `year_passing`, `no_pages`, `isbn_no`, `volume`, `edition`, `purchasing_date`, `printing_date`, `no_copies`, `bill_no`, `purchasing_prince_single_copy`, `location`, `supplier`, `accession_no`, `category`, `title_brief`, `reg_date`, `reg_year`, `status`) VALUES
(50, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(51, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(52, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(53, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(54, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(55, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(56, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(57, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(58, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(59, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(60, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(61, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(62, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(63, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(64, 'Java', 'E-Balguruswamy', 'EPBP', '1978', '800', '9638', '9', '8', '2017-01-01', '2017-01-01', '15', '7856', '900', 'Rack 1', 'Hercules', '18524', 'Software', 'Belgaum', '2017-09-07', '2017', ''),
(65, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(66, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(67, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(68, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(69, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(70, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(71, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(72, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(73, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(74, 'DOM', 'Thomas', 'PECKY', '1998', '700', '8523', '1', '2', '2017-01-01', '2017-01-01', '10', '8521', '800', 'Rack 2', 'Veeresh', '18525', 'Mechanical', 'Bangalore', '2017-09-07', '2017', ''),
(75, 'Micro-controller', 'E-Balguruswamy', 'EPBP', '1890', '600', '3258', '5', '1', '2017-01-31', '2017-12-01', '2', '9635', '900', 'Rack 3', 'Veeresh', '18526', 'Electrical', 'Mysuru', '2017-09-07', '2017', 'Not-Available'),
(76, 'Micro-controller', 'E-Balguruswamy', 'EPBP', '1890', '600', '3258', '5', '1', '2017-01-31', '2017-12-01', '2', '9635', '900', 'Rack 3', 'Veeresh', '18526', 'Electrical', 'Mysuru', '2017-09-07', '2017', 'Not-Available');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_category`
--

CREATE TABLE `lib_add_category` (
  `id` int(11) NOT NULL,
  `category_code` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `reg_date` varchar(30) NOT NULL,
  `reg_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_category`
--

INSERT INTO `lib_add_category` (`id`, `category_code`, `category`, `reg_date`, `reg_year`) VALUES
(10, '1000', 'Software', '2017-09-07', '2017'),
(11, '1001', 'Electrical', '2017-09-07', '2017'),
(12, '1002', 'Mechanical', '2017-09-07', '2017'),
(13, '1003', 'Electronics', '2017-09-07', '2017'),
(14, '1004', 'Aeronatical', '2017-09-07', '2017'),
(15, '1005', 'Architecture', '2017-09-07', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_class`
--

CREATE TABLE `lib_add_class` (
  `id` int(11) NOT NULL,
  `class_code` text NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_class`
--

INSERT INTO `lib_add_class` (`id`, `class_code`, `class`) VALUES
(12, '1000', '1-A'),
(13, '1001', '1-B'),
(14, '1002', '2-A'),
(15, '1003', '2-B'),
(16, '1004', '3-A'),
(17, '1005', '3-B'),
(18, '1006', '4-A'),
(19, '1007', '4-B'),
(20, '1008', '5-A'),
(21, '1009', '5-B');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_student`
--

CREATE TABLE `lib_add_student` (
  `id` int(11) NOT NULL,
  `student_code` text NOT NULL,
  `class` varchar(25) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_student`
--

INSERT INTO `lib_add_student` (`id`, `student_code`, `class`, `student_name`) VALUES
(20, '100', '1000', 'Sufiyan'),
(21, '101', '1000', 'Roshni'),
(22, '102', '1001', 'Akash'),
(23, '103', '1001', 'Sujeet'),
(24, '104', '1002', 'Mujib'),
(25, '105', '1003', 'Moiz'),
(26, '106', '1004', 'Pankaj'),
(27, '107', '1002', 'Ramesh'),
(28, '108', '1003', 'Suresh'),
(29, '109', '1004', 'Deeraj'),
(30, '110', '1006', 'Pooja'),
(31, '111', '1006', 'Azeem'),
(32, '112', '1007', 'Ajay'),
(33, '113', '1007', 'Nitin'),
(34, '114', '1008', 'Mantino'),
(35, '115', '1008', 'Cena'),
(36, '116', '1009', 'George'),
(37, '117', '1009', 'Seville'),
(38, '118', '1005', 'Afifa'),
(39, '119', '1005', 'Fatima'),
(40, '120', '1005', 'Sharmin'),
(41, '121', '1006', 'Manish'),
(42, '122', '1000', 'Sujit'),
(43, '123', '1000', 'Mahesh'),
(44, '124', '1000', 'Azmat Mulla'),
(45, '125', '1000', 'Vinayak'),
(46, '126', '1000', 'Virat'),
(47, '127', '1000', 'Pato'),
(48, '128', '1000', 'Alexander'),
(49, '129', '1000', 'Gerrard'),
(50, '130', '1000', 'Mascherano'),
(51, '131', '1000', 'George Danik');

-- --------------------------------------------------------

--
-- Table structure for table `lib_add_supplier`
--

CREATE TABLE `lib_add_supplier` (
  `id` int(11) NOT NULL,
  `supplier_code` text NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `reg_date` varchar(30) NOT NULL,
  `reg_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_add_supplier`
--

INSERT INTO `lib_add_supplier` (`id`, `supplier_code`, `supplier_name`, `phone_no`, `email`, `mobile`, `address`, `reg_date`, `reg_year`) VALUES
(6, '1000', 'Milin', '7899676739', 'milin@gmail.com', '7899676739', 'Belgaum\r\n', '2017-09-07', '2017'),
(7, '1001', 'Veeresh ', '7899676739', 'veeru@gmail.com', '7899676739', 'Bgm', '2017-09-07', '2017'),
(8, '1002', 'Hercules', '7899676739', 'herculer@hotmail.co.in', '7899676739', 'Bgm', '2017-09-07', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `lib_borrow_book`
--

CREATE TABLE `lib_borrow_book` (
  `id` int(11) NOT NULL,
  `select_class` varchar(100) NOT NULL,
  `select_student` varchar(100) NOT NULL,
  `select_subject` varchar(100) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `total_days` varchar(50) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `acc_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_borrow_book`
--

INSERT INTO `lib_borrow_book` (`id`, `select_class`, `select_student`, `select_subject`, `issue_date`, `due_date`, `total_days`, `return_date`, `reg_date`, `acc_no`) VALUES
(66, '1000', '100', '76', '2017-07-01', '2017-10-31', '122', '', '2017-09-14', '18526'),
(67, '1000', '101', '75', '2017-09-01', '2017-09-30', '29', '', '2017-09-14', '18526');

-- --------------------------------------------------------

--
-- Table structure for table `lib_borrow_book_history`
--

CREATE TABLE `lib_borrow_book_history` (
  `id` int(11) NOT NULL,
  `select_class` varchar(100) NOT NULL,
  `select_student` varchar(100) NOT NULL,
  `select_subject` varchar(100) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `total_days` varchar(50) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `acc_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_borrow_book_history`
--

INSERT INTO `lib_borrow_book_history` (`id`, `select_class`, `select_student`, `select_subject`, `issue_date`, `due_date`, `total_days`, `return_date`, `reg_date`, `acc_no`) VALUES
(7, '1000', '100', '76', '2017-07-01', '2017-09-01', '62', '', '2017-09-14', '18526'),
(8, '1000', '101', '75', '2017-09-01', '2017-09-30', '29', '', '2017-09-14', '18526');

-- --------------------------------------------------------

--
-- Table structure for table `lib_renewal_history`
--

CREATE TABLE `lib_renewal_history` (
  `id` int(11) NOT NULL,
  `select_class` varchar(100) NOT NULL,
  `select_student` varchar(100) NOT NULL,
  `select_subject` varchar(100) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `total_days` varchar(50) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `renewal_date` varchar(15) NOT NULL,
  `new_days` varchar(50) NOT NULL,
  `return_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `lib_renewal_history`
--

INSERT INTO `lib_renewal_history` (`id`, `select_class`, `select_student`, `select_subject`, `issue_date`, `due_date`, `total_days`, `reg_date`, `renewal_date`, `new_days`, `return_date`) VALUES
(1, '1000', '100', '76', '2017-07-01', '2017-09-01', '62', '2017-09-14', '2017-10-31', '122', '');

-- --------------------------------------------------------

--
-- Table structure for table `lib_return_book_history`
--

CREATE TABLE `lib_return_book_history` (
  `id` int(11) NOT NULL,
  `select_class` varchar(100) NOT NULL,
  `select_student` varchar(100) NOT NULL,
  `select_subject` varchar(100) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `total_days` varchar(50) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `reg_date` varchar(15) NOT NULL,
  `due_amt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `year` varchar(35) NOT NULL,
  `a0` varchar(50) NOT NULL,
  `a1` varchar(50) NOT NULL,
  `a2` varchar(50) NOT NULL,
  `a3` varchar(50) NOT NULL,
  `a4` varchar(50) NOT NULL,
  `a5` varchar(50) NOT NULL,
  `a6` varchar(50) NOT NULL,
  `b0` varchar(50) NOT NULL,
  `b1` varchar(50) NOT NULL,
  `b2` varchar(50) NOT NULL,
  `b3` varchar(50) NOT NULL,
  `b4` varchar(50) NOT NULL,
  `b5` varchar(50) NOT NULL,
  `b6` varchar(50) NOT NULL,
  `c0` varchar(50) NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  `c4` varchar(50) NOT NULL,
  `c5` varchar(50) NOT NULL,
  `c6` varchar(50) NOT NULL,
  `d0` varchar(50) NOT NULL,
  `d1` varchar(50) NOT NULL,
  `d2` varchar(50) NOT NULL,
  `d3` varchar(50) NOT NULL,
  `d4` varchar(50) NOT NULL,
  `d5` varchar(50) NOT NULL,
  `d6` varchar(50) NOT NULL,
  `e0` varchar(50) NOT NULL,
  `e1` varchar(50) NOT NULL,
  `e2` varchar(50) NOT NULL,
  `e3` varchar(50) NOT NULL,
  `e4` varchar(50) NOT NULL,
  `e5` varchar(50) NOT NULL,
  `e6` varchar(50) NOT NULL,
  `f0` varchar(50) NOT NULL,
  `f1` varchar(50) NOT NULL,
  `f2` varchar(50) NOT NULL,
  `f3` varchar(50) NOT NULL,
  `f4` varchar(50) NOT NULL,
  `f5` varchar(50) NOT NULL,
  `f6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `class`, `year`, `a0`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `b0`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `c0`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `d0`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `e0`, `e1`, `e2`, `e3`, `e4`, `e5`, `e6`, `f0`, `f1`, `f2`, `f3`, `f4`, `f5`, `f6`) VALUES
(5, 'Class-1', '2016-2017', '9-10', 'English', 'PE', 'Science', 'Maths', 'Hindi', 'Social', '10-11', 'Hindi', 'English', 'PE', 'Science', 'Maths', 'Hindi', '11-12', 'Kannada', 'Hindi', 'English', 'PE', 'Science', 'Maths', '1-2', 'Social', 'Kannada', 'Hindi', 'English', 'PE', 'Science', '2-3', 'Science', 'Social', 'Kannada', 'Hindi', 'English', 'PE', '3-4', 'PE', 'Science', 'Social', 'Kannada', 'Hindi', 'English'),
(6, 'Class-1', 'A', '9-10', '1', '2', '3', '4', '5', '6', '10-11', '7', '8', '9', '10', '11', '12', '11-12', '13', '14', '15', '15', '16', '17', '1-2', '18', '19', '20', '21', '22', '23', '2-3', '24', '25', '26', '27', '28', '29', '3-4', '30', '31', '32', '33', '34', '35'),
(7, 'Class-1', 'B', '9-10', 'A', 'B', 'C', 'D', 'E', 'F', '10-11', 'G', 'H', 'I', 'J', 'K', 'L', '11-12', 'M', 'N', 'O', 'P', 'Q', 'R', '1-2', 'S', 'T', 'U', 'V', 'W', 'X', '2-3', 'Y', 'Z', 'S', 'U', 'F', 'I', '3-4', 'R', 'O', 'S', 'H', 'N', 'I');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence_attend`
--
ALTER TABLE `attendence_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_author`
--
ALTER TABLE `lib_add_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_book`
--
ALTER TABLE `lib_add_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_category`
--
ALTER TABLE `lib_add_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_class`
--
ALTER TABLE `lib_add_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_student`
--
ALTER TABLE `lib_add_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_add_supplier`
--
ALTER TABLE `lib_add_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_borrow_book`
--
ALTER TABLE `lib_borrow_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_borrow_book_history`
--
ALTER TABLE `lib_borrow_book_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_renewal_history`
--
ALTER TABLE `lib_renewal_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_return_book_history`
--
ALTER TABLE `lib_return_book_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendence_attend`
--
ALTER TABLE `attendence_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lib_add_author`
--
ALTER TABLE `lib_add_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lib_add_book`
--
ALTER TABLE `lib_add_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `lib_add_category`
--
ALTER TABLE `lib_add_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lib_add_class`
--
ALTER TABLE `lib_add_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lib_add_student`
--
ALTER TABLE `lib_add_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `lib_add_supplier`
--
ALTER TABLE `lib_add_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lib_borrow_book`
--
ALTER TABLE `lib_borrow_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `lib_borrow_book_history`
--
ALTER TABLE `lib_borrow_book_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lib_renewal_history`
--
ALTER TABLE `lib_renewal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lib_return_book_history`
--
ALTER TABLE `lib_return_book_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
