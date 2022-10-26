-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220418.7005844990
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2022 at 04:06 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u_200103424_`
--

-- --------------------------------------------------------

--
-- Table structure for table `previousOrders`
--

CREATE TABLE `previousOrders` (
  `userID` int NOT NULL,
  `productID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productInformation`
--

CREATE TABLE `productInformation` (
  `productID` int NOT NULL,
  `productURL` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `productName` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `platform` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `productDescription` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `price` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User-Product`
--

CREATE TABLE `User-Product` (
  `quantity` int NOT NULL,
  `userID` int NOT NULL,
  `productID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productInformation`
--
ALTER TABLE `productInformation`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productInformation`
--
ALTER TABLE `productInformation`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
