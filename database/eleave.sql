-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 05:39 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eleave`
--

-- --------------------------------------------------------

--
-- Table structure for table `adddepartment`
--

CREATE TABLE IF NOT EXISTS `adddepartment` (
  `id` int(11) NOT NULL,
  `department` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adddepartment`
--

INSERT INTO `adddepartment` (`id`, `department`) VALUES
(1, 'Production'),
(2, 'Human Resources'),
(3, 'Financial'),
(4, 'Software Development'),
(5, 'Operations'),
(6, 'Sales & Marketing'),
(7, 'Tender'),
(8, 'Technical Department'),
(9, 'Network Department'),
(10, 'Administration'),
(11, 'it management');

-- --------------------------------------------------------

--
-- Table structure for table `addstaff`
--

CREATE TABLE IF NOT EXISTS `addstaff` (
  `id` int(11) NOT NULL,
  `staffNumber` varchar(11) NOT NULL,
  `staffName` varchar(250) CHARACTER SET utf8 NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `mobileNumber` varchar(250) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) CHARACTER SET utf8 NOT NULL,
  `passwordConfirmation` varchar(250) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(250) CHARACTER SET utf8 NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `department` varchar(250) CHARACTER SET utf8 NOT NULL,
  `workingYear` int(11) NOT NULL,
  `annualLeaveBalance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstaff`
--

INSERT INTO `addstaff` (`id`, `staffNumber`, `staffName`, `email`, `mobileNumber`, `password`, `passwordConfirmation`, `gender`, `address`, `department`, `workingYear`, `annualLeaveBalance`) VALUES
(1, '101', 'Farah Izzati Binti Abu Bakar', 'abfarahizzati@gmail.com', '123456789', '123', '123', 'Female', 'No. 45 Jalan Sentosa 15, Taman bukit Dahlia', 'Human Resources', 1, 12),
(2, 'ETS02', 'Nabila', 'nabila@aqrsb.com', '123456789', 'abc123', 'abc123', 'Female', 'No. 45 Jalan Bahagia 9', 'Programmer', 3, 38),
(3, '000', 'Admin', 'admin@aqrsb.com.my', '0123456789', '123', '123', 'Female', 'No. 22 Jalan Suka 88, Taman Bahagia, Johor.', 'Admin', 12, 0),
(4, 'ABC123', 'Mohd Ikmal Danish Bin Mohd Afandi', 'danish@gmail.com', '0114785050', '123', '123', 'Male', 'No 33 Jalan Perjiranan 9/9', 'Network Department', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `id` int(11) NOT NULL,
  `staffNumber` varchar(250) NOT NULL,
  `staffName` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `typeLeave` varchar(250) NOT NULL,
  `leaveFrom` date NOT NULL,
  `leaveTo` date NOT NULL,
  `period` int(11) NOT NULL,
  `status` text NOT NULL,
  `applyDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `staffNumber`, `staffName`, `department`, `typeLeave`, `leaveFrom`, `leaveTo`, `period`, `status`, `applyDate`) VALUES
(40, '101', 'Farah Izzati Binti Abu Bakar', 'Human Resources', 'Paternity', '2021-01-29', '2021-02-07', 7, 'Approved', '2021-01-08 10:45:44'),
(42, 'ABC123', 'Mohd Ikmal Danish Bin Mohd Afandi', 'Network Department', 'Annual', '2021-01-12', '2021-01-13', 1, 'Approved', '2021-01-11 11:34:46'),
(43, '101', 'Farah Izzati Binti Abu Bakar', 'Human Resources', 'Annual', '2021-07-05', '2021-07-06', 2, 'Rejected', '2021-07-04 10:13:14'),
(44, 'ABC123', 'Mohd Ikmal Danish Bin Mohd Afandi', 'Network Department', 'Study', '2021-07-05', '2021-08-09', 35, 'Pending', '2021-07-04 10:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adddepartment`
--
ALTER TABLE `adddepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addstaff`
--
ALTER TABLE `addstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adddepartment`
--
ALTER TABLE `adddepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `addstaff`
--
ALTER TABLE `addstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
