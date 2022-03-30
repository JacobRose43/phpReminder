-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 10, 2022 at 10:55 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Laptopy i notebooki'),
(2, 'Routery wi-fi'),
(3, 'Acces pointy wi-fi');

-- --------------------------------------------------------

--
-- Table structure for table `category1`
--

DROP TABLE IF EXISTS `category1`;
CREATE TABLE `category1` (
  `id` int(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `measure` enum('szt.','box') COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'szt.'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `price`, `quantity`, `measure`) VALUES
(1, 1, 'Laptop DELL', '1000.00', 2, 'szt.'),
(2, 1, 'Laptop Lenovo', '2000.00', 3, 'szt.'),
(3, 1, 'Laptop HUAWEI', '3000.00', 4, 'szt.'),
(4, 1, 'Laptop Apple', '4000.00', 3, 'szt.'),
(5, 1, 'Laptop Asus', '1000.00', 2, 'szt.'),
(6, 2, 'Router 100', '100.00', 20, 'szt.'),
(7, 2, 'Router 200', '123.00', 21, 'szt.'),
(8, 2, 'Router 300', '231.00', 12, 'szt.'),
(9, 2, 'Router 400', '321.00', 2, 'szt.'),
(10, 3, 'AP 100', '78.50', 20, 'szt.'),
(11, 3, 'AP 200', '91.45', 21, 'szt.'),
(12, 3, 'AP 300', '134.23', 12, 'szt.'),
(13, 3, 'AP 400', '211.11', 2, 'szt.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(10));

--
-- Indexes for table `category1`
--
ALTER TABLE `category1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
