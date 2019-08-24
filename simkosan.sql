-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2019 at 01:06 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkosan`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `detail_transaksi` (
`id_transaksi` int(11)
,`keterangan_pemasukan` varchar(100)
,`keterangan_pembayaran` varchar(100)
,`keterangan_kredit` varchar(100)
,`debit_pemasukan` decimal(10,2)
,`debit_pembayaran` decimal(10,2)
,`kredit` decimal(10,2)
,`tanggal_pembayaran` date
,`tanggal_kredit` date
,`tanggal_pemasukan` date
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `lantai` varchar(25) NOT NULL,
  `kamar_mandi` enum('luar','dalam','','') NOT NULL,
  `luas_kamar` double NOT NULL,
  `status` enum('Terisi','Kosong','','') NOT NULL DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `no_kamar`, `lantai`, `kamar_mandi`, `luas_kamar`, `status`) VALUES
(1, 1, 'aqso', 'dalam', 9, 'Kosong'),
(2, 1, 'nabawi', 'luar', 9, 'Kosong'),
(3, 1, 'harom', 'luar', 9, 'Kosong'),
(4, 2, 'aqso', 'luar', 9, 'Kosong'),
(5, 2, 'nabawi', 'luar', 9, 'Kosong'),
(6, 2, 'harom', 'dalam', 12, 'Terisi'),
(7, 4, 'aqso', 'dalam', 9, 'Kosong'),
(8, 5, 'aqso', 'dalam', 9, 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kredit`
--

