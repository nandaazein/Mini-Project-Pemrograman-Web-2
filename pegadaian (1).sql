-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:23 AM
-- Server version: 10.9.2-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegadaian (1)`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_nasabah` int(50) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `sisa_bayar` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_transaksi`, `id_nasabah`, `jumlah_bayar`, `sisa_bayar`) VALUES
(1, 1, 2, 100000, 300000),
(2, 4, 1, 1000000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `barang_gadai`
--

CREATE TABLE `barang_gadai` (
  `id_barang_gadai` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_nasabah` int(100) NOT NULL,
  `berat_barang` float DEFAULT NULL,
  `nilai_taksiran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_gadai`
--

INSERT INTO `barang_gadai` (`id_barang_gadai`, `id_transaksi`, `id_nasabah`, `berat_barang`, `nilai_taksiran`) VALUES
(4, 1, 2, 3.5, 1000000),
(5, 4, 1, 4.5, 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_angsuran`
--

CREATE TABLE `jenis_angsuran` (
  `id_jenis_angsuran` int(11) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `bunga` float DEFAULT NULL,
  `lama_angsuran` varchar(20) DEFAULT NULL,
  `nominal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_angsuran`
--

INSERT INTO `jenis_angsuran` (`id_jenis_angsuran`, `nama_jenis`, `bunga`, `lama_angsuran`, `nominal`) VALUES
(11, '1.000.000', 9, '6', 182000),
(12, '1.000.000', 18, '12 ', 98000),
(13, '1.000.000', 27, '18', 71000),
(21, '2.000.000', 9, '6', 363000),
(22, '2.000.000', 18, '12', 197000),
(23, '2.000.000', 27, '18', 141000),
(31, '3.000.000', 9, '6', 545000),
(32, '3.000.000', 18, '12', 295000),
(33, '3.000.000', 27, '18', 212000),
(41, '4.000.000', 9, '6', 727000),
(42, '4.000.000', 18, '12', 393000),
(43, '4.000.000', 27, '18', 282000),
(51, '5.000.000', 9, '6', 908000),
(52, '5.000.000', 18, '12', 492000),
(53, '5.000.000', 27, '18', 353000),
(54, '6.000.000', 9, '12', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama`, `alamat`, `jenis_kelamin`, `telepon`) VALUES
(1, 'meyda', 'banjarmasin', 'P', '08xxx'),
(2, 'nanda', 'banjarbaru', 'P', '08xxx'),
(3, 'al', 'bjm', 'L', '08xxx'),
(5, 'sarah', 'bjb', 'L', '08xxx'),
(6, 'madhan', 'bjm', 'L', '08xxx');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `jenis_kelamin`, `telepon`) VALUES
(1, 'madhan', 'banjarmasin', 'L', '08xxx'),
(2, 'ipul', 'bjm', 'L', '08xxx');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_nasabah` int(100) NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `jumlah_pengembalian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_transaksi`, `id_nasabah`, `tanggal_pengembalian`, `jumlah_pengembalian`) VALUES
(1, 1, 2, '2023-03-22', 1000000),
(3, 3, 3, '2023-03-28', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_nasabah` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `id_jenis_angsuran` int(11) DEFAULT NULL,
  `status_pinjaman` enum('Belum Lunas','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_nasabah`, `tanggal_transaksi`, `id_jenis_angsuran`, `status_pinjaman`) VALUES
(1, 2, '2023-01-01', 11, 'Belum Lunas'),
(3, 3, '2023-03-15', 53, 'Belum Lunas'),
(4, 1, '2023-03-14', 23, 'Belum Lunas'),
(5, 5, '2023-03-02', 23, 'Belum Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `angsuran_ibfk3` (`id_nasabah`);

--
-- Indexes for table `barang_gadai`
--
ALTER TABLE `barang_gadai`
  ADD PRIMARY KEY (`id_barang_gadai`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `barang_gadai_ibfk3` (`id_nasabah`);

--
-- Indexes for table `jenis_angsuran`
--
ALTER TABLE `jenis_angsuran`
  ADD PRIMARY KEY (`id_jenis_angsuran`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `pengembalian_ibfk3` (`id_nasabah`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_jenis_angsuran` (`id_jenis_angsuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_gadai`
--
ALTER TABLE `barang_gadai`
  MODIFY `id_barang_gadai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_angsuran`
--
ALTER TABLE `jenis_angsuran`
  MODIFY `id_jenis_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `angsuran_ibfk3` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `barang_gadai`
--
ALTER TABLE `barang_gadai`
  ADD CONSTRAINT `barang_gadai_ibfk2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `barang_gadai_ibfk3` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `pengembalian_ibfk3` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk4` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`),
  ADD CONSTRAINT `transaksi_ibfk5` FOREIGN KEY (`id_jenis_angsuran`) REFERENCES `jenis_angsuran` (`id_jenis_angsuran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
