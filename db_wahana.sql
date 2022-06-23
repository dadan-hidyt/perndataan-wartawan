-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 08:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wahana`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user_id`, `nama`, `username`, `password`) VALUES
(1, 'dadan', 'dadan', 'dadan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` bigint(20) UNSIGNED NOT NULL,
  `kode_wartawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_berita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_submit` date NOT NULL,
  `honor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_wartawan`
--

CREATE TABLE `tb_wartawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_wilayah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_wartawan`
--

INSERT INTO `tb_wartawan` (`id`, `kode`, `nama`, `email`, `telepon`, `jk`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `kode_wilayah`) VALUES
(11, 'WHN-636', 'Burhanudin', 'phisingkugg02@gmail.com', '0882283712', 'pria', '1995-05-31', 'Jakarta', 'Jln. Leuwipanjang Kebonlega II Kompleks Muara Bandung', 'WHN-BNUG'),
(12, 'WHN-204', 'Dadan Hidayat', 'dadanhidyt@gmail.com', '08822383711', 'pria', '2001-03-03', 'Sumedang', 'Jl. Batununggal No.3 Bandung', 'WHN-IDAAU'),
(13, 'WHN-108', 'Ardianto Muhamad', 'd0704@gmail.com', '082383711762', 'pria', '2000-03-03', 'Sumedang', 'JL. Batu Tunggal nomor3 Bekasi utara', 'WHN-SKBM'),
(14, 'WHN-430', 'Ahmad Hidayat  tea', 'ahuid@gmail.co', '09827366221', 'pria', '2003-03-03', 'Sumedang', 'JL. Rancakalong NO5, Desa Mekar jaya sumedang', 'WHN-BNUG'),
(15, 'WHN-986', 'Rafly Hidayat', 'Hidayat@gamil.com', '08271655232', 'pria', '2003-03-31', 'Bogor', 'Jl. Kehormatan Blok A No.19 Rt.002 Rw.08\r\nDuri Kepa, Kebon Jeruk, Jakarta Barat, Indonesia, 11510', 'WHN-SMDN'),
(16, 'WHN-297', 'Burhan Burhanudin', 'dadanhidyt@gmail.com', '0828738728', 'pria', '2020-04-04', 'Jakarta', 'Jalan Arteri Raya 17, RT 06 RW 07, Kelurahan Macanan, Kecamatan Bumiayu, Kota Surabaya, Jawa Timur, 224352', 'WHN-GRT'),
(17, 'WHN-535', 'Bubun Santosa', 'sububun@snaos.co', '0827636552', 'pria', '2009-03-22', 'jakarta', 'Perumahan Bumi Permai, Jalan Gondang Jati 17, RT 09 RW 03, Kelurahan Kaliran, Kecamatan Kaliwangi, Kota Malang, Jawa Timur, 224352', 'WHN-DPK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wilayah`
--

CREATE TABLE `tb_wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_wilayah` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wilayah` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_wilayah`
--

INSERT INTO `tb_wilayah` (`id`, `kode_wilayah`, `nama_wilayah`, `situs`) VALUES
(10, 'WHN-BNUG', 'Bandung', 'https://jabar.wahananews.co'),
(14, 'WHN-DPK', 'Depok', 'https://jabar.wahananews.co'),
(16, 'WHN-GRT', 'garut', 'https://jabar.wahananews.co'),
(19, 'WHN-SBN', 'subang', 'https://jabar.wahananews.co'),
(20, 'WHN-SKBM', 'Sukabumi', 'https://jabar.wahananews.co'),
(21, 'WHN-CAJR', 'Cianjur', 'https://jabar.wahananews.co'),
(23, 'WHN-KNNA', 'Kuningan', 'https://jabar.wahananews.co'),
(24, 'WHN-IDAAU', 'Indramayu', 'https://jabar.wahananews.co'),
(25, 'WHN-PRAAT', 'Purwakarta', 'https://jabar.wahananews.co'),
(26, 'WHN-BKS', 'bekasi', 'https://jabar.wahananews.co'),
(27, 'WHN-SMDN', 'Sumedang', 'https://jabar.wahananews.co'),
(28, 'WHN-JW AA', 'Jawa barat', 'https://jabar.wahananews.co');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tb_admin_username_unique` (`username`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_wartawan`
--
ALTER TABLE `tb_wartawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_wartawan`
--
ALTER TABLE `tb_wartawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_wilayah`
--
ALTER TABLE `tb_wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
