-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 12:19 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r33_pointos`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `designation` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`employee_id`, `employee_name`, `email_address`, `contact`, `gender`, `country`, `datetime`, `designation`) VALUES
(1, 'Rubel', 'r@a.com', '01712727574', 'Male', 'Bangladesh', '2017-08-23 10:15:23', ''),
(2, 'B', 'b@adf.com', '123', 'Male', '', '2017-08-23 10:15:23', ''),
(12, 'Abc', 'admin@bicri.com', '34534532', 'Female', '43534', '2017-08-24 09:07:00', ''),
(6, 'asdf', 'bicri@admi.com', '345234', '', 'asdf', '2017-08-23 11:19:39', ''),
(7, 'dsfg', 'bicri@admi.com', 'Female', 'asdf', '3245', '2017-08-23 11:21:53', ''),
(8, 'Abc', 'bicri@admi.com', 'Male', 'dsa', '345', '2017-08-23 11:27:11', ''),
(9, 'dsfg', 'bicri@admi.com', 'Female', 'asdf', 'asdf', '2017-08-23 11:27:53', ''),
(10, 'ccde', 'admin@bicri.com', '53245', 'Male', 'asdf', '2017-08-23 11:30:37', ''),
(11, 'Abc', 'admin@bicri.com', '34534532', 'Female', '2345', '2017-08-24 08:10:34', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
