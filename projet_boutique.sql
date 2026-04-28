-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 11:21 AM
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
-- Database: `projet boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `idc` int(11) NOT NULL,
  `nomc` varchar(100) DEFAULT NULL,
  `emailc` varchar(100) DEFAULT NULL,
  `passwordc` varchar(255) DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`idc`, `nomc`, `emailc`, `passwordc`, `date_inscription`) VALUES
(3, 'dali', 'medalibelmessai@gmail.com', '$2y$10$kgVOWTUWDuVolFlRCeldge9DYW9V3oSirv5QSc/r.HeNHX1U8USKC', '2026-04-21 20:59:39'),
(4, 'dali', 'alala@gmail.com', '$2y$10$d9NkqDjZQ/M3OBN1oDHXOe..NW2s0WYhPRCMM9kjtH1YDQlxFTLM6', '2026-04-21 21:10:38'),
(5, 'dali', '2004@gmail.com', '$2y$10$1b67Zp3Ib6qT1nwUu45IAuSoZkA8ImCji0TKmP8xp8vOlHWDdLyze', '2026-04-21 21:12:35'),
(6, 'wassim', 'medalibelmessai1233@gmail.com', '$2y$10$S/VTVSo9SGdd8ncA3rncoOaD/fJjnmR3o39nBf1yvcbtTez8/7376', '2026-04-22 09:38:48'),
(7, 'assem', 'assem@gmail.com', '$2y$10$qs/ucv0vSEVSbGOucbyst.LJME.euUfdpJVKYI9qQo.KhmekUTQc.', '2026-04-28 08:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `email`, `numero`, `date_commande`) VALUES
(5, 'was+sim', 'wassim@gmail.com', '99245254', '2026-04-20 12:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `commande_items`
--

CREATE TABLE `commande_items` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `code_produit` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande_items`
--

INSERT INTO `commande_items` (`id`, `commande_id`, `code_produit`, `quantite`) VALUES
(5, 5, 'MON2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
-- Error reading structure for table projet boutique.products: #1932 - Table &#039;projet boutique.products&#039; doesn&#039;t exist in engine
-- Error reading data for table projet boutique.products: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `projet boutique`.`products`&#039; at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idc`),
  ADD UNIQUE KEY `emailc` (`emailc`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande_items`
--
ALTER TABLE `commande_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commande_items`
--
ALTER TABLE `commande_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande_items`
--
ALTER TABLE `commande_items`
  ADD CONSTRAINT `commande_items_ibfk_1` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
