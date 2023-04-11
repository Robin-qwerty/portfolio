-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220408.20e55eb1ac
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 03:51 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshopDB`
--
CREATE DATABASE IF NOT EXISTS `webshopDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `webshopDB`;

-- --------------------------------------------------------

--
-- Table structure for table `bestelingen`
--

CREATE TABLE `bestelingen` (
  `id` int(30) NOT NULL,
  `user` int(30) NOT NULL,
  `tataalbedrag` int(30) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagorie`
--

CREATE TABLE `catagorie` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagorie`
--

INSERT INTO `catagorie` (`id`, `name`, `beschrijving`) VALUES
(1, 'elektronica', 'allen elektronica'),
(2, 'heren kleding', 'kelding voor heren'),
(3, 'dames kleren', 'kleren voor dames'),
(6, 'w', 'w'),
(12, 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagorie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voorraad` int(10) NOT NULL,
  `beschrijving` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `name`, `catagorie`, `prijs`, `voorraad`, `beschrijving`) VALUES
(4, 'kleding', 'dames kleren', '10', 0, 'dit is heren kleding'),
(7, 'q', 'dames kleren', '2', -2, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(30) NOT NULL,
  `naam` int(30) NOT NULL,
  `leenboek5` int(30) NOT NULL,
  `inleverdata5` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `roll` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naam` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `woonplaats` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `straat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huisnummer` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geboortendatum` date NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll`, `naam`, `tussenvoegsel`, `achternaam`, `woonplaats`, `straat`, `huisnummer`, `postcode`, `geboortendatum`, `email`, `password`) VALUES
(16, 'admin', 'q', 'q', 'q', 'q', 'q', 'q', 'q', '2022-03-03', 'admin', 'q'),
(26, 'k', 'k', 'van', 'k', 'k', 'k', 'k', 'k', '4567-03-12', 'k', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `winkelmandje`
--

CREATE TABLE `winkelmandje` (
  `id` int(30) NOT NULL,
  `userid` int(30) NOT NULL,
  `productid` int(10) NOT NULL,
  `product` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `winkelmandje`
--

INSERT INTO `winkelmandje` (`id`, `userid`, `productid`, `product`, `prijs`, `amount`) VALUES
(96, 26, 4, 'kleding', '10', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestelingen`
--
ALTER TABLE `bestelingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagorie`
--
ALTER TABLE `catagorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winkelmandje`
--
ALTER TABLE `winkelmandje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelingen`
--
ALTER TABLE `bestelingen`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagorie`
--
ALTER TABLE `catagorie`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `winkelmandje`
--
ALTER TABLE `winkelmandje`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
