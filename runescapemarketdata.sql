-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2019 at 02:23 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `runescapemarketdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorydimension`
--

DROP TABLE IF EXISTS `categorydimension`;
CREATE TABLE IF NOT EXISTS `categorydimension` (
  `CatID` int(2) NOT NULL AUTO_INCREMENT,
  `Category` varchar(75) NOT NULL,
  PRIMARY KEY (`CatID`),
  UNIQUE KEY `CategoryIndex` (`Category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datedimension`
--

DROP TABLE IF EXISTS `datedimension`;
CREATE TABLE IF NOT EXISTS `datedimension` (
  `DateID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto increment ID',
  `Year` int(5) NOT NULL COMMENT 'Year on the date',
  `Month` int(2) NOT NULL COMMENT 'Month of the year',
  `Day` int(2) NOT NULL COMMENT 'Day of the month',
  `DayID` int(1) NOT NULL COMMENT 'Day of the week label',
  PRIMARY KEY (`DateID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemdimension`
--

DROP TABLE IF EXISTS `itemdimension`;
CREATE TABLE IF NOT EXISTS `itemdimension` (
  `ItemID` int(4) NOT NULL AUTO_INCREMENT,
  `CatID` int(2) NOT NULL,
  `Item` varchar(100) NOT NULL,
  PRIMARY KEY (`ItemID`),
  UNIQUE KEY `ItemIndex` (`Item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memberonlydimension`
--

DROP TABLE IF EXISTS `memberonlydimension`;
CREATE TABLE IF NOT EXISTS `memberonlydimension` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberOnly` varchar(4) NOT NULL,
  PRIMARY KEY (`MemberID`),
  UNIQUE KEY `MemberOnlyIndex` (`MemberOnly`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricefact`
--

DROP TABLE IF EXISTS `pricefact`;
CREATE TABLE IF NOT EXISTS `pricefact` (
  `PriceID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` int(4) NOT NULL,
  `DateID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Price` int(15) NOT NULL,
  `PriceChange` int(15) NOT NULL COMMENT 'How the price has changed since the last recorded instance of this item',
  `HighAlch` int(15) NOT NULL COMMENT 'The value received from casting high alchemy',
  `LowAlch` int(15) NOT NULL COMMENT 'The value received from casting low alchemy',
  PRIMARY KEY (`PriceID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weekday`
--

DROP TABLE IF EXISTS `weekday`;
CREATE TABLE IF NOT EXISTS `weekday` (
  `weekDayID` int(1) NOT NULL,
  `Day` varchar(9) NOT NULL,
  PRIMARY KEY (`weekDayID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
