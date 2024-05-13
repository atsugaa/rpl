-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 10:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `ID_KENDARAAN` char(8) NOT NULL,
  `NAMA_KENDARAAN` varchar(64) NOT NULL,
  `HARGA_SEWA` bigint(20) NOT NULL,
  `DESKRIPSI_KENDARAAN` varchar(256) NOT NULL,
  `GAMBAR_KENDARAAN` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`ID_KENDARAAN`, `NAMA_KENDARAAN`, `HARGA_SEWA`, `DESKRIPSI_KENDARAAN`, `GAMBAR_KENDARAAN`) VALUES
('K0001', 'KUDA LUMPING', 230000, 'OKE, MANTAP, MANUK', 'test.jpg'),
('K0002', 'KERETA JAWA', 290000, 'MANUK, MANTAP, MANUK', 'test2.jpg'),
('K0003', 'BUS NEGRO', 300000, 'MANUK, MANUK, MANUK', 'test3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `ID_PAKET` char(8) NOT NULL,
  `NAMA_PAKET` varchar(32) NOT NULL,
  `DESTINASI_PAKET` varchar(256) NOT NULL,
  `HARGA_PAKET` bigint(20) NOT NULL,
  `JEMPUT_PAKET` varchar(256) NOT NULL,
  `KAPASITAS_PAKET` int(11) NOT NULL,
  `TANGGAL_PAKET` datetime NOT NULL,
  `DESKRIPSI_PAKET` varchar(256) NOT NULL,
  `GAMBAR_PAKET` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` char(8) NOT NULL,
  `ID_PAKET` char(8) DEFAULT NULL,
  `ID_USER` char(8) DEFAULT NULL,
  `CATATAN_PESANAN` varchar(256) DEFAULT NULL,
  `JUMLAH_PESANAN` int(11) NOT NULL,
  `TOTAL_HARGA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `ID_PENYEWAAN` char(8) NOT NULL,
  `ID_KENDARAAN` char(8) DEFAULT NULL,
  `ID_USER` char(8) DEFAULT NULL,
  `TITIK_JEMPUT_PENYEWAAN` varchar(256) NOT NULL,
  `CATATAN_PENYEWAAN` varchar(256) DEFAULT NULL,
  `DURASI_PENYEWAAN` int(11) NOT NULL,
  `TOTAL_HARGA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` char(8) NOT NULL,
  `NAMA_USER` varchar(64) NOT NULL,
  `ALAMAT_USER` varchar(256) NOT NULL,
  `TELEPON_USER` varchar(13) NOT NULL,
  `PASSWORD_USER` varchar(256) NOT NULL,
  `IS_ADMIN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `ALAMAT_USER`, `TELEPON_USER`, `PASSWORD_USER`, `IS_ADMIN`) VALUES
('febrianu', 'febrianu', 'febrianu', '06969696969', '91e83d5263772b44b861d96d4c6821dd071152594d1f52e1029bb800757c066f', NULL),
('petarunx', 'Admin', 'Admin', '08945364829', '4872129a12084829b5fb66ac1b350284f52dc3e75b39da6d8f973b2c0013246e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`ID_KENDARAAN`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`ID_PAKET`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `FK_KE` (`ID_PAKET`),
  ADD KEY `FK_MEMESAN` (`ID_USER`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`ID_PENYEWAAN`),
  ADD KEY `FK_DARI` (`ID_KENDARAAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_USER`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_KE` FOREIGN KEY (`ID_PAKET`) REFERENCES `paket` (`ID_PAKET`),
  ADD CONSTRAINT `FK_MEMESAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `FK_DARI` FOREIGN KEY (`ID_KENDARAAN`) REFERENCES `kendaraan` (`ID_KENDARAAN`),
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
