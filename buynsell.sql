-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 08:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buynsell`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ItemId` bigint(20) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `ItemPrice` varchar(50) NOT NULL,
  `ItemCategory` varchar(50) NOT NULL,
  `ItemOwner` varchar(50) NOT NULL,
  `ItemDescription` varchar(50) NOT NULL,
  `ItemStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ItemId`, `ItemName`, `ItemPrice`, `ItemCategory`, `ItemOwner`, `ItemDescription`, `ItemStatus`) VALUES
(1, 'sad', '', '', '', '', ''),
(2, 'asdnkj', 'nkj', '', 'nkj', 'nkj', '');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `SellerId` bigint(20) NOT NULL,
  `SellerName` varchar(50) NOT NULL,
  `SellerLocation` varchar(50) NOT NULL,
  `SellerMobile` varchar(50) NOT NULL,
  `SellerEmail` varchar(50) NOT NULL,
  `SellerPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerId`, `SellerName`, `SellerLocation`, `SellerMobile`, `SellerEmail`, `SellerPassword`) VALUES
(1, 'lorenz pascual', 'caloocan', '0987321', 'lorenz@gmail.com', 'lorenz123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ItemId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
