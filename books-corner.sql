-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 12:55 AM
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
-- Database: `books-corner`
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
(122, 'alfius@gmail.com', 'Alfiius Stevanus Ginting', 'alfius123', '087714477053', 'User', '2821_AlfiiusStevanusGinting.jpg', 'Man', 24, 33000, 'Jl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(958, 'ramdhan@gmail.com', 'Ramdhan Mahfudz', '123', '023113132', 'User', 'Ramdhan-Mahfudz.jpg', 'Man', 22, 0, 'Jl Semangka no 22 RT 6 RW 7 Kota Bandung'),
(971, 'salman@gmail.com', 'Salman Alfaridzi', 'salman123', '082742642626', 'User', '3819_SalmanAlfaridzi.jpg', 'Man', 20, 110000, 'Jl Sukarapih No 26');

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
) ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `cover_buku`, `tahun_terbit`, `stok`, `harga`, `sinopsis`) VALUES
(152, 'My Boring Life', 'Rifna None', 'Gramedia', '3727MyBoringLife.jpg', '2017', 45, 70000, '\"My Boring Life\" adalah buku yang mengisahkan kehidupan sehari-hari yang terlihat biasa-biasa saja dari sudut pandang karakter utama. Buku ini mengeksplorasi tema tentang mencari kebahagiaan, menemukan keindahan dalam kehidupan sederhana, dan menghadapi tantangan yang mungkin terabaikan dalam rutinitas sehari-hari.\r\n\r\nSinopsis buku \"My Boring Life\" mengikuti perjalanan karakter utama yang awalnya merasa hidupnya monoton dan tanpa gairah. Dia merasa terperangkap dalam rutinitas yang membosankan, bekerja dalam pekerjaan yang tidak memuaskan, dan merasa tidak memiliki tujuan yang jelas.\r\n\r\nNamun, ketika karakter utama mulai melihat hidupnya dengan cara yang baru, dia mulai menyadari bahwa ada keindahan yang tersembunyi dalam momen-momen kecil dan rutinitas sehari-hari. Dia mulai melihat makna dalam interaksi dengan orang-orang di sekitarnya, menemukan kebahagiaan dalam hobi-hobinya, dan mengejar impian dan tujuan yang selama ini terlupakan.'),
(252, 'Pulang', 'Leila Chudori', 'Book Words', '4638Pulang.jpg', '2018', 51, 55000, '\"Pulang\" adalah sebuah buku yang mengeksplorasi tema kehidupan, keluarga, dan kisah cinta yang berpusat pada perjalanan pulang seorang pria ke tanah kelahirannya. Buku ini menggambarkan perjalanan emosional dan fisik karakter utama saat dia berusaha mengatasi masa lalunya dan menemukan makna di balik perjalanan pulangnya.\r\n\r\nSinopsis buku \"Pulang\" bermula ketika karakter utama, seorang pria yang telah lama tinggal di kota besar, memutuskan untuk kembali ke desa tempat dia dibesarkan. Dia menghadapi berbagai konflik internal, kebingungan, dan ketidakpastian saat merenungkan pilihan hidupnya dan menghadapi hubungannya dengan keluarga dan akar-akarnya.\r\n\r\nSelama perjalanannya, karakter utama bertemu dengan orang-orang dari masa lalunya, termasuk keluarga dan teman-teman lamanya. Dia menghadapi kenangan yang terpendam, konflik keluarga, dan rahasia yang terungkap, sementara juga menemukan kekuatan dan kedamaian dalam menghadapi kisah cintanya yang belum terselesaikan.\r\n\r\nMelalui kisah perjalanan pulang ini, pembaca diajak untuk merenungkan tentang pentingnya akar, keluarga, dan hubungan dengan tempat kelahiran. Buku ini menggambarkan proses penyembuhan dan pertumbuhan karakter utama saat dia memahami arti pentingnya menerima masa lalu dan menemukan kedamaian di masa depannya.'),
(525, 'Laskar Pelangi', 'Andrea Hirata', 'Gramedia', 'Laskar_Pelangi.jpg', '2005', 20, 84000, '\"Laskar Pelangi\" adalah sebuah buku yang mengisahkan tentang perjuangan sekelompok anak-anak miskin di desa Gantong, Belitung, untuk mendapatkan pendidikan yang layak dan mengubah nasib mereka. Buku ini mengangkat tema tentang harapan, persahabatan, ketekunan, dan kegigihan dalam menghadapi kesulitan.\r\n\r\nSinopsis buku \"Laskar Pelangi\" dimulai dengan pengenalan tokoh-tokoh utama, yakni Ikal, Lintang, Mahar, Kucai, A Kiong, dan Sahara. Mereka adalah siswa-siswa di sekolah Muhammadiyah yang berjuang untuk mendapatkan pendidikan yang berkualitas meskipun dengan keterbatasan sumber daya dan fasilitas yang minim.\r\n\r\nBuku ini menggambarkan perjalanan mereka dalam menghadapi berbagai rintangan, termasuk kemiskinan, kebijakan pemerintah yang tidak mendukung, serta hambatan sosial dan budaya. Namun, mereka tetap bertekad dan mendirikan Laskar Pelangi, sebuah kelompok yang berusaha melawan segala ketidakadilan dan memberikan semangat satu sama lain.\r\n\r\nMelalui perjuangan mereka, para anggota Laskar Pelangi menunjukkan dedikasi dan kegigihan mereka dalam meraih pendidikan yang lebih baik. Mereka menghadapi tantangan akademik, mengatasi hambatan keluarga, dan berjuang untuk tetap bersatu dalam menghadapi kesulitan yang datang.'),
(596, 'Hero', 'Rhonda Byron', 'Gunung jadti', '7673Hero.jpg', '2009', 77, 90000, '\"Hero\" adalah buku yang mempersembahkan kisah seorang pahlawan yang menghadapi perjuangan internal dan eksternal untuk melampaui batas diri dan menemukan kekuatan sejati. Buku ini menggambarkan perjalanan epik seorang individu yang berani menghadapi tantangan dan menginspirasi orang lain dengan tindakan heroiknya.\r\n\r\nSinopsis buku \"Hero\" mengikuti perjalanan karakter utama dari masa muda hingga menjadi pahlawan yang dihormati. Karakter utama awalnya adalah seseorang yang ragu-ragu, mungkin merasa tidak berarti, atau tidak menyadari potensi yang dimilikinya. Namun, melalui serangkaian peristiwa yang menguji kemampuannya, karakter tersebut mulai menemukan keberanian dan tekadnya.\r\n\r\nDalam perjalanan ini, karakter utama menghadapi berbagai rintangan dan musuh yang menguji fisik, mental, dan emosionalnya. Buku ini mengeksplorasi konflik internal yang dialami pahlawan tersebut, termasuk keraguan diri, ketakutan, dan ketidakpastian. Namun, dengan tekad yang kuat, karakter utama mengatasi kelemahan dan belajar mengendalikan kekuatan yang sebenarnya.'),
(775, 'Sabar Itu Keren', 'Indriyani Mallo', 'Buku Lokal Sejahtera', '1874SabarItuKeren.jpg', '2011', 42, 78000, '\"Sabar Itu Keren\" adalah buku yang menggali konsep kesabaran dan mengajak pembaca untuk memahami betapa pentingnya sifat sabar dalam menghadapi tantangan dan perjalanan hidup. Buku ini menginspirasi pembaca untuk melihat kesabaran sebagai kekuatan dan sumber daya yang memungkinkan kita mengatasi rintangan, mengembangkan ketahanan, dan mencapai kesuksesan jangka panjang.\r\n\r\nSinopsis buku \"Sabar Itu Keren\" memperkenalkan karakter utama yang menghadapi berbagai cobaan dan kegagalan dalam hidupnya. Awalnya, karakter tersebut mungkin tidak memahami arti sebenarnya dari kesabaran dan menganggapnya sebagai sikap pasif atau menyerah.\r\n\r\nNamun, melalui perjalanan pribadinya, karakter utama mulai belajar bahwa kesabaran sebenarnya adalah kekuatan yang kuat. Buku ini menggambarkan bagaimana kesabaran dapat membantu karakter utama untuk tetap teguh dalam menghadapi tantangan, menjaga fokus pada tujuan jangka panjang, dan mengatasi godaan untuk menyerah.\r\n\r\nMelalui kisah inspiratif dan cerita pengalaman hidup, pembaca diajak untuk merefleksikan pentingnya kesabaran dalam berbagai aspek kehidupan, seperti hubungan, karier, pendidikan, dan tujuan hidup. Buku ini memberikan wawasan dan saran praktis tentang bagaimana mengembangkan dan mempraktikkan kesabaran, termasuk strategi untuk mengatasi frustrasi dan mengendalikan emosi dalam menghadapi kesulitan.'),
(795, 'Perahu Kertas', 'Dee Lestari', 'Book Words', '9071PerahuKertas.jpg', '2009', 47, 88000, '\"Perahu Kertas\" adalah sebuah buku yang mengisahkan tentang perjalanan cinta, persahabatan, dan pertumbuhan diri dalam suasana remaja. Buku ini mengeksplorasi tema tentang impian, keberanian, dan keterhubungan antara karakter-karakter yang berjuang mencari jati diri dan arti kehidupan.\r\n\r\nSinopsis buku \"Perahu Kertas\" berpusat pada karakter utama, seorang remaja yang bernama Kugy. Kugy adalah seorang gadis yang unik, kreatif, dan bermimpi besar. Dia memiliki imajinasi yang liar dan sering mengekspresikan perasaannya melalui menulis surat di perahu kertas.\r\n\r\nKisah dimulai ketika Kugy bertemu dengan seorang pemuda yang bernama Keenan. Keenan adalah seorang pemuda pemberontak yang juga memiliki impian besar. Mereka berdua saling tertarik dan memulai perjalanan persahabatan yang intens.\r\n\r\nMelalui petualangan mereka, Kugy dan Keenan berusaha untuk menghadapi berbagai rintangan dan mengejar impian mereka masing-masing. Mereka menemukan kekuatan dalam persahabatan mereka, mengatasi ketakutan, dan berjuang melawan ekspektasi sosial yang membatasi mereka.'),
(825, 'Harry Potter', 'JK Rowlings', 'Book Words', '2262HarryLotter.jpg', '2002', 28, 45000, '\"Harry Potter\" adalah seri buku yang luar biasa yang mengisahkan tentang petualangan seorang anak bernama Harry Potter di dunia sihir. Buku ini menggabungkan elemen fantasi, petualangan, persahabatan, dan pertempuran antara kebaikan dan kejahatan.\r\n\r\nSinopsis seri buku \"Harry Potter\" dimulai dengan pengenalan Harry Potter, seorang anak biasa yang pada usia 11 tahun mengetahui bahwa dia sebenarnya adalah seorang penyihir. Dia diterima di Sekolah Sihir Hogwarts, tempat di mana ia belajar tentang sihir, bertemu teman-teman sebaya, dan menemukan potensi sihirnya yang luar biasa.\r\n\r\nSeri buku ini mengikuti perjalanan Harry dan teman-temannya, Ron Weasley dan Hermione Granger, selama tujuh tahun di Hogwarts. Mereka menghadapi berbagai tantangan, mengungkap misteri, dan melawan kekuatan jahat yang diwakili oleh Voldemort, penyihir jahat yang ingin menguasai dunia sihir.\r\n\r\nBuku ini mengangkat tema tentang persahabatan, keberanian, pengorbanan, dan mencari jati diri. Harry dan teman-temannya menghadapi berbagai ujian dan rintangan dalam perjalanan mereka, tetapi dengan bersama-sama mereka mampu mengatasi segala halangan dan membela nilai-nilai yang benar.'),
(958, 'Quarter Life Crisis', 'Gerhana Nur Hayati', 'Sinar Dunia', '196QuarterLifeCrisis.jpg', '2018', 55, 110000, '\"Quarter Life Crisis\" adalah sebuah buku yang menggambarkan perjalanan dan tantangan yang dihadapi oleh individu pada periode awal dewasa, khususnya di usia 20-an hingga awal 30-an. Buku ini menyajikan sinopsis mengenai ketidakpastian, kebingungan, dan tekanan yang sering dialami oleh banyak orang di masa-masa ini.\r\n\r\nSinopsis buku \"Quarter Life Crisis\" menggambarkan karakter utama yang sedang berjuang untuk menemukan arti hidup, menghadapi perubahan besar, dan mengatasi rasa frustasi yang muncul pada periode transisi ini. Buku ini menjelajahi berbagai aspek kehidupan, termasuk karier, hubungan pribadi, persahabatan, dan tujuan hidup.\r\n\r\nKarakter utama dalam buku ini berusaha mencari jati diri mereka, menavigasi kompleksitas dunia kerja, dan menemukan kebahagiaan serta pemenuhan dalam hidup mereka. Mereka merasa tertekan oleh harapan sosial, perbandingan dengan orang lain, dan meragukan kemampuan mereka sendiri.'),
(959, 'Titik Nol', 'Agustinus Wibowo', 'Gramedia', '9948TitikNol.jpg', '2005', 26, 66000, '\r\n\"Titik Nol\" adalah sebuah buku yang mengisahkan tentang perjalanan spiritual dan pencarian makna hidup seorang individu yang sedang menghadapi krisis eksistensial. Buku ini mengeksplorasi tema tentang kehampaan, penemuan diri, dan transformasi melalui perjalanan spiritual.\r\n\r\nSinopsis buku \"Titik Nol\" dimulai dengan pengenalan tokoh utama, yang merasa kehilangan arah dalam hidupnya. Dia merasa terjebak dalam rutinitas yang monoton dan meragukan makna keberadaannya. Dalam keputusasaan, tokoh utama memutuskan untuk meninggalkan kehidupan yang dulu dan memulai perjalanan spiritual yang mengubah hidupnya.\r\n\r\nPerjalanan ini membawa tokoh utama ke tempat-tempat suci, seperti kuil, biara, atau puncak gunung, di mana dia mencari pencerahan dan mencoba menemukan titik nol, suatu titik di mana semua pengalaman dan pemahaman sebelumnya dihapuskan dan dia dapat memulai kembali dengan pandangan yang baru.\r\n\r\nMelalui perjalanan spiritualnya, tokoh utama berinteraksi dengan guru-guru spiritual, bertemu dengan orang-orang yang berbagi pengalaman hidup mereka, dan merenungkan tentang eksistensi, kehidupan, dan arti sejati dari keberadaan manusia. Dia mengalami pertumbuhan emosional, pencerahan, dan penemuan diri yang dalam.');

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
(57, 152, 958, '2023-06-01', 2, '70000.00', '140000.00', 'Success', 'Ramdhan Mahfudz (023113132)\r\nJl Semangka no 22 RT 6 RW 7 Kota Bandung'),
(66, 252, 122, '2023-06-04', 1, '55000.00', '55000.00', 'Success', 'Alfiius Stevanus Ginting (0877144770531)\r\nJl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(67, 525, 122, '2023-06-04', 3, '84000.00', '252000.00', 'Success', 'Alfiius Stevanus Ginting (0877144770531)\r\nJl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(68, 152, 122, '2023-06-04', 1, '70000.00', '70000.00', 'Success', 'Alfiius Stevanus Ginting (0877144770531)\r\nJl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(70, 252, 122, '2023-06-05', 4, '55000.00', '220000.00', 'Success', 'Alfiius Stevanus Ginting (087714477053)\r\nJl Jeruk no 31 RT 6 RW 7 Kota Bandung 4029292'),
(71, 825, 971, '2023-06-09', 0, '45000.00', '0.00', 'Canceled', 'Ageri Fernanda (082742642626)\r\nJl Sukarapih No 21'),
(72, 825, 971, '2023-06-09', 2, '45000.00', '90000.00', 'Shipped', 'Ageri Fernanda (082742642626)\r\nJl Sukarapih No 21');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=976;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
