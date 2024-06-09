-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2024 pada 10.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `ID_KENDARAAN` char(8) NOT NULL,
  `NAMA_KENDARAAN` varchar(64) NOT NULL,
  `HARGA_KENDARAAN` bigint(20) NOT NULL,
  `DESKRIPSI_KENDARAAN` varchar(256) NOT NULL,
  `GAMBAR_KENDARAAN` varchar(256) NOT NULL,
  `STATUS_KENDARAAN` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`ID_KENDARAAN`, `NAMA_KENDARAAN`, `HARGA_KENDARAAN`, `DESKRIPSI_KENDARAAN`, `GAMBAR_KENDARAAN`, `STATUS_KENDARAAN`) VALUES
('6660779a', 'Jet Bus 3 Voyager Mining Specs', 3500000, '50 seat formasi tempat duduk (2-2) dan 5 seat di barisan paling belakang, Toilet Air Conditioner, Reclining Seat, LCD TV - DVD - Stop Kontak - Microphone untuk karaoke, Bantal, Cool Box (opsional), Safety Feature (Palu pemecah kaca dan pemadam api, serta e', 'bus new.png', 1),
('66655ed1', 'Jet Bus SDD 5', 4500000, 'Body dari Baja Galvanis, Panjang : 13500mm, Lebar : 2500mm, Tinggi : 4150mm, Pintu Darurat, Pintu Keluar Darurat, Sunroof Palu Keamanan, Alat Pemada Api, DVD Player, Sub Woofer + Spaker, 71 - 75 kursi', 'Untitled design (7).png', 1),
('666561cd', 'Jet Bus 3+ MC', 2000000, '17 - 20 seats, Panjang : 6470 / 5150 mm, Lebar : 1835mm, Tinggi : 2508mm, Body dari Baja Galvanis, Pintu Darurat, Palu Keamanan, Alat Pemadam Api, TV LED hingga 20', 'elf mahal.png', 1),
('K0001', 'Hiace', 1800000, 'Desain Interior Yang Modern, Kabin Bagasi, LED TV, Sliding Door, Kursi Lipat Belakang', 'Untitled design (6).png', 1),
('K0002', 'Big Bus 48', 3500000, 'Tempat Duduk 48, Bagasi 6, Transmisi Manual, Bahan Bakar Diesel, Asuransi Kendaraan, Ada Pengemudi', 'Untitled design (5).png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
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
  `GAMBAR_PAKET` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`ID_PAKET`, `NAMA_PAKET`, `DESTINASI_PAKET`, `HARGA_PAKET`, `JEMPUT_PAKET`, `KAPASITAS_PAKET`, `TANGGAL_PAKET`, `DESKRIPSI_PAKET`, `GAMBAR_PAKET`) VALUES
