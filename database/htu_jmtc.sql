-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2022 at 11:08 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htu_jmtc`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) DEFAULT NULL,
  `RegionID` int(11) DEFAULT NULL,
  `CityID` int(11) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `House` varchar(100) DEFAULT NULL,
  `Landmark` mediumtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`ID`, `CountryID`, `RegionID`, `CityID`, `Street`, `House`, `Landmark`) VALUES
(1, 1, 2, 2, '', '', 'Mout sinai'),
(2, 1, 2, 2, '', '', 'Mout sinai'),
(3, 1, 2, 2, '', '', 'Mout sinai'),
(4, 1, 2, 2, '', '', 'Mout sinai'),
(5, 1, 2, 2, '', '', 'Mout sinai'),
(6, 1, 2, 2, '', '', 'Mout sinai'),
(7, 1, 2, 2, '', '', 'Mout sinai'),
(8, 1, 2, 2, '', '', 'Mout sinai'),
(9, 1, 2, 2, '', '', ''),
(10, 1, 2, 2, '', '', 'Mout sinai'),
(11, 1, 2, 2, '', '', 'Mout sinai'),
(12, 1, 1, 1, '', '', 'Mout sinai'),
(13, 1, 2, 2, '', '', 'Mout sinai'),
(14, 1, 2, 2, '', '', ''),
(15, 1, 2, 2, '', '', ''),
(16, 1, 2, 2, 'Ayalolo', '', ''),
(17, 1, 2, 2, '', '', ''),
(18, 1, 1, 1, 'Togbui Tawia Street', 'Ryco House', ''),
(19, 1, 2, 2, '', '', ''),
(20, 1, 1, 1, '', '', 'HTU Octagon'),
(21, 1, 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminUserID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `AdminUserID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `automobiles`
--

DROP TABLE IF EXISTS `automobiles`;
CREATE TABLE IF NOT EXISTS `automobiles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `Photo` mediumtext,
  `CategoryID` int(11) NOT NULL,
  `Year` year(4) NOT NULL,
  `MakeID` int(11) NOT NULL,
  `Model` varchar(25) NOT NULL,
  `Color` varchar(25) NOT NULL,
  `FuelID` int(11) NOT NULL,
  `VIN` varchar(25) NOT NULL,
  `RegNumber` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automobiles`
--

INSERT INTO `automobiles` (`ID`, `CustomerID`, `Photo`, `CategoryID`, `Year`, `MakeID`, `Model`, `Color`, `FuelID`, `VIN`, `RegNumber`) VALUES
(4, 1, 'ewaefwe-2022-06-22-08-02-42.jpg', 10, 2022, 10, 'Renegade', 'Orange', 4, 'ewaefwe', ''),
(2, 1, '34fe3ll-2022-06-22-07-59-18.jpg', 10, 2009, 9, 'Pilot', 'white', 2, '34fe3ll', 'gkk'),
(3, 1, 'tdntrj423r-2022-06-22-08-01-26.jpg', 3, 2009, 4, 'Beetle', 'Green', 2, 'tdntrj423r', ''),
(5, 1, NULL, 5, 2022, 7, 'cv', 'blue', 2, 'GTr9', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Category`) VALUES
(1, 'Long Vehicle'),
(2, 'School Bus'),
(3, 'Saloon Car'),
(4, 'Machinary'),
(5, 'Pick UP '),
(6, 'TATA Bus'),
(7, 'Taxi'),
(8, 'Tricycle'),
(9, 'Motorcycle'),
(10, 'SUV');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RegionID` int(11) NOT NULL,
  `City` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ID`, `RegionID`, `City`) VALUES
(1, 1, 'Ho'),
(2, 2, 'Accra'),
(3, 1, 'Kpando'),
(4, 1, 'Dzodze'),
(5, 1, 'Keta'),
(6, 1, 'Aflao'),
(7, 1, 'Akatsi'),
(8, 1, 'Anloga'),
(9, 1, 'Adaklu'),
(10, 1, 'Sokode');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Country`) VALUES
(1, 'Ghana'),
(2, 'Togo');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerUserID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `CustomerUserID`) VALUES
(1, 2),
(2, 16),
(3, 17);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `Department`) VALUES
(1, 'Reception'),
(2, 'Security'),
(3, 'Management'),
(4, 'Labour');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeUserID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `RelationshipID` int(11) NOT NULL,
  `Salary` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `EmployeeUserID`, `DepartmentID`, `Position`, `RelationshipID`, `Salary`) VALUES
