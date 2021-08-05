-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 08:53 PM
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
(2, 'Sly', 'Bacalso', 'admin1', '123123', 'admin', ''),
(7, 'sadas', 'asdasd', 'asdasd', 'asdsad', 'admin', ''),
(8, 'daniel', 'kiamco', 'tensai', '123', 'admin', '');

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
-- Table structure for table `tbl_dtr`
--

CREATE TABLE `tbl_dtr` (
  `id` int(10) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `regular_hrs` float NOT NULL,
  `regular_ot_hrs` float NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `time_in` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `total_regular_work_hours` float GENERATED ALWAYS AS (case when `time_in` <> '' and `time_out` <> '' then if(replace(substr(timediff(concat(`end_date`,' ',`time_out`),concat(`start_date`,' ',`time_in`)),1,5),':','.') + 0.0 > `regular_hrs`,`regular_hrs`,replace(substr(timediff(concat(`end_date`,' ',`time_out`),concat(`start_date`,' ',`time_in`)),1,5),':','.') + 0.0) else 0 end) VIRTUAL,
  `ot_start_date` varchar(255) NOT NULL,
  `over_time_in` varchar(255) NOT NULL,
  `ot_end_date` varchar(255) NOT NULL,
  `over_time_out` varchar(255) NOT NULL,
  `total_regular_ot_work_hours` float GENERATED ALWAYS AS (case when `over_time_in` <> '' and `over_time_out` <> '' then if(replace(substr(timediff(concat(`ot_end_date`,' ',`over_time_out`),concat(`ot_start_date`,' ',`over_time_in`)),1,5),':','.') + 0.0 > `regular_ot_hrs`,`regular_ot_hrs`,replace(substr(timediff(concat(`ot_end_date`,' ',`over_time_out`),concat(`ot_start_date`,' ',`over_time_in`)),1,5),':','.') + 0.0) else 0 end) VIRTUAL,
  `total_work_hours` float GENERATED ALWAYS AS (case when `total_regular_work_hours` <> 0 and `total_regular_ot_work_hours` <> 0 then `total_regular_work_hours` + `total_regular_ot_work_hours` else `total_regular_work_hours` end) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dtr`
--

INSERT INTO `tbl_dtr` (`id`, `employee_id`, `employee_name`, `regular_hrs`, `regular_ot_hrs`, `start_date`, `time_in`, `end_date`, `time_out`, `ot_start_date`, `over_time_in`, `ot_end_date`, `over_time_out`) VALUES
(1, '20210301', 'Sly Kint Bacalso', 11, 4, '2021-08-05', '08:00', '2021-08-05', '20:00', '2021-08-05', '20:10', '2021-08-05', '23:50'),
(2, '20210302', 'Daniel Kiamco', 11, 4, '2021-08-05', '', '', '', '', '', '', ''),
(3, '20210303', 'Larry Kiamco', 10, 4, '2021-08-05', '', '', '', '', '', '', ''),
(4, '20210304', 'Harry Hitendra', 11, 4, '2021-08-05', '', '', '', '', '', '', ''),
(5, '20210301', 'Sly Kint Bacalso', 11, 4, '2021-08-06', '08:00', '2021-08-06', '20:20', '2021-08-06', '20:23', '2021-08-06', '23:52'),
(6, '20210302', 'Daniel Kiamco', 11, 4, '2021-08-06', '02:03', '2021-08-06', '20:35', '2021-08-06', '20:42', '2021-08-06', '23:44'),
(7, '20210303', 'Larry Kiamco', 10, 4, '2021-08-06', '20:00', '2021-08-07', '08:00', '', '', '', ''),
(8, '20210304', 'Harry Hitendra', 11, 4, '2021-08-06', '02:47', '2021-08-06', '20:58', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` int(10) NOT NULL,
  `employee_status` varchar(255) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `fingerprint_number` varchar(255) NOT NULL,
  `worker_type` varchar(255) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `shifting_type_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_number` varchar(11) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `duration_date` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `sss_number` varchar(255) NOT NULL,
  `employee_er` float NOT NULL,
  `employee_ee` float NOT NULL,
  `sss_active_loan` float NOT NULL,
  `philhealth_number` varchar(255) NOT NULL,
  `philhealth_per_month` float NOT NULL,
  `pag_ibig_number` varchar(255) NOT NULL,
  `pag_ibig_per_month` float NOT NULL,
  `pag_ibig_active_loan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employees`
--

INSERT INTO `tbl_employees` (`id`, `employee_status`, `employee_number`, `card_id`, `fingerprint_number`, `worker_type`, `job_position`, `shifting_type_name`, `first_name`, `last_name`, `middle_name`, `birth_date`, `age`, `gender`, `civil_status`, `full_address`, `email`, `contact_number`, `contact_person`, `contact_person_number`, `relationship`, `duration_date`, `start_date`, `end_date`, `sss_number`, `employee_er`, `employee_ee`, `sss_active_loan`, `philhealth_number`, `philhealth_per_month`, `pag_ibig_number`, `pag_ibig_per_month`, `pag_ibig_active_loan`) VALUES
(3, 'active', '20210301', '0729368356', '1', 'Regular', 'Software Engineer', 'Day Shift', 'Sly Kint', 'Bacalso', 'Andales', '2021-07-29', 19, 'Male', 'Marriage', 'sample', 'nasa.sly14@gmail.com', '09123456789', 'Charmaine Helven G. Resma', '09123456789', 'Wife', 'Open Time', '2021-07-23', '2026-08-23', '34-8888123-8', 0, 0, 0, '11-202188887', 0, '11-202188887', 0, 0),
(6, 'active', '20210302', '2', '2', 'Concession Worker', 'Product Manager', 'Day Shift', 'Daniel', 'Kiamco', ' ', '2001-07-17', 20, 'Male', 'Marriage', 'sample', 'daniel@gmail.com', '09123456789', 'Jasmine', '09123456789', 'Wife', '2 Years', '2021-07-23', '2023-07-23', '', 0, 0, 0, '', 0, '', 0, 0),
(7, 'active', '20210303', '3', '3', 'Concession Worker', 'Product Manager', 'Night Shift', 'Larry', 'Kiamco', ' ', '1971-06-09', 50, 'Male', 'Marriage', 'sample', 'larry@gmail.com', '09123456789', 'Daniel Kiamco', '09123456789', 'Father', '2 Years', '2021-07-23', '2023-07-23', '', 0, 0, 0, '', 0, '', 0, 0),
(8, 'active', '20210304', '4', '4', 'Concession Worker', 'Programmer', 'Day Shift', 'Harry', 'Hitendra', '', '1975-08-23', 45, 'Male', 'Single', 'sample', 'harry@gmail.com', '09123456789', 'Daniel Kiamco', '09123456789', 'Nephew', '2 Years', '2021-07-23', '2023-07-23', '', 0, 0, 0, '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_misc`
--

CREATE TABLE `tbl_employee_misc` (
  `id` int(10) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `misc_name` varchar(255) NOT NULL,
  `misc_amount` float NOT NULL,
  `salary_deduction` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday_pay`
--

CREATE TABLE `tbl_holiday_pay` (
  `id` int(10) NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `holiday_date` varchar(255) NOT NULL,
  `percent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_holiday_pay`
--

INSERT INTO `tbl_holiday_pay` (`id`, `holiday_name`, `holiday_date`, `percent`) VALUES
(6, 'Christmas Day', '2021-12-25', 50),
(7, 'Halloween', '2021-11-01', 5),
(8, 'Holiday', '2021-07-23', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_late_policy`
--

CREATE TABLE `tbl_late_policy` (
  `id` int(11) NOT NULL,
  `late_after` float NOT NULL,
  `penalty_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_late_policy`
--

INSERT INTO `tbl_late_policy` (`id`, `late_after`, `penalty_amount`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime`
--

CREATE TABLE `tbl_overtime` (
  `id` int(10) NOT NULL,
  `over_time` varchar(255) NOT NULL,
  `max_working_hours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_overtime`
--

INSERT INTO `tbl_overtime` (`id`, `over_time`, `max_working_hours`) VALUES
(1, 'Over Time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_positions`
--

CREATE TABLE `tbl_positions` (
  `id` int(10) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `wage_salary` float NOT NULL,
  `wage_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_positions`
--

INSERT INTO `tbl_positions` (`id`, `position_name`, `wage_salary`, `wage_type`) VALUES
(20, 'Software Engineer', 1000, 'Per Day'),
(23, 'Driver', 56.5, 'Per Hour'),
(25, 'Secretary', 450, 'Per Day'),
(26, 'IT consultant', 600, 'Per Day'),
(27, 'Conductor', 50, 'Per Hour'),
(31, 'Product Manager', 5000, 'Per Day');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shifting_hours`
--

CREATE TABLE `tbl_shifting_hours` (
  `id` int(10) NOT NULL,
  `shifting_type_name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `break_time` float NOT NULL,
  `total_work_hours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shifting_hours`
--

INSERT INTO `tbl_shifting_hours` (`id`, `shifting_type_name`, `start_time`, `end_time`, `break_time`, `total_work_hours`) VALUES
(35, 'Open Shift', '11:55 AM', '11:55 PM', 1, 11),
(37, 'Day Shift', '08:00 AM', '08:00 PM', 1, 11),
(38, 'Night Shift', '08:00 PM', '08:00 AM', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffCA`
--

CREATE TABLE `tbl_staffCA` (
  `id` int(11) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `date_cash_advance` varchar(255) NOT NULL,
  `cash_advance_amount` float NOT NULL,
  `salary_deduction` float NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staffCA`
--

INSERT INTO `tbl_staffCA` (`id`, `employee_number`, `employee_name`, `date_cash_advance`, `cash_advance_amount`, `salary_deduction`, `remarks`) VALUES
(20, '20210301', 'Sly Kint Bacalso', '2021-07-20', 2500, 2500, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffDamages`
--

CREATE TABLE `tbl_staffDamages` (
  `id` int(10) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `date_issue` varchar(255) NOT NULL,
  `damage_amount` float NOT NULL,
  `salary_deduction` float NOT NULL,
  `issue_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffLoan`
--

CREATE TABLE `tbl_staffLoan` (
  `id` int(10) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `date_of_loan` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `loan_amount` float NOT NULL,
  `loan_interest` float NOT NULL,
  `loan_balance` float NOT NULL,
  `loan_remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staffLoan`
--

INSERT INTO `tbl_staffLoan` (`id`, `employee_number`, `employee_name`, `date_of_loan`, `due_date`, `loan_amount`, `loan_interest`, `loan_balance`, `loan_remarks`) VALUES
(5, '20210301', 'Sly Kint Bacalso', '2021-07-23', '2021-07-31', 2500, 10, 0, 'new');

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
-- Indexes for table `tbl_dtr`
--
ALTER TABLE `tbl_dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_holiday_pay`
--
ALTER TABLE `tbl_holiday_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_late_policy`
--
ALTER TABLE `tbl_late_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_overtime`
--
ALTER TABLE `tbl_overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shifting_hours`
--
ALTER TABLE `tbl_shifting_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staffCA`
--
ALTER TABLE `tbl_staffCA`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staffDamages`
--
ALTER TABLE `tbl_staffDamages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_staffLoan`
--
ALTER TABLE `tbl_staffLoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `tbl_dtr`
--
ALTER TABLE `tbl_dtr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_holiday_pay`
--
ALTER TABLE `tbl_holiday_pay`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_late_policy`
--
ALTER TABLE `tbl_late_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_overtime`
--
ALTER TABLE `tbl_overtime`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_positions`
--
ALTER TABLE `tbl_positions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_shifting_hours`
--
ALTER TABLE `tbl_shifting_hours`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_staffCA`
--
ALTER TABLE `tbl_staffCA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_staffDamages`
--
ALTER TABLE `tbl_staffDamages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_staffLoan`
--
ALTER TABLE `tbl_staffLoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
