-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220408.20e55eb1ac
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 03:07 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 8.0.18

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

-- --------------------------------------------------------

--
-- Table structure for table `bestelingen`
--

CREATE TABLE `bestelingen` (
  `id` int(30) NOT NULL,
  `FK_userid` int(30) NOT NULL,
  `totprijs` float NOT NULL,
  `FK_kortingscode` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totamount` int(10) NOT NULL,
  `data` date NOT NULL,
  `sendtoaddres` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `betaaldmet` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bestelingen`
--

INSERT INTO `bestelingen` (`id`, `FK_userid`, `totprijs`, `FK_kortingscode`, `totamount`, `data`, `sendtoaddres`, `betaaldmet`) VALUES
(9, 26, 146.93, '(none)', 7, '2022-04-30', 'urk, kurk 1, 6969UR', 'Ideal'),
(14, 26, 514.49, '(none)', 51, '2022-05-01', 'urk, kurk 1, 6969UR', 'Ideal'),
(16, 26, 244.98, '123code', 1, '2022-05-02', 'urk, kurk 1, 6969UR', 'Ideal');

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
(3, 'dames kleren', 'kleren voor dames');

-- --------------------------------------------------------

--
-- Table structure for table `kortingscode`
--

CREATE TABLE `kortingscode` (
  `id` int(30) NOT NULL,
  `kortingscode` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waarde` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kortingscode`
--

INSERT INTO `kortingscode` (`id`, `kortingscode`, `waarde`) VALUES
(2, '123code', 10);

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id` int(30) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_catagorieid` int(30) NOT NULL,
  `catagorie` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` float NOT NULL,
  `voorraad` int(10) NOT NULL,
  `beschrijving` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`id`, `name`, `FK_catagorieid`, `catagorie`, `prijs`, `voorraad`, `beschrijving`) VALUES
(4, 'kleding', 0, 'heren kleding', 9.99, 21, 'dit is heren kleding'),
(7, 'q', 0, 'dames kleren', 1.99, 11, 'asdasd'),
(8, 'test', 0, 'elektronica', 14.5, 99, 'as'),
(9, 'plant', 0, 'elektronica', 49.99, 155, 'q'),
(13, 'drone', 0, 'elektronica', 249.99, 9, 'dronedronedronedronedronedronedronedronedronedronedronedronedro nedronedronedronedronedronedronedronedronedronedron edronedronedronedronedronedronedronedronedronedron edronedronedronedronedronedronedrone dronedronedronedronedronedronedronedronedronedronedronedr onedronedronedronedronedronedronedronedronedronedronedronedronedrone');

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
(26, 'k', 'k', 'van', 'k', 'urk', 'kurk', '1', '6969UR', '4567-03-12', 'k', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `winkelmandje`
--

CREATE TABLE `winkelmandje` (
  `id` int(30) NOT NULL,
  `FK_userid` int(30) NOT NULL,
  `FK_productid` int(10) NOT NULL,
  `product` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijs` float NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestelingen`
--
ALTER TABLE `bestelingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userid` (`FK_userid`),
  ADD KEY `kortingscode` (`FK_kortingscode`),
  ADD KEY `FK_kortingscode` (`FK_kortingscode`);

--
-- Indexes for table `catagorie`
--
ALTER TABLE `catagorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kortingscode`
--
ALTER TABLE `kortingscode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_catagorieid` (`FK_catagorieid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winkelmandje`
--
ALTER TABLE `winkelmandje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_productid` (`FK_productid`),
  ADD KEY `FK_userid` (`FK_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelingen`
--
ALTER TABLE `bestelingen`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `catagorie`
--
ALTER TABLE `catagorie`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kortingscode`
--
ALTER TABLE `kortingscode`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `winkelmandje`
--
ALTER TABLE `winkelmandje`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelingen`
--
ALTER TABLE `bestelingen`
  ADD CONSTRAINT `bestelingen_ibfk_1` FOREIGN KEY (`FK_userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `winkelmandje`
--
ALTER TABLE `winkelmandje`
  ADD CONSTRAINT `winkelmandje_ibfk_1` FOREIGN KEY (`FK_userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `winkelmandje_ibfk_2` FOREIGN KEY (`FK_productid`) REFERENCES `producten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
