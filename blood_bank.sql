-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 07:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(1) NOT NULL,
  `b_grp` varchar(5) NOT NULL,
  `b_qty` int(4) NOT NULL,
  `b_cost` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `b_grp`, `b_qty`, `b_cost`) VALUES
(1, 'A+', 1000, 50),
(2, 'A-', 1100, 55),
(3, 'B+', 2100, 70),
(4, 'B-', 1100, 65),
(5, 'AB+', 1500, 80),
(6, 'AB-', 1000, 90),
(7, 'O+', 1700, 40),
(8, 'O-', 1500, 50);

-- --------------------------------------------------------

--
-- Table structure for table `blood_manager`
--

CREATE TABLE `blood_manager` (
  `m_id` int(3) NOT NULL,
  `m_name` varchar(30) NOT NULL,
  `m_add` varchar(100) NOT NULL,
  `m_doj` date NOT NULL,
  `m_phno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_manager`
--

INSERT INTO `blood_manager` (`m_id`, `m_name`, `m_add`, `m_doj`, `m_phno`) VALUES
(123, 'Manoj', 'House no.23,dunkstein street,faridkot', '2005-06-01', 1234567890),
(235, 'Sneha', 'Sector 12,Chandigarh', '2016-12-04', 2145703254),
(456, 'Snehil', '3rd street,ghaziabad', '2010-10-12', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donor_id` int(2) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_dob` date NOT NULL,
  `b_id` int(1) NOT NULL,
  `d_qty` int(5) NOT NULL,
  `d_add` varchar(100) NOT NULL,
  `d_phno` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `d_name`, `d_dob`, `b_id`, `d_qty`, `d_add`, `d_phno`) VALUES
(1, 'fds', '2000-11-04', 1, 32, '32', 5356),
(4, 'gh', '1992-05-06', 4, 350, 'jhgjhf', 1234852014),
(5, 'fgfd', '2012-03-04', 4, 342, 'gbfg,jkdfj,df', 2147483647),
(6, 'sdf', '2012-03-04', 5, 342, 'gbfg,jkdfj,df', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(4) NOT NULL,
  `h_name` varchar(30) NOT NULL,
  `h_add` varchar(100) NOT NULL,
  `h_phno` int(10) NOT NULL,
  `h_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `h_name`, `h_add`, `h_phno`, `h_email`) VALUES
(3, 'dsg', 'gdsg', 5345, 'gdg@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `h_order`
--

CREATE TABLE `h_order` (
  `o_id` int(5) NOT NULL,
  `h_id` int(4) NOT NULL,
  `b_id` int(1) NOT NULL,
  `o_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `o_cost`
--

CREATE TABLE `o_cost` (
  `b_id` int(4) NOT NULL,
  `o_qty` int(9) NOT NULL,
  `total_cost` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `blood_manager`
--
ALTER TABLE `blood_manager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `b_fk` (`b_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `h_order`
--
ALTER TABLE `h_order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `h_id_fk` (`h_id`),
  ADD KEY `b_id_fk` (`b_id`);

--
-- Indexes for table `o_cost`
--
ALTER TABLE `o_cost`
  ADD KEY `b_id_f` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donor_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `h_order`
--
ALTER TABLE `h_order`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `b_fk` FOREIGN KEY (`b_id`) REFERENCES `blood` (`blood_id`);

--
-- Constraints for table `h_order`
--
ALTER TABLE `h_order`
  ADD CONSTRAINT `b_id_fk` FOREIGN KEY (`b_id`) REFERENCES `blood` (`blood_id`),
  ADD CONSTRAINT `h_id_fk` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`);

--
-- Constraints for table `o_cost`
--
ALTER TABLE `o_cost`
  ADD CONSTRAINT `b_id_f` FOREIGN KEY (`b_id`) REFERENCES `blood` (`blood_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