(1, 10, 3, 'Administrator', 6, '50.00'),
(2, 11, 2, 'Chief Security Officer', 1, '0.00'),
(4, 13, 1, 'Receptionist', 2, '40.00'),
(5, 14, 4, 'Mechanical Engineer', 3, '3303.00');

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

DROP TABLE IF EXISTS `fuels`;
CREATE TABLE IF NOT EXISTS `fuels` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fuel` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`ID`, `Fuel`) VALUES
(1, 'LPG'),
(2, 'Petrol'),
(3, 'Dissel'),
(4, 'Electricity');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE IF NOT EXISTS `garage` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Logo` mediumtext NOT NULL,
  `AddressID` int(11) NOT NULL,
  `AboutUs` mediumtext NOT NULL,
  `ShortName` varchar(50) NOT NULL,
  `LongName` varchar(100) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Email` varchar(75) NOT NULL,
  `Box` varchar(25) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`ID`, `Logo`, `AddressID`, `AboutUs`, `ShortName`, `LongName`, `Phone`, `Email`, `Box`, `DateCreated`, `LastModified`) VALUES
(1, '84930232-2022-06-18-01-59-53.png', 20, '<p><big>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae ipsam quia iusto? Minus eos esse consectetur, non cumque impedit voluptates omnis doloremque, quisquam corporis blanditiis. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, saepe.</big></p>\r\n', 'HTU-JMTC', 'Ho Technical University - Japan Motors Trading Company', '84930232', 'mail@htujmtc.com', 'Hp 7898', '2022-06-18 01:59:53', '2022-06-22 08:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`ID`, `Gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` mediumtext,
  `Name` mediumtext NOT NULL,
  `Alternative` mediumtext,
  `SerialNo` varchar(25) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Shelve` varchar(50) NOT NULL,
  `MakeID` int(11) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `UnitCost` decimal(11,2) NOT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `LastModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `Photo`, `Name`, `Alternative`, `SerialNo`, `LocationID`, `Shelve`, `MakeID`, `Model`, `Stock`, `UnitCost`, `SupplierID`, `LastModified`) VALUES
(1, NULL, 'Whiper Blade', '', '28890-6GA0', 3, 'AUTO/SH/B', 1, 'Hard Body (QD32)', 10, '4.00', 1, '2022-06-17 04:14:09'),
(2, NULL, 'Car Door (Right)', '', '03546589', 3, 'AUTO/ST/A', 7, '', 9, '20.00', 1, '2022-06-19 03:04:52'),
(3, NULL, 'Engine Oil', '', '2020220', 3, 'AUTO/SH/C', 4, '', 7, '20.00', NULL, '2022-06-22 02:30:08'),
(4, NULL, 'Break pad', '', '28890-6GA02', 3, 'AUTO/SH/A', 7, '', 23, '30.00', NULL, '2022-06-22 02:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` int(11) NOT NULL,
  `PaymentStatus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID`, `JobID`, `PaymentStatus`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RequestID` int(11) NOT NULL,
  `PartIDs` varchar(100) DEFAULT NULL,
  `PartQtys` varchar(100) DEFAULT NULL,
  `ServiceIDs` varchar(100) DEFAULT NULL,
  `Notes` mediumtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `RequestID`, `PartIDs`, `PartQtys`, `ServiceIDs`, `Notes`) VALUES
(1, 1, '1,2', '2,2', '1', NULL),
(5, 2, '1', '3', '1', NULL),
(7, 3, '1,2,3', '1,2,3', '1,2', NULL),
(6, 2, '1', '3', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`ID`, `Location`) VALUES
(1, 'Warehose 1'),
(2, 'Warehouse 2'),
(3, 'Store Room 1'),
(4, 'Store Room 2');

-- --------------------------------------------------------

--
-- Table structure for table `makes`
--

DROP TABLE IF EXISTS `makes`;
CREATE TABLE IF NOT EXISTS `makes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Make` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makes`
--

