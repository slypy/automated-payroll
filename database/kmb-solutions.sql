-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2021 at 10:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmb-solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `profile_pic`) VALUES
(1, 'Sly', 'Bacalso', 'admin', '123123', 'admin', ''),
(2, 'Sly', 'Bacalso', 'admin1', '123123', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adjustments`
--

CREATE TABLE `tbl_adjustments` (
  `id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `overtime_cost` varchar(255) NOT NULL,
  `holiday_pay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_logs`
--

CREATE TABLE `tbl_admin_logs` (
  `id` int(255) NOT NULL,
  `admin_log` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(255) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `attendace` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(10) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `fingerprint_number` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employeeTime_in_out`
--

CREATE TABLE `tbl_employeeTime_in_out` (
  `id` int(255) NOT NULL,
  `employee_number` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE `tbl_positions` (
  `id` int(10) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `wage` varchar(255) NOT NULL,
  `per_hour` float NOT NULL,
  `per_day` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`id`, `position_name`, `wage`, `per_hour`, `per_day`) VALUES
(8, 'Software Engineer', 'Per Hour', 123, 0),
(9, 'Network Engineer', 'Per Day', 0, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_adjustments`
--
ALTER TABLE `tbl_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_logs`
--
ALTER TABLE `tbl_admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employeeTime_in_out`
--
ALTER TABLE `tbl_employeeTime_in_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_adjustments`
--
ALTER TABLE `tbl_adjustments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin_logs`
--
ALTER TABLE `tbl_admin_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employeeTime_in_out`
--
ALTER TABLE `tbl_employeeTime_in_out`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
