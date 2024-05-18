-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 02:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `taskhistory`
--

CREATE TABLE `taskhistory` (
  `HistoryID` int(11) NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `UserType` enum('admin','employee') DEFAULT NULL,
  `ActionTimestamp` timestamp NULL DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `taskhistory`
--

INSERT INTO `taskhistory` (`HistoryID`, `TaskID`, `UserID`, `UserType`, `ActionTimestamp`, `Message`) VALUES
(1, 10, 1, 'admin', '2024-05-12 09:45:38', 'added new task'),
(3, 10, 1, 'admin', '2024-05-12 09:51:42', 'edited task details'),
(4, 10, 1, 'admin', '2024-05-12 09:55:41', 'deleted task'),
(5, 10, 2, 'employee', '2024-05-12 10:08:58', 'updated the task status to Inprogress. Remark: task is completed just a little work is pending. Work completed: 86.'),
(6, 10, 2, 'employee', '2024-05-12 10:49:00', 'updated the task status to Completed. Remark: completed. Work completed: 100.'),
(7, 11, 1, 'admin', '2024-05-12 11:14:00', 'added new task'),
(8, 11, 2, 'employee', '2024-05-12 11:26:55', 'updated the task status to Inprogress. Remark: this is test. Work completed: 20.'),
(9, 11, 1, 'admin', '2024-05-12 11:27:39', 'edited task details'),
(10, 6, 1, 'admin', '2024-05-15 12:33:58', 'edited task details'),
(11, 7, 1, 'admin', '2024-05-15 12:38:52', 'edited task details'),
(12, 8, 1, 'admin', '2024-05-15 12:41:35', 'edited task details'),
(13, 9, 1, 'admin', '2024-05-15 12:48:53', 'edited task details'),
(14, 10, 1, 'admin', '2024-05-15 12:51:14', 'edited task details'),
(15, 11, 1, 'admin', '2024-05-15 12:52:19', 'edited task details'),
(16, 12, 1, 'admin', '2024-05-15 12:55:00', 'added new task'),
(17, 13, 1, 'admin', '2024-05-15 12:56:05', 'added new task'),
(18, 14, 1, 'admin', '2024-05-15 12:57:50', 'added new task'),
(19, 15, 1, 'admin', '2024-05-15 12:58:27', 'added new task'),
(20, 16, 1, 'admin', '2024-05-15 12:59:11', 'added new task'),
(21, 17, 1, 'admin', '2024-05-15 12:59:51', 'added new task'),
(22, 18, 1, 'admin', '2024-05-15 13:01:11', 'added new task'),
(23, 19, 1, 'admin', '2024-05-15 13:01:59', 'added new task'),
(24, 12, 2, 'employee', '2024-05-15 13:09:53', 'updated the task status to Inprogress. Remark: \"Engaged Mr. Lee in conversation and initiated light exercises. Progressing well. Work completed: 50.'),
(25, 15, 2, 'employee', '2024-05-15 13:11:15', 'updated the task status to Inprogress. Remark: Enrolled in first aid and CPR course.. Work completed: 80.'),
(26, 16, 2, 'employee', '2024-05-15 13:12:03', 'updated the task status to Inprogress. Remark: Attended medication management workshop. . Work completed: 20.'),
(27, 17, 2, 'employee', '2024-05-15 13:12:51', 'updated the task status to Inprogress. Remark: Started dementia care training program.. Work completed: 49.'),
(28, 18, 2, 'employee', '2024-05-15 13:13:35', 'updated the task status to Inprogress. Remark: Engaged in cultural competency training.. Work completed: 90.'),
(29, 19, 2, 'employee', '2024-05-15 13:14:07', 'updated the task status to Inprogress. Remark: Training on patient care documentation underway. . Work completed: 10.'),
(30, 18, 2, 'employee', '2024-05-15 13:14:37', 'updated the task status to Completed. Remark: done. Work completed: 100.');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'David Smith', 'dsmith', 1217123456, 'david.smith@seniorcareplus.co.uk', '47ef783c10d8b439db3f9425c0c9da57', '2024-10-22 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `ID` int(11) NOT NULL,
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
  `ID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `EmpName` varchar(200) DEFAULT NULL,
  `EmpEmail` varchar(200) DEFAULT NULL,
  `EmpContactNumber` bigint(20) DEFAULT NULL,
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
(2, 1, 'CG1001', 'Sarah Johnson', 'sarah.johnson@seniorcareplus.co.uk', 1219876543, 'caregiver', '1993-03-09', '456 Broad Street\r\nBirmingham\r\nWest Midlands\r\nB15 1AH\r\nUnited Kingdom', '2021-02-03', 'NA', '80b801451242d70d4311435fc6abae44', '18774bd590aa11e3cea58208eb5b52031647405444.jpg', '2024-03-21 12:23:03', '2024-05-14 12:58:17'),
(3, 2, 'PC2001', 'Michael Davis', 'michael.davis@seniorcareplus.co.uk', 1217654321, 'Registered Nurse', '1987-08-06', '789 Park Avenue, Birmingham, West Midlands, B2 2BB, United Kingdom', '2020-09-09', 'NA', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347253.jpg', '2024-03-21 12:27:33', '2024-03-22 13:04:28'),
(4, 3, 'CT3001', 'Emily Patel', 'emily.patel@seniorcareplus.co.uk', 1218765432, 'Training Coordinator', '1996-06-06', '567 Elm Street, Birmingham, West Midlands, B3 3CC, United Kingdom', '2021-02-01', '', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347360.jpg', '2024-03-21 12:29:20', '2024-03-22 13:05:01'),
(5, 4, 'HM4001', 'David Thompson', 'david.thompson@seniorcareplus.co.uk', 1216543210, 'Health Monitor Specialist', '2002-01-01', '234 Oak Avenue, Birmingham, West Midlands, B4 4DD, United Kingdom', '2022-03-01', 'NA', 'f925916e2754e5e03f75dd58a5733251', '1bb87d41d15fe27b500a4bfcde01bb0e1648275105.png', '2024-03-21 06:11:45', '2024-03-22 13:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(11) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
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
  `ID` int(11) NOT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `AssignTaskto` int(11) DEFAULT NULL,
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
(1, 1, 2, 'Medium', 'Patient Vital Signs Monitoring and Reporting', 'Monitor patients\' vital signs and report any changes to the nursing staff.', '2024-05-08', '2024-05-06 07:12:32', 'Completed', '80', 'this istest', NULL),
(3, 3, 4, 'Most Urgent', 'New Employee Orientation Program', 'Conduct orientation sessions to introduce new employees to company policies and procedures.', '2024-05-07', '2024-05-06 12:15:22', 'Completed', '100', 'Task Completed', NULL),
(4, 2, 3, 'Urgent', 'Patient and Family Health Education Program', 'Educate patients and their families about health conditions, treatment plans, and self-care techniques.', '2024-05-09', '2024-05-07 06:05:55', 'Completed', '20', 'Task Completed', NULL),
(5, 4, 5, 'Normal', 'Patient Self-Monitoring Program', 'Educate patients on self-monitoring techniques and tools.', '2024-05-09', '2024-05-06 06:12:55', 'Inprogress', '100', 'Currently working on educating patients about self-monitoring techniques and tools. Will provide further updates soon.', NULL),
(6, 1, 2, 'Normal', 'Elderly Friend  ', 'Your job is to be a friend to older people. You\'ll spend time chatting, playing games, and going out with them. You might help with small jobs around the house and remind them to take their medicine. Sometimes, you\'ll go with them to appointments or events. Your main goal is to make them feel happy and comfortable.', '2024-05-12', '2024-05-08 21:02:36', 'Completed', '100', 'test', NULL),
(7, 6, 5, 'Normal', 'Software Updates and Notifications', 'Provide caregivers with timely notifications about software updates, new features, and important announcements related to the application', '2024-05-18', '2024-05-11 12:43:14', 'Completed', '100', 'test1001', NULL),
(8, 6, 3, 'Medium', 'Feedback Mechanism:', ' Include a feedback form or survey within the application to gather input from caregivers about their experience using the technology, including any issues they encounter and suggestions for improvement.', '2024-05-14', '2024-05-11 12:46:24', 'Completed', '100', 'test', NULL),
(9, 1, 4, 'Most Urgent', 'Personal Care Assistance for Mrs. Smith', ' Provide personal care assistance to Mrs. Smith, including helping with bathing and grooming.', '2024-05-12', '2024-05-11 14:02:05', NULL, NULL, NULL, NULL),
(10, 1, 2, 'Medium', 'Meal Preparation for Mr. Johnson', 'Prepare meals for Mr. Johnson according to his dietary restrictions.', '2024-05-14', '2024-05-12 14:45:38', 'Completed', '100', 'completed', NULL),
(11, 1, 3, 'Most Urgent', ' Accompany Ms. Brown to Doctor\'s Appointment', 'Accompany Ms. Brown to her doctor\'s appointment and take notes on the visit.', '2024-05-13', '2024-05-12 16:14:00', 'Inprogress', '20', 'this is test', NULL),
(12, 1, 2, 'Medium', 'Engage Mr. Lee in Conversation and Light Exercises', ' Engage Mr. Lee in conversation and assist with light exercises to promote mobility.', '2024-05-22', '2024-05-15 11:55:00', 'Inprogress', '50', '\"Engaged Mr. Lee in conversation and initiated light exercises. Progressing well', NULL),
(13, 2, 3, 'Urgent', 'Medication Administration and Monitoring for Mrs. Garcia', 'Administer medication to Mrs. Garcia and record any side effects or changes in condition', '2024-05-15', '2024-05-15 11:56:05', NULL, NULL, NULL, NULL),
(14, 3, 4, 'Urgent', 'Complete Online Caregiver Training Modules', 'Complete online modules covering essential caregiving skills and best practices.', '2024-05-15', '2024-05-15 11:57:50', NULL, NULL, NULL, NULL),
(15, 1, 2, 'Most Urgent', 'Attend First Aid and CPR Certification Course', ' Participate in a course to obtain certification in first aid and CPR.', '2024-05-15', '2024-05-15 11:58:27', 'Inprogress', '80', 'Enrolled in first aid and CPR course.', NULL),
(16, 1, 2, 'Medium', 'Attend Medication Management Workshop', ' Participate in a workshop to enhance skills in medication management and administration.', '2024-05-31', '2024-05-15 11:59:11', 'Inprogress', '20', 'Attended medication management workshop. ', NULL),
(17, 1, 2, 'Most Urgent', 'Complete Dementia Care Training Program', 'Complete a comprehensive training program focused on dementia care techniques and strategies.', '2024-05-15', '2024-05-15 11:59:51', 'Inprogress', '49', 'Started dementia care training program.', NULL),
(18, 1, 2, 'Most Urgent', 'Complete Cultural Sensitivity Training Module', 'Enhance understanding and respect for cultural differences to provide culturally competent care', '2024-05-15', '2024-05-15 12:01:11', 'Completed', '100', 'done', NULL),
(19, 1, 2, 'Normal', 'Complete Documentation and Reporting Training Module', 'Learn how to accurately document patient care activities and report any changes in patient status.', '2024-06-05', '2024-05-15 12:01:59', 'Inprogress', '10', 'Training on patient care documentation underway. ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltasktracking`
--

CREATE TABLE `tbltasktracking` (
  `ID` int(11) NOT NULL,
  `TaskID` int(11) DEFAULT NULL,
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
(3, 3, 'Task is inprogress', 'Inprogress', '60', '2024-03-19 05:24:25'),
(4, 3, 'Task Completed', 'Completed', '100', '2024-05-08 05:28:14'),
(5, 4, '', 'Completed', '20', '2024-05-09 06:07:29'),
(6, 5, '', 'Inprogress', '50', '2024-03-19 06:13:52'),
(8, 1, 'this istest', 'Completed', '80', '2024-05-09 16:50:49'),
(10, 7, 'test1001', 'Completed', '100', '2024-05-12 12:44:01'),
(11, 8, 'test', 'Inprogress', '20', '2024-05-11 12:47:02'),
(12, 8, 'test', 'Inprogress', '60', '2024-05-11 12:47:43'),
(13, 8, 'test', 'Inprogress', '90', '2024-05-11 12:47:58'),
(14, 8, 'test', 'Completed', '100', '2024-05-11 12:48:14'),
(15, 10, 'task is completed just a little work is pending', 'Inprogress', '86', '2024-05-12 15:08:58'),
(16, 10, 'completed', 'Completed', '100', '2024-05-12 15:49:00'),
(17, 11, 'this is test', 'Inprogress', '20', '2024-05-12 16:26:55'),
(18, 12, '\"Engaged Mr. Lee in conversation and initiated light exercises. Progressing well', 'Inprogress', '50', '2024-05-15 12:09:53'),
(19, 15, 'Enrolled in first aid and CPR course.', 'Inprogress', '80', '2024-05-15 12:11:15'),
(20, 16, 'Attended medication management workshop. ', 'Inprogress', '20', '2024-05-15 12:12:03'),
(21, 17, 'Started dementia care training program.', 'Inprogress', '49', '2024-05-15 12:12:51'),
(22, 18, 'Engaged in cultural competency training.', 'Inprogress', '90', '2024-05-15 12:13:35'),
(23, 19, 'Training on patient care documentation underway. ', 'Inprogress', '10', '2024-05-15 12:14:07'),
(24, 18, 'done', 'Completed', '100', '2024-05-15 12:14:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taskhistory`
--
ALTER TABLE `taskhistory`
  ADD PRIMARY KEY (`HistoryID`);

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
-- AUTO_INCREMENT for table `taskhistory`
--
ALTER TABLE `taskhistory`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltask`
--
ALTER TABLE `tbltask`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