INSERT INTO `makes` (`ID`, `Make`) VALUES
(1, 'Nissan'),
(2, 'KIA'),
(3, 'Toyota'),
(4, 'Volkswagen\n'),
(5, 'Dogde'),
(6, 'Opel'),
(7, 'Ford'),
(8, 'Ram'),
(9, 'Honda'),
(10, 'Jeep');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CountryID` int(11) NOT NULL,
  `Region` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`ID`, `CountryID`, `Region`) VALUES
(1, 1, 'Volta'),
(2, 1, 'Greater Accra'),
(3, 1, 'Oti'),
(4, 1, 'Central'),
(5, 1, 'Upper East'),
(6, 1, 'Eastern'),
(7, 1, 'Brong Ahafo'),
(8, 1, 'Upper West');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

DROP TABLE IF EXISTS `relationships`;
CREATE TABLE IF NOT EXISTS `relationships` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Relationship` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`ID`, `Relationship`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Engaged'),
(4, 'Dating'),
(6, 'Complicated');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AutomobileID` int(11) NOT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `DateIn` date NOT NULL,
  `DateDueOut` date NOT NULL,
  `Mileage` int(11) DEFAULT NULL,
  `Complians` mediumtext,
  `TypeID` int(11) NOT NULL,
  `PickUpAddress` mediumtext,
  `StatusID` varchar(25) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`ID`, `AutomobileID`, `EmployeeID`, `DateIn`, `DateDueOut`, `Mileage`, `Complians`, `TypeID`, `PickUpAddress`, `StatusID`, `DateCreated`, `LastModified`) VALUES
(1, 2, 1, '2022-06-17', '2022-06-24', 23223, 'Flat tyre', 2, 'My house', '3', '2022-06-17 20:17:30', '2022-06-20 11:46:21'),
(2, 3, 5, '2022-06-20', '2022-06-27', 6, 'Broken wind screen', 2, '', '3', '2022-06-21 04:53:48', '2022-06-22 11:58:13'),
(3, 5, 5, '2022-06-22', '2022-06-25', 13434, '', 2, '', '3', '2022-06-22 16:31:44', '2022-06-22 16:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `InvoiceID` int(11) NOT NULL,
  `PaymentID` mediumtext NOT NULL,
  `Total` decimal(11,2) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`ID`, `InvoiceID`, `PaymentID`, `Total`, `Date`) VALUES
(1, 1, 'Invoice-Pay-572783854', '83.00', '2022-06-21 11:50:25'),
(2, 1, 'Invoice-Pay-334042824', '83.00', '2022-06-22 02:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Sector` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`ID`, `Sector`) VALUES
(1, 'Private'),
(2, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Photo` mediumtext NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Cost` decimal(11,2) NOT NULL,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `Photo`, `Name`, `Description`, `Cost`, `LastModified`) VALUES
(1, 's1.jpg', 'Overall Checkup', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat? ', '35.00', '2022-06-17 00:36:15'),
(2, 's2.jpg', 'Oil Change', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat? ', '20.00', '2022-06-17 00:36:15'),
(3, 's3.jpg', 'Tire Replacement', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat? ', '12.00', '2022-06-17 00:38:05'),
(4, 's4.jpg', 'Engine Tune up', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat laboriosam voluptate assumenda amet tempore quaerat? ', '43.01', '2022-06-17 00:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Status`) VALUES
(1, 'Pending'),
(2, 'In Progress'),
(3, 'Done'),
(4, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `AddressID` int(11) DEFAULT NULL,
  `SectorID` varchar(25) NOT NULL,
  `Phone` varchar(25) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Box` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`ID`, `Name`, `AddressID`, `SectorID`, `Phone`, `Email`, `Box`) VALUES
(1, 'Macos Ventures', 18, '1', '84930232', 'macos@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`ID`, `Type`) VALUES
(1, 'Pick Up'),
(2, 'Drop Off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) DEFAULT NULL,
  `Password` mediumtext,
  `Photo` mediumtext,
  `FirstName` varchar(50) NOT NULL,
  `OtherName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `GenderID` int(11) DEFAULT NULL,
  `AddressID` int(11) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Photo`, `FirstName`, `OtherName`, `LastName`, `Phone`, `Email`, `BirthDate`, `GenderID`, `AddressID`, `Status`, `DateCreated`, `LastModified`) VALUES
(1, 'superuser', '$2y$10$qv8DUmfVfe.RyO25X9g9vesIq81Q8i8X02Fh0G.OZlAK21YEPhuz6', NULL, 'Theodore', NULL, 'Dela', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-06 07:00:00', '2022-06-06 14:04:07'),
(2, 'customer', '$2y$10$WwlGJ0ei.ujTKA16t0zU3O5SF6ImpMmuzQFRm43piULjFdyqYIe8S', '6789987654-2022-06-22-08-19-49.png', 'Theodore', '', 'Customer', '6789987654', 'theodoredela@gmail.com', '2022-06-17', 1, 16, 1, '2022-06-06 07:00:00', '2022-06-22 15:19:49'),
(10, 'employee', '$2y$10$WwlGJ0ei.ujTKA16t0zU3O5SF6ImpMmuzQFRm43piULjFdyqYIe8S', '', 'Theodore', '', 'Dela', '0542354850', 'theodore@gmail.com', '2022-06-22', 2, 9, 1, '2022-06-10 07:00:00', '2022-06-18 13:36:00'),
(11, 'sn@gmail.com', '$2y$10$Adk4e3Jn/LA8fzwFhVvPxOsVm3kwxw/.fV4JBas4wMFoUcKWKUQY2', '', 'Sn ', '', 'Trade', '0001120121', 'sn@gmail.com', '1571-06-22', 1, 10, 0, '2022-06-10 07:00:00', '2022-06-19 19:27:19'),
(12, 'thoedel@gmail.com', '$2y$10$xZ1MQXvrD4lqQJtnWjkEPOAMybCoISpDtkl3T15v.cZ/lD6NeCiWq', '', 'Theo', '', 'Del', '0000000001', 'thoedel@gmail.com', '2022-06-22', 1, 11, 1, '2022-06-10 07:00:00', '2022-06-10 23:02:55'),
(13, 'systarhody@gmail.com', '$2y$10$yYfEyXOXdE6Ssl.3bSxUte2ydRbW9Y8mi9XYJN31.UV7X2lzNsyDi', '0552153478-2022-06-12-07-52-47.JPG', 'Rhoda', '', 'Magah', '0552153478', 'systarhody@gmail.com', '1985-06-15', 2, 12, 1, '2022-06-11 07:00:00', '2022-06-11 23:22:07'),
(14, 'kwaku@gmail.com', '$2y$10$WwlGJ0ei.ujTKA16t0zU3O5SF6ImpMmuzQFRm43piULjFdyqYIe8S', '0500505055-2022-06-19-12-35-45.jpg', 'Cyril', 'Kwaku', 'Mensah', '0500505055', 'kwaku@gmail.com', '2022-06-07', 1, 13, 1, '2022-06-11 07:00:00', '2022-06-19 19:35:45'),
(16, 'james@gmail.com', '$2y$10$lqB.YasnhUeYs71mmesLk.0.fnpBa4sZKJrpPUvUGlPTpjI7uRKH2', '', 'James', '', 'Moon', '1234567891', 'james@gmail.com', '1995-05-17', 1, 17, 1, '2022-06-14 19:59:43', '2022-06-14 19:59:43'),
(17, 'sdkgd@gmail.com', '$2y$10$Ct7.CBeiA6MQj2y.u82aFeo1GPa5enspU/TXv60AMyvTQIbZOpX0i', NULL, 'cyril', '', 'hjohn', '0553268794', 'sdkgd@gmail.com', '2022-06-21', 1, 21, 1, '2022-06-22 16:21:09', '2022-06-22 16:21:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
