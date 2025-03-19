-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2025 at 02:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ClientId` int(11) NOT NULL,
  `Client_User_Name` varchar(50) NOT NULL,
  `Model_Id` int(11) NOT NULL,
  `Model_No` varchar(50) NOT NULL DEFAULT 'Model',
  `Model_Title` varchar(250) NOT NULL,
  `Model_Image` varchar(250) NOT NULL,
  `Model_Price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `NetPrice` int(11) NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

DROP TABLE IF EXISTS `cart2`;
CREATE TABLE IF NOT EXISTS `cart2` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ClientId` int(11) NOT NULL,
  `Client_User_Name` varchar(50) NOT NULL,
  `BookId` int(11) NOT NULL,
  `Book_Title` varchar(50) NOT NULL,
  `book_image` varchar(50) NOT NULL,
  `Book_Price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `NetPrice` int(11) NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart3`
--

DROP TABLE IF EXISTS `cart3`;
CREATE TABLE IF NOT EXISTS `cart3` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ClientId` int(11) NOT NULL,
  `Client_User_Name` varchar(50) NOT NULL,
  `Model_Id` int(11) NOT NULL,
  `Model_No` varchar(50) NOT NULL DEFAULT 'Model',
  `Model_Title` varchar(250) NOT NULL,
  `Model_Image` varchar(250) NOT NULL,
  `Model_Price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `NetPrice` int(11) NOT NULL,
  `Status` varchar(250) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_checkout`
--

DROP TABLE IF EXISTS `cart_checkout`;
CREATE TABLE IF NOT EXISTS `cart_checkout` (
  `InvId` int(11) NOT NULL AUTO_INCREMENT,
  `ClientName` varchar(50) NOT NULL,
  `ClientId` int(11) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `NetAmnt` int(11) NOT NULL,
  PRIMARY KEY (`InvId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ClientId` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `AadharNo` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(250) NOT NULL,
  `BrandName` varchar(250) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` text NOT NULL,
  `image_type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProductName`, `BrandName`, `Price`, `Description`, `image_type`) VALUES
(6, 'Cat', 'Meat', 5000, 'Imported Cat', '75580-cat1.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
