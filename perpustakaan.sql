-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 06:55 AM
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
  `password` varchar(200) NOT NULL,
  `telephone` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `kelamin` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `name`, `password`, `telephone`, `status`, `photo`, `kelamin`, `umur`, `saldo`, `alamat`) VALUES
(1, 'admin@gmail.com', 'Johan Budi Susilo', 'admin123', '1500-888', 'Admin', 'default.jpg', 'Man', 26, 0, 'Jl Merpati no 823'),
(122, 'alfius@gmail.com', 'Alfiius Stevanus Ginting', 'alfius123', '0877144770531', 'User', 'Alfiius-Stevanus-Ginting.jpg', 'Man', 24, 380000, 'Jl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(958, 'ramdhan@gmail.com', 'Ramdhan Mahfudz', '123', '023113132', 'User', 'Ramdhan-Mahfudz.jpg', 'Man', 22, 0, 'Jl Semangka no 22 RT 6 RW 7 Kota Bandung');

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
  `harga` int(11) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `cover_buku`, `tahun_terbit`, `stok`, `harga`, `sinopsis`) VALUES
(152, 'My Boring Life', 'Rifna None', 'Gramedia', '3727MyBoringLife.jpg', '2017', 46, 70000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(252, 'Pulang', 'Leila Chudori', 'Book Words', '4638Pulang.jpg', '2018', 12, 55000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(525, 'Laskar Pelangi', 'Andrea Hirata', 'Gramedia', 'Laskar_Pelangi.jpg', '2005', 23, 84000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(596, 'Hero', 'Rhonda Byron', 'Gunung jadti', '7673Hero.jpg', '2009', 77, 90000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(775, 'Sabar Itu Keren', 'Indriyani Mallo', 'Buku Lokal Sejahtera', '1874SabarItuKeren.jpg', '2011', 42, 78000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(795, 'Perahu Kertas', 'Dee Lestari', 'Book Words', '9071PerahuKertas.jpg', '2009', 47, 88000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(825, 'Harry Potter', 'JK Rowlings', 'Book Words', '2262HarryLotter.jpg', '2002', 30, 45000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(958, 'Quarter Life Crisis', 'Gerhana Nur Hayati', 'Sinar Dunia', '196QuarterLifeCrisis.jpg', '2018', 8, 110000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.'),
(959, 'Titik Nol', 'Agustinus Wibowo', 'Gramedia', '9948TitikNol.jpg', '2005', 26, 66000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatibus aut ipsa ab dolor nisi? Eveniet libero temporibus maxime explicabo quo id, sequi possimus dolorem illo. Ab quidem distinctio minus. Laudantium recusandae error, adipisci nesciunt ea quisquam nostrum quibusdam rerum harum cumque? Accusantium facere, voluptate nulla adipisci nostrum consequatur ipsam.');

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
  `status` varchar(30) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_buku`, `id`, `date`, `jumlah`, `harga`, `total`, `status`, `alamat`) VALUES
(56, 525, 122, '2023-06-01', 2, '84000.00', '168000.00', 'Success', 'Alfiius Stevanus Ginting (087714477053)\r\nJl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(57, 152, 958, '2023-06-01', 2, '70000.00', '140000.00', 'Success', 'Ramdhan Mahfudz (023113132)\r\nJl Semangka no 22 RT 6 RW 7 Kota Bandung');

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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_id` (`id`),
  ADD KEY `fk_id_buku` (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=970;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=980;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `akun` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
