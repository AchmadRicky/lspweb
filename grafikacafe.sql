-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 06:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grafikacafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `level`) VALUES
(1, 'admin', 'a', 'admin'),
(2, 'manajer', 'm', 'manajer'),
(3, 'kasir 1', 'k', 'kasir'),
(5, 'kasir 2', 'k', 'kasir'),
(10, 'kasir 3', 'k', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_menu`, `nama_menu`, `harga`, `jumlah`, `total_harga`) VALUES
(1, 2, 1, 'Nasi Goreng', 10000, 2, 20000),
(2, 3, 1, 'Nasi Goreng', 10000, 2, 20000),
(3, 3, 2, 'Bakmi', 12000, 2, 24000),
(4, 4, 2, 'Bakmi', 12000, 1, 12000),
(5, 4, 1, 'Nasi Goreng', 10000, 1, 10000),
(6, 5, 1, 'Nasi Goreng', 10000, 1, 10000),
(7, 5, 2, 'Bakmi', 12000, 1, 12000),
(8, 6, 1, 'Nasi Goreng', 10000, 1, 10000),
(9, 7, 1, 'Nasi Goreng', 10000, 1, 10000),
(10, 8, 1, 'Nasi Goreng', 10000, 1, 10000),
(11, 9, 1, 'Nasi Goreng', 10000, 1, 10000),
(12, 10, 2, 'Bakmi', 12000, 1, 12000),
(13, 11, 2, 'Bakmi', 12000, 1, 12000),
(14, 12, 2, 'Bakmi', 12000, 1, 12000),
(15, 13, 1, 'Nasi Goreng', 10000, 1, 10000),
(16, 14, 2, 'Bakmi', 12000, 1, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_kasir`, `nama_kasir`, `waktu`, `keterangan`) VALUES
(1, 4, 'kasir 2', '2022-05-18 18:03:46', 'Melakukan Transaksi Dengan id 12'),
(2, 3, 'kasir 1', '2022-05-18 18:27:49', 'Melakukan Transaksi Dengan id 13'),
(3, 3, 'kasir 1', '2022-05-18 18:28:08', 'Melakukan Transaksi Dengan id 14');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `gambar`, `harga`, `stok`) VALUES
(1, 'Nasi Goreng', 'nasi goreng.jpg', 10000, 89),
(2, 'Bakmi', 'bakmi.jpg', 12000, 39),
(3, 'kopi', 'kopi.jpeg', 8000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `meja` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kasir`, `nama_kasir`, `total_pembelian`, `meja`, `waktu`) VALUES
(1, 3, 'kasir 1', 32000, 1, '2022-05-17 09:59:25'),
(2, 3, 'kasir 1', 20000, 3, '2022-05-17 10:01:44'),
(3, 3, 'kasir 1', 44000, 4, '2022-05-17 11:04:10'),
(4, 3, 'kasir 1', 22000, 3, '2022-05-17 11:23:01'),
(5, 3, 'kasir 1', 22000, 1, '2022-05-18 17:49:26'),
(6, 4, 'kasir 2', 10000, 1, '2022-05-18 17:51:34'),
(7, 4, 'kasir 2', 10000, 1, '2022-05-18 17:58:45'),
(8, 4, 'kasir 2', 10000, 1, '2022-05-18 18:00:25'),
(9, 4, 'kasir 2', 10000, 1, '2022-05-18 18:00:48'),
(10, 4, 'kasir 2', 12000, 1, '2022-05-18 18:02:20'),
(11, 4, 'kasir 2', 12000, 1, '2022-05-18 18:02:49'),
(12, 4, 'kasir 2', 12000, 1, '2022-05-18 18:03:46'),
(13, 3, 'kasir 1', 10000, 1, '2022-05-18 18:27:49'),
(14, 3, 'kasir 1', 12000, 2, '2022-05-18 18:28:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
