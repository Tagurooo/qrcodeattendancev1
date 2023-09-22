-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 12:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcodedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_Name`, `Admin_Password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(1000) NOT NULL,
  `TIMEIN` varchar(250) NOT NULL,
  `TIMEOUT` varchar(250) NOT NULL,
  `LOGDATE` varchar(250) NOT NULL,
  `STATUS` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `STUDENTID`, `TIMEIN`, `TIMEOUT`, `LOGDATE`, `STATUS`) VALUES
(186, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzcmNvZGUiOiIyMC0wNzEwMSIsImZ1bGxuYW1lIjoiRklFREFDQU4sIExFQSBNQVJJRSBGLiIsInRpbWVzdGFtcCI6IjIwMjItMTEtMDkgMDk6Mjc6NDAiLCJ0eXBlIjoiU1RVREVOVCIsInVzZXJpZCI6IjIwLTA3MTAxIn0.8z92CHuzp_0Xj8gxKlbCiC19RkaovT6PDLmrtvJ_cCQ', '10:20:AM', '', '2022-11-09', '0'),
(187, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzcmNvZGUiOiIyMC0wMzg4OCIsImZ1bGxuYW1lIjoiQ0FTQU8sIEdFT1JHRSBNSUtFTCBSLiIsInRpbWVzdGFtcCI6IjIwMjItMTEtMDkgMDk6NTY6NTMiLCJ0eXBlIjoiU1RVREVOVCIsInVzZXJpZCI6IjIwLTAzODg4In0.DKcku3isOb-G_92jgMKJ4O4IKJ6RwaxdcxDLUSAUGD0', '10:21:AM', '10:21:AM', '2022-11-09', '1'),
(188, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzcmNvZGUiOiIyMC0wMzg4OCIsImZ1bGxuYW1lIjoiQ0FTQU8sIEdFT1JHRSBNSUtFTCBSLiIsInRpbWVzdGFtcCI6IjIwMjItMTEtMDkgMDk6NTY6NTMiLCJ0eXBlIjoiU1RVREVOVCIsInVzZXJpZCI6IjIwLTAzODg4In0.DKcku3isOb-G_92jgMKJ4O4IKJ6RwaxdcxDLUSAUGD0', '07:23:PM', '', '2022-11-12', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(1000) NOT NULL,
  `FIRSTNAME` varchar(250) NOT NULL,
  `MNAME` varchar(250) NOT NULL,
  `LASTNAME` varchar(250) NOT NULL,
  `AGE` varchar(250) NOT NULL,
  `GENDER` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `STUDENTID`, `FIRSTNAME`, `MNAME`, `LASTNAME`, `AGE`, `GENDER`) VALUES
(10, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzcmNvZGUiOiIyMC0wMzg4OCIsImZ1bGxuYW1lIjoiQ0FTQU8sIEdFT1JHRSBNSUtFTCBSLiIsInRpbWVzdGFtcCI6IjIwMjItMTEtMDkgMDk6NTY6NTMiLCJ0eXBlIjoiU1RVREVOVCIsInVzZXJpZCI6IjIwLTAzODg4In0.DKcku3isOb-G_92jgMKJ4O4IKJ6RwaxdcxDLUSAUGD0', 'George Mikel', 'R', 'Casao', '21', 'Male'),
(11, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzcmNvZGUiOiIyMC0wNzEwMSIsImZ1bGxuYW1lIjoiRklFREFDQU4sIExFQSBNQVJJRSBGLiIsInRpbWVzdGFtcCI6IjIwMjItMTEtMDkgMDk6Mjc6NDAiLCJ0eXBlIjoiU1RVREVOVCIsInVzZXJpZCI6IjIwLTA3MTAxIn0.8z92CHuzp_0Xj8gxKlbCiC19RkaovT6PDLmrtvJ_cCQ', 'Lea Marie', 'F', 'Fiedacan', '21', 'Female'),
(12, '1212', 'kim ', 'r ', 'ryan ', '21 ', 'unknown'),
(13, 'it', 'nani', 'k', 'kore', '21', 'unknown');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
