-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2025 at 02:37 PM
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
-- Database: `proudcts`
--

-- --------------------------------------------------------

--
-- Table structure for table `skinproduct`
--

CREATE TABLE `skinproduct` (
  `productID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` int(10) UNSIGNED NOT NULL,
  `Quantity` int(10) UNSIGNED NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skinproduct`
--

INSERT INTO `skinproduct` (`productID`, `Name`, `Price`, `Quantity`, `img`) VALUES
(1, 'Face Care', 120, 40, 'proj_img/feature_img1.jpg'),
(2, 'Body Care', 500, 30, 'proj_img/feature_img2.jpg'),
(3, 'Luxury Skincare', 1000, 8, 'proj_img/feature_img3.jpg'),
(5, 'Beauty Essentials', 20, 420, 'proj_img/feature_img5.jpg'),
(6, 'Face Serum', 99, 150, 'proj_img/feature_img6.jpg'),
(13, 'Eye Care', 30, 100, 'proj_img/feature_img (2).jpg'),
(14, 'Hire Care', 400, 38, 'proj_img/hier_care.jpg'),
(15, 'Natural Soap', 200, 100, 'proj_img/feature_img4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `Name`, `Password`) VALUES
(1, 'Maysam', 'mmbmma@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skinproduct`
--
ALTER TABLE `skinproduct`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skinproduct`
--
ALTER TABLE `skinproduct`
  MODIFY `productID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
