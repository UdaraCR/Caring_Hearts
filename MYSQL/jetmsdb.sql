-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 03:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jetmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'David Smith', 'dsmith', 1217123456, 'david.smith@seniorcareplus.co.uk', 'f925916e2754e5e03f75dd58a5733251', '2024-10-22 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `ID` int(5) NOT NULL,
  `DepartmentName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`ID`, `DepartmentName`, `CreationDate`) VALUES
(1, 'Caregiver Team', '2024-03-22 06:59:06'),
(2, 'Patient Care', '2024-03-22 07:34:38'),
(3, 'Caregiver Training', '2024-03-22 07:34:48'),
(4, 'Health Monitoring', '2024-03-22 07:34:58'),
(5, 'Administrative Support', '2024-03-22 07:35:08'),
(6, 'Technology and Support', '2024-03-22 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(5) NOT NULL,
  `DepartmentID` int(5) DEFAULT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `EmpName` varchar(200) DEFAULT NULL,
  `EmpEmail` varchar(200) DEFAULT NULL,
  `EmpContactNumber` bigint(10) DEFAULT NULL,
  `Designation` varchar(200) DEFAULT NULL,
  `EmpDateofbirth` date DEFAULT NULL,
  `EmpAddress` varchar(250) DEFAULT NULL,
  `EmpDateofjoining` date DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `DepartmentID`, `EmpId`, `EmpName`, `EmpEmail`, `EmpContactNumber`, `Designation`, `EmpDateofbirth`, `EmpAddress`, `EmpDateofjoining`, `Description`, `Password`, `ProfilePic`, `CreationDate`, `UpdationDate`) VALUES
(2, 1, 'CG1001', 'Sarah Johnson', 'sarah.johnson@seniorcareplus.co.uk', 1219876543, 'caregiver', '1993-03-09', '456 Broad Street\r\nBirmingham\r\nWest Midlands\r\nB15 1AH\r\nUnited Kingdom', '2021-02-03', 'NA', '80b801451242d70d4311435fc6abae44', '18774bd590aa11e3cea58208eb5b52031647405444.jpg', '2024-03-21 12:23:03', '2024-03-22 14:19:44'),
(3, 2, 'PC2001', 'Michael Davis', 'michael.davis@seniorcareplus.co.uk', 1217654321, 'Registered Nurse', '1987-08-06', '789 Park Avenue, Birmingham, West Midlands, B2 2BB, United Kingdom', '2020-09-09', 'NA', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347253.jpg', '2024-03-21 12:27:33', '2024-03-22 13:04:28'),
(4, 3, 'CT3001', 'Emily Patel', 'emily.patel@seniorcareplus.co.uk', 1218765432, 'Training Coordinator', '1996-06-06', '567 Elm Street, Birmingham, West Midlands, B3 3CC, United Kingdom', '2021-02-01', '', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347360.jpg', '2024-03-21 12:29:20', '2024-03-22 13:05:01'),
(5, 4, 'HM4001', 'David Thompson', 'david.thompson@seniorcareplus.co.uk', 1216543210, 'Health Monitor Specialist', '2002-01-01', '234 Oak Avenue, Birmingham, West Midlands, B4 4DD, United Kingdom', '2022-03-01', 'NA', 'f925916e2754e5e03f75dd58a5733251', '1bb87d41d15fe27b500a4bfcde01bb0e1648275105.png', '2024-03-21 06:11:45', '2024-03-22 13:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', 'Welcome to Caring Heartz, a task management system designed to simplify caregiver tasks. Our goal is to enhance the caregiving experience by providing an easy-to-use platform that helps caregivers manage tasks efficiently.\r\n\r\nWith our app, caregivers can focus on providing excellent care to their loved ones while we handle task coordination and communication. Backed by years of healthcare experience, we are dedicated to excellence, compassion, and integrity.\r\n\r\nJoin us in transforming the caregiving landscape and making a difference in the lives of both caregivers and the elderly individuals they care for.', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '67 High Street, Birmingham, B4 7TA, United Kingdom', 'careteam@seniorcareplus.co.uk', 1212345678, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbltask`
--

CREATE TABLE `tbltask` (
  `ID` int(5) NOT NULL,
  `DeptID` int(5) DEFAULT NULL,
  `AssignTaskto` int(5) DEFAULT NULL,
  `TaskPriority` varchar(100) DEFAULT NULL,
  `TaskTitle` varchar(250) DEFAULT NULL,
  `TaskDescription` mediumtext DEFAULT NULL,
  `TaskEnddate` date DEFAULT NULL,
  `TaskAssigndate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `WorkCompleted` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltask`
--

INSERT INTO `tbltask` (`ID`, `DeptID`, `AssignTaskto`, `TaskPriority`, `TaskTitle`, `TaskDescription`, `TaskEnddate`, `TaskAssigndate`, `Status`, `WorkCompleted`, `Remark`, `UpdationDate`) VALUES
(1, 1, 2, 'Medium', 'Patient Vital Signs Monitoring and Reporting', 'Monitor patients\' vital signs and report any changes to the nursing staff.', '2024-05-03', '2024-03-18 07:12:32', 'Inprogress', '100', 'I\'ve started checking patients\' vital signs. I\'ll keep an eye on any changes and tell the nurses if something\'s not right. Keeping patients safe is my priority.', NULL),
(3, 3, 4, 'Most Urgent', 'New Employee Orientation Program', 'Conduct orientation sessions to introduce new employees to company policies and procedures.', '2024-03-24', '2024-03-18 12:15:22', 'Completed', '100', 'Task Completed', NULL),
(4, 2, 3, 'Urgent', 'Patient and Family Health Education Program', 'Educate patients and their families about health conditions, treatment plans, and self-care techniques.', '2024-03-26', '2024-03-18 06:05:55', 'Completed', '20', 'Task Completed', NULL),
(5, 4, 5, 'Normal', 'Patient Self-Monitoring Program', 'Educate patients on self-monitoring techniques and tools.', '2024-06-02', '2024-03-18 06:12:55', 'Inprogress', '100', 'Currently working on educating patients about self-monitoring techniques and tools. Will provide further updates soon.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltasktracking`
--

CREATE TABLE `tbltasktracking` (
  `ID` int(10) NOT NULL,
  `TaskID` int(10) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `WorkCompleted` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltasktracking`
--

INSERT INTO `tbltasktracking` (`ID`, `TaskID`, `Remark`, `Status`, `WorkCompleted`, `UpdationDate`) VALUES
(1, 1, 'Work is in progress', 'Inprogress', '65', '2024-03-19 18:30:00'),
(2, 1, 'Task Completed', 'Completed', '100', '2024-03-19 18:30:00'),
(3, 3, 'Task is inprogress', 'Inprogress', '60', '2024-03-19 05:24:25'),
(4, 3, 'Task Completed', 'Completed', '100', '2024-03-19 05:28:14'),
(5, 4, '', 'Inprogress', '20', '2024-03-19 06:07:29'),
(6, 5, '', 'Inprogress', '50', '2024-03-19 06:13:52'),
(7, 5, '', 'Completed', '100', '2024-03-19 06:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltask`
--
ALTER TABLE `tbltask`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltask`
--
ALTER TABLE `tbltask`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
