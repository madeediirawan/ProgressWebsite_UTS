-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 12:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bangunan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(25) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `harga` int(34) NOT NULL,
  `jumlah` int(45) NOT NULL,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `harga`, `jumlah`, `gambar`) VALUES
(2, 'keramik', 2000, 5000, '5f9e2c2dd8920.jpg'),
(3, 'cat tembok', 150000, 267, 'cattembok.jpg'),
(4, 'lem', 15000, 124, 'lem.jpg'),
(6, 'pasir', 125000, 125, 'pasir.jpg'),
(7, 'lampu', 25000, 125, '5f9e2b7552bec.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'ediirawan', '$2y$10$kIFp7SrUZoOD9X75NWBAG.Mn8pl4M7vr35A7Gqx0NyzXJHdhvY5gi'),
(4, 'admin', '$2y$10$BzG5NCyYrpvL8dXjfmJJg.GqPITVUFpX8wDaoh.ZZFG.fTlN9mTTK'),
(5, 'admin2', '$2y$10$Ss5Vg68IELXwCwdeW24Y4OQE2/IkAhcQ1M.u6yqDjHtgqbWJDMxtW'),
(6, 'siapa', '$2y$10$e3M5rrFgXr2MT5tEwTw3peIARhmX/OxvazlFtAg.uO3Q2ee5CgXPm'),
(7, 'werrr', '$2y$10$DhUXXDcFJawmcUlDEMjnS.g7uBHoEslU2YN2.tu55iuHmMBSioMdy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
