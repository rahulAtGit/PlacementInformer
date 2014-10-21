-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2014 at 02:09 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `placementinformer`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

create database `placementinformer`;

use `placementinformer`;

CREATE TABLE IF NOT EXISTS `applied` (
  `USN` varchar(10) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `TSTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `USN` (`USN`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--


-- --------------------------------------------------------

--
-- Table structure for table `attended`
--

CREATE TABLE IF NOT EXISTS `attended` (
  `USN` varchar(10) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  KEY `USN` (`USN`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attended`
--


-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branch` varchar(5) NOT NULL,
  PRIMARY KEY (`branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch`) VALUES
('BT'),
('CE'),
('CH'),
('CSE'),
('ECE'),
('EEE'),
('IEM'),
('ISE'),
('IT'),
('MCA'),
('ME'),
('TC');

-- --------------------------------------------------------

--
-- Table structure for table `brancheseligible`
--

CREATE TABLE IF NOT EXISTS `brancheseligible` (
  `name` varchar(100) NOT NULL,
  `branch` varchar(5) NOT NULL,
  KEY `branch` (`branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brancheseligible`
--


-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `NAME` varchar(40) NOT NULL,
  `PACKAGE` double NOT NULL,
  `GPACUTOFF` double NOT NULL,
  `TENTHCUTOFF` decimal(11,0) NOT NULL,
  `PUCCUTOFF` decimal(11,0) NOT NULL,
  `DIPLOMACUTOFF` decimal(11,0) NOT NULL,
  `lastDateReg` varchar(50) NOT NULL,
  PRIMARY KEY (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--


-- --------------------------------------------------------

--
-- Table structure for table `dateofvisit`
--

CREATE TABLE IF NOT EXISTS `dateofvisit` (
  `NAME` varchar(40) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dateofvisit`
--


-- --------------------------------------------------------

--
-- Table structure for table `jobprofile`
--

CREATE TABLE IF NOT EXISTS `jobprofile` (
  `NAME` varchar(40) DEFAULT NULL,
  `PROFILE` varchar(60) DEFAULT NULL,
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobprofile`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uname` varchar(10) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `password`) VALUES
('1RV11IS040', '439ed537979d8e831561964dbbbd7413'),
('1RV11IS042', '58ecfdc7967e35bac8738978c0070a2c');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `USN` varchar(10) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `DATEOFOFFER` date DEFAULT NULL,
  `PROFILE` varchar(60) DEFAULT NULL,
  KEY `USN` (`USN`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--


-- --------------------------------------------------------

--
-- Table structure for table `pcworked`
--

CREATE TABLE IF NOT EXISTS `pcworked` (
  `USN` varchar(10) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  KEY `USN` (`USN`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcworked`
--


-- --------------------------------------------------------

--
-- Table structure for table `shortlisted`
--

CREATE TABLE IF NOT EXISTS `shortlisted` (
  `USN` varchar(10) DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  KEY `USN` (`USN`),
  KEY `NAME` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlisted`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `USN` varchar(10) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `BRANCH` varchar(25) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PHONE` int(11) NOT NULL,
  `CGPA` decimal(10,0) NOT NULL DEFAULT '0',
  `tenthPercent` decimal(10,0) NOT NULL DEFAULT '0',
  `twelthPercent` decimal(10,0) NOT NULL DEFAULT '0',
  `diplomapercent` decimal(10,0) NOT NULL DEFAULT '100',
  `COORDINATORUSN` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`USN`),
  KEY `COORDINATORUSN` (`COORDINATORUSN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `APPLIED_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `APPLIED_ibfk_2` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `attended`
--
ALTER TABLE `attended`
  ADD CONSTRAINT `ATTENDED_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `ATTENDED_ibfk_2` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `brancheseligible`
--
ALTER TABLE `brancheseligible`
  ADD CONSTRAINT `brancheseligible_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `branches` (`branch`);

--
-- Constraints for table `dateofvisit`
--
ALTER TABLE `dateofvisit`
  ADD CONSTRAINT `DATEOFVISIT_ibfk_1` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `jobprofile`
--
ALTER TABLE `jobprofile`
  ADD CONSTRAINT `JOBPROFILE_ibfk_1` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `OFFER_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `OFFER_ibfk_2` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`),
  ADD CONSTRAINT `OFFER_ibfk_3` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`),
  ADD CONSTRAINT `OFFER_ibfk_4` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `pcworked`
--
ALTER TABLE `pcworked`
  ADD CONSTRAINT `PCWORKED_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `PCWORKED_ibfk_2` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `shortlisted`
--
ALTER TABLE `shortlisted`
  ADD CONSTRAINT `SHORTLISTED_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`),
  ADD CONSTRAINT `SHORTLISTED_ibfk_2` FOREIGN KEY (`NAME`) REFERENCES `company` (`NAME`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `STUDENT_ibfk_1` FOREIGN KEY (`COORDINATORUSN`) REFERENCES `student` (`USN`);