CREATE TABLE `tb_kredit` (
  `id_kredit` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `tgl_kredit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kredit`
--

INSERT INTO `tb_kredit` (`id_kredit`, `keterangan`, `nominal`, `tgl_kredit`) VALUES
(1, 'Bayar Wifi bulan september', '240000.00', '2018-12-11'),
(2, 'Bayar Air bulan November', '200000.00', '2018-12-13'),
(3, 'Biaya Bersalin', '200000.00', '2018-12-19'),
(4, 'Biaya Genteng Bocor', '500000.00', '2018-12-21'),
(5, 'Bayar Genteng', '500.00', '2018-12-10'),
(6, 'Bayar Rumah Sakit', '200.00', '2018-12-02');

--
-- Triggers `tb_kredit`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran` AFTER INSERT ON `tb_kredit` FOR EACH ROW insert into tb_transaksi
(id_kredit)
VALUES
(new.id_kredit)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasukan`
--

CREATE TABLE `tb_pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `tgl_pemasukan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasukan`
--

INSERT INTO `tb_pemasukan` (`id_pemasukan`, `keterangan`, `nominal`, `tgl_pemasukan`) VALUES
(1, 'Biaya Fitness', '200000.00', '2018-12-18'),
(2, 'Pembayaran Kedai', '500000.00', '2018-12-16'),
(3, 'Bayar Air bulan November', '500000.00', '2018-12-10');

--
-- Triggers `tb_pemasukan`
--
DELIMITER $$
CREATE TRIGGER `pemasukan` AFTER INSERT ON `tb_pemasukan` FOR EACH ROW insert into tb_transaksi
(id_pemasukan) VALUES
(new.id_pemasukan)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total_pembayaran` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_tagihan`, `keterangan`, `bulan`, `tgl_pembayaran`, `total_pembayaran`) VALUES
(8, 1, 'Pembayaran kos aqso No 1 bulan januari - april', 4, '2018-01-08', '1800000.00'),
(9, 2, 'Pembayaran kos harom No 2 bulan juli - agustus', 1, '2019-08-24', '450000.00'),
(10, 2, 'Pembayaran kos harom No 2 bulan juli - agustus', 1, '2019-08-23', '450000.00');

--
-- Triggers `tb_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `pembayaran` AFTER INSERT ON `tb_pembayaran` FOR EACH ROW insert into tb_transaksi
(id_pembayaran) VALUES (new.id_pembayaran)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghuni`
--

CREATE TABLE `tb_penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_depan` varchar(25) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `plat_nomor` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penghuni`
--

INSERT INTO `tb_penghuni` (`id_penghuni`, `id_kamar`, `nama_depan`, `nama_belakang`, `no_ktp`, `plat_nomor`, `alamat`, `no_telp`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 8, 'Dimas', 'Fatahhilla', '3224934903023', 'P4288ZW', 'Pesanggaran', '085335472057', 'Banyuwangi', '1997-07-12'),
(2, 7, 'Angga', 'Dwi', '3224934903023', 'P4288ZW', 'Bondowoso', '085335472898', 'Bondowoso', '1998-12-11'),
(3, 8, 'Bahrullah', 'Asturi', '3224934903023', 'P4288ZW', 'Banyuwangi', '6282335986334', 'Banyuwangi', '2019-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tagihan`
--

CREATE TABLE `tb_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `jumlah_tagihan` decimal(10,2) NOT NULL,
  `Batas` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Belum bayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tagihan`
--

INSERT INTO `tb_tagihan` (`id_tagihan`, `id_kamar`, `jumlah_tagihan`, `Batas`, `status`) VALUES
(1, 1, '450000.00', 8, 'april'),
(2, 6, '450000.00', 24, 'agustus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kredit` int(11) DEFAULT NULL,
  `id_pemasukan` int(11) DEFAULT NULL,
  `id_pembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_kredit`, `id_pemasukan`, `id_pembayaran`) VALUES
(5, 5, NULL, NULL),
(6, 6, NULL, NULL),
(8, NULL, 1, NULL),
(9, NULL, 2, NULL),
(10, NULL, 3, NULL),
(15, NULL, NULL, 8),
(16, NULL, NULL, 9),
(17, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','superadmin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dimas Fatahhilla', 'dimasfatah2@gmail.com', NULL, '$2y$10$OlRFd4Zf33FHIjsE1wcl3.PVqWqi3OAQPlDyU37DLiGhEN3y0tBKe', NULL, '2019-03-13 01:10:54', '2019-03-13 01:10:54');

-- --------------------------------------------------------

--
-- Structure for view `detail_transaksi`
--
DROP TABLE IF EXISTS `detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_transaksi`  AS  select `tb_transaksi`.`id_transaksi` AS `id_transaksi`,(select `tb_pemasukan`.`keterangan` from `tb_pemasukan` where (`tb_pemasukan`.`id_pemasukan` = `tb_transaksi`.`id_pemasukan`)) AS `keterangan_pemasukan`,(select `tb_pembayaran`.`keterangan` from `tb_pembayaran` where (`tb_pembayaran`.`id_pembayaran` = `tb_transaksi`.`id_pembayaran`)) AS `keterangan_pembayaran`,(select `tb_kredit`.`keterangan` from `tb_kredit` where (`tb_kredit`.`id_kredit` = `tb_transaksi`.`id_kredit`)) AS `keterangan_kredit`,(select `tb_pemasukan`.`nominal` from `tb_pemasukan` where (`tb_pemasukan`.`id_pemasukan` = `tb_transaksi`.`id_pemasukan`)) AS `debit_pemasukan`,(select `tb_pembayaran`.`total_pembayaran` from `tb_pembayaran` where (`tb_pembayaran`.`id_pembayaran` = `tb_transaksi`.`id_pembayaran`)) AS `debit_pembayaran`,(select `tb_kredit`.`nominal` from `tb_kredit` where (`tb_kredit`.`id_kredit` = `tb_transaksi`.`id_kredit`)) AS `kredit`,(select `tb_pembayaran`.`tgl_pembayaran` from `tb_pembayaran` where (`tb_pembayaran`.`id_pembayaran` = `tb_transaksi`.`id_pembayaran`)) AS `tanggal_pembayaran`,(select `tb_kredit`.`tgl_kredit` from `tb_kredit` where (`tb_kredit`.`id_kredit` = `tb_transaksi`.`id_kredit`)) AS `tanggal_kredit`,(select `tb_pemasukan`.`tgl_pemasukan` from `tb_pemasukan` where (`tb_pemasukan`.`id_pemasukan` = `tb_transaksi`.`id_pemasukan`)) AS `tanggal_pemasukan` from `tb_transaksi` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  ADD PRIMARY KEY (`id_kredit`);

--
-- Indexes for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indexes for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kredit` (`id_kredit`),
  ADD KEY `id_pemasukan` (`id_pemasukan`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kredit`
--
ALTER TABLE `tb_kredit`
  MODIFY `id_kredit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pemasukan`
--
ALTER TABLE `tb_pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tb_tagihan` (`id_tagihan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tb_penghuni`
--
ALTER TABLE `tb_penghuni`
  ADD CONSTRAINT `tb_penghuni_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tagihan`
--
ALTER TABLE `tb_tagihan`
  ADD CONSTRAINT `tb_tagihan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pemasukan`) REFERENCES `tb_pemasukan` (`id_pemasukan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_kredit`) REFERENCES `tb_kredit` (`id_kredit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
