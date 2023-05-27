-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 09:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `name`, `password`, `telephone`, `status`, `photo`, `kelamin`, `umur`, `saldo`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin123', '1500-888', 'Admin', 'admin.jpg', 'Perempuan', 22, 100000),
(122, 'alfius@gmail.com', 'Alfiius Stevanus Ginting', 'alfius123', '087714477053', 'User', '2748AlfiiusStevanusGinting.jpg', 'Laki - laki', 24, 70000),
(955, 'ramdhan@gmail.com', 'Ramdhan Mahfuzh', 'rmd345', '6476745', 'User', 'Ramdhan Mahfuzh.jpg', 'Laki-Laki', 20, 0),
(961, 'salman@gmail.com', 'Salman', '123', '45367254', 'User', 'default.jpg', 'Laki-Laki', 20, 0),
(963, 'Azzila@gmail.com', 'Azzila', '123', '78977897', 'User', 'default.jpg', 'Perempuan', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(33) NOT NULL,
  `penulis_buku` varchar(22) NOT NULL,
  `penerbit_buku` varchar(22) NOT NULL,
  `cover_buku` varchar(200) NOT NULL,
  `tahun_terbit` varchar(33) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `cover_buku`, `tahun_terbit`, `stok`, `harga`) VALUES
(152, 'My Boring Life', 'Rifna None', 'Gramedia', '3727MyBoringLife.jpg', '2017', 52, 70000),
(252, 'Pulang', 'Leila Chudori', 'Book Words', '4638Pulang.jpg', '2018', 17, 55000),
(525, 'Laskar Pelangi', 'Andrea Hirata', 'Gramedia', 'Laskar_Pelangi.jpg', '2005', 35, 84000),
(596, 'Hero', 'Rhonda Byron', 'Gunung jadti', '7673Hero.jpg', '2009', 77, 90000),
(775, 'Sabar Itu Keren', 'Indriyani Mallo', 'Buku Lokal Sejahtera', '1874SabarItuKeren.jpg', '2011', 42, 78000),
(795, 'Perahu Kertas', 'Dee Lestari', 'Book Words', '9071PerahuKertas.jpg', '2009', 47, 88000),
(825, 'Harry Potter', 'JK Rowlings', 'Book Words', '2262HarryLotter.jpg', '2002', 33, 45000),
(958, 'Quarter Life Crisis', 'Gerhana Nur Hayati', 'Sinar Dunia', '196QuarterLifeCrisis.jpg', '2018', 8, 110000),
(959, 'Titik Nol', 'Agustinus Wibowo', 'Gramedia', '9948TitikNol.jpg', '2005', 27, 66000);

-- --------------------------------------------------------

--
-- Table structure for table `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `id`, `id_buku`, `tanggal_pinjam`) VALUES
(20, 122, 958, '2023-04-09'),
(24, 122, 795, '2023-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=964;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=962;

--
-- AUTO_INCREMENT for table `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meminjam`
--
ALTER TABLE `meminjam`
  ADD CONSTRAINT `meminjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `meminjam_ibfk_2` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