('665cb1e2', 'Jelajah Bromo ', 'Gunung Bromo, Air Terjun Madakaripura, Bukit Teletubbies Bromo, Gunung Widodaren', 300000, 'Depan masjid cheng ho', 100, '2024-06-29 00:54:00', 'Nikmati keindahan alam dan petualangan seru di Gunung Bromo dengan paket wisata kami yang dirancang untuk memberikan pengalaman tak terlupakan. Hubungi kami sekarang untuk informasi lebih lanjut dan pemesanan!\r\n\r\nFasilitas sebagai berikut : Transportasi PP', 'image 33.png'),
('P0001', 'Jogja Ceria', 'CANDI BOROBUDUR, MALIOBORO, HEHA SKY VIEW, HEHA OCEAN VIEW, OBELIX HILLS', 500000, 'LAMONGAN, TIKUNG, MANTUP', 150, '2024-05-16 20:58:54', 'Nikmati kekayaan budaya dan keindahan alam Yogyakarta dengan paket wisata kami yang dirancang untuk memberikan pengalaman tak terlupakan. Hubungi kami sekarang untuk informasi lebih lanjut dan pemesanan!', 'image 33 (1).png'),
('P0002', 'Hiling Bersama dengan Hilal', 'Florawisata San Terra de Lafonte, Jatim Park 1, Alun-Alun Kota Malang, Kampung Warna-Warni Jodipan, Batu Night Spectacular', 400000, 'LAMONGAN, TIKUNG, MANTUP', 80, '2024-07-26 08:00:00', 'Nikmati keindahan alam, budaya, dan kuliner Malang dengan paket wisata kami yang dirancang untuk memberikan pengalaman tak terlupakan. Hubungi kami sekarang untuk informasi lebih lanjut dan pemesanan!\r\n\r\nFasilitas sebagai berikut : Transportasi PP Bandara/', '61c03a03c4068.jpg'),
('P0003', 'Jelajah Kota Sejuta Umat', 'Jendela Langit, Air Terjun Coban Binangun, Cimory Dairyland Prigen, Kebun Raya Purwodadi', 300000, 'LAMONGAN, TIKUNG, MANTUP', 40, '2024-08-07 21:00:00', 'Nikmati keindahan alam dan kearifan lokal Pasuruan dengan paket wisata kami yang dirancang untuk memberikan pengalaman tak terlupakan. Hubungi kami sekarang untuk informasi lebih lanjut dan pemesanan!\r\n\r\nFasilitas sebagai berikut : Transportasi PP Surabaya', 'b44de8fc1789eebb07781449541c17fb.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `ID_PEMESANAN` char(8) NOT NULL,
  `ID_PAKET` char(8) DEFAULT NULL,
  `ID_USER` char(8) DEFAULT NULL,
  `CATATAN_PESANAN` varchar(256) DEFAULT NULL,
  `JUMLAH_PESANAN` int(11) NOT NULL,
  `TOTAL_HARGA` bigint(20) NOT NULL,
  `TANGGAL_PEMESANAN` date NOT NULL DEFAULT current_timestamp(),
  `TITIK_JEMPUT_PEMESANAN` varchar(256) NOT NULL,
  `STATUS_PEMESANAN` varchar(16) NOT NULL DEFAULT 'BELUM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`ID_PEMESANAN`, `ID_PAKET`, `ID_USER`, `CATATAN_PESANAN`, `JUMLAH_PESANAN`, `TOTAL_HARGA`, `TANGGAL_PEMESANAN`, `TITIK_JEMPUT_PEMESANAN`, `STATUS_PEMESANAN`) VALUES
('TP000001', 'P0002', 'febrianu', 'okkk', 6, 2400000, '2024-05-21', 'LAMONGAN', 'SUDAH'),
('TP000002', 'P0003', 'febrianu', 'okkkkkkkkkkkkkkkk', 2, 800000, '2024-05-21', ' MANTUP', 'SUDAH'),
('TP000003', 'P0003', 'febrianu', 'uuuuuuuuuu', 1, 400000, '2024-05-21', 'LAMONGAN', 'EXPIRED'),
('TP000004', 'P0003', 'febrianu', 'jjjjjjjjjjj', 2, 800000, '2024-05-21', ' TIKUNG', 'SUDAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `ID_PENYEWAAN` char(8) NOT NULL,
  `ID_KENDARAAN` char(8) DEFAULT NULL,
  `ID_USER` char(8) DEFAULT NULL,
  `TITIK_JEMPUT_PENYEWAAN` varchar(256) NOT NULL,
  `CATATAN_PENYEWAAN` varchar(256) DEFAULT NULL,
  `DURASI_PENYEWAAN` int(11) NOT NULL,
  `TOTAL_HARGA` bigint(20) NOT NULL,
  `TANGGAL_PENYEWAAN` date NOT NULL DEFAULT current_timestamp(),
  `STATUS_PENYEWAAN` varchar(16) NOT NULL DEFAULT 'BELUM'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`ID_PENYEWAAN`, `ID_KENDARAAN`, `ID_USER`, `TITIK_JEMPUT_PENYEWAAN`, `CATATAN_PENYEWAAN`, `DURASI_PENYEWAAN`, `TOTAL_HARGA`, `TANGGAL_PENYEWAAN`, `STATUS_PENYEWAAN`) VALUES
('TS000001', 'K0001', 'febrianu', 'asrama', 'sssssss', 3, 690000, '2024-05-24', 'SUDAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` char(8) NOT NULL,
  `NAMA_USER` varchar(64) NOT NULL,
  `ALAMAT_USER` varchar(256) NOT NULL,
  `TELEPON_USER` varchar(13) NOT NULL,
  `PASSWORD_USER` varchar(256) NOT NULL,
  `IS_ADMIN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `ALAMAT_USER`, `TELEPON_USER`, `PASSWORD_USER`, `IS_ADMIN`) VALUES
('admin21', 'admin', 'Asrama Trunojoyo Madura', '082338842217', '91e83d5263772b44b861d96d4c6821dd071152594d1f52e1029bb800757c066f', 1),
('atsuga17', 'kntlo', 'Jotosanur', '089530456940', '4872129a12084829b5fb66ac1b350284f52dc3e75b39da6d8f973b2c0013246e', NULL),
('febrianu', 'febrianu', 'febrianu', '06969696969', '91e83d5263772b44b861d96d4c6821dd071152594d1f52e1029bb800757c066f', NULL),
('petarunx', 'Admin Hilal', 'Dusun Klagen, Ds Tawar, Kec Gondang', '08945364829', '4872129a12084829b5fb66ac1b350284f52dc3e75b39da6d8f973b2c0013246e', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`ID_KENDARAAN`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`ID_PAKET`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `FK_KE` (`ID_PAKET`),
  ADD KEY `FK_MEMESAN` (`ID_USER`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`ID_PENYEWAAN`),
  ADD KEY `FK_DARI` (`ID_KENDARAAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_USER`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FK_KE` FOREIGN KEY (`ID_PAKET`) REFERENCES `paket` (`ID_PAKET`),
  ADD CONSTRAINT `FK_MEMESAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `FK_DARI` FOREIGN KEY (`ID_KENDARAAN`) REFERENCES `kendaraan` (`ID_KENDARAAN`),
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
