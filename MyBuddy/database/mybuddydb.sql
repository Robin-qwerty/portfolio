-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220408.20e55eb1ac
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 09:23 AM
-- Server version: 10.6.8-MariaDB
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybuddydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `groepen`
--

CREATE TABLE `groepen` (
  `groep_id` int(11) NOT NULL,
  `naam` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beschrijving` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `groepsbalans` decimal(9,2) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groepen`
--

INSERT INTO `groepen` (`groep_id`, `naam`, `beschrijving`, `groepsbalans`, `data`) VALUES
(4, 'q', 'q', '225.10', '0000-00-00'),
(5, 'but groep', 'van meno', '0.00', '0000-00-00'),
(6, 'qqqqqqq', 'test aanpassen', '123.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `groepsbetalingen`
--

CREATE TABLE `groepsbetalingen` (
  `id` int(11) NOT NULL,
  `van_lid` int(11) NOT NULL,
  `bedrag` float NOT NULL,
  `betaald` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groepsbetalingen`
--

INSERT INTO `groepsbetalingen` (`id`, `van_lid`, `bedrag`, `betaald`) VALUES
(19, 20, 12, 'yes'),
(21, 22, 123, 'yes'),
(33, 1, 111, 'yes'),
(34, 19, 111, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `id` int(11) NOT NULL,
  `groep` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `owner` tinyint(1) NOT NULL DEFAULT 0,
  `uitnodiging` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leden`
--

INSERT INTO `leden` (`id`, `groep`, `user`, `owner`, `uitnodiging`) VALUES
(1, 4, 11, 1, 1),
(2, 6, 11, 1, 1),
(5, 5, 6, 1, 1),
(19, 4, 6, 2, 1),
(20, 6, 6, 0, 1),
(21, 6, 3, 0, 1),
(22, 6, 9, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `roll` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankrekeningnummer` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balans` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `roll`, `email`, `password`, `name`, `tussenvoegsel`, `achternaam`, `bankrekeningnummer`, `balans`) VALUES
(3, 'admin', 'admin', 'q', 'admin', 'admin', 'admin', 'admin', '0.00'),
(6, 'meno@but.nl', 'meno@but.nl', '123', 'meno', '', 'but', '12345678', '8.00'),
(9, 'l', 'l', 'l', 'l', 'l', 'l', 'l', '0.00'),
(10, 'admi\\nn', 'admi\\nn', 'admin', 'sam', 'van', 'vdad', '413', '0.00'),
(11, 'q', 'q', 'q', 'q', 'q', 'q', 'q', '1234588.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groepen`
--
ALTER TABLE `groepen`
  ADD PRIMARY KEY (`groep_id`);

--
-- Indexes for table `groepsbetalingen`
--
ALTER TABLE `groepsbetalingen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `van_user` (`van_lid`);

--
-- Indexes for table `leden`
--
ALTER TABLE `leden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groep` (`groep`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groepen`
--
ALTER TABLE `groepen`
  MODIFY `groep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `groepsbetalingen`
--
ALTER TABLE `groepsbetalingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `leden`
--
ALTER TABLE `leden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groepsbetalingen`
--
ALTER TABLE `groepsbetalingen`
  ADD CONSTRAINT `betaling_door_lid` FOREIGN KEY (`van_lid`) REFERENCES `leden` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leden`
--
ALTER TABLE `leden`
  ADD CONSTRAINT `leden_ibfk_1` FOREIGN KEY (`groep`) REFERENCES `groepen` (`groep_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leden_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
