-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2025 at 05:29 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `tgl_transaksi` varchar(50) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `kode_menu` varchar(20) NOT NULL,
  `jumlah` int NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `nomor_meja` varchar(10) NOT NULL,
  `status` enum('diproses','done') NOT NULL DEFAULT 'diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tgl_transaksi`, `id_pelanggan`, `kode_menu`, `jumlah`, `total`, `nomor_meja`, `status`) VALUES
('TX20250922001', '2025-09-22', 1, '2', 3, 10500.00, '5', 'done'),
('TX20250922002', '2025-09-22', 3, '1', 2, 10000.00, '4', 'done'),
('TX20250922003', '2025-09-22', 2, '1', 7, 35000.00, '1', 'diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`,`kode_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
